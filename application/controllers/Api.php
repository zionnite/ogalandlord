<?php
class Api extends My_Controller{
    public function __construct(){
        parent::__construct();
    }


    public function count_all_product(){
		return $this->db->from('propery')->count_all_results();
	} 

    //====== 1
    public function get_all_product($page=NULL, $user_id =NULL){
        $msg    = array();
        $start = 0;
        $limit = 5;
        $total    =$this->count_all_product();

        if($page > $total) {

            $msg  = array('status'=>'end 1');
            echo json_encode($msg);
        }else{

            $start = ($page - 1) * $limit;
            $this->db->limit($limit,$start);
            $this->db->order_by('id','asc');

            $query      =$this->db->get('propery');
            if($query->num_rows() > 0){
                $dis_data   = array();

                foreach($query->result_array() as $row){

                    $props_id                           = $row['id'];
                    $props_agent_id                     = $row['agent_id'];
                    $props_name                         = $row['prop_name'];
                    $props_location                     = $row['prop_location'];
                    $props_img_name                     = $row['prop_img_name'];
                    $props_img_name                     = base_url().'project_dir/property/'.$props_img_name;
                    $props_vid_id                       = $row['prop_vid_id'];
                    $props_type                         = $row['prop_type'];
                    $props_purpose                      = $row['prop_purpose'];
                    $props_status                       = $row['prop_status'];
                    $props_bedrom                       = $row['prop_bedrom'];
                    $props_bed                          = $row['prop_bed'];
                    $props_bathroom                     = $row['prop_bathroom'];
                    $props_toilet                       = $row['prop_toilet'];
                    $props_home_area                    = $row['prop_home_area'];
                    $props_lot_area                     = $row['prop_lot_area'];
                    $props_year_built                   = $row['prop_year_built'];
                    $props_created                      = $row['date_created'];
                    $props_state_id                     = $row['state_id'];
                    $props_sub_state_id                 = $row['sub_state_id'];
                    $props_type_of_propery              = $row['type_of_propery'];
                    $props_sub_type_of_propery          = $row['sub_type_of_propery'];
                    $props_price                        = $row['price'];
                    $props_description                  = $row['description'];
                    $prop_mode                          = $row['prop_mode'];
                    $props_live_status                  = $row['live_status'];
                    $slider_img                         = $row['slider_img'];
                    $slider_img                         = base_url().'project_dir/property/'.$slider_img;

                    $prop_mode                          = ucfirst(str_replace("_"," ",$prop_mode));

                    //get facilities
                    $props_shopping_mall                = $this->ApiAdmin_db->props_shopping_mall($props_id);
                    $props_hospital                     = $this->ApiAdmin_db->props_hospital($props_id);
                    $props_school                       = $this->ApiAdmin_db->props_school($props_id);
                    $props_petrol_pump                  = $this->ApiAdmin_db->props_petrol_pump($props_id);
                    $props_airport                      = $this->ApiAdmin_db->props_airport($props_id);
                    $props_church                       = $this->ApiAdmin_db->props_church($props_id);
                    $props_mosque                       = $this->ApiAdmin_db->props_mosque($props_id);

                    //get amenities
                    $props_air_condition                = $this->ApiAdmin_db->props_air_condition($props_id);
                    $props_balcony                      = $this->ApiAdmin_db->props_balcony($props_id);
                    $props_bedding                      = $this->ApiAdmin_db->props_bedding($props_id);
                    $props_cable_tv                     = $this->ApiAdmin_db->props_cable_tv($props_id);
                    $props_cleaning_after_exit          = $this->ApiAdmin_db->props_cleaning_after_exit($props_id);
                    $props_cofee_pot                    = $this->ApiAdmin_db->props_cofee_pot($props_id);
                    $props_computer                     = $this->ApiAdmin_db->props_computer($props_id);
                    $props_cot                          = $this->ApiAdmin_db->props_cot($props_id);
                    $props_dishwasher                   = $this->ApiAdmin_db->props_dishwasher($props_id);
                    $props_dvd                          = $this->ApiAdmin_db->props_dvd($props_id);
                    $props_fan                          = $this->ApiAdmin_db->props_fan($props_id);
                    $props_fridge                       = $this->ApiAdmin_db->props_fridge($props_id);
                    $props_grill                        = $this->ApiAdmin_db->props_grill($props_id);
                    $props_hairdryer                    = $this->ApiAdmin_db->props_hairdryer($props_id);
                    $props_heater                       = $this->ApiAdmin_db->props_heater($props_id);
                    $props_hi_fi                        = $this->ApiAdmin_db->props_hi_fi($props_id);
                    $props_internet                     = $this->ApiAdmin_db->props_internet($props_id);
                    $props_iron                         = $this->ApiAdmin_db->props_iron($props_id);
                    $props_juicer                       = $this->ApiAdmin_db->props_juicer($props_id);
                    $props_lift                         = $this->ApiAdmin_db->props_lift($props_id);
                    $props_microwave                    = $this->ApiAdmin_db->props_microwave($props_id);
                    $props_gym                          = $this->ApiAdmin_db->props_gym($props_id);
                    $props_fireplace                    = $this->ApiAdmin_db->props_fireplace($props_id);
                    $props_hot_tub                      = $this->ApiAdmin_db->props_hot_tub($props_id);


                    //get valuation
                    $props_crime                        = $this->ApiAdmin_db->props_crime($props_id);
                    $props_traffic                      = $this->ApiAdmin_db->props_traffic($props_id);
                    $props_pollution                    = $this->ApiAdmin_db->props_pollution($props_id);
                    $props_education                    = $this->ApiAdmin_db->props_education($props_id);
                    $props_health                       = $this->ApiAdmin_db->props_health($props_id);


                    //get Details
                    $props_condition                    = $this->ApiAdmin_db->props_condition($props_id);
                    $props_caution_fee                  = $this->ApiAdmin_db->props_caution_fee($props_id);
                    $props_special_pref                 = $this->ApiAdmin_db->props_special_pref($props_id);

                    //get_all_props_image
                    $get_all_props_image                = $this->ApiAdmin_db->get_all_props_image_2($props_id);

                    //get_all_props_video
                    $get_all_props_video                = $this->ApiAdmin_db->get_all_props_video($props_id);

                    $get_state_name                     =$this->ApiAdmin_db->get_state_name_state_id($props_state_id);
                    $get_sub_state_name                 =$this->ApiAdmin_db->get_sub_state_name_sub_state_id($props_sub_state_id);                                    

                    $count_props_image                  = $this->Property_db->count_prop_images($props_id);
                    $favourite                          = $this->Users_db->check_if_i_favourite($user_id,$props_id);

                    $type_name                          = $this->ApiAdmin_db->get_types_of_property_name_by_id($props_type_of_propery);
                    $sub_type_name                      = $this->ApiAdmin_db->get_sub_types_of_property_name_by_id($props_type_of_propery);

                    //Agent
                    $agent_full_name                    = $this->Users_db->get_user_full_name_by_id($props_agent_id);
                    $agent_image_name                   = $this->Users_db->get_image_name_by_id($props_agent_id);
                    $agent_email                        = $this->Users_db->get_email_by_id($props_agent_id);
                    $agent_status                       = $this->Users_db->get_status_by_id($props_agent_id);
                    $agent_user_name                    = $this->Users_db->get_user_name_by_id($props_agent_id);
                    $agent_user_phone                   = $this->Users_db->get_user_phone_by_id($props_agent_id);
                    $agent_prop_counter                 = $this->Property_db->count_all_user_property($props_agent_id);


                    $agent_email                        = substr_replace($agent_email, 'XXXXXXXX', '5', '5');
                    $agent_user_phone                   = substr_replace($agent_user_phone, 'XXXXX', '3', '5');
                    


                    $dis_data[]      = array(
                        'props_id'                              =>  $props_id,
                        'props_agent_id'                        =>  $props_agent_id,
                        'props_name'                            =>  $props_name,
                        'props_location'                        =>  $props_location,
                        'props_img_name'                        =>  $props_img_name,
                        'props_vid_id'                          =>  $props_vid_id,
                        'props_type'                            =>  $props_type,
                        'props_purpose'                         =>  $props_purpose,
                        'props_status'                          =>  $props_status,
                        'props_bedrom'                          =>  $props_bedrom,
                        'props_bed'                             =>  $props_bed,
                        'props_bathroom'                        =>  $props_bathroom,
                        'props_toilet'                          =>  $props_toilet,
                        'props_home_area'                       =>  $props_home_area,
                        'props_lot_area'                        =>  $props_lot_area,
                        'props_year_built'                      =>  $props_year_built,
                        'props_created'                         =>  $props_created,
                        'props_state_id'                        =>  $props_state_id,
                        'props_sub_state_id'                    =>  $props_sub_state_id,
                        'props_type_of_propery'                 =>  $props_type_of_propery,
                        'props_sub_type_of_propery'             =>  $props_sub_type_of_propery,
                        'props_price'                           =>  $props_price,
                        'props_description'                     =>  $props_description,
                        'prop_mode'                             =>  $prop_mode,
                        //facilities
                        'props_shopping_mall'                   =>  $props_shopping_mall,
                        'props_hospital'                        =>  $props_hospital,
                        'props_school'                          =>  $props_school,
                        'props_petrol_pump'                     =>  $props_petrol_pump,
                        'props_airport'                         =>  $props_airport,
                        'props_church'                          =>  $props_church,
                        'props_mosque'                          =>  $props_mosque,
                        //get amenities
                        'props_air_condition'                   =>  $props_air_condition,
                        'props_balcony'                         =>  $props_balcony,
                        'props_bedding'                         =>  $props_bedding,
                        'props_cable_tv'                        =>  $props_cable_tv,
                        'props_cleaning_after_exit'             =>  $props_cleaning_after_exit,
                        'props_cofee_pot'                       =>  $props_cofee_pot,
                        'props_computer'                        =>  $props_computer,
                        'props_cot'                             =>  $props_cot,
                        'props_dishwasher'                      =>  $props_dishwasher,
                        'props_dvd'                             =>  $props_dvd,
                        'props_fan'                             =>  $props_fan,
                        'props_fridge'                          =>  $props_fridge,
                        'props_grill'                           =>  $props_grill,
                        'props_hairdryer'                       =>  $props_hairdryer,
                        'props_heater'                          =>  $props_heater,
                        'props_hi_fi'                           =>  $props_hi_fi,
                        'props_internet'                        =>  $props_internet,
                        'props_iron'                            =>  $props_iron,
                        'props_juicer'                          =>  $props_juicer,
                        'props_lift'                            =>  $props_lift,
                        'props_microwave'                       =>  $props_microwave,
                        'props_gym'                             =>  $props_gym,
                        'props_fireplace'                       =>  $props_fireplace,
                        'props_hot_tub'                         =>  $props_hot_tub,
                        //get valuation
                        'props_crime'                           =>  $props_crime,
                        'props_traffic'                         =>  $props_traffic,
                        'props_pollution'                       =>  $props_pollution,
                        'props_education'                       =>  $props_education,
                        'props_health'                          =>  $props_health,

                        //get Details
                        'props_condition'                       =>  $props_condition,
                        'props_caution_fee'                     =>  $props_caution_fee,
                        'props_special_pref'                    =>  $props_special_pref,

                        //get_all_props_image
                        //get_all_props_video
                        'props_live_status'                     =>  $props_live_status,
                        'slider_img'                            =>  $slider_img,
                        'get_all_props_image'                   =>  $get_all_props_image,
                        'get_all_props_video'                   =>  $get_all_props_video,

                        //caution fee
                        'get_state_name'                        =>  $get_state_name,
                        'get_sub_state_name'                    =>  $get_sub_state_name,

                        'count_props_image'                     =>  $count_props_image,
                        'favourite'                             =>  $favourite,
                        'type_name'                             =>  $type_name,
                        'sub_type_name'                         =>  $sub_type_name,
                        
                        //Agent Detail
                        'agent_full_name'                       =>  $agent_full_name,
                        'agent_image_name'                      =>  $agent_image_name,
                        'agent_email'                           =>  $agent_email,
                        'agent_status'                          =>  $agent_status,
                        'agent_user_name'                       =>  $agent_user_name,
                        'agent_user_phone'                      =>  $agent_user_phone,
                        'agent_prop_counter'                    =>  $agent_prop_counter
                    );
                }

                if (count($dis_data) != 0) {
                    $msg['status']      = 'success';
                    $msg['product']    = $dis_data;
                    echo json_encode($msg);
                }
            }
            else {
                $msg  = array('status' => 'end 2');
                echo json_encode($msg);
                
            }
            
            
        }
    }

    public function toggle_product(){
        $user_id        = $this->input->post('user_id');
        $props_id       = $this->input->post('props_id');

        $msg = array();

        
        if($this->Users_db->check_if_i_favourite($user_id,$props_id)){
            //delete
            $this->db->where('user_id',$user_id);
            $this->db->where('prop_id',$props_id);
            $this->db->delete('favourite');

            if($this->db->affected_rows() > 0){
                $msg['status'] = 'unliked';
            }else {
                $msg['status'] = 'false';
            }
        }else{
            //insert
            $data       = array('user_id' => $user_id,'prop_id'=>$props_id);
            $this->db->set($data);
            $this->db->insert('favourite');

            if($this->db->affected_rows() > 0){
                $msg['status'] = 'liked';
            }
            else{
                $msg['status'] = 'false';
            }
        }



        //
        echo json_encode($msg);
    }

    public function request_inspection(){
        $user_id        = $this->input->post('user_id');
        $props_id       = $this->input->post('props_id');
        $agent_id       = $this->input->post('agent_id');

        $msg = array();

        $user_status                   = $this->Users_db->get_user_status($user_id);

		$title							="Site  Inspection";
		$desc							="A User of has requested for site Inspection";

		$checker			=$this->Request_db->check_if_user_n_props_exist_in_request(
												$user_id,
												$agent_id,
												$props_id
											);
		if($checker){
			$msg['status']  = 'You already initiated a Request';
		}else{

			if($user_status == 'user'){
				$action		= $this->Request_db->insert_into_request_tbl($user_id,$agent_id,$props_id,$title,$desc);
				if($action){
					$msg['status']  = 'Inpsection has been requested, Awaiting Admin feedback';
				}else{
					$msg['status']  = 'Database Busy, Could not perform operation, Pls Try Again Later!';
				}
			}else{
				$msg['status']  = 'This feature is available only to Users not Landlord ( or Agent)';
			}
			
		}
        echo json_encode($msg);
    }

    //======= 2
    public function search_product($page = NULL, $user_id = NULL){
        $search_term    = $this->input->post('search_term');
        
        $msg    = array();
        $start = 0;
        $limit = 5;

        $total    = $this->ApiAdmin_db->count_product_search($search_term);

        if ($page > $total) {
            $msg  = array('status' => 'end');
            echo json_encode($msg);
        } else {

            $msg    = array();
            $start = ($page - 1) * $limit;

            $this->db->limit($limit, $start);
            $this->db->order_by('id', 'asc');

            $this->db->like('prop_name', $this->db->escape_like_str($search_term, 'both'));
            $this->db->or_like('description', $this->db->escape_like_str($search_term, 'both'));

            $query      =$this->db->get('propery');
            if($query->num_rows() > 0){

                $dis_data    = array();
                foreach($query->result_array() as $row){

                    $props_id                           = $row['id'];
                    $props_agent_id                     = $row['agent_id'];
                    $props_name                         = $row['prop_name'];
                    $props_location                     = $row['prop_location'];
                    $props_img_name                     = $row['prop_img_name'];
                    $props_img_name                     = base_url().'project_dir/property/'.$props_img_name;
                    $props_vid_id                       = $row['prop_vid_id'];
                    $props_type                         = $row['prop_type'];
                    $props_purpose                      = $row['prop_purpose'];
                    $props_status                       = $row['prop_status'];
                    $props_bedrom                       = $row['prop_bedrom'];
                    $props_bed                          = $row['prop_bed'];
                    $props_bathroom                     = $row['prop_bathroom'];
                    $props_toilet                       = $row['prop_toilet'];
                    $props_home_area                    = $row['prop_home_area'];
                    $props_lot_area                     = $row['prop_lot_area'];
                    $props_year_built                   = $row['prop_year_built'];
                    $props_created                      = $row['date_created'];
                    $props_state_id                     = $row['state_id'];
                    $props_sub_state_id                 = $row['sub_state_id'];
                    $props_type_of_propery              = $row['type_of_propery'];
                    $props_sub_type_of_propery          = $row['sub_type_of_propery'];
                    $props_price                        = $row['price'];
                    $props_description                  = $row['description'];
                    $prop_mode                          = $row['prop_mode'];
                    $props_live_status                  = $row['live_status'];
                    $slider_img                         = $row['slider_img'];
                    $slider_img                         = base_url().'project_dir/property/'.$slider_img;

                    $prop_mode                          = ucfirst(str_replace("_"," ",$prop_mode));

                    //get facilities
                    $props_shopping_mall                = $this->ApiAdmin_db->props_shopping_mall($props_id);
                    $props_hospital                     = $this->ApiAdmin_db->props_hospital($props_id);
                    $props_school                       = $this->ApiAdmin_db->props_school($props_id);
                    $props_petrol_pump                  = $this->ApiAdmin_db->props_petrol_pump($props_id);
                    $props_airport                      = $this->ApiAdmin_db->props_airport($props_id);
                    $props_church                       = $this->ApiAdmin_db->props_church($props_id);
                    $props_mosque                       = $this->ApiAdmin_db->props_mosque($props_id);

                    //get amenities
                    $props_air_condition                = $this->ApiAdmin_db->props_air_condition($props_id);
                    $props_balcony                      = $this->ApiAdmin_db->props_balcony($props_id);
                    $props_bedding                      = $this->ApiAdmin_db->props_bedding($props_id);
                    $props_cable_tv                     = $this->ApiAdmin_db->props_cable_tv($props_id);
                    $props_cleaning_after_exit          = $this->ApiAdmin_db->props_cleaning_after_exit($props_id);
                    $props_cofee_pot                    = $this->ApiAdmin_db->props_cofee_pot($props_id);
                    $props_computer                     = $this->ApiAdmin_db->props_computer($props_id);
                    $props_cot                          = $this->ApiAdmin_db->props_cot($props_id);
                    $props_dishwasher                   = $this->ApiAdmin_db->props_dishwasher($props_id);
                    $props_dvd                          = $this->ApiAdmin_db->props_dvd($props_id);
                    $props_fan                          = $this->ApiAdmin_db->props_fan($props_id);
                    $props_fridge                       = $this->ApiAdmin_db->props_fridge($props_id);
                    $props_grill                        = $this->ApiAdmin_db->props_grill($props_id);
                    $props_hairdryer                    = $this->ApiAdmin_db->props_hairdryer($props_id);
                    $props_heater                       = $this->ApiAdmin_db->props_heater($props_id);
                    $props_hi_fi                        = $this->ApiAdmin_db->props_hi_fi($props_id);
                    $props_internet                     = $this->ApiAdmin_db->props_internet($props_id);
                    $props_iron                         = $this->ApiAdmin_db->props_iron($props_id);
                    $props_juicer                       = $this->ApiAdmin_db->props_juicer($props_id);
                    $props_lift                         = $this->ApiAdmin_db->props_lift($props_id);
                    $props_microwave                    = $this->ApiAdmin_db->props_microwave($props_id);
                    $props_gym                          = $this->ApiAdmin_db->props_gym($props_id);
                    $props_fireplace                    = $this->ApiAdmin_db->props_fireplace($props_id);
                    $props_hot_tub                      = $this->ApiAdmin_db->props_hot_tub($props_id);


                    //get valuation
                    $props_crime                        = $this->ApiAdmin_db->props_crime($props_id);
                    $props_traffic                      = $this->ApiAdmin_db->props_traffic($props_id);
                    $props_pollution                    = $this->ApiAdmin_db->props_pollution($props_id);
                    $props_education                    = $this->ApiAdmin_db->props_education($props_id);
                    $props_health                       = $this->ApiAdmin_db->props_health($props_id);


                    //get Details
                    $props_condition                    = $this->ApiAdmin_db->props_condition($props_id);
                    $props_caution_fee                  = $this->ApiAdmin_db->props_caution_fee($props_id);
                    $props_special_pref                 = $this->ApiAdmin_db->props_special_pref($props_id);

                    //get_all_props_image
                    $get_all_props_image                = $this->ApiAdmin_db->get_all_props_image_2($props_id);

                    //get_all_props_video
                    $get_all_props_video                = $this->ApiAdmin_db->get_all_props_video($props_id);

                    $get_state_name                     =$this->ApiAdmin_db->get_state_name_state_id($props_state_id);
                    $get_sub_state_name                 =$this->ApiAdmin_db->get_sub_state_name_sub_state_id($props_sub_state_id);                                    

                    $count_props_image                  = $this->Property_db->count_prop_images($props_id);
                    $favourite                          = $this->Users_db->check_if_i_favourite($user_id,$props_id);

                    $type_name                          = $this->ApiAdmin_db->get_types_of_property_name_by_id($props_type_of_propery);
                    $sub_type_name                      = $this->ApiAdmin_db->get_sub_types_of_property_name_by_id($props_type_of_propery);

                    //Agent
                    $agent_full_name                    = $this->Users_db->get_user_full_name_by_id($props_agent_id);
                    $agent_image_name                   = $this->Users_db->get_image_name_by_id($props_agent_id);
                    $agent_email                        = $this->Users_db->get_email_by_id($props_agent_id);
                    $agent_status                       = $this->Users_db->get_status_by_id($props_agent_id);
                    $agent_user_name                    = $this->Users_db->get_user_name_by_id($props_agent_id);
                    $agent_user_phone                   = $this->Users_db->get_user_phone_by_id($props_agent_id);
                    $agent_prop_counter                 = $this->Property_db->count_all_user_property($props_agent_id);


                    $agent_email                        = substr_replace($agent_email, 'XXXXXXXX', '5', '5');
                    $agent_user_phone                   = substr_replace($agent_user_phone, 'XXXXX', '3', '5');
                    


                    $dis_data[]      = array(
                        'props_id'                              =>  $props_id,
                        'props_agent_id'                        =>  $props_agent_id,
                        'props_name'                            =>  $props_name,
                        'props_location'                        =>  $props_location,
                        'props_img_name'                        =>  $props_img_name,
                        'props_vid_id'                          =>  $props_vid_id,
                        'props_type'                            =>  $props_type,
                        'props_purpose'                         =>  $props_purpose,
                        'props_status'                          =>  $props_status,
                        'props_bedrom'                          =>  $props_bedrom,
                        'props_bed'                             =>  $props_bed,
                        'props_bathroom'                        =>  $props_bathroom,
                        'props_toilet'                          =>  $props_toilet,
                        'props_home_area'                       =>  $props_home_area,
                        'props_lot_area'                        =>  $props_lot_area,
                        'props_year_built'                      =>  $props_year_built,
                        'props_created'                         =>  $props_created,
                        'props_state_id'                        =>  $props_state_id,
                        'props_sub_state_id'                    =>  $props_sub_state_id,
                        'props_type_of_propery'                 =>  $props_type_of_propery,
                        'props_sub_type_of_propery'             =>  $props_sub_type_of_propery,
                        'props_price'                           =>  $props_price,
                        'props_description'                     =>  $props_description,
                        'prop_mode'                             =>  $prop_mode,
                        //facilities
                        'props_shopping_mall'                   =>  $props_shopping_mall,
                        'props_hospital'                        =>  $props_hospital,
                        'props_school'                          =>  $props_school,
                        'props_petrol_pump'                     =>  $props_petrol_pump,
                        'props_airport'                         =>  $props_airport,
                        'props_church'                          =>  $props_church,
                        'props_mosque'                          =>  $props_mosque,
                        //get amenities
                        'props_air_condition'                   =>  $props_air_condition,
                        'props_balcony'                         =>  $props_balcony,
                        'props_bedding'                         =>  $props_bedding,
                        'props_cable_tv'                        =>  $props_cable_tv,
                        'props_cleaning_after_exit'             =>  $props_cleaning_after_exit,
                        'props_cofee_pot'                       =>  $props_cofee_pot,
                        'props_computer'                        =>  $props_computer,
                        'props_cot'                             =>  $props_cot,
                        'props_dishwasher'                      =>  $props_dishwasher,
                        'props_dvd'                             =>  $props_dvd,
                        'props_fan'                             =>  $props_fan,
                        'props_fridge'                          =>  $props_fridge,
                        'props_grill'                           =>  $props_grill,
                        'props_hairdryer'                       =>  $props_hairdryer,
                        'props_heater'                          =>  $props_heater,
                        'props_hi_fi'                           =>  $props_hi_fi,
                        'props_internet'                        =>  $props_internet,
                        'props_iron'                            =>  $props_iron,
                        'props_juicer'                          =>  $props_juicer,
                        'props_lift'                            =>  $props_lift,
                        'props_microwave'                       =>  $props_microwave,
                        'props_gym'                             =>  $props_gym,
                        'props_fireplace'                       =>  $props_fireplace,
                        'props_hot_tub'                         =>  $props_hot_tub,
                        //get valuation
                        'props_crime'                           =>  $props_crime,
                        'props_traffic'                         =>  $props_traffic,
                        'props_pollution'                       =>  $props_pollution,
                        'props_education'                       =>  $props_education,
                        'props_health'                          =>  $props_health,

                        //get Details
                        'props_condition'                       =>  $props_condition,
                        'props_caution_fee'                     =>  $props_caution_fee,
                        'props_special_pref'                    =>  $props_special_pref,

                        //get_all_props_image
                        //get_all_props_video
                        'props_description'                     =>  $props_description,
                        'slider_img'                            =>  $slider_img,
                        'get_all_props_image'                   =>  $get_all_props_image,
                        'get_all_props_video'                   =>  $get_all_props_video,

                        //caution fee
                        'get_state_name'                        =>  $get_state_name,
                        'get_sub_state_name'                    =>  $get_sub_state_name,

                        'count_props_image'                     =>  $count_props_image,
                        'favourite'                             =>  $favourite,
                        'type_name'                             =>  $type_name,
                        'sub_type_name'                         =>  $sub_type_name,
                        
                        //Agent Detail
                        'agent_full_name'                       =>  $agent_full_name,
                        'agent_image_name'                      =>  $agent_image_name,
                        'agent_email'                           =>  $agent_email,
                        'agent_status'                          =>  $agent_status,
                        'agent_user_name'                       =>  $agent_user_name,
                        'agent_user_phone'                      =>  $agent_user_phone,
                        'agent_prop_counter'                    =>  $agent_prop_counter
                    );
                }

                if (count($dis_data) != 0) {
                    $msg['status']  = 'success';
                    $msg['product'] = $dis_data;
                    echo json_encode($msg);
                }
            }
            else {
                $msg  = array('status' => 'end 2');
                echo json_encode($msg);
            }
            
        }
    }

 
    public function get_state_and_area(){
        $msg    =array();
        $msg['states']   = array();
        $msg['area']   = array();
       
      
        $state                          = $this->get_state();
        $area                           = $this->get_sub_state();
        $msg['states']   = $state;
        $msg['area']    = $area;

            
        if (count($msg) != 0) {
                echo json_encode($msg);
        }

        else {
            $msg[]  = array('status' => 'end 2');
            echo json_encode($msg);
        }
    }

