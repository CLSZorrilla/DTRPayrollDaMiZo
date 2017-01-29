<?php

class Attendance extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('Attendance_model');
	}

	public function index(){
		$data['AttendanceView']="AttendanceView";

		$eid = $this->session->userdata('username');
		$data['result'] = $this->Attendance_model->get_attendance($eid);

		$this->load->view('suview', $data);
	}

}

?>