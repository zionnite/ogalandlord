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
						<h6 class="mb-0 text-uppercase">Edit Property</h6>
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

                                <?php
                                    $get_property       = $this->Admin_db->get_props_by_id($props_id);
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

                                ?>



								<form class="row g-3" method="post" action="<?php echo base_url();?>Dashboard/edit_basic_property">
									<div class="col-md-12">
										<label for="title" class="form-label">Title</label>
										<input type="text" class="form-control" id="title" placeholder="e.g Newly Built 3 Bedroom Duplex in Oredo" name="title" value="<?php echo $props_name;?>">
									</div>
									<div class="col-md-4">
										<label for="purpose" class="form-label">Purpose</label>
										<select class="form-control" id="purpose" name="purpose">
                                            <?php
                                                if($props_purpose =='rent'){?>
                                                    <option value="sale">For Sale</option>
                                                    <option value="rent" selected>For Rent</option>
                                                <?php }else{?> 
                                                    <option value="rent">For Rent</option>
                                                    <option value="sale" selected>For Sale</option>
                                                <?php }
                                            ?>
											
											
										</select>
									</div>
									<div class="col-md-4">
										<label for="types_of_property" class="form-label">Types of Property</label>
										<select class="form-control" id="types_of_property" name="types_of_property">
											<!-- <option value="">Select</option> -->
											<?php
												$get_types_of_props		=$this->Admin_db->get_types_of_property();
												if(is_array($get_types_of_props)){
													foreach($get_types_of_props as $row){
														$id		= $row['id'];
														$name	= $row['name'];
													
											?>
                                                
                                                <option value="<?php echo $id;?>" <?php if($props_type_of_propery == $id){ echo'selected'; } ?>><?php echo $name;?></option>
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

									<div class="col-md-4">
										<label for="bedrooms" class="form-label">Bedrooms</label>
										<input type="number" class="form-control" id="bedrooms" placeholder="e.g: 5" name="bedrooms" value="<?php echo $props_bedrom;?>">
									</div>
									<div class="col-md-4">
										<label for="bathrooms" class="form-label">Bathrooms</label>
										<input type="number" class="form-control" id="bathrooms" placeholder="e.g: 4" name="bathrooms" value="<?php echo $props_bathroom;?>">
									</div>
									<div class="col-md-4">
										<label for="toilets" class="form-label">Toilets</label>
										<input type="number" class="form-control" id="toilets" placeholder="e.g: 3" name="toilets" value="<?php echo $props_toilet;?>">
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
												<option value="<?php echo $id;?>" <?php if($props_state_id == $id){ echo'selected'; } ?>><?php echo $name;?></option>
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
										<input type="number" class="form-control" id="price" placeholder="e.g 80000" name="price" value="<?php echo $props_price;?>">
									</div>
									<div class="col-md-12">
										<label for="description" class="form-label">Description</label>
										<textarea type="text" class="form-control" id="description" placeholder="" name="description"><?php echo $props_description;?></textarea>
									</div>

                                    <div class="col-12">
										<label for="youtube_video_link" class="form-label">Youtube Video Link</label>
										<input type="text" class="form-control" id="youtube_video_link" placeholder="Enter Youtube Link" name="youtube_video_link" value="<?php echo $props_vid_id;?>">
									</div>

                                    <div class="col-12">
										<label for="year_built" class="form-label">Year Built</label>
										<input type="number" class="form-control" id="year_built" placeholder="Year built" name="year_built" value="<?php echo $props_year_built;?>">
									</div>

                             

								
									<div class="col-12">
                                        <input type="hidden" value="<?php echo $props_id;?>" name="props_id" />
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