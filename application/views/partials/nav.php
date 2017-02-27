<?php include "nav_customize.php";?>
<nav class="navbar navbar-default navbar-fixed-top">
	<div class="TitleBar row">
		<div class="navbar-header NavbarHeader">
			<a class="navbar-brand navbar-link" href="<?php echo base_url(); ?>main/home_view">
				<img src="<?php echo $company['logo']; ?>" height="100" width="100" alt="Logo" />
				<p><?php echo strtoupper($company['name']); ?></p></a>
			</a>
			<ul class="pull-right TitleBarList">
				<li>
					<a href="<?php echo base_url(); ?>main/logout">
						<i class="circle"><span class="glyphicon glyphicon-log-out"></span></i>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="MenuBar row" style="background-color:<?php echo $company['colorTheme']; ?>;">
			<ul>
				<li class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
					<a href="<?php echo base_url(); ?>main/home_view">
						<span class="glyphicon glyphicon-home"></span><br/>Home
					</a>
				</li>
				<li class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
					<a href="<?php echo base_url(); ?>attendance/index">
						<span class="glyphicon glyphicon-list-alt"></span><br/>Attendance
					</a>
				</li>
				<li class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
					<a href="<?php echo base_url(); ?>employee/monthlyPayslip">
						<span class="glyphicon glyphicon-list-alt"></span><br/>Payslip
					</a>
				</li>
			</ul>
	</div>
</nav>
<div class="NavGap">&nbsp;</div>