<aside>
    <div class="sidebar left fixed-top " style="height:100%;">
        <div class="user-panel text-light text-center" style="margin-top:-10px ;">
            <h4 style="margin-bottom:-5px">Sun Power</h4>
        </div>
        <div class="user-panel" style="margin-top:-30px;">
            <div class="pull-left image">
                <img src="http://via.placeholder.com/160x160" class="rounded-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><small><?php echo ucfirst($this->session->userdata('userName')); ?></small></p>
                <?php if($this->session->userdata('loggedIn')){ ?>
                    <p href="#"><i class="fa fa-circle text-success"></i> Logged in</p>
                <?php }else{ ?>
                    <p href="#"><i class="fa fa-circle text-danger"></i> Logged out</p>
                <?php } ?>
            </div>
        </div>
        <ul class="list-sidebar bg-defoult">
        <li class="nav-item active"><a href='<?php echo base_url('index.php/welcome/home')?>' class="collapsed active">Home</a></li>
            <?php if($this->session->userdata('loggedIn')){ ?>
                <li><a class="collapsed active" href='<?php echo base_url('index.php/welcome/sites')?>' >Projects</a></li>
                <li><a href='<?php echo base_url('index.php/welcome/ReportGenerator')?>' class="collapsed active" >Project Reports</a></li>
                <li> <a href="<?php echo base_url('index.php/controller2/newProject') ?>" class="collapsed active"><span class="nav-label">Create Project</span> </a></li> 
            <?php } ?>
            <?php 
                if(!$this->session->userdata('loggedIn')){ ?>
                    <li class="nav-item"><a class="collapsed active" data-toggle="modal" data-target="#logIn">LogIn</a></li>
                <?php }else{ ?>
                    <li class="nav-item"><a href='<?php echo base_url('index.php/welcome/logout')?>' class="collapsed active">Log Out</a></li>
            <?php }?> 
            
            
        </ul>
    </div>
</aside>