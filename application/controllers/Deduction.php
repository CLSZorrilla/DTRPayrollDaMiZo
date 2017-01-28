<?php

class Deduction extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('Deduction_model');
	}

	public function index(){
		$data['sGrade'] = $this->Deduction_model->get_salaryGrade();
		$data['pHealth'] = $this->Deduction_model->get_philHealthDeduction();
		$data['dList']  = 'Deduction';

		$this->load->view('suview', $data);
	}

	public function dMgmt(){
		$data['dMgmt'] = "hr/DeductionMgmt";

		$this->load->view('suview', $data);
	}

	public function get_employee(){
		$search = $this->input->post('search');

		$query = $this->Deduction_model->getEmpSearch($search);

		echo json_encode ($query);
	}
}




?>