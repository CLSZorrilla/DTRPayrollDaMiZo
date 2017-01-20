<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('partials/header');?>
</head>
<div>
	<div>
		<?php $this->load->view('partials/nav');?>
	</div>
</div>
<div>
<?php 

if(isSet($cUserForm)){
	$this->load->view($cUserForm);
}
else if(isSet($mUser)){
	if($this->session->userdata('user_id')){
		$this->load->view($mUser);
	}
	else{
		redirect('main');
	}
}
else if(isSet($common_view)){
	if($this->session->userdata('user_id')){
		$this->load->view($common_view);
	}
	else{
		redirect('main');
	}
}
else if(isSet($dList)){
	if($this->session->userdata('user_id')){
		$this->load->view($dList);
	}
	else{
		redirect('main');
	}
}
else if(isSet($leaveReq)){
	if($this->session->userdata('user_id')){
		$this->load->view($leaveReq);
	}
	else{
		redirect('main');
	}
}
?>
</div>

</html>
