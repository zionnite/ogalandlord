
<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('front_end/header_2');?>
<body data-menu="header-main-menu" class="bg-white body-main-menu header-main-menu">

    <!--
    #################################
        - Begin: HEADER -
    #################################
    -->
    <?php $this->load->view('front_end/header');?>
    <!-- End: HEADER -
    ################################################################## -->

    <!--
    #################################
        - Begin: PROPERTY -
    #################################
    -->
<?php 


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


                                        // if(strlen($props_name) > 20) {
                                        //     $props_name = $props_name.' ';
                                        //     $props_name = substr($props_name, 0, 50);
                                        //     $props_name = substr($props_name, 0, strrpos($props_name ,' '));
                                        //     $props_name = $props_name.'...';
                                        // }
                                        // if(strlen($props_description) > 25) {
                                        //     $props_description = $props_description.' ';
                                        //     $props_description = substr($props_description, 0, 150);
                                        //     $props_description = substr($props_description, 0, strrpos($props_description ,' '));
                                        //     $props_description = $props_description.'...';
                                        // }

                                        $get_state_name                 =$this->Admin_db->get_state_name_state_id($props_state_id);
                                        $get_sub_state_name             =$this->Admin_db->get_sub_state_name_sub_state_id($props_sub_state_id);

                                        $currency		='&#8358;';
										$props_price		    = $currency.$this->cart->format_number($props_price);
										$props_caution_fee		= $currency.$this->cart->format_number($props_caution_fee);
                                    

                                    $count_props_image          = $this->Property_db->count_prop_images($props_id);
                                    $favourite                  = $this->Users_db->check_if_i_favourite($user_id,$props_id);

                                    $type_name                      = $this->Admin_db->get_types_of_property_name_by_id($props_type_of_propery);
                                    $sub_type_name                  = $this->Admin_db->get_sub_types_of_property_name_by_id($props_type_of_propery);



                           
                    ?>
    <div class="bg-white box-shadow-1 z-index-10 position-relative p-top-60 p-bottom-30">
        <div class="container">

            <div class="row">
                <div class="col-md-8">
                    <div class="clearfix">
                        <div class="badge badge-base text-white pull-left m-right-8 m-bottom-15 p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0">Featured</div>
                        <div class="badge badge-success pull-left m-bottom-15 p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0">For Rent</div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <div class="m-bottom-30 clearfix">
                        <h2>Beautiful Small Apartment</h2>
                        <p>253 Lake Washington, USA</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="m-bottom-30 text-right">
                        <h1 class="text-bold-700 text-base">$250,000</h1>
                        <p class="">Per Month</p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="bg-light-3 p-top-60 p-bottom-60">
        <div class="container">

            <div class="row">

                <!-- CONTENT -->
                <div class="col-lg-8 col-md-12">

                    <!-- SLIDER -->
                    <div class="row m-bottom-30">
                        <div class="col-md-12">
                            <div class="thumbnail-slider">
                                <div class="slick-thumbnail">
                                    <div>
                                        <a data-fancybox="slider" href="<?php echo base_url();?>assets/images/property/property-1.jpg">
                                            <img alt="..." class="full-width" src="<?php echo base_url();?>assets/images/property/property-1.jpg">
                                        </a>
                                    </div>
                                    <div>
                                        <a data-fancybox="slider" href="<?php echo base_url();?>assets/images/property/property-2.jpg">
                                            <img alt="..." class="full-width" src="<?php echo base_url();?>assets/images/property/property-2.jpg">
                                        </a>
                                    </div>
                                    <div>
                                        <a data-fancybox="slider" href="<?php echo base_url();?>assets/images/property/property-3.jpg">
                                            <img alt="..." class="full-width" src="<?php echo base_url();?>assets/images/property/property-3.jpg">
                                        </a>
                                    </div>
                                    <div>
                                        <a data-fancybox="slider" href="<?php echo base_url();?>assets/images/property/property-4.jpg">
                                            <img alt="..." class="full-width" src="<?php echo base_url();?>assets/images/property/property-4.jpg">
                                        </a>
                                    </div>
                                    <div>
                                        <a data-fancybox="slider" href="<?php echo base_url();?>assets/images/property/property-5.jpg">
                                            <img alt="..." class="full-width" src="<?php echo base_url();?>assets/images/property/property-5.jpg">
                                        </a>
                                    </div>
                                    <div>
                                        <a data-fancybox="slider" href="<?php echo base_url();?>assets/images/property/property-6.jpg">
                                            <img alt="..." class="full-width" src="<?php echo base_url();?>assets/images/property/property-6.jpg">
                                        </a>
                                    </div>
                                </div>
                                <div class="slick-thumbnail-nav thumbnails">
                                    <div>
                                        <img alt="..." class="full-width" src="<?php echo base_url();?>assets/images/property/property-1.jpg">
                                    </div>
                                    <div>
                                        <img alt="..." class="full-width" src="<?php echo base_url();?>assets/images/property/property-2.jpg">
                                    </div>
                                    <div>
                                        <img alt="..." class="full-width" src="<?php echo base_url();?>assets/images/property/property-3.jpg">
                                    </div>
                                    <div>
                                        <img alt="..." class="full-width" src="<?php echo base_url();?>assets/images/property/property-4.jpg">
                                    </div>
                                    <div>
                                        <img alt="..." class="full-width" src="<?php echo base_url();?>assets/images/property/property-5.jpg">
                                    </div>
                                    <div>
                                        <img alt="..." class="full-width" src="<?php echo base_url();?>assets/images/property/property-6.jpg">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /SLIDER -->
                    
                    <!-- DESCTIPTION -->
                    <div class="row">
                        <div class="col-md-12 m-bottom-30">
                            <div class="bg-white card-body p-top-30 p-bottom-30 p-left-30 p-right-30 box-shadow-1">
                                <h3 class="text-bold-700 m-bottom-10">DESCRIPTION</h3>
                    
                                <div class="hr dark text-left m-bottom-20">
                                    <hr class="border-3 border-double border-light border-left-0 border-top-0 border-right-0">
                                    <div class="icons text-light">
                                        <i class="fa fa-circle-o"></i>
                                        <i class="fa fa-circle-o"></i>
                                        <i class="fa fa-circle-o"></i>
                                    </div>
                                    <hr class="border-3 border-double border-light border-left-0 border-top-0 border-right-0">
                                </div>
                    
                                <p><?php echo $props_description;?></p>
                            </div>
                        </div>
                    </div>
                    <!-- /DESCTIPTION -->
                   
                    
                    <!-- DETAIL -->
                    <div class="row">
                        <div class="col-md-12 m-bottom-30">
                            <div class="bg-white card-body p-top-30 p-bottom-30 p-left-30 p-right-30 box-shadow-1">
                                <h3 class="text-bold-700 m-bottom-10">DETAILS</h3>
                    
                                <div class="hr dark text-left m-bottom-20">
                                    <hr class="border-3 border-double border-light border-left-0 border-top-0 border-right-0">
                                    <div class="icons text-light">
                                        <i class="fa fa-circle-o"></i>
                                        <i class="fa fa-circle-o"></i>
                                        <i class="fa fa-circle-o"></i>
                                    </div>
                                    <hr class="border-3 border-double border-light border-left-0 border-top-0 border-right-0">
                                </div>

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="row m-bottom-10">
                                            <div class="col-5"><strong>Type:</strong></div>
                                            <div class="col-7 text-right"><?php echo $type_name;?></div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="row m-bottom-10">
                                            <div class="col-5"><strong>Sub-Type:</strong></div>
                                            <div class="col-7 text-right"><?php echo $sub_type_name;?></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row m-bottom-10">
                                            <div class="col-5"><strong>Purpose:</strong></div>
                                            <div class="col-7 text-right"><?php echo $props_purpose;?></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row m-bottom-10">
                                            <div class="col-5"><strong>Status:</strong></div>
                                            <div class="col-7 text-right"><?php echo $props_status;?></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row m-bottom-10">
                                            <div class="col-5"><strong>Bedrooms:</strong></div>
                                            <div class="col-7 text-right"><?php echo $props_bedrom;?></div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="row m-bottom-10">
                                            <div class="col-5"><strong>Bathrooms:</strong></div>
                                            <div class="col-7 text-right"><?php echo $props_bathroom;?></div>
                                        </div>
                                    </div>
                                   
                                    <!-- <div class="col-md-6">
                                        <div class="row m-bottom-10">
                                            <div class="col-5"><strong>Home Area:</strong></div>
                                            <div class="col-7 text-right">160 sqft</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row m-bottom-10">
                                            <div class="col-5"><strong>Lot Area:</strong></div>
                                            <div class="col-7 text-right">160 sqft</div>
                                        </div>
                                    </div> -->
                                    <div class="col-md-6">
                                        <div class="row m-bottom-10">
                                            <div class="col-5"><strong>Year Built:</strong></div>
                                            <div class="col-7 text-right"><?php echo $props_year_built;?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /DETAIL -->
                    
                    <!-- AMENITIES -->
                    <div class="row">
                        <div class="col-md-12 m-bottom-30">
                            <div class="bg-white card-body p-top-30 p-bottom-30 p-left-30 p-right-30 box-shadow-1">
                                <h3 class="text-bold-700 m-bottom-10">AMENITIES</h3>
                    
                                <div class="hr dark text-left m-bottom-20">
                                    <hr class="border-3 border-double border-light border-left-0 border-top-0 border-right-0">
                                    <div class="icons text-light">
                                        <i class="fa fa-circle-o"></i>
                                        <i class="fa fa-circle-o"></i>
                                        <i class="fa fa-circle-o"></i>
                                    </div>
                                    <hr class="border-3 border-double border-light border-left-0 border-top-0 border-right-0">
                                </div>

                                <ul class="icon-list list-col-3 clearfix">
                                    <li>
                                        <?php 
                                            if($props_air_condition == 'yes'){
                                        ?>
                                                <i class="btn btn-base rounded-0 fa fa-check"></i>Air conditioning
                                        <?php }else{?>
                                                <i class="btn btn-secondary rounded-0 fa fa-close"></i>Air conditioning
                                        <?php } ?>
                                    </li>

                                    <li>
                                        <?php if($props_balcony == 'yes'){?>
                                                <i class="btn btn-base rounded-0 fa fa-check"></i>Balcony
                                        <?php }else{?>
                                                <i class="btn btn-secondary rounded-0 fa fa-close"></i>Balcony
                                        <?php } ?>
                                    </li>


                                    <li>
                                        <?php if($props_bedding == 'yes'){?>
                                                <i class="btn btn-base rounded-0 fa fa-check"></i>Bedding
                                        <?php }else{?>
                                                <i class="btn btn-secondary rounded-0 fa fa-close"></i>Bedding
                                        <?php } ?>
                                    </li>

                                    <li>

                                        <?php if($props_cable_tv == 'yes'){?>
                                                <i class="btn btn-secondary rounded-0 fa fa-check"></i>Cable TV
                                        <?php }else{?>
                                                <i class="btn btn-secondary rounded-0 fa fa-close"></i>Cable TV
                                        <?php }?>
                                    </li>


                                    <li>
                                        <?php if($props_cleaning_after_exit =='yes'){?>
                                            <i class="btn btn-base rounded-0 fa fa-check"></i>Cleaning after exit
                                        <?php }else{?>
                                             <i class="btn btn-base rounded-0 fa fa-close"></i>Cleaning after exit
                                        <?php }?>
                                    </li>


                                    <li>
                                        <?php if($props_cofee_pot == 'yes'){?>
                                            <i class="btn btn-secondary rounded-0 fa fa-check"></i>Cofee pot
                                        <?php }else{?>
                                            <i class="btn btn-secondary rounded-0 fa fa-close"></i>Cofee pot
                                        <?php }?>
                                    </li>


                                    <li>
                                        <?php if($props_computer == 'yes'){?>
                                            <i class="btn btn-base rounded-0 fa fa-check"></i>Computer
                                        <?php }else{?>
                                            <i class="btn btn-base rounded-0 fa fa-close"></i>Computer
                                        <?php }?>
                                    </li>
                                    
                                    <li>
                                        <?php if($props_cot == 'yes'){?>
                                            <i class="btn btn-base rounded-0 fa fa-check"></i>Cot
                                        <?php }else{?> 
                                            <i class="btn btn-base rounded-0 fa fa-close"></i>Cot
                                        <?php }?>
                                    </li>


                                    <li>
                                        <?php if($props_dishwasher == 'yes'){?>
                                            <i class="btn btn-secondary rounded-0 fa fa-check"></i>Dishwasher
                                        <?php }else{?>
                                            <i class="btn btn-secondary rounded-0 fa fa-close"></i>Dishwasher
                                        <?php }?>
                                    </li>
                                    
                                    
                                    <li>
                                        <?php if($props_dvd == 'yes'){?>
                                            <i class="btn btn-base rounded-0 fa fa-check"></i>DVD
                                        <?php }else{?>
                                            <i class="btn btn-base rounded-0 fa fa-close"></i>DVD
                                        <?php }?>
                                    </li>


                                    <li>
                                        <?php if($props_fan == 'yes'){?>
                                            <i class="btn btn-secondary rounded-0 fa fa-check"></i>Fan
                                        <?php }else{?>
                                            <i class="btn btn-secondary rounded-0 fa fa-close"></i>Fan
                                        <?php }?>
                                    </li>
                                    
                                    <li>
                                        <?php if($props_fridge == 'yes'){?>
                                            <i class="btn btn-base rounded-0 fa fa-check"></i>Fridge
                                        <?php }else{?>
                                            <i class="btn btn-base rounded-0 fa fa-close"></i>Fridge
                                        <?php }?>
                                    
                                    </li>

                                    <li>
                                        <?php if($props_grill == 'yes'){?>
                                            <i class="btn btn-base rounded-0 fa fa-check"></i>Grill
                                        <?php }else{?>
                                            <i class="btn btn-base rounded-0 fa fa-close"></i>Grill
                                        <?php }?>
                                    </li>
                                    
                                    <li>
                                        <?php if($props_hairdryer == 'yes'){?>
                                            <i class="btn btn-secondary rounded-0 fa fa-check"></i> Hairdryer
                                        <?php }else{?>
                                            <i class="btn btn-secondary rounded-0 fa fa-close"></i> Hairdryer
                                        <?php }?>
                                    </li>


                                    <li>
                                        <?php if($props_heater == 'yes'){?>
                                            <i class="btn btn-secondary rounded-0 fa fa-check"></i>Heater
                                        <?php }else{?>
                                            <i class="btn btn-secondary rounded-0 fa fa-close"></i>Heater
                                        <?php }?>
                                    </li>


                                    <li>
                                        <?php if($props_hi_fi  == 'yes'){?>
                                            <i class="btn btn-base rounded-0 fa fa-check"></i>Hi-fi
                                        <?php }else{?>
                                            <i class="btn btn-base rounded-0 fa fa-close"></i>Hi-fi
                                        <?php } ?>
                                    </li>


                                    <li>
                                        <?php if($props_internet == 'yes'){?>
                                            <i class="btn btn-base rounded-0 fa fa-check"></i>Internet
                                        <?php }else{?>
                                            <i class="btn btn-base rounded-0 fa fa-close"></i>Internet
                                        <?php }?>
                                    </li>

                                    
                                    <li>
                                        <?php if($props_iron == 'yes'){?>
                                            <i class="btn btn-secondary rounded-0 fa fa-check"></i>Iron
                                        <?php }else{?>
                                            <i class="btn btn-secondary rounded-0 fa fa-close"></i>Iron
                                        <?php }?>
                                    </li>


                                    <li>
                                        <?php if($props_juicer == 'yes'){?>
                                            <i class="btn btn-base rounded-0 fa fa-check"></i>Juicer
                                        <?php }else{?>
                                            <i class="btn btn-base rounded-0 fa fa-close"></i>Juicer
                                        <?php }?>
                                    </li>


                                    <li>
                                        <?php if($props_lift == 'yes'){?>
                                            <i class="btn btn-secondary rounded-0 fa fa-check"></i>Lift
                                        <?php }else{?>
                                            <i class="btn btn-secondary rounded-0 fa fa-close"></i>Lift
                                        <?php }?>
                                    </li>


                                    <li>
                                        <?php if($props_microwave == 'yes'){?>
                                            <i class="btn btn-base rounded-0 fa fa-check"></i>Microwave
                                        <?php }else{?>
                                            <i class="btn btn-base rounded-0 fa fa-close"></i>Microwave
                                        <?php }?>
                                    </li>


                                    <li>
                                        <?php if($props_gym == 'yes'){?>
                                            <i class="btn btn-base rounded-0 fa fa-check"></i>Gym
                                        <?php }else{?>
                                            <i class="btn btn-base rounded-0 fa fa-close"></i>Gym
                                        <?php } ?>
                                    </li>


                                    <li>
                                        <?php if($props_fireplace == 'yes'){?>
                                            <i class="btn btn-base rounded-0 fa fa-check"></i>Fireplace
                                        <?php }else{?>
                                            <i class="btn btn-base rounded-0 fa fa-close"></i>Fireplace
                                        <?php } ?>
                                    </li>


                                    <li>
                                        <?php if($props_hot_tub == 'yes'){?>
                                            <i class="btn btn-base rounded-0 fa fa-check"></i>Hot Tub
                                        <?php }else{?>
                                            <i class="btn btn-base rounded-0 fa fa-close"></i>Hot Tub
                                        <?php } ?>
                                    </li>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /AMENITIES -->
                    
                    <!-- FACILITIES -->
                    <div class="row">
                        <div class="col-md-12 m-bottom-30">
                            <div class="bg-white card-body p-top-30 p-bottom-30 p-left-30 p-right-30 box-shadow-1">
                                <h3 class="text-bold-700 m-bottom-10">FACILITIES</h3>
                    
                                <div class="hr dark text-left m-bottom-20">
                                    <hr class="border-3 border-double border-light border-left-0 border-top-0 border-right-0">
                                    <div class="icons text-light">
                                        <i class="fa fa-circle-o"></i>
                                        <i class="fa fa-circle-o"></i>
                                        <i class="fa fa-circle-o"></i>
                                    </div>
                                    <hr class="border-3 border-double border-light border-left-0 border-top-0 border-right-0">
                                </div>
                    
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row m-bottom-10">
                                            <div class="col-8"><strong>Shopping Mall:</strong></div>
                                            <div class="col-4 text-right"><?php echo $props_shopping_mall;?></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row m-bottom-10">
                                            <div class="col-8"><strong>Hospital:</strong></div>
                                            <div class="col-4 text-right"><?php echo $props_hospital;?></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row m-bottom-10">
                                            <div class="col-8"><strong>School:</strong></div>
                                            <div class="col-4 text-right"><?php echo $props_school;?></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row m-bottom-10">
                                            <div class="col-8"><strong>Petrol Pump:</strong></div>
                                            <div class="col-4 text-right"><?php echo $props_petrol_pump;?></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row m-bottom-10">
                                            <div class="col-8"><strong>Airport:</strong></div>
                                            <div class="col-4 text-right"><?php echo $props_airport;?></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-8"><strong>Church:</strong></div>
                                            <div class="col-4 text-right"><?php echo $props_church;?></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-8"><strong>Mosque:</strong></div>
                                            <div class="col-4 text-right"><?php echo $props_mosque;?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /FACILITIES -->
                    
                    <!-- VALUATION -->
                    <div class="row">
                        <div class="col-md-12 m-bottom-30">
                            <div class="bg-white card-body p-top-30 p-bottom-30 p-left-30 p-right-30 box-shadow-1">
                                <h3 class="text-bold-700 m-bottom-10">VALUATION</h3>
                    
                                <div class="hr dark text-left m-bottom-20">
                                    <hr class="border-3 border-double border-light border-left-0 border-top-0 border-right-0">
                                    <div class="icons text-light">
                                        <i class="fa fa-circle-o"></i>
                                        <i class="fa fa-circle-o"></i>
                                        <i class="fa fa-circle-o"></i>
                                    </div>
                                    <hr class="border-3 border-double border-light border-left-0 border-top-0 border-right-0">
                                </div>
                    
                                <div class="row">
                                    
                                    <div class="col-md-12 m-bottom-15">
                                        <div class="progress-label">
                                            <div class="text-bold-600 m-bottom-5">Crime</div>
                                        </div>
                                        <div class="progress bg-light rounded-0">
                                            <div class="progress-bar bg-base rounded-0" data-appear-progress-animation="<?php echo $props_crime;?>%" data-appear-animation-delay="300">
                                                <span class="progress-bar-tooltip"><?php echo $props_crime;?>%</span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12 m-bottom-15">
                                        <div class="progress-label">
                                            <div class="text-bold-600 m-bottom-5">Traffic</div>
                                        </div>
                                        <div class="progress bg-light rounded-0">
                                            <div class="progress-bar bg-base rounded-0" data-appear-progress-animation="<?php echo $props_traffic;?>%" data-appear-animation-delay="300">
                                                <span class="progress-bar-tooltip"><?php echo $props_traffic;?>%</span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12 m-bottom-15">
                                        <div class="progress-label">
                                            <div class="text-bold-600 m-bottom-5">Pollution</div>
                                        </div>
                                        <div class="progress bg-light rounded-0">
                                            <div class="progress-bar bg-base rounded-0" data-appear-progress-animation="<?php echo $props_pollution;?>%" data-appear-animation-delay="300">
                                                <span class="progress-bar-tooltip"><?php echo $props_pollution;?>%</span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12 m-bottom-15">
                                        <div class="progress-label">
                                            <div class="text-bold-600 m-bottom-5">Education</div>
                                        </div>
                                        <div class="progress bg-light rounded-0">
                                            <div class="progress-bar bg-base rounded-0" data-appear-progress-animation="<?php echo $props_education;?>%" data-appear-animation-delay="300">
                                                <span class="progress-bar-tooltip"><?php echo $props_education;?>%</span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12 m-bottom-15">
                                        <div class="progress-label">
                                            <div class="text-bold-600 m-bottom-5">Health</div>
                                        </div>
                                        <div class="progress bg-light rounded-0">
                                            <div class="progress-bar bg-base rounded-0" data-appear-progress-animation="<?php echo $props_health;?>%" data-appear-animation-delay="300">
                                                <span class="progress-bar-tooltip"><?php echo $props_health;?>%</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <!-- /VALUATION -->
                    
                
                    <!-- AGENT -->
                    <div class="row">
                        <div class="col-md-12 m-bottom-50">
                            <div class="bg-white card-body p-top-30 p-bottom-30 p-left-30 p-right-30 box-shadow-1">
                                <h3 class="text-bold-700 m-bottom-10">AGENT</h3>
                    
                                <div class="hr dark text-left m-bottom-20">
                                    <hr class="border-3 border-double border-light border-left-0 border-top-0 border-right-0">
                                    <div class="icons text-light">
                                        <i class="fa fa-circle-o"></i>
                                        <i class="fa fa-circle-o"></i>
                                        <i class="fa fa-circle-o"></i>
                                    </div>
                                    <hr class="border-3 border-double border-light border-left-0 border-top-0 border-right-0">
                                </div>
                    
                                <div class="row">
                                    <div class="agent col-md-4 col-sm-12 match-height vcenter">
                                        <div class="agent-media position-relative">
                                            <a class="d-block" href="#">
                                                <img class="full-width" alt="Agent" src="<?php echo base_url();?>assets/images/agents/agent-1.jpg">
                                            </a>
                                            <div class="media-data">
                                                <div class="position-top">
                                                    <div class="badge badge-base text-white pull-left p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0">32 Properties</div>
                                                </div>
                                                <div class="position-bottom">
                                                    <a class="btn btn-white text-bold-600 text-spacing-5 text-size-13 pull-left line-height-18 rounded-0" href="#">
                                                        <i class="fa fa-building-o m-right-4"></i>
                                                        MK Builders
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-sm-12 match-height vcenter">
                                        <div class="agent-section position-relative p-top-10 p-right-15 p-left-15 p-top-30-sm p-bottom-25-sm">
                                            <div class="agent-data m-top-0 m-bottom-20">
                                                <h4 class="text-uppercase text-bold-700"><a href="#" class="text-base">David Smith</a></h4>
                                                <p class="designation">123 Smith Dr, Annapolis, MD</p>
                                            </div>
                                            <ul class="icon-list">
                                                <li><i class="btn btn-base rounded-0 fa fa-flag"></i> Buying Agent</li>
                                                <li><i class="btn btn-base rounded-0 fa fa-envelope"></i> jdoe@homely.com</li>
                                                <li><i class="btn btn-base rounded-0 fa fa-phone"></i> (123) 456-6789</li>
                                            </ul>
                                            <div class="p-top-10 p-right-15 p-bottom-10">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <a class="btn btn-base rounded-0 text-bold-600 text-spacing-5 text-uppercase text-size-13 m-bottom-10 p-left-15 p-right-15 m-right-4" href="#">Agent Detail</a>
                                                        <a class="btn btn-base rounded-0 text-bold-600 text-spacing-5 text-uppercase text-size-13 m-bottom-10 p-left-15 p-right-15 m-right-4" href="#">Contact Agent</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /AGENT -->
                    
                    <!-- SIMILAR PROPERTIES -->
                    <div class="row">
                        <div class="col-md-12 m-bottom-30">
                            <h3 class="text-bold-700 m-bottom-10">SIMILAR PROPERTIES</h3>
                    
                            <div class="hr dark text-left m-bottom-20">
                                <hr class="border-3 border-double border-light border-left-0 border-top-0 border-right-0">
                                <div class="icons text-light">
                                    <i class="fa fa-circle-o"></i>
                                    <i class="fa fa-circle-o"></i>
                                    <i class="fa fa-circle-o"></i>
                                </div>
                                <hr class="border-3 border-double border-light border-left-0 border-top-0 border-right-0">
                            </div>
                
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="property bg-white m-bottom-30 box-shadow-1 box-shadow-3-hover">
                                        <div class="property-media overlay-wrapper">
                                            <img class="full-width" src="<?php echo base_url();?>assets/images/property/property-1.jpg" alt="Property 1">
                                            <div class="media-data">
                                                <div class="position-bottom">
                                                    <div class="badge badge-base text-white pull-left m-right-8 p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0">Featured</div>
                                                    <div class="badge badge-success pull-left p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0">For Rent</div>
                                                    <div class="text-white text-size-18 pull-right"><i class="fa fa-camera"></i> 12</div>
                                                </div>
                                            </div>
                                            <div class="overlay bg-bg opacity-9"></div>
                                        </div>
                                        <div class="property-section p-left-15 p-right-15">
                                            <div class="m-top-20 m-bottom-20">
                                                <h2 class="text-base text-bold-700 m-top-15">$250,000 <small class="text-size-14 text-muted">Per Month</small></h2>
                                                <h5><a class="text-bold-600 text-dark text-base-hover" href="#">Beautiful Small Apartment</a></h5>
                                                <p>253 Lake Washington, USA</p>
                                                <ul class="icon-list list-inline m-bottom-0">
                                                    <li class="list-inline-item"><i class="btn btn-base fa fa-bed"></i> 5 Beds</li>
                                                    <li class="list-inline-item"><i class="btn btn-base fa fa-tint"></i> 3 Baths</li>
                                                    <li class="list-inline-item"><i class="btn btn-base fa fa-expand"></i> 36,000 Sq Ft</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="bg-light-3 text-size-13 text-muted p-top-15 p-right-15 p-bottom-15 p-left-15">
                                            <ul class="list-unstyled d-flex justify-content-between m-bottom-0">
                                                <li><i class="m-right-4 fa fa-calendar"></i> 1 day ago</li>
                                                <li><a href="#"><i class="m-right-4 fa fa-heart-o"></i> Favorate</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="property bg-white m-bottom-30 box-shadow-1 box-shadow-3-hover">
                                        <div class="property-media overlay-wrapper">
                                            <img class="full-width" src="<?php echo base_url();?>assets/images/property/property-3.jpg" alt="Property 3">
                                            <div class="media-data">
                                                <div class="position-bottom">
                                                    <div class="badge badge-base text-white pull-left m-right-8 p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0">Featured</div>
                                                    <div class="badge badge-success pull-left p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0">For Rent</div>
                                                    <div class="text-white text-size-18 pull-right"><i class="fa fa-camera"></i> 14</div>
                                                </div>
                                            </div>
                                            <div class="overlay bg-bg opacity-9"></div>
                                        </div>
                                        <div class="property-section p-left-15 p-right-15">
                                            <div class="m-top-20 m-bottom-20">
                                                <h2 class="text-base text-bold-700 m-top-15">$145,000 <small class="text-size-14 text-muted">Per Month</small></h2>
                                                <h5><a class="text-bold-600 text-dark text-base-hover" href="#">Global Land House</a></h5>
                                                <p>110 Lake, United Kingdom</p>
                                                <ul class="icon-list list-inline m-bottom-0">
                                                    <li class="list-inline-item"><i class="btn btn-base fa fa-bed"></i> 6 Beds</li>
                                                    <li class="list-inline-item"><i class="btn btn-base fa fa-tint"></i> 3 Baths</li>
                                                    <li class="list-inline-item"><i class="btn btn-base fa fa-expand"></i> 65,000 Sq Ft</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="bg-light-3 text-size-13 text-muted p-top-15 p-right-15 p-bottom-15 p-left-15">
                                            <ul class="list-unstyled d-flex justify-content-between m-bottom-0">
                                                <li><i class="m-right-4 fa fa-calendar"></i> 3 weeks ago</li>
                                                <li><a href="#"><i class="m-right-4 fa fa-heart-o"></i> Favorate</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- /SIMILAR PROPERTIES -->

                </div>
                <!-- /CONTENT -->

                <!-- SIDEBAR -->
                <div class="col-lg-4 col-md-12">

                    <!-- SEARCH -->
                    <div class="bg-white card-body box-shadow-1 m-bottom-30">
                
                        <div class="row">

                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label class="text-bold-700 text-uppercase text-size-13">- Property Type -</label>
                                    <select name="property_type_id" class="form-control rounded-0 bg-light-5">
                                        <option>-- Property Type --</option>
                                        <option value="1">House</option>
                                        <option value="2">Plots</option>
                                        <option value="3">Commercial</option>
                                        <option value="4">Appartments</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label class="text-bold-700 text-uppercase text-size-13">- Property Purpose -</label>
                                    <select name="property_purpose_id" class="form-control rounded-0 bg-light-5">
                                        <option>-- Property Purpose --</option>
                                        <option value="1">For Rent</option>
                                        <option value="2">For Sale</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label class="text-bold-700 text-uppercase text-size-13">- Price -</label>
                                    <div class="row">
                                        <div class="col-6">
                                            <input type="text" name="price_from" class="form-control rounded-0 bg-light-5" placeholder="Price from">
                                        </div>
                                        <div class="col-6">
                                            <input type="text" name="price_to" class="form-control rounded-0 bg-light-5" placeholder="Price to">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label class="text-bold-700 text-uppercase text-size-13">- Bedrooms -</label>
                                    <div class="row">
                                        <div class="col-6">
                                            <select name="bedroom_from_id" class="form-control rounded-0 bg-light-5">
                                                <option>-- From --</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <select name="bedroom_to_id" class="form-control rounded-0 bg-light-5">
                                                <option>-- To --</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label class="text-bold-700 text-uppercase text-size-13">- Bathrooms -</label>
                                    <div class="row">
                                        <div class="col-6">
                                            <select name="bathroom_from_id" class="form-control rounded-0 bg-light-5">
                                                <option>-- From --</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <select name="bathroom_to_id" class="form-control rounded-0 bg-light-5">
                                                <option>-- To --</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="collapse" id="advanced_search">

                            <div class="row">

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="text-bold-700 text-uppercase text-size-13">- Keyword -</label>
                                        <input type="text" name="keyword" class="form-control rounded-0 bg-light-5" placeholder="Enter Keyword Here">
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="text-bold-700 text-uppercase text-size-13">- Country -</label>
                                        <select name="country_id" class="form-control rounded-0 bg-light-5">
                                            <option>-- Country --</option>
                                            <option value="1">Pakistan</option>
                                            <option value="2">USA</option>
                                            <option value="3">United Kingdom</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="text-bold-700 text-uppercase text-size-13">- City -</label>
                                        <select name="city_id" class="form-control rounded-0 bg-light-5">
                                            <option>-- City --</option>
                                            <option value="1">Lahore</option>
                                            <option value="2">Faisalabad</option>
                                            <option value="3">Karachi</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="text-bold-700 text-uppercase text-size-13">- Location -</label>
                                        <input type="text" name="location" class="form-control rounded-0 bg-light-5" placeholder="Enter Location Here">
                                    </div>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-12">
                                    <h5 class="text-bold-700 text-uppercase m-top-10 m-bottom-20">Amenities</h5>
                                </div>

                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <label class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input">
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Air conditioning</span>
                                            </label>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <label class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input">
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Balcony</span>
                                            </label>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <label class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input">
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Bedding</span>
                                            </label>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <label class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input">
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Cable TV</span>
                                            </label>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <label class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input">
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Cofee pot</span>
                                            </label>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <label class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input">
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Computer</span>
                                            </label>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <label class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input">
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Cot</span>
                                            </label>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <label class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input">
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Dishwasher</span>
                                            </label>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <label class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input">
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">DVD</span>
                                            </label>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <label class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input">
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Fan</span>
                                            </label>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <label class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input">
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Fridge</span>
                                            </label>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <label class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input">
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Grill</span>
                                            </label>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <label class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input">
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Hairdryer</span>
                                            </label>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <label class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input">
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Heating</span>
                                            </label>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <label class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input">
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Hi-fi</span>
                                            </label>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <label class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input">
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Internet</span>
                                            </label>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <label class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input">
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Iron</span>
                                            </label>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <label class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input">
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Juicer</span>
                                            </label>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <label class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input">
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Lift</span>
                                            </label>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <label class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input">
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Microwave</span>
                                            </label>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <label class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input">
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Gym</span>
                                            </label>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <label class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input">
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Fireplace</span>
                                            </label>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <label class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input">
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Hot Tub</span>
                                            </label>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <label class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input">
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Cleaning after exit</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="row m-top-10">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-base rounded-0 text-bold-600 text-spacing-5 text-uppercase text-size-13 p-top-12 p-bottom-12 p-left-20 p-right-20"><i class="fa fa-search"></i> Search</button>
                                <a data-toggle="collapse" class="btn btn-default rounded-0 text-bold-600 text-spacing-5 text-uppercase text-size-13 p-top-12 p-bottom-12 p-left-20 p-right-20" href="#advanced_search"><i class="fa fa-cog"></i> Search Advance</a>
                            </div>
                        </div>

                    </div>
                    <!-- /SEARCH -->
                    
                    <!-- RECENTLY VIEW -->
                    <div class="row">
                        <div class="col-md-12 m-bottom-30">
                            <div class="bg-white card-body box-shadow-1">
                                <h5 class="text-bold-700 m-bottom-10">RECENTLY VIEWED</h5>
                    
                                <div class="hr dark text-left m-bottom-20">
                                    <hr class="border-3 border-double border-light border-left-0 border-top-0 border-right-0">
                                    <div class="icons text-light">
                                        <i class="fa fa-circle-o"></i>
                                        <i class="fa fa-circle-o"></i>
                                        <i class="fa fa-circle-o"></i>
                                    </div>
                                    <hr class="border-3 border-double border-light border-left-0 border-top-0 border-right-0">
                                </div>

                                <ul class="media-list">
                                    <li>
                                        <img alt="..." class="media-img" src="<?php echo base_url();?>assets/images/property/property-1-150x130.jpg">
                                        <div class="media-content">
                                            <h5 class="text-bold-700 text-base">$250,000</h5>
                                            <h6><a class="text-dark text-base-hover" href="#">Beautiful Small Apartment</a></h6>
                                            <p class="address">253 Lake Washington, USA</p>
                                        </div>
                                    </li>
                                    <li>
                                        <img alt="..." class="media-img" src="<?php echo base_url();?>assets/images/property/property-2-150x130.jpg">
                                        <div class="media-content">
                                            <h5 class="text-bold-700 text-base">$120,000</h5>
                                            <h6><a class="text-dark text-base-hover" href="#">Beautiful Garaes Condo</a></h6>
                                            <p class="address">154 Drive, New York</p>
                                        </div>
                                    </li>
                                    <li>
                                        <img alt="..." class="media-img" src="<?php echo base_url();?>assets/images/property/property-3-150x130.jpg">
                                        <div class="media-content">
                                            <h5 class="text-bold-700 text-base">$145,000</h5>
                                            <h6><a class="text-dark text-base-hover" href="#">Global Land House</a></h6>
                                            <p class="address">110 Lake, United Kingdom</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /RECENTLY VIEW -->
                    
                    <!-- ENQUIRE FORM -->
                    <div class="row">
                        <div class="col-md-12 m-bottom-30">
                            <div class="bg-white card-body box-shadow-1">
                                <h5 class="text-bold-700 m-bottom-10">ENQUIRE FORM</h5>
                    
                                <div class="hr dark text-left m-bottom-20">
                                    <hr class="border-3 border-double border-light border-left-0 border-top-0 border-right-0">
                                    <div class="icons text-light">
                                        <i class="fa fa-circle-o"></i>
                                        <i class="fa fa-circle-o"></i>
                                        <i class="fa fa-circle-o"></i>
                                    </div>
                                    <hr class="border-3 border-double border-light border-left-0 border-top-0 border-right-0">
                                </div>

                                <form>
                                    <div class="form-group">
                                        <input type="text" class="form-control rounded-0" placeholder="Name">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control rounded-0" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control rounded-0" placeholder="Phone">
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control rounded-0" rows="4" placeholder="Message"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-base rounded-0 text-bold-600 text-spacing-5 text-uppercase text-size-13 p-left-15 p-right-15" value="Submit">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /ENQUIRE FORM -->
                    
                    <!-- FEATURED PROPERTIES -->
                    <div class="row">
                        <div class="col-md-12 m-bottom-30">
                            <div class="bg-white card-body box-shadow-1">
                                <h5 class="text-bold-700 m-bottom-10">FEATURED PROPERTIES</h5>
                    
                                <div class="hr dark text-left m-bottom-20">
                                    <hr class="border-3 border-double border-light border-left-0 border-top-0 border-right-0">
                                    <div class="icons text-light">
                                        <i class="fa fa-circle-o"></i>
                                        <i class="fa fa-circle-o"></i>
                                        <i class="fa fa-circle-o"></i>
                                    </div>
                                    <hr class="border-3 border-double border-light border-left-0 border-top-0 border-right-0">
                                </div>

                                <div class="single-slider slick-single">
                                    <div>
                                        <div class="property m-bottom-15">
                                            <div class="property-media overlay-wrapper">
                                                <img alt="..." class="full-width" src="<?php echo base_url();?>assets/images/property/property-1.jpg">
                                                <div class="media-data">
                                                    <div class="position-top">
                                                        <div class="badge badge-base text-white pull-left m-right-8 p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0">Featured</div>
                                                        <div class="badge badge-success pull-left p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0">For Rent</div>
                                                        <div class="text-white text-size-24 pull-right"><a class="text-white text-base-hover" href="#"><i class="fa fa-heart-o"></i></a></div>
                                                    </div>
                                                    <div class="position-bottom">
                                                        <h2 class="text-white m-bottom-0 text-bold-700 pull-left">$250,000</h2>
                                                        <div class="clearfix"></div>
                                                        <p class="text-white m-bottom-0 pull-left">Per Month</p>
                                                        <div class="text-white text-size-18 pull-right line-height-0"><i class="fa fa-camera"></i> 12</div>
                                                    </div>
                                                </div>
                                                <div class="overlay bg-bg opacity-9"></div>
                                            </div>
                                            <div class="property-section">
                                                <div class="m-top-20 m-bottom-20">
                                                    <h5><a class="text-dark text-base-hover" href="#">Beautiful Small Apartment</a></h5>
                                                    <p>253 Lake Washington, USA</p>
                                                </div>
                                                <div class="bg-light-3 p-top-10 p-right-15 p-bottom-10 p-left-15">
                                                    <ul class="list-unstyled d-flex justify-content-between m-bottom-0">
                                                        <li><i class="m-right-4 fa fa-bed"></i> 5 Beds</li>
                                                        <li><i class="m-right-4 fa fa-tint"></i> 3 Baths</li>
                                                        <li><i class="m-right-4 fa fa-expand"></i> 36,000 Sq Ft</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="property m-bottom-15">
                                            <div class="property-media overlay-wrapper">
                                                <img alt="..." class="full-width" src="<?php echo base_url();?>assets/images/property/property-2.jpg">
                                                <div class="media-data">
                                                    <div class="position-top">
                                                        <div class="badge badge-base text-white pull-left m-right-8 p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0">Featured</div>
                                                        <div class="badge badge-success pull-left p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0">For Sale</div>
                                                        <div class="text-white text-size-24 pull-right"><a class="text-white text-base-hover" href="#"><i class="fa fa-heart-o"></i></a></div>
                                                    </div>
                                                    <div class="position-bottom">
                                                        <h2 class="text-white m-bottom-0 text-bold-700 pull-left">$120,000</h2>
                                                        <div class="clearfix"></div>
                                                        <p class="text-white m-bottom-0 pull-left">Per Month</p>
                                                        <div class="text-white text-size-18 pull-right line-height-0"><i class="fa fa-camera"></i> 6</div>
                                                    </div>
                                                </div>
                                                <div class="overlay bg-bg opacity-9"></div>
                                            </div>
                                            <div class="property-section">
                                                <div class="m-top-20 m-bottom-20">
                                                    <h5><a class="text-dark text-base-hover" href="#">Beautiful Garaes Condo</a></h5>
                                                    <p>154 Drive, New York</p>
                                                </div>
                                                <div class="bg-light-3 p-top-10 p-right-15 p-bottom-10 p-left-15">
                                                    <ul class="list-unstyled d-flex justify-content-between m-bottom-0">
                                                        <li><i class="m-right-4 fa fa-bed"></i> 4 Beds</li>
                                                        <li><i class="m-right-4 fa fa-tint"></i> 2 Baths</li>
                                                        <li><i class="m-right-4 fa fa-expand"></i> 45,000 Sq Ft</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="property m-bottom-15">
                                            <div class="property-media overlay-wrapper">
                                                <img alt="..." class="full-width" src="<?php echo base_url();?>assets/images/property/property-1.jpg">
                                                <div class="media-data">
                                                    <div class="position-top">
                                                        <div class="badge badge-base text-white pull-left m-right-8 p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0">Featured</div>
                                                        <div class="badge badge-success pull-left p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0">For Rent</div>
                                                        <div class="text-white text-size-24 pull-right"><a class="text-white text-base-hover" href="#"><i class="fa fa-heart-o"></i></a></div>
                                                    </div>
                                                    <div class="position-bottom">
                                                        <h2 class="text-white m-bottom-0 text-bold-700 pull-left">$145,000</h2>
                                                        <div class="clearfix"></div>
                                                        <p class="text-white m-bottom-0 pull-left">Per Month</p>
                                                        <div class="text-white text-size-18 pull-right line-height-0"><i class="fa fa-camera"></i> 14</div>
                                                    </div>
                                                </div>
                                                <div class="overlay bg-bg opacity-9"></div>
                                            </div>
                                            <div class="property-section">
                                                <div class="m-top-20 m-bottom-20">
                                                    <h5><a class="text-dark text-base-hover" href="#">Global Land House</a></h5>
                                                    <p>110 Lake, United Kingdom</p>
                                                </div>
                                                <div class="bg-light-3 p-top-10 p-right-15 p-bottom-10 p-left-15">
                                                    <ul class="list-unstyled d-flex justify-content-between m-bottom-0">
                                                        <li><i class="m-right-4 fa fa-bed"></i> 6 Beds</li>
                                                        <li><i class="m-right-4 fa fa-tint"></i> 3 Baths</li>
                                                        <li><i class="m-right-4 fa fa-expand"></i> 65,000 Sq Ft</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /FEATURED PROPERTIES -->

                    <!-- PROPERTY TYPE -->
                    <div class="row">
                        <div class="col-md-12 m-bottom-30">
                            <div class="bg-white card-body box-shadow-1">
                                <h5 class="text-bold-700 m-bottom-10">PROPERTY TYPE</h5>
                    
                                <div class="hr dark text-left m-bottom-20">
                                    <hr class="border-3 border-double border-light border-left-0 border-top-0 border-right-0">
                                    <div class="icons text-light">
                                        <i class="fa fa-circle-o"></i>
                                        <i class="fa fa-circle-o"></i>
                                        <i class="fa fa-circle-o"></i>
                                    </div>
                                    <hr class="border-3 border-double border-light border-left-0 border-top-0 border-right-0">
                                </div>

                                <ul class="icon-list">
                                    <li>
                                        <i class="btn btn-base fa fa-angle-double-right"></i>
                                        <a class="text-dark text-base-hover" href="#">Homes</a>
                                        <span>(10)</span>
                                    </li>
                                    <li>
                                        <i class="btn btn-base fa fa-angle-double-right"></i>
                                        <a class="text-dark text-base-hover" href="#">Plots</a>
                                        <span>(20)</span>
                                    </li>
                                    <li>
                                        <i class="btn btn-base fa fa-angle-double-right"></i>
                                        <a class="text-dark text-base-hover" href="#">Commercial</a>
                                        <span>(12)</span>
                                    </li>
                                    <li>
                                        <i class="btn btn-base fa fa-angle-double-right"></i>
                                        <a class="text-dark text-base-hover" href="#">Appartments</a>
                                        <span>(15)</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /PROPERTY TYPE -->

                    <!-- RECENT POST -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="bg-white card-body box-shadow-1">
                                <h5 class="text-bold-700 m-bottom-10">RECENT POSTS</h5>
                    
                                <div class="hr dark text-left m-bottom-20">
                                    <hr class="border-3 border-double border-light border-left-0 border-top-0 border-right-0">
                                    <div class="icons text-light">
                                        <i class="fa fa-circle-o"></i>
                                        <i class="fa fa-circle-o"></i>
                                        <i class="fa fa-circle-o"></i>
                                    </div>
                                    <hr class="border-3 border-double border-light border-left-0 border-top-0 border-right-0">
                                </div>

                                <ul class="media-list">
                                    <li>
                                        <img alt="..." class="media-img" src="<?php echo base_url();?>assets/images/blog/blog-1-150x130.jpg">
                                        <div class="media-content">
                                            <div class="meta m-bottom-5">
                                                <i class="fa fa-user text-muted"></i>
                                                <a class="text-dark text-base-hover" href="#">admin</a>
                                                <i class="fa fa-comments text-muted"></i>
                                                <a class="text-dark text-base-hover" href="#">24</a>
                                            </div>
                                            <h6><a class="text-base text-base-dark-hover" href="#">Fuisset partiendo quo cu sadipscing</a></h6>
                                            <div class="meta">
                                                <i class="fa fa-calendar text-muted"></i> 25, Jan 2017
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <img alt="..." class="media-img" src="<?php echo base_url();?>assets/images/blog/blog-2-150x130.jpg">
                                        <div class="media-content">
                                            <div class="meta m-bottom-5">
                                                <i class="fa fa-user text-muted"></i>
                                                <a class="text-dark text-base-hover" href="#">admin</a>
                                                <i class="fa fa-comments text-muted"></i>
                                                <a class="text-dark text-base-hover" href="#">24</a>
                                            </div>
                                            <h6><a class="text-base text-base-dark-hover" href="#">Fuisset partiendo quo cu sadipscing</a></h6>
                                            <div class="meta">
                                                <i class="fa fa-calendar text-muted"></i> 25, Jan 2017
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <img alt="..." class="media-img" src="<?php echo base_url();?>assets/images/blog/blog-3-150x130.jpg">
                                        <div class="media-content">
                                            <div class="meta m-bottom-5">
                                                <i class="fa fa-user text-muted"></i>
                                                <a class="text-dark text-base-hover" href="#">admin</a>
                                                <i class="fa fa-comments text-muted"></i>
                                                <a class="text-dark text-base-hover" href="#">24</a>
                                            </div>
                                            <h6><a class="text-base text-base-dark-hover" href="#">Fuisset partiendo quo cu sadipscing</a></h6>
                                            <div class="meta">
                                                <i class="fa fa-calendar text-muted"></i> 25, Jan 2017
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /RECENT POST -->

                </div>
                <!-- /SIDEBAR -->

            </div>

        </div>
    </div>
 
    <?php 
            }
        }
    ?>
    

    <footer class="footer">
        <div class="bg-dark p-top-60 p-bottom-30">
            <div class="container">
                
                <div class="row">
                    
                    <div class="col-md-12">
                        <div class="border-1 border-solid border-dark border-top-0 border-left-0 border-right-0 p-bottom-40 m-bottom-40">
                            
                            <div class="row">
                                
                                <div class="col-md-6">
                                    <!-- Begin: LOGO -->
                                    <a class="navbar-brand logo" href="index.html">
                                        <img class="full-width max-width-140 m-right-10" alt="iProperty" src="<?php echo base_url();?>assets/images/logo-white.png">
                                    </a>
                                    <span class="text-white">/ Real Buying Selling Property House</span>
                                    <!-- End: LOGO -->
                                </div>
                                
                                <div class="col-md-6">
                                    <!-- Begin: SOCIAL -->
                                    <ul class="social-icons m-top-15 text-right">
                                        <li>
                                            <a class="btn btn-base rounded-0" href="#"><i class="fa fa-facebook"></i></a>
                                        </li>
                                        <li>
                                            <a class="btn btn-base rounded-0" href="#"><i class="fa fa-instagram"></i></a>
                                        </li>
                                        <li>
                                            <a class="btn btn-base rounded-0" href="#"><i class="fa fa-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a class="btn btn-base rounded-0" href="#"><i class="fa fa-google-plus"></i></a>
                                        </li>
                                        <li>
                                            <a class="btn btn-base rounded-0" href="#"><i class="fa fa-linkedin"></i></a>
                                        </li>
                                    </ul>
                                    <!-- End: SOCIAL -->
                                </div>

                            </div>

                        </div>
                    </div>

                </div>
                
                <div class="row">
                    
                    <div class="col-lg-4 col-md-6">
                        <div class="m-bottom-30">
                            
                            <h5 class="text-bold-700 m-bottom-30 text-white text-uppercase">Recently Viewed</h5>

                            <div class="row">
                                <div class="col-md-12">

                                    <ul class="media-list">
                                        <li>
                                            <img alt="..." class="media-img" src="<?php echo base_url();?>assets/images/property/property-1-150x130.jpg">
                                            <div class="media-content">
                                                <h5 class="text-bold-700 text-base">$250,000</h5>
                                                <h6><a class="text-white text-base-hover" href="#">Beautiful Small Apartment</a></h6>
                                                <p class="address text-muted">253 Lake Washington, USA</p>
                                            </div>
                                        </li>
                                        <li>
                                            <img alt="..." class="media-img" src="<?php echo base_url();?>assets/images/property/property-2-150x130.jpg">
                                            <div class="media-content">
                                                <h5 class="text-bold-700 text-base">$120,000</h5>
                                                <h6><a class="text-white text-base-hover" href="#">Beautiful Garaes Condo</a></h6>
                                                <p class="address text-muted">154 Drive, New York</p>
                                            </div>
                                        </li>
                                        <li>
                                            <img alt="..." class="media-img" src="<?php echo base_url();?>assets/images/property/property-3-150x130.jpg">
                                            <div class="media-content">
                                                <h5 class="text-bold-700 text-base">$145,000</h5>
                                                <h6><a class="text-white text-base-hover" href="#">Global Land House</a></h6>
                                                <p class="address text-muted">110 Lake, United Kingdom</p>
                                            </div>
                                        </li>
                                    </ul>

                                </div>
                            </div>

                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-6">
                        <div class="m-bottom-30">
                            
                            <h5 class="text-bold-700 m-bottom-26 text-white text-uppercase">Popular Countries</h5>

                            <div class="row">
                                <div class="col-lg-12 col-md-12">

                                    <ul class="icon-list m-bottom-20">
                                        <li>
                                            <i class="btn btn-base fa fa-angle-double-right"></i>
                                            <a class="text-white text-base-hover" href="#">France</a>
                                            <span class="text-base float-right">(10)</span>
                                        </li>
                                        <li>
                                            <i class="btn btn-base fa fa-angle-double-right"></i>
                                            <a class="text-white text-base-hover" href="#">United States</a>
                                            <span class="text-base float-right">(20)</span>
                                        </li>
                                        <li>
                                            <i class="btn btn-base fa fa-angle-double-right"></i>
                                            <a class="text-white text-base-hover" href="#">China</a>
                                            <span class="text-base float-right">(12)</span>
                                        </li>
                                        <li>
                                            <i class="btn btn-base fa fa-angle-double-right"></i>
                                            <a class="text-white text-base-hover" href="#">Spain</a>
                                            <span class="text-base float-right">(15)</span>
                                        </li>
                                        <li>
                                            <i class="btn btn-base fa fa-angle-double-right"></i>
                                            <a class="text-white text-base-hover" href="#">Poland</a>
                                            <span class="text-base float-right">(25)</span>
                                        </li>
                                        <li>
                                            <i class="btn btn-base fa fa-angle-double-right"></i>
                                            <a class="text-white text-base-hover" href="#">Italy</a>
                                            <span class="text-base float-right">(10)</span>
                                        </li>
                                        <li>
                                            <i class="btn btn-base fa fa-angle-double-right"></i>
                                            <a class="text-white text-base-hover" href="#">Turkey</a>
                                            <span class="text-base float-right">(20)</span>
                                        </li>
                                        <li>
                                            <i class="btn btn-base fa fa-angle-double-right"></i>
                                            <a class="text-white text-base-hover" href="#">United Kingdom</a>
                                            <span class="text-base float-right">(12)</span>
                                        </li>
                                        <li>
                                            <i class="btn btn-base fa fa-angle-double-right"></i>
                                            <a class="text-white text-base-hover" href="#">Germany</a>
                                            <span class="text-base float-right">(15)</span>
                                        </li>
                                        <li>
                                            <i class="btn btn-base fa fa-angle-double-right"></i>
                                            <a class="text-white text-base-hover" href="#">Singapore</a>
                                            <span class="text-base float-right">(25)</span>
                                        </li>
                                    </ul>

                                </div>
                            </div>

                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-12">
                        <div class="m-bottom-30">
                            
                            <div class="row">

                                <div class="col-lg-12 col-md-6">
                                    <h5 class="text-bold-700 m-bottom-30 text-white text-uppercase">Contact Us</h5>

                                    <div class="row m-bottom-20">
                                        <div class="col-md-12">
                                            
                                            <p class="text-white">Address: 253 Lake Washington, USA</p>
                                            <p class="text-white">Phone: (123) 123-456</p>
                                            <p class="text-white">E-Mail: <a class="text-base border-1 border-dotted border-light border-top-0 border-left-0 border-right-0" href="#">office@example.com</a></p>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-6">
                                    
                                    <h5 class="text-bold-700 m-bottom-30 text-white text-uppercase">Newsletter</h5>

                                    <div class="row m-bottom-20">
                                        <div class="col-md-12">
                                            
                                            <form>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <input type="email" class="form-control form-control-lg rounded-0 bg-white text-size-14" placeholder="Enter your email">
                                                        <button type="submit" class="input-group-addon btn btn-base rounded-0 text-bold-600 text-spacing-5 text-uppercase text-size-13  p-top-12 p-bottom-12 p-left-20 p-right-20"><i class="fa fa-envelope"></i></button>
                                                    </div>
                                                </div>
                                                <p class="text-muted">Subscribe to our newsletter and we will inform you about newset projects and promotions</p>
                                            </form>

                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </div>

        <div class="bg-base p-top-30 p-bottom-20">
            <div class="container">
                <p class="text-white m-bottom-6">© Copyright 2017 <a class="text-white border-1 border-dotted border-light border-top-0 border-left-0 border-right-0" href="index.html">iProperty</a>. All Rights Reserved.</p>
            </div>
        </div>
    </footer>
    <!-- End: FOOTER -
    ################################################################## -->

   <?php $this->load->view('front_end/js_file_2');?>
    
</body>

</html>