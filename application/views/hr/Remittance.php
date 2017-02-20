	<?php
		$base_url = base_url();
	?>
	<div class="BodyContainer">
		<div class="BodyContent">
			<ol class="breadcrumb">
				<li><a href="<?php echo $base_url; ?>main/home_view">Home</a></li>
				<li class="active">Remittance Report</li>
			</ol>
      		<div class="row">
				<h4>REMITTANCE REPORT</h4>
				<hr />
			</div>
            <div class="row" style="margin:0px -15px;"">
                <div class="form-group col-lg-3">
                    <label class="control-label col-lg-4">Deduction:</label>
                    <div class="col-lg-8">
	                    <select class="form-control" id="category">
	                    	<option selected="selected" value="" disabled="true">Choose a category</option>
	                    	<option>GSIS</option>
	                    	<option>Pagibig</option>
	                    	<option>Philhealth</option>
	                    	<option>Withholding Tax</option>
	                    	<?php
	                    		foreach($loanNames as $ln){
	                    			echo "<option value='".$ln->deductionName."'>".$ln->deductionName."</option>";
	                    		}

	                    	?>
						</select>
					</div>
                </div>
                <div class="form-group col-lg-3">
                    <label class="control-label col-lg-4">Year:</label>
                    <div class="col-lg-8">
	                    <select class="form-control col-lg-4" id="year" name="">
	                    	<?php
		                    	$optionsYear=array('All','2017','2018','2019','2020','2021','2022','2023','2024','2025');
		                    	foreach($optionsYear as $optionsYear){
		                    		echo "<option value='".$optionsYear."'>".$optionsYear."</option>";
		                    	};

	                    	?>
						</select>
					</div>
                </div>
                <div class="form-group col-lg-3">
                    <label class="control-label col-lg-4">Month:</label>
                    <div class="col-lg-8">
	                    <select class="form-control" id="month" name="">
	                    	<?php
		                    	$options=array('All','January', 'February' ,'March', 'April', 'May', 'June','July', 'August', 'September', 'October','November','December');
		                    	foreach($options as $Options){
		                    		echo "<option value='".$Options."'>".$Options."</option>";
		                    	};

	                    	?>
						</select>
					</div>
                </div>
                <div class="form-group col-lg-3">
                    <label class="control-label col-lg-4">Period:</label>
                    <div class="col-lg-8">
	                    <select class="form-control" id="period" name="">
	                    	<option value="All">All</option>
	                    	<option value="1">1st</option>
	                    	<option value="2">2nd</option>
						</select>
					</div>
                </div>
            </div>
			<div class="table-responsive">
				<table class="table table-striped MaintenanceTable" id="RemittanceTable">
					<thead>
						<tr>
							<th>Full Name</th>
							<th>Amount</th>
							<th>Period</th>
						</tr>
					</thead>
					<tbody id="remittanceTable">
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.MaintenanceTable').DataTable({
				"pageLength": 10,
				"pagingType": "full",
				"bFilter": true,
				"bLengthChange": false,
				"ordering": true,
				"aaSorting": [[0, 'desc']],
				responsive: true,
				dom: 'Bfrtip',
				buttons: [
				{ extend: 'excelHtml5', text: 'Save a copy', title:  "Payroll Sheet"}
				]
			});
		})

        var category = "";
        var year = "";
        var month = "";
        var period = "";

        $('#category').change(function(){
        	category = document.getElementById("category").value;
        	year = document.getElementById("year").value;
        	month = document.getElementById("month").value;
        	period = document.getElementById("period").value;

        	$.ajax({
        		type:"POST",
        		url:"<?php echo base_url();?>Remittance/FilterCategory",
        		data:{category,year,month,period},
        		cache:false,
        		success:function(r){
        			

        			$('.MaintenanceTable').DataTable().destroy();

        			$('#remittanceTable').html(r);

        			$('.MaintenanceTable').DataTable({
        				"pageLength": 10,
        				"pagingType": "full",
        				"bFilter": true,
        				"bLengthChange": false,
        				"ordering": true,
        				"aaSorting": [[0, 'desc']],
        				responsive: true,
        				dom: 'Bfrtip',
        				buttons: [
        				{ extend: 'excelHtml5', text: 'Save a copy', title:  "Payroll Sheet"}
        				]
        			});

        		},
        		error:function(r){
        			alert("AJAX Fail");
        		}
        	});
        });
        $('#year').change(function(){
        	category = document.getElementById("category").value;
        	year = document.getElementById("year").value;
        	month = document.getElementById("month").value;
        	period = document.getElementById("period").value;

        	$.ajax({
        		type:"POST",
        		url:"<?php echo base_url();?>Remittance/FilterCategory",
        		data:{category,year,month,period},
        		cache:false,
        		success:function(r){
        			$('#remittanceTable').html(r);
        			
        		},
        		error:function(r){
        			alert("AJAX Fail");
        		}
        	});
        });

 		$('#month').change(function(){
        	category = document.getElementById("category").value;
        	year = document.getElementById("year").value;
        	month = document.getElementById("month").value;
        	period = document.getElementById("period").value;

        	$.ajax({
        		type:"POST",
        		url:"<?php echo base_url();?>Remittance/FilterCategory",
        		data:{category,year,month,period},
        		cache:false,
        		success:function(r){
        			$('#remittanceTable').html(r);
        			
        		},
        		error:function(r){
        			alert("AJAX Fail");
        		}
        	});
        });

        $('#period').change(function(){
        	category = document.getElementById("category").value;
        	year = document.getElementById("year").value;
        	month = document.getElementById("month").value;
        	period = document.getElementById("period").value;
        	
        	$.ajax({
        		type:"POST",
        		url:"<?php echo base_url();?>Remittance/FilterCategory",
        		data:{category,year,month,period},
        		cache:false,
        		success:function(r){
        			$('#remittanceTable').html(r);
        			
        		},
        		error:function(r){
        			alert("AJAX Fail");
        		}
        	});
        });
	</script>