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
        <h4 style="color:<?php echo $company['colorTheme']; ?>;"><b>VIEW PAYSLIP</b></h4>
        <hr class="selectedHR" />
    </div>
    
            <div class="row" style="margin-bottom: 20px;border-bottom:2px solid <?php echo $company['colorTheme']; ?>">
                <div class="form-group col-lg-4">
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
                <div class="form-group col-lg-4">
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
                <div class="form-group col-lg-4">
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
        var period = "";

        $(document).ready(function(){
            year = dateObj.getUTCFullYear();
            month = monthNme[dateObj.getMonth()];
            period = "2";

            $.ajax({
                type:"POST",
                url:"<?php echo base_url();?>employee/FilterCategory",
                data:{year,month,period},
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
            period = document.getElementById("period").value;

            $.ajax({
                type:"POST",
                url:"<?php echo base_url();?>employee/FilterCategory",
                data:{year,month,period},
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
            period = document.getElementById("period").value;

            $.ajax({
                type:"POST",
                url:"<?php echo base_url();?>employee/FilterCategory",
                data:{year,month,period},
                cache:false,
                success:function(r){
                    $('#payslip').html(r);
                    
                },
                error:function(r){
                    alert("AJAX Fail");
                }
            });
        });

        $('#period').change(function(){
            year = document.getElementById("year").value;
            month = document.getElementById("month").value;
            period = document.getElementById("period").value;
            
            $.ajax({
                type:"POST",
                url:"<?php echo base_url();?>employee/FilterCategory",
                data:{year,month,period},
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