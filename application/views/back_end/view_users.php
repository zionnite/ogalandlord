<style>
    .props_image{
        
        height: 300px;
        overflow: hidden;
        background-position: top center;
        background-repeat: no-repeat;
    }

    .props_image img.card-img-top{
        margin: auto;
        min-height: 100%;
        min-width: 100%;
    }
</style>

<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">View</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">

                                <?php
                                    if($page_name == 'view_all_users'){echo 'Users';}elseif($page_name =='view_all_agents'){echo 'Agents';}
                                    ?>
                                </li>
							</ol>
						</nav>
					</div>
					
				</div>
				<!--end breadcrumb-->
				<div class="row">
					<div class="col-xl-12 mx-auto">
						<h6 class="mb-0 text-uppercase">List all <?php
                                    if($page_name == 'view_all_users'){echo 'Users';}elseif($page_name =='view_all_agents'){echo 'Agents';}
                                    ?>
                        </h6>
						<hr>
                       
						<?php echo isset($alert)?$alert:NULL;?>
						
						<div class="row row-cols-1 row-cols-md-1 row-cols-lg-3 row-cols-xl-3">
                            <?php
                                if(is_array($get_users)){
                                    foreach($get_users as $row){
                                        $agent_id                   = $row['id'];
                                        $agent_user_name            = $row['user_name'];
                                        $agent_full_name            = $row['full_name'];
                                        $agent_email                = $row['email'];
                                        $agent_image_name           = $row['image_name'];
                                        $agent_status               = $row['status'];
                                        $agent_phone                = $row['phone'];
                                        $agent_age                  = $row['age'];
                                        $agent_sex                  = $row['sex'];
                                        $agent_address              = $row['address'];
                                        $agent_date_created         = $row['date_created'];
                                        $agent_account_name         = $row['account_name'];
                                        $agent_account_number       = $row['account_number'];
                                        $agent_bank_name            = $row['bank_name'];
                                        $agent_bank_code            = $row['bank_code'];
                                        $agent_current_balance      = $row['current_balance'];
                                        $agent_login_status         = $row['login_status'];


                                        $agent_phone                = $this->Users_db->get_user_phone_by_id($agent_id);
                                        $agent_prop_counter         = $this->Property_db->count_all_user_property($agent_id);


                                        // $agent_email                =substr_replace($agent_email, 'XXXXXXXX', '5', '5');
                                        // $agent_user_phone           =substr_replace($agent_phone, 'XXXXX', '3', '5');
                            ?>
                                        <div class="col">
                                            <div class="card">
                                                <div class="props_image">
                                                    <img src="<?php echo base_url();?>project_dir/users/<?php echo $agent_user_name;?>/images/<?php echo $agent_image_name;?>" class="card-img-top">
                                                </div>
                                                <div class="card-body">
                                                    <h5 class="card-title"><?php echo $agent_full_name;?></h5>
                                                    <p class="card-text"><?php echo $agent_user_name;?></p>
                                                </div>
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item"><?php echo $agent_phone;?></li>
                                                </ul>
                                                <div class="card-body">	
                                                    <a href="<?php echo base_url();?>Profile/view_user/<?php echo $agent_id;?>" class="card-link">View Bio</a>
                                                    <a href="#ban_<?php echo $agent_id;?>" data-bs-toggle="modal"  class="card-link">
                                                        <?php if($agent_login_status == 'ban'){?>
                                                            UnBan <?php if($agent_status =='user'){ echo 'User';}else{echo 'Agent';}?>
                                                        <?php }else{?>
                                                            Ban <?php if($agent_status =='user'){ echo 'User';}else{echo 'Agent';}?>
                                                        
                                                        <?php };?>
                                                    
                                                    </a>
                                                    <a href="#delete_<?php echo $agent_id;?>" data-bs-toggle="modal" class="card-link">Delete</a>
                                                    <a href="#send_msg_<?php echo $agent_id;?>" data-bs-toggle="modal" class="card-link">Send Email</a>

                                                    

                                                    <!-- Delete Property -->
                                                    <div class="modal fade" id="ban_<?php echo $agent_id;?>" tabindex="-1" aria-hidden="true">
                                                        <div class="modal-dialog modal-sm">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Confirm Action</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Are you sure you want to <?php if($agent_login_status == 'ban'){?>
                                                                        UnBan <?php if($agent_status =='user'){ echo 'User';}else{echo 'Agent';}?>
                                                                    <?php }else{?>
                                                                        Ban <?php if($agent_status =='user'){ echo 'User';}else{echo 'Agent';}?>
                                                                            
                                                                    <?php };?> (<?php echo $agent_full_name;?>)?
                                                                                                            
                                                                    
                                                                    
                                                                    
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <?php if($page_name == 'view_all_users'){?>
                                                                        <a href="<?php echo base_url();?>Admin_panel/toggle_ban_user/<?php echo $agent_id;?>/view_users" class="btn btn-danger">Yes, Continue</a>
                                                                    <?php }else if($page_name == 'view_all_agents'){?>
                                                                        <a href="<?php echo base_url();?>Admin_panel/toggle_ban_user/<?php echo $agent_id;?>/view_agents" class="btn btn-danger">Yes, Continue</a>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    

                                                    <!-- Delete Property -->
                                                    <div class="modal fade" id="delete_<?php echo $agent_id;?>" tabindex="-1" aria-hidden="true">
                                                        <div class="modal-dialog modal-sm">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Confirm Action</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Are you sure you want to delete this User (<?php echo $agent_full_name;?>)?
                                                                                                            
                                                                    
                                                                    
                                                                    
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                                                    <?php if($page_name == 'view_all_users'){?>
                                                                        <a href="<?php echo base_url();?>Admin_panel/delete_user/<?php echo $agent_id;?>/view_users" class="btn btn-danger">Yes, Delete</a>
                                                                    <?php }else if($page_name == 'view_all_agents'){?>
                                                                        <a href="<?php echo base_url();?>Admin_panel/delete_user/<?php echo $agent_id;?>/view_agents" class="btn btn-danger">Yes, Delete</a>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <!-- Send message Dialog -->
                                                    <div class="modal fade" id="send_msg_<?php echo $agent_id;?>" tabindex="-1" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Drop Message</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>

                                                                <form action="<?php echo base_url();?>Admin_panel/message_user" method="post">

                                                                    <div class="modal-body">
                                                                        <!-- body  -->
                                                                        <div class="form-group" style="margin-bottom:1%;">
                                                                            <input name="subject" id="title" required class="form-control" placeholder="Title" />
                                                                        </div>                                                                    
                                                                                                                
                                                                        <div class="form-group">
                                                                            <textarea name="message" id="message" required class="form-control" placeholder="Write your message here"></textarea>
                                                                        </div>                                                                    
                                                                                                                
                                                                                                                
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <input type="hidden" name="to_id" value="<?php echo $agent_id;?>">
                                                                        <input type="hidden" name="to_name" value="<?php echo $agent_full_name;?>">
                                                                        <input type="hidden" name="to_email" value="<?php echo $agent_email;?>">

                                                                        <?php if($page_name == 'view_all_users'){?>
                                                                            <input type="hidden" name="location" value="view_users">
                                                                        <?php }else if($page_name == 'view_all_agents'){?>
                                                                            <input type="hidden" name="location" value="view_agents">
                                                                        <?php } ?>

                                                                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                                                        <input type="submit" class="btn btn-success btn-sm" name="submit" value="Send Message">
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>



                                                </div>
                                            </div>
                                        </div>

                            <?php 
                                    }
                                }
                            ?>

					
				        </div>
					</div>
				</div>
				
			</div>
		</div>


<script src="<?php echo base_url();?>assets_2/js/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#toggle_amenitites').click(function(e) {
            $('#amenities').toggle(100);  // show to UI when use display: none
		  //  $('.continuous').hide(100);  // hide()
        })
    });
</script>
