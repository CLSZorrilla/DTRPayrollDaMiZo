<?php include "partials/nav_customize.php"; ?>
<?php
	$tHeader=array('Holiday', 'Date' ,'Type');
	$tWidth=array('col-lg-5 col-md-5 col-sm-5 col-xs-5', 'col-lg-3 col-md-3 col-sm-3 col-xs-3' ,'col-lg-4 col-md-4 col-sm-4 col-xs-4');
?>
<div class="BodyContainer">
	<div class="BodyContent">
		<div class="row" id="Title">
			<h4 style="color:<?php echo $company['colorTheme']; ?>;"><b>HOME</b></h4>
			<hr/>
		</div>
		<div class="row">
			<div class="col-lg-6">
				<div class="panel jumbotron" id="WelcomePanel">
					<div class="panel-body">
						<h3>
							<?php if($this->session->userdata('username')): ?>
								<p><?php echo "Welcome " . $this->session->userdata('user_id') ?></p>
							<?php endif; ?>
						</h3>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading" style="color:<?php echo $company['colorTheme']; ?>;">
						<span class="glyphicon glyphicon-time"></span>
						<b> Status</b>
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
					<div class="panel-heading" style="color:<?php echo $company['colorTheme']; ?>;">
						<span class="glyphicon glyphicon-briefcase"></span>
						<b> Holiday</b>
					</div>
					<div class="panel-body">
						<table id="HolidayTable" class="table scroll">
							<thead>
								<tr>
									<?php
										foreach($tHeader as $key => $tHead){
											echo '<th class='.$tWidth[$key].'>'.$tHead.'</th>';
										};
									?>
								</tr>
							</thead>
							<tbody>
								<?php 
									foreach($hinfo as $info){
										echo "
											<tr>
											<td class='col-lg-5'>".$info->holidayName."</td>
											<td class='col-lg-3'>".$info->holidayDate."</td>
											<td class='col-lg-4'>".$info->holidayType."</td>
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