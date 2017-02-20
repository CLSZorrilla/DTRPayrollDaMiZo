<?php

class Chat extends CI_Controller{
// defined('BASEPATH') OR exit('No direct script access allowed');

	public function __construct(){
		parent::__construct();
		$this->load->model('Chat_model');
	}

	public function index(){
		$data['chat']="chat";

		$this->load->view('suview', $data);
	}

}

?>