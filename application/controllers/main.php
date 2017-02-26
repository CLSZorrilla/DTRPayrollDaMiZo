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
		
		$this->load->model('Maintenance_model');
		$data['hinfo'] = $this->Maintenance_model->get_holiday()->result();

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

			// redirect('main');

			$this->load->view('Login',$data);
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
		$this->session->unset_userdata('aType');

		redirect('main');

	}
	public function customize(){

		$this->load->model('Customize_model');
	
		if($this->input->server('REQUEST_METHOD') == 'POST'){
			//update company profile
			$this->form_validation->set_rules('name', 'Company Name','required');
			$this->form_validation->set_rules('abbre', 'Abbrebviation','required');
			$this->form_validation->set_rules('desc', 'Description','required');
			$this->form_validation->set_rules('address', 'Address','required');
			$this->form_validation->set_rules('contactNo', 'Contact Number','required');
			$this->form_validation->set_rules('start_time', 'Start Time','required');
			$this->form_validation->set_rules('end_time', 'End Time','required');
			$this->form_validation->set_rules('sRange', 'Start Range','required');
			$this->form_validation->set_rules('eRange', 'End Range','required');
			$this->form_validation->set_rules('color_theme', 'Color Theme','required');
			//$this->form_validation->set_rules('logo', 'Logo','required');
			
			if($this->form_validation->run() == FALSE || !$this->upload->do_upload('logo')){
				
				$data = array(
					'error' => validation_errors()
				);

				$pic = $this->Customize_model->get_logo();
				$this->Customize_model->update_company($pic);
				
				redirect('main/Customize');
				
				// $data['cForm']="hr/Customize";
				// $data['pictureError'] = $this->upload->display_errors();

				// $this->load->view('Suview', $data);
			}
			else{
				$file_data = $this->upload->data();

				$imgPath = base_url().'companyLogo/'.$file_data['file_name'];
				$this->Customize_model->update_company($imgPath);
				
				redirect('main/Customize');
			}
		}
		else{		
			//display company profile
			$data['customize'] = "hr/Customize";
			$data['cinfo'] = $this->Customize_model->get_company();
			
			$this->load->view('Suview', $data);
		}
	}
}


?>