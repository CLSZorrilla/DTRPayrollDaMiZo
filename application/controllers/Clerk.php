<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Clerk extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('Clerk_model');
	}

	public function index(){
		$data['payrollEmpList'] = "clerk/hrpayroll";

		//$data['pInfoRes'] = $this->Clerk_model->get_payrollsheet();

		$this->load->view('Suview', $data);
	}

	public function payslip_compute(){
		if($this->uri->segment(3)){
			$data['payroll'] = "clerk/payrollcompute";

			$data['pInfoRes'] = $this->Clerk_model->get_payroll_info($this->uri->segment(3));

			$this->load->view('Suview', $data);
		}
		else{
			redirect('Clerk');
		}
	}

	public function viewpayslip(){
		$data['hrpayslip'] = 'Clerk/hrpayslip';

		$data['uinfo'] = $this->Clerk_model->get_emp_list();
		
		$this->load->view('Suview', $data);
	}

	public function savePayslip(){
		$this->Clerk_model->save_Payslip();
	}


	public function paysheet_compute(){
		$this->Clerk_model->get_payrollsheet();
	}

	public function paysheet_save(){
		$this->Clerk_model->save_paysheet();
	}
}




?>