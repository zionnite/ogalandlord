<div class="page-wrapper">
    <div class="page-content">
        <h6 class="mb-0 text-uppercase">View Managers</h6>
        <hr>

        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-lg-12 col-xl-12">
                            <a href="<?php echo base_url();?>Admin_panel/add_land_location"
                                class="btn btn-primary  mb-3 mb-lg-0"><i class="bx bxs-plus-square"></i>Add Land
                                Location</a>
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
                            <th scope="col">Location Name</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $locations       = $this->Subscription_db->get_all_land_location();
                            if(is_array($locations)){
                                $i=0;
                                foreach($locations as $row){
                                    $i++;

                                    $id                   = $row['id'];
                                    $land_location        = $row['location_name'];
                                                    
                        ?>

                        <tr>
                            <td scope="row"><?php echo $i;?></td>
                            <td>
                                <?php echo $land_location;?>
                            </td>


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
                                                (<?php echo $land_location;?>)?




                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <a href="<?php echo base_url();?>Admin_panel/remove_landlocation/<?php echo $id;?>"
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