<?php
class Subscription_db extends My_Model{
    public function __construct(){
        parent::__construct();
    }

    public function add_land_location($location){
        $data   = array('location_name'=>$location);
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

    public function create_subscription_plan($plan_name,$description,$interval,$amount,$invoice_limit,$location){
        $location_name      =$this->get_location_name_by_id($location);
        $data    = array('plan_name'        =>$plan_name,
                         'plan_desc'        =>$description,
                         'plan_interval'    =>$interval,
                         'plan_amount'      =>$amount,
                         'plan_limit'       =>$invoice_limit,
                         'location_id'      =>$location,
                         'location_name'    =>$location_name,
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
        $auth_bin, $auth_last4, $auth_exp_month, $auth_exp_year, $auth_card_type){

        $user_id    = $this->Users_db->get_user_id_by_email($customer_email);

        $data   = array(
            'user_id'                   => $user_id,
            'customer_email'            =>  $customer_email,
            'customer_code'             =>  $customer_code,
            'plan_id'                   =>  $plan_id,
            'plan_code'                 =>  $plan_code,
            'amount'                    =>  $plan_amount,
            'paid_date'                 =>  date('Y-m-d H:i:s'),
            'day'                       =>  date('d'),
            'month'                     =>  date('M'),
            'year'                      =>  date('Y'),
            'time'                      =>  time(),
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
    public function get_subscriber($user_id){
        $this->db->where('user_id', $user_id);
        $query      = $this->db->get('subscriber_list');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return false;
    }

}