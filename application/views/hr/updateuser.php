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
			<li class="active"><a href="<?php echo base_url(); ?>employee/manageUserAcct">Manage Users</a></li>
		</ol>
		<div class="row Title">
			<h4 style="color:<?php echo $company['colorTheme']; ?>;"><b>MANAGE USER</b></h4>
			<hr />
		</div>
		
		<div class="panel panel-default" style="margin:0px 15px;">
		<div class="panel-heading" style="color:<?php echo $company['colorTheme']; ?>;">
			<span class="glyphicon glyphicon-refresh"></span><b> Edit User</b>
		</div>
		<?php if(isSet($error)): ?>
			<div class="alert alert-danger alert-dismissable fade in"><?php echo $error; ?><a href="#" id="ekis" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>
		<?php endif; ?>
		<form action="../editUsersAcct" method="post" id="updateUserForm" class="form-horizontal" enctype="multipart/form-data" accept-charset="utf-8">
		<div class="panel-body">
		<div class="form-group col-lg-6">
			<label for="empID" class="control-label col-md-5">Employee ID:</label>
			<div class="col-md-7">
				<input type="text" name="empID" class="form-control text-box single-line" id="empID" value="<?php echo $userInfo->row()->empID; ?>" placeholder="Employee ID:" required/>
			</div>
		</div>
		<div class="form-group col-lg-6" style="height: 34px;">
			<label for="pPicture" class="control-label col-md-5">Profile Picture:</label>
			<div class="col-md-7">
				<input type="file" name="pic" />
				<img src = "<?php echo $userInfo->row()->picture; ?>" height="50" width="50" />
			</div>
		</div>
		<div class="form-group col-lg-6">
			<label for="pword" class="control-label col-md-5">Password:</label>
			<div class="col-md-7">
				<input type="password" name="pword" class="form-control text-box single-line" id="pword" value="<?php echo $password; ?>" placeholder="Password:" required/>
				<span class= "pword_status"></span>
			</div>
		</div>
		<div class="form-group col-lg-6">
			<label for="cpword" class="control-label col-md-5">Confirm Password:</label>
			<div class="col-md-7">
				<input type="password" name="cpword" class="form-control text-box single-line" id="cpword" value="<?php echo $password; ?>" placeholder="Confirm Password:" required/>
				<span class= "cpword_status"></span>
			</div>
		</div>
		<div class="form-group col-lg-6">
			<label for="positionCode" class="control-label col-md-5">Position:</label>
			<div class="col-md-7">
				<select name="positions" class="form-control" id="position">
			        <option value='0' selected='SELECTED'>Guild Master</option>
			        <option value='1'>Guild Moderator</option>
			        <option value='2'>Guild Member</option>
			    </select>
			    <script> $('#position').val('<?php echo $userInfo->row()->positionCode; ?>'); </script>
			</div>
		</div>
		<div class="form-group col-lg-6">
			<label for="deptCode" class="control-label col-md-5">Department:</label>
			<div class="col-md-7">
				<select name="department" class="form-control" id="department">
			        <option value='0' selected='SELECTED'>Catacombs</option>
			        <option value='1'>Aminus</option>
			    </select>
			    <script> $('#department').val('<?php echo $userInfo->row()->deptCode; ?>'); </script>
			</div>
		</div>
		<div class="form-group col-lg-6">
			<label for="fName" class="control-label col-md-5">First Name:</label>
			<div class="col-md-7">
				<input type="text" name="fName" class="form-control text-box single-line" id="fName" value="<?php echo $userInfo->row(8)->fname; ?>" placeholder="First Name:" required/>
				<span class= "f_name_status"></span>
			</div>
		</div>
		<div class="form-group col-lg-6">
			<label for="lName" class="control-label col-md-5">Last Name:</label>
			<div class="col-md-7">
				<input type="text" name="lName" class="form-control text-box single-line" id="lName" value="<?php echo $userInfo->row(9)->lname; ?>" placeholder="Last Name:" required/>
				<span class= "l_name_status"></span>
			</div>
		</div>
		<div class="form-group col-lg-6">
			<label for="mName" class="control-label col-md-5">Middle Name:</label>
			<div class="col-md-7">
				<input type="text" name="mName" class="form-control text-box single-line" id="mName" value="<?php echo $userInfo->row(10)->mname; ?>" placeholder="Middle Name:" required/>
				<span class= "m_name_status"></span>
			</div>
		</div>
		<div class="form-group col-lg-6">
			<label for="uType" class="control-label col-md-5">User Type:</label>
			<div class="col-md-7">
				<select name="userType" class="form-control" id="uType">
					<option value='Employee' selected='SELECTED'>Employee</option>
					<option value='HR'>Human Relations</option>
					<option value='Payroll Clerk'>Payroll Clerk</option>
				</select>
				<script> $('#uType').val('<?php echo $userInfo->row()->acctType; ?>'); </script>
			</div>
		</div>
		<div class="form-group col-lg-6">
			<label for="emailAdd" class="control-label col-md-5">Email Address:</label>
			<div class="col-md-7">
				<input type="email" name="emailAdd" class="form-control text-box single-line" id="emailAdd" value="<?php echo $userInfo->row()->emailAddress; ?>" placeholder="Email Address:" required/>
			</div>
		</div>
		<div class="form-group col-lg-6">
			<label for="address" class="control-label col-md-5">Address:</label>
			<div class="col-md-7">
				<input type="text" name="address" class="form-control text-box single-line" id="address" value="<?php echo $userInfo->row()->address; ?>" placeholder="Address:" required/>
			</div>
		</div>
		<div class="form-group col-lg-6">
			<label for="maritalStatus" class="control-label col-md-5">Marital Status:</label>
			<div class="col-md-7">
				<select name="maritalStatus" class="form-control" id="marital_status">
					<option value='Married' selected='SELECTED'>Married</option>
					<option value='Widowed'>Widowed</option>
					<option value='Divorced'>Divorced</option>
					<option value='Single'>Single</option>
				</select>
			</div>
			<script> $('#marital_status').val('<?php echo $userInfo->row()->maritalStatus; ?>'); </script>
		</div>
		<div class="form-group col-lg-6">
			<label for="dependents" class="control-label col-md-5">Dependents:</label>
			<div class="col-md-7">
				<input type="number" name="dependents" class="form-control text-box single-line" id="dependents" value="<?php echo $userInfo->row()->noOfDependents; ?>" placeholder="Dependents:" required/>
			</div>
		</div>
		<div class="form-group col-lg-6">
			<label for="birthDate" class="control-label col-md-5">Birthday:</label>
			<div class="col-md-7">
				<input type="date" name="birthDate" class="form-control text-box single-line" id="birthDate" value="<?php echo $userInfo->row()->birthDate; ?>" placeholder="Birthday:" required/>
			</div>
		</div>
		<div class="form-group col-lg-6">
			<label for="cNo" class="control-label col-md-5">Contact No.:</label>
			<div class="col-md-7">
				<input type="text" name="cNo" class="form-control text-box single-line" id="cNo" value="<?php echo $userInfo->row()->contactNo; ?>" placeholder="Contact No.:" required/>
			</div>
		</div>
		<div class="form-group col-lg-6" style="height: 34px;">
			<label for="sex" class="control-label col-md-5">Sex:</label>
			<div class="col-md-7">
				<input type='radio' name="sex" value='Male'>Male
	  			<input type='radio' name="sex" value='Female'> Female
	  			<script type="text/javascript"> $("input[name=sex][value='<?php echo $userInfo->row()->sex ?>']").prop('checked', true); </script>
			</div>
		</div>
		<div class="form-group col-lg-6">
			<label for="dateHired" class="control-label col-md-5">Date Hired:</label>
			<div class="col-md-7">
				<input type="date" name="dateHired" class="form-control text-box single-line" id="dateHired" value="<?php echo $userInfo->row()->dateHired; ?>" placeholder="Date Hired:" required/>
			</div>
		</div>
		<div class="form-group col-lg-6">
			<label for="gsisNo" class="control-label col-md-5">GSISNo:</label>
			<div class="col-md-7">
				<input type="text" name="gsisNo" class="form-control text-box single-line" id="gsisNo" value="<?php echo $userInfo->row()->GSISNo; ?>" placeholder="GSISNo:" required/>
			</div>
		</div>
		<div class="form-group col-lg-6">
			<label for="phNo" class="control-label col-md-5">PhilHealthNo:</label>
			<div class="col-md-7">
				<input type="text" name="phNo" class="form-control text-box single-line" id="phNo" value="<?php echo $userInfo->row()->PhilHealthNo; ?>" placeholder="PhilHealthNo:" required/>
			</div>
		</div>
		<div class="form-group col-lg-6">
			<label for="tin" class="control-label col-md-5">TIN:</label>
			<div class="col-md-7">
				<input type="text" name="tin" class="form-control text-box single-line" id="tin" value="<?php echo $userInfo->row()->TIN; ?>" placeholder="TIN:" required/>
			</div>
		</div>
		<div class="form-group col-lg-6">
			<label for="vLeave" class="control-label col-md-5">Vacation Leave:</label>
			<div class="col-md-7">
				<input type="text" name="vLeave" class="form-control text-box single-line" id="vLeave" value="<?php echo $userInfo->row()->VL; ?>" placeholder="Vacation Leave:" required/>
				<span class= "vLeave_status"></span>
			</div>
		</div>
		<div class="form-group col-lg-6">
			<label for="sLeave" class="control-label col-md-5">Sick Leave:</label>
			<div class="col-md-7">
				<input type="text" name="sLeave" class="form-control text-box single-line" id="sLeave" value="<?php echo $userInfo->row()->SL; ?>" placeholder="Sick Leave:" required/>
				<span class= "sLeave_status"></span>
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
<script type="text/javascript">

