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
		$data['deductName'] = $this->Deduction_model->getDeductionNames()->result();
		$data['deductions'] = $this->Deduction_model->getDeductions()->result();

		$this->load->view('suview', $data);
	}

	public function reloadDeductions(){
		$deductions = $this->Deduction_model->getDeductions()->result();

		foreach($deductions as $deduct){
			echo "<tr class='clickable' id=".$deduct->deductionNo.">
											<td>".$deduct->deductionNo."</td>
											<td>".$deduct->empID."</td>
											<td>".$deduct->fullName."</td>
											<td>".$deduct->deductionName."</td>
											<td>".$deduct->amount."</td>
											<td>".$deduct->mtp."</td>
											<td>".$deduct->monthsLeft."</td>
											<td>".$deduct->dateApplied."</td>
											<td>".$deduct->status."</td>
											<td><button class='btn btn-success' id='finishBtn'>Finished</button><button class='btn btn-danger' style='margin-left:5px;' id='pendingBtn'>Pending</button></td>
										</tr>";
		}
	}

	public function changeStatus(){
		$this->Deduction_model->changeStatus();
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
				$data['deductName'] = $this->Deduction_model->getDeductionNames()->result();

				$this->load->view('Suview', $data);
			}
			else{
				$this->Deduction_model->submitDeduction();

				echo "<script> alert('Form has been submitted'); window.location.href = '../main/home_view' </script>";					
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