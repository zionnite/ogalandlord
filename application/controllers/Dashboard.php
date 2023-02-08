<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends My_Controller {

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


		$data['content'] 		='back_end/index';
		$this->load->view($this->admin_layout,$data);
	}

	public function add_property(){
		$this->session_checker->my_session();
        $this->chat_online_tracker->check();

		$data['alert']			=$this->session->flashdata('alert');
		$data['content'] 		='back_end/add_property';
		$this->load->view($this->admin_layout,$data);
	}

    public function get_sub_property_type(){
		$types_of_property	=$this->input->post('types_of_property');
		$get_sub_type_name	=$this->Admin_db->get_sub_types_of_property_by_type_id($types_of_property);
		if(is_array($get_sub_type_name)){
			foreach($get_sub_type_name as $row){
				$sub_type_id	    =$row['id'];
				$sub_type_name		=$row['name'];
				echo $output    ='<option value="'.$sub_type_id.'">'.$sub_type_name.'</option>';
			}
		}else{
            echo '<option>This Property sub Type does not have a child yet</option>';
        }
	}
	
    public function get_sub_state(){
		$state_id	=$this->input->post('state');
		$get_sub_state_name	=$this->Admin_db->get_sub_state_by_state_id($state_id);
		if(is_array($get_sub_state_name)){
			foreach($get_sub_state_name as $row){
				$sub_state_id	    =$row['id'];
				$sub_state_name		=$row['name'];
				echo $output    ='<option value="'.$sub_state_id.'">'.$sub_state_name.'</option>';
			}
		}else{
            echo '<option value="0">No Sub-State</option>';
        }
	}

	public function insert_property(){
		$this->session_checker->my_session();
        $this->chat_online_tracker->check();
		
		if($this->input->post('submit')){
			$title							= $this->input->post('title');
			$purpose						= $this->input->post('purpose');
			$types_of_property				= $this->input->post('types_of_property');
			$sub_type_property				= $this->input->post('sub_type_property');
			$bedrooms						= $this->input->post('bedrooms');
			$bathrooms						= $this->input->post('bathrooms');
			$toilets						= $this->input->post('toilets');
			$state							= $this->input->post('state');
			$area							= $this->input->post('area');
			$price							= $this->input->post('price');
			$description					= $this->input->post('description');
			$youtube_video_link				= $this->input->post('youtube_video_link');
			$year_built						= $this->input->post('year_built');
			
			

			//Amenities
			$air_condition					= $this->input->post('air_condition');
			$balcony						= $this->input->post('balcony');
			$bedding						= $this->input->post('bedding');
			$cable_tv						= $this->input->post('cable_tv');
			$cleaning_after_exit			= $this->input->post('cleaning_after_exit');
			$cofee_pot						= $this->input->post('cofee_pot');
			$computer						= $this->input->post('computer');
			$cot							= $this->input->post('cot');
			$dishwasher						= $this->input->post('dishwasher');
			$dvd							= $this->input->post('dvd');
			$fan							= $this->input->post('fan');
			$fridge							= $this->input->post('fridge');
			$grill							= $this->input->post('grill');
			$hairdryer						= $this->input->post('hairdryer');
			$heater							= $this->input->post('heater');
			$hi_fi							= $this->input->post('hi_fi');
			$internet						= $this->input->post('internet');
			$iron							= $this->input->post('iron');
			$juicer							= $this->input->post('juicer');
			$lift							= $this->input->post('lift');
			$microwave						= $this->input->post('microwave');
			$microwave						= $this->input->post('microwave');
			$gym							= $this->input->post('gym');
			$fireplace						= $this->input->post('fireplace');
			$hot_tub						= $this->input->post('hot_tub');

			
			$action	=$this->Admin_db->insert_property($title,$purpose,$types_of_property,$sub_type_property,$bedrooms,$bathrooms,
				$toilets,$state,$area,$price,$description,$youtube_video_link,$air_condition,$balcony,$bedding,$cable_tv,$cleaning_after_exit,$cofee_pot,$computer,
				$cot,$dishwasher,$dvd,$fan,$fridge,$grill,$hairdryer,$heater,$hi_fi,$internet,$iron,$juicer,$lift,$microwave,$gym,$fireplace,$hot_tub,$year_built
			);
			
			if($action){

				$props_id	=$this->session->userdata('props_id');
				$this->success_alert_callbark('Property inserted, please fill the following detail');
				redirect('Dashboard/add_extra_detail/'.$props_id);
			}else{

				$this->failed_alert_callbark('Database Busy, Could not perform operation, Pls Try Again Later!');
				redirect('Dashboard/add_property');
			}

		}else{

			$this->failed_alert_callbark('You need to click the button to proceed this request');
			redirect('Dashboard/add_property');
		}

		
		
	}

	public function add_extra_detail($props_id =NULL){
		$data['alert']			=$this->session->flashdata('alert');

		$data['props_id']		=$props_id;
		$data['content'] 		='back_end/add_property_extra_details';
		$this->load->view($this->admin_layout,$data);
	}

	public function insert_property_detail(){
		if($this->input->post('submit')){
			$condition							= $this->input->post('condition');
			$caution_fee						= $this->input->post('caution_fee');
			$special_pref						= $this->input->post('special_pref');
			$shopping_mall						= $this->input->post('shopping_mall');
			$school								= $this->input->post('school');
			$hospital							= $this->input->post('hospital');
			$petrol_pump						= $this->input->post('petrol_pump');
			$airport							= $this->input->post('airport');
			$church								= $this->input->post('church');
			$mosque								= $this->input->post('mosque');
			$crime								= $this->input->post('crime');
			$traffic							= $this->input->post('traffic');
			$pollution							= $this->input->post('pollution');
			$education							= $this->input->post('education');
			$health								= $this->input->post('health');
			$props_id							= $this->input->post('props_id');
			
			

			
			$action	=$this->Admin_db->insert_property_detail($condition,$caution_fee,$special_pref,$shopping_mall,$hospital,
				$petrol_pump,$airport,$church,$mosque,$crime,$traffic,$pollution,$education,$health,$props_id,$school
			);
			
			if($action){

				$this->success_alert_callbark('Property inserted, please fill the following detail');
				redirect('Dashboard/add_image_to_property/'.$props_id);
			}else{
				$this->failed_alert_callbark('Database Busy, Could not perform operation, Pls Try Again Later!');
				redirect('Dashboard/add_extra_detail/'.$props_id);
			}

		}else{

			$this->failed_alert_callbark('You need to click the button to proceed this request');
			redirect('Dashboard/add_property');
		}

		
	}

	public function add_image_to_property($props_id =NULL){
		$data['alert']			=$this->session->flashdata('alert');

		$data['props_id']		=$props_id;
		$data['content'] 		='back_end/add_image_property';
		$this->load->view($this->admin_layout,$data);
	}

	public function upload($props_id=Null){

		@mkdir('project_dir');
		@mkdir('project_dir/property');
		$config["upload_path"] = './project_dir/property';
			$config["allowed_types"] = 'gif|jpg|png|jpeg';
			$config['overwrite'] = FALSE;
			$config['remove_spaces'] = TRUE;
			$config['encrypt_name'] = TRUE;
			$config['max_width'] = '800';
			$config['max_height'] = '500';
			$config['min_width'] = '800';
			$config['max_height'] = '500';
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			
			
			if(!$this->upload->do_upload()){

				$this->failed_alert_callbark('Error in Uploading Image'.$this->upload->display_errors().'Ensure image is in the right image Dimension');
			}else{
				
				$file_name	=$this->upload->data('file_name');
				$action		=$this->Admin_db->add_image_to_property($props_id,$file_name);
                if($action	==TRUE){

					$this->success_alert_callbark('Picture Added to Property');
                }else{
                            
					$this->failed_alert_callbark('Database Busy, Could not perform operation, Pls Try Again Later!');
                }
			}
			redirect('Dashboard/view_property/');
	}

	public function view_property(){
		$data['alert']			=$this->session->flashdata('alert');

		
		$data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
		$data['phone_no']         		=$this->session->userdata('phone_no');
		$data['user_img']         		=$this->session->userdata('user_img');
		$data['sex']         			=$this->session->userdata('sex');
		$data['age']         			=$this->session->userdata('age');
		$data['email']         			=$this->session->userdata('email');
		$data['full_name']         		=$this->session->userdata('full_name');

		$data['get_property']			=$this->Admin_db->get_agent_property($data['user_id']);

		$data['status']         		=$this->session->userdata('status');
		$data['content'] 				='back_end/manage_property';
		$this->load->view($this->admin_layout,$data);
	}


	public function edit_basic($props_id = NULL){
		$data['alert']			=$this->session->flashdata('alert');

		$data['props_id']		= $props_id;
		$data['content'] 		='back_end/edit_property';
		$this->load->view($this->admin_layout,$data);
	}


	public function edit_basic_property(){
		if($this->input->post('submit')){
			$title							= $this->input->post('title');
			$purpose						= $this->input->post('purpose');
			$types_of_property				= $this->input->post('types_of_property');
			$sub_type_property				= $this->input->post('sub_type_property');
			$bedrooms						= $this->input->post('bedrooms');
			$bathrooms						= $this->input->post('bathrooms');
			$toilets						= $this->input->post('toilets');
			$state							= $this->input->post('state');
			$area							= $this->input->post('area');
			$price							= $this->input->post('price');
			$description					= $this->input->post('description');
			$youtube_video_link				= $this->input->post('youtube_video_link');
			$year_built						= $this->input->post('year_built');
			$props_id						= $this->input->post('props_id');
			
			
	
			$action	=$this->Admin_db->edit_basic_property($title,$purpose,$types_of_property,$sub_type_property,$bedrooms,$bathrooms,
				$toilets,$state,$area,$price,$description,$youtube_video_link,$year_built,$props_id
			);
			
			if($action){

				$this->success_alert_callbark('Property Detail Updated');
				
				redirect('Dashboard/view_property');
			}else{
				$this->failed_alert_callbark('Database Busy, Could not perform operation, Pls Try Again Later!');
				redirect('Dashboard/view_property');
			}

		}else{

			$this->failed_alert_callbark('You need to click the button to proceed this request');
			redirect('Dashboard/view_property');
		}
	}
 

	public function edit_amenities($props_id = NULL){
		$data['alert']			=$this->session->flashdata('alert');

		$data['props_id']		= $props_id;
		$data['content'] 		='back_end/edit_amenities';
		$this->load->view($this->admin_layout,$data);
	}


	public function edit_amenities_property(){
		if($this->input->post('submit')){

			$air_condition					= $this->input->post('air_condition');
			$balcony						= $this->input->post('balcony');
			$bedding						= $this->input->post('bedding');
			$cable_tv						= $this->input->post('cable_tv');
			$cleaning_after_exit			= $this->input->post('cleaning_after_exit');
			$cofee_pot						= $this->input->post('cofee_pot');
			$computer						= $this->input->post('computer');
			$cot							= $this->input->post('cot');
			$dishwasher						= $this->input->post('dishwasher');
			$dvd							= $this->input->post('dvd');
			$fan							= $this->input->post('fan');
			$fridge							= $this->input->post('fridge');
			$grill							= $this->input->post('grill');
			$hairdryer						= $this->input->post('hairdryer');
			$heater							= $this->input->post('heater');
			$hi_fi							= $this->input->post('hi_fi');
			$internet						= $this->input->post('internet');
			$iron							= $this->input->post('iron');
			$juicer							= $this->input->post('juicer');
			$lift							= $this->input->post('lift');
			$microwave						= $this->input->post('microwave');
			$microwave						= $this->input->post('microwave');
			$gym							= $this->input->post('gym');
			$fireplace						= $this->input->post('fireplace');
			$hot_tub						= $this->input->post('hot_tub');

			$props_id						= $this->input->post('props_id');
			
			
	
			$action	=$this->Admin_db->edit_amenities_property($air_condition,$balcony,$bedding,$cable_tv,$cleaning_after_exit,$cofee_pot,$computer,
				$cot,$dishwasher,$dvd,$fan,$fridge,$grill,$hairdryer,$heater,$hi_fi,$internet,$iron,$juicer,$lift,$microwave,$gym,$fireplace,$hot_tub,$props_id
			);
			
			if($action){

				$this->success_alert_callbark('Property Detail Updated');
				redirect('Dashboard/view_property');
			}else{

				$this->failed_alert_callbark('Database Busy, Could not perform operation, Pls Try Again Later!');
				redirect('Dashboard/view_property');
			}

		}else{

			$this->failed_alert_callbark('You need to click the button to proceed this request');
			redirect('Dashboard/view_property');
		}
	}
 

	public function edit_extra_detail($props_id = NULL){
		$data['alert']			=$this->session->flashdata('alert');

		$data['props_id']		= $props_id;
		$data['content'] 		='back_end/edit_extra_detail';
		$this->load->view($this->admin_layout,$data);
	}


	public function edit_extra_property(){
		if($this->input->post('submit')){

			$condition							= $this->input->post('condition');
			$caution_fee						= $this->input->post('caution_fee');
			$special_pref						= $this->input->post('special_pref');
			$shopping_mall						= $this->input->post('shopping_mall');
			$school								= $this->input->post('school');
			$hospital							= $this->input->post('hospital');
			$petrol_pump						= $this->input->post('petrol_pump');
			$airport							= $this->input->post('airport');
			$church								= $this->input->post('church');
			$mosque								= $this->input->post('mosque');
			$crime								= $this->input->post('crime');
			$traffic							= $this->input->post('traffic');
			$pollution							= $this->input->post('pollution');
			$education							= $this->input->post('education');
			$health								= $this->input->post('health');
			$props_id							= $this->input->post('props_id');

			$props_id						= $this->input->post('props_id');
			
			
	
			$action	=$this->Admin_db->edit_extra_property($condition,$caution_fee,$special_pref,$shopping_mall,$hospital,
				$petrol_pump,$airport,$church,$mosque,$crime,$traffic,$pollution,$education,$health,$props_id,$school
			);
			
			if($action){

				$this->success_alert_callbark('Property Detail Updated');
				redirect('Dashboard/view_property');
			}else{

				$this->failed_alert_callbark('Database Busy, Could not perform operation, Pls Try Again Later!');
				redirect('Dashboard/view_property');
			}

		}else{

			$this->failed_alert_callbark('You need to click the button to proceed this request');
			redirect('Dashboard/view_property');
		}
	}
 
	public function manage_property_image($props_id = NULL){
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
		$data['get_props_image']		= $this->Admin_db->get_all_props_image($data['props_id']);
		$data['content'] 				='back_end/manage_property_image';
		$this->load->view($this->admin_layout,$data);
	}

	public function add_image_property($props_id = NULL){
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
		$data['content'] 				='back_end/add_image_property_2';
		$this->load->view($this->admin_layout,$data);
	}

	public function insert_image_property(){
        if($this->input->post('submit')){	
			$props_id     	=$this->input->post('props_id');            
            
            	@mkdir('project_dir');
            	@mkdir('project_dir/property');
				$site_logo_1['upload_path'] = './project_dir/property';
				$site_logo_1['allowed_types'] = 'png|jpeg|jpg|gif';
				$site_logo_1['max_size']= '';
				$site_logo_1['overwrite'] = FALSE;
				$site_logo_1['remove_spaces'] = TRUE;
				$site_logo_1['encrypt_name'] = TRUE;
				$site_logo_1['max_width'] = '800';
				$site_logo_1['max_height'] = '500';
				$site_logo_1['min_width'] = '800';
				$site_logo_1['max_height'] = '500';

				$this->upload->initialize($site_logo_1);
				$this->load->library('upload', $site_logo_1);

				if(!$this->upload->do_upload('file')) {
					
					$this->failed_alert_callbark('Error in Uploading Image'.$this->upload->display_errors().'Ensure image is in the right image Dimension');
				}else{
                    $file_name	=$this->upload->data('file_name');
                    $insert	=$this->Admin_db->add_image_property_2($file_name,$props_id);
                    if($insert	==TRUE){

						$this->success_alert_callbark('Picture Added to Property');
                    }else{
                            
						$this->failed_alert_callbark('Database Busy, Could not perform operation, Pls Try Again Later!');
                    }
					
				}

			}else{
			
			$this->failed_alert_callbark('Please Use The Submit button to continue');
		}

		redirect('Dashboard/manage_property_image/'.$props_id);
    }

	public function add_feature_image($props_id = NULL){
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
		$data['content'] 				='back_end/add_feature_image';
		$this->load->view($this->admin_layout,$data);
	}

	public function insert_feature_image(){
        if($this->input->post('submit')){	
			$props_id     	=$this->input->post('props_id');            
            
            	@mkdir('project_dir');
            	@mkdir('project_dir/property');
				$site_logo_1['upload_path'] = './project_dir/property';
				$site_logo_1['allowed_types'] = 'png|jpeg|jpg|gif';
				$site_logo_1['max_size']= '';
				$site_logo_1['overwrite'] = FALSE;
				$site_logo_1['remove_spaces'] = TRUE;
				$site_logo_1['encrypt_name'] = TRUE;
				$site_logo_1['max_width'] = '1300';
				$site_logo_1['max_height'] = '450';
               	$site_logo_1['min_width'] = '1300';
				$site_logo_1['min_height'] = '450';

				$this->upload->initialize($site_logo_1);
				$this->load->library('upload', $site_logo_1);

				if(!$this->upload->do_upload('file')) {
					
					$this->failed_alert_callbark('Error in Uploading Image'.$this->upload->display_errors().'Ensure image is in the right image Dimension');
				}else{
                    $file_name	=$this->upload->data('file_name');
                    $insert	=$this->Admin_db->insert_feature_image($file_name,$props_id);
                    if($insert	==TRUE){

						$this->success_alert_callbark('Feature Picture Added to Property');
                    }else{
                            
						$this->failed_alert_callbark('Database Busy, Could not perform operation, Pls Try Again Later!');
                    }
					
				}

			}else{
			
			$this->failed_alert_callbark('Please Use The Submit button to continue');
		}

		redirect('Dashboard/manage_property_image/'.$props_id);
    }

	public function delete_image($props_id =NULL, $image_id =NULL){
		$action		= $this->Admin_db->delete_image_by_id($image_id);
		if($action){
			$this->success_alert_callbark('Image Removed from list');
		}else{
			$this->failed_alert_callbark('Database Busy, Could not perform operation, Pls Try Again Later!');
		}
		redirect('Dashboard/manage_property_image/'.$props_id);
	}

	public function delete_property($props_id =NULL){
		$action		= $this->Admin_db->delete_property($props_id);
		if($action){
			$this->success_alert_callbark('Property Removed From List');
		}else{
			$this->failed_alert_callbark('Database Busy, Could not perform operation, Pls Try Again Later!');
		}
		redirect('Dashboard/view_property');
	}

	public function submit_property($props_id =NULL){
		$action		= $this->Admin_db->submit_property($props_id);
		if($action){
			$this->success_alert_callbark('Awaiting Admin to Review Property, <br /> this may take awhile');
		}else{
			$this->failed_alert_callbark('Database Busy, Could not perform operation, Pls Try Again Later!');
		}
		redirect('Dashboard/view_property');
	}

	public function delete_feature_image($props_id =NULL){
		$action		= $this->Admin_db->delete_feature_image($props_id);
		if($action){
			$this->success_alert_callbark('Feature Image Removed');
		}else{
			$this->failed_alert_callbark('Database Busy, Could not perform operation, Pls Try Again Later!');
		}
		redirect('Dashboard/manage_property_image/'.$props_id);
	}

	public function approve_feature_image($props_id =NULL){
		$action		= $this->Admin_db->approve_feature_image($props_id);
		if($action){
			$this->success_alert_callbark('Feature Image is Approve');
		}else{
			$this->failed_alert_callbark('Database Busy, Could not perform operation, Pls Try Again Later!');
		}
		redirect('Dashboard/manage_property_image/'.$props_id);
	}

	public function unapprove_feature_image($props_id =NULL){
		$action		= $this->Admin_db->unapprove_feature_image($props_id);
		if($action){
			$this->success_alert_callbark('Feature Image is Rejected');
		}else{
			$this->failed_alert_callbark('Database Busy, Could not perform operation, Pls Try Again Later!');
		}
		redirect('Dashboard/manage_property_image/'.$props_id);
	}

	public function view_favourite(){

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
		$total	=$this->Admin_db->count_user_favourite($data['user_id']);
		$config['base_url'] = base_url().'Admin_panel/view_favourite';
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

        $data['get_fav']      =$this->Admin_db->get_user_favourite($data['user_id'], $data['offset'], $data['per_page']);

        $data['content']        ='back_end/view_favourite';
		$this->load->view($this->admin_layout,$data);
    }

	public function delete_favourite($props_id =NULL){
		$action		= $this->Admin_db->delete_favourite($props_id);
		if($action){
			$this->success_alert_callbark('Property Removed From List');
		}else{
			$this->failed_alert_callbark('Database Busy, Could not perform operation, Pls Try Again Later!');
		}
		redirect('Dashboard/view_favourite');
	}

	/*Messaging System*/

	

}






