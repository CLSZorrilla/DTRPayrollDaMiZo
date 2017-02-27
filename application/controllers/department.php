<?php

class Department extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('Maintenance_model');
	}

	public function manageDepartments(){
		$data['dinfo'] = $this->Maintenance_model->get_departments()->result();
		$query = $this->Maintenance_model->get_departments();

		$row = $query->row();

		$data['mDepartments'] = "hr/Managedepartments";

		$this->load->view('Suview', $data);
	}
}

?>