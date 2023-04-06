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
        $plan       = $dataarray['plan'];

        
        
        if($event == 'charge.success' && $status =='success'){
            if($plan == null){
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
            else if($plan != null){
                //update plans enteri
                //plan
                $plan_id            = $dataarray['data']['plan']['id'];
                $plan_code          = $dataarray['data']['plan']['plan_code'];
                $plan_name          = $dataarray['data']['plan']['name'];
                $plan_amount        = $dataarray['data']['plan']['amount'];
                $plan_interval      = $dataarray['data']['plan']['interval'];
                
                //customer
                $customer_code      = $dataarray['data']['customer']['customer_code'];
                $customer_email     = $dataarray['data']['customer']['email'];

                //authorization
                $auth_bin           = $dataarray['data']['authorization']['bin'];
                $auth_last4         = $dataarray['data']['authorization']['last4'];
                $auth_exp_month     = $dataarray['data']['authorization']['exp_month'];
                $auth_exp_year      = $dataarray['data']['authorization']['exp_year'];
                $auth_card_type     = $dataarray['data']['authorization']['card_type'];

                $this->Subscription_db->insert_subscription(
                    $plan_id, $plan_code, $plan_name, $plan_amount, $plan_interval,
                    $customer_code, $customer_email, 
                    $auth_bin, $auth_last4, $auth_exp_month, $auth_exp_year, $auth_card_type
                );
            }



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
        else if($event == 'transfer.failed' && $status =='failed' || $event == 'transfer.reversed' && $status =='reversed'){
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

        else if($event  == 'subscription.create' && $status == 'active'){
            //plan
            $plan_id            = $dataarray['data']['plan']['id'];
            $plan_code          = $dataarray['data']['plan']['plan_code'];
            $plan_name          = $dataarray['data']['plan']['name'];
            $plan_amount        = $dataarray['data']['plan']['amount'];
            $plan_interval      = $dataarray['data']['plan']['interval'];
            
            //customer
            $customer_code      = $dataarray['data']['customer']['customer_code'];
            $customer_email     = $dataarray['data']['customer']['email'];

            //authorization
            $auth_bin           = $dataarray['data']['authorization']['bin'];
            $auth_last4         = $dataarray['data']['authorization']['last4'];
            $auth_exp_month     = $dataarray['data']['authorization']['exp_month'];
            $auth_exp_year      = $dataarray['data']['authorization']['exp_year'];
            $auth_card_type     = $dataarray['data']['authorization']['card_type'];

            
            $subscription_code  = $dataarray['data']['subscription_code'];
            $email_token        = $dataarray['data']['email_token'];

            //update user detail with subscription_code, $authorization details
            $this->Subscription_db->update_subscriber_detail($customer_email, $subscription_code, $plan_code, $plan_interval, $email_token);

        }

        else if($event == 'subscription.disable' && $status    =='complete'){
            $plan_id            = $dataarray['data']['plan']['id'];
            $plan_code          = $dataarray['data']['plan']['plan_code'];
            $plan_name          = $dataarray['data']['plan']['name'];
            $plan_amount        = $dataarray['data']['plan']['amount'];
            $plan_interval      = $dataarray['data']['plan']['interval'];
            
            //customer
            $customer_code      = $dataarray['data']['customer']['customer_code'];
            $customer_email     = $dataarray['data']['customer']['email'];

            $subscription_code  = $dataarray['data']['subscription_code'];

            $this->Subscription_db->completed_subscriber($customer_code,$customer_email,$plan_id,$plan_code, $subscription_code);

            $message				='';
			$subject				= 'Subscription Completed';
			$get_site_name          = $this->Action->get_site_name();
			$message				.= 'Congratulation your Subscription has been marked completed';
			$is_agent				= 'no';

			$this->Alert_db->insert_into_alert_tbl($user_id,'OgaBliss',$message, $is_agent);
			$this->send_email($customer_email, $subject, $message, 'type_2', '','');
        }

        else if($event == 'subscription.not_renew' && $status    =='non-renewing'){
            $plan_id            = $dataarray['data']['plan']['id'];
            $plan_code          = $dataarray['data']['plan']['plan_code'];
            $plan_name          = $dataarray['data']['plan']['name'];
            $plan_amount        = $dataarray['data']['plan']['amount'];
            $plan_interval      = $dataarray['data']['plan']['interval'];
            
            //customer
            $customer_code      = $dataarray['data']['customer']['customer_code'];
            $customer_email     = $dataarray['data']['customer']['email'];

            $subscription_code  = $dataarray['data']['subscription_code'];
            $email_token        = $dataarray['data']['email_token'];

            $user_id           = $this->Users_db->get_user_id_by_email($customer_email);
            $this->Subscription_db->disable_sub($user_id, $plan_code, $subscription_code, $email_token);


            $message				='';
			$subject				= 'Subscription Disabled';
			$get_site_name          = $this->Action->get_site_name();
			$message				.= 'Your Subscription has been disabled and won\'t be renew';
			$is_agent				= 'no';

			$this->Alert_db->insert_into_alert_tbl($user_id,'OgaBliss',$message, $is_agent);
			$this->send_email($customer_email, $subject, $message, 'type_2', '','');
        }

        else if($event == 'subscription.expiring_cards'){
            $expiry_date            = $dataarray['data'][0]['expiry_date'];
            $description            = $dataarray['data'][0]['description'];
            $brand                  = $dataarray['data'][0]['brand'];
            $subscription_code      = $dataarray['data'][0]['subscription']['subscription_code'];
            $plan_id                = $dataarray['data'][0]['subscription']['plan']['id'];
            $plan_name              = $dataarray['data'][0]['subscription']['plan']['name'];
            $plan_code              = $dataarray['data'][0]['subscription']['plan']['plan_code'];
            $customer_email         = $dataarray['data'][0]['customer']['email'];
            $customer_code          = $dataarray['data'][0]['customer']['customer_code'];

            $user_id           = $this->Users_db->get_user_id_by_email($customer_email);


            $message				='';
			$subject				= 'Your Card is Expiring';
			$get_site_name          = $this->Action->get_site_name();
			$message				.= 'Update your Card, Your card with '.$description.' it\'s expiring';
			$is_agent				= 'no';

			$this->Alert_db->insert_into_alert_tbl($user_id,'OgaBliss',$message, $is_agent);
			$this->send_email($customer_email, $subject, $message, 'type_2', '','');
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