<?php
class MUser_db extends My_Model{
    public function __construct(){
        parent::__construct();
    }

     public function getAllMuser(){
        $this->db->where('status','m_user');
        $query   = $this->db->get('users');
        if($query->num_rows() > 0){
            return $query->result_array();
        } 
        return false;
    }

     public function getDisMuserDownline($user_id){
        $this->db->where('m_ref', $user_id);
        $this->db->where('status','m_user');
        $query   = $this->db->get('users');
        if($query->num_rows() > 0){
            return $query->result_array();
        } 
        return false;
    }


    public function count_my_downline($user_id){
        $checker    =$this->Users_db->get_user_status($user_id);
        if($checker == 'm_user'){
            $this->db->where('m_ref',$user_id);
        }else{
            $this->db->where('status','m_user');
        }
        return $this->db->from('users')->count_all_results();
    }
    public function get_my_downline($user_id, $offset, $per_page){

        $checker    =$this->Users_db->get_user_status($user_id);
        if($checker == 'm_user'){
            $this->db->where('m_ref',$user_id);
        }else{
            $this->db->where('status','m_user');
        }

        $this->db->limit($per_page,$offset);
        $query  =$this->db->get('users');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return false;
    }

    public function dUser($user_id){
        $data       = array();

        
        
        $downId     = $this->getDescendant($user_id);
        if($downId != false){
            $this->dUser($downId);

            $data   = array('id'=>$downId);
        }else{
            $data   = array('id'=>$downId);
        }

        print_r($data);
    }

    public function getDescendant($user_id){
        $this->db->where('m_ref', $user_id);
        $this->db->where('status','m_user');
        $this->db->order_by('id','asc');
        $query   = $this->db->get('users');
       
        $i=0; 
        
        $desend = array();
        if($query->num_rows() > 0){
            // foreach(array_reverse($query->result_array()) as $row){
            foreach($query->result_array() as $row){
                $id         = $row['id'];
                $desend = array('id'=>$id);
                
                $this->getDescendant($id);                
            }
        } 
        return $desend;
    }

    public function getAncestory($user_id, $tree, $max_depth = 1000, $depth = 1) {

        $this->db->where('id', $user_id);
        $this->db->where('status','m_user');
        $query = $this->db->get('users');
               
        if ($query->num_rows() > 0) {
            $user = $query->result_array()[0];

            if (isset($user['m_ref']) && $depth <= $max_depth && $user['m_ref'] !='') {
                $user_id = $user['m_ref'];

                array_push($tree, $user_id);
                // this is why. either pass by reference &$tree or update the object each time it runs
                $tree = $this->getAncestory($user_id, $tree, $max_depth, $depth + 1);
            }
        } 

        return $tree;
    }

    public function getAncestoryPayable($user_id) {
        $results = [];
        $ancestors = $this->getAncestory($user_id, [], 3);

        for ($i = 0; $i < 3 && $i < count($ancestors); $i++) {
            switch($i +  1) {
                case 1:
                    array_push($results, ['id'=>$ancestors[$i], 'percentage'=> 3.5]);
                    break;
                case 2:
                    array_push($results, ['id'=>$ancestors[$i], 'percentage'=> 1.5]);
                    break;
                case 3:
                    array_push($results, ['id'=>$ancestors[$i], 'percentage'=> 0.7]);
                    break;
                case 4:
                    array_push($results, ['id'=>$ancestors[$i], 'percentage'=> 0.3]);
                    break;
            }
        }

        return $results;
    }


