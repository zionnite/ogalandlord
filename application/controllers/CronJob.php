<?php
class Cron_job extends My_Controller{
    private $CI;

    public function __construct(){
        parent::__construct();
        $this->CI    = &get_instance();
        $this->CI->load->model('Admin_db');
    }

    //from here please
    public function auto_calculate_points(){
        $users      = $this->MUser_db->get_user_limit_by_500();
        if(is_array($users)){
            foreach($users as $row){
                $user_id        = $row['id'];

                //get user Downline
                $get_downline   = $this->MUser_db->getDisMuserDownline($user_id);
                if(is_array($get_downline)){
                    foreach($get_downline as $low){
                        $downline_id        = $low['id'];
                        //check if user exist in my point, if false do, else ignore
                        $point_checker      = $this->MUser_db->check_ifDownlineExistInPoint($downline_id);
                        if(!$point_checker){
                            //get user subscribe plan
                            $downline_plan_id           = $this->Muser_db->get_user_plan_id_subscribe($downline_id);
                            $downline_plan_code         = $this->Muser_db->get_user_plan_code_subscribe($downline_id);
                            $total_amount_spent         = $this->Muser_db->revenue_amount($downline_id, $downline_plan_id);

                            //expected amount
                            $expected_amount            = $this->MUser_db->get_plan_expected_amount($downline_plan_id);
                            $plan_type                  = $this->MUser_db->get_user_subscription_plan_type($downline_plan_id);
                            $plan_interval              = $this->MUser_db->get_user_subscription_plan_interval($downline_plan_id);
                            $plan_amount                = $this->MUser_db->get_user_subscription_plan_amount($downline_plan_id);
                            $plan_invoice               = $this->MUser_db->get_user_subscription_plan_amount($downline_plan_id);
                            $plan_limit                 = $this->MUser_db->get_user_subscription_plan_limit($downline_plan_id);

                            //now check if total amount spent is greater than 8%
                            $percent            = (10/100) * $total_amount_spent;
                            $percent_100        = (100/100) * $total_amount_spent;
                            

                            if($plan_type == 'building'){
                                if($percent_100 == $expected_amount){
                                    if($plan_limit == '1'){
                                        //outright 10point
                                        $this->Muser_db->give_point($user_id,$downline_id, 10, $downline_plan_id);
                                    }
                                }
                                else {
                                    if($percent >= $expected_amount){
                                        if($plan_interval   == 'daily' && $plan_amount == '1000'){
                                            $this->Muser_db->give_point($user_id,$downline_id, 0.5, $downline_plan_id);
                                        }
                                        else if($plan_interval == 'daily'  && $plan_amount =='5000'){
                                            $this->Muser_db->give_point($user_id,$downline_id, 3, $downline_plan_id);
                                        }
                                        else if($plan_interval == 'daily'  && $plan_amount =='7000'){
                                            $this->Muser_db->give_point($user_id,$downline_id, 4, $downline_plan_id);
                                        }
                                        else if($plan_interval == 'daily'  && $plan_amount =='15000'){
                                            $this->Muser_db->give_point($user_id,$downline_id, 5, $downline_plan_id);
                                        }
                                    }
                                }
                            }else{

                                if($percent_100 == $expected_amount){
                                    if($plan_limit == '1'){
                                        $this->Muser_db->give_point($user_id,$downline_id, 2, $downline_plan_id);
                                    }
                                }
                                else{
                                    if($percent >= $expected_amount){

                                        if($plan_interval   == 'daily' && $plan_amount == '1000'){
                                            $this->Muser_db->give_point($user_id,$downline_id, 0.5, $downline_plan_id);
                                        }
                                        else if($plan_interval == 'daily'  && $plan_amount =='2000'){
                                            $this->Muser_db->give_point($user_id,$downline_id, 1, $downline_plan_id);
                                        }
                                        else if($plan_interval == 'daily'  && $plan_amount =='3000'){
                                            $this->Muser_db->give_point($user_id,$downline_id, 1, $downline_plan_id);
                                        }
                                        else if($plan_interval == 'daily'  && $plan_amount =='4000'){
                                            $this->Muser_db->give_point($user_id,$downline_id, 1, $downline_plan_id);
                                        }
                                    }
                                }
                                
                            }
                        }
                    }
                }
            }
        }
    }

    //auto fund
    public function auto_create_transaction_reciept(){
        $month_start = strtotime('first day of this month', time());
        $month_end = strtotime('last day of this month', time());

        $isFirstDay      = time() == $month_start; 
        $isLastDay       = time() == $month_end; 
        
        if($isFirstDay){
            $users      = $this->MUser_db->get_user_limit_by_500();
            if(is_array($users)){
                foreach($users as $row){
                    $user_id        = $row['id'];
                    //check if user id exist in tabe with current month and year
                    $reciept_checker        =$this-Subscription_db->reciept_checker($user_id);
                    if($reciept_checker){
                        //fund user
                        $this->auto_fund_user($user_id);
                    }else{
                        //create reciept
                        $this->create_reciept($user_id);
                    }
                }
            }
        }
    }

