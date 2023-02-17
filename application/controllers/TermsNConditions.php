<?php
class TermsNConditions extends My_Controller{
    public function __construct(){
        parent::__construct();
    }

    	
	public function index(){
        $data['alert']			=$this->session->flashdata('alert');
		$data['content'] ='front_end/terms';
		$this->load->view($this->layout_3,$data);
	}
	
}