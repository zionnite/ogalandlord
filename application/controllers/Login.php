<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends My_Controller {

	
	public function index(){
        $data['alert']			=$this->session->flashdata('alert');
		$data['content'] ='auth/signin';
		$this->load->view($this->auth_layout,$data);
	}
	



    public function auth(){
        if($this->input->post('login')){	

			$this->form_validation->set_rules('email','Email Address','required', array('required' => 'Your Email is Required'));
			$this->form_validation->set_rules('pass','Password','required', array('required' => 'Your Password is Required'));




			$email               		=$this->input->post('email');
			$pass               		=$this->input->post('pass');
	    
			if($this->form_validation->run() == FALSE){
                $this->failed_alert_callbark('An Error occurred, make sure you fill all filled!');

        		redirect('Login/index');
			}else{

                
                if(!$this->Users_db->is_ban($email)){
                    if($this->Users_db->check_if_user_verify($email)){
                        $action     =$this->Users_db->loing_user($email,$pass);
                        if($action){
                            $this->success_alert_callbark('Welcome....');

                            $data['user_id']         		=$this->session->userdata('user_id');
                            $data['status']         		=$this->session->userdata('status');
                            
                            if($data['status'] =='user'){

                                redirect('Dashboard/index');
                            }else if($data['status'] =='agent' || $data['status'] == 'landlord'){

                                redirect('Dashboard/index');
                            }else{

                                redirect('Dashboard/index');
                            }
                            
                        }else{
                            $this->failed_alert_callbark('It seem that you entered in wrong value, your email or password might be wrong!');
                            redirect('Login/index');
                        }
                    }else{
                        $this->failed_alert_callbark('You have not yet verified your account,please check your inbox or spam (junk) folder');
                        redirect('Login/index');
                    }
                }else{
                    $this->failed_alert_callbark('You violated one of the rules of this platform as a result you have be BANNED from the system. <br/> <br />Contact Site Admin if you feel this was a mistake');
                    redirect('Login/index');
                }
            }
        }else{
            $this->failed_alert_callbark('Database Busy, Could not perform operation, Pls Try Again Later!');
            redirect('Login/index');
        }
        

    }

    public function forget_password(){
        $data['alert']			=$this->session->flashdata('alert');
		$data['content'] ='auth/forget_password';
		$this->load->view($this->auth_layout,$data);
	}


    public function forget_password2(){
        if($this->input->post('login')){	

			$this->form_validation->set_rules('email','Email Address','required', array('required' => 'Your Email is Required'));
			$email               		=$this->input->post('email');
	    
			if($this->form_validation->run() == FALSE){
                $this->failed_alert_callbark('An Error occurred, make sure you fill all filled!');
        		redirect('Login/forget_password');
			}else{

                
                

                if ($this->check_if_email_exist_request_password_tbl($email) == FALSE) {
                    $action     =$this->Users_db->email_to_all_detail($email);
                    if($action == false){
                        $this->failed_alert_callbark('Sorry, This User Don\'t exist in our database');
                        redirect('Login/forget_password');
                    }else{

                        $get_site_name          = $this->Action->get_site_name();
                        $get_site_g_name        = $this->Action->get_site_g_name();
                        $get_site_g_pass        = $this->Action->get_site_g_pass();


                        foreach ($action as $row) {
                                $user_id        = $row['id'];
                                $full_name	      = $row['full_name'];
                               

                              
                                $link           = $_SERVER['SERVER_NAME'].'/Login/confirm_reset_password/' . $user_id;


                                /*==========================SEND EMAIL TO RESET PASSWORD==================*/
                                $message    = 'Hello, ' . $full_name . ' You Requested to reset your Password, Click the Link or Copy it ' . $link . '  if this is not you, please Kindly Ignore';
                                $subject    = $get_site_name . ' | Confirm Password Reset';
                                $to         = $email;



                                $this->load->library('email');
                                $config = array(
                                    'protocol' => 'ssmtp',
                                    'smtp_host'    => 'ssl://ssmtp.googlemail.com',
                                    'smtp_port'    => '465',
                                    'smtp_timeout' => '7',
                                    'smtp_user'    => $get_site_g_name,
                                    'smtp_pass'    => $get_site_g_pass,
                                    'charset'    => 'utf-8',
                                    'newline'    => "\r\n",
                                    'mailtype' => 'html', // or html
                                    'validation' => FALSE
                                ); // bool whether to validate email or not      

                                $this->email->set_mailtype("html");
                                $this->load->initialize($config);


                                $current_domain 		= $_SERVER['SERVER_NAME'];
                                $this->email->from('info@' . $current_domain, $get_site_name);
                                $this->email->to($to);


                                $this->email->subject($subject);

                                $data['title']			='Password Reset';
                                $data['message']		=$message;
                                $data['link']			=$link;
                                $data['link_title']		='Confirm Password Reset';
                                $body   =$this->load->view($this->email_layout,$data,TRUE);
                                $this->email->message($body);   

                                if ($this->email->send()) {
                                    
                                    $this->Users_db->request_password($email);
                                    $this->success_alert_callbark('An Email has been Sent to ' . $email);
                                    redirect('Login/forget_password');

                                } else {
                                    
                                    $this->warning_alert_callbark('Email not Responding...');
                                    redirect('Login/forget_password');
                                }
                        }
                    }
                }else{
                    $this->failed_alert_callbark('You Have already Requested for Password Reset');
                    redirect('Login/forget_password');
                }
            }
        }else{
            $this->failed_alert_callbark('Database Busy, Could not perform operation, Pls Try Again Later!');
            redirect('Login/forget_password');
        }
    }


	public function confirm_reset_password($user_name = NULL){
	

		$data['reset_password'] = $this->Users_db->getRestPassword_Permission($user_name);
        if($data['reset_password'] != TRUE){
            $this->failed_alert_callbark('Oops! You did not request for password Reset');
            redirect('Login/forget_password');

        }

		$data['alert']			=	$this->session->flashdata('alert');
		$data['content']		=	'auth/confirm_reset_password';
		$data['user_id']  		= 	$user_name;
		$this->load->view($this->auth_layout, $data);
	}

	
	public function confirm_reset_password2(){
		if ($this->input->post('login')) {
			$this->form_validation->set_rules('pass', 'Password', array('required', 'min_length[5]', 'max_length[12]', 'alpha_numeric'));
			$this->form_validation->set_rules(
				'repass',
				'Confirm Password',
				array('required', 'matches[pass]', 'min_length[5]', 'max_length[12]', 'alpha_numeric')
			);

			$pass	= $this->input->post('pass');
			$user_name      = $this->input->post('user_id');

			if ($this->form_validation->run() == FALSE) {

                $this->failed_alert_callbark('Password not Filled or Password does not match');
				redirect('Login/confirm_reset_password/' . $user_name);

			} else {
				$login	= $this->Users_db->confirm_reset_password($pass, $user_name);
				if ($login	== FALSE) {
					
                    $this->failed_alert_callbark('Try Another Password Or come Back Late');
					redirect('Login/confirm_reset_password/' . $user_name);
				} else {

					$get_site_name          = $this->Action->get_site_name();
					$get_site_g_name        = $this->Action->get_site_g_name();
					$get_site_g_pass        = $this->Action->get_site_g_pass();

					$email      = $this->Users_db->get_email_by_id($user_name);
					/*==========================SEND EMAIL TO RESET PASSWORD==================*/
					

					$full_name 		= $this->Users_db->get_user_full_name_by_id($user_name);

					$message    = 'Hello ' . $full_name . ', You Password has been Reset successfully';
					$subject    = $get_site_name.' | Password Change';
					$to         = $email;
					$this->load->library('email');
					$config = array(
						'protocol' => 'ssmtp',
						'smtp_host'    => 'ssl://ssmtp.googlemail.com',
						'smtp_port'    => '465',
						'smtp_timeout' => '7',
						'smtp_user'    => $get_site_g_name,
						'smtp_pass'    => $get_site_g_pass,
						'charset'    => 'utf-8',
						'newline'    => "\r\n",
						'mailtype' => 'html', // or html
						'validation' => FALSE
					); // bool whether to validate email or not      

					$this->email->set_mailtype("html");
					$this->load->initialize($config);


					$current_domain 		= $_SERVER['SERVER_NAME'];
					$this->email->from('info@'.$current_domain, $get_site_name);
					$this->email->to($to);


					$this->email->subject($subject);

					$data['title']			='Password Changed';
					$data['message']		=$message;
					$body   =$this->load->view($this->email_layout_2,$data,TRUE);
					$this->email->message($body);  

					if ($this->email->send()) {
						
						$this->Users_db->reset_request_password($email);
                        $this->success_alert_callbark('An Email has been Sent to ' . $email);
						redirect('Login');

					} else {
						
                        $this->warning_alert_callbark('Email could not been sent but your Password has been changed');
						redirect('Login');
					}
				}
			}
		} else {
			
            $this->failed_alert_callbark('Click on the link you recieved on your email to continue the process');
			redirect('Login');
		}
	}


    public function check_if_email_exist_request_password_tbl($email){
		$check      = $this->Users_db->check_if_email_exist_request_password_tbl($email);
		return $check;
	}


    	
	public function admin(){
        $data['alert']			=$this->session->flashdata('alert');
		$data['content'] ='auth/signin_admin';
		$this->load->view($this->auth_layout,$data);
	}
	
    public function admin_auth(){
        if($this->input->post('login')){	

			$this->form_validation->set_rules('email','Email Address','required', array('required' => 'Your Email is Required'));
			$this->form_validation->set_rules('pass','Password','required', array('required' => 'Your Password is Required'));




			$email               		=$this->input->post('email');
			$pass               		=$this->input->post('pass');
	    
			if($this->form_validation->run() == FALSE){
                $this->failed_alert_callbark('An Error occurred, make sure you fill all filled!');

        		redirect('Login/admin');
			}else{

                
                $action     =$this->Users_db->login_admin($email,$pass);
                if($action){
                    $this->success_alert_callbark('Welcome....');

                    
                    
                    redirect('Dashboard');

                }else{
                    $this->failed_alert_callbark('It seem that you entered in wrong value, your email or password might be wrong!');
                    redirect('Login/admin');
                }
            }
        }else{
            $this->failed_alert_callbark('Database Busy, Could not perform operation, Pls Try Again Later!');
            redirect('Login/admin');
        }
        

    }

    public function verify_me($ref_id=NULL){
        $isExist    =$this->Users_db->check_if_user_exist($ref_id);
        if($isExist){
            //verify user
            $action     = $this->Users_db->verify_user_status($ref_id);
            if($action){
                $this->success_alert_callbark('Your verification was successful');
            }else{
                $this->failed_alert_callbark('Verification Failed, Database busy at the moment,please try again later!');
            }
        }else{
            $this->failed_alert_callbark('This User ID does not exist, please click on the link that was sent to you so you can continue verifying process');
        }

        $data['alert']			=$this->session->flashdata('alert');
		$data['content'] ='auth/signin';
		$this->load->view($this->auth_layout,$data);
    }
}
