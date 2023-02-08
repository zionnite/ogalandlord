<div class="owl-carousel owl-theme owl-nav-wide" data-plugin-options="{'items': 1, 'margin': 10, 'nav': true, 'dots': false, 'animateOut': 'fadeOut', 'autoplay': true, 'autoplayTimeout': 6000}">
        <?php 
            $get_slider         =$this->Property_db->get_property_slider();
            if(is_array($get_slider)){
                foreach($get_slider as $row){

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

                    $get_state_name                     =$this->Admin_db->get_state_name_state_id($props_state_id);
                    $get_sub_state_name                 =$this->Admin_db->get_sub_state_name_sub_state_id($props_sub_state_id);

                    $currency		                    ='&#8358;';
					$props_price		                = $currency.$this->cart->format_number($props_price);

                    $count_props_image                  = $this->Property_db->count_prop_images($props_id);
                    $favourite                          = $this->Users_db->check_if_i_favourite($user_id,$props_id);

                    $type_name                          = $this->Admin_db->get_types_of_property_name_by_id($props_type_of_propery);
                    $sub_type_name                      = $this->Admin_db->get_sub_types_of_property_name_by_id($props_type_of_propery);


              
        ?>
            <div class="bg-property-slider-11 bg-no-repeat bg-size-cover" style="background: url('<?php echo base_url();?>project_dir/property/<?php echo $slider_img;?>');">
                <div class="property">
                    <div class="property-media overlay-wrapper p-top-100 p-bottom-50">
                        <div class="container p-top-100">

                            <?php 
                                if($props_purpose == 'sale' || $props_purpose == 'rent'){
                            ?>
                            <div class="badge badge-base text-white m-right-8 p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0 text-size-14 m-bottom-20"><?php echo $prop_mode;?></div>
                            <?php } ?>

                            <div class="badge badge-success p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0 text-size-14 m-bottom-20">For <?php echo ucfirst($props_purpose);?></div>
                            <div class="clearfix"></div>
                            <h2 class="text-white text-bold-600 text-size-50 text-size-40-sm m-bottom-10"><?php echo $props_price;?> <small class="text-size-18"></small></h2>
                            <h5><a class="text-white text-bold-500 text-size-30 text-size-25-sm text-white text-white-hover m-bottom-10" href="#"><?php echo $props_name;?></a></h5>
                            <p class="text-white"><?php echo $get_state_name;?>, <?php echo $get_sub_state_name;?></p>
                        </div>
                        <div class="overlay bg-bg opacity-9"></div>
                    </div>
                </div>
            </div>
        <?php 
                }
            }
        ?>

        
    </div>