<?php $this->load->view('template/header'); ?>
<?php if(!$this->session->userdata('loggedIn')){
    redirect('welcome/home');
}?>

<div class="container ">
    <h3 class="mb-5">Pipe Laying Report</h3>
    <div class="container pl-5 pr-5">
        <div class="row" style="width:1400px">

            <?php foreach($results as $result){ ?>
                <table class="table mb-5" cellspacing="0">
                <h6>For <?php echo $result['date'] ?></h6>
                    <thead >
                        <tr>
                            <th rowspan="2">#</th>
                            <th rowspan="2">Pipe Serial No</th>
                            <th rowspan="2">Pipe Type</th>
                            <th rowspan="2">Pipe Length (m)</th>
                            <th colspan="4">Chainage</th>
                            <th rowspan="2">Bed Type</th>
                            <th rowspan="2">Backfill Type</th>
                            <th rowspan="2">Temp,Reins Type</th>
                            <th rowspan="2">Prmt,Reins Type</th>
                        </tr>
                        <tr>
                            <th colspan="2">Start</th>
                            <th colspan="2">End</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $x=1 ?>
                        <?php foreach($result['details'] as $data){ ?>
                            <tr>
                                <td><?php echo $x ?></td>
                                <td><?php echo $data['pipeSerialNo'] ?></td>
                                <td><?php echo $data['pipeType'] ?></td>
                                <td><?php echo $data['pipeLength'] ?></td>
                                <td colspan='2'><?php echo ($data['startGL']-$data['startIL']) ?></td>
                                <td colspan='2'><?php echo ($data['EndGL']-$data['EndIL']) ?></td>
                                <td><?php echo $data['bedType'] ?></td>
                                <td><?php echo $data['backfillType'] ?></td>
                                <td><?php echo $data['tempRainType'] ?></td>
                                <td><?php echo $data['prmtReinstType'] ?></td>
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