    public function get_state(){
        $query      =$this->db->get('state');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return [];

    }

    public function get_sub_state(){
        $query      =$this->db->get('sub_state');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return [];

    }

    public function get_types_property(){
        $msg    =array();
       
        $query      =$this->db->get('types_of_property');
        if($query->num_rows() > 0){
            $msg    = $query->result_array();
        }
        
            
        if (count($msg) != 0) {
                echo json_encode($msg);
        }

        else {
            $msg[]  = array('status' => 'end 2');
            echo json_encode($msg);
        }
    }

    //======= 3
    public function filter_location($page = NULL, $user_id = NULL){
        $state_id    = $this->input->post('state_id');
        $area_id     = $this->input->post('area_id');
        
        $msg    = array();
        $start = 0;
        $limit = 5;

        $total    = $this->ApiAdmin_db->count_product_location($state_id,$area_id);
        if ($page > $total) {
            $msg  = array('status' => 'end');
            echo json_encode($msg);
        } else {

            $msg    = array();
            $start = ($page - 1) * $limit;

            $this->db->limit($limit, $start);
            $this->db->order_by('id', 'asc');

            $this->db->where('state_id',$state_id);
            $this->db->where('sub_state_id', $area_id);

            $query      =$this->db->get('propery');
            if($query->num_rows() > 0){

                $dis_data   = array();

                foreach($query->result_array() as $row){

                    $props_id                           = $row['id'];
                    $props_agent_id                     = $row['agent_id'];
                    $props_name                         = $row['prop_name'];
                    $props_location                     = $row['prop_location'];
                    $props_img_name                     = $row['prop_img_name'];
                    $props_img_name                     = base_url().'project_dir/property/'.$props_img_name;
                    $props_vid_id                       = $row['prop_vid_id'];
                    $props_type                         = $row['prop_type'];
                    $props_purpose                      = $row['prop_purpose'];
                    $props_status                       = $row['prop_status'];
                    $props_bedrom                       = $row['prop_bedrom'];
                    $props_bed                          = $row['prop_bed'];
                    $props_bathroom                     = $row['prop_bathroom'];
                    $props_toilet                       = $row['prop_toilet'];
                    $props_home_area                    = $row['prop_home_area'];
                    $props_lot_area                     = $row['prop_lot_area'];
                    $props_year_built                   = $row['prop_year_built'];
                    $props_created                      = $row['date_created'];
                    $props_state_id                     = $row['state_id'];
                    $props_sub_state_id                 = $row['sub_state_id'];
                    $props_type_of_propery              = $row['type_of_propery'];
                    $props_sub_type_of_propery          = $row['sub_type_of_propery'];
                    $props_price                        = $row['price'];
                    $props_description                  = $row['description'];
                    $prop_mode                          = $row['prop_mode'];
                    $props_live_status                  = $row['live_status'];
                    $slider_img                         = $row['slider_img'];
                    $slider_img                         = base_url().'project_dir/property/'.$slider_img;

                    $prop_mode                          = ucfirst(str_replace("_"," ",$prop_mode));

                    //get facilities
                    $props_shopping_mall                = $this->ApiAdmin_db->props_shopping_mall($props_id);
                    $props_hospital                     = $this->ApiAdmin_db->props_hospital($props_id);
                    $props_school                       = $this->ApiAdmin_db->props_school($props_id);
                    $props_petrol_pump                  = $this->ApiAdmin_db->props_petrol_pump($props_id);
                    $props_airport                      = $this->ApiAdmin_db->props_airport($props_id);
                    $props_church                       = $this->ApiAdmin_db->props_church($props_id);
                    $props_mosque                       = $this->ApiAdmin_db->props_mosque($props_id);

                    //get amenities
                    $props_air_condition                = $this->ApiAdmin_db->props_air_condition($props_id);
                    $props_balcony                      = $this->ApiAdmin_db->props_balcony($props_id);
                    $props_bedding                      = $this->ApiAdmin_db->props_bedding($props_id);
                    $props_cable_tv                     = $this->ApiAdmin_db->props_cable_tv($props_id);
                    $props_cleaning_after_exit          = $this->ApiAdmin_db->props_cleaning_after_exit($props_id);
                    $props_cofee_pot                    = $this->ApiAdmin_db->props_cofee_pot($props_id);
                    $props_computer                     = $this->ApiAdmin_db->props_computer($props_id);
                    $props_cot                          = $this->ApiAdmin_db->props_cot($props_id);
                    $props_dishwasher                   = $this->ApiAdmin_db->props_dishwasher($props_id);
                    $props_dvd                          = $this->ApiAdmin_db->props_dvd($props_id);
                    $props_fan                          = $this->ApiAdmin_db->props_fan($props_id);
                    $props_fridge                       = $this->ApiAdmin_db->props_fridge($props_id);
                    $props_grill                        = $this->ApiAdmin_db->props_grill($props_id);
                    $props_hairdryer                    = $this->ApiAdmin_db->props_hairdryer($props_id);
                    $props_heater                       = $this->ApiAdmin_db->props_heater($props_id);
                    $props_hi_fi                        = $this->ApiAdmin_db->props_hi_fi($props_id);
                    $props_internet                     = $this->ApiAdmin_db->props_internet($props_id);
                    $props_iron                         = $this->ApiAdmin_db->props_iron($props_id);
                    $props_juicer                       = $this->ApiAdmin_db->props_juicer($props_id);
                    $props_lift                         = $this->ApiAdmin_db->props_lift($props_id);
                    $props_microwave                    = $this->ApiAdmin_db->props_microwave($props_id);
                    $props_gym                          = $this->ApiAdmin_db->props_gym($props_id);
                    $props_fireplace                    = $this->ApiAdmin_db->props_fireplace($props_id);
                    $props_hot_tub                      = $this->ApiAdmin_db->props_hot_tub($props_id);


                    //get valuation
                    $props_crime                        = $this->ApiAdmin_db->props_crime($props_id);
                    $props_traffic                      = $this->ApiAdmin_db->props_traffic($props_id);
                    $props_pollution                    = $this->ApiAdmin_db->props_pollution($props_id);
                    $props_education                    = $this->ApiAdmin_db->props_education($props_id);
                    $props_health                       = $this->ApiAdmin_db->props_health($props_id);


                    //get Details
                    $props_condition                    = $this->ApiAdmin_db->props_condition($props_id);
                    $props_caution_fee                  = $this->ApiAdmin_db->props_caution_fee($props_id);
                    $props_special_pref                 = $this->ApiAdmin_db->props_special_pref($props_id);

                    //get_all_props_image
                    $get_all_props_image                = $this->ApiAdmin_db->get_all_props_image_2($props_id);

                    //get_all_props_video
                    $get_all_props_video                = $this->ApiAdmin_db->get_all_props_video($props_id);

                    $get_state_name                     =$this->ApiAdmin_db->get_state_name_state_id($props_state_id);
                    $get_sub_state_name                 =$this->ApiAdmin_db->get_sub_state_name_sub_state_id($props_sub_state_id);                                    

                    $count_props_image                  = $this->Property_db->count_prop_images($props_id);
                    $favourite                          = $this->Users_db->check_if_i_favourite($user_id,$props_id);

                    $type_name                          = $this->ApiAdmin_db->get_types_of_property_name_by_id($props_type_of_propery);
                    $sub_type_name                      = $this->ApiAdmin_db->get_sub_types_of_property_name_by_id($props_type_of_propery);

                    //Agent
                    $agent_full_name                    = $this->Users_db->get_user_full_name_by_id($props_agent_id);
                    $agent_image_name                   = $this->Users_db->get_image_name_by_id($props_agent_id);
                    $agent_email                        = $this->Users_db->get_email_by_id($props_agent_id);
                    $agent_status                       = $this->Users_db->get_status_by_id($props_agent_id);
                    $agent_user_name                    = $this->Users_db->get_user_name_by_id($props_agent_id);
                    $agent_user_phone                   = $this->Users_db->get_user_phone_by_id($props_agent_id);
                    $agent_prop_counter                 = $this->Property_db->count_all_user_property($props_agent_id);


                    $agent_email                        = substr_replace($agent_email, 'XXXXXXXX', '5', '5');
                    $agent_user_phone                   = substr_replace($agent_user_phone, 'XXXXX', '3', '5');
                    


                    $dis_data[]      = array(
                        'props_id'                              =>  $props_id,
                        'props_agent_id'                        =>  $props_agent_id,
                        'props_name'                            =>  $props_name,
                        'props_location'                        =>  $props_location,
                        'props_img_name'                        =>  $props_img_name,
                        'props_vid_id'                          =>  $props_vid_id,
                        'props_type'                            =>  $props_type,
                        'props_purpose'                         =>  $props_purpose,
                        'props_status'                          =>  $props_status,
                        'props_bedrom'                          =>  $props_bedrom,
                        'props_bed'                             =>  $props_bed,
                        'props_bathroom'                        =>  $props_bathroom,
                        'props_toilet'                          =>  $props_toilet,
                        'props_home_area'                       =>  $props_home_area,
                        'props_lot_area'                        =>  $props_lot_area,
                        'props_year_built'                      =>  $props_year_built,
                        'props_created'                         =>  $props_created,
                        'props_state_id'                        =>  $props_state_id,
                        'props_sub_state_id'                    =>  $props_sub_state_id,
                        'props_type_of_propery'                 =>  $props_type_of_propery,
                        'props_sub_type_of_propery'             =>  $props_sub_type_of_propery,
                        'props_price'                           =>  $props_price,
                        'props_description'                     =>  $props_description,
                        'prop_mode'                             =>  $prop_mode,
                        //facilities
                        'props_shopping_mall'                   =>  $props_shopping_mall,
                        'props_hospital'                        =>  $props_hospital,
                        'props_school'                          =>  $props_school,
                        'props_petrol_pump'                     =>  $props_petrol_pump,
                        'props_airport'                         =>  $props_airport,
                        'props_church'                          =>  $props_church,
                        'props_mosque'                          =>  $props_mosque,
                        //get amenities
                        'props_air_condition'                   =>  $props_air_condition,
                        'props_balcony'                         =>  $props_balcony,
                        'props_bedding'                         =>  $props_bedding,
                        'props_cable_tv'                        =>  $props_cable_tv,
                        'props_cleaning_after_exit'             =>  $props_cleaning_after_exit,
                        'props_cofee_pot'                       =>  $props_cofee_pot,
                        'props_computer'                        =>  $props_computer,
                        'props_cot'                             =>  $props_cot,
                        'props_dishwasher'                      =>  $props_dishwasher,
                        'props_dvd'                             =>  $props_dvd,
                        'props_fan'                             =>  $props_fan,
                        'props_fridge'                          =>  $props_fridge,
                        'props_grill'                           =>  $props_grill,
                        'props_hairdryer'                       =>  $props_hairdryer,
                        'props_heater'                          =>  $props_heater,
                        'props_hi_fi'                           =>  $props_hi_fi,
                        'props_internet'                        =>  $props_internet,
                        'props_iron'                            =>  $props_iron,
                        'props_juicer'                          =>  $props_juicer,
                        'props_lift'                            =>  $props_lift,
                        'props_microwave'                       =>  $props_microwave,
                        'props_gym'                             =>  $props_gym,
                        'props_fireplace'                       =>  $props_fireplace,
                        'props_hot_tub'                         =>  $props_hot_tub,
                        //get valuation
                        'props_crime'                           =>  $props_crime,
                        'props_traffic'                         =>  $props_traffic,
                        'props_pollution'                       =>  $props_pollution,
                        'props_education'                       =>  $props_education,
                        'props_health'                          =>  $props_health,

                        //get Details
                        'props_condition'                       =>  $props_condition,
                        'props_caution_fee'                     =>  $props_caution_fee,
                        'props_special_pref'                    =>  $props_special_pref,

                        //get_all_props_image
                        //get_all_props_video
                        'props_live_status'                     =>  $props_live_status,
                        'slider_img'                            =>  $slider_img,
                        'get_all_props_image'                   =>  $get_all_props_image,
                        'get_all_props_video'                   =>  $get_all_props_video,

                        //caution fee
                        'get_state_name'                        =>  $get_state_name,
                        'get_sub_state_name'                    =>  $get_sub_state_name,

                        'count_props_image'                     =>  $count_props_image,
                        'favourite'                             =>  $favourite,
                        'type_name'                             =>  $type_name,
                        'sub_type_name'                         =>  $sub_type_name,
                        
                        //Agent Detail
                        'agent_full_name'                       =>  $agent_full_name,
                        'agent_image_name'                      =>  $agent_image_name,
                        'agent_email'                           =>  $agent_email,
                        'agent_status'                          =>  $agent_status,
                        'agent_user_name'                       =>  $agent_user_name,
                        'agent_user_phone'                      =>  $agent_user_phone,
                        'agent_prop_counter'                    =>  $agent_prop_counter
                    );
                }

                if (count($dis_data) != 0) {
                    $msg['status']  = 'success';
                    $msg['product'] =   $dis_data;
                    echo json_encode($msg);
                }
            }
            else {
                $msg  = array('status' => 'end2');
                echo json_encode($msg);
            }
            
        }
    }

    //======= 4

    public function filter_type($page = NULL, $user_id = NULL){
        $type_id    = $this->input->post('type_id');
        
        $msg    = array();
        $start = 0;
        $limit = 5;

        $total    = $this->ApiAdmin_db->count_product_type($type_id);
        if ($page > $total) {
            $msg  = array('status' => 'end');
            echo json_encode($msg);
        } else {

            $msg    = array();
            $start = ($page - 1) * $limit;

            $this->db->limit($limit, $start);
            $this->db->order_by('id', 'asc');

            $this->db->where('type_of_propery',$type_id);

            $query      =$this->db->get('propery');
            if($query->num_rows() > 0){

                $dis_data   = array();
                foreach($query->result_array() as $row){

                    $props_id                           = $row['id'];
                    $props_agent_id                     = $row['agent_id'];
                    $props_name                         = $row['prop_name'];
                    $props_location                     = $row['prop_location'];
                    $props_img_name                     = $row['prop_img_name'];
                    $props_img_name                     = base_url().'project_dir/property/'.$props_img_name;
                    $props_vid_id                       = $row['prop_vid_id'];
                    $props_type                         = $row['prop_type'];
                    $props_purpose                      = $row['prop_purpose'];
                    $props_status                       = $row['prop_status'];
                    $props_bedrom                       = $row['prop_bedrom'];
                    $props_bed                          = $row['prop_bed'];
                    $props_bathroom                     = $row['prop_bathroom'];
                    $props_toilet                       = $row['prop_toilet'];
                    $props_home_area                    = $row['prop_home_area'];
                    $props_lot_area                     = $row['prop_lot_area'];
                    $props_year_built                   = $row['prop_year_built'];
                    $props_created                      = $row['date_created'];
                    $props_state_id                     = $row['state_id'];
                    $props_sub_state_id                 = $row['sub_state_id'];
                    $props_type_of_propery              = $row['type_of_propery'];
                    $props_sub_type_of_propery          = $row['sub_type_of_propery'];
                    $props_price                        = $row['price'];
                    $props_description                  = $row['description'];
                    $prop_mode                          = $row['prop_mode'];
                    $props_live_status                  = $row['live_status'];
                    $slider_img                         = $row['slider_img'];
                    $slider_img                         = base_url().'project_dir/property/'.$slider_img;

                    $prop_mode                          = ucfirst(str_replace("_"," ",$prop_mode));

                    //get facilities
                    $props_shopping_mall                = $this->ApiAdmin_db->props_shopping_mall($props_id);
                    $props_hospital                     = $this->ApiAdmin_db->props_hospital($props_id);
                    $props_school                       = $this->ApiAdmin_db->props_school($props_id);
                    $props_petrol_pump                  = $this->ApiAdmin_db->props_petrol_pump($props_id);
                    $props_airport                      = $this->ApiAdmin_db->props_airport($props_id);
                    $props_church                       = $this->ApiAdmin_db->props_church($props_id);
                    $props_mosque                       = $this->ApiAdmin_db->props_mosque($props_id);

                    //get amenities
                    $props_air_condition                = $this->ApiAdmin_db->props_air_condition($props_id);
                    $props_balcony                      = $this->ApiAdmin_db->props_balcony($props_id);
                    $props_bedding                      = $this->ApiAdmin_db->props_bedding($props_id);
                    $props_cable_tv                     = $this->ApiAdmin_db->props_cable_tv($props_id);
                    $props_cleaning_after_exit          = $this->ApiAdmin_db->props_cleaning_after_exit($props_id);
                    $props_cofee_pot                    = $this->ApiAdmin_db->props_cofee_pot($props_id);
                    $props_computer                     = $this->ApiAdmin_db->props_computer($props_id);
                    $props_cot                          = $this->ApiAdmin_db->props_cot($props_id);
                    $props_dishwasher                   = $this->ApiAdmin_db->props_dishwasher($props_id);
                    $props_dvd                          = $this->ApiAdmin_db->props_dvd($props_id);
                    $props_fan                          = $this->ApiAdmin_db->props_fan($props_id);
                    $props_fridge                       = $this->ApiAdmin_db->props_fridge($props_id);
                    $props_grill                        = $this->ApiAdmin_db->props_grill($props_id);
                    $props_hairdryer                    = $this->ApiAdmin_db->props_hairdryer($props_id);
                    $props_heater                       = $this->ApiAdmin_db->props_heater($props_id);
                    $props_hi_fi                        = $this->ApiAdmin_db->props_hi_fi($props_id);
                    $props_internet                     = $this->ApiAdmin_db->props_internet($props_id);
                    $props_iron                         = $this->ApiAdmin_db->props_iron($props_id);
                    $props_juicer                       = $this->ApiAdmin_db->props_juicer($props_id);
                    $props_lift                         = $this->ApiAdmin_db->props_lift($props_id);
                    $props_microwave                    = $this->ApiAdmin_db->props_microwave($props_id);
                    $props_gym                          = $this->ApiAdmin_db->props_gym($props_id);
                    $props_fireplace                    = $this->ApiAdmin_db->props_fireplace($props_id);
                    $props_hot_tub                      = $this->ApiAdmin_db->props_hot_tub($props_id);


                    //get valuation
                    $props_crime                        = $this->ApiAdmin_db->props_crime($props_id);
                    $props_traffic                      = $this->ApiAdmin_db->props_traffic($props_id);
                    $props_pollution                    = $this->ApiAdmin_db->props_pollution($props_id);
                    $props_education                    = $this->ApiAdmin_db->props_education($props_id);
                    $props_health                       = $this->ApiAdmin_db->props_health($props_id);


                    //get Details
                    $props_condition                    = $this->ApiAdmin_db->props_condition($props_id);
                    $props_caution_fee                  = $this->ApiAdmin_db->props_caution_fee($props_id);
                    $props_special_pref                 = $this->ApiAdmin_db->props_special_pref($props_id);

                    //get_all_props_image
                    $get_all_props_image                = $this->ApiAdmin_db->get_all_props_image_2($props_id);

                    //get_all_props_video
                    $get_all_props_video                = $this->ApiAdmin_db->get_all_props_video($props_id);

                    $get_state_name                     =$this->ApiAdmin_db->get_state_name_state_id($props_state_id);
                    $get_sub_state_name                 =$this->ApiAdmin_db->get_sub_state_name_sub_state_id($props_sub_state_id);                                    

                    $count_props_image                  = $this->Property_db->count_prop_images($props_id);
                    $favourite                          = $this->Users_db->check_if_i_favourite($user_id,$props_id);

                    $type_name                          = $this->ApiAdmin_db->get_types_of_property_name_by_id($props_type_of_propery);
                    $sub_type_name                      = $this->ApiAdmin_db->get_sub_types_of_property_name_by_id($props_type_of_propery);

                    //Agent
                    $agent_full_name                    = $this->Users_db->get_user_full_name_by_id($props_agent_id);
                    $agent_image_name                   = $this->Users_db->get_image_name_by_id($props_agent_id);
                    $agent_email                        = $this->Users_db->get_email_by_id($props_agent_id);
                    $agent_status                       = $this->Users_db->get_status_by_id($props_agent_id);
                    $agent_user_name                    = $this->Users_db->get_user_name_by_id($props_agent_id);
                    $agent_user_phone                   = $this->Users_db->get_user_phone_by_id($props_agent_id);
                    $agent_prop_counter                 = $this->Property_db->count_all_user_property($props_agent_id);


                    $agent_email                        = substr_replace($agent_email, 'XXXXXXXX', '5', '5');
                    $agent_user_phone                   = substr_replace($agent_user_phone, 'XXXXX', '3', '5');
                    


                    $dis_data[]      = array(
                        'props_id'                              =>  $props_id,
                        'props_agent_id'                        =>  $props_agent_id,
                        'props_name'                            =>  $props_name,
                        'props_location'                        =>  $props_location,
                        'props_img_name'                        =>  $props_img_name,
                        'props_vid_id'                          =>  $props_vid_id,
                        'props_type'                            =>  $props_type,
                        'props_purpose'                         =>  $props_purpose,
                        'props_status'                          =>  $props_status,
                        'props_bedrom'                          =>  $props_bedrom,
                        'props_bed'                             =>  $props_bed,
                        'props_bathroom'                        =>  $props_bathroom,
                        'props_toilet'                          =>  $props_toilet,
                        'props_home_area'                       =>  $props_home_area,
                        'props_lot_area'                        =>  $props_lot_area,
                        'props_year_built'                      =>  $props_year_built,
                        'props_created'                         =>  $props_created,
                        'props_state_id'                        =>  $props_state_id,
                        'props_sub_state_id'                    =>  $props_sub_state_id,
                        'props_type_of_propery'                 =>  $props_type_of_propery,
                        'props_sub_type_of_propery'             =>  $props_sub_type_of_propery,
                        'props_price'                           =>  $props_price,
                        'props_description'                     =>  $props_description,
                        'prop_mode'                             =>  $prop_mode,
                        //facilities
                        'props_shopping_mall'                   =>  $props_shopping_mall,
                        'props_hospital'                        =>  $props_hospital,
                        'props_school'                          =>  $props_school,
                        'props_petrol_pump'                     =>  $props_petrol_pump,
                        'props_airport'                         =>  $props_airport,
                        'props_church'                          =>  $props_church,
                        'props_mosque'                          =>  $props_mosque,
                        //get amenities
                        'props_air_condition'                   =>  $props_air_condition,
                        'props_balcony'                         =>  $props_balcony,
                        'props_bedding'                         =>  $props_bedding,
                        'props_cable_tv'                        =>  $props_cable_tv,
                        'props_cleaning_after_exit'             =>  $props_cleaning_after_exit,
                        'props_cofee_pot'                       =>  $props_cofee_pot,
                        'props_computer'                        =>  $props_computer,
                        'props_cot'                             =>  $props_cot,
                        'props_dishwasher'                      =>  $props_dishwasher,
                        'props_dvd'                             =>  $props_dvd,
                        'props_fan'                             =>  $props_fan,
                        'props_fridge'                          =>  $props_fridge,
                        'props_grill'                           =>  $props_grill,
                        'props_hairdryer'                       =>  $props_hairdryer,
                        'props_heater'                          =>  $props_heater,
                        'props_hi_fi'                           =>  $props_hi_fi,
                        'props_internet'                        =>  $props_internet,
                        'props_iron'                            =>  $props_iron,
                        'props_juicer'                          =>  $props_juicer,
                        'props_lift'                            =>  $props_lift,
                        'props_microwave'                       =>  $props_microwave,
                        'props_gym'                             =>  $props_gym,
                        'props_fireplace'                       =>  $props_fireplace,
                        'props_hot_tub'                         =>  $props_hot_tub,
                        //get valuation
                        'props_crime'                           =>  $props_crime,
                        'props_traffic'                         =>  $props_traffic,
                        'props_pollution'                       =>  $props_pollution,
                        'props_education'                       =>  $props_education,
                        'props_health'                          =>  $props_health,

                        //get Details
                        'props_condition'                       =>  $props_condition,
                        'props_caution_fee'                     =>  $props_caution_fee,
                        'props_special_pref'                    =>  $props_special_pref,

                        //get_all_props_image
                        //get_all_props_video
                        'props_live_status'                     =>  $props_live_status,
                        'slider_img'                            =>  $slider_img,
                        'get_all_props_image'                   =>  $get_all_props_image,
                        'get_all_props_video'                   =>  $get_all_props_video,

                        //caution fee
                        'get_state_name'                        =>  $get_state_name,
                        'get_sub_state_name'                    =>  $get_sub_state_name,

                        'count_props_image'                     =>  $count_props_image,
                        'favourite'                             =>  $favourite,
                        'type_name'                             =>  $type_name,
                        'sub_type_name'                         =>  $sub_type_name,
                        
                        //Agent Detail
                        'agent_full_name'                       =>  $agent_full_name,
                        'agent_image_name'                      =>  $agent_image_name,
                        'agent_email'                           =>  $agent_email,
                        'agent_status'                          =>  $agent_status,
                        'agent_user_name'                       =>  $agent_user_name,
                        'agent_user_phone'                      =>  $agent_user_phone,
                        'agent_prop_counter'                    =>  $agent_prop_counter
                    );
                }

                if (count($dis_data) != 0) {
                    $msg['status']      = 'success';
                    $msg['product']     = $dis_data;
                    echo json_encode($msg);
                }
            }
            else {
                $msg  = array('status' => 'end2');
                echo json_encode($msg);
            }
            
        }
    }

