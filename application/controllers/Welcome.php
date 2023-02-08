<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends My_Controller {

	
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
		

		
		$offset	=$this->uri->segment(3);
		$total	=$this->Property_db->count_all_props();
		$config['base_url'] = base_url().'Welcome/index';
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
        $data['total']	=$total;

        $data['get_props']    =$this->Property_db->get_all_props($data['offset'],$data['per_page']);
        


		$data['content'] ='front_end/index';
		$this->load->view($this->layout,$data);
	}


	public function view_property($props_id =NULL){
		$data['alert']			=$this->session->flashdata('alert');

		$data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
		$data['phone_no']         		=$this->session->userdata('phone_no');
		$data['user_img']         		=$this->session->userdata('user_img');
		$data['sex']         			=$this->session->userdata('sex');
		$data['age']         			=$this->session->userdata('age');
		$data['email']         			=$this->session->userdata('email');
		$data['full_name']         		=$this->session->userdata('full_name');

		$data['props_id']				=$props_id;

		$data['content'] 				='front_end/view_property';
		$this->load->view($this->layout_3,$data);
		
	}

	public function index_2(){
		$data['get_props']		=$this->Admin_db->get_all_props();
		$data['content'] 		='front_end/rent_prop';
		$this->load->view($this->layout_2,$data);
	}

	public function test($props_id=NULL){
		$data['alert']			=$this->session->flashdata('alert');

		$data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
		$data['phone_no']         		=$this->session->userdata('phone_no');
		$data['user_img']         		=$this->session->userdata('user_img');
		$data['sex']         			=$this->session->userdata('sex');
		$data['age']         			=$this->session->userdata('age');
		$data['email']         			=$this->session->userdata('email');
		$data['full_name']         		=$this->session->userdata('full_name');

		$data['props_id']				=$props_id;

		$data['content'] 				='front_end/view_property';
		$this->load->view('front_end/master_3',$data);
	}

	public function backend(){
		$data['content'] ='back_end/index';
		$this->load->view($this->admin_layout,$data);
	}

	public function sess_property_type_id($qs){
		if($qs){
			$this->session->set_userdata('property_type_id',$qs);
			return $qs;
		}elseif($this->session->userdata('property_type_id')){
			$qs	=$this->session->userdata('property_type_id');
			return $qs;
		}elseif($this->session->userdata('property_type_id') != $qs){
			$qs	=$this->session->set_userdata('property_type_id',$qs);
			return $qs;
		}else{
			$qs	=" ";
			return $qs;
		}
	}

	public function sess_property_purpose($qs){
		if($qs){
			$this->session->set_userdata('property_purpose',$qs);
			return $qs;
		}elseif($this->session->userdata('property_purpose')){
			$qs	=$this->session->userdata('property_purpose');
			return $qs;
		}elseif($this->session->userdata('property_purpose') != $qs){
			$qs	=$this->session->set_userdata('property_purpose',$qs);
			return $qs;
		}else{
			$qs	=" ";
			return $qs;
		}
	}

	public function sess_price_from($qs){
		if($qs){
			$this->session->set_userdata('price_from',$qs);
			return $qs;
		}elseif($this->session->userdata('price_from')){
			$qs	=$this->session->userdata('price_from');
			return $qs;
		}elseif($this->session->userdata('price_from') != $qs){
			$qs	=$this->session->set_userdata('price_from',$qs);
			return $qs;
		}else{
			$qs	=" ";
			return $qs;
		}
	}

	public function sess_price_to($qs){
		if($qs){
			$this->session->set_userdata('price_to',$qs);
			return $qs;
		}elseif($this->session->userdata('price_to')){
			$qs	=$this->session->userdata('price_to');
			return $qs;
		}elseif($this->session->userdata('price_to') != $qs){
			$qs	=$this->session->set_userdata('price_to',$qs);
			return $qs;
		}else{
			$qs	=" ";
			return $qs;
		}
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

	public function sess_area_id($qs){
		if($qs){
			$this->session->set_userdata('area_id',$qs);
			return $qs;
		}elseif($this->session->userdata('area_id')){
			$qs	=$this->session->userdata('area_id');
			return $qs;
		}elseif($this->session->userdata('area_id') != $qs){
			$qs	=$this->session->set_userdata('area_id',$qs);
			return $qs;
		}else{
			$qs	=" ";
			return $qs;
		}
	}

	public function sess_keyword($qs){
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

	public function sess_props_id($qs){
		if($qs){
			$this->session->set_userdata('props_id',$qs);
			return $qs;
		}elseif($this->session->userdata('props_id')){
			$qs	=$this->session->userdata('props_id');
			return $qs;
		}elseif($this->session->userdata('props_id') != $qs){
			$qs	=$this->session->set_userdata('props_id',$qs);
			return $qs;
		}else{
			$qs	=" ";
			return $qs;
		}
	}

	public function sess_property(){
		if($this->input->post('submit')){
			$property_type_id								= $this->input->post('property_type_id');
			$property_purpose								= $this->input->post('property_purpose');
			$price_from										= $this->input->post('price_from');
			$price_to										= $this->input->post('price_to');
			$state_id										= $this->input->post('state_id');
			$area_id										= $this->input->post('area_id');
			$keyword										= $this->input->post('keyword');

	
			$this->sess_property_type_id($property_type_id);
			$this->sess_property_purpose($property_purpose);
			$this->sess_price_from($price_from);
			$this->sess_price_to($price_to);
			$this->sess_state_id($state_id);
			$this->sess_area_id($area_id);
			$this->sess_keyword($keyword);
		

			redirect('Welcome/search_property');

		}else{

			$this->failed_alert_callbark('You need to click the button to proceed this request');
			redirect('Welcome/search_property');
		}

	}




		
	public function search_property(){
		
		// session_destroy();
		$data['alert']			=$this->session->flashdata('alert');

		$data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
		$data['phone_no']         		=$this->session->userdata('phone_no');
		$data['user_img']         		=$this->session->userdata('user_img');
		$data['sex']         			=$this->session->userdata('sex');
		$data['age']         			=$this->session->userdata('age');
		$data['email']         			=$this->session->userdata('email');
		$data['full_name']         		=$this->session->userdata('full_name');


		$property_type_id         		=$this->session->userdata('property_type_id');
		$property_purpose         		=$this->session->userdata('property_purpose');
		$price_from         			=$this->session->userdata('price_from');
		$price_to         				=$this->session->userdata('price_to');
		$state_id         				=$this->session->userdata('state_id');
		$area_id         				=$this->session->userdata('area_id');
		$keyword         				=$this->session->userdata('keyword');
		$props_id         				=$this->session->userdata('props_id');


		// echo $property_type_id.br().br().$property_purpose.br().$price_from.br().$price_to.br().$keyword;


		
		$offset	=$this->uri->segment(3);
		$total	=$this->Property_db->count_filter($property_type_id, $property_purpose, $price_from, $price_to, $state_id, $area_id, $keyword, $props_id);
		$config['base_url'] = base_url().'Welcome/search_property';
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
        $data['total']	=$total;

        $data['get_props']    =$this->Property_db->search_filter($property_type_id, $property_purpose, $price_from, $price_to, $state_id, $area_id, $keyword, $props_id, $data['offset'],$data['per_page']);
        


		$data['content'] ='front_end/search_property';
		$this->load->view($this->layout_2,$data);
	}



	public function agent_property($props_id =NULL, $agent_id =NULL){
		$data['alert']			=$this->session->flashdata('alert');

		$data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
		$data['phone_no']         		=$this->session->userdata('phone_no');
		$data['user_img']         		=$this->session->userdata('user_img');
		$data['sex']         			=$this->session->userdata('sex');
		$data['age']         			=$this->session->userdata('age');
		$data['email']         			=$this->session->userdata('email');
		$data['full_name']         		=$this->session->userdata('full_name');

		$data['props_id']				=$props_id;
		$data['agent_id']				=$agent_id;

		$data['content'] 				='front_end/agent_property';
		$this->load->view($this->layout_3,$data);
		
	}

	public function add_property(){

		if($this->session->userdata('validation')){
			redirect('Property/add');
		}else{
			$this->failed_alert_callbark('you need to login as Landlord or Agent to proceed with this request');
			redirect('Login');
		}
	}

}
