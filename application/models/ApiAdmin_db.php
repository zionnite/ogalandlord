<?php
class ApiAdmin_db extends My_Model{
    public function __construct(){
        parent::__construct();
    }

    //property

    public function get_all_props(){
        $query      =$this->db->get('propery');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return false;
    }

    public function get_props_by_id($props_id){
        $this->db->where('id',$props_id);
        $query      =$this->db->get('propery');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return false;
    }

    public function get_props_name_by_id($props_id){
        $this->db->where('id',$props_id);
        $query      =$this->db->get('propery');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['prop_name'];
            }
        }
        return false;
    }

    public function get_props_amount_by_id($props_id){
        $this->db->where('id',$props_id);
        $query      =$this->db->get('propery');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['price'];
            }
        }
        return false;
    }

    public function get_props_image_by_id($props_id){
        $this->db->where('id',$props_id);
        $query      =$this->db->get('propery');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['prop_img_name'];
            }
        }
        return false;
    }
    
    public function get_props_agent_id_by_props_id($props_id){
        $this->db->where('id',$props_id);
        $query      =$this->db->get('propery');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['agent_id'];
            }
        }
        return false;
    }
    


    public function delete_property($props_id)
    {
        $this->db->where('id',$props_id);
        $this->db->delete('propery');
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
    }
    public function submit_property($props_id)
    {
        $data       =array('live_status'=>'pending');
        $this->db->set($data);
        $this->db->where('id',$props_id);
        $this->db->update('propery');
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
    }

    //functions
    public function props_shopping_mall($props_id)
    {
        $this->db->where('prop_id',$props_id);
        $query      = $this->db->get('propery_facilities');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['shopping_mall'];
            }
        }
        return false;
    }
    public function props_hospital($props_id)
    {
        $this->db->where('prop_id',$props_id);
        $query      = $this->db->get('propery_facilities');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['hospital'];
            }
        }
        return false;
    }

    public function props_school($props_id)
    {
        $this->db->where('prop_id',$props_id);
        $query      = $this->db->get('propery_facilities');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['school'];
            }
        }
        return false;
    }

    public function props_petrol_pump($props_id)
    {
        $this->db->where('prop_id',$props_id);
        $query      = $this->db->get('propery_facilities');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['petrol_pump'];
            }
        }
        return false;
    }

    public function props_airport($props_id)
    {
        $this->db->where('prop_id',$props_id);
        $query      = $this->db->get('propery_facilities');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['airport'];
            }
        }
        return false;
    }

    public function props_church($props_id)
    {
        $this->db->where('prop_id',$props_id);
        $query      = $this->db->get('propery_facilities');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['church'];
            }
        }
        return false;
    }

    public function props_mosque($props_id)
    {
        $this->db->where('prop_id',$props_id);
        $query      = $this->db->get('propery_facilities');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['mosque'];
            }
        }
        return false;
    }
    //Amenities
    public function props_air_condition($props_id)
    {
        $this->db->where('prop_id',$props_id);
        $query      = $this->db->get('propery_amenities');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['air_condition'];
            }
        }
        return false;
    }

    public function props_balcony($props_id)
    {
        $this->db->where('prop_id',$props_id);
        $query      = $this->db->get('propery_amenities');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['balcony'];
            }
        }
        return false;
    }

    public function props_bedding($props_id)
    {
        $this->db->where('prop_id',$props_id);
        $query      = $this->db->get('propery_amenities');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['bedding'];
            }
        }
        return false;
    }

    public function props_cable_tv($props_id)
    {
        $this->db->where('prop_id',$props_id);
        $query      = $this->db->get('propery_amenities');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['cable_tv'];
            }
        }
        return false;
    }

    public function props_cleaning_after_exit($props_id)
    {
        $this->db->where('prop_id',$props_id);
        $query      = $this->db->get('propery_amenities');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['cleaning_after_exit'];
            }
        }
        return false;
    }

    public function props_cofee_pot($props_id)
    {
        $this->db->where('prop_id',$props_id);
        $query      = $this->db->get('propery_amenities');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['cofee_pot'];
            }
        }
        return false;
    }

    public function props_computer($props_id)
    {
        $this->db->where('prop_id',$props_id);
        $query      = $this->db->get('propery_amenities');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['computer'];
            }
        }
        return false;
    }

    public function props_cot($props_id)
    {
        $this->db->where('prop_id',$props_id);
        $query      = $this->db->get('propery_amenities');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['cot'];
            }
        }
        return false;
    }

    public function props_dishwasher($props_id)
    {
        $this->db->where('prop_id',$props_id);
        $query      = $this->db->get('propery_amenities');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['dishwasher'];
            }
        }
        return false;
    }

    public function props_dvd($props_id)
    {
        $this->db->where('prop_id',$props_id);
        $query      = $this->db->get('propery_amenities');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['dvd'];
            }
        }
        return false;
    }

    public function props_fan($props_id)
    {
        $this->db->where('prop_id',$props_id);
        $query      = $this->db->get('propery_amenities');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['fan'];
            }
        }
        return false;
    }

    public function props_fridge($props_id)
    {
        $this->db->where('prop_id',$props_id);
        $query      = $this->db->get('propery_amenities');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['fridge'];
            }
        }
        return false;
    }

    public function props_grill($props_id)
    {
        $this->db->where('prop_id',$props_id);
        $query      = $this->db->get('propery_amenities');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['grill'];
            }
        }
        return false;
    }

    public function props_hairdryer($props_id)
    {
        $this->db->where('prop_id',$props_id);
        $query      = $this->db->get('propery_amenities');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['hairdryer'];
            }
        }
        return false;
    }

    public function props_heater($props_id)
    {
        $this->db->where('prop_id',$props_id);
        $query      = $this->db->get('propery_amenities');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['heater'];
            }
        }
        return false;
    }

    public function props_hi_fi($props_id)
    {
        $this->db->where('prop_id',$props_id);
        $query      = $this->db->get('propery_amenities');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['hi_fi'];
            }
        }
        return false;
    }

    public function props_internet($props_id)
    {
        $this->db->where('prop_id',$props_id);
        $query      = $this->db->get('propery_amenities');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['internet'];
            }
        }
        return false;
    }

    public function props_iron($props_id)
    {
        $this->db->where('prop_id',$props_id);
        $query      = $this->db->get('propery_amenities');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['iron'];
            }
        }
        return false;
    }

    public function props_juicer($props_id)
    {
        $this->db->where('prop_id',$props_id);
        $query      = $this->db->get('propery_amenities');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['juicer'];
            }
        }
        return false;
    }

    public function props_lift($props_id)
    {
        $this->db->where('prop_id',$props_id);
        $query      = $this->db->get('propery_amenities');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['lift'];
            }
        }
        return false;
    }

    public function props_microwave($props_id)
    {
        $this->db->where('prop_id',$props_id);
        $query      = $this->db->get('propery_amenities');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['microwave'];
            }
        }
        return false;
    }

    public function props_gym($props_id)
    {
        $this->db->where('prop_id',$props_id);
        $query      = $this->db->get('propery_amenities');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['gym'];
            }
        }
        return false;
    }

    public function props_fireplace($props_id)
    {
        $this->db->where('prop_id',$props_id);
        $query      = $this->db->get('propery_amenities');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['fireplace'];
            }
        }
        return false;
    }

    public function props_hot_tub($props_id)
    {
        $this->db->where('prop_id',$props_id);
        $query      = $this->db->get('propery_amenities');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['hot_tub'];
            }
        }
        return false;
    }

    // get Valuation
    public function props_crime($props_id)
    {
        $this->db->where('prop_id',$props_id);
        $query      = $this->db->get('propery_valuation');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['crime'];
            }
        }
        return false;
    }

    public function props_traffic($props_id)
    {
        $this->db->where('prop_id',$props_id);
        $query      = $this->db->get('propery_valuation');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['traffic'];
            }
        }
        return false;
    }

    public function props_pollution($props_id)
    {
        $this->db->where('prop_id',$props_id);
        $query      = $this->db->get('propery_valuation');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['pollution'];
            }
        }
        return false;
    }

    public function props_education($props_id)
    {
        $this->db->where('prop_id',$props_id);
        $query      = $this->db->get('propery_valuation');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['education'];
            }
        }
        return false;
    }

    public function props_health($props_id)
    {
        $this->db->where('prop_id',$props_id);
        $query      = $this->db->get('propery_valuation');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['health'];
            }
        }
        return false;
    }

    //get Details
    public function props_condition($props_id)
    {
        $this->db->where('prop_id',$props_id);
        $query      = $this->db->get('propery_details');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['prop_condition'];
            }
        }
        return false;
    }

    public function props_caution_fee($props_id)
    {
        $this->db->where('prop_id',$props_id);
        $query      = $this->db->get('propery_details');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['caution_fee'];
            }
        }
        return false;
    }

    public function props_special_pref($props_id)
    {
        $this->db->where('prop_id',$props_id);
        $query      = $this->db->get('propery_details');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['special_pref'];
            }
        }
        return false;
    }

    //get property image
    public function get_all_props_image($props_id){
        $this->db->where('prop_id',$props_id);
        $query      =$this->db->get('propery_image');
       if($query->num_rows() > 0){
            return $query->result_array();
        }
        return false;
    }

    public function get_all_props_image_2($props_id){
        $msg    = array();
        $this->db->where('prop_id',$props_id);
        $query      =$this->db->get('propery_image');
       if($query->num_rows() > 0){

            foreach($query->result_array() as $row){
                $id             = $row['id'];
                $prop_id        = $row['prop_id'];
                $image_name     = $row['image_name'];
                $image_name     = base_url().'project_dir/property/'.$image_name;

                $msg[]  = array('id'=>$id,'prop_id'=>$prop_id,'image_name'=>$image_name);
            }
            return $msg;
        }
        return $msg;
    }

    public function get_props_image_by_image_id($image_id)
    {
        $this->db->where('id',$image_id);
        $query      = $this->db->get('propery_image');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['image_name'];
            }
        }
        return false;
    }

    public function delete_image_by_id($image_id)
    {
        $this->db->where('id',$image_id);
        $this->db->delete('propery_image');
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
    }



    //get property video
    public function get_all_props_video($props_id){
        $query      =$this->db->get('propery_video');
       if($query->num_rows() > 0){
            return $query->result_array();
        }
        return false;
    }

    public function get_props_video_by_video_id($image_id)
    {
        $this->db->get('id',$image_id);
        $query      = $this->db->get('propery_video');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['video_name'];
            }
        }
        return false;
    }


    //get_types_of_Property
    public function get_types_of_property(){
        $query      =$this->db->get('types_of_property');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return false;
    }

    public function get_types_of_property_name_by_id($id){
        $this->db->where('id',$id);
         $query      =$this->db->get('types_of_property');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['name'];
            }
        }
        return false;
    }

    public function get_sub_types_of_property_by_type_id($type_id){
        $this->db->where('type_id',$type_id);
        $query      =$this->db->get('sub_types_of_propery');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return false;
    }


    public function get_sub_types_of_property_name_by_id($id){
        $this->db->where('id',$id);
         $query      =$this->db->get('sub_types_of_propery');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['name'];
            }
        }
        return false;
    }


    //get_state
    public function get_state(){
        $query      =$this->db->get('state');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return false;
    }

    public function get_state_name_state_id($state_id){
        $this->db->where('id',$state_id);
         $query      =$this->db->get('state');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['name'];
            }
        }
        return false;
    }

    public function get_state_id_by_props_id($props_id){
        $this->db->where('id',$props_id);
        $query      =$this->db->get('propery');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['state_id'];
            }
        }
        return false;
    }

    public function get_sub_state_by_state_id($state_id){
        $this->db->where('state_id',$state_id);
        $query      =$this->db->get('sub_state');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return false;
    }

    public function get_sub_state_id_by_props_id($props_id){
        $this->db->where('id',$props_id);
        $query      =$this->db->get('propery');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['sub_state_id'];
            }
        }
        return false;
    }


    public function get_sub_state_name_sub_state_id($sub_state_id){
        $this->db->where('id',$sub_state_id);
         $query      =$this->db->get('sub_state');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['name'];
            }
        }
        return false;
    }

    public function insert_property($title,$purpose,$types_of_property,$sub_type_property,$bedrooms,$bathrooms,
    $toilets,$state,$area,$price,$description,$youtube_video_link, 
    
    $air_condition,$balcony,$bedding,$cable_tv,$cleaning_after_exit,$cofee_pot,$computer,
    $cot,$dishwasher,$dvd,$fan,$fridge,$grill,$hairdryer,$heater,$hi_fi,$internet,$iron,$juicer,$lift,$microwave,$gym,$fireplace,$hot_tub, $year_built){
        
        $user_id        = $this->session->userdata('user_id');
        


        if($air_condition !='yes'){
            $air_condition = 'no';
        }

        if($balcony !='yes'){
            $balcony = 'no';
        }

        if($bedding !='yes'){
            $bedding = 'no';
        }

        if($cable_tv !='yes'){
            $cable_tv = 'no';
        }

        if($cleaning_after_exit !='yes'){
            $cleaning_after_exit = 'no';
        }

        if($cofee_pot !='yes'){
            $cofee_pot = 'no';
        }

        if($computer !='yes'){
            $computer = 'no';
        }

        if($cot !='yes'){
            $cot = 'no';
        }

        if($dishwasher !='yes'){
            $dishwasher = 'no';
        }

        if($dvd !='yes'){
            $dvd = 'no';
        }

        if($fan !='yes'){
            $fan = 'no';
        }

        if($fridge !='yes'){
            $fridge = 'no';
        }

        if($grill !='yes'){
            $grill = 'no';
        }

        if($hairdryer !='yes'){
            $hairdryer = 'no';
        }

        if($heater !='yes'){
            $heater = 'no';
        }

        if($hi_fi !='yes'){
            $hi_fi = 'no';
        }

        if($internet !='yes'){
            $internet = 'no';
        }

        if($iron !='yes'){
            $iron = 'no';
        }

        if($juicer !='yes'){
            $juicer = 'no';
        }

        if($lift !='yes'){
            $lift = 'no';
        }

        if($microwave !='yes'){
            $microwave = 'no';
        }

        if($gym !='yes'){
            $gym = 'no';
        }

        if($fireplace !='yes'){
            $fireplace = 'no';
        }

        if($hot_tub !='yes'){
            $hot_tub = 'no';
        }

        
        $data       = array('prop_name' =>$title,'prop_purpose'=>$purpose,'type_of_propery'=>$types_of_property,
                            'sub_type_of_propery'=>$sub_type_property,'prop_bedrom'=>$bedrooms,'prop_bathroom'=>$bathrooms,'prop_toilet'=>$toilets,
                            'state_id'=>$state,'sub_state_id'=>$area,'price'=>$price,'description'=>$description,'prop_vid_id'=>$youtube_video_link,
                            'prop_year_built'=> $year_built,'agent_id'=>$user_id
                    );
        

        $this->db->set($data);
        $this->db->insert('propery');
        $prod_id    =$this->db->insert_id();
        if($this->db->affected_rows() > 0){

            $data       = array('air_condition'=>$air_condition,'balcony'=>$balcony,'bedding'=>$bedding,'cable_tv'=>$cable_tv,
                            'cleaning_after_exit'=>$cleaning_after_exit,'cofee_pot'=>$cofee_pot,'computer'=>$computer,'cot'=>$cot,'dishwasher'=>$dishwasher,'dvd'=>$dvd,
                            'fan'=>$fan,'fridge'=>$fridge,'grill'=>$grill,'hairdryer'=>$hairdryer,'heater'=>$heater,'hi_fi'=>$hi_fi,'internet'=>$internet,
                            'iron'=>$iron,'juicer'=>$juicer,'lift'=>$lift,'microwave'=>$microwave,'gym'=>$gym,'fireplace'=>$fireplace,'hot_tub'=>$hot_tub,
                            'prop_id'=> $prod_id
            );

            $this->db->set($data);
            $this->db->insert('propery_amenities');


            $data4=array(
                'props_id'=>$prod_id,
			);
            $this->session->set_userdata($data4);
            return true;
        }
        return false;
    }

    public function insert_property_detail($condition,$caution_fee,$special_pref,$shopping_mall,$hospital,
		$petrol_pump,$airport,$church,$mosque,$crime,$traffic,$pollution,$education,$health,$prod_id,$school){
        $data       = array('prop_condition'=>$condition,'caution_fee'=>$caution_fee,
                            'special_pref'=>$special_pref,'prop_id'=>$prod_id
                    );


        $this->db->set($data);
        $this->db->insert('propery_details');
        if($this->db->affected_rows() > 0){

            $data       = array('shopping_mall'=>$shopping_mall,
                            'hospital'=>$hospital,'petrol_pump'=>$petrol_pump,'airport'=>$airport,'church'=>$church,
                            'mosque'=>$mosque,'prop_id'=>$prod_id,'school'=>$school
            );


            $this->db->set($data);
            $this->db->insert('propery_facilities');

            $data       = array('crime'=>$crime,'traffic'=>$traffic,'pollution'=>$pollution,'education'=>$education,
                            'health'=>$health,'prop_id'=>$prod_id
            );


            $this->db->set($data);
            $this->db->insert('propery_valuation');


            return true;
        }
        return false;
    }

    public function add_image_to_property($id,$file_name){
        $data   = array('prop_id'=>$id,'image_name'=>$file_name);
        $this->db->set($data);
        $this->db->insert('propery_image');
        if($this->db->affected_rows() > 0){
            
            $data   =array('prop_img_name'=>$file_name);
            $this->db->set($data);
            $this->db->where('id',$id);
            $this->db->update('propery');
            
            return true;
        }
        return false;
    }

    public function add_image_property_2($file_name,$props_id){
        $data   = array('image_name'=>$file_name,'prop_id'=>$props_id);
        $this->db->set($data);
        $this->db->insert('propery_image');
        if($this->db->affected_rows() > 0){
            $data   =array('prop_img_name'=>$file_name);
            $this->db->set($data);
            $this->db->where('id',$props_id);
            $this->db->update('propery');
            $this->update_property_status_to_pending($props_id);

            return true;
        }
        return false;
    }

    public function update_property_image_name($props_id,$my_file_name){
        $data       = array('prop_img_name'=>$my_file_name);
        $this->db->set($data);
        $this->db->where('id',$props_id);
        $this->db->update('propery');
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
    }

    
   	public function count_props($agent_id){
		return $this->db->from('propery')->where('agent_id',$agent_id)->count_all_results();
	} 
    
   	public function count_all_props(){
		return $this->db->from('propery')->count_all_results();
	} 

    public function count_product_search($search_term){
        $this->db->like('prop_name', $this->db->escape_like_str($search_term, 'both'));
        $this->db->or_like('description', $this->db->escape_like_str($search_term, 'both'));

        return $this->db->from('propery')->count_all_results();
    }

    public function count_product_location($state_id,$area_id){
        $this->db->where('state_id', $state_id);
        $this->db->where('sub_state_id', $area_id);

        return $this->db->from('propery')->count_all_results();
    }

    public function count_product_type($type_id){
        $this->db->where('type_of_propery', $type_id);

        return $this->db->from('propery')->count_all_results();
    }


    public function count_product_price($start_price, $end_price){
        $this->db->where('price >=', $start_price);
        $this->db->where('price <=', $end_price);

        return $this->db->from('propery')->count_all_results();
    }


    
    public function get_agent_property($user_id){
        $this->db->where('agent_id',$user_id);
        $query      =$this->db->get('propery');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return false;
    }


    public function edit_basic_property($title,$purpose,$types_of_property,$sub_type_property,$bedrooms,$bathrooms,
    $toilets,$state,$area,$price,$description,$youtube_video_link, $year_built, $props_id){

        
        $data       = array('prop_name' =>$title,'prop_purpose'=>$purpose,'type_of_propery'=>$types_of_property,
                            'sub_type_of_propery'=>$sub_type_property,'prop_bedrom'=>$bedrooms,'prop_bathroom'=>$bathrooms,'prop_toilet'=>$toilets,
                            'state_id'=>$state,'sub_state_id'=>$area,'price'=>$price,'description'=>$description,'prop_vid_id'=>$youtube_video_link,
                            'prop_year_built'=> $year_built,
                    );
        $this->db->set($data);
        $this->db->where('id',$props_id);
        $this->db->update('propery');
        if($this->db->affected_rows() > 0){
            $this->update_property_status_to_pending($props_id);
            return true;
        }
        return false;
    }


    public function edit_amenities_property($air_condition,$balcony,$bedding,$cable_tv,$cleaning_after_exit,$cofee_pot,$computer,
		$cot,$dishwasher,$dvd,$fan,$fridge,$grill,$hairdryer,$heater,$hi_fi,$internet,$iron,$juicer,$lift,$microwave,$gym,$fireplace,$hot_tub, $props_id){


        if($air_condition !='yes'){
            $air_condition = 'no';
        }

        if($balcony !='yes'){
            $balcony = 'no';
        }

        if($bedding !='yes'){
            $bedding = 'no';
        }

        if($cable_tv !='yes'){
            $cable_tv = 'no';
        }

        if($cleaning_after_exit !='yes'){
            $cleaning_after_exit = 'no';
        }

        if($cofee_pot !='yes'){
            $cofee_pot = 'no';
        }

        if($computer !='yes'){
            $computer = 'no';
        }

        if($cot !='yes'){
            $cot = 'no';
        }

        if($dishwasher !='yes'){
            $dishwasher = 'no';
        }

        if($dvd !='yes'){
            $dvd = 'no';
        }

        if($fan !='yes'){
            $fan = 'no';
        }

        if($fridge !='yes'){
            $fridge = 'no';
        }

        if($grill !='yes'){
            $grill = 'no';
        }

        if($hairdryer !='yes'){
            $hairdryer = 'no';
        }

        if($heater !='yes'){
            $heater = 'no';
        }

        if($hi_fi !='yes'){
            $hi_fi = 'no';
        }

        if($internet !='yes'){
            $internet = 'no';
        }

        if($iron !='yes'){
            $iron = 'no';
        }

        if($juicer !='yes'){
            $juicer = 'no';
        }

        if($lift !='yes'){
            $lift = 'no';
        }

        if($microwave !='yes'){
            $microwave = 'no';
        }

        if($gym !='yes'){
            $gym = 'no';
        }

        if($fireplace !='yes'){
            $fireplace = 'no';
        }

        if($hot_tub !='yes'){
            $hot_tub = 'no';
        }

        
        $data       = array('air_condition'=>$air_condition,'balcony'=>$balcony,'bedding'=>$bedding,'cable_tv'=>$cable_tv,
                            'cleaning_after_exit'=>$cleaning_after_exit,'cofee_pot'=>$cofee_pot,'computer'=>$computer,'cot'=>$cot,'dishwasher'=>$dishwasher,'dvd'=>$dvd,
                            'fan'=>$fan,'fridge'=>$fridge,'grill'=>$grill,'hairdryer'=>$hairdryer,'heater'=>$heater,'hi_fi'=>$hi_fi,'internet'=>$internet,
                            'iron'=>$iron,'juicer'=>$juicer,'lift'=>$lift,'microwave'=>$microwave,'gym'=>$gym,'fireplace'=>$fireplace,'hot_tub'=>$hot_tub,
            );

        $this->db->set($data);
        $this->db->where('prop_id',$props_id);
        $this->db->update('propery_amenities');
        if($this->db->affected_rows() > 0){
            $this->update_property_status_to_pending($props_id);
            return true;
        }
        return false;
    }



    public function edit_extra_property($condition,$caution_fee,$special_pref,$shopping_mall,$hospital,$petrol_pump,$airport,$church,$mosque,$crime,$traffic,
    $pollution,$education,$health,$props_id,$school){

        
        $data       = array('prop_condition'=>$condition,'caution_fee'=>$caution_fee,
                            'special_pref'=>$special_pref
                    );

        $this->db->set($data);
        $this->db->where('prop_id',$props_id);
        $this->db->update('propery_details');
        if($this->db->affected_rows() > 0){

            $data       = array('shopping_mall'=>$shopping_mall,
                            'hospital'=>$hospital,'petrol_pump'=>$petrol_pump,'airport'=>$airport,'church'=>$church,
                            'mosque'=>$mosque,'school'=>$school
            );


            $this->db->set($data);
            $this->db->where('prop_id',$props_id);
            $this->db->update('propery_facilities');

            $data       = array('crime'=>$crime,'traffic'=>$traffic,'pollution'=>$pollution,'education'=>$education,
                            'health'=>$health
            );

            $this->db->set($data);
            $this->db->where('prop_id',$props_id);
            $this->db->insert('propery_valuation');
            $this->update_property_status_to_pending($props_id);

            return true;
        }
        return false;
    }


    public function alert_callbark($type,$msg){
		return $data['alert']  ='<div class="alert alert-'.$type.' border-0 bg-'.$type.' alert-dismissible fade show py-2">
								<div class="d-flex align-items-center">
										<div class="font-35 text-white"><i class="bx bx-info-square"></i></div>
										<div class="ms-3">
											<h6 class="mb-0 text-white">Oops!</h6>
											<div class="text-white">'.$msg.' </div>
										</div>
									</div>
								</div>';
	}

    public function time_stamp($session_time) { 
		$time_difference = time() - $session_time ; 
		$seconds = $time_difference ; 
		$minutes = round($time_difference / 60 );
		$hours = round($time_difference / 3600 ); 
		$days = round($time_difference / 86400 ); 
		$weeks = round($time_difference / 604800 ); 
		$months = round($time_difference / 2419200 ); 
		$years = round($time_difference / 29030400 ); 

		if($seconds <= 60){
			echo"$seconds seconds ago"; 
		}elseif($minutes <=60){
	   		if($minutes==1){
		 		echo"one minute ago"; 
			}else{
	   			echo"$minutes minutes ago"; 
	   		}
		}else if($hours <=24){
	   		if($hours==1){
	   			echo"one hour ago";
	   		}else{
	  			echo"$hours hours ago";
	  		}
		}else if($days <=7){
	  		if($days==1){
	   			echo"one day ago";
	   		}else{
	  			echo"$days days ago";
	  		}
		}else if($weeks <=4){
	  		if($weeks==1){
	   			echo"one week ago";
	   		}else{
	  			echo"$weeks weeks ago";
	  		}
	 	}else if($months <=12){
	   		if($months==1){
	   			echo"one month ago";
	   		}else{
	  			echo"$months months ago";
	  		}
		}else{
			if($years==1){
	   			echo"one year ago";
	 		}else{
	  			echo"$years years ago";
	  		}
		}
	} 

    public function time_stamp_2($session_time) { 
		$time_difference = time() - $session_time ; 
		$seconds = $time_difference ; 
		$minutes = round($time_difference / 60 );
		$hours = round($time_difference / 3600 ); 
		$days = round($time_difference / 86400 ); 
		$weeks = round($time_difference / 604800 ); 
		$months = round($time_difference / 2419200 ); 
		$years = round($time_difference / 29030400 ); 

		if($seconds <= 60){
			return "$seconds seconds ago"; 
		}elseif($minutes <=60){
	   		if($minutes==1){
		 		return "one minute ago"; 
			}else{
	   			return "$minutes minutes ago"; 
	   		}
		}else if($hours <=24){
	   		if($hours==1){
	   			return "one hour ago";
	   		}else{
	  			return "$hours hours ago";
	  		}
		}else if($days <=7){
	  		if($days==1){
	   			return "one day ago";
	   		}else{
	  			return "$days days ago";
	  		}
		}else if($weeks <=4){
	  		if($weeks==1){
	   			return "one week ago";
	   		}else{
	  			return "$weeks weeks ago";
	  		}
	 	}else if($months <=12){
	   		if($months==1){
	   			return "one month ago";
	   		}else{
	  			return "$months months ago";
	  		}
		}else{
			if($years==1){
	   			return "one year ago";
	 		}else{
	  			return "$years years ago";
	  		}
		}
	} 

    public function count_unapprove_property($user_id){
        $this->db->where('live_status','rejected');            
        $this->db->where('agent_id',$user_id);            
        return $this->db->from('propery')
            ->count_all_results();
    }

    public function count_all_property($type){
        if($type == 'pending' || $type == 'approved' || $type =='rejected'){
            $this->db->where('live_status',$type);
        }
            
        return $this->db->from('propery')
            ->count_all_results();
    }

    public function get_all_property($type, $offset, $per_page){

        if($type == 'pending' || $type == 'approved' || $type =='rejected'){
            $this->db->where('live_status',$type);
        }
        $this->db->limit($per_page,$offset);
        $query  =$this->db->get('propery');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return false;
    }

    public function approve_property($id){
        $data       = array('live_status'=>'approved');
        $this->db->set($data);
        $this->db->where('id',$id);
        $this->db->update('propery');
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
    }

    public function reject_property($id){
        $data       = array('live_status'=>'rejected');
        $this->db->set($data);
        $this->db->where('id',$id);
        $this->db->update('propery');
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
    }

    public function count_search_property($keyword){

        $this->db->like('prop_name',$this->db->escape_like_str($keyword,'both'));
        return $this->db->from('propery')->count_all_results();
    }


    public function get_all_search_property($keyword, $offset, $per_page){
        
        $this->db->like('prop_name',$this->db->escape_like_str($keyword,'both'));
        $this->db->order_by('id','desc');
        $this->db->limit($per_page,$offset);

        $query		=$this->db->get('propery');
		if($query->num_rows() > 0){

            return $query->result_array();
		}

		return $this->alert_callbark('danger','No Search Term Found!');
    }

    

    public function count_state_filter($keyword){

        $this->db->where('state_id',$keyword);
        return $this->db->from('propery')->count_all_results();
    }


    public function get_all_state_filter($keyword, $offset, $per_page){

        $this->db->where('state_id', $keyword);
        $this->db->order_by('id','desc');
        $this->db->limit($per_page,$offset);

        $query		=$this->db->get('propery');
		if($query->num_rows() > 0){

            return $query->result_array();
		}

		return $this->alert_callbark('danger','No Search Term Found!');
    }


    public function count_purpose_filter($keyword){

        $this->db->where('prop_purpose',$keyword);
        return $this->db->from('propery')->count_all_results();
    }


    public function get_all_purpose_filter($keyword, $offset, $per_page){

        $this->db->where('prop_purpose', $keyword);
        $this->db->order_by('id','desc');
        $this->db->limit($per_page,$offset);

        $query		=$this->db->get('propery');
		if($query->num_rows() > 0){

            return $query->result_array();
		}

		return $this->alert_callbark('danger','No Search Term Found!');
    }


    public function count_types_filter($keyword){

        $this->db->where('type_of_propery',$keyword);
        return $this->db->from('propery')->count_all_results();
    }


    public function get_all_ptypes_filter($keyword, $offset, $per_page){

        $this->db->where('type_of_propery', $keyword);
        $this->db->order_by('id','desc');
        $this->db->limit($per_page,$offset);

        $query		=$this->db->get('propery');
		if($query->num_rows() > 0){

            return $query->result_array();
		}

		return $this->alert_callbark('danger','No Search Term Found!');
    }

    public function count_filter_date($keyword_1, $keyword_2){

        $keyword_1	=date('d-m-Y H:i:sa',strtotime($keyword_1));
        $keyword_2	=date('d-m-Y H:i:sa',strtotime($keyword_2));
        
        $this->db->where('date_created <',$keyword_1);
        $this->db->where('date_created >',$keyword_2);
        return $this->db->from('propery')->count_all_results();
    }


    public function get_all_filter_date($keyword_1, $keyword_2, $offset, $per_page){

        $keyword_1	=date('d-m-Y H:i:sa',strtotime($keyword_1));
        $keyword_2	=date('d-m-Y H:i:sa',strtotime($keyword_2));
        
        $this->db->where('date_created <',$keyword_1);
        $this->db->where('date_created >',$keyword_2);

        $this->db->order_by('id','desc');
        $this->db->limit($per_page,$offset);

        $query		=$this->db->get('propery');
		if($query->num_rows() > 0){

            return $query->result_array();
		}

		return $this->alert_callbark('danger','No Search Term Found!');
    }

    public function get_props_feature_image($props_id){
        $this->db->where('id',$props_id);
        $query  =$this->db->get('propery');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['slider_img'];
            }
        }
        return false;
    }

    public function get_props_feature_status($props_id){
        $this->db->where('id',$props_id);
        $query  =$this->db->get('propery');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['approve_slider'];
            }
        }
        return false;
    }

    public function insert_feature_image($file_name,$props_id){
        $data   =array('slider_img'=>$file_name);
        $this->db->set($data);
        $this->db->where('id',$props_id);
        $this->db->update('propery');
        
        if($this->db->affected_rows() > 0){
            $this->update_property_status_to_pending($props_id);
            return true;
        }
        return false;
    }


    public function update_property_status_to_pending($props_id){

        $data       = array('live_status'=>'new','approve_slider'=>'no');
        $this->db->set($data);
        $this->db->where('id',$props_id);
        $this->db->update('propery');
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
    }

    public function delete_feature_image($props_id){
        $data   = array('slider_img'=>'no_image');
        $this->db->set($data);
        $this->db->where('id',$props_id);
        $this->db->update('propery');

        if($this->db->affected_rows() > 0){
            $this->update_property_status_to_pending($props_id);
            return true;
        }
        return false;
    }


    public function approve_feature_image($props_id){
        $data   =array('approve_slider'=>'yes');
        $this->db->set($data);
        $this->db->where('id',$props_id);
        $this->db->update('propery');
        
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
    }

    public function unapprove_feature_image($props_id){
        $data   =array('approve_slider'=>'no');
        $this->db->set($data);
        $this->db->where('id',$props_id);
        $this->db->update('propery');
        
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
    }



    public function delete_favourite($props_id)
    {
        $this->db->where('id',$props_id);
        $this->db->delete('propery');
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
    }

     public function count_user_favourite($user_id){
        
        $this->db->where('user_id',$user_id);
            
        return $this->db->from('favourite')
            ->count_all_results();
    }

    public function get_user_favourite($user_id, $offset, $per_page){

        $this->db->where('user_id',$user_id);
        $this->db->limit($per_page,$offset);
        $query  =$this->db->get('favourite');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return false;
    }

    public function check_if_user_has_report($prod_id,$user_id){
        $this->db->where('prop_id',$prod_id);
        $this->db->where('user_id',$user_id);

        $query      =$this->db->get('report_property');
        if($query->num_rows() > 0){
            return true;
        }
        return false;
    }


    public function update_app_version($version_num, $android_link, $ios_link){
        $this->db->empty_table('app_version');
        $data   = array('app_version' => $version_num, 'android_link' => $android_link, 'ios_link' => $ios_link);
        $this->db->set($data);
        $this->db->insert('app_version');
        if ($this->db->affected_rows() > 0) {
            return true;
        }
        return false;
    }

    public function get_update_version(){
        $query  = $this->db->get('app_version');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                return $row['app_version'];
            }
        }
        return false;
    }

    
    public function get_app_android_link(){
        $query  = $this->db->get('app_version');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                return $row['android_link'];
            }
        }
        return false;
    }
    
    public function get_app_ios_link(){
        $query  = $this->db->get('app_version');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                return $row['ios_link'];
            }
        }
        return false;
    }

}