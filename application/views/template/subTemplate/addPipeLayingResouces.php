<div class="modal fade" tabindex=-1 role="dialog" id="addPipeLayingResouces">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Resources</h5>
                <button class="close" type="button" data-dismiss="modal" area-lable="Close">
                    <span area-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <?php echo form_open_multipart('welcome/inputResource?siteId='.$_GET['siteId'].'&areaName='.$_GET['areaName']);?>
                    
                    <div class="form-group">
                        <?php
                            $options=array(
                                'keyActivity'=>'Key Activity',
                                'issuedByContractor'=>'Issued by Contractor',
                                'suppliedBySubContractor'=>'Supplied by Sub-contractor',
                                'specialTools&Equipment'=>'Special Tools & Equipment',
                                'machine'=>'Machine',
                                'staff'=>'Staff',
                                'workman'=>'Workman',
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
                        <?php echo form_input(['name'=>'siteId','class'=>'form-control','value'=>$_GET['siteId'],'type'=>'hidden']);?>         
                    </div>
                    <div class="form-group">
                        <?php echo form_input(['name'=>'currentUrl','class'=>'form-control','value'=>uri_string().'?'.$_SERVER['QUERY_STRING'],'type'=>'hidden']);?>         
                    </div>
                    <?php echo form_submit(['name'=>'inputResource','class'=>'btn btn-primary','value'=>'Add','type'=>'submit' ]);?>
                <?php echo form_close();?>

            </div>
        </div>
    </div>
</div><?php echo form_input(['name'=>'currentUrl','class'=>'form-control','value'=>uri_string().'?'.$_SERVER['QUERY_STRING'],'type'=>'hidden']);?>