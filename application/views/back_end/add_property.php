<?php 
$user_id		= $this->session->userdata('user_id');

?>
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
						<h6 class="mb-0 text-uppercase">Add Property</h6>
						<hr>
						<?php echo isset($alert)?$alert:NULL;?>
						<div class="card border-top border-0 border-4 border-primary">
							<div class="card-body p-5">
								<div class="card-title d-flex align-items-center">
									<div><i class="me-1 font-22 text-primary"></i>
									</div>
									<h5 class="mb-0 text-primary">Basic Details</h5>
								</div>
								<hr>
								<form class="row g-3" method="post" action="<?php echo base_url();?>Dashboard/insert_property">
									<div class="col-md-12">
										<label for="title" class="form-label">Title</label>
										<input type="text" class="form-control" id="title" placeholder="e.g Newly Built 3 Bedroom Duplex in Oredo" name="title">
									</div>
									<div class="col-md-4">
										<label for="purpose" class="form-label">Purpose</label>
										<select class="form-control" id="purpose" name="purpose">
											<option value="">Select</option>
											<option value="rent">For Rent</option>
											<option value="sale">For Sale</option>
										</select>
									</div>
									<div class="col-md-4">
										<label for="types_of_property" class="form-label">Types of Property</label>
										<select class="form-control" id="types_of_property" name="types_of_property">
											<option value="">Select</option>
											<?php
												$get_types_of_props		=$this->Admin_db->get_types_of_property();
												if(is_array($get_types_of_props)){
													foreach($get_types_of_props as $row){
														$id		= $row['id'];
														$name	= $row['name'];
													
											?>
											<option value="<?php echo $id;?>"><?php echo $name;?></option>
											<?php 
													}
												}
											?>
										</select>
									</div>
									<div class="col-md-4">
										<label for="sub_type_property" class="form-label">Sub Type of Property</label>
										<select class="form-control" id="sub_type_property" name="sub_type_property">
											<option value="">Select</option>
											
										</select>
									</div>
									<?php 
										$dis_isbank_verify 	= $this->Users_db->isBankVerify($user_id);
										if($dis_isbank_verify){
									?>
									<div class="col-md-4">
										<label for="bedrooms" class="form-label">Bedrooms</label>
										<input type="number" class="form-control" id="bedrooms" placeholder="e.g: 5" name="bedrooms">
									</div>
									<div class="col-md-4">
										<label for="bathrooms" class="form-label">Bathrooms</label>
										<input type="number" class="form-control" id="bathrooms" placeholder="e.g: 4" name="bathrooms">
									</div>
									<div class="col-md-4">
										<label for="toilets" class="form-label">Toilets</label>
										<input type="number" class="form-control" id="toilets" placeholder="e.g: 3" name="toilets">
									</div>
									
                                    <h5 class="mb-0 text-primary">State & Area</h5>
									<div class="col-md-6">
										<label for="state" class="form-label">State</label>
										<select type="text" class="form-control" id="state" name="state">
											<option value="">select</option>
											<?php 
												$get_state		=$this->Admin_db->get_state();
												if(is_array($get_state)){
													foreach($get_state as $row){
														$id		= $row['id'];
														$name 	= $row['name'];
													
											?>
												<option value="<?php echo $id;?>"><?php echo $name;?></option>
											<?php 
													}
												}
											?>
										</select>
									</div>
                                    <div class="col-md-6">
										<label for="area" class="form-label">Area</label>
										<select class="form-control" id="area" name="area">
											<option value="">Select</option>
											
										</select>
									</div>

									<div class="col-12">
										<label for="price" class="form-label">Price</label>
										<input type="number" class="form-control" id="price" placeholder="e.g 80000" name="price">
									</div>
									<div class="col-md-12">
										<label for="description" class="form-label">Description</label>
										<textarea type="text" class="form-control" id="description" placeholder="" name="description"></textarea>
									</div>

                                    <div class="col-12">
										<label for="youtube_video_link" class="form-label">Youtube Embed iFrame</label>
										<input type="text" class="form-control" id="youtube_video_link" placeholder="Enter Youtube iFrame" name="youtube_video_link">
									</div>

                                    <div class="col-12">
										<label for="year_built" class="form-label">Year Built</label>
										<input type="number" class="form-control" id="year_built" placeholder="Year built" name="year_built">
									</div>

                                    <h5 class="mb-0 text-primary" id="toggle_amenitites">Click to show Amenities</h5>

									<div id="amenities" style="display:none">
										<div class="form-check form-switch">
											<input class="form-check-input" type="checkbox" id="air_condition" name="air_condition" value="yes">
											<label class="form-check-label" for="air_condition">Air Condition</label>
										</div>

										<div class="form-check form-switch">
											<input class="form-check-input" type="checkbox" id="balcony"  name="balcony" value="yes">
											<label class="form-check-label" for="balcony">Balcony</label>
										</div>

										<div class="form-check form-switch">
											<input class="form-check-input" type="checkbox" id="bedding" name="bedding" value="yes">
											<label class="form-check-label" for="bedding">Bedding</label>
										</div>

										<div class="form-check form-switch">
											<input class="form-check-input" type="checkbox" id="cable_tv" name="cable_tv" value="yes">
											<label class="form-check-label" for="cable_tv">Cable Tv</label>
										</div>

										<div class="form-check form-switch">
											<input class="form-check-input" type="checkbox" id="cleaning_after_exit" name="cleaning_after_exit" value="yes">
											<label class="form-check-label" for="cleaning_after_exit">Cleaning After Exit</label>
										</div>

										<div class="form-check form-switch">
											<input class="form-check-input" type="checkbox" id="cofee_pot" name="cofee_pot" value="yes">
											<label class="form-check-label" for="cofee_pot">Cofee Pot</label>
										</div>

										<div class="form-check form-switch">
											<input class="form-check-input" type="checkbox" id="computer" name="computer" value="yes">
											<label class="form-check-label" for="computer">Computer</label>
										</div>

										<div class="form-check form-switch">
											<input class="form-check-input" type="checkbox" id="cot" name="cot" value="yes">
											<label class="form-check-label" for="cot">Cot</label>
										</div>

										<div class="form-check form-switch">
											<input class="form-check-input" type="checkbox" id="dishwasher" name="dishwasher" value="yes">
											<label class="form-check-label" for="dishwasher">Dishwasher</label>
										</div>

										<div class="form-check form-switch">
											<input class="form-check-input" type="checkbox" id="dvd" name="dvd" value="yes">
											<label class="form-check-label" for="dvd">DVD</label>
										</div>

										<div class="form-check form-switch">
											<input class="form-check-input" type="checkbox" id="fan" name="fan" value="yes">
											<label class="form-check-label" for="fan">Fan</label>
										</div>

										<div class="form-check form-switch">
											<input class="form-check-input" type="checkbox" id="fridge" name="fridge" value="yes">
											<label class="form-check-label" for="fridge">Fridge</label>
										</div>

										<div class="form-check form-switch">
											<input class="form-check-input" type="checkbox" id="grill" name="grill" value="yes">
											<label class="form-check-label" for="grill">Grill</label>
										</div>

										<div class="form-check form-switch">
											<input class="form-check-input" type="checkbox" id="hairdryer" name="hairdryer" value="yes">
											<label class="form-check-label" for="hairdryer">Hairdryer</label>
										</div>

										<div class="form-check form-switch">
											<input class="form-check-input" type="checkbox" id="heater" name="heater" value="yes">
											<label class="form-check-label" for="heater">Heater</label>
										</div>

										<div class="form-check form-switch">
											<input class="form-check-input" type="checkbox" id="hi_fi" name="hi_fi" value="yes">
											<label class="form-check-label" for="hi_fi">Hi-Fi</label>
										</div>

										<div class="form-check form-switch">
											<input class="form-check-input" type="checkbox" id="internet" name="internet" value="yes">
											<label class="form-check-label" for="internet">Internet</label>
										</div>

										<div class="form-check form-switch">
											<input class="form-check-input" type="checkbox" id="iron" name="iron" value="yes">
											<label class="form-check-label" for="iron">Iron</label>
										</div>

										<div class="form-check form-switch">
											<input class="form-check-input" type="checkbox" id="juicer" name="juicer" value="yes">
											<label class="form-check-label" for="juicer">Juicer</label>
										</div>

										<div class="form-check form-switch">
											<input class="form-check-input" type="checkbox" id="lift" name="lift" value="yes">
											<label class="form-check-label" for="lift">Lift</label>
										</div>

										<div class="form-check form-switch">
											<input class="form-check-input" type="checkbox" id="microwave" name="microwave" value="yes">
											<label class="form-check-label" for="microwave">Microwave</label>
										</div>

										<div class="form-check form-switch">
											<input class="form-check-input" type="checkbox" id="gym" name="gym" value="yes">
											<label class="form-check-label" for="gym">Gym</label>
										</div>

										<div class="form-check form-switch">
											<input class="form-check-input" type="checkbox" id="fireplace" name="fireplace" value="yes">
											<label class="form-check-label" for="fireplace">Fireplace</label>
										</div>

										<div class="form-check form-switch">
											<input class="form-check-input" type="checkbox" id="hot_tub" name="hot_tub" value="yes">
											<label class="form-check-label" for="hot_tub">Hot-Tub</label>
										</div>
									</div>

								
									<div class="col-12">
										<input type="submit" class="btn btn-primary px-5" value="Saved & Next" name="submit" />
									</div>

									<?php }else{?>
											<div style="margin:0.2%;"><?php echo $this->Admin_db->alert_callbark('info','Your Bank Account is not yet verify!<br />You cannot upload property, send payment or recieve payment unless your bank account is verify ');?></div>
											<a href="<?php echo base_url();?>Profile/view_user/<?php echo $user_id;?>" id="verify" class="card-link"> Go to Profile and Verify your bank account detail</a>
									<?php }?>


								</form>
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


<script>
	$(document).ready(function () {
		$("#types_of_property").change(function () {
			var types_of_property = $('#types_of_property').val();
			var dataString = 'types_of_property=' + types_of_property;
			//alert(dataString);
			$.ajax({
				type: "POST",
				url: "<?php echo base_url();?>Dashboard/get_sub_property_type",
				data: dataString,
				cache: false,
				success: function (html) {
					$("#sub_type_property").html(html);

				}
			});
		});

		$("#state").change(function () {
			var list_state = $('#state').val();
			var dataString = 'state=' + list_state;
			//alert(dataString);
			$.ajax({
				type: "POST",
				url: "<?php echo base_url();?>Dashboard/get_sub_state",
				data: dataString,
				cache: false,
				success: function (html) {
					$("#area").html(html);

				}
			});
		});
	});

</script>