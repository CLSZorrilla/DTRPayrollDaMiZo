<?php

class attendance extends CI_Controller{

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data['AttendanceView']="AttendanceView";
		$this->load->view('suview', $data);
	}

}

?>