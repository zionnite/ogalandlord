<?php
class Alert_db extends My_Model{
    public function __construct(){
        parent::__construct();
    }


   public function get_alert_by_user_id($agent_id){
        $this->db->where('user_id',$agent_id);
        $query  =$this->db->get('alert');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return false;
   }

   public function get_unread_alert_by_user_id($agent_id){
        $this->db->where('user_id',$agent_id);
        $this->db->where('status','unread');
        $query  =$this->db->get('alert');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return false;
   }

   public function insert_into_alert_tbl($user_id,$sender_id,$desc, $is_agent='no'){
        $data       = array('user_id'=>$user_id,
                            'sender_id'=>$sender_id,
                            'description'=>$desc,
                            'date_created'=> date('Y-m-d H:i:s'),
                            'time'=>time(),
                            'is_agent' =>$is_agent, // is it agent that is sending this alert
                        );
        $this->db->set($data);
        $this->db->insert('alert');
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
   }

   public function update_read_status($id){
        $data       = array('status'=> 'read');
        $this->db->set($data);
        $this->db->where('id',$id);
        $this->db->update('alert');
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
   }

   public function count_my_alert($user_id){
        return $this->db->from('alert')->where('user_id',$user_id)->where('status','unread')->count_all_results();
   }

   public function delete_alert($id){
        $this->db->where('id',$id);
        $this->db->delete('alert');
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
   }
}