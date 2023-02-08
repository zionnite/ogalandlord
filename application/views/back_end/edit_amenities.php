<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Edit</div>
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
				<div class="row">
					<div class="col-xl-12 mx-auto">
						<h6 class="mb-0 text-uppercase">Edit Property Amenities</h6>
						<hr>
						<?php echo isset($alert)?$alert:NULL;?>
						<div class="card border-top border-0 border-4 border-primary">
							<div class="card-body p-5">
								<div class="card-title d-flex align-items-center">
									<div><i class="me-1 font-22 text-primary"></i>
									</div>
									<h5 class="mb-0 text-primary">Amenities Details</h5>
								</div>
								<hr>
                                <?php
                                    $get_property       = $this->Admin_db->get_props_by_id($props_id);

                                    if(is_array($get_property)){
                                        foreach($get_property as $row){
                                            $props_id                           = $row['id'];
                                           

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
                                ?>
								<form class="row g-3" method="post" action="<?php echo base_url();?>Dashboard/edit_amenities_property">
									
									
										<div class="form-check form-switch">
											<input class="form-check-input" type="checkbox" id="air_condition" name="air_condition" value="yes" <?php if($props_air_condition == 'yes'){ echo 'checked';}?>>
											<label class="form-check-label" for="air_condition">Air Condition</label>
										</div>

										<div class="form-check form-switch">
											<input class="form-check-input" type="checkbox" id="balcony"  name="balcony" value="yes" <?php if($props_balcony == 'yes'){ echo 'checked';}?>>
											<label class="form-check-label" for="balcony">Balcony</label>
										</div>

										<div class="form-check form-switch">
											<input class="form-check-input" type="checkbox" id="bedding" name="bedding" value="yes" <?php if($props_bedding == 'yes'){ echo 'checked';}?>>
											<label class="form-check-label" for="bedding">Bedding</label>
										</div>

										<div class="form-check form-switch">
											<input class="form-check-input" type="checkbox" id="cable_tv" name="cable_tv" value="yes" <?php if($props_cable_tv == 'yes'){ echo 'checked';}?>>
											<label class="form-check-label" for="cable_tv">Cable Tv</label>
										</div>

										<div class="form-check form-switch">
											<input class="form-check-input" type="checkbox" id="cleaning_after_exit" name="cleaning_after_exit" value="yes" <?php if($props_cleaning_after_exit == 'yes'){ echo 'checked';}?>>
											<label class="form-check-label" for="cleaning_after_exit">Cleaning After Exit</label>
										</div>

										<div class="form-check form-switch">
											<input class="form-check-input" type="checkbox" id="cofee_pot" name="cofee_pot" value="yes" <?php if($props_cofee_pot == 'yes'){ echo 'checked';}?>>
											<label class="form-check-label" for="cofee_pot">Cofee Pot</label>
										</div>

										<div class="form-check form-switch">
											<input class="form-check-input" type="checkbox" id="computer" name="computer" value="yes" <?php if($props_computer == 'yes'){ echo 'checked';}?>>
											<label class="form-check-label" for="computer">Computer</label>
										</div>

										<div class="form-check form-switch">
											<input class="form-check-input" type="checkbox" id="cot" name="cot" value="yes" <?php if($props_cot == 'yes'){ echo 'checked';}?>>
											<label class="form-check-label" for="cot">Cot</label>
										</div>

										<div class="form-check form-switch">
											<input class="form-check-input" type="checkbox" id="dishwasher" name="dishwasher" value="yes" <?php if($props_dishwasher == 'yes'){ echo 'checked';}?>>
											<label class="form-check-label" for="dishwasher">Dishwasher</label>
										</div>

										<div class="form-check form-switch">
											<input class="form-check-input" type="checkbox" id="dvd" name="dvd" value="yes" <?php if($props_dvd == 'yes'){ echo 'checked';}?>>
											<label class="form-check-label" for="dvd">DVD</label>
										</div>

										<div class="form-check form-switch">
											<input class="form-check-input" type="checkbox" id="fan" name="fan" value="yes" <?php if($props_fan == 'yes'){ echo 'checked';}?>>
											<label class="form-check-label" for="fan">Fan</label>
										</div>

										<div class="form-check form-switch">
											<input class="form-check-input" type="checkbox" id="fridge" name="fridge" value="yes" <?php if($props_fridge == 'yes'){ echo 'checked';}?>>
											<label class="form-check-label" for="fridge">Fridge</label>
										</div>

										<div class="form-check form-switch">
											<input class="form-check-input" type="checkbox" id="grill" name="grill" value="yes" <?php if($props_grill == 'yes'){ echo 'checked';}?>>
											<label class="form-check-label" for="grill">Grill</label>
										</div>

										<div class="form-check form-switch">
											<input class="form-check-input" type="checkbox" id="hairdryer" name="hairdryer" value="yes" <?php if($props_hairdryer == 'yes'){ echo 'checked';}?>>
											<label class="form-check-label" for="hairdryer">Hairdryer</label>
										</div>

										<div class="form-check form-switch">
											<input class="form-check-input" type="checkbox" id="heater" name="heater" value="yes" <?php if($props_heater == 'yes'){ echo 'checked';}?>>
											<label class="form-check-label" for="heater">Heater</label>
										</div>

										<div class="form-check form-switch">
											<input class="form-check-input" type="checkbox" id="hi_fi" name="hi_fi" value="yes" <?php if($props_hi_fi == 'yes'){ echo 'checked';}?>>
											<label class="form-check-label" for="hi_fi">Hi-Fi</label>
										</div>

										<div class="form-check form-switch">
											<input class="form-check-input" type="checkbox" id="internet" name="internet" value="yes" <?php if($props_internet == 'yes'){ echo 'checked';}?>>
											<label class="form-check-label" for="internet">Internet</label>
										</div>

										<div class="form-check form-switch">
											<input class="form-check-input" type="checkbox" id="iron" name="iron" value="yes" <?php if($props_iron == 'yes'){ echo 'checked';}?>>
											<label class="form-check-label" for="iron">Iron</label>
										</div>

										<div class="form-check form-switch">
											<input class="form-check-input" type="checkbox" id="juicer" name="juicer" value="yes" <?php if($props_juicer == 'yes'){ echo 'checked';}?>>
											<label class="form-check-label" for="juicer">Juicer</label>
										</div>

										<div class="form-check form-switch">
											<input class="form-check-input" type="checkbox" id="lift" name="lift" value="yes" <?php if($props_lift == 'yes'){ echo 'checked';}?>>
											<label class="form-check-label" for="lift">Lift</label>
										</div>

										<div class="form-check form-switch">
											<input class="form-check-input" type="checkbox" id="microwave" name="microwave" value="yes" <?php if($props_microwave == 'yes'){ echo 'checked';}?>>
											<label class="form-check-label" for="microwave">Microwave</label>
										</div>

										<div class="form-check form-switch">
											<input class="form-check-input" type="checkbox" id="gym" name="gym" value="yes" <?php if($props_gym == 'yes'){ echo 'checked';}?>>
											<label class="form-check-label" for="gym">Gym</label>
										</div>

										<div class="form-check form-switch">
											<input class="form-check-input" type="checkbox" id="fireplace" name="fireplace" value="yes" <?php if($props_fireplace == 'yes'){ echo 'checked';}?>>
											<label class="form-check-label" for="fireplace">Fireplace</label>
										</div>

										<div class="form-check form-switch">
											<input class="form-check-input" type="checkbox" id="hot_tub" name="hot_tub" value="yes" <?php if($props_hot_tub == 'yes'){ echo 'checked';}?>>
											<label class="form-check-label" for="hot_tub">Hot-Tub</label>
										</div>
									

								
									<div class="col-12">
                                        <input type="hidden" name="props_id" value="<?php echo $props_id;?>">
										<input type="submit" class="btn btn-primary px-5" value="Save" name="submit" />
									</div>
								</form>

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


<script src="<?php echo base_url();?>assets_2/js/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#toggle_amenitites').click(function(e) {
            $('#amenities').toggle(100);  // show to UI when use display: none
		  //  $('.continuous').hide(100);  // hide()
        })
    });
</script>

