<style>
    .props_image{
        
        height: 200px;
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
			<div class="breadcrumb-title pe-3">Edit Profile</div>
			<div class="ps-3">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb mb-0 p-0">
						<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">Profile</li>
					</ol>
				</nav>
        </div>
					
				</div>
				<!--end breadcrumb-->
				<div class="container">
					<div class="main-body">
						<div class="row">
							<?php
								$get_user 	= $this->Users_db->get_user_by_id($user_id);
								if(is_array($get_user)){
									foreach($get_user as $row){
										$dis_user_id			=$row['id'];
										$dis_user_name			=$row['user_name'];
										$dis_full_name			=$row['full_name'];
										$dis_email				=$row['email'];
										$dis_image_name			=$row['image_name'];
										$dis_status				=$row['status'];
										$dis_phone				=$row['phone'];
										$dis_date_created		=$row['date_created'];
										$dis_age				=$row['age'];
										$dis_sex				=$row['sex'];
										$dis_address			=$row['address'];


								
							?>
							<div class="col-lg-4">
								<div class="card">
									<div class="card-body">
										<div class="d-flex flex-column align-items-center text-center">
											<img src="<?php echo base_url();?>project_dir/users/<?php echo $dis_user_name;?>/images/<?php echo $dis_image_name;?>" class="rounded-circle p-1 bg-primary" style="width:90px; height:90px; margin-top:3%;">
											<?php if($user_id == $dis_user_id){?>
											<a href="#upload_propfile" data-bs-toggle="modal" >
                                                <span class="badge bg-dark mt-1"> 
                                                    <i class="lni lni-camera"></i> update pic
                                                </span>
                                            </a>
											<?php } ?>
											<div class="mt-3">
												<h4><?php echo $dis_full_name;?></h4>
												<p class="text-muted font-size-sm"><?php echo $dis_user_name;?></p>
												
											</div>
										</div>
										<!-- <hr class="my-4">
										<ul class="list-group list-group-flush">
											<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
												<h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe me-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>Website</h6>
												<span class="text-secondary">https://codervent.com</span>
											</li>
											<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
												<h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github me-2 icon-inline"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>Github</h6>
												<span class="text-secondary">codervent</span>
											</li>
											<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
												<h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter me-2 icon-inline text-info"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>Twitter</h6>
												<span class="text-secondary">@codervent</span>
											</li>
											<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
												<h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram me-2 icon-inline text-danger"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>Instagram</h6>
												<span class="text-secondary">codervent</span>
											</li>
											<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
												<h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook me-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>Facebook</h6>
												<span class="text-secondary">codervent</span>
											</li>
										</ul> -->
									</div>
								</div>
							</div>
							<div class="col-lg-8">
								<div class="card">
									<div class="card-body">
										<?php echo isset($alert)?$alert:NULL;?>
										<form method="post" action="<?php echo base_url();?>Profile/update_detail">
											<div class="row mb-3">
												<div class="col-sm-3">
													<h6 class="mb-0">Full Name</h6>
												</div>
												<div class="col-sm-9 text-secondary">
													<input type="text" class="form-control" name="full_name" value="<?php echo $dis_full_name;?>">
												</div>
											</div>
											<div class="row mb-3">
												<div class="col-sm-3">
													<h6 class="mb-0">Email</h6>
												</div>
												<div class="col-sm-9 text-secondary">
													<input type="text" class="form-control" name="email" value="<?php echo $dis_email;?>">
												</div>
											</div>
											<div class="row mb-3">
												<div class="col-sm-3">
													<h6 class="mb-0">Phone</h6>
												</div>
												<div class="col-sm-9 text-secondary">
													<input type="text" class="form-control" name="phone" value="<?php echo $dis_phone;?>">
												</div>
											</div>

											<div class="row mb-3">
												<div class="col-sm-3">
													<h6 class="mb-0">Age</h6>
												</div>
												<div class="col-sm-9 text-secondary">
													<input type="text" class="form-control" name="age" value="<?php echo $dis_age;?>">
												</div>
											</div>

											<div class="row mb-3">
												<div class="col-sm-3">
													<h6 class="mb-0">Sex</h6>
												</div>
												<div class="col-sm-9 text-secondary">
													<input type="text" class="form-control" name="sex" value="<?php echo $dis_sex;?>">
												</div>
											</div>
											
											<div class="row mb-3">
												<div class="col-sm-3">
													<h6 class="mb-0">Address</h6>
												</div>
												<div class="col-sm-9 text-secondary">
													<input type="text" class="form-control" name="address" value="<?php echo $dis_address;?>">
												</div>
											</div>
											<div class="row">
												<div class="col-sm-3">
													<input type="submit" name="submit" class="btn btn-success px-4" value="Save Changes">
												</div>
												<div class="col-sm-9 text-secondary">
													
												</div>
											</div>
										</form>
									</div>
								</div>
								
							</div>

							<?php 
									}
								}
							?>
						</div>
					</div>
				</div>
				
	</div>
</div>

