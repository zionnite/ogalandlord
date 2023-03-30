<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Webhook extends My_Controller {

    public function __construst(){
        parent::__construct();
    }

	public function get_webhooks(){
        sleep(5);
	    $site_name		= $this->Action->get_site_name();
		$user_id 		=$this->session->userdata('user_id');
		$secure_key   =$this->Action->get_private_live_key();
       
       
        $hmac_header    =$_POST['X-Paystack-Signature'];
        $data = @file_get_contents("php://input");
        $event = json_decode($data, true);
       
        $e  ='';
        $dataarray  =[];
        
        foreach($event as $key=>$value){
            $dataarray[$key]    = $value;
            $e  = addslashes($value['id'][0]);
        }
        
        $amount     ="";
        $imp        = implode(',',$dataarray);
        $ref        = $dataarray['data']['reference'];
        $status     = $dataarray['data']['status'];
        $amt        = $dataarray['data']['amount'];
        $amount     = $amt / 100;
        
        $event      = $dataarray['event'];

        
        
        if($event == 'charge.success' && $status =='success'){
            /**Meta DATA */
            $user_id        = $dataarray['data']['metadata']['user_id'];
            $props_id       = $dataarray['data']['metadata']['props_id'];
            $agent_id       = $dataarray['data']['metadata']['agent_id'];
            $trans_type     = $dataarray['data']['metadata']['trans_type'];
       

            //Update Wallet
            $this->Wallet_db->update_wallet_charge_success($user_id,$agent_id,$props_id);

            //update Transaction status
            $this->Transaction_db->update_transaction_charge_success($user_id,$agent_id,$props_id);

            //update Wallet Balance
            $this->Wallet_db->fund_current_balance($user_id,$amount);
            /**Create a Wallet */



        }
        else if($event == 'transfer.success' && $status =='success'){

            /**Meta DATA */
            $sender_id          = $dataarray['data']['recipient']['metadata']['sender_id'];
            $reciever_id        = $dataarray['data']['recipient']['metadata']['agent_id'];
            $type               = $dataarray['data']['recipient']['metadata']['type'];
            $props_id           = $dataarray['data']['recipient']['metadata']['props_id'];

            //update Sender transaction status to success && wallet
            $this->Transaction_db->update_transaction_transfer_success($sender_id,$props_id,$amount);

            //update Agent Details
            if($type == 'agent_rc'){

                $trans_type		='complete_transafer';
                $desc			='Payment for Property';
                $status			='success';
                // $reference      ='no reference';
                $this->Transaction_db->add_complete_transaction($reciever_id, $sender_id, $props_id, $trans_type, $amount, $ref, $desc, $status);
                $this->Wallet_db->fund_total_earning($reciever_id,$amount);
            }
            else if($type =='insur_rc'){

                $trans_type		='deposit';
                $desc			='commission for Insurance';
                $status			='success';
                $this->Transaction_db->add_site_transaction('admin', $sender_id, $props_id, $trans_type, $amount, $ref, $desc, $status);
                $this->Wallet_db->fund_insurance_earning($amount);

                //credit site earning
                $trans_type		='deposit';
                $desc			='commission for Platform Usage';
                $status			='success';
                $this->Transaction_db->add_site_transaction('admin', $sender_id, $props_id, $trans_type, $amount, $ref, $desc, $status);
                $this->Wallet_db->add_to_site_earning($sender_id,$reciever_id,$props_id);
            }
            else if($type =='ref_rc'){

                $referal_id           = $dataarray['data']['recipient']['metadata']['referal_id'];

                $trans_type		='complete_transafer';
                $desc			='Payment for Property';
                $status			='success';
                $this->Transaction_db->add_complete_transaction($referal_id, $sender_id, $props_id, $trans_type, $amount, $ref, $desc, $status);
                $this->Wallet_db->fund_total_earning($referal_id,$amount);

            }
            else if($type =='prom_rc'){

                $promoter_id           = $dataarray['data']['recipient']['metadata']['promoter_id'];

                $trans_type		='complete_transafer';
                $desc			='Commission for Promoting Property';
                $status			='success';
                $this->Transaction_db->add_complete_transaction($promoter_id, $sender_id, $props_id, $trans_type, $amount, $ref, $desc, $status);
                $this->Wallet_db->fund_total_earning($promoter_id,$amount);

            }
            else if($type  == 'user_rc'){

                //update transaction status
               $this->Transaction_db->update_user_pull_out_success($sender_id,$props_id);
               $this->Wallet_db->update_user_wallet_pullout_success($sender_id,$props_id);
                
            }



        }
        else if($event == 'transfer.failed' && $status =='failed'){
            $sender_id          = $dataarray['data']['recipient']['metadata']['sender_id'];
            $reciever_id        = $dataarray['data']['recipient']['metadata']['agent_id'];
            $type               = $dataarray['data']['recipient']['metadata']['type'];
            $props_id           = $dataarray['data']['recipient']['metadata']['props_id'];

           

            if($type  == 'user_rc'){
                //user pulling out

                $this->Transaction_db->update_user_pull_out_failed($sender_id,$props_id,$amount);
                $this->Wallet_db->update_user_wallet_pullout_failed($sender_id,$props_id);
            }else{

                $this->Transaction_db->update_transaction_transfer_failed_2($sender_id,$props_id,$amount);
                $this->Wallet_db->update_wallet_transfer_failed($sender_id,$props_id);
            }
        }
        else if($event == 'transfer.reversed' && $status =='reversed'){
            $sender_id          = $dataarray['data']['recipient']['metadata']['sender_id'];
            $reciever_id        = $dataarray['data']['recipient']['metadata']['agent_id'];
            $type               = $dataarray['data']['recipient']['metadata']['type'];
            $props_id           = $dataarray['data']['recipient']['metadata']['props_id'];

            

            if($type  == 'user_rc'){
                //user pulling out

                $this->Transaction_db->update_user_pull_out_reversed($sender_id,$props_id,$amount);
                $this->Wallet_db->update_user_wallet_pullout_reversed($sender_id,$props_id);
            }else{

                $this->Transaction_db->update_transaction_transfer_failed_2($sender_id,$props_id,$amount);
                $this->Wallet_db->update_wallet_transfer_failed($sender_id,$props_id);
            }
        }
        
        $this->verifyWebhook($event,$hmac_header);
        
        http_response_code(200);
	}
	
	public function verifyWebhook($data, $hmac_header){
	    $secure_key   =$this->Action->get_private_live_key();
	    define('PAYSTACK_SECRET_KEY',$secure_key);
	    $calculated_hmac        = base64_encode(hash_hmac('sha256', $data, PAYSTACK_SECRET_KEY, true));
	    return hash_equals($hmac_header, $calculated_hmac);
	} 
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}