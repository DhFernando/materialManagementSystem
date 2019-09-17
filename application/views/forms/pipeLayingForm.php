
<?php $this->load->view('template/header'); ?>
<?php if(!$this->session->userdata('loggedIn')){
    redirect('welcome/home');
}?>
<!--  -->
<?php $prevUrl= uri_string().'?'.$_SERVER['QUERY_STRING'] ?>
<div class="container">
<div class="row mb-2 ml-0">  
    <div class="col-md-8">
        <h1><?php echo strtoupper($_GET['areaName']) ?></h1>
    </div>
    <div class="col-md-4">
        <a href="" class="btn btn-primary" data-toggle="modal" data-target="#addPipeLayingResouces">Add Resource</a>
        <a href="" class="btn btn-secondary" data-toggle="modal" data-target="#report">Report</a>
    </div>
</div>
<div class="row">
   <div class="col-md-12">
        <p>Area Reference : <?php echo $_GET['areaReference'] ?></p>
        <p>Road Reference : <?php echo $_GET['roadReference'] ?></p>
        <p>Site Reference : <?php echo $_GET['siteReference'] ?></p>
   </div>
</div>

    <div class="row">   
    <div class="col-md-12">
            <nav>
                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-basic-tab" data-toggle="tab" href="#nav-basic" role="tab" aria-controls="nav-basic" aria-selected="true"><img src='<?php echo base_url("assest/img/icons/daily_tasks.png") ?>' style="height:50px;width:50px;"></a>
                    <a class="nav-item nav-link" id="nav-workingProgres-tab" data-toggle="tab" href="#nav-workingProgres" role="tab" aria-controls="nav-workingProgres" aria-selected="false"><img src='<?php echo base_url("assest/img/icons/progress.jpeg") ?>' style="height:50px;width:50px;"></a>
                    <a class="nav-item nav-link" id="nav-manholePlacing-tab" data-toggle="tab" href="#nav-manholePlacing" role="tab" aria-controls="nav-manholePlacing" aria-selected="false"><img src='<?php echo base_url("assest/img/icons/manhole.jpeg") ?>' style="height:50px;width:50px;"></a>
                    <a class="nav-item nav-link" id="nav-workman-tab" data-toggle="tab" href="#nav-workman" role="tab" aria-controls="nav-workman" aria-selected="false"><img src='<?php echo base_url("assest/img/icons/pipe.jpeg") ?>' style="height:50px;width:50px;"></a>
                    <a class="nav-item nav-link" id="nav-machinery-tab" data-toggle="tab" href="#nav-machinery" role="tab" aria-controls="nav-machinery" aria-selected="false"><img src='<?php echo base_url("assest/img/icons/materials.png") ?>' style="height:50px;width:50px;"></a>
                    <a class="nav-item nav-link" id="nav-materials-tab" data-toggle="tab" href="#nav-materials" role="tab" aria-controls="nav-materials" aria-selected="false"><img src='<?php echo base_url("assest/img/icons/tools.png") ?>' style="height:50px;width:50px;"></a>
                    <a class="nav-item nav-link" id="nav-tools-tab" data-toggle="tab" href="#nav-tools" role="tab" aria-controls="nav-tools" aria-selected="false"><img src='<?php echo base_url("assest/img/icons/workman.png") ?>' style="height:50px;width:50px;"></a>
                    
                    <a class="nav-item nav-link" id="nav-work_activities-tab" data-toggle="tab" href="#nav-work_activities" role="tab" aria-controls="nav-work_activities" aria-selected="false"><img src='<?php echo base_url("assest/img/icons/activities.jpeg") ?>' style="height:50px;width:50px;"></a>
                </div>
            </nav>

                
            <?php echo form_open_multipart('welcome/fromInput?siteId='.$_GET['siteId'].'&areaName='.$_GET['areaName'].'&areaReference='.$_GET['areaReference'].'&roadReference='.$_GET['roadReference'].'&siteReference='.$_GET['siteReference'].'&pavingType='.$_GET['pavingType']);?>

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
                                <label for="">Water Table : </label>
                                    <?php echo form_input(['name'=>'waterTable','class'=>'form-control','type'=>'text',]); ?>
                                </div>
                                <div class="form-group mr-4">
                                    <label for="">Ground Condition :</label>
                                    <?php
                                    $options=array(
                                        'Rocky'=>'Rocky',
                                        'Hard'=>'Hard',
                                        'Normal'=>'Normal',
                                        'Soft'=>'Soft',
                                        'Loose'=>'Loose',
                                    );
                                        echo form_dropdown('groundCondition',$options,'','class="form-control"')
                                    ?>
                                </div>
                                
                                <div class="form-group mr-4">
                                    <label for="">Rain Fall :</label>
                                    <?php
                                    $options=array(
                                        'Yes'=>'Yes',
                                        'No'=>'No',
                                    );
                                        echo form_dropdown('rainFall',$options,'','class="form-control"')
                                    ?>
                                </div>
                                
                        </div> 
                    
                </div>
                <!-- ----------- working condition close-------------- -->
                <!-- ----------- workingProgres tab open-------------- -->

                <div class="tab-pane fade show" id="nav-workingProgres" role="tabpanel" aria-labelledby="nav-workingProgres-tab">
                    <table class="table" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Key Activity</th>
                                <th>Complete %</th>
                                <th>Progress Photos</th>
                                <th>Action</th>
                                
                            </tr>
                        </thead>    
                        <tbody>
                        <?php foreach($form->result() as $formData){ ?>
                            <?php if($formData->type == 'keyActivity' ){ ?>
                                <tr>
                                    <td><?php echo $formData->resource ?></td>
                                    <td>
                                        <div class="form-group mr-2">
                                            <?php echo form_input(['name'=>str_replace(' ','',$formData->resource),'class'=>'form-control','type'=>'number']);?> 
                                            <?php echo form_input(['name'=>str_replace(' ','',$formData->type),'type'=>'hidden','value'=>$formData->type]); ?>        
                                        </div>
                                    </td>
                                    <td></td>
                                    
                                    <td><a href='<?php echo base_url('index.php/welcome/removeField?rId='.$formData->rId.'&prevUrl='.$prevUrl) ?>' class="btn btn-danger">Remove</a></td>
                                </tr>
                            <?php }?>
                        <?php   } ?>
                             
                        </tbody>
                    </table>

                </div>
                <!-- ------------- workingProgres close ------------- -->
                <!-- manholePlacing open -->
                <div class="tab-pane fade" id="nav-manholePlacing" role="tabpanel" aria-labelledby="nav-manholePlacing-tab"> 
                <table class="table text-center"  cellspacing="0">
                    <thead >
                        <tr >  
                            <th>#</th>
                            <th >MH Type</th>
                            <th >Element Serial</th>
                            <th >Pre-cast Element</th>
                            <th id="addRowHM">+addRow</th>
                        </tr>                    
                    </thead>
                    <tbody id="rowHM">
                        <tr> 
                            <td>1</td>
                            <td><input name="mhType1" type="text"></td>
                            <td><input name="serialNumber1" type="text"></td>
                            <td>
                                <select class="form-control" name="resource1" id="">
                                    <?php foreach($form->result() as $formData){ ?>
                                        <?php if($formData->type == 'issuedByContractor' ){ ?>
                                            <option value='<?php echo $formData->resource ?>'><?php echo $formData->resource ?></option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
                        <tr></tr> 
                    </tbody>
                    <input name="rowCountHM" type="hidden" value="1" id='countHm'>
                </table>
                </div>
                <!-- manholePlacing close -->
                <!-- ------------- workmantab Start ----------- -->
                <div class="tab-pane fade" id="nav-workman" role="tabpanel" aria-labelledby="nav-workman-tab">
                    <div class="row"  >
                    <table class="table text-center" cellspacing="0" style="width:400px">
                        <thead>
                            <tr>
                                <th style="border:1.5px solid rgb(219, 219, 219); padding:0px;  " class="align-middle" rowspan="2">#</th>
                                <th style="border:1.5px solid rgb(219, 219, 219); padding:0px" class="align-middle" rowspan="2">Pipe Serial No</th>
                                <th style="border:1.5px solid rgb(219, 219, 219); padding:0px" class="align-middle" rowspan="2">Pipe Type</th>
                                <th style="border:1.5px solid rgb(219, 219, 219); padding:0px" class="align-middle" rowspan="2">Pipe Length (m)</th>
                                <th style="border:1.5px solid rgb(219, 219, 219); padding:0px" class="align-middle" colspan="4">Chainage</th>
                                <th style="border:1.5px solid rgb(219, 219, 219); padding:0px" class="align-middle" rowspan="2">Bed Type</th>
                                <th style="border:1.5px solid rgb(219, 219, 219); padding:0px" class="align-middle" rowspan="2">Backfill Type</th>
                                <th style="border:1.5px solid rgb(219, 219, 219); padding:0px" class="align-middle" rowspan="2">Temp,Reins Type</th>
                                <th style="border:1.5px solid rgb(219, 219, 219); padding:0px" class="align-middle" rowspan="2">Prmt,Reins Type</th>
                                <th style="border:1.5px solid rgb(219, 219, 219); padding:0px" class="align-middle" rowspan="2" id="addRow">Add +</th>
                            </tr>
                            <tr>
                                <th style="border:1.5px solid rgb(219, 219, 219); padding:0px" class="align-middle" colspan="2">Start</th>
                                <th style="border:1.5px solid rgb(219, 219, 219); padding:0px" class="align-middle" colspan="2">End</th>
                            </tr>
                        </thead>
                            <tbody id="row">
                                <tr>
                                    <td>1</td>
                                    <td style="margin:0px;padding:1px;" ><?php echo form_input(['name'=>'pipeSerialNo1','type'=>'text','class'=>'form-control','style'=>'width:95px;margin:0px']); ?></td>
                                    <td style="margin:0px;padding:1px;"><?php echo form_input(['name'=>'pipeType1','type'=>'text','class'=>'form-control','style'=>'width:95px;margin:0px']); ?></td>
                                    <td style="margin:0px;padding:1px;"><?php echo form_input(['name'=>'pipeLength1','type'=>'number','class'=>'form-control','style'=>'width:95px;margin:0px']); ?></td>
                                    <td style="margin:0px;padding:1px;"><?php echo form_input(['name'=>'startGL1','type'=>'number','class'=>'form-control','style'=>'width:95px;margin:0px']); ?></td>
                                    <td style="margin:0px;padding:1px;"><?php echo form_input(['name'=>'startIL1','type'=>'number','class'=>'form-control','style'=>'width:95px;margin:0px']); ?></td>
                                    <td style="margin:0px;padding:1px;"><?php echo form_input(['name'=>'EndGL1','type'=>'number','class'=>'form-control','style'=>'width:95px;margin:0px']); ?></td>
                                    <td style="margin:0px;padding:1px;"><?php echo form_input(['name'=>'EndIL1','type'=>'number','class'=>'form-control','style'=>'width:95px;margin:0px']); ?></td>
                                    <td style="margin:0px;padding:1px;"><?php echo form_input(['name'=>'bedType1','type'=>'text','class'=>'form-control','style'=>'width:95px;margin:0px']); ?></td>
                                    <td style="margin:0px;padding:1px;"><?php echo form_input(['name'=>'backfillType1','type'=>'text','class'=>'form-control','style'=>'width:95px;margin:0px']); ?></td>
                                    <td style="margin:0px;padding:1px;"><?php echo form_input(['name'=>'tempRainType1','type'=>'text','class'=>'form-control','style'=>'width:95px;margin:0px']); ?></td>
                                    <td style="margin:0px;padding:1px;"><?php echo form_input(['name'=>'prmtReinstType1','type'=>'text','class'=>'form-control','style'=>'width:95px;margin:0px']); ?></td>                                
                                    <td class="lead"></td>
                                </tr> 
                            </tbody> 
                            <input name="rowCount" type="hidden" value="1" id='count'>                   
                    </table>
                    </div>
                </div>
                <!-- workman close -->
                <!-- machinery tab open -->
                <div class="tab-pane fade" id="nav-machinery" role="tabpanel" aria-labelledby="nav-machinery-tab">
                    <div class="row">
                        <div class="col-6">
                            <table class="table text-center" cellspacing="0">
                                <thead >
                                    <tr>
                                        <th>Issued by Contractor</th>
                                        <th>Unit</th>
                                        <th>Gross Qty</th>
                                        <th>Avtion</th>
                                    </tr>    
                                </thead>
                                <tbody>
                                <?php foreach($form->result() as $formData){ ?>
                                    <?php if($formData->type == 'issuedByContractor' ){ ?>
                                        <tr>
                                            <td style="padding:0px" class="align-middle"><?php echo $formData->resource ?></td>
                                            <td style="padding:0px" class="align-middle">          
                                            
                                            </td>
                                            <td style="padding:0px" class="align-middle">
                                                <div class="form-group mr-2">
                                                    <?php echo form_input(['name'=>str_replace(' ','',$formData->resource),'class'=>'form-control','type'=>'number']);?>         
                                                    <?php echo form_input(['name'=>str_replace(' ','',$formData->type),'type'=>'hidden','value'=>$formData->type]); ?>  
                                                </div>
                                            </td>
                                            
                                            <td><a href='<?php echo base_url('index.php/welcome/removeField?rId='.$formData->rId.'&prevUrl='.$prevUrl) ?>' class="btn btn-danger">Remove</a></td>
                                        </tr>
                                    <?php } ?>
                                <?php } ?>
                                </tbody>
                            </table> 
                        </div>
                        <div class="col-6">
                            <table class="table text-center" cellspacing="0">
                                <thead >
                                    <tr>
                                        <th>Supplied by Sub-contractor</th>
                                        <th>Unit</th>
                                        <th>Gross Qty</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($form->result() as $formData){ ?>
                                    <?php if($formData->type == 'suppliedBySubContractor' ){ ?>
                                        <tr>
                                            <td style="padding:0px" class="align-middle"><?php echo $formData->resource ?></td>
                                            <td style="padding:0px" class="align-middle">
                                                
                                            </td>
                                            <td style="padding:0px" class="align-middle">
                                                <div class="form-group mr-2">
                                                    <?php echo form_input(['name'=>str_replace(' ','',$formData->resource),'class'=>'form-control','type'=>'number']);?>         
                                                    <?php echo form_input(['name'=>str_replace(' ','',$formData->type),'type'=>'hidden','value'=>$formData->type]); ?>  
                                                </div>
                                            </td> 
                                            <td><a href='<?php echo base_url('index.php/welcome/removeField?rId='.$formData->rId.'&prevUrl='.$prevUrl) ?>' class="btn btn-danger">Remove</a></td>
                                        </tr>
                                    <?php } ?>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- machinery close -->
                <!-- materials tab open -->
                <div class="tab-pane fade" id="nav-materials" role="tabpanel" aria-labelledby="nav-materials-tab">
                    <div class="row">
                        <div class="col-6">
                            <table class="table text-center" cellspacing="0">
                                <thead >
                                    <tr>
                                        <th>Special Tools & Equipment</th>
                                        <th>Qty</th> 
                                        <th>Action</th>  
                                    </tr>  
                                </thead>
                                <tbody>
                                <?php foreach($form->result() as $formData){ ?>
                                    <?php if($formData->type == 'specialTools&Equipment' ){ ?>
                                        <tr>
                                            <td><?php echo $formData->resource ?></td>
                                            <td>
                                                <div class="form-group mr-2">
                                                    <?php echo form_input(['name'=>str_replace(' ','',$formData->resource),'class'=>'form-control','type'=>'number']);?>         
                                                    <?php echo form_input(['name'=>str_replace(' ','',$formData->type),'type'=>'hidden','value'=>$formData->type]); ?>  
                                                </div>
                                            </td> 
                                            <td><a href='<?php echo base_url('index.php/welcome/removeField?rId='.$formData->rId.'&prevUrl='.$prevUrl) ?>' class="btn btn-danger">Remove</a></td>
                                        </tr>
                                    <?php } ?>
                                <?php } ?>
                                </tbody>
                            </table> 
                        </div>
                        <div class="col-6">
                            <table class="table text-center" cellspacing="0">
                                <thead >
                                    <tr>
                                        <th>Machine</th>
                                        <th>Qty</th> 
                                        <th>Action</th>                                                                      
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($form->result() as $formData){ ?>
                                    <?php if($formData->type == 'machine' ){ ?>
                                        <tr>
                                            <td><?php echo $formData->resource ?></td>
                                            <td>
                                                <div class="form-group mr-2">
                                                    <?php echo form_input(['name'=>str_replace(' ','',$formData->resource),'class'=>'form-control','type'=>'number']);?>         
                                                    <?php echo form_input(['name'=>str_replace(' ','',$formData->type),'type'=>'hidden','value'=>$formData->type]); ?>  
                                                </div>
                                            </td> 
                                            <td><a href='<?php echo base_url('index.php/welcome/removeField?rId='.$formData->rId.'&prevUrl='.$prevUrl) ?>' class="btn btn-danger">Remove</a></td>
                                        </tr>
                                    <?php } ?>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- materials close -->
                <!-- tools tab open -->
                <div class="tab-pane fade" id="nav-tools" role="tabpanel" aria-labelledby="nav-tools-tab">
                    <div class="row">
                        <div class="col-6">
                            <table class="table text-center" cellspacing="0">
                                <thead >
                                    <tr>
                                        <th>Workman</th>
                                        <th>Qty</th>
                                        <th>Action</th>   
                                    </tr>  
                                </thead>
                            </table> 
                            <tbody>
                                <?php foreach($form->result() as $formData){ ?>
                                    <?php if($formData->type == 'workman' ){ ?>
                                        <tr>
                                            <td><?php echo $formData->resource ?></td>
                                            <td>
                                                <div class="form-group mr-2">
                                                    <?php echo form_input(['name'=>str_replace(' ','',$formData->resource),'class'=>'form-control','type'=>'number']);?>         
                                                    <?php echo form_input(['name'=>str_replace(' ','',$formData->type),'type'=>'hidden','value'=>$formData->type]); ?>  
                                                </div>
                                            </td> 
                                            <td><a href='<?php echo base_url('index.php/welcome/removeField?rId='.$formData->rId.'&prevUrl='.$prevUrl) ?>' class="btn btn-danger">Remove</a></td>
                                        </tr>
                                    <?php } ?>
                                <?php } ?>
                                </tbody>
                        </div>
                        <div class="col-6">
                            <table class="table text-center" cellspacing="0">
                                <thead >
                                    <tr>
                                        <th>Staff</th>
                                        <th>Qty</th>
                                        <th>Action</th>                                     
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($form->result() as $formData){ ?>
                                    <?php if($formData->type == 'staff' ){ ?>
                                        <tr>
                                            <td><?php echo $formData->resource ?></td>
                                            <td>
                                                <div class="form-group mr-2">
                                                    <?php echo form_input(['name'=>str_replace(' ','',$formData->resource),'class'=>'form-control','type'=>'number']);?>         
                                                    <?php echo form_input(['name'=>str_replace(' ','',$formData->type),'type'=>'hidden','value'=>$formData->type]); ?>  
                                                </div>
                                            </td> 
                                            <td><a href='<?php echo base_url('index.php/welcome/removeField?rId='.$formData->rId.'&prevUrl='.$prevUrl) ?>' class="btn btn-danger">Remove</a></td>
                                        </tr>
                                    <?php } ?>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- tools close -->
                <!-- equipment tab open -->
                
                <!-- equipment close -->
                <!-- Work Activities open -->
                <div class="tab-pane fade" id="nav-work_activities" role="tabpanel" aria-labelledby="nav-work_activities-tab">
                
                    <div class="form-group ml-3">
                        <?php echo form_submit(['name'=>'submit','class'=>'btn btn-primary','value'=>'Submit','type'=>'submit' ]);?>
                    </div> 
                </div> 
                <!-- Work Activities close -->
            </div>
            <!-- currentUrl open-->
                <?php echo form_input(['name'=>'currentUrl','class'=>'form-control','value'=>uri_string().'?'.$_SERVER['QUERY_STRING'],'type'=>'hidden']);?>
            <!-- get currentUrl close -->
            <?php echo form_close();?>
        </div>
    </div>   
</div>

<!--  -->

<script>
    var sn=2;
    var hm=2;
        $('#addRow').click(function(){
            var row = `<tr>
                            <td>`+sn+`</td>
                            <td style="margin:0px;padding:1px;"><input name="pipeSerialNo`+sn+`" type="text" style="width:95px;margin:0px" class="form-control"></td>
                            <td style="margin:0px;padding:1px;"><input name="pipeType`+sn+`" type="text" style="width:95px;margin:0px" class="form-control"></td>
                            <td style="margin:0px;padding:1px;"><input name="pipeLength`+sn+`" type="number" style="width:95px;margin:0px" class="form-control"></td>
                            <td style="margin:0px;padding:1px;"><input name="startGL`+sn+`" type="number" style="width:95px;margin:0px" class="form-control"></td>
                            <td style="margin:0px;padding:1px;"><input name="startIL`+sn+`" type="number" style="width:95px;margin:0px" class="form-control"></td>
                            <td style="margin:0px;padding:1px;"><input name="EndGL`+sn+`" type="number" style="width:95px;margin:0px" class="form-control"></td>
                            <td style="margin:0px;padding:1px;"><input name="EndIL`+sn+`" type="number" style="width:95px;margin:0px" class="form-control"></td>
                            <td style="margin:0px;padding:1px;"><input name="bedType`+sn+`" type="text" style="width:95px;margin:0px" class="form-control"></td>
                            <td style="margin:0px;padding:1px;"><input name="backfillType`+sn+`" type="text" style="width:95px;margin:0px" class="form-control"></td>
                            <td style="margin:0px;padding:1px;"><input name="tempRainType`+sn+`" type="text" style="width:95px;margin:0px" class="form-control"></td>
                            <td style="margin:0px;padding:1px;"><input name="prmtReinstType`+sn+`" type="text" style="width:95px;margin:0px" class="form-control"></td>   
                        </tr>`;
            $('#row').append(row)
            $('#count').val(sn)
            
            sn++
            
        })

        $('#addRowHM').click(function(){
            var row = `<tr>
                            <td>`+hm+`</td>
                            <td><input name="mhType`+hm+`" type="text"></td>
                            <td><input name="serialNumber`+hm+`" type="text"></td>
                            <td>
                                <select class="form-control" name="resource`+hm+`" >
                                    <?php foreach($form->result() as $formData){ ?>
                                        <?php if($formData->type == 'issuedByContractor' ){ ?>
                                            <option value='<?php echo $formData->resource ?>'><?php echo $formData->resource ?></option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                            </td>  
                        </tr>`;
            $('#rowHM').append(row)
            $('#countHm').val(hm)
            
            hm++
            
        })

        $("#inputResource").click(function(){
            var type = $('#type').val();
            var resource = $('#resource').val();
            var siteId = $('#siteId').val();
            var currentUrl = $('#currentUrl').val();
            var inputResource = $('#inputResource').val();
            $.ajax({
                type:"post",
                url:"<?php echo base_url('index.php') ?>welcome/inputResource",
                data:{
                    type:type,
                    resource:resource,
                    siteId:siteId,
                    currentUrl:currentUrl,
                    inputResource:inputResource
                }
            })

        })
</script>
<?php $this->load->view('template/footer');?>