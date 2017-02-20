<!DOCTYPE html>
<html lang="en">
	<head>
		<?php $this->load->view('partials/header');?>
	</head>
	<body>
		<?php 
		if($this->session->userdata('aType') == 'Employee'){
			$this->load->view('partials/nav');
		}
		else{
			$this->load->view('partials/nav_new');
		}
		?>
		<div>
			<?php
				if(isSet($cUserForm)){
					if($this->session->userdata('aType') == 'HR'){
						$this->load->view($cUserForm);
					}
					else{
						redirect('main');
					}
				}
				else if(isSet($mUser)){
					if($this->session->userdata('aType') == 'HR'){
						$this->load->view($mUser);
					}
					else{
						redirect('main');
					}
				}
				else if(isSet($common_view)){
					if($this->session->userdata('aType')){
						$this->load->view($common_view);
					}
					else{
						redirect('main');
					}
				}
				else if(isSet($dList)){
					if($this->session->userdata('aType')){
						$this->load->view($dList);
					}
					else{
						redirect('main');
					}
				}
				else if(isSet($leaveReq)){
					if($this->session->userdata('aType') == 'HR'){
						$this->load->view($leaveReq);
					}
					else{
						redirect('main');
					}
				}
				else if(isSet($payrollEmpList)){
					if($this->session->userdata('aType') == 'Payroll Clerk'){
						$this->load->view($payrollEmpList);
					}
					else{
						redirect('main');
					}			
				}
				else if(isSet($payroll)){
					if($this->session->userdata('aType') == 'Payroll Clerk'){
						$this->load->view($payroll);
					}
					else{
						redirect('main');
					}
				}
				else if(isSet($dMgmt)){
					if($this->session->userdata('aType') == 'HR'){
						$this->load->view($dMgmt);
					}
					else{
						redirect('main');
					}
				}
				else if(isSet($AttendanceView)){
					if($this->session->userdata('aType')){
						$this->load->view($AttendanceView);
					}
					else{
						redirect('main');
					}
				}
				else if(isSet($customize)){
					if($this->session->userdata('aType') == 'HR'){
						$this->load->view($customize);
					}
					else{
						redirect('main');
					}
				}
				else if(isSet($hrpayslip)){
					if($this->session->userdata('aType') == 'Payroll Clerk'){
						$this->load->view($hrpayslip);
					}
					else{
						redirect('main');
					}
				}
				else if(isSet($remittance)){
					if($this->session->userdata('aType') == 'HR'){
						$this->load->view($remittance);
					}
					else{
						redirect('main');
					}
				}
				else if(isSet($chat)){
					if($this->session->userdata('aType')){
						$this->load->view($chat);
					}
					else{
						redirect('main');
					}
				}
			?>
		</div>
		<?php $this->load->view('partials/footer');?>
	</body>
</html>