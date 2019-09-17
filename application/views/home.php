
<?php $this->load->view('template/header'); ?>
<div class="container">

    <?php if($this->session->flashdata('logInErrorMzg')){ ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $this->session->flashdata('logInErrorMzg'); ?>
        </div>
    <?php } ?>

    <h1>Home Page</h1>
    
    

</div>

<?php $this->load->view('template/footer');?>

