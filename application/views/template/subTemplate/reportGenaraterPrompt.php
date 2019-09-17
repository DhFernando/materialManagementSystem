<div class="modal fade" tabindex=-1 role="dialog" id="report">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Reports</h5>
                <button class="close" type="button" data-dismiss="modal" area-lable="Close">
                    <span area-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h4>Consumption Report</h4>
                <?php echo form_open_multipart('welcome/filter' ,array('method'=>'get'));?>
                    <div class="row ml-3 ">
                        <div class="row ml-0 ">
                            <?php if($_GET['siteId']==1){ ?>
                                <div class="form-group mr-2">
                                    <label for="">From : </label>
                                    <?php echo form_input(['name'=>'dateFrom','class'=>'form-control','placeholder'=>'Date','type'=>'Date']);?>         
                                </div>
                                <div class="form-group mr-2">
                                    <label for="">To</label>
                                    <?php echo form_input(['name'=>'dateTo','class'=>'form-control','placeholder'=>'Date','type'=>'Date']);?>         
                                    
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-4">
                                            Staff <input type="checkbox" name="type[]" value="staff">
                                        </div>
                                        <div class="col-4">
                                            workman <input type="checkbox" name="type[]" value="workman"> 
                                        </div>
                                        <div class="col-4">
                                            machinery <input type="checkbox" name="type[]" value="machinery">  
                                        </div>
                                        <div class="col-4">
                                            materials <input type="checkbox" name="type[]" value="materials">  
                                        </div>
                                        <div class="col-4">
                                            tools <input type="checkbox" name="type[]" value="tools">  
                                        </div>
                                        <div class="col-4">
                                            equipment <input type="checkbox" name="type[]" value="equipment">
                                        </div>
                                    </div>            
                                </div>
                            <?php }else{ ?>
                                <div class="form-group mr-2">
                                    <label for="">From : </label>
                                    <?php echo form_input(['name'=>'dateFrom','class'=>'form-control','placeholder'=>'Date','type'=>'Date']);?>         
                                </div>
                                <div class="form-group mr-2">
                                    <label for="">To</label>
                                    <?php echo form_input(['name'=>'dateTo','class'=>'form-control','placeholder'=>'Date','type'=>'Date']);?>         
                                </div>
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
                            <?php } ?>
                        </div>  
                        
                        <div class="row">
                            <div class="form-group ml-3">
                                <?php echo form_submit(['name'=>'submit','class'=>'btn btn-secondary','value'=>'Create Report','type'=>'submit' ]);?>
                            </div>
                        </div>
                    </div>
                    <?php echo form_input(['name'=>'siteId','value'=>$_GET['siteId'],'type'=>'hidden' ]);?>
                <?php echo form_close();?>

                
                    <?php if($_GET['siteId']==1){  ?>
                        <h4 class="mt-3">Working Activities Report</h4>
                        <?php echo form_open_multipart('welcome/filterWorkingActivities',array('method'=>'get'));?>
                            <?php if(0==0){ ?><?php }else{ ?><?php } ?>

                            <div class="row ml-3 ">
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
                                
                                <div class="row">
                                    <div class="form-group ml-3">
                                        <?php echo form_submit(['name'=>'submit','class'=>'btn btn-secondary','value'=>'Create Report','type'=>'submit' ]);?>
                                    </div>
                                </div>
                            </div>
                            <?php echo form_input(['name'=>'siteId','value'=>$_GET['siteId'],'type'=>'hidden' ]);?>
                        <?php echo form_close();?>
                    <?php }else{ ?>
                        <h4 class="mt-3">Pipe Laying Report</h4>
                        <?php echo form_open_multipart('welcome/filterPipeLaying',array('method'=>'get'));?>
                            <?php if(0==0){ ?><?php }else{ ?><?php } ?>

                            <div class="row ml-3 ">
                                <div class="row ml-0 ">
                                    <div class="form-group mr-2">
                                        <label for="">From : </label>
                                        <?php echo form_input(['name'=>'dateFrom','class'=>'form-control','placeholder'=>'Date','type'=>'Date']);?>         
                                    </div>
                                    <div class="form-group mr-2">
                                        <label for="">To</label>
                                        <?php echo form_input(['name'=>'dateTo','class'=>'form-control','placeholder'=>'Date','type'=>'Date']);?>            
                                    </div>
                                    <div class="form-group mr-2">
                                        <div class="row">
                                            <div class="col-12">
                                                Consumption Report <input type="checkbox" name='pipeConsumption'>
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                                
                                
                                <div class="row">
                                    <div class="form-group ml-3">
                                        <?php echo form_submit(['name'=>'submit','class'=>'btn btn-secondary','value'=>'Create Report','type'=>'submit' ]);?>
                                    </div>
                                </div>
                            </div>
                            <?php echo form_input(['name'=>'siteId','value'=>$_GET['siteId'],'type'=>'hidden' ]);?>
                        <?php echo form_close();?>

                        <h4 class="mt-3">Manhole Placing Report</h4>
                        <?php echo form_open_multipart('welcome/filterManhole',array('method'=>'get'));?>
                            <?php if(0==0){ ?><?php }else{ ?><?php } ?>
                            <div class="row ml-3 ">
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
                                <div class="row">
                                    <div class="form-group ml-3">
                                        <?php echo form_submit(['name'=>'submit','class'=>'btn btn-secondary','value'=>'Create Report','type'=>'submit' ]);?>
                                    </div>
                                </div>
                            </div>
                            <?php echo form_input(['name'=>'siteId','value'=>$_GET['siteId'],'type'=>'hidden' ]);?>
                        <?php echo form_close();?>
                    <?php } ?>



            </div>  
        </div>
    </div>
</div>