$('#empID').mask("99-999-999");
$('#cNo').mask("0999-999-9999", {placeholder:" "});
$('#gsisNo').mask("999999999-9999");
$('#phNo').mask("999999999-9999");
$('#tin').mask("999999999-9999");

$("#pword").keyup(function(){
	var pword = document.getElementById("pword").value;

	if(pword.length == 0){
		$(".pword_status").html('<i style="color: red;">This field is required</i>');
		document.getElementById("updateBtn").disabled = true;
	}
	else if(pword.length < 8){
		$(".pword_status").html('<i style="color: red;">Minimum of 8 characters</i>');
		document.getElementById("updateBtn").disabled = true;
	}
	else if((jQuery.trim( pword )).length==0){
		$(".pword_status").html('<i style="color: red;">You only entered space/s</i>');
		document.getElementById("updateBtn").disabled = true;
	}
	else{
		$(".pword_status").html('');
		document.getElementById("updateBtn").disabled = false;

	}
});

$("#cpword").keyup(function(){
	var cpword = document.getElementById("cpword").value;
	var pword = document.getElementById("pword").value;

	if(cpword.length == 0){
		$(".cpword_status").html('<i style="color: red;">This field is required</i>');
		document.getElementById("updateBtn").disabled = true;
	}
	else if(cpword.length < 8){
		$(".cpword_status").html('<i style="color: red;">Minimum of 8 characters</i>');
		document.getElementById("updateBtn").disabled = true;
	}
	else if((jQuery.trim( cpword )).length==0){
		$(".cpword_status").html('<i style="color: red;">You only entered space/s</i>');
		document.getElementById("updateBtn").disabled = true;
	}
	else if(cpword != pword){
		$(".cpword_status").html('<i style="color: red;">Confirm password doesnt match password </i>');
		document.getElementById("updateBtn").disabled = true;
	}
	else{
		$(".cpword_status").html('');
		document.getElementById("updateBtn").disabled = false;
	}
});

