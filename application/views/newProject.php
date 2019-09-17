<?php $this->load->view('template/header'); ?>

<div class="container" style="margin-left:60px; margin-right:60px">
    <div class="row ">
        <div class="col-12">
            <div class="row">
                <h3>Create Project</h3>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                    <div class="row">
                        <div class="container">
                            <?php echo form_open_multipart('controller2/createProject');?> 
                                <div class="row">
                                    <?php if($this->session->userdata('status')=='root'){ ?>
                                        <div class="form-group mr-2">
                                            <label for="">Project : </label>
                                            <?php echo form_input(['name'=>'areaName','class'=>'form-control','placeholder'=>'Project','type'=>'text']);?>         
                                        </div>
                                        
                                    <?php } ?>
                                    <div class="form-group mr-2">
                                        <label for="">Current Project : </label>
                                        <select name="currentProjects" id="" class="form-control">
                                                <option value=""></option>
                                            <?php foreach($currentProject->result() as $data){ ?>
                                                <option value="<?php echo $data->areaName ?>"><?php echo $data->areaName ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                </div>
                                <div class="row mt-3">
                                    <div class="form-group mr-2">
                                        <label for="">Location : </label>
                                        <?php echo form_input(['name'=>'location','class'=>'form-control','placeholder'=>'Location','type'=>'text']);?>         
                                    </div>
                                    <div class="form-group mr-2">
                                        <label for="">Area Reference : </label>
                                        <?php echo form_input(['name'=>'areaReference','class'=>'form-control','placeholder'=>'Area Reference','type'=>'text']);?>         
                                    </div>
                                    <div class="form-group mr-2">
                                        <label for="">Road Reference : </label>
                                        <?php echo form_input(['name'=>'roadReference','class'=>'form-control','placeholder'=>'Road Reference','type'=>'text']);?>         
                                    </div>
                                    <div class="form-group mr-2">
                                        <label for="">Site Reference : </label>
                                        <?php echo form_input(['name'=>'siteReference','class'=>'form-control','placeholder'=>'Site Reference','type'=>'text']);?>         
                                    </div>
                                    <div class="form-group mr-2">
                                        <label for="">Paving Type : </label>
                                        <?php echo form_input(['name'=>'pavingType','class'=>'form-control','placeholder'=>'Paving Type','type'=>'text']);?>         
                                    </div>
                                </div>
                                <div class="row mt-4 ">
                                     <?php echo form_input(['class'=>'btn btn-secondary','value'=>'Create','type'=>'submit']);?>
                                </div>

                                
                            <?php echo form_close();?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('template/footer');?>