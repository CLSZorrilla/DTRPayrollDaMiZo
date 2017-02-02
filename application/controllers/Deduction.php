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

	public function submit_deduction(){
		if($this->input->server('REQUEST_METHOD') == 'POST'){
			$config = array(
				array(
					'field' => 'fName',
					'label' => 'Full Name',
					'rules' => 'required'
					),
				array(
					'field' => 'dName',
					'label' => 'Deduction Name',
					'rules' => 'required'
					),
				array(
					'field' => 'amt',
					'label' => 'Amount',
					'rules' => 'required|greater_than[0]'
					),
				array(
					'field' => 'int',
					'label' => 'Interest',
					'rules' => 'required'
					),
				array(
					'field' => 'mtp',
					'label' => 'Months to Pay',
					'rules' => 'required'
					)
				);

			$this->form_validation->set_rules($config);

			if($this->form_validation->run() == FALSE){
				$data = array(

					'error' => validation_errors(),

					);

				$data['leaveReq'] = "hr/DeductionMgmt";

				$this->load->view('Suview', $data);
			}
			else{
					$this->Deduction_model->submitDeduction();

					$data['leaveReq'] = "hr/DeductionMgmt";
					$data['formsubmit'] = "Form has been submitted";

					$this->load->view('Suview', $data);
			}
		}	
	}
	public function get_employee(){
		$result = $this->Deduction_model->getEmpSearch($this->input->get('search'));

		$name = array();
		foreach($result as $row){
			$name[] = array('name' => $row->name);
		}

		echo json_encode($name);
	}
}




?>