<?php $this->load->view('template/header'); ?>
<?php if(!$this->session->userdata('loggedIn')){
    redirect('welcome/home');
}?>

<div class="container ">
    <h3 class="mb-5">Manhole Placing Report</h3>
    <div class="container pl-5 pr-5">
        <div class="row" style="width:1400px">
            <?php foreach($results as $result){ ?>
                <table class="table mb-5" cellspacing="0">
                <h6>For <?php echo $result['date'] ?></h6>
                    <thead >
                        <tr>
                            <th>#</th>
                            <th>MH Type</th>
                            <th>Element Serial</th>
                            <th>Pre-cast Element</th>
                        </tr>
                        
                    </thead>
                    <tbody>
                    <?php $x=1 ?>
                        <?php foreach($result['details'] as $data){ ?>
                            <tr>
                                <td><h6><?php echo $x."." ?></h6></td>
                                <td><?php echo $data['mhType'] ?></td>
                                <td><?php echo $data['serialNumber'] ?></td>
                                <td><?php echo $data['resource'] ?></td>
                            </tr>
                            <?php $x++; ?>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } ?>
        </div>
    </div>
</div>

<?php $this->load->view('template/footer');?>