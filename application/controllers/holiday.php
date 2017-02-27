<?php

class Holiday extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('Maintenance_model');
	}

	public function manageHoliday(){
		$data['hinfo'] = $this->Maintenance_model->get_holiday()->result();
		$query = $this->Maintenance_model->get_holiday();

		$row = $query->row();

		$data['mHoliday'] = "hr/Manageholiday";

		$this->load->view('Suview', $data);
	}
}

?>