<?php

class Position extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('Maintenance_model');
	}

	public function managePositions(){
		$data['pinfo'] = $this->Maintenance_model->get_positions()->result();
		$query = $this->Maintenance_model->get_positions();

		$row = $query->row();

		$data['mPositions'] = "hr/Managepositions";

		$this->load->view('Suview', $data);
	}

}

?>