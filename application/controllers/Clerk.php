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
			$data['payroll'] = "clerk/payrollcompute";

			$data['pInfoRes'] = $this->Clerk_model->get_payroll_info($this->uri->segment(3));

			$this->load->view('Suview', $data);
		}
		else{
			redirect('Clerk');
		}
	}

	public function viewpayslip(){
		$data['fname'] = $this->input->get_post('fname');
		$data['bpay'] = $this->input->get_post('bpay');
		$data['pera'] = $this->input->get_post('pera');
		$data['gpay'] = $this->input->get_post('gpay');
		$data['phealth'] = $this->input->get_post('phealth');
		$data['gsis'] = $this->input->get_post('gsis');
		$data['pagibig'] = $this->input->get_post('pagibig');
		$data['wtax'] = $this->input->get_post('wtax');
		$data['tdeduct'] = $this->input->get_post('tdeduct');
		$data['netpay'] = $this->input->get_post('netpay');

		$this->load->view('clerk/viewpayslip', $data);
	}
}




?>