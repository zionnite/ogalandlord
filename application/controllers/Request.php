<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Request extends My_Controller {

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
		$data['admin_status']         		=$this->session->userdata('admin_status');

        // $data['get_request']    =$this->Request_db->get_request_by_user_id($data['user_id']);

		$offset	=$this->uri->segment(3);
		$total	=$this->Request_db->count_request_by_user_id($data['user_id']);
		$config['base_url'] = base_url().'Request/index';
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
        //$data['news']       =$this->Admin_db->get_post($data['offset'],$data['per_page']);
        $data['total']	=$total;

        $data['get_request']    =$this->Request_db->get_request_by_user_id($data['user_id'],$data['offset'],$data['per_page']);
        

		if($data['admin_status']){

			$data['content']        ='back_end/view_request';
		}else{

			$data['content']        ='back_end/view_request';
		}
		
		$this->load->view($this->admin_layout,$data);
	}

    public function mark_request_as_read($id=NULL, $type=NULL){
        $action		= $this->Request_db->update_read_status($id,$type);
		if($action){
			$this->success_alert_callbark('Marked..');
		}else{
			$this->failed_alert_callbark('Database Busy, Could not perform operation, Pls Try Again Later!');
		}
		redirect('Request');
    }

	public function request_inspection($props_id=NULL, $agent_id=NULL){
		$data['props_id']				= $props_id;
		$data['agent_id']				= $agent_id;
		$data['user_id']				= $this->session->userdata('user_id');
		$user_status                   = $this->Users_db->get_user_status($data['user_id']);

		$title							="Site  Inspection";
		$desc							="A User of has requested for site Inspection";

		$checker			=$this->Request_db->check_if_user_n_props_exist_in_request(
												$data['user_id'],
												$data['agent_id'],
												$data['props_id']
											);
		if($checker){
			$this->failed_alert_callbark('You already initiated a Request');
		}else{

			if($user_status == 'user'){
				$action		= $this->Request_db->insert_into_request_tbl($data['user_id'],$data['agent_id'],$data['props_id'],$title,$desc);
				if($action){
					$this->success_alert_callbark('Inpsection has been requested, Awaiting Admin feedback');
				}else{
					$this->failed_alert_callbark('Database Busy, Could not perform operation, Pls Try Again Later!');
				}
			}else{
				$this->failed_alert_callbark('This feature is available only to Users not Landlord ( or Agent)');
			}
			
		}
		redirect('Dashboard');

	}

	public function request_inspection_2($props_id=NULL, $agent_id=NULL){
		$data['props_id']				= $props_id;
		$data['agent_id']				= $agent_id;
		$data['user_id']				= $this->session->userdata('user_id');
		$user_status                   = $this->Users_db->get_user_status($data['user_id']);

		$title							="Site  Inspection";
		$desc							="A User of has requested for site Inspection";

		$checker			=$this->Request_db->check_if_user_n_props_exist_in_request(
												$data['user_id'],
												$data['agent_id'],
												$data['props_id']
											);
		if($checker){
			$this->failed_alert_callbark('You already initiated a Request');
		}else{

			if($user_status == 'user'){
				$action		= $this->Request_db->insert_into_request_tbl($data['user_id'],$data['agent_id'],$data['props_id'],$title,$desc);
				if($action){
					$this->success_alert_callbark('Inpsection has been requested, Awaiting Admin feedback');
				}else{
					$this->failed_alert_callbark('Database Busy, Could not perform operation, Pls Try Again Later!');
				}
			}else{
				$this->failed_alert_callbark('This feature is available only to Users not Landlord ( or Agent)');
			}
			
		}
		redirect('Dashboard/view_favourite');

	}



    public function set_request_status($id=NULL, $type=NULL, $dis_user_id=NULL, $agent_id=NULL, $props_id=NULL){
		$my_id 	= $this->session->userdata('user_id');
		if($type == 'done'){
			if(!$this->Connection_db->checkIfUserExistInConnection($dis_user_id,$agent_id,$props_id)){
				$action 	= $this->Connection_db->insert_into_connection_tbl($dis_user_id,$agent_id,$props_id);
				if($action){
					
					$message	= "Hello, you now have a new Connection, check Connection tab for more detail";
					$this->Alert_db->insert_into_alert_tbl($agent_id,$my_id,$message, 'yes');
					$this->Alert_db->insert_into_alert_tbl($dis_user_id, $my_id, $message, 'yes');
					$this->success_alert_callbark('Connection is Now Open between User and Agent');
				}else{
					$this->failed_alert_callbark('Database Busy, Could not perform operation, Pls Try Again Later!');
				}
			}else{
				$this->failed_alert_callbark('Connection already exist between this User and Agent');
			}

		}else{

			 $action		= $this->Request_db->set_request_status($id,$type,$dis_user_id,$agent_id,$props_id);
			if($action){

				if($type == 'review'){

					$message	= "Hello, Your Request for Site Inspection is now under Review!";
					$this->Alert_db->insert_into_alert_tbl($dis_user_id, $my_id, $message, 'yes');

				}else if($type =='rejected'){

					$message	= "Hello, the status of your request for site inspection is now move to Rejected";
					$this->Alert_db->insert_into_alert_tbl($dis_user_id, $my_id, $message, 'yes');

				}else if($type == 'confirm'){

					$message	= "Hello, Your Request for Site Inspection is now Confirm!";
					$this->Alert_db->insert_into_alert_tbl($dis_user_id, $my_id, $message, 'yes');

				}
				$this->success_alert_callbark('Done!!!');
			}else{
				$this->failed_alert_callbark('Database Busy, Could not perform operation, Pls Try Again Later!');
			}
		}
       
		redirect('Request');
    }
}
