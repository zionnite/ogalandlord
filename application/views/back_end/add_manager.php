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
								<li class="breadcrumb-item active" aria-current="page">Manager</li>
							</ol>
						</nav>
					</div>
					
				</div>
				<!--end breadcrumb-->
				<div class="row">
					<div class="col-xl-12 mx-auto">
						<h6 class="mb-0 text-uppercase">Add Manager</h6>
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
								<form class="row g-3" method="post" action="<?php echo base_url();?>Admin_panel/insert_manager"  enctype="multipart/form-data">
									
                                    <div class="col-md-12">
										<label for="email" class="form-label">Email Address</label>
										<input type="text" class="form-control" id="email" placeholder="Enter Email" name="email"  value="<?php echo set_value('email'); ?>">
                                        <small style="color:red;"><?php echo form_error('email');?></small>
									</div>
                                    <div class="col-md-12">
										<label for="user_name" class="form-label">User Name</label>
										<input type="text" class="form-control" id="user_name" placeholder="Enter User Name" name="user_name"  value="<?php echo set_value('user_name'); ?>">
                                        <small style="color:red;"><?php echo form_error('user_name');?></small>
									</div>
									
                                    <div class="col-md-12">
										<label for="full_name" class="form-label">Full Name</label>
										<input type="text" class="form-control" id="full_name" placeholder="Enter Full Name" name="full_name" value="<?php echo set_value('full_name'); ?>">
                                        <small style="color:red;"><?php echo form_error('full_name');?></small>
									</div>
									
                                    <div class="col-md-12">
										<label for="password" class="form-label">Password</label>
										<input type="password" class="form-control" id="password" placeholder="Enter Password" name="password" value="<?php echo set_value('password'); ?>">
                                        <small style="color:red;"><?php echo form_error('password');?></small>
									</div>
									
                                    <div class="col-md-12">
										<label for="phone" class="form-label">Phone</label>
										<input type="text" class="form-control" id="phone" placeholder="Enter Phone" name="phone" value="<?php echo set_value('phone'); ?>">
                                        <small style="color:red;"><?php echo form_error('phone');?></small>
									</div>
									
                                    <div class="col-md-12">
										<label for="age" class="form-label">Age</label>
										<input type="text" class="form-control" id="age" placeholder="Enter Age" name="age" value="<?php echo set_value('age'); ?>">
                                        <small style="color:red;"><?php echo form_error('age');?></small>
									</div>
									
                                    <div class="col-md-12">
										<label for="sex" class="form-label">Gender</label>
										<select type="text" class="form-control" id="sex" name="sex">
                                            <option value="">-Select-</option>
                                            <option value="male">Male</option>
                                            <option value="female">FeMale</option>
                                        </select>
                                        <small style="color:red;"><?php echo form_error('sex');?></small>
									</div>
									
                                    <div class="col-md-12">
										<label for="image" class="form-label">User Image</label>
										<input type="file" class="form-control" id="image" placeholder="Selet Image" name="userfile">
										<small style="color:red;">width and Height must 400px By 400px respectively</small>

									</div>
									
								
									<div class="col-12">
										<input type="submit" class="btn btn-primary px-5" value="Add Manager" name="submit" />
									</div>
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