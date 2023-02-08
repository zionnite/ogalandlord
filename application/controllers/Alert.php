<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alert extends My_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
        $data['alert']			=$this->session->flashdata('alert');

    
		$data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
		$data['phone_no']         		=$this->session->userdata('phone_no');
		$data['user_img']         		=$this->session->userdata('user_img');
		$data['sex']         			=$this->session->userdata('sex');
		$data['age']         			=$this->session->userdata('age');
		$data['email']         			=$this->session->userdata('email');
		$data['full_name']         		=$this->session->userdata('full_name');
		$data['user_status']         		=$this->session->userdata('status');

        $data['get_request']    =$this->Alert_db->get_alert_by_user_id($data['user_id']);

		$data['content']        ='back_end/view_alert';
		$this->load->view($this->admin_layout,$data);
	}

    public function mark_alert_as_read($id=NULL){
        $action		= $this->Alert_db->update_read_status($id);
		if($action){
			$this->success_alert_callbark('Marked..');
		}else{
			$this->failed_alert_callbark('Database Busy, Could not perform operation, Pls Try Again Later!');
		}
		redirect('Alert');
    }

    public function delete_alert($id=NULL){
        $action		= $this->Alert_db->delete_alert($id);
		if($action){
			$this->success_alert_callbark('Deleted...');
		}else{
			$this->failed_alert_callbark('Database Busy, Could not perform operation, Pls Try Again Later!');
		}
		redirect('Alert');
    }

	public function test_charge_enpoint($sender_id=NULL,$reciever_id=NULL,$props_id=NULL,$type=NULL){
		$user_id	='1';
		$agent_id	='2';
		$props_id	='1';
		$amount		='5750';

			// $this->Wallet_db->update_wallet_charge_success($user_id,$agent_id,$props_id);
        	//     //update Transaction status
        	// $this->Transaction_db->update_transaction_charge_success($user_id,$agent_id,$props_id);
        	//     //update Wallet Balance
        	// $this->Wallet_db->fund_current_balance($user_id,$amount);


			/**Meta DATA */
        	//    
            // //update Sender transaction status to success && wallet
            // $this->Transaction_db->update_transaction_transfer_success($sender_id,$props_id,$amount);

            // //update Agent Details
            // if($type =='agent_rc'){

            //     $trans_type		='complete_transafer';
            //     $desc			='Payment for Property';
            //     $status			='success';
			// 	$ref			="no reference";
            //     $this->Transaction_db->add_complete_transaction($reciever_id, $sender_id, $props_id, $trans_type, $amount, $ref, $desc, $status);
            //     $this->Wallet_db->fund_total_earning($reciever_id,$amount);
            // }
            // else if($type =='insur_rc'){

            //     $trans_type		='deposit';
            //     $desc			='commission for Insurance';
            //     $status			='success';
            //     $reference      ='no reference';
            //     $this->Transaction_db->add_site_transaction('admin', $sender_id, $props_id, $trans_type, $amount, $reference, $desc, $status);
            //     $this->Wallet_db->fund_insurance_earning($amount);

            //     // $trans_type		='deposit';
            //     // $desc			='commission for Using the Platform';
            //     // $status			='success';
            //     // $reference      ='no reference';
            //     // $this->Transaction_db->add_site_transaction('admin', $sender_id, $props_id, $trans_type, $amount, $reference, $desc, $status);
            //     // $this->Wallet_db->fund_site_balance($amount);
            // }
            // else if($type =='ref_rc'){

            //     $referal_id           = 5;

            //     $trans_type		='complete_transafer';
            //     $desc			='Payment for Property';
            //     $status			='success';
			// 	$ref	        ='no reference';
            //     $this->Transaction_db->add_complete_transaction($referal_id, $sender_id, $props_id, $trans_type, $amount, $ref, $desc, $status);
            //     $this->Wallet_db->fund_total_earning($referal_id,$amount);

            // }else if($type  == 'user_rc'){

            //     //update transaction status
            //    $this->Transaction_db->update_user_pull_out_success($sender_id,$sender_id,$props_id);
                
            // }


		 $this->Transaction_db->update_transaction_transfer_failed($sender_id,$props_id,$amount);            
		 if($type  == 'user_rc'){
            $this->Transaction_db->update_user_pull_out_failed($sender_id,$props_id,$amount);
        }
        //remove from site earning
        $this->Wallet_db->add_to_site_earning($sender_id,$reciever_id,$props_id);





	}

    public function d_send_email(){
        $email  ='zionnite555@gmail.com';
        $user_id        = $this->Users_db->get_user_id_by_email($email);
        $data['title']  ='Confirm Account';
        $data['msg']    ='click on this link to verify account';
        $data['type']   ='type_1';
        $data['link']   = 'http://www.ogabliss.com/login/verify_me/' . $user_id;
        $data['message']    ='love is the greates';

        // $this->send_email($email,$title,$msg,$type,$link);

        $this->load->view($this->email_layout_2, $data);
    }
}
