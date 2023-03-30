<?php
class Transaction_db extends My_Model{
    public function __construct(){
        parent::__construct();
    }
    


   
   public function count_transaction($user_id){
        $admin_status			= $this->session->userdata('admin_status');
        if(!$admin_status){
            $this->db->where('user_id',$user_id);
        }else{
            $this->db->or_where('user_id','admin');
        }

        return $this->db->from('transaction')->count_all_results();
   }

   
   public function count_all_transaction(){
        return $this->db->from('transaction')->count_all_results();
   }

    public function get_all_transaction($user_id, $offset, $per_page){
        $admin_status			= $this->session->userdata('admin_status');
        if(!$admin_status){
            $this->db->where('user_id',$user_id);
            // $this->db->or_where('sender',$user_id);
        }else{
            $this->db->or_where('user_id','admin');
        }

        $this->db->limit($per_page,$offset);
        $query  =$this->db->get('transaction');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return false;
    }

    public function get_transaction_limit_by_10($user_id){
        $admin_status			= $this->session->userdata('admin_status');
        if(!$admin_status){
            $this->db->where('user_id',$user_id);
        }else{
            $this->db->or_where('user_id','admin');
        }

        $this->db->limit(10);
        $this->db->order_by('id','desc');
        $query  =$this->db->get('transaction');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return false;
    }

    public function get_user_current_balance($user_id){
        return $this->Users_db->get_user_current_balance($user_id);
    }
    public function add_transaction($v_user_id, $sender, $v_props_id,$v_agent_id,$v_trans_type, $v_phone, $v_email, $v_name, 
                            $v_id, $v_amount, $v_ref,$desc, $status){

        $current_balance    = $this->get_user_current_balance($v_user_id);

        $amount             = $v_amount/100;

        $data       =   array('user_id'         => $v_user_id, //Reciever
                            'sender'            => $sender,
                            'props_id'          => $v_props_id,
                            'amount'            => $amount,
                            'trans_type'        => $v_trans_type,
                            'balance'           => $current_balance,
                            'description'       => $desc,
                            'ref_no'            => $v_ref,
                            'status'            => $status,
                            'date_created'      => date('Y-m-d H:i:s'),
                            'time'              => time(),
                            'day'               => date('d'),
                            'month'             => date('m'),
                            'year'              => date('Y'),
                        );

        $this->db->set($data);
        $this->db->insert('transaction');
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
    }

    public function add_complete_transaction($user_id, $sender, $props_id, $trans_type, $amount, $ref,$desc, $status){

        $current_balance    = $this->get_user_current_balance($user_id);

        // $amount             = $amount/100;

        $data       =   array('user_id'         => $user_id, //Reciever
                            // 'sender'            => $sender,
                            'props_id'          => $props_id,
                            'amount'            => $amount,
                            'trans_type'        => $trans_type,
                            'balance'           => $current_balance,
                            'description'       => $desc,
                            'ref_no'            => $ref,
                            'status'            => $status,
                            'date_created'      => date('Y-m-d H:i:s'),
                            'time'              => time(),
                            'day'               => date('d'),
                            'month'             => date('m'),
                            'year'              => date('Y'),
                        );

        $this->db->set($data);
        $this->db->insert('transaction');
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
    }

    public function add_site_transaction($user_id, $sender, $props_id, $trans_type, $amount, $ref,$desc, $status){


        // $amount             = $amount/100;

        $data       =   array('user_id'         => $user_id, //Reciever
                            'sender'            => $sender,
                            'props_id'          => $props_id,
                            'amount'            => $amount,
                            'trans_type'        => $trans_type,
                            'description'       => $desc,
                            'ref_no'            => $ref,
                            'status'            => $status,
                            'date_created'      => date('Y-m-d H:i:s'),
                            'time'              => time(),
                            'day'               => date('d'),
                            'month'             => date('m'),
                            'year'              => date('Y'),
                        );

        $this->db->set($data);
        $this->db->insert('transaction');
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
    }
   
   
    public function create_trans_rec($user_id,$props_id,$agent_id){
        $data   = array('sender_id'=>$user_id,'prop_id'=>$props_id,'agent_id'=>$agent_id);
        $this->db->set($data);
        $this->db->insert('transfer_rec');
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
    }

    public function add_to_transaction_rec($rc_code,$props_id,$sender_id,$type,$agent_id){
        
        if($type == 'user_rc'){

            $data   = array('sender_rc'=>$rc_code);

        }else if($type == 'agent_rc'){

            $data   = array('agent_rc'=>$rc_code);

        }else if($type == 'insur_rc'){

           $data   = array('insurance_rc'=>$rc_code);

        }else if($type == 'ref_rc'){

            $data   = array('referal_rc'=>$rc_code);

        }else if($type == 'prom_rc'){
            $data   = array('promoter_rc'=>$rc_code);
        }

        $this->db->set($data);
        $this->db->where('sender_id',$sender_id);
        $this->db->where('agent_id',$agent_id);
        $this->db->where('prop_id',$props_id);

        $this->db->update('transfer_rec');
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
    }

