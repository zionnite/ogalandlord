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


?>
<style>
    .img_control{
        width:200px;
        height:100px;
    }
</style>

<style>
    .ajax-loader {
        /* visibility: hidden; */
        background-color: rgba(0,0,3,0.4);
        position: absolute;
        z-index: +100 !important;
        width: 100%;
        height:100%;
    }

    .ajax-loader img {
        position: relative;
        top:40%;
        left:44%;
    }
</style>

<div class="ajax-loader">
    <img src="<?php echo base_url();?>project_dir/loader.gif" class="img-responsive" />
</div>

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
									<h5 class="mb-0 text-primary">Payment Commission</h5>
								</div>
								<hr>
								<form class="row g-3" method="post" action="<?php echo base_url();?>Admin_panel/insert_payment_commission" enctype="multipart/form-data">
									
                                    <div class="col-md-12">
										<label for="ref_com" class="form-label">Referal Commission</label>
										<input type="number" class="form-control" id="ref_com" placeholder="e.g 5" name="ref_com" required value="<?php echo $get_referal_com;?>">
									</div>

									<div class="col-md-12" style="margin-top:3%;">
										<label for="agent_com" class="form-label">Office Commission</label>
										<input type="number" class="form-control" id="agent_com" placeholder="e.g 7;" name="agent_com" required value="<?php echo $get_agent_com;?>">
									</div>

									<div class="col-md-12" style="margin-top:3%;">
										<label for="ins_com" class="form-label">Issurance Commission</label>
										<input type="text" class="form-control" id="ins_com" placeholder="e.g 5;" name="ins_com" required value="<?php echo $get_insurance_com;?>">
									</div>

                                   
								
								
								
								
									<div class="col-12">
										<input type="submit" class="btn btn-primary px-5" value="Update Payment Commision" name="submit" />
									</div>
								</form>
							</div>
						</div>

						<div class="card border-top border-0 border-4 border-primary">
							<div class="card-body p-5">
								<div class="card-title d-flex align-items-center">
									<div><i class="me-1 font-22 text-primary"></i>
									</div>
									<h5 class="mb-0 text-primary">Update Insurance Account</h5>
								</div>
								<hr>
								<form class="row g-3" method="post" action="<?php echo base_url();?>Admin_panel/update_insurance_bank_detail" enctype="multipart/form-data">
									
									<?php
										$insurance_bank_code		=$this->Action->get_insurance_bank_code();
										$insurance_bank_name		=$this->Action->get_insurance_bank_name();
										$insurance_account_number	=$this->Action->get_insurance_account_number();
										$insurance_account_name		=$this->Action->get_insurance_account_name();
									?>
                                    <div class="col-md-12">
										<label for="bank_code" class="form-label">Bank Name</label>
										<select class="form-control" id="bank_code" name="bank_code" required>
											<option value="">Select Bank</option>
                                            <?php 
                                                $list_bank  =$this->Bank_db->get_list_of_bank();
                                                if(is_array($list_bank)){
                                                    foreach($list_bank as $row){
                                                        $id         = $row['id'];
                                                        $bank_code  = $row['bank_code'];
                                                        $bank_name  = $row['bank_name'];
                                                                
                                            ?>
                                                		<option value="<?php echo $bank_code;?>" <?php if($insurance_bank_code == $bank_code){ echo'selected'; } ?>><?php echo $bank_name;?></option>
                                            <?php 
                                                    }
                                            	}
                                            ?>
										</select>
									</div>

									<div class="col-md-12" style="margin-top:3%;">
										<label for="acc_no" class="form-label">Account Number</label>
										<input type="number" class="form-control" id="acc_no" placeholder="e.g 128979837" name="account_number" required value="<?php echo $insurance_account_number;?>">
									</div>

									<div class="col-md-12" style="margin-top:3%;">
										<label for="acc_name" class="form-label">Account Name</label>
										<input type="text" class="form-control" id="acc_name" placeholder="e.g Fidel Insure House" name="account_name" required value="<?php echo $insurance_account_name;?>">
									</div>

								
								
								
								
								
									<div class="col-12">
										<input type="submit" class="btn btn-primary px-5" value="Update Insurance Account" name="submit" />
									</div>
								</form>
							</div>
						</div>


						<?php 
							$dis_isbank_verify 	= $this->Action->isInsuranceBankVerify();
							if(!$dis_isbank_verify){
						?>
							<div class="card">
								<div class="card-body">
									<div style="margin:0.2%;"><?php echo $this->Admin_db->alert_callbark('danger','Insurance Bank Account is not yet verify!<br /> If this is not set, most of the transaction on the platform won\'t be successful ');?></div>
										<a href="javascript:;" id="verify" class="card-link"> Verify Insurance Bank Account</a>
									</div>
								</div>

						<?php 
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

<script src="<?php echo base_url();?>assets_2/js/sweetalert.min.js"></script>
<!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
<script>
	$(document).ready(function(){
		$('.ajax-loader').hide();
		$('#verify').click(function (e) {
			e.preventDefault();
			$('.ajax-loader').show();

			$.ajax({
				url: '<?php echo base_url();?>Admin_panel/verify_insurance_bank_account',
				type: "post",
				
				success: function (data) {

					$('.ajax-loader').hide();

					if (data == 'ok') {


						swal({
							title: "Success",
							text: "Bank Account Details sucessfully verified",
							icon: "success",
							closeOnClickOutside: false,
						});

					} else if (data == 'database') {

						swal({
							title: "Oops!",
							text: "Account verified butl could not update your setting, try later or contact site admin for assistance",
							icon: "warning",
							closeOnClickOutside: false,
						});

					}else{
						swal({
							title: "Oops!",
							text: data,
							icon: "error",
							closeOnClickOutside: false,
						});
					}

				}
			});
		});
	});

</script>