<?php
class Chat_online_tracker{
	private $CI;
	public function __construct(){
		$this->CI	=& get_instance();
	}
	public function check(){
        $user_id    		=$this->CI->session->userdata('user_id');
        $uri_segment        =$this->CI->uri->segment(2);
        
        if($uri_segment == 'quick_msg'){
            //add to Online List in Chat room
            $this->CI->Chat_db->add_to_chat_online_tracker($user_id);
        }elseif($uri_segment != 'quick_msg'){
            $this->CI->Chat_db->remove_from_chat_online_tracker($user_id);
        }
	}
}