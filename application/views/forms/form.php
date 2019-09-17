
<?php $this->load->view('template/header'); ?>
<?php if(!$this->session->userdata('loggedIn')){
    redirect('welcome/home');
}?>
<!--  -->

<div class="container">
<div class="row mb-5 ml-0">
    <div class="col-md-8">
        <h1><?php echo strtoupper($_GET['areaName']) ?></h1>
    </div>
    <div class="col-md-4">
        <a href="" class="btn btn-secondary" data-toggle="modal" data-target="#addResouces">Add Resouces</a>
        <a href="" class="btn btn-secondary" data-toggle="modal" data-target="#report">Report</a>
    </div>
</div>

    <div class="row">   
    <div class="col-md-12">
            <nav>
                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-basic-tab" data-toggle="tab" href="#nav-basic" role="tab" aria-controls="nav-basic" aria-selected="true"><img src='<?php echo base_url("assest/img/icons/daily_tasks.png") ?>' style="height:50px;width:50px;"></a>
                    <a class="nav-item nav-link" id="nav-Staff-tab" data-toggle="tab" href="#nav-Staff" role="tab" aria-controls="nav-Staff" aria-selected="false"><img src='<?php echo base_url("assest/img/icons/engineer.png") ?>' style="height:50px;width:50px;"></a>
                    <a class="nav-item nav-link" id="nav-workman-tab" data-toggle="tab" href="#nav-workman" role="tab" aria-controls="nav-workman" aria-selected="false"><img src='<?php echo base_url("assest/img/icons/workman.png") ?>' style="height:50px;width:50px;"></a>
                    <a class="nav-item nav-link" id="nav-machinery-tab" data-toggle="tab" href="#nav-machinery" role="tab" aria-controls="nav-machinery" aria-selected="false"><img src='<?php echo base_url("assest/img/icons/machinery.png") ?>' style="height:50px;width:50px;"></a>
                    <a class="nav-item nav-link" id="nav-materials-tab" data-toggle="tab" href="#nav-materials" role="tab" aria-controls="nav-materials" aria-selected="false"><img src='<?php echo base_url("assest/img/icons/materials.png") ?>' style="height:50px;width:50px;"></a>
                    <a class="nav-item nav-link" id="nav-tools-tab" data-toggle="tab" href="#nav-tools" role="tab" aria-controls="nav-tools" aria-selected="false"><img src='<?php echo base_url("assest/img/icons/tools.png") ?>' style="height:50px;width:50px;"></a>
                    <a class="nav-item nav-link" id="nav-equipment-tab" data-toggle="tab" href="#nav-equipment" role="tab" aria-controls="nav-equipment" aria-selected="false"><img src='<?php echo base_url("assest/img/icons/eqipment.png") ?>' style="height:50px;width:50px;"></a>
                    <a class="nav-item nav-link" id="nav-work_activities-tab" data-toggle="tab" href="#nav-work_activities" role="tab" aria-controls="nav-work_activities" aria-selected="false"><img src='<?php echo base_url("assest/img/icons/activities.jpeg") ?>' style="height:50px;width:50px;"></a>
                </div>
            </nav>

                
            <?php echo form_open_multipart('welcome/fromInput?siteId='.$_GET['siteId']);?>

            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active " id="nav-basic" role="tabpanel" aria-labelledby="nav-basic-tab">          
                        <div class="row ml-3 mt-5">
                                <div class="form-group mr-2">
                                <label for="">Date : </label>
                                    <?php echo form_input(['name'=>'date','class'=>'form-control','placeholder'=>'Date','type'=>'Date']);?>         
                                </div>
                                <div class="form-group mr-2">
                                <label for="">Time From</label>
                                    <?php echo form_input(['name'=>'TimeFrom','class'=>'form-control','type'=>'Time']);?>         
                                </div>
                                <div class="form-group mr-2">
                                <label for="">Time To</label>
                                    <?php echo form_input(['name'=>'TimeTo','class'=>'form-control','type'=>'Time']);?>         
                                </div>

                                
                        </div>
                        <div class="row ml-3">
                                <div class="form-group mr-4">
                                <label for="">Temp : </label>
                                <?php
                                    $options=array(
                                        '20-25'=>'20-25',
                                        '25-30'=>'25-30',
                                        '30-35'=>'30-35',
                                    );
                                        echo form_dropdown('Temp',$options,'','class="form-control"')
                                ?>
                                </div>
                                <div class="form-group mr-4">
                                    <label for="">Traffic :</label>
                                    <?php
                                    $options=array(
                                        'Normal'=>'Normal',
                                        'Medium'=>'Medium',
                                        'High'=>'High',
                                    );
                                        echo form_dropdown('Traffic',$options,'','class="form-control"')
                                    ?>
                                </div>
                                <div class="form-group mr-4">
                                    <label for="">Humidity :</label>
                                    <?php
                                    $options=array(
                                        'Dry'=>'Dry',
                                        'Medium'=>'Medium',
                                        'Humid'=>'Humid',
                                    );
                                        echo form_dropdown('Humidity',$options,'','class="form-control"')
                                    ?>
                                </div>
                                <div class="form-group mr-4">
                                    <label for="">Public Obligation :</label>
                                    <?php
                                    $options=array(
                                        'Yes'=>'Yes',
                                        'No'=>'No',
                                    );
                                        echo form_dropdown('PublicObligation',$options,'','class="form-control"')
                                    ?>
                                </div>
                                <div class="form-group mr-4">
                                    <label for="">Legend :</label>
                                    <?php
                                    $options=array(
                                        'Sunny'=>'Sunny',
                                        'Cloudy'=>'Cloudy',
                                        'Rainy'=>'Rainy',
                                    );
                                        echo form_dropdown('Legend',$options,'','class="form-control"')
                                    ?>
                                </div>
                        </div> 
                    
                </div>
                <!-- ----------- working condition close-------------- -->
                <!-- ----------- Staff tab open-------------- -->

                <div class="tab-pane fade show" id="nav-Staff" role="tabpanel" aria-labelledby="nav-Staff-tab">
                    <table class="table" cellspacing="0">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Designation</th>
                                <th>Nos</th>
                                <?php if($this->session->userdata('status')=='admin'){ ?>
                                    <th>Action</th>
                                <?php } ?>
                            </tr>
                        </thead>
     
                        <tbody>
                        <?php
                        $snStaff=1;
                         
                        foreach ($form->result() as $data){
                            if($data->type=="staff"){ ?>
                                <tr>
                                    <td><?php  echo $snStaff ?></td>
                                    <td class="text-primary"><?php echo $data->resource; ?></td>
                                    <td>
                                        <?php echo form_input(['name'=>str_replace(' ','',$data->resource),'type'=>'number']); ?>
                                        <?php echo form_input(['name'=>str_replace(' ','',$data->type),'type'=>'hidden','value'=>$data->type]); ?>
                                    </td>
                                    <?php if($this->session->userdata('status')=='admin'){ ?>
                                    <td>
                                        <a href='<?php echo base_url('index.php/welcome/removeField?rId='.$data->rId) ?>' class="btn btn-danger" role="button">Remove</a>
                                    </td>
                                    <?php } ?>
                                </tr>     
                             <?php 
                             $snStaff++;}
                        }
                        ?>                        
                        </tbody>
                       
                    </table>
                    
                </div>
                <!-- ------------- stafftab close ------------- -->
                <!-- ------------- workmantab Start ----------- -->
                <div class="tab-pane fade" id="nav-workman" role="tabpanel" aria-labelledby="nav-workman-tab">
                    <table class="table" cellspacing="0">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Designation</th>
                                <th>Nos</th>
                                <?php if($this->session->userdata('status')=='admin'){ ?>
                                    <th>Action</th>
                                <?php } ?>
                            </tr>
                        </thead>
    
                        <tbody>
                        <?php
                         
                         $snWorkman=1;
                        foreach ($form->result() as $data){
                            if($data->type=="workman"){ ?>
                                <tr>
                                    <td><?php echo $snWorkman ?></td>
                                    <td class="text-primary"><?php echo $data->resource; ?></td>
                                    <td>
                                    <?php echo form_input(['name'=>str_replace(' ','',$data->resource),'type'=>'number']); ?>
                                    <?php echo form_input(['name'=>str_replace(' ','',$data->type),'type'=>'hidden','value'=>$data->type]); ?>
                                    </td>
                                    <?php if($this->session->userdata('status')=='admin'){ ?>
                                    <td>
                                        <a href='<?php echo base_url('index.php/welcome/removeField?rId='.$data->rId) ?>' class="btn btn-danger" role="button">Remove</a>
                                    </td>
                                    <?php } ?>
                                </tr>     
                            <?php $snWorkman++; }
                            
                        }
                        ?>                        
                        </tbody> 
                    </table>
                </div>
                <!-- workman close -->
                <!-- machinery tab open -->
                <div class="tab-pane fade" id="nav-machinery" role="tabpanel" aria-labelledby="nav-machinery-tab">
                <table class="table" cellspacing="0">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Designation</th>
                                <th>Nos</th>
                                <?php if($this->session->userdata('status')=='admin'){ ?>
                                    <th>Action</th>
                                <?php } ?>
                            </tr>
                        </thead>
    
                        <tbody>
                        <?php
                        $snMachinery=1; 
                        foreach ($form->result() as $data){
                            if($data->type=="machinery"){ ?>
                                <tr>
                                    <td><?php echo $snMachinery ?></td>
                                    <td class="text-primary"><?php echo $data->resource; ?></td>
                                    <td>
                                    <?php echo form_input(['name'=>str_replace(' ','',$data->resource),'type'=>'number']); ?>
                                    <?php echo form_input(['name'=>str_replace(' ','',$data->type),'type'=>'hidden','value'=>$data->type]); ?>
                                    </td>
                                    <?php if($this->session->userdata('status')=='admin'){ ?>
                                    <td>
                                        <a href='<?php echo base_url('index.php/welcome/removeField?rId='.$data->rId) ?>' class="btn btn-danger" role="button">Remove</a>
                                    </td>
                                    <?php } ?>
                                </tr>     
                            <?php $snMachinery++; }
                            
                        }
                        ?>                        
                        </tbody> 
                    </table>
                </div>
                <!-- machinery close -->
                <!-- materials tab open -->
                <div class="tab-pane fade" id="nav-materials" role="tabpanel" aria-labelledby="nav-materials-tab">
                <table class="table" cellspacing="0">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Designation</th>
                                <th>Nos</th>
                                <?php if($this->session->userdata('status')=='admin'){ ?>
                                    <th>Action</th>
                                <?php } ?>
                            </tr>
                        </thead>

                        <tbody>
                        <?php
                        $snMaterials=1; 
                        foreach ($form->result() as $data){
                            if($data->type=="materials"){ ?>
                                <tr>
                                    <td><?php echo $snMaterials ?></td>
                                    <td class="text-primary"><?php echo $data->resource; ?></td>
                                    <td>
                                    <?php echo form_input(['name'=>str_replace(' ','',$data->resource),'type'=>'number']); ?>
                                    <?php echo form_input(['name'=>str_replace(' ','',$data->type),'type'=>'hidden','value'=>$data->type]); ?>
                                    </td>
                                    <?php if($this->session->userdata('status')=='admin'){ ?>
                                    <td>
                                        <a href='<?php echo base_url('index.php/welcome/removeField?rId='.$data->rId) ?>' class="btn btn-danger" role="button">Remove</a>
                                    </td>
                                    <?php } ?>
                                </tr>     
                            <?php $snMaterials++; }
                            
                        }
                        ?>                        
                        </tbody> 
                    </table>
                </div>
                <!-- materials close -->
                <!-- tools tab open -->
                <div class="tab-pane fade" id="nav-tools" role="tabpanel" aria-labelledby="nav-tools-tab">
                <table class="table" cellspacing="0">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Designation</th>
                                <th>Nos</th>
                                <?php if($this->session->userdata('status')=='admin'){ ?>
                                    <th>Action</th>
                                <?php } ?>
                            </tr>
                        </thead>
    
                        <tbody>
                        <?php
                        $snTools=1; 
                        foreach ($form->result() as $data){
                            if($data->type=="tools"){ ?>
                                <tr>
                                    <td><?php echo $snTools ?></td>
                                    <td class="text-primary"><?php echo $data->resource; ?></td>
                                    <td>
                                    <?php echo form_input(['name'=>str_replace(' ','',$data->resource),'type'=>'number']); ?>
                                    <?php echo form_input(['name'=>str_replace(' ','',$data->type),'type'=>'hidden','value'=>$data->type]); ?>
                                    </td>
                                    <?php if($this->session->userdata('status')=='admin'){ ?>
                                    <td>
                                        <a href='<?php echo base_url('index.php/welcome/removeField?rId='.$data->rId) ?>' class="btn btn-danger" role="button">Remove</a>
                                    </td>
                                    <?php } ?>
                                </tr>     
                            <?php $snTools++; }
                            
                        }
                        ?>                        
                        </tbody> 
                    </table>
                </div>
                <!-- tools close -->
                <!-- equipment tab open -->
                <div class="tab-pane fade" id="nav-equipment" role="tabpanel" aria-labelledby="nav-equipment-tab">
                <table class="table" cellspacing="0">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Designation</th>
                                <th>Nos</th>
                                <?php if($this->session->userdata('status')=='admin'){ ?>
                                    <th>Action</th>
                                <?php } ?>
                            </tr>
                        </thead>
    
                        <tbody>
                        <?php
                        $snEquipment=1; 
                        foreach ($form->result() as $data){
                            if($data->type=="equipment"){ ?>
                                <tr>
                                    <td><?php echo $snEquipment ?></td>
                                    <td class="text-primary"><?php echo $data->resource; ?></td>
                                    <td>
                                    <?php echo form_input(['name'=>str_replace(' ','',$data->resource),'type'=>'number']); ?>
                                    <?php echo form_input(['name'=>str_replace(' ','',$data->type),'type'=>'hidden','value'=>$data->type]); ?>
                                    </td>
                                    <?php if($this->session->userdata('status')=='admin'){ ?>
                                    <td>
                                        <a href='<?php echo base_url('index.php/welcome/removeField?rId='.$data->rId) ?>' class="btn btn-danger" role="button">Remove</a>
                                    </td>
                                    <?php } ?>
                                </tr>     
                            <?php  $snEquipment++; }
                           
                        }
                        ?>                        
                        </tbody> 
                    </table>
                    
                </div>
                <!-- equipment close -->
                <!-- Work Activities open -->
                <div class="tab-pane fade" id="nav-work_activities" role="tabpanel" aria-labelledby="nav-work_activities-tab">
                <table class="table" cellspacing="0">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Billing Item No</th>
                                <th>Description Of Work</th>
                                <th>Remarks</th>
                                <th id="addRow">Add +</th>
                            </tr>
                        </thead>
                        
                        <tbody id="row">
                            <tr  >
                            
                                <td>1</td>
                                <td><?php echo form_input(['name'=>'BillingItemNo1','type'=>'text']); ?></td>
                                <td><?php echo form_input(['name'=>'DescriptionOfWork1','type'=>'text']); ?></td>
                                <td><?php echo form_input(['name'=>'Remark1','type'=>'text']); ?></td>
                                
                                <td class="lead"></td>
                            </tr> 
                                              
                        </tbody> 
                        <input name="rowCount" type="hidden" value="1" id='count'>
                    </table>
                    <div class="form-group ml-3">
                        <?php echo form_submit(['name'=>'submit','class'=>'btn btn-primary','value'=>'Submit','type'=>'submit' ]);?>
                    </div> 
                </div> 
                <!-- Work Activities close -->
            </div>
            <?php echo form_input(['name'=>'currentUrl','class'=>'form-control','value'=>uri_string().'?'.$_SERVER['QUERY_STRING'],'type'=>'hidden']);?>
            <?php echo form_close();?>
        </div>
    </div>   
</div>

<!--  -->

<script>
    var sn=2;
        $('#addRow').click(function(){
            var row = `<tr>
                            <td>`+sn+`</td>
                            <td><input name="BillingItemNo`+sn+`" type="text"></td>
                            <td><input name="DescriptionOfWork`+sn+`" type="text"></td>
                            <td><input name="Remark`+sn+`" type="text"></td>
                            
                        </tr>`;
            $('#row').append(row)
            $('#count').val(sn)
            
            sn++
            
        })
</script>
<?php $this->load->view('template/footer');?>