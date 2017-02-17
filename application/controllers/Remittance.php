<?php

class Remittance extends CI_Controller{

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data['remittance'] = "remittance";

		/*$data['uinfo'] = $this->Clerk_model->get_emp_list();*/

		$this->load->view('Suview', $data);

	}
}

?>