    //======= 5
    public function filter_price($page = NULL, $user_id = NULL){
        $start_price    = round($this->input->post('start_price'));
        $end_price      = round($this->input->post('end_price'));
        
        // echo $start_price.br().$end_price;
        
        $msg    = array();
        $start = 0;
        $limit = 5;

        $total    = $this->ApiAdmin_db->count_product_price($start_price,$end_price);
        if ($page > $total) {
            $msg  = array('status' => 'end');
            echo json_encode($msg);
        } else {

            $msg    = array();
            $start = ($page - 1) * $limit;

            $this->db->limit($limit, $start);
            $this->db->order_by('id', 'asc');

            $this->db->where('price >=', $start_price);
            $this->db->where('price <=', $end_price);

            $query      =$this->db->get('propery');
            if($query->num_rows() > 0){

                $dis_data   =array();
                foreach($query->result_array() as $row){

                    $props_id                           = $row['id'];
                    $props_agent_id                     = $row['agent_id'];
                    $props_name                         = $row['prop_name'];
                    $props_location                     = $row['prop_location'];
                    $props_img_name                     = $row['prop_img_name'];
                    $props_img_name                     = base_url().'project_dir/property/'.$props_img_name;
                    $props_vid_id                       = $row['prop_vid_id'];
                    $props_type                         = $row['prop_type'];
                    $props_purpose                      = $row['prop_purpose'];
                    $props_status                       = $row['prop_status'];
                    $props_bedrom                       = $row['prop_bedrom'];
                    $props_bed                          = $row['prop_bed'];
                    $props_bathroom                     = $row['prop_bathroom'];
                    $props_toilet                       = $row['prop_toilet'];
                    $props_home_area                    = $row['prop_home_area'];
                    $props_lot_area                     = $row['prop_lot_area'];
                    $props_year_built                   = $row['prop_year_built'];
                    $props_created                      = $row['date_created'];
                    $props_state_id                     = $row['state_id'];
                    $props_sub_state_id                 = $row['sub_state_id'];
                    $props_type_of_propery              = $row['type_of_propery'];
                    $props_sub_type_of_propery          = $row['sub_type_of_propery'];
                    $props_price                        = $row['price'];
                    $props_description                  = $row['description'];
                    $prop_mode                          = $row['prop_mode'];
                    $props_live_status                  = $row['live_status'];
                    $slider_img                         = $row['slider_img'];
                    $slider_img                         = base_url().'project_dir/property/'.$slider_img;

                    $prop_mode                          = ucfirst(str_replace("_"," ",$prop_mode));

                    //get facilities
                    $props_shopping_mall                = $this->ApiAdmin_db->props_shopping_mall($props_id);
                    $props_hospital                     = $this->ApiAdmin_db->props_hospital($props_id);
                    $props_school                       = $this->ApiAdmin_db->props_school($props_id);
                    $props_petrol_pump                  = $this->ApiAdmin_db->props_petrol_pump($props_id);
                    $props_airport                      = $this->ApiAdmin_db->props_airport($props_id);
                    $props_church                       = $this->ApiAdmin_db->props_church($props_id);
                    $props_mosque                       = $this->ApiAdmin_db->props_mosque($props_id);

                    //get amenities
                    $props_air_condition                = $this->ApiAdmin_db->props_air_condition($props_id);
                    $props_balcony                      = $this->ApiAdmin_db->props_balcony($props_id);
                    $props_bedding                      = $this->ApiAdmin_db->props_bedding($props_id);
                    $props_cable_tv                     = $this->ApiAdmin_db->props_cable_tv($props_id);
                    $props_cleaning_after_exit          = $this->ApiAdmin_db->props_cleaning_after_exit($props_id);
                    $props_cofee_pot                    = $this->ApiAdmin_db->props_cofee_pot($props_id);
                    $props_computer                     = $this->ApiAdmin_db->props_computer($props_id);
                    $props_cot                          = $this->ApiAdmin_db->props_cot($props_id);
                    $props_dishwasher                   = $this->ApiAdmin_db->props_dishwasher($props_id);
                    $props_dvd                          = $this->ApiAdmin_db->props_dvd($props_id);
                    $props_fan                          = $this->ApiAdmin_db->props_fan($props_id);
                    $props_fridge                       = $this->ApiAdmin_db->props_fridge($props_id);
                    $props_grill                        = $this->ApiAdmin_db->props_grill($props_id);
                    $props_hairdryer                    = $this->ApiAdmin_db->props_hairdryer($props_id);
                    $props_heater                       = $this->ApiAdmin_db->props_heater($props_id);
                    $props_hi_fi                        = $this->ApiAdmin_db->props_hi_fi($props_id);
                    $props_internet                     = $this->ApiAdmin_db->props_internet($props_id);
                    $props_iron                         = $this->ApiAdmin_db->props_iron($props_id);
                    $props_juicer                       = $this->ApiAdmin_db->props_juicer($props_id);
                    $props_lift                         = $this->ApiAdmin_db->props_lift($props_id);
                    $props_microwave                    = $this->ApiAdmin_db->props_microwave($props_id);
                    $props_gym                          = $this->ApiAdmin_db->props_gym($props_id);
                    $props_fireplace                    = $this->ApiAdmin_db->props_fireplace($props_id);
                    $props_hot_tub                      = $this->ApiAdmin_db->props_hot_tub($props_id);


                    //get valuation
                    $props_crime                        = $this->ApiAdmin_db->props_crime($props_id);
                    $props_traffic                      = $this->ApiAdmin_db->props_traffic($props_id);
                    $props_pollution                    = $this->ApiAdmin_db->props_pollution($props_id);
                    $props_education                    = $this->ApiAdmin_db->props_education($props_id);
                    $props_health                       = $this->ApiAdmin_db->props_health($props_id);


                    //get Details
                    $props_condition                    = $this->ApiAdmin_db->props_condition($props_id);
                    $props_caution_fee                  = $this->ApiAdmin_db->props_caution_fee($props_id);
                    $props_special_pref                 = $this->ApiAdmin_db->props_special_pref($props_id);

                    //get_all_props_image
                    $get_all_props_image                = $this->ApiAdmin_db->get_all_props_image_2($props_id);

                    //get_all_props_video
                    $get_all_props_video                = $this->ApiAdmin_db->get_all_props_video($props_id);

                    $get_state_name                     =$this->ApiAdmin_db->get_state_name_state_id($props_state_id);
                    $get_sub_state_name                 =$this->ApiAdmin_db->get_sub_state_name_sub_state_id($props_sub_state_id);                                    

                    $count_props_image                  = $this->Property_db->count_prop_images($props_id);
                    $favourite                          = $this->Users_db->check_if_i_favourite($user_id,$props_id);

                    $type_name                          = $this->ApiAdmin_db->get_types_of_property_name_by_id($props_type_of_propery);
                    $sub_type_name                      = $this->ApiAdmin_db->get_sub_types_of_property_name_by_id($props_type_of_propery);

                    //Agent
                    $agent_full_name                    = $this->Users_db->get_user_full_name_by_id($props_agent_id);
                    $agent_image_name                   = $this->Users_db->get_image_name_by_id($props_agent_id);
                    $agent_email                        = $this->Users_db->get_email_by_id($props_agent_id);
                    $agent_status                       = $this->Users_db->get_status_by_id($props_agent_id);
                    $agent_user_name                    = $this->Users_db->get_user_name_by_id($props_agent_id);
                    $agent_user_phone                   = $this->Users_db->get_user_phone_by_id($props_agent_id);
                    $agent_prop_counter                 = $this->Property_db->count_all_user_property($props_agent_id);


                    $agent_email                        = substr_replace($agent_email, 'XXXXXXXX', '5', '5');
                    $agent_user_phone                   = substr_replace($agent_user_phone, 'XXXXX', '3', '5');
                    


                    $dis_data[]      = array(
                        'props_id'                              =>  $props_id,
                        'props_agent_id'                        =>  $props_agent_id,
                        'props_name'                            =>  $props_name,
                        'props_location'                        =>  $props_location,
                        'props_img_name'                        =>  $props_img_name,
                        'props_vid_id'                          =>  $props_vid_id,
                        'props_type'                            =>  $props_type,
                        'props_purpose'                         =>  $props_purpose,
                        'props_status'                          =>  $props_status,
                        'props_bedrom'                          =>  $props_bedrom,
                        'props_bed'                             =>  $props_bed,
                        'props_bathroom'                        =>  $props_bathroom,
                        'props_toilet'                          =>  $props_toilet,
                        'props_home_area'                       =>  $props_home_area,
                        'props_lot_area'                        =>  $props_lot_area,
                        'props_year_built'                      =>  $props_year_built,
                        'props_created'                         =>  $props_created,
                        'props_state_id'                        =>  $props_state_id,
                        'props_sub_state_id'                    =>  $props_sub_state_id,
                        'props_type_of_propery'                 =>  $props_type_of_propery,
                        'props_sub_type_of_propery'             =>  $props_sub_type_of_propery,
                        'props_price'                           =>  $props_price,
                        'props_description'                     =>  $props_description,
                        'prop_mode'                             =>  $prop_mode,
                        //facilities
                        'props_shopping_mall'                   =>  $props_shopping_mall,
                        'props_hospital'                        =>  $props_hospital,
                        'props_school'                          =>  $props_school,
                        'props_petrol_pump'                     =>  $props_petrol_pump,
                        'props_airport'                         =>  $props_airport,
                        'props_church'                          =>  $props_church,
                        'props_mosque'                          =>  $props_mosque,
                        //get amenities
                        'props_air_condition'                   =>  $props_air_condition,
                        'props_balcony'                         =>  $props_balcony,
                        'props_bedding'                         =>  $props_bedding,
                        'props_cable_tv'                        =>  $props_cable_tv,
                        'props_cleaning_after_exit'             =>  $props_cleaning_after_exit,
                        'props_cofee_pot'                       =>  $props_cofee_pot,
                        'props_computer'                        =>  $props_computer,
                        'props_cot'                             =>  $props_cot,
                        'props_dishwasher'                      =>  $props_dishwasher,
                        'props_dvd'                             =>  $props_dvd,
                        'props_fan'                             =>  $props_fan,
                        'props_fridge'                          =>  $props_fridge,
                        'props_grill'                           =>  $props_grill,
                        'props_hairdryer'                       =>  $props_hairdryer,
                        'props_heater'                          =>  $props_heater,
                        'props_hi_fi'                           =>  $props_hi_fi,
                        'props_internet'                        =>  $props_internet,
                        'props_iron'                            =>  $props_iron,
                        'props_juicer'                          =>  $props_juicer,
                        'props_lift'                            =>  $props_lift,
                        'props_microwave'                       =>  $props_microwave,
                        'props_gym'                             =>  $props_gym,
                        'props_fireplace'                       =>  $props_fireplace,
                        'props_hot_tub'                         =>  $props_hot_tub,
                        //get valuation
                        'props_crime'                           =>  $props_crime,
                        'props_traffic'                         =>  $props_traffic,
                        'props_pollution'                       =>  $props_pollution,
                        'props_education'                       =>  $props_education,
                        'props_health'                          =>  $props_health,

                        //get Details
                        'props_condition'                       =>  $props_condition,
                        'props_caution_fee'                     =>  $props_caution_fee,
                        'props_special_pref'                    =>  $props_special_pref,

                        //get_all_props_image
                        //get_all_props_video
                        'props_live_status'                     =>  $props_live_status,
                        'slider_img'                            =>  $slider_img,
                        'get_all_props_image'                   =>  $get_all_props_image,
                        'get_all_props_video'                   =>  $get_all_props_video,

                        //caution fee
                        'get_state_name'                        =>  $get_state_name,
                        'get_sub_state_name'                    =>  $get_sub_state_name,

                        'count_props_image'                     =>  $count_props_image,
                        'favourite'                             =>  $favourite,
                        'type_name'                             =>  $type_name,
                        'sub_type_name'                         =>  $sub_type_name,
                        
                        //Agent Detail
                        'agent_full_name'                       =>  $agent_full_name,
                        'agent_image_name'                      =>  $agent_image_name,
                        'agent_email'                           =>  $agent_email,
                        'agent_status'                          =>  $agent_status,
                        'agent_user_name'                       =>  $agent_user_name,
                        'agent_user_phone'                      =>  $agent_user_phone,
                        'agent_prop_counter'                    =>  $agent_prop_counter
                    );
                }

                if (count($dis_data) != 0) {
                    $msg['status']  ='success';
                    $msg['product'] = $dis_data;
                    echo json_encode($msg);
                }
            }
            else {
                $msg  = array('status' => 'end2');
                echo json_encode($msg);
            }
            
        }
    }

    //======= 6
    public function get_favourite($page = NULL, $user_id = NULL){
        
        // echo $start_price.br().$end_price;
        
        $msg    = array();
         $dis_data   = array();
        $start = 0;
        $limit = 5;

        $total    = $this->ApiAdmin_db->count_user_favourite($user_id);
        if ($page > $total) {
            $msg  = array('status' => 'end');
            echo json_encode($msg);
        } else {

            $msg    = array();
            $start = ($page - 1) * $limit;

            $this->db->limit($limit, $start);
            $this->db->order_by('id', 'asc');

            $this->db->where('user_id', $user_id);

            $query      =$this->db->get('favourite');
            if($query->num_rows() > 0){
                foreach($query->result_array() as $low){
                  
                    $fav_id              = $low['id'];
                    $fav_props_id        = $low['prop_id'];

                    $get_property        = $this->Property_db->get_props_by_id($fav_props_id);
                    if(is_array($get_property)){
                        

                       

                        foreach($get_property as $row){

                            $props_id                           = $row['id'];
                            $props_agent_id                     = $row['agent_id'];
                            $props_name                         = $row['prop_name'];
                            $props_location                     = $row['prop_location'];
                            $props_img_name                     = $row['prop_img_name'];
                            $props_img_name                     = base_url().'project_dir/property/'.$props_img_name;
                            $props_vid_id                       = $row['prop_vid_id'];
                            $props_type                         = $row['prop_type'];
                            $props_purpose                      = $row['prop_purpose'];
                            $props_status                       = $row['prop_status'];
                            $props_bedrom                       = $row['prop_bedrom'];
                            $props_bed                          = $row['prop_bed'];
                            $props_bathroom                     = $row['prop_bathroom'];
                            $props_toilet                       = $row['prop_toilet'];
                            $props_home_area                    = $row['prop_home_area'];
                            $props_lot_area                     = $row['prop_lot_area'];
                            $props_year_built                   = $row['prop_year_built'];
                            $props_created                      = $row['date_created'];
                            $props_state_id                     = $row['state_id'];
                            $props_sub_state_id                 = $row['sub_state_id'];
                            $props_type_of_propery              = $row['type_of_propery'];
                            $props_sub_type_of_propery          = $row['sub_type_of_propery'];
                            $props_price                        = $row['price'];
                            $props_description                  = $row['description'];
                            $prop_mode                          = $row['prop_mode'];
                            $props_live_status                  = $row['live_status'];
                            $slider_img                         = $row['slider_img'];
                            $slider_img                         = base_url().'project_dir/property/'.$slider_img;

                            $prop_mode                          = ucfirst(str_replace("_"," ",$prop_mode));

                            //get facilities
                            $props_shopping_mall                = $this->ApiAdmin_db->props_shopping_mall($props_id);
                            $props_hospital                     = $this->ApiAdmin_db->props_hospital($props_id);
                            $props_school                       = $this->ApiAdmin_db->props_school($props_id);
                            $props_petrol_pump                  = $this->ApiAdmin_db->props_petrol_pump($props_id);
                            $props_airport                      = $this->ApiAdmin_db->props_airport($props_id);
                            $props_church                       = $this->ApiAdmin_db->props_church($props_id);
                            $props_mosque                       = $this->ApiAdmin_db->props_mosque($props_id);

                            //get amenities
                            $props_air_condition                = $this->ApiAdmin_db->props_air_condition($props_id);
                            $props_balcony                      = $this->ApiAdmin_db->props_balcony($props_id);
                            $props_bedding                      = $this->ApiAdmin_db->props_bedding($props_id);
                            $props_cable_tv                     = $this->ApiAdmin_db->props_cable_tv($props_id);
                            $props_cleaning_after_exit          = $this->ApiAdmin_db->props_cleaning_after_exit($props_id);
                            $props_cofee_pot                    = $this->ApiAdmin_db->props_cofee_pot($props_id);
                            $props_computer                     = $this->ApiAdmin_db->props_computer($props_id);
                            $props_cot                          = $this->ApiAdmin_db->props_cot($props_id);
                            $props_dishwasher                   = $this->ApiAdmin_db->props_dishwasher($props_id);
                            $props_dvd                          = $this->ApiAdmin_db->props_dvd($props_id);
                            $props_fan                          = $this->ApiAdmin_db->props_fan($props_id);
                            $props_fridge                       = $this->ApiAdmin_db->props_fridge($props_id);
                            $props_grill                        = $this->ApiAdmin_db->props_grill($props_id);
                            $props_hairdryer                    = $this->ApiAdmin_db->props_hairdryer($props_id);
                            $props_heater                       = $this->ApiAdmin_db->props_heater($props_id);
                            $props_hi_fi                        = $this->ApiAdmin_db->props_hi_fi($props_id);
                            $props_internet                     = $this->ApiAdmin_db->props_internet($props_id);
                            $props_iron                         = $this->ApiAdmin_db->props_iron($props_id);
                            $props_juicer                       = $this->ApiAdmin_db->props_juicer($props_id);
                            $props_lift                         = $this->ApiAdmin_db->props_lift($props_id);
                            $props_microwave                    = $this->ApiAdmin_db->props_microwave($props_id);
                            $props_gym                          = $this->ApiAdmin_db->props_gym($props_id);
                            $props_fireplace                    = $this->ApiAdmin_db->props_fireplace($props_id);
                            $props_hot_tub                      = $this->ApiAdmin_db->props_hot_tub($props_id);


                            //get valuation
                            $props_crime                        = $this->ApiAdmin_db->props_crime($props_id);
                            $props_traffic                      = $this->ApiAdmin_db->props_traffic($props_id);
                            $props_pollution                    = $this->ApiAdmin_db->props_pollution($props_id);
                            $props_education                    = $this->ApiAdmin_db->props_education($props_id);
                            $props_health                       = $this->ApiAdmin_db->props_health($props_id);


                            //get Details
                            $props_condition                    = $this->ApiAdmin_db->props_condition($props_id);
                            $props_caution_fee                  = $this->ApiAdmin_db->props_caution_fee($props_id);
                            $props_special_pref                 = $this->ApiAdmin_db->props_special_pref($props_id);

                            //get_all_props_image
                            $get_all_props_image                = $this->ApiAdmin_db->get_all_props_image_2($props_id);

                            //get_all_props_video
                            $get_all_props_video                = $this->ApiAdmin_db->get_all_props_video($props_id);

                            $get_state_name                     =$this->ApiAdmin_db->get_state_name_state_id($props_state_id);
                            $get_sub_state_name                 =$this->ApiAdmin_db->get_sub_state_name_sub_state_id($props_sub_state_id);                                    

                            $count_props_image                  = $this->Property_db->count_prop_images($props_id);
                            $favourite                          = $this->Users_db->check_if_i_favourite($user_id,$props_id);

                            $type_name                          = $this->ApiAdmin_db->get_types_of_property_name_by_id($props_type_of_propery);
                            $sub_type_name                      = $this->ApiAdmin_db->get_sub_types_of_property_name_by_id($props_type_of_propery);

                            //Agent
                            $agent_full_name                    = $this->Users_db->get_user_full_name_by_id($props_agent_id);
                            $agent_image_name                   = $this->Users_db->get_image_name_by_id($props_agent_id);
                            $agent_email                        = $this->Users_db->get_email_by_id($props_agent_id);
                            $agent_status                       = $this->Users_db->get_status_by_id($props_agent_id);
                            $agent_user_name                    = $this->Users_db->get_user_name_by_id($props_agent_id);
                            $agent_user_phone                   = $this->Users_db->get_user_phone_by_id($props_agent_id);
                            $agent_prop_counter                 = $this->Property_db->count_all_user_property($props_agent_id);


                            $agent_email                        = substr_replace($agent_email, 'XXXXXXXX', '5', '5');
                            $agent_user_phone                   = substr_replace($agent_user_phone, 'XXXXX', '3', '5');
                            


                            $dis_data[]      = array(
                                'props_id'                              =>  $props_id,
                                'props_agent_id'                        =>  $props_agent_id,
                                'props_name'                            =>  $props_name,
                                'props_location'                        =>  $props_location,
                                'props_img_name'                        =>  $props_img_name,
                                'props_vid_id'                          =>  $props_vid_id,
                                'props_type'                            =>  $props_type,
                                'props_purpose'                         =>  $props_purpose,
                                'props_status'                          =>  $props_status,
                                'props_bedrom'                          =>  $props_bedrom,
                                'props_bed'                             =>  $props_bed,
                                'props_bathroom'                        =>  $props_bathroom,
                                'props_toilet'                          =>  $props_toilet,
                                'props_home_area'                       =>  $props_home_area,
                                'props_lot_area'                        =>  $props_lot_area,
                                'props_year_built'                      =>  $props_year_built,
                                'props_created'                         =>  $props_created,
                                'props_state_id'                        =>  $props_state_id,
                                'props_sub_state_id'                    =>  $props_sub_state_id,
                                'props_type_of_propery'                 =>  $props_type_of_propery,
                                'props_sub_type_of_propery'             =>  $props_sub_type_of_propery,
                                'props_price'                           =>  $props_price,
                                'props_description'                     =>  $props_description,
                                'prop_mode'                             =>  $prop_mode,
                                //facilities
                                'props_shopping_mall'                   =>  $props_shopping_mall,
                                'props_hospital'                        =>  $props_hospital,
                                'props_school'                          =>  $props_school,
                                'props_petrol_pump'                     =>  $props_petrol_pump,
                                'props_airport'                         =>  $props_airport,
                                'props_church'                          =>  $props_church,
                                'props_mosque'                          =>  $props_mosque,
                                //get amenities
                                'props_air_condition'                   =>  $props_air_condition,
                                'props_balcony'                         =>  $props_balcony,
                                'props_bedding'                         =>  $props_bedding,
                                'props_cable_tv'                        =>  $props_cable_tv,
                                'props_cleaning_after_exit'             =>  $props_cleaning_after_exit,
                                'props_cofee_pot'                       =>  $props_cofee_pot,
                                'props_computer'                        =>  $props_computer,
                                'props_cot'                             =>  $props_cot,
                                'props_dishwasher'                      =>  $props_dishwasher,
                                'props_dvd'                             =>  $props_dvd,
                                'props_fan'                             =>  $props_fan,
                                'props_fridge'                          =>  $props_fridge,
                                'props_grill'                           =>  $props_grill,
                                'props_hairdryer'                       =>  $props_hairdryer,
                                'props_heater'                          =>  $props_heater,
                                'props_hi_fi'                           =>  $props_hi_fi,
                                'props_internet'                        =>  $props_internet,
                                'props_iron'                            =>  $props_iron,
                                'props_juicer'                          =>  $props_juicer,
                                'props_lift'                            =>  $props_lift,
                                'props_microwave'                       =>  $props_microwave,
                                'props_gym'                             =>  $props_gym,
                                'props_fireplace'                       =>  $props_fireplace,
                                'props_hot_tub'                         =>  $props_hot_tub,
                                //get valuation
                                'props_crime'                           =>  $props_crime,
                                'props_traffic'                         =>  $props_traffic,
                                'props_pollution'                       =>  $props_pollution,
                                'props_education'                       =>  $props_education,
                                'props_health'                          =>  $props_health,

                                //get Details
                                'props_condition'                       =>  $props_condition,
                                'props_caution_fee'                     =>  $props_caution_fee,
                                'props_special_pref'                    =>  $props_special_pref,

                                //get_all_props_image
                                //get_all_props_video
                                'props_live_status'                     =>  $props_live_status,
                                'slider_img'                            =>  $slider_img,
                                'get_all_props_image'                   =>  $get_all_props_image,
                                'get_all_props_video'                   =>  $get_all_props_video,

                                //caution fee
                                'get_state_name'                        =>  $get_state_name,
                                'get_sub_state_name'                    =>  $get_sub_state_name,

                                'count_props_image'                     =>  $count_props_image,
                                'favourite'                             =>  $favourite,
                                'type_name'                             =>  $type_name,
                                'sub_type_name'                         =>  $sub_type_name,
                                
                                //Agent Detail
                                'agent_full_name'                       =>  $agent_full_name,
                                'agent_image_name'                      =>  $agent_image_name,
                                'agent_email'                           =>  $agent_email,
                                'agent_status'                          =>  $agent_status,
                                'agent_user_name'                       =>  $agent_user_name,
                                'agent_user_phone'                      =>  $agent_user_phone,
                                'agent_prop_counter'                    =>  $agent_prop_counter
                            );
                        }
                    }

                }
            }
               

            if (count($dis_data) != 0) {
                $msg['status']      = 'success';
                $msg['product']     = $dis_data;
                echo json_encode($msg);
            }
            else {
                $msg  = array('status' => 'end2');
                echo json_encode($msg);
            }
            
        }
    }

