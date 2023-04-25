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

	$count_alert 			= $this->Alert_db->count_my_alert($user_id);
	$count_msg				= $this->Chat_db->count_unread_message($user_id);


	if(strlen($full_name) > 10) {
		$full_name = $full_name.' ';
		$full_name = substr($full_name, 0, 10);
		$full_name = substr($full_name, 0, strrpos($full_name ,' '));
		$full_name = $full_name.'...';
	}
?>

<!doctype html>
<html lang="en">


<?php $this->load->view('back_end/head');?>

<body>
    <!--wrapper-->
    <div class="wrapper">
        <!--sidebar wrapper -->
        <?php $this->load->view('back_end/m_side_bar');?>
        <!--end sidebar wrapper -->
        <!--start header -->
        <?php $this->load->view('back_end/header');?>
        <!--end header -->
        <!--start page wrapper -->
        <?php isset($content)?$this->load->view($content):NULL;?>
        <!--end page wrapper -->
        <?php $this->load->view('back_end/footer');?>
    </div>
    <!--end wrapper-->


    <!-- Update Profile Pic -->
    <div class="modal fade" id="upload_propfile" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Upload Profile Pic</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?php echo base_url();?>Profile/update_profile_pic" method="post"
                    enctype="multipart/form-data">
                    <div class="modal-body">

                        <div class="col-12">
                            <label for="file" class="form-label">Choose File</label>
                            <input type="file" class="form-control" id="file" name="userfile" />
                            <small style="color:red;">width and Height must 400px By 400px respectively</small>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <input type="hidden" name="user_name" value="<?php echo $user_name;?>" />
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-danger px-5" value="Update" name="submit" />
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php $this->load->view('back_end/js_file');?>

</body>


</html>