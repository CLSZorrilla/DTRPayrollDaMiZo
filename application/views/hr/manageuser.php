	<?php

		$base_url = base_url();

	?>

	<div>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url(); ?>main/home_view"><span class="glyphicon glyphicon-home"></span> Home</a></li>
			<li><a href="#">Maintenance</a></li>
			<li class="active">Manage Users</li>
		</ol>
	</div>
	<div class="BodyContainer">
		<div class="BodyContent">
			<div class="row Title">
				<h4>MANAGE USERS</h4>
			</div>
			<div class="table-responsive">
				<div class="col-sm-6 CreateNew">
					<p class="pull-left" style="margin: 0px;">
						<a href="<?php echo base_url(); ?>employee/createUserAcct">Create New <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></a>
					</p>
				</div>
					<table class="table table-striped MaintenanceTable">
						<thead>
							<tr>
								<?php
								$tHeader=array('Employee ID', 'Position', 'Department', 'Full Name', 'Address', 'Marital Status', 'Date Hired', 'GSIS No.', 'PhilHealth No.', 'TIN', 'Leave Credits', 'Email Address', 'Birthdate', 'Contact No.', 'Sex', 'Picture', ' ');
									foreach($tHeader as $tHead){
										echo '<th>'.$tHead.'</th>';
									};

								?>
							</tr>
						</thead>
						<tbody>
								<?php 
									foreach($uinfo as $info){
										echo "
											<tr>
											<td>".$info->empID."</td>
											<td>".$info->positionName."</td>
											<td>".$info->deptName."</td>
											<td>".$info->name."</td>
											<td>".$info->address."</td>
											<td>".$info->maritalStatus."</td>
											<td>".$info->dateHired."</td>
											<td>".$info->GSISNo."</td>
											<td>".$info->PhilHealthNo."</td>
											<td>".$info->TIN."</td>
											<td>".$info->leaveCredits."</td>
											<td>".$info->emailAddress."</td>
											<td>".$info->birthDate."</td>
											<td>".$info->contactNo."</td>
											<td>".$info->sex."</td>
											<td>".$info->picture."</td>
											<td><a href=".$base_url."employee/createUserAcct/".$info->empID." class='btn btn-primary' id='updateBtn'>Update</a>
											<span>|</span>
											<a href='UpdateUser.php' id='updateBtn'>Delete</a></td></tr>
											</tr>
										";
									}	
								?>
						</tbody>
					</table>
				</div>
		</div>
	</div>
	<div class="Footer">
		<div class="pull-right">
			<p>&copy; Copyright 2016 All Rights Reserved.</p>
		</div>
	</div>
	<script type="text/javascript">
        $(document).ready(function () {
			$('.MaintenanceTable').DataTable({
				"pageLength": 10,
				"pagingType": "full",
				"bFilter": true,
				"bLengthChange": false,
				"ordering": true,
				"aaSorting": [[0, 'desc']],
				responsive: true
			});

			$("button").click(function(e){
        		e.preventDefault();
        		alert("haha");
        });
		});

        
        /*function check(){
	        $.ajax({
				url: '<?php echo base_url();?>/employee/autoref',
				type:'POST',
				dataType: 'json',
				success: function(output_string){
						$('.MaintenanceTable').append(output_string);
					} // End of success function of ajax form
				}); // End of ajax call	
    	}*/
	</script>