<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Connection extends My_Controller {

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

        $offset	=$this->uri->segment(3);
		$total	=$this->Connection_db->count_connection_by_user_id($data['user_id']);
		$config['base_url'] = base_url().'Connection/index';
		$config['total_rows'] =$total;
		$config['per_page'] = 24;
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

        $data['get_con']    =$this->Connection_db->get_connection_by_user_id($data['user_id'],$data['offset'],$data['per_page']);
        

		$data['content']        ='back_end/view_connection';
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
}
