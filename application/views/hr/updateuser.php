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
			<li class="active"><a href="<?php echo base_url(); ?>employee/manageUserAcct">Manage User</a></li>
		</ol>
		<div class="row Title">
			<h4 style="color:<?php echo $company['colorTheme']; ?>;"><b>MANAGE USER</b></h4>
			<hr />
		</div>
		
		<div class="panel panel-default" style="margin:0px 15px;">
		<div class="panel-heading" style="color:<?php echo $company['colorTheme']; ?>;">
			<span class="glyphicon glyphicon-refresh"></span><b> Edit User</b>
		</div>

		<form action="" id="" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
		<div class="panel-body">
		<div class="form-group col-lg-6">
			<label for="empID" class="control-label col-md-5">Employee ID:</label>
			<div class="col-md-7">
				<input type="text" name="empID" class="form-control text-box single-line" id="empID" placeholder="Employee ID:" />
			</div>
		</div>
		<div class="form-group col-lg-6" style="height: 34px;">
			<label for="pPicture" class="control-label col-md-5">Profile Picture:</label>
			<div class="col-md-7">
				<input type="file" name="pic" />
			</div>
		</div>
		<div class="form-group col-lg-6">
			<label for="pword" class="control-label col-md-5">Password:</label>
			<div class="col-md-7">
				<input type="password" name="pword" class="form-control text-box single-line" id="pword" placeholder="Password:" />
			</div>
		</div>
		<div class="form-group col-lg-6">
			<label for="cpword" class="control-label col-md-5">Confirm Password:</label>
			<div class="col-md-7">
				<input type="password" name="cpword" class="form-control text-box single-line" id="cpword" placeholder="Confirm Password:" />
			</div>
		</div>
		<div class="form-group col-lg-6">
			<label for="positionCode" class="control-label col-md-5">Position:</label>
			<div class="col-md-7">
				<select name="positions" class="form-control">
			        <option value='0' selected='SELECTED'>Guild Master</option>
			        <option value='1'>Guild Moderator</option>
			        <option value='2'>Guild Member</option>
			    </select>
			</div>
		</div>
		<div class="form-group col-lg-6">
			<label for="deptCode" class="control-label col-md-5">Department:</label>
			<div class="col-md-7">
				<select name="department" class="form-control">
			        <option value='0' selected='SELECTED'>Catacombs</option>
			        <option value='1'>Aminus</option>
			    </select>
			</div>
		</div>
		<div class="form-group col-lg-6">
			<label for="fName" class="control-label col-md-5">First Name:</label>
			<div class="col-md-7">
				<input type="text" name="fName" class="form-control text-box single-line" id="fName" placeholder="First Name:" />
			</div>
		</div>
		<div class="form-group col-lg-6">
			<label for="lName" class="control-label col-md-5">Last Name:</label>
			<div class="col-md-7">
				<input type="text" name="lName" class="form-control text-box single-line" id="lName" placeholder="Last Name:" />
			</div>
		</div>
		<div class="form-group col-lg-6">
			<label for="mName" class="control-label col-md-5">Middle Name:</label>
			<div class="col-md-7">
				<input type="text" name="mName" class="form-control text-box single-line" id="mName" placeholder="Middle Name:" />
			</div>
		</div>
		<div class="form-group col-lg-6">
			<label for="uType" class="control-label col-md-5">User Type:</label>
			<div class="col-md-7">
				<select name="userType" class="form-control">
					<option value='Employee' selected='SELECTED'>Employee</option>
					<option value='HR'>Human Relations</option>
					<option value='Payroll Clerk'>Payroll Clerk</option>
				</select>
			</div>
		</div>
		<div class="form-group col-lg-6">
			<label for="emailAdd" class="control-label col-md-5">Email Address:</label>
			<div class="col-md-7">
				<input type="email" name="emailAdd" class="form-control text-box single-line" id="emailAdd" placeholder="Email Address:" />
			</div>
		</div>
		<div class="form-group col-lg-6">
			<label for="address" class="control-label col-md-5">Address:</label>
			<div class="col-md-7">
				<input type="text" name="address" class="form-control text-box single-line" id="address" placeholder="Address:" />
			</div>
		</div>
		<div class="form-group col-lg-6">
			<label for="maritalStatus" class="control-label col-md-5">Marital Status:</label>
			<div class="col-md-7">
				<select name="maritalStatus" class="form-control">
					<option value='Married' selected='SELECTED'>Married</option>
					<option value='Widowed'>Widowed</option>
					<option value='Divorced'>Divorced</option>
					<option value='Single'>Single</option>
				</select>
			</div>
		</div>
		<div class="form-group col-lg-6">
			<label for="dependents" class="control-label col-md-5">Dependents:</label>
			<div class="col-md-7">
				<input type="number" name="dependents" class="form-control text-box single-line" id="dependents" placeholder="Dependents:" />
			</div>
		</div>
		<div class="form-group col-lg-6">
			<label for="birthDate" class="control-label col-md-5">Birthday:</label>
			<div class="col-md-7">
				<input type="date" name="birthDate" class="form-control text-box single-line" id="birthDate" placeholder="Birthday:" />
			</div>
		</div>
		<div class="form-group col-lg-6">
			<label for="cNo" class="control-label col-md-5">Contact No.:</label>
			<div class="col-md-7">
				<input type="text" name="cNo" class="form-control text-box single-line" id="cNo" placeholder="Contact No.:" />
			</div>
		</div>
		<div class="form-group col-lg-6" style="height: 34px;">
			<label for="sex" class="control-label col-md-5">Sex:</label>
			<div class="col-md-7">
				<input type='radio' name="sex" value='Male' checked>Male
	  			<input type='radio' name="sex" value='Female'> Female
			</div>
		</div>
		<div class="form-group col-lg-6" style="height: 34px;">
			<label for="type" class="control-label col-md-5">Employee Type:</label>
			<div class="col-md-7">
				<input type='radio' name="type" value='Regular' checked>Regular
	  			<input type='radio' name="type" value='Contractual'> Contractual
			</div>
		</div>
		<div class="form-group col-lg-6">
			<label for="dateHired" class="control-label col-md-5">Date Hired:</label>
			<div class="col-md-7">
				<input type="date" name="dateHired" class="form-control text-box single-line" id="dateHired" placeholder="Date Hired:" />
			</div>
		</div>
		<div class="form-group col-lg-6">
			<label for="gsisNo" class="control-label col-md-5">GSISNo:</label>
			<div class="col-md-7">
				<input type="text" name="gsisNo" class="form-control text-box single-line" id="gsisNo" placeholder="GSISNo:" />
			</div>
		</div>
		<div class="form-group col-lg-6">
			<label for="phNo" class="control-label col-md-5">PhilHealthNo:</label>
			<div class="col-md-7">
				<input type="text" name="phNo" class="form-control text-box single-line" id="phNo" placeholder="PhilHealthNo:" />
			</div>
		</div>
		<div class="form-group col-lg-6">
			<label for="tin" class="control-label col-md-5">TIN:</label>
			<div class="col-md-7">
				<input type="text" name="tin" class="form-control text-box single-line" id="tin" placeholder="TIN:" />
			</div>
		</div>
		<div class="form-group col-lg-6">
			<label for="vLeave" class="control-label col-md-5">Vacation Leave:</label>
			<div class="col-md-7">
				<input type="text" name="vLeave" class="form-control text-box single-line" id="vLeave" placeholder="Vacation Leave:" />
			</div>
		</div>
		<div class="form-group col-lg-6">
			<label for="sLeave" class="control-label col-md-5">Sick Leave:</label>
			<div class="col-md-7">
				<input type="text" name="sLeave" class="form-control text-box single-line" id="sLeave" placeholder="Sick Leave:" />
			</div>
		</div>
		</div>
		</form>

		<div class="panel-footer">
			<div style="overflow: hidden;">
				<input type="reset" value="Reset" class="btn btnReset pull-right" style="width:100px;margin:5px;">
				<input type="submit" name="submit" value="Register" class="btn btnEnter pull-right" style="width:100px;margin:5px;">
			</div>
		</div>
	</div>
</div>
</div>
<script type="text/javascript">

$('#empID').mask("99-999-999",{completed:function(){

	$.ajax({
	  type: "POST",
	  url: 'employee/check_if_exist',    
	  data: {$eid: $("#empID").val()},
	  success: function(res) {
	    if(res == TRUE){
	    	alert("EXISTING");
	    }
	  }
	});
}});

$('#cNo').mask("0999-999-9999", {placeholder:" "});
$('#gsisNo').mask("999999999-9999");
$('#phNo').mask("999999999-9999");
$('#tin').mask("999999999-9999");

$('input:radio[name="type"]').change(
    function(){
        if (this.checked && this.value == 'Contractual') {
            $("#vLeave").hide();
            $('label[for="vLeave"]').hide();
            $("#sLeave").hide();
            $('label[for="sLeave"]').hide();
        }
        else if (this.checked && this.value == 'Regular') {
            $("#vLeave").show();
            $('label[for="vLeave"]').show();
            $("#sLeave").show();
            $('label[for="sLeave"]').show();
        }
    });
</script>