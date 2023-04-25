<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_panel extends My_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$this->session_checker->my_session2();
        redirect('Dashboard');
	}


    public function view_all_users(){

        $this->session_checker->my_session2();
        $this->chat_online_tracker->check();
		$data['alert']					=$this->session->flashdata('alert');


        $data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
		$data['phone_no']         		=$this->session->userdata('phone_no');
		$data['user_img']         		=$this->session->userdata('user_img');
		$data['sex']         			=$this->session->userdata('sex');
		$data['age']         			=$this->session->userdata('age');
		$data['email']         			=$this->session->userdata('email');
		$data['full_name']         		=$this->session->userdata('full_name');
		$data['user_status']         	=$this->session->userdata('status');

        
        $offset	=$this->uri->segment(3);
		$total	=$this->Users_db->count_all_users();
		$config['base_url'] = base_url().'Admin_panel/view_all_users';
		$config['total_rows'] =$total;
		$config['per_page'] = 50;
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
        $data['total']	    =$total;


        $data['page_name']      = $this->uri->segment(2);

        $data['get_users']      =$this->Users_db->get_all_users_paginated($data['offset'],$data['per_page']);

        $data['content']        ='back_end/view_users';
		$this->load->view($this->admin_layout,$data);
    }
  

    public function view_all_agents(){

        $this->session_checker->my_session2();
        $this->chat_online_tracker->check();
		$data['alert']					=$this->session->flashdata('alert');


        $data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
		$data['phone_no']         		=$this->session->userdata('phone_no');
		$data['user_img']         		=$this->session->userdata('user_img');
		$data['sex']         			=$this->session->userdata('sex');
		$data['age']         			=$this->session->userdata('age');
		$data['email']         			=$this->session->userdata('email');
		$data['full_name']         		=$this->session->userdata('full_name');
		$data['user_status']         	=$this->session->userdata('status');

        
        $offset	=$this->uri->segment(3);
		$total	=$this->Users_db->count_all_agents();
		$config['base_url'] = base_url().'Admin_panel/view_all_agents';
		$config['total_rows'] =$total;
		$config['per_page'] = 50;
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
        $data['total']	    =$total;


        $data['page_name']      = $this->uri->segment(2);

        $data['get_users']      =$this->Users_db->get_all_agents_paginated($data['offset'],$data['per_page']);

        $data['content']        ='back_end/view_users';
		$this->load->view($this->admin_layout,$data);
    }

    public function toggle_ban_user($id=NULL,$location=NULL){
        $action		= $this->Users_db->toggle_ban_user($id);
		if(!$action){
			$this->failed_alert_callbark('Database Busy, Could not perform operation, Pls Try Again Later!');
		}else{
			
            $this->success_alert_callbark($action);
		}

        if($location =='view_users'){
            redirect('Admin_panel/view_all_users');
        }else if($location =='view_agents'){
            redirect('Admin_panel/view_all_agents');
        }else if($location =='view_user'){
            redirect('Profile/view_user/'.$id);
        }
        else{
            redirect('Admin_panel');
        }
		
    }


    public function delete_user($id=NULL,$location=NULL){
        $action		= $this->Users_db->delete_user($id);
		if(!$action){
			$this->failed_alert_callbark('Database Busy, Could not perform operation, Pls Try Again Later!');
		}else{
			
            $this->success_alert_callbark('User Removed from Database');
		}

         if($location =='view_users'){
            redirect('Admin_panel/view_all_users');
        }else if($location =='view_agents'){
            redirect('Admin_panel/view_all_agents');
        }else if($location =='view_user'){
            redirect('Profile/view_user/'.$id);
        }
        else{
            redirect('Admin_panel');
        }
		
    }

    public function message_user(){
        $message        ='';
        $dis_email      = $this->input->post('to_email');
        $dis_id         = $this->input->post('to_id');
        $dis_full_name  = $this->input->post('to_full_name');
        $subject        = $this->input->post('subject');
        $msg            = $this->input->post('message');
        $location       = $this->input->post('location');

        $type           = 'type_2';
        $link           = '';
		$link_title 	='';

        $message        .= $dis_full_name.'\n'; 
        $message        .= $msg; 

        $action     =$this->send_email($dis_email, $subject, $message, $type, $link, $link_title);

        if($action){
            $this->success_alert_callbark('Email Sent to User');
        }else{
            $this->failed_alert_callbark('Email having trouble delivering');
        }

        if($location =='view_users'){
            redirect('Admin_panel/view_all_users');
        }else if($location =='view_agents'){
            redirect('Admin_panel/view_all_agents');
        }else if($location =='view_user'){
            redirect('Profile/view_user/'.$dis_id);
        }
        else{
            redirect('Admin_panel');
        }

    }

    public function change_user_password(){
		if ($this->input->post('login')) {
            
			$this->form_validation->set_rules('pass', 'Password', array('required', 'min_length[5]', 'max_length[12]', 'alpha_numeric'));
			$this->form_validation->set_rules(
				'repass',
				'Confirm Password',
				array('required', 'matches[pass]', 'min_length[5]', 'max_length[12]', 'alpha_numeric')
			);

			$pass	        = $this->input->post('pass');
			$dis_user_id      = $this->input->post('dis_user_id');
			$location         = $this->input->post('location');

			if ($this->form_validation->run() == FALSE) {

                $this->failed_alert_callbark('Password not Filled or Password does not match');

			} else {
				$action	= $this->Users_db->change_user_password($pass, $dis_user_id);
                if(!$action){
                    $this->failed_alert_callbark('Database Busy, Could not perform operation, Pls Try Again Later!');
                }else{
                    
                    $this->success_alert_callbark('User Password updated!');
                }
				
			}
		} else {
			
            $this->failed_alert_callbark('Click on the button continue the process');
		}

        if($location =='view_user'){
            redirect('Profile/view_user/'.$dis_user_id);
        }
        else{
            redirect('Admin_panel');
        }
	
    }


	public function view_all_property(){

        $this->session_checker->my_session2();
        $this->chat_online_tracker->check();
		$data['alert']					=$this->session->flashdata('alert');


        $data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
		$data['phone_no']         		=$this->session->userdata('phone_no');
		$data['user_img']         		=$this->session->userdata('user_img');
		$data['sex']         			=$this->session->userdata('sex');
		$data['age']         			=$this->session->userdata('age');
		$data['email']         			=$this->session->userdata('email');
		$data['full_name']         		=$this->session->userdata('full_name');
		$data['user_status']         	=$this->session->userdata('status');

        
        $offset	=$this->uri->segment(3);
		$total	=$this->Admin_db->count_all_property('all');
		$config['base_url'] = base_url().'Admin_panel/view_all_property';
		$config['total_rows'] =$total;
		$config['per_page'] = 50;
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
        $data['total']	    =$total;


        $data['page_name']      = $this->uri->segment(2);

        $data['get_property']      =$this->Admin_db->get_all_property('all', $data['offset'], $data['per_page']);

        $data['content']        ='back_end/view_property';
		$this->load->view($this->admin_layout,$data);
    }

	public function view_all_pending_property(){

        $this->session_checker->my_session2();
        $this->chat_online_tracker->check();
		$data['alert']					=$this->session->flashdata('alert');


        $data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
		$data['phone_no']         		=$this->session->userdata('phone_no');
		$data['user_img']         		=$this->session->userdata('user_img');
		$data['sex']         			=$this->session->userdata('sex');
		$data['age']         			=$this->session->userdata('age');
		$data['email']         			=$this->session->userdata('email');
		$data['full_name']         		=$this->session->userdata('full_name');
		$data['user_status']         	=$this->session->userdata('status');

        
        $offset	=$this->uri->segment(3);
		$total	=$this->Admin_db->count_all_property('pending');
		$config['base_url'] = base_url().'Admin_panel/view_all_pending_property';
		$config['total_rows'] =$total;
		$config['per_page'] = 50;
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
        $data['total']	    =$total;


        $data['page_name']      = $this->uri->segment(2);

        $data['get_property']      =$this->Admin_db->get_all_property('pending', $data['offset'],$data['per_page']);

        $data['content']        ='back_end/view_property';
		$this->load->view($this->admin_layout,$data);
    }

	public function view_all_approve_property(){

        $this->session_checker->my_session2();
        $this->chat_online_tracker->check();
		$data['alert']					=$this->session->flashdata('alert');


        $data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
		$data['phone_no']         		=$this->session->userdata('phone_no');
		$data['user_img']         		=$this->session->userdata('user_img');
		$data['sex']         			=$this->session->userdata('sex');
		$data['age']         			=$this->session->userdata('age');
		$data['email']         			=$this->session->userdata('email');
		$data['full_name']         		=$this->session->userdata('full_name');
		$data['user_status']         	=$this->session->userdata('status');

        
        $offset	=$this->uri->segment(3);
		$total	=$this->Admin_db->count_all_property('approved');
		$config['base_url'] = base_url().'Admin_panel/view_all_approve_property';
		$config['total_rows'] =$total;
		$config['per_page'] = 50;
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
        $data['total']	    =$total;


        $data['page_name']      = $this->uri->segment(2);

        $data['get_property']      =$this->Admin_db->get_all_property('approved', $data['offset'],$data['per_page']);

        $data['content']        ='back_end/view_property';
		$this->load->view($this->admin_layout,$data);
    }

	public function view_all_unapprove_property(){

        $this->session_checker->my_session2();
        $this->chat_online_tracker->check();
		$data['alert']					=$this->session->flashdata('alert');


        $data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
		$data['phone_no']         		=$this->session->userdata('phone_no');
		$data['user_img']         		=$this->session->userdata('user_img');
		$data['sex']         			=$this->session->userdata('sex');
		$data['age']         			=$this->session->userdata('age');
		$data['email']         			=$this->session->userdata('email');
		$data['full_name']         		=$this->session->userdata('full_name');
		$data['user_status']         	=$this->session->userdata('status');

        
        $offset	=$this->uri->segment(3);
		$total	=$this->Admin_db->count_all_property('rejected');
		$config['base_url'] = base_url().'Admin_panel/view_all_unapprove_property';
		$config['total_rows'] =$total;
		$config['per_page'] = 50;
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
        $data['total']	    =$total;


        $data['page_name']      = $this->uri->segment(2);

        $data['get_property']      =$this->Admin_db->get_all_property('rejected', $data['offset'],$data['per_page']);

        $data['content']        ='back_end/view_property';
		$this->load->view($this->admin_layout,$data);
    }

    public function approve_property($id=NULL, $location=NULL, $props_id=NULL, $agent_id =NULL){

        $action		= $this->Admin_db->approve_property($id);

		if(!$action){
			$this->failed_alert_callbark('Database Busy, Could not perform operation, Pls Try Again Later!');

		}else{
			$message				='';
			$user_id 				= $this->session->userdata('user_id');
			$subject				= 'Property Approved';
			$get_site_name          = $this->Action->get_site_name();
			$message				.= 'The Property you uploaded to '.$get_site_name.' has been Approved';
			$is_agent				= 'yes';
			$agent_email			= $this->Users_db->get_email_by_id($agent_id);

			$this->Alert_db->insert_into_alert_tbl($agent_id,$user_id,$message, $is_agent);
			$this->send_email($agent_email, $subject, $message, 'type_2', '','');

            $this->success_alert_callbark('Property status is now Approved and Visible to all users and quest');
		}

        if($location =='all_props'){
            redirect('Admin_panel/view_all_property');
        }else if($location =='all_pending'){
            redirect('Admin_panel/view_all_pending_property');
            
        }else if($location =='all_approved'){
            redirect('Admin_panel/view_all_approve_property');
        }
        else if($location =='all_rejected'){
            redirect('Admin_panel/view_all_unapprove_property');
        }
        else{
            redirect('Admin_panel');
        }
		
    }

    public function reject_property(){
        $message        ='';
        $props_id       	= $this->input->post('props_id');
        $msg	            = $this->input->post('message');
        $location       	= $this->input->post('location');
		$agent_id			= $this->input->post('agent_id');
		$user_id 			= $this->session->userdata('user_id');


        
		$site_email				= $this->Action->get_site_email();
		$get_site_name          = $this->Action->get_site_name();
		
		$subject				= 'Property Rejected';
		$message				.= "Hey, One of the Property you uploaded to ".$get_site_name." has been Rejected.-Reasons-";
		$message				.= $msg;
		$is_agent				='yes';
		$desc					= $message;
		$agent_email			= $this->Users_db->get_email_by_id($agent_id);


        $action     			=$this->Admin_db->reject_property($props_id);

        if($action){
			$this->Alert_db->insert_into_alert_tbl($agent_id,$user_id,$message, $is_agent);
            $this->success_alert_callbark('Property Live Status is now updated to Rejected, no site user or quest can see it except only the uploader');
			$this->send_email($agent_email, $subject, $message, 'type_2', '','');
        }else{
            $this->failed_alert_callbark('Database busy, could not perform operation, please try again later!');
        }

        if($location =='all_props'){
            redirect('Admin_panel/view_all_property');
        }else if($location =='all_pending'){
            redirect('Admin_panel/view_all_pending_property');
            
        }else if($location =='all_approved'){
            redirect('Admin_panel/view_all_approve_property');
        }
        else if($location =='all_rejected'){
            redirect('Admin_panel/view_all_unapprove_property');
        }
        else{
            redirect('Admin_panel');
        }

    }
	
       
    public function sess_search_keyword($qs){
		if($qs){
			$this->session->set_userdata('keyword',$qs);
			return $qs;
		}elseif($this->session->userdata('keyword')){
			$qs	=$this->session->userdata('keyword');
			return $qs;
		}elseif($this->session->userdata('keyword') != $qs){
			$qs	=$this->session->set_userdata('keyword',$qs);
			return $qs;
		}else{
			$qs	=" ";
			return $qs;
		}
	}


	public function search_props(){

		if($this->input->post('submit')){

			$keyword		= $this->input->post('keyword');
			$this->sess_search_keyword($keyword);
		}else{

			$this->failed_alert_callbark('Please use the button to process the submit button!');
		}
		redirect('Admin_panel/search_property');
		
	}

	public function search_property(){
		$this->session_checker->my_session2();
        $this->chat_online_tracker->check();
		$data['alert']					=$this->session->flashdata('alert');


        $data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
		$data['phone_no']         		=$this->session->userdata('phone_no');
		$data['user_img']         		=$this->session->userdata('user_img');
		$data['sex']         			=$this->session->userdata('sex');
		$data['age']         			=$this->session->userdata('age');
		$data['email']         			=$this->session->userdata('email');
		$data['full_name']         		=$this->session->userdata('full_name');
		$data['user_status']         	=$this->session->userdata('status');

		$keyword			         	=$this->session->userdata('keyword');

        
        $offset	=$this->uri->segment(3);
		$total	=$this->Admin_db->count_search_property($keyword);
		$config['base_url'] = base_url().'Admin_panel/search_property';
		$config['total_rows'] =$total;
		$config['per_page'] = 50;
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
        $data['total']	    =$total;


        $data['page_name']      = $this->uri->segment(2);

        $data['get_property']      =$this->Admin_db->get_all_search_property($keyword, $data['offset'],$data['per_page']);

        $data['content']        ='back_end/view_property';
		$this->load->view($this->admin_layout,$data);
	}


       
    public function sess_state_id($qs){
		if($qs){
			$this->session->set_userdata('state_id',$qs);
			return $qs;
		}elseif($this->session->userdata('state_id')){
			$qs	=$this->session->userdata('state_id');
			return $qs;
		}elseif($this->session->userdata('state_id') != $qs){
			$qs	=$this->session->set_userdata('state_id',$qs);
			return $qs;
		}else{
			$qs	=" ";
			return $qs;
		}
	}

	public function fill_state_property($id =NULL ){

		$this->sess_state_id($id);
		redirect('Admin_panel/filter_state');
	}

	public function filter_state(){

		$this->session_checker->my_session2();
        $this->chat_online_tracker->check();
		$data['alert']					=$this->session->flashdata('alert');


        $data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
		$data['phone_no']         		=$this->session->userdata('phone_no');
		$data['user_img']         		=$this->session->userdata('user_img');
		$data['sex']         			=$this->session->userdata('sex');
		$data['age']         			=$this->session->userdata('age');
		$data['email']         			=$this->session->userdata('email');
		$data['full_name']         		=$this->session->userdata('full_name');
		$data['user_status']         	=$this->session->userdata('status');

		$keyword			         	=$this->session->userdata('state_id');

        
        $offset	=$this->uri->segment(3);
		$total	=$this->Admin_db->count_state_filter($keyword);
		$config['base_url'] = base_url().'Admin_panel/filter_state';
		$config['total_rows'] =$total;
		$config['per_page'] = 50;
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
        $data['total']	    =$total;


        $data['page_name']      = $this->uri->segment(2);

        $data['get_property']      =$this->Admin_db->get_all_state_filter($keyword, $data['offset'],$data['per_page']);

        $data['content']        ='back_end/view_property';
		$this->load->view($this->admin_layout,$data);
	}

	       
    public function sess_purpose($qs){
		if($qs){
			$this->session->set_userdata('purpose',$qs);
			return $qs;
		}elseif($this->session->userdata('purpose')){
			$qs	=$this->session->userdata('purpose');
			return $qs;
		}elseif($this->session->userdata('purpose') != $qs){
			$qs	=$this->session->set_userdata('purpose',$qs);
			return $qs;
		}else{
			$qs	=" ";
			return $qs;
		}
	}

	public function fill_purpose($purpose=NULL){

		$this->sess_purpose($purpose);
		redirect('Admin_panel/filter_purpose');
	}



	public function filter_purpose(){

		$this->session_checker->my_session2();
        $this->chat_online_tracker->check();
		$data['alert']					=$this->session->flashdata('alert');


        $data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
		$data['phone_no']         		=$this->session->userdata('phone_no');
		$data['user_img']         		=$this->session->userdata('user_img');
		$data['sex']         			=$this->session->userdata('sex');
		$data['age']         			=$this->session->userdata('age');
		$data['email']         			=$this->session->userdata('email');
		$data['full_name']         		=$this->session->userdata('full_name');
		$data['user_status']         	=$this->session->userdata('status');


		$keyword			         	=$this->session->userdata('purpose');

        
        $offset	=$this->uri->segment(3);
		$total	=$this->Admin_db->count_purpose_filter($keyword);
		$config['base_url'] = base_url().'Admin_panel/filter_purpose';
		$config['total_rows'] =$total;
		$config['per_page'] = 50;
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
        $data['total']	    =$total;


        $data['page_name']      	= $this->uri->segment(2);

        $data['get_property']      	=$this->Admin_db->get_all_purpose_filter($keyword, $data['offset'],$data['per_page']);

        $data['content']        ='back_end/view_property';
		$this->load->view($this->admin_layout,$data);
	}


	       
    public function sess_types($qs){
		if($qs){
			$this->session->set_userdata('type',$qs);
			return $qs;
		}elseif($this->session->userdata('type')){
			$qs	=$this->session->userdata('type');
			return $qs;
		}elseif($this->session->userdata('type') != $qs){
			$qs	=$this->session->set_userdata('type',$qs);
			return $qs;
		}else{
			$qs	=" ";
			return $qs;
		}
	}

	public function fill_types($id =NULL){

		$this->sess_types($id);
		redirect('Admin_panel/filter_types');
	}
    


	public function filter_types(){

		$this->session_checker->my_session2();
        $this->chat_online_tracker->check();
		$data['alert']					=$this->session->flashdata('alert');


        $data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
		$data['phone_no']         		=$this->session->userdata('phone_no');
		$data['user_img']         		=$this->session->userdata('user_img');
		$data['sex']         			=$this->session->userdata('sex');
		$data['age']         			=$this->session->userdata('age');
		$data['email']         			=$this->session->userdata('email');
		$data['full_name']         		=$this->session->userdata('full_name');
		$data['user_status']         	=$this->session->userdata('status');


		$keyword			         	=$this->session->userdata('type');

        
        $offset	=$this->uri->segment(3);
		$total	=$this->Admin_db->count_types_filter($keyword);
		$config['base_url'] = base_url().'Admin_panel/filter_types';
		$config['total_rows'] =$total;
		$config['per_page'] = 50;
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
        $data['total']	    =$total;


        $data['page_name']      	= $this->uri->segment(2);

        $data['get_property']      	=$this->Admin_db->get_all_ptypes_filter($keyword, $data['offset'],$data['per_page']);

        $data['content']        ='back_end/view_property';
		$this->load->view($this->admin_layout,$data);
	}


		       
    public function sess_search_to_date($qs){
		if($qs){
			$this->session->set_userdata('to_date',$qs);
			return $qs;
		}elseif($this->session->userdata('to_date')){
			$qs	=$this->session->userdata('to_date');
			return $qs;
		}elseif($this->session->userdata('to_date') != $qs){
			$qs	=$this->session->set_userdata('to_date',$qs);
			return $qs;
		}else{
			$qs	=" ";
			return $qs;
		}
	}
      
    public function sess_search_from_date($qs){
		if($qs){
			$this->session->set_userdata('from_date',$qs);
			return $qs;
		}elseif($this->session->userdata('from_date')){
			$qs	=$this->session->userdata('from_date');
			return $qs;
		}elseif($this->session->userdata('from_date') != $qs){
			$qs	=$this->session->set_userdata('from_date',$qs);
			return $qs;
		}else{
			$qs	=" ";
			return $qs;
		}
	}


	public function date_search(){

		if($this->input->post('submit')){

			$to_date		= $this->input->post('to_date');
			$from_date		= $this->input->post('from_date');
			$this->sess_search_to_date($to_date);
			$this->sess_search_from_date($from_date);
		}else{

			$this->failed_alert_callbark('Please use the button to process the submit button!');
		}
		redirect('Admin_panel/filter_by_date');
		
	}


	public function filter_by_date(){

		$this->session_checker->my_session2();
        $this->chat_online_tracker->check();
		$data['alert']					=$this->session->flashdata('alert');


        $data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
		$data['phone_no']         		=$this->session->userdata('phone_no');
		$data['user_img']         		=$this->session->userdata('user_img');
		$data['sex']         			=$this->session->userdata('sex');
		$data['age']         			=$this->session->userdata('age');
		$data['email']         			=$this->session->userdata('email');
		$data['full_name']         		=$this->session->userdata('full_name');
		$data['user_status']         	=$this->session->userdata('status');


		$keyword_1			         	=$this->session->userdata('to_date');
		$keyword_2			         	=$this->session->userdata('from_date');

        
        $offset	=$this->uri->segment(3);
		$total	=$this->Admin_db->count_filter_date($keyword_1, $keyword_2);
		$config['base_url'] = base_url().'Admin_panel/filter_by_date';
		$config['total_rows'] =$total;
		$config['per_page'] = 50;
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
        $data['total']	    =$total;


        $data['page_name']      	= $this->uri->segment(2);

        $data['get_property']      	=$this->Admin_db->get_all_filter_date($keyword_1, $keyword_2, $data['offset'],$data['per_page']);

        $data['content']        ='back_end/view_property';
		$this->load->view($this->admin_layout,$data);
	}


	public function update_site_logos(){
		$this->session_checker->my_session2();
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


		$data['content']        ='back_end/update_site_logo';
		$this->load->view($this->admin_layout,$data);
	}

	public function insert_site_logo(){
        if($this->input->post('submit')){	
			$site_name     	=$this->input->post('site_name');            
            
            	@mkdir('project_dir');
				$site_logo_1['upload_path'] = './project_dir';
				$site_logo_1['allowed_types'] = 'png|jpeg|jpg|gif';
				$site_logo_1['max_size']= '';
				$site_logo_1['overwrite'] = FALSE;
				$site_logo_1['remove_spaces'] = TRUE;
				$site_logo_1['encrypt_name'] = TRUE;
				$site_logo_1['max_width'] = '230';
				$site_logo_1['max_height'] = '80';
               	$site_logo_1['min_width'] = '230';
				$site_logo_1['min_height'] = '80';

				$this->upload->initialize($site_logo_1);
				$this->load->library('upload', $site_logo_1);

				if(!$this->upload->do_upload('site_logo_1')) {
					
					$this->failed_alert_callbark('Error in Uploading Logo 1 '.$this->upload->display_errors().'Ensure Logo 1 is in the right logo Dimension');
				}else{
                    $file_name_1	=$this->upload->data('file_name');
                    @mkdir('project_dir');
                    $site_logo_2['upload_path'] = './project_dir/';
                    $site_logo_2['allowed_types'] = 'png|jpeg|jpg|gif';
                    $site_logo_2['max_size']= '';
                    $site_logo_2['overwrite'] = FALSE;
                    $site_logo_2['remove_spaces'] = TRUE;
                    $site_logo_2['encrypt_name'] = TRUE;
					$site_logo_2['max_width'] = '500';
					$site_logo_2['max_height'] = '500';
               		$site_logo_2['min_width'] = '500';
					$site_logo_2['min_height'] = '500';
                    
                    $this->upload->initialize($site_logo_2);
				    $this->load->library('upload', $site_logo_2);

                    if(!$this->upload->do_upload('site_logo_2')) {
                       
						$this->failed_alert_callbark('Error in Uploading Logo 2 '.$this->upload->display_errors().'Ensure Logo 2 is in the right logo Dimension');
                    }else{
                        /// In the end update video name in DB 
                        $file_name_2	=$this->upload->data('file_name');
                        $insert	=$this->Action->update_logo($site_name,$file_name_1,$file_name_2);
                        if($insert	==TRUE){
                         
							
							$this->success_alert_callbark('Site name and & Logos updated');
                        }else{
                            
							$this->failed_alert_callbark('Database Busy, Could not perform operation, Pls Try Again Later!');
                        }
                    }
					
				}

			}else{
			
			$this->failed_alert_callbark('Please Use The Submit button to continue');
		}

		redirect('Admin_panel/update_site_logos');
    }

	

	public function update_site_detail(){
		$this->session_checker->my_session2();
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


		$data['content']        ='back_end/update_site_detail';
		$this->load->view($this->admin_layout,$data);
	}
	


	public function insert_site_detail(){
        if($this->input->post('submit')){	
			$site_email     	=$this->input->post('site_email');            
			$phone     			=$this->input->post('phone');            
			$gmail     			=$this->input->post('gmail');            
			$gpass     			=$this->input->post('gpass');            
			$site_keyword     	=$this->input->post('site_keyword');            
			$site_desc     		=$this->input->post('site_desc');            
			$site_address     		=$this->input->post('site_address');            
            
            
			$insert		= $this->Action->update_site_detail($site_email,$phone,$gmail,$gpass,$site_keyword,$site_desc,$site_address);
			if($insert){
                        
				$this->success_alert_callbark('Site Details updated');
            }else{
                            
				$this->failed_alert_callbark('Database Busy, Could not perform operation, Pls Try Again Later!');
            }

		}else{
			$this->failed_alert_callbark('Please Use The Submit button to continue');
		}

		redirect('Admin_panel/update_site_detail');
    }



	public function update_payment_api(){
		$this->session_checker->my_session2();
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


		$data['content']        ='back_end/update_payment_api';
		$this->load->view($this->admin_layout,$data);
	}

	public function insert_payment_api(){
        if($this->input->post('submit')){	
			$public_key     	=$this->input->post('public_key');            
			$private_key		=$this->input->post('private_key');              
            
            
			$insert		= $this->Action->update_payment_api($public_key,$private_key);
			if($insert){
                        
				$this->success_alert_callbark('Payment API updated');
            }else{
                            
				$this->failed_alert_callbark('Database Busy, Could not perform operation, Pls Try Again Later!');
            }

		}else{
			$this->failed_alert_callbark('Please Use The Submit button to continue');
		}

		redirect('Admin_panel/update_payment_api');
    }
	


	public function update_payment_commission(){
		$this->session_checker->my_session2();
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


		$data['content']        ='back_end/update_payment_commission';
		$this->load->view($this->admin_layout,$data);
	}

	public function insert_payment_commission(){
        if($this->input->post('submit')){	
			$ref_com     	=$this->input->post('ref_com');            
			$agent_com		=$this->input->post('agent_com');              
			$ins_com		=$this->input->post('ins_com');              
            
            
			$insert		= $this->Action->update_payment_commission($ref_com,$agent_com,$ins_com);
			if($insert){
                        
				$this->success_alert_callbark('Payment Commission updated');
            }else{
                            
				$this->failed_alert_callbark('Database Busy, Could not perform operation, Pls Try Again Later!');
            }

		}else{
			$this->failed_alert_callbark('Please Use The Submit button to continue');
		}

		redirect('Admin_panel/update_payment_commission');
    }


    public function update_insurance_bank_detail(){
        if($this->input->post('submit')){	
            $this->form_validation->set_rules('bank_code','Bank Name','required', array('required' => 'Bank Name is Required'));
			$this->form_validation->set_rules('account_number','Account Number','required', array('required' => 'Your Account Number is Required'));
			$this->form_validation->set_rules('account_name','Account Name','required', array('required' => 'Your Account Name is Required'));
			

            $bank_code                      =$this->input->post('bank_code');
            $account_number                 =$this->input->post('account_number');
            $account_name                   =$this->input->post('account_name');
           
            $user_id                    =$this->session->userdata('user_id');

            if($this->form_validation->run() == FALSE){
                $this->failed_alert_callbark('An Error occurred, make sure you fill all field!');

			}else{
                $action     = $this->Action->update_insurance_bank_detail($account_name,$account_number,$bank_code);
                if($action){

                    $this->success_alert_callbark('Insurance Bank Detail Updated...');

                }else{

                    $this->failed_alert_callbark('Database Busy, Could not perform operation, Pls Try enter New Value!');

                }
            }

        }else{
            $this->failed_alert_callbark('You need to click the submit button to continue');
        }

        redirect('Admin_panel/update_payment_commission');
    }


	public function update_social_link(){
		$this->session_checker->my_session2();
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


		$data['content']        ='back_end/update_social_link';
		$this->load->view($this->admin_layout,$data);
	}

	public function insert_social_link(){
        if($this->input->post('submit')){	
			$fb_link     	=$this->input->post('fb_link');            
			$tw_link		=$this->input->post('tw_link');              
			$ig_link		=$this->input->post('ig_link');              
            
            
			$insert		= $this->Action->update_social_link($fb_link,$tw_link,$ig_link);
			if($insert){
                        
				$this->success_alert_callbark('Social Links updated');
            }else{
                            
				$this->failed_alert_callbark('Database Busy, Could not perform operation, Pls Try Again Later!');
            }

		}else{
			$this->failed_alert_callbark('Please Use The Submit button to continue');
		}

		redirect('Admin_panel/update_social_link');
    }


	public function update_bank_code(){
		$this->session_checker->my_session2();
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


		$data['content']        ='back_end/update_bank_code';
		$this->load->view($this->admin_layout,$data);
	}

	public function insert_bank_code(){
        if($this->input->post('submit')){	
			$bank_name     	=$this->input->post('bank_name');            
			$bank_code		=$this->input->post('bank_code');              
			$ig_link		=$this->input->post('ig_link');              
            
            
			$checker 	=$this->Action->check_if_code_exist($id);
			if(!$checker){
				$insert		= $this->Action->add_bank_code($bank_name,$bank_code);
				if($insert){
							
					$this->success_alert_callbark('Bank Code added to List');
				}else{
								
					$this->failed_alert_callbark('Database Busy, Could not perform operation, Pls Try Again Later!');
				}
			}else{
				$this->failed_alert_callbark('Bank Code already exist, try input new one');
			}

		}else{
			$this->failed_alert_callbark('Please Use The Submit button to continue');
		}

		redirect('Admin_panel/view_bank_list');
    }


	public function view_bank_list(){
		$this->session_checker->my_session2();
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


		$data['content']        ='back_end/view_bank_list';
		$this->load->view($this->admin_layout,$data);
	}

	public function remove_bank($id){
		
		$action		= $this->Action->remove_bank($id);
		if($action){
			$this->success_alert_callbark('Item Removed From List');
		}else{
			$this->failed_alert_callbark('Database Busy, Could not perform operation, Pls Try Again Later!');
		}
		
		redirect('Admin_panel/view_bank_list');
	}


	public function update_state(){
		$this->session_checker->my_session2();
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


		$data['content']        ='back_end/update_state';
		$this->load->view($this->admin_layout,$data);
	}

	public function insert_state(){
        if($this->input->post('submit')){	
			$state     	=$this->input->post('state');            

			$insert		= $this->Action->add_state($state);
			if($insert){
							
				$this->success_alert_callbark('State added to List');
			}else{
								
				$this->failed_alert_callbark('Database Busy, Could not perform operation, Pls Try Again Later!');
			}
		

		}else{
			$this->failed_alert_callbark('Please Use The Submit button to continue');
		}

		redirect('Admin_panel/view_state_list');
    }


	public function view_state_list(){
		$this->session_checker->my_session2();
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


		$data['content']        ='back_end/view_state_list';
		$this->load->view($this->admin_layout,$data);
	}

	public function remove_state($id){
		
		$action		= $this->Action->remove_state($id);
		if($action){
			$this->success_alert_callbark('Item Removed From List');
		}else{
			$this->failed_alert_callbark('Database Busy, Could not perform operation, Pls Try Again Later!');
		}
		
		redirect('Admin_panel/view_state_list');
	}


	public function update_sub_state($state_id =NULL){
		$this->session_checker->my_session2();
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

		$data['state_id']				= $state_id;

		$data['content']        ='back_end/update_sub_state';
		$this->load->view($this->admin_layout,$data);
	}

	public function insert_sub_state(){
        if($this->input->post('submit')){	
			$state     	=$this->input->post('state');            
			$state_id 	=$this->input->post('state_id');            

			$insert		= $this->Action->add_sub_state($state,$state_id);
			if($insert){
							
				$this->success_alert_callbark('Area added to List');
			}else{
								
				$this->failed_alert_callbark('Database Busy, Could not perform operation, Pls Try Again Later!');
			}
		

		}else{
			$this->failed_alert_callbark('Please Use The Submit button to continue');
		}

		redirect('Admin_panel/view_sub_state_list/'.$state_id);
    }


	public function view_sub_state_list($state_id =NULL){
		$this->session_checker->my_session2();
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

		$data['state_id']				=$state_id;


		$data['content']        ='back_end/view_sub_state_list';
		$this->load->view($this->admin_layout,$data);
	}

	public function remove_sub_state($id =NULL,$state_id=NULL){
		
		$action		= $this->Action->remove_sub_state($id,$state_id);
		if($action){
			$this->success_alert_callbark('Item Removed From List');
		}else{
			$this->failed_alert_callbark('Database Busy, Could not perform operation, Pls Try Again Later!');
		}
		
		redirect('Admin_panel/view_sub_state_list/'.$state_id);
	}


	public function update_property_type(){
		$this->session_checker->my_session2();
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


		$data['content']        ='back_end/update_property';
		$this->load->view($this->admin_layout,$data);
	}

	public function insert_property_type(){
        if($this->input->post('submit')){	
			$name     	=$this->input->post('name');            

			$insert		= $this->Action->add_property_type($name);
			if($insert){
							
				$this->success_alert_callbark('Property Type added to List');
			}else{
								
				$this->failed_alert_callbark('Database Busy, Could not perform operation, Pls Try Again Later!');
			}
		

		}else{
			$this->failed_alert_callbark('Please Use The Submit button to continue');
		}

		redirect('Admin_panel/view_property_types');
    }


	public function view_property_types($state_id =NULL){
		$this->session_checker->my_session2();
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

		$data['state_id']				=$state_id;


		$data['content']        ='back_end/view_property_types';
		$this->load->view($this->admin_layout,$data);
	}

	public function remove_property_type($id =NULL){
		
		$action		= $this->Action->remove_property_type($id);
		if($action){
			$this->success_alert_callbark('Item Removed From List');
		}else{
			$this->failed_alert_callbark('Database Busy, Could not perform operation, Pls Try Again Later!');
		}
		
		redirect('Admin_panel/view_property_types');
	}

	



	public function update_sub_property_type($type_id =NULL){
		$this->session_checker->my_session2();
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

		$data['type_id']				= $type_id;

		$data['content']        ='back_end/update_sub_property_type';
		$this->load->view($this->admin_layout,$data);
	}

	public function insert_sub_property_type(){
        if($this->input->post('submit')){	
			$name     	=$this->input->post('name');            
			$type_id 	=$this->input->post('type_id');            

			$insert		= $this->Action->add_sub_property_type($name,$type_id);
			if($insert){
							
				$this->success_alert_callbark('Sub-Property added to List');
			}else{
								
				$this->failed_alert_callbark('Database Busy, Could not perform operation, Pls Try Again Later!');
			}
		

		}else{
			$this->failed_alert_callbark('Please Use The Submit button to continue');
		}

		redirect('Admin_panel/view_sub_property_type/'.$type_id);
    }

	public function view_sub_property_type($type_id =NULL){
		$this->session_checker->my_session2();
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

		$data['type_id']				=$type_id;


		$data['content']        ='back_end/view_sub_property_type';
		$this->load->view($this->admin_layout,$data);
	}
	public function remove_sub_property_type($id =NULL,$type_id=NULL){
		
		$action		= $this->Action->remove_sub_property_type($id,$type_id);
		if($action){
			$this->success_alert_callbark('Item Removed From List');
		}else{
			$this->failed_alert_callbark('Database Busy, Could not perform operation, Pls Try Again Later!');
		}
		
		redirect('Admin_panel/view_sub_property_type/'.$type_id);
	}




	public function update_partners(){
		$this->session_checker->my_session2();
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


		$data['content']        ='back_end/update_partners';
		$this->load->view($this->admin_layout,$data);
	}

	public function insert_partners(){
        if($this->input->post('submit')){	
			$site_name     	=$this->input->post('site_name');            
            
            	@mkdir('project_dir');
            	@mkdir('project_dir/partners');
				$site_logo_1['upload_path'] = './project_dir/partners';
				$site_logo_1['allowed_types'] = 'png|jpeg|jpg|gif';
				$site_logo_1['max_size']= '';
				$site_logo_1['overwrite'] = FALSE;
				$site_logo_1['remove_spaces'] = TRUE;
				$site_logo_1['encrypt_name'] = TRUE;
				$site_logo_1['max_width'] = '300';
				$site_logo_1['max_height'] = '250';
               	$site_logo_1['min_width'] = '300';
				$site_logo_1['min_height'] = '250';

				$this->upload->initialize($site_logo_1);
				$this->load->library('upload', $site_logo_1);

				if(!$this->upload->do_upload()) {
					
					$this->failed_alert_callbark('Error in Uploading Logo'.$this->upload->display_errors().'Ensure Logo is in the right logo Dimension');
				}else{
                    $file_name	=$this->upload->data('file_name');
                    $insert	=$this->Partners_db->add_partner_logo($file_name);
                    if($insert	==TRUE){

						$this->success_alert_callbark('Partner Logo Added to list');
                    }else{
                            
						$this->failed_alert_callbark('Database Busy, Could not perform operation, Pls Try Again Later!');
                    }
					
				}

			}else{
			
			$this->failed_alert_callbark('Please Use The Submit button to continue');
		}

		redirect('Admin_panel/view_partners');
    }


	public function view_partners(){
		$this->session_checker->my_session2();
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


		$data['content']        ='back_end/view_partners';
		$this->load->view($this->admin_layout,$data);
	}

	public function delete_partners($id =NULL){
		
		$action		= $this->Partners_db->delete_partners($id);
		if($action){
			$this->success_alert_callbark('Item Removed From List');
		}else{
			$this->failed_alert_callbark('Database Busy, Could not perform operation, Pls Try Again Later!');
		}
		
		redirect('Admin_panel/view_partners');
	}



	/**
	 * Manage Managers
	 */

	public function add_manager(){
		$this->session_checker->my_session2();
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


		$data['content']        ='back_end/add_manager';
		$this->load->view($this->admin_layout,$data);
	}
	
	public function insert_manager(){
        if($this->input->post('submit')){	

			$this->form_validation->set_rules('user_name','User Name', array('required','is_unique[users.user_name]'),
                                                                            array('required' => 'Your User Name is Required','is_unique'=>'This User Name has already been use by another user'));

			$this->form_validation->set_rules('full_name','Full Name','required', array('required' => 'Your Fullname is Required'));
			$this->form_validation->set_rules('email','Email Address', array('required','is_unique[users.email]'),
                                                                            array('required' => 'Your Email Address is Required','is_unique'=>'This email has already been use by another user'));

			$this->form_validation->set_rules('password','Password','required', array('required' => 'You Password is Required'));

			$this->form_validation->set_rules('age','Age','required', array('required' => 'You need to provide age '));

			$this->form_validation->set_rules('sex','Sex','required', array('required' => 'You need to Select Gender'));

			$this->form_validation->set_rules('phone','Phone', array('required','is_unique[users.phone]'), 
                                                                    array('required' => 'Your Phone Number is Required','is_unique'=>'This Phone Number has already been use by another user'));


			$user_name     	=$this->input->post('user_name');            
			$full_name     	=$this->input->post('full_name');            
			$password     	=$this->input->post('password');            
			$phone	     	=$this->input->post('phone');            
			$age	     	=$this->input->post('age');            
			$sex	     	=$this->input->post('sex');            
			$email	     	=$this->input->post('email');            
            
			if($this->form_validation->run() == FALSE){
                $this->failed_alert_callbark('An Error occurred during creation of your Account!');

				$data['user_id']         		=$this->session->userdata('user_id');
				$data['user_name']         		=$this->session->userdata('user_name');
				$data['phone_no']         		=$this->session->userdata('phone_no');
				$data['user_img']         		=$this->session->userdata('user_img');
				$data['sex']         			=$this->session->userdata('sex');
				$data['age']         			=$this->session->userdata('age');
				$data['email']         			=$this->session->userdata('email');
				$data['full_name']         		=$this->session->userdata('full_name');
				$data['user_status']         	=$this->session->userdata('status');


				$data['content']        ='back_end/add_manager';
				$this->load->view($this->admin_layout,$data);

			}else{

				@mkdir('project_dir');
				$site_logo_1['upload_path'] = './project_dir';
				$site_logo_1['allowed_types'] = 'png|jpeg|jpg|gif';
				$site_logo_1['max_size']= '';
				$site_logo_1['overwrite'] = FALSE;
				$site_logo_1['remove_spaces'] = TRUE;
				$site_logo_1['encrypt_name'] = TRUE;
				$site_logo_1['max_width'] = '400';
				$site_logo_1['max_height'] = '400';
               	$site_logo_1['min_width'] = '400';
				$site_logo_1['min_height'] = '400';

				$this->upload->initialize($site_logo_1);
				$this->load->library('upload', $site_logo_1);

				if(!$this->upload->do_upload()) {
					
					$this->failed_alert_callbark('Error in Uploading User Image '.$this->upload->display_errors());
					redirect('Admin_panel/add_manager');
				}else{
                    
					$file_name	=$this->upload->data('file_name');
					$insert	=$this->Action->add_manager($file_name,$user_name,$full_name,$password,$phone,$age,$sex,$email);
                    if($insert	==TRUE){
                         
						$this->success_alert_callbark('Manager Added');
						redirect('Admin_panel/view_manager');
                    }else{
                            
						$this->failed_alert_callbark('Database Busy, Could not perform operation, Pls Try Again Later!');
						redirect('Admin_panel/add_manager');
                    }
				}
			}
		}else{
			
			$this->failed_alert_callbark('Please Use The Submit button to continue');
			redirect('Admin_panel/add_manager');
		}
    }


	public function view_manager(){
		$this->session_checker->my_session2();
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


		$data['content']        ='back_end/view_manager';
		$this->load->view($this->admin_layout,$data);
	}

	public function remove_manager($agent_id){
		$action		= $this->Users_db->remove_manager($agent_id);
		if($action){
			$this->success_alert_callbark('Manager Removed From List');
		}else{
			$this->failed_alert_callbark('Database Busy, Could not perform operation, Pls Try Again Later!');
		}
		redirect('Admin_panel/view_manager');
	}


	public function verify_insurance_bank_account(){

		$insurance_bank_code		=$this->Action->get_insurance_bank_code();
		$insurance_bank_name		=$this->Action->get_insurance_bank_name();
		$insurance_account_number	=$this->Action->get_insurance_account_number();
		$insurance_account_name		=$this->Action->get_insurance_account_name();

		$user_id		=$this->session->userdata('user_id');
		$secure_key   =$this->Action->get_private_live_key();
		$curl = curl_init();

		$url	= "https://api.paystack.co/bank/resolve?account_number=$insurance_account_number&bank_code=$insurance_bank_code";
  
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
				$action		= $this->Action->update_insurance_bank_verify_status();
				if($action){
					echo 'ok';
				}else{ 
					echo 'database';
				};
			}else{
				
				echo 'Could not verify bank account detail, pls try updating your bank details and come try again';
			}
		}


        
	}

	public function reported_property(){

        $this->session_checker->my_session2();
        $this->chat_online_tracker->check();
		$data['alert']					=$this->session->flashdata('alert');


        $data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
		$data['phone_no']         		=$this->session->userdata('phone_no');
		$data['user_img']         		=$this->session->userdata('user_img');
		$data['sex']         			=$this->session->userdata('sex');
		$data['age']         			=$this->session->userdata('age');
		$data['email']         			=$this->session->userdata('email');
		$data['full_name']         		=$this->session->userdata('full_name');
		$data['user_status']         	=$this->session->userdata('status');

        
        $offset	=$this->uri->segment(3);
		$total	=$this->Users_db->count_all_report();
		$config['base_url'] = base_url().'Admin_panel/reported_property';
		$config['total_rows'] =$total;
		$config['per_page'] = 50;
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
        $data['total']	    =$total;


        $data['report']      =$this->Users_db->get_all_report($data['offset'],$data['per_page']);

        $data['content']        ='back_end/view_report';
		$this->load->view($this->admin_layout,$data);
    }



	/**
	 * M Users
	 */
		
	public function mlm_dashboard(){
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


		$data['content'] 		='back_end/index_m';
		$this->load->view($this->m_admin_layout,$data);
	}



    public function view_mlm_users(){

        $this->session_checker->my_session2();
        $this->chat_online_tracker->check();
		$data['alert']					=$this->session->flashdata('alert');


        $data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
		$data['phone_no']         		=$this->session->userdata('phone_no');
		$data['user_img']         		=$this->session->userdata('user_img');
		$data['sex']         			=$this->session->userdata('sex');
		$data['age']         			=$this->session->userdata('age');
		$data['email']         			=$this->session->userdata('email');
		$data['full_name']         		=$this->session->userdata('full_name');
		$data['user_status']         	=$this->session->userdata('status');

        
        $offset	=$this->uri->segment(3);
		$total	=$this->MUser_db->count_my_downline($data['user_id']);
		$config['base_url'] = base_url().'Admin_panel/view_mlm_users';
		$config['total_rows'] =$total;
		$config['per_page'] = 50;
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
        $data['total']	    =$total;


        $data['page_name']      = $this->uri->segment(2);

        $data['get_users']      =$this->MUser_db->get_my_downline($data['user_id'], $data['offset'],$data['per_page']);

        $data['content']        ='back_end/view_mlm_users';
		$this->load->view($this->m_admin_layout,$data);
    }


	       
    public function sess_user_downline_id($qs){
		if($qs){
			$this->session->set_userdata('user_dd_id',$qs);
			return $qs;
		}elseif($this->session->userdata('user_dd_id')){
			$qs	=$this->session->userdata('user_dd_id');
			return $qs;
		}elseif($this->session->userdata('user_dd_id') != $qs){
			$qs	=$this->session->set_userdata('user_dd_id',$qs);
			return $qs;
		}else{
			$qs	=" ";
			return $qs;
		}
	}

	       
    public function sess_user_plan_id($qs){
		if($qs){
			$this->session->set_userdata('user_pn_id',$qs);
			return $qs;
		}elseif($this->session->userdata('user_pn_id')){
			$qs	=$this->session->userdata('user_pn_id');
			return $qs;
		}elseif($this->session->userdata('user_pn_id') != $qs){
			$qs	=$this->session->set_userdata('user_pn_id',$qs);
			return $qs;
		}else{
			$qs	=" ";
			return $qs;
		}
	}

	public function vu_downline($id=NULL){
		$this->sess_user_downline_id($id);
		// echo $id;
		redirect('Admin_panel/view_user_downline');
	}

	public function pn_downline($id=NULL){
		$this->sess_user_plan_id($id);
		redirect('Admin_panel/view_user_plan');
	}



	public function view_user_downline(){
		$this->session_checker->my_session2();
        $this->chat_online_tracker->check();
		$data['alert']					=$this->session->flashdata('alert');


        $data['user_dd_id']         	=$this->session->userdata('user_dd_id');

		if($checker    =$this->Users_db->get_user_status($data['user_dd_id']) !='m_user'){
			$this->failed_alert_callbark('This User status is not recognize as MLM User');
			redirect('Admin_panel/view_mlm_users');
		}

        $data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
		$data['phone_no']         		=$this->session->userdata('phone_no');
		$data['user_img']         		=$this->session->userdata('user_img');
		$data['sex']         			=$this->session->userdata('sex');
		$data['age']         			=$this->session->userdata('age');
		$data['email']         			=$this->session->userdata('email');
		$data['full_name']         		=$this->session->userdata('full_name');
		$data['user_status']         	=$this->session->userdata('status');

        
        $offset	=$this->uri->segment(3);
		$total	=$this->MUser_db->count_my_downline($data['user_dd_id']);
		$config['base_url'] = base_url().'Admin_panel/view_user_downline';
		$config['total_rows'] =$total;
		$config['per_page'] = 50;
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
        $data['total']	    =$total;


        $data['page_name']      = $this->uri->segment(2);

        $data['get_users']      =$this->MUser_db->get_my_downline($data['user_dd_id'], $data['offset'],$data['per_page']);

        $data['content']        ='back_end/view_mlm_users_2';
		$this->load->view($this->m_admin_layout,$data);
	}

	public function view_user_plan(){
        $this->session_checker->my_session();
        $this->chat_online_tracker->check();
        $data['alert']			=$this->session->flashdata('alert');

      
		$data['user_pn_id']         		=$this->session->userdata('user_pn_id');

		$data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
		$data['phone_no']         		=$this->session->userdata('phone_no');
		$data['user_img']         		=$this->session->userdata('user_img');
		$data['sex']         			=$this->session->userdata('sex');
		$data['age']         			=$this->session->userdata('age');
		$data['email']         			=$this->session->userdata('email');
		$data['full_name']         		=$this->session->userdata('full_name');
		$data['user_status']         	=$this->session->userdata('status');


         
        $offset	=$this->uri->segment(3);
		$total	=$this->Subscription_db->count_subscriber($data['user_pn_id']);
		$config['base_url'] = base_url().'Admin_panel/view_user_plan';
		$config['total_rows'] =$total;
		$config['per_page'] = 50;
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
        $data['total']	    =$total;


        $data['page_name']      = $this->uri->segment(2);

        $data['get_sub']        =$this->Subscription_db->get_subscriber_2($data['user_pn_id'], $data['offset'], $data['per_page']);

        
        $data['content']                ='back_end/view_mlm_plan';
        
		$this->load->view($this->m_admin_layout,$data);
	}

	public function sess_search_plan_id($qs){
		if($qs){
			$this->session->set_userdata('plan_id',$qs);
			return $qs;
		}elseif($this->session->userdata('plan_id')){
			$qs	=$this->session->userdata('plan_id');
			return $qs;
		}elseif($this->session->userdata('plan_id') != $qs){
			$qs	=$this->session->set_userdata('plan_id',$qs);
			return $qs;
		}else{
			$qs	=" ";
			return $qs;
		}
	}

	public function sess_search_dis_user_id($qs){
		if($qs){
			$this->session->set_userdata('dis_user_id',$qs);
			return $qs;
		}elseif($this->session->userdata('dis_user_id')){
			$qs	=$this->session->userdata('dis_user_id');
			return $qs;
		}elseif($this->session->userdata('dis_user_id') != $qs){
			$qs	=$this->session->set_userdata('dis_user_id',$qs);
			return $qs;
		}else{
			$qs	=" ";
			return $qs;
		}
	}

    public function v_plan($dis_user_id=NULL,$id =NULL){
        $this->sess_search_plan_id($id);
        $this->sess_search_dis_user_id($dis_user_id);
        redirect('Admin_panel/mlm_user_plan');
    }

    public function mlm_user_plan(){
        $this->session_checker->my_session();
        $this->chat_online_tracker->check();
        $data['alert']			        =$this->session->flashdata('alert');

        $plan_id		                =$this->session->userdata('plan_id');
        $dis_user_id	                =$this->session->userdata('dis_user_id');
		// echo $plan_id.br().$dis_user_id;
		$data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
		$data['phone_no']         		=$this->session->userdata('phone_no');
		$data['user_img']         		=$this->session->userdata('user_img');
		$data['sex']         			=$this->session->userdata('sex');
		$data['age']         			=$this->session->userdata('age');
		$data['email']         			=$this->session->userdata('email');
		$data['full_name']         		=$this->session->userdata('full_name');
		$data['user_status']         	=$this->session->userdata('status');


         
        $offset	=$this->uri->segment(3);
		$total	=$this->Subscription_db->count_subscription($dis_user_id, $plan_id);
		$config['base_url'] = base_url().'Admin_panel/mlm_user_plan';
		$config['total_rows'] =$total;
		$config['per_page'] = 50;
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
        $data['total']	    =$total;


        $data['page_name']      = $this->uri->segment(2);
        $data['plan_id']        = $plan_id;
        $data['dis_user_id']        = $dis_user_id;

        $data['get_sub']        =$this->Subscription_db->get_subscription($dis_user_id, $plan_id, $data['offset'], $data['per_page']);

        
        $data['content']                ='back_end/mlm_user_plan';
        
		$this->load->view($this->m_admin_layout,$data);
	}


    public function transaction(){
        $this->session_checker->my_session();
        $this->chat_online_tracker->check();
        $data['alert']			        =$this->session->flashdata('alert');


		$data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
		$data['phone_no']         		=$this->session->userdata('phone_no');
		$data['user_img']         		=$this->session->userdata('user_img');
		$data['sex']         			=$this->session->userdata('sex');
		$data['age']         			=$this->session->userdata('age');
		$data['email']         			=$this->session->userdata('email');
		$data['full_name']         		=$this->session->userdata('full_name');
		$data['user_status']         	=$this->session->userdata('status');


         
        $offset	=$this->uri->segment(3);
		$total	=$this->MUser_db->count_transaction($data['user_id']);
		$config['base_url'] = base_url().'Admin_panel/transaction';
		$config['total_rows'] =$total;
		$config['per_page'] = 50;
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
        $data['total']	    =$total;


        $data['page_name']      = $this->uri->segment(2);

        $data['downline']        =$this->MUser_db->get_transaction($data['user_id'], $data['offset'], $data['per_page']);

        
        $data['content']                ='back_end/transaction';
        
		$this->load->view($this->m_admin_layout,$data);
	}

	/**
	 * Lands
	 */
	public function add_land_location(){
		$this->session_checker->my_session2();
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


		$data['content']        ='back_end/add_land_location';
		$this->load->view($this->m_admin_layout,$data);
	}
	
	public function insert_land_location(){
        if($this->input->post('submit')){	

			$this->form_validation->set_rules('location','Land Location', array('required'),
                                                                            array('required' => 'Your Location Name is Required'));

		
			$location     	=$this->input->post('location');            
			
            
			if($this->form_validation->run() == FALSE){
                $this->failed_alert_callbark('An Error occurred during creation of your Account!');

				$data['user_id']         		=$this->session->userdata('user_id');
				$data['user_name']         		=$this->session->userdata('user_name');
				$data['phone_no']         		=$this->session->userdata('phone_no');
				$data['user_img']         		=$this->session->userdata('user_img');
				$data['sex']         			=$this->session->userdata('sex');
				$data['age']         			=$this->session->userdata('age');
				$data['email']         			=$this->session->userdata('email');
				$data['full_name']         		=$this->session->userdata('full_name');
				$data['user_status']         	=$this->session->userdata('status');


				$data['content']        ='back_end/add_land_location';
				$this->load->view($this->admin_layout,$data);

			}else{

				@mkdir('project_dir');
            	@mkdir('project_dir/subscription');
				$site_logo_1['upload_path'] = './project_dir/subscription';
				$site_logo_1['allowed_types'] = 'png|jpeg|jpg|gif';
				$site_logo_1['max_size']= '';
				$site_logo_1['overwrite'] = FALSE;
				$site_logo_1['remove_spaces'] = TRUE;
				$site_logo_1['encrypt_name'] = TRUE;
				// $site_logo_1['max_width'] = '300';
				// $site_logo_1['max_height'] = '250';
               	// $site_logo_1['min_width'] = '300';
				// $site_logo_1['min_height'] = '250';

				$this->upload->initialize($site_logo_1);
				$this->load->library('upload', $site_logo_1);

				if(!$this->upload->do_upload()) {
					
					$this->failed_alert_callbark('Error in Uploading Image'.$this->upload->display_errors().'Ensure image is in the right Dimension');
				}else{
                  

					$file_name	=$this->upload->data('file_name');
					$insert	=$this->Subscription_db->add_land_location($location, $file_name);
					if($insert	==TRUE){
							
						$this->success_alert_callbark('Land Location Added');
						redirect('Admin_panel/view_landlocation');
					}else{
								
						$this->failed_alert_callbark('Database Busy, Could not perform operation, Pls Try Again Later!');
						redirect('Admin_panel/add_land_location');
					}
				}
			}
		}else{
			
			$this->failed_alert_callbark('Please Use The Submit button to continue');
			redirect('Admin_panel/add_land_location');
		}
    }


	public function view_landlocation(){
		$this->session_checker->my_session2();
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


		$data['content']        ='back_end/view_landlocation';
		$this->load->view($this->m_admin_layout,$data);
	}

	public function remove_landlocation($id){
		$action		= $this->Subscription_db->remove_landlocation($id);
		if($action){
			$this->success_alert_callbark('Manager Removed From List');
		}else{
			$this->failed_alert_callbark('Database Busy, Could not perform operation, Pls Try Again Later!');
		}
		redirect('Admin_panel/view_landlocation');
	}




	public function create_subscription_plan(){
		// $this->session_checker->my_session2();
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


		$data['content']        		='back_end/create_subscription_plan';
		$this->load->view($this->m_admin_layout,$data);
	}

	public function generate_subscription_plan(){
        if($this->input->post('submit')){	

			$this->form_validation->set_rules('plan_name','Plan Name', array('required'),
                                                                            array('required' => 'Plan Name is Required'));

			$this->form_validation->set_rules('description','Description','required', array('required' => 'Description is Required'));

			$this->form_validation->set_rules('interval','interval', array('required'),
                                                                            array('required' => 'interval is  Required'));

			$this->form_validation->set_rules('amount','Password','required', array('required' => 'Amount is Required'));

			$this->form_validation->set_rules('invoice_limit','invoice_limit','required', array('required' => 'Invoice Limit is required '));

			$this->form_validation->set_rules('location','location','required', array('required' => 'You need to Select location'));
			$this->form_validation->set_rules('plan_type','plan_type','required', array('required' => 'You need to Select Plan Type'));

		
			$plan_name     			=$this->input->post('plan_name');            
			$description     		=$this->input->post('description');            
			$interval     			=$this->input->post('interval');            
			$amount	     			=$this->input->post('amount');            
			$invoice_limit	     	=$this->input->post('invoice_limit');            
			$location	     		=$this->input->post('location');            
			$plan_type	     		=$this->input->post('plan_type');            

			
			if($this->form_validation->run() == FALSE){
                $this->failed_alert_callbark('An Error occurred during creation of your Account!');

				$data['user_id']         		=$this->session->userdata('user_id');
				$data['user_name']         		=$this->session->userdata('user_name');
				$data['phone_no']         		=$this->session->userdata('phone_no');
				$data['user_img']         		=$this->session->userdata('user_img');
				$data['sex']         			=$this->session->userdata('sex');
				$data['age']         			=$this->session->userdata('age');
				$data['email']         			=$this->session->userdata('email');
				$data['full_name']         		=$this->session->userdata('full_name');
				$data['user_status']         	=$this->session->userdata('status');


				$data['content']        ='back_end/create_subscription_plan';
				$this->load->view($this->admin_layout,$data);

			}else{

				$insert	=$this->Subscription_db->create_subscription_plan($plan_name,$description,$interval,$amount,$invoice_limit,$location, $plan_type);
            	if($insert	!=false){

					$this->generate_plan($insert,$plan_name,$description,$interval,$amount,$invoice_limit,$location);
                         
					
					
                }else{
                            
					$this->failed_alert_callbark('Database Busy, Could not perform operation, Pls Try Again Later!');
					redirect('Admin_panel/create_subscription_plan');
                }
			}
		}else{
			
			$this->failed_alert_callbark('Please Use The Submit button to continue');
			redirect('Admin_panel/create_subscription_plan');
		}
    }
	

	public function subscription_plan(){
		// $this->session_checker->my_session2();
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


		$data['content']        ='back_end/view_subscription_plan';
		$this->load->view($this->m_admin_layout,$data);
	}


	public function remove_subscription($id){
		$action		= $this->Subscription_db->remove_landlocation($id);
		if($action){
			$this->success_alert_callbark('Manager Removed From List');
		}else{
			$this->failed_alert_callbark('Database Busy, Could not perform operation, Pls Try Again Later!');
		}
		redirect('Admin_panel/subscription_plan');
	}

	public function generate_plan($id,$plan_name,$description,$interval,$amount,$invoice_limit,$location){
		$secure_key   =$this->Action->get_private_live_key();

		$url = "https://api.paystack.co/plan";

		$fields = [
			'name' => $plan_name,
			'interval' => $interval, 
			'amount' => $amount*100,
			'description' => $description,
			'invoice_limit'	=> $invoice_limit,
		];

		$fields_string = http_build_query($fields);

		//open connection
		$ch = curl_init();
		
		//set the url, number of POST vars, POST data
		curl_setopt($ch,CURLOPT_URL, $url);
		curl_setopt($ch,CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0); 
        curl_setopt($ch, CURLOPT_TIMEOUT, 400); 
		curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			"Authorization: Bearer $secure_key",
			"Cache-Control: no-cache",
		));
		
		//So that curl_exec returns the contents of the cURL; rather than echoing it
		curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
		
		//execute post
		//execute post
        $response = curl_exec($ch);

		
		// print_r($response);
		$result  = json_decode($response, true);
        $result  = array_change_key_case($result, CASE_LOWER);


        $status		=$result['status'];
        if($status){
            $v_data		=$result['data'];
			
			$plan_code			=$v_data['plan_code'];
			$plan_id 			=$v_data['id'];

			$this->Subscription_db->update_subscription_plan($id, $plan_code, $plan_id);

			$this->success_alert_callbark('Plan Added');
			redirect('Admin_panel/subscription_plan');
        }

		$this->success_alert_callbark('Plan Added, could not update Plan subscription code');
		redirect('Admin_panel/subscription_plan');

	}

}