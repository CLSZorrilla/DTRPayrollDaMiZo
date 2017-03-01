<?php include "/../partials/nav_customize.php";?>
<div class="BodyContainer">
    <div class="BodyContent" id="payslipPrint">
        <ol class="breadcrumb">
            <li><a href="main/home_view">Home</a></li>
            <li><a href="#">Payroll</a></li>
            <li class="active">Process Payslip</li>
        </ol>

        <div class="row" id="Title">
          <h4 style="color:<?php echo $company['colorTheme']; ?>;"><b>PROCESS PAYSLIP</b></h4>
          <hr />
        </div>

<?php
    foreach($uinfo as $info){
        echo "
            <div class='row'>
                <div class='col-xs-4 col-sm-4 col-md-4 col-lg-3'>
                    <span><b>NAME:</b></span>
                </div>
                <div class='col-xs-8 col-sm-8 col-md-8 col-lg-3'>
                    <span>".$info->name."</span>
                </div>
            </div>
            <div class='row'>
                <div class='col-xs-4 col-sm-4 col-md-4 col-lg-3'>
                    <span><b>POSITION:</b></span>
                </div>
                <div class='col-xs-8 col-sm-8 col-md-8 col-lg-3'>
                    <span>".$info->positionName."</span>
               </div>
            </div>
            
            <br/>
            <div class='row'>
                <div class='col-lg-6'>
                    <div class='row'>               
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
                    <div class='row'>               
                        <span><b>MONTHLY RECORD:</b></span>
                        <table class='table table-striped'>
                            <tbody>
                                <tr>
                                    <td>DAYS WORKED</td>
                                    <td>".$info->tdaysWorked."</td>
                                </tr>
                                <tr>
                                    <td>HOURS WORKED</td>
                                    <td>".$info->thoursWorked."</td>
                                </tr>
                                <tr>
                                    <td>NO. OF ABSENCES</td>
                                    <td>".$info->tabsences."</td>
                                </tr>
                                <tr>
                                    <td>NO. OF LATES</td>
                                    <td>".$info->tnumOfLate."</td>
                                </tr>
                                <tr>
                                    <td>REMAINING SL</td>
                                    <td>".$info->tSL."</td>
                                </tr>
                                <tr>
                                    <td>REMAINING VL</td>
                                    <td>".$info->tVL."</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class='col-lg-6'>
                    <div class='row'>
                    <span><b>DEDUCTIONS:</b></span>
                    <table class='table table-striped'>
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
        ";
    }
    foreach($loaninfo as $info2){
        echo "
                            <tr>
                                <td>".strtoupper($info2->deductionName)."</td>
                                <td>".$info2->total."</td>
                            </tr>
        ";
    }
    foreach($uinfo as $info){
        echo "                               
                        </tbody>
                    </table>
                    </div>

                    <div class='row'>
                    <div class='col-xs-6 col-sm-6 col-md-6 col-lg-6'>
                        <h3>TOTAL NETPAY:</h3>
                    </div>
                    <div class='col-xs-6 col-sm-6 col-md-6 col-lg-6'>
                        <h3>".$info->tnetpay."</h3>
                    </div>
                    </div>
                </div>
            </div>          
        ";
    }
?>
    
        <button class="btn btn-primary pull-right" id="printpage">PRINT</button>
        <button class="btn btn-primary pull-right" id="savePayslip">SAVE</button>
        
    </div>
  </div>
<script type="text/javascript">
    $('#savePayslip').click(function(e){
            var eid = "<?php echo $info->empID; ?>";
            var month = "<?php echo $info->month ?>";

            $.ajax
            ({
                type: "POST",
                url:"<?php echo base_url(); ?>Clerk/savePayslip/<?php echo $this->uri->segment(3)?>",
                data:{eid,month},
                cache: false,
                success: function(r){
                    if(r == 'Success'){
                        swal("Good job!", "Successfully saved to database. Saving a copy", "success")
                    }
                    else if(r == 'Fail'){
                        swal("Notice:", "System Error. Contact Administrator", "error");
                    }
                    else if(r == "Duplicate"){
                        swal("Notice:", "Payslip for the given period has already been saved to the database. Save a copy instead", "error");
                    }
                },
                error:function(r){
                  swal("Notice:","System Error Contact Administrator", "error");
                }
            });
        });       
</script>