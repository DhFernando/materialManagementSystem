<?php $this->load->view('template/header'); ?>
<div class="container" style="margin:30px">
    <div class="row">
        <h3 class="mb-5">Pipe Laying Consumption Report</h3>
    </div>
    <div class="row">
        <div class="col-12">
        <h6><?php echo "Total Length for  ".$_GET['dateFrom']."  to  ".$_GET['dateTo'] ?></h6>
            <table class="table mb-5 mt-4" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Pipe Serial No</th>
                        <th>Pipe Type</th>
                        <th>Pipe Length</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $x=1 ?>
                    <?php foreach($results->result() as $result){ ?>
                        <tr>
                            <td><h6><?php echo $x ?></h6></td>
                            <td><?php echo $result->date ?></td>
                            <td><?php echo $result->pipeSerialNo ?></td>
                            <td><?php echo $result->pipeType ?></td>
                            <td><?php echo $result->pipeLength ?></td>
                        </tr>
                    <?php $x++ ?>
                    <?php } ?>
                    <?php foreach($total->result() as $data){ ?>
                        <td colspan="4"><h6>Total</h6></td>
                        
                        <td><h5><?php echo $data->total ?></h5></td>
                        
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>    
<?php $this->load->view('template/footer');?>