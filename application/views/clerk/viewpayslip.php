<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view('partials/header');?>
</head>
<body>
  <div class="BodyContainer">
    <div class="BodyContent" id="payslipPrint">

<?php 

$tBasicpay=0; $tPera=0; $tGrosspay=0; $tPhilhealth=0; $tPagibig=0; $tGSIS=0;
$tTax=0; $tAbsences=0; $tHoursWorked=0; $tNetpay=0;

  foreach($uinfo as $info){
     $tBasicpay+=$info->basicpay;
     $tPera+=$info->pera;
     $tGrosspay+=$info->grosspay; 
     $tPhilhealth+=$info->philhealth; 
     $tPagibig+=$info->pagibig; 
     $tGSIS+=$info->gsis;
     $tTax+=$info->tax; 
     $tAbsences+=$info->absences; 
     $tHoursWorked+=$info->hoursWorked; 
     $tNetpay+=$info->netpay;
    }
      
    echo "
          <br/>
          <div class='row'>
            <div class='col-xs-3 col-sm-3 col-md-3 col-lg-3'>
                <span><b>NAME:</b></span>
            </div>
            <div class='col-xs-3 col-sm-3 col-md-3 col-lg-3'>
                <span>".$uinfo[0]->name."</span>
            </div>
            <div class='col-xs-3 col-sm-3 col-md-3 col-lg-3'>
                <span><b>POSITION:</b></span>
            </div>
            <div class='col-xs-3 col-sm-3 col-md-3 col-lg-3'>
                <span>".$uinfo[0]->positionName."</span>
            </div>
            <br/>
        
        
        <div class='row'>
            <div class='col-lg-6'>                  
                <span><b>EARNINGS:</b></span>
                    <table class='table table-striped'>
                        <tbody>
                            <tr>
                                <td>MONTHLY SALARY</td>
                                <td>".$tBasicpay."</td>
                            </tr>
                            <tr>
                                <td>PERA</td>
                                <td>".$tPera."</td>
                            </tr>
                            <tr>
                                <td><b>GROSS EARNINGS</b></td>
                                <td>".$tGrosspay."</td>
                            </tr>                               
                        </tbody>
                    </table>
            </div>
            <div class='col-lg-6'>
                <span><b>DEDUCTIONS:</b></span>
                    <table class='table table-striped'>
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>PHILHEALTH</td>
                                <td>".$tPhilhealth."</td>
                            </tr>
                            <tr>
                                <td>PAGIBIG FUND</td>
                                <td>".$tPagibig."</td>
                            </tr>
                            <tr>
                                <td>GSIS INTEG.</td>
                                <td>".$tGSIS."</td>
                            </tr>
                            <tr>
                                <td>WT</td>
                                <td>".$tTax."</td>
                            </tr>
                            
                            <tr>
                                <td>Absences:</td>
                                <td>".$tAbsences."</td>
                            </tr>
                            
                            <tr>
                                <td>Hours Worked</td>
                                <td>".$tHoursWorked."</td>
                            </tr>
                            
                        </tbody>
                    </table>

                <br/>
                <div class='col-xs-6 col-sm-6 col-md-6 col-lg-6'>
                    <h3>TOTAL NETPAY:</h3>
                </div>
                <div class='col-xs-6 col-sm-6 col-md-6 col-lg-6'>
                    <h3>".$tNetpay."</h3>
                    
                </div>
            </div>
        </div>          
   ";
?>          

        <button class="btn btn-primary pull-right" id="printpage">PRINT</button>
        <button class="btn btn-primary pull-right" id="savePayslip">SAVE</button>
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

        $('#savePayslip').click(function(){
            var basicpay = <?php echo $tBasicpay; ?>;
            var pera = <?php echo $tPera; ?>;
            var grosspay = <?php echo $tGrosspay; ?>;
            var philhealth = <?php echo $tPhilhealth; ?>;
            var pagibig = <?php echo $tPagibig; ?>;
            var gsis = <?php echo $tGSIS; ?>;
            var tax = <?php echo $tTax; ?>;
            var absences = <?php echo $tAbsences; ?>;
            var hoursWorked = <?php echo $tHoursWorked; ?>;
            var netpay = <?php echo $tNetpay; ?>;
            
            $.ajax
            ({
                type: "POST",
                url:"<?php echo base_url(); ?>" + "Clerk/savePayslip",
                data:{basicpay,pera,grosspay,philhealth,pagibig,gsis,tax,absences,hoursWorked,netpay},
                cache: false,
                success: function(r){
                    window.close();
                },
                error: function(r){
                    alert("Fail");
                }
            });
        }
    });       
</script>
</html>