    public function get_request($page = NULL, $user_id = NULL){
        $admin_status       =$this->input->post('admin_status');
       
        $msg    = array();
        $start = 0;
        $limit = 5;

        $total    = $this->Request_db->count_request_by_user_id_2($user_id,$admin_status);
        // $total    = 0;
        if ($page > $total) {
            $msg  = array('status' => 'end');
            echo json_encode($msg);
        } else {

            $msg    = array();
            $start = ($page - 1) * $limit;

            $this->db->limit($limit, $start);
            $this->db->order_by('id', 'asc');

            if($admin_status == 'false'){
                $this->db->where('user_id',$user_id);
                $this->db->or_where('agent_id',$user_id);
            }else if($admin_status){
                $this->db->where('status !=','rejected');
                $this->db->where('admin_read_status !=','read');
            }

            $query      =$this->db->get('request');
            if($query->num_rows() > 0){

                $dis_data   = array();

                foreach($query->result_array() as $row){

                    $id                     =$row['id'];
                    $dis_user_id            =$row['user_id'];
                    $agent_id               =$row['agent_id'];
                    $props_id               =$row['props_id'];
                    $title                  =$row['title'];
                    $description            =$row['description'];
                    $date_created           =$row['date_created'];
                    $time                   =$row['time'];
                    $user_read_status       =$row['user_read_status'];
                    $agent_read_status      =$row['agent_read_status'];
                    $admin_read_status      =$row['admin_read_status'];
                    $request_status         =$row['status'];

                    $props_name             =$this->Admin_db->get_props_name_by_id($props_id);
                    $props_name_2           =$this->Admin_db->get_props_name_by_id($props_id);
                    $props_image            =$this->Admin_db->get_props_image_by_id($props_id);
                    $props_image            = base_url().'project_dir/property/'.$props_image;

                    $get_props_state_id     =$this->Admin_db->get_state_id_by_props_id($props_id);
                    $get_state_name         =$this->Admin_db->get_state_name_state_id($get_props_state_id);
                                                    
                    $get_props_sub_state_id =$this->Admin_db->get_sub_state_id_by_props_id($props_id);
                    $get_sub_state_name     =$this->Admin_db->get_sub_state_name_sub_state_id($get_props_sub_state_id);

                    $connection_open        = $this->Connection_db->checkIfUserExistInConnection($dis_user_id,$agent_id,$props_id);

                    if(strlen($props_name) > 15) {
                        $props_name = $props_name.' ';
                        $props_name = substr($props_name, 0, 15);
                        $props_name = substr($props_name, 0, strrpos($props_name ,' '));
                        $props_name = $props_name.'...';
                    }


                    $dis_data[]      = array(
                        'id'                                =>  $id,
                        'dis_user_id'                       =>  $dis_user_id,
                        'agent_id'                          =>  $agent_id,
                        'props_id'                          =>  $props_id,
                        'title'                             =>  $title,
                        'description'                       =>  $description,
                        'date_created'                      =>  $date_created,
                        'time'                              =>  $time,
                        'user_read_status'                  =>  $user_read_status,
                        'agent_read_status'                 =>  $agent_read_status,
                        'admin_read_status'                 =>  $admin_read_status,
                        'request_status'                    =>  $request_status,
                        'props_name'                        =>  $props_name,
                        'props_name_2'                      =>  $props_name_2,
                        'props_image'                       =>  $props_image,
                        'get_props_state_id'                =>  $get_props_state_id,
                        'get_state_name'                    =>  $get_state_name,
                        'get_props_sub_state_id'            =>  $get_props_sub_state_id,
                        'get_sub_state_name'                =>  $get_sub_state_name,
                        'open_connection'                   =>  $connection_open,
                        
                    );
                }

                if (count($dis_data) != 0) {
                    $msg['status']  ='success';
                    $msg['request'] = $dis_data;
                    echo json_encode($msg);
                }
            }
            else {
                $msg  = array('status' => 'end2');
                echo json_encode($msg);
            }
            
        }
    }

    public function make_request(){
        
        $id               = $this->input->post('id');
        $users_type       = $this->input->post('users_type');

        $msg = array();

        $action		= $this->Request_db->update_read_status($id,$users_type);
		if($action){
			$msg['status']  = 'true';
		}else{
			$msg['status']  = 'false';
		}
		echo json_encode($msg);
    }

    public function set_request_type(){

        $id                = $this->input->post('id');
        $type              = $this->input->post('status_type');
        $dis_user_id       = $this->input->post('dis_user_id');
        $agent_id          = $this->input->post('agent_id');
        $props_id          = $this->input->post('props_id');

        $msg = array();

        $my_id 	= $this->input->post('user_id');
		if($type == 'done'){
			if(!$this->Connection_db->checkIfUserExistInConnection($dis_user_id,$agent_id,$props_id)){
				$action 	= $this->Connection_db->insert_into_connection_tbl($dis_user_id,$agent_id,$props_id);
				if($action){
					
					$message	= "Hello, you now have a new Connection, check Connection tab for more detail";
					$this->Alert_db->insert_into_alert_tbl($agent_id,$my_id,$message, 'yes');
					$this->Alert_db->insert_into_alert_tbl($dis_user_id, $my_id, $message, 'yes');

					$msg['status']  = 'done';
				}else{

					$msg['status']  = 'false';
				}
			}else{

				$msg['status']  =   'existed';
			}

		}else{

			$action		= $this->Request_db->set_request_status($id,$type,$dis_user_id,$agent_id,$props_id);
			if($action){

				if($type == 'review'){

					$message	= "Hello, Your Request for Site Inspection is now under Review!";
					$this->Alert_db->insert_into_alert_tbl($dis_user_id, $my_id, $message, 'yes');
                    $msg['status']  = 'review';

				}else if($type =='rejected'){

					$message	= "Hello, the status of your request for site inspection is now move to Rejected";
					$this->Alert_db->insert_into_alert_tbl($dis_user_id, $my_id, $message, 'yes');
                    $msg['status']  = 'rejected';

				}else if($type == 'confirm'){

					$message	= "Hello, Your Request for Site Inspection is now Confirm!";
					$this->Alert_db->insert_into_alert_tbl($dis_user_id, $my_id, $message, 'yes');
                    $msg['status']  = 'confirm';

				}
                
			}else{

				$msg['status']  =   'false';
                
			}
		}
		echo json_encode($msg);
    }



    public function get_connection($page = NULL, $user_id = NULL){
       
        $msg    = array();
        $start = 0;
        $limit = 50;

        $total    = $this->Connection_db->count_connection_by_user_id($user_id);
        if ($page > $total) {
            $msg  = array('status' => 'end');
            echo json_encode($msg);
        } else {

            $msg    = array();
            $start = ($page - 1) * $limit;

            $this->db->limit($limit, $start);
            $this->db->order_by('id', 'asc');

            $this->db->where('user_id',$user_id);
            $this->db->or_where('agent_id',$user_id);

            $query      =$this->db->get('connection');
            if($query->num_rows() > 0){

                $dis_data   = array();
                foreach($query->result_array() as $row){

                    $id                 =$row['id'];
                    $dis_user_id        =$row['user_id'];
                    $agent_id           =$row['agent_id'];
                    $time               =$row['time'];
                    $date               =$row['date_created'];
                    $props_id           =$row['prop_id'];
                                        
                                        

                    $get_user_full_name     = $this->Users_db->get_user_full_name_by_id($dis_user_id);
                    $get_user_email         = $this->Users_db->get_email_by_id($dis_user_id);
                    $get_user_status        = $this->Users_db->get_status_by_id($dis_user_id);
                    $get_user_name          = $this->Users_db->get_user_name_by_id($dis_user_id);
                    $get_user_image         = $this->Users_db->get_image_name_by_id($dis_user_id);
                    $get_user_image         = base_url().'project_dir/users/'.$get_user_name.'/images/'.$get_user_image;


                    $get_agent_full_name     = $this->Users_db->get_user_full_name_by_id($agent_id);
                    $get_agent_email         = $this->Users_db->get_email_by_id($agent_id);
                    $get_agent_status        = $this->Users_db->get_status_by_id($agent_id);
                    $get_agent_user_name     = $this->Users_db->get_user_name_by_id($agent_id);
                    $get_agent_image         = $this->Users_db->get_image_name_by_id($agent_id);
                    $get_agent_image         = base_url().'project_dir/users/'.$get_agent_user_name.'/images/'.$get_agent_image;

                    $props_name              = $this->Admin_db->get_props_name_by_id($props_id);


                    $dis_data[]      = array(
                        'id'                                =>  $id,
                        'dis_user_id'                       =>  $dis_user_id,
                        'agent_id'                          =>  $agent_id,
                        'time'                              =>  $time,
                        'date'                              =>  $date,
                        'props_id'                          =>  $props_id,
                        'get_user_full_name'                =>  $get_user_full_name,
                        'get_user_image'                    =>  $get_user_image,
                        'get_user_email'                    =>  $get_user_email,
                        'get_user_status'                   =>  $get_user_status,
                        'get_user_name'                     =>  $get_user_name,
                        'get_agent_full_name'               =>  $get_agent_full_name,
                        'get_agent_image'                   =>  $get_agent_image,
                        'get_agent_email'                   =>  $get_agent_email,
                        'get_agent_status'                  =>  $get_agent_status,
                        'get_agent_user_name'               =>  $get_agent_user_name,
                        'props_name'                        =>  $props_name,



                        
                    );
                }

                if (count($dis_data) != 0) {
                    $msg['status']      = 'success';
                    $msg['connection']  = $dis_data;
                    echo json_encode($msg);
                }
            }
            else {
                $msg  = array('status' => 'end2');
                echo json_encode($msg);
            }
            
        }
    }

    public function count_transaction($user_id, $admin_status){

        if($admin_status == 'false'){
            $this->db->where('user_id',$user_id);
        }else{
            $this->db->where('user_id','admin');
        }

        return $this->db->from('transaction')->count_all_results();
   }

    public function get_transaction($page = NULL, $user_id = NULL){

        $admin_status           = $this->input->post('admin_status');
       
        $msg    = array();
        $start = 0;
        $limit = 5;

        $total    = $this->count_transaction($user_id,$admin_status);
        if ($page > $total) {
            $msg  = array('status' => 'end');
            echo json_encode($msg);
        } else {

            $msg    = array();
            $start = ($page - 1) * $limit;

            $this->db->limit($limit, $start);
            $this->db->order_by('id', 'asc');

            if($admin_status == 'false'){
                $this->db->where('user_id',$user_id);

            }else{
                $this->db->where('user_id','admin');
            }

            $query      =$this->db->get('transaction');
            if($query->num_rows() > 0){

                $dis_data   = array();
                foreach($query->result_array() as $row){

                    $id                 =$row['id'];
                    $props_id           =$row['props_id'];
                    $dis_user_id        =$row['user_id'];
                    $dis_amount         =$row['amount'];
                    $trans_type         =$row['trans_type'];
                    $dis_balance        =$row['balance'];
                    $description        =$row['description'];
                    $ref_no             =$row['ref_no'];
                    $dis_status         =$row['status'];
                    $date_created       =$row['date_created'];
                    $time               =$row['time'];


                    $props_name                 =$this->Admin_db->get_props_name_by_id($props_id);
                    $props_image                =$this->Admin_db->get_props_image_by_id($props_id);

                    $get_props_state_id         =$this->Admin_db->get_state_id_by_props_id($props_id);
                    $get_state_name             =$this->Admin_db->get_state_name_state_id($get_props_state_id);
                                                    
                    $get_props_sub_state_id     =$this->Admin_db->get_sub_state_id_by_props_id($props_id);
                    $get_sub_state_name         =$this->Admin_db->get_sub_state_name_sub_state_id($get_props_sub_state_id);


                    $dis_data[]      = array(
                        'id'                                =>  $id,
                        'props_id'                          =>  $props_id,
                        'dis_user_id'                       =>  $dis_user_id,
                        'dis_amount'                        =>  $dis_amount,
                        'trans_type'                        =>  $trans_type,
                        'dis_balance'                       =>  $dis_balance,
                        'description'                       =>  $description,
                        'ref_no'                            =>  $ref_no,
                        'dis_status'                        =>  $dis_status,
                        'date_created'                      =>  $date_created,
                        'time'                              =>  $time,
                        'props_name'                        =>  $props_name,
                        'props_image'                       =>  $props_image,
                        'get_props_state_id'                =>  $get_props_state_id,
                        'get_state_name'                    =>  $get_state_name,
                        'get_props_sub_state_id'            =>  $get_props_sub_state_id,
                        'get_sub_state_name'                =>  $get_sub_state_name
                    );
                }

                if (count($dis_data) != 0) {
                    $msg['status']      ='success';
                    $msg['transaction'] = $dis_data;
                    echo json_encode($msg);
                }
            }
            else {
                $msg  = array('status' => 'end2');
                echo json_encode($msg);
            }
            
        }
    }

    public function get_alert($page = NULL, $user_id = NULL){
       
        $msg    = array();
        $start = 0;
        $limit = 20;

        $total    = $this->Alert_db->count_my_alert($user_id);
        // $total    = 0;
        if ($page > $total) {
            $msg  = array('status' => 'end');
            echo json_encode($msg);
        } else {

            $msg    = array();
            $start = ($page - 1) * $limit;

            $this->db->limit($limit, $start);
            $this->db->order_by('id', 'asc');

            $this->db->where('user_id',$user_id);
            $this->db->where('status','unread');

            $query      =$this->db->get('alert');
            if($query->num_rows() > 0){

                $dis_data   = array();

                foreach($query->result_array() as $row){

                    $id                 =$row['id'];
                    $dis_user_id        =$row['user_id'];
                    $sender_id          =$row['sender_id'];
                    $description        =$row['description'];
                    $date_created       =$row['date_created'];
                    $time               =$row['time'];
                    $read_status        =$row['status'];



                    $dis_data[]      = array(
                        'id'                    =>  $id,
                        'dis_user_id'           =>  $dis_user_id,
                        'sender_id'             =>  $sender_id,
                        'description'           =>  $description,
                        'date_created'          =>  $date_created,
                        'time'                  =>  $time,
                        'read_status'           =>  $read_status,

                        
                    );
                }

                if (count($dis_data) != 0) {
                    $msg['status']  = 'success';
                    $msg['alert']   = $dis_data;
                    echo json_encode($msg);
                }
            }
            else {
                $msg  = array('status' => 'end2');
                echo json_encode($msg);
            }
            
        }
    }

    public function delete_alert(){
        $msg    = array();

        $id     = $this->input->post('id');
        $alert  = $this->Alert_db->delete_alert($id);
        if($alert){

            $msg['status']  = 'true';
        }else{

            $msg['status']  = 'false';
        }

        echo json_encode($msg);
    }

