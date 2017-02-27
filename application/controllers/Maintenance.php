<?php

class Maintenance extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$this->load->model('Maintenance_model');
		$data['uinfo'] = $this->Maintenance_model->get_user()->result();
		$this->load->model('Maintenance_model');
		$data['pinfo'] = $this->Maintenance_model->get_positions()->result();
		$this->load->model('Maintenance_model');
		$data['dinfo'] = $this->Maintenance_model->get_departments()->result();
		$this->load->model('Maintenance_model');
		$data['hinfo'] = $this->Maintenance_model->get_holiday()->result();
		$data['maintenance'] = "hr/Maintenance";

		$this->load->view('Suview', $data);
	}
}

?>