<?php
class Product extends My_Controller{
    public function __construct(){
        parent::__construct();
    }

    public function view_product($props_id=NULL, $url_code=NULL){
        $data['props_id']				=$props_id;
        $data['url_code']               = urldecode($url_code);

        
        $data['user_id']         		=$this->session->userdata('user_id');
		$data['content'] 				='front_end/view_property_promoter';
		$this->load->view('front_end/promoting_master',$data);
    }



	public function view_all_property(){

        $this->session_checker->my_session();
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
		$total	=$this->Promoter_db->count_all_property('available');
		$config['base_url'] = base_url().'Product/view_all_property';
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

        $data['get_property']      =$this->Promoter_db->get_all_property('available', $data['offset'], $data['per_page']);

        $data['content']        ='back_end/view_property_2';
		$this->load->view($this->admin_layout,$data);
    }


	public function view_all_property_detail_extra($props_id){

        $this->session_checker->my_session();
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

        $data['props_id']               =$props_id;


        $data['content']                ='back_end/view_property_detail_extra';
		$this->load->view($this->admin_layout,$data);
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
		redirect('Product/search_property');
		
	}

	public function search_property(){
		$this->session_checker->my_session();
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
		$total	=$this->Promoter_db->count_search_property($keyword);
		$config['base_url'] = base_url().'Product/search_property';
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

        $data['get_property']      =$this->Promoter_db->get_all_search_property($keyword, $data['offset'],$data['per_page']);

        $data['content']        ='back_end/view_property_2';
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
		redirect('Product/filter_state');
	}

	public function filter_state(){

		$this->session_checker->my_session();
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
		$total	=$this->Promoter_db->count_state_filter($keyword);
		$config['base_url'] = base_url().'Product/filter_state';
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

        $data['get_property']      =$this->Promoter_db->get_all_state_filter($keyword, $data['offset'],$data['per_page']);

        $data['content']        ='back_end/view_property_2';
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
		redirect('Product/filter_purpose');
	}



	public function filter_purpose(){

		$this->session_checker->my_session();
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
		$total	=$this->Promoter_db->count_purpose_filter($keyword);
		$config['base_url'] = base_url().'Product/filter_purpose';
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

        $data['get_property']      	=$this->Promoter_db->get_all_purpose_filter($keyword, $data['offset'],$data['per_page']);

        $data['content']        ='back_end/view_property_2';
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
		redirect('Product/filter_types');
	}
    


	public function filter_types(){

		$this->session_checker->my_session();
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
		$total	=$this->Promoter_db->count_types_filter($keyword);
		$config['base_url'] = base_url().'Product/filter_types';
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

        $data['get_property']      	=$this->Promoter_db->get_all_ptypes_filter($keyword, $data['offset'],$data['per_page']);

        $data['content']        ='back_end/view_property_2';
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
		redirect('Product/filter_by_date');
		
	}


	public function filter_by_date(){

		$this->session_checker->my_session();
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
		$total	=$this->Promoter_db->count_filter_date($keyword_1, $keyword_2);
		$config['base_url'] = base_url().'Product/filter_by_date';
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

        $data['get_property']      	=$this->Promoter_db->get_all_filter_date($keyword_1, $keyword_2, $data['offset'],$data['per_page']);

        $data['content']        ='back_end/view_property_2';
		$this->load->view($this->admin_layout,$data);
	}


    public function promote_product($props_id =NULL){
        $data['user_id']        = $this->session->userdata('user_id');
        $data['props_id']       = $props_id;

        $checker                = $this->Promoter_db->check_if_already_promoting($data['user_id'], $props_id);
        if($checker){
            $this->failed_alert_callbark('You already promoting this product');
        }else{
            $action		= $this->Promoter_db->promote_product($data['user_id'], $props_id);
            if($action){
                $this->success_alert_callbark('Property Added to List of Item you are promoting');
            }else{
                $this->failed_alert_callbark('Database Busy, Could not perform operation, Pls Try Again Later!');
            }
        }


		redirect('Dashboard/index');
    }

    public function get_user_refered($props_id =NULL){

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

		$data['props_id']				= $props_id;
		$data['get_users']		        = $this->Promoter_db->get_user_refered($data['user_id'], $props_id);
		$data['content'] 				='back_end/get_user_refered_promoter';
		$this->load->view($this->admin_layout,$data);

    }

	
	public function product_promoting(){

        $this->session_checker->my_session();
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
		$total	=$this->Promoter_db->count_property_am_promoting($data['user_id']);
		$config['base_url'] = base_url().'Product/product_promoting';
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

        $data['get_property']      =$this->Promoter_db->get_property_am_promoting($data['user_id'], $data['offset'], $data['per_page']);

        $data['content']        ='back_end/product_promoting';
		$this->load->view($this->admin_layout,$data);
    }


}