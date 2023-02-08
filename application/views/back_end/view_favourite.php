<style>
    .props_image{
        
        height: 300px;
        overflow: hidden;
        background-position: top center;
        background-repeat: no-repeat;
    }

    .props_image img.card-img-top{
        margin: auto;
        min-height: 100%;
        min-width: 100%;
    }
</style>

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
								<li class="breadcrumb-item active" aria-current="page">Favourite</li>
							</ol>
						</nav>
					</div>
					
				</div>
				<!--end breadcrumb-->


				<div class="row">
					<div class="col-xl-12 mx-auto">
						<h6 class="mb-0 text-uppercase">View Favourite</h6>
						<hr>
						<?php echo isset($alert)?$alert:NULL;?>
						
						<div class="row row-cols-1 row-cols-md-1 row-cols-lg-3 row-cols-xl-3">
                            <?php
                            if(is_array($get_fav)){
                                foreach($get_fav as $low){
                                    $fav_id              = $low['id'];
                                    $fav_props_id        = $low['prop_id'];

                                    $get_property        = $this->Property_db->get_props_by_id($fav_props_id);
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
                                            $live_status                        = $row['live_status'];

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

                                            $inspection_checker			=$this->Request_db->check_if_user_n_props_exist_in_request($user_id,$props_agent_id,$props_id);


                                    
                            ?>
                                        <div class="col">
                                            <div class="card">
                                                <div class="props_image">
                                                    <img src="<?php echo base_url();?>project_dir/property/<?php echo $props_img_name;?>" class="card-img-top">
                                                </div>
                                                <div class="card-body">
                                                    <h5 class="card-title"><?php echo $props_name;?></h5>
                                                    <p class="card-text"><?php echo $props_description;?></p>
                                                </div>
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item"><?php echo $get_state_name.','.$get_sub_state_name;?></li>
                                                    <li class="list-group-item">
                                                        <i class="fadeIn animated bx bx-bed" style="color: black;font-weight: bolder;"></i> <?php echo $props_bedrom;?> Bedroom || 
                                                        <i class="fadeIn animated bx bx-bath" style="color: black;font-weight: bolder;"></i> <?php echo $props_bathroom;?> Bathroom ||
                                                        <i class="lni lni-wheelbarrow" style="color: black;font-weight: bolder;"></i> <?php echo $props_toilet;?>Toilet
                                                    </li>
                                                    <?php if($props_status == 'available'){?>
                                                            <li class="list-group-item">Availability Status: <span class="badge bg-success"><?php echo ucfirst($props_status);?></span></li>
                                                    <?php }else if($props_status == 'unavailable'){?>
                                                            <li class="list-group-item">Availability Status: <span class="badge bg-danger"><?php echo ucfirst($props_status);?></span></li>
                                                    <?php } ?>
                                                    <li class="list-group-item">Purpose Type: <?php echo $props_purpose;?></li>
                                                </ul>
                                                <div class="card-body">	
                                                    <a href="<?php echo base_url();?>view_property/<?php echo $props_id;?>" target="_blank" class="card-link">More Detail</a>
                                                    <?php if(!$inspection_checker){?>
                                                        <a href="#request_<?php echo $fav_id;?>" data-bs-toggle="modal" class="card-link">Request For Inspection</a>
                                                    <?php };?>
                                                    <a href="#delete_<?php echo $fav_id;?>" data-bs-toggle="modal" class="card-link">Delete</a>
                                                   


                                                    <!-- Delete Property -->
                                                    <div class="modal fade" id="request_<?php echo $fav_id;?>" tabindex="-1" aria-hidden="true">
                                                        <div class="modal-dialog modal-sm">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Confirm Action</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Are you sure you want to Request for Site Inpsection for this Property (<?php echo $props_name;?>)?
                                                                                                            
                                                                    
                                                                    
                                                                    
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <a href="<?php echo base_url();?>Request/request_inspection_2/<?php echo $props_id;?>/<?php echo $props_agent_id;?>" class="btn btn-danger">Yes, Continue</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Delete Property -->
                                                    <div class="modal fade" id="delete_<?php echo $fav_id;?>" tabindex="-1" aria-hidden="true">
                                                        <div class="modal-dialog modal-sm">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Confirm Action</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Are you sure you want to delete this Property (<?php echo $props_name;?>) from your Favourite List?
                                                                                                            
                                                                    
                                                                    
                                                                    
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <a href="<?php echo base_url();?>Dashboard/delete_favourite/<?php echo $props_id;?>" class="btn btn-danger">Yes, Delete</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                 
                                                </div>
                                            </div>
                                        </div>

                            <?php 
                                        }
                                    }
                                }
                            }
                            ?>

					
				        </div>
					</div>
                    <?php 
                    if(!is_array($get_fav)){
                        echo $this->Admin_db->alert_callbark('danger','You have no property in your Favourite List at the moment!');
                    }
                    ?>
				</div>
				
			</div>
		</div>


<script src="<?php echo base_url();?>assets_2/js/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#toggle_amenitites').click(function(e) {
            $('#amenities').toggle(100);  // show to UI when use display: none
		  //  $('.continuous').hide(100);  // hide()
        })
    });
</script>
