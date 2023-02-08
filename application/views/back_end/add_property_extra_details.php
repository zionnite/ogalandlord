<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Add</div>
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
						<h6 class="mb-0 text-uppercase">Add Extra Detail</h6>
						<hr>
						<?php echo isset($alert)?$alert:NULL;?>
                        <form class="row g-3" method="post" action="<?php echo base_url();?>Dashboard/insert_property_detail">
                            <div class="card border-top border-0 border-4 border-primary">
                                <div class="card-body p-5">
                                    <div class="card-title d-flex align-items-center">
                                        <div><i class="me-1 font-22 text-primary"></i>
                                        </div>
                                        <h5 class="mb-0 text-primary">Property Extra Details</h5>
                                    </div>
								    <hr>
								

									<div class="col-md-12">
										<label for="condition" class="form-label">Condition</label>
										<textarea class="form-control" id="condition" placeholder="What are you conditions" name="condition"></textarea>
									</div>

									<div class="col-md-12">
										<label for="caution_fee" class="form-label">Caution fee / Damage Fee</label>
										<input type="number" class="form-control" id="caution_fee" placeholder="" name="caution_fee">
									</div>

									<div class="col-md-12">
										<label for="special_pref" class="form-label">Special Preference</label>
										<input type="text" class="form-control" id="special_pref" placeholder="Enter list of Preference seperated by comma, e.g: Couple, Working Class, etc" name="special_pref">
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
										<input type="text" class="form-control" id="shopping_mall" placeholder="e.g: 5km or 20min" name="shopping_mall">
									</div>

                                    <div class="col-md-12">
										<label for="hospital" class="form-label">Hospital</label>
										<input type="text" class="form-control" id="hospital" placeholder="e.g: 5km or 20min" name="hospital">
									</div>

                                    <div class="col-md-12">
										<label for="school" class="form-label">School</label>
										<input type="text" class="form-control" id="school" placeholder="e.g: 5km or 20min" name="school">
									</div>

                                    <div class="col-md-12">
										<label for="petrol_pump" class="form-label">Petrol Pump</label>
										<input type="text" class="form-control" id="petrol_pump" placeholder="e.g: 5km or 20min" name="petrol_pump">
									</div>

                                    <div class="col-md-12">
										<label for="airport" class="form-label">Airport</label>
										<input type="text" class="form-control" id="airport" placeholder="e.g: 5km or 20min" name="airport">
									</div>

                                    <div class="col-md-12">
										<label for="church" class="form-label">Church</label>
										<input type="text" class="form-control" id="church" placeholder="e.g: 5km or 20min" name="church">
									</div>

                                    <div class="col-md-12">
										<label for="mosque" class="form-label">Mosque</label>
										<input type="text" class="form-control" id="mosque" placeholder="e.g: 5km or 20min" name="mosque">
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
										<input type="text" class="form-control" id="crime" placeholder="e.g 20" name="crime">
                                        <small style="color:red;">rate from the scale of 0 to 100</small>
									</div>

                                    <div class="col-md-12">
										<label for="traffic" class="form-label">Traffic</label>
										<input type="number" class="form-control" id="traffic" placeholder="e.g 5" name="traffic">
                                        <small style="color:red;">rate from the scale of 0 to 100</small>
									</div>

                                    <div class="col-md-12">
										<label for="pollution" class="form-label">Pollution</label>
										<input type="number" class="form-control" id="pollution" placeholder="e.g 50" name="pollution">
                                        <small style="color:red;">rate from the scale of 0 to 100</small>
									</div>

                                    <div class="col-md-12">
										<label for="education" class="form-label">Education</label>
										<input type="number" class="form-control" id="education" placeholder="e.g 80" name="education">
                                        <small style="color:red;">rate from the scale of 0 to 100</small>
									</div>

                                    <div class="col-md-12">
										<label for="health" class="form-label">Health</label>
										<input type="number" class="form-control" id="health" placeholder="e.g 40" name="health">
                                        <small style="color:red;">rate from the scale of 0 to 100</small>
									</div>

                                   

								
									

									<div class="col-12" style="margin-top:2%;">
										<input type="hidden" name="props_id" value="<?php echo $props_id;?>">
										<input type="submit" class="btn btn-primary px-5" value="Save & Next" name="submit" />
									</div>
								
							    </div>
                           
						    </div>
                        </form>
						
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

