<div class="modal fade" tabindex=-1 role="dialog" id="addKeyActivities">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Key Activities</h5>
                <button class="close" type="button" data-dismiss="modal" area-lable="Close">
                    <span area-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('controller2/inputKeyActivities');?>                  
                    <div class="form-group">
                        <?php echo form_input(['name'=>'keyActivity','class'=>'form-control','placeholder'=>'Enter Key Activity','type'=>'text']);?>         
                    </div>
                   
                    <div class="form-group">
                        <?php echo form_input(['name'=>'currentUrl','class'=>'form-control','value'=>uri_string().'?'.$_SERVER['QUERY_STRING'],'type'=>'hidden']);?>         
                    </div>
                    <?php echo form_submit(['name'=>'submit','class'=>'btn btn-primary','value'=>'Add','type'=>'submit' ]);?>
                <?php echo form_close();?>
            </div>
        </div>
    </div>
</div>