<?php
    $base_url = base_url();
    include "/../partials/nav_customize.php";
?>
<div class="BodyContainer">
<div class="BodyContent" id="payslipPrint">
    <ol class="breadcrumb">
        <li><a href="<?php echo $base_url; ?>main/home_view">Home</a></li>
        <li class="active">Employee Profile</li>
    </ol>
    <div class="row">
        <h4 style="color:<?php echo $company['colorTheme']; ?>;"><b>EMPLOYEE PROFILE</b></h4>
        <hr />
    </div>
    <?php
    foreach($uinfo as $info){
    echo "
    <div class='row'>
            <div class='row'>
                <div class='col-xs-4 col-sm-4 col-md-4 col-lg-3'><span><b>EMPLOYEE ID:</b></span></div>
                <div class='col-xs-8 col-sm-8 col-md-8 col-lg-3'><span>".$info->empID."</span></div>
                <div class='col-xs-4 col-sm-4 col-md-4 col-lg-3'><span><b>FULL NAME:</b></span></div>
                <div class='col-xs-8 col-sm-8 col-md-8 col-lg-3'><span>".$info->name."</span></div>
                <div class='col-xs-4 col-sm-4 col-md-4 col-lg-3'><span><b>POSITION:</b></span></div>
                <div class='col-xs-8 col-sm-8 col-md-8 col-lg-3'><span>".$info->positionName."</span></div>
                <div class='col-xs-4 col-sm-4 col-md-4 col-lg-3'><span><b>DEPARTMENT:</b></span></div>
                <div class='col-xs-8 col-sm-8 col-md-8 col-lg-3'><span>".$info->deptName."</span></div>
            </div>
            <br/>

            <div class='row'>

            <div class='col-md-6'>
            <div class='row'><span><b>PERSONAL INFO:</b></span>
            <table class='table table-striped'><tbody>
            <tr><td>ADDRESS</td><td>".$info->address."</td></tr>
            <tr><td>EMAIL ADDRESS</td><td>".$info->emailAddress."</td></tr>
            <tr><td>BIRTHDATE</td><td>".$info->birthDate."</td></tr>
            <tr><td>CONTACT NO.</td><td>".$info->contactNo."</td></tr>
            <tr><td>SEX</td><td>".$info->sex."</td></tr>
            <tr><td>MARITAL STATUS</td><td>".$info->maritalStatus."</td></tr>
            </tbody></table>
            </div>
            </div>
                
            <div class='col-md-6'>
            <div class='row'><span><b>GOVERNMENT IDs:</b></span>
            <table class='table table-striped'><tbody>
            <tr><td>GSIS</td><td>".$info->GSISNo."</td></tr>
            <tr><td>PHILHEALTH</td><td>".$info->PhilHealthNo."</td></tr>
            <tr><td>TAX</td><td>".$info->TIN."</td></tr>
            </tbody></table>
            </div>

            <div class='row'>
            <div class='row'><span><b>REMAINING LEAVE:</b></span>
            <table class='table table-striped'><tbody>
            <tr><td>SL</td><td>".$info->SL."</td></tr>
            <tr><td>VL</td><td>".$info->VL."</td></tr>
            </tbody></table>
            </div>
            
            </div>
            
            </div>
    </div>
    ";
    }
    ?>
</div>
</div>