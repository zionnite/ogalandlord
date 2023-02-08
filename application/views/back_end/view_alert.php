
<div class="page-wrapper">
	<div class="page-content">
                        <h6 class="mb-0 text-uppercase">View Alert</h6>
						<hr>
						<?php echo isset($alert)?$alert:NULL;?>
						
                        <div class="card">
							<div class="card-body">
								<table class="table mb-0">
									<thead>
										<tr>
											<th scope="col">#</th>
											<th scope="col">Reason</th>
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
                                                    $sender_id           =$row['sender_id'];
                                                    $description        =$row['description'];
                                                    $date_created       =$row['date_created'];
                                                    $time               =$row['time'];
                                                    $read_status        =$row['status'];

                                                    
                                            ?>

										<tr>
											<th scope="row"><?php echo $i;?></th>
											
											<td>
                                                <small><?php echo $description;?></small>
                                            </td>
                                           
                                            <td>
                                                <?php 
                                                    if($read_status =='unread'){?>
                                                        <a href="#mark_<?php echo $id;?>" data-bs-toggle="modal" class="btn btn-dark btn-sm">Mark as Read</a>
                                                    <?php
                                                    }?>
                                                       
                                                
                                            </td>
                                            <td>
                                                <a href="#delete_<?php echo $id;?>" data-bs-toggle="modal" class="btn btn-danger btn-sm">Delete</a>
                                            </td>

                                                    <div class="modal fade" id="mark_<?php echo $id;?>" tabindex="-1" aria-hidden="true">
                                                        <div class="modal-dialog modal-sm">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Confirm Action</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Are you sure you want to mark this Alert as Read?
                                                                                                            
                                                                    
                                                                    
                                                                    
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <a href="<?php echo base_url();?>Alert/mark_alert_as_read/<?php echo $id;?>" class="btn btn-danger">Yes, Continue</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="modal fade" id="delete_<?php echo $id;?>" tabindex="-1" aria-hidden="true">
                                                        <div class="modal-dialog modal-sm">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Confirm Action</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Are you sure you want to delete this Alert?
                                                                                                            
                                                                    
                                                                    
                                                                    
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <a href="<?php echo base_url();?>Alert/delete_alert/<?php echo $id;?>" class="btn btn-danger">Yes, Continue</a>
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
                                        echo $this->Admin_db->alert_callbark('danger','Message Alert not Available at the moment!');
                                    }
                                ?>
							</div>
						</div>
	</div>				
</div>


