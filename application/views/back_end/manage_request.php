<?php
$admin_status       = $this->session->userdata('admin_status');
?>

<div class="page-wrapper">
	<div class="page-content">
                        <h6 class="mb-0 text-uppercase">View Request</h6>
						<hr>
						<?php echo isset($alert)?$alert:NULL;?>
						
                        <div class="card">
							<div class="card-body">
								<table class="table mb-0">
									<thead>
										<tr>
											<th scope="col">#</th>
											<th scope="col" style="text-align:center;">Property Name</th>
                                            <th scope="col" style="text-align:center;">Property Image</th>
											<th scope="col">Reason</th>
											<th scope="col">Location</th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
										</tr>
									</thead>
									<tbody>
                                        <?php
                                            if(is_array($get_request)){
                                                $i=0;
                                                foreach($get_request as $row){
                                                    $i++;
                                                    $id                 =$row['id'];
                                                    $dis_user_id            =$row['user_id'];
                                                    $agent_id           =$row['agent_id'];
                                                    $props_id           =$row['props_id'];
                                                    $title              =$row['title'];
                                                    $description        =$row['description'];
                                                    $date_created       =$row['date_created'];
                                                    $time               =$row['time'];
                                                    $user_read_status        =$row['user_read_status'];
                                                    $agent_read_status        =$row['agent_read_status'];
                                                    $admin_read_status        =$row['admin_read_status'];
                                                    $request_status           =$row['status'];

                                                    $props_name         =$this->Admin_db->get_props_name_by_id($props_id);
                                                    $props_image        =$this->Admin_db->get_props_image_by_id($props_id);

                                                    $get_props_state_id =$this->Admin_db->get_state_id_by_props_id($props_id);
                                                    $get_state_name     =$this->Admin_db->get_state_name_state_id($get_props_state_id);
                                                    
                                                    $get_props_sub_state_id =$this->Admin_db->get_sub_state_id_by_props_id($props_id);
                                                    $get_sub_state_name     =$this->Admin_db->get_sub_state_name_sub_state_id($get_props_sub_state_id);


                                            ?>

										<tr>
											<th scope="row"><?php echo $i;?></th>
											<td>
                                               <a href="<?php echo base_url();?>Property/view_image/<?php echo $props_id;?>" class="badge bg-info">
                                                    <?php echo $props_name;?>
                                                </a>
                                                
                                            </td>
                                            <td style="text-align:center;">
                                                <img src="<?php echo base_url();?>project_dir/property/<?php echo $props_image;?>" width="50px"  height="50px" alt="">
                                                
                                            </td>
											<td>
                                                <h6><?php echo $title;?></h6>
                                                <small><?php echo $description;?></small>
                                            </td>
                                            <td>
                                                <p><b><?php echo $get_state_name;?>,<?php echo $get_sub_state_name;?></b></p>
                                            </td>
                                            <td>
                                                <?php 
                                                    if($user_status == 'agent' || $user_status == 'landlord'){?>
                                                        <a href="<?php echo base_url();?>Profile/view_user/<?php echo $dis_user_id;?>" class="btn btn-dark btn-sm">View User Profile</a>
                                                    <?php
                                                    }else{?>
                                                        <a href="<?php echo base_url();?>Profile/view_user/<?php echo $agent_id;?>" class="btn btn-dark btn-sm">View User Profile</a>
                                                <?php 
                                                    }
                                                ?>
                                                
                                            </td>
                                            <td>
                                                

                                                <?php if($user_id == $dis_user_id && $admin_status == false){?>
                                                        <?php 
                                                            if($user_read_status =='unread'){?>
                                                        <a href="#more_<?php echo $id;?>" data-bs-toggle="modal" class="btn btn-danger btn-sm">Mark as Read</a>
                                                        <?php } ?>
                                                <?php }else if($user_id == $agent_id && $admin_status == false){?>
                                                        <?php if($agent_read_status =='unread'){?>
                                                            <a href="#more_two_<?php echo $id;?>" data-bs-toggle="modal" class="btn btn-danger btn-sm">Mark as Read</a>
                                                        <?php } ?>

                                                <?php }else{?> 
                                                        <?php if($admin_read_status =='unread'){?>
                                                            <a href="#more_three_<?php echo $id;?>" data-bs-toggle="modal" class="btn btn-danger btn-sm">Mark as Read</a>
                                                        <?php } ?>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php 
                                                    if($request_status =='pending'){?>
                                                        <div class="badge rounded-pill bg-light-info text-info w-100">Pending</div>
                                                <?php }else if($request_status =='review'){?>
                                                        <div class="badge rounded-pill bg-light-warning text-warning w-100">Reviewing</div>
                                                <?php }else if($request_status =='rejected'){?>
                                                        <div class="badge rounded-pill bg-light-danger text-danger w-100">Cancelled</div>
                                                <?php }else if($request_status =='confirm'){?>
                                                        <div class="badge rounded-pill bg-light-success text-success w-100">Completed</div>
                                                <?php 
                                                    }
                                                ?>
                                            </td>

                                                    <div class="modal fade" id="more_<?php echo $id;?>" tabindex="-1" aria-hidden="true">
                                                        <div class="modal-dialog modal-sm">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Confirm Action</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Are you sure you want to mark this Request as Read (<?php echo $title;?>)?
                                                                                                            
                                                                    
                                                                    
                                                                    
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <a href="<?php echo base_url();?>Request/mark_request_as_read/<?php echo $id;?>/user" class="btn btn-danger">Yes, Continue</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="modal fade" id="more_two_<?php echo $id;?>" tabindex="-1" aria-hidden="true">
                                                        <div class="modal-dialog modal-sm">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Confirm Action</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Are you sure you want to mark this Request as Read (<?php echo $title;?>)?
                                                                                                            
                                                                    
                                                                    
                                                                    
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <a href="<?php echo base_url();?>Request/mark_request_as_read/<?php echo $id;?>/agent" class="btn btn-danger">Yes, Continue</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="modal fade" id="more_three_<?php echo $id;?>" tabindex="-1" aria-hidden="true">
                                                        <div class="modal-dialog modal-sm">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Confirm Action</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Are you sure you want to mark this Request as Read (<?php echo $title;?>)?
                                                                                                            
                                                                    
                                                                    
                                                                    
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <a href="<?php echo base_url();?>Request/mark_request_as_read/<?php echo $id;?>/admin" class="btn btn-danger">Yes, Continue</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
										</tr>
										
                                        <?php 
                                                }
                                            }else{
                                                
                                            }
                                        ?>
										
									</tbody>
								</table>

                                <?php
                                    if(!is_array($get_request)){
                                        echo $this->Admin_db->alert_callbark('danger','Request not Available at the moment!');
                                    }
                                ?>
							</div>
						</div>
        <?php echo $pagination;?>
	</div>				
</div>


