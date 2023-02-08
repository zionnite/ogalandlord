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
						<h6 class="mb-0 text-uppercase">Edit Extra Detail</h6>
						<hr>
						<?php echo isset($alert)?$alert:NULL;?>
                        <?php
                                    $get_property       = $this->Admin_db->get_props_by_id($props_id);

                                    if(is_array($get_property)){
                                        foreach($get_property as $row){
                                            $props_id                           = $row['id'];
                                           

                                             //get facilities
                                            $props_shopping_mall                = $this->Admin_db->props_shopping_mall($props_id);
                                            $props_hospital                     = $this->Admin_db->props_hospital($props_id);
                                            $props_school                       = $this->Admin_db->props_school($props_id);
                                            $props_petrol_pump                  = $this->Admin_db->props_petrol_pump($props_id);
                                            $props_airport                      = $this->Admin_db->props_airport($props_id);
                                            $props_church                       = $this->Admin_db->props_church($props_id);
                                            $props_mosque                       = $this->Admin_db->props_mosque($props_id);

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


                                ?>
                        <form class="row g-3" method="post" action="<?php echo base_url();?>Dashboard/edit_extra_property">
                            <div class="card border-top border-0 border-4 border-primary">
                                <div class="card-body p-5">
                                    <div class="card-title d-flex align-items-center">
                                        <div><i class="me-1 font-22 text-primary"></i>
                                        </div>
                                        <h5 class="mb-0 text-primary">Edit Extra Details</h5>
                                    </div>
								    <hr>
								

									<div class="col-md-12">
										<label for="condition" class="form-label">Condition</label>
										<textarea class="form-control" id="condition" placeholder="What are you conditions" name="condition"><?php echo $props_condition;?></textarea>
									</div>

									<div class="col-md-12">
										<label for="caution_fee" class="form-label">Caution fee / Damage Fee</label>
										<input type="number" class="form-control" id="caution_fee" placeholder="" name="caution_fee" value="<?php echo $props_caution_fee;?>">
									</div>

									<div class="col-md-12">
										<label for="special_pref" class="form-label">Special Preference</label>
										<input type="text" class="form-control" id="special_pref" placeholder="Enter list of Preference seperated by comma, e.g: Couple, Working Class, etc" name="special_pref" value="<?php echo $props_special_pref;?>">
									</div>
								
							    </div>
                           
						    </div>


                            <div class="card border-top border-0 border-4 border-primary">
                                <div class="card-body p-5">
                                    <div class="card-title d-flex align-items-center">
                                        <div><i class="me-1 font-22 text-primary"></i>
                                        </div>
                                        <h5 class="mb-0 text-primary">Property Facilities</h5>
                                    </div>
								    <hr>

                                    <div class="col-md-12">
										<label for="shopping_mall" class="form-label">Shopping Mall</label>
										<input type="text" class="form-control" id="shopping_mall" placeholder="e.g: 5km or 20min" name="shopping_mall" value="<?php echo $props_shopping_mall;?>">
									</div>

                                    <div class="col-md-12">
										<label for="hospital" class="form-label">Hospital</label>
										<input type="text" class="form-control" id="hospital" placeholder="e.g: 5km or 20min" name="hospital" value="<?php echo $props_hospital;?>">
									</div>

                                    <div class="col-md-12">
										<label for="school" class="form-label">School</label>
										<input type="text" class="form-control" id="school" placeholder="e.g: 5km or 20min" name="school" value="<?php echo $props_school;?>">
									</div>

                                    <div class="col-md-12">
										<label for="petrol_pump" class="form-label">Petrol Pump</label>
										<input type="text" class="form-control" id="petrol_pump" placeholder="e.g: 5km or 20min" name="petrol_pump" value="<?php echo $props_petrol_pump;?>">
									</div>

                                    <div class="col-md-12">
										<label for="airport" class="form-label">Airport</label>
										<input type="text" class="form-control" id="airport" placeholder="e.g: 5km or 20min" name="airport" value="<?php echo $props_airport;?>">
									</div>

                                    <div class="col-md-12">
										<label for="church" class="form-label">Church</label>
										<input type="text" class="form-control" id="church" placeholder="e.g: 5km or 20min" name="church" value="<?php echo $props_church;?>">
									</div>

                                    <div class="col-md-12">
										<label for="mosque" class="form-label">Mosque</label>
										<input type="text" class="form-control" id="mosque" placeholder="e.g: 5km or 20min" name="mosque" value="<?php echo $props_mosque;?>">
									</div>
								
							    </div>
                           
						    </div>

                            <div class="card border-top border-0 border-4 border-primary">
                                <div class="card-body p-5">
                                    <div class="card-title d-flex align-items-center">
                                        <div><i class="me-1 font-22 text-primary"></i>
                                        </div>
                                        <h5 class="mb-0 text-primary">Property Valuation</h5>
                                    </div>
								    <hr>

                                    <div class="col-md-12">
										<label for="crime" class="form-label">Crime</label>
										<input type="text" class="form-control" id="crime" placeholder="e.g 20" name="crime" value="<?php echo $props_crime;?>">
                                        <small style="color:red;">rate from the scale of 0 to 100</small>
									</div>

                                    <div class="col-md-12">
										<label for="traffic" class="form-label">Traffic</label>
										<input type="number" class="form-control" id="traffic" placeholder="e.g 5" name="traffic" value="<?php echo $props_traffic;?>">
                                        <small style="color:red;">rate from the scale of 0 to 100</small>
									</div>

                                    <div class="col-md-12">
										<label for="pollution" class="form-label">Pollution</label>
										<input type="number" class="form-control" id="pollution" placeholder="e.g 50" name="pollution"  value="<?php echo $props_pollution;?>">
                                        <small style="color:red;">rate from the scale of 0 to 100</small>
									</div>

                                    <div class="col-md-12">
										<label for="education" class="form-label">Education</label>
										<input type="number" class="form-control" id="education" placeholder="e.g 80" name="education" value="<?php echo $props_education;?>">
                                        <small style="color:red;">rate from the scale of 0 to 100</small>
									</div>

                                    <div class="col-md-12">
										<label for="health" class="form-label">Health</label>
										<input type="number" class="form-control" id="health" placeholder="e.g 40" name="health" value="<?php echo $props_health;?>">
                                        <small style="color:red;">rate from the scale of 0 to 100</small>
									</div>

                                   

								
									

									<div class="col-12" style="margin-top:2%;">
										<input type="hidden" name="props_id" value="<?php echo $props_id;?>">
										<input type="submit" class="btn btn-primary px-5" value="Save" name="submit" />
									</div>
								
							    </div>
                           
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

<script src="<?php echo base_url();?>assets_2/js/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#toggle_amenitites').click(function(e) {
            $('#amenities').toggle(100);  // show to UI when use display: none
		  //  $('.continuous').hide(100);  // hide()
        })
    });
</script>

