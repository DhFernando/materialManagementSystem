<?php $this->load->view('template/header'); ?>
<?php if(!$this->session->userdata('loggedIn')){
    redirect('welcome/home');
}?>

<div class="container ">
    <h3 class="mb-5">Activities Work Report</h3>
    <div class="container pl-5 pr-5">
        <?php foreach($results as $result){ ?>
            <table class="table mb-5" cellspacing="0">
            <h6>For <?php echo $result['date'] ?></h6>
                <thead>
                    <tr>
                        <th>Billing Item No</th>
                        <th>Description Of Work</th>
                        <th>Remark</th>  
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($result['details'] as $data){ ?>
                        <tr>
                            <td><?php echo $data['BillingItemNo'] ?></td>
                            <td><?php echo $data['DescriptionOfWork'] ?></td>
                            <td><?php echo $data['Remark'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
        <?php } ?>
    </div>
</div>

<?php $this->load->view('template/footer');?>