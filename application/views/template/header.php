<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assest/css/custom/dash-style.css"> 
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assest/css/boostrap/bootstrap.css');?> " id="bootstrap-css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assest/css/boostrap/bootstrap.min.css');?>" id="bootstrap-css" />
     

    <script src="<?php echo base_url('assest/js/jquery/jquery.js');?>"></script>
<script src="<?php echo base_url('assest/js/jquery/jquery-ui.min.js');?>"></script>
<script src="<?php echo base_url('assest/js/fontAwsom/fa.js');?>"></script>

    <title>SunPower</title>
</head>
<body>
   
<!-- feild add promt open -->
<?php $this->load->view('template/subTemplate/fieldAddMaligawatta'); ?>
<!-- feild add promt close -->


<?php $this->load->view('template/subTemplate/addKeyActivities'); ?>
<?php $this->load->view('template/subTemplate/addPipeLayingResouces'); ?>

<!-- Report Generate form Start -->
    <?php $this->load->view('template/subTemplate/reportGenaraterPrompt'); ?>
    
<!-- Report Generate form Close -->
<?php $this->load->view('template/subTemplate/login'); ?>
<div class="row mt-0 mb-0 ml-0 mr-0 pb-0 pt-0 pl-0 pr-0">
    <div class="col-md-2" style="bacground:black;">
        <!-- Side nav -->
        <?php $this->load->view('template/sideNav') ?>
        <!-- side nav -->
    </div>
    <div class="col-md-10">
        <div class="row mt-5">
        



