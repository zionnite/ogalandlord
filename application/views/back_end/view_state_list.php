
<div class="page-wrapper">
	<div class="page-content">
                        <h6 class="mb-0 text-uppercase">View State List</h6>
						<hr>

                    <div class="col-12">
						<div class="card">
							<div class="card-body">
								<div class="row align-items-center">
									<div class="col-lg-12 col-xl-12">
										<a href="<?php echo base_url();?>Admin_panel/update_state" class="btn btn-primary  mb-3 mb-lg-0"><i class="bx bxs-plus-square"></i>Add State Name to List</a>
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
											<th scope="col">State Name</th>
											<th scope="col">Area</th>
                                   
											<th scope="col"></th>
											<th scope="col"></th>
										</tr>
									</thead>
									<tbody>
                                        <?php
                                            $get_managers       = $this->Action->get_state_list();
                                            if(is_array($get_managers)){
                                                $i=0;
                                                foreach($get_managers as $row){
                                                    $i++;

                                                    $id             =$row['id'];
                                                    $state_name     =$row['name'];

                                                    $count_sub_state    = $this->Action->count_sub_state_by_state_id($id);
                                                    
                                            ?>

										<tr>
											<td scope="row"><?php echo $i;?></td>
                                            <td>
                                                <?php echo $state_name;?>
                                            </td>
                                            
                                            <td>
                                                <?php echo $count_sub_state;?>
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url();?>Admin_panel/view_sub_state_list/<?php echo $id;?>" class="btn btn-sm btn-dark">View Area</a>
                                            </td>

                                          

                                            <td>
                                                 <a href="#more_<?php echo $id;?>" data-bs-toggle="modal" class="btn btn-danger btn-sm"><i class="fadeIn animated bx bx-trash"></i> Delete</a>
                                            </td>

                                           
                                           

                                           
                                                    <div class="modal fade" id="more_<?php echo $id;?>" tabindex="-1" aria-hidden="true">
                                                        <div class="modal-dialog modal-sm">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Confirm Action</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Are you sure you want to Remove this State from List (<?php echo $state_name;?>)?
                                                                                                            
                                                                    <p style="color:red;"><b>Note:</b>Deleting State from list while State is in Use by Property, will cause a negative effect on the flow of the Property listing </p>
                                                                    
                                                                    
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <a href="<?php echo base_url();?>Admin_panel/remove_state/<?php echo $id;?>" class="btn btn-danger">Yes, Continue</a>
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
                                    <h6>Total State (<?php echo $this->Action->count_state();?>)</h6>
								</table>

                                <?php
                                    if(!is_array($get_managers)){
                                        echo $this->Admin_db->alert_callbark('danger','No Item Available at the moment!');
                                    }
                                ?>

							</div>
						</div>
	</div>				
</div>


