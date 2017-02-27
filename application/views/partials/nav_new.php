<?php include "nav_customize.php"; ?>
<style type="text/css">
	.btnMenu button{
		background-color: <?php echo $company['colorTheme']; ?>;
		color:black;
		-webkit-text-fill-color: white;
		-webkit-text-stroke-width: .25px;
		-webkit-text-stroke-color: black;
	}
	.btnMenu button:hover{
	    background-color: white;
	    border: 2px solid <?php echo $company['colorTheme']; ?>;
	    padding:5px 11px;
	    color:black;
		-webkit-text-fill-color: white;
		-webkit-text-stroke-width: 1px;
		-webkit-text-stroke-color: black;
	}
</style>
<nav class="navbar navbar-default navbar-fixed-top" style="border-bottom:2px solid <?php echo $company['colorTheme']; ?>;">
	<div class="TitleBar row">
		<div class="navbar-header NavbarHeader">
            <button id="navnewBtn" type="button" class="navbar-toggle pull-left" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
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
	<div class="collapse navbar-collapse" id="myNavbar">
		<!-- style="background-color:<?php echo $company['colorTheme']; ?>;" -->
		<ul class="nav navbar-nav navbar-right" style="">
			<li>
				<a class="btnMenu" href="<?php echo base_url(); ?>main/home_view">
					<button class="btn">
						<span class="glyphicon glyphicon-home"></span> Home
					</button>
				</a>
			</li>
			<li>
				<a class="btnMenu" href="<?php echo base_url(); ?>attendance/index">
					<button class="btn">
						<span class="glyphicon glyphicon-list-alt"></span> Attendance
					</button>
				</a>
			</li>
			<li>
				<a class="btnMenu" href="<?php echo base_url(); ?>employee/monthlyPayslip">
					<button class="btn">
						<span class="glyphicon glyphicon-piggy-bank"></span> Payslip
					</button>
				</a>
			</li>
			<?php if($this->session->userdata('aType') == 'Payroll Clerk'){?>
			<li>
				<a class="btnMenu" href="<?php echo base_url(); ?>Clerk">
					<button class="btn">
						<span class="glyphicon glyphicon-calendar"></span> Generate Payroll
					</button>
				</a>
			</li>
			<li>
				<a class="btnMenu" href="<?php echo base_url(); ?>Clerk/viewpayslip">
					<button class="btn">
						<span class="glyphicon glyphicon-refresh"></span> Process Payslip
					</button>
				</a>
			</li>
			<?php } ?>
			<?php if($this->session->userdata('aType') == 'HR'){?>
			<li>
				<a class="btnMenu" href="<?php echo base_url(); ?>Remittance">
					<button class="btn">
						<span class="glyphicon glyphicon-list"></span> Remittance
					</button>
				</a>
			</li>
			<li>
				<a class="btnMenu" href="<?php echo base_url(); ?>employee/manageUserAcct">
					<button class="btn">
						<span class="glyphicon glyphicon-wrench"></span> Maintenance
					</button>
				</a>
			</li>
			<li>
				<a class="btnMenu" href="<?php echo base_url(); ?>leave">
					<button class="btn">
						<span class="glyphicon glyphicon-remove"></span> Leave
					</button>
				</a>
			</li>
			<li>
				<a class="btnMenu" href="<?php echo base_url(); ?>Deduction/dMgmt">
					<button class="btn">
						<span class="glyphicon glyphicon-minus-sign"></span> Deduction
					</button>
				</a>
			</li>
			<li>
				<a class="btnMenu" href="<?php echo base_url(); ?>main/customize">
					<button class="btn">
						<span class="glyphicon glyphicon-cog"></span> Customize
					</button>
				</a>
			</li>
			<?php } ?>
		</ul>
	</div>
</nav>
<div class="NavNewGap">&nbsp;</div>