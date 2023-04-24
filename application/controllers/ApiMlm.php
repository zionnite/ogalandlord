<?php
class ApiMlm extends My_Controller{
    public function __construct(){
        parent::__construct();
    }
    

    public function getAccountReport($user_id =NULL, $admin_status=NULL, $user_status=NULL){
        /**
         * Take Note of this
         * Payable Balance is the balance that can be withdrawl from
         * Culmulative or total_m_earning its to keep a track of how much a user has earn and it cant not be withdrawl from
         */
        $msg    = array();
        $data   = array();
        $payableBalance         = $this->MUser_db->getMPayableBalance($user_id);
        $totalBalance           = $this->MUser_db->getMTotalBalance($user_id);
        $countDirectDownline    = $this->MUser_db->countDirectDownline($user_id);
        $countMyPoint           = $this->count_my_point_balance($user_id);


        $data['payable_balance']        = (int)$payableBalance;
        $data['total_balance']          = (int)$totalBalance;
        $data['direct_downline']        = (int)$countDirectDownline;
        $data['countMyPoint']           = (int)$countMyPoint;

      
        $msg[]    = $data;
        echo json_encode($msg);
    }


    //Get all Transaction

    public function getTop20Transaction($page = NULL, $user_id = NULL){

        $admin_status           = $this->input->post('admin_status');
       
        $msg    = array();
        $start = 0;
        $limit = 20;

        $total    = $this->count_transaction($user_id,$admin_status);
        if ($page > $total) {
            $msg  = array('status' => 'end');
            echo json_encode($msg);
        } else {

            $msg    = array();
            $start = ($page - 1) * $limit;

            $this->db->limit($limit);
            $this->db->order_by('id', 'asc');

            if($admin_status == 'false'){
                $this->db->where('user_id',$user_id);

            }else{
                $this->db->where('user_id','admin');
            }

            $query      =$this->db->get('mlm_transaction');
            if($query->num_rows() > 0){

                $dis_data   = array();
                foreach($query->result_array() as $row){

                    $id                 =$row['id'];
                    $dis_user_id        =$row['user_id'];
                    $dis_amount         =$row['amount'];
                    $trans_type         =$row['trans_type'];
                    $description        =$row['description'];
                    $ref_no             =$row['ref_no'];
                    $dis_status         =$row['status'];
                    $date_created       =$row['date_created'];
                    $time               =$row['time'];

                                                    

                    $dis_data[]      = array(
                        'id'                                =>  $id,
                        'dis_user_id'                       =>  $dis_user_id,
                        'dis_amount'                        =>  $dis_amount,
                        'trans_type'                        =>  $trans_type,
                        'description'                       =>  $description,
                        'ref_no'                            =>  $ref_no,
                        'dis_status'                        =>  $dis_status,
                        'date_created'                      =>  $date_created,
                        'time'                              =>  $time,
                    );
                }

                if (count($dis_data) != 0) {
                    $msg['status']      ='success';
                    $msg['transaction'] = $dis_data;
                    echo json_encode($msg);
                }
            }
            else {
                $msg  = array('status' => 'end2');
                echo json_encode($msg);
            }
            
        }
    }

    public function count_transaction($user_id, $admin_status){

        if($admin_status == 'false'){
            $this->db->where('user_id',$user_id);
        }else{
            $this->db->where('user_id','admin');
        }

        return $this->db->from('mlm_transaction')->count_all_results();
    }

    public function get_transaction($page = NULL, $user_id = NULL){

        $admin_status           = $this->input->post('admin_status');
       
        $msg    = array();
        $start = 0;
        $limit = 5;

        $total    = $this->count_transaction($user_id,$admin_status);
        if ($page > $total) {
            $msg  = array('status' => 'end');
            echo json_encode($msg);
        } else {

            $msg    = array();
            $start = ($page - 1) * $limit;

            $this->db->limit($limit, $start);
            $this->db->order_by('id', 'asc');

            if($admin_status == 'false'){
                $this->db->where('user_id',$user_id);

            }else{
                $this->db->where('user_id','admin');
            }

            $query      =$this->db->get('mlm_transaction');
            if($query->num_rows() > 0){

                $dis_data   = array();
                foreach($query->result_array() as $row){

                    $id                 =$row['id'];
                    $dis_user_id        =$row['user_id'];
                    $dis_amount         =$row['amount'];
                    $trans_type         =$row['trans_type'];
                    $description        =$row['description'];
                    $ref_no             =$row['ref_no'];
                    $dis_status         =$row['status'];
                    $date_created       =$row['date_created'];
                    $time               =$row['time'];

                                                    

                    $dis_data[]      = array(
                        'id'                                =>  $id,
                        'dis_user_id'                       =>  $dis_user_id,
                        'dis_amount'                        =>  $dis_amount,
                        'trans_type'                        =>  $trans_type,
                        'description'                       =>  $description,
                        'ref_no'                            =>  $ref_no,
                        'dis_status'                        =>  $dis_status,
                        'date_created'                      =>  $date_created,
                        'time'                              =>  $time,
                    );
                }

                if (count($dis_data) != 0) {
                    $msg['status']      ='success';
                    $msg['transaction'] = $dis_data;
                    echo json_encode($msg);
                }
            }
            else {
                $msg  = array('status' => 'end2');
                echo json_encode($msg);
            }
            
        }
    }

