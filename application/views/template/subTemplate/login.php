<div class="modal fade" tabindex=-1 role="dialog" id="logIn">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">logIn</h5>
                <button class="close" type="button" data-dismiss="modal" area-lable="Close">
                    <span area-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('welcome/login');?>	
                    <div class="form-group mr-2">
                        <?php echo form_input(['name'=>'email','class'=>'form-control','placeholder'=>'Email','type'=>'text']);?>         
                    </div>
                    <div class="form-group mr-2">
                        <?php echo form_input(['name'=>'password','class'=>'form-control','placeholder'=>'Enter Password','type'=>'password']);?>         
                    </div>
                    <?php echo form_submit(['name'=>'submit','value'=>'LogIn','type'=>'submit','class'=>'btn btn-primary']);?>
                <?php echo form_close();?>
            </div>
        </div>
    </div>
</div>