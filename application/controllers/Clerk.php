<?php

class Clerk extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('Clerk_model');

	}

	public function index(){
		$data['payrollEmpList'] = "clerk/hrpayroll";

		$data['uinfo'] = $this->Clerk_model->get_emp_list();

		$this->load->view('Suview', $data);
	}

	public function payroll_computation(){
		if($this->uri->segment(3)){
			$data['payroll'] = "clerk/Payroll";

			$data['pInfoRes'] = $this->Clerk_model->get_payroll_info($this->uri->segment(3));

			$this->load->view('Suview', $data);
		}
		else{
			redirect('Clerk');
		}
	}

	public function adjTimeGetPayroll(){
		$sTime = $this->input->post('startTime');
		$eTime = $this->input->post('endTime');

		$result = $this->Clerk_model->payrollAdjTime($sTime, $eTime, $this->uri->segment(3));

		return $result;
	}
}




?>