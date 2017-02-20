<?php include "partials/nav_customize.php"; ?>
<div class="BodyContainer">
	<div class="BodyContent">
		<div class="row" id="Title">
			<h4>HOME</h4>
			<hr/>
		</div>
		<div class="row">
			<div class="col-lg-6">
				<div class="panel panel-default" id="WelcomePanel">
					<div class="panel-body">
						<h3>
							<?php if($this->session->userdata('username')): ?>
								<p style="color:<?php echo $company['colorTheme']; ?>;"><?php echo "Welcome " . $this->session->userdata('user_id') ?></p>
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
								<th><span>AM Time In</span></th>
								<th><span>AM Time Out</span></th>
								<th><span>PM Time In</span></th>
								<th><span>PM Time Out</span></th>
							</tr>
							<?php
								if($cAttend){
									foreach($cAttend as $cAtt){
										echo "
											<tr>
												<td>".$cAtt->timeIn."</td>
												<td>".$cAtt->amOut."</td>
												<td>".$cAtt->pmIn."</td>
												<td>".$cAtt->timeOut."</td>
											</tr>
										";
									}
								}
								else{
									echo "<tr>
										<td colspan='4'><font color='red'><b>NO ATTENDANCE YET</b></font></td>
									</tr>";
								}
							?>
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
									<?php
									$tHeader=array('Holiday', 'Date' ,'Type');
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
											<tr>
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
			</div>
		</div>
	</div>
</div>