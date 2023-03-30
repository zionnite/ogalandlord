<?php
$feature_image   = $this->Admin_db->get_props_feature_image($props_id);
$user_status         	=$this->session->userdata('status');


                        $get_props              = $this->Property_db->get_props_by_id($props_id);
                        if(is_array($get_props)){
                            foreach($get_props as $row){
                                        $props_id                           = $row['id'];
                                        $props_agent_id                     = $row['agent_id'];
                                        $props_name                         = $row['prop_name'];
                                        $props_location                     = $row['prop_location'];
                                        $props_img_name                     = $row['prop_img_name'];
                                        $props_vid_id                       = $row['prop_vid_id'];
                                        $props_type                         = $row['prop_type'];
                                        $props_purpose                      = $row['prop_purpose'];
                                        $props_status                       = $row['prop_status'];
                                        $props_bedrom                       = $row['prop_bedrom'];
                                        $props_bed                          = $row['prop_bed'];
                                        $props_bathroom                     = $row['prop_bathroom'];
                                        $props_toilet                       = $row['prop_toilet'];
                                        $props_home_area                    = $row['prop_home_area'];
                                        $props_lot_area                     = $row['prop_lot_area'];
                                        $props_year_built                   = $row['prop_year_built'];
                                        $props_created                      = $row['date_created'];
                                        $props_state_id                     = $row['state_id'];
                                        $props_sub_state_id                 = $row['sub_state_id'];
                                        $props_type_of_propery              = $row['type_of_propery'];
                                        $props_sub_type_of_propery          = $row['sub_type_of_propery'];
                                        $props_price                        = $row['price'];
                                        $props_description                  = $row['description'];
                                        $prop_mode                          = $row['prop_mode'];
                                        $slider_img                         = $row['slider_img'];

                                        $prop_mode                          = ucfirst(str_replace("_"," ",$prop_mode));

                                        //get facilities
                                        $props_shopping_mall                = $this->Admin_db->props_shopping_mall($props_id);
                                        $props_hospital                     = $this->Admin_db->props_hospital($props_id);
                                        $props_school                       = $this->Admin_db->props_school($props_id);
                                        $props_petrol_pump                  = $this->Admin_db->props_petrol_pump($props_id);
                                        $props_airport                      = $this->Admin_db->props_airport($props_id);
                                        $props_church                       = $this->Admin_db->props_church($props_id);
                                        $props_mosque                       = $this->Admin_db->props_mosque($props_id);

                                        //get amenities
                                        $props_air_condition                = $this->Admin_db->props_air_condition($props_id);
                                        $props_balcony                      = $this->Admin_db->props_balcony($props_id);
                                        $props_bedding                      = $this->Admin_db->props_bedding($props_id);
                                        $props_cable_tv                     = $this->Admin_db->props_cable_tv($props_id);
                                        $props_cleaning_after_exit          = $this->Admin_db->props_cleaning_after_exit($props_id);
                                        $props_cofee_pot                    = $this->Admin_db->props_cofee_pot($props_id);
                                        $props_computer                     = $this->Admin_db->props_computer($props_id);
                                        $props_cot                          = $this->Admin_db->props_cot($props_id);
                                        $props_dishwasher                   = $this->Admin_db->props_dishwasher($props_id);
                                        $props_dvd                          = $this->Admin_db->props_dvd($props_id);
                                        $props_fan                          = $this->Admin_db->props_fan($props_id);
                                        $props_fridge                       = $this->Admin_db->props_fridge($props_id);
                                        $props_grill                        = $this->Admin_db->props_grill($props_id);
                                        $props_hairdryer                    = $this->Admin_db->props_hairdryer($props_id);
                                        $props_heater                       = $this->Admin_db->props_heater($props_id);
                                        $props_hi_fi                        = $this->Admin_db->props_hi_fi($props_id);
                                        $props_internet                     = $this->Admin_db->props_internet($props_id);
                                        $props_iron                         = $this->Admin_db->props_iron($props_id);
                                        $props_juicer                       = $this->Admin_db->props_juicer($props_id);
                                        $props_lift                         = $this->Admin_db->props_lift($props_id);
                                        $props_microwave                    = $this->Admin_db->props_microwave($props_id);
                                        $props_gym                          = $this->Admin_db->props_gym($props_id);
                                        $props_fireplace                    = $this->Admin_db->props_fireplace($props_id);
                                        $props_hot_tub                      = $this->Admin_db->props_hot_tub($props_id);


                                        //get valuation
                                        $props_crime                        = $this->Admin_db->props_crime($props_id);
                                        $props_traffic                      = $this->Admin_db->props_traffic($props_id);
                                        $props_pollution                    = $this->Admin_db->props_pollution($props_id);
                                        $props_education                    = $this->Admin_db->props_education($props_id);
                                        $props_health                       = $this->Admin_db->props_health($props_id);


                                        //get Details
                                        $props_condition                    = $this->Admin_db->props_condition($props_id);
                                        $props_caution_fee                  = $this->Admin_db->props_caution_fee($props_id);
                                        $props_special_pref                 = $this->Admin_db->props_special_pref($props_id);

                                        //get_all_props_image
                                        $get_all_props_image                = $this->Admin_db->get_all_props_image($props_id);

                                        //get_all_props_video
                                        $get_all_props_video                = $this->Admin_db->get_all_props_video($props_id);

                                        $get_state_name                 =$this->Admin_db->get_state_name_state_id($props_state_id);
                                        $get_sub_state_name             =$this->Admin_db->get_sub_state_name_sub_state_id($props_sub_state_id);

                                        $currency		='&#8358;';
										$props_price		    = $currency.$this->cart->format_number($props_price);
										$props_caution_fee		= $currency.$this->cart->format_number($props_caution_fee);
                                    

                                    $count_props_image          = $this->Property_db->count_prop_images($props_id);
                                    $favourite                  = $this->Users_db->check_if_i_favourite($user_id,$props_id);

                                    $type_name                      = $this->Admin_db->get_types_of_property_name_by_id($props_type_of_propery);
                                    $sub_type_name                  = $this->Admin_db->get_sub_types_of_property_name_by_id($props_type_of_propery);

                                    //Agent
                                    $agent_full_name                = $this->Users_db->get_user_full_name_by_id($props_agent_id);
                                    $agent_image_name                = $this->Users_db->get_image_name_by_id($props_agent_id);
                                    $agent_email                     = $this->Users_db->get_email_by_id($props_agent_id);
                                    $agent_status                     = $this->Users_db->get_status_by_id($props_agent_id);
                                    $agent_user_name                     = $this->Users_db->get_user_name_by_id($props_agent_id);
                                    $agent_user_phone                     = $this->Users_db->get_user_phone_by_id($props_agent_id);
                                    $agent_prop_counter                   = $this->Property_db->count_all_user_property($props_agent_id);


                                    $agent_email                                    =substr_replace($agent_email, 'XXXXXXXX', '5', '5');
                                    $agent_user_phone                               =substr_replace($agent_user_phone, 'XXXXX', '3', '5');


                                    $data['props_id']                               = $props_id;
                                    $data['agent_id']                               = $props_agent_id;
                                    $data['agent_user_name']                        = $agent_user_name;
                                    $data['props_state_id']                         = $props_state_id;
                                    $data['props_sub_state_id ']                    = $props_sub_state_id;
                                    $data['props_type_of_property_id ']             = $props_type_of_propery;
                                    $data['props_sub_type_of_property_id ']         = $props_sub_type_of_propery;



                           
                    ?>
<div class="page-wrapper">
    <div class="page-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Property</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Products Details</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="row g-0">
                <div class="col-md-4 border-end">
                    <img src="<?php echo base_url();?>project_dir/property/<?php echo $props_img_name;?>"
                        style="height:500px" class="img-fluid" alt="...">
                    <div class="row mb-3 row-cols-auto g-2 justify-content-center mt-3">

                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h4 class="card-title"><?php echo $props_name;?></h4>
                        <div class="d-flex gap-3 py-3">

                            <?php if($props_status == 'available'){?>
                            <div class="text-success"><i class="bx bxs-cart-alt align-middle"></i>
                                <?php echo $props_status;?></div>

                            <?php }else{?>

                            <div class="text-danger"><i class="bx bxs-info-square align-middle"></i>
                                <?php echo $props_status;?></div>
                            <?php }?>
                        </div>
                        <div class="mb-3">
                            <span class="price h4"><?php echo $props_price;?></span>
                        </div>
                        <p class="card-text fs-6"><?php echo $props_description;?></p>
                        <dl class="row">
                            <dt class="col-sm-6">Project Purpose</dt>
                            <dd class="col-sm-6"><?php echo ucfirst($props_purpose);?></dd>

                            <dt class="col-sm-6">Bedroom</dt>
                            <dd class="col-sm-6"><?php echo $props_bedrom;?></dd>

                            <dt class="col-sm-6">Bathroom</dt>
                            <dd class="col-sm-6"><?php echo $props_bathroom;?></dd>

                            <dt class="col-sm-6">Toilet</dt>
                            <dd class="col-sm-6"><?php echo $props_toilet;?></dd>

                            <dt class="col-sm-6">Types Of Property:</dt>
                            <dd class="col-sm-6"><?php echo $type_name;?></dd>

                            <dt class="col-sm-6">Sub Category Of Property Type:</dt>
                            <dd class="col-sm-6"><?php echo $sub_type_name;?></dd>

                        </dl>
                        <hr>

                        <div class="d-flex gap-3 mt-3">
                            <?php
                                if($user_status == 'promoter'){
                            ?>
                            <a href="#promote_product" data-bs-toggle="modal" class="btn btn-primary">Promote
                                Property</a>
                            <?php 
                                }
                            ?>

                            <a href="<?php echo base_url();?>Product/get_user_refered/<?php echo $props_id;?>"
                                data-bs-toggle="modal" class="btn btn-danger">View Downline
                                User</a>

                            <a href="#promote_product" data-bs-toggle="modal" class="btn btn-dark">Copy Link</a>
                        </div>



                        <!-- Approve Property -->
                        <div class="modal fade" id="promote_product" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Confirm Action</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure you want to Promote this Property
                                            (<?php echo $props_name;?>)?




                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <a href="<?php echo base_url();?>Product/promote_product/<?php echo $props_id;?>"
                                            class="btn btn-danger">Yes, Proceed</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <hr>
            <div class="card-body">
                <ul class="nav nav-tabs nav-primary mb-0" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" data-bs-toggle="tab" href="#primaryhome" role="tab"
                            aria-selected="false">
                            <div class="d-flex align-items-center">

                                <div class="tab-title"> Extra Details </div>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="tab" href="#primaryprofile" role="tab"
                            aria-selected="false">
                            <div class="d-flex align-items-center">

                                <div class="tab-title">Amenities</div>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="tab" href="#primarycontact" role="tab" aria-selected="true">
                            <div class="d-flex align-items-center">

                                <div class="tab-title">Facilities</div>
                            </div>
                        </a>
                    </li>



                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="tab" href="#primaryvaluation" role="tab"
                            aria-selected="true">
                            <div class="d-flex align-items-center">

                                <div class="tab-title">Valuation</div>
                            </div>
                        </a>
                    </li>

                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="tab" href="#primaryvideo" role="tab" aria-selected="true">
                            <div class="d-flex align-items-center">

                                <div class="tab-title">Video</div>
                            </div>
                        </a>
                    </li>

                </ul>
                <div class="tab-content pt-3">
                    <div class="tab-pane fade active show" id="primaryhome" role="tabpanel">
                        <div><b>Condition:</b>
                            <?php echo $props_condition;?>
                        </div>

                        <div><b>Caution Fee:</b>
                            <?php echo $props_caution_fee;?>
                        </div>

                        <div><b>Special Preference:</b>

                            <?php 
                                if(isset($props_special_pref)){
                                    $props_special_pref  =explode(",",$props_special_pref);;
                                    $i=0;
                                    for($i; $i<count($props_special_pref); $i++){
                            ?>
                            <div><i class="fadeIn animated bx bx-check" style="font-weight:bold; color:green;"></i>
                                <?php echo $props_special_pref[$i];?></div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="primaryprofile" role="tabpanel">
                        <div class="row">
                            <span>
                                <?php 
                                                                                                        if($props_air_condition =='yes'){?>
                                <i class="fadeIn animated bx bx-check" style="font-weight:bold; color:green;"></i>
                                <?php }else{?>
                                <i class="fadeIn animated bx bx-x" style="font-weight:bold; color:red;"></i>
                                <?php }?>

                                Air Condition
                            </span>
                        </div>

                        <div class="row">
                            <span>
                                <?php 
                                                                                                        if($props_balcony =='yes'){?>
                                <i class="fadeIn animated bx bx-check" style="font-weight:bold; color:green;"></i>
                                <?php }else{?>
                                <i class="fadeIn animated bx bx-x" style="font-weight:bold; color:red;"></i>
                                <?php }?>

                                Balcony
                            </span>
                        </div>

                        <div class="row">
                            <span>
                                <?php 
                                                                                                        if($props_bedding =='yes'){?>
                                <i class="fadeIn animated bx bx-check" style="font-weight:bold; color:green;"></i>
                                <?php }else{?>
                                <i class="fadeIn animated bx bx-x" style="font-weight:bold; color:red;"></i>
                                <?php }?>

                                Bedding
                            </span>
                        </div>


                        <div class="row">
                            <span>
                                <?php 
                                                                                                        if($props_cable_tv =='yes'){?>
                                <i class="fadeIn animated bx bx-check" style="font-weight:bold; color:green;"></i>
                                <?php }else{?>
                                <i class="fadeIn animated bx bx-x" style="font-weight:bold; color:red;"></i>
                                <?php }?>

                                Cable Tv
                            </span>
                        </div>


                        <div class="row">
                            <span>
                                <?php 
                                                                                                        if($props_cleaning_after_exit =='yes'){?>
                                <i class="fadeIn animated bx bx-check" style="font-weight:bold; color:green;"></i>
                                <?php }else{?>
                                <i class="fadeIn animated bx bx-x" style="font-weight:bold; color:red;"></i>
                                <?php }?>

                                Cleaning After Exit
                            </span>
                        </div>


                        <div class="row">
                            <span>
                                <?php 
                                                                                                        if($props_cofee_pot =='yes'){?>
                                <i class="fadeIn animated bx bx-check" style="font-weight:bold; color:green;"></i>
                                <?php }else{?>
                                <i class="fadeIn animated bx bx-x" style="font-weight:bold; color:red;"></i>
                                <?php }?>

                                Cofee Pot
                            </span>
                        </div>


                        <div class="row">
                            <span>
                                <?php 
                                                                                                        if($props_computer =='yes'){?>
                                <i class="fadeIn animated bx bx-check" style="font-weight:bold; color:green;"></i>
                                <?php }else{?>
                                <i class="fadeIn animated bx bx-x" style="font-weight:bold; color:red;"></i>
                                <?php }?>

                                Computer
                            </span>
                        </div>


                        <div class="row">
                            <span>
                                <?php 
                                                                                                        if($props_cot =='yes'){?>
                                <i class="fadeIn animated bx bx-check" style="font-weight:bold; color:green;"></i>
                                <?php }else{?>
                                <i class="fadeIn animated bx bx-x" style="font-weight:bold; color:red;"></i>
                                <?php }?>

                                Cot
                            </span>
                        </div>


                        <div class="row">
                            <span>
                                <?php 
                                                                                                        if($props_dishwasher =='yes'){?>
                                <i class="fadeIn animated bx bx-check" style="font-weight:bold; color:green;"></i>
                                <?php }else{?>
                                <i class="fadeIn animated bx bx-x" style="font-weight:bold; color:red;"></i>
                                <?php }?>

                                Dishwasher
                            </span>
                        </div>


                        <div class="row">
                            <span>
                                <?php 
                                                                                                        if($props_dvd =='yes'){?>
                                <i class="fadeIn animated bx bx-check" style="font-weight:bold; color:green;"></i>
                                <?php }else{?>
                                <i class="fadeIn animated bx bx-x" style="font-weight:bold; color:red;"></i>
                                <?php }?>

                                DVD
                            </span>
                        </div>


                        <div class="row">
                            <span>
                                <?php 
                                                                                                        if($props_fan =='yes'){?>
                                <i class="fadeIn animated bx bx-check" style="font-weight:bold; color:green;"></i>
                                <?php }else{?>
                                <i class="fadeIn animated bx bx-x" style="font-weight:bold; color:red;"></i>
                                <?php }?>

                                Fan
                            </span>
                        </div>


                        <div class="row">
                            <span>
                                <?php 
                                                                                                        if($props_fridge =='yes'){?>
                                <i class="fadeIn animated bx bx-check" style="font-weight:bold; color:green;"></i>
                                <?php }else{?>
                                <i class="fadeIn animated bx bx-x" style="font-weight:bold; color:red;"></i>
                                <?php }?>

                                Fridge
                            </span>
                        </div>


                        <div class="row">
                            <span>
                                <?php 
                                                                                                        if($props_grill =='yes'){?>
                                <i class="fadeIn animated bx bx-check" style="font-weight:bold; color:green;"></i>
                                <?php }else{?>
                                <i class="fadeIn animated bx bx-x" style="font-weight:bold; color:red;"></i>
                                <?php }?>

                                Grill
                            </span>
                        </div>


                        <div class="row">
                            <span>
                                <?php 
                                                                                                        if($props_hairdryer =='yes'){?>
                                <i class="fadeIn animated bx bx-check" style="font-weight:bold; color:green;"></i>
                                <?php }else{?>
                                <i class="fadeIn animated bx bx-x" style="font-weight:bold; color:red;"></i>
                                <?php }?>

                                Hairdryer
                            </span>
                        </div>


                        <div class="row">
                            <span>
                                <?php 
                                                                                                        if($props_heater =='yes'){?>
                                <i class="fadeIn animated bx bx-check" style="font-weight:bold; color:green;"></i>
                                <?php }else{?>
                                <i class="fadeIn animated bx bx-x" style="font-weight:bold; color:red;"></i>
                                <?php }?>

                                Heater
                            </span>
                        </div>


                        <div class="row">
                            <span>
                                <?php 
                                                                                                        if($props_hi_fi =='yes'){?>
                                <i class="fadeIn animated bx bx-check" style="font-weight:bold; color:green;"></i>
                                <?php }else{?>
                                <i class="fadeIn animated bx bx-x" style="font-weight:bold; color:red;"></i>
                                <?php }?>

                                Hi-FI
                            </span>
                        </div>


                        <div class="row">
                            <span>
                                <?php 
                                                                                                        if($props_internet =='yes'){?>
                                <i class="fadeIn animated bx bx-check" style="font-weight:bold; color:green;"></i>
                                <?php }else{?>
                                <i class="fadeIn animated bx bx-x" style="font-weight:bold; color:red;"></i>
                                <?php }?>

                                Internet
                            </span>
                        </div>


                        <div class="row">
                            <span>
                                <?php 
                                                                                                        if($props_iron =='yes'){?>
                                <i class="fadeIn animated bx bx-check" style="font-weight:bold; color:green;"></i>
                                <?php }else{?>
                                <i class="fadeIn animated bx bx-x" style="font-weight:bold; color:red;"></i>
                                <?php }?>

                                Iron
                            </span>
                        </div>


                        <div class="row">
                            <span>
                                <?php 
                                                                                                        if($props_juicer =='yes'){?>
                                <i class="fadeIn animated bx bx-check" style="font-weight:bold; color:green;"></i>
                                <?php }else{?>
                                <i class="fadeIn animated bx bx-x" style="font-weight:bold; color:red;"></i>
                                <?php }?>

                                Juicer
                            </span>
                        </div>


                        <div class="row">
                            <span>
                                <?php 
                                                                                                        if($props_lift =='yes'){?>
                                <i class="fadeIn animated bx bx-check" style="font-weight:bold; color:green;"></i>
                                <?php }else{?>
                                <i class="fadeIn animated bx bx-x" style="font-weight:bold; color:red;"></i>
                                <?php }?>

                                Lift
                            </span>
                        </div>


                        <div class="row">
                            <span>
                                <?php 
                                                                                                        if($props_microwave =='yes'){?>
                                <i class="fadeIn animated bx bx-check" style="font-weight:bold; color:green;"></i>
                                <?php }else{?>
                                <i class="fadeIn animated bx bx-x" style="font-weight:bold; color:red;"></i>
                                <?php }?>

                                Microwave
                            </span>
                        </div>

                        <div class="row">
                            <span>
                                <?php 
                                                                                                        if($props_gym =='yes'){?>
                                <i class="fadeIn animated bx bx-check" style="font-weight:bold; color:green;"></i>
                                <?php }else{?>
                                <i class="fadeIn animated bx bx-x" style="font-weight:bold; color:red;"></i>
                                <?php }?>

                                Gym
                            </span>
                        </div>

                        <div class="row">
                            <span>
                                <?php 
                                                                                                        if($props_fireplace =='yes'){?>
                                <i class="fadeIn animated bx bx-check" style="font-weight:bold; color:green;"></i>
                                <?php }else{?>
                                <i class="fadeIn animated bx bx-x" style="font-weight:bold; color:red;"></i>
                                <?php }?>

                                Fireplace
                            </span>
                        </div>

                        <div class="row">
                            <span>
                                <?php 
                                                                                                        if($props_hot_tub =='yes'){?>
                                <i class="fadeIn animated bx bx-check" style="font-weight:bold; color:green;"></i>
                                <?php }else{?>
                                <i class="fadeIn animated bx bx-x" style="font-weight:bold; color:red;"></i>
                                <?php }?>

                                Hot-Tub
                            </span>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="primarycontact" role="tabpanel">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3"><span>Shopping Mall </span></div>
                                    <div class="col-md-6"><span
                                            style="font-weight:bold;"><?php echo $props_shopping_mall;?></span></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3"><span>School </span></div>
                                    <div class="col-md-6"><span
                                            style="font-weight:bold;"><?php echo $props_school;?></span></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3"><span>Petrol Pump </span></div>
                                    <div class="col-md-6"><span
                                            style="font-weight:bold;"><?php echo $props_petrol_pump;?></span></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3"><span>Airport </span></div>
                                    <div class="col-md-6"><span
                                            style="font-weight:bold;"><?php echo $props_airport;?></span></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3"><span>Church </span></div>
                                    <div class="col-md-6"><span
                                            style="font-weight:bold;"><?php echo $props_church;?></span></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3"><span>Mosque </span></div>
                                    <div class="col-md-6"><span
                                            style="font-weight:bold;"><?php echo $props_mosque;?></span></div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="tab-pane fade" id="primaryvaluation" role="tabpanel">
                        <div class="progress" style="margin-bottom:1.5%;">
                            <div class="progress-bar bg-success" role="progressbar"
                                style="width: <?php echo $props_crime;?>%;" aria-valuenow="<?php echo $props_crime;?>"
                                aria-valuemin="0" aria-valuemax="100">Crime -<?php echo $props_crime;?>%</div>
                        </div>

                        <div class="progress" style="margin-bottom:1.5%;">
                            <div class="progress-bar bg-primary" role="progressbar"
                                style="width: <?php echo $props_traffic;?>%;"
                                aria-valuenow="<?php echo $props_traffic;?>" aria-valuemin="0" aria-valuemax="100">
                                Traffic -<?php echo $props_traffic;?>%</div>
                        </div>
                        <div class="progress" style="margin-bottom:1.5%;">
                            <div class="progress-bar bg-danger" role="progressbar"
                                style="width: <?php echo $props_pollution;?>%;"
                                aria-valuenow="<?php echo $props_pollution;?>" aria-valuemin="0" aria-valuemax="100">
                                Pollution -<?php echo $props_pollution;?>%</div>
                        </div>

                        <div class="progress" style="margin-bottom:1.5%;">
                            <div class="progress-bar bg-info" role="progressbar"
                                style="width: <?php echo $props_education;?>%;"
                                aria-valuenow="<?php echo $props_education;?>" aria-valuemin="0" aria-valuemax="100">
                                Education -<?php echo $props_education;?>%</div>
                        </div>

                        <div class="progress">
                            <div class="progress-bar bg-dark" role="progressbar"
                                style="width: <?php echo $props_health;?>%;" aria-valuenow="<?php echo $props_health;?>"
                                aria-valuemin="0" aria-valuemax="100">Health -<?php echo $props_health;?>%</div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="primaryvideo" role="tabpanel">
                        <?php echo $props_vid_id;?>
                    </div>
                </div>
            </div>

        </div>


    </div>
</div>

<?php 
        }
    }
?>