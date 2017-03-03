<?php
    $base_url = base_url();
    include "/../partials/nav_customize.php";
?>
<div class="BodyContainer">
<div class="BodyContent" id="payslipPrint">
    <ol class="breadcrumb">
        <li><a href="<?php echo $base_url; ?>main/home_view">Home</a></li>
        <li><a href="#">Payroll</a></li>
        <li class="active">View Payslip</li>
    </ol>
    <div class="row">
        <h4 style="color:<?php echo $company['colorTheme']; ?>;"><b>VIEW PAYSLIP of <?php echo date("Y-M"); ?></b></h4>
        <hr class="selectedHR" />
    </div>
    
            <div class="row" style="margin-bottom: 20px;border-bottom:2px solid <?php echo $company['colorTheme']; ?>">
                
            </div>
            <div class="row" id="payslip">
            </div>

</div>
</div>
    <script type="text/javascript">
        var dateObj = new Date();
        var monthNme = new Array();
        monthNme[0] = "January";
        monthNme[1] = "February";
        monthNme[2] = "March";
        monthNme[3] = "April";
        monthNme[4] = "May";
        monthNme[5] = "June";
        monthNme[6] = "July";
        monthNme[7] = "August";
        monthNme[8] = "September";
        monthNme[9] = "October";
        monthNme[10] = "November";
        monthNme[11] = "December";
        var year = "";
        var month = "";

        $(document).ready(function(){
            year = dateObj.getUTCFullYear();
            month = monthNme[dateObj.getMonth()];

            $.ajax({
                type:"POST",
                url:"<?php echo base_url();?>employee/FilterCategory",
                data:{year,month},
                cache:false,
                success:function(r){
                    $('#payslip').html(r);                  
                },
                error:function(r){
                    alert("AJAX Fail");
                }
            });
        })

        $('#year').change(function(){
            year = document.getElementById("year").value;
            month = document.getElementById("month").value;

            $.ajax({
                type:"POST",
                url:"<?php echo base_url();?>employee/FilterCategory",
                data:{year,month},
                cache:false,
                success:function(r){
                    $('#payslip').html(r);
                    
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
                url:"<?php echo base_url();?>employee/FilterCategory",
                data:{year,month},
                cache:false,
                success:function(r){
                    $('#payslip').html(r);
                    
                },
                error:function(r){
                    alert("AJAX Fail");
                }
            });
        });
    </script>