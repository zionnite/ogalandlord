<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Favourite extends My_Controller {

    public function __construct(){
        parent::__construct();
    }


	public function toogle_favourte($user_id =NULL, $props_id =NULL,$route =NULL){

        $user_status                   = $this->Users_db->get_user_status($user_id);

        $data['validation']         	=$this->session->userdata('validation');

        if($data['validation']){

            if($user_status == 'user'){
          
                $action		= $this->Users_db->toogle_favourte($user_id,$props_id);
                if(!$action){
                    
                    $this->failed_alert_callbark('Database Busy, Could not perform operation, Pls Try Again Later!');
                }else{
                    
                    $this->success_alert_callbark($action);
                }
            }else{
                $this->failed_alert_callbark('This feature is available only to Users not Landlord ( or Agent)');
            }
            redirect('Welcome');
        }else{
            $this->failed_alert_callbark('You need to login to your account, before you can perform this action');
            redirect('Login');
        }
	}
}
