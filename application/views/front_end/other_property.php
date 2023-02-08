                    <div class="row">
                        <div class="col-md-12 m-bottom-30">
                            <h3 class="text-bold-700 m-bottom-10">OTHER PROPERTIES</h3>
                    
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

                            <?php 


                        $get_props              = $this->Property_db->get_other_props_randomly($props_id);
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

                                    //Agent
                                    $agent_full_name                = $this->Users_db->get_user_full_name_by_id($props_agent_id);
                                    $agent_image_name                = $this->Users_db->get_image_name_by_id($props_agent_id);
                                    $agent_email                     = $this->Users_db->get_email_by_id($props_agent_id);
                                    $agent_status                     = $this->Users_db->get_status_by_id($props_agent_id);
                                    $agent_user_name                     = $this->Users_db->get_user_name_by_id($props_agent_id);
                                    $agent_user_phone                     = $this->Users_db->get_user_phone_by_id($props_agent_id);
                                    $agent_prop_counter                   = $this->Property_db->count_all_user_property($props_agent_id);


                                    $agent_email                               =substr_replace($agent_email, 'XXXXXXXX', '5', '5');
                                    $agent_user_phone                          =substr_replace($agent_user_phone, 'XXXXX', '3', '5');



                           
                    ?>
                                <div class="col-md-6">
                                    <div class="property bg-white m-bottom-30 box-shadow-1 box-shadow-3-hover">
                                        <div class="property-media overlay-wrapper">
                                            <img class="full-width" src="<?php echo base_url();?>project_dir/property/<?php echo $props_img_name;?>" alt="Property 1">
                                            <div class="media-data">
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
                                                    <li class="list-inline-item"><i class="btn btn-base fa fa-bed"></i>  <?php echo $props_bedrom;?> Beds</li>
                                                    <li class="list-inline-item"><i class="btn btn-base fa fa-tint"></i> <?php echo $props_bathroom;?> Baths</li>
                                                    <!-- <li class="list-inline-item"><i class="btn btn-base fa fa-expand"></i> 36,000 Sq Ft</li> -->
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="bg-light-3 text-size-13 text-muted p-top-15 p-right-15 p-bottom-15 p-left-15">
                                            <ul class="list-unstyled d-flex justify-content-between m-bottom-0">
                                                <!-- <li><i class="m-right-4 fa fa-calendar"></i> 1 day ago</li> -->

                                                <?php 
                                                    if($favourite){
                                                ?>
                                                    <a class="text-blue text-base-hover" href="<?php echo base_url();?>Favourite/toogle_favourte/<?php echo $user_id;?>/<?php echo $props_id;?>">
                                                        <i class="m-right-4 fa fa-heart"  style="color:red;"></i> Favourite
                                                    </a>
                                                <?php }else{?>
                                                    <a class="text-blue text-base-hover" href="<?php echo base_url();?>Favourite/toogle_favourte/<?php echo $user_id;?>/<?php echo $props_id;?>">
                                                        <i class="m-right-4 fa fa-heart-o"  style="color:black;"></i> Favourite
                                                    </a>
                                                <?php } ?>
                                            </ul>
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