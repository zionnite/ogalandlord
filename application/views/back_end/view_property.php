<?php
if($page_name == 'view_all_property'){
    $location       ='all_props';
    $title          ='View All Property';

}else if($page_name == 'view_all_pending_property'){
    $location       ='all_pending';
    $title          ='View All Pending Property';

}else if($page_name == 'view_all_approve_property'){
    $location       ='all_approved';
    $title          ='View All Approved Property';

}else if($page_name == 'view_all_unapprove_property'){
    $location       ='all_rejected';
    $title          ='View All Rejected Property';
}

else{
    $title          ="View Filter Property";
    $location       ="search_property";
}

?>

<style>
.props_image {

    height: 300px;
    overflow: hidden;
    background-position: top center;
    background-repeat: no-repeat;
}

.props_image img.card-img-top {
    margin: auto;
    min-height: 100%;
    min-width: 100%;
}

.float_right {
    float: right;
    margin: 0% 1%;
}

.follow_float {
    position: relative;
    float: right;
    margin: 0% 1%;
}
</style>

<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <!-- <div class="breadcrumb-title pe-3">View</div> -->
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

        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">

                        <div class="col-lg-12 col-xl-12">
                            <form class="" method="post" action="<?php echo base_url();?>Admin_panel/search_props">
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="position-relative">
                                            <input type="text" class="form-control ps-5" name="keyword"
                                                placeholder="Search Product..."> <span
                                                class="position-absolute top-50 product-show translate-middle-y"><i
                                                    class="bx bx-search"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="position-relative">
                                            <input type="submit" name="submit"
                                                class="btn btn-danger btn-sm btn-block p-2" value="Search">
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <?php echo isset($alert)?$alert:NULL;?>
        <div class="card">
            <div class="card-body">




                <div class="float_right" style="margin-top:1.7%;">
                    <div class="col-sm-1">
                        <div class="dropdown">
                            <button class="btn btn-warning dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="true">Type</button>
                            <ul class="dropdown-menu"
                                style="margin: 0px; position: absolute; inset: 0px auto auto 0px; transform: translate(0px, 38px);"
                                data-popper-placement="bottom-start">
                                <?php 
                                        $get_types_of_props		=$this->Admin_db->get_types_of_property();
                                        if(is_array($get_types_of_props)){
                                            foreach($get_types_of_props as $row){
                                                $id		= $row['id'];
                                                $name	= $row['name'];
                                        ?>
                                <li><a class="dropdown-item"
                                        href="<?php echo base_url();?>Admin_panel/fill_types/<?php echo $id;?>"><?php echo $name;?></a>
                                </li>

                                <?php 

                                            }
                                        }
                                        ?>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="follow_float" style="margin-top:1.7%;">
                    <div class="">
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="true">Purpose</button>
                            <ul class="dropdown-menu"
                                style="margin: 0px; position: absolute; inset: 0px auto auto 0px; transform: translate(0px, 38px);"
                                data-popper-placement="bottom-start">

                                <li><a class="dropdown-item"
                                        href="<?php echo base_url();?>Admin_panel/fill_purpose/rent">For Rent</a></li>
                                <li><a class="dropdown-item"
                                        href="<?php echo base_url();?>Admin_panel/fill_purpose/sale">For Sale</a></li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="follow_float" style="margin-top:1.7%;">
                    <div class="">
                        <div class="dropdown">
                            <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="true">State</button>
                            <ul class="dropdown-menu"
                                style="margin: 0px; position: absolute; inset: 0px auto auto 0px; transform: translate(0px, 38px);"
                                data-popper-placement="bottom-start">
                                <?php 
                                        $get_types_of_props		=$this->Admin_db->get_state();
                                        if(is_array($get_types_of_props)){
                                            foreach($get_types_of_props as $row){
                                                $id		= $row['id'];
                                                $name	= $row['name'];
                                        ?>
                                <li><a class="dropdown-item"
                                        href="<?php echo base_url();?>Admin_panel/fill_state_property/<?php echo $id;?>"><?php echo $name;?></a>
                                </li>

                                <?php 

                                            }
                                        }
                                        ?>
                            </ul>
                        </div>
                    </div>
                </div>

                <form action="<?php echo base_url();?>Admin_panel/date_search" method="post">
                    <div class="follow_float" style="margin-top:2.1%;">
                        <input type="submit" name="submit" class="btn btn-danger btn-sm btn-block" value="Go" />
                    </div>

                    <div class="follow_float" style="width:30%;">
                        <span>To Date</span>
                        <input type="date" name="to_date" class="form-control" required>
                    </div>

                    <div class="follow_float" style="width:30%;">
                        <span>From Date</span>
                        <input type="date" name="from_date" class="form-control" required />
                    </div>
                </form>




            </div>
        </div>





        <div class="row">
            <div class="col-xl-12 mx-auto">
                <h6 class="mb-0 text-uppercase"><?php echo $title;?></h6>
                <hr>
                <?php echo isset($alert)?$alert:NULL;?>

                <div class="row row-cols-1 row-cols-md-1 row-cols-lg-3 row-cols-xl-3">
                    <?php
                                if(is_array($get_property)){
                                    foreach($get_property as $row){
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
                                        $props_live_status                  = $row['live_status'];

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


                                        if(strlen($props_name) > 20) {
                                            $props_name = $props_name.' ';
                                            $props_name = substr($props_name, 0, 50);
                                            $props_name = substr($props_name, 0, strrpos($props_name ,' '));
                                            $props_name = $props_name.'...';
                                        }
                                        if(strlen($props_description) > 25) {
                                            $props_description = $props_description.' ';
                                            $props_description = substr($props_description, 0, 150);
                                            $props_description = substr($props_description, 0, strrpos($props_description ,' '));
                                            $props_description = $props_description.'...';
                                        }

                                        $get_state_name                 =$this->Admin_db->get_state_name_state_id($props_state_id);
                                        $get_sub_state_name             =$this->Admin_db->get_sub_state_name_sub_state_id($props_sub_state_id);

                                        $currency		='&#8358;';
										$props_price		    = $currency.$this->cart->format_number($props_price);
										$props_caution_fee		= $currency.$this->cart->format_number($props_caution_fee);
                                    
                            ?>
                    <div class="col">
                        <div class="card">
                            <div class="props_image">
                                <img src="<?php echo base_url();?>project_dir/property/<?php echo $props_img_name;?>"
                                    class="card-img-top">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $props_name;?></h5>
                                <p class="card-text"><?php echo $props_description;?></p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><?php echo $get_state_name.','.$get_sub_state_name;?></li>
                                <li class="list-group-item">
                                    <i class="fadeIn animated bx bx-bed" style="color: black;font-weight: bolder;"></i>
                                    <?php echo $props_bedrom;?> Bedroom ||
                                    <i class="fadeIn animated bx bx-bath" style="color: black;font-weight: bolder;"></i>
                                    <?php echo $props_bathroom;?> Bathroom ||
                                    <i class="lni lni-wheelbarrow" style="color: black;font-weight: bolder;"></i>
                                    <?php echo $props_toilet;?>Toilet
                                </li>
                                <li class="list-group-item">Purpose Type: <?php echo $props_purpose;?></li>

                                <li class="list-group-item">
                                    Property Live Status:
                                    <?php if($props_live_status =='pending'){?>
                                    <span class="badge bg-dark"><?php echo $props_live_status;?></span>
                                    <?php }else if($props_live_status == 'approved'){?>
                                    <span class="badge bg-success"><?php echo $props_live_status;?></span>
                                    <?php }else if($props_live_status == 'rejected'){?>
                                    <span class="badge bg-danger"><?php echo $props_live_status;?></span>
                                    <?php }?>
                                </li>

                            </ul>
                            <div class="card-body">
                                <a href="#read_more_<?php echo $props_id;?>" data-bs-toggle="modal"
                                    class="card-link">View More</a>
                                <a href="<?php echo base_url();?>Dashboard/manage_property_image/<?php echo $props_id;?>"
                                    class="card-link">Photos</a>
                                <?php if($props_live_status == 'pending'){?>

                                <a href="#approve_<?php echo $props_id;?>" data-bs-toggle="modal"
                                    class="card-link">Approve</a>
                                <a href="#reject_<?php echo $props_id;?>" data-bs-toggle="modal"
                                    class="card-link">Reject</a>

                                <?php }else if($props_live_status =='rejected'){?>

                                <a href="#approve_<?php echo $props_id;?>" data-bs-toggle="modal"
                                    class="card-link">Approve</a>

                                <?php }else if($props_live_status =='approved'){ ?>
                                <a href="#reject_<?php echo $props_id;?>" data-bs-toggle="modal"
                                    class="card-link">Reject</a>
                                <?php }?>


                                <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleFullScreenModal">Full Screen Modal</button> -->
                                <!-- modal-sm -->

                                <div class="modal fade" id="read_more_<?php echo $props_id;?>" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog  modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title"><?php echo $props_name;?></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">



                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Basic Property Detail</h5>
                                                        <hr>
                                                        <div class="accordion" id="accordionExample">


                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="headingOne">
                                                                    <button class="accordion-button collapsed"
                                                                        type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#collapseOne"
                                                                        aria-expanded="false"
                                                                        aria-controls="collapseOne">
                                                                        Basic Detail
                                                                    </button>
                                                                </h2>
                                                                <div id="collapseOne"
                                                                    class="accordion-collapse collapse"
                                                                    aria-labelledby="headingOne"
                                                                    data-bs-parent="#accordionExample" style="">
                                                                    <div class="accordion-body">
                                                                        <div class="row">
                                                                            <div class="col-md-12">

                                                                                <div class="col-md-6">
                                                                                    <div class="col-md-12">
                                                                                        <h4>Basic Property detail</h4>
                                                                                    </div>
                                                                                    <div class="row"
                                                                                        style="margin-top:1%;">
                                                                                        <div class="col-md-6">
                                                                                            <span>Project Name: </span>
                                                                                        </div>
                                                                                        <div class="col-md-6"><span
                                                                                                style="font-weight:bold;"><?php echo $props_name;?></span>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="row"
                                                                                        style="margin-top:1%;">
                                                                                        <div class="col-md-6">
                                                                                            <span>Project Purpose:
                                                                                            </span>
                                                                                        </div>
                                                                                        <div class="col-md-6"><span
                                                                                                style="font-weight:bold;"><?php echo $props_purpose;?></span>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="row"
                                                                                        style="margin-top:1%;">
                                                                                        <div class="col-md-6">
                                                                                            <span>Bedroom: </span>
                                                                                        </div>
                                                                                        <div class="col-md-6"><span
                                                                                                style="font-weight:bold;"><?php echo $props_bedrom;?></span>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="row"
                                                                                        style="margin-top:1%;">
                                                                                        <div class="col-md-6">
                                                                                            <span>Bathroom: </span>
                                                                                        </div>
                                                                                        <div class="col-md-6"><span
                                                                                                style="font-weight:bold;"><?php echo $props_bathroom;?></span>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="row"
                                                                                        style="margin-top:1%;">
                                                                                        <div class="col-md-6">
                                                                                            <span>Types Of Property:
                                                                                            </span>
                                                                                        </div>
                                                                                        <div class="col-md-6"><span
                                                                                                style="font-weight:bold;"><?php echo $props_type_of_propery;?></span>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="row"
                                                                                        style="margin-top:1%;">
                                                                                        <div class="col-md-6"><span>Sub
                                                                                                Category Of Property
                                                                                                Type: </span></div>
                                                                                        <div class="col-md-6"><span
                                                                                                style="font-weight:bold;"><?php echo $props_sub_type_of_propery;?></span>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="row"
                                                                                        style="margin-top:1%;">
                                                                                        <div class="col-md-6">
                                                                                            <span>Price: </span>
                                                                                        </div>
                                                                                        <div class="col-md-6"><span
                                                                                                style="font-weight:bold;"><?php echo $props_price;?></span>
                                                                                        </div>
                                                                                    </div>






                                                                                </div>
                                                                                <div class="row" style="margin-top:1%;">
                                                                                    <div class="col-md-12">
                                                                                        <span>Description: </span>
                                                                                    </div>
                                                                                    <div class="col-md-12"><span
                                                                                            style="font-weight:bold;"><?php echo $props_description;?></span>
                                                                                    </div>
                                                                                </div>

                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="headingTwo">
                                                                    <button class="accordion-button collapsed"
                                                                        type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#collapseTwo"
                                                                        aria-expanded="false"
                                                                        aria-controls="collapseTwo">
                                                                        Extra Details
                                                                    </button>
                                                                </h2>
                                                                <div id="collapseTwo"
                                                                    class="accordion-collapse collapse"
                                                                    aria-labelledby="headingTwo"
                                                                    data-bs-parent="#accordionExample" style="">
                                                                    <div class="accordion-body">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-md-12">
                                                                                        <span>Condition: </span>
                                                                                    </div>
                                                                                    <div class="col-md-12"><span
                                                                                            style="font-weight:bold;"><?php echo $props_condition;?></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-md-3"><span>Caution
                                                                                            Fee: </span></div>
                                                                                    <div class="col-md-6"><span
                                                                                            style="font-weight:bold;"><?php echo $props_caution_fee;?></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-md-3"><span>Special
                                                                                            Preference: </span></div>
                                                                                    <div class="col-md-6">


                                                                                        <?php 
                                                                                                                if(isset($props_special_pref)){
                                                                                                                    $props_special_pref  =explode(",",$props_special_pref);;
                                                                                                                    $i=0;
                                                                                                                    for($i; $i<count($props_special_pref); $i++){
                                                                                                                        ?>
                                                                                        <div><i class="fadeIn animated bx bx-check"
                                                                                                style="font-weight:bold; color:green;"></i>
                                                                                            <?php echo $props_special_pref[$i];?>
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
                                                                </div>
                                                            </div>



                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="headingThree">
                                                                    <button class="accordion-button collapsed"
                                                                        type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#collapseThree"
                                                                        aria-expanded="false"
                                                                        aria-controls="collapseThree">
                                                                        Amenities
                                                                    </button>
                                                                </h2>

                                                                <div id="collapseThree"
                                                                    class="accordion-collapse collapse"
                                                                    aria-labelledby="headingThree"
                                                                    data-bs-parent="#accordionExample" style="">
                                                                    <div class="accordion-body">

                                                                        <div class="row">
                                                                            <span>
                                                                                <?php 
                                                                                                        if($props_air_condition =='yes'){?>
                                                                                <i class="fadeIn animated bx bx-check"
                                                                                    style="font-weight:bold; color:green;"></i>
                                                                                <?php }else{?>
                                                                                <i class="fadeIn animated bx bx-x"
                                                                                    style="font-weight:bold; color:red;"></i>
                                                                                <?php }?>

                                                                                Air Condition
                                                                            </span>
                                                                        </div>

                                                                        <div class="row">
                                                                            <span>
                                                                                <?php 
                                                                                                        if($props_balcony =='yes'){?>
                                                                                <i class="fadeIn animated bx bx-check"
                                                                                    style="font-weight:bold; color:green;"></i>
                                                                                <?php }else{?>
                                                                                <i class="fadeIn animated bx bx-x"
                                                                                    style="font-weight:bold; color:red;"></i>
                                                                                <?php }?>

                                                                                Balcony
                                                                            </span>
                                                                        </div>

                                                                        <div class="row">
                                                                            <span>
                                                                                <?php 
                                                                                                        if($props_bedding =='yes'){?>
                                                                                <i class="fadeIn animated bx bx-check"
                                                                                    style="font-weight:bold; color:green;"></i>
                                                                                <?php }else{?>
                                                                                <i class="fadeIn animated bx bx-x"
                                                                                    style="font-weight:bold; color:red;"></i>
                                                                                <?php }?>

                                                                                Bedding
                                                                            </span>
                                                                        </div>


                                                                        <div class="row">
                                                                            <span>
                                                                                <?php 
                                                                                                        if($props_cable_tv =='yes'){?>
                                                                                <i class="fadeIn animated bx bx-check"
                                                                                    style="font-weight:bold; color:green;"></i>
                                                                                <?php }else{?>
                                                                                <i class="fadeIn animated bx bx-x"
                                                                                    style="font-weight:bold; color:red;"></i>
                                                                                <?php }?>

                                                                                Cable Tv
                                                                            </span>
                                                                        </div>


                                                                        <div class="row">
                                                                            <span>
                                                                                <?php 
                                                                                                        if($props_cleaning_after_exit =='yes'){?>
                                                                                <i class="fadeIn animated bx bx-check"
                                                                                    style="font-weight:bold; color:green;"></i>
                                                                                <?php }else{?>
                                                                                <i class="fadeIn animated bx bx-x"
                                                                                    style="font-weight:bold; color:red;"></i>
                                                                                <?php }?>

                                                                                Cleaning After Exit
                                                                            </span>
                                                                        </div>


                                                                        <div class="row">
                                                                            <span>
                                                                                <?php 
                                                                                                        if($props_cofee_pot =='yes'){?>
                                                                                <i class="fadeIn animated bx bx-check"
                                                                                    style="font-weight:bold; color:green;"></i>
                                                                                <?php }else{?>
                                                                                <i class="fadeIn animated bx bx-x"
                                                                                    style="font-weight:bold; color:red;"></i>
                                                                                <?php }?>

                                                                                Cofee Pot
                                                                            </span>
                                                                        </div>


                                                                        <div class="row">
                                                                            <span>
                                                                                <?php 
                                                                                                        if($props_computer =='yes'){?>
                                                                                <i class="fadeIn animated bx bx-check"
                                                                                    style="font-weight:bold; color:green;"></i>
                                                                                <?php }else{?>
                                                                                <i class="fadeIn animated bx bx-x"
                                                                                    style="font-weight:bold; color:red;"></i>
                                                                                <?php }?>

                                                                                Computer
                                                                            </span>
                                                                        </div>


                                                                        <div class="row">
                                                                            <span>
                                                                                <?php 
                                                                                                        if($props_cot =='yes'){?>
                                                                                <i class="fadeIn animated bx bx-check"
                                                                                    style="font-weight:bold; color:green;"></i>
                                                                                <?php }else{?>
                                                                                <i class="fadeIn animated bx bx-x"
                                                                                    style="font-weight:bold; color:red;"></i>
                                                                                <?php }?>

                                                                                Cot
                                                                            </span>
                                                                        </div>


                                                                        <div class="row">
                                                                            <span>
                                                                                <?php 
                                                                                                        if($props_dishwasher =='yes'){?>
                                                                                <i class="fadeIn animated bx bx-check"
                                                                                    style="font-weight:bold; color:green;"></i>
                                                                                <?php }else{?>
                                                                                <i class="fadeIn animated bx bx-x"
                                                                                    style="font-weight:bold; color:red;"></i>
                                                                                <?php }?>

                                                                                Dishwasher
                                                                            </span>
                                                                        </div>


                                                                        <div class="row">
                                                                            <span>
                                                                                <?php 
                                                                                                        if($props_dvd =='yes'){?>
                                                                                <i class="fadeIn animated bx bx-check"
                                                                                    style="font-weight:bold; color:green;"></i>
                                                                                <?php }else{?>
                                                                                <i class="fadeIn animated bx bx-x"
                                                                                    style="font-weight:bold; color:red;"></i>
                                                                                <?php }?>

                                                                                DVD
                                                                            </span>
                                                                        </div>


                                                                        <div class="row">
                                                                            <span>
                                                                                <?php 
                                                                                                        if($props_fan =='yes'){?>
                                                                                <i class="fadeIn animated bx bx-check"
                                                                                    style="font-weight:bold; color:green;"></i>
                                                                                <?php }else{?>
                                                                                <i class="fadeIn animated bx bx-x"
                                                                                    style="font-weight:bold; color:red;"></i>
                                                                                <?php }?>

                                                                                Fan
                                                                            </span>
                                                                        </div>


                                                                        <div class="row">
                                                                            <span>
                                                                                <?php 
                                                                                                        if($props_fridge =='yes'){?>
                                                                                <i class="fadeIn animated bx bx-check"
                                                                                    style="font-weight:bold; color:green;"></i>
                                                                                <?php }else{?>
                                                                                <i class="fadeIn animated bx bx-x"
                                                                                    style="font-weight:bold; color:red;"></i>
                                                                                <?php }?>

                                                                                Fridge
                                                                            </span>
                                                                        </div>


                                                                        <div class="row">
                                                                            <span>
                                                                                <?php 
                                                                                                        if($props_grill =='yes'){?>
                                                                                <i class="fadeIn animated bx bx-check"
                                                                                    style="font-weight:bold; color:green;"></i>
                                                                                <?php }else{?>
                                                                                <i class="fadeIn animated bx bx-x"
                                                                                    style="font-weight:bold; color:red;"></i>
                                                                                <?php }?>

                                                                                Grill
                                                                            </span>
                                                                        </div>


                                                                        <div class="row">
                                                                            <span>
                                                                                <?php 
                                                                                                        if($props_hairdryer =='yes'){?>
                                                                                <i class="fadeIn animated bx bx-check"
                                                                                    style="font-weight:bold; color:green;"></i>
                                                                                <?php }else{?>
                                                                                <i class="fadeIn animated bx bx-x"
                                                                                    style="font-weight:bold; color:red;"></i>
                                                                                <?php }?>

                                                                                Hairdryer
                                                                            </span>
                                                                        </div>


                                                                        <div class="row">
                                                                            <span>
                                                                                <?php 
                                                                                                        if($props_heater =='yes'){?>
                                                                                <i class="fadeIn animated bx bx-check"
                                                                                    style="font-weight:bold; color:green;"></i>
                                                                                <?php }else{?>
                                                                                <i class="fadeIn animated bx bx-x"
                                                                                    style="font-weight:bold; color:red;"></i>
                                                                                <?php }?>

                                                                                Heater
                                                                            </span>
                                                                        </div>


                                                                        <div class="row">
                                                                            <span>
                                                                                <?php 
                                                                                                        if($props_hi_fi =='yes'){?>
                                                                                <i class="fadeIn animated bx bx-check"
                                                                                    style="font-weight:bold; color:green;"></i>
                                                                                <?php }else{?>
                                                                                <i class="fadeIn animated bx bx-x"
                                                                                    style="font-weight:bold; color:red;"></i>
                                                                                <?php }?>

                                                                                Hi-FI
                                                                            </span>
                                                                        </div>


                                                                        <div class="row">
                                                                            <span>
                                                                                <?php 
                                                                                                        if($props_internet =='yes'){?>
                                                                                <i class="fadeIn animated bx bx-check"
                                                                                    style="font-weight:bold; color:green;"></i>
                                                                                <?php }else{?>
                                                                                <i class="fadeIn animated bx bx-x"
                                                                                    style="font-weight:bold; color:red;"></i>
                                                                                <?php }?>

                                                                                Internet
                                                                            </span>
                                                                        </div>


                                                                        <div class="row">
                                                                            <span>
                                                                                <?php 
                                                                                                        if($props_iron =='yes'){?>
                                                                                <i class="fadeIn animated bx bx-check"
                                                                                    style="font-weight:bold; color:green;"></i>
                                                                                <?php }else{?>
                                                                                <i class="fadeIn animated bx bx-x"
                                                                                    style="font-weight:bold; color:red;"></i>
                                                                                <?php }?>

                                                                                Iron
                                                                            </span>
                                                                        </div>


                                                                        <div class="row">
                                                                            <span>
                                                                                <?php 
                                                                                                        if($props_juicer =='yes'){?>
                                                                                <i class="fadeIn animated bx bx-check"
                                                                                    style="font-weight:bold; color:green;"></i>
                                                                                <?php }else{?>
                                                                                <i class="fadeIn animated bx bx-x"
                                                                                    style="font-weight:bold; color:red;"></i>
                                                                                <?php }?>

                                                                                Juicer
                                                                            </span>
                                                                        </div>


                                                                        <div class="row">
                                                                            <span>
                                                                                <?php 
                                                                                                        if($props_lift =='yes'){?>
                                                                                <i class="fadeIn animated bx bx-check"
                                                                                    style="font-weight:bold; color:green;"></i>
                                                                                <?php }else{?>
                                                                                <i class="fadeIn animated bx bx-x"
                                                                                    style="font-weight:bold; color:red;"></i>
                                                                                <?php }?>

                                                                                Lift
                                                                            </span>
                                                                        </div>


                                                                        <div class="row">
                                                                            <span>
                                                                                <?php 
                                                                                                        if($props_microwave =='yes'){?>
                                                                                <i class="fadeIn animated bx bx-check"
                                                                                    style="font-weight:bold; color:green;"></i>
                                                                                <?php }else{?>
                                                                                <i class="fadeIn animated bx bx-x"
                                                                                    style="font-weight:bold; color:red;"></i>
                                                                                <?php }?>

                                                                                Microwave
                                                                            </span>
                                                                        </div>

                                                                        <div class="row">
                                                                            <span>
                                                                                <?php 
                                                                                                        if($props_gym =='yes'){?>
                                                                                <i class="fadeIn animated bx bx-check"
                                                                                    style="font-weight:bold; color:green;"></i>
                                                                                <?php }else{?>
                                                                                <i class="fadeIn animated bx bx-x"
                                                                                    style="font-weight:bold; color:red;"></i>
                                                                                <?php }?>

                                                                                Gym
                                                                            </span>
                                                                        </div>

                                                                        <div class="row">
                                                                            <span>
                                                                                <?php 
                                                                                                        if($props_fireplace =='yes'){?>
                                                                                <i class="fadeIn animated bx bx-check"
                                                                                    style="font-weight:bold; color:green;"></i>
                                                                                <?php }else{?>
                                                                                <i class="fadeIn animated bx bx-x"
                                                                                    style="font-weight:bold; color:red;"></i>
                                                                                <?php }?>

                                                                                Fireplace
                                                                            </span>
                                                                        </div>

                                                                        <div class="row">
                                                                            <span>
                                                                                <?php 
                                                                                                        if($props_hot_tub =='yes'){?>
                                                                                <i class="fadeIn animated bx bx-check"
                                                                                    style="font-weight:bold; color:green;"></i>
                                                                                <?php }else{?>
                                                                                <i class="fadeIn animated bx bx-x"
                                                                                    style="font-weight:bold; color:red;"></i>
                                                                                <?php }?>

                                                                                Hot-Tub
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>



                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="headingFour">
                                                                    <button class="accordion-button collapsed"
                                                                        type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#collapseFour"
                                                                        aria-expanded="false"
                                                                        aria-controls="collapseFour">
                                                                        Facilities
                                                                    </button>
                                                                </h2>

                                                                <div id="collapseFour"
                                                                    class="accordion-collapse collapse"
                                                                    aria-labelledby="headingFour"
                                                                    data-bs-parent="#accordionExample" style="">
                                                                    <div class="accordion-body">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-md-3"><span>Shopping
                                                                                            Mall </span></div>
                                                                                    <div class="col-md-6"><span
                                                                                            style="font-weight:bold;"><?php echo $props_shopping_mall;?></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-md-3"><span>School
                                                                                        </span></div>
                                                                                    <div class="col-md-6"><span
                                                                                            style="font-weight:bold;"><?php echo $props_school;?></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-md-3"><span>Petrol
                                                                                            Pump </span></div>
                                                                                    <div class="col-md-6"><span
                                                                                            style="font-weight:bold;"><?php echo $props_petrol_pump;?></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-md-3"><span>Airport
                                                                                        </span></div>
                                                                                    <div class="col-md-6"><span
                                                                                            style="font-weight:bold;"><?php echo $props_airport;?></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-md-3"><span>Church
                                                                                        </span></div>
                                                                                    <div class="col-md-6"><span
                                                                                            style="font-weight:bold;"><?php echo $props_church;?></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-md-3"><span>Mosque
                                                                                        </span></div>
                                                                                    <div class="col-md-6"><span
                                                                                            style="font-weight:bold;"><?php echo $props_mosque;?></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="headingFive">
                                                                    <button class="accordion-button collapsed"
                                                                        type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#collapseFive"
                                                                        aria-expanded="false"
                                                                        aria-controls="collapseFive">
                                                                        Valuation
                                                                    </button>
                                                                </h2>

                                                                <div id="collapseFive"
                                                                    class="accordion-collapse collapse"
                                                                    aria-labelledby="headingFive"
                                                                    data-bs-parent="#accordionExample" style="">
                                                                    <div class="accordion-body">
                                                                        <div class="progress"
                                                                            style="margin-bottom:1.5%;">
                                                                            <div class="progress-bar bg-success"
                                                                                role="progressbar"
                                                                                style="width: <?php echo $props_crime;?>%;"
                                                                                aria-valuenow="<?php echo $props_crime;?>"
                                                                                aria-valuemin="0" aria-valuemax="100">
                                                                                Crime -<?php echo $props_crime;?>%</div>
                                                                        </div>

                                                                        <div class="progress"
                                                                            style="margin-bottom:1.5%;">
                                                                            <div class="progress-bar bg-primary"
                                                                                role="progressbar"
                                                                                style="width: <?php echo $props_traffic;?>%;"
                                                                                aria-valuenow="<?php echo $props_traffic;?>"
                                                                                aria-valuemin="0" aria-valuemax="100">
                                                                                Traffic -<?php echo $props_traffic;?>%
                                                                            </div>
                                                                        </div>
                                                                        <div class="progress"
                                                                            style="margin-bottom:1.5%;">
                                                                            <div class="progress-bar bg-danger"
                                                                                role="progressbar"
                                                                                style="width: <?php echo $props_pollution;?>%;"
                                                                                aria-valuenow="<?php echo $props_pollution;?>"
                                                                                aria-valuemin="0" aria-valuemax="100">
                                                                                Pollution
                                                                                -<?php echo $props_pollution;?>%</div>
                                                                        </div>

                                                                        <div class="progress"
                                                                            style="margin-bottom:1.5%;">
                                                                            <div class="progress-bar bg-info"
                                                                                role="progressbar"
                                                                                style="width: <?php echo $props_education;?>%;"
                                                                                aria-valuenow="<?php echo $props_education;?>"
                                                                                aria-valuemin="0" aria-valuemax="100">
                                                                                Education
                                                                                -<?php echo $props_education;?>%</div>
                                                                        </div>

                                                                        <div class="progress">
                                                                            <div class="progress-bar bg-dark"
                                                                                role="progressbar"
                                                                                style="width: <?php echo $props_health;?>%;"
                                                                                aria-valuenow="<?php echo $props_health;?>"
                                                                                aria-valuemin="0" aria-valuemax="100">
                                                                                Health -<?php echo $props_health;?>%
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>




                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="headingSix">
                                                                    <button class="accordion-button collapsed"
                                                                        type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#collapseSix"
                                                                        aria-expanded="false"
                                                                        aria-controls="collapseSix">
                                                                        Video
                                                                    </button>
                                                                </h2>

                                                                <div id="collapseSix"
                                                                    class="accordion-collapse collapse"
                                                                    aria-labelledby="headingSix"
                                                                    data-bs-parent="#accordionExample" style="">
                                                                    <div class="accordion-body">
                                                                        <?php echo $props_vid_id;?>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="edit_<?php echo $props_id;?>" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Property</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row row-cols-auto g-3">
                                                    <div class="col">
                                                        <a href="<?php echo base_url();?>Dashboard/edit_basic/<?php echo $props_id;?>"
                                                            class="btn-block btn btn-primary">Edit Basic Detail</a>
                                                    </div>

                                                    <div class="col"><a
                                                            href="<?php echo base_url();?>Dashboard/edit_amenities/<?php echo $props_id;?>"
                                                            class="btn btn-info btn-block">Edit Amenities Detail</a>
                                                    </div>


                                                    <div class="col">
                                                        <a href="<?php echo base_url();?>Dashboard/edit_extra_detail/<?php echo $props_id;?>"
                                                            class="btn btn-dark btn-block">Edit Extra Detail</a>
                                                    </div>

                                                </div>




                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!-- Approve Property -->
                                <div class="modal fade" id="approve_<?php echo $props_id;?>" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Confirm Action</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure you want to Approve this Property
                                                    (<?php echo $props_name;?>)?




                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <a href="<?php echo base_url();?>Admin_panel/approve_property/<?php echo $props_id;?>/<?php echo $location;?>/<?php echo $props_id;?>/<?php echo $props_agent_id;?>"
                                                    class="btn btn-danger">Yes, Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!-- Reject Property -->
                                <div class="modal fade" id="reject_<?php echo $props_id;?>" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Confirm Action</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="<?php echo base_url();?>Admin_panel/reject_property"
                                                method="post">
                                                <div class="modal-body">
                                                    <p>Are you sure you want to Change this Property
                                                        (<?php echo $props_name;?>) Live Status to Rejected?




                                                    <div class="form-group">
                                                        <textarea name="message" id="message" required
                                                            class="form-control"
                                                            placeholder="Give Reason why this property its rejected?"></textarea>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <input type="hidden" name="props_id"
                                                        value="<?php echo $props_id;?>" />
                                                    <input type="hidden" name="agent_id"
                                                        value="<?php echo $props_agent_id;?>" />
                                                    <input type="hidden" name="location"
                                                        value="<?php echo $location;?>" />
                                                    <input type="submit" name="submit" class="btn btn-danger btn-sm"
                                                        value="Yes, Continue" />
                                                </div>
                                            </form>
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



                </div>
            </div>
        </div>

        <?php 

                    if(!is_array($get_property)){
                        echo $get_property;
                    }
                ?>


        <?php echo $pagination;?>
    </div>
</div>