    //Start API
    public function getMPayableBalance($user_id){
        $this->db->where('id',$user_id);
        $query      = $this->db->get('users');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['m_payable_balance'];
            }
        }
        return 0;
    }
    
    public function getMTotalBalance($user_id){
        $this->db->where('id',$user_id);
        $query      = $this->db->get('users');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['m_total_balance'];
            }
        }
        return 0;
    }

    public function cout_m_user(){
        $this->db->where('status','m_user');
        return $this->db->from('users')->count_all_results();
    }

    public function countDirectDownline($user_id){
        $this->db->where('m_ref',$user_id);
        return $this->db->from('users')->count_all_results();
    }


    public function check_if_i_subscribe($user_id,$plan_code){
        $this->db->where('user_id',$user_id);
        $this->db->where('plan_code',$plan_code);

        $query   =$this->db->get('subscriber_list');
        if($query->num_rows() > 0){
            return true;
        }
        return false;
    }

    public function get_plan_image_by_plan_code($plan_code){
        $query      = $this->db->get('subscription_plan');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['plan_image'];
            }
        }
        return false;
    }

    public function totalAmountEarned($user_id){
        $query      = $this->db->get('users');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['m_total_balance'];
            }
        }
        return 0;
    }

    public function get_site_mlm_payable_balance(){
        
        $query      = $this->db->get('site_setting');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['site_mlm_payable_balance'];
            }
        }
        return 0;
    }

    public function get_site_mlm_total_balance(){
        
        $query      = $this->db->get('site_setting');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['site_mlm_total_balance'];
            }
        }
        return 0;
    }


    public function get_site_id(){
        $query      = $this->db->get('site_setting');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['id'];
            }
        }
        return false;
    }

    public function update_site_mlm_payable_balance($amount){
        $site_id            = $this->get_site_id();
        $current_amount     = $this->get_site_mlm_payable_balance();
        $new_total_amount   = $amount + $current_amount;
        $data   = array('site_mlm_payable_balance' => $new_total_amount);
        $this->db->set($data);
        $this->db->where('id',$site_id);
        $this->db->update('site_setting');
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
    }

    public function update_site_mlm_total_balance($amount){
        $site_id            = $this->get_site_id();
        
        $current_amount     = $this->get_site_mlm_total_balance();
        $new_total_amount   = $amount + $current_amount;
        $data   = array('site_mlm_total_balance' => $new_total_amount);
        $this->db->set($data);
        $this->db->where('id',$site_id);
        $this->db->update('site_setting');
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
    }



    //Pay User incentiveness
    public function update_user_payable_balance($user_id, $amount){
        $user_payable_balance           = $this->getMPayableBalance($user_id);
        $new_payable_amount             = $user_payable_balance+$amount;
        $data       = array('m_payable_balance'  => $new_payable_amount);
        $this->db->set($data);
        $this->db->where('id', $user_id);
        $this->update('users');
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
    }
    
    public function pay_user($decendant_id, $user_id, $amount, $ancentory_tree){
        $count        = count($ancentory_tree);
        $array          ='';
        $trace_tree          ='';
        foreach($ancentory_tree as $key){
            if($count   == 1){
                $trace_tree  =$key;
            }else{
                
                $array  .=$key.',';
                $trace_tree  =   substr($array, 0, -1);
            }
        }
        $user_payable_balance           = $this->getMPayableBalance($user_id);
        $user_total_balance             = $this->getMTotalBalance($user_id);

        $new_payable_amount             = $amount + $user_payable_balance;
        $new_total_amount               = $amount + $user_total_balance;

        $data   = array('m_payable_balance' =>$new_payable_amount,'m_total_balance' => $new_total_amount);
        $this->db->set($data);
        $this->db->where('id', $user_id);
        $this->db->update('users');
        if($this->db->affected_rows() > 0){
            
            $trans_type     = 'deposit';
            $trans_status   = 'success';
            $trans_desc     = 'You account has been funded from your decendant subscription payment plan';
            $this->add_to_mlm_transaction_history($user_id,$amount, $trans_type, $trans_desc, $trans_status, $trace_tree, $decendant_id);
            return true;
        }
        return false;

    }

    public function pay_site($amount, $subscriber_id){

        $trace_tree     = $subscriber_id;
        $trans_type     = 'deposit';
        $trans_status   = 'success';
        $trans_desc     = 'A Subscriber subscription went through';

        $this->update_site_mlm_payable_balance($amount);
        $this->update_site_mlm_total_balance($amount);
        
        $this->add_to_mlm_transaction_history('admin', $amount, $trans_type, $trans_desc, $trans_status, $trace_tree, $subscriber_id);
    }

    public function add_to_mlm_transaction_history($user_id, $amount, $trans_type, $trans_desc, $trans_status, $trace_tree, $decendant_id){
        $data           = array('user_id'       =>  $user_id,
                                'amount'        =>  $amount,
                                'trans_type'    =>  $trans_type,
                                'description'   =>  $trans_desc,
                                'status'        =>  $trans_status,
                                'date_created'  =>  date('Y-m-d H:i:sa'),
                                'time'          =>  time(),
                                'day'           =>  date('d'),
                                'month'         =>  date('M'),
                                'year'          =>  date('Y'),
                                'trace_tree'    =>  $trace_tree,
                                'decendant_id'  =>  $decendant_id,
                        );
        $this->db->set($data);
        $this->db->insert('mlm_transaction');
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;

    }

    public function add_to_mlm_transaction_history_2($user_id, $amount, $trans_type, $trans_desc, $trans_status){
        $data           = array('user_id'       =>  $user_id,
                                'amount'        =>  $amount,
                                'trans_type'    =>  $trans_type,
                                'description'   =>  $trans_desc,
                                'status'        =>  $trans_status,
                                'date_created'  =>  date('Y-m-d H:i:sa'),
                                'time'          =>  time(),
                                'day'           =>  date('d'),
                                'month'         =>  date('M'),
                                'year'          =>  date('Y'),
                        );
        $this->db->set($data);
        $this->db->insert('mlm_transaction');
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;

    }


    public function count_transaction($user_id){

        $checker    =$this->Users_db->get_user_status($user_id);
        if($checker == 'admin' || $checker == 'super_admin'){
            $this->db->where('user_id','admin');
        }else{
            $this->db->where('user_id',$user_id);
        }
        return $this->db->from('mlm_transaction')->count_all_results();
    }
    public function get_transaction($user_id, $offset, $per_page){
        
        $checker    =$this->Users_db->get_user_status($user_id);
        if($checker == 'admin' || $checker == 'super_admin'){
            $this->db->where('user_id','admin');
        }else{
            $this->db->where('user_id',$user_id);
        }
        $this->db->limit($per_page,$offset);
        $query  =$this->db->get('mlm_transaction');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return false;
    }
    public function get_transaction_limit_20($user_id){
        
        $checker    =$this->Users_db->get_user_status($user_id);
        if($checker == 'admin' || $checker == 'super_admin'){
            $this->db->where('user_id','admin');
        }else{
            $this->db->where('user_id',$user_id);
        }
        $this->db->limit(20);
        $query  =$this->db->get('mlm_transaction');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return false;
    }

    //CRON JOB
    public function get_user_limit_by_500(){
        
        $this->db->limit(500);
        $query  =$this->db->get('users');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return false;
    }


    public function revenue_amount($user_id, $plan_id){
        $this->db->where('user_id',$user_id);
        $this->db->where('plan_id',$plan_id);
        $this->db->where('status','success');
	
		$this->db->select_sum('amount');
		$query		=$this->db->get('subscription');
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				return $row['amount'];
			}
		}
		return 0;
    }

    public function get_user_plan_id_subscribe($user_id){
        $this->db->where('user_id', $user_id);
        $this->db->where('status', 'active');
        $query      = $this->db->get('subscriber_list');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['plan_id'];
            }
        }
        return false;
    }

    public function get_user_plan_code_subscribe($user_id){
        $this->db->where('user_id', $user_id);
        $this->db->where('status', 'active');
        $query      = $this->db->get('subscriber_list');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['plan_code'];
            }
        }
        return false;
    }

    public function get_plan_expected_amount($plan_id){
        $this->db->where('plan_id', $plan_id);
        $query      = $this->db->get('subscription_plan');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['expected_amount'];
            }
        }
        return false;
    }

    public function get_user_subscription_plan_type($plan_id){
        $this->db->where('plan_id', $plan_id);
        $query      = $this->db->get('subscription_plan');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['plan_type'];
            }
        }
        return false;
    }

    public function get_user_subscription_plan_interval($plan_id){
        $this->db->where('plan_id', $plan_id);
        $query      = $this->db->get('subscription_plan');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['plan_interval'];
            }
        }
        return false;
    }

    public function get_user_subscription_plan_amount($plan_id){
        $this->db->where('plan_id', $plan_id);
        $query      = $this->db->get('subscription_plan');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['plan_amount'];
            }
        }
        return false;
    }

    public function get_user_subscription_plan_limit($plan_id){
        $this->db->where('plan_id', $plan_id);
        $query      = $this->db->get('subscription_plan');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['plan_limit'];
            }
        }
        return false;
    }

    public function give_point($user_id,$downline_id, $point, $plan_id){
       
        $data                   = array(
                                        'user_id'       =>  $user_id,
                                        'downline_id'   =>  $downline_id,
                                        'point'         =>  $point,
                                        'plan_list_id'  =>  $plan_id,
                                        'time'          =>  time(),


                                );
        $this->db->set($data);
        $this->db->insert('my_point');
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
    }
    
    public function check_ifDownlineExistInPoint($user_id, $downline_id){
        $this->db->where('user_id',$user_id);
        $this->db->where('downline_id',$downline_id);

        $query      = $this->db->get('my_point');
        if($query->num_rows() > 0){
            return true;
        }
        return false;

    }
}