    //Get all Plans
    public function count_all_plans(){
		return $this->db->from('subscription_plan')->count_all_results();
	} 
    public function get_all_plans($page=NULL, $user_id =NULL){
        $msg    = array();
        $start = 0;
        $limit = 5;
        $total    =$this->count_all_plans();

        if($page > $total) {

            $msg  = array('status'=>'end 1');
            echo json_encode($msg);
        }else{

            $start = ($page - 1) * $limit;
            $this->db->limit($limit,$start);
            $this->db->order_by('id','asc');

            $query      =$this->db->get('subscription_plan');
            if($query->num_rows() > 0){
                $dis_data   = array();

                foreach($query->result_array() as $row){

                    $dis_id                             = $row['id'];
                    $plan_name                          = $row['plan_name'];
                    $plan_id                            = $row['plan_id'];
                    $plan_code                          = $row['plan_code'];
                    $plan_desc                          = $row['plan_desc'];
                    $plan_interval                      = $row['plan_interval'];
                    $plan_amount                        = $row['plan_amount'];
                    $plan_limit                         = $row['plan_limit'];
                    $location_id                        = $row['location_id'];
                    $location_name                      = $row['location_name'];
                    $status                             = $row['status'];
                    $plan_image                         = $row['plan_image'];
                    $plan_image                         = base_url().'project_dir/subscription/'.$plan_image;


                    $is_subscribe                       = $this->MUser_db->check_if_i_subscribe($user_id,$plan_code);

                    


                    $dis_data[]      = array(
                        'dis_id'                            =>  $dis_id,
                        'plan_name'                         =>  $plan_name,
                        'plan_id'                           =>  $plan_id,
                        'plan_code'                         =>  $plan_code,
                        'plan_desc'                         =>  $plan_desc,
                        'plan_interval'                     =>  $plan_interval,
                        'plan_amount'                       =>  $plan_amount,
                        'plan_limit'                        =>  $plan_limit,
                        'location_id'                       =>  $location_id,
                        'location_name'                     =>  $location_name,
                        'status'                            =>  $status,
                        'plan_image'                        =>  $plan_image,
                        'is_subscribe'                      =>  $is_subscribe,
                      
                    );
                }

                if (count($dis_data) != 0) {
                    $msg['status']      = 'success';
                    $msg['plans']    = $dis_data;
                    echo json_encode($msg);
                }
            }
            else {
                $msg  = array('status' => 'end 2');
                echo json_encode($msg);
                
            }
            
            
        }
    }

    public function count_plan_interval($plan_interval){
		return $this->db->from('subscription_plan')->where('plan_interval',$plan_interval)->count_all_results();
	} 
    public function get_all_plan_interval($page=NULL, $plan_interval=NULL, $user_id =NULL){
        $msg    = array();
        $start = 0;
        $limit = 5;
        $total    =$this->count_plan_interval($plan_interval);

        if($page > $total) {

            $msg  = array('status'=>'end 1');
            echo json_encode($msg);
        }else{

            $start = ($page - 1) * $limit;
            $this->db->limit($limit,$start);
            $this->db->order_by('id','asc');
            
            $this->db->where('plan_interval',$plan_interval);

            $query      =$this->db->get('subscription_plan');
            if($query->num_rows() > 0){
                $dis_data   = array();

                foreach($query->result_array() as $row){

                    $dis_id                             = $row['id'];
                    $plan_name                          = $row['plan_name'];
                    $plan_id                            = $row['plan_id'];
                    $plan_code                          = $row['plan_code'];
                    $plan_desc                          = $row['plan_desc'];
                    $plan_interval                      = $row['plan_interval'];
                    $plan_amount                        = $row['plan_amount'];
                    $plan_limit                         = $row['plan_limit'];
                    $location_id                        = $row['location_id'];
                    $location_name                      = $row['location_name'];
                    $status                             = $row['status'];
                    $plan_image                         = $row['plan_image'];
                    $plan_image                         = base_url().'project_dir/subscription/'.$plan_image;


                    $is_subscribe                       = $this->MUser_db->check_if_i_subscribe($user_id,$plan_code);

                    


                    $dis_data[]      = array(
                        'dis_id'                            =>  $dis_id,
                        'plan_name'                         =>  $plan_name,
                        'plan_id'                           =>  $plan_id,
                        'plan_code'                         =>  $plan_code,
                        'plan_desc'                         =>  $plan_desc,
                        'plan_interval'                     =>  $plan_interval,
                        'plan_amount'                       =>  $plan_amount,
                        'plan_limit'                        =>  $plan_limit,
                        'location_id'                       =>  $location_id,
                        'location_name'                     =>  $location_name,
                        'status'                            =>  $status,
                        'plan_image'                        =>  $plan_image,
                        'is_subscribe'                      =>  $is_subscribe,
                      
                    );
                }

                if (count($dis_data) != 0) {
                    $msg['status']      = 'success';
                    $msg['plans']    = $dis_data;
                    echo json_encode($msg);
                }
            }
            else {
                $msg  = array('status' => 'end 2');
                echo json_encode($msg);
                
            }
            
            
        }
    }


    public function count_plan_type($plan_type){
		return $this->db->from('subscription_plan')->where('plan_type',$plan_type)->count_all_results();
	} 
    
    public function get_all_plan_type($page=NULL, $plan_type=NULL, $user_id =NULL){
        $msg    = array();
        $start = 0;
        $limit = 5;
        $total    =$this->count_plan_type($plan_type);

        if($page > $total) {

            $msg  = array('status'=>'end 1');
            echo json_encode($msg);
        }else{

            $start = ($page - 1) * $limit;
            $this->db->limit($limit,$start);
            $this->db->order_by('id','asc');
            
            $this->db->where('plan_type',$plan_type);

            $query      =$this->db->get('subscription_plan');
            if($query->num_rows() > 0){
                $dis_data   = array();

                foreach($query->result_array() as $row){

                    $dis_id                             = $row['id'];
                    $plan_name                          = $row['plan_name'];
                    $plan_id                            = $row['plan_id'];
                    $plan_code                          = $row['plan_code'];
                    $plan_desc                          = $row['plan_desc'];
                    $plan_interval                      = $row['plan_interval'];
                    $plan_amount                        = $row['plan_amount'];
                    $plan_limit                         = $row['plan_limit'];
                    $location_id                        = $row['location_id'];
                    $location_name                      = $row['location_name'];
                    $status                             = $row['status'];
                    $plan_image                         = $row['plan_image'];
                    $plan_image                         = base_url().'project_dir/subscription/'.$plan_image;


                    $is_subscribe                       = $this->MUser_db->check_if_i_subscribe($user_id,$plan_code);

                    


                    $dis_data[]      = array(
                        'dis_id'                            =>  $dis_id,
                        'plan_name'                         =>  $plan_name,
                        'plan_id'                           =>  $plan_id,
                        'plan_code'                         =>  $plan_code,
                        'plan_desc'                         =>  $plan_desc,
                        'plan_interval'                     =>  $plan_interval,
                        'plan_amount'                       =>  $plan_amount,
                        'plan_limit'                        =>  $plan_limit,
                        'location_id'                       =>  $location_id,
                        'location_name'                     =>  $location_name,
                        'status'                            =>  $status,
                        'plan_image'                        =>  $plan_image,
                        'is_subscribe'                      =>  $is_subscribe,
                      
                    );
                }

                if (count($dis_data) != 0) {
                    $msg['status']      = 'success';
                    $msg['plans']    = $dis_data;
                    echo json_encode($msg);
                }
            }
            else {
                $msg  = array('status' => 'end 2');
                echo json_encode($msg);
                
            }
            
            
        }
    }

