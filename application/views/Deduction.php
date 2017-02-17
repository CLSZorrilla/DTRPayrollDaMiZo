
	<div>
		<ol class="breadcrumb">
			<li><a href="#"><span class="glyphicon glyphicon-home"></span> Home</a></li>
			<li class="active">Deduction</li>
		</ol>
	</div>
	<div class="BodyContainer">
		<div class="BodyContent">
      		<div class="row" id="Title">
				<h4>DEDUCTION TABLES</h4>
			</div>
			<div class="row Pills">
				<ul class="nav nav-pills nav-justified">
				  <li role="presentation" class="active"><a data-toggle="pill" href="#table1">Salary Grade</a></li>
				  <li role="presentation"><a data-toggle="pill" href="#table2">PhilHealth</a></li>
				  <li role="presentation"><a data-toggle="pill" href="#table3">Table 3</a></li>
				</ul>
			</div>
			<div class="tab-content">
				<div id="table1" class="tab-pane fade in active">
					<div class="table-responsive">
						<table class="table table-striped dTable">
							<thead>
								<tr>
									<th>Salary Grade</th>
									<th>Step 1</th>
									<th>Step 2</th>
									<th>Step 3</th>
									<th>Step 4</th>
									<th>Step 5</th>
									<th>Step 6</th>
									<th>Step 7</th>
									<th>Step 8</th>
								</tr>
							</thead>
							<tbody>
								<?php
									foreach($sGrade as $sG){
										echo "
											<tr>
												<td>".$sG->salaryGrade."</td>
												<td>".$sG->step_1."</td>
												<td>".$sG->step_2."</td>
												<td>".$sG->step_3."</td>
												<td>".$sG->step_4."</td>
												<td>".$sG->step_5."</td>
												<td>".$sG->step_6."</td>
												<td>".$sG->step_7."</td>
												<td>".$sG->step_8."</td>
											</tr>
										";	
									}
								?>
							</tbody>
						</table>
					</div>
				</div>
				<div id="table2" class="tab-pane fade">
					<div class="table-responsive">
						<table class="table table-striped dTable">
							<thead>
								<tr>
									<th>Monthly Salary Bracket</th>
									<th>Monthly Salary Range</th>
									<th>Salary Base</th>
									<th>Monthly Contribution</th>
									<th>Employee Share</th>
									<th>Employer Share</th>
								</tr>
							</thead>
							<tbody>
								<?php
									foreach($pHealth as $pH){
										echo "
											<tr>
												<td>".$pH->monthlySalaryBracket."</td>
												<td>".$pH->monthlySalaryRange."</td>
												<td>".$pH->salaryBase."</td>
												<td>".$pH->totalMonthlyContribution."</td>
												<td>".$pH->employeeShare."</td>
												<td>".$pH->employerShare."</td>
											</tr>
										";
									}
								?>
							</tbody>
						</table>
					</div>
				</div>
				<div id="table3" class="tab-pane fade">'
					<div class="table-responsive">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>
										Column 1
									</th>
									<th>
										Column 2
									</th>
									<th>
										Column 3
									</th>
									<th>
										Column 4
									</th>
									<th>
										Column 5
									</th>
									<th>
										Column 6
									</th>
									<th>
										Column 7
									</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										1
									</td>
									<td>
										13-037-064
									</td>
									<td>
										2016-11-09
									</td>
									<td>
										8:10 AM
									</td>
									<td>
										11:10 AM
									</td>
									<td>
										12:10 PM
									</td>
									<td>
										5:10 PM
									</td>
								</tr>
								<tr>
									<td>
										1
									</td>
									<td>
										13-037-064
									</td>
									<td>
										2016-11-10
									</td>
									<td>
										8:15 AM
									</td>
									<td>
										11:15 AM
									</td>
									<td>
										12:15 PM
									</td>
									<td>
										5:15 PM
									</td>
								</tr>
								<tr>
									<td>
										1
									</td>
									<td>
										13-037-064
									</td>
									<td>
										2016-11-11
									</td>
									<td>
										8:20 AM
									</td>
									<td>
										11:20 AM
									</td>
									<td>
										12:20 PM
									</td>
									<td>
										5:20 PM
									</td>
								</tr>
								<tr>
									<td>
										1
									</td>
									<td>
										13-037-064
									</td>
									<td>
										2016-11-12
									</td>
									<td>
										8:25 AM
									</td>
									<td>
										11:25 AM
									</td>
									<td>
										12:25 PM
									</td>
									<td>
										5:25 PM
									</td>
								</tr>
								<tr>
									<td>
										1
									</td>
									<td>
										13-037-064
									</td>
									<td>
										2016-11-13
									</td>
									<td>
										8:30 AM
									</td>
									<td>
										11:30 AM
									</td>
									<td>
										12:30 PM
									</td>
									<td>
										5:30 PM
									</td>
								</tr>
								<tr>
									<td>
										1
									</td>
									<td>
										13-037-064
									</td>
									<td>
										2016-11-14
									</td>
									<td>
										8:35 AM
									</td>
									<td>
										11:35 AM
									</td>
									<td>
										12:35 PM
									</td>
									<td>
										5:35 PM
									</td>
								</tr>
								<tr>
									<td>
										1
									</td>
									<td>
										13-037-064
									</td>
									<td>
										2016-11-15
									</td>
									<td>
										8:40 AM
									</td>
									<td>
										11:40 AM
									</td>
									<td>
										12:40 PM
									</td>
									<td>
										5:40 PM
									</td>
								</tr>
								<tr>
									<td>
										1
									</td>
									<td>
										13-037-064
									</td>
									<td>
										2016-11-16
									</td>
									<td>
										8:45 AM
									</td>
									<td>
										11:45 AM
									</td>
									<td>
										12:45 PM
									</td>
									<td>
										5:45 PM
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
        $(document).ready(function () {
			$('.dTable').DataTable({
				"pageLength": 10,
				"bLengthChange": false,
				"pagingType": "full",
				"bFilter": true,
				"ordering": true,
				"aaSorting": [[0, 'asc']]
			});
		});
	</script>