<?php
	include "/../partials/nav_customize.php";
?>
<style type="text/css">
  button#updateBtn{
    background-color:white;
    color:black;
    border: 2px solid <?php echo $company['colorTheme']; ?>;
      -webkit-transition-duration: 0.4s; /* Safari */
      transition-duration: 0.4s;
  }
  button#updateBtn:hover{
      background-color: <?php echo $company['colorTheme']; ?>;
      color: white;
  }
</style>

<div class="BodyContainer">
	<div class="BodyContent">
		<ol class="breadcrumb">
			<li><a href="#">Home</a></li>
			<li><a href="#">Maintenance</a></li>
			<li class="active"><a href="<?php echo base_url(); ?>employee/manageUserAcct">Manage Deduction Type</a></li>
		</ol>
		<div class="row Title">
			<h4 style="color:<?php echo $company['colorTheme']; ?>;"><b>MANAGE DEDUCTION TYPE</b></h4>
			<hr />
		</div>
		
		<div class="panel panel-default" style="margin:0px 15px;">
		<div class="panel-heading" style="color:<?php echo $company['colorTheme']; ?>;">
			<span class="glyphicon glyphicon-refresh"></span><b> Edit User</b>
		</div>
		<?php if(isSet($error)): ?>
			<div class="alert alert-danger alert-dismissable fade in"><?php echo $error; ?><a href="#" id="ekis" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>
		<?php endif; ?>
		<form action="../editDeduction" method="post" id="updateDeductionForm" class="form-horizontal" enctype="multipart/form-data" accept-charset="utf-8">
		<div class="panel-body">
		<div class="form-group col-lg-6" style="display:none;">
			<label for="deductionId" class="control-label col-md-5">Deduction ID:</label>
			<div class="col-md-7">
				<input type="text" name="deductionId" class="form-control text-box single-line" id="deductionId" value="<?php echo $deductionInfo->row(8)->deductionId; ?>" placeholder="Deduction ID:" required/>
				<span class= "f_name_status"></span>
			</div>
		</div>
		<div class="form-group col-lg-6">
			<label for="deductionName" class="control-label col-md-5">Deduction Name:</label>
			<div class="col-md-7">
				<input type="text" name="deductionName" class="form-control text-box single-line" id="deductionName" value="<?php echo $deductionInfo->row(8)->deductionName; ?>" placeholder="Deduction Name:" required/>
				<span class= "f_name_status"></span>
			</div>
		</div>
		<div class="form-group">
			<div>
				<input type="reset" value="Reset" class="btn btnReset pull-right" style="width:100px;margin:5px;">
				<button type="updateBtn" name="updateBtn" id="updateBtn" class="btn btnEnter pull-right" style="width:100px;margin:5px;">Update</button>
			</div>
		</div>
		</div>
		</form>
	</div>
</div>
</div>