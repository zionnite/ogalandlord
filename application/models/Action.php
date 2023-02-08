<?php
class Action extends My_Model{
    public function __construct(){
        parent::__construct();
    }


   public function get_site_email(){
        $query      =$this->db->get('site_setting');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['site_email'];
            }
        }
        return false;
   }

   public function get_site_name(){
        $query      =$this->db->get('site_setting');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['site_name'];
            }
        }
        return false;
   }

   public function get_site_g_name(){
        $query      =$this->db->get('site_setting');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['site_g_name'];
            }
        }
        return false;
   }

   public function get_site_g_pass(){
        $query      =$this->db->get('site_setting');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['site_g_pass'];
            }
        }
        return false;
   }

   public function get_site_logo(){
        $query      =$this->db->get('site_setting');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['site_logo'];
            }
        }
        return false;
   }

   public function get_site_logo_2(){
        $query      =$this->db->get('site_setting');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['site_logo_2'];
            }
        }
        return false;
   }

   public function get_site_keyword(){
        $query      =$this->db->get('site_setting');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['site_keyword'];
            }
        }
        return false;
   }

   public function get_site_desc(){
        $query      =$this->db->get('site_setting');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['site_desc'];
            }
        }
        return false;
   }

   public function get_site_add(){
        $query      =$this->db->get('site_setting');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['site_address'];
            }
        }
        return false;
   }

   public function get_site_phone(){
        $query      =$this->db->get('site_setting');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['site_phone'];
            }
        }
        return false;
   }

   public function get_site_id(){
        $query      =$this->db->get('site_setting');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['id'];
            }
        }
        return false;
   }


   public function add_site_email($email){
        $id     = $this->get_site_id();

        $data   = array('site_email' => $email);
        $this->db->set($data);
        $this->db->where('id',$id);
        $this->update('site_setting');
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
   }

   public function add_site_name($name){
        $id     = $this->get_site_id();

        $data   = array('site_name' => $name);
        $this->db->set($data);
        $this->db->where('id',$id);
        $this->update('site_setting');
   }

   public function add_site_g_name($name){
        $id     = $this->get_site_id();

        $data   = array('site_g_name' => $name);
        $this->db->set($data);
        $this->db->where('id',$id);
        $this->update('site_setting');
   }

   public function add_site_g_pass($name){
        $id     = $this->get_site_id();

        $data   = array('site_g_pass' => $name);
        $this->db->set($data);
        $this->db->where('id',$id);
        $this->update('site_setting');
   }

   public function add_site_logo($name){
        $id     = $this->get_site_id();

        $data   = array('site_logo' => $name);
        $this->db->set($data);
        $this->db->where('id',$id);
        $this->update('site_setting');
   }

   public function add_site_add($name){
        $id     = $this->get_site_id();

        $data   = array('site_address' => $name);
        $this->db->set($data);
        $this->db->where('id',$id);
        $this->update('site_setting');
   }

   public function add_site_phone($name){
        $id     = $this->get_site_id();

        $data   = array('site_phone' => $name);
        $this->db->set($data);
        $this->db->where('id',$id);
        $this->update('site_setting');
   }


    public function get_public_live_key(){
        $query      =$this->db->get('site_setting');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['public_live_key'];
            }
        }
        return false;
    }

    public function get_private_live_key(){
        $query      =$this->db->get('site_setting');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['private_live_key'];
            }
        }
        return false;
    }


    public function get_referal_com(){
        $query      =$this->db->get('site_setting');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['referal_com'];
            }
        }
        return false;
    }

    public function get_agent_com(){
        $query      =$this->db->get('site_setting');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['agent_com'];
            }
        }
        return false;
    }

    public function get_insurance_com(){
        $query      =$this->db->get('site_setting');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['insurance_com'];
            }
        }
        return false;
    }

    public function get_fb_link(){
        $query      =$this->db->get('site_setting');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['fb_link'];
            }
        }
        return false;
    }

    public function get_tw_link(){
        $query      =$this->db->get('site_setting');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['tw_link'];
            }
        }
        return false;
    }

    public function get_ig_link(){
        $query      =$this->db->get('site_setting');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['ig_link'];
            }
        }
        return false;
    }

    public function get_insurance_bank_code(){
        $query      =$this->db->get('site_setting');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['bank_code'];
            }
        }
        return false;
    }

    public function get_insurance_bank_name(){
        $query      =$this->db->get('site_setting');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['bank_name'];
            }
        }
        return false;
    }

    public function get_insurance_account_number(){
        $query      =$this->db->get('site_setting');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['account_number'];
            }
        }
        return false;
    }

    public function get_insurance_account_name(){
        $query      =$this->db->get('site_setting');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['account_name'];
            }
        }
        return false;
    }

   //Add

   public function insert_site_setting($email,$site_name,$g_name,$g_pass,$logo,$site_add,$site_phone){
        $action     = $this->add_site_email($email);
        if($action){
            $this->add_site_name($site_name);
            $this->add_site_g_name($g_name);
            $this->add_site_g_pass($g_pass);
            $this->add_site_logo($logo);
            $this->add_site_add($site_add);
            $this->add_site_phone($site_phone);
            

            return true;
        }
        return false;
       
   }

    public function update_logo($site_name,$file_name_1,$file_name_2){

        $id     = $this->get_site_id();

        $data   = array('site_name'=>$site_name,'site_logo'=>$file_name_1,'site_logo_2'=>$file_name_2);
        $this->db->set($data);
        $this->db->where('id',$id);
        $this->db->update('site_setting');
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
    }


    public function update_site_detail($site_email,$phone,$gmail,$gpass,$site_keyword,$site_desc,$site_address){
        $id     = $this->get_site_id();
        
        $data   =array('site_email'=>$site_email,
                       'site_phone'=>$phone,
                       'site_g_name'=>$gmail,
                       'site_g_pass'=>$gpass,
                       'site_keyword'=>$site_keyword,
                       'site_desc'   => $site_desc,
                       'site_address' => $site_address
                    );

        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('site_setting');

        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
    }

    public function update_payment_api($public_key,$private_key){
        $id     = $this->get_site_id();
        
        $data   =array('public_live_key'=>$public_key,
                       'private_live_key'=>$private_key
                    );

        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('site_setting');

        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
    }

    public function update_payment_commission($ref_com,$agent_com,$ins_com){
        $id     = $this->get_site_id();
        
        $data   =array('referal_com'=>$ref_com,
                       'agent_com'=>$agent_com,
                       'insurance_com'=>$ins_com
                    );

        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('site_setting');

        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
    }

    public function update_social_link($fb_link,$tw_link,$ig_link){
        $id     = $this->get_site_id();
        
        $data   =array('fb_link'=>$fb_link,
                       'tw_link'=>$tw_link,
                       'ig_link'=>$ig_link
                    );

        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('site_setting');

        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
    }

    public function add_bank_code($bank_name,$bank_code){
      
        $data   =array('bank_name'=>$bank_name,
                       'bank_code'=>$bank_code,
                    );

        $this->db->set($data);
        $this->db->insert('list_bank');

        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
    }

    public function remove_bank($id){
        $this->db->where('id',$id);
        $this->db->delete('list_bank');
        
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
    }

    public function get_bank_list(){
        $query  =$this->db->get('list_bank');

        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return false;
    }

    public function check_if_code_exist($id){
        $this->db->where('id',$id);
        $query  =$this->db->get('list_bank');

        if($query->num_rows() > 0){
            return true;
        }
        return false;
    }

    public function count_bank(){

        return $this->db->from('list_bank')->count_all_results();
    }


    public function add_state($state){
        
        $data   =array('name'=>$state,
                    );

        $this->db->set($data);
        $this->db->insert('state');

        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
    }

    public function remove_state($id){
        $this->db->where('id',$id);
        $this->db->delete('state');
        
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
    }

    public function get_state_list(){
        $query  =$this->db->get('state');

        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return false;
    }

    public function count_state(){

        return $this->db->from('state')->count_all_results();
    }




    public function add_sub_state($sub_state_name, $state_id){
        
        $data   =array('name'=>$sub_state_name,
                       'state_id'   =>$state_id,
                    );

        $this->db->set($data);
        $this->db->insert('sub_state');

        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
    }

    public function remove_sub_state($id,$state_id){
        $this->db->where('id',$id);
        $this->db->where('state_id',$state_id);
        $this->db->delete('sub_state');
        
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
    }

    public function get_sub_state_list($state_id){
        $this->db->where('state_id',$state_id);
        $query  =$this->db->get('sub_state');

        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return false;
    }

    public function count_sub_state_by_state_id($id){
        $this->db->where('state_id',$id);
        return $this->db->from('sub_state')->count_all_results();
    }




    public function add_property_type($name){
        
        $data   =array('name'=>$name,
                    );

        $this->db->set($data);
        $this->db->insert('types_of_property');

        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
    }

    public function remove_property_type($id){
        $this->db->where('id',$id);
        $this->db->delete('types_of_property');
        
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
    }

    public function get_property_type_list(){
        $query  =$this->db->get('types_of_property');

        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return false;
    }

    public function count_property_type_list(){

        return $this->db->from('types_of_property')->count_all_results();
    }


    public function add_sub_property_type($name,$type_id){
        
        $data   =array('name'=>$name,
                       'type_id'=>$type_id,
                    );

        $this->db->set($data);
        $this->db->insert('sub_types_of_propery');

        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
    }

    public function remove_sub_property_type($id){
        $this->db->where('id',$id);
        $this->db->delete('sub_types_of_propery');
        
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
    }

    public function get_sub_property_type($type_id){
        $this->db->where('type_id',$type_id);
        $query  =$this->db->get('sub_types_of_propery');

        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return false;
    }

    public function count_sub_property_type_by_id($id){
        $this->db->where('type_id',$id);
        return $this->db->from('sub_types_of_propery')->count_all_results();
    }


    public function add_manager($file_name,$user_name,$full_name,$password,$phone,$age,$sex,$email){

        $data       =array('user_name'      =>$user_name,
                           'full_name'      =>$full_name,
                           'password'       => md5($password),
                           'phone'          =>$phone,
                           'age'            =>$age,
                           'sex'            =>$sex,
                           'image_name'     => $file_name,
                           'email'          =>$email,
                           'status'         =>'admin',
                           'date_created'   => date('Y-m-d H:i:s'),
                           'verify_status'  =>'yes',
                        );
        $this->db->set($data);
        $this->db->insert('users');
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
    }
    

    public function update_insurance_bank_detail($account_name,$account_number,$bank_code){

        $id         = $this->get_site_id();
        $bank_name  = $this->Bank_db->get_bank_name_by_bank_code($bank_code);

        $data       = array('bank_code' =>$bank_code,
                            'bank_name'=>$bank_name,
                            'account_number'=>$account_number,
                            'account_name'=>$account_name,
                            'isbank_verify' =>'no'
                        );
        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('site_setting');
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
    }


    public function isInsuranceBankVerify(){

        $id         = $this->get_site_id();
        $this->db->where('isbank_verify','yes');
        $this->db->where('id',$id);
        $query      =$this->db->get('site_setting');
        if($query->num_rows() > 0){
            return true;
        }
        return false;
    }

    public function get_isInsuranceBankVerify(){

        $id         = $this->get_site_id();
        $this->db->where('id',$id);
        $query      =$this->db->get('site_setting');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['isbank_verify'];
            }
        }
        return false;
    }

    public function update_insurance_bank_verify_status(){
        
        $id         = $this->get_site_id();
        $data       =array('isbank_verify'=>'yes');
        $this->db->set($data);
        $this->db->where('id',$id);
        $this->db->update('site_setting');
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
    }



    public function get_site_total_earning(){

        $id         = $this->get_site_id();
        $this->db->where('id',$id);
        $query      =$this->db->get('site_setting');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['site_earning'];
            }
        }
        return 0;
    }


    public function get_insurance_total_earning(){

        $id         = $this->get_site_id();
        $this->db->where('id',$id);
        $query      =$this->db->get('site_setting');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['insurance_earning'];
            }
        }
        return 0;
    }

}