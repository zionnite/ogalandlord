<?php
class Session_checker{
	private $CI;
	public function __construct(){
		$this->CI	=& get_instance();
	}
	public function my_session(){
        $data['userid']			=$this->CI->session->userdata('user_id');
		$data['username']		=$this->CI->session->userdata('phone_no');
		if($this->CI->session->userdata('validation') == FALSE){
			$data['alert']		='<p class="alert alert-danger" role="alert">Session Has Expire,Pls Login To continue</p>';
				$this->CI->session->set_flashdata('alert',$data['alert']);
				redirect(base_url().'Login');
		}else{
			$user	=$this->CI->session->userdata('user_name');
			return $user;
		}
	}
	public function my_session2(){
		$this->CI->session->userdata('admin_status');
        $data['userid']			=$this->CI->session->userdata('userid');
		$data['username']		=$this->CI->session->userdata('username');
		if($this->CI->session->userdata('validation') == FALSE){
			$data['alert']		='<p class="alert alert-danger" role="alert">Session Has Expire,Pls Login To continue</p>';
				$this->CI->session->set_flashdata('alert',$data['alert']);
				redirect(base_url().'Login');
		}elseif($this->CI->session->userdata('admin_status') != 'TRUE'){
			$data['alert']		='<p class="alert alert-danger" role="alert">You are not a Manager of this platform</p>';
				$this->CI->session->set_flashdata('alert',$data['alert']);
				redirect(base_url().'Login');
		}else{
			$user	=$this->CI->session->userdata('username');
			return $user;
		}
	}
}
