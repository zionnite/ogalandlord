<?php
class Request_db extends My_Model{
    public function __construct(){
        parent::__construct();
    }


    public function count_unread_request($agent_id){

        if(!$this->session->userdata('admin_status')){
            $this->db->where('agent_id',$agent_id);
            $this->db->where('agent_read_status','unread');
            $this->db->where('status !=','rejected');
        }else if($this->session->userdata('admin_status')){
            $this->db->where('status !=','rejected');
            $this->db->where('admin_read_status','unread');
            
        }

		return $this->db->from('request')->count_all_results();
	}

    public function count_request_by_user_id($agent_id){

        if(!$this->session->userdata('admin_status')){
            $this->db->where('user_id',$agent_id);
            $this->db->or_where('agent_id',$agent_id);
        }else if($this->session->userdata('admin_status')){
            $this->db->where('status !=','rejected');
        }

		return $this->db->from('request')->count_all_results();
	}

      public function count_request_by_user_id_2($user_id,$admin_status){
        
        if($admin_status == 'false'){
            $this->db->where('user_id',$user_id);
            $this->db->or_where('agent_id',$user_id);

        }else if($admin_status){

            $this->db->where('status !=','rejected');
        }

		return $this->db->from('request')->count_all_results();
    }

   public function get_request_by_user_id($agent_id, $offset, $per_page){

        if(!$this->session->userdata('admin_status')){
            $this->db->where('user_id',$agent_id);
            $this->db->or_where('agent_id',$agent_id);
        }else if($this->session->userdata('admin_status')){
            $this->db->where('status !=','rejected');
        }

        $this->db->limit($per_page,$offset);
        $query  =$this->db->get('request');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return false;
   }

    public function check_if_user_n_props_exist_in_request($user_id,$agent_id,$props_id){
        $this->db->where('user_id',$user_id);
        $this->db->where('agent_id',$agent_id);
        $this->db->where('props_id',$props_id);

        $this->db->get('request');
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
    }

   public function insert_into_request_tbl($user_id,$agent_id,$props_id,$title,$desc){
        
        $data       = array('user_id'=>$user_id,
                            'agent_id'=>$agent_id,
                            'props_id'=>$props_id,
                            'title'=>$title,
                            'description'=>$desc,
                            'date_created'=> date('Y-m-d H:i:s'),
                            'time'=>time(),
                        );
        $this->db->set($data);
        $this->db->insert('request');
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
   }

   public function update_request_status($id,$status){
        $data       = array('status'=> $status);
        $this->db->set($data);
        $this->db->where('id',$id);
        $this->db->update('request');
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
   }

   public function update_read_status($id, $type){
        if($type == 'user'){
            $data       = array('user_read_status'=> 'read');

        }else if($type == 'agent'){
            $data       = array('agent_read_status'=> 'read');

        }else if ($type == 'admin'){

            $data       = array('admin_read_status'=> 'read');
        }
        $this->db->set($data);
        $this->db->where('id',$id);
        $this->db->update('request');
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
   }


    public function delete_request($id){
        $this->db->where('id',$id);
        $this->db->delete('request');
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
    }


   public function set_request_status($id, $type, $dis_user_id,$agent_id,$props_id){
        if($type == 'review'){
            $data       = array('status'=> 'review');

        }else if($type == 'confirm'){
            $data       = array('status'=> 'confirm');

        }else if ($type == 'rejected'){

            $data       = array('status'=> 'rejected');
        
        }else if ($type == 'done'){

            $data       = array('status'=> 'done');
        }
        $this->db->set($data);
        $this->db->where('id',$id);
        $this->db->update('request');
        if($this->db->affected_rows() > 0){

            return true;
        }
        return false;
   }
}