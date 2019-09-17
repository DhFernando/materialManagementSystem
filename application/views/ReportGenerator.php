<?php $this->load->view('template/header'); ?>

<div class="container">
    <?php if($this->session->flashdata('reportGeneratorErrors')){ ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $this->session->flashdata('reportGeneratorErrors'); ?>
        </div>  
   <?php } ?>
    <h4>Consumption Report</h4>
</div>

<div class="container">
    <div class="row">
        <div class="col-12">
            <?php echo form_open_multipart('welcome/filter' ,array('method'=>'get'));?>
                <div class="row ml-3 ">
                    <div class="form-group mr-2">
                        <label for="">From : </label>
                        <?php echo form_input(['name'=>'dateFrom','class'=>'form-control','type'=>'Date','required']);?>         
                    </div>
                    <div class="form-group mr-2">
                        <label for="">To</label>
                        <?php echo form_input(['name'=>'dateTo','class'=>'form-control','type'=>'Date','required']);?>         
                    </div>
                </div>
                <div class="row ml-0">
                    <div class="col-3">
                        <div class="form-group ">
                            <select class="form-control" name="areaName" id="">
                                <?php foreach($results['areaNames'] as $data){ ?>
                                    <option value='<?php echo $data->areaName ?>'><?php echo $data->areaName ?></option>
                                <?php } ?>
                            </select>        
                        </div>
                    </div>
                    <!-- <div class="col-3">
                        <div class="form-group ">
                            <select class="form-control" name="areaReference" id="">
                                <?php foreach($results['areaReference'] as $data){ ?>
                                    <option value='<?php echo $data->areaReference ?>'><?php echo $data->areaReference ?></option>
                                <?php } ?>
                            </select>        
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group ">
                            <select class="form-control" name="roadReference" id="">
                                <?php foreach($results['roadReference'] as $data){ ?>
                                    <option value='<?php echo $data->roadReference ?>'><?php echo $data->roadReference ?></option>
                                <?php } ?>
                            </select>        
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group ">
                            <select class="form-control" name="roadReference" id="">
                                <?php foreach($results['roadReference'] as $data){ ?>
                                    <option value='<?php echo $data->roadReference ?>'><?php echo $data->roadReference ?></option>
                                <?php } ?>
                            </select>        
                        </div>
                    </div> -->
                </div>
                <div class="row ml-3">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                Key Activity <input type="checkbox" name="type[]" value="keyActivity">
                            </div>
                            <div class="col-6">
                                Issued By Contractor <input type="checkbox" name="type[]" value="issuedByContractor">
                            </div>
                            <div class="col-6">
                                Supplied By SubContractor <input type="checkbox" name="type[]" value="suppliedBySubContractor">
                            </div>
                            <div class="col-6">
                                Special Tools & Equipment <input type="checkbox" name="type[]" value="specialTools&Equipment">
                            </div>
                            <div class="col-6">
                                Staff <input type="checkbox" name="type[]" value="staff">
                            </div>
                            <div class="col-6">
                                Workman <input type="checkbox" name="type[]" value="workman">
                            </div>
                            <div class="col-6">
                                Machine <input type="checkbox" name="type[]" value="machine">
                            </div>
                        </div>            
                    </div>
                </div>
                <div class="row ml-3">
                    <div class="form-group ">
                        <?php echo form_input(['name'=>'typeOfRep','class'=>'form-control','value'=>'fullProject','placeholder'=>'Date','type'=>'hidden']);?>  
                        <?php echo form_submit(['name'=>'submit','class'=>'btn btn-secondary','value'=>'Create Report','type'=>'submit' ]);?>
                    </div>
                </div>
            <?php echo form_close();?>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <h4 class="mt-3">Manhole Placing Report</h4>
            <?php echo form_open_multipart('welcome/filterManhole',array('method'=>'get'));?>
                
                    <div class="row ml-0 ">
                        <div class="form-group mr-2">
                            <label for="">From : </label>
                            <?php echo form_input(['name'=>'dateFrom','class'=>'form-control','placeholder'=>'Date','type'=>'Date']);?>         
                        </div>
                        <div class="form-group mr-2">
                            <label for="">To</label>
                            <?php echo form_input(['name'=>'dateTo','class'=>'form-control','placeholder'=>'Date','type'=>'Date']);?>              
                        </div>
                    </div> 
                    <div class="row ml-0">
                        <div class="col-3">
                            <div class="form-group ">
                                <select class="form-control" name="areaName" id="">
                                    <?php foreach($results['areaNames'] as $data){ ?>
                                        <option value='<?php echo $data->areaName ?>'><?php echo $data->areaName ?></option>
                                    <?php } ?>
                                </select>        
                            </div>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="form-group ml-3">
                            <?php echo form_submit(['name'=>'submit','class'=>'btn btn-secondary','value'=>'Create Report','type'=>'submit' ]);?>
                        </div>
                    </div>
                    <?php echo form_input(['name'=>'typeOfRep','class'=>'form-control','value'=>'fullProject','placeholder'=>'Date','type'=>'hidden']);?>
                <!-- <?php echo form_input(['name'=>'siteId','value'=>$_GET['siteId'],'type'=>'hidden' ]);?> -->
            <?php echo form_close();?>
        </div>
    </div>
                                    
</div>


        
<?php $this->load->view('template/footer');?>