    //View  Subscription 

    public function count_my_subscription_list($user_id){
		return $this->db->from('subscriber_list')->where('user_id',$user_id)->count_all_results();
	} 

    public function get_my_subscription_list($page=NULL, $user_id =NULL){
        $msg    = array();
        $start = 0;
        $limit = 5;
        $total    =$this->count_my_subscription_list($user_id);

        if($page > $total) {

            $msg  = array('status'=>'end 1');
            echo json_encode($msg);
        }else{

            $start = ($page - 1) * $limit;
            $this->db->limit($limit,$start);
            $this->db->order_by('id','asc');
            
            $this->db->where('user_id',$user_id);

            $query      =$this->db->get('subscriber_list');
            if($query->num_rows() > 0){
                $dis_data   = array();

                foreach($query->result_array() as $row){

                    $id                                 = $row['id'];
                    $user_id                            = $row['user_id'];

                    $customer_email                     = $row['email'];
                    $customer_code                      = $row['customer_code'];
                    $subscription_code                  = $row['subscription_code'];
                    $email_token                        = $row['email_token'];

                    $plan_id                            = $row['plan_id'];
                    $plan_code                          = $row['plan_code'];
                    $plan_name                          = $row['plan_name'];
                    $plan_amount                        = $row['plan_amount'];
                    $plan_interval                      = $row['plan_interval'];

                    $auth_bin                           = $row['auth_bin'];
                    $auth_last4                         = $row['auth_last4'];
                    $auth_exp_month                     = $row['auth_exp_month'];
                    $auth_exp_year                      = $row['auth_exp_year'];
                    $auth_card_type                     = $row['auth_card_type'];

                    $sub_start_date                     = $row['sub_start_date'];
                    $sub_end_date                       = $row['sub_end_date'];

                    $status                             = $row['status'];
                    $request_card_update                = $row['request_card_update'];


                    $plan_image                         = $this->MUser_db->get_plan_image_by_plan_code($plan_code);
                    $plan_image                         = base_url().'project_dir/subscription/'.$plan_image;
                    $is_subscribe                       = $this->MUser_db->check_if_i_subscribe($user_id,$plan_code);
                    
                    $plan_desc                          = $this->Subscription_db->get_plan_desc_by_plan_id($plan_id);
                    $plan_limit                         = $this->Subscription_db->get_plan_limit_by_plan_id($plan_code);


                    


                    $dis_data[]      = array(
                        'id'                                =>  $id,
                        'user_id'                           =>  $user_id,

                        'customer_email'                    =>  $customer_email,
                        'customer_code'                     =>  $customer_code,
                        'subscription_code'                 =>  $subscription_code,
                        'email_token'                       =>  $email_token,

                        'plan_name'                         =>  $plan_name,
                        'plan_id'                           =>  $plan_id,
                        'plan_code'                         =>  $plan_code,
                        'plan_desc'                         =>  $plan_desc,
                        'plan_interval'                     =>  $plan_interval,
                        'plan_amount'                       =>  $plan_amount,
                        'plan_limit'                        =>  $plan_limit,
                        'plan_image'                        =>  $plan_image,
                        
                        'auth_bin'                          =>  $auth_bin,
                        'auth_last4'                        =>  $auth_last4,
                        'auth_exp_month'                    =>  $auth_exp_month,
                        'auth_exp_year'                     =>  $auth_exp_year,
                        'auth_card_type'                    =>  $auth_card_type, 

                        'sub_start_date'                    =>  $sub_start_date,
                        'sub_end_date'                      =>  $sub_end_date,

                        'status'                            =>  $status,
                        'request_card_update'               =>  $request_card_update,


                        'is_subscribe'                      =>  $is_subscribe,
                      
                    );
                }

                if (count($dis_data) != 0) {
                    $msg['status']      = 'success';
                    $msg['my_plan_list']    = $dis_data;
                    echo json_encode($msg);
                }
            }
            else {
                $msg  = array('status' => 'end 2');
                echo json_encode($msg);
                
            }
            
            
        }
    }
    

    public function count_my_subscription($user_id,$plan_id){
		return $this->db->from('subscription')->where('user_id',$user_id)->where('plan_id',$plan_id)->count_all_results();
	} 

