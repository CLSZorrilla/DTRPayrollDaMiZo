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
				<h4>VIEW YOUR PAYSLIPS</h4>
				<hr />
			</div>
            <div class="row" style="margin:0px -15px;"">
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
            </div>
			<div class="table-responsive" id="tableDiv">
				<table class="table table-striped MaintenanceTable" id="RemittanceTable">
					<thead>
						<tr>
							<th>Employee ID</th>
                            <th>Monthly Salary</th>
                            <th>PERA</th>
                            <th>Gross Earnings</th>
                            <th>PhilHealth</th>
                            <th>Pagibig Fund</th>
                            <th>GSIS Integ.</th>
                            <th>WT</th>
                            <th>Additional Deductions</th>
                            <th>Total NetPay</th>
                            <th># of Absences</th>
                            <th>Day/s Worked</th>
                            <th>Hours Worked</th>
                            <th># of Late</th>
                            <th>Vacation Leave</th>
                            <th>Sick Leave</th>
                            <th>Start Period</th>
                            <th>End Period</th>
						</tr>
					</thead>
					<tbody id="pInfo">
                        <?php
                            foreach ($ipd as $key => $pData) {
                                echo "
                                    <tr>
                                        <td>".$pData->empID."</td>
                                        <td>".$pData->basicpay."</td>
                                        <td>".$pData->pera."</td>
                                        <td>".$pData->grosspay."</td>
                                        <td>".$pData->philhealth."</td>
                                        <td>".$pData->pagibig."</td>
                                        <td>".$pData->gsis."</td>
                                        <td>".$pData->tax."</td>
                                        <td ></td>
                                        <td>".$pData->netpay."</td>
                                        <td>".$pData->absences."</td>
                                        <td>".$pData->daysWorked."</td>
                                        <td>".$pData->hoursWorked."</td>
                                        <td>".$pData->numOfLate."</td>
                                        <td>".$pData->VL."</td>
                                        <td>".$pData->SL."</td>
                                        <td>".$pData->startPeriod."</td>
                                        <td>".$pData->endPeriod."</td>
                                    </tr>
                                ";
                            }
                        ?>
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
                responsive: true
			});
		})

        var year = "";
        var month = "";

        $('#year').change(function(){
        	year = document.getElementById("year").value;
        	month = document.getElementById("month").value;

        	$.ajax({
        		type:"POST",
        		url:"<?php echo base_url();?>employee/PaysheetDataFilter",
        		data:{year,month},
        		cache:false,
        		success:function(r){
                    $('.MaintenanceTable').DataTable().destroy();

                    $('#tableDiv').html("<table class='table table-striped MaintenanceTable'><thead><tr><th>Employee ID</th><th>Monthly Salary</th><th>PERA</th><th>Gross Earnings</th><th>PhilHealth</th><th>Pagibig Fund</th><th>GSIS Integ.</th><th>WT</th><th>Additional Deductions</th><th>Total NetPay</th><th># of Absences</th><th>Day/s Worked</th><th>Hours Worked</th><th># of late</th><th>Vacation Leave</th><th>Sick Leave</th><th>Start Period</th><th>End Period</th></tr></thead><tbody id='pInfo'></tbody></table>");

                    $('#pInfo').html(r);

                    $('.MaintenanceTable').DataTable({
                        "pageLength": 10,
                        "pagingType": "full",
                        "bFilter": true,
                        "bLengthChange": false,
                        "ordering": true,
                        "aaSorting": [[0, 'desc']],
                        responsive: true
                    });
        		},
        		error:function(r){
        			alert("AJAX Fail");
        		}
        	});
        });

 		$('#month').change(function(){
        	year = document.getElementById("year").value;
        	month = document.getElementById("month").value;

        	$.ajax({
        		type:"POST",
        		url:"<?php echo base_url();?>employee/PaysheetDataFilter",
        		data:{year,month},
        		cache:false,
        		success:function(r){
        			$('.MaintenanceTable').DataTable().destroy();

                    $('#tableDiv').html("<table class='table table-striped MaintenanceTable'><thead><tr><th>Employee ID</th><th>Monthly Salary</th><th>PERA</th><th>Gross Earnings</th><th>PhilHealth</th><th>Pagibig Fund</th><th>GSIS Integ.</th><th>WT</th><th>Additional Deductions</th><th>Total NetPay</th><th># of Absences</th><th>Day/s Worked</th><th>Hours Worked</th><th># of late</th><th>Vacation Leave</th><th>Sick Leave</th><th>Start Period</th><th>End Period</th></tr></thead><tbody id='pInfo'></tbody></table>");
                    
                    $('#pInfo').html(r);

                    $('.MaintenanceTable').DataTable({
                        "pageLength": 10,
                        "pagingType": "full",
                        "bFilter": true,
                        "bLengthChange": false,
                        "ordering": true,
                        "aaSorting": [[0, 'desc']],
                        responsive: true
                    });       			
        		},
        		error:function(r){
        			alert("AJAX Fail");
        		}
        	});
        });
	</script>