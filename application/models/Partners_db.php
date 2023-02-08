<?php
class Partners_db extends My_Model{
    public function __construct(){
        parent::__construct();
    }


   
    public function get_partners(){

        $this->db->order_by('rand()');
        $query      =$this->db->get('partners');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return false;
    }

    public function delete_partners($id){
        $this->db->where('id',$id);
        $this->db->delete('partners');
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
    }

    public function count_partners(){
        return $this->db->from('partners')->count_all_results();
    }

    public function add_partner_logo($file_name){
        $data       = array('image_name'=>$file_name);
        $this->db->set($data);
        $this->db->insert('partners');
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
    }

   
}