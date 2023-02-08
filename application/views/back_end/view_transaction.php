
<div class="page-wrapper">
	<div class="page-content">
                        <h6 class="mb-0 text-uppercase">View Transaction</h6>
						<hr>
						<?php echo isset($alert)?$alert:NULL;?>
						
                        <div class="card">
							<div class="card-body">
								<table class="table mb-0">
									<thead>
										<tr>
											<th scope="col">#</th>
											<th scope="col"></th>
											<th scope="col">Amount</th>
                                            <th scope="col">Property</th>
											<th scope="col">Ref No</th>
											<th scope="col">Date</th>
											<th scope="col"></th>
										</tr>
									</thead>
									<tbody>
                                        <?php
                                            if(is_array($get_transaction)){
                                                $i=0;
                                                foreach($get_transaction as $row){
                                                    $i++;
                                                    $id                 =$row['id'];
                                                    $props_id           =$row['props_id'];
                                                    $dis_user_id        =$row['user_id'];
                                                    $dis_amount         =$row['amount'];
                                                    $trans_type         =$row['trans_type'];
                                                    $dis_balance        =$row['balance'];
                                                    $description        =$row['description'];
                                                    $ref_no             =$row['ref_no'];
                                                    $dis_status         =$row['status'];
                                                    $date_created       =$row['date_created'];
                                                    $time               =$row['time'];


                                                    $props_name                 =$this->Admin_db->get_props_name_by_id($props_id);
                                                    $props_image                =$this->Admin_db->get_props_image_by_id($props_id);

                                                    $get_props_state_id         =$this->Admin_db->get_state_id_by_props_id($props_id);
                                                    $get_state_name             =$this->Admin_db->get_state_name_state_id($get_props_state_id);
                                                    
                                                    $get_props_sub_state_id     =$this->Admin_db->get_sub_state_id_by_props_id($props_id);
                                                    $get_sub_state_name         =$this->Admin_db->get_sub_state_name_sub_state_id($get_props_sub_state_id);

                                                    $currency		='&#8358;';
													$dis_amount		= $currency.$this->cart->format_number($dis_amount);

                                            ?>

										<tr>
											<td scope="row"><?php echo $i;?></td>
											<td scope="row">
                                                <div class="d-flex order-actions">	
													<?php
                                                        if($trans_type =='withdraw'){?>
                                                            <a href="javascript:;" class="ms-4"><i class="bx bx-down-arrow-alt" style="color:red;"></i></a>
                                                        <?php }else if($trans_type == 'deposit'){?>
                                                            <a href="javascript:;" class="ms-4"><i class="bx bx-up-arrow-alt" style="color:green;"></i></a>
                                                        <?php }else if($trans_type == 'complete_transafer'){?>
                                                            <a href="javascript:;" class="ms-4"><i class="bx bx-up-arrow-alt" style="color:green;"></i></a>
                                                            <a href="javascript:;" class="ms-4"><i class="bx bx-up-arrow-alt" style="color:green;"></i></a>
                                                        <?php }else if($trans_type == 'complete_withdraw'){?>
                                                            <a href="javascript:;" class="ms-4"><i class="bx bx-down-arrow-alt" style="color:red;"></i></a>
                                                            <a href="javascript:;" class="ms-4"><i class="bx bx-down-arrow-alt" style="color:red;"></i></a>
                                                        <?php }
                                                    ?>
												</div>
                                            </td>
                                            <td>
                                                <?php echo $dis_amount;?>
                                            </td>
                                            <td>
                                                <!-- <img src="" width="50px"  height="50px" alt=""> -->
                                                
                                                <div class="d-flex align-items-center">
													<div class="recent-product-img">
														<a href="<?php echo base_url();?>Property/view_property/<?php echo $props_id;?>" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="<?php echo $props_name;?>">
                                                            <img src="<?php echo base_url();?>project_dir/property/<?php echo $props_image;?>" alt="">
                                                        </a>
													</div>
													<div class="ms-2">
														<h6 class="mb-1 font-14"><?php echo $get_state_name.','.$get_sub_state_name;?></h6>
													</div>
												</div>
                                            </td>
                                            <td>
                                                <?php echo $ref_no;?>
                                            </td>
                                            <td>
                                                <?php echo $date_created;?>
                                            </td>

                                            <td>
                                                <?php 
                                                    if($dis_status =='pending'){?>
                                                        <div class="badge rounded-pill bg-light-info text-info w-100">In Progress</div>
                                                <?php }else if($dis_status =='cancel'){?>
                                                        <div class="badge rounded-pill bg-light-danger text-danger w-100">Cancelled</div>
                                                <?php }else if($dis_status =='success'){?>
                                                        <div class="badge rounded-pill bg-light-success text-success w-100">Completed</div>
                                                <?php 
                                                    }
                                                ?>
                                            </td>
											<!-- <button type="button" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Tooltip on top">Tooltip on top</button> -->
                                            
											
                                           

                                            <!-- href="#more_<?php echo $id;?>" data-bs-toggle="modal" -->
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
                                                                    <a href="<?php echo base_url();?>Request/mark_request_as_read/<?php echo $id;?>" class="btn btn-danger">Yes, Continue</a>
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
								</table>

                                <?php
                                    if(!is_array($get_transaction)){
                                        echo $this->Admin_db->alert_callbark('danger','Transaction not Available at the moment!');
                                    }
                                ?>

                                <nav style="margin-top:3%;"><?php echo $pagination;?></nav>
							</div>
						</div>
	</div>				
</div>


