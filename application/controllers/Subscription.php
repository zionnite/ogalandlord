<?php 
class Subscription extends My_Controller{
    public function __construct(){
        parent::__construct();
    }


    public function view_plan($user_id =NULL){
        $this->Users_db->auth_user($user_id);
        $this->session_checker->my_session();
        $this->chat_online_tracker->check();
        $data['alert']			=$this->session->flashdata('alert');

      
		$data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
		$data['phone_no']         		=$this->session->userdata('phone_no');
		$data['user_img']         		=$this->session->userdata('user_img');
		$data['sex']         			=$this->session->userdata('sex');
		$data['age']         			=$this->session->userdata('age');
		$data['email']         			=$this->session->userdata('email');
		$data['full_name']         		=$this->session->userdata('full_name');
		$data['user_status']         	=$this->session->userdata('status');
        
        $data['content']                ='back_end/view_plan';
        
		$this->load->view($this->admin_layout,$data);
	}

    public function _join_sub_2($dis_id=NULL, $plan_id=NULL, $plan_code=NULL, $plan_amount=NULL, $email=NULL){
        $secure_key   =$this->Action->get_private_live_key();
        $url = "https://api.paystack.co/transaction/initialize";

        $fields = [
            'email' => $email,
            'amount' => $plan_amount,
            'plan' => $plan_code
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
     
        $response = curl_exec($ch);
        // curl_close($ch);

		
		// print_r($response);
		$result  = json_decode($response, true);
        $result  = array_change_key_case($result, CASE_LOWER);

        $status     = $result['status'];

        if($status){
            $v_data		=$result['data'];
			
			$p_url			=$v_data['authorization_url'];
			
			redirect($p_url,'refresh');
        }
    }



    public function join_sub($user_id=NULL, $plan_id=NULL, $plan_code=NULL){

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
            'callback_url'      => base_url().'Subscription/very_sub/'.$user_id,

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
        }else{
            $message    = '';
            $message    .='Could not perform opearation, below might be reason why you are not been able to subscribe to a plan:'.br();
            $message    .= $result['message'];
            $this->failed_alert_callbark($message);
            redirect('Subscription/view_plan/'.$user_id);
        }

    }

