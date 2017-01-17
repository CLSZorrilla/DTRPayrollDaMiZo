

<!DOCTYPE html>

<html lang = "en">
<head>
    <?php $this->load->view('partials/header');?>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style-login.css">
</head>

<body>

<div id = "button">
	<button id = "login">LOGIN</button><br>
	<span class = "tag-login">PAYROLL SYSTEM FOR GOVERNMENT INSTITUTIONS</span>
    <div class = "m-error1">
            <img src = "<?php echo base_url();?>assets/images/error.png">
            <div id = "m-error">
                
            </div>
    </div>
</div>


<!-- MODAL LOGIN -->
<div id = "modal-login">
    <div class = "modal-log-cont">

        <div class = "modal-head">
            <h3>LOGIN FORM</h3>
            <div class = "clip"></div><div id = "close-v"><img src = "<?php echo base_url();?>assets/images/del-modal.png"></div>
        </div>

        <div class = "instruction">
            <h5 class="InstrucHead">Registered users are only the ones allowed to enter.</h5><br>
            <p class="InstrucPara">Ang iyong account may makukuha lamang sa malapit na mang-gagamit center.</p><br>
            <p class="InstrucPara">Kung merong kang problema sa iyong account pede kang tumawag sa man-gagamit hotline. (143) 699-12345</p>
        </div>

        <!-- LOGIN FORM -->
        <?php if($this->session->flashdata('login_failed')): ?>
        <?php echo $this->session->flashdata('login_failed'); ?>
        <?php endif; ?>
        <div class = "form">
            <br>
            <?php 

                $attributes =array('id' => 'logform', 'class' => 'form_horizontal'); 
            ?>

            <?php

                echo form_open('main/login_check', $attributes);

            ?>

            <div class="form-group">

                <?php echo form_label('Username'); ?>

                <?php

                $data = array(

                    'class' => 'form-control',
                    'name' => 'username',
                    'id' => 'uid',
                    'placeholder' => 'Enter here',

                    );

                ?>

                <?php echo form_input($data)?>
            </div>

            <div class="form-group">

                <?php echo form_label('Password'); ?>

                <?php

                $data = array(

                    'class' =>'form-control',
                    'name' =>'password',
                    'id' => 'upass',
                    'placeholder' =>'Enter here',

                    );

                ?>
                <?php echo form_password($data)?>

            </div>

            <div class="form-group">

                <?php

                $data = array(

                    'class' =>'btn',
                    'name' =>'submit',
                    'id' => 'l-submit',
                    'value' => 'Login',
                    'style' => 'background-color:lightblue;'
                    );

                ?>
                <?php echo form_submit($data)?>

            </div>

            <?php

                echo form_close();

            ?>
        </div>
    </div>

</div>
</body>
<script src = "<?php echo base_url(); ?>assets/js/index.js"></script>
<script>
$('#uid').mask("99-999-999")
</script>
</html>