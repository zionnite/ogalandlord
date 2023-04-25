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
                    <div class="bg-property-slider-11 bg-no-repeat bg-size-cover"
                        style="background: url('<?php echo base_url();?>project_dir/property/<?php echo $slider_img;?>');">
                        <div class="property">
                            <div class="property-media overlay-wrapper p-top-100 p-bottom-50">
                                <div class="container p-top-100">

                                    <?php 
                                if($props_purpose == 'sale' || $props_purpose == 'rent'){
                            ?>
                                    <div
                                        class="badge badge-base text-white m-right-8 p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0 text-size-14 m-bottom-20">
                                        <?php echo $prop_mode;?></div>
                                    <?php } ?>

                                    <div
                                        class="badge badge-success p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0 text-size-14 m-bottom-20">
                                        For <?php echo ucfirst($props_purpose);?></div>
                                    <div class="clearfix"></div>
                                    <h2 class="text-white text-bold-600 text-size-50 text-size-40-sm m-bottom-10">
                                        <?php echo $props_price;?>
                                        <small class="text-size-18"></small>
                                    </h2>
                                    <h5><a class="text-white text-bold-500 text-size-30 text-size-25-sm text-white text-white-hover m-bottom-10"
                                            href="#"><?php echo $props_name;?></a></h5>
                                    <p class="text-white"><?php echo $get_state_name;?>,
                                        <?php echo $get_sub_state_name;?></p>
                                </div>
                                <div class="overlay bg-bg opacity-9"></div>
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

                                                    <?php 
                                        if(is_array($get_all_props_image)){
                                            foreach($get_all_props_image as $row){
                                                $dis_id             = $row['id'];
                                                $dis_image_name     = $row['image_name'];
                                        
                                    ?>

                                                    <div>
                                                        <a data-fancybox="slider"
                                                            href="<?php echo base_url();?>project_dir/property/<?php echo $dis_image_name;?>">
                                                            <img class="full-width"
                                                                src="<?php echo base_url();?>project_dir/property/<?php echo $dis_image_name;?>">
                                                        </a>
                                                    </div>

                                                    <?php 
                                            }
                                        }
                                    ?>

                                                </div>

                                                <div class="slick-thumbnail-nav thumbnails">
                                                    <?php 
                                                            if(is_array($get_all_props_image)){
                                                                foreach($get_all_props_image as $row){
                                                                    $dis_id             = $row['id'];
                                                                    $dis_image_name     = $row['image_name'];
                                                            
                                                        ?>

                                                    <div>
                                                        <img class="full-width"
                                                            src="<?php echo base_url();?>project_dir/property/<?php echo $dis_image_name;?>">
                                                    </div>

                                                    <?php 
                                                            }
                                                        }
                                                    ?>

                                                </div>


                                            </div>

                                        </div>
                                    </div>
                                    <!-- /SLIDER -->

                                    <!-- DESCTIPTION -->
                                    <div class="row">
                                        <div class="col-md-12 m-bottom-30">
                                            <div
                                                class="bg-white card-body p-top-30 p-bottom-30 p-left-30 p-right-30 box-shadow-1">
                                                <h3 class="text-bold-700 m-bottom-10">DESCRIPTION</h3>

                                                <div class="hr dark text-left m-bottom-20">
                                                    <hr
                                                        class="border-3 border-double border-light border-left-0 border-top-0 border-right-0">
                                                    <div class="icons text-light">
                                                        <i class="fa fa-circle-o"></i>
                                                        <i class="fa fa-circle-o"></i>
                                                        <i class="fa fa-circle-o"></i>
                                                    </div>
                                                    <hr
                                                        class="border-3 border-double border-light border-left-0 border-top-0 border-right-0">
                                                </div>

                                                <p><?php echo $props_description;?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /DESCTIPTION -->


                                    <!-- CONDITIONS -->
                                    <div class="row">
                                        <div class="col-md-12 m-bottom-30">
                                            <div
                                                class="bg-white card-body p-top-30 p-bottom-30 p-left-30 p-right-30 box-shadow-1">
                                                <h3 class="text-bold-700 m-bottom-10">CONDITIONS & SPECIAL PREFERENCES
                                                </h3>

                                                <div class="hr dark text-left m-bottom-20">
                                                    <hr
                                                        class="border-3 border-double border-light border-left-0 border-top-0 border-right-0">
                                                    <div class="icons text-light">
                                                        <i class="fa fa-circle-o"></i>
                                                        <i class="fa fa-circle-o"></i>
                                                        <i class="fa fa-circle-o"></i>
                                                    </div>
                                                    <hr
                                                        class="border-3 border-double border-light border-left-0 border-top-0 border-right-0">
                                                </div>

                                                <p><?php echo $props_condition;?></p>

                                                <h4>Special Preference</h4>
                                                <?php echo $props_special_pref;?>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /CONDITIONS -->


                                    <!-- DETAIL -->
                                    <div class="row">
                                        <div class="col-md-12 m-bottom-30">
                                            <div
                                                class="bg-white card-body p-top-30 p-bottom-30 p-left-30 p-right-30 box-shadow-1">
                                                <h3 class="text-bold-700 m-bottom-10">DETAILS</h3>

                                                <div class="hr dark text-left m-bottom-20">
                                                    <hr
                                                        class="border-3 border-double border-light border-left-0 border-top-0 border-right-0">
                                                    <div class="icons text-light">
                                                        <i class="fa fa-circle-o"></i>
                                                        <i class="fa fa-circle-o"></i>
                                                        <i class="fa fa-circle-o"></i>
                                                    </div>
                                                    <hr
                                                        class="border-3 border-double border-light border-left-0 border-top-0 border-right-0">
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
                                                            <div class="col-7 text-right"><?php echo $sub_type_name;?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="row m-bottom-10">
                                                            <div class="col-5"><strong>Purpose:</strong></div>
                                                            <div class="col-7 text-right"><?php echo $props_purpose;?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="row m-bottom-10">
                                                            <div class="col-5"><strong>Status:</strong></div>
                                                            <div class="col-7 text-right"><?php echo $props_status;?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="row m-bottom-10">
                                                            <div class="col-5"><strong>Bedrooms:</strong></div>
                                                            <div class="col-7 text-right"><?php echo $props_bedrom;?>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="row m-bottom-10">
                                                            <div class="col-5"><strong>Bathrooms:</strong></div>
                                                            <div class="col-7 text-right"><?php echo $props_bathroom;?>
                                                            </div>
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
                                                            <div class="col-7 text-right">
                                                                <?php echo $props_year_built;?></div>
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
                                            <div
                                                class="bg-white card-body p-top-30 p-bottom-30 p-left-30 p-right-30 box-shadow-1">
                                                <h3 class="text-bold-700 m-bottom-10">AMENITIES</h3>

                                                <div class="hr dark text-left m-bottom-20">
                                                    <hr
                                                        class="border-3 border-double border-light border-left-0 border-top-0 border-right-0">
                                                    <div class="icons text-light">
                                                        <i class="fa fa-circle-o"></i>
                                                        <i class="fa fa-circle-o"></i>
                                                        <i class="fa fa-circle-o"></i>
                                                    </div>
                                                    <hr
                                                        class="border-3 border-double border-light border-left-0 border-top-0 border-right-0">
                                                </div>

                                                <ul class="icon-list list-col-3 clearfix">
                                                    <li>
                                                        <?php 
                                            if($props_air_condition == 'yes'){
                                        ?>
                                                        <i class="btn btn-base rounded-0 fa fa-check"></i>Air
                                                        conditioning
                                                        <?php }else{?>
                                                        <i class="btn btn-secondary rounded-0 fa fa-close"></i>Air
                                                        conditioning
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
                                                        <i class="btn btn-base rounded-0 fa fa-check"></i>Cleaning after
                                                        exit
                                                        <?php }else{?>
                                                        <i class="btn btn-base rounded-0 fa fa-close"></i>Cleaning after
                                                        exit
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
                                                        <i
                                                            class="btn btn-secondary rounded-0 fa fa-check"></i>Dishwasher
                                                        <?php }else{?>
                                                        <i
                                                            class="btn btn-secondary rounded-0 fa fa-close"></i>Dishwasher
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
                                                        <i class="btn btn-secondary rounded-0 fa fa-check"></i>
                                                        Hairdryer
                                                        <?php }else{?>
                                                        <i class="btn btn-secondary rounded-0 fa fa-close"></i>
                                                        Hairdryer
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
                                            <div
                                                class="bg-white card-body p-top-30 p-bottom-30 p-left-30 p-right-30 box-shadow-1">
                                                <h3 class="text-bold-700 m-bottom-10">FACILITIES</h3>

                                                <div class="hr dark text-left m-bottom-20">
                                                    <hr
                                                        class="border-3 border-double border-light border-left-0 border-top-0 border-right-0">
                                                    <div class="icons text-light">
                                                        <i class="fa fa-circle-o"></i>
                                                        <i class="fa fa-circle-o"></i>
                                                        <i class="fa fa-circle-o"></i>
                                                    </div>
                                                    <hr
                                                        class="border-3 border-double border-light border-left-0 border-top-0 border-right-0">
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="row m-bottom-10">
                                                            <div class="col-8"><strong>Shopping Mall:</strong></div>
                                                            <div class="col-4 text-right">
                                                                <?php echo $props_shopping_mall;?></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="row m-bottom-10">
                                                            <div class="col-8"><strong>Hospital:</strong></div>
                                                            <div class="col-4 text-right"><?php echo $props_hospital;?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="row m-bottom-10">
                                                            <div class="col-8"><strong>School:</strong></div>
                                                            <div class="col-4 text-right"><?php echo $props_school;?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="row m-bottom-10">
                                                            <div class="col-8"><strong>Petrol Pump:</strong></div>
                                                            <div class="col-4 text-right">
                                                                <?php echo $props_petrol_pump;?></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="row m-bottom-10">
                                                            <div class="col-8"><strong>Airport:</strong></div>
                                                            <div class="col-4 text-right"><?php echo $props_airport;?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-8"><strong>Church:</strong></div>
                                                            <div class="col-4 text-right"><?php echo $props_church;?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-8"><strong>Mosque:</strong></div>
                                                            <div class="col-4 text-right"><?php echo $props_mosque;?>
                                                            </div>
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
                                            <div
                                                class="bg-white card-body p-top-30 p-bottom-30 p-left-30 p-right-30 box-shadow-1">
                                                <h3 class="text-bold-700 m-bottom-10">VALUATION</h3>

                                                <div class="hr dark text-left m-bottom-20">
                                                    <hr
                                                        class="border-3 border-double border-light border-left-0 border-top-0 border-right-0">
                                                    <div class="icons text-light">
                                                        <i class="fa fa-circle-o"></i>
                                                        <i class="fa fa-circle-o"></i>
                                                        <i class="fa fa-circle-o"></i>
                                                    </div>
                                                    <hr
                                                        class="border-3 border-double border-light border-left-0 border-top-0 border-right-0">
                                                </div>

                                                <div class="row">

                                                    <div class="col-md-12 m-bottom-15">
                                                        <div class="progress-label">
                                                            <div class="text-bold-600 m-bottom-5">Crime</div>
                                                        </div>
                                                        <div class="progress bg-light rounded-0">
                                                            <div class="progress-bar bg-base rounded-0"
                                                                data-appear-progress-animation="<?php echo $props_crime;?>%"
                                                                data-appear-animation-delay="300">
                                                                <span
                                                                    class="progress-bar-tooltip"><?php echo $props_crime;?>%</span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 m-bottom-15">
                                                        <div class="progress-label">
                                                            <div class="text-bold-600 m-bottom-5">Traffic</div>
                                                        </div>
                                                        <div class="progress bg-light rounded-0">
                                                            <div class="progress-bar bg-base rounded-0"
                                                                data-appear-progress-animation="<?php echo $props_traffic;?>%"
                                                                data-appear-animation-delay="300">
                                                                <span
                                                                    class="progress-bar-tooltip"><?php echo $props_traffic;?>%</span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 m-bottom-15">
                                                        <div class="progress-label">
                                                            <div class="text-bold-600 m-bottom-5">Pollution</div>
                                                        </div>
                                                        <div class="progress bg-light rounded-0">
                                                            <div class="progress-bar bg-base rounded-0"
                                                                data-appear-progress-animation="<?php echo $props_pollution;?>%"
                                                                data-appear-animation-delay="300">
                                                                <span
                                                                    class="progress-bar-tooltip"><?php echo $props_pollution;?>%</span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 m-bottom-15">
                                                        <div class="progress-label">
                                                            <div class="text-bold-600 m-bottom-5">Education</div>
                                                        </div>
                                                        <div class="progress bg-light rounded-0">
                                                            <div class="progress-bar bg-base rounded-0"
                                                                data-appear-progress-animation="<?php echo $props_education;?>%"
                                                                data-appear-animation-delay="300">
                                                                <span
                                                                    class="progress-bar-tooltip"><?php echo $props_education;?>%</span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 m-bottom-15">
                                                        <div class="progress-label">
                                                            <div class="text-bold-600 m-bottom-5">Health</div>
                                                        </div>
                                                        <div class="progress bg-light rounded-0">
                                                            <div class="progress-bar bg-base rounded-0"
                                                                data-appear-progress-animation="<?php echo $props_health;?>%"
                                                                data-appear-animation-delay="300">
                                                                <span
                                                                    class="progress-bar-tooltip"><?php echo $props_health;?>%</span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- /VALUATION -->



                                    <!-- Video -->
                                    <div class="row">
                                        <div class="col-md-12 m-bottom-30">
                                            <div
                                                class="bg-white card-body p-top-30 p-bottom-30 p-left-30 p-right-30 box-shadow-1">
                                                <h3 class="text-bold-700 m-bottom-10">VIDEO</h3>

                                                <div class="hr dark text-left m-bottom-20">
                                                    <hr
                                                        class="border-3 border-double border-light border-left-0 border-top-0 border-right-0">
                                                    <div class="icons text-light">
                                                        <i class="fa fa-circle-o"></i>
                                                        <i class="fa fa-circle-o"></i>
                                                        <i class="fa fa-circle-o"></i>
                                                    </div>
                                                    <hr
                                                        class="border-3 border-double border-light border-left-0 border-top-0 border-right-0">
                                                </div>

                                                <p><?php echo $props_vid_id;?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Video -->

                                    <!-- AGENT -->
                                    <div class="row">
                                        <div class="col-md-12 m-bottom-50">
                                            <div
                                                class="bg-white card-body p-top-30 p-bottom-30 p-left-30 p-right-30 box-shadow-1">
                                                <h3 class="text-bold-700 m-bottom-10">AGENT</h3>

                                                <div class="hr dark text-left m-bottom-20">
                                                    <hr
                                                        class="border-3 border-double border-light border-left-0 border-top-0 border-right-0">
                                                    <div class="icons text-light">
                                                        <i class="fa fa-circle-o"></i>
                                                        <i class="fa fa-circle-o"></i>
                                                        <i class="fa fa-circle-o"></i>
                                                    </div>
                                                    <hr
                                                        class="border-3 border-double border-light border-left-0 border-top-0 border-right-0">
                                                </div>

                                                <div class="row">
                                                    <div class="agent col-md-4 col-sm-12 match-height vcenter">
                                                        <div class="agent-media position-relative">
                                                            <a class="d-block" href="#">
                                                                <img class="full-width" alt="Agent"
                                                                    src="<?php echo base_url();?>project_dir/users/<?php echo $agent_user_name;?>/images/<?php echo $agent_image_name;?>">
                                                            </a>
                                                            <div class="media-data">
                                                                <div class="position-top">
                                                                    <div
                                                                        class="badge badge-base text-white pull-left p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0">
                                                                        <?php echo $agent_prop_counter;?> Properties
                                                                    </div>
                                                                </div>
                                                                <!-- <div class="position-bottom">
                                                    <a class="btn btn-white text-bold-600 text-spacing-5 text-size-13 pull-left line-height-18 rounded-0" href="#">
                                                        <i class="fa fa-building-o m-right-4"></i>
                                                        MK Builders
                                                    </a>
                                                </div> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 col-sm-12 match-height vcenter">
                                                        <div
                                                            class="agent-section position-relative p-top-10 p-right-15 p-left-15 p-top-30-sm p-bottom-25-sm">
                                                            <div class="agent-data m-top-0 m-bottom-20">
                                                                <h4 class="text-uppercase text-bold-700"><a
                                                                        href="javascript:;"
                                                                        class="text-base"><?php echo $agent_full_name;?></a>
                                                                </h4>
                                                                <!-- <p class="designation">123 Smith Dr, Annapolis, MD</p> -->
                                                            </div>
                                                            <ul class="icon-list">
                                                                <li><i class="btn btn-base rounded-0 fa fa-flag"></i>
                                                                    <?php echo $agent_status;?></li>
                                                                <li><i
                                                                        class="btn btn-base rounded-0 fa fa-envelope"></i>
                                                                    <?php echo $agent_email;?></li>
                                                                <li><i class="btn btn-base rounded-0 fa fa-phone"></i>
                                                                    <?php echo $agent_user_phone;?></li>
                                                            </ul>
                                                            <div class="p-top-10 p-right-15 p-bottom-10">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <a class="btn btn-base rounded-0 text-bold-600 text-spacing-5 text-uppercase text-size-13 m-bottom-10 p-left-15 p-right-15 m-right-4"
                                                                            href="<?php echo base_url();?>Request/request_inspection/<?php echo $props_id;?>/<?php echo $props_agent_id;?>">Request
                                                                            For Inspection</a>
                                                                        <a class="btn btn-base rounded-0 text-bold-600 text-spacing-5 text-uppercase text-size-13 m-bottom-10 p-left-15 p-right-15 m-right-4"
                                                                            href="<?php echo base_url();?>agent_property/<?php echo $props_agent_id ;?>/<?php echo $props_agent_id;?>">View
                                                                            Other Property By This Agent</a>
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

                                    <?php $this->load->view('front_end/other_property',$data);?>
                                    <!-- /SIMILAR PROPERTIES -->

                                </div>
                                <!-- /CONTENT -->

                                <!-- SIDEBAR -->
                                <div class="col-lg-4 col-md-12">

                                    <!-- SEARCH -->
                                    <?php $this->load->view('front_end/search_filter/sidebar_filter',$data);?>
                                    <!-- /SEARCH -->

                                    <!-- RECENTLY VIEW -->
                                    <!-- <div class="row">
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
                    </div> -->
                                    <!-- /RECENTLY VIEW -->

                                    <!-- FEATURED PROPERTIES -->
                                    <?php $this->load->view('front_end/nearby_property',$data);?>
                                    <!-- /FEATURED PROPERTIES -->

                                    <!-- PROPERTY TYPE -->
                                    <!-- <div class="row">
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
                    </div> -->
                                    <!-- /PROPERTY TYPE -->

                                    <!-- RECENT POST -->
                                    <!-- <div class="row">
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
                    </div> -->
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