    public function very_sub($user_id=NULL){
        $secure_key   =$this->Action->get_private_live_key();

        $ref    = $this->input->get('reference');

        $curl = curl_init();
        
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/$ref",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 400,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer $secure_key",
            "Cache-Control: no-cache",
            ),
        ));
        
        $response = curl_exec($curl);

		$result  = json_decode($response, true);
        $result  = array_change_key_case($result, CASE_LOWER);

        $status     = $result['status'];



        if($status){
            $customer_code      = $result['data']['customer']['customer_code'];
            $customer_email     = $result['data']['customer']['email'];


            //plan
            $plan_id            = $result['data']['plan_object']['id'];
            $plan_code          = $result['data']['plan_object']['plan_code'];
            $plan_name          = $result['data']['plan_object']['name'];
            $plan_amount        = $result['data']['plan_object']['amount'];
            $plan_interval      = $result['data']['plan_object']['interval'];

            //authorization
            $auth_bin           = $result['data']['authorization']['bin'];
            $auth_last4         = $result['data']['authorization']['last4'];
            $auth_exp_month     = $result['data']['authorization']['exp_month'];
            $auth_exp_year      = $result['data']['authorization']['exp_year'];
            $auth_card_type     = $result['data']['authorization']['card_type'];

            $action = $this->Subscription_db->add_subscriber_detail(
                $customer_email,$customer_code,
                $plan_id, $plan_code,$plan_name,$plan_amount,$plan_interval,
                $auth_bin, $auth_last4, $auth_exp_month, $auth_exp_year, $auth_card_type
            );

            if($action == 'true'){
                $this->success_alert_callbark('Your subscription was successful');
                redirect('Subscription/my_plan/'.$user_id);
            }else if($action == 'false'){
                $this->failed_alert_callbark('Your subscription was successful, could not update your detail, please message admin for support');
                redirect('Subscription/my_plan/'.$user_id);
            }else if($action == 'user_not_exist'){
                $this->failed_alert_callbark('Your subscription was successful, could not update your detail, becuase this user email does not exist on our database, please message admin for support');
                redirect('Subscription/my_plan/'.$user_id);
            }

            
        }else{
            $this->failed_alert_callbark('Your subscription was not successful');
            redirect('Subscription/my_plan/'.$user_id);
        }

    }
        
    public function make_subscription(){
        $this->session_checker->my_session();
        $this->chat_online_tracker->check();
        $data['alert']			=$this->session->flashdata('alert');

      
		$data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
		$data['phone_no']         		=$this->session->userdata('phone_no');
		$data['user_img']         		=$this->session->userdata('user_img');
		$data['sex']         			=$this->session->userdata('sex');
		$data['age']         			=$this->session->userdata('age');
		$data['email']         			=$this->session->userdata('email');
		$data['full_name']         		=$this->session->userdata('full_name');
		$data['user_status']         	=$this->session->userdata('status');
        
        $data['content']    ='back_end/make_subscription';
		$this->load->view($this->admin_layout,$data);
	}




    public function list_sub($customer, $plan_id){
        $secure_key   =$this->Action->get_private_live_key();
        

        $curl = curl_init();
        
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/subscription?customer=$customer&perPage=5000&plan=$plan_id",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30*60*60,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer $secure_key",
            "Cache-Control: no-cache",
            ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);
        
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }

     
    }
    

    
    public function _djoin_sub(){
        $secure_key   =$this->Action->get_private_live_key();
        $url = "https://api.paystack.co/subscription";

        $fields = [
            'customer' => "CUS_q5vxhkn360sw987",
            'plan' => "PLN_rbymo57w1qjzict"
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
        $result = curl_exec($ch);
        curl_close($ch);
        echo $result;
    }


    public function date_me($number=NULL, $type){

        // $date = strtotime("+".$days." days", strtotime($date));
        // return  date("Y-m-d", $date);

        $date = strtotime("+".$number." ". $type, strtotime(date('Y-m-d')));
        echo 'Date is Now: '.  date("Y-m-d", $date);

        echo br();

        

        echo 'Date is Now: '. date('Y-m-d', strtotime("+".$number." ".$type));

    }

    public function _get_sub($sub_code){
        $secure_key   =$this->Action->get_private_live_key();

        $curl = curl_init();
        
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/subscription/$sub_code",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer $secure_key",
            "Cache-Control: no-cache",
            ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }

    }
    public function _create_customer($email=NULL){
        $url    = 'https://api.paystack.co/customer';

        $secure_key   =$this->Action->get_private_live_key();

        $fields = [
            'email' => $email,
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
        curl_close($ch);

		
		// print_r($response);
		$result  = json_decode($response, true);
        $result  = array_change_key_case($result, CASE_LOWER);

        $status     = $result['status'];

        if($status){
            $v_data		            = $result['data'];
			echo $customer_code			= $v_data['customer_code'];
			
			// $this->Subscriber_db->updater_subscriber_detail($id, $email, $customer_code);
        }
    }


    public function my_plan($user_id =NULL){
        $this->Users_db->auth_user($user_id);
        $this->session_checker->my_session();
        $this->chat_online_tracker->check();
        $data['alert']			=$this->session->flashdata('alert');

      
		$data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
		$data['phone_no']         		=$this->session->userdata('phone_no');
		$data['user_img']         		=$this->session->userdata('user_img');
		$data['sex']         			=$this->session->userdata('sex');
		$data['age']         			=$this->session->userdata('age');
		$data['email']         			=$this->session->userdata('email');
		$data['full_name']         		=$this->session->userdata('full_name');
		$data['user_status']         	=$this->session->userdata('status');


         
        $offset	=$this->uri->segment(3);
		$total	=$this->Subscription_db->count_subscriber($data['user_id']);
		$config['base_url'] = base_url().'Subscription/my_plan';
		$config['total_rows'] =$total;
		$config['per_page'] = 50;
		$config['first_link'] = '<li>First</li>';
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = false;
		$config['last_link'] = false;
		$config['first_tag_open'] = '<li class="page-link">';
		$config['first_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li class="page-link">';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li class="page-link">';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li class="page-link">';
		$config['num_tag_close'] = '</li>';
		$config['prev_link'] = '&laquo';
		$config['next_link'] = '&raquo';
		$config['prev_tag_open'] = '<li class="page-link">';
		$config['prev_tag_close'] = '</li>';
		$this->pagination->initialize($config);
		$this->pagination->cur_page = $offset;
		$data['pagination']	=$this->pagination->create_links();
		$data['per_page']	=$config['per_page'];
		$data['offset']		=$offset;
        $data['total']	    =$total;


        $data['page_name']      = $this->uri->segment(2);

        $data['get_sub']        =$this->Subscription_db->get_subscriber_2($data['user_id'], $data['offset'], $data['per_page']);

        
        $data['content']                ='back_end/my_plan';
        
		$this->load->view($this->admin_layout,$data);
	}
    
    public function sess_search_plan_id($qs){
		if($qs){
			$this->session->set_userdata('plan_id',$qs);
			return $qs;
		}elseif($this->session->userdata('plan_id')){
			$qs	=$this->session->userdata('plan_id');
			return $qs;
		}elseif($this->session->userdata('plan_id') != $qs){
			$qs	=$this->session->set_userdata('plan_id',$qs);
			return $qs;
		}else{
			$qs	=" ";
			return $qs;
		}
	}

    public function v_plan($id =NULL){
        $this->sess_search_plan_id($id);
        redirect('Subscription/plan');
    }

    public function plan(){
        $this->session_checker->my_session();
        $this->chat_online_tracker->check();
        $data['alert']			        =$this->session->flashdata('alert');

        $plan_id		                =$this->session->userdata('plan_id');

		$data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
		$data['phone_no']         		=$this->session->userdata('phone_no');
		$data['user_img']         		=$this->session->userdata('user_img');
		$data['sex']         			=$this->session->userdata('sex');
		$data['age']         			=$this->session->userdata('age');
		$data['email']         			=$this->session->userdata('email');
		$data['full_name']         		=$this->session->userdata('full_name');
		$data['user_status']         	=$this->session->userdata('status');


         
        $offset	=$this->uri->segment(3);
		$total	=$this->Subscription_db->count_subscription($data['user_id'], $plan_id);
		$config['base_url'] = base_url().'Subscription/plan';
		$config['total_rows'] =$total;
		$config['per_page'] = 50;
		$config['first_link'] = '<li>First</li>';
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = false;
		$config['last_link'] = false;
		$config['first_tag_open'] = '<li class="page-link">';
		$config['first_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li class="page-link">';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li class="page-link">';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li class="page-link">';
		$config['num_tag_close'] = '</li>';
		$config['prev_link'] = '&laquo';
		$config['next_link'] = '&raquo';
		$config['prev_tag_open'] = '<li class="page-link">';
		$config['prev_tag_close'] = '</li>';
		$this->pagination->initialize($config);
		$this->pagination->cur_page = $offset;
		$data['pagination']	=$this->pagination->create_links();
		$data['per_page']	=$config['per_page'];
		$data['offset']		=$offset;
        $data['total']	    =$total;


        $data['page_name']      = $this->uri->segment(2);
        $data['plan_id']        = $plan_id;

        $data['get_sub']        =$this->Subscription_db->get_subscription($data['user_id'], $plan_id, $data['offset'], $data['per_page']);

        
        $data['content']                ='back_end/plan';
        
		$this->load->view($this->admin_layout,$data);
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

        
		$result  = json_decode($response, true);
        $result  = array_change_key_case($result, CASE_LOWER);

        $status     = $result['status'];

        if($status){

            //update subscriber
            $action     = $this->Subscription_db->disable_sub($user_id, $plan_code, $sub_code, $email_token);
            if($action){

                $this->success_alert_callbark('Your subscription is now disabled');
                redirect('Subscription/plan');
            }else{
                $this->failed_alert_callbark('Your subscription is disabled but could not update information');
                redirect('Subscription/plan');
            }

        }
        else{
            $this->failed_alert_callbark('Could not disable subscription please try again later!');
            redirect('Subscription/plan');
        }


    }

    public function request_card_update($sub_code=NULL){
        $secure_key   =$this->Action->get_private_live_key();

        $curl = curl_init();
        
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/subscription/$sub_code/manage/link",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 400,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer $secure_key",
            "Cache-Control: no-cache",
            ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);


        

		$result  = json_decode($response, true);
        $result  = array_change_key_case($result, CASE_LOWER);

        $status     = $result['status'];

        if($status){
            $v_data		=$result['data'];
			$p_url	    =$v_data['link'];
			
			redirect($p_url,'refresh');

        }
        else{
            $this->failed_alert_callbark('Could not perform opearation, please try again later!');
            redirect('Subscription/plan');
        }

    }

    public function send_request_to_email($sub_code=NULL){

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
        $err = curl_error($curl);

		$result  = json_decode($response, true);
        $result  = array_change_key_case($result, CASE_LOWER);

        $status     = $result['status'];

        if($status){
           
            $this->success_alert_callbark('An email has been sent to your email address');
            redirect('Subscription/plan');
        }
        else{
            $this->failed_alert_callbark('Could not perform opearation, please try again later!');
            redirect('Subscription/plan');
        }

    }


}