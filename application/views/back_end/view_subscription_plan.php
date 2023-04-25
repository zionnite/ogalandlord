<div class="page-wrapper">
    <div class="page-content">
        <h6 class="mb-0 text-uppercase">View Managers</h6>
        <hr>

        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-lg-12 col-xl-12">
                            <a href="<?php echo base_url();?>Admin_panel/create_subscription_plan"
                                class="btn btn-primary  mb-3 mb-lg-0"><i class="bx bxs-plus-square"></i>Create
                                Subscription Plan
                            </a>
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
                            <th scope="col">Plane Name</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Expected Amount</th>
                            <th scope="col">Interval</th>
                            <th scope="col">Type</th>
                            <th scope="col">Limit</th>
                            <th scope="col">Plan ID</th>
                            <th scope="col">Plan Code</th>
                            <th scope="col">Location Name</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $locations       = $this->Subscription_db->get_subscription_plan();
                            if(is_array($locations)){
                                $i=0;
                                foreach($locations as $row){
                                    $i++;

                                    $id                                 = $row['id'];
                                    $plan_name                          = $row['plan_name'];
                                    $plan_id                            = $row['plan_id'];
                                    $plan_code                          = $row['plan_code'];
                                    $plan_desc                          = $row['plan_desc'];
                                    $plan_interval                      = $row['plan_interval'];
                                    $plan_amount                        = $row['plan_amount'];
                                    $plan_limit                         = $row['plan_limit'];
                                    $location_id                        = $row['location_id'];
                                    $location_name                      = $row['location_name'];
                                    $status                             = $row['status'];
                                    $plan_image                         = $row['plan_image'];
                                    $plan_type                          = $row['plan_type'];
                                    $expected_amount                    = $row['expected_amount'];


                                    $currency		    ='&#8358;';
								    $plan_amount		    = $currency.$this->cart->format_number($plan_amount);
								    $expected_amount		    = $currency.$this->cart->format_number($expected_amount);
                                                    
                        ?>

                        <tr>
                            <td><?php echo $i;?></td>
                            <td>
                                <img src="<?php echo base_url();?>project_dir/subscription/<?php echo $plan_image;?>"
                                    style="width:50px; height:50px;" /> <br> <?php echo $plan_name;?>
                            </td>

                            <td><?php echo $plan_amount;?></td>
                            <td><?php echo $expected_amount;?></td>
                            <td><?php echo $plan_interval;?></td>
                            <td><?php echo $plan_type;?></td>
                            <td><?php echo $plan_limit;?></td>
                            <td><?php echo $plan_id;?></td>
                            <td><?php echo $plan_code;?></td>
                            <td><?php echo $location_name;?></td>


                            <td>
                                <a href="#more_<?php echo $id;?>" data-bs-toggle="modal"
                                    class="btn btn-danger btn-sm"><i class="fadeIn animated bx bx-trash"></i> Delete
                                </a>
                            </td>





                            <div class="modal fade" id="more_<?php echo $id;?>" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Confirm Action</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure you want to Remove this item
                                                (<?php echo $plan_name;?>)?



                                            <p>Deleting the plan means no body will be able to subscribe to this plan
                                                but it will keep running for already opt-in users</p>


                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <a href="<?php echo base_url();?>Admin_panel/remove_subscription/<?php echo $id;?>"
                                                class="btn btn-danger">Yes, Continue</a>
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
                    <h6>Total Location of Land (<?php echo $this->Subscription_db->count_all_land_location();?>)</h6>
                </table>

                <?php
                    if(!is_array($locations)){
                        echo $this->Admin_db->alert_callbark('danger','Location of Lands not Available at the moment!');
                    }
                ?>

            </div>
        </div>
    </div>
</div>