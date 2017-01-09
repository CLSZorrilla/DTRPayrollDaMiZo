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
						<a href="createUserAcct">Create New <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></a>
					</p>
				</div>
					<table class="table table-striped MaintenanceTable">
						<thead>
							<tr>
								<th>
									Employee ID
								</th>
								<th>
									Position Code
								</th>
								<th>
									Department Code
								</th>
								<th>
									Full Name
								</th>
								<th>
									Address
								</th>
								<th>
									Marital Status
								</th>
								<th>
									Date Hired
								</th>
								<th>
									GSIS No.
								</th>
								<th>
									PhilHealth No.
								</th>
								<th>
									TIN
								</th>
								<th>
									Leave Credits
								</th>
								<th>
									Email Address
								</th>
								<th>
									Birthdate
								</th>
								<th>
									Contact No.
								</th>
								<th>
									Sex
								</th>
								<th>
									Picture
								</th>
								<th>
								</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									13-037-064
								</td>
								<td>
									1
								</td>
								<td>
									1
								</td>
								<td>
									ZORRILLA, CHRISTIAN LORENZ
								</td>
								<td>
									CUBAO, QUEZON CITY
								</td>
								<td>
									MARRIED (LOL)
								</td>
								<td>
									04/15/2017
								</td>
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
									5
								</td>
								<td>
									clzorilla@yahoo.com
								</td>
								<td>
									12/28/1995
								</td>
								<td>
									09123456789
								</td>
								<td>
									Male
								</td>
								<td>
									-
								</td>
								<td>
									<a href="#">View More Info</a>
									<span>|</span>
									<a href="UpdateUser.php">Update</a>
								</td>
							</tr>
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
		});
	</script>