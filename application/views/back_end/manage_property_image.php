<!-- <style>
    .props_image{
        
        height: 400px;
        overflow: hidden;
        background-position: top center;
        background-repeat: no-repeat;
    }

    .props_image img.card-img-top{
        margin: auto;
        min-height: 100%;
        min-width: 100%;
    }
</style> -->
<?php 
    $agent_id   = $this->Admin_db->get_props_agent_id_by_props_id($props_id);
    $feature_image   = $this->Admin_db->get_props_feature_image($props_id);
    $feature_status   = $this->Admin_db->get_props_feature_status($props_id);
    $admin_status	         	=$this->session->userdata('admin_status');

?>
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
                        <li class="breadcrumb-item active" aria-current="page">Property</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->

        <?php if($this->Admin_db->check_if_property_owner($user_id,$props_id)){?>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">

                        <div class="col-lg-12 col-xl-12">
                            <a href="<?php echo base_url();?>Dashboard/add_feature_image/<?php echo $props_id;?>"
                                class="btn btn-dark  mb-3 mb-lg-0"><i class="bx bxs-plus-square"></i>Add Feature
                                Image</a>
                            <a href="<?php echo base_url();?>Dashboard/add_image_property/<?php echo $props_id;?>"
                                class="btn btn-primary  mb-3 mb-lg-0"><i class="bx bxs-plus-square"></i>Add Image to
                                Property</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <?php }?>

        <div class="row">
            <div class="col-xl-4 mx-auto">
                <h6 class="mb-0 text-uppercase">Feature Image</h6>
                <hr>

                <?php 
                                        if($feature_image !='no_image' && !empty($feature_image)){
                                    ?>
                <div class="col">
                    <div class="card">
                        <div class="props_image">
                            <img src="<?php echo base_url();?>project_dir/property/<?php echo $feature_image;?>"
                                class="card-img-top">
                        </div>

                        <?php if($user_id == $agent_id && !$admin_status){?>
                        <div class="card-body">

                            <a href="#remove_feature" data-bs-toggle="modal" class="card-link">Delete</a>
                            <!-- Modal -->
                            <div class="modal fade" id="remove_feature" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Confirm Action</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure you want to Feature Image?</p>




                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <a href="<?php echo base_url();?>Dashboard/delete_feature_image/<?php echo $props_id;?>"
                                                class="btn btn-danger">Yes, Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php }else if($admin_status){ ?>
                        <div class="card-body">


                            <?php 
                                                            if($feature_status == 'no'){
                                                        ?>
                            <a href="#approve_feature" data-bs-toggle="modal" class="card-link">Approve Slider</a>
                            <?php }else if($feature_status == 'yes'){?>
                            <a href="#un_approve_feature" data-bs-toggle="modal" class="card-link"
                                style="color:red;">Reject Slider</a>
                            <?php }?>
                            <!-- Modal -->


                            <div class="modal fade" id="approve_feature" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Confirm Action</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure you want to Approve Feature Image?</p>




                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <a href="<?php echo base_url();?>Dashboard/approve_feature_image/<?php echo $props_id;?>"
                                                class="btn btn-danger">Yes, Continue</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="un_approve_feature" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Confirm Action</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure you want to Reject Feature Image?</p>




                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <a href="<?php echo base_url();?>Dashboard/unapprove_feature_image/<?php echo $props_id;?>"
                                                class="btn btn-danger">Yes, Continue</a>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <?php }?>
                    </div>
                </div>
                <?php }else{
                                                echo $this->Admin_db->alert_callbark('danger','Feature Image No Set Yet');   
                                        }?>
            </div>
            <div class="col-xl-8 mx-auto">
                <h6 class="mb-0 text-uppercase">Image</h6>
                <hr>
                <?php echo isset($alert)?$alert:NULL;?>

                <div class="row row-cols-1 row-cols-md-1 row-cols-lg-3 row-cols-xl-3">
                    <?php

                                if(is_array($get_props_image)){
                                    foreach($get_props_image as $row){
                                        $id         = $row['id'];
                                        $name       = $row['image_name'];

                                        
                                        


                                      
                                    
                            ?>
                    <div class="col">
                        <div class="card">
                            <div class="props_image">
                                <img src="<?php echo base_url();?>project_dir/property/<?php echo $name;?>"
                                    class="card-img-top">
                            </div>

                            <?php if($user_id == $agent_id && !$admin_status){?>
                            <div class="card-body">

                                <a href="#edit_<?php echo $id;?>" data-bs-toggle="modal" class="card-link">Delete</a>
                                <!-- Modal -->
                                <div class="modal fade" id="edit_<?php echo $id;?>" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Confirm Action</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure you want to delete this image?</p>




                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <a href="<?php echo base_url();?>Dashboard/delete_image/<?php echo $props_id;?>/<?php echo $id;?>"
                                                    class="btn btn-danger">Yes, Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
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