    public function get_sender_rc($sender_id,$agent_id,$props_id){
        $this->db->where('sender_id',$sender_id);
        $this->db->where('agent_id',$agent_id);
        $this->db->where('prop_id',$props_id);

        $query  =$this->db->get('transfer_rec');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['sender_rc'];
            }
        }
        return false;
    }

    public function get_agent_rc($sender_id,$agent_id,$props_id){
        $this->db->where('sender_id',$sender_id);
        $this->db->where('agent_id',$agent_id);
        $this->db->where('prop_id',$props_id);

        $query  =$this->db->get('transfer_rec');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['agent_rc'];
            }
        }
        return false;
    }

    public function get_insurance_rc($sender_id,$agent_id,$props_id){
        $this->db->where('sender_id',$sender_id);
        $this->db->where('agent_id',$agent_id);
        $this->db->where('prop_id',$props_id);

        $query  =$this->db->get('transfer_rec');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['insurance_rc'];
            }
        }
        return false;
    }

    public function get_ref_rc($sender_id,$agent_id,$props_id){
        $this->db->where('sender_id',$sender_id);
        $this->db->where('agent_id',$agent_id);
        $this->db->where('prop_id',$props_id);

        $query  =$this->db->get('transfer_rec');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['referal_rc'];
            }
        }
        return false;
    }

    public function get_promoter_rc($sender_id,$agent_id,$props_id){
        $this->db->where('sender_id',$sender_id);
        $this->db->where('agent_id',$agent_id);
        $this->db->where('prop_id',$props_id);

        $query  =$this->db->get('transfer_rec');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['promoter_rc'];
            }
        }
        return false;
    }

    /**
    * Webhook Activites
    * user_id = reciever
    * 
    */
    
    public function update_transaction_charge_success($user_id,$agent_id,$props_id){

        $data   =array('status'=>'success');
        $this->db->set($data);

        $this->db->where('user_id',$user_id);
        $this->db->where('sender',$user_id);  // come back here
        $this->db->where('props_id',$props_id);
        $this->db->where('trans_type','deposit');
        $this->db->where('status','pending');

        $this->db->update('transaction');
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
    }

    public function update_transaction_transfer_success($sender_id,$props_id, $amount){
        $data   =array('status'=>'success');
        $this->db->set($data);

        $this->db->where('user_id',$sender_id);
        $this->db->where('props_id',$props_id);
        $this->db->where('trans_type','complete_withdraw');
        $this->db->where('status','pending');

        $this->db->update('transaction');
        if($this->db->affected_rows() > 0){
            //update propert status
            $data       = array('prop_status'=>'unavailable');
            $this->db->set($data);
            $this->db->where('id',$props_id);
            $this->db->update('propery');
            
            // $this->Wallet_db->fund_current_balance($sender_id,-$amount);
            return true;
        }
        return false;
    }

    public function update_transaction_transfer_failed($sender_id,$props_id, $amount){
        $data   =array('status'=>'cancel');
        $this->db->set($data);

        $this->db->where('user_id',$sender_id);
        $this->db->where('props_id',$props_id);
        $this->db->where('trans_type','complete_withdraw');
        $this->db->where('status','pending');

        $this->db->update('transaction');
        if($this->db->affected_rows() > 0){
            //::COME HERE for reasoning
            $this->Wallet_db->fund_current_balance($sender_id,$amount);
            return true;
        }
        return false;
    }


    public function update_transaction_transfer_failed_2($sender_id,$props_id, $amount){
        $data   =array('status'=>'cancel');
        $this->db->set($data);

        $this->db->where('user_id',$sender_id);
        $this->db->where('props_id',$props_id);
        $this->db->where('trans_type','complete_withdraw');
        $this->db->where('status','pending');

        $this->db->update('transaction');
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
    }





    public function update_user_pull_out_success($user_id,$props_id){
        $data   =array('status'=>'success');
        $this->db->set($data);

        $this->db->where('user_id',$user_id);
        $this->db->where('props_id',$props_id);
        $this->db->where('trans_type','withdraw');
        $this->db->where('status','pending');
        $this->db->update('transaction');
        if($this->db->affected_rows() > 0){
            // $this->Wallet_db->fund_current_balance($sender_id,$amount);
            return true;
        }
        return false;
    }

    public function update_user_pull_out_failed($user_id,$props_id,$amount){
        $data   =array('status'=>'cancel');
        $this->db->set($data);

        $this->db->where('user_id',$user_id);
        $this->db->where('props_id',$props_id);
        $this->db->where('trans_type','withdraw');
        $this->db->where('status','pending');
        $this->db->update('transaction');
        if($this->db->affected_rows() > 0){
            $this->Wallet_db->fund_current_balance($sender_id,$amount);
            return true;
        }
        return false;
    }

    public function update_user_pull_out_reversed($user_id,$props_id,$amount){
        $data   =array('status'=>'refund');
        $this->db->set($data);

        $this->db->where('user_id',$user_id);
        $this->db->where('props_id',$props_id);
        $this->db->where('trans_type','withdraw');
        $this->db->where('status','pending');
        $this->db->update('transaction');
        if($this->db->affected_rows() > 0){
            $this->Wallet_db->fund_current_balance($sender_id,$amount);
            return true;
        }
        return false;
    }
    /**
    * End Webhook Activities
    */
}