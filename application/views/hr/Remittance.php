	<?php
		$base_url = base_url();
	?>
<?php include "/../partials/nav_customize.php";?>
<style type="text/css">
  button#printpage{
    background-color:white;
    color:black;
    border: 2px solid <?php echo $company['colorTheme']; ?>;
      -webkit-transition-duration: 0.4s; /* Safari */
      transition-duration: 0.4s;
  }
  button#printpage:hover{
      background-color: <?php echo $company['colorTheme']; ?>;
      color: white;
  }
  table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before, table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
    background-color: <?php echo $company['colorTheme']; ?>;
  }
  table.dataTable.dtr-inline.collapsed>tbody>tr.parent>td:first-child:before, table.dataTable.dtr-inline.collapsed>tbody>tr.parent>th:first-child:before {
    background-color:black;
    color: white;
  }
</style>
	<div class="BodyContainer">
		<div class="BodyContent">
			<ol class="breadcrumb">
				<li><a href="<?php echo $base_url; ?>main/home_view">Home</a></li>
				<li class="active">Remittance Report</li>
			</ol>
      		<div class="row">
                <h4 style="color:<?php echo $company['colorTheme']; ?>;"><b>REMITTANCE REPORT</b></h4>
                <hr class="selectedHR" />
			</div>
            <div class="row" style="margin-bottom: 20px;border-bottom:2px solid <?php echo $company['colorTheme']; ?>">
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
                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3" style="margin-bottom: 15px;" id="printBtn">
                    <button class="btn pull-right" id="printpage""><span class="glyphicon glyphicon-print"></span> Print</button>
                </div>
            </div>
            <div id="RemForm" class="row">
                <div id="RemHeader" class="showOnPrint" style="display:none;">
                    <table class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <tr class="PrintHeader">
                            <td>
                                <img src="<?php echo $cinfo->row(9)->logo; ?>" height="45" width="45" id="target" style="display: block; margin: 2px 3px 3px 3px; float: left;" />
                             <p style="margin: 0px; padding: 15px 0px; display: inline-block;">DEPARTMENT OF AGRICULTURE</p>
                             </td>
                            <td class="PrintHeaderTitle"><h3 class="pull-right" id='pPeriod'>GENERAL PAYROLL</h3></td>
                            <td></td>
                        </tr>
                    </table>
                </div>
            </div>
			<div class="table-responsive" id="tableRemit">
				<table class="table table-striped MaintenanceTable" id="RemittanceTable">
					<thead>
						<tr>
                            <th>ID No. </th>
							<th>Full Name</th>
							<th>Amount</th>
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
            var category = document.getElementById("category").value;
            var year = document.getElementById("year").value;
            var month = document.getElementById("month").value;

            if(year == "All" || month == "All"){
                $('#printBtn').hide();
            }else{
                $('#printBtn').show();
            }
        });

        $('#category').change(function(){
        	category = document.getElementById("category").value;
        	year = document.getElementById("year").value;
        	month = document.getElementById("month").value;

            if(year == "All" || month == "All"){
                $('#printBtn').hide();
            }else{
                $('#printBtn').show();
            }

        	$.ajax({
        		type:"POST",
        		url:"<?php echo base_url();?>Remittance/FilterCategory",
        		data:{category,year,month},
        		cache:false,
        		success:function(r){

        			$('#remittanceTable').html(r);

        		},
        		error:function(r){
        			alert("AJAX Fail");
        		}
        	});

            $('#pPeriod').html(category+" Report - "+month+" "+year);
        });

        $('#year').change(function(){
        	category = document.getElementById("category").value;
        	year = document.getElementById("year").value;
        	month = document.getElementById("month").value;

            if(year == "All" || month == "All"){
                $('#printBtn').hide();
            }else{
                $('#printBtn').show();
            }

        	$.ajax({
        		type:"POST",
        		url:"<?php echo base_url();?>Remittance/FilterCategory",
        		data:{category,year,month},
        		cache:false,
        		success:function(r){
                    

                    $('#remittanceTable').html(r);

                    
        		},
        		error:function(r){
        			alert("AJAX Fail");
        		}
        	});

            $('#pPeriod').html(category+" Report - "+month+" "+year);
        });

 		$('#month').change(function(){
        	category = document.getElementById("category").value;
        	year = document.getElementById("year").value;
        	month = document.getElementById("month").value;

            if(year == "All" || month == "All"){
                $('#printBtn').hide();
            }else{
                $('#printBtn').show();
            }

        	$.ajax({
        		type:"POST",
        		url:"<?php echo base_url();?>Remittance/FilterCategory",
        		data:{category,year,month},
        		cache:false,
        		success:function(r){
                    
                    $('#remittanceTable').html(r);

         			
        		},
        		error:function(r){
        			alert("AJAX Fail");
        		}
        	});

            $('#pPeriod').html(category+" Report - "+month+" "+year);
        });

        $('#printpage').click(function(){
                    $(".dataTables_info , .dataTables_paginate , .dt-buttons").hide();
                    $("RemHeader").show();
                    $(".showOnPrint").show();

                    var mywindow = window.open('', 'my div', 'height=583,width=1024');
                    mywindow.document.write('<html><head><title>Remittance Report</title>');
                    mywindow.document.write(
                      '<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.min.css" />' + 
                      '<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style.css" />' +
                      '<style type="text/css">@page{size: landscape;}</style>');
                    mywindow.document.write('</head><body style="min-height:initial;" >');
                    mywindow.document.write("<div>" + $("#RemForm").html() + "</div>");
                    mywindow.document.write("<div>" + $("#tableRemit").html() + "</div>");
                    mywindow.document.write('</body></html>');

                    setTimeout(function () {
                        mywindow.print();
                        $("RemHeader").hide();
                        $(".showOnPrint").hide();
                        $(".dataTables_info , .dataTables_paginate , .dt-buttons").show();
                    }, 500);
        });
	</script>