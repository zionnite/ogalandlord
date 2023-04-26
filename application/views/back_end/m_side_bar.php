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
            <a href="<?php echo base_url();?>Admin_panel/mlm_dashboard">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>

        </li>

        <li class="menu-label">Manage User</li>


        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='lni lni-users'></i></div>
                <div class="menu-title">Users</div>
            </a>
            <ul>
                <li> <a href="<?php echo base_url();?>Admin_panel/add_mlm_user"><i class="bx bx-right-arrow-alt"></i>Add
                        New User</a></li>

                <li> <a href="<?php echo base_url();?>Admin_panel/view_mlm_users"><i
                            class="bx bx-right-arrow-alt"></i>View All User</a></li>




            </ul>
        </li>





        <li>
            <a href="<?php echo base_url();?>Admin_panel/view_landlocation">
                <div class="parent-icon"><i class="fadeIn animated lni lni-island"></i>
                </div>
                <div class="menu-title">Manage Land Location</div>
            </a>
        </li>



        <li>
            <a href="<?php echo base_url();?>Admin_panel/subscription_plan">
                <div class="parent-icon"><i class="fadeIn animated lni lni-page-break"></i>
                </div>
                <div class="menu-title">Manage Plan</div>
            </a>
        </li>

        <li class="menu-label">Manage Transaction</li>
        <li>
            <a href="<?php echo base_url();?>Admin_panel/transaction">
                <div class="parent-icon"><i class='lni lni-stats-up'></i>
                </div>
                <div class="menu-title">Payout</div>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url();?>Admin_panel/subscription_transaction">
                <div class="parent-icon"><i class='lni lni-stats-up'></i>
                </div>
                <div class="menu-title">Subscription </div>
            </a>
        </li>

    </ul>
    <!--end navigation-->
</div>