<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends My_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$this->session_checker->my_session();
        $this->chat_online_tracker->check();

		$data['content'] ='front_end/index';
		$this->load->view($this->layout,$data);
	}

    public function view_message(){
		$this->session_checker->my_session();
        $this->chat_online_tracker->check();
		$data['alert']					=$this->session->flashdata('alert');


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
		$total	=$this->Chat_db->count_chat_head($data['user_id']);
		$config['base_url'] = base_url().'Message/view_message';
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

        $data['get_chat']    =$this->Chat_db->get_chat_head($data['user_id'],$data['offset'],$data['per_page']);

        

		
		$data['content'] 		='back_end/view_message';
		$this->load->view($this->admin_layout,$data);
	}


        
    public function sess_sender_id($qs){
		if($qs){
			$this->session->set_userdata('sender',$qs);
			return $qs;
		}elseif($this->session->userdata('sender')){
			$qs	=$this->session->userdata('sender');
			return $qs;
		}elseif($this->session->userdata('sender') != $qs){
			$qs	=$this->session->set_userdata('sender',$qs);
			return $qs;
		}else{
			$qs	=" ";
			return $qs;
		}
	}
        
    public function sess_reciever_id($qs){
		if($qs){
			$this->session->set_userdata('reciever',$qs);
			return $qs;
		}elseif($this->session->userdata('reciever')){
			$qs	=$this->session->userdata('reciever');
			return $qs;
		}elseif($this->session->userdata('reciever') != $qs){
			$qs	=$this->session->set_userdata('reciever',$qs);
			return $qs;
		}else{
			$qs	=" ";
			return $qs;
		}
	}
        
    public function sess_props_id($qs){
		if($qs){
			$this->session->set_userdata('props_id',$qs);
			return $qs;
		}elseif($this->session->userdata('props_id')){
			$qs	=$this->session->userdata('props_id');
			return $qs;
		}elseif($this->session->userdata('props_id') != $qs){
			$qs	=$this->session->set_userdata('props_id',$qs);
			return $qs;
		}else{
			$qs	=" ";
			return $qs;
		}
	}

    public function reply_user($sender=NULL,$reciever=NULL,$props_id =NULL){
        $this->sess_sender_id($sender);
        $this->sess_reciever_id($reciever);
        $this->sess_props_id($props_id);

        redirect('Message/quick_msg');
    }

	public function quick_msg(){
        $this->session_checker->my_session();
		$this->chat_online_tracker->check();

		$data['alert']					=$this->session->flashdata('alert');
		
		

        $data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
		$data['phone_no']         		=$this->session->userdata('phone_no');
		$data['user_img']         		=$this->session->userdata('user_img');
		$data['sex']         			=$this->session->userdata('sex');
		$data['age']         			=$this->session->userdata('age');
		$data['email']         			=$this->session->userdata('email');
		$data['full_name']         		=$this->session->userdata('full_name');
		$data['user_status']         	=$this->session->userdata('status');


        $data['sender']		            =$this->session->userdata('sender');
		$data['reciever']	            =$this->session->userdata('reciever');
        $data['props_id']               =$this->session->userdata('props_id');


        //automatic update my read_status of message
        $this->Chat_db->update_my_read_count($data['user_id']);

        $offset	=$this->uri->segment(3);
		// $total	=$this->Chat_db->count_message($data['user_id']);
		$total	=$this->Chat_db->count_message($data['sender'],$data['reciever']);
		$config['base_url'] = base_url().'Message/quick_msg';
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
        //$data['news']       =$this->Admin_db->get_post($data['offset'],$data['per_page']);
        $data['total']	=$total;

        // $data['get_chat']    =$this->Chat_db->get_chat_message($data['user_id'],$data['offset'],$data['per_page']);
        $data['get_chat']    =$this->Chat_db->get_chat_message($data['sender'],$data['reciever'],$data['offset'],$data['per_page']);

        

        // print_r($data['get_chat']);
        $data['content'] ='back_end/reply_user';
		$this->load->view($this->admin_layout_2,$data);
    }

	/*JQuery*/
	public function send_msg(){
        $msg_body         		    	=$this->input->post('msg');
		$reciever_id		        	=$this->input->post('receiver');
		$sender_id		        		=$this->input->post('sender');
        $props_id                       =$this->input->post('props_id');

        /*Send to Database*/
        $insert =$this->Chat_db->add_to_chat($sender_id,$reciever_id,$msg_body,$props_id);
        if($insert){
            $this->success_alert_callbark('Message Sent...');
        }else{
            $this->failed_alert_callbark('Database Busy, Could not perform operation, Pls Try Again Later!');
		}
		redirect('Message/reply_user/'.$reciever_id.'/'.$sender_id.'/'.$props_id);
    
    }

	public function chat_msg($sender_id=NULL,$reciever_id=NULL){
        $user_id      = $this->session->userdata('user_id');;
        $get_msg      = $this->Chat_db->get_chat($sender_id,$reciever_id);
        if(is_array($get_msg)){
            foreach($get_msg as $row){
                $msg_id                 	=$row['id'];
                $dis_sender                 =$row['sender'];
                $dis_reciever               =$row['reciever'];
                $msg  		                =$row['message'];
                $time                   	=$row['time'];
                $status                 	=$row['status'];
                $date_created              	=$row['date_created'];


				$chat   ='';
                
                                
                if($dis_sender != $user_id){
                    
					$chat   ='';
                    $chat   .='<div class="chat_text sender">';
                    $chat   .= $msg;
                    // $chat   .='<div>By '.$sender.'</div>';
                    $chat   .='</div>';
                    echo $chat;
               }elseif($dis_sender == $user_id){
                   

					$chat   ='';
                    $chat   .='<div class="chat_text reciever">';
                    $chat   .= $msg;
                    // $chat   .='<div>By '.$sender.'</div>';
                    $chat   .='</div>';
                    echo $chat;
                }
                
                
            }
        }else{
            echo '';
        }
    }


}