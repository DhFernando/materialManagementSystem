
<?php $this->load->view('template/header'); ?>
<div class="container">

    <h1>Projects</h1>
    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <?php $projectArray=array() ?> 
                <div class="form-group mr-4">
                    <label for="">All Sites :</label><br>
                    <ol>
                        <?php foreach($sitesArray as $sites){ ?>  
                            <?php if($sites['areaName']=="maligawatta pumping staiton") { ?>
                                <li><a href="<?php echo base_url('index.php/welcome/form?siteId=1&areaName='.$sites['areaName'])?>"><?php echo $sites['areaName'] ?></a></li>
                            <?php }else{ ?>
                                    <li><?php echo $sites['areaName'] ?></li>
                                    <?php foreach($sites['subSites'] as $sites) { ?>
                                        <?php if($sites['areaName']=="maligawatta pumping staiton") { ?>
                                        <?php }else{ ?>
                                            <ul>
                                                <li>
                                                    <a href="<?php echo base_url('index.php/welcome/form?siteId='.$sites['siteId'].'&areaName='.$sites['areaName'].'&siteReference='.$sites['siteReference'].'&areaReference='. $sites['areaReference'].'&roadReference='.$sites['roadReference'].'&pavingType='.$sites['pavingType']) ?>">
                                                        <?php echo $sites['areaReference']." -> ". $sites['roadReference']." -> ". $sites['siteReference']  ?>
                                                    </a>
                                                </li>
                                            </ul>
                                        <?php }?>
                                    <?php } ?>
                                <?php }?>
                        <?php } ?>     
                    </ol>     
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('template/footer');?>

