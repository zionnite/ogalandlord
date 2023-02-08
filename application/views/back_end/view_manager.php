
<div class="page-wrapper">
	<div class="page-content">
                        <h6 class="mb-0 text-uppercase">View Managers</h6>
						<hr>

                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-lg-12 col-xl-12">
                                            <a href="<?php echo base_url();?>Admin_panel/add_manager" class="btn btn-primary  mb-3 mb-lg-0"><i class="bx bxs-plus-square"></i>Add Manager</a>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        
						<?php echo isset($alert)?$alert:NULL;?>
						
                        <div class="card">
							<div class="card-body">
								<table class="table mb-0">
									<thead>
										<tr>
											<th scope="col">#</th>
											<th scope="col"></th>
											<th scope="col">User Name</th>
											<th scope="col">Full Name</th>
                                   
											<th scope="col">Date</th>
											<th scope="col"></th>
										</tr>
									</thead>
									<tbody>
                                        <?php
                                            $get_managers       = $this->Users_db->get_all_manager();
                                            if(is_array($get_managers)){
                                                $i=0;
                                                foreach($get_managers as $row){
                                                    $i++;

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
                                                    
                                            ?>

										<tr>
											<td scope="row"><?php echo $i;?></td>
                                            <td></td>
                                            <td>
                                                <?php echo $agent_user_name;?>
                                            </td>
                                            <td>
                                                <?php echo $agent_full_name;?>
                                            </td>

                                            <td>
                                                <?php echo $agent_date_created;?>
                                            </td>

                                            <td>
                                                 <a href="#more_<?php echo $agent_id;?>" data-bs-toggle="modal" class="btn btn-danger btn-sm"><i class="fadeIn animated bx bx-trash"></i> Delete Manager</a>
                                            </td>

                                           
                                           

                                           
                                                    <div class="modal fade" id="more_<?php echo $agent_id;?>" tabindex="-1" aria-hidden="true">
                                                        <div class="modal-dialog modal-sm">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Confirm Action</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Are you sure you want to Remove this Manager (<?php echo $agent_full_name;?>)?
                                                                                                            
                                                                    
                                                                    
                                                                    
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <a href="<?php echo base_url();?>Admin_panel/remove_manager/<?php echo $agent_id;?>" class="btn btn-danger">Yes, Continue</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
										</tr>
										
                                        <?php 
                                                }
                                            }
                                        ?>
										
									</tbody>
                                    <h6>Total Manager (<?php echo $this->Users_db->count_all_manager();?>)</h6>
								</table>

                                <?php
                                    if(!is_array($get_managers)){
                                        echo $this->Admin_db->alert_callbark('danger','Mnagers not Available at the moment!');
                                    }
                                ?>

							</div>
						</div>
	</div>				
</div>


