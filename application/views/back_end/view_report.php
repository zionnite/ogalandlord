<div class="page-wrapper">
    <div class="page-content">
        <h6 class="mb-0 text-uppercase">View Reported Property List</h6>
        <hr>


        <?php echo isset($alert)?$alert:NULL;?>

        <div class="card">
            <div class="card-body">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Reporter</th>
                            <th scope="col">Property Reported</th>
                            <th scope="col">Report Type</th>

                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                                            $get_managers       = $this->Action->report();
                                            if(is_array($get_managers)){
                                                $i=0;
                                                foreach($get_managers as $row){
                                                    $i++;

                                                    $id         =$row['id'];
                                                    $dis_user_id  =$row['user_id'];
                                                    $prop_id      =$row['prop_id'];
                                                    $type         =$row['type'];
                                                    $date           = $row['date_created'];
                                                    $time           = $row['time'];


                                    $user_full_name                    = $this->Users_db->get_user_full_name_by_id($dis_user_id);
                                    $user_image_name                   = $this->Users_db->get_image_name_by_id($dis_user_id);
                                    $user_email                        = $this->Users_db->get_email_by_id($dis_user_id);
                                    $user_status                       = $this->Users_db->get_status_by_id($dis_user_id);
                                    $user_user_name                    = $this->Users_db->get_user_name_by_id($dis_user_id);
                                    $user_user_phone                   = $this->Users_db->get_user_phone_by_id($dis_user_id);
                                    
                                    //property
                                    $props_name                        = $this->Admin_db->get_props_name_by_id($prop_id);
                                    $props_img                         = $this->Admin_db->get_props_image_by_id($prop_id);

                                    $agent_id                          = $this->Admin_db->get_props_agent_id_by_props_id($prop_id);




                                                    
                                            ?>

                        <tr>
                            <td scope="row"><?php echo $i;?></td>



                            <!-- <td>
                                <a href="#more_<?php echo $id;?>" data-bs-toggle="modal"
                                    class="btn btn-danger btn-sm"><i class="fadeIn animated bx bx-trash"></i> Delete</a>
                            </td> -->





                            <div class="modal fade" id="more_<?php echo $id;?>" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Confirm Action</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure you want to Remove this Bank Name
                                                (<?php echo $prop_id;?>)?




                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <a href="<?php echo base_url();?>Admin_panel/remove_bank/<?php echo $id;?>"
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
                    <h6>Total Report (<?php echo $total;?>)</h6>
                </table>


            </div>
        </div>
    </div>
</div>