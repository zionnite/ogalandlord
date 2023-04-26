<?php
class Subscription_db extends My_Model{
    public function __construct(){
        parent::__construct();
    }

    public function add_land_location($location, $file_name){
        $data   = array('location_name'=>$location, 'image_name'=>$file_name);
        $this->db->set($data);
        $this->db->insert('land_location');
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;

        
    }

    public function count_all_land_location(){
		return $this->db->from('land_location')->count_all_results();
	}
    public function get_all_land_location(){
        $query      = $this->db->get('land_location');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return false;
    }

    public function remove_landlocation($id){
        $this->db->where('id',$id);
        $this->db->delete('land_location');
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
    }

    public function get_location_name_by_id($id){
        $this->db->where('id',$id);
        $query      = $this->db->get('land_location');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['location_name'];
            }
        }
        return false;
    }

    public function get_land_image_by_location_id($location){
        $this->db->where('id',$location);
        $query      = $this->db->get('land_location');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['image_name'];
            }
        }
        return 'image.png';
    }
    public function create_subscription_plan($plan_name,$description,$interval,$amount,$invoice_limit,$location, $plan_type, $e_amount){
        $plan_image         = $this->get_land_image_by_location_id($location);

        $location_name      =$this->get_location_name_by_id($location);
        $data    = array('plan_name'        =>$plan_name,
                         'plan_desc'        =>$description,
                         'plan_interval'    =>$interval,
                         'plan_amount'      =>$amount,
                         'plan_limit'       =>$invoice_limit,
                         'location_id'      =>$location,
                         'location_name'    =>$location_name,
                         'plan_type'        =>$plan_type,
                         'plan_image'       =>$plan_image,
                         'expected_amount'       =>$e_amount,
                    );
        $this->db->set($data);
        $this->db->insert('subscription_plan');
        $insert_id = $this->db->insert_id();
        if($this->db->affected_rows() > 0){
            return $insert_id;
        }
        return false;
    }

    public function update_subscription_plan($id, $plan_code, $plan_id){
        $data   = array('plan_id'=>$plan_id,
                        'plan_code'=>$plan_code,
                        'status'=>'active'
                    );
        $this->db->set($data);
        $this->db->where('id',$id);
        $this->db->update('subscription_plan');
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
    }

    public function get_sub_plan_by_id($id){
        $this->db->where('location_id',$id);
        $query      = $this->db->get('subscription_plan');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
             
        return false;

    }

    public function add_subscriber_detail($customer_email,$customer_code, 
        $plan_id, $plan_code,$plan_name,$plan_amount,$plan_interval,
        $auth_bin, $auth_last4, $auth_exp_month, $auth_exp_year, $auth_card_type){

        $user_id    = $this->Users_db->get_user_id_by_email($customer_email);

        if($user_id !=null){
            //check if plan & user_id already exist
            $checker    = $this->check_if_plan_code_and_user_id_exist($plan_code, $user_id);


            if(!$checker){
                $plan_limit         = $this->get_plan_limit_by_plan_id($plan_code);
            
                if($plan_limit  == '1'){
                    $plan_interval  = 'OutRight';
                }

                $data       = array(
                                'user_id'           =>  $user_id,
                                'email'             =>  $customer_email,
                                'customer_code'     =>  $customer_code,
                                //subscription_code =>  $subcode,
                                'plan_id'           =>  $plan_id,
                                'plan_code'         =>  $plan_code,
                                'plan_name'         =>  $plan_name,
                                'plan_amount'       =>  $plan_amount,
                                'plan_interval'     =>  $plan_interval,
                                'auth_bin'          =>  $auth_bin,
                                'auth_last4'        =>  $auth_last4,
                                'auth_exp_month'    =>  $auth_exp_month,
                                'auth_exp_year'     =>  $auth_exp_year,
                                'auth_card_type'    =>  $auth_card_type,
                                'sub_start_date'    =>  date('Y-m-d H:i:s'),
                                
                );

                $this->db->set($data);
                $this->db->insert('subscriber_list');
                if($this->db->affected_rows() > 0){
                    return 'true';
                }
                return 'false';

            }else{

                $plan_limit         = $this->get_plan_limit_by_plan_id($plan_code);
            
                if($plan_limit  == '1'){
                    $plan_interval  = 'OutRight';
                }

                $data       = array(
                                // 'user_id'           =>  $user_id,
                                'email'             =>  $customer_email,
                                'customer_code'     =>  $customer_code,
                                //subscription_code =>  $subcode,
                                'plan_id'           =>  $plan_id,
                                // 'plan_code'         =>  $plan_code,
                                'plan_name'         =>  $plan_name,
                                'plan_amount'       =>  $plan_amount,
                                'plan_interval'     =>  $plan_interval,
                                'auth_bin'          =>  $auth_bin,
                                'auth_last4'        =>  $auth_last4,
                                'auth_exp_month'    =>  $auth_exp_month,
                                'auth_exp_year'     =>  $auth_exp_year,
                                'auth_card_type'    =>  $auth_card_type,
                                'sub_start_date'    =>  date('Y-m-d H:i:s'),
                                
                );

                $this->db->set($data);
                $this->db->where('user_id',$user_id);
                $this->db->where('plan_code',$plan_code);
                $this->db->update('subscriber_list');
                if($this->db->affected_rows() > 0){
                    return 'true';
                }
                return 'false';
            }
            

            //
        }
        return 'user_not_exist';
        
    }


    public function check_if_plan_code_and_user_id_exist($plan_code,$user_id){
        $this->db->where('plan_code',$plan_code);
        $this->db->where('user_id',$user_id);
        $query      =$this->db->get('subscriber_list');
        if($query->num_rows() > 0){
            return true;
        }
        return false;
    }

    public function get_plan_limit_by_plan_id($plan_code){
        $this->db->where('plan_code',$plan_code);
        $query      =$this->db->get('subscription_plan');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['plan_limit'];
            }
        }
        return '0';
    }

    public function update_subscriber_detail($customer_email, $subscription_code, $plan_code, $plan_interval, $email_token){

        $plan_limit     = $this->get_plan_limit_by_plan_id($plan_code);
        if($plan_limit > '1'){
            if($plan_interval   == 'hourly'){

                $end_date   = $this->date_me($plan_limit,'hours');
            }
            else if($plan_interval  == 'daily'){
                $end_date   = $this->date_me($plan_limit,'days');
            }
            else if($plan_interval  == 'weekly'){
                $end_date   = $this->date_me($plan_limit,'weeks');
            }
            else if($plan_interval  == 'monthly'){
                $end_date   = $this->date_me($plan_limit,'months');
            }
            else if($plan_interval == 'annually'){
                $end_date   = $this->date_me($plan_limit,'years');
            }

        }else{
             $end_date   = date('Y-m-d H:i:s');
        }

        

        $data       = array(
                        'subscription_code'=>$subscription_code,
                        'sub_end_date'=> $end_date,
                        'status'        => 'active',
                        'email_token'   => $email_token,
                    );
        $this->db->set($data);
        $this->db->where('email',$customer_email);
        $this->db->where('plan_code',$plan_code);
        $this->db->update('subscriber_list');
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
    }

    public function date_me($number=NULL, $type){

        return date('Y-m-d H:i:s', strtotime("+".$number." ".$type));

    }

    public function insert_subscription(
        $plan_id, $plan_code, $plan_name, $plan_amount, $plan_interval,
        $customer_code, $customer_email, 
        $auth_bin, $auth_last4, $auth_exp_month, $auth_exp_year, $auth_card_type, $status){

        $user_id    = $this->Users_db->get_user_id_by_email($customer_email);

        $data   = array(
            'user_id'                   => $user_id,
            'customer_email'            =>  $customer_email,
            'customer_code'             =>  $customer_code,
            'plan_id'                   =>  $plan_id,
            'plan_code'                 =>  $plan_code,
            'amount'                    =>  $plan_amount,
            'paid_date'                 =>  date('Y-m-d H:i:sa'),
            'day'                       =>  date('d'),
            'month'                     =>  date('M'),
            'year'                      =>  date('Y'),
            'time'                      =>  time(),
            'status'                    =>  $status,
        );

        $this->db->set($data);
        $this->db->insert('subscription');
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;

    }

    public function completed_subscriber($customer_code,$customer_email,$plan_id,$plan_code, $subscription_code){
        
        $data       = array('status'=>'completed');
        $this->db->set($data);

        $this->db->where('email', $customer_email);
        $this->db->where('customer_code', $customer_code);
        $this->db->where('plan_id', $plan_id);
        $this->db->where('plan_code', $plan_code);
        $this->db->where('subscription_code', $subscription_code);

        $this->db->update('subscriber_list');
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;

    }

    // public function disable_sub($customer_code,$customer_email,$plan_id,$plan_code, $subscription_code){
        
    //     $data       = array('status'=>'stop');
    //     $this->db->set($data);

    //     $this->db->where('email', $customer_email);
    //     $this->db->where('customer_code', $customer_code);
    //     $this->db->where('plan_id', $plan_id);
    //     $this->db->where('plan_code', $plan_code);
    //     $this->db->where('subscription_code', $subscription_code);

    //     $this->db->update('subscriber_list');
    //     if($this->db->affected_rows() > 0){
    //         return true;
    //     }
    //     return false;

    // }

    public function disable_sub($user_id, $plan_code, $sub_code, $email_token){
        $data       = array('status'=>'stop');
        $this->db->set($data);

        $this->db->where('plan_code', $plan_code);
        $this->db->where('subscription_code', $sub_code);
        $this->db->where('user_id', $user_id);
        $this->db->where('email_token', $email_token);

        $this->db->update('subscriber_list');
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
    }


    public function get_plan_desc_by_plan_id($plan_id){
        $this->db->where('plan_id', $plan_id);
        $query  = $this->db->get('subscription_plan');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['plan_desc'];
            }
        }
        return false;
    }

    //subscriber 
    public function get_subscriber($user_id, $plan_id){
        $this->db->where('user_id', $user_id);
        $this->db->where('plan_id', $plan_id);
        $query      = $this->db->get('subscriber_list');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return false;
    }

    public function get_subscriber_2($user_id, $offset,$per_page){
        $this->db->where('user_id', $user_id);
        $this->db->limit($per_page,$offset);
        $query      = $this->db->get('subscriber_list');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return false;
    }

    public function count_subscriber($user_id){
		return $this->db->from('subscriber_list')->where('user_id', $user_id)->count_all_results();
	}


    

    //subscription
    public function count_subscription($user_id, $plan_id){
		return $this->db->from('subscription')
        ->where('user_id', $user_id)
        ->where('plan_id', $plan_id)
        ->count_all_results();
	}

    public function count_subscription_success($user_id, $plan_id){
		return $this->db->from('subscription')
            ->where('user_id', $user_id)
            ->where('plan_id', $plan_id)
            ->where('status','success')->count_all_results();
	}

    public function count_subscription_failed($user_id, $plan_id){
		return $this->db->from('subscription')
            ->where('user_id', $user_id)
            ->where('plan_id', $plan_id)
            ->where('status','failed')->count_all_results();
	}

    public function get_subscription($user_id, $plan_id, $offset,$per_page){
        $this->db->where('user_id', $user_id);
        $this->db->where('plan_id', $plan_id);
        $this->db->limit($per_page,$offset);
        $query  =$this->db->get('subscription');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return false;
    }
    

    public function get_subscription_code_by_plan_code($plan_code){
        $this->db->where('plan_code', $plan_code);
        $query  = $this->db->get('subscriber_list');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['subscription_code'];
            }
        }
        return false;
    }

    public function get_plan_id_by_sub_code($sub_code){
        $this->db->where('subscription_code', $sub_code);
        $query  = $this->db->get('subscriber_list');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['plan_id'];
            }
        }
        return false;
    }

    public function get_plan_code_by_sub_code($sub_code){
        $this->db->where('subscription_code', $sub_code);
        $query  = $this->db->get('subscriber_list');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['plan_code'];
            }
        }
        return false;
    }


    public function get_plan_amount_by_plan_code($plan_code){
        $this->db->where('plan_code', $plan_code);
        $query  = $this->db->get('subscription_plan');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['plan_amount'];
            }
        }
        return false;
    }


    public function get_plan_name_by_sub_code($sub_code){
        $this->db->where('subscription_code', $sub_code);
        $query  = $this->db->get('subscriber_list');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['plan_name'];
            }
        }
        return false;
    }

    public function get_plan_name_by_plan_id($plan_id){
        $this->db->where('plan_id', $plan_id);
        $query  = $this->db->get('subscriber_list');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['plan_name'];
            }
        }
        return false;
    }

    public function get_plan_interval_by_plan_id($plan_id){
        $this->db->where('plan_id', $plan_id);
        $query  = $this->db->get('subscriber_list');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['plan_interval'];
            }
        }
        return false;
    }

    public function get_plan_amount_by_sub_code($sub_code){
        $this->db->where('subscription_code', $sub_code);
        $query  = $this->db->get('subscriber_list');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['plan_amount'];
            }
        }
        return false;
    }

    public function get_plan_interval_by_sub_code($sub_code){
        $this->db->where('subscription_code', $sub_code);
        $query  = $this->db->get('subscriber_list');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['plan_interval'];
            }
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

    public function check_if_subscription_disable($user_id,$plan_code, $sub_code){

        $this->db->where('user_id',$user_id);
        $this->db->where('plan_code',$plan_code);
        $this->db->where('subscription_code',$sub_code);
        $this->db->where('status','stop');

        $query  = $this->db->get('subscriber_list');
        if($query->num_rows() > 0){
            return true;
        }
        return false;
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
    
    public function get_subscription_balance(){
        
        $query      = $this->db->get('site_setting');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['subscription_balance'];
            }
        }
        return 0;
    }
    public function update_subscription_balance($amount){
        $site_id            = $this->get_site_id();
        
        $current_amount     = $this->get_subscription_balance();
        $new_total_amount   = $amount + $current_amount;
        $data   = array('subscription_balance' => $new_total_amount);
        $this->db->set($data);
        $this->db->where('id',$site_id);
        $this->db->update('site_setting');
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
    }


    public function add_user_subscription_history($amount, $subscriber_id){
        $trans_type     = 'deposit';
        $trans_status   = 'success';
        $trans_desc     = 'Subscription was successful';

        $this->add_to_subscriber_transaction_history($subscriber_id, $amount, $trans_type, $trans_desc, $trans_status);
    }
    
    //COME HERE ZIONNITE
    public function add_to_site_subscriber_balance($amount, $subscriber_id){
        
        $trans_type     = 'deposit';
        $trans_status   = 'success';
        $trans_desc     = 'A Subscriber subscription went through';

        $this->update_subscription_balance($amount);
        $this->add_to_subscriber_transaction_history($subscriber_id, $amount, $trans_type, $trans_desc, $trans_status);
    }

    public function add_to_subscriber_transaction_history($subscriber_id, $amount, $trans_type, $trans_desc, $trans_status){
        $data           = array('user_id'       =>  $subscriber_id,
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
        $this->db->insert('subscription_transaction');
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;

    }


    //Cronjob
    public function reciept_checker($user_id){
        $this->db->where('user_id', $user_id);
        $this->db->where('month', date('M'));
        $this->db->where('year', date('Y'));
        $this->db->where('status','pending');
        
        $query      = $this->db->get('auto_transfer_rec');
        if($query->num_rows() > 0){
            return true;
        }
        return false;
    }

    public function get_my_transfer_rec($user_id){
        $this->db->where('user_id',$user_id);
        $this->db->where('month', date('M'));
        $this->db->where('year', date('Y'));
        $this->db->where('status','pending');
	
		$query		=$this->db->get('auto_transfer_rec');
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				return $row['rec'];
			}
		}
		return false;
    }

    public function update_transfer_rec($user_id){
        $data   = array('status' => 'unpaid');
        $this->db->set($data);
        $this->db->where('user_id',$user_id);
        $this->db->where('month',date('M'));
        $this->db->where('year',date('Y'));
        $this->db->where('status','pending');
        
        $this->db->update('auto_transfer_rec');
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
    }

    public function update_transfer_rec_2($rc_code,$dis_user_id){
        $data       = array('user_id'   =>  $user_id, 
                            'rec'       =>  $rc_code,
                            'month'     =>  date('M'),
                            'year'      =>  date('Y'),
                            'time'      =>  time(),
                        );
        $this->db->set($data);
        $this->db->insert('auto_transfer_rec');
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
    }

    public function update_transfer_rec_3($user_id){
        $data   = array('status' => 'paid');
        $this->db->set($data);
        $this->db->where('user_id',$user_id);
        $this->db->where('month',date('M'));
        $this->db->where('year',date('Y'));
        $this->db->where('status','unpaid');

        $this->db->update('auto_transfer_rec');
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
    }

    public function update_transfer_rec_4($user_id){
        $data   = array('status' => 'failed');
        $this->db->set($data);
        $this->db->where('user_id',$user_id);
        $this->db->where('month',date('M'));
        $this->db->where('year',date('Y'));
        $this->db->where('status','unpaid');
        
        $this->db->update('auto_transfer_rec');
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
    }

    public function get_subscriber_list(){
        $this->db->where('status','active');
        $query      = $this->db->get('subscriber_list');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return false;
    }

    public function get_subscription_plan(){

        $query      = $this->db->get('subscription_plan');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return false;
    }

    public function get_plan_name_from_sub_tbl($plan_id){

        $this->db->where('plan_id', $plan_id);
        $query  = $this->db->get('subscription_plan');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['plan_name'];
            }
        }
        return false;
    }

    public function get_plan_amount_from_sub_tbl($plan_id){

        $this->db->where('plan_id', $plan_id);
        $query  = $this->db->get('subscription_plan');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['plan_amount'];
            }
        }
        return false;
    }

    public function get_plan_interval_from_sub_tbl($plan_id){

        $this->db->where('plan_id', $plan_id);
        $query  = $this->db->get('subscription_plan');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['plan_interval'];
            }
        }
        return false;
    }



    public function admin_update_subscriber_detail($customer_email, $plan_code, $plan_interval){

        $plan_limit     = $this->get_plan_limit_by_plan_id($plan_code);
        if($plan_limit > '1'){
            if($plan_interval   == 'hourly'){

                $end_date   = $this->date_me($plan_limit,'hours');
            }
            else if($plan_interval  == 'daily'){
                $end_date   = $this->date_me($plan_limit,'days');
            }
            else if($plan_interval  == 'weekly'){
                $end_date   = $this->date_me($plan_limit,'weeks');
            }
            else if($plan_interval  == 'monthly'){
                $end_date   = $this->date_me($plan_limit,'months');
            }
            else if($plan_interval == 'annually'){
                $end_date   = $this->date_me($plan_limit,'years');
            }

        }else{
             $end_date   = date('Y-m-d H:i:s');
        }

        

        $data       = array(
                        'sub_end_date'=> $end_date,
                        'status'        => 'active',
                    );
        $this->db->set($data);
        $this->db->where('email',$customer_email);
        $this->db->where('plan_code',$plan_code);
        $this->db->update('subscriber_list');
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
    }


    public function admin_insert_subscription($user_id, $plan_id, $plan_code, $plan_name, $plan_amount, $plan_interval, $email){


        $data   = array(
            'user_id'                   =>  $user_id,
            'customer_email'            =>  $email,
            'plan_id'                   =>  $plan_id,
            'plan_code'                 =>  $plan_code,
            'amount'                    =>  $plan_amount,
            'paid_date'                 =>  date('Y-m-d H:i:sa'),
            'day'                       =>  date('d'),
            'month'                     =>  date('M'),
            'year'                      =>  date('Y'),
            'time'                      =>  time(),
            'status'                    =>  'success',
            'is_card'                   =>  'no',
        );

        $this->db->set($data);
        $this->db->insert('subscription');
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;

    }


    public function admin_add_subscriber($user_id, $plan_id, $plan_code, $plan_name, $plan_amount, $plan_interval){
        $email              = $this->Users_db->get_email_by_id($user_id);
        $plan_limit         = $this->get_plan_limit_by_plan_id($plan_code);
            
        if($plan_limit  == '1'){
            $plan_interval  = 'OutRight';
        }

        $data       = array(
                            'user_id'           =>  $user_id,
                            'email'             =>  $email,
                            'plan_id'           =>  $plan_id,
                            'plan_code'         =>  $plan_code,
                            'plan_name'         =>  $plan_name,
                            'plan_amount'       =>  $plan_amount,
                            'plan_interval'     =>  $plan_interval,
                            'sub_start_date'    =>  date('Y-m-d H:i:s'),
                            'user_type'         =>  'offline',
        );

        $this->db->set($data);
        $this->db->insert('subscriber_list');
        if($this->db->affected_rows() > 0){

            //update subscription table and subscriptionList tbl
            $this->admin_update_subscriber_detail($email, $plan_code, $plan_interval);
            $this->Subscription_db->admin_insert_subscription($user_id, $plan_id, $plan_code, $plan_name, $plan_amount, $plan_interval, $email);
            
            return true;
        }
        return false;
        
    }


        //subscription
    public function count_all_subscription(){
		return $this->db->from('subscription')
        ->count_all_results();
	}

    
    public function get_all_subscription($offset,$per_page){
        $this->db->limit($per_page,$offset);
        $query  =$this->db->get('subscription');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return false;
    }
    



    public function count_filter_date_sub($keyword_1, $keyword_2){

        $keyword_1	=date('d-m-Y H:i:sa',strtotime($keyword_1));
        $keyword_2	=date('d-m-Y H:i:sa',strtotime($keyword_2));
        
        $this->db->where('paid_date <',$keyword_1);
        $this->db->where('paid_date >',$keyword_2);
        return $this->db->from('subscription')->count_all_results();
    }


    public function get_all_filter_date_sub($keyword_1, $keyword_2, $offset, $per_page){

        $keyword_1	=date('d-m-Y H:i:sa',strtotime($keyword_1));
        $keyword_2	=date('d-m-Y H:i:sa',strtotime($keyword_2));
        
        $this->db->where('paid_date <',$keyword_1);
        $this->db->where('paid_date >',$keyword_2);

        $this->db->order_by('id','desc');
        $this->db->limit($per_page,$offset);

        $query		=$this->db->get('subscription');
		if($query->num_rows() > 0){

            return $query->result_array();
		}

		return false;
    }



    public function count_search_subscription($keyword){

        $this->db->like('customer_email',$this->db->escape_like_str($keyword,'both'));
        return $this->db->from('subscription')->count_all_results();
    }


    public function get_all_search_subscription($keyword, $offset, $per_page){
        
        $this->db->like('customer_email',$this->db->escape_like_str($keyword,'both'));
        $this->db->order_by('id','desc');
        $this->db->limit($per_page,$offset);

        $query		=$this->db->get('subscription');
		if($query->num_rows() > 0){

            return $query->result_array();
		}

		return false;
    }

}