<?php
class Bank_db extends My_Model{
    public function __construct(){
        parent::__construct();
    }


   public function get_list_of_bank(){
        $query      = $this->db->get('list_bank');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return false;
    }

    public function get_bank_name_by_bank_code($bank_code){
        $this->db->where('bank_code',$bank_code);

        $query      =$this->db->get('list_bank');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['bank_name'];
            }
        }
        return false;
    }
}