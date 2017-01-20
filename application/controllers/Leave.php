<?php


class Leave extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('Leave_model');	
	}

	public function index(){
		$data['leaveType'] = $this->Leave_model->load_leave();
		$data['leaveReq'] = "hr/Leaveform";

		$this->load->view('Suview', $data);
	}

	public function get_leave_form_info(){
		$this->Leave_model->get_leaveform_info($this->input->get('empID'));
	}

	public function updateLeaveCredits(){

		$config = array(
			array(
				'field' => 'empID',
				'label' => 'Employee ID',
				'rules' => 'required|exact_length[10]'
				),
			array(
				'field' => 'fName',
				'label' => 'Full Name',
				'rules' => 'required',
				),
			array(
				'field' => 'appDate',
				'label' => 'Approval Date',
				'rules' => 'required'
				),
			array(
				'field' => 'note',
				'label' => 'Leave Note',
				'rules' => 'required'
				)
		);

		$this->form_validation->set_rules($config);

		if($this->form_validation->run() == FALSE){
				$data = array(

				'error' => validation_errors(),
				
				);

				$data["leaveReq"]="hr/Leaveform";

				$this->load->view('Suview', $data);

		}
	}
}



?>