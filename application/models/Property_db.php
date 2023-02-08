<?php
class Property_db extends My_Model{
    public function __construct(){
        parent::__construct();
    }

    public function count_all_props(){
        // $this->db->where('prop_status','available');
        $this->db->where('live_status','approved');
        return $this->db->from('propery')->count_all_results();
    }

    public function get_all_props($offset, $per_page){

        // $this->db->where('prop_status','available');
        $this->db->where('live_status','approved');
         $this->db->limit($per_page,$offset);
        $query      =$this->db->get('propery');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return false;
    }


     public function count_prop_images($props_id){
        $this->db->where('prop_id',$props_id);
        return $this->db->from('propery_image')->count_all_results();
    }

    public function get_all_props_image($props_id){
        $this->db->where('prop_id',$props_id);
        $query  = $this->db->get('propery_image');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return false;
    }

    public function get_props_by_id($user_id){
        return $this->Admin_db->get_props_by_id($user_id);
    }

    public function get_other_props_randomly($props_id){
        // $this->db->where('id !=',$props_id);
        $this->db->limit(2);
		$this->db->order_by('rand()');
        $this->db->where('live_status','approved');
        $query      =$this->db->get('propery');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return false;
    }

    public function count_all_user_property($agent_id){
        $this->db->where('agent_id',$agent_id);
        return $this->db->from('propery')->count_all_results();
    }

    public function count_filter($property_type_id, $property_purpose, $price_from, $price_to, $state_id, $area_id, $keyword, $props_id){
        $this->db->like('prop_name',$this->db->escape_like_str($keyword,'both'));
        $this->db->where('type_of_propery',$property_type_id);
        $this->db->where('prop_purpose', $property_purpose);
        $this->db->where('price >=', $price_from);
        $this->db->where('price <=', $price_to);
        $this->db->where('live_status','approved');

        return $this->db->from('propery')->count_all_results();
    }
    public function search_filter($property_type_id, $property_purpose, $price_from, $price_to, $state_id, $area_id, $keyword, $props_id, $offset,$per_page){
        

        $this->db->like('prop_name',$this->db->escape_like_str($keyword,'both'));
        $this->db->where('type_of_propery',$property_type_id);
        $this->db->where('prop_purpose', $property_purpose);
        $this->db->where('price >=', $price_from);
        $this->db->where('price <=', $price_to);
        $this->db->where('live_status','approved');
        
            
    

        $this->db->order_by('id','desc');
        $this->db->limit($per_page,$offset);

        $query		=$this->db->get('propery');
		if($query->num_rows() > 0){
			// print_r($query->result_array());
			return $query->result_array();
		}

		return $this->Admin_db->alert_callbark('danger','No Search Term Found!');
    }




    public function count_all_rent_props(){
        // $this->db->where('prop_status','available');
        $this->db->where('prop_purpose','rent');
        $this->db->where('live_status','approved');

        return $this->db->from('propery')->count_all_results();
    }

    public function get_all_rent_props($offset,$per_page){
        $this->db->where('prop_purpose','rent');
        $this->db->where('live_status','approved');

        $this->db->limit($per_page,$offset);
        $query  =$this->db->get('propery');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return false;
    }


    public function count_all_sale_props(){
        // $this->db->where('prop_status','available');
        $this->db->where('prop_purpose','sale');
        $this->db->where('live_status','approved');
        return $this->db->from('propery')->count_all_results();
    }

    public function get_all_sale_props($offset,$per_page){
        $this->db->where('prop_purpose','sale');
        $this->db->where('live_status','approved');

        $this->db->limit($per_page,$offset);
        $query  =$this->db->get('propery');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return false;
    }



    public function get_property_slider(){

        $this->db->where('prop_status','available');
        $this->db->order_by('rand()');
        $this->db->where('approve_slider','yes');
        $query      =$this->db->get('propery');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return false;
    }

    public function get_property_agent(){

        $this->db->where('status','landlord');
        $this->db->or_where('status','agent');
        $this->db->order_by('rand()');
        // $this->db->where('approve_slider','no');
        $query      =$this->db->get('users');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return false;
    }


    public function count_all_agent(){
        $this->db->where('status','landlord');
        $this->db->or_where('status','agent');
        return $this->db->from('users')->count_all_results();
    }

    public function get_all_agent($offset,$per_page){
        $this->db->where('status','landlord');
        $this->db->or_where('status','agent');

        $this->db->limit($per_page,$offset);
        $query  =$this->db->get('users');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return false;
    }

}