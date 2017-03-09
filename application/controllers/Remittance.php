<?php

class Remittance extends CI_Controller{

	public function __construct(){
		parent::__construct();

		$this->load->model('Remittance_model');
	}

	public function index(){
		$data['remittance'] = "hr/Remittance";

		$this->load->model('Customize_model');
		$data['cinfo'] = $this->Customize_model->get_company();
		$data['loanNames'] = $this->Remittance_model->loadLoans();
		
		$this->load->view('Suview', $data);

	}

	public function FilterCategory(){
		$this->Remittance_model->filterCategory();
	}

}

?>