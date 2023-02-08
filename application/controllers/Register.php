<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends My_Controller {

	
	public function index(){
        $data['alert']			=$this->session->flashdata('alert');
		$data['content'] ='auth/signup';
		$this->load->view($this->auth_layout,$data);
	}


    public function reg(){
        if($this->input->post('submit')){	

            $this->form_validation->set_rules('user_name','User Name', array('required','is_unique[users.user_name]'),
                                                                            array('required' => 'User Name is Required','is_unique'=>'This User Name has already been use by another user'));

			$this->form_validation->set_rules('full_name','Full Name','required', array('required' => 'Fullname is Required'));
			$this->form_validation->set_rules('email','Email Address', array('required','is_unique[users.email]'),
                                                                            array('required' => 'Email Address is Required','is_unique'=>'This email has already been use by another user'));
			$this->form_validation->set_rules('pass','Password','required', array('required' => 'Password is Required'));
			$this->form_validation->set_rules('status','Status','required', array('required' => 'You need to Select an Option'));
			$this->form_validation->set_rules('phone','Status', array('required','is_unique[users.phone]'), 
                                                                    array('required' => 'Phone Number is Required','is_unique'=>'This Phone Number has already been use by another user'));



			$u_name         		    =$this->input->post('user_name');
			$full_name         		    =$this->input->post('full_name');
			$email               		=$this->input->post('email');
			$pass               		=$this->input->post('pass');
			$status               		=$this->input->post('status');
			$phone               		=$this->input->post('phone');
	    
			if($this->form_validation->run() == FALSE){
                $this->failed_alert_callbark('An Error occurred during creation of your Account!');

        		$data['alert']			=$this->session->flashdata('alert');
                $data['content'] ='auth/signup';
                $this->load->view($this->auth_layout,$data);
			}else{

                $user_name  = preg_replace("/\s+/", "_", $u_name);
                $user_name  = preg_replace('/[^A-Za-z0-9\_]/', '', $user_name);

                @mkdir('project_dir');
                @mkdir('project_dir/users');
                @mkdir('project_dir/users/'.$user_name);
                @mkdir('project_dir/users/'.$user_name.'/images');
                @copy("project_dir/logo.png", "project_dir/users/$user_name/images/logo.png");

                $action     =$this->Users_db->register_user($full_name,$email,$pass,$status,$phone,$user_name,'logo.png');
                if($action){
                    $this->success_alert_callbark('Account Created... An email has been sent to you, please click on the link to verify your email');
                    $user_id        = $this->Users_db->get_user_id_by_email($email);
                    $title  ='Confirm Account';
                    $msg    ='click on this link to verify account';
                    $type   ='type_1';
                    $link   = 'http://www.ogabliss.com/login/verify_me/' . $user_id;
                    $link_title ='Confirm Account';

                    $this->send_email($email,$title,$msg,$type,$link,$link_title);
                    redirect('Register/index');
                }else{
                    $this->failed_alert_callbark('Database Busy, Could not perform operation, Pls Try Again Later!');
                    redirect('Register/index');
                }
            }
        }else{
            $this->failed_alert_callbark('Database Busy, Could not perform operation, Pls Try Again Later!');
            redirect('Register/index');
        }
        

    }


    public function ref($ref_id=NULL, $type=NULL){
        $data['alert']			=$this->session->flashdata('alert');

        $data['ref_id']         =$ref_id;
       


		$data['content'] ='auth/signup_ref';
		$this->load->view($this->auth_layout,$data);
    }


    public function reg_ref(){
        if($this->input->post('submit')){	

            $this->form_validation->set_rules('user_name','User Name', array('required','is_unique[users.user_name]'),
                                                                            array('required' => 'User Name is Required','is_unique'=>'This User Name has already been use by another user'));

			$this->form_validation->set_rules('full_name','Full Name','required', array('required' => 'Fullname is Required'));
			$this->form_validation->set_rules('email','Email Address', array('required','is_unique[users.email]'),
                                                                            array('required' => 'Email Address is Required','is_unique'=>'This email has already been use by another user'));
			$this->form_validation->set_rules('pass','Password','required', array('required' => 'Password is Required'));
			$this->form_validation->set_rules('status','Status','required', array('required' => 'You need to Select an Option'));
			$this->form_validation->set_rules('phone','Status', array('required','is_unique[users.phone]'), 
                                                                    array('required' => 'Phone Number is Required','is_unique'=>'This Phone Number has already been use by another user'));



			$u_name         		    =$this->input->post('user_name');
			$full_name         		    =$this->input->post('full_name');
			$email               		=$this->input->post('email');
			$pass               		=$this->input->post('pass');
			$status               		=$this->input->post('status');
			$phone               		=$this->input->post('phone');
			$ref_id               		=$this->input->post('ref_id');
	    
			if($this->form_validation->run() == FALSE){
                $this->failed_alert_callbark('An Error occurred during creation of your Account!');

        		$data['alert']			=$this->session->flashdata('alert');
                $data['content'] ='auth/signup';
                $this->load->view($this->auth_layout,$data);
			}else{

                $user_name  = preg_replace("/\s+/", "_", $u_name);
                $user_name  = preg_replace('/[^A-Za-z0-9\_]/', '', $user_name);

                @mkdir('project_dir');
                @mkdir('project_dir/users');
                @mkdir('project_dir/users/'.$user_name);
                @mkdir('project_dir/users/'.$user_name.'/images');
                @copy("project_dir/logo.png", "project_dir/users/$user_name/images/logo.png");

                $action     =$this->Users_db->register_user_2($full_name,$email,$pass,$status,$phone,$user_name,$ref_id,'logo.png');
                if($action){
                    $this->success_alert_callbark('Account Created... An email has been sent to you, please click on the link to verify your email');
                    $user_id        = $this->Users_db->get_user_id_by_email($email);
                    $title  ='Confirm Account';
                    $msg    ='click on this link to verify account';
                    $type   ='type_1';
                    $link   = 'http://www.ogabliss.com/login/verify_me/' . $user_id;
                    $link_title ='Confirm Account';

                    $this->send_email($email,$title,$msg,$type,$link,$link_title);
                    redirect('Register/index');
                }else{
                    $this->failed_alert_callbark('Database Busy, Could not perform operation, Pls Try Again Later!');
                    redirect('Register/index');
                }
            }
        }else{
            $this->failed_alert_callbark('Database Busy, Could not perform operation, Pls Try Again Later!');
            redirect('Register/index');
        }
        

    }
}