$("#fName").keyup(function(){
	var first_name = document.getElementById("fName").value;
	var pattern = new RegExp(/[0-9~`!#$%\^&*+=\-\[\]\\';,./{}|\\":<>\?]/); //unacceptable chars
    if (pattern.test(first_name)) {
        $(".f_name_status").html('<i style="color: red;">No numbers and special characters allowed</i>');
		document.getElementById("updateBtn").disabled = true;
    }
    else{
    	if(first_name.length == 0){
    		$(".f_name_status").html('<i style="color: red;">This field is required</i>');
    		document.getElementById("updateBtn").disabled = true;
    	}
    	else if(first_name.length == 1){
    		$(".f_name_status").html('<i style="color: red;">Minimum of 2 characters</i>');
    		document.getElementById("updateBtn").disabled = true;
    	}
    	else if((jQuery.trim( first_name )).length==0){
    		$(".f_name_status").html('<i style="color: red;">You only entered space/s</i>');
    		document.getElementById("updateBtn").disabled = true;
    	}
    	else{
    		$(".f_name_status").html('');
			document.getElementById("updateBtn").disabled = false;

    	}
    }
});

$("#lName").keyup(function(){
	var last_name = document.getElementById("lName").value;
	var pattern = new RegExp(/[0-9~`!#$%\^&*+=\-\[\]\\';,./{}|\\":<>\?]/); //unacceptable chars
    if (pattern.test(last_name)) {
        $(".l_name_status").html('<i style="color: red;">No numbers and special characters allowed</i>');
		document.getElementById("updateBtn").disabled = true;
    }
    else{
    	if(last_name.length == 0){
    		$(".l_name_status").html('<i style="color: red;">This field is required</i>');
    		document.getElementById("updateBtn").disabled = true;
    	}
    	else if(last_name.length == 1){
    		$(".l_name_status").html('<i style="color: red;">Minimum of 2 characters</i>');
    		document.getElementById("updateBtn").disabled = true;
    	}
    	else if((jQuery.trim( last_name )).length==0){
    		$(".l_name_status").html('<i style="color: red;">You only entered space/s</i>');
    		document.getElementById("updateBtn").disabled = true;
    	}
    	else{
    		$(".l_name_status").html('');
			document.getElementById("updateBtn").disabled = false;

    	}
    }
});

$("#mName").keyup(function(){
	var middle_name = document.getElementById("mName").value;
	var pattern = new RegExp(/[0-9~`!#$%\^&*+=\-\[\]\\';,./{}|\\":<>\?]/); //unacceptable chars
    if (pattern.test(middle_name)) {
        $(".m_name_status").html('<i style="color: red;">No numbers and special characters allowed</i>');
		document.getElementById("updateBtn").disabled = true;
    }
    else{
    	if(middle_name.length == 0){
    		$(".m_name_status").html('<i style="color: red;">This field is required</i>');
    		document.getElementById("updateBtn").disabled = true;
    	}
    	else if(middle_name.length == 1){
    		$(".m_name_status").html('<i style="color: red;">Minimum of 2 characters</i>');
    		document.getElementById("updateBtn").disabled = true;
    	}
    	else if((jQuery.trim( middle_name )).length==0){
    		$(".m_name_status").html('<i style="color: red;">You only entered space/s</i>');
    		document.getElementById("updateBtn").disabled = true;
    	}
    	else{
    		$(".m_name_status").html('');
			document.getElementById("updateBtn").disabled = false;

    	}
    }
});

$("#vLeave").keyup(function(){
	var vacationLeave = document.getElementById("vLeave").value;
	var letterPattern = new RegExp(/[A-Za-z]/);
	var formatPattern = new RegExp(/^.[0-5]{1,2}[0-9]{1,2}$/);

	if(letterPattern.test(vacationLeave)){
		$(".vLeave_status").html('<i style="color: red;">Characters not allowed</i>');
		document.getElementById("updateBtn").disabled = true;
	}
	else{
		if(formatPattern.test(vacationLeave)){
			$(".vLeave_status").html('<i style="color: red;">Invalid Format. i.e 1.25</i>');
			document.getElementById("updateBtn").disabled = true;
		}
		else if(vacationLeave.length == 0){
			$(".vLeave_status").html('<i style="color: red;">This field is required</i>');
    		document.getElementById("updateBtn").disabled = true;
		}
		else if((jQuery.trim( vacationLeave )).length==0){
    		$(".vLeave_status").html('<i style="color: red;">You only entered space/s</i>');
    		document.getElementById("updateBtn").disabled = true;
    	}
		else{
			$(".vLeave_status").html('');
    		document.getElementById("updateBtn").disabled = false;
		}
	}
});

$("#sLeave").keyup(function(){
	var sickLeave = document.getElementById("sLeave").value;
	var letterPattern = new RegExp(/[A-Za-z]/);
	var formatPattern = new RegExp(/^.[0-5]{1,2}[0-9]{1,2}$/);

	if(letterPattern.test(sickLeave)){
		$(".sLeave_status").html('<i style="color: red;">Characters not allowed</i>');
		document.getElementById("updateBtn").disabled = true;
	}
	else{
		if(formatPattern.test(sickLeave)){
			$(".sLeave_status").html('<i style="color: red;">Invalid Format. i.e 1.25</i>');
			document.getElementById("updateBtn").disabled = true;
		}
		else if(sickLeave.length == 0){
			$(".sLeave_status").html('<i style="color: red;">This field is required</i>');
    		document.getElementById("updateBtn").disabled = true;
		}
		else if((jQuery.trim( sickLeave )).length==0){
    		$(".sLeave_status").html('<i style="color: red;">You only entered space/s</i>');
    		document.getElementById("updateBtn").disabled = true;
    	}
		else{
			$(".sLeave_status").html('');
    		document.getElementById("updateBtn").disabled = false;
		}
	}
});
</script>