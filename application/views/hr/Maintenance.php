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
				<ul class="nav nav-tabs nav-justified" role="tablist" style="font-size:10px;margin-bottom: 20px;">
					<li class="active"><a data-toggle="tab" href="#table1" role="tab" class="tabClick">USER</a></li>
					<li><a data-toggle="tab" href="#table2" role="tab" class="tabClick">POSITIONS</a></li>
					<li><a data-toggle="tab" href="#table3" role="tab" class="tabClick">DEPARTMENTS</a></li>
					<li><a data-toggle="tab" href="#table4" role="tab" class="tabClick">HOLIDAY</a></li>
					<li><a data-toggle="tab" href="#table5" role="tab" class="tabClick">DEDUCTION TYPES</a></li>
					<li><a data-toggle="tab" href="#table6" role="tab" class="tabClick">PHILHEALTH</a></li>
					<li><a data-toggle="tab" href="#table7" role="tab" class="tabClick">SALARY GRADE</a></li>
					<li><a data-toggle="tab" href="#table8" role="tab" class="tabClick">WITHHOLDING TAX</a></li>
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
												echo "<tr class='clickable' id=".$info->empID.">";
											}	
											else{
												echo "<tr style='color:red' class='clickable' id=".$info->empID.">";
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
												<tr class='clickable' id=".$info->positionCode.">
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
												<tr class='clickable' id=".$info->deptCode.">
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
								<a class="btn btnClick" href="<?php echo base_url(); ?>Maintenance/createHoliday">Create Holiday <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></a>
								<a class="btn btnClick" id="editHoliday">Edit Holiday <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></a>
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
												<tr class='clickable' id=".$info->holidayId.">
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
				<div id="table5" class="tab-pane fade">
					<div class="table-responsive">
						<div class="col-sm-6 CreateNew">
							<p class="pull-left" style="margin: 0px;">
								<a class="btn btnClick" href="<?php echo base_url(); ?>Maintenance/createDeduction">Create Deduction <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></a>
								<a class="btn btnClick" id="editDeduction">Edit Deduction <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></a>
							</p>
						</div>
						<table class="table table-striped MaintenanceTable" id="5table">
							<thead>
								<tr>
									<?php
									$tHeader=array('Deduction ID', 'Deduction Name');
										foreach($tHeader as $tHead){
											echo '<th>'.$tHead.'</th>';
										};

									?>
								</tr>
							</thead>
							<tbody>
									<?php 
										foreach($deductinfo as $info){
											echo "
												<tr class='clickable' id=".$info->deductionId.">
													<td>".$info->deductionId."</td>
													<td>".$info->deductionName."</td>
												</tr>
												";
										}	
									?>
							</tbody>
						</table>
					</div>
				</div>
				<div id="table6" class="tab-pane fade">
					<div class="table-responsive">
						<table class="table table-striped MaintenanceTable" id="6table">
							<thead>
								<tr>
									<?php
									$tHeader=array('Monthly Salary Bracket', 'Start Range', 'End Range', 'Total Monthly Contribution', 'Employee Share', 'Employer Share');
										foreach($tHeader as $tHead){
											echo '<th>'.$tHead.'</th>';
										};

									?>
								</tr>
							</thead>
							<tbody>
								<?php 
									foreach($philinfo as $info){
										echo "
										<tr class='clickable' id=".$info->monthlySalaryBracket.">
											<td>".$info->monthlySalaryBracket."</td>
											<td>".$info->startRange."</td>
											<td>".$info->endRange."</td>
											<td>".$info->totalMonthlyContribution."</td>
											<td>".$info->employeeShare."</td>
											<td>".$info->employerShare."</td>
										</tr>
										";
									}	
								?>
							</tbody>
						</table>
					</div>
				</div>
				<div id="table7" class="tab-pane fade">
					<div class="table-responsive">
						<table class="table table-striped MaintenanceTable" id="7table">
							<thead>
								<tr>
									<?php
									$tHeader=array('Salary Grade', 'step_1', 'step_2', 'step_3', 'step_4', 'step_5','step_6', 'step_7','step_8');
										foreach($tHeader as $tHead){
											echo '<th>'.$tHead.'</th>';
										};

									?>
								</tr>
							</thead>
							<tbody>
								<?php 
									foreach($sginfo as $info){
										echo "
										<tr class='clickable' id=".$info->salaryGrade.">
											<td>".$info->salaryGrade."</td>
											<td>".$info->step_1."</td>
											<td>".$info->step_2."</td>
											<td>".$info->step_3."</td>
											<td>".$info->step_4."</td>
											<td>".$info->step_5."</td>
											<td>".$info->step_6."</td>
											<td>".$info->step_7."</td>
											<td>".$info->step_8."</td>
										</tr>
										";
									}	
								?>
							</tbody>
						</table>
					</div>
				</div>
				<div id="table8" class="tab-pane fade">
					<div class="table-responsive">
						<table class="table table-striped MaintenanceTable" id="8table">
							<thead>
								<tr>
									<?php
									$tHeader=array('Compensation Level', 'Exemption', 'Status', 'Z', 'SME', 'ME1S1','ME2S2', 'ME3S3','ME4S4');
										foreach($tHeader as $tHead){
											echo '<th>'.$tHead.'</th>';
										};

									?>
								</tr>
							</thead>
							<tbody>
								<?php 
									foreach($wtinfo as $info){
										echo "
										<tr class='clickable' id=".$info->compensationLevel.">
											<td>".$info->compensationLevel."</td>
											<td>".$info->exemption."</td>
											<td>".$info->status."</td>
											<td>".$info->Z."</td>
											<td>".$info->SME."</td>
											<td>".$info->ME1S1."</td>
											<td>".$info->ME2S2."</td>
											<td>".$info->ME3S3."</td>
											<td>".$info->ME4S4."</td>
										</tr>
										";
									}	
								?>
							</tbody>
						</table>
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
			$('#5table').DataTable({
				"pageLength": 10,
				"pagingType": "full",
				"bFilter": true,
				"bLengthChange": false,
				"ordering": true,
				responsive: true
			});

			$('#6table').Tabledit({
				url: "Maintenance/edit_philhealth",
				editButton: false,
				deleteButton: false,
				hideIdentifier: false,
				columns: {
					identifier: [0, 'bracket'],
					editable: [[1, 'startRange'], [2, 'endRange'],[3, 'totalMonthly'],[4, 'empShare'],[5, 'emploShare']]
				}
			});

			$('#7table').Tabledit({
				url: "Maintenance/edit_salarygrade",
				editButton: false,
				deleteButton: false,
				hideIdentifier: false,
				columns: {
					identifier: [0, 'sGrade'],
					editable: [[1, 's1'], [2, 's2'],[3, 's3'],[4, 's4'],[5, 's5'],[6,'s6'],[7,'s7'],[8,'s8']]
				}
			});

			$('#8table').Tabledit({
				url: "Maintenance/edit_wt",
				editButton: false,
				deleteButton: false,
				hideIdentifier: false,
				columns: {
					identifier: [0, 'cLevel'],
					editable: [[1, 'exemption'], [2, 'status'],[3, 'Z'],[4, 'SME'],[5, 'ME1S1'],[6,'ME2S2'],[7,'ME3S3'],[8,'ME4S4']]
				}
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

    	$('.tabClick').click(function(){
    		ID = "";
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

    	$('#editDeduction').click(function(){
    		if(ID!=""){
    			window.location.href = "<?php echo base_url(); ?>Maintenance/editDeduction/"+ ID;
    		}else{
    			swal("Notice","Select a row first before clicking edit","error")
    		}
    	})
	</script>