    public function get_my_subscription($page=NULL, $plan_id=NULL, $user_id =NULL){
        $msg    = array();
        $start = 0;
        $limit = 5;
        $total    =$this->count_my_subscription($user_id, $plan_id);

        if($page > $total) {

            $msg  = array('status'=>'end 1');
            echo json_encode($msg);
        }else{

            $start = ($page - 1) * $limit;
            $this->db->limit($limit,$start);
            $this->db->order_by('id','asc');
            
            $this->db->where('user_id',$user_id);
            $this->db->where('plan_id',$plan_id);

            $query      =$this->db->get('subscription');
            if($query->num_rows() > 0){
                $dis_data   = array();

                foreach($query->result_array() as $row){

                    $id                                 = $row['id'];
                    $user_id                            = $row['user_id'];

                    $customer_email                     = $row['customer_email'];
                    $customer_code                      = $row['customer_code'];

                    $plan_id                            = $row['plan_id'];
                    $plan_code                          = $row['plan_code'];
                    
                    $amount                             = $row['amount'];
                    $paid_date                          = $row['paid_date'];
                    $day                                = $row['day'];
                    $month                              = $row['month'];
                    $year                               = $row['year'];
                    $time                               = $row['time'];
                    $status                             = $row['status'];
                    $description                        ='';

                    $plan_name                          = $this->Subscription_db->get_plan_name_by_plan_id($plan_id);
                    $plan_interval                      = $this->Subscription_db->get_plan_interval_by_plan_id($plan_id);
                    
                    if($status =='success'){
                        $description = 'Card debited for '.$plan_name.' '.$plan_interval;
                    }else {
                        $description = 'Could not Debit Card for '.$plan_name.' '.$plan_interval;
                    }
                    


                    $dis_data[]      = array(
                        'id'                                =>  $id,
                        'user_id'                           =>  $user_id,

                        'customer_email'                    =>  $customer_email,
                        'customer_code'                     =>  $customer_code,

                        'plan_id'                           =>  $plan_id,
                        'plan_code'                         =>  $plan_code,
                        'amount'                            =>  $amount,

                        'paid_date'                         =>  $paid_date,
                        'day'                               =>  $day,
                        'month'                             =>  $month,
                        'year'                              =>  $year,
                        'time'                              =>  $time,
                        'status'                            =>  $status,
                        'description'                       =>  $description,
                    );
                }

                if (count($dis_data) != 0) {
                    $msg['status']      = 'success';
                    $msg['subscription']    = $dis_data;
                    echo json_encode($msg);
                }
            }
            else {
                $msg  = array('status' => 'end 2');
                echo json_encode($msg);
                
            }
            
            
        }
    }
    

    public function get_subscription_counting($user_id =NULL, $plan_id=NULL){
        /**
         * Take Note of this
         * Payable Balance is the balance that can be withdrawl from
         * Culmulative or total_m_earning its to keep a track of how much a user has earn and it cant not be withdrawl from
         */
        $msg    = array();
        $data   = array();
        $successful_debitting                   = $this->Subscription_db->count_subscription_success($user_id,$plan_id);
        $count_subscription_failed              = $this->Subscription_db->count_subscription_failed($user_id, $plan_id);
        $revenue_amount                         = $this->Subscription_db->revenue_amount($user_id, $plan_id);


        $data['successful_debitting']           = (int)$successful_debitting;
        $data['count_subscription_failed']      = (int)$count_subscription_failed;
        $data['revenue_amount']                 = (int)$revenue_amount;

      
        $msg[]    = $data;
        echo json_encode($msg);
    }


    public function toggle_disable_button(){
        $user_id                = $this->input->post('user_id');
        $plan_code              = $this->input->post('plan_code');
        $sub_code               = $this->input->post('sub_code');
        $email_token            = $this->input->post('email_token');
        
        $msg    =array();
        $check_if_disable       = $this->Subscription_db->check_if_subscription_disable($user_id,$plan_code,$sub_code);
        if($check_if_disable){
            //return already disable subscrption
            $msg['status']  = 'false_0';
        }else{
            $secure_key   =$this->Action->get_private_live_key();

            $url = "https://api.paystack.co/subscription/disable";

            $fields = [
                'code' => $sub_code,
                'token' => $email_token
            ];

            $fields_string = http_build_query($fields);

            //open connection
            $ch = curl_init();
            
            //set the url, number of POST vars, POST data
            curl_setopt($ch,CURLOPT_URL, $url);
            curl_setopt($ch,CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_TIMEOUT, 400); 
            curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                "Authorization: Bearer $secure_key",
                "Cache-Control: no-cache",
            ));
            
            //So that curl_exec returns the contents of the cURL; rather than echoing it
            curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
            //execute post
            $response = curl_exec($ch);

            
            $result  = json_decode($response, true);
            $result  = array_change_key_case($result, CASE_LOWER);

            $status     = $result['status'];

