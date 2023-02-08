<?php
class Connection_db extends My_Model{
    public function __construct(){
        parent::__construct();
    }


   public function get_connection_by_user_id($agent_id,$offset,$per_page){
        $this->db->where('user_id',$agent_id);
        $this->db->or_where('agent_id',$agent_id);

        $this->db->limit($per_page,$offset);
        $query  =$this->db->get('connection');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return false;
   }

   	public function count_connection_by_user_id($agent_id){
		return $this->db->from('connection')->where('user_id',$agent_id)->or_where('agent_id',$agent_id)->count_all_results();
	}

   	public function count_all_connection(){
		return $this->db->from('connection')->count_all_results();
	}


   public function get_connection_by_user_id_2($agent_id){
        $this->db->where('user_id',$agent_id);
        $this->db->or_where('agent_id',$agent_id);

        $query  =$this->db->get('connection');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return false;
   }

   public function insert_into_connection_tbl($user_id,$agent_id,$props_id){
        $data       = array('user_id'=>$user_id,
                            'agent_id'=>$agent_id,
                            'prop_id' =>$props_id,
                            'date_created'=> date('Y-m-d H:i:s'),
                            'time'=>time(),
                        );
        $this->db->set($data);
        $this->db->insert('connection');
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
   }
   
    public function checkIfUserExistInConnection($user_id,$agent_id,$props_id)
    {
        $this->db->where('user_id',$user_id);
        $this->db->where('agent_id',$agent_id);
        $this->db->where('prop_id',$props_id);

        $query  =$this->db->get('connection');
        if($query->num_rows() > 0){
            return true;
        }
        return false;
    }

   

   public function delete_alert($id){
        $this->db->where('id',$id);
        $this->db->delete('connection');
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
   }
}