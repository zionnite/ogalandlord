<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends My_Controller {

	
	public function index(){
		$data['content'] ='front_end/index';
		$this->load->view($this->layout,$data);
	}

	public function view_user($dis_user_id=NULL){
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

        $data['dis_user_id']            =$dis_user_id;
		

		$data['content']                ='back_end/view_profile';
		$this->load->view($this->admin_layout,$data);
	}

	public function edit_detail(){
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


		$data['content']                ='back_end/edit_profile';
		$this->load->view($this->admin_layout,$data);
	}

    public function update_detail(){
        if($this->input->post('submit')){	
            $this->form_validation->set_rules('email','Email Address','required', array('required' => 'Your Email is Required'));
			$this->form_validation->set_rules('full_name','Full Name','required', array('required' => 'Your Full Name is Required'));
			$this->form_validation->set_rules('phone','Phone Number','required', array('required' => 'Your Phone Number is Required'));
			$this->form_validation->set_rules('age','Age','required', array('required' => 'Your Age is Required'));
			$this->form_validation->set_rules('sex','Sex','required', array('required' => 'Your Sex is Required'));
			$this->form_validation->set_rules('address','Address','required', array('required' => 'Your Address is Required'));

            $email                      =$this->input->post('email');
            $full_name                  =$this->input->post('full_name');
            $phone                      =$this->input->post('phone');
            $age                        =$this->input->post('age');
            $sex                        =$this->input->post('sex');
            $address                    =$this->input->post('address');

            $user_id                    =$this->session->userdata('user_id');

            if($this->form_validation->run() == FALSE){
                $this->failed_alert_callbark('An Error occurred, make sure you fill all filled!');

			}else{
                $action     = $this->Users_db->update_detail($user_id, $full_name, $email, $phone, $age, $sex, $address);
                if($action){

                    $this->success_alert_callbark('Updated...');

                }else{

                    $this->failed_alert_callbark('Database Busy, Could not perform operation, Pls Try enter New Value!');

                }
            }

        }else{
            $this->failed_alert_callbark('You need to click the submit button to continue');
        }

        redirect('Profile/edit_detail');
    }

	public function edit_bank_detail(){
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


		$data['content']                ='back_end/edit_bank_detail';
		$this->load->view($this->admin_layout,$data);
	}

    public function update_bank_detail(){
        if($this->input->post('submit')){	
            $this->form_validation->set_rules('bank_code','Bank Name','required', array('required' => 'Bank Name is Required'));
			$this->form_validation->set_rules('account_number','Account Number','required', array('required' => 'Your Account Number is Required'));
			$this->form_validation->set_rules('account_name','Account Name','required', array('required' => 'Your Account Name is Required'));
			

            $bank_code                      =$this->input->post('bank_code');
            $account_number                 =$this->input->post('account_number');
            $account_name                   =$this->input->post('account_name');
           
            $user_id                    =$this->session->userdata('user_id');

            if($this->form_validation->run() == FALSE){
                $this->failed_alert_callbark('An Error occurred, make sure you fill all filled!');

			}else{
                $action     = $this->Users_db->update_bank_detail($user_id, $account_name,$account_number,$bank_code);
                if($action){

                    $this->success_alert_callbark('Updated...');

                }else{

                    $this->failed_alert_callbark('Database Busy, Could not perform operation, Pls Try enter New Value!');

                }
            }

        }else{
            $this->failed_alert_callbark('You need to click the submit button to continue');
        }

        redirect('Profile/edit_bank_detail');
    }


    public function update_profile_pic(){
		$err_msgs	='';
		if($this->input->post('submit')){	
			$this->form_validation->set_rules('user_name','search term','required');
			$user_name         		=$this->session->userdata('user_name');
            $user_id         		=$this->session->userdata('user_id');
		
			if($this->form_validation->run() == FALSE){

                $this->failed_alert_callbark('Your session is not registered, please login');
                redirect('Profile/view_user/'.$user_id);
			}else{
				//create Dictory for user folder
				@mkdir('project_dir');
				@mkdir('project_dir/users');
				@mkdir('project_dir/users/'.$user_name);
				@mkdir('project_dir/users/'.$user_name.'/images');
				
				
				
				$config['upload_path'] = './project_dir/users/'.$user_name.'/images';
				$config['allowed_types'] = 'png|jpeg|jpg|gif';
				$config['max_size']= '';
				$config['max_width'] = '400';
				$config['max_height'] = '400';
				$config['min_width'] = '400';
				$config['min_height'] = '400';
				$config['overwrite'] = FALSE;
				$config['remove_spaces'] = TRUE;
				$config['encrypt_name'] = TRUE;

				$this->upload->initialize($config);
				$this->load->library('upload', $config);
				
				

				if(!$this->upload->do_upload()) {
					// If there is any error
					
                    $this->failed_alert_callbark('Error in Uploading Profile Pic '.br().$this->upload->display_errors());
				}else{
					/// In the end update video name in DB 
					$file_name	=$this->upload->data('file_name');
					$insert	=$this->Users_db->update_profile_pic($user_name,$file_name);
					if($insert	==TRUE){
						
                        $this->success_alert_callbark('Updated...');
					}else{
					
                        $this->failed_alert_callbark('Database Busy, Could not Update Profile Pic, Pls Try Again Later!');
					}
				}
				redirect('Profile/view_user/'.$user_id);
			}
		}else{
			
            $this->failed_alert_callbark('Please use the submit button to conintue');
            redirect('Profile/view_user/'.$user_id);
		}
	}

	public function update_password(){
		if($this->input->post('submit')){	
			$this->form_validation->set_rules('old','Password','required');
			$this->form_validation->set_rules('new','Password','required');

            $old	            	=$this->input->post('old');
            $new		        	=$this->input->post('new');
			
			if($this->form_validation->run() == FALSE){
				$data['alert']	='<div class="alert alert-danger" role="alert">All Field must be filled</div>';
				$this->session->set_flashdata('aalert',$data['alert']);
                redirect('ChangePassword');
			}else{
				$action             =$this->Admin_db->change_password($old,$new);
                if($action =='ok'){
                    $data['alert']	='<div class="alert alert-success" role="alert">Password Sucessfully Changed!</div>';
                    $this->session->set_flashdata('aalert',$data['alert']);
                    redirect('ChangePassword');
                }else{
                    $data['alert']	='<div class="alert alert-danger" role="alert">'.$action.'</div>';
                    $this->session->set_flashdata('aalert',$data['alert']);
                    redirect('ChangePassword');
                }

                

			}
		}else{
			$data['alert']	='<div class="alert alert-danger" role="alert">Please Use the button to Submit Question</div>';
			$this->session->set_flashdata('aalert',$data['alert']);
            redirect('ChangePassword');
		}
	}

	public function verify_bank_account($bank_code=NULL, $account_number = NULL){

		// $bank_code			=$this->input->post('bank_code');
		// $account_number		= $this->input->post('account_number');
		// echo $bank_code.br().$account_number;

		$user_id		=$this->session->userdata('user_id');
		$secure_key   =$this->Action->get_private_live_key();
		$curl = curl_init();

		$url	= "https://api.paystack.co/bank/resolve?account_number=$account_number&bank_code=$bank_code";
  
		curl_setopt_array($curl, array(
			CURLOPT_URL => $url,
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
			echo $err;
		} else {

			$v_status           = $result['status'];
            

			
			if($v_status){
				$v_data             = $result['data'];
				$v_account_name		= $v_data['account_name'];
				$v_account_number	= $v_data['account_number'];
				$action		= $this->Users_db->update_bank_verify_status($user_id);
				if($action){
					echo 'ok';
				}else{ 
					echo 'database';
				}
			}else{
				
				echo 'Could not verify bank account detail, pls try updating your bank details and come try again';
			}
		}


        
	}
}
