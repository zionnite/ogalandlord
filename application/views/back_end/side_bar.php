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
	$admin_status			= $this->session->userdata('admin_status');
    $validation             =$this->session->userdata('validation');



    /*site detial*/
    $get_site_email				= $this->Action->get_site_email();

	$get_site_name          = $this->Action->get_site_name();
	$get_site_g_name        = $this->Action->get_site_g_name();
	$get_site_g_pass        = $this->Action->get_site_g_pass();
    $get_site_logo          = $this->Action->get_site_logo();
    $get_site_logo_2        = $this->Action->get_site_logo_2();
    $get_site_phone         = $this->Action->get_site_phone();

	$count_unread_request	= $this->Request_db->count_unread_request($user_id);
	$count_pending_property	= $this->Admin_db->count_all_property('pending');
	$count_user_rejected_property	= $this->Admin_db->count_unapprove_property($user_id);

?>

<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="<?php echo base_url();?>project_dir/<?php echo $get_site_logo_2;?>" class="logo-icon">
        </div>
        <div>
            <h4 class="logo-text"><?php echo $get_site_name;?></h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i></div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="<?php echo base_url();?>Dashboard">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>

        </li>



        <?php
		if($user_status == 'agent' || $user_status == 'landlord'){
		?>
        <li class="menu-label">Manage Properties</li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-cart'></i>
                </div>
                <div class="menu-title">Property
                    <?php if($count_user_rejected_property > 0){?>
                    <span class="badge bg-danger">
                        <?php echo $count_user_rejected_property;?> Rejected
                    </span>
                    <?php }?>
                </div>
            </a>
            <ul>
                <li> <a href="<?php echo base_url();?>Property/add"><i class="bx bx-right-arrow-alt"></i>Add Propety</a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>Property">
                        <i class="bx bx-right-arrow-alt"></i>View Property
                        <?php if($count_user_rejected_property > 0){?>
                        <span class="badge bg-danger">
                            <?php echo $count_user_rejected_property;?> Rejected
                        </span>
                        <?php }?>

                    </a>
                </li>

            </ul>
        </li>

        <?php }else if($user_status == 'promoter'){ ?>
        <li class="menu-label">View Properties</li>

        <li>
            <a href="<?php echo base_url();?>Product/view_all_property">
                <div class="parent-icon"><i class='bx bx-cart'></i>
                </div>
                <div class="menu-title">View Property</div>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url();?>Product/product_promoting">
                <div class="parent-icon"><i class='lni lni-magnet'></i>
                </div>
                <div class="menu-title">Promoting Property</div>
            </a>
        </li>

        <?php }else if($user_status == 'm_user'){?>
        <li class="menu-label">View Subscription</li>


        <li>
            <a href="<?php echo base_url();?>Subscription/view_plan">
                <div class="parent-icon"><i class='bx bx-cart'></i>
                </div>
                <div class="menu-title">View Subscription</div>
            </a>
        </li>

        <li>
            <a href="<?php echo base_url();?>Subscription/my_plan">
                <div class="parent-icon"><i class='lni lni-package'></i>
                </div>
                <div class="menu-title">My Plan</div>
            </a>
        </li>

        <li>
            <a href="<?php echo base_url();?>Subscription/downline">
                <div class="parent-icon"><i class='lni lni-users'></i>
                </div>
                <div class="menu-title">View Downline</div>
            </a>
        </li>
        <li class="menu-label">View Transaction</li>
        <li>
            <a href="<?php echo base_url();?>Subscription/transaction">
                <div class="parent-icon"><i class='lni lni-package'></i>
                </div>
                <div class="menu-title">Payout Transaction</div>
            </a>
        </li>

        <?php }else if($user_status == 'admin' || $user_status == 'super_admin'){?>



        <li class="menu-label">Manage Properties</li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-cart'></i>
                </div>
                <div class="menu-title">Property
                    <?php if($count_pending_property > 0){?>
                    <span class="badge bg-danger"><?php echo $count_pending_property;?></span>
                    <?php }?>
                </div>
            </a>
            <ul>
                <li> <a href="<?php echo base_url();?>Admin_panel/view_all_property"><i
                            class="bx bx-right-arrow-alt"></i>View All Propety</a></li>
                <li> <a href="<?php echo base_url();?>Admin_panel/view_all_pending_property"><i
                            class="bx bx-right-arrow-alt"></i>Pending Property
                        <?php if($count_pending_property > 0){?>
                        &nbsp;<span class="badge bg-danger"><?php echo $count_pending_property;?></span>
                        <?php }?></a>
                </li>
                <li> <a href="<?php echo base_url();?>Admin_panel/view_all_approve_property"><i
                            class="bx bx-right-arrow-alt"></i>Approved Property</a></li>
                <li> <a href="<?php echo base_url();?>Admin_panel/view_all_unapprove_property"><i
                            class="bx bx-right-arrow-alt"></i>Rejected Property</a></li>

            </ul>
        </li>

        <li>
            <a href="<?php echo base_url();?>Admin_panel/reported_property">
                <div class="parent-icon"><i class="fadeIn animated bx bx-message-square-error"></i>
                </div>
                <div class="menu-title">Reported Property</div>
            </a>
        </li>


        <li class="menu-label">Manage Users</li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-user'></i>
                </div>
                <div class="menu-title">Manage User</div>
            </a>
            <ul>
                <li> <a href="<?php echo base_url();?>Admin_panel/view_all_users"><i
                            class="bx bx-right-arrow-alt"></i>View All Users</a></li>
                <li> <a href="<?php echo base_url();?>Admin_panel/view_all_agents"><i
                            class="bx bx-right-arrow-alt"></i>View All Landlord & Agent</a></li>

            </ul>
        </li>

        <?php }?>




        <?php if(!$admin_status){?>

        <?php if($user_status =='user'){?>
        <li>
            <a href="<?php echo base_url();?>Dashboard/view_favourite">
                <div class="parent-icon"><i class="fadeIn animated bx bx-heart"></i>
                </div>
                <div class="menu-title">Favourite</div>
            </a>
        </li>


        <li>
            <a href="<?php echo base_url();?>Wallet">
                <div class="parent-icon"><i class="fadeIn animated bx bx-wallet-alt"></i>
                </div>
                <div class="menu-title">Wallet</div>
            </a>
        </li>
        <?php }?>

        <?php }?>

        <?php 
            if($admin_status || $user_status =='agent' || $user_status == 'landlord' || $user_status == 'promoter' || $user_status == 'user'){
        ?>

        <li class="menu-label">Manage Transaction</li>
        <li>
            <a href="<?php echo base_url();?>Transaction">
                <div class="parent-icon"><i class='lni lni-stats-up'></i>
                </div>
                <div class="menu-title">Transactions</div>
            </a>
        </li>
        <?php 
            }
        ?>


        <?php 
            if($admin_status || $user_status =='agent' || $user_status == 'landlord'){
        ?>
        <li>
            <a href="<?php echo base_url();?>Request">
                <div class="parent-icon"><i class='lni lni-paint-bucket'></i>
                </div>
                <div class="menu-title">Request
                    <?php 
                        if(($admin_status || $user_status =='agent' || $user_status == 'landlord') && $count_unread_request > 0){
                    ?>
                    <span class="badge bg-danger"><?php echo $count_unread_request;?></span>
                    <?php 
                        }
                    ?>
                </div>
            </a>
        </li>
        <?php 
            }
        ?>




        <?php if($admin_status){?>
        <li class="menu-label">Manage Site Setting</li>

        <li>
            <a href="<?php echo base_url();?>Admin_panel/view_bank_list">
                <div class="parent-icon"><i class="fadeIn animated bx bx-door-open"></i>
                </div>
                <div class="menu-title">View Bank List</div>
            </a>
        </li>

        <li>
            <a href="<?php echo base_url();?>Admin_panel/view_state_list">
                <div class="parent-icon"><i class="fadeIn animated bx bx-window-alt"></i>
                </div>
                <div class="menu-title">View State List</div>
            </a>
        </li>


        <li>
            <a href="<?php echo base_url();?>Admin_panel/view_property_types">
                <div class="parent-icon"><i class="fadeIn animated bx bx-window-alt"></i>
                </div>
                <div class="menu-title">View Property List</div>
            </a>
        </li>

        <li>
            <a href="<?php echo base_url();?>Admin_panel/view_partners">
                <div class="parent-icon"><i class="fadeIn animated bx bx-window-alt"></i>
                </div>
                <div class="menu-title">View Partners</div>
            </a>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-cog'></i></div>
                <div class="menu-title">Site Setting</div>
            </a>
            <ul>
                <li> <a href="<?php echo base_url();?>Admin_panel/update_site_logos"><i
                            class="bx bx-right-arrow-alt"></i>Update Site Logo</a></li>
                <li> <a href="<?php echo base_url();?>Admin_panel/update_site_detail"><i
                            class="bx bx-right-arrow-alt"></i>Update Site Detail</a></li>
                <li> <a href="<?php echo base_url();?>Admin_panel/update_payment_api"><i
                            class="bx bx-right-arrow-alt"></i>Update Payment API</a></li>
                <li> <a href="<?php echo base_url();?>Admin_panel/update_payment_commission"><i
                            class="bx bx-right-arrow-alt"></i>Update Payment Commission</a></li>
                <li> <a href="<?php echo base_url();?>Admin_panel/update_social_link"><i
                            class="bx bx-right-arrow-alt"></i>Update Social Link</a></li>

            </ul>
        </li>


        <?php if($user_status =='super_admin'){?>
        <li class="menu-label">Manage Admin</li>

        <li>
            <a href="<?php echo base_url();?>Admin_panel/view_manager">
                <div class="parent-icon"><i class="fadeIn animated bx bx-window-alt"></i>
                </div>
                <div class="menu-title">View Manager</div>
            </a>
        </li>


        <?php }?>
        <?php }?>
    </ul>
    <!--end navigation-->
</div>