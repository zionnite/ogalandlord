<?php

	$user_id         		=$this->session->userdata('user_id');
	$user_name         		=$this->session->userdata('user_name');
	$phone_no         		=$this->session->userdata('phone_no');
	$user_img         		=$this->session->userdata('user_img');
	$sex         			=$this->session->userdata('sex');
	$age         			=$this->session->userdata('age');
	$email         			=$this->session->userdata('email');
	$full_name         		=$this->session->userdata('full_name');
	$user_status         	=$this->session->userdata('status');
    $validation             =$this->session->userdata('validation');



    /*site detial*/
    $get_site_email				= $this->Action->get_site_email();

	$get_site_name          = $this->Action->get_site_name();
	$get_site_g_name        = $this->Action->get_site_g_name();
	$get_site_g_pass        = $this->Action->get_site_g_pass();
    $get_site_logo          = $this->Action->get_site_logo();
    $get_site_logo_2        = $this->Action->get_site_logo_2();
    $get_site_phone         = $this->Action->get_site_phone();
    $get_site_keyword       = $this->Action->get_site_keyword();
    $get_site_desc          = $this->Action->get_site_desc();
    $get_site_addres        = $this->Action->get_site_add();
    $get_public_live_key        = $this->Action->get_public_live_key();
    $get_private_live_key        = $this->Action->get_private_live_key();
    $get_referal_com        = $this->Action->get_referal_com();
    $get_agent_com        = $this->Action->get_agent_com();
    $get_insurance_com        = $this->Action->get_insurance_com();
    $get_fb_link        = $this->Action->get_fb_link();
    $get_tw_link        = $this->Action->get_tw_link();
    $get_ig_link        = $this->Action->get_ig_link();


?>
<style>
    .img_control{
        width:200px;
        height:100px;
    }
</style>
<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Update</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Site Details</li>
							</ol>
						</nav>
					</div>
					
				</div>
				<!--end breadcrumb-->
				<div class="row">
					<div class="col-xl-12 mx-auto">
						<h6 class="mb-0 text-uppercase">Update Site Details</h6>
						<hr>
						<?php echo isset($alert)?$alert:NULL;?>
						<div class="card border-top border-0 border-4 border-primary">
							<div class="card-body p-5">
								<div class="card-title d-flex align-items-center">
									<div><i class="me-1 font-22 text-primary"></i>
									</div>
									<h5 class="mb-0 text-primary">Add Property Type</h5>
								</div>
								<hr>
								<form class="row g-3" method="post" action="<?php echo base_url();?>Admin_panel/insert_property_type" enctype="multipart/form-data">
									
                                    <div class="col-md-12">
										<label for="state" class="form-label">Name</label>
										<input type="text" class="form-control" id="state" placeholder="Big Multi-Dupblex" name="name" required />
									</div>

								

									

                                   
								
								
								
								
									<div class="col-12">
										<input type="submit" class="btn btn-primary px-5" value="Add to List" name="submit" />
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