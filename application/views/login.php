<?php include "partials/nav_customize.php";?>
<?php
    $lblClass = array('class' => 'control-label col-md-6');
    $inputClass = array('class' => 'form-control');
?>

<!DOCTYPE html>
<html lang = "en">
<head>
    <?php $this->load->view('partials/header');?>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style-login.css">
    <style type="text/css">
        button#login, button#login:hover, div.clip, div#close-v, input#l-submit {
            background-color: <?php echo $company['colorTheme']; ?>;
        }
        .form form input:focus {
            border-bottom: 2px solid <?php echo $company['colorTheme']; ?>;
        }
    </style>
    <script src = "<?php echo base_url(); ?>assets/js/index.js"></script>
</head>

<body>
<div id = "button">
	<button id = "login">LOGIN</button>
    <br />
    <!-- Added -->
	<span class = "tag-login">PAYROLL SYSTEM FOR <?php echo strtoupper($company['name']); ?></span>
    <!-- Added -->
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
            <div class = "clip"></div>
            <div id = "close-v">
                <img src = "<?php echo base_url();?>assets/images/del-modal.png">
            </div>
        </div>
        <div class="row">
            <div class = "instruction col-lg-6">
                <h5 class="InstrucHead">Registered users are only the ones allowed to enter.</h5><br />
                <p class="InstrucPara">Ang iyong account may makukuha lamang sa malapit na mang-gagamit center.</p><br />
                <p class="InstrucPara">
                    Kung merong kang problema sa iyong account pede kang tumawag sa manga-gamit hotline. (143) 699-12345
                </p>
            </div>

            <!-- LOGIN FORM -->
            <?php if($this->session->flashdata('login_failed')): ?>
            <?php echo $this->session->flashdata('login_failed'); ?>
            <?php endif; ?>

            <?php
                $attributes =array('id' => 'logform', 'class' => 'form_horizontal'); 
            ?>
            <div class = "form col-lg-6">
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
                        'placeholder' => 'Enter here'
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
            </div>
        </div>
        <div class="row">
            <div class="submit-b">
                <?php
                $data = array(
                    'class' =>'col-xs-6 col-lg-3 btnSubmit',
                    'name' =>'submit',
                    'id' => 'l-submit',
                    'value' => 'Login'
                );
                ?>
                <?php echo form_submit($data)?>
                <?php
                    echo form_close();
                ?>
                <button id = "close" class="col-xs-6 col-xs-offset-6 col-lg-3 col-lg-offset-3">Close</button>
            </div>
        </div>
    </div>
</div>
</body>

<script>
$('#uid').mask("99-999-999");
</script>
</html>