<?php

	$user_id         		=$this->session->userdata('user_id');
	$user_name         		=$this->session->userdata('user_name');
	$phone_no         		=$this->session->userdata('phone_no');
	$user_img         		=$this->session->userdata('user_img');
	$sex         			=$this->session->userdata('sex');
	$age         			=$this->session->userdata('age');
	$email         			=$this->session->userdata('email');
	$full_name         		=$this->session->userdata('full_name');
	$user_status         	=$this->session->userdata('status');
    $validation             =$this->session->userdata('validation');



    /*site detial*/
    $get_site_email				= $this->Action->get_site_email();

	$get_site_name          = $this->Action->get_site_name();
	$get_site_g_name        = $this->Action->get_site_g_name();
	$get_site_g_pass        = $this->Action->get_site_g_pass();
    $get_site_logo          = $this->Action->get_site_logo();
    $get_site_phone         = $this->Action->get_site_phone();


    $active     ='active';

?>
<header class="main-header bg-light-2 box-shadow-1">

        <!-- TOGGLE -->
        <a href="#" class="nav-link nav-menu-main menu-toggle btn btn-base rounded-0">
            <i class="fa fa-bars"></i>
        </a>
        <!-- /TOGGLE -->

        <!-- TOPBAR -->
        <div class="inner-header d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-2">
                        <!-- LOGO -->
                        <a class="navbar-brand logo" href="<?php echo base_url();?>Welcome">
                            <img class="full-width max-width-130-sm" style="height:55px;" src="<?php echo base_url();?>project_dir/<?php echo $get_site_logo;?>">
                        </a>
                        <!-- /LOGO -->
                    </div>
                    <div class="col-lg-10 col-md-9 col-sm-8 text-right">
                        <div class="extra-info">
                            <ul>
                                <li class="m-top-5 hidden-xs hidden-sm hidden-md">
                                    <i class="fa fa-phone text-base text-size-30"></i>
                                    <div class="text">
                                        <div class="text-top text-weight-400 text-muted text-size-13">
                                            CALL US
                                        </div>
                                        <div class="text-bottom text-bold-700 text-black">
                                            <?php echo $get_site_phone;?>
                                        </div>
                                    </div>
                                </li>
                                <li class="m-top-5 hidden-xs hidden-sm hidden-md">
                                    <i class="fa fa-envelope-o text-base text-size-30"></i>
                                    <div class="text">
                                        <div class="text-top text-bold-400 text-muted text-size-13">
                                            EMAIL US
                                        </div>
                                        <div class="text-bottom text-bold-700 text-black">
                                            <?php echo $get_site_email;?>
                                        </div>
                                    </div>
                                </li>
                                
                                <li class="hidden-xs hidden-sm">
                                    <a href="<?php echo base_url();?>Welcome/add_property" class="btn btn-base rounded-0 text-bold-600 text-spacing-5 text-uppercase text-size-13 p-top-12 p-bottom-12 p-left-15 p-right-15 text-size-11-lg">Submit Property</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /TOPBAR -->

        <!-- NAVIGATION -->
        <div role="navigation" data-menu="menu-wrapper" class="header-navbar navbar bg-base-dark navbar-fixed box-shadow-3">
            
            <!-- MENU CONTENT -->
            <div data-menu="menu-container" class="container navbar-container main-menu-content">

                <ul id="main-menu-navigation" data-menu="menu-navigation" class="nav navbar-nav">
                    <li data-menu="dropdown" class="dropdown nav-item 
                            <?php 
                                if($this->uri->segment(1) == 'Welcome'){
                                    if($this->uri->segment('2') == ''){
                                        echo $active;
                                    }else if($this->uri->segment(2) == 'index'){
                                        echo $active;
                                    }else{
                                        echo $active;
                                    }
                                }
                            ?>
                    ">
                        <a href="<?php echo base_url();?>Welcome" class="nav-link"><i class="fa fa-home"></i> <span>Home</span></a>
                       
                    </li>

                    <li data-menu="dropdown" class="dropdown nav-item
                            <?php 
                                if($this->uri->segment(1) == 'Rent'){
                                    if($this->uri->segment(2) == 'index'){
                                        echo $active;
                                    }else{
                                        echo $active;
                                    }
                                    
                                }
                            ?>
                    ">
                        <a href="<?php echo base_url();?>Rent" class="nav-link"><i class="fa fa-building-o"></i> <span>Rent Property</span></a>
                       
                    </li>
                    <li data-menu="" class="nav-item
                            <?php 
                                if($this->uri->segment(1) == 'Buy'){
                                    if($this->uri->segment(2) == 'index'){
                                        echo $active;
                                    }else{
                                        echo $active;
                                    }
                                    
                                }
                            ?>
                    ">
                        <a href="<?php echo base_url();?>Buy" class="nav-link"><i class="fa fa-id-badge"></i> <span>Buy Property</span></a>
                       
                    </li>
                    <li class="dropdown nav-item
                            <?php 
                                if($this->uri->segment(1) == 'Agents'){
                                    if($this->uri->segment(2) == 'index'){
                                        echo $active;
                                    }else{
                                        echo $active;
                                    }
                                    
                                }
                            ?>     
                    ">
                        <a href="<?php echo base_url();?>Agents" class="nav-link"><i class="fa fa-users"></i> <span>Agents</span></a>
                       
                    </li>
                    <!-- <li data-menu="dropdown" class="dropdown nav-item">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link"><i class="fa fa-building-o"></i><span>Properties</span></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="property-designs.html" class="dropdown-item">Property - Designs</a>
                            </li>
                            <li>
                                <a href="property-grid.html" class="dropdown-item">Property - Grid</a>
                            </li>
                            <li>
                                <a href="property-fullwidth.html" class="dropdown-item">Property - Fullwidth</a>
                            </li>
                            <li>
                                <a href="property-sidebar.html" class="dropdown-item">Property - Sidebar</a>
                            </li>
                            <li>
                                <a href="single-property.html" class="dropdown-item">Single Property</a>
                            </li>
                        </ul>
                    </li>
                 -->

                    <!-- <li data-menu="dropdown" class="dropdown nav-item
                            <?php 
                                if($this->uri->segment(1) == 'News'){
                                    if($this->uri->segment(2) == 'index'){
                                        echo $active;
                                    }else{
                                        echo $active;
                                    }
                                    
                                }
                            ?>
                    ">
                        <a href="#" class="nav-link"><i class="fa fa-commenting-o"></i> <span>News</span></a>
                       
                    </li> -->
                    <li data-menu="dropdown" class="dropdown nav-item">
                        <a href="<?php echo base_url();?>Login" class="nav-link" style="margin-top:11%;"> <span>Login</span></a>
                       
                    </li>
                    <li data-menu="dropdown" class="dropdown nav-item">
                        <a href="<?php echo base_url();?>Register" class="nav-link" style="margin-top:11%;"> <span>Register</span></a>
                       
                    </li>

                    <?php if($validation){?>

                    <li data-menu="dropdown" class="dropdown nav-item">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link"><i class="fa fa-building-o"></i><span>Account</span></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="<?php echo base_url();?>Profile/view_user/<?php echo $user_id;?>" class="dropdown-item">Profile</a>
                            </li>
                            <?php if($user_status == 'user'){?>
                            <li>
                                <a href="<?php echo base_url();?>Dashboard/view_favourite" class="dropdown-item">Favourite</a>
                            </li>
                            <?php }?>
                        </ul>
                    </li>

                    <?php } ?>
                
                
                </ul>

            </div>
            <!-- /MENU CONTENT -->

        </div>
        <!-- /NAVIGATION -->

    </header>