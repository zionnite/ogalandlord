<div class="bg-white p-bottom-60">
        <div class="container">

            <h2 class="text-bold-700 m-top-30 m-bottom-40">Newly Added</h2>

            <?php echo isset($alert)?$alert:NULL;?>
            <div class="row">

                <ul class="clearfix full-width" data-plugin-masonry>

                    <?php 
                        $currency		='&#8358;';
						$props_price		    = $currency.$this->cart->format_number(0);

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
                                    

                                    $count_props_image          = $this->Property_db->count_prop_images($props_id);
                                    $favourite                  = $this->Users_db->check_if_i_favourite($user_id,$props_id);

                                    $type_name                      = $this->Admin_db->get_types_of_property_name_by_id($props_type_of_propery);
                                    $sub_type_name                  = $this->Admin_db->get_sub_types_of_property_name_by_id($props_type_of_propery);



                           
                    ?>
                    <li class="col-lg-4 col-md-6">

                        <div class="property bg-light-2 m-bottom-30 box-shadow-1 box-shadow-2-hover border-1 border-solid border-light">
                            <div class="property-media overlay-wrapper">
                                <img class="full-width" src="<?php echo base_url();?>project_dir/property/<?php echo $props_img_name;?>" alt="<?php echo $props_name;?>">
                                <div class="media-data">
                                    <div class="position-top">
                                        <div class="text-white text-size-24 pull-right">

                                            <?php 
                                                if($favourite){
                                            ?>
                                                <a class="text-white text-base-hover" href="<?php echo base_url();?>Favourite/toogle_favourte/<?php echo $user_id;?>/<?php echo $props_id;?>">
                                                    <i class="fa fa-heart" style="color:red;"></i>
                                                </a>
                                            <?php }else{?>
                                                <a class="text-white text-base-hover" href="<?php echo base_url();?>Favourite/toogle_favourte/<?php echo $user_id;?>/<?php echo $props_id;?>">
                                                    <i class="fa fa-heart" style="color:white;"></i>
                                                </a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="position-bottom">
                                        <?php 
                                            if($props_purpose == 'sale' || $props_purpose == 'rent'){
                                        ?>
                                                <div class="badge badge-base text-white pull-left m-right-8 p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0"><?php echo $prop_mode;?></div>
                                        <?php }?>
                                        <div class="badge badge-success pull-left p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0">For <?php echo ucfirst($props_purpose);?></div>
                                        <div class="text-white text-size-18 pull-right"><i class="fa fa-camera"></i> <?php echo $count_props_image;?></div>
                                    </div>
                                </div>
                                <div class="overlay bg-bg opacity-9"></div>
                            </div>


                            <div class="property-section p-left-15 p-right-15">
                                <div class="m-top-20 m-bottom-20">
                                    <h2 class="text-base text-bold-700 m-top-15"><?php echo $props_price;?> <small class="text-size-14 text-muted"></small></h2>
                                    <h5><a class="text-bold-600 text-dark text-base-hover" 
                                        href="<?php echo base_url();?>view_property/<?php echo $props_id;?>"><?php echo $props_name;?></a></h5>
                                    <p><?php echo $get_state_name;?>,<?php echo $get_sub_state_name;?></p>
                                    <ul class="icon-list list-inline m-bottom-0">
                                        <li class="list-inline-item"><i class="btn btn-base rounded-0 fa fa-bed"></i> <?php echo $props_bedrom;?> Beds</li>
                                        <li class="list-inline-item"><i class="btn btn-base rounded-0 fa fa-tint"></i> <?php echo $props_bathroom;?> Baths</li>
                                        <!-- <li class="list-inline-item"><i class="btn btn-base rounded-0 fa fa-toilet"></i> <?php echo $props_toilet;?> Toilet</li> -->
                                    </ul>
                                </div>
                            </div>
                        </div>
                    
                    </li>

                    <?php 
                            }
                        }
                    ?>
                </ul>

            </div>

        </div>
    </div>