	public function auto_fund_user($user_id=NULL){
		$site_name					= $this->Action->get_site_name();
		$secure_key   				=$this->Action->get_private_live_key();

		$url = "https://api.paystack.co/transfer/";

        $payable_balance        =   $this->MUser_db->getMPayableBalance($user_id);
        $my_rec					=   $this->Subscription_db->get_my_transfer_rec($user_id);
		$my_amount				=   (int)$payable_balance*100;
		$my_ref					=   random_string('numeric', 16);

		$fields = [
			"source" 		=> "balance", 
			"currency"		=> "NGN",
			"reason" 		=> "Reward from using our platform OgaBliss (Bliss Legacy)", 
			"amount"	 	=> $my_amount, 
			"recipient" 	=> $my_rec,
			"reference" 	=> $my_ref
		];

		$fields_string = http_build_query($fields);

		//open connection
		$ch = curl_init();
				
		//set the url, number of POST vars, POST data
		curl_setopt($ch,CURLOPT_URL, $url);
		curl_setopt($ch,CURLOPT_POST, true);
		curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    "Authorization: Bearer $secure_key",
		    "Cache-Control: no-cache",
		));
				
		//So that curl_exec returns the contents of the cURL; rather than echoing it
		curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
				
		//execute post
		$response = curl_exec($ch);

				
		// print_r($response);
		$result  = json_decode($response, true);
		$result  = array_change_key_case($result, CASE_LOWER);
		// echo $response;

		$status		=$result['status'];
		if($status){
			
            $this->Subscription_db->update_transfer_rec($user_id);
            $this->MUser_db->update_user_payable_balance($user_id, -$my_amount);
            $this->Subscription_db->update_site_mlm_payable_balance(-$my_amount);

            $trans_type     = 'withdraw';
            $trans_status   = 'success';
            $trans_desc     = 'Reward from using our platform OgaBliss (Bliss Legacy)';
            
            $this->Subscription_db->add_to_mlm_transaction_history_2($user_id, $my_amount, $trans_type, $trans_desc, $trans_status);
            $this->Subscription_db->add_to_mlm_transaction_history_2('admin', $my_amount, $trans_type, $trans_desc, $trans_status);



			// echo 'ok';
					
		}else{
			// echo 'not_ok';
		}
			
            
	}

    public function create_reciept($user_id){
        $secure_key   				=$this->Action->get_private_live_key();
        $url = "https://api.paystack.co/transferrecipient";

        // $fields = [
        //     "type" => "nuban",
        //     "name" => "Tolu Robert",
        //     "account_number" => "01000000010",
        //     "bank_code" => "058",
        //     "currency" => "NGN"
        //     "metadata" => array(
		// 						"props_id" => $props_id,
		// 						"sender_id"	=> $user_id,
		// 						"type"		=>"user_rc",
		// 						"agent_id"	=> $agent_id
		// 					)
        // ];


        $my_bank_code			=$this->Users_db->get_user_bank_code($user_id);
		$my_bank_name			=$this->Users_db->get_user_bank_name($user_id);
		$my_account_num			=$this->Users_db->get_user_account_num($user_id);
		$my_account_name		=$this->Users_db->get_user_account_name($user_id);


        $fields = array(
            "type"                  =>  "nuban",
            "name"                  =>  $my_account_name,
            "account_number"        =>  $my_account_num,
            "bank_code"             =>  $my_bank_code,
            "currency"              =>  "NGN",
            "metadata"              =>  array(
                                            "props_id"=>    "",
                                            "sender_id"=>   "",
                                            "type"=>        "mlm_rc",
                                            "user_id"=>     $user_id,
                                        )   
        );

        $fields_string = http_build_query($fields);

        //open connection
        $ch = curl_init();
        
        //set the url, number of POST vars, POST data
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, true);
        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer $secure_key",
            "Cache-Control: no-cache",
        ));
        
        //So that curl_exec returns the contents of the cURL; rather than echoing it
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
        
        //execute post
        $response = curl_exec($ch);

		// print_r($fields);
		$result  = json_decode($response, true);
        $result  = array_change_key_case($result, CASE_LOWER);

        $status		=$result['status'];
		if($status){
			
			$error			=$result['data']['errors'];

			if($error == null){

				$success		=$result['data']['success'];

				for($i=0; $i<count($success); $i++){
					$rc_code				= $success[$i]['recipient_code'];
					$account_Number			= $success[$i]['details']['account_number'];
					$props_id				= $success[$i]['metadata']['props_id'];
					$sender_id				= $success[$i]['metadata']['sender_id'];
					$type					= $success[$i]['metadata']['type'];
					$dis_user_id    		= $success[$i]['metadata']['user_id'];

					$this->Subscription_db->update_transfer_rec_2($rc_code,$dis_user_id);
				}
			}
		}

    }

    //elapse
    public function subscription_elpased(){
        // get all subscription 
        $get_sub    = $this->Subscription_db->get_subscriber_list();
        if(is_array($get_sub)){
            foreach($get_sub as $row){
                $user_id                    =   $row['user_id'];
                $email                      =   $row['email'];
                $customer_code              =   $row['customer_code'];
                $subscription_code          =   $row['subscription_code'];
                $email_token                =   $row['email_token'];
                $plan_id                    =   $row['plan_id'];
                $plan_code                  =   $row['plan_code'];   
                $request_card_update        =   $row['request_card_update'];
                $sub_start_date             =   $row['sub_start_date'];
                $sub_end_date               =   $row['sub_end_date'];

                $elapse_time                =  strtotime($sub_end_date);

                $is_expired = time() >= $elapse_time;
                if ($is_expired) {
                    //disable subscription
                    $this->disable_sub($user_id, $plan_code, $subscription_code, $email_token);
                }

            }
        }
    }

    public function disable_sub($user_id=NULL, $plan_code=NULL, $sub_code=NULL, $email_token=NULL){
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

        
		$result     = json_decode($response, true);
        $result      = array_change_key_case($result, CASE_LOWER);
        
        $status     = $result['status'];
        if($status){
            //update subscriber
            $action     = $this->Subscription_db->disable_sub($user_id, $plan_code, $sub_code, $email_token);
            if($action){

                //subscription disable
            }else{
                
                //subscription disable, could not update information
            }
        }
        else{
            //Could not disable subscription
        }
    }


    ///usr/bin/curl https://legitcrypto.bigzhosting.website/v1/Calculate/system_auto_calculate
}