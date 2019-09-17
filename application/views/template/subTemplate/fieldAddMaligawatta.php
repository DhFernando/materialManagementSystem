<div class="modal fade" tabindex=-1 role="dialog" id="addResouces">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Resouces</h5>
                <button class="close" type="button" data-dismiss="modal" area-lable="Close">
                    <span area-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('welcome/inputResource?areaName='.$_GET['areaName'].'&siteId='.$_GET['siteId']);?>  
                    
                    <div class="form-group">
                        <?php
                            $options=array(
                                'staff'=>'Staff',
                                'workman'=>'Workman',
                                'machinery'=>'Machinery',
                                'materials'=>'Materials',
                                'tools'=>'Tools',
                                'equipment'=>'Equipment',
                            );
                                echo form_dropdown('type',$options,'','class="form-control"')
                            ?>
                    </div>
                    <div class="form-group">
                        <?php echo form_input(['name'=>'resource','class'=>'form-control','placeholder'=>'Enter Resource','type'=>'text']);?>         
                    </div>
                    <div class="form-group">
                        <?php
                            $options=array(
                                'Nos'=>'Nos',
                                'Set'=>'Set'
                            );
                                echo form_dropdown('unit',$options,'','class="form-control"')
                            ?>
                    </div>
                    <div class="form-group">
                        <?php echo form_input(['name'=>'currentUrl','class'=>'form-control','value'=>uri_string().'?'.$_SERVER['QUERY_STRING'],'type'=>'hidden']);?>         
                    </div>
                    <?php echo form_submit(['name'=>'inputResource','class'=>'btn btn-primary','value'=>'Add','type'=>'submit' ]);?>
                <?php echo form_close();?>
            </div>
        </div>
    </div>
</div>