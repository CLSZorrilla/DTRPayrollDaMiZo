<?php 
//get current counter
$data['current'] = (int)$this->emp_model->check_changes();
//set initial value of update to false
$data['update'] = false;
//check if it's ajax call with POST containing current (for user) counter;
//and check if that counter is diffrent from the one in database
if(isset($_POST) && !empty($_POST['counter']) && (int)$_POST['counter']!=$data['current']){
	//the counters are diffrent so get new message list
	$data['news'] .= $this->emp_model->get_user();
	$data['update'] = true;
}
//just echo as JSON
echo json_encode($data);
/* End of file checker.php */
