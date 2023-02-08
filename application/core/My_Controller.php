<?php
class My_Controller extends CI_Controller{
	public $layout;
	public $layout_2;
	public $layout_3;
    public $admin_layout;
    public $admin_layout_2;
    public $auth_layout;
    public $user_layout;
	public $email_layout;
	public $email_layout_2;



	public function __construct(){
		parent::__construct();
		//session_start();
		/*
		/*$this->load->library('session_checker');
		/*$this->load->library('session_checker');
        $this->load->library('match_maker');
        $this->load->library('send_email');*/
		// $this->load->library('form_validation');

		$this->load->library('session_checker');

		$this->load->library('chat_online_tracker');
		$this->layout			='front_end/master';
		$this->layout_2			='front_end/master_2';
		$this->layout_3			='front_end/master_3';
        

		$this->admin_layout		='back_end/master';// User Login
		$this->admin_layout_2	='back_end/master_2'; //User Login 

		$this->auth_layout		='auth/master'; // Authetication Users


		$this->email_layout		='email/master'; //email Template with link
		$this->email_layout_2	='email/master_2'; //email Template not with link

		
        
		$this->load->model('Action');
		$this->load->model('Admin_db');
		$this->load->model('Request_db');
		$this->load->model('Alert_db');
		$this->load->model('Connection_db');
		$this->load->model('Users_db');
		$this->load->model('Chat_db');
		$this->load->model('Transaction_db');
		$this->load->model('Bank_db');
		$this->load->model('Property_db');
		$this->load->model('Partners_db');
		$this->load->model('Wallet_db');
		$this->load->model('ApiAdmin_db');

	}

	public function success_alert_callbark($msg){
		$data['alert']  ='<div class="alert alert-success border-0 bg-success alert-dismissible fade show py-2">
								<div class="d-flex align-items-center">
										<div class="font-35 text-white"><i class="bx bxs-check-circle"></i></div>
										<div class="ms-3">
											<h6 class="mb-0 text-white">'.$msg.'</h6>
										</div>
									</div>
								</div>';
		$this->session->set_flashdata('alert',$data['alert']);
	}
	

	public function failed_alert_callbark($msg){
		$data['alert']  ='<div class="alert alert-danger border-0 bg-danger alert-dismissible fade show py-2">
								<div class="d-flex align-items-center">
										<div class="font-35 text-white"><i class="bx bxs-message-square-x"></i></div>
										<div class="ms-3">
											<h6 class="mb-0 text-white">Oops!</h6>
											<div class="text-white">'.$msg.' </div>
										</div>
									</div>
								</div>';
		$this->session->set_flashdata('alert',$data['alert']);
	}
	
	public function info_alert_callbark($msg){
		$data['alert']  ='<div class="alert alert-info border-0 bg-info alert-dismissible fade show py-2">
								<div class="d-flex align-items-center">
										<div class="font-35 text-white"><i class="bx bx-info-square"></i></div>
										<div class="ms-3">
											<h6 class="mb-0 text-white">Oops!</h6>
											<div class="text-white">'.$msg.' </div>
										</div>
									</div>
								</div>';
		$this->session->set_flashdata('alert',$data['alert']);
	}
	
	public function warning_alert_callbark($msg){
		$data['alert']  ='<div class="alert alert-warning border-0 bg-info alert-dismissible fade show py-2">
								<div class="d-flex align-items-center">
										<div class="font-35 text-white"><i class="bx bx-info-square"></i></div>
										<div class="ms-3">
											<h6 class="mb-0 text-white">Oops!</h6>
											<div class="text-white">'.$msg.' </div>
										</div>
									</div>
								</div>';
		$this->session->set_flashdata('alert',$data['alert']);
	}


	    
	public function send_email($dis_email=NULL, $subject=NULL, $message=NULL, $type=NULL, $link=NULL, $link_title=NULL){
		$site_email				= $this->Action->get_site_email();

		$get_site_name          = $this->Action->get_site_name();
		$get_site_g_name        = $this->Action->get_site_g_name();
		$get_site_g_pass        = $this->Action->get_site_g_pass();



		$this->load->library('email');
		$config = array(
			'protocol' => 'ssmtp',
			'smtp_host'    => 'ssl://ssmtp.gmail.com',
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
		$this->email->to($dis_email);
		$this->email->subject($subject);

		$data['message']        = $message;
		$data['title']  		= 'Thank You';
		$data['link_title']		= $link_title;
		$data['link']			= $link;
		if($type == 'type_1'){
			$body   = $this->load->view($this->email_layout, $data, TRUE);

		}else if($type =='type_2'){
			$data['link']		= $link;
			$body   = $this->load->view($this->email_layout_2, $data, TRUE);

		}
		$this->email->message($body);
		if($this->email->send()){
			return true;
		}
		return false;
	}

}
