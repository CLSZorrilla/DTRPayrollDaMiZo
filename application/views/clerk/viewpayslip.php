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

        <div id="payslip">
            <div class='row'>
                <div class='col-xs-4 col-sm-4 col-md-4 col-lg-3'>
                    <span><b>NAME:</b></span>
                </div>
                <div class='col-xs-8 col-sm-8 col-md-8 col-lg-3'>
                    <span><?php echo $uinfo[0]; ?></span>
                </div>
                <div class='col-xs-4 col-sm-4 col-md-4 col-lg-3'>
                    <span><b>Period:</b></span>
                </div>
                <div class='col-xs-8 col-sm-8 col-md-8 col-lg-3'>
                    <span><?php echo date('M-d-Y',strtotime($uinfo[30])); ?> - <?php echo date('M-d-Y',strtotime($uinfo[31])); ?></span>
                </div>
            </div>
            <div class='row'>
                <div class='col-xs-4 col-sm-4 col-md-4 col-lg-3'>
                    <span><b>POSITION:</b></span>
                </div>
                <div class='col-xs-8 col-sm-8 col-md-8 col-lg-3'>
                    <span><?php echo $uinfo[1]; ?></span>
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
                                    <td><?php echo $uinfo[2]; ?></td>
                                </tr>
                                <tr>
                                    <td>PERA</td>
                                    <td><?php echo $uinfo[11]; ?></td>
                                </tr>
                                <tr>
                                    <td><b>GROSS EARNINGS</b></td>
                                    <td><?php echo $uinfo[4]; ?></td>
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
                                    <td><?php echo $uinfo[16]; ?></td>
                                </tr>
                                <tr>
                                    <td>HOURS WORKED</td>
                                    <td><?php echo $uinfo[17]; ?></td>
                                </tr>
                                <tr>
                                    <td>NO. OF ABSENCES</td>
                                    <td><?php echo $uinfo[15]; ?></td>
                                </tr>
                                <tr>
                                    <td>NO. OF LATES</td>
                                    <td><?php echo $uinfo[20]; ?></td>
                                </tr>
                                <tr>
                                    <td>REMAINING SL</td>
                                    <td><?php echo $uinfo[19]; ?></td>
                                </tr>
                                <tr>
                                    <td>REMAINING VL</td>
                                    <td><?php echo $uinfo[18]; ?></td>
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
                                <td><?php echo $uinfo[5]; ?></td>
                            </tr>
                            <tr>
                                <td>PAGIBIG FUND</td>
                                <td><?php echo $uinfo[13]; ?></td>
                            </tr>
                            <tr>
                                <td>GSIS INTEG.</td>
                                <td><?php echo $uinfo[6]; ?></td>
                            </tr>
                            <tr>
                                <td>WT</td>
                                <td><?php echo $uinfo[7]; ?></td>
                            </tr>          
                            <?php
                            foreach($uinfo[8] as $key =>$info2){
                                echo "<tr>
                                    <td>".strtoupper($uinfo[8][$key])."</td>
                                    <td>".$uinfo[9][$key]."</td>
                                </tr>";
                            }
                            ?>                            
                        </tbody>
                    </table>
                    </div>

                    <div class='row'>
                    <div class='col-xs-6 col-sm-6 col-md-6 col-lg-6'>
                        <h3>TOTAL NETPAY:</h3>
                    </div>
                    <div class='col-xs-6 col-sm-6 col-md-6 col-lg-6'>
                        <h3><?php echo $uinfo[10]; ?></h3>
                    </div>
                    </div>
                    <div class='row'>
                    <div class='col-xs-6 col-sm-6 col-md-6 col-lg-6'>
                        <h3>1st Half:</h3>
                    </div>
                    <div class='col-xs-6 col-sm-6 col-md-6 col-lg-6'>
                        <h3><?php echo $uinfo[21]; ?></h3>
                    </div>
                    </div>
                    <div class='row'>
                    <div class='col-xs-6 col-sm-6 col-md-6 col-lg-6'>
                        <h3>2nd Half:</h3>
                    </div>
                    <div class='col-xs-6 col-sm-6 col-md-6 col-lg-6'>
                        <h3><?php echo $uinfo[22]; ?></h3>
                    </div>
                    </div>
                </div>
            </div> 
        </div>         

        <button class="btn btn-primary pull-right" id="printpage">PRINT</button>
        <button class="btn btn-primary pull-right" id="savePayslip" style="margin-right:10px;">SAVE</button>
        
    </div>
  </div>
<script type="text/javascript">
    $('#savePayslip').click(function(e){
            var eid = "<?php echo $uinfo[23]; ?>";
            var basicpay = "<?php echo $uinfo[2]; ?>"
            var pera = "<?php echo $uinfo[11]; ?>";
            var grosspay = "<?php echo $uinfo[4]; ?>";
            var daysworked = "<?php echo $uinfo[16]; ?>";
            var hoursworked = "<?php echo $uinfo[17]; ?>";
            var absences = "<?php echo $uinfo[15]; ?>";
            var lates = "<?php echo $uinfo[20]; ?>";
            var vl = "<?php echo $uinfo[18]; ?>";
            var sl = "<?php echo $uinfo[19]; ?>";
            var philhealth = "<?php echo $uinfo[5]; ?>";
            var pagibig = "<?php echo $uinfo[13]; ?>";
            var gsis = "<?php echo $uinfo[6]; ?>";
            var tax = "<?php echo $uinfo[7]; ?>";
            var netpay = "<?php echo $uinfo[10]; ?>";
            var fhalf = "<?php echo $uinfo[21]; ?>";
            var shalf = "<?php echo $uinfo[22]; ?>";
            var month = "<?php echo $uinfo[24]; ?>";
            var year = "<?php echo $uinfo[29]; ?>";

            $.ajax
            ({
                type: "POST",
                url:"<?php echo base_url(); ?>Clerk/savePayslip/",
                data:{eid,basicpay,pera,grosspay,daysworked,hoursworked,absences,lates,vl,sl,philhealth,pagibig,gsis,tax,netpay,fhalf,shalf,month,year},
                cache: false,
                success: function(r){
                    if(r == 'Success'){
                        swal("Good job!", "Successfully saved to database. Saving a copy", "success");
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
    $('#printpage').click(function(){
        $.print("#payslip");
    });     
</script>