
<?php $this->load->view('template/header'); ?>
<?php if(!$this->session->userdata('loggedIn')){
    redirect('welcome/home');
}?>

<div class="container">
    <?php foreach($types as $type){ ?>
        <div class="row">
            <div class="col-md-12">
                <h5><?php echo ucfirst($type).' Report From '.$dateFrom.' To '.$dateTo?></h5>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <table class="table" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <?php $columns=array()?>
                                        <th>Area Reference</th>
                                        <th>Road Reference </th>
                                        <th>Site Reference</th>
                            <?php foreach($results as $data){ ?>
                                <?php if($data['type']==$type){ ?>
                                        <th id='<?php echo str_replace(' ','',$data['resource']) ?>'><?php echo $data['resource'] ?></th>                    
                                        <?php array_push($columns,$data['resource']) ?>
                                <?php } ?>  
                            <?php } ?>  
                        </tr>
                    </thead>
                    <tbody> 
                        <?php foreach($rowDatas as $data){ ?>
                            <?php if(in_array($type, $data['types'])){ ?>
                                
                                    <?php foreach($data['areaReference'] as $data1) { ?>
                                            <?php foreach($data1['roadReference'] as $data2){ ?>
                                                <?php foreach($data2['siteReference'] as $data3){ ?>
                                                    <tr>
                                                        <td><?php echo $data3['date'] ?></td>
                                                        <td><?php echo $data3['areaReference'] ?></td>
                                                        <td><?php echo $data3['roadReference'] ?></td>
                                                        <td><?php echo $data3['siteReference'] ?></td>
                                                        <?php $temp = 0 ; ?>
                                                        <?php foreach($data3['other'] as $data4){ ?>

                                                            <?php if(count($data3['other']) == count($columns)){ ?>
                                                                <?php $key = array_search($data4['resource'],$columns) ?>
                                                                <?php if($key == $temp){ ?>
                                                                    <td><?php echo $data4['qty']; ?></td>
                                                                <?php }else{ ?>
                                                                    <td>#</td>
                                                                <?php } ?>
                                                                <?php 
                                                                    if($temp==count($columns)){
                                                                        $temp = 0;
                                                                    }else{
                                                                        $temp++;
                                                                    }
                                                                ?>
                                                                
                                                                <?php }else{ ?>
                                                <?php $deff = (count($columns)-count($data3['other'])); ?>
                                                <?php $key = array_search($data4['resource'],$columns) ?>
                                                    <?php if($key == $temp){ ?>
                                                        <td><?php echo $data4['qty']; ?></td>
                                                    <?php }else{ ?>
                                                        <td>#</td>
                                                    <?php } ?>
                                                    <?php $temp++;
                                                        if($temp==count($data3['other'])){
                                                            for($x=0;$x<$deff;$x++){ ?>
                                                                <?php if($key == $temp){ ?>
                                                                    <td><?php echo $data4['qty']; ?></td>
                                                                <?php }else{ ?>
                                                                    <td>#</td>
                                                                <?php } 
                                                                $temp++;
                                                                ?>
                                                            <?php }
                                                            $temp = 0;
                                                        }
                                                    ?>
                                            <?php } ?>

                                                            
                                                        <?php } ?>
                                                    </tr>
                                                <?php } ?>
                                            <?php } ?>
                                    <?php } ?>
                            <?php } ?>  
                        <?php } ?>                        
                        <tr>
                            <td><h5>Total</h5></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <?php foreach($results as $data){ ?>
                                <?php if($data['type']==$type){ ?>
                                        <td><h5><?php echo $data['total'] ?></h5></td>                    
                                <?php } ?>     
                            <?php } ?>
                        </tr>               
                    </tbody> 
                </table>
            </div>
        </div>
    <?php } ?>
</div>
<?php $this->load->view('template/footer');?>