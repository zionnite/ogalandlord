<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wallet extends My_Controller {

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
		$data['user_status']         	=$this->session->userdata('status');


		$data['content']        ='back_end/wallet';
		$this->load->view($this->admin_layout,$data);
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
	
}
