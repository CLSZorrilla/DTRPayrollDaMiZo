<?php


class Main extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('Emp_model');
		$config['upload_path'] = './companyLogo/';
		$config['allowed_types'] = 'gif|jpg|png';
		$this->load->library('upload', $config);
	}

	public function index(){
		if($this->session->userdata('username')){
			redirect('main/home_view');
		}
		else{
			$this->load->view('Login');
		}
	}
	public function home_view(){
		$data['common_view'] = "home";
		$eid = $this->session->userdata('username');
		$cAttendance = $this->Emp_model->get_current_attendance($eid);
		
		$data['cAttend'] = $cAttendance;

		$this->load->view('Suview', $data);
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

			$user_id = $this->Emp_model->login_user($username,$password);
			
			if($user_id){
				$user_data = array(

						'user_id' => $user_id[0],
						'username' => $username,
						'aType' => $user_id[1],
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
	
	public function customize(){
		$this->load->model('Customize_model');

		if($this->input->server('REQUEST_METHOD') == 'POST'){
			$config = array(
				array(
					'field' => 'name',
					'label' => 'Company Name',
					'rules' => 'required'
					),
				array(
					'field' => 'desc',
					'label' => 'Description',
					'rules' => 'required'
					),
				array(
					'field' => 'address',
					'label' => 'Company Address',
					'rules' => 'required'
					),
				array(
					'field' => 'start_time',
					'label' => 'Start Time',
					'rules' => 'required'
					),
				array(
					'field' => 'end_time',
					'label' => 'End Time',
					'rules' => 'required'
					)
				);

			$this->form_validation->set_rules($config);
			
			if($this->form_validation->run() == FALSE || ! $this->upload->do_upload('logo')){
				$data = array(

					'error' => validation_errors(),

					);

				$data['customize']="hr/Customize";
				$data['pictureError'] = $this->upload->display_errors();

				$this->load->view('Suview', $data);
			}
			else{
				$file_data = $this->upload->data();

				$imgPath = base_url().'companyLogo/'.$file_data['file_name'];
	
				$this->Customize_model->insert_companyProfile($imgPath);
				
				redirect('main/home_view');

			}
		}
		else{		
			$data['customize'] = "hr/Customize";

			$data['cinfo'] = $this->Customize_model->get_company();

			$this->load->view('Suview', $data);
		}

	}
}


?>