<?php


class Main extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('emp_model');
	}

	public function index(){
		$this->load->view('login');
	}

	public function home_view(){
		$data['common_view'] = "home";

		$this->load->view('suview', $data);
	}
	public function login_check(){
		$this->form_validation->set_rules('username', 'EmployeeID','required|exact_length[10]');
		$this->form_validation->set_rules('password', 'Password','required|min_length[8]|max_length[15]');

		if($this->form_validation->run()==FALSE){
			$data = array(

				'error' => validation_errors()

				);

			echo $this->session->set_flashdata($data);

			redirect('main');
		}
		else{
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$user_id = $this->emp_model->login_user($username,$password);

			if($user_id){
				$user_data = array(

						'user_id' => $user_id,
						'username' => $username,
						'logged_in' => true

					);
				$this->session->set_userdata($user_data);

				$this->session->set_flashdata('login_success', 'You are now logged in');

				redirect('main/home_view');
			}
			else{
				$this->session->set_flashdata('login_failed', 'You are not logged in');

				redirect('main');
			}
		}
	}

	public function logout(){

		$this->session->sess_destroy();

		redirect('main');

	}
}


?>