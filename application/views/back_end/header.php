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

	$count_alert 			= $this->Alert_db->count_my_alert($user_id);
	$count_msg				= $this->Chat_db->count_unread_message($user_id);


	if(strlen($full_name) > 10) {
		$full_name = $full_name.' ';
		$full_name = substr($full_name, 0, 10);
		$full_name = substr($full_name, 0, strrpos($full_name ,' '));
		$full_name = $full_name.'...';
	}
?>

<header>
    <div class="topbar d-flex align-items-center">
        <nav class="navbar navbar-expand">
            <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
            </div>

            <div class="top-menu ms-auto">
                <ul class="navbar-nav align-items-center">

                    <li class="nav-item dropdown dropdown-large">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php if($count_alert > 0){?><span
                                class="alert-count"><?php echo $count_alert;?></span><?php }?>
                            <i class='bx bx-bell'></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="javascript:;">
                                <div class="msg-header">
                                    <p class="msg-header-title">Notification Alert</p>
                                </div>
                            </a>
                            <div class="header-notifications-list">
                                <?php 
											$get_alert 	= $this->Alert_db->get_unread_alert_by_user_id($user_id);
											if(is_array($get_alert)){
												foreach($get_alert as $row){

													$id                 =$row['id'];
                                                    $user_id            =$row['user_id'];
                                                    $sender_id           =$row['sender_id'];
                                                    $msg		        =$row['description'];
                                                    $date_created       =$row['date_created'];
                                                    $time               =$row['time'];
                                                    $read_status        =$row['status'];

													if(strlen($msg) > 20) {
														$msg = $msg.' ';
														$msg = substr($msg, 0, 30);
														$msg = substr($msg, 0, strrpos($msg ,' '));
														$msg = $msg.'...';
													}

													
										?>

                                <a class="dropdown-item" href="javascript:;">
                                    <div class="d-flex align-items-center">

                                        <div class="flex-grow-1">
                                            <p class="msg-info"><?php echo $msg;?><span
                                                    class="msg-time float-end"><?php $this->Admin_db->time_stamp($time);?></span>
                                            </p>
                                        </div>
                                    </div>
                                </a>


                                <?php 
												}
											}
										?>

                            </div>
                            <a href="<?php echo base_url();?>Alert">
                                <div class="text-center msg-footer">View All Notifications</div>
                            </a>
                        </div>
                    </li>
                    <?php if(!$admin_status){?>
                    <li class="nav-item dropdown dropdown-large">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php if($count_msg > 0){?> <span
                                class="alert-count"><?php echo $count_msg;?></span><?php }?>
                            <i class='bx bx-comment'></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="javascript:;">
                                <div class="msg-header">
                                    <p class="msg-header-title">Messages</p>
                                </div>
                            </a>
                            <div class="header-message-list">

                                <?php 
												$get_chat 	= $this->Chat_db->get_unread_chat($user_id);
												if(is_array($get_chat)){
													foreach($get_chat as $row){
														$msg_id                 	=$row['id'];
														$dis_sender                 =$row['sender'];
														$dis_reciever               =$row['reciever'];
														$msg  		                =$row['message'];
														$time                   	=$row['time'];
														$status                 	=$row['status'];
														$date_created              	=$row['date_created'];
														$props_id	              	=$row['props_id'];


														$dis_full_name              =$this->Users_db->get_user_full_name_by_id($dis_sender);
														$dis_image_name             =$this->Users_db->get_image_name_by_id($dis_sender);
														$dis_email                  =$this->Users_db->get_email_by_id($dis_sender);
														$dis_user_name              =$this->Users_db->get_user_name_by_id($dis_sender);
														$dis_user_status            =$this->Users_db->get_status_by_id($dis_sender);
														$dis_user_image             =$this->Users_db->get_image_name_by_id($dis_sender);

														if(strlen($msg) > 20) {
															$msg = $msg.' ';
															$msg = substr($msg, 0, 30);
															$msg = substr($msg, 0, strrpos($msg ,' '));
															$msg = $msg.'...';
														}
													
											?>

                                <a class="dropdown-item"
                                    href="<?php echo base_url();?>Message/reply_user/<?php echo $dis_sender;?>/<?php echo $dis_reciever;?>/<?php echo $props_id;?>">
                                    <div class="d-flex align-items-center">
                                        <div class="">
                                            <img src="<?php echo base_url();?>project_dir/users/<?php echo $dis_user_name;?>/images/<?php echo $dis_user_image;?>"
                                                class="msg-avatar" alt="user avatar">
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name"><?php echo $dis_full_name;?> <span
                                                    class="msg-time float-end"><?php $this->Admin_db->time_stamp($time);?>
                                                </span></h6>
                                            <p class="msg-info"><?php echo $msg;?> </p>
                                        </div>
                                    </div>
                                </a>

                                <?php 
													}
												}
											?>


                            </div>
                            <a href="<?php echo base_url();?>View-Message">
                                <div class="text-center msg-footer">View All Messages</div>
                            </a>
                        </div>
                    </li>
                    <?php }else{?>
                    <li class="nav-item dropdown dropdown-large">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php if($count_msg > 0){?> <span
                                class="alert-count"><?php echo $count_msg;?></span><?php }?>
                            <i class='bx bx-comment'></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="javascript:;">
                                <div class="msg-header">
                                    <p class="msg-header-title">Messages</p>
                                </div>
                            </a>
                            <div class="header-message-list">

                                <?php 
												$get_chat 	= $this->Chat_db->get_unread_chat($user_id);
												if(is_array($get_chat)){
													foreach($get_chat as $row){
														$msg_id                 	=$row['id'];
														$dis_sender                 =$row['sender'];
														$dis_reciever               =$row['reciever'];
														$msg  		                =$row['message'];
														$time                   	=$row['time'];
														$status                 	=$row['status'];
														$date_created              	=$row['date_created'];
														$props_id	              	=$row['props_id'];


														$dis_full_name              =$this->Users_db->get_user_full_name_by_id($dis_sender);
														$dis_image_name             =$this->Users_db->get_image_name_by_id($dis_sender);
														$dis_email                  =$this->Users_db->get_email_by_id($dis_sender);
														$dis_user_name              =$this->Users_db->get_user_name_by_id($dis_sender);
														$dis_user_status            =$this->Users_db->get_status_by_id($dis_sender);
														$dis_user_image             =$this->Users_db->get_image_name_by_id($dis_sender);

														if(strlen($msg) > 20) {
															$msg = $msg.' ';
															$msg = substr($msg, 0, 30);
															$msg = substr($msg, 0, strrpos($msg ,' '));
															$msg = $msg.'...';
														}
													
											?>

                                <a class="dropdown-item"
                                    href="<?php echo base_url();?>Message/reply_user/<?php echo $dis_sender;?>/<?php echo $dis_reciever;?>/<?php echo $props_id;?>">
                                    <div class="d-flex align-items-center">
                                        <div class="">
                                            <img src="<?php echo base_url();?>project_dir/users/<?php echo $dis_user_name;?>/images/<?php echo $dis_user_image;?>"
                                                class="msg-avatar" alt="user avatar">
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name"><?php echo $dis_full_name;?> <span
                                                    class="msg-time float-end"><?php $this->Admin_db->time_stamp($time);?>
                                                </span></h6>
                                            <p class="msg-info"><?php echo $msg;?> </p>
                                        </div>
                                    </div>
                                </a>

                                <?php 
													}
												}
											?>


                            </div>
                            <a href="<?php echo base_url();?>View-Message">
                                <div class="text-center msg-footer">View All Messages</div>
                            </a>
                        </div>
                    </li>
                    <?php }?>
                </ul>
            </div>
            <div class="user-box dropdown">
                <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#"
                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo base_url();?>project_dir/users/<?php echo $user_name;?>/images/<?php echo $user_img;?>"
                        class="user-img">
                    <div class="user-info ps-3">
                        <p class="user-name mb-0"><?php echo $full_name;?></p>
                        <p class="designattion mb-0"><?php echo $user_name;?></p>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="#upload_propfile" data-bs-toggle="modal"><i
                                class="bx bx-user"></i><span>Upload Pic</span></a>
                    </li>
                    <li><a class="dropdown-item"
                            href="<?php echo base_url();?>Profile/view_user/<?php echo $user_id;?>"><i
                                class="bx bx-user"></i><span>Profile</span></a>
                    </li>

                    <li>
                        <div class="dropdown-divider mb-0"></div>
                    </li>
                    <li><a class="dropdown-item" href="<?php echo base_url();?>Logout/user_logout"><i
                                class='bx bx-log-out-circle'></i><span>Logout</span></a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>