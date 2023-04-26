<style>
.props_image {

    height: 200px;
    overflow: hidden;
    background-position: top center;
    background-repeat: no-repeat;
}

.props_image img.card-img-top {
    margin: auto;
    min-height: 100%;
    min-width: 100%;
}
</style>
<style>
.ajax-loader {
    /* visibility: hidden; */
    background-color: rgba(0, 0, 3, 0.4);
    position: absolute;
    z-index: +100 !important;
    width: 100%;
    height: 100%;
}

.ajax-loader img {
    position: relative;
    top: 40%;
    left: 44%;
}
</style>



<div class="ajax-loader">
    <img src="<?php echo base_url();?>project_dir/loader.gif" class="img-responsive" />
</div>


<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">User Profile</div>
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
                <?php
							$get_user 	= $this->Users_db->get_user_by_id($dis_user_id);
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
									$bank_name				=$row['bank_name'];
									$bank_code				=$row['bank_code'];
									$current_balance		=$row['current_balance'];

									$agent_login_status         = $row['login_status'];
									$dis_isbank_verify         		= $row['isbank_verify'];
									$m_ref_code         		= $row['m_ref_code'];

									$admin_status	         	=$this->session->userdata('admin_status');



								
						?>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img src="<?php echo base_url();?>project_dir/users/<?php echo $dis_user_name;?>/images/<?php echo $dis_image_name;?>"
                                        class="rounded-circle p-1 bg-primary"
                                        style="width:90px; height:90px; margin-top:3%;">
                                    <?php if($user_id == $dis_user_id){?>
                                    <a href="#upload_propfile" data-bs-toggle="modal">
                                        <span class="badge bg-dark mt-1">
                                            <i class="lni lni-camera"></i> update pic
                                        </span>
                                    </a>
                                    <?php } ?>
                                    <div class="mt-3">
                                        <h4><?php echo $dis_full_name;?></h4>
                                        <p class="text-muted font-size-sm"><?php echo $dis_user_name;?></p>
                                        <!-- <button class="btn btn-primary">Follow</button> -->
                                        <?php 
													if($admin_status){
												?>

                                        <a href="#send_msg_<?php echo $dis_user_id;?>" data-bs-toggle="modal"
                                            class="btn btn-outline-primary">Message</a>

                                        <?php } ?>


                                    </div>
                                </div>
                                <hr class="my-4">
                                <ul class="list-group list-group-flush">

                                    <?php if($admin_status || $user_id == $dis_user_id) {?>
                                    <li
                                        class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <a href="#change_password_<?php echo $dis_user_id;?>" data-bs-toggle="modal"
                                            class="btn btn-sm btn-success btn-block">Change Password</a>
                                    </li>
                                    <?php }?>

                                    <?php if($admin_status){?>
                                    <li
                                        class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <a href="#ban_<?php echo $dis_user_id;?>" data-bs-toggle="modal"
                                            class="btn btn-sm btn-dark btn-block">
                                            <?php if($agent_login_status == 'ban'){?>
                                            UnBan <?php if($dis_status =='user'){ echo 'User';}else{echo 'Agent';}?>
                                            <?php }else{?>
                                            Ban <?php if($dis_status =='user'){ echo 'User';}else{echo 'Agent';}?>

                                            <?php };?>
                                        </a>
                                    </li>

                                    <li
                                        class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <a href="#delete_<?php echo $dis_user_id;?>" data-bs-toggle="modal"
                                            class="btn btn-sm btn-danger btn-block"> Delete User</a>
                                    </li>
                                    <?php } ?>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <?php echo isset($alert)?$alert:NULL;?>
                                <div class="row mb-4">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Full Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <?php echo $dis_full_name;?>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <?php echo $dis_email;?>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Phone</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <?php echo $dis_phone;?>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Age</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <?php echo $dis_age;?>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Sex</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <?php echo $dis_sex;?>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Address</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <?php echo $dis_address;?>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Date Joined</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <?php echo $dis_date_created;?>
                                    </div>
                                </div>


                                <?php 
											if($user_id == $dis_user_id){
										?>
                                <div class="row">
                                    <div class="col-sm-3"><a href="<?php echo base_url();?>Profile/edit_detail"
                                            class="btn btn-danger btn-block px-4">Edit Detail</a></div>
                                    <div class="col-sm-9 text-secondary">

                                    </div>
                                </div>
                                <?php 
											}
										?>
                            </div>
                        </div>


                        <?php 
						if($user_id == $dis_user_id && !$admin_status){
						?>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="row mb-4">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Account Number</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <?php echo $account_number;?>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Account Name</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <?php echo $account_name;?>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Bank Name</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <?php echo $bank_name;?>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-3"><a
                                                    href="<?php echo base_url();?>Profile/edit_bank_detail"
                                                    class="btn btn-danger btn-block px-4">Update Bank Detail</a></div>
                                            <div class="col-sm-9 text-secondary">

                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <?php 
											$dis_isbank_verify 	= $this->Users_db->isBankVerify($dis_user_id);
											if(!$dis_isbank_verify && $dis_user_id == $user_id){
										?>
                                <div class="card">
                                    <div class="card-body">
                                        <div style="margin:0.2%;">
                                            <?php echo $this->Admin_db->alert_callbark('info','Your Bank Account is not yet verify!<br />You cannot make send money or recieve money unless your bank account is verify ');?>
                                        </div>
                                        <a href="javascript:;" id="verify" class="card-link"> Verify Your Bank
                                            Account</a>
                                    </div>
                                </div>

                                <?php 
											}
										?>

                                <?php
								if(($dis_user_id == $user_id && !$admin_status) && $dis_status !='promoter'){
								?>
                                <div class="card">
                                    <div class="card-body">
                                        <h5>Your Referal Link</h5>

                                        <?php
													if($dis_status =='user'){
														$new_status	='USR';
                                                        $ref_link       = base_url().'Register/ref/'.$dis_user_id.'/'.$new_status;

													}else if($dis_status =='landlord'){
														$new_status	='LAD';
                                                        $ref_link       = base_url().'Register/ref/'.$dis_user_id.'/'.$new_status;


													}else if($dis_status == 'agent'){
														$new_status	='AGT';
                                                        $ref_link       = base_url().'Register/ref/'.$dis_user_id.'/'.$new_status;
													}else if($dis_status    == 'm_user'){
														$new_status ='NO';
                                                        $ref_link       = base_url().'Register/regmlm/'.$m_ref_code;
													}else{
                                                        $ref_link='';
                                                    }
												?>
                                        <span style="color:red;"><?php echo $ref_link;?></span>

                                        <input type="hidden" id="link_copy" value="<?php echo $ref_link;?>">
                                        <br />

                                        <button onclick="myFunction()" class="btn btn-danger btn-sm mt-3">
                                            Copy Referal Link
                                        </button>






                                    </div>
                                </div>

                                <?php 
                                }
                                ?>
                            </div>
                        </div>

                        <?php 
						}
						?>

                    </div>


                </div>


                <!-- Delete Property -->
                <div class="modal fade" id="ban_<?php echo $dis_user_id;?>" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Confirm Action</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure you want to <?php if($agent_login_status == 'ban'){?>
                                    UnBan <?php if($dis_status =='user'){ echo 'User';}else{echo 'Agent';}?>
                                    <?php }else{?>
                                    Ban <?php if($dis_status =='user'){ echo 'User';}else{echo 'Agent';}?>

                                    <?php };?>(<?php echo $dis_full_name;?>)?




                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <a href="<?php echo base_url();?>Admin_panel/toggle_ban_user/<?php echo $dis_user_id;?>/view_user"
                                    class="btn btn-danger">Yes, Continue</a>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Delete Property -->
                <div class="modal fade" id="delete_<?php echo $dis_user_id;?>" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Confirm Action</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure you want to delete this User (<?php echo $dis_full_name;?>)?




                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <a href="<?php echo base_url();?>Admin_panel/delete_user/<?php echo $dis_user_id;?>/view_user"
                                    class="btn btn-danger">Yes, Delete</a>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Send message Dialog -->
                <div class="modal fade" id="send_msg_<?php echo $dis_user_id;?>" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Drop Message</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>

                            <form action="<?php echo base_url();?>Admin_panel/message_user" method="post">

                                <div class="modal-body">
                                    <!-- body  -->
                                    <div class="form-group" style="margin-bottom:1%;">
                                        <input name="subject" id="title" required class="form-control"
                                            placeholder="Title" />
                                    </div>

                                    <div class="form-group">
                                        <textarea name="message" id="message" required class="form-control"
                                            placeholder="Write your message here"></textarea>
                                    </div>


                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" name="to_id" value="<?php echo $dis_user_id;?>">
                                    <input type="hidden" name="to_name" value="<?php echo $dis_full_name;?>">
                                    <input type="hidden" name="to_email" value="<?php echo $dis_email;?>">
                                    <input type="hidden" name="location" value="view_user">

                                    <button type="button" class="btn btn-secondary btn-sm"
                                        data-bs-dismiss="modal">Close</button>
                                    <input type="submit" class="btn btn-success btn-sm" name="submit"
                                        value="Send Message">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


                <!-- Send message Dialog -->
                <div class="modal fade" id="change_password_<?php echo $dis_user_id;?>" tabindex="-1"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Change Password</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>

                            <form action="<?php echo base_url();?>Admin_panel/change_user_password" method="post">

                                <div class="modal-body">
                                    <!-- body  -->
                                    <div class="form-group" style="margin-bottom:1%;">
                                        <input type="text" name="pass" required class="form-control"
                                            placeholder="New Password" />
                                    </div>

                                    <div class="form-group" style="margin-bottom:1%;">
                                        <input type="text" name="repass" required class="form-control"
                                            placeholder="Confirm New Password" />
                                    </div>



                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" name="dis_user_id" value="<?php echo $dis_user_id;?>">
                                    <input type="hidden" name="location" value="view_user">

                                    <button type="button" class="btn btn-secondary btn-sm"
                                        data-bs-dismiss="modal">Close</button>
                                    <input type="submit" class="btn btn-success btn-sm" name="login"
                                        value="Change Password">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <?php 
								}
							}else{
								$bank_code	= '';
								$account_name ='';
								$account_number	='';
								echo '<div style="margin:0.2%;">'.$this->Admin_db->alert_callbark('danger','This User does not exist in your database!').'</div>'; 
							}
						?>
            </div>
        </div>





    </div>
</div>


<script src="<?php echo base_url();?>assets_2/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets_2/js/sweetalert.min.js"></script>
<!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
<script>
$('.ajax-loader').hide();
$(document).ready(function() {
    $('#verify').click(function(e) {
        e.preventDefault();
        $('.ajax-loader').show();

        $.ajax({
            url: '<?php echo base_url();?>Profile/verify_bank_account/<?php echo $bank_code;?>/<?php echo $account_number;?>',
            type: "post",

            success: function(data) {
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

                } else {
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


<script>
function myFunction() {

    var copyText = document.getElementById("link_copy");

    navigator.clipboard.writeText(copyText.value).then(() => {
        swal({
            title: "Success",
            text: "Link Copied",
            icon: "success",
            closeOnClickOutside: false,
        });
    }, () => {
        swal({
            title: "Error",
            text: "Could not Copy it, please just highlight the link and copy it instead!",
            icon: "success",
            closeOnClickOutside: false,
        });
    });


}
</script>