<?php

    $empData =array($pInfoRes[0]->row(0)->empID,
                $pInfoRes[0]->row(3)->name, 
                $pInfoRes[0]->row(2)->positionName,
                $pInfoRes[0]->row(5)->maritalStatus,
                $pInfoRes[0]->row(6)->noOfDependents);

    $earnData =array($pInfoRes[0]->row(7)->step_1,
                $pInfoRes[8],
                $pInfoRes[1],
                );

    $deductData =array($pInfoRes[2],
                '100',
                $pInfoRes[3],
                $pInfoRes[4]
                );

    $netPay = round($pInfoRes[7],2);

    $totalDeduction = round($pInfoRes[9],2);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view('partials/header');?>
</head>
<body>
  <div class="BodyContainer">
    <div class="BodyContent" id="payslipPrint">
      <div class="row PayslipCompany">
        <img src="<?php echo base_url();?>assets/images/LTO-logo.png" alt="Logo" />
        <p>LAND TRANSPORTATION OFFICE</p>
        <span>LTO Compound, East Avenue, Quezon City, 1100 Philippines</span>
      </div>
      <br/>
      <div class="row">
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <span><b>NAME:</b></span>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <span><?php echo $empData[1]; ?></span>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <span><b>SERVICE:</b></span>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <span>Administrative Service</span>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <span><b>POSITION:</b></span>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <span><?php echo $empData[2]; ?></span>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <span><b>DIVISION:</b></span>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <span>Personnel</span>
        </div>
    	</div>
    	<br/>

    	<div class="row">
    		<div class="col-lg-6">  				
    			<span><b>EARNINGS:</b></span>
    				<table class="table table-striped">
    					<tbody>
    						<tr>
    							<td>MONTHLY SALARY</td>
    							<td><?php echo $earnData[0]; ?></td>
    						</tr>
    						<tr>
    							<td>PERA</td>
    							<td><?php echo $earnData[1]; ?></td>
    						</tr>
    						<tr>
    							<td><b>GROSS EARNINGS</b></td>
    							<td><?php echo $earnData[2]; ?></td>
    						</tr>                               
    					</tbody>
    				</table>
    		</div>
    		<div class="col-lg-6">
    			<span><b>DEDUCTIONS:</b></span>
    				<table class="table table-striped">
    					<thead>
    						<tr>
    							<th></th>
    							<th></th>
    						</tr>
    					</thead>
    					<tbody>
    						<tr>
    							<td>PHILHEALTH</td>
    							<td><?php echo $deductData[0]; ?></td>
    						</tr>
    						<tr>
    							<td>PAGIBIG FUND</td>
    							<td><?php echo $deductData[1]; ?></td>
    						</tr>
    						<tr>
    							<td>GSIS INTEG.</td>
    							<td><?php echo $deductData[2]; ?></td>
    						</tr>
    						<tr>
    							<td>WT</td>
    							<td><?php echo $deductData[3]; ?></td>
    						</tr>
                            <script>
                                var arayMasakit1 = Array();
                                var arayMasakit2 = Array();
                            </script>
                             <?php foreach($pInfoRes[5] as $key => $data):?>
                            <tr>
                                <td><?php echo $pInfoRes[5][$key] ?></td>
                                <td><?php echo round($pInfoRes[6][$key],2)?></td>
                            </tr>
                            <script>
                                arayMasakit1.push("<?php echo $pInfoRes[5][$key] ?>");
                                arayMasakit2.push("<?php echo round($pInfoRes[6][$key],2)?>");
                            </script>
                            <?php endforeach; ?>
    					</tbody>
    				</table>

        		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
		            <span><b>TOTAL DEDUCTIONS:</b></span>
		        </div>
        		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
		            <span><?php echo $totalDeduction; ?></span>
		        </div>
		        <br/>
        		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
		            <h3>TOTAL NETPAY:</h3>
		        </div>
        		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
		            <h3><?php echo $netPay; ?></h3>
		        </div>
    		</div>
    	</div>
        <button class="btn btn-primary pull-right" id="printpage">PRINT</button>
    </div>
  </div>
  <div class="Footer">
    <div class="pull-right">
      <p>&copy; Copyright 2017 All Rights Reserved.</p>
    </div>
  </div>
</body>
<script type="text/javascript">
    $(document).ready(function () {
      $('.MaintenanceTable').DataTable({
        "pageLength": 10,
        "pagingType": "full",
        "bFilter": true,
        "bLengthChange": false,
        "ordering": true,
        "aaSorting": [[0, 'desc']],
        responsive: true
      });

      $('#printpage').click(function(){
        var printButton = document.getElementById("printpage");
        var eid = "<?php echo $empData[0]?>";
        var monthlySalary = <?php echo $earnData[0]; ?>;
        var pera = <?php echo $earnData[1]; ?>;
        var grossPay = <?php echo $earnData[2]; ?>;
        var philHealth = <?php echo $deductData[0]; ?>;
        var pagIbig = <?php echo $deductData[1]; ?>;
        var gsis = <?php echo $deductData[2]; ?>;
        var tax = <?php echo $deductData[3]; ?>;
        var netPay = <?php echo $netPay; ?>;


        printButton.style.visibility = 'hidden';
        window.print()
        printButton.style.visibility = 'visible';

        $.ajax
        ({
            type: "POST",
            url:"<?php echo base_url(); ?>" + "Clerk/savePayslip",
            data:{eid,monthlySalary,pera,grossPay,philHealth,pagIbig,gsis,tax,netPay,arayMasakit1,arayMasakit2},
            cache: false,
            success: function(r){
                alert(r);
            },
            error: function(r){
                alert("Fail");
            }
        });
      });
    });       
</script>
</html>