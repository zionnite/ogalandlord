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


                                        $account_name			=$row['account_name'];
                                        $account_number			=$row['account_number'];
                                        $my_bank_name				=$row['bank_name'];
                                        $my_bank_code				=$row['bank_code'];
                                        $current_balance		=$row['current_balance'];


								
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
										
									</div>
								</div>
							</div>
							<div class="col-lg-8">
								<div class="card">
									<div class="card-body">
										<?php echo isset($alert)?$alert:NULL;?>
										<form method="post" action="<?php echo base_url();?>Profile/update_bank_detail">
											<div class="row mb-3">
												<div class="col-sm-3">
													<h6 class="mb-0">Account Name</h6>
												</div>
												<div class="col-sm-9 text-secondary">
													<input type="text" class="form-control" name="account_name" value="<?php echo $account_name;?>">
												</div>
											</div>
											<div class="row mb-3">
												<div class="col-sm-3">
													<h6 class="mb-0">Account Number</h6>
												</div>
												<div class="col-sm-9 text-secondary">
													<input type="text" class="form-control" name="account_number" value="<?php echo $account_number;?>">
												</div>
											</div>
											<div class="row mb-3">
												<div class="col-sm-3">
													<h6 class="mb-0">Bank Name</h6>
												</div>
												<div class="col-sm-9 text-secondary">
													<select class="form-control" name="bank_code">
                                                        <option value="">Select Bank</option>
                                                        <?php 
                                                            $list_bank  =$this->Bank_db->get_list_of_bank();
                                                            if(is_array($list_bank)){
                                                                foreach($list_bank as $row){
                                                                    $id         = $row['id'];
                                                                    $bank_code  = $row['bank_code'];
                                                                    $bank_name  = $row['bank_name'];
                                                                
                                                        ?>
                                                                    <option value="<?php echo $bank_code;?>" <?php if($my_bank_code == $bank_code){ echo'selected'; } ?>><?php echo $bank_name;?></option>
                                                        <?php 
                                                                }
                                                            }
                                                        ?>
                                                    </select>
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

