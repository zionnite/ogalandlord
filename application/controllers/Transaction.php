<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends My_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$this->session_checker->my_session();
        $this->chat_online_tracker->check();
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

        $offset	=$this->uri->segment(3);
		$total	=$this->Transaction_db->count_transaction($data['user_id']);
		$config['base_url'] = base_url().'Transaction/index';
		$config['total_rows'] =$total;
		$config['per_page'] = 4;
		$config['first_link'] = '<li>First</li>';
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = false;
		$config['last_link'] = false;
		$config['first_tag_open'] = '<li class="page-link">';
		$config['first_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li class="page-link">';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li class="page-link">';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li class="page-link">';
		$config['num_tag_close'] = '</li>';
		$config['prev_link'] = '&laquo';
		$config['next_link'] = '&raquo';
		$config['prev_tag_open'] = '<li class="page-link">';
		$config['prev_tag_close'] = '</li>';
		$this->pagination->initialize($config);
		$this->pagination->cur_page = $offset;
		$data['pagination']	=$this->pagination->create_links();
		$data['per_page']	=$config['per_page'];
		$data['offset']		=$offset;
        $data['total']	=$total;

        $data['get_transaction']    =$this->Transaction_db->get_all_transaction($data['user_id'],$data['offset'],$data['per_page']);
        

		$data['content']        ='back_end/view_transaction';
		$this->load->view($this->admin_layout,$data);
	}

    public function mark_request_as_read($id=NULL){
        $action		= $this->Request_db->update_read_status($id);
		if($action){
			$this->success_alert_callbark('Marked..');
		}else{
			$this->failed_alert_callbark('Database Busy, Could not perform operation, Pls Try Again Later!');
		}
		redirect('Request');
    }

	public function fund_wallet(){
		$this->session_checker->my_session();
        $this->chat_online_tracker->check();
        $data['alert']			=$this->session->flashdata('alert');

      
		$data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
		$data['phone_no']         		=$this->session->userdata('phone_no');
		$data['user_img']         		=$this->session->userdata('user_img');
		$data['sex']         			=$this->session->userdata('sex');
		$data['age']         			=$this->session->userdata('age');
		$data['email']         			=$this->session->userdata('email');
		$data['full_name']         		=$this->session->userdata('full_name');
		$data['user_status']         	=$this->session->userdata('status');


		$data['content']        ='back_end/fund_wallet';
		$this->load->view($this->admin_layout,$data);
	}


	public function get_props_amount_by_id(){

		$user_id					=$this->session->userdata('user_id');
		$get_agent_com        		= $this->Action->get_agent_com();

		$output		='';
		$props_id	=$this->input->post('props_id');

		//check if property already exist in wallet

		$props_amount            = $this->Admin_db->get_props_amount_by_id($props_id);
		$agent_id				 = $this->Admin_db->get_props_agent_id_by_props_id($props_id);

		if(!$this->Wallet_db->check_if_prop_id_exist($user_id,$props_id)){


			$commission		=  ($get_agent_com/100) * $props_amount;
			$value_amount	=	$props_amount.' +'.$get_agent_com.'% ('.$commission.')';
			$new_amount		=	$props_amount + $commission;
			$value_amount_2	=	'+'.$get_agent_com.'% Agent Fee';

			
			

			$output					 .='<input type="text" id="pay_amount" class="form-control" value="'.$value_amount.'">';
			$output					 .='<span style="color:red;">'.$value_amount_2.'</span>';
			$output					 .='<input type="hidden" id="props_id" value="'.$props_id.'">';
			$output					 .='<input type="hidden" id="agent_id" value="'.$agent_id.'">';
			$output					 .='<input type="hidden" id="amount" value="'.$new_amount.'" />';
		}else{

			$output					.='<h style="color:red;">You have already funded this property in your wallet, please select other property and fund it</h>';
		}
		echo $output;
	}


    public function verify_payment($ref){
        $secure_key   =$this->Action->get_private_live_key();
        $curl = curl_init();
  
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.paystack.co/transaction/verify/$ref",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer $secure_key",
            "Cache-Control: no-cache",
          ),
        ));
        
        $response = curl_exec($curl);
        $result  = json_decode($response, true);
        $result  = array_change_key_case($result, CASE_LOWER);

        $err = curl_error($curl);
        curl_close($curl);
        
        if ($err) {
            $data['alert']	='<div class="alert alert-warning" role="alert"><strong>Success:</strong>Oops!! An Error occur while trying to verify your payment</div>';
            $this->session->set_flashdata('main_alert',$data['alert']);

			$this->failed_alert_callbark('An Error occur while trying to verify your payment');
        } else {
        //   echo print_r($result);

            $v_status           = $result['status'];
            $v_data             = $result['data'];

            if($v_status == true){
                $v_id               = $v_data['id'];
                $v_amount           = $v_data['amount'];
                $v_ref              = $v_data['reference'];
                $v_meta             = $v_data['metadata'];

                $v_user_id              =$v_meta['user_id'];
                $v_props_id             =$v_meta['props_id'];
                $v_agent_id             =$v_meta['agent_id'];
                $v_trans_type             =$v_meta['trans_type'];
                
                // echo $v_user_id               =$v_meta['user_id'].br();
                // echo $v_plan_id               =$v_meta['plan_id'].br();
                // echo $v_plan_type             =$v_meta['plan_type'].br();
                // echo $v_plan_mode             =$v_meta['plan_mode'].br();


                $v_customer         = $v_data['customer'];
                $v_phone            = $v_customer['phone'];
                $v_email            = $v_customer['email'];
                $v_name             = $v_customer['first_name'];


				$desc				="Deposit Transaction";
				$status				="pending";
				


                // $action             =$this->Admin_db->select_plan($v_user_id,$v_plan_id,$v_name,$v_phone,$v_email,$v_amount,$v_ref,$v_id,$v_plan_type,$v_plan_mode);
                $action             =$this->Transaction_db->add_transaction($v_user_id, $v_user_id, $v_props_id,$v_agent_id,$v_trans_type, $v_phone,
																  $v_email, $v_name, $v_id, $v_amount, $v_ref, $desc, $status);
                if($action == true){
					
					$this->Wallet_db->add_wallet($v_user_id,$v_agent_id,$v_props_id,$v_amount);
					$this->Transaction_db->create_trans_rec($v_user_id,$v_props_id,$v_agent_id);
					$this->create_transfer_reciept($v_user_id,$v_props_id,$v_agent_id);

					$this->success_alert_callbark('Your Transfer was succefful');
                    redirect('Wallet');
                }else{
                    $data['alert']	='<div class="alert alert-warning" role="alert"><strong>Success:</strong>Oops!! Your Transaction was successful but we can\'t verify your payment </div>';
                    $this->session->set_flashdata('main_alert',$data['alert']);

					$this->failed_alert_callbark('Your Transaction was successful but we can\'t verify your payment');
                    redirect('Wallet');
                }
            }else{
                $data['alert']	='<div class="alert alert-warning" role="alert"><strong>Success:</strong>Oops!! Could not verify your transaction </div>';
                $this->session->set_flashdata('main_alert',$data['alert']);

				$this->failed_alert_callbark(' Could not verify your transaction');
                redirect('Wallet');
            }
        }

		redirect('Wallet');
    }

	public function create_transfer_reciept($user_id, $props_id, $agent_id){

		// $user_id 		=$this->session->userdata('user_id');
		$secure_key   =$this->Action->get_private_live_key();

		$url = "https://api.paystack.co/transferrecipient/bulk";

		//get my bank code, name, account number
		$my_bank_code			=$this->Users_db->get_user_bank_code($user_id);
		$my_bank_name			=$this->Users_db->get_user_bank_name($user_id);
		$my_account_num			=$this->Users_db->get_user_account_num($user_id);
		$my_account_name		=$this->Users_db->get_user_account_name($user_id);

		//get agent bank code, name, account number
		$agent_bank_code			=$this->Users_db->get_user_bank_code($agent_id);
		$agent_bank_name			=$this->Users_db->get_user_bank_name($agent_id);
		$agent_account_num			=$this->Users_db->get_user_account_num($agent_id);
		$agent_account_name			=$this->Users_db->get_user_account_name($agent_id);

		//get insurance bank code, name, account number
		$insurance_bank_code		=$this->Action->get_insurance_bank_code();
		$insurance_bank_name		=$this->Action->get_insurance_bank_name();
		$insurance_account_number	=$this->Action->get_insurance_account_number();
		$insurance_account_name	=$this->Action->get_insurance_account_name();

		
		//get agent bank code, name, account number
		$check_if_user_was_refered 	=$this->Users_db->checkIfReferred($user_id);
		
		if($check_if_user_was_refered){
			$referal_id 					=$this->Users_db->get_referral_id($user_id);
			$referal_bank_code				=$this->Users_db->get_user_bank_code($referal_id);
			$referal_bank_name				=$this->Users_db->get_user_bank_name($referal_id);
			$referal_account_num			=$this->Users_db->get_user_account_num($referal_id);
			$referal_account_name			=$this->Users_db->get_user_account_name($referal_id);

			if($referal_id	!= $agent_id){

				$fields =array(
					"batch"	=>array(
						array("type" => "nuban",
							"name" => $my_account_name,
							"account_number" => $my_account_num,
							"bank_code" => $my_bank_code,
							"currency" => "NGN",
							"metadata" => array(
								"props_id" => $props_id,
								"sender_id"	=> $user_id,
								"type"		=>"user_rc",
								"agent_id"	=> $agent_id
							)
						),

						array("type" => "nuban",
							"name" => $agent_account_name,
							"account_number" => $agent_account_num,
							"bank_code" => $agent_bank_code,
							"currency" => "NGN",
							"metadata" => array(
								"props_id" => $props_id,
								"sender_id"	=> $user_id,
								"type"		=>"agent_rc",
								"agent_id"	=> $agent_id
							)
						),

						array("type" => "nuban",
							"name" => $insurance_account_name,
							"account_number" => $insurance_account_number,
							"bank_code" => $insurance_bank_code,
							"currency" => "NGN",
							"metadata" => array(
								"props_id" => $props_id,
								"sender_id"	=> $user_id,
								"type"		=>"insur_rc",
								"agent_id"	=> $agent_id
							)
						),

						array("type" => "nuban",
							"name" => $referal_bank_code,
							"account_number" => $referal_account_num,
							"bank_code" => $referal_bank_code,
							"currency" => "NGN",
							"metadata" => array(
								"props_id" => $props_id,
								"sender_id"	=> $user_id,
								"type"		=>"ref_rc",
								"agent_id"	=> $agent_id,
								'referal_id'	=>$referal_id,
							)
						)
					)
				);
				
			}else{

				$fields =array(
					"batch"	=>array(
						array("type" => "nuban",
							"name" => $my_account_name,
							"account_number" => $my_account_num,
							"bank_code" => $my_bank_code,
							"currency" => "NGN",
							"metadata" => array(
								"props_id" => $props_id,
								"sender_id"	=> $user_id,
								"type"		=>"user_rc",
								"agent_id"	=> $agent_id
							)
						),

						array("type" => "nuban",
							"name" => $agent_account_name,
							"account_number" => $agent_account_num,
							"bank_code" => $agent_bank_code,
							"currency" => "NGN",
							"metadata" => array(
								"props_id" => $props_id,
								"sender_id"	=> $user_id,
								"type"		=>"agent_rc",
								"agent_id"	=> $agent_id
							)
						),

						array("type" => "nuban",
							"name" => $insurance_account_name,
							"account_number" => $insurance_account_number,
							"bank_code" => $insurance_bank_code,
							"currency" => "NGN",
							"metadata" => array(
								"props_id" => $props_id,
								"sender_id"	=> $user_id,
								"type"		=>"insur_rc",
								"agent_id"	=> $agent_id
							)
						)
					)
				);
			}

			
		}else{

			$fields =array(
				"batch"	=>array(
					array("type" => "nuban",
						"name" => $my_account_name,
						"account_number" => $my_account_num,
						"bank_code" => $my_bank_code,
						"currency" => "NGN",
						"metadata" => array(
							"props_id" => $props_id,
							"sender_id"	=> $user_id,
							"type"		=>"user_rc",
							"agent_id"	=> $agent_id
						)
					),

					array("type" => "nuban",
						"name" => $agent_account_name,
						"account_number" => $agent_account_num,
						"bank_code" => $agent_bank_code,
						"currency" => "NGN",
						"metadata" => array(
							"props_id" => $props_id,
							"sender_id"	=> $user_id,
							"type"		=>"agent_rc",
							"agent_id"	=> $agent_id
						)
					),

					array("type" => "nuban",
						"name" => $insurance_account_name,
						"account_number" => $insurance_account_number,
						"bank_code" => $insurance_bank_code,
						"currency" => "NGN",
						"metadata" => array(
							"props_id" => $props_id,
							"sender_id"	=> $user_id,
							"type"		=>"insur_rc",
							"agent_id"	=> $agent_id
						)
					)
				)
			);
				
				
		}


		$fields_string = http_build_query($fields);

		//open connection
		$ch = curl_init();
		
		//set the url, number of POST vars, POST data
		curl_setopt($ch,CURLOPT_URL, $url);
		curl_setopt($ch,CURLOPT_POST, true);
		curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			"Authorization: Bearer $secure_key",
			"Cache-Control: no-cache",
		));
		
		//So that curl_exec returns the contents of the cURL; rather than echoing it
		curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
		
		//execute post
		$response = curl_exec($ch);

		
		// print_r($fields);
		$result  = json_decode($response, true);
        $result  = array_change_key_case($result, CASE_LOWER);
		// echo $response;

		$status		=$result['status'];
		if($status){
			
			$error			=$result['data']['errors'];

			if($error == null){

				$success		=$result['data']['success'];

				for($i=0; $i<count($success); $i++){
					$rc_code				= $success[$i]['recipient_code'];
					$account_Number			= $success[$i]['details']['account_number'];
					$props_id				= $success[$i]['metadata']['props_id'];
					$sender_id				= $success[$i]['metadata']['sender_id'];
					$type					= $success[$i]['metadata']['type'];
					$agent_id				= $success[$i]['metadata']['agent_id'];

					$this->Transaction_db->add_to_transaction_rec($rc_code,$props_id,$sender_id,$type,$agent_id);
				}
			}
		}
		
	}


	public function make_payment($props_id =NULL,$agent_id =NULL, $user_id=NULL){
		$props_name	=$this->Admin_db->get_props_name_by_id($props_id);
		$isPay 		=$this->Wallet_db->check_if_isPay($user_id,$props_id,$agent_id);
		
		if(!$isPay){
		$site_name					= $this->Action->get_site_name();
		// $user_id 					=$this->session->userdata('user_id');
		$secure_key   				=$this->Action->get_private_live_key();

		//commissions
		$get_referal_com        	= $this->Action->get_referal_com();
		$get_office_com        		= $this->Action->get_agent_com();
		$get_insurance_com        	= $this->Action->get_insurance_com();

		//total_amount
		$wallet_total_amount			= $this->Wallet_db->get_this_wallet_prop_amount($props_id,$agent_id,$user_id);
		// $office_perc 	 			=($get_office_com/100) * $total_amount;
		// $new_total_amount			= $total_amount - $office_perc;	

		
		$total_amount            	= $this->Admin_db->get_props_amount_by_id($props_id);
		$office_perc			 	= ($get_office_com/100) * $total_amount;

		//inssurance percent
		$insurance_perc				= ($get_insurance_com/100) * $office_perc;

		//referal Percent
		$referal_perc 				= ($get_referal_com/100) * $office_perc;
		

		$url = "https://api.paystack.co/transfer/bulk";


		//get my bank code, name, account number
		$my_bank_code			=$this->Users_db->get_user_bank_code($user_id);
		$my_bank_name			=$this->Users_db->get_user_bank_name($user_id);
		$my_account_num			=$this->Users_db->get_user_account_num($user_id);
		$my_account_name		=$this->Users_db->get_user_account_name($user_id);
		$my_rec					=$this->Transaction_db->get_sender_rc($user_id,$agent_id,$props_id);
		$my_ref					=random_string('numeric', 16);

		//get agent bank code, name, account number
		$agent_bank_code			=$this->Users_db->get_user_bank_code($agent_id);
		$agent_bank_name			=$this->Users_db->get_user_bank_name($agent_id);
		$agent_account_num			=$this->Users_db->get_user_account_num($agent_id);
		$agent_account_name			=$this->Users_db->get_user_account_name($agent_id);
		$agent_rec					=$this->Transaction_db->get_agent_rc($user_id,$agent_id,$props_id);
		$agent_amount				=(int)$total_amount*100;
		$agent_ref					=random_string('numeric', 16);


		//get insurance bank code, name, account number
		$insurance_bank_code		=$this->Action->get_insurance_bank_code();
		$insurance_bank_name		=$this->Action->get_insurance_bank_name();
		$insurance_account_number	=$this->Action->get_insurance_account_number();
		$insurance_account_name		=$this->Action->get_insurance_account_name();
		$insurance_rec				=$this->Transaction_db->get_insurance_rc($user_id,$agent_id,$props_id);
		$insurance_amount			=(int)$insurance_perc*100;
		$insurance_ref				=random_string('numeric', 16);


		
		//get agent bank code, name, account number
		$check_if_user_was_refered 	=$this->Users_db->checkIfReferred($user_id);
		
		if($check_if_user_was_refered){
			$referal_id 					=$this->Users_db->get_referral_id($user_id);
			$referal_bank_code				=$this->Users_db->get_user_bank_code($referal_id);
			$referal_bank_name				=$this->Users_db->get_user_bank_name($referal_id);
			$referal_account_num			=$this->Users_db->get_user_account_num($referal_id);
			$referal_account_name			=$this->Users_db->get_user_account_name($referal_id);
			$ref_rec						=$this->Transaction_db->get_ref_rc($user_id,$agent_id,$props_id);
			$ref_amount						=(int)$referal_perc*100;
			$referal_ref					=random_string('numeric', 16);

			if($referal_id	!= $agent_id){
				$fields	= array(
					'currency' 	=> "NGN",
					'source' 	=> "balance",
					'transfers' =>array(
						//agent
						array(
							'amount' => $agent_amount,
							'reason' => "Payment for Property via ".$site_name,
							'recipient' => $agent_rec,
							'reference'	=> $agent_ref
						),

						//insurance
						
						array(
							'amount' => $insurance_amount,
							'reason' => "Payment Commission for property shopping via ".$site_name,
							'recipient' => $insurance_rec,
							'reference'	=> $insurance_ref
						),

						//referal
						array(
							'amount' => $ref_amount,
							'reason' => "Referral Commision from ".$site_name,
							'recipient' => $ref_rec,
							'reference'	=> $referal_ref
						),
					),
				);
			}else{

				$new_agent_amount	= $agent_amount + $ref_amount;

					$fields	= array(
					'currency' 	=> "NGN",
					'source' 	=> "balance",
					'transfers' =>array(
						//agent
						array(
							'amount' => $new_agent_amount,
							'reason' => "Payment for Property via ".$site_name." along with Referal Commision of ". $ref_amount." NGN",
							'recipient' => $agent_rec,
							'reference'	=> $agent_ref
						),

						//insurance
						
						array(
							'amount' => $insurance_amount,
							'reason' => "Payment Commission for property shopping via ".$site_name,
							'recipient' => $insurance_rec,
							'reference'	=> $insurance_ref
						),

					),
				);
			}

			
		}else{

			$fields	= array(
				'currency' 	=> "NGN",
				'source' 	=> "balance",
				'transfers' =>array(
					//agent
					array(
						'amount' => $agent_amount,
						'reason' => "Payment for Property via ".$site_name,
						'recipient' => $agent_rec,
						'reference'	=> $agent_ref
					),

					//insurance
					
					array(
						'amount' => $insurance_amount,
						'reason' => "Payment Commission for property shopping via ".$site_name,
						'recipient' => $insurance_rec,
						'reference'	=> $insurance_ref
					),
				),
			);
		}


		$fields_string = http_build_query($fields);

		//open connection
		$ch = curl_init();
		
		//set the url, number of POST vars, POST data
		curl_setopt($ch,CURLOPT_URL, $url);
		curl_setopt($ch,CURLOPT_POST, true);
		curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			"Authorization: Bearer $secure_key",
			"Cache-Control: no-cache",
		));
		
		//So that curl_exec returns the contents of the cURL; rather than echoing it
		curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
		
		//execute post
		$response = curl_exec($ch);

		
		// print_r($fields);
		$result  = json_decode($response, true);
        $result  = array_change_key_case($result, CASE_LOWER);
		// echo $response;

		$status		=$result['status'];
		if($status){
			//echo 'ok'; //transfer added to queei
			$trans_type		='complete_withdraw';
			$desc			='Payment for Property';
			$status			='pending';
			$this->Transaction_db->add_complete_transaction($user_id, $user_id, $props_id, $trans_type, $total_amount, $agent_ref, $desc, $status);
			$this->Wallet_db->fund_current_balance($user_id,-$wallet_total_amount);
			$this->Wallet_db->update_wallet_isPay_status($user_id,$props_id,$agent_id);
			// $this->success_alert_callbark('Transfer succesful, transaction has been added to queue!');
			// redirect('Wallet');
			echo 'ok';
			
		}else{
			
			//echo 'no_ok'; // could not carryout transfer
			// $this->failed_alert_callbark('Transaction failed, could not carryout transfer,please try again later!');
			// redirect('Message/quick_msg');

			echo 'not_ok';
		}
		}else{
			echo 'You have already intitated a Payment Settlement with this Agent of this Property ('.$props_name.') Agent';
		}

		
	}

	public function pull_out_payment($props_id =NULL,$agent_id =NULL, $user_id=NULL){
		//if already made payment
		$props_name	=$this->Admin_db->get_props_name_by_id($props_id);


		$isPay 		=$this->Wallet_db->check_if_isPay($user_id,$props_id,$agent_id);
		
		if(!$isPay){

			$isRquested	=$this->Wallet_db->check_if_isRequested($user_id,$props_id,$agent_id);
			if(!$isRquested){
			//check ammount



				$site_name					= $this->Action->get_site_name();
				// $user_id 					=$this->session->userdata('user_id');
				$secure_key   				=$this->Action->get_private_live_key();

				//commissions
				$get_referal_com        	= $this->Action->get_referal_com();
				$get_office_com        		= $this->Action->get_agent_com();
				$get_insurance_com        	= $this->Action->get_insurance_com();

				//total_amount
				$total_amount				= $this->Wallet_db->get_this_wallet_prop_amount($props_id,$agent_id,$user_id);
				$office_perc 	 			=($get_office_com/100) * $total_amount;
				$new_total_amount			= $total_amount - $office_perc;	

				//inssurance percent
				$insurance_perc				= ($get_insurance_com/100) * $office_perc;

				//referal Percent
				$referal_perc 				= ($get_referal_com/100) * $office_perc;
				

				$url = "https://api.paystack.co/transfer/";


				//get my bank code, name, account number
				$my_bank_code			=$this->Users_db->get_user_bank_code($user_id);
				$my_bank_name			=$this->Users_db->get_user_bank_name($user_id);
				$my_account_num			=$this->Users_db->get_user_account_num($user_id);
				$my_account_name		=$this->Users_db->get_user_account_name($user_id);
				$my_rec					=$this->Transaction_db->get_sender_rc($user_id,$agent_id,$props_id);
				$my_amount				=(int)$total_amount*100;
				$my_ref					=random_string('numeric', 16);

				$fields = [
					"source" 		=> "balance", 
					"currency"		=> "NGN",
					"reason" 		=> "Pull Out From ".$site_name, 
					"amount"	 	=> $my_amount, 
					"recipient" 	=> $my_rec,
					"reference" 	=> $my_ref
				];

				$fields_string = http_build_query($fields);

				//open connection
				$ch = curl_init();
				
				//set the url, number of POST vars, POST data
				curl_setopt($ch,CURLOPT_URL, $url);
				curl_setopt($ch,CURLOPT_POST, true);
				curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
				curl_setopt($ch, CURLOPT_HTTPHEADER, array(
					"Authorization: Bearer $secure_key",
					"Cache-Control: no-cache",
				));
				
				//So that curl_exec returns the contents of the cURL; rather than echoing it
				curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
				
				//execute post
				$response = curl_exec($ch);

				
				// print_r($response);
				$result  = json_decode($response, true);
				$result  = array_change_key_case($result, CASE_LOWER);
				// echo $response;

				$status		=$result['status'];
				if($status){
					$trans_type		='withdraw';
					$desc			="Pull Out From ".$site_name;
					$status			='pending';
					$this->Transaction_db->add_complete_transaction($user_id, $user_id, $props_id, $trans_type, $total_amount, $my_ref, $desc, $status);
					$this->Wallet_db->fund_current_balance($user_id,-$total_amount);
					$this->Wallet_db->update_wallet_isRequested_status($user_id,$props_id,$agent_id);

					echo 'ok'; //transfer added to queei
					// $this->success_alert_callbark('Pull Out successful, transfer has been added to queue!');

					
				}else{
					echo 'not_ok'; // could not carryout transfer
					// $this->failed_alert_callbark('Transaction failed, could not carryout pull-out transfer,please try again later!');
				}
			}else{
				echo 'You have already requested for  a Pull-Out, please be Patient';
			}
		}else{
			echo 'You have already intitated a Payment Settlement with this Agent of this Property ('.$props_name.') Agent';
		}



		// redirect('Wallet');
	}



}