    public function get_last_chat_msg_limit_by_1($sender_id,$reciever_id){
         $this->db->where('sender',$sender_id);
        $this->db->where('reciever',$reciever_id);

        $this->db->or_where('sender',$reciever_id);
        $this->db->where('reciever',$sender_id);

        // $this->db->where('reciever_status','unread');

        $this->db->limit(1);
        $this->db->order_by('id','desc');

        $query      =$this->db->get('chat_box');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['message'];
            }
        }
        return false;
    }

    public function get_last_chat_time_limit_by_1($sender_id){
        $this->db->where('reciever',$sender_id);
        // $this->db->where('reciever_status','unread');

        $this->db->limit(1);
        $this->db->order_by('id','desc');

        $query      =$this->db->get('chat_box');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['time'];
            }
        }
        return false;
    }

    public function get_msg_id($sender_id){
        $this->db->where('reciever',$sender_id);

        $this->db->limit(1);
        $this->db->order_by('id','desc');

        $query      =$this->db->get('chat_box');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['id'];
            }
        }
        return false;
    }


    public function count_dis_unread_message($id,$my_id,$dis_user_id){
        // $this->db->where('id',$id);
        $this->db->where('reciever',$my_id);
        $this->db->where('sender',$dis_user_id);
        $this->db->where('reciever_status','unread');

        return $this->db->from('chat_box')->count_all_results();
    }

    public function count_message_id($id){
        $this->db->where('id',$id);
        return $this->db->from('chat_box')->count_all_results();
    }
    
    

    public function get_message_head($page = NULL, $user_id = NULL){
       
        $msg    = array();
        $start = 0;
        $limit = 50;

        $total    = $this->Chat_db->count_chat_head($user_id);
        if ($page > $total) {
            $msg  = array('status' => 'end');
            echo json_encode($msg);
        } else {

            $msg    = array();
            $start = ($page - 1) * $limit;

            $this->db->limit($limit, $start);
            $this->db->order_by('id', 'asc');

            $this->db->where('my_id',$user_id);

            $query      =$this->db->get('chat_head');
            if($query->num_rows() > 0){

                $dis_data   = array();
                foreach($query->result_array() as $row){

                    $id             = $row['id'];
                    $dis_my_id      = $row['my_id'];
                    $dis_user_id    = $row['user_id'];
                    $props_id       = $row['props_id'];

                    $dis_my_full_name               =$this->Users_db->get_user_full_name_by_id($dis_my_id);
                    $dis_my_image_name              =$this->Users_db->get_image_name_by_id($dis_my_id);
                    $dis_my_email                   =$this->Users_db->get_email_by_id($dis_my_id);
                    $dis_my_user_name               =$this->Users_db->get_user_name_by_id($dis_my_id);
                    $dis_my_user_status             =$this->Users_db->get_status_by_id($dis_my_id);
                    $dis_my_image_name              =base_url().'project_dir/users/'.$dis_my_user_name.'/images/'.$dis_my_image_name;
                    

                    $dis_user_full_name              =$this->Users_db->get_user_full_name_by_id($dis_user_id);
                    $dis_user_image_name             =$this->Users_db->get_image_name_by_id($dis_user_id);
                    $dis_user_email                  =$this->Users_db->get_email_by_id($dis_user_id);
                    $dis_user_user_name              =$this->Users_db->get_user_name_by_id($dis_user_id);
                    $dis_user_user_status            =$this->Users_db->get_status_by_id($dis_user_id);
                    $dis_user_image_name             =base_url().'project_dir/users/'.$dis_user_user_name.'/images/'.$dis_user_image_name;

                    $msg_id                          =$this->get_msg_id($user_id);
                    $last_unread_msg                 =$this->get_last_chat_msg_limit_by_1($dis_user_id,$dis_my_id);
                    $last_time_msg                   =$this->get_last_chat_time_limit_by_1($user_id);
                    $count_unread_msg                =$this->count_dis_unread_message($msg_id,$dis_my_id,$dis_user_id);



                    $dis_data[]      = array(
                        'id'                    =>  $id,
                        'dis_my_id'             =>  $dis_my_id,
                        'dis_user_id'           =>  $dis_user_id,
                        'props_id'              =>  $props_id,

                        'dis_my_full_name'      =>  $dis_my_full_name,
                        'dis_my_image_name'     =>  $dis_my_image_name,
                        'dis_my_email'          =>  $dis_my_email,
                        'dis_my_user_name'      =>  $dis_my_user_name,
                        'dis_my_user_status'    =>  $dis_my_user_status,

                        'dis_user_full_name'    =>  $dis_user_full_name,
                        'dis_user_image_name'   =>  $dis_user_image_name,
                        'dis_user_email'        =>  $dis_user_email,
                        'dis_user_user_name'    =>  $dis_user_user_name,
                        'dis_user_user_status'  =>  $dis_user_user_status,

                        'last_msg'              =>  $last_unread_msg,
                        'last_time_msg'         =>  $this->ApiAdmin_db->time_stamp_2($last_time_msg),
                        'count_unread_msg'      =>  "$count_unread_msg",

                    );
                }

                if (count($dis_data) != 0) {
                    $msg['status']      = 'success';
                    $msg['heads']       = $dis_data;
                    echo json_encode($msg);
                }
            }
            else {
                $msg  = array('status' => 'end2');
                echo json_encode($msg);
            }
            
        }
    }

        
    public function get_chat_msg($my_id=NULL,$user_id=NULL){

        $my_id          = $this->input->post('sender');
        $user_id        = $this->input->post('reciever');
        
        $msg = array();
        $this->db->order_by('id', 'asc');
        $this->db->where('sender', $my_id);
        $this->db->where('reciever', $user_id);
        
        $this->db->or_where('sender', $user_id);
        $this->db->where('reciever', $my_id);
        $query      = $this->db->get('chat_box');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $id                         = $row['id'];
                $sender                     = $row['sender'];
                $reciever                   = $row['reciever'];
                $message                    = $row['message'];
                $time                       = $this->ApiAdmin_db->time_stamp_2($row['time']);
                $sender_read_status         = $row['sender_status'];
                $reciever_read_status       = $row['reciever_status'];

                $msg[]                  = array(
                    'sender' => $sender,
                    'reciever' => $reciever,
                    'message'  => $message,
                    'time'     => $time,
                    'id'       => $id,
                    'sender_read_status' => $sender_read_status,
                    'reciever_read_status' => $reciever_read_status,
                );
            }
            
            echo json_encode($msg);
            
        }else{



        if (count($msg) != 0) {
            echo json_encode($msg);
        } else {
            $msg[]  = array('status' => 'end');
            echo json_encode($msg);
        }
        
            // $msg[]  = array('status' => 'end');
            // echo json_encode($msg);
        }
    }
    
    public function send_chat_msg(){
        $msg = array();
        $sender     =$this->input->post('sender');
        $reciever   =$this->input->post('reciever');
        $message    =$this->input->post('message');
        $props_id   =$this->input->post('props_id');
        
        $data       =array('sender'=>$sender, 
                           'reciever'=>$reciever, 
                           'message'=>$message, 
                           'props_id'=>$props_id, 
                           'sender_status'  => 'read',

                           'time'=>time(), 
                           'date_created'=>date('Y-m-d H:i:s')
                        );

        $this->db->set($data);
        $this->db->insert('chat_box');
        if($this->db->affected_rows() > 0){

            //create chat head
            $this->Chat_db->create_chat_head($sender,$reciever,$props_id);
            $this->Chat_db->create_chat_head($reciever,$sender,$props_id);

            $msg  = array('status' => 'true');
        }else{
            $msg  = array('status' => 'false');
        }
        echo json_encode($msg);
    }


    public function count_user_wallet($user_id, $user_status){
        
        if($user_status == 'user'){

            $this->db->where('user_id',$user_id);
        }else{

            $this->db->where('agent_id',$user_id);
        }
            
        return $this->db->from('wallet')->count_all_results();

    }

    public function get_wallet($page = NULL, $user_id = NULL){

        $user_status           = $this->input->post('user_status');
       
        $msg    = array();
        $start = 0;
        $limit = 5;

        $total    = $this->count_user_wallet($user_id, $user_status);
        if ($page > $total) {
            $msg  = array('status' => 'end');
            echo json_encode($msg);
        } else {

            $msg    = array();
            $start = ($page - 1) * $limit;

            $this->db->limit($limit, $start);
            $this->db->order_by('id', 'asc');

            if($user_status == 'user'){

                $this->db->where('user_id',$user_id);
            }else{

                $this->db->where('agent_id',$user_id);
            }

            $query      =$this->db->get('wallet');
            if($query->num_rows() > 0){

                $dis_data       = array();
                foreach($query->result_array() as $row){

                    $id                 = $row['id'];
                    $dis_user_id        = $row['user_id'];
                    $agent_id           = $row['agent_id'];
                    $props_id           = $row['props_id'];
                    $amount             = $row['amount'];
                    $amount_2           = $row['amount'];
                    $full_date          = $row['full_date'];
                    $month              = $row['month'];
                    $day                = $row['day'];
                    $year               = $row['year'];
                    $time               = $row['time'];
                    $trans_type         = $row['trans_type'];
                    $trans_status       = $row['trans_status'];
                    $is_pay             = $row['is_pay'];
                    $is_requested       = $row['is_requested'];



                    $props_name                 =$this->Admin_db->get_props_name_by_id($props_id);
                    $props_image                =$this->Admin_db->get_props_image_by_id($props_id);
                    $props_image                =base_url().'project_dir/property/'.$props_image;

                    $get_props_state_id         =$this->Admin_db->get_state_id_by_props_id($props_id);
                    $get_state_name             =$this->Admin_db->get_state_name_state_id($get_props_state_id);
                                                    
                    $get_props_sub_state_id     =$this->Admin_db->get_sub_state_id_by_props_id($props_id);
                    $get_sub_state_name         =$this->Admin_db->get_sub_state_name_sub_state_id($get_props_sub_state_id);

                    // $currency		            ='&#8358;';
					// $amount 		            = $currency.$this->cart->format_number($amount);
					// $amount_2 		            = $this->cart->format_number($amount_2);


                    $dis_data[]      = array(
                        'id'                                =>  $id,
                        'dis_user_id'                       =>  $dis_user_id,
                        'agent_id'                          =>  $agent_id,
                        'props_id'                          =>  $props_id,
                        'amount'                            =>  $amount,
                        'full_date'                         =>  $full_date,
                        'month'                             =>  $month,
                        'day'                               =>  $day,
                        'year'                              =>  $year,
                        'time'                              =>  $this->ApiAdmin_db->time_stamp_2($time),
                        'trans_type'                        =>  $trans_type,
                        'trans_status'                      =>  $trans_status,
                        'is_pay'                            =>  $is_pay,
                        'is_requested'                      =>  $is_requested,
                        'props_name'                        =>  $props_name,
                        'props_image'                       =>  $props_image,

                        'get_props_state_id'                =>  $get_props_state_id,
                        'get_state_name'                    =>  $get_state_name,

                        'get_props_sub_state_id'            =>  $get_props_sub_state_id,
                        'get_sub_state_name'                =>  $get_sub_state_name

                        
                    );
                }

                if (count($dis_data) != 0) {
                    $msg['status']      = 'success';
                    $msg['wallet']      = $dis_data;
                    echo json_encode($msg);
                }
            }
            else {
                $msg  = array('status' => 'end2');
                echo json_encode($msg);
            }
            
        }
    }


    public function pull_out_payment($props_id =NULL,$agent_id =NULL, $user_id=NULL){
		//if already made payment
		$props_name	=$this->Admin_db->get_props_name_by_id($props_id);


		$isPay 		=$this->Wallet_db->check_if_isPay($user_id,$props_id,$agent_id);
		
		if(!$isPay){

			$isRquested	=$this->Wallet_db->check_if_isRequested($user_id,$props_id,$agent_id);
			if(!$isRquested){
			//check ammount



				$site_name					= $this->Action->get_site_name();
				// $user_id 					=$this->session->userdata('user_id');
				$secure_key   				=$this->Action->get_private_live_key();

				//commissions
				$get_referal_com        	= $this->Action->get_referal_com();
				$get_office_com        		= $this->Action->get_agent_com();
				$get_insurance_com        	= $this->Action->get_insurance_com();

				//total_amount
				$total_amount				= $this->Wallet_db->get_this_wallet_prop_amount($props_id,$agent_id,$user_id);
				$office_perc 	 			=($get_office_com/100) * $total_amount;
				$new_total_amount			= $total_amount - $office_perc;	

				//inssurance percent
				$insurance_perc				= ($get_insurance_com/100) * $office_perc;

				//referal Percent
				$referal_perc 				= ($get_referal_com/100) * $office_perc;
				

				$url = "https://api.paystack.co/transfer/";


				//get my bank code, name, account number
				$my_bank_code			=$this->Users_db->get_user_bank_code($user_id);
				$my_bank_name			=$this->Users_db->get_user_bank_name($user_id);
				$my_account_num			=$this->Users_db->get_user_account_num($user_id);
				$my_account_name		=$this->Users_db->get_user_account_name($user_id);
				$my_rec					=$this->Transaction_db->get_sender_rc($user_id,$agent_id,$props_id);
				$my_amount				=(int)$total_amount*100;
				$my_ref					=random_string('numeric', 16);

				$fields = [
					"source" 		=> "balance", 
					"currency"		=> "NGN",
					"reason" 		=> "Pull Out From ".$site_name, 
					"amount"	 	=> $my_amount, 
					"recipient" 	=> $my_rec,
					"reference" 	=> $my_ref
				];

				$fields_string = http_build_query($fields);

				//open connection
				$ch = curl_init();
				
				//set the url, number of POST vars, POST data
				curl_setopt($ch,CURLOPT_URL, $url);
				curl_setopt($ch,CURLOPT_POST, true);
				curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
				curl_setopt($ch, CURLOPT_HTTPHEADER, array(
					"Authorization: Bearer $secure_key",
					"Cache-Control: no-cache",
				));
				
				//So that curl_exec returns the contents of the cURL; rather than echoing it
				curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
				
				//execute post
				$response = curl_exec($ch);

				
				// print_r($response);
				$result  = json_decode($response, true);
				$result  = array_change_key_case($result, CASE_LOWER);
				// echo $response;

				$status		=$result['status'];
				if($status){
					$trans_type		='withdraw';
					$desc			="Pull Out From ".$site_name;
					$status			='pending';
					$this->Transaction_db->add_complete_transaction($user_id, $user_id, $props_id, $trans_type, $total_amount, $my_ref, $desc, $status);
					$this->Wallet_db->fund_current_balance($user_id,-$total_amount);
					$this->Wallet_db->update_wallet_isRequested_status($user_id,$props_id,$agent_id);

					$msg['status']   = 'transfer'; 
					
				}else{
					$msg['status'] = 'not_transfer'; 
                }
			}else{
				$msg['status']    = 'requested';
			}
		}else{
			$msg['status']    = 'initiated';
		}

        echo json_encode($msg);
    }


    public function get_props_type_and_sub_type(){
        $msg    =array();
        $msg['property']   = array();
        $msg['sub_property']   = array();
       
      
        $props_type                          = $this->get_props_type();
        $sub_props_type                      = $this->get_sub_props_type();

        $msg['property']        = $props_type;
        $msg['sub_property']    = $sub_props_type;

            
        if (count($msg) != 0) {
                echo json_encode($msg);
        }

        else {
            $msg[]  = array('status' => 'end 2');
            echo json_encode($msg);
        }
    }

    public function get_props_type(){
        $query      =$this->db->get('types_of_property');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return [];

    }

    public function get_sub_props_type(){
        $query      =$this->db->get('sub_types_of_propery');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return [];

    }

    public function add_product($user_id = NULL){
        $msg = array();

        $props_name                     = $this->input->post('propsName');
        $props_purpose                  = $this->input->post('props_purpose');
        $props_type                     = $this->input->post('props_type');
        $sub_props_type                 = $this->input->post('sub_props_type');
        $propsBed                       = $this->input->post('propsBed');
        $propsBath                      = $this->input->post('propsBath');
        $propsToilet                    = $this->input->post('propsToilet');
        $state_id                       = $this->input->post('state_id');
        $area_id                        = $this->input->post('area_id');
        $propsPrice                     = $this->input->post('propsPrice');
        $propsDesc                      = $this->input->post('propsDesc');
        $propsYearBuilt                 = $this->input->post('propsYearBuilt');
        $newMode                        = $this->input->post('props_mode');
        $propsYoutubeId                 = $this->input->post('propsYoutubeId');

        $air_condition                  = $this->input->post('air_condition');
        $balcony                        = $this->input->post('balcony');
        $bedding                        = $this->input->post('bedding');
        $cable_tv                       = $this->input->post('cable_tv');
        $cleaning_after_exit           = $this->input->post('cleaning_after_exist');
        $cofee_pot                      = $this->input->post('coffee_pot');
        $computer                       = $this->input->post('computer');
        $cot                            = $this->input->post('cot');
        $dishwasher                     = $this->input->post('dishwasher');
        $dvd                            = $this->input->post('dvd');
        $fan                            = $this->input->post('fan');
        $fridge                         = $this->input->post('fridge');
        $grill                          = $this->input->post('grill');
        $hairdryer                      = $this->input->post('hairdryer');
        $heater                         = $this->input->post('heater');
        $hi_fi                          = $this->input->post('hi_fi');
        $internet                       = $this->input->post('internet');
        $iron                           = $this->input->post('iron');
        $juicer                         = $this->input->post('juicer');
        $lift                           = $this->input->post('lift');
        $microwave                      = $this->input->post('microwave');
        $gym                            = $this->input->post('gym');
        $fireplace                      = $this->input->post('fireplace');
        $hot_tub                        = $this->input->post('hot_tub');


        $propsCondition                 = $this->input->post('propsCondition');
        $propsCautionFee                = $this->input->post('propsCautionFee');
        $selectedPref                   = $this->input->post('selectedPref');

        //
        $shopping_mall                  = $this->input->post('shopping_mall');
        $hospital                       = $this->input->post('hospital');
        $petrol_pump                    = $this->input->post('petrol_pump');
        $airport                        = $this->input->post('airport');
        $church                         = $this->input->post('church');
        $mosque                         = $this->input->post('mosque');
        $school                         = $this->input->post('school');
        //
        
        $crime                          = $this->input->post('crime');
        $traffic                        = $this->input->post('traffic');
        $pollution                      = $this->input->post('pollution');
        $education                      = $this->input->post('education');
        $health                         = $this->input->post('health');





        if($air_condition !='true'){
            $air_condition = 'no';
        }else{
            $air_condition = 'yes';
        }

        if($balcony !='true'){
            $balcony = 'no';
        }else{
            $balcony = 'yes';
        }

        if($bedding !='true'){
            $bedding = 'no';
        }else{
            $bedding    ='yes';
        }

        if($cable_tv !='true'){
            $cable_tv = 'no';
        }else{
            $cable_tv   = 'yes';
        }

        if($cleaning_after_exit !='true'){
            $cleaning_after_exit = 'no';
        }else{
            $cleaning_after_exit    = 'yes';
        }

        if($cofee_pot !='true'){
            $cofee_pot = 'no';
        }else{
            $cofee_pot  = 'yes';
        }

        if($computer !='true'){
            $computer = 'no';
        }else{
            $computer   ='yes';
        }

        if($cot !='true'){
            $cot = 'no';
        }else{
            $cot    = 'yes';
        }

        if($dishwasher !='true'){
            $dishwasher = 'no';
        }else{
            $dishwasher ='yes';
        }

        if($dvd !='true'){
            $dvd = 'no';
        }else{
            $dvd    ='yes';
        }

        if($fan !='true'){
            $fan = 'no';
        }else{
            $fan    = 'yes';
        }

        if($fridge !='true'){
            $fridge = 'no';
        }else{
            $fridge     = 'yes';
        }

        if($grill !='true'){
            $grill = 'no';
        }else{
            $grill  = 'yes';
        }

        if($hairdryer !='true'){
            $hairdryer = 'no';
        }else{
            $hairdryer  = 'yes';
        }

        if($heater !='true'){
            $heater = 'no';
        }else{
            $heater     = 'yes';
        }

        if($hi_fi !='true'){
            $hi_fi = 'no';
        }else{
            $hi_fi  = 'yes';
        }

        if($internet !='true'){
            $internet = 'no';
        }else{
            $internet   = 'yes';
        }

        if($iron !='true'){
            $iron = 'no';
        }else{
            $iron   ='yes';
        }

        if($juicer !='true'){
            $juicer = 'no';
        }else{
            $juicer ='yes';
        }

        if($lift !='true'){
            $lift = 'no';
        }else{
            $lift   ='yes';
        }

        if($microwave !='true'){
            $microwave = 'no';
        }else{
            $microwave  ='yes';
        }

        if($gym !='true'){
            $gym = 'no';
        }else{
            $gym    ='yes';
        }

        if($fireplace !='true'){
            $fireplace = 'no';
        }else{
            $fireplace  ='yes';
        }

        if($hot_tub !='true'){
            $hot_tub = 'no';
        }else{
            $hot_tub    = 'yes';
        }


        @mkdir('project_dir');
		@mkdir('project_dir/property');


        $property_image         = $_FILES['property_image']['name'];
        $propertyImgPath        = 'project_dir/property/' . $property_image;
        $propertyTmp            = $_FILES['property_image']['tmp_name'];
        move_uploaded_file($propertyTmp, $propertyImgPath);


        $data       = array(
                        'prop_name' =>$props_name,
                        'prop_purpose'=>$props_purpose,
                        'type_of_propery'=>$props_type,
                        'sub_type_of_propery'=>$sub_props_type,
                        'prop_bedrom'=>$propsBed,
                        'prop_bathroom'=>$propsBath,
                        'prop_toilet'=>$propsToilet,
                        'state_id'=>$state_id,
                        'sub_state_id'=>$area_id,
                        'price'=>$propsPrice,
                        'description'=>$propsDesc,
                        'prop_vid_id'=>$propsYoutubeId,
                        'prop_year_built'=> $propsYearBuilt,
                        'prop_mode' => $newMode,
                        'prop_img_name' => $property_image,
                        'agent_id'=>$user_id
        );
        

        $this->db->set($data);
        $this->db->insert('propery');
        $prod_id    =$this->db->insert_id();
        if($this->db->affected_rows() > 0){

            $data       = array(
                        'air_condition'=>$air_condition,
                        'balcony'=>$balcony,
                        'bedding'=>$bedding,
                        'cable_tv'=>$cable_tv,
                        'cleaning_after_exit'=>$cleaning_after_exit,
                        'cofee_pot'=>$cofee_pot,
                        'computer'=>$computer,
                        'cot'=>$cot,
                        'dishwasher'=>$dishwasher,
                        'dvd'=>$dvd,
                        'fan'=>$fan,
                        'fridge'=>$fridge,
                        'grill'=>$grill,
                        'hairdryer'=>$hairdryer,
                        'heater'=>$heater,
                        'hi_fi'=>$hi_fi,
                        'internet'=>$internet,
                        'iron'=>$iron,
                        'juicer'=>$juicer,
                        'lift'=>$lift,
                        'microwave'=>$microwave,
                        'gym'=>$gym,
                        'fireplace'=>$fireplace,
                        'hot_tub'=>$hot_tub,
                        'prop_id'=> $prod_id
            );

            $this->db->set($data);
            $this->db->insert('propery_amenities');

            /*/=========/   come here   */
            $data       = array(
                            'prop_condition'=>$propsCondition,
                            'caution_fee'=>$propsCautionFee,
                            'special_pref'=>$selectedPref,
                            'prop_id'=>$prod_id
            );
            $this->db->set($data);
            $this->db->insert('propery_details');
            /*/=========/*/
            
            $data       = array(
                            'shopping_mall'=>$shopping_mall,
                            'hospital'=>$hospital,
                            'petrol_pump'=>$petrol_pump,
                            'airport'=>$airport,
                            'church'=>$church,
                            'mosque'=>$mosque,
                            'school'=>$school,
                            'prop_id'=>$prod_id
            );
            $this->db->set($data);
            $this->db->insert('propery_facilities');

            /*/=========/*/

            $data       = array(
                            'crime'=>$crime,
                            'traffic'=>$traffic,
                            'pollution'=>$pollution,
                            'education'=>$education,
                            'health'=>$health,
                            'prop_id'=>$prod_id
            );
            $this->db->set($data);
            $this->db->insert('propery_valuation');
            /*/=========/*/

            $data   = array('prop_id'=>$prod_id,'image_name'=>$property_image);
            $this->db->set($data);
            $this->db->insert('propery_image');
            /*/=========/*/


            $msg['status']    = true;
        }else{
            $msg['status']    = false;
        }
        echo json_encode($msg);
    }

    public function count_my_product($user_id){

        $this->db->where('agent_id',$user_id);
		return $this->db->from('propery')->count_all_results();
	} 
    
    public function get_my_product($page=NULL, $user_id =NULL){
        $msg    = array();
        $start = 0;
        $limit = 20;
        $total    =$this->count_all_product($user_id);

        if($page > $total) {

            $msg  = array('status'=>'end 1');
            echo json_encode($msg);
        }else{

            $start = ($page - 1) * $limit;
            $this->db->limit($limit,$start);
            $this->db->order_by('id','asc');

            $this->db->where('agent_id',$user_id);

            $query      =$this->db->get('propery');
            if($query->num_rows() > 0){

                $dis_data   = array();
                foreach($query->result_array() as $row){

                    $props_id                           = $row['id'];
                    $props_agent_id                     = $row['agent_id'];
                    $props_name                         = $row['prop_name'];
                    $props_location                     = $row['prop_location'];
                    $props_img_name                     = $row['prop_img_name'];
                    $props_img_name                     = base_url().'project_dir/property/'.$props_img_name;
                    $props_vid_id                       = $row['prop_vid_id'];
                    $props_type                         = $row['prop_type'];
                    $props_purpose                      = $row['prop_purpose'];
                    $props_status                       = $row['prop_status'];
                    $props_bedrom                       = $row['prop_bedrom'];
                    $props_bed                          = $row['prop_bed'];
                    $props_bathroom                     = $row['prop_bathroom'];
                    $props_toilet                       = $row['prop_toilet'];
                    $props_home_area                    = $row['prop_home_area'];
                    $props_lot_area                     = $row['prop_lot_area'];
                    $props_year_built                   = $row['prop_year_built'];
                    $props_created                      = $row['date_created'];
                    $props_state_id                     = $row['state_id'];
                    $props_sub_state_id                 = $row['sub_state_id'];
                    $props_type_of_propery              = $row['type_of_propery'];
                    $props_sub_type_of_propery          = $row['sub_type_of_propery'];
                    $props_price                        = $row['price'];
                    $props_description                  = $row['description'];
                    $prop_mode                          = $row['prop_mode'];
                    $props_live_status                  = $row['live_status'];
                    $slider_img                         = $row['slider_img'];
                    $slider_img                         = base_url().'project_dir/property/'.$slider_img;

                    $prop_mode                          = ucfirst(str_replace("_"," ",$prop_mode));

                    //get facilities
                    $props_shopping_mall                = $this->ApiAdmin_db->props_shopping_mall($props_id);
                    $props_hospital                     = $this->ApiAdmin_db->props_hospital($props_id);
                    $props_school                       = $this->ApiAdmin_db->props_school($props_id);
                    $props_petrol_pump                  = $this->ApiAdmin_db->props_petrol_pump($props_id);
                    $props_airport                      = $this->ApiAdmin_db->props_airport($props_id);
                    $props_church                       = $this->ApiAdmin_db->props_church($props_id);
                    $props_mosque                       = $this->ApiAdmin_db->props_mosque($props_id);

                    //get amenities
                    $props_air_condition                = $this->ApiAdmin_db->props_air_condition($props_id);
                    $props_balcony                      = $this->ApiAdmin_db->props_balcony($props_id);
                    $props_bedding                      = $this->ApiAdmin_db->props_bedding($props_id);
                    $props_cable_tv                     = $this->ApiAdmin_db->props_cable_tv($props_id);
                    $props_cleaning_after_exit          = $this->ApiAdmin_db->props_cleaning_after_exit($props_id);
                    $props_cofee_pot                    = $this->ApiAdmin_db->props_cofee_pot($props_id);
                    $props_computer                     = $this->ApiAdmin_db->props_computer($props_id);
                    $props_cot                          = $this->ApiAdmin_db->props_cot($props_id);
                    $props_dishwasher                   = $this->ApiAdmin_db->props_dishwasher($props_id);
                    $props_dvd                          = $this->ApiAdmin_db->props_dvd($props_id);
                    $props_fan                          = $this->ApiAdmin_db->props_fan($props_id);
                    $props_fridge                       = $this->ApiAdmin_db->props_fridge($props_id);
                    $props_grill                        = $this->ApiAdmin_db->props_grill($props_id);
                    $props_hairdryer                    = $this->ApiAdmin_db->props_hairdryer($props_id);
                    $props_heater                       = $this->ApiAdmin_db->props_heater($props_id);
                    $props_hi_fi                        = $this->ApiAdmin_db->props_hi_fi($props_id);
                    $props_internet                     = $this->ApiAdmin_db->props_internet($props_id);
                    $props_iron                         = $this->ApiAdmin_db->props_iron($props_id);
                    $props_juicer                       = $this->ApiAdmin_db->props_juicer($props_id);
                    $props_lift                         = $this->ApiAdmin_db->props_lift($props_id);
                    $props_microwave                    = $this->ApiAdmin_db->props_microwave($props_id);
                    $props_gym                          = $this->ApiAdmin_db->props_gym($props_id);
                    $props_fireplace                    = $this->ApiAdmin_db->props_fireplace($props_id);
                    $props_hot_tub                      = $this->ApiAdmin_db->props_hot_tub($props_id);


                    //get valuation
                    $props_crime                        = $this->ApiAdmin_db->props_crime($props_id);
                    $props_traffic                      = $this->ApiAdmin_db->props_traffic($props_id);
                    $props_pollution                    = $this->ApiAdmin_db->props_pollution($props_id);
                    $props_education                    = $this->ApiAdmin_db->props_education($props_id);
                    $props_health                       = $this->ApiAdmin_db->props_health($props_id);


                    //get Details
                    $props_condition                    = $this->ApiAdmin_db->props_condition($props_id);
                    $props_caution_fee                  = $this->ApiAdmin_db->props_caution_fee($props_id);
                    $props_special_pref                 = $this->ApiAdmin_db->props_special_pref($props_id);

                    //get_all_props_image
                    $get_all_props_image                = $this->ApiAdmin_db->get_all_props_image_2($props_id);

                    //get_all_props_video
                    $get_all_props_video                = $this->ApiAdmin_db->get_all_props_video($props_id);

                    $get_state_name                     =$this->ApiAdmin_db->get_state_name_state_id($props_state_id);
                    $get_sub_state_name                 =$this->ApiAdmin_db->get_sub_state_name_sub_state_id($props_sub_state_id);                                    

                    $count_props_image                  = $this->Property_db->count_prop_images($props_id);
                    $favourite                          = $this->Users_db->check_if_i_favourite($user_id,$props_id);

                    $type_name                          = $this->ApiAdmin_db->get_types_of_property_name_by_id($props_type_of_propery);
                    $sub_type_name                      = $this->ApiAdmin_db->get_sub_types_of_property_name_by_id($props_type_of_propery);

                    //Agent
                    $agent_full_name                    = $this->Users_db->get_user_full_name_by_id($props_agent_id);
                    $agent_image_name                   = $this->Users_db->get_image_name_by_id($props_agent_id);
                    $agent_email                        = $this->Users_db->get_email_by_id($props_agent_id);
                    $agent_status                       = $this->Users_db->get_status_by_id($props_agent_id);
                    $agent_user_name                    = $this->Users_db->get_user_name_by_id($props_agent_id);
                    $agent_user_phone                   = $this->Users_db->get_user_phone_by_id($props_agent_id);
                    $agent_prop_counter                 = $this->Property_db->count_all_user_property($props_agent_id);


                    $agent_email                        = substr_replace($agent_email, 'XXXXXXXX', '5', '5');
                    $agent_user_phone                   = substr_replace($agent_user_phone, 'XXXXX', '3', '5');
                    


                    $dis_data[]      = array(
                        'props_id'                              =>  $props_id,
                        'props_agent_id'                        =>  $props_agent_id,
                        'props_name'                            =>  $props_name,
                        'props_location'                        =>  $props_location,
                        'props_img_name'                        =>  $props_img_name,
                        'props_vid_id'                          =>  $props_vid_id,
                        'props_type'                            =>  $props_type,
                        'props_purpose'                         =>  $props_purpose,
                        'props_status'                          =>  $props_status,
                        'props_bedrom'                          =>  $props_bedrom,
                        'props_bed'                             =>  $props_bed,
                        'props_bathroom'                        =>  $props_bathroom,
                        'props_toilet'                          =>  $props_toilet,
                        'props_home_area'                       =>  $props_home_area,
                        'props_lot_area'                        =>  $props_lot_area,
                        'props_year_built'                      =>  $props_year_built,
                        'props_created'                         =>  $props_created,
                        'props_state_id'                        =>  $props_state_id,
                        'props_sub_state_id'                    =>  $props_sub_state_id,
                        'props_type_of_propery'                 =>  $props_type_of_propery,
                        'props_sub_type_of_propery'             =>  $props_sub_type_of_propery,
                        'props_price'                           =>  $props_price,
                        'props_description'                     =>  $props_description,
                        'prop_mode'                             =>  $prop_mode,
                        //facilities
                        'props_shopping_mall'                   =>  $props_shopping_mall,
                        'props_hospital'                        =>  $props_hospital,
                        'props_school'                          =>  $props_school,
                        'props_petrol_pump'                     =>  $props_petrol_pump,
                        'props_airport'                         =>  $props_airport,
                        'props_church'                          =>  $props_church,
                        'props_mosque'                          =>  $props_mosque,
                        //get amenities
                        'props_air_condition'                   =>  $props_air_condition,
                        'props_balcony'                         =>  $props_balcony,
                        'props_bedding'                         =>  $props_bedding,
                        'props_cable_tv'                        =>  $props_cable_tv,
                        'props_cleaning_after_exit'             =>  $props_cleaning_after_exit,
                        'props_cofee_pot'                       =>  $props_cofee_pot,
                        'props_computer'                        =>  $props_computer,
                        'props_cot'                             =>  $props_cot,
                        'props_dishwasher'                      =>  $props_dishwasher,
                        'props_dvd'                             =>  $props_dvd,
                        'props_fan'                             =>  $props_fan,
                        'props_fridge'                          =>  $props_fridge,
                        'props_grill'                           =>  $props_grill,
                        'props_hairdryer'                       =>  $props_hairdryer,
                        'props_heater'                          =>  $props_heater,
                        'props_hi_fi'                           =>  $props_hi_fi,
                        'props_internet'                        =>  $props_internet,
                        'props_iron'                            =>  $props_iron,
                        'props_juicer'                          =>  $props_juicer,
                        'props_lift'                            =>  $props_lift,
                        'props_microwave'                       =>  $props_microwave,
                        'props_gym'                             =>  $props_gym,
                        'props_fireplace'                       =>  $props_fireplace,
                        'props_hot_tub'                         =>  $props_hot_tub,
                        //get valuation
                        'props_crime'                           =>  $props_crime,
                        'props_traffic'                         =>  $props_traffic,
                        'props_pollution'                       =>  $props_pollution,
                        'props_education'                       =>  $props_education,
                        'props_health'                          =>  $props_health,

                        //get Details
                        'props_condition'                       =>  $props_condition,
                        'props_caution_fee'                     =>  $props_caution_fee,
                        'props_special_pref'                    =>  $props_special_pref,

                        //get_all_props_image
                        //get_all_props_video
                        'props_live_status'                     =>  $props_live_status,
                        'slider_img'                            =>  $slider_img,
                        'get_all_props_image'                   =>  $get_all_props_image,
                        'get_all_props_video'                   =>  $get_all_props_video,

                        //caution fee
                        'get_state_name'                        =>  $get_state_name,
                        'get_sub_state_name'                    =>  $get_sub_state_name,

                        'count_props_image'                     =>  $count_props_image,
                        'favourite'                             =>  $favourite,
                        'type_name'                             =>  $type_name,
                        'sub_type_name'                         =>  $sub_type_name,
                        
                        //Agent Detail
                        'agent_full_name'                       =>  $agent_full_name,
                        'agent_image_name'                      =>  $agent_image_name,
                        'agent_email'                           =>  $agent_email,
                        'agent_status'                          =>  $agent_status,
                        'agent_user_name'                       =>  $agent_user_name,
                        'agent_user_phone'                      =>  $agent_user_phone,
                        'agent_prop_counter'                    =>  $agent_prop_counter
                    );
                }

                if (count($dis_data) != 0) {
                    $msg['status']      = 'success';
                    $msg['product']     = $dis_data;
                    echo json_encode($msg);
                }
            }
            else {
                $msg  = array('status' => 'end 2');
                echo json_encode($msg);
            }
            
        }
    }

    public function count_dis_product($prod_id){

        $this->db->where('id',$prod_id);
		return $this->db->from('propery')->count_all_results();
	} 

    public function get_dis_product($page=NULL, $user_id =NULL, $prod_id=NULL){
        $msg    = array();
        $start = 0;
        $limit = 5;
        $total    =$this->count_dis_product($prod_id);

        if($page > $total) {

            $msg  = array('status'=>'end 1');
            echo json_encode($msg);
        }else{

            $start = ($page - 1) * $limit;
            $this->db->limit($limit,$start);
            $this->db->order_by('id','asc');

            $this->db->where('id',$prod_id);

            $query      =$this->db->get('propery');
            if($query->num_rows() > 0){

                $dis_data       = array();
                foreach($query->result_array() as $row){

                    $props_id                           = $row['id'];
                    $props_agent_id                     = $row['agent_id'];
                    $props_name                         = $row['prop_name'];
                    $props_location                     = $row['prop_location'];
                    $props_img_name                     = $row['prop_img_name'];
                    $props_img_name                     = base_url().'project_dir/property/'.$props_img_name;
                    $props_vid_id                       = $row['prop_vid_id'];
                    $props_type                         = $row['prop_type'];
                    $props_purpose                      = $row['prop_purpose'];
                    $props_status                       = $row['prop_status'];
                    $props_bedrom                       = $row['prop_bedrom'];
                    $props_bed                          = $row['prop_bed'];
                    $props_bathroom                     = $row['prop_bathroom'];
                    $props_toilet                       = $row['prop_toilet'];
                    $props_home_area                    = $row['prop_home_area'];
                    $props_lot_area                     = $row['prop_lot_area'];
                    $props_year_built                   = $row['prop_year_built'];
                    $props_created                      = $row['date_created'];
                    $props_state_id                     = $row['state_id'];
                    $props_sub_state_id                 = $row['sub_state_id'];
                    $props_type_of_propery              = $row['type_of_propery'];
                    $props_sub_type_of_propery          = $row['sub_type_of_propery'];
                    $props_price                        = $row['price'];
                    $props_description                  = $row['description'];
                    $prop_mode                          = $row['prop_mode'];
                    $props_live_status                  = $row['live_status'];
                    $slider_img                         = $row['slider_img'];
                    $slider_img                         = base_url().'project_dir/property/'.$slider_img;

                    $prop_mode                          = ucfirst(str_replace("_"," ",$prop_mode));

                    //get facilities
                    $props_shopping_mall                = $this->ApiAdmin_db->props_shopping_mall($props_id);
                    $props_hospital                     = $this->ApiAdmin_db->props_hospital($props_id);
                    $props_school                       = $this->ApiAdmin_db->props_school($props_id);
                    $props_petrol_pump                  = $this->ApiAdmin_db->props_petrol_pump($props_id);
                    $props_airport                      = $this->ApiAdmin_db->props_airport($props_id);
                    $props_church                       = $this->ApiAdmin_db->props_church($props_id);
                    $props_mosque                       = $this->ApiAdmin_db->props_mosque($props_id);

                    //get amenities
                    $props_air_condition                = $this->ApiAdmin_db->props_air_condition($props_id);
                    $props_balcony                      = $this->ApiAdmin_db->props_balcony($props_id);
                    $props_bedding                      = $this->ApiAdmin_db->props_bedding($props_id);
                    $props_cable_tv                     = $this->ApiAdmin_db->props_cable_tv($props_id);
                    $props_cleaning_after_exit          = $this->ApiAdmin_db->props_cleaning_after_exit($props_id);
                    $props_cofee_pot                    = $this->ApiAdmin_db->props_cofee_pot($props_id);
                    $props_computer                     = $this->ApiAdmin_db->props_computer($props_id);
                    $props_cot                          = $this->ApiAdmin_db->props_cot($props_id);
                    $props_dishwasher                   = $this->ApiAdmin_db->props_dishwasher($props_id);
                    $props_dvd                          = $this->ApiAdmin_db->props_dvd($props_id);
                    $props_fan                          = $this->ApiAdmin_db->props_fan($props_id);
                    $props_fridge                       = $this->ApiAdmin_db->props_fridge($props_id);
                    $props_grill                        = $this->ApiAdmin_db->props_grill($props_id);
                    $props_hairdryer                    = $this->ApiAdmin_db->props_hairdryer($props_id);
                    $props_heater                       = $this->ApiAdmin_db->props_heater($props_id);
                    $props_hi_fi                        = $this->ApiAdmin_db->props_hi_fi($props_id);
                    $props_internet                     = $this->ApiAdmin_db->props_internet($props_id);
                    $props_iron                         = $this->ApiAdmin_db->props_iron($props_id);
                    $props_juicer                       = $this->ApiAdmin_db->props_juicer($props_id);
                    $props_lift                         = $this->ApiAdmin_db->props_lift($props_id);
                    $props_microwave                    = $this->ApiAdmin_db->props_microwave($props_id);
                    $props_gym                          = $this->ApiAdmin_db->props_gym($props_id);
                    $props_fireplace                    = $this->ApiAdmin_db->props_fireplace($props_id);
                    $props_hot_tub                      = $this->ApiAdmin_db->props_hot_tub($props_id);


                    //get valuation
                    $props_crime                        = $this->ApiAdmin_db->props_crime($props_id);
                    $props_traffic                      = $this->ApiAdmin_db->props_traffic($props_id);
                    $props_pollution                    = $this->ApiAdmin_db->props_pollution($props_id);
                    $props_education                    = $this->ApiAdmin_db->props_education($props_id);
                    $props_health                       = $this->ApiAdmin_db->props_health($props_id);


                    //get Details
                    $props_condition                    = $this->ApiAdmin_db->props_condition($props_id);
                    $props_caution_fee                  = $this->ApiAdmin_db->props_caution_fee($props_id);
                    $props_special_pref                 = $this->ApiAdmin_db->props_special_pref($props_id);

                    //get_all_props_image
                    $get_all_props_image                = $this->ApiAdmin_db->get_all_props_image_2($props_id);

                    //get_all_props_video
                    $get_all_props_video                = $this->ApiAdmin_db->get_all_props_video($props_id);

                    $get_state_name                     =$this->ApiAdmin_db->get_state_name_state_id($props_state_id);
                    $get_sub_state_name                 =$this->ApiAdmin_db->get_sub_state_name_sub_state_id($props_sub_state_id);                                    

                    $count_props_image                  = $this->Property_db->count_prop_images($props_id);
                    $favourite                          = $this->Users_db->check_if_i_favourite($user_id,$props_id);

                    $type_name                          = $this->ApiAdmin_db->get_types_of_property_name_by_id($props_type_of_propery);
                    $sub_type_name                      = $this->ApiAdmin_db->get_sub_types_of_property_name_by_id($props_type_of_propery);

                    //Agent
                    $agent_full_name                    = $this->Users_db->get_user_full_name_by_id($props_agent_id);
                    $agent_image_name                   = $this->Users_db->get_image_name_by_id($props_agent_id);
                    $agent_email                        = $this->Users_db->get_email_by_id($props_agent_id);
                    $agent_status                       = $this->Users_db->get_status_by_id($props_agent_id);
                    $agent_user_name                    = $this->Users_db->get_user_name_by_id($props_agent_id);
                    $agent_user_phone                   = $this->Users_db->get_user_phone_by_id($props_agent_id);
                    $agent_prop_counter                 = $this->Property_db->count_all_user_property($props_agent_id);


                    $agent_email                        = substr_replace($agent_email, 'XXXXXXXX', '5', '5');
                    $agent_user_phone                   = substr_replace($agent_user_phone, 'XXXXX', '3', '5');
                    


                    $dis_data[]      = array(
                        'props_id'                              =>  $props_id,
                        'props_agent_id'                        =>  $props_agent_id,
                        'props_name'                            =>  $props_name,
                        'props_location'                        =>  $props_location,
                        'props_img_name'                        =>  $props_img_name,
                        'props_vid_id'                          =>  $props_vid_id,
                        'props_type'                            =>  $props_type,
                        'props_purpose'                         =>  $props_purpose,
                        'props_status'                          =>  $props_status,
                        'props_bedrom'                          =>  $props_bedrom,
                        'props_bed'                             =>  $props_bed,
                        'props_bathroom'                        =>  $props_bathroom,
                        'props_toilet'                          =>  $props_toilet,
                        'props_home_area'                       =>  $props_home_area,
                        'props_lot_area'                        =>  $props_lot_area,
                        'props_year_built'                      =>  $props_year_built,
                        'props_created'                         =>  $props_created,
                        'props_state_id'                        =>  $props_state_id,
                        'props_sub_state_id'                    =>  $props_sub_state_id,
                        'props_type_of_propery'                 =>  $props_type_of_propery,
                        'props_sub_type_of_propery'             =>  $props_sub_type_of_propery,
                        'props_price'                           =>  $props_price,
                        'props_description'                     =>  $props_description,
                        'prop_mode'                             =>  $prop_mode,
                        //facilities
                        'props_shopping_mall'                   =>  $props_shopping_mall,
                        'props_hospital'                        =>  $props_hospital,
                        'props_school'                          =>  $props_school,
                        'props_petrol_pump'                     =>  $props_petrol_pump,
                        'props_airport'                         =>  $props_airport,
                        'props_church'                          =>  $props_church,
                        'props_mosque'                          =>  $props_mosque,
                        //get amenities
                        'props_air_condition'                   =>  $props_air_condition,
                        'props_balcony'                         =>  $props_balcony,
                        'props_bedding'                         =>  $props_bedding,
                        'props_cable_tv'                        =>  $props_cable_tv,
                        'props_cleaning_after_exit'             =>  $props_cleaning_after_exit,
                        'props_cofee_pot'                       =>  $props_cofee_pot,
                        'props_computer'                        =>  $props_computer,
                        'props_cot'                             =>  $props_cot,
                        'props_dishwasher'                      =>  $props_dishwasher,
                        'props_dvd'                             =>  $props_dvd,
                        'props_fan'                             =>  $props_fan,
                        'props_fridge'                          =>  $props_fridge,
                        'props_grill'                           =>  $props_grill,
                        'props_hairdryer'                       =>  $props_hairdryer,
                        'props_heater'                          =>  $props_heater,
                        'props_hi_fi'                           =>  $props_hi_fi,
                        'props_internet'                        =>  $props_internet,
                        'props_iron'                            =>  $props_iron,
                        'props_juicer'                          =>  $props_juicer,
                        'props_lift'                            =>  $props_lift,
                        'props_microwave'                       =>  $props_microwave,
                        'props_gym'                             =>  $props_gym,
                        'props_fireplace'                       =>  $props_fireplace,
                        'props_hot_tub'                         =>  $props_hot_tub,
                        //get valuation
                        'props_crime'                           =>  $props_crime,
                        'props_traffic'                         =>  $props_traffic,
                        'props_pollution'                       =>  $props_pollution,
                        'props_education'                       =>  $props_education,
                        'props_health'                          =>  $props_health,

                        //get Details
                        'props_condition'                       =>  $props_condition,
                        'props_caution_fee'                     =>  $props_caution_fee,
                        'props_special_pref'                    =>  $props_special_pref,

                        //get_all_props_image
                        //get_all_props_video
                        'props_live_status'                     =>  $props_live_status,
                        'slider_img'                            =>  $slider_img,
                        'get_all_props_image'                   =>  $get_all_props_image,
                        'get_all_props_video'                   =>  $get_all_props_video,

                        //caution fee
                        'get_state_name'                        =>  $get_state_name,
                        'get_sub_state_name'                    =>  $get_sub_state_name,

                        'count_props_image'                     =>  $count_props_image,
                        'favourite'                             =>  $favourite,
                        'type_name'                             =>  $type_name,
                        'sub_type_name'                         =>  $sub_type_name,
                        
                        //Agent Detail
                        'agent_full_name'                       =>  $agent_full_name,
                        'agent_image_name'                      =>  $agent_image_name,
                        'agent_email'                           =>  $agent_email,
                        'agent_status'                          =>  $agent_status,
                        'agent_user_name'                       =>  $agent_user_name,
                        'agent_user_phone'                      =>  $agent_user_phone,
                        'agent_prop_counter'                    =>  $agent_prop_counter
                    );
                }

                if (count($dis_data) != 0) {
                    $msg['status']      = 'success';
                    $msg['product']     = $dis_data;
                    echo json_encode($msg);
                }
            }
            else {
                $msg  = array('status' => 'end 2');
                echo json_encode($msg);
            }
            
        }
    }


    public function edit_basic($user_id = NULL){
        $msg = array();

        $props_name                     = $this->input->post('propsName');
        $props_purpose                  = $this->input->post('props_purpose');
        $props_type                     = $this->input->post('props_type');
        $sub_props_type                 = $this->input->post('sub_props_type');
        $propsBed                       = $this->input->post('propsBed');
        $propsBath                      = $this->input->post('propsBath');
        $propsToilet                    = $this->input->post('propsToilet');
        $state_id                       = $this->input->post('state_id');
        $area_id                        = $this->input->post('area_id');
        $propsPrice                     = $this->input->post('propsPrice');
        $propsDesc                      = $this->input->post('propsDesc');
        $propsYearBuilt                 = $this->input->post('propsYearBuilt');
        $newMode                        = $this->input->post('props_mode');
        $propsYoutubeId                 = $this->input->post('propsYoutubeId');
        $propsId                        = $this->input->post('propsId');

       




     


        $data       = array(
                        'prop_name' =>$props_name,
                        'prop_purpose'=>$props_purpose,
                        'type_of_propery'=>$props_type,
                        'sub_type_of_propery'=>$sub_props_type,
                        'prop_bedrom'=>$propsBed,
                        'prop_bathroom'=>$propsBath,
                        'prop_toilet'=>$propsToilet,
                        'state_id'=>$state_id,
                        'sub_state_id'=>$area_id,
                        'price'=>$propsPrice,
                        'description'=>$propsDesc,
                        'prop_year_built'=> $propsYearBuilt,
                        'prop_mode' => $newMode,
                        'prop_vid_id'=>$propsYoutubeId,
                        
                      
        );
        

        $this->db->set($data);
        $this->db->where('id',$propsId);
        $this->db->where('agent_id',$user_id);
        $this->db->update('propery');
        $prod_id    =$this->db->insert_id();
        if($this->db->affected_rows() > 0){

            $msg['status']    = true;
        }else{
            $msg['status']    = false;
        }
        echo json_encode($msg);
    }


    public function edit_extra_detail($user_id = NULL){
        $msg = array();

        


        $propsCondition                 = $this->input->post('propsCondition');
        $propsCautionFee                = $this->input->post('propsCautionFee');
        $selectedPref                   = $this->input->post('selectedPref');
        $propsId                        = $this->input->post('propsId');

        

        $data       = array(
                            'prop_condition'=>$propsCondition,
                            'caution_fee'=>$propsCautionFee,
                            'special_pref'=>$selectedPref,
        );
        

        $this->db->set($data);
        $this->db->where('prop_id',$propsId);
        $this->db->update('propery_details');
        if($this->db->affected_rows() > 0){

           
            


            $msg['status']    = true;
        }else{
            $msg['status']    = false;
        }
        echo json_encode($msg);
    }


    public function edit_amenities($user_id = NULL){
        $msg = array();

        

        $air_condition                  = $this->input->post('air_condition');
        $balcony                        = $this->input->post('balcony');
        $bedding                        = $this->input->post('bedding');
        $cable_tv                       = $this->input->post('cable_tv');
        $cleaning_after_exit            = $this->input->post('cleaning_after_exist');
        $cofee_pot                      = $this->input->post('coffee_pot');
        $computer                       = $this->input->post('computer');
        $cot                            = $this->input->post('cot');
        $dishwasher                     = $this->input->post('dishwasher');
        $dvd                            = $this->input->post('dvd');
        $fan                            = $this->input->post('fan');
        $fridge                         = $this->input->post('fridge');
        $grill                          = $this->input->post('grill');
        $hairdryer                      = $this->input->post('hairdryer');
        $heater                         = $this->input->post('heater');
        $hi_fi                          = $this->input->post('hi_fi');
        $internet                       = $this->input->post('internet');
        $iron                           = $this->input->post('iron');
        $juicer                         = $this->input->post('juicer');
        $lift                           = $this->input->post('lift');
        $microwave                      = $this->input->post('microwave');
        $gym                            = $this->input->post('gym');
        $fireplace                      = $this->input->post('fireplace');
        $hot_tub                        = $this->input->post('hot_tub');
        $propsId                        = $this->input->post('propsId');


        
        





        if($air_condition !='true'){
            $air_condition = 'no';
        }else{
            $air_condition = 'yes';
        }

        if($balcony !='true'){
            $balcony = 'no';
        }else{
            $balcony = 'yes';
        }

        if($bedding !='true'){
            $bedding = 'no';
        }else{
            $bedding    ='yes';
        }

        if($cable_tv !='true'){
            $cable_tv = 'no';
        }else{
            $cable_tv   = 'yes';
        }

        if($cleaning_after_exit !='true'){
            $cleaning_after_exit = 'no';
        }else{
            $cleaning_after_exit    = 'yes';
        }

        if($cofee_pot !='true'){
            $cofee_pot = 'no';
        }else{
            $cofee_pot  = 'yes';
        }

        if($computer !='true'){
            $computer = 'no';
        }else{
            $computer   ='yes';
        }

        if($cot !='true'){
            $cot = 'no';
        }else{
            $cot    = 'yes';
        }

        if($dishwasher !='true'){
            $dishwasher = 'no';
        }else{
            $dishwasher ='yes';
        }

        if($dvd !='true'){
            $dvd = 'no';
        }else{
            $dvd    ='yes';
        }

        if($fan !='true'){
            $fan = 'no';
        }else{
            $fan    = 'yes';
        }

        if($fridge !='true'){
            $fridge = 'no';
        }else{
            $fridge     = 'yes';
        }

        if($grill !='true'){
            $grill = 'no';
        }else{
            $grill  = 'yes';
        }

        if($hairdryer !='true'){
            $hairdryer = 'no';
        }else{
            $hairdryer  = 'yes';
        }

        if($heater !='true'){
            $heater = 'no';
        }else{
            $heater     = 'yes';
        }

        if($hi_fi !='true'){
            $hi_fi = 'no';
        }else{
            $hi_fi  = 'yes';
        }

        if($internet !='true'){
            $internet = 'no';
        }else{
            $internet   = 'yes';
        }

        if($iron !='true'){
            $iron = 'no';
        }else{
            $iron   ='yes';
        }

        if($juicer !='true'){
            $juicer = 'no';
        }else{
            $juicer ='yes';
        }

        if($lift !='true'){
            $lift = 'no';
        }else{
            $lift   ='yes';
        }

        if($microwave !='true'){
            $microwave = 'no';
        }else{
            $microwave  ='yes';
        }

        if($gym !='true'){
            $gym = 'no';
        }else{
            $gym    ='yes';
        }

        if($fireplace !='true'){
            $fireplace = 'no';
        }else{
            $fireplace  ='yes';
        }

        if($hot_tub !='true'){
            $hot_tub = 'no';
        }else{
            $hot_tub    = 'yes';
        }


        $data       = array(
                        'air_condition'=>$air_condition,
                        'balcony'=>$balcony,
                        'bedding'=>$bedding,
                        'cable_tv'=>$cable_tv,
                        'cleaning_after_exit'=>$cleaning_after_exit,
                        'cofee_pot'=>$cofee_pot,
                        'computer'=>$computer,
                        'cot'=>$cot,
                        'dishwasher'=>$dishwasher,
                        'dvd'=>$dvd,
                        'fan'=>$fan,
                        'fridge'=>$fridge,
                        'grill'=>$grill,
                        'hairdryer'=>$hairdryer,
                        'heater'=>$heater,
                        'hi_fi'=>$hi_fi,
                        'internet'=>$internet,
                        'iron'=>$iron,
                        'juicer'=>$juicer,
                        'lift'=>$lift,
                        'microwave'=>$microwave,
                        'gym'=>$gym,
                        'fireplace'=>$fireplace,
                        'hot_tub'=>$hot_tub,
        );

        $this->db->set($data);
        $this->db->where('prop_id',$propsId);
        $this->db->update('propery_amenities');

        if($this->db->affected_rows() > 0){

            $msg['status']    = true;
        }else{
            $msg['status']    = false;
        }
        echo json_encode($msg);
    }


    public function edit_facilities($user_id = NULL){
        $msg = array();

        
        
        $shopping_mall                  = $this->input->post('shopping_mall');
        $hospital                       = $this->input->post('hospital');
        $petrol_pump                    = $this->input->post('petrol_pump');
        $airport                        = $this->input->post('airport');
        $church                         = $this->input->post('church');
        $mosque                         = $this->input->post('mosque');
        $school                         = $this->input->post('school');
        $propsId                        = $this->input->post('propsId');
        

       $data       = array(
                            'shopping_mall'=>$shopping_mall,
                            'hospital'=>$hospital,
                            'petrol_pump'=>$petrol_pump,
                            'airport'=>$airport,
                            'church'=>$church,
                            'mosque'=>$mosque,
                            'school'=>$school,
        );
        $this->db->set($data);
        $this->db->where('prop_id',$propsId);
        $this->db->update('propery_facilities');
        if($this->db->affected_rows() > 0){

            $msg['status']    = true;
        }else{
            $msg['status']    = false;
        }
        echo json_encode($msg);
    }

    public function edit_valuation($user_id = NULL){
        $msg = array();

        
        
        $crime                          = $this->input->post('crime');
        $traffic                        = $this->input->post('traffic');
        $pollution                      = $this->input->post('pollution');
        $education                      = $this->input->post('education');
        $health                         = $this->input->post('health');
        $propsId                        = $this->input->post('propsId');


        
        
        $data       = array(
                            'crime'=>$crime,
                            'traffic'=>$traffic,
                            'pollution'=>$pollution,
                            'education'=>$education,
                            'health'=>$health,
        );
        $this->db->set($data);
        $this->db->where('prop_id',$propsId);
        $this->db->update('propery_valuation');
        if($this->db->affected_rows() > 0){

            $msg['status']    = true;
        }else{
            $msg['status']    = false;
        }
        echo json_encode($msg);
    }

    public function delete_props($user_id = NULL){
        $msg = array();

        
        
        $user_id                          = $this->input->post('user_id');
        $props_id                         = $this->input->post('props_id');
        $image_id                         = $this->input->post('image_id');
       
        
        $this->db->where('id',$image_id);
        $this->db->delete('propery_image');
        if($this->db->affected_rows() > 0){

            $msg['status']    = true;
        }else{
            $msg['status']    = false;
        }
        echo json_encode($msg);
    }


    public function update_image($user_id = NULL){
        $msg = array();

        $propsId                     = $this->input->post('propsId');
        
        

       

        @mkdir('project_dir');
		@mkdir('project_dir/property');


        $property_image         = $_FILES['property_image']['name'];
        $propertyImgPath        = 'project_dir/property/' . $property_image;
        $propertyTmp            = $_FILES['property_image']['tmp_name'];
        move_uploaded_file($propertyTmp, $propertyImgPath);


        $data   = array('prop_id'=>$propsId,'image_name'=>$property_image);
        $this->db->set($data);
        $this->db->insert('propery_image');
        $img_id    =$this->db->insert_id();

        if($this->db->affected_rows() > 0){          

            

            
            /*/=========/*/
            $data   = array(
                        
                    'prop_img_name' => $property_image,
            );
        

            $this->db->set($data);
            $this->db->where('id',$propsId);
            $this->db->update('propery');
            /*/=========/*/

            $property_image       =base_url().'project_dir/property/'.$property_image;

            $msg['status']        = true;
            $msg['image_name']    = $property_image;
            $msg['img_id']        = $img_id;
            $msg['prod_id']       = $propsId;
        }else{
            $msg['status']    = false;
        }
        echo json_encode($msg);
    }


    public function update_feature_image($user_id = NULL){
        $msg = array();

        $propsId                     = $this->input->post('propsId');
        
        

       

        @mkdir('project_dir');
		@mkdir('project_dir/property');


        $property_image         = $_FILES['property_image']['name'];
        $propertyImgPath        = 'project_dir/property/' . $property_image;
        $propertyTmp            = $_FILES['property_image']['tmp_name'];
        move_uploaded_file($propertyTmp, $propertyImgPath);


        $data   = array('slider_img' => $property_image);
        

        $this->db->set($data);
        $this->db->where('id',$propsId);
        $this->db->update('propery');
        if($this->db->affected_rows() > 0){          

            $property_image       =base_url().'project_dir/property/'.$property_image;

            $msg['status']        = true;
            $msg['slider_img']    = $property_image;
            $msg['prod_id']       = $propsId;
        }else{
            $msg['status']    = false;
        }
        echo json_encode($msg);
    }


    public function submit_property($props_id =NULL){
		$action		= $this->ApiAdmin_db->submit_property($props_id);
		if($action){

            $msg['status']    = true;
		}else{
            $msg['status']    = false;
		}
		echo json_encode($msg);
	}

    public function delete_property($props_id =NULL){
		$action		= $this->ApiAdmin_db->delete_property($props_id);
		if($action){

            $msg['status']    = true;
		}else{
            $msg['status']    = false;
		}
		echo json_encode($msg);
	}

    public function count_manage_product($type){
        if($type == 'pending' || $type == 'approved' || $type =='rejected'){
            $this->db->where('live_status',$type);
        }
            
        return $this->db->from('propery')
            ->count_all_results();
    }

    public function manage_product($page=NULL, $user_id =NULL, $type=NULL){
        $msg    = array();
        $start = 0;
        $limit = 5;
        $total    =$this->count_manage_product($type);

        if($page > $total) {

            $msg  = array('status'=>'end 1');
            echo json_encode($msg);
        }else{

            $start = ($page - 1) * $limit;
            $this->db->limit($limit,$start);
            $this->db->order_by('id','asc');

            if($type == 'pending' || $type == 'approved' || $type =='rejected'){
                $this->db->where('live_status',$type);
            }

            $query      =$this->db->get('propery');
            if($query->num_rows() > 0){

                $dis_data       = array();
                foreach($query->result_array() as $row){

                    $props_id                           = $row['id'];
                    $props_agent_id                     = $row['agent_id'];
                    $props_name                         = $row['prop_name'];
                    $props_location                     = $row['prop_location'];
                    $props_img_name                     = $row['prop_img_name'];
                    $props_img_name                     = base_url().'project_dir/property/'.$props_img_name;
                    $props_vid_id                       = $row['prop_vid_id'];
                    $props_type                         = $row['prop_type'];
                    $props_purpose                      = $row['prop_purpose'];
                    $props_status                       = $row['prop_status'];
                    $props_bedrom                       = $row['prop_bedrom'];
                    $props_bed                          = $row['prop_bed'];
                    $props_bathroom                     = $row['prop_bathroom'];
                    $props_toilet                       = $row['prop_toilet'];
                    $props_home_area                    = $row['prop_home_area'];
                    $props_lot_area                     = $row['prop_lot_area'];
                    $props_year_built                   = $row['prop_year_built'];
                    $props_created                      = $row['date_created'];
                    $props_state_id                     = $row['state_id'];
                    $props_sub_state_id                 = $row['sub_state_id'];
                    $props_type_of_propery              = $row['type_of_propery'];
                    $props_sub_type_of_propery          = $row['sub_type_of_propery'];
                    $props_price                        = $row['price'];
                    $props_description                  = $row['description'];
                    $prop_mode                          = $row['prop_mode'];
                    $props_live_status                  = $row['live_status'];
                    $slider_img                         = $row['slider_img'];
                    $slider_img                         = base_url().'project_dir/property/'.$slider_img;

                    $prop_mode                          = ucfirst(str_replace("_"," ",$prop_mode));

                    //get facilities
                    $props_shopping_mall                = $this->ApiAdmin_db->props_shopping_mall($props_id);
                    $props_hospital                     = $this->ApiAdmin_db->props_hospital($props_id);
                    $props_school                       = $this->ApiAdmin_db->props_school($props_id);
                    $props_petrol_pump                  = $this->ApiAdmin_db->props_petrol_pump($props_id);
                    $props_airport                      = $this->ApiAdmin_db->props_airport($props_id);
                    $props_church                       = $this->ApiAdmin_db->props_church($props_id);
                    $props_mosque                       = $this->ApiAdmin_db->props_mosque($props_id);

                    //get amenities
                    $props_air_condition                = $this->ApiAdmin_db->props_air_condition($props_id);
                    $props_balcony                      = $this->ApiAdmin_db->props_balcony($props_id);
                    $props_bedding                      = $this->ApiAdmin_db->props_bedding($props_id);
                    $props_cable_tv                     = $this->ApiAdmin_db->props_cable_tv($props_id);
                    $props_cleaning_after_exit          = $this->ApiAdmin_db->props_cleaning_after_exit($props_id);
                    $props_cofee_pot                    = $this->ApiAdmin_db->props_cofee_pot($props_id);
                    $props_computer                     = $this->ApiAdmin_db->props_computer($props_id);
                    $props_cot                          = $this->ApiAdmin_db->props_cot($props_id);
                    $props_dishwasher                   = $this->ApiAdmin_db->props_dishwasher($props_id);
                    $props_dvd                          = $this->ApiAdmin_db->props_dvd($props_id);
                    $props_fan                          = $this->ApiAdmin_db->props_fan($props_id);
                    $props_fridge                       = $this->ApiAdmin_db->props_fridge($props_id);
                    $props_grill                        = $this->ApiAdmin_db->props_grill($props_id);
                    $props_hairdryer                    = $this->ApiAdmin_db->props_hairdryer($props_id);
                    $props_heater                       = $this->ApiAdmin_db->props_heater($props_id);
                    $props_hi_fi                        = $this->ApiAdmin_db->props_hi_fi($props_id);
                    $props_internet                     = $this->ApiAdmin_db->props_internet($props_id);
                    $props_iron                         = $this->ApiAdmin_db->props_iron($props_id);
                    $props_juicer                       = $this->ApiAdmin_db->props_juicer($props_id);
                    $props_lift                         = $this->ApiAdmin_db->props_lift($props_id);
                    $props_microwave                    = $this->ApiAdmin_db->props_microwave($props_id);
                    $props_gym                          = $this->ApiAdmin_db->props_gym($props_id);
                    $props_fireplace                    = $this->ApiAdmin_db->props_fireplace($props_id);
                    $props_hot_tub                      = $this->ApiAdmin_db->props_hot_tub($props_id);


                    //get valuation
                    $props_crime                        = $this->ApiAdmin_db->props_crime($props_id);
                    $props_traffic                      = $this->ApiAdmin_db->props_traffic($props_id);
                    $props_pollution                    = $this->ApiAdmin_db->props_pollution($props_id);
                    $props_education                    = $this->ApiAdmin_db->props_education($props_id);
                    $props_health                       = $this->ApiAdmin_db->props_health($props_id);


                    //get Details
                    $props_condition                    = $this->ApiAdmin_db->props_condition($props_id);
                    $props_caution_fee                  = $this->ApiAdmin_db->props_caution_fee($props_id);
                    $props_special_pref                 = $this->ApiAdmin_db->props_special_pref($props_id);

                    //get_all_props_image
                    $get_all_props_image                = $this->ApiAdmin_db->get_all_props_image_2($props_id);

                    //get_all_props_video
                    $get_all_props_video                = $this->ApiAdmin_db->get_all_props_video($props_id);

                    $get_state_name                     =$this->ApiAdmin_db->get_state_name_state_id($props_state_id);
                    $get_sub_state_name                 =$this->ApiAdmin_db->get_sub_state_name_sub_state_id($props_sub_state_id);                                    

                    $count_props_image                  = $this->Property_db->count_prop_images($props_id);
                    $favourite                          = $this->Users_db->check_if_i_favourite($user_id,$props_id);

                    $type_name                          = $this->ApiAdmin_db->get_types_of_property_name_by_id($props_type_of_propery);
                    $sub_type_name                      = $this->ApiAdmin_db->get_sub_types_of_property_name_by_id($props_type_of_propery);

                    //Agent
                    $agent_full_name                    = $this->Users_db->get_user_full_name_by_id($props_agent_id);
                    $agent_image_name                   = $this->Users_db->get_image_name_by_id($props_agent_id);
                    $agent_email                        = $this->Users_db->get_email_by_id($props_agent_id);
                    $agent_status                       = $this->Users_db->get_status_by_id($props_agent_id);
                    $agent_user_name                    = $this->Users_db->get_user_name_by_id($props_agent_id);
                    $agent_user_phone                   = $this->Users_db->get_user_phone_by_id($props_agent_id);
                    $agent_prop_counter                 = $this->Property_db->count_all_user_property($props_agent_id);


                    $agent_email                        = substr_replace($agent_email, 'XXXXXXXX', '5', '5');
                    $agent_user_phone                   = substr_replace($agent_user_phone, 'XXXXX', '3', '5');
                    


                    $dis_data[]      = array(
                        'props_id'                              =>  $props_id,
                        'props_agent_id'                        =>  $props_agent_id,
                        'props_name'                            =>  $props_name,
                        'props_location'                        =>  $props_location,
                        'props_img_name'                        =>  $props_img_name,
                        'props_vid_id'                          =>  $props_vid_id,
                        'props_type'                            =>  $props_type,
                        'props_purpose'                         =>  $props_purpose,
                        'props_status'                          =>  $props_status,
                        'props_bedrom'                          =>  $props_bedrom,
                        'props_bed'                             =>  $props_bed,
                        'props_bathroom'                        =>  $props_bathroom,
                        'props_toilet'                          =>  $props_toilet,
                        'props_home_area'                       =>  $props_home_area,
                        'props_lot_area'                        =>  $props_lot_area,
                        'props_year_built'                      =>  $props_year_built,
                        'props_created'                         =>  $props_created,
                        'props_state_id'                        =>  $props_state_id,
                        'props_sub_state_id'                    =>  $props_sub_state_id,
                        'props_type_of_propery'                 =>  $props_type_of_propery,
                        'props_sub_type_of_propery'             =>  $props_sub_type_of_propery,
                        'props_price'                           =>  $props_price,
                        'props_description'                     =>  $props_description,
                        'prop_mode'                             =>  $prop_mode,
                        //facilities
                        'props_shopping_mall'                   =>  $props_shopping_mall,
                        'props_hospital'                        =>  $props_hospital,
                        'props_school'                          =>  $props_school,
                        'props_petrol_pump'                     =>  $props_petrol_pump,
                        'props_airport'                         =>  $props_airport,
                        'props_church'                          =>  $props_church,
                        'props_mosque'                          =>  $props_mosque,
                        //get amenities
                        'props_air_condition'                   =>  $props_air_condition,
                        'props_balcony'                         =>  $props_balcony,
                        'props_bedding'                         =>  $props_bedding,
                        'props_cable_tv'                        =>  $props_cable_tv,
                        'props_cleaning_after_exit'             =>  $props_cleaning_after_exit,
                        'props_cofee_pot'                       =>  $props_cofee_pot,
                        'props_computer'                        =>  $props_computer,
                        'props_cot'                             =>  $props_cot,
                        'props_dishwasher'                      =>  $props_dishwasher,
                        'props_dvd'                             =>  $props_dvd,
                        'props_fan'                             =>  $props_fan,
                        'props_fridge'                          =>  $props_fridge,
                        'props_grill'                           =>  $props_grill,
                        'props_hairdryer'                       =>  $props_hairdryer,
                        'props_heater'                          =>  $props_heater,
                        'props_hi_fi'                           =>  $props_hi_fi,
                        'props_internet'                        =>  $props_internet,
                        'props_iron'                            =>  $props_iron,
                        'props_juicer'                          =>  $props_juicer,
                        'props_lift'                            =>  $props_lift,
                        'props_microwave'                       =>  $props_microwave,
                        'props_gym'                             =>  $props_gym,
                        'props_fireplace'                       =>  $props_fireplace,
                        'props_hot_tub'                         =>  $props_hot_tub,
                        //get valuation
                        'props_crime'                           =>  $props_crime,
                        'props_traffic'                         =>  $props_traffic,
                        'props_pollution'                       =>  $props_pollution,
                        'props_education'                       =>  $props_education,
                        'props_health'                          =>  $props_health,

                        //get Details
                        'props_condition'                       =>  $props_condition,
                        'props_caution_fee'                     =>  $props_caution_fee,
                        'props_special_pref'                    =>  $props_special_pref,

                        //get_all_props_image
                        //get_all_props_video
                        'props_live_status'                     =>  $props_live_status,
                        'slider_img'                            =>  $slider_img,
                        'get_all_props_image'                   =>  $get_all_props_image,
                        'get_all_props_video'                   =>  $get_all_props_video,

                        //caution fee
                        'get_state_name'                        =>  $get_state_name,
                        'get_sub_state_name'                    =>  $get_sub_state_name,

                        'count_props_image'                     =>  $count_props_image,
                        'favourite'                             =>  $favourite,
                        'type_name'                             =>  $type_name,
                        'sub_type_name'                         =>  $sub_type_name,
                        
                        //Agent Detail
                        'agent_full_name'                       =>  $agent_full_name,
                        'agent_image_name'                      =>  $agent_image_name,
                        'agent_email'                           =>  $agent_email,
                        'agent_status'                          =>  $agent_status,
                        'agent_user_name'                       =>  $agent_user_name,
                        'agent_user_phone'                      =>  $agent_user_phone,
                        'agent_prop_counter'                    =>  $agent_prop_counter
                    );
                }

                if (count($dis_data) != 0) {
                    $msg['status']      = 'success';
                    $msg['product']     = $dis_data;
                    echo json_encode($msg);
                }
            }
            else {
                $msg  = array('status' => 'end 2');
                echo json_encode($msg);
            }
            
        }
    }

    public function approve_property($id=NULL, $user_id=NULL, $agent_id =NULL){

        $action		            = $this->Admin_db->approve_property($id);
		$get_site_name          = $this->Action->get_site_name();

		if(!$action){

            $msg['status']    = false;

		}else{
			$message				='';
			$subject				= 'Property Rejected';
			$message				.= 'The Property you uploaded to '.$get_site_name.' has been Approved';
			$is_agent				= 'yes';
			$agent_email			= $this->Users_db->get_email_by_id($agent_id);

            $this->Alert_db->insert_into_alert_tbl($agent_id,$user_id,$message, $is_agent);
			$this->send_email($agent_email, $subject, $message, 'type_2', '','');


            $msg['status']    = true;
		}

        echo json_encode($msg);
		
    }

    public function reject_property($props_id =NULL, $user_id=NULL, $agent_id =NULL){
        $msg=array();
        $message        ='';
        $incoming_message	            = $this->input->post('message');

        
		$site_email				= $this->Action->get_site_email();
		$get_site_name          = $this->Action->get_site_name();
		
		$subject				= 'Property Rejected';
		$message				.= "Hey, One of the Property you uploaded to ".$get_site_name." has been Rejected.-Reasons-";
		$message				.= $incoming_message;
		$is_agent				='yes';
		$desc					= $message;
		$agent_email			= $this->Users_db->get_email_by_id($agent_id);


        $action     			=$this->Admin_db->reject_property($props_id);

        if($action){
			$this->Alert_db->insert_into_alert_tbl($agent_id,$user_id,$message, $is_agent);
			$this->send_email($agent_email, $subject, $message, 'type_2', '','');
            $msg['status']    = true;
        }else{
            $msg['status']    = false;
        }

       echo json_encode($msg);

    }
	

    public function get_users($page=NULL){
       
        $msg    = array();
        $start = 0;
        $limit = 5;

        $total    = $this->Users_db->count_all_users();
        if ($page > $total) {
            $msg  = array('status' => 'end');
            echo json_encode($msg);
        } else {

            $msg    = array();
            $start = ($page - 1) * $limit;

            $this->db->limit($limit, $start);
            $this->db->order_by('id', 'asc');

            $this->db->where('status','user');

            $query      =$this->db->get('users');
            if($query->num_rows() > 0){

                $dis_data   = array();
                foreach($query->result_array() as $row){

                    $agent_id                   = $row['id'];
                    $agent_user_name            = $row['user_name'];
                    $agent_full_name            = $row['full_name'];
                    $agent_email                = $row['email'];
                    $agent_image_name           = $row['image_name'];
                    $agent_status               = $row['status'];
                    $agent_phone                = $row['phone'];
                    $agent_age                  = $row['age'];
                    $agent_sex                  = $row['sex'];
                    $agent_address              = $row['address'];
                    $agent_date_created         = $row['date_created'];
                    $agent_account_name         = $row['account_name'];
                    $agent_account_number       = $row['account_number'];
                    $agent_bank_name            = $row['bank_name'];
                    $agent_bank_code            = $row['bank_code'];
                    $agent_current_balance      = $row['current_balance'];
                    $agent_login_status         = $row['login_status'];
                    $isbank_verify              = $row['isbank_verify'];

                    $agent_image_name           = base_url().'project_dir/users/'.$agent_user_name.'/images/'.$agent_image_name;


                    $agent_phone                = $this->Users_db->get_user_phone_by_id($agent_id);
                    $agent_prop_counter         = $this->Property_db->count_all_user_property($agent_id);


                    // $agent_email                =substr_replace($agent_email, 'XXXXXXXX', '5', '5');
                    // $agent_user_phone           =substr_replace($agent_phone, 'XXXXX', '3', '5');


                    $dis_data[]      = array(
                        'agent_id'                                =>  $agent_id,
                        'agent_user_name'                         =>  $agent_user_name,
                        'agent_full_name'                         =>  $agent_full_name,
                        'agent_email'                             =>  $agent_email,
                        'agent_image_name'                        =>  $agent_image_name,
                        'agent_status'                            =>  $agent_status,
                        'agent_phone'                             =>  $agent_phone,
                        'agent_age'                               =>  $agent_age,
                        'agent_sex'                               =>  $agent_sex,
                        'agent_address'                           =>  $agent_address,
                        'agent_date_created'                      =>  $agent_date_created,
                        'agent_account_name'                      =>  $agent_account_name,
                        'agent_account_number'                    =>  $agent_account_number,
                        'agent_bank_name'                         =>  $agent_bank_name,
                        'agent_bank_code'                         =>  $agent_bank_code,
                        'agent_current_balance'                   =>  $agent_current_balance,
                        'agent_login_status'                      =>  $agent_login_status,
                        'agent_phone'                             =>  $agent_phone,
                        'agent_prop_counter'                      =>  $agent_prop_counter,
                        'isbank_verify'                           =>  $isbank_verify,

                        
                    );
                }

                if (count($dis_data) != 0) {
                    $msg['status']      = 'success';
                    $msg['users']       = $dis_data;
                    echo json_encode($msg);
                }
            }
            else {
                $msg  = array('status' => 'end2');
                echo json_encode($msg);
            }
            
        }
    }

    public function get_landlords($page=NULL){
       
        $msg    = array();
        $start = 0;
        $limit = 5;

        $total    = $this->Users_db->count_all_agents();
        if ($page > $total) {
            $msg  = array('status' => 'end');
            echo json_encode($msg);
        } else {

            $msg    = array();
            $start = ($page - 1) * $limit;

            $this->db->limit($limit, $start);
            $this->db->order_by('id', 'asc');

            $this->db->where('status','landlord');
            $this->db->or_where('status','agent');


            $query      =$this->db->get('users');
            if($query->num_rows() > 0){

                $dis_data   = array();
                foreach($query->result_array() as $row){

                    $agent_id                   = $row['id'];
                    $agent_user_name            = $row['user_name'];
                    $agent_full_name            = $row['full_name'];
                    $agent_email                = $row['email'];
                    $agent_image_name           = $row['image_name'];
                    $agent_status               = $row['status'];
                    $agent_phone                = $row['phone'];
                    $agent_age                  = $row['age'];
                    $agent_sex                  = $row['sex'];
                    $agent_address              = $row['address'];
                    $agent_date_created         = $row['date_created'];
                    $agent_account_name         = $row['account_name'];
                    $agent_account_number       = $row['account_number'];
                    $agent_bank_name            = $row['bank_name'];
                    $agent_bank_code            = $row['bank_code'];
                    $agent_current_balance      = $row['current_balance'];
                    $agent_login_status         = $row['login_status'];
                    $isbank_verify              = $row['isbank_verify'];

                    $agent_image_name           = base_url().'project_dir/users/'.$agent_user_name.'/images/'.$agent_image_name;


                    $agent_phone                = $this->Users_db->get_user_phone_by_id($agent_id);
                    $agent_prop_counter         = $this->Property_db->count_all_user_property($agent_id);


                    // $agent_email                =substr_replace($agent_email, 'XXXXXXXX', '5', '5');
                    // $agent_user_phone           =substr_replace($agent_phone, 'XXXXX', '3', '5');


                    $dis_data[]      = array(
                        'agent_id'                                =>  $agent_id,
                        'agent_user_name'                         =>  $agent_user_name,
                        'agent_full_name'                         =>  $agent_full_name,
                        'agent_email'                             =>  $agent_email,
                        'agent_image_name'                        =>  $agent_image_name,
                        'agent_status'                            =>  $agent_status,
                        'agent_phone'                             =>  $agent_phone,
                        'agent_age'                               =>  $agent_age,
                        'agent_sex'                               =>  $agent_sex,
                        'agent_address'                           =>  $agent_address,
                        'agent_date_created'                      =>  $agent_date_created,
                        'agent_account_name'                      =>  $agent_account_name,
                        'agent_account_number'                    =>  $agent_account_number,
                        'agent_bank_name'                         =>  $agent_bank_name,
                        'agent_bank_code'                         =>  $agent_bank_code,
                        'agent_current_balance'                   =>  $agent_current_balance,
                        'agent_login_status'                      =>  $agent_login_status,
                        'agent_phone'                             =>  $agent_phone,
                        'agent_prop_counter'                      =>  $agent_prop_counter,
                        'isbank_verify'                           =>  $isbank_verify,

                        
                    );
                }

                if (count($dis_data) != 0) {
                    $msg['status']      = 'success';
                    $msg['users']       = $dis_data;
                    echo json_encode($msg);
                }
            }
            else {
                $msg  = array('status' => 'end2');
                echo json_encode($msg);
            }
            
        }
    }

    //ban user

    public function ban_user($id){
        $data   = array('login_status'=>'ban');
        $this->db->set($data);
        $this->db->where('id',$id);
        $this->db->update('users');
        if($this->db->affected_rows() > 0){
            // return 'User Added to Ban List';
            return 'ban';
        }
        return false;
    }

    public function unban_user($id){
        $data   = array('login_status'=>'normal');
        $this->db->set($data);
        $this->db->where('id',$id);
        $this->db->update('users');
        if($this->db->affected_rows() > 0){
            // return 'User Removed from Ban List';
            return 'unban';
        }
        return false;
    }

    public function check_if_user_isBanned($id){
        $this->db->where('id',$id);
        $this->db->where('login_status','ban');
        $query      =$this->db->get('users');
        if($query->num_rows() > 0){
            return true;
        }
        return false;
    }

    public function toggle_ban_user($id){
        if($this->check_if_user_isBanned($id)){
            return $this->unban_user($id);
        }else{
            return $this->ban_user($id);
        }
        return false;

    }
    

    public function toggle_ban($id=NULL){
        $action		= $this->toggle_ban_user($id);
		if(!$action){

            $msg['status']    = 'false';
		}else{
			
            $msg['status']    = $action;
		}

     
        echo json_encode($msg);
		
    }


    public function delete_user($id=NULL){
        $action		= $this->Users_db->delete_user($id);
		if(!$action){
            $msg['status']    = false;
		}else{
			
            $msg['status']    = true;
		}
        echo json_encode($msg);
		
    }


    public function message_user(){
        $msg    = array();
        $message        = '';
        $dis_id         = $this->input->post('dis_user_id');
        $dis_email      = $this->input->post('email');
        $dis_full_name  = $this->input->post('full_name');

        $subject        = $this->input->post('subject');
        $msg_box            = $this->input->post('message');

        $type           = 'type_2';
        $link           = '';
		$link_title 	= '';

        $message        .= $dis_full_name.'\n'; 
        $message        .= $msg_box; 

        $action     =$this->send_email($dis_email, $subject, $message, $type, $link, $link_title);

        if($action){

            $msg['status']    = true;
            
        }else{

            $msg['status']    = false;
        }

        echo json_encode($msg);

    }



    public function signup_authorization(){
        $msg        = array();

        $u_name     = $this->input->post('user_name');
        $full_name     = $this->input->post('full_name');
        $email         = $this->input->post('email');
        $phone         = $this->input->post('phone');
        $pass          = $this->input->post('password');
        $user_type     = $this->input->post('user_type');



        $user_name  = preg_replace("/\s+/", "_", $u_name);
        $user_name  = preg_replace('/[^A-Za-z0-9\_]/', '', $user_name);




        //Check if User Email & Name already Exist in DB
        $email_checker      = $this->Users_db->check_if_email_exist($email);
        $name_checker       = $this->Users_db->check_if_username_exist($user_name);

        if (!$email_checker) {
            if (!$name_checker) {
                if (!empty($email) && !empty($pass)) {

                    @mkdir('project_dir');
                    @mkdir('project_dir/users');
                    @mkdir('project_dir/users/'.$user_name);
                    @mkdir('project_dir/users/'.$user_name.'/images');
                    @copy("project_dir/logo.png", "project_dir/users/$user_name/images/logo.png");

                    $data   = array(
                        'user_name'         =>  $user_name,
                        'full_name'         =>  $full_name,
                        'email'             =>  $email,
                        'phone'             =>  $phone,
                        'password'          =>  md5($pass),
                        'status'            =>  $user_type,
                        'image_name'        =>  'logo.png',
                        'date_created'      =>  date('Y-m-d H:i:s'),
                    );
                    $this->db->set($data);
                    $this->db->insert('users');
                    if ($this->db->affected_rows() > 0) {

                        $user_id        = $this->db->insert_id();

                       
                        $this->success_alert_callbark('Account Created... An email has been sent to you, please click on the link to verify your email');
                        $user_id        = $this->Users_db->get_user_id_by_email($email);
                        $title  ='Confirm Account';
                        $msg    ='click on this link to verify account';
                        $type   ='type_1';
                        $link   = 'http://www.ogabliss.com/login/verify_me/' . $user_id;
                        $link_title ='Confirm Account';
                        $this->send_email($email,$title,$msg,$type,$link,$link_title);


                        $this->db->where('id',$user_id);
                        $query  = $this->db->get('users');
                        if($query->num_rows() > 0){
                            foreach($query->result_array() as $row){
                                $agent_id                   = $row['id'];
                                $agent_user_name            = $row['user_name'];
                                $agent_full_name            = $row['full_name'];
                                $agent_email                = $row['email'];
                                $agent_image_name           = $row['image_name'];
                                $agent_status               = $row['status'];
                                $agent_phone                = $row['phone'];
                                $agent_age                  = $row['age'];
                                $agent_sex                  = $row['sex'];
                                $agent_address              = $row['address'];
                                $agent_date_created         = $row['date_created'];
                                $agent_account_name         = $row['account_name'];
                                $agent_account_number       = $row['account_number'];
                                $agent_bank_name            = $row['bank_name'];
                                $agent_bank_code            = $row['bank_code'];
                                $agent_current_balance      = $row['current_balance'];
                                $agent_login_status         = $row['login_status'];
                                $isbank_verify              = $row['isbank_verify'];

                                $agent_image_name           = base_url().'project_dir/users/'.$agent_user_name.'/images/'.$agent_image_name;


                                $agent_phone                = $this->Users_db->get_user_phone_by_id($agent_id);
                                $agent_prop_counter         = $this->Property_db->count_all_user_property($agent_id);


                                if($agent_status == 'admin' || $agent_status =='super_admin'){
                                    $admin_status   = true;
                                }else{
                                    $admin_status   = false;
                                }


                                $msg      = array(
                                    'agent_id'                                =>  $agent_id,
                                    'agent_user_name'                         =>  $agent_user_name,
                                    'agent_full_name'                         =>  $agent_full_name,
                                    'agent_email'                             =>  $agent_email,
                                    'agent_image_name'                        =>  $agent_image_name,
                                    'agent_status'                            =>  $agent_status,
                                    'agent_phone'                             =>  $agent_phone,
                                    'agent_age'                               =>  $agent_age,
                                    'agent_sex'                               =>  $agent_sex,
                                    'agent_address'                           =>  $agent_address,
                                    'agent_date_created'                      =>  $agent_date_created,
                                    'agent_account_name'                      =>  $agent_account_name,
                                    'agent_account_number'                    =>  $agent_account_number,
                                    'agent_bank_name'                         =>  $agent_bank_name,
                                    'agent_bank_code'                         =>  $agent_bank_code,
                                    'agent_current_balance'                   =>  $agent_current_balance,
                                    'agent_login_status'                      =>  $agent_login_status,
                                    'agent_prop_counter'                      =>  "$agent_prop_counter",
                                    'admin_status'                            =>  $admin_status,
                                    'isbank_verify'                           =>  $isbank_verify,
                                    'status'                                  =>  'success',

                                );

                            }
                        }else{
                             $msg  = array('status' => 'fail_01', 'status_msg' => 'Sigup Successfull, could not redidrect you to the App Home, Please click go back to the login page, to gain access to app!');
                        }

                    } else {
                        $msg  = array('status' => 'fail_02', 'status_msg' => 'Registration was not successful, please try after some time!');
                    }
                } else {
                    $msg  = array('status' => 'fail_03', 'status_msg' => 'Username, Email or Password can not be empty!');
                }
            } else {
                $msg  = array('status' => 'fail_04', 'status_msg' => 'Someone with this Username already exist on our platform!');
            }
        } else {
            $msg  = array('status' => 'fail_05', 'status_msg' => 'Someone with this email already exist on our platform!');
        }
        echo json_encode($msg);
    }

    public function login_authorization(){
        $msg        = array();

        $email      = $this->input->post('email');
        $pass       = $this->input->post('password');


        if (!empty($email) && !empty($pass)) {
            $this->db->where('email', $email);
            $this->db->where('password', md5($pass));

            $query  = $this->db->get('users');
            if ($query->num_rows() > 0) {
                foreach ($query->result_array() as $row) {
                    

                    $agent_id                   = $row['id'];
                    $agent_user_name            = $row['user_name'];
                    $agent_full_name            = $row['full_name'];
                    $agent_email                = $row['email'];
                    $agent_image_name           = $row['image_name'];
                    $agent_status               = $row['status'];
                    $agent_phone                = $row['phone'];
                    $agent_age                  = $row['age'];
                    $agent_sex                  = $row['sex'];
                    $agent_address              = $row['address'];
                    $agent_date_created         = $row['date_created'];
                    $agent_account_name         = $row['account_name'];
                    $agent_account_number       = $row['account_number'];
                    $agent_bank_name            = $row['bank_name'];
                    $agent_bank_code            = $row['bank_code'];
                    $agent_current_balance      = $row['current_balance'];
                    $agent_login_status         = $row['login_status'];
                    $isbank_verify              = $row['isbank_verify'];

                    $agent_image_name           = base_url().'project_dir/users/'.$agent_user_name.'/images/'.$agent_image_name;


                    $agent_phone                = $this->Users_db->get_user_phone_by_id($agent_id);
                    $agent_prop_counter         = $this->Property_db->count_all_user_property($agent_id);


                    if($agent_status == 'admin' || $agent_status =='super_admin'){
                        $admin_status   = true;
                        $isbank_verify  = 'yes';
                    }else{
                        $admin_status   = false;
                    }


                    $msg      = array(
                        'agent_id'                                =>  $agent_id,
                        'agent_user_name'                         =>  $agent_user_name,
                        'agent_full_name'                         =>  $agent_full_name,
                        'agent_email'                             =>  $agent_email,
                        'agent_image_name'                        =>  $agent_image_name,
                        'agent_status'                            =>  $agent_status,
                        'agent_phone'                             =>  $agent_phone,
                        'agent_age'                               =>  $agent_age,
                        'agent_sex'                               =>  $agent_sex,
                        'agent_address'                           =>  $agent_address,
                        'agent_date_created'                      =>  $agent_date_created,
                        'agent_account_name'                      =>  $agent_account_name,
                        'agent_account_number'                    =>  $agent_account_number,
                        'agent_bank_name'                         =>  $agent_bank_name,
                        'agent_bank_code'                         =>  $agent_bank_code,
                        'agent_current_balance'                   =>  $agent_current_balance,
                        'agent_login_status'                      =>  $agent_login_status,
                        'agent_prop_counter'                      =>  "$agent_prop_counter",
                        'admin_status'                            =>  $admin_status,
                        'isbank_verify'                           =>  $isbank_verify,
                        'status'                                  =>  'success',
                    );

                }
            } else {
                $msg  = array('status' => 'fail_01', 'status_msg' => 'User not found or Password is incorrect!');
            }
        } else {
            $msg  = array('status' => 'fail_02', 'status_msg' => 'Email Or Password can not be empty');
        }

        echo json_encode($msg);
    }

    public function reset_password(){
        $msg    = array();
        $dis_email    = $this->input->post('email');


        if ($this->check_if_email_exist_request_password_tbl($dis_email) == FALSE) {
            $login    = $this->Users_db->email_to_all_detail($dis_email);
            if ($login    == FALSE) {
                $msg['status']          = 'fail_01';
                $msg['status_msg']      = 'Sorry, This User Don\'t exist in our database';
            } else {
                $get_site_name          = $this->Action->get_site_name();
                $get_site_g_name        = $this->Action->get_site_g_name();
                $get_site_g_pass        = $this->Action->get_site_g_pass();

                foreach ($login as $row) {
                    $user_id        = $row['id'];
                    $full_name	    = $row['full_name'];
                               

                              
                    $link           = $_SERVER['SERVER_NAME'].'/Login/confirm_reset_password/' . $user_id;


                    /*==========================SEND EMAIL TO RESET PASSWORD==================*/
                    $message    = 'Hello, ' . $full_name . ' You Requested to reset your Password, Click the Link or Copy it ' . $link . '  if this is not you, please Kindly Ignore';
                    $subject    = $get_site_name . ' | Confirm Password Reset';
                    $to         = $dis_email;



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
                        $this->Users_db->request_password($dis_email);
                        $msg['status']          = 'success';
                        $msg['status_msg']      = 'An Email has been Sent to ' . $dis_email . ' for further instruction!';
                    } else {
                        $msg['status']          = 'fail_02';
                        $msg['status_msg']      = 'Email not responding...';
                    }
                }
            }
        } else {
            $msg['status']          = 'fail_03';
            $msg['status_msg']      = 'You have already initated a password request, please check your email for our previous mail';
        }

        echo json_encode($msg);
    }

    public function check_if_email_exist_request_password_tbl($email){
        $check      = $this->Users_db->check_if_email_exist_request_password_tbl($email);
        return $check;
    }

    public function report_property($id=NULL, $user_id=NULL, $type =NULL){

        $checker    = $this->ApiAdmin_db->check_if_user_has_report($id,$user_id);
        if(!$checker){

            $data   = array('user_id'=>$user_id,'prop_id'=>$id,'type'=>$type,'date_created'=>date('Y-m-d H:i:s a'), 'time'=>time());
            $this->db->set($data);
            $this->db->insert('report_property');

            if($this->db->affected_rows() > 0){

                $msg['status']    = 'true';

            }else{
                

                $msg['status']    = 'false';
            }
        }else{
            $msg['status']        = 'false_2';
        }

        echo json_encode($msg);
		
    }


    public function get_dis_user($user_id=NULL){
       
        $msg    = array();
       

        $msg    = array();

        $this->db->order_by('id', 'asc');

        $this->db->where('id', $user_id);

        $query      =$this->db->get('users');
        if($query->num_rows() > 0){

            $dis_data   = array();
            foreach($query->result_array() as $row){

                $agent_id                   = $row['id'];
                $agent_user_name            = $row['user_name'];
                $agent_full_name            = $row['full_name'];
                $agent_email                = $row['email'];
                $agent_image_name           = $row['image_name'];
                $agent_status               = $row['status'];
                $agent_phone                = $row['phone'];
                $agent_age                  = $row['age'];
                $agent_sex                  = $row['sex'];
                $agent_address              = $row['address'];
                $agent_date_created         = $row['date_created'];
                $agent_account_name         = $row['account_name'];
                $agent_account_number       = $row['account_number'];
                $agent_bank_name            = $row['bank_name'];
                $agent_bank_code            = $row['bank_code'];
                $agent_current_balance      = $row['current_balance'];
                $agent_login_status         = $row['login_status'];

                $agent_image_name           = base_url().'project_dir/users/'.$agent_user_name.'/images/'.$agent_image_name;


                $agent_phone                = $this->Users_db->get_user_phone_by_id($agent_id);
                $agent_prop_counter         = $this->Property_db->count_all_user_property($agent_id);


                // $agent_email                =substr_replace($agent_email, 'XXXXXXXX', '5', '5');
                // $agent_user_phone           =substr_replace($agent_phone, 'XXXXX', '3', '5');


                $dis_data[]      = array(
                    'agent_id'                                =>  $agent_id,
                    'agent_user_name'                         =>  $agent_user_name,
                    'agent_full_name'                         =>  $agent_full_name,
                    'agent_email'                             =>  $agent_email,
                    'agent_image_name'                        =>  $agent_image_name,
                    'agent_status'                            =>  $agent_status,
                    'agent_phone'                             =>  $agent_phone,
                    'agent_age'                               =>  $agent_age,
                    'agent_sex'                               =>  $agent_sex,
                    'agent_address'                           =>  $agent_address,
                    'agent_date_created'                      =>  $agent_date_created,
                    'agent_account_name'                      =>  $agent_account_name,
                    'agent_account_number'                    =>  $agent_account_number,
                    'agent_bank_name'                         =>  $agent_bank_name,
                    'agent_bank_code'                         =>  $agent_bank_code,
                    'agent_current_balance'                   =>  $agent_current_balance,
                    'agent_login_status'                      =>  $agent_login_status,
                    'agent_phone'                             =>  $agent_phone,
                    'agent_prop_counter'                      =>  $agent_prop_counter,

                        
                );
            }

            if (count($dis_data) != 0) {
                $msg['status']      = 'success';
                $msg['users']       = $dis_data;
                echo json_encode($msg);
            }
        }
        else {
            $msg  = array('status' => 'end2');
            echo json_encode($msg);
        }
            
        
    }

    //updates

     
    public function get_bank_list(){
        $msg    =array();
       
        $query      =$this->db->get('list_bank');

        $data       = array();
        if($query->num_rows() > 0){
            $data    = $query->result_array();
        }
        
            
        if (count($data) != 0) {

            $msg['status']  = true;
            $msg['bank_list']  = $data;
        }

        else {
            $msg['status']      = false;
        }
        echo json_encode($msg);
    }

    public function update_profile($my_id = NULL){
        $msg = array();
        $dis_data = array();

        $full_name       = $this->input->post('full_name');
        $email           = $this->input->post('email');
        $phone_no        = $this->input->post('phone');
        $age             = $this->input->post('age');
        $gender          = $this->input->post('sex');
        $address         = $this->input->post('address');
        

        if ($gender == 'female') {
            $sex    = 'Female';
        } else {
            $sex    = 'Male';
        }

       

        $data   = array(
            'full_name' => $full_name,
            'email'     => $email,
            'phone' => $phone_no,
            'age' => $age,
            'sex' => $sex,
            'address'   => $address,
            'isbank_verify' => 'no',
           

        );
        $this->db->set($data);
        $this->db->where('id', $my_id);
        $this->db->update('users');
        if ($this->db->affected_rows() > 0) {
            //
            $this->db->where('id', $my_id);

            $query  = $this->db->get('users');
            if ($query->num_rows() > 0) {
                foreach($query->result_array() as $row){
                                $agent_id                   = $row['id'];
                                $agent_user_name            = $row['user_name'];
                                $agent_full_name            = $row['full_name'];
                                $agent_email                = $row['email'];
                                $agent_image_name           = $row['image_name'];
                                $agent_status               = $row['status'];
                                $agent_phone                = $row['phone'];
                                $agent_age                  = $row['age'];
                                $agent_sex                  = $row['sex'];
                                $agent_address              = $row['address'];
                                $agent_date_created         = $row['date_created'];
                                $agent_account_name         = $row['account_name'];
                                $agent_account_number       = $row['account_number'];
                                $agent_bank_name            = $row['bank_name'];
                                $agent_bank_code            = $row['bank_code'];
                                $agent_current_balance      = $row['current_balance'];
                                $agent_login_status         = $row['login_status'];
                                $isbank_verify              = $row['isbank_verify'];

                                $agent_image_name           = base_url().'project_dir/users/'.$agent_user_name.'/images/'.$agent_image_name;


                                $agent_phone                = $this->Users_db->get_user_phone_by_id($agent_id);
                                $agent_prop_counter         = $this->Property_db->count_all_user_property($agent_id);


                                if($agent_status == 'admin' || $agent_status =='super_admin'){
                                    $admin_status   = true;
                                }else{
                                    $admin_status   = false;
                                }


                                $msg      = array(
                                    'agent_id'                                =>  $agent_id,
                                    'agent_user_name'                         =>  $agent_user_name,
                                    'agent_full_name'                         =>  $agent_full_name,
                                    'agent_email'                             =>  $agent_email,
                                    'agent_image_name'                        =>  $agent_image_name,
                                    'agent_status'                            =>  $agent_status,
                                    'agent_phone'                             =>  $agent_phone,
                                    'agent_age'                               =>  $agent_age,
                                    'agent_sex'                               =>  $agent_sex,
                                    'agent_address'                           =>  $agent_address,
                                    'agent_date_created'                      =>  $agent_date_created,
                                    'agent_account_name'                      =>  $agent_account_name,
                                    'agent_account_number'                    =>  $agent_account_number,
                                    'agent_bank_name'                         =>  $agent_bank_name,
                                    'agent_bank_code'                         =>  $agent_bank_code,
                                    'agent_current_balance'                   =>  $agent_current_balance,
                                    'agent_login_status'                      =>  $agent_login_status,
                                    'agent_prop_counter'                      =>  "$agent_prop_counter",
                                    'admin_status'                            =>  $admin_status,
                                    'isbank_verify'                           =>  $isbank_verify,
                                    'status'                                  =>  'success',

                                );

                            }
            } else {
                $msg['status']  = "false_2";
            }
        } else {
            $msg['status'] = "false_1";
        }
        echo json_encode($msg);
    }

    public function update_bank_detail($my_id = NULL){
        $msg = array();
        $dis_data = array();


        $bank_code                      =$this->input->post('bank_code');
        $account_number                 =$this->input->post('account_num');
        $account_name                   =$this->input->post('account_name');


        
        $bank_name  = $this->Bank_db->get_bank_name_by_bank_code($bank_code);

        $data   = array(

            'bank_code' =>$bank_code,
            'bank_name'=>$bank_name,
            'account_number'=>$account_number,
            'account_name'=>$account_name,
            'isbank_verify' => 'no',
           
        );
        $this->db->set($data);
        $this->db->where('id', $my_id);
        $this->db->update('users');
        if ($this->db->affected_rows() > 0) {
            //
            $this->db->where('id', $my_id);

            $query  = $this->db->get('users');
            if ($query->num_rows() > 0) {
                foreach($query->result_array() as $row){
                                $agent_id                   = $row['id'];
                                $agent_user_name            = $row['user_name'];
                                $agent_full_name            = $row['full_name'];
                                $agent_email                = $row['email'];
                                $agent_image_name           = $row['image_name'];
                                $agent_status               = $row['status'];
                                $agent_phone                = $row['phone'];
                                $agent_age                  = $row['age'];
                                $agent_sex                  = $row['sex'];
                                $agent_address              = $row['address'];
                                $agent_date_created         = $row['date_created'];
                                $agent_account_name         = $row['account_name'];
                                $agent_account_number       = $row['account_number'];
                                $agent_bank_name            = $row['bank_name'];
                                $agent_bank_code            = $row['bank_code'];
                                $agent_current_balance      = $row['current_balance'];
                                $agent_login_status         = $row['login_status'];
                                $isbank_verify              = $row['isbank_verify'];

                                $agent_image_name           = base_url().'project_dir/users/'.$agent_user_name.'/images/'.$agent_image_name;


                                $agent_phone                = $this->Users_db->get_user_phone_by_id($agent_id);
                                $agent_prop_counter         = $this->Property_db->count_all_user_property($agent_id);


                                if($agent_status == 'admin' || $agent_status =='super_admin'){
                                    $admin_status   = true;
                                }else{
                                    $admin_status   = false;
                                }


                                $msg      = array(
                                    'agent_id'                                =>  $agent_id,
                                    'agent_user_name'                         =>  $agent_user_name,
                                    'agent_full_name'                         =>  $agent_full_name,
                                    'agent_email'                             =>  $agent_email,
                                    'agent_image_name'                        =>  $agent_image_name,
                                    'agent_status'                            =>  $agent_status,
                                    'agent_phone'                             =>  $agent_phone,
                                    'agent_age'                               =>  $agent_age,
                                    'agent_sex'                               =>  $agent_sex,
                                    'agent_address'                           =>  $agent_address,
                                    'agent_date_created'                      =>  $agent_date_created,
                                    'agent_account_name'                      =>  $agent_account_name,
                                    'agent_account_number'                    =>  $agent_account_number,
                                    'agent_bank_name'                         =>  $agent_bank_name,
                                    'agent_bank_code'                         =>  $agent_bank_code,
                                    'agent_current_balance'                   =>  $agent_current_balance,
                                    'agent_login_status'                      =>  $agent_login_status,
                                    'agent_prop_counter'                      =>  "$agent_prop_counter",
                                    'admin_status'                            =>  $admin_status,
                                    'isbank_verify'                           =>  $isbank_verify,
                                    'status'                                  =>  'success',

                                );

                            }
            } else {
                $msg['status']  = "false_2";
            }
        } else {
            $msg['status'] = "false_1";
        }
        echo json_encode($msg);
    }

    public function verify_bank_account($user_id=NULL, $bank_code=NULL, $account_number = NULL){
        $msg    = array();

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
					$msg['status']  = 'true';
				}else{ 
					$msg['status']  = 'false';
				}
			}else{
				
				// echo 'Could not verify bank account detail, pls try updating your bank details and come try again';
                $msg['status']  = "false_2";
			}
		}

        echo json_encode($msg);
	}

    public function update_profile_image($my_id = NULL){
        $msg = array();        
        
        $user_name          = $this->Users_db->get_user_name_by_id($my_id);
        @mkdir('project_dir');
		@mkdir('project_dir/users');
		@mkdir('project_dir/users/'.$user_name);
		@mkdir('project_dir/users/'.$user_name.'/images');


        $property_image         = $_FILES['property_image']['name'];
        $propertyImgPath        = 'project_dir/users/'.$user_name.'/images/' . $property_image;
        $propertyTmp            = $_FILES['property_image']['tmp_name'];
        
        move_uploaded_file($propertyTmp, $propertyImgPath);


        $data   = array('image_name'=>$property_image);
        $this->db->set($data);
        $this->db->where('id',$my_id);
        $this->db->update('users');

        if($this->db->affected_rows() > 0){          

            $property_image       =base_url().'project_dir/users/'.$user_name.'/images/'.$property_image;

            $msg['status']        = true;
            $msg['image_name']    = $property_image;
        }else{
            $msg['status']    = false;
        }
        echo json_encode($msg);
    }

    public function count_dashboard($user_id =NULL, $admin_status =NULL, $user_status =NULL){
        $msg    =array();
        $data   = array();


        if($user_status     =='user'){
            $total_earning			= $this->Users_db->get_user_total_earning($user_id);
	        $wallet_balance			= $this->Users_db->get_user_current_balance($user_id);
            $count_trans			= $this->Transaction_db->count_transaction($user_id);
            $count_conn				= $this->Connection_db->count_connection_by_user_id($user_id);
            $count_request			= $this->Request_db->count_request_by_user_id_2($user_id,$admin_status);
            $count_msg				= $this->Chat_db->count_unread_message($user_id);
            $count_alert 			= $this->Alert_db->count_my_alert($user_id);

            $data['total_earning']           = "$total_earning";
            $data['wallet_balance']          = "$wallet_balance";
            $data['insurance_earning']       = "0";
            $data['total_transaction']       = "$count_trans";
            $data['total_connection']        = "$count_conn";
            $data['total_property']          = "0";
            $data['total_request']           = "$count_request";
            $data['count_msg']               = "$count_msg";
            $data['count_alert']             = "$count_alert";

        }else if($user_status == 'agent'  || $user_status == 'landlord'){
            $total_earning			= $this->Users_db->get_user_total_earning($user_id);
	        $wallet_balance			= $this->Users_db->get_user_current_balance($user_id);
            $count_trans			= $this->Transaction_db->count_transaction($user_id);
            $count_conn				= $this->Connection_db->count_connection_by_user_id($user_id);
            $count_props			= $this->Admin_db->count_props($user_id);
            $count_request			= $this->Request_db->count_request_by_user_id_2($user_id,$admin_status);
            $count_msg				= $this->Chat_db->count_unread_message($user_id);
            $count_alert 			= $this->Alert_db->count_my_alert($user_id);
            


            
            $data['total_earning']           = "$total_earning";
            $data['wallet_balance']          = "$wallet_balance";
            $data['insurance_earning']       = "0";
            $data['total_transaction']       = "$count_trans";
            $data['total_connection']        = "$count_conn";
            $data['total_property']          = "$count_props";
            $data['total_request']           = "$count_request";
            $data['count_msg']               = "$count_msg";
            $data['count_alert']             = "$count_alert";

        }else if($user_status   =='admin' || $user_status =='super_admin'){
            $total_earning			= $this->Action->get_site_total_earning();
            $insurance_earning		= $this->Action->get_insurance_total_earning();
            $count_trans			= $this->Transaction_db->count_all_transaction();
            $count_conn				= $this->Connection_db->count_all_connection();
            $count_props			= $this->Admin_db->count_all_props();
            $count_request			= $this->Request_db->count_request_by_user_id_2($user_id,$admin_status);
            $count_alert 			= $this->Alert_db->count_my_alert($user_id);


            
            $data['total_earning']           = "$total_earning";
            $data['wallet_balance']          = "0";
            $data['insurance_earning']       = "$insurance_earning";
            $data['total_transaction']       = "$count_trans";
            $data['total_connection']        = "$count_conn";
            $data['total_property']          = "$count_props";
            $data['total_request']           = "$count_request";
            $data['count_msg']               = "0";
            $data['count_alert']             = "$count_alert";


           

        }
        
        $msg[]    = $data;
        echo json_encode($msg);
    }


    public function count_alert($user_id =NULL){
        $msg    =array();
        $count_alert 			= $this->Alert_db->count_my_alert($user_id);
        $msg['count_alert']             = $count_alert;
        echo json_encode($msg);
    }


    public function count_msg($user_id =NULL){
        $msg    =array();
        $count_msg				= $this->Chat_db->count_unread_message($user_id);
        $msg['count_msg']       = $count_msg;
        echo json_encode($msg);
    }


    public function check_ifBan($user_id =NULL){
        $msg    =array();
        
        $this->db->where('id',$user_id);
        $this->db->where('login_status','ban');

         $this->db->or_where('id',$user_id);
        $this->db->where('login_status','fraud');

        $query      = $this->db->get('users');
        if($query->num_rows() > 0){
            $msg['status']  = true;
        }else{
            $msg['status']  = false;
        }
        echo json_encode($msg);
    }


    public function delete_account($user_id=NULL){
        $msg    =array();
        
        $this->db->where('id',$user_id);

        $this->db->delete('users');
        if($this->db->affected_rows() > 0){

            $this->db->where('agent_id',$user_id);
            
            $query  = $this->db->get('propery');
            if($query->num_rows() > 0){
                $data   = array('live_status'=>'rejected');
                $this->db->set($data);
                $this->db->where('agent_id',$user_id);
                $this->db->update('propery');

                $msg['status']  = true;
            }else{
                $msg['status']  = true;
            }

            
        }else{
            $msg['status']  = false;
        }
        echo json_encode($msg);
    }
    


    /*App Updates*/
    public function has_new_update(){
        $msg    = array();
        $counter    = $this->ApiAdmin_db->get_update_version();
        $msg  = array('counter' => (int)$counter);
        echo json_encode($msg);
    }

    public function ios_store_link(){
        $msg    = array();
        $link     = $this->ApiAdmin_db->get_app_ios_link();
        $msg  = array('link' => $link);
        echo json_encode($msg);
    }

    public function android_store_link(){
        $msg    = array();
        $link     = $this->ApiAdmin_db->get_app_android_link();
        $msg  = array('link' => $link);
        echo json_encode($msg);
    }


    //MLM Subscription Thing
}