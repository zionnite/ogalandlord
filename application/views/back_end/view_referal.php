
<div class="page-wrapper">
	<div class="page-content">
                        <h6 class="mb-0 text-uppercase">View User Who Used Your Referal Link</h6>
						<hr>
						<?php echo isset($alert)?$alert:NULL;?>
						
                        <div class="card">
							<div class="card-body">
								<table class="table mb-0">
									<thead>
										<tr>
											<th scope="col">#</th>
											<th scope="col"></th>
                                            <th>Full Name</th>
                                            <th>Phone Number</th>
										</tr>
									</thead>
									<tbody>
                                        <?php
                                            if(is_array($get_request)){
                                                $i=0;
                                                foreach($get_request as $row){
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
											<th scope="row"><?php echo $i;?></th>
											
                                            <td>
                                                <img src="<?php echo base_url();?>project_dir/users/<?php echo $agent_user_name;?>/images/<?php echo $agent_image_name;?>" width="50px"  height="50px" alt="">
                                            </td>
											<td>
                                                <h6><?php echo $agent_full_name;?></h6>
                                                <small style="color:red;"><?php echo $agent_user_name;?></small>
                                            </td>
                                            <td>
                                                <?php echo $agent_phone;?>
                                            </td>
                                           
                                            

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
                                        echo $this->Admin_db->alert_callbark('danger','Nobody has Registered with your Referal Link!');
                                    }
                                ?>
							</div>
						</div>
	</div>				
</div>


