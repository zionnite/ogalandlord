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
    $get_site_email		    = $this->Action->get_site_email();

	$get_site_name          = $this->Action->get_site_name();
	$get_site_g_name        = $this->Action->get_site_g_name();
	$get_site_g_pass        = $this->Action->get_site_g_pass();
    $get_site_logo          = $this->Action->get_site_logo();
    $get_site_logo_2        = $this->Action->get_site_logo_2();
    $get_site_phone         = $this->Action->get_site_phone();
    $get_fb_link            = $this->Action->get_fb_link();
    $get_tw_link            = $this->Action->get_tw_link();
    $get_ig_link            = $this->Action->get_ig_link();


    $active     ='active';

?>
<footer class="footer">
        <div class="bg-dark p-top-60 p-bottom-30">
            <div class="container">
                
                <div class="row">
                    
                    <div class="col-md-12">
                        <div class="border-1 border-solid border-dark border-top-0 border-left-0 border-right-0 p-bottom-40 m-bottom-40">
                            
                            <div class="row">
                                
                                <div class="col-md-6">
                                    <!-- Begin: LOGO -->
                                    <a class="navbar-brand logo" href="index.html">
                                        <img class="full-width max-width-140 m-right-10" style="width:55px;" src="<?php echo base_url();?>project_dir/<?php echo $get_site_logo;?>">
                                        <span><?php echo $get_site_name;?></span>
                                    </a>
                                    <!-- <span class="text-white">/ Real Buying Selling Property House</span> -->
                                    <!-- End: LOGO -->
                                </div>
                                
                                <div class="col-md-6">
                                    <!-- Begin: SOCIAL -->
                                    <ul class="social-icons m-top-15 text-right">

                                        <li>
                                            <a class="btn btn-base rounded-0" target="_blank" href="<?php echo $get_fb_link;?>"><i class="fa fa-facebook"></i></a>
                                        </li>
                                        
                                        <li>
                                            <a class="btn btn-base rounded-0" target="_blank" href="<?php echo $get_ig_link;?>"><i class="fa fa-instagram"></i></a>
                                        </li>

                                        <li>
                                            <a class="btn btn-base rounded-0" target="_blank" href="<?php echo $get_tw_link;?>"><i class="fa fa-twitter"></i></a>
                                        </li>

                                        <!-- <li>
                                            <a class="btn btn-base rounded-0" href="#"><i class="fa fa-google-plus"></i></a>
                                        </li>
                                        <li>
                                            <a class="btn btn-base rounded-0" href="#"><i class="fa fa-linkedin"></i></a>
                                        </li> -->
                                    </ul>
                                    <!-- End: SOCIAL -->
                                </div>

                            </div>

                        </div>
                    </div>

                </div>
                
               

            </div>
        </div>

        <div class="bg-base p-top-30 p-bottom-20">
            <div class="container">
                <p class="text-white m-bottom-6">© Copyright <?php echo date('Y');?> <a class="text-white border-1 border-dotted border-light border-top-0 border-left-0 border-right-0" href="javascript:;"><?php echo $get_site_name;?></a>. All Rights Reserved.</p>
            </div>
        </div>
    </footer>