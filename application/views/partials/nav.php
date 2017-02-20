<?php include "nav_customize.php";?>
<nav class="navbar navbar-default navbar-fixed-top">
	<div class="TitleBar row">
		<div class="navbar-header" style="padding:0px 15px;float:none;">
			<a class="navbar-brand navbar-link" href="<?php echo base_url(); ?>main/home_view">
				<img src="<?php echo $company['logo']; ?>" height="100" width="100" alt="Logo" />
				<p><?php echo strtoupper($company['name']); ?></p></a>
			</a>
			<ul class="pull-right TitleBarList">
				<li>
					<a href="<?php echo base_url(); ?>chat">
						<i class="circle"><span class="glyphicon glyphicon-envelope"></span></i>
					</a>
				</li>
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
				<a href="<?php echo base_url(); ?>main/home_view">
					<li class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
						<span class="glyphicon glyphicon-home"></span><br/>Home
					</li>
				</a>
				<a href="<?php echo base_url(); ?>attendance/index">
					<li class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
						<span class="glyphicon glyphicon-list-alt"></span><br/>Attendance
					</li>
				</a>
			</ul>
	</div>
</nav>
<div class="NavGap">&nbsp;</div>