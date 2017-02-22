<?php
	
	//connect & check MySQL Server connection
	$conn = mysqli_connect("localhost","root","","payrolldb");
	
	if(mysqli_connect_errno($conn)){
		echo "Failed to connect. <br />";
		echo mysqli_connect_error();
	}
	
	//prepare the sql
	$sql = "SELECT * FROM company_profile WHERE id = 1";

	//execute
	$execResult = mysqli_query($conn, $sql);
	
	
	//prepare the record/result set
	$company = array();
	if( $myrow=mysqli_fetch_array($execResult) ){
			$info= array();
			$info['name'] = $myrow['name'];
			$info['colorTheme'] = $myrow['colorTheme'];
			$info['logo'] = $myrow['logo'];
			$company = $info;
	}
	return $company;//return records
?>