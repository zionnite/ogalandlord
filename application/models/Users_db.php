<?php
class Users_db extends My_Model{
    public function __construct(){
        parent::__construct();
    }

   public function get_all_users(){
        $query  =$this->db->get('users');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return false;
   }



   public function get_user_by_id($user_id){
        $this->db->where('id',$user_id);
        $query  =$this->db->get('users');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return false;
   }

   public function get_user_by_ref_code($ref_code){
        $this->db->where('m_ref_code',$ref_code);
        $query  =$this->db->get('users');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return false;
   }

   public function get_user_full_name_by_id($user_id){
        $this->db->where('id',$user_id);
        $query      =$this->db->get('users');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['full_name'];
            }
        }
   }

   public function get_user_id_by_email($email){
        $this->db->where('email',$email);
        $query      =$this->db->get('users');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['id'];
            }
        }
   }

   public function get_image_name_by_id($user_id){
        $this->db->where('id',$user_id);
        $query      =$this->db->get('users');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['image_name'];
            }
        }
   }

   public function get_email_by_id($user_id){
        $this->db->where('id',$user_id);
        $query      =$this->db->get('users');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['email'];
            }
        }
   }

   public function get_status_by_id($user_id){
        $this->db->where('id',$user_id);
        $query      =$this->db->get('users');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['status'];
            }
        }
   }

   public function get_user_name_by_id($user_id){
        $this->db->where('id',$user_id);
        $query      =$this->db->get('users');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['user_name'];
            }
        }
   }

   public function get_user_phone_by_id($user_id){
        $this->db->where('id',$user_id);
        $query      =$this->db->get('users');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['phone'];
            }
        }
   }

   public function get_user_current_balance($user_id){
        $this->db->where('id',$user_id);
        $query      =$this->db->get('users');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['current_balance'];
            }
        }
        return 0;
   }

   public function get_user_total_earning($user_id){
        $this->db->where('id',$user_id);
        $query      =$this->db->get('users');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['total_earning'];
            }
        }
        return 0;
   }

   public function get_user_id_by_user_name($user_name){
        $this->db->where('user_name',$user_name);
        $query      =$this->db->get('users');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['id'];
            }
        }
   }

   public function delete_user($user_id){
        $this->db->where('id',$user_id);
        $this->db->delete('users');
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
   }

   public function register_user($full_name,$email,$pass,$status,$phone,$user_name,$logo){

        $data       = array('full_name' =>$full_name,
                            'email'=>$email,
                            'password'=>md5($pass),
                            'status'=>$status,
                            'phone'=>$phone,
                            'date_created'=>date('Y-m-d H:i:s'),
                            'user_name'=>$user_name,
                            'image_name'=>$logo,

                        );
        $this->db->set($data);
        $this->db->insert('users');
        if($this->db->affected_rows() > 0){

            return true;
        }
        return false;
   }

   public function register_user_2($full_name,$email,$pass,$status,$phone,$user_name,$ref_id,$logo){

        $data       = array('full_name' =>$full_name,
                            'email'=>$email,
                            'password'=>md5($pass),
                            'status'=>$status,
                            'phone'=>$phone,
                            'date_created'=>date('Y-m-d H:i:s'),
                            'user_name'=>$user_name,
                            'is_refer'      => 'yes',
                            'referal_id'    => $ref_id,
                            'image_name'=>$logo,

                        );
        $this->db->set($data);
        $this->db->insert('users');
        if($this->db->affected_rows() > 0){

            return true;
        }
        return false;
   }


   public function register_user_3($full_name,$email,$pass,$status,$phone,$user_name,$url_code,$props_id,$logo){

        $data       = array('full_name' =>$full_name,
                            'email'=>$email,
                            'password'=>md5($pass),
                            'status'=>$status,
                            'phone'=>$phone,
                            'date_created'=>date('Y-m-d H:i:s'),
                            'user_name'=>$user_name,
                            'image_name'=>$logo,

                        );
        $this->db->set($data);
        $this->db->insert('users');
        $user_id    =$this->db->insert_id();
        
        if($this->db->affected_rows() > 0){

            //user detail on promter_refered table

            $promoter_id    = $this->Promoter_db->get_promoter_id_by_url_code(urldecode($url_code));
            $data   = array(
                'props_id'      => $props_id,
                'user_id'       => $user_id,
                'promoter_id'   => $promoter_id,
                'url_code'      => urldecode($url_code),
            );

            $this->db->set($data);
            $this->db->insert('promoter_refered');
            return true;
        }
        return false;
   }

    public function user_admin_creation($ref_code,$full_name,$email,$phone,$acc_name,$acc_number,$bank_code){

        $bank_name      = $this->Bank_db->get_bank_name_by_bank_code($bank_code);
        if($ref_code    == null){
            $data           = array(
                                    'status'            =>  'm_user',
                                    //'m_ref'             =>  $ref_code,
                                    'is_m_ref'          =>  'no',
                                    'full_name'         =>  $full_name,
                                    'email'             =>  $email,
                                    'phone'             =>  $phone,
                                    'user_name'         =>  $phone,
                                    'password'          =>  md5($phone),
                                    'account_name'      =>  $acc_name,
                                    'account_number'    =>  $acc_number,
                                    'bank_code'         =>  $bank_code,
                                    'bank_name'         =>  $bank_name,
                                    'isbank_verify'     =>  'no',
                                    'date_created'      =>  date('Y-m-d H:i:s'),
            );
        }else{
            $data           = array(
                                'status'            =>  'm_user',
                                'm_ref'             =>  $ref_code,
                                'is_m_ref'          =>  'yes',
                                'full_name'         =>  $full_name,
                                'email'             =>  $email,
                                'phone'             =>  $phone,
                                'user_name'         =>  $phone,
                                'password'          =>  md5($phone),
                                'account_name'      =>  $acc_name,
                                'account_number'    =>  $acc_number,
                                'bank_code'         =>  $bank_code,
                                'bank_name'         =>  $bank_name,
                                'isbank_verify'     =>  'no',
                                'date_created'      =>  date('Y-m-d H:i:s'),
        );
        }
        $this->db->set($data);
        $this->db->insert('users');
        $user_id    =$this->db->insert_id();
        if($this->db->affected_rows() > 0 ){

            $e_reg_no      =5190000000000;
            $e_reg_no_2    =$e_reg_no+$user_id;
            $data = ['m_ref_code' => $e_reg_no_2];
            $this->db->where('id',$user_id);
            $this->db->set($data);
            $this->db->update('users');

            $data4=array('m_dis_user_id' => $user_id);
            $this->session->set_userdata($data4);
            return	true;
        }
        return false;
    }

    public function loing_user($email,$pass){
        $this->db->where('user_name',$email);
        $this->db->where('password',md5($pass));

        $this->db->or_where('email',$email);
        $this->db->where('password',md5($pass));
														
		$query	=$this->db->get('users');
        if($query->num_rows() == 1){
            $row	=$query->row();
                
            $phone_no       	=$row->phone;
            $user_id        	=$row->id;
            $user_name	        =$row->user_name;
            $email				=$row->email;
            $user_img			=$row->image_name;
            $status         	=$row->status;
            $full_name			=$row->full_name;
			
            if($status == 'admin' || $status =='super_admin'){
                $admin_status   = true;
            }else{
                $admin_status   = false;
            }
            
				
            $data4=array(
                	'phone_no'=>$phone_no,
                	'user_id'=>$user_id,
                	'user_name'=>$user_name,
                	'user_img'=>$user_img,
                	'email'=>$email,
                	'full_name'=>$full_name,
                	'status'=>$status,
                	'validation'=>TRUE,
					'user_status'=>TRUE,
                	'online_status'=>'online',
                    'admin_status'=> $admin_status,
			);
            $this->session->set_userdata($data4);
            return	$data4;
        }else{
            return 	FALSE;
        }
    }

   public function login_admin($email,$pass){
         $this->db->where('user_name',$email);
        $this->db->where('password',md5($pass));

        $this->db->or_where('email',$email);
        $this->db->where('password',md5($pass));
														
		$query	=$this->db->get('users');
        if($query->num_rows() == 1){
            $row	=$query->row();
                
            $phone_no       	=$row->phone;
            $user_id        	=$row->id;
            $user_name	        =$row->user_name;
            $email				=$row->email;
            $user_img			=$row->image_name;
            $status         	=$row->status;
            $full_name			=$row->full_name;
			
            if($status == 'admin' || $status =='super_admin'){
                $admin_status   = true;
            }else{
                $admin_status   = false;
            }
            
				
            $data4=array(
                	'phone_no'=>$phone_no,
                	'user_id'=>$user_id,
                	'user_name'=>$user_name,
                	'user_img'=>$user_img,
                	'email'=>$email,
                	'full_name'=>$full_name,
                	'status'=>$status,
                	'validation'=>TRUE,
					'user_status'=>TRUE,
                	'online_status'=>'online',
                    'admin_status'=> $admin_status,
			);
            $this->session->set_userdata($data4);
            return	$data4;
        }else{
            return 	FALSE;
        }
   }

       
    public function check_if_email_exist($email){
        $this->db->where('email',$email);
        $this->db->get('users');
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
    }
       
    public function check_if_email_exist_request_password_tbl($email){
        $user_name      =$this->email_to_user_name($email);
        $this->db->where('user_name',$user_name);
        $this->db->get('request_passord');
        if($this->db->affected_rows() > 0){
            return TRUE;
        }else{
            return FALSE;
        }
    }


    public function email_to_user_name($email){
		$query	=$this->db->get_where('users',array('email'=>$email));
		if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['id'];
            }
		}else{
			return FALSE;
		}
	}
   
	public function email_to_all_detail($email){
		$query	=$this->db->get_where('users',array('email'=>$email));
		if($query->num_rows() > 0){
			return $query->result_array();
		}else{
			return FALSE;
		}
	}


    public function request_password($email){
        /*==============set request Password on ==========*/
        $user_name      =$this->email_to_user_name($email);
        $data           =array('user_name'=>$user_name,'request_password'=>'Yes');
        $this->db->set($data);
        $this->db->insert('request_passord');
        /*==============End set request Password on ==========*/
    }


    public function reset_request_password($email){
        /*==============set request Password off by deleting it ==========*/
        $user_name      =$this->email_to_user_name($email);
        $this->db->where('user_name',$user_name);
        $this->db->delete('request_passord');
        /*==============End set request Password on ==========*/
    }


    public function getRestPassword_Permission($user_name){
		$this->db->get_where('request_passord',array('user_name'=>$user_name,'request_password'=>'Yes'));
		if($this->db->affected_rows() > 0){
			return true;
		}
        return false;
	}

        public function confirm_reset_password($password,$user_name){
        $data	=array('password'=>md5($password));
		$this->db->set($data);
        $this->db->where('id',$user_name);
		$this->db->update('users');
		if($this->db->affected_rows() > 0){
            $this->db->where('user_name',$user_name);
		    $this->db->delete('request_passord');
			return TRUE;
		}else{
			return FALSE;
		}
    }

    public function update_detail($user_id, $full_name, $email, $phone, $age, $sex, $address){
        $data       = array('full_name' =>$full_name,'email'=>$email,'phone'=>$phone,'age'=>$age,'sex'=>$sex,'address'=>$address);
        $this->db->set($data);
        $this->db->where('id',$user_id);
        $this->db->update('users');
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
    }

    public function update_bank_detail($user_id, $account_name,$account_number,$bank_code){

        $bank_name  = $this->Bank_db->get_bank_name_by_bank_code($bank_code);

        $data       = array('bank_code' =>$bank_code,
                            'bank_name'=>$bank_name,
                            'account_number'=>$account_number,
                            'account_name'=>$account_name,
                            'isbank_verify'=>'no'
                        );
        $this->db->set($data);
        $this->db->where('id',$user_id);
        $this->db->update('users');
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
    }

    public function update_profile_pic($user_name,$file_name){
        $data       =array('image_name'=>$file_name);
        $this->db->set($data);
        $this->db->where('user_name',$user_name);
        $this->db->update('users');

        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
    }


    public function check_if_i_favourite($user_id,$props_id){
        $this->db->where('user_id',$user_id);
        $this->db->where('prop_id',$props_id);

        $query   =$this->db->get('favourite');
        if($query->num_rows() > 0){
            return true;
        }
        return false;
    }


    public function delete_favourite($user_id, $props_id){

        $this->db->where('user_id',$user_id);
        $this->db->where('prop_id',$props_id);
        $this->db->delete('favourite');

        if($this->db->affected_rows() > 0){
            return "Property removed to Favourite List";;
        }
        return false;
    }

    public function insert_favourite($user_id, $props_id){

        $data       = array('user_id' => $user_id,'prop_id'=>$props_id);
        $this->db->set($data);
        $this->db->insert('favourite');

        if($this->db->affected_rows() > 0){
            return "Property added to Favourite List";
        }
        return false;
    }



    public function toogle_favourte($user_id,$props_id){
        if($this->check_if_i_favourite($user_id,$props_id)){
            //delete
            return $this->delete_favourite($user_id,$props_id);
        }else{
            //insert
            return $this->insert_favourite($user_id,$props_id);
        }

    }
    


   	public function count_all_users(){
		return $this->db->from('users')->where('status','user')->count_all_results();
	}
    public function get_all_users_paginated($offset,$per_page){
        $this->db->where('status','user');

        $this->db->limit($per_page,$offset);
        $query  =$this->db->get('users');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return false;
    }


   	public function count_all_agents(){
		return $this->db->from('users')->where('status','landlord')->or_where('status','agent')->count_all_results();
	}
    public function get_all_agents_paginated($offset,$per_page){
        $this->db->where('status','landlord');
        $this->db->or_where('status','agent');

        $this->db->limit($per_page,$offset);
        $query  =$this->db->get('users');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return false;
    }

    public function ban_user($id){
        $data   = array('login_status'=>'ban');
        $this->db->set($data);
        $this->db->where('id',$id);
        $this->db->update('users');
        if($this->db->affected_rows() > 0){
            return 'User Added to Ban List';
        }
        return false;
    }

    public function unban_user($id){
        $data   = array('login_status'=>'normal');
        $this->db->set($data);
        $this->db->where('id',$id);
        $this->db->update('users');
        if($this->db->affected_rows() > 0){
            return 'User Removed from Ban List';
        }
        return false;
    }

    public function check_if_user_isBanned($id){
        $this->db->where('id',$id);
        $this->db->where('login_status','ban');
        $query      =$this->db->get('users');
        if($query->num_rows() > 0){
            return true;
        }
        return false;
    }

    public function toggle_ban_user($id){
        if($this->check_if_user_isBanned($id)){
            return $this->unban_user($id);
        }else{
            return $this->ban_user($id);
        }
        return false;

    }
    

    public function change_user_password($pass, $dis_user_id){
        $data       =array('password'=>md5($pass));
        $this->db->set($data);
        $this->db->where('id',$dis_user_id);
        $this->db->update('users');
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
    }

    public function count_all_manager(){
		return $this->db->from('users')->where('status','admin')->count_all_results();
	}
    public function get_all_manager(){
        $this->db->where('status','admin');
        $query  =$this->db->get('users');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return false;
    }

    public function remove_manager($agent_id){
        $this->db->where('id',$agent_id);
        $this->db->delete('users');
         if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
    }

    public function isBankVerify($user_id){
        $this->db->where('isbank_verify','yes');
        $this->db->where('id',$user_id);
        $query      =$this->db->get('users');
        if($query->num_rows() > 0){
            return true;
        }
        return false;
    }

    public function get_isBankVerify($user_id){
        $this->db->where('id',$user_id);
        $query      =$this->db->get('users');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['isbank_verify'];
            }
        }
        return false;
    }

    public function update_bank_verify_status($user_id){
         $data       =array('isbank_verify'=>'yes');
        $this->db->set($data);
        $this->db->where('id',$user_id);
        $this->db->update('users');
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
    }
    
    public function get_user_bank_code($user_id){

        $this->db->where('id',$user_id);
        $query      =$this->db->get('users');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['bank_code'];
            }
        }
        return false;
    }
    
    public function get_user_bank_name($user_id){

        $this->db->where('id',$user_id);
        $query      =$this->db->get('users');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['bank_name'];
            }
        }
        return false;
    }
    
    public function get_user_account_num($user_id){

        $this->db->where('id',$user_id);
        $query      =$this->db->get('users');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['account_number'];
            }
        }
        return false;
    }
    
    public function get_user_account_name($user_id){

        $this->db->where('id',$user_id);
        $query      =$this->db->get('users');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['account_name'];
            }
        }
        return false;
    }

    public function checkIfReferred($user_id){
        $this->db->where('id',$user_id);
        $this->db->where('is_refer','yes');

        $query  =$this->db->get('users');
        if($query->num_rows() > 0){
            return true;
        }
        return false;
    }

    public function get_referral_status($user_id){
        $this->db->where('id',$user_id);
        $query      =$this->db->get('users');

        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['is_refer'];
            }
        }
        return false;
    }

    public function get_referral_id($user_id){
        $this->db->where('id',$user_id);
        $query      =$this->db->get('users');

        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['referal_id'];
            }
        }
        return false;
    }

    public function get_user_status($user_id){
        $this->db->where('id',$user_id);
        $query      =$this->db->get('users');

        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['status'];
            }
        }
        return false;
    }

    //get_user_by_id
    public function is_ban($email){
        $this->db->where('login_status','ban');
        $this->db->where('email',$email);
        $query  = $this->db->get('users');
        if($query->num_rows() > 0){
            return true;
        }
        return false;
    }

    public function check_if_username_exist($user_name){
        $this->db->where('user_name',$user_name);
        $query  = $this->db->get('users');
        if($query->num_rows() > 0){
            return true;
        }
        return false;
    }

    public function check_if_user_exist($ref_id){
        $this->db->where('id',$ref_id);
        $query  = $this->db->get('users');
        if($query->num_rows() > 0){
            return true;
        }
        return false;
    }

    public function verify_user_status($ref_id){
        $data   = array('verify_status'=>'yes');
        $this->db->set($data);
        $this->db->where('id',$ref_id);
        $this->db->update('users');
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
    }


    public function check_if_user_verify($email){
        $this->db->where('verify_status','yes');
        $this->db->where('email',$email);
        $query  = $this->db->get('users');
        if($query->num_rows() > 0){
            return true;
        }
        return false;
    }

    public function get_my_ref($user_id){
        $this->db->where('referal_id',$user_id);
        $query  =$this->db->get('users');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return false;
    }

    public function auth_user($user_id){
        $this->db->where('id',$user_id);
        
		$query	=$this->db->get('users');
        if($query->num_rows() == 1){
            $row	=$query->row();
                
            $phone_no       	=$row->phone;
            $user_id        	=$row->id;
            $user_name	        =$row->user_name;
            $email				=$row->email;
            $user_img			=$row->image_name;
            $status         	=$row->status;
            $full_name			=$row->full_name;
			
            if($status == 'admin' || $status =='super_admin'){
                $admin_status   = true;
            }else{
                $admin_status   = false;
            }
            
				
            $data4=array(
                	'phone_no'=>$phone_no,
                	'user_id'=>$user_id,
                	'user_name'=>$user_name,
                	'user_img'=>$user_img,
                	'email'=>$email,
                	'full_name'=>$full_name,
                	'status'=>$status,
                	'validation'=>TRUE,
					'user_status'=>TRUE,
                	'online_status'=>'online',
                    'admin_status'=> $admin_status,
			);
            $this->session->set_userdata($data4);
            return	$data4;
        }else{
            return 	FALSE;
        }
   }
}