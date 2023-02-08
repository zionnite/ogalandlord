<?php
class Wallet_db extends My_Model{
    public $user_status;
    public $admin_status;

    public function __construct(){
        parent::__construct();

        $this->user_status         	=$this->session->userdata('status');
	    $this->admin_status			= $this->session->userdata('admin_status');
    }


   public function get_user_wallet($user_id){

        if($this->user_status == 'user'){

            $this->db->where('user_id',$user_id);
        }else{

            $this->db->where('agent_id',$user_id);
        }
        

        $query      = $this->db->get('wallet');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return false;
    }

    public function count_user_wallet($user_id){
        
        if($this->user_status == 'user'){

            $this->db->where('user_id',$user_id);
        }else{

            $this->db->where('agent_id',$user_id);
        }
            
        return $this->db->from('wallet')
            ->count_all_results();
    }

    public function get_this_wallet_prop_amount($props_id,$agent_id,$user_id){
        $this->db->where('user_id',$user_id);
        $this->db->where('props_id',$props_id);
        $this->db->where('agent_id',$agent_id);


        $query      =$this->db->get('wallet');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['amount'];
            }
        }
        return false;
    }

    public function add_wallet($user_id,$agent_id,$props_id,$v_amount){

        $amount     = $v_amount/100;
        $data       =array('user_id'=>$user_id,
                           'agent_id'=>$agent_id,
                           'props_id'=>$props_id,
                           'amount' => $amount,
                           'full_date'  => date('Y-m-d H:i:s'),
                           'month'      => date('m'),
                           'day'        => date('d'),
                           'year'       => date('Y'),
                           'time'       => time(),
                           'trans_type' => 'deposit',

                        );

        $this->db->set($data);
        $this->db->insert('wallet');
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
    }

    public function get_user_current_balance($user_id){
        return $this->Users_db->get_user_current_balance($user_id);
    }

    public function get_user_total_earning($user_id){
        return $this->Users_db->get_user_total_earning($user_id);
    }


    public function fund_current_balance($user_id,$amount){

        $current_balance    = $this->get_user_current_balance($user_id);
        $new_amount         = $current_balance + $amount;

        $data   = array('current_balance' => $new_amount);
        $this->db->set($data);
        $this->db->where('id',$user_id);
        $this->db->update('users');
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
    }

    


    public function fund_total_earning($user_id,$amount){

        $current_balance    = $this->get_user_total_earning($user_id);
        $new_amount         = $current_balance + $amount;

        
        $data   = array('total_earning' => $new_amount);
        $this->db->set($data);
        $this->db->where('id',$user_id);
        $this->db->update('users');
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
    }


    //site wallet and issurance
    public function get_site_total_earning(){
        return $this->Action->get_site_total_earning();
    }

    public function get_site_id(){
        return $this->Action->get_site_id();
    }

    public function fund_site_balance($amount){

        $id                 = $this->get_site_id();
        $current_balance    = $this->get_site_total_earning();
        $new_amount         = $current_balance + $amount;

        $data   = array('site_earning' => $new_amount);
        $this->db->set($data);
        $this->db->where('id',$id);
        $this->db->update('site_setting');
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
    }


    public function get_insurance_total_earning(){
        return $this->Action->get_insurance_total_earning();
    }
    public function fund_insurance_earning($amount){

        $id                 = $this->get_site_id();
        $current_balance    = $this->get_insurance_total_earning();
        $new_amount         = $current_balance + $amount;

        $data   = array('insurance_earning' => $new_amount);
        $this->db->set($data);
        $this->db->where('id',$id);
        $this->db->update('site_setting');
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
    }

    public function update_wallet_isPay_status($user_id,$props_id,$agent_id){
        $data       =array('is_pay' => 'yes');
        $this->db->set($data);

        $this->db->where('user_id',$user_id);
        $this->db->where('agent_id',$agent_id);
        $this->db->where('props_id',$props_id);
        $this->db->where('is_pay','no');

        $this->db->update('wallet');
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
    }

    public function check_if_isPay($user_id,$props_id,$agent_id){
        $this->db->where('user_id',$user_id);
        $this->db->where('agent_id',$agent_id);
        $this->db->where('props_id',$props_id);
        // $this->db->where('trans_status','pending');
        $this->db->where('is_pay','yes');

        $query      =$this->db->get('wallet');
        if($query->num_rows() > 0){
            return true;
        }
        return false;
    }

    public function check_if_prop_id_exist($user_id,$props_id){
        $this->db->where('user_id',$user_id);
        $this->db->where('props_id',$props_id);

        $query      =$this->db->get('wallet');
        if($query->num_rows() > 0){
            return true;
        }
        return false;
    }

    public function check_if_user_can_pull_out($user_id,$props_id,$agent_id){
        $this->db->where('user_id',$user_id);
        $this->db->where('agent_id',$agent_id);
        $this->db->where('props_id',$props_id);
        $this->db->where('trans_type','deposit');
        $this->db->where('trans_status','success');

        $query      =$this->db->get('wallet');
        if($query->num_rows() > 0){
            return true;
        }
        return false;
    }
    public function check_if_isRequested($user_id,$props_id,$agent_id){
        $this->db->where('user_id',$user_id);
        $this->db->where('agent_id',$agent_id);
        $this->db->where('props_id',$props_id);
        $this->db->where('is_requested','yes');

        // $this->db->where('trans_type','deposit');
        // $this->db->where('trans_status','success');

        $query      =$this->db->get('wallet');
        if($query->num_rows() > 0){
            return true;
        }
        return false;
    }


    public function update_wallet_isRequested_status($user_id,$props_id,$agent_id){
        $data       =array('is_requested' => 'yes','trans_type'=>'withdraw','trans_status'=>'pending');
        $this->db->set($data);

        $this->db->where('user_id',$user_id);
        $this->db->where('agent_id',$agent_id);
        $this->db->where('props_id',$props_id);
        $this->db->where('is_requested','no');

        $this->db->update('wallet');
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
    }

    /**
     * Webhook Activities
     */

    public function update_wallet_charge_success($user_id,$agent_id,$props_id){
        $data       =array('trans_status' => 'success');
        $this->db->set($data);

        $this->db->where('user_id',$user_id);
        $this->db->where('agent_id',$agent_id);
        $this->db->where('props_id',$props_id);
        $this->db->where('trans_type','deposit');
        $this->db->where('trans_status','pending');

        $this->db->update('wallet');
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
    }

    public function add_to_site_earning($user_id,$agent_id,$props_id){
        $get_referal_com        	= $this->Action->get_referal_com();
		$get_office_com        		= $this->Action->get_agent_com();
		$get_insurance_com        	= $this->Action->get_insurance_com();

        //total_amount
        
		$total_amount            	= $this->Admin_db->get_props_amount_by_id($props_id);
		$office_perc			 	= ($get_office_com/100) * $total_amount;

		//inssurance percent
		$insurance_perc				= ($get_insurance_com/100) * $office_perc;

		//referal Percent
		$referal_perc 				= ($get_referal_com/100) * $office_perc;

        $check_if_user_was_refered 	=$this->Users_db->checkIfReferred($user_id);
        if($check_if_user_was_refered){

            $new_office_percent			= $office_perc - ($insurance_perc+$referal_perc);
        }else{
            $new_office_percent			= $office_perc - $insurance_perc;
        }

        $this->fund_site_balance($new_office_percent);
    }

    public function update_user_wallet_pullout_success($sender_id,$props_id){
        $data      = array('trans_status'=>'success');
        $this->db->set($data);

        $this->db->where('user_id',$sender_id);
        $this->db->where('props_id',$props_id);
        $this->db->where('trans_type','withdraw');
        $this->db->where('trans_status','pending');

        $this->db->update('wallet');
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
    }

    public function update_wallet_transfer_failed($sender_id,$props_id){
        $data      = array('trans_status'=>'failed','is_pay'=>'no');
        $this->db->set($data);

        $this->db->where('user_id',$sender_id);
        $this->db->where('props_id',$props_id);
        $this->db->where('trans_type','complete_withdraw');
        $this->db->where('trans_status','pending');

        $this->db->update('wallet');
        if($this->db->affected_rows() > 0){

            $get_agent_com        	= $this->Action->get_agent_com();
            $props_amount           = $this->Admin_db->get_props_amount_by_id($props_id);
            $commission		        =  ($get_agent_com/100) * $props_amount;
            $new_amount		        =	$props_amount + $commission;
            $this->fund_current_balance($sender_id,$new_amount);
            return true;
        }
        return false;
    }

    public function update_user_wallet_pullout_failed($sender_id,$props_id){
        $data      = array('trans_status'=>'failed','is_requested'=>'no');
        $this->db->set($data);

        $this->db->where('user_id',$sender_id);
        $this->db->where('props_id',$props_id);
        $this->db->where('trans_type','withdraw');
        $this->db->where('trans_status','pending');

        $this->db->update('wallet');
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
    }

    public function update_user_wallet_pullout_reversed($sender_id,$props_id){
        $data      = array('trans_status'=>'refund','is_requested'=>'no');
        $this->db->set($data);

        $this->db->where('user_id',$sender_id);
        $this->db->where('props_id',$props_id);
        $this->db->where('trans_type','withdraw');
        $this->db->where('trans_status','pending');

        $this->db->update('wallet');
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
    }

     /**
      * End Webhook Activities
      */

}