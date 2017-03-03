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
			<li class="active"><a href="<?php echo base_url(); ?>employee/manageUserAcct">Manage Holiday</a></li>
		</ol>
		<div class="row Title">
			<h4 style="color:<?php echo $company['colorTheme']; ?>;"><b>MANAGE HOLIDAY</b></h4>
			<hr />
		</div>
		
		<div class="panel panel-default" style="margin:0px 15px;">
		<div class="panel-heading" style="color:<?php echo $company['colorTheme']; ?>;">
			<span class="glyphicon glyphicon-refresh"></span><b> Edit User</b>
		</div>
		<?php if(isSet($error)): ?>
			<div class="alert alert-danger alert-dismissable fade in"><?php echo $error; ?><a href="#" id="ekis" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>
		<?php endif; ?>
		<form action="../editHoliday" method="post" id="updateHolidayForm" class="form-horizontal" enctype="multipart/form-data" accept-charset="utf-8">
		<div class="panel-body">
		<div class="form-group col-lg-6" style="display:none;">
			<label for="holidayId" class="control-label col-md-5">Holiday ID:</label>
			<div class="col-md-7">
				<input type="text" name="holidayId" class="form-control text-box single-line" id="holidayId" value="<?php echo $holidayInfo->row(8)->holidayId; ?>" placeholder="Holiday ID:" required/>
				<span class= "f_name_status"></span>
			</div>
		</div>
		<div class="form-group col-lg-6">
			<label for="holidayName" class="control-label col-md-5">Holiday Name:</label>
			<div class="col-md-7">
				<input type="text" name="holidayName" class="form-control text-box single-line" id="holidayName" value="<?php echo $holidayInfo->row(8)->holidayName; ?>" placeholder="Holiday Name:" required/>
				<span class= "f_name_status"></span>
			</div>
		</div>
		<div class="form-group col-lg-6">
			<label for="holidayDate" class="control-label col-md-5">Holiday Date:</label>
			<div class="col-md-7">
				<input type="date" name="holidayDate" class="form-control text-box single-line" id="holidayDate" value="<?php $dateC = date_create($holidayInfo->row()->holidayDate); $dateF = date_format($dateC, 'Y-m-d'); echo $dateF;  ?>" placeholder="Holiday Date:" required/>
			</div>
		</div>
		<div class="form-group col-lg-6">
			<label for="holidayType" class="control-label col-md-5">Holiday Type:</label>
			<div class="col-md-7">
				<select name="holidayType" class="form-control" id="holidayType">
			        <option value='Regular' selected='SELECTED'>Regular</option>
			        <option value='Special Non-working'>Special Non-working</option>
			        <option value='Observance'>Observance</option>
			        <option value='-'>-</option>
			    </select>
				<script> $('#holidayType').val('<?php echo $holidayInfo->row()->holidayType; ?>'); </script>
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