            if($status){

                //update subscriber
                $action     = $this->Subscription_db->disable_sub($user_id, $plan_code, $sub_code, $email_token);
                if($action){

                    // $this->success_alert_callbark('Your subscription is now disabled');
                    $msg['status']  = 'true';
                }else{
                    // $this->failed_alert_callbark('Your subscription is disabled but could not update information');
                    $msg['status']  = 'false_2';

                }

            }
            else{
                // $this->failed_alert_callbark('Could not disable subscription please try again later!');
                $msg['status']  = 'false_1';
            }
        }

        echo json_encode($msg);
    }


    public function send_request_to_email($user_id=NULL, $sub_code=NULL){
        $msg    =array();
        
        $secure_key   =$this->Action->get_private_live_key();
        $url = "https://api.paystack.co/subscription/$sub_code/manage/email";


        //open connection
        $ch = curl_init();
        
        //set the url, number of POST vars, POST data
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer $secure_key",
            "Cache-Control: no-cache",
        ));
        
        //So that curl_exec returns the contents of the cURL; rather than echoing it
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
        
        $response = curl_exec($ch);
        $err = curl_error($ch);

		$result  = json_decode($response, true);
        $result  = array_change_key_case($result, CASE_LOWER);

        $status     = $result['status'];

        if($status){
           
            $msg['status']  = 'true';
        }
        else{
            $msg['status']  = 'false';
        }

        echo json_encode($msg);
    }

    //Get Downline
    
    public function get_direct_downline($page=NULL, $user_id){
       
        $msg    = array();
        $start = 0;
        $limit = 5;

        $total    = $this->MUser_db->countDirectDownline($user_id);
        if ($page > $total) {
            $msg  = array('status' => 'end');
            echo json_encode($msg);
        } else {

            $msg    = array();
            $start = ($page - 1) * $limit;

            $this->db->limit($limit, $start);
            $this->db->order_by('id', 'asc');
            $this->db->where('m_ref',$user_id);

            $query      =$this->db->get('users');
            if($query->num_rows() > 0){

                $dis_data   = array();
                foreach($query->result_array() as $row){

                    $agent_id                   = $row['id'];
                    $agent_user_name            = $row['user_name'];
                    $agent_full_name            = $row['full_name'];
                    $agent_email                = $row['email'];
                    $agent_image_name           = $row['image_name'];
                    $agent_status               = $row['status'];
                    $agent_phone                = $row['phone'];
                    $agent_age                  = $row['age'];
                    $agent_sex                  = $row['sex'];
                    $agent_address              = $row['address'];
                    $agent_date_created         = $row['date_created'];
                    $agent_account_name         = $row['account_name'];
                    $agent_account_number       = $row['account_number'];
                    $agent_bank_name            = $row['bank_name'];
                    $agent_bank_code            = $row['bank_code'];
                    $agent_current_balance      = $row['current_balance'];
                    $agent_login_status         = $row['login_status'];
                    $isbank_verify              = $row['isbank_verify'];

                    $agent_image_name           = base_url().'project_dir/users/'.$agent_user_name.'/images/'.$agent_image_name;


                    $agent_phone                = $this->Users_db->get_user_phone_by_id($agent_id);
                    $agent_prop_counter         = $this->Property_db->count_all_user_property($agent_id);


                    // $agent_email                =substr_replace($agent_email, 'XXXXXXXX', '5', '5');
                    // $agent_user_phone           =substr_replace($agent_phone, 'XXXXX', '3', '5');
                    $count_num_sub              = $this->Subscription_db->count_subscriber($agent_id);
                    $count_downline             = $this->MUser_db->countDirectDownline($agent_id);
                    $amount_earned              = $this->MUser_db->totalAmountEarned($agent_id);



                    $dis_data[]      = array(
                        'agent_id'                                =>  $agent_id,
                        'agent_user_name'                         =>  $agent_user_name,
                        'agent_full_name'                         =>  $agent_full_name,
                        'agent_email'                             =>  $agent_email,
                        'agent_image_name'                        =>  $agent_image_name,
                        'agent_status'                            =>  $agent_status,
                        'agent_phone'                             =>  $agent_phone,
                        'agent_age'                               =>  $agent_age,
                        'agent_sex'                               =>  $agent_sex,
                        'agent_address'                           =>  $agent_address,
                        'agent_date_created'                      =>  $agent_date_created,
                        'agent_account_name'                      =>  $agent_account_name,
                        'agent_account_number'                    =>  $agent_account_number,
                        'agent_bank_name'                         =>  $agent_bank_name,
                        'agent_bank_code'                         =>  $agent_bank_code,
                        'agent_current_balance'                   =>  $agent_current_balance,
                        'agent_login_status'                      =>  $agent_login_status,
                        'agent_phone'                             =>  $agent_phone,
                        'agent_prop_counter'                      =>  $agent_prop_counter,
                        'isbank_verify'                           =>  $isbank_verify,
                        'count_sub'                               =>  (int)$count_num_sub,
                        'count_downline'                          =>  (int)$count_downline,
                        'amount_earned'                           =>  "$amount_earned",

                        
                    );
                }

                if (count($dis_data) != 0) {
                    $msg['status']      = 'success';
                    $msg['users']       = $dis_data;
                    echo json_encode($msg);
                }
            }
            else {
                $msg  = array('status' => 'end2');
                echo json_encode($msg);
            }
            
        }
    }

    //Authentication
    
    public function get_user_id_by_mlm_ref_code($mlm_ref_code){
        $this->db->where('m_ref_code',$mlm_ref_code);
        $query  = $this->db->get('users');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['id'];
            }
        }
        return false;
    }

    public function check_if_mlm_ref_code_exist($mlm_ref_code){
        $this->db->where('m_ref_code',$mlm_ref_code);
        $query  = $this->db->get('users');
        if($query->num_rows() > 0){
            return true;
        }
        return false;
    }

    public function signup_authorization(){
        $msg        = array();

        $u_name        = $this->input->post('user_name');
        $full_name     = $this->input->post('full_name');
        $email         = $this->input->post('email');
        $phone         = $this->input->post('phone');
        $pass          = $this->input->post('password');
        $user_type     = $this->input->post('user_type');

        //for mlm
        $isMlm              = $this->input->post('is_mlm');
        $mlm_ref_code       = $this->input->post('mlm_ref_code');
        
        



        $user_name  = preg_replace("/\s+/", "_", $u_name);
        $user_name  = preg_replace('/[^A-Za-z0-9\_]/', '', $user_name);




        //Check if User Email & Name already Exist in DB
        $email_checker      = $this->Users_db->check_if_email_exist($email);
        $name_checker       = $this->Users_db->check_if_username_exist($user_name);
        $mlm_code_checker   = $this->check_if_mlm_ref_code_exist($mlm_ref_code);

        if (!$email_checker) {
            if (!$name_checker) {

                if($mlm_code_checker){
                    if (!empty($email) && !empty($pass)) {

                        @mkdir('project_dir');
                        @mkdir('project_dir/users');
                        @mkdir('project_dir/users/'.$user_name);
                        @mkdir('project_dir/users/'.$user_name.'/images');
                        @copy("project_dir/logo.png", "project_dir/users/$user_name/images/logo.png");

                        if($isMlm == 'true'){
                            
                            $get_mlm_ref_id         = $this->get_user_id_by_mlm_ref_code($mlm_ref_code);
                            
                            $data   = array(
                                'user_name'         =>  $user_name,
                                'full_name'         =>  $full_name,
                                'email'             =>  $email,
                                'phone'             =>  $phone,
                                'password'          =>  md5($pass),
                                'image_name'        =>  'logo.png',
                                'date_created'      =>  date('Y-m-d H:i:s'),

                                //for mlm
                                'status'            =>  'm_user',
                                'is_m_ref'          =>  'yes',
                                'm_ref'             =>  $get_mlm_ref_id,

                                
                            );
                        }else{
                            
                                $data   = array(
                                'user_name'         =>  $user_name,
                                'full_name'         =>  $full_name,
                                'email'             =>  $email,
                                'phone'             =>  $phone,
                                'password'          =>  md5($pass),
                                'image_name'        =>  'logo.png',
                                'date_created'      =>  date('Y-m-d H:i:s'),

                                //for mlm
                                'status'            =>  'm_user',
                                'is_m_ref'          =>  'no',

                                
                            );
                        }
                        $this->db->set($data);
                        $this->db->insert('users');
                        if ($this->db->affected_rows() > 0) {

                            $user_id        = $this->db->insert_id();
                            //update user mlm_referal_code
                            $e_reg_no      =5190000000000;
                            $e_reg_no_2    =$e_reg_no+$user_id;
                            $data = ['m_ref_code' => $e_reg_no_2];
                            $this->db->where('id',$user_id);
                            $this->db->set($data);
                            $this->db->update('users');
                            

                        
                            $this->success_alert_callbark('Account Created... An email has been sent to you, please click on the link to verify your email');
                            $user_id        = $this->Users_db->get_user_id_by_email($email);
                            $title  ='Confirm Account';
                            $msg    ='click on this link to verify account';
                            $type   ='type_1';
                            $link   = 'http://www.ogabliss.com/login/verify_user/' . $user_id; // take note of this
                            $link_title ='Confirm Account';
                            $this->send_email($email,$title,$msg,$type,$link,$link_title);


                            $this->db->where('id',$user_id);
                            $query  = $this->db->get('users');
                            if($query->num_rows() > 0){
                                foreach($query->result_array() as $row){
                                    $agent_id                   = $row['id'];
                                    $agent_user_name            = $row['user_name'];
                                    $agent_full_name            = $row['full_name'];
                                    $agent_email                = $row['email'];
                                    $agent_image_name           = $row['image_name'];
                                    $agent_status               = $row['status'];
                                    $agent_phone                = $row['phone'];
                                    $agent_age                  = $row['age'];
                                    $agent_sex                  = $row['sex'];
                                    $agent_address              = $row['address'];
                                    $agent_date_created         = $row['date_created'];
                                    $agent_account_name         = $row['account_name'];
                                    $agent_account_number       = $row['account_number'];
                                    $agent_bank_name            = $row['bank_name'];
                                    $agent_bank_code            = $row['bank_code'];
                                    $agent_current_balance      = $row['current_balance'];
                                    $agent_login_status         = $row['login_status'];
                                    $isbank_verify              = $row['isbank_verify'];

                                    $agent_image_name           = base_url().'project_dir/users/'.$agent_user_name.'/images/'.$agent_image_name;


                                    $agent_phone                = $this->Users_db->get_user_phone_by_id($agent_id);
                                    $agent_prop_counter         = $this->Property_db->count_all_user_property($agent_id);


                                    if($agent_status == 'admin' || $agent_status =='super_admin'){
                                        $admin_status   = true;
                                    }else{
                                        $admin_status   = false;
                                    }


                                    $msg      = array(
                                        'agent_id'                                =>  $agent_id,
                                        'agent_user_name'                         =>  $agent_user_name,
                                        'agent_full_name'                         =>  $agent_full_name,
                                        'agent_email'                             =>  $agent_email,
                                        'agent_image_name'                        =>  $agent_image_name,
                                        'agent_status'                            =>  $agent_status,
                                        'agent_phone'                             =>  $agent_phone,
                                        'agent_age'                               =>  $agent_age,
                                        'agent_sex'                               =>  $agent_sex,
                                        'agent_address'                           =>  $agent_address,
                                        'agent_date_created'                      =>  $agent_date_created,
                                        'agent_account_name'                      =>  $agent_account_name,
                                        'agent_account_number'                    =>  $agent_account_number,
                                        'agent_bank_name'                         =>  $agent_bank_name,
                                        'agent_bank_code'                         =>  $agent_bank_code,
                                        'agent_current_balance'                   =>  $agent_current_balance,
                                        'agent_login_status'                      =>  $agent_login_status,
                                        'agent_prop_counter'                      =>  "$agent_prop_counter",
                                        'admin_status'                            =>  $admin_status,
                                        'isbank_verify'                           =>  $isbank_verify,
                                        'status'                                  =>  'success',

                                    );

                                }
                            }else{
                                $msg  = array('status' => 'fail_01', 'status_msg' => 'Sigup Successfull, could not redidrect you to the App Home, Please click go back to the login page, to gain access to app!');
                            }

                        } else {
                            $msg  = array('status' => 'fail_02', 'status_msg' => 'Registration was not successful, please try after some time!');
                        }
                    } else {
                        $msg  = array('status' => 'fail_03', 'status_msg' => 'Username, Email or Password can not be empty!');
                    }
                }else{
                    $msg  = array('status' => 'fail_06', 'status_msg' => 'The Referal Code you enter does not match any User on our platform');
                }

            } else {
                $msg  = array('status' => 'fail_04', 'status_msg' => 'Someone with this Username already exist on our platform!');
            }
        } else {
            $msg  = array('status' => 'fail_05', 'status_msg' => 'Someone with this email already exist on our platform!');
        }
        echo json_encode($msg);
    }

    public function login_authorization(){
        $msg        = array();

        $email      = $this->input->post('email');
        $pass       = $this->input->post('password');


        if (!empty($email) && !empty($pass)) {
            $this->db->where('email', $email);
            $this->db->where('password', md5($pass));
            $this->db->where('status','m_user');

            $query  = $this->db->get('users');
            if ($query->num_rows() > 0) {
                foreach ($query->result_array() as $row) {
                    

                    $agent_id                   = $row['id'];
                    $agent_user_name            = $row['user_name'];
                    $agent_full_name            = $row['full_name'];
                    $agent_email                = $row['email'];
                    $agent_image_name           = $row['image_name'];
                    $agent_status               = $row['status'];
                    $agent_phone                = $row['phone'];
                    $agent_age                  = $row['age'];
                    $agent_sex                  = $row['sex'];
                    $agent_address              = $row['address'];
                    $agent_date_created         = $row['date_created'];
                    $agent_account_name         = $row['account_name'];
                    $agent_account_number       = $row['account_number'];
                    $agent_bank_name            = $row['bank_name'];
                    $agent_bank_code            = $row['bank_code'];
                    $agent_current_balance      = $row['current_balance'];
                    $agent_login_status         = $row['login_status'];
                    $isbank_verify              = $row['isbank_verify'];
                    $m_ref_code                 = $row['m_ref_code'];
                    $m_ref_link                 = base_url().'Register/regmlm/'.$m_ref_code;

                    $agent_image_name           = base_url().'project_dir/users/'.$agent_user_name.'/images/'.$agent_image_name;


                    $agent_phone                = $this->Users_db->get_user_phone_by_id($agent_id);
                    $agent_prop_counter         = $this->Property_db->count_all_user_property($agent_id);


                    if($agent_status == 'admin' || $agent_status =='super_admin'){
                        $admin_status   = true;
                        $isbank_verify  = 'yes';
                    }else{
                        $admin_status   = false;
                    }


                    $msg      = array(
                        'agent_id'                                =>  $agent_id,
                        'agent_user_name'                         =>  $agent_user_name,
                        'agent_full_name'                         =>  $agent_full_name,
                        'agent_email'                             =>  $agent_email,
                        'agent_image_name'                        =>  $agent_image_name,
                        'agent_status'                            =>  $agent_status,
                        'agent_phone'                             =>  $agent_phone,
                        'agent_age'                               =>  $agent_age,
                        'agent_sex'                               =>  $agent_sex,
                        'agent_address'                           =>  $agent_address,
                        'agent_date_created'                      =>  $agent_date_created,
                        'agent_account_name'                      =>  $agent_account_name,
                        'agent_account_number'                    =>  $agent_account_number,
                        'agent_bank_name'                         =>  $agent_bank_name,
                        'agent_bank_code'                         =>  $agent_bank_code,
                        'agent_current_balance'                   =>  $agent_current_balance,
                        'agent_login_status'                      =>  $agent_login_status,
                        'agent_prop_counter'                      =>  "$agent_prop_counter",
                        'admin_status'                            =>  $admin_status,
                        'isbank_verify'                           =>  $isbank_verify,
                        'status'                                  =>  'success',
                        'm_ref_code'                              =>  $m_ref_code,
                        'm_ref_link'                              =>  $m_ref_link,
                    );

                }
            } else {
                $msg  = array('status' => 'fail_01', 'status_msg' => 'User not found or Password is incorrect!');
            }
        } else {
            $msg  = array('status' => 'fail_02', 'status_msg' => 'Email Or Password can not be empty');
        }

        echo json_encode($msg);
    }

    public function reset_password(){
        $msg    = array();
        $dis_email    = $this->input->post('email');


        if ($this->check_if_email_exist_request_password_tbl($dis_email) == FALSE) {
            $login    = $this->Users_db->email_to_all_detail($dis_email);
            if ($login    == FALSE) {
                $msg['status']          = 'fail_01';
                $msg['status_msg']      = 'Sorry, This User Don\'t exist in our database';
            } else {
                $get_site_name          = $this->Action->get_site_name();
                $get_site_g_name        = $this->Action->get_site_g_name();
                $get_site_g_pass        = $this->Action->get_site_g_pass();

                foreach ($login as $row) {
                    $user_id        = $row['id'];
                    $full_name	    = $row['full_name'];
                               

                              
                    $link           = $_SERVER['SERVER_NAME'].'/Login/confirm_reset_password/' . $user_id;


                    /*==========================SEND EMAIL TO RESET PASSWORD==================*/
                    $message    = 'Hello, ' . $full_name . ' You Requested to reset your Password, Click the Link or Copy it ' . $link . '  if this is not you, please Kindly Ignore';
                    $subject    = $get_site_name . ' | Confirm Password Reset';
                    $to         = $dis_email;



                    $this->load->library('email');
                    $config = array(
                        'protocol' => 'ssmtp',
                        'smtp_host'    => 'ssl://ssmtp.googlemail.com',
                        'smtp_port'    => '465',
                        'smtp_timeout' => '7',
                        'smtp_user'    => $get_site_g_name,
                        'smtp_pass'    => $get_site_g_pass,
                        'charset'    => 'utf-8',
                        'newline'    => "\r\n",
                        'mailtype' => 'html', // or html
                        'validation' => FALSE
                    ); // bool whether to validate email or not      

                    $this->email->set_mailtype("html");
                    $this->load->initialize($config);


                    $current_domain 		= $_SERVER['SERVER_NAME'];
                    $this->email->from('info@' . $current_domain, $get_site_name);
                    $this->email->to($to);


                    $this->email->subject($subject);

                    $data['title']			='Password Reset';
                    $data['message']		=$message;
                    $data['link']			=$link;
                    $data['link_title']		='Confirm Password Reset';
                    $body   =$this->load->view($this->email_layout,$data,TRUE);
                    $this->email->message($body);   

                    if ($this->email->send()) {
                        $this->Users_db->request_password($dis_email);
                        $msg['status']          = 'success';
                        $msg['status_msg']      = 'An Email has been Sent to ' . $dis_email . ' for further instruction!';
                    } else {
                        $msg['status']          = 'fail_02';
                        $msg['status_msg']      = 'Email not responding...';
                    }
                }
            }
        } else {
            $msg['status']          = 'fail_03';
            $msg['status_msg']      = 'You have already initated a password request, please check your email for our previous mail';
        }

        echo json_encode($msg);
    }

    public function check_if_email_exist_request_password_tbl($email){
        $check      = $this->Users_db->check_if_email_exist_request_password_tbl($email);
        return $check;
    }



    public function join_sub($user_id=NULL, $plan_id=NULL, $plan_code=NULL){
        $msg        = array();
        $data       = array();

        $email              = $this->Users_db->get_email_by_id($user_id);
        $plan_amount        = $this->Subscription_db->get_plan_amount_by_plan_code($plan_code);



        $secure_key   =$this->Action->get_private_live_key();
        $url = "https://api.paystack.co/transaction/initialize";

        $ref_timer  = time();

        $fields = [
            'email' => $email,
            'amount' => $plan_amount,
            'plan' => $plan_code,
            'reference' => $ref_timer,
            'callback_url'      => base_url().'Subscription/very_sub',

        ];

        $fields_string = http_build_query($fields);

        //open connection
        $ch = curl_init();
        
        //set the url, number of POST vars, POST data
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0); 
        curl_setopt($ch, CURLOPT_TIMEOUT, 400); 
        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer $secure_key",
            "Cache-Control: no-cache",
        ));
        
        //So that curl_exec returns the contents of the cURL; rather than echoing it
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
        
        //execute post
        $response = curl_exec($ch);
        $err = curl_error($ch);
        // curl_close($ch); //update

		
		$result  = json_decode($response, true);
        $result  = array_change_key_case($result, CASE_LOWER);

        $status     = $result['status'];

        //$this->create_customer($email);

        $status     = $result['status'];

        if($status){
            $v_data		=$result['data'];
			
			$p_url			=$v_data['authorization_url'];
			
			redirect($p_url,'refresh');
            //$data        = array('status'=>'success','link'=>$p_url);
            $msg        = array('status'=>'success','link'=>$p_url);
            
        }else{
            $message    = '';
            $message    .='Could not perform opearation, below might be reason why you are not been able to subscribe to a plan:'.br();
            $message    .= $result['message'];
            
            //$data        = array('status'=>'fail','link' => $message);
            $msg        = array('status'=>'fail','link' => $message);
        }

        // $msg[] = $data;
        echo json_encode($msg);
    }


    //Get PointItems
    public function count_all_point_items(){
		return $this->db->from('point_items')->count_all_results();
	} 
    
    public function get_all_point_items($page=NULL, $user_id =NULL){
        $msg    = array();
        $start = 0;
        $limit = 5;
        $total    =$this->count_all_point_items();

        if($page > $total) {

            $msg  = array('status'=>'end 1');
            echo json_encode($msg);
        }else{

            $start = ($page - 1) * $limit;
            $this->db->limit($limit,$start);
            $this->db->order_by('id','asc');

            $query      =$this->db->get('point_items');
            if($query->num_rows() > 0){
                $dis_data   = array();

                foreach($query->result_array() as $row){

                    $dis_id                             = $row['id'];
                    $point_name                         = $row['name'];
                    $point                              = $row['point'];
                    $point_image                        = $row['image_name'];
                    $point_image                        = base_url().'project_dir/point/'.$point_image;
                    


                    $dis_data[]      = array(
                        'dis_id'                            =>  $dis_id,
                        'point_name'                        =>  $point_name,
                        'point'                             =>  $point,
                        'point_image'                       =>  $point_image,                      
                    );
                }

                if (count($dis_data) != 0) {
                    $msg['status']      = 'success';
                    $msg['point_item']  = $dis_data;
                    echo json_encode($msg);
                }
            }
            else {
                $msg  = array('status' => 'end 2');
                echo json_encode($msg);
                
            }
            
            
        }
    }
    
    public function count_my_point_balance($user_id){
		$this->db->where('user_id',$user_id);
		$this->db->where('status','not_claim');
	
		$this->db->select_sum('point');
		$query		=$this->db->get('my_point');
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				return $row['point'];
			}
		}
		return 0;
	} 
    
    public function count_my_point_items($user_id){
		return $this->db->from('my_point')->where('user_id',$user_id)->count_all_results();
	} 
    
    public function get_my_point_items($page=NULL, $user_id =NULL){
        $msg    = array();
        $start = 0;
        $limit = 5;
        $total    =$this->count_my_point_items($user_id);

        if($page > $total) {

            $msg  = array('status'=>'end 1');
            echo json_encode($msg);
        }else{

            $start = ($page - 1) * $limit;
            $this->db->limit($limit,$start);
            $this->db->order_by('id','asc');
            $this->db->where('user_id',$user_id);

            $query      =$this->db->get('my_point');
            if($query->num_rows() > 0){
                $dis_data   = array();

                foreach($query->result_array() as $row){

                    $dis_id                             = $row['id'];
                    $user_id                            = $row['user_id'];
                    $downline_id                        = $row['downline_id'];
                    $point                              = $row['point'];
                    $plan_list_id                       = $row['plan_list_id'];
                    $status                             = $row['status'];
                    $time                               = $row['time'];


                    $downline_full_name     = $this->Users_db->get_user_full_name_by_id($downline_id);
                    $downline_user_name     = $this->Users_db->get_user_name_by_id($downline_id);
                    $downline_image         = $this->Users_db->get_image_name_by_id($downline_id);
                    $downline_image         = base_url().'project_dir/users/'.$downline_user_name.'/images/'.$downline_image;
                    


                    $dis_data[]      = array(
                        'dis_id'                            =>  $dis_id,
                        'user_id'                           =>  $user_id,
                        
                        'point'                             =>  $point,                      
                        'plan_list_id'                      =>  $plan_list_id,                      
                        'status'                            =>  $status,                      
                        'time'                              =>  $time,   

                        'downline_id'                       =>  $downline_id,
                        'downline_full_name'                =>  $downline_full_name,
                        'downline_user_name'                =>  $downline_user_name,
                        'downline_image'                    =>  $downline_image,

                    );
                }

                if (count($dis_data) != 0) {
                    $msg['status']      = 'success';
                    $msg['my_point_item']  = $dis_data;
                    echo json_encode($msg);
                }
            }
            else {
                $msg  = array('status' => 'end 2');
                echo json_encode($msg);
                
            }
            
            
        }
    }

}