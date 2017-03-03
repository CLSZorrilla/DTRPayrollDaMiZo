<?php include "/../partials/nav_customize.php"; ?>
<style type="text/css">
  	a.btnClick {
    	background-color:white;
    	color:black;
    	border: 2px solid <?php echo $company['colorTheme']; ?>;
    	-webkit-transition-duration: 0.4s; /* Safari */
    	transition-duration: 0.4s;
  	}
  	a.btnClick:hover {
      	background-color: <?php echo $company['colorTheme']; ?>;
      	color: white;
  	}
  	.nav-tabs.nav-justified>li>a {
  		color: <?php echo $company['colorTheme']; ?>;
  	}
  	.nav-tabs.nav-justified>.active>a, .nav-tabs.nav-justified>.active>a:focus, .nav-tabs.nav-justified>.active>a:hover {
      	background-color: <?php echo $company['colorTheme']; ?>;
      	color: white;
  	}
	table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before, table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
		background-color: <?php echo $company['colorTheme']; ?>;
	}
	table.dataTable.dtr-inline.collapsed>tbody>tr.parent>td:first-child:before, table.dataTable.dtr-inline.collapsed>tbody>tr.parent>th:first-child:before {
		background-color:black;
		color: white;
	}
</style>
	<div class="BodyContainer">
		<div class="BodyContent">
			<ol class="breadcrumb">
				<li><a href="#">Home</a></li>
				<li class="active">Maintenance</li>
			</ol>
		    <div class="row" id="Title">
				<h4 style="color:<?php echo $company['colorTheme']; ?>;">MAINTENANCE</h4>
				<hr class="selectedHR" />
			</div>
				<ul class="nav nav-tabs nav-justified" role="tablist" style="margin-bottom: 20px;">
					<li class="active"><a data-toggle="tab" href="#table1" role="tab">MANAGE USER</a></li>
					<li><a data-toggle="tab" href="#table2" role="tab">MANAGE POSITIONS</a></li>
					<li><a data-toggle="tab" href="#table3" role="tab">MANAGE DEPARTMENTS</a></li>
					<li><a data-toggle="tab" href="#table4" role="tab">MANAGE HOLIDAY</a></li>
					<!-- <li><a data-toggle="tab" href="#table5" role="tab">CUSTOMIZATION</a></li> -->
				</ul>
			<div class="tab-content">
				<div id="table1" class="tab-pane fade active in">
					<div class="table-responsive">
						<div class="col-sm-6 CreateNew">
							<p class="pull-left" style="margin: 0px;">
								<a class="btn btnClick" href="<?php echo base_url(); ?>employee/createUserAcct">Create User <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></a>
								<a class="btn btnClick" id="editUser">Edit User <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></a>
							</p>
						</div>
						<table class="table table-striped MaintenanceTable" id="1table">
							<thead>
								<tr>
									<?php
									$tHeader=array('Employee ID', 'User Type' ,'Position', 'Department', 'Full Name', 'Address', 'Marital Status', 'Date Hired', 'GSIS No.', 'PhilHealth No.', 'TIN', 'Vacation Leave', 'Sick Leave' ,'Email Address', 'Birthdate', 'Contact No.', 'Sex', 'Picture');
										foreach($tHeader as $tHead){
											echo '<th>'.$tHead.'</th>';
										};

									?>
								</tr>
							</thead>
							<tbody>
									<?php 
										foreach($uinfo as $info){
											
											if($info->activated == 'TRUE'){
												echo "<tr class='text-center clickable' id=".$info->empID.">";
											}	
											else{
												echo "<tr style='color:red' class='text-center clickable' id=".$info->empID.">";
											}
											echo "
												<td>".$info->empID."</td>
												<td>".$info->acctType."</td>
												<td>".$info->positionName."</td>
												<td>".$info->deptName."</td>
												<td>".$info->name."</td>
												<td>".$info->address."</td>
												<td>".$info->maritalStatus."</td>
												<td>".$info->dateHired."</td>
												<td>".$info->GSISNo."</td>
												<td>".$info->PhilHealthNo."</td>
												<td>".$info->TIN."</td>
												<td>".$info->VL."</td>
												<td>".$info->SL."</td>
												<td>".$info->emailAddress."</td>
												<td>".$info->birthDate."</td>
												<td>".$info->contactNo."</td>
												<td>".$info->sex."</td>
												<td><img src='".$info->picture."' width='50' height='50'/></td>";
										}	
									?>
							</tbody>
						</table>
					</div>
				</div>
				<div id="table2" class="tab-pane fade">
					<div class="table-responsive">
						<div class="col-sm-6 CreateNew">
							<p class="pull-left" style="margin: 0px;">
								<a class="btn btnClick" href="<?php echo base_url(); ?>Maintenance/createPosition">Create Position <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></a>
								<a class="btn btnClick" id="editPosition">Edit Position <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></a>
							</p>
						</div>
						<table class="table table-striped MaintenanceTable" id="2table">
							<thead>
								<tr>
									<?php
									$tHeader=array('Position Code', 'Position Name' ,'Salary Grade');
										foreach($tHeader as $tHead){
											echo '<th>'.$tHead.'</th>';
										};

									?>
								</tr>
							</thead>
							<tbody>
									<?php 
										foreach($pinfo as $info){
											echo "
												<tr class='text-center clickable' id=".$info->positionCode.">
													<td>".$info->positionCode."</td>
													<td>".$info->positionName."</td>
													<td>".$info->salaryGrade."</td>
												</tr>
												";
										}	
									?>
							</tbody>
						</table>
					</div>
				</div>
				<div id="table3" class="tab-pane fade">
					<div class="table-responsive">
						<div class="col-sm-6 CreateNew">
							<p class="pull-left" style="margin: 0px;">
								<a class="btn btnClick" href="<?php echo base_url(); ?>Maintenance/createDepartment">Create Department <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></a>
								<a class="btn btnClick" id="editDepartment">Edit Department <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></a>
							</p>
						</div>
						<table class="table table-striped MaintenanceTable" id="3table">
							<thead>
								<tr>
									<?php
									$tHeader=array('Department Code', 'Department Name');
										foreach($tHeader as $tHead){
											echo '<th>'.$tHead.'</th>';
										};

									?>
								</tr>
							</thead>
							<tbody>
									<?php 
										foreach($dinfo as $info){
											echo "
												<tr class='text-center clickable' id=".$info->deptCode.">
													<td>".$info->deptCode."</td>
													<td>".$info->deptName."</td>
												</tr>
												";
										}	
									?>
							</tbody>
						</table>
					</div>
				</div>
				<div id="table4" class="tab-pane fade">
					<div class="table-responsive">
						<div class="col-sm-6 CreateNew">
							<p class="pull-left" style="margin: 0px;">
								<a class="btn btnClick" href="<?php echo base_url(); ?>Maintenance/createHoliday">Create Holiday<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></a>
								<a class="btn btnClick" id="editHoliday">Edit Holiday<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></a>
							</p>
						</div>
						<table class="table table-striped MaintenanceTable" id="4table">
							<thead>
								<tr>
									<?php
									$tHeader=array('Holiday ID', 'Holiday Name', 'Holiday Date', 'Holiday Type');
										foreach($tHeader as $tHead){
											echo '<th>'.$tHead.'</th>';
										};

									?>
								</tr>
							</thead>
							<tbody>
									<?php 
										foreach($hinfo as $info){
											echo "
												<tr class='text-center clickable' id=".$info->holidayId.">
													<td>".$info->holidayId."</td>
													<td>".$info->holidayName."</td>
													<td>".$info->holidayDate."</td>
													<td>".$info->holidayType."</td>
												</tr>
												";
										}	
									?>
							</tbody>
						</table>
					</div>
				</div>
				<div id="table5" class="tab-pane fade">'
					<div class="table-responsive">
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
        $(document).ready(function () {
			$('#1table').DataTable({
				"pageLength": 10,
				"pagingType": "full",
				"bFilter": true,
				"bLengthChange": false,
				"ordering": true,
				responsive: true
			});
			$('#2table').DataTable({
				"pageLength": 10,
				"pagingType": "full",
				"bFilter": true,
				"bLengthChange": false,
				"ordering": true,
				responsive: true
			});
			$('#3table').DataTable({
				"pageLength": 10,
				"pagingType": "full",
				"bFilter": true,
				"bLengthChange": false,
				"ordering": true,
				responsive: true
			});
			$('#4table').DataTable({
				"pageLength": 10,
				"pagingType": "full",
				"bFilter": true,
				"bLengthChange": false,
				"ordering": true,
				responsive: true
			});

		    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
		        $($.fn.dataTable.tables(true)).DataTable()
		           .columns.adjust()
		           .responsive.recalc();
		    });    
		});

    	var ID = "";
    	$(document).on('click', '.clickable', function(){
    		$('.clickable').css('background-color',"white");
    		$('.clickable').css('color',"black");
    		$(this).css('background-color',"<?php echo $company['colorTheme']; ?>");
    		$(this).css('color',"white");
    		ID = $(this).attr('id');
    	});

    	$('#editUser').click(function(){
    		if(ID!=""){
    			window.location.href = "<?php echo base_url(); ?>employee/editUsersAcct/"+ ID;
    		}else{
    			swal("Notice","Select a row first before clicking edit","error")
    		}
    	})

    	$('#editPosition').click(function(){
    		if(ID!=""){
    			window.location.href = "<?php echo base_url(); ?>Maintenance/editPosition/"+ ID;
    		}else{
    			swal("Notice","Select a row first before clicking edit","error")
    		}
    	})

    	$('#editDepartment').click(function(){
    		if(ID!=""){
    			window.location.href = "<?php echo base_url(); ?>Maintenance/editDepartment/"+ ID;
    		}else{
    			swal("Notice","Select a row first before clicking edit","error")
    		}
    	})

    	$('#editHoliday').click(function(){
    		if(ID!=""){
    			window.location.href = "<?php echo base_url(); ?>Maintenance/editHoliday/"+ ID;
    		}else{
    			swal("Notice","Select a row first before clicking edit","error")
    		}
    	})
	</script>