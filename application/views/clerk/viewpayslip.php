<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view('partials/header');?>
</head>
<body>
  <div class="BodyContainer">
    <div class="BodyContent" id="payslipPrint">

<?php 

  foreach($uinfo as $info){
    echo "
          <br/>
          <div class='row'>
            <div class='col-xs-3 col-sm-3 col-md-3 col-lg-3'>
                <span><b>NAME:</b></span>
            </div>
            <div class='col-xs-3 col-sm-3 col-md-3 col-lg-3'>
                <span>".$info->name."</span>
            </div>
            <div class='col-xs-3 col-sm-3 col-md-3 col-lg-3'>
                <span><b>POSITION:</b></span>
            </div>
            <div class='col-xs-3 col-sm-3 col-md-3 col-lg-3'>
                <span>".$info->positionName."</span>
            </div>
            <br/>
        
        
        <div class='row'>
            <div class='col-lg-6'>                  
                <span><b>EARNINGS:</b></span>
                    <table class='table table-striped'>
                        <tbody>
                            <tr>
                                <td>BASIC PAY</td>
                                <td>".$info->tbasicpay."</td>
                            </tr>
                            <tr>
                                <td>PERA</td>
                                <td>".$info->tpera."</td>
                            </tr>
                            <tr>
                                <td><b>GROSS EARNINGS</b></td>
                                <td>".$info->tgrosspay."</td>
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
                                <td>".$info->tphilhealth."</td>
                            </tr>
                            <tr>
                                <td>PAGIBIG FUND</td>
                                <td>".$info->tpagibig."</td>
                            </tr>
                            <tr>
                                <td>GSIS INTEG.</td>
                                <td>".$info->tgsis."</td>
                            </tr>
                            <tr>
                                <td>WT</td>
                                <td>".$info->ttax."</td>
                            </tr>
                            
                            <tr>
                                <td>Absences:</td>
                                <td>".$info->tabsences."</td>
                            </tr>
                            
                            <tr>
                                <td>Hours Worked</td>
                                <td>".$info->thoursWorked."</td>
                            </tr>
                            
                            <tr>
                                <td>Number of Late</td>
                                <td>".$info->tnumOfLate."</td>
                            </tr>
                            
                            <tr>
                                <td>VL</td>
                                <td>".$info->tVL."</td>
                            </tr>
                            
                            <tr>
                                <td>SL</td>
                                <td>".$info->tSL."</td>
                            </tr>
                            
                        </tbody>
                    </table>

                <br/>
                <div class='col-xs-6 col-sm-6 col-md-6 col-lg-6'>
                    <h3>TOTAL NETPAY:</h3>
                </div>
                <div class='col-xs-6 col-sm-6 col-md-6 col-lg-6'>
                    <h3>".$info->tnetpay."</h3>
                    
                </div>
            </div>
        </div>          
  ";
}

  
  foreach($loaninfo as $info2){
	echo "
           <tr>
              <td>".$info2->deductionName."</td><br/>
              <td>".$info2->total."</td><br/>
              <br/>
              ";
          }
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
    });  
    $('#savePayslip').click(function(e){
            var basicpay = <?php echo $info->tbasicpay; ?>;
            var pera = <?php echo $info->tpera; ?>;
            var grosspay = <?php echo $info->tgrosspay; ?>;
            var philhealth = <?php echo $info->tphilhealth; ?>;
            var pagibig = <?php echo $info->tpagibig; ?>;
            var gsis = <?php echo $info->tgsis; ?>;
            var tax = <?php echo $info->ttax; ?>;
            var netpay = <?php echo $info->tnetpay; ?>;
            var absences = <?php echo $info->tabsences; ?>;
            var daysWorked = <?php echo $info->tdaysWorked;?>;
            var hoursWorked = <?php echo $info->thoursWorked; ?>;
            var numOfLate = <?php echo $info->tnumOfLate; ?>;
            var VL = <?php echo $info->tVL; ?>;
            var SL = <?php echo $info->tSL; ?>;
            
            alert(netpay);
            $.ajax
            ({
                type: "POST",
                url:"<?php echo base_url(); ?>Clerk/savePayslip",
                data:{basicpay,pera,grosspay,philhealth,pagibig,gsis,tax,netpay,absences,daysWorked,hoursWorked,numOfLate,VL,SL},
                cache: false,
                success: function(r){
                    if(r == 'Success'){
                        swal("Good job!", "Successfully saved to database. Saving a copy", "success")
                      }
                      else if(r == 'Fail'){
                         swal("Notice:", "Payroll for the given period has already been generated. Saving a copy instead", "error");
                      }
                },
                error:function(r){
                  swal("Notice:","System Error Contact Administrator", "error");
                }
            });
        });       
</script>
</html>