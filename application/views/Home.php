
	<div>
		<ol class="breadcrumb">
			<li><a href="#"><span class="glyphicon glyphicon-home"></span> Home</a></li>
		</ol>
	</div>
	<div class="BodyContainer">
		<div class="BodyContent">
			<div class="row Title">
				<h4>HOME</h4>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<div class="panel panel-default" id="WelcomePanel">
						<div class="panel-body">
							<h3><?php if($this->session->userdata('username')): ?>
								<p>
								<?php echo "You are logged in as " . $this->session->userdata('user_id') ?>
								</p>
								<?php endif; ?>
							</h3>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Status</h3>
						</div>
						<div class="panel-body">
							<table id="AttendanceStat" class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
								<tr>
									<td><span>AM Time In</span></td>
									<td><span>AM Time Out</span></td>
									<td><span>PM Time In</span></td>
									<td><span>PM Time Out</span></td>
								</tr>
								<tr>
									<td><span>-</span></td>
									<td><span>-</span></td>
									<td><span>-</span></td>
									<td><span>-</span></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Holiday</h3>
						</div>
						<div class="panel-body">
							<table id="HolidayTable" class="table table-fixed">
								<thead>
									<tr>
										<th>Holiday</th>
										<th>Date</th>
										<th>Type</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>New Years Day</td>
										<td>January 1</td>
										<td>Regular</td>
									</tr>
									<tr>
										<td>Chinese New Year</td>
										<td>January 28</td>
										<td>Special Non-Working</td>
									</tr>
									<tr>
										<td>Araw ng Kagitingan</td>
										<td>April 9</td>
										<td>Regular</td>
									</tr>
									<tr>
										<td>Maundy Thursday</td>
										<td>April 13</td>
										<td>Regular</td>
									</tr>
									<tr>
										<td>Good Friday</td>
										<td>April 14</td>
										<td>Regular</td>
									</tr>
									<tr>
										<td>Black Saturday</td>
										<td>April 15</td>
										<td>Special Non-Working</td>
									</tr>
									<tr>
										<td>Labor Day</td>
										<td>May 1</td>
										<td>Regular</td>
									</tr>
									<tr>
										<td>Independence Day</td>
										<td>June 12</td>
										<td>-</td>
									</tr>
									<tr>
										<td>Eid-Ul-Fitr</td>
										<td>June 26</td>
										<td>-</td>
									</tr>
									<tr>
										<td>Ninoy Aquino Day</td>
										<td>August 21</td>
										<td>Special Non-Working</td>
									</tr>
									<tr>
										<td>National Heroes Day</td>
										<td>August 28</td>
										<td>Regular</td>
									</tr>
									<tr>
										<td>Eid Al-Adha</td>
										<td>September 1</td>
										<td>-</td>
									</tr>
									<tr>
										<td>Public Holiday</td>
										<td>October 31</td>
										<td>Special Non-Working</td>
									</tr>
									<tr>
										<td>All Saints Day</td>
										<td>November 1</td>
										<td>Special Non-Working</td>
									</tr>
									<tr>
										<td>Bonifacio Day</td>
										<td>November 30</td>
										<td>-</td>
									</tr>
									<tr>
										<td>Christmas Day</td>
										<td>December 25</td>
										<td>Regular</td>
									</tr>
									<tr>
										<td>Rizal Day</td>
										<td>December 30</td>
										<td>-</td>
									</tr>
									<tr>
										<td>New Year's Eve</td>
										<td>December 31</td>
										<td>Special Non-Working</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="Footer">
		<div class="pull-right">
			<p>&copy; Copyright 2016 All Rights Reserved.</p>
		</div>
	</div>