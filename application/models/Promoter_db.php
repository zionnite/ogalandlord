<?php
class Promoter_db extends My_Model{
    public function __construct(){
        parent::__construct();
    }

    public function check_if_property_isPromoted($props_id){
        $this->db->where('is_marketer_needed','yes');
        $query      = $this->db->get('propery');
        if($query->num_rows() > 0){
            return true;
        }
        return false;
    }

    public function isUserPromoterRefered($user_id, $props_id){
        $this->db->where('user_id',$user_id);
        $this->db->where('props_id',$props_id);
        $query      =$this->db->get('promoter_refered');
        if($query->num_rows() > 0){
           return true;
        }
        return false;
    }
    
    public function isUserRequestNo($user_id){
        $this->db->where('user_id',$user_id);
        $this->db->where('is_requested','no');
        $query      =$this->db->get('promoter_refered');
        if($query->num_rows() > 0){
           return true;
        }
        return false;
    }

    public function getPromoterIdByRefereId($user_id, $props_id){

        $this->db->where('user_id',$user_id);
        $this->db->where('props_id',$props_id);
        $query      =$this->db->get('promoter_refered');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['promoter_id'];
            }
        }
        return false;
        
    }

    public function get_promoter_com($props_id){
        $this->db->where('id',$props_id);
        $query      =$this->db->get('propery');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['commission'];
            }
        }
        return false;

    }

    public function count_property_am_promoting($user_id){

        $this->db->where('user_id',$user_id);   
        return $this->db->from('promoter')
            ->count_all_results();
    }



    public function get_property_am_promoting($user_id, $offset, $per_page){
        $this->db->where('user_id',$user_id);
        $this->db->limit($per_page,$offset);
        $this->db->order_by('id','desc');
        
        $query      =$this->db->get('promoter');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return false;

    }

    public function get_property_am_promoting_limit_by_10($user_id){
        $this->db->where('user_id',$user_id);
        $this->db->limit(10);
        $this->db->order_by('id','desc');
        
        $query      =$this->db->get('promoter');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return false;

    }

    public function get_promoter_id_by_url_code($url_code){
        
        $this->db->where('url_code',$url_code);
        $query      =$this->db->get('promoter');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['user_id'];
            }
        }
        return false;
    }


    public function get_props_id_by_user_id($user_id){
        
        $this->db->where('user_id',$user_id);
        $query      =$this->db->get('promoter_refered');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['props_id'];
            }
        }
        return false;
    }

    public function get_url_code_by_user_id($user_id){
        
        $this->db->where('user_id',$user_id);
        $query      =$this->db->get('promoter_refered');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['url_code'];
            }
        }
        return false;
    }



    public function count_all_property($type){
        // $this->db->where('prop_status',$type);
        $this->db->where('is_marketer_needed','yes');
            
        return $this->db->from('propery')
            ->count_all_results();
    }

    public function get_all_property($type, $offset, $per_page){

        // $this->db->where('prop_status',$type);
        $this->db->where('is_marketer_needed','yes');
            
        $this->db->limit($per_page,$offset);
        $query  =$this->db->get('propery');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return false;
    }

    public function promote_product($user_id,$props_id){
        $random_string      = random_string('numeric', 16);
        $year               = date('Y');
        $month              = date('M');
        $day                = date('d');

        $url_code           = $random_string.$year.$month.$day.time();

        $data               = array('user_id'=>$user_id,'props_id'=>$props_id,'url_code'=>$url_code);
        $this->db->set($data);
        $this->db->insert('promoter');
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
    }

    public function count_search_property($keyword){

        $this->db->where('is_marketer_needed','yes');
        $this->db->like('prop_name',$this->db->escape_like_str($keyword,'both'));
        return $this->db->from('propery')->count_all_results();
    }

    public function get_all_search_property($keyword, $offset, $per_page){
        
        $this->db->where('is_marketer_needed','yes');
        $this->db->like('prop_name',$this->db->escape_like_str($keyword,'both'));
        $this->db->order_by('id','desc');
        $this->db->limit($per_page,$offset);

        $query		=$this->db->get('propery');
		if($query->num_rows() > 0){

            return $query->result_array();
		}

		return $this->Admin_db->alert_callbark('danger','No Search Term Found!');
    }


    public function count_state_filter($keyword){

        $this->db->where('is_marketer_needed','yes');
        $this->db->where('state_id',$keyword);
        return $this->db->from('propery')->count_all_results();
    }

    public function get_all_state_filter($keyword, $offset, $per_page){

        $this->db->where('is_marketer_needed','yes');
        $this->db->where('state_id', $keyword);
        $this->db->order_by('id','desc');
        $this->db->limit($per_page,$offset);

        $query		=$this->db->get('propery');
		if($query->num_rows() > 0){

            return $query->result_array();
		}

		return $this->Admin_db->alert_callbark('danger','No Search Term Found!');
    }




    public function count_purpose_filter($keyword){

        $this->db->where('is_marketer_needed','yes');
        $this->db->where('prop_purpose',$keyword);
        return $this->db->from('propery')->count_all_results();
    }


    public function get_all_purpose_filter($keyword, $offset, $per_page){

        $this->db->where('is_marketer_needed','yes');
        $this->db->where('prop_purpose', $keyword);
        $this->db->order_by('id','desc');
        $this->db->limit($per_page,$offset);

        $query		=$this->db->get('propery');
		if($query->num_rows() > 0){

            return $query->result_array();
		}

		return $this->Admin_db->alert_callbark('danger','No Search Term Found!');
    }


    public function get_all_ptypes_filter($keyword, $offset, $per_page){

        $this->db->where('is_marketer_needed','yes');
        $this->db->where('type_of_propery', $keyword);
        $this->db->order_by('id','desc');
        $this->db->limit($per_page,$offset);

        $query		=$this->db->get('propery');
		if($query->num_rows() > 0){

            return $query->result_array();
		}

		return $this->Admin_db->alert_callbark('danger','No Search Term Found!');
    }


    public function count_types_filter($keyword){

        $this->db->where('is_marketer_needed','yes');
        $this->db->where('type_of_propery',$keyword);
        return $this->db->from('propery')->count_all_results();
    }



    public function get_all_filter_date($keyword_1, $keyword_2, $offset, $per_page){

        $keyword_1	=date('d-m-Y H:i:sa',strtotime($keyword_1));
        $keyword_2	=date('d-m-Y H:i:sa',strtotime($keyword_2));
        
        $this->db->where('date_created <',$keyword_1);
        $this->db->where('date_created >',$keyword_2);
        $this->db->where('is_marketer_needed','yes');

        $this->db->order_by('id','desc');
        $this->db->limit($per_page,$offset);

        $query		=$this->db->get('propery');
		if($query->num_rows() > 0){

            return $query->result_array();
		}

		return $this->Admin_db->alert_callbark('danger','No Search Term Found!');
    }


    public function count_filter_date($keyword_1, $keyword_2){

        $keyword_1	=date('d-m-Y H:i:sa',strtotime($keyword_1));
        $keyword_2	=date('d-m-Y H:i:sa',strtotime($keyword_2));
        
        $this->db->where('date_created <',$keyword_1);
        $this->db->where('date_created >',$keyword_2);
        $this->db->where('is_marketer_needed','yes');
        
        return $this->db->from('propery')->count_all_results();
    }


    public function count_user_refered($user_id, $props_id){
        
        $this->db->where('promoter_id',$user_id);
        $this->db->where('props_id',$props_id);
        return $this->db->from('promoter_refered')->count_all_results();
    }

    
    public function get_user_refered($user_id, $props_id){

        $this->db->where('promoter_id',$user_id);
        $this->db->where('props_id',$props_id);
        
        $query      =$this->db->get('promoter_refered');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return false;
        
    }

    public function check_if_already_promoting($user_id, $props_id){
        $this->db->where('user_id',$user_id);
        $this->db->where('props_id',$props_id);
        $query      =$this->db->get('promoter');
        if($query->num_rows() > 0){
            return true;
        }
        return false;
    }

        
    public function count_my_downline_with_props_id($user_id,$props_id){

        $this->db->where('promoter_id',$user_id);   
        $this->db->where('props_id',$props_id);   
        return $this->db->from('promoter_refered')
            ->count_all_results();
    }

    public function get_url_code($user_id, $props_id){
        $this->db->where('user_id',$user_id);
        $this->db->where('props_id', $props_id);

        $query      = $this->db->get('promoter');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['url_code'];
            }
        }
        return false;
    }



}