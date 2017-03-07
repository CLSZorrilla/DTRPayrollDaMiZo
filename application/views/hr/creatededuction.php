<?php
	include "/../partials/nav_customize.php";
?>
<style type="text/css">
  input.btnEnter{
    background-color:white;
    color:black;
    border: 2px solid <?php echo $company['colorTheme']; ?>;
      -webkit-transition-duration: 0.4s; /* Safari */
      transition-duration: 0.4s;
  }
  input.btnEnter:hover{
      background-color: <?php echo $company['colorTheme']; ?>;
      color: white;
  }
</style>

<div class="BodyContainer">
	<div class="BodyContent">
		<ol class="breadcrumb">
			<li><a href="#">Home</a></li>
			<li><a href="#">Maintenance</a></li>
			<li class="active"><a href="http://[::1]/payroll/employee/manageUserAcct">Manage Deduction Type</a></li>
		</ol>
		<div class="row Title">
			<h4 style="color:<?php echo $company['colorTheme']; ?>;"><b>MANAGE DEDUCTION TYPE</b></h4>
			<hr>
		</div>
		
		<div class="panel panel-default" style="margin:0px 15px;">
		<div class="panel-heading" style="color:<?php echo $company['colorTheme']; ?>;">
			<span class="glyphicon glyphicon-plus-sign"></span><b> Create Deduction Type</b>

		</div>

		<form action="http://[::1]/payroll/Maintenance/createDeduction" id="create_user_form" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">

		<div class="panel-body">
				<div class="form-group col-lg-6">
					<label for="deductionName" class="control-label col-md-5">Deduction Name:</label>			
					<div class="col-md-7">
						<input type="text" name="deductionName" value="" class="form-control text-box single-line" id="deductionName" placeholder="Deduction Name" required="1">
 						<span class="f_name_status"></span>
 					</div>
				</div>
		</div>
		<div class="panel-footer">
			<div style="overflow: hidden;">
				<input type="reset" value="Reset" class="btn btn-default pull-right" style="width:100px;margin:5px;">
				<input type="submit" name="submit" value="Register" class="btn btnEnter pull-right" id="submit" style="width:100px;margin:5px;">
			</div>
		</div>
	</form></div>
</div>
</div>