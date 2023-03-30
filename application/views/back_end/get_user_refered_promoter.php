<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Promoter</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Downline</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->
        <!-- <div class="row">
            <div class="col-xl-12 mx-auto">
                <h6 class="mb-0 text-uppercase">Call To Action</h6>
                <hr>
                <?php echo isset($alert)?$alert:NULL;?>
                <div class="card border-top border-0 border-4 border-primary">
                    <div class="card-body p-5">
                        <div class="card-title d-flex align-items-center">
                            <div><i class="me-1 font-22 text-primary"></i>
                            </div>
                            <h5 class="mb-0 text-primary">Action Needed</h5>
                            <p>Hey, we discovered that you have a pending action on your account, please click the link
                                below to Request for Site Inspection </p>

                            <?php
                                $props_id       = $this->Promoter_db->get_props_id_by_user_id($user_id);
                                $url_code       = $this->Promoter_db->get_url_code_by_user_id($user_id);
                            ?>
                            <a
                                href="<?php echo base_url();?>Product/view_product<?php echo $props_id;?>/<?php echo $url_code;?>">Resume
                                Action</a>
                        </div>
                        <hr>

                    </div>
                </div>

            </div>
        </div> -->

        <div class="row">
            <div class="col-xl-12 mx-auto">

                <?php echo isset($alert)?$alert:NULL;?>
                <div class="row">
                    <?php
                        if(is_array($get_users)){
                            foreach($get_users as $row){
                                $id                 = $row['id'];
                                $dis_user_id        = $row['user_id'];
                                $props_id           = $row['props_id'];
                                $url_code           = $row['url_code'];
                                $is_requested       = $row['is_requested'];
                                $promoter_id        = $row['promoter_id'];


                                $agent_full_name                = $this->Users_db->get_user_full_name_by_id($dis_user_id);
                                $agent_image_name               = $this->Users_db->get_image_name_by_id($dis_user_id);
                                $agent_email                    = $this->Users_db->get_email_by_id($dis_user_id);
                                $agent_status                   = $this->Users_db->get_status_by_id($dis_user_id);
                                $agent_user_name                = $this->Users_db->get_user_name_by_id($dis_user_id);
                                $agent_user_phone               = $this->Users_db->get_user_phone_by_id($dis_user_id);
                                $check_isPay                    = $this->Wallet_db->check_if_isPay($dis_user_id,$props_id,$user_id);
                

                            
                    ?>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="<?php echo base_url();?>project_dir/users/<?php echo $agent_user_name;?>/images/<?php echo $agent_image_name;?>"
                                        alt="" class="card-img">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Full Name: <?php echo $agent_full_name;?></h5>
                                        <p class="card-text">

                                        </p>
                                    </div>

                                    <ul class="list-group list-group-flush">

                                        <li class="list-group-item">Phone Number: <?php echo $agent_user_phone;?></li>
                                        <li class="list-group-item">Email Address: <?php echo $agent_email;?></li>

                                        <li class="list-group-item">
                                            Requested For Inpsection
                                            <?php if($is_requested == 'no'){?>
                                            <span class="badge bg-danger"><?php echo ucfirst($is_requested);?></span>
                                            <?php }else if($is_requested == 'yes'){?>
                                            <span class="badge bg-success"><?php echo ucfirst($is_requested);?></span>
                                            <?php }?>
                                        </li>


                                        <li class="list-group-item">User Made Payment:
                                            <?php if($check_isPay == true){?>
                                            <span class="badge bg-success"><?php echo ucfirst('yes');?></span>
                                            <?php }else if($check_isPay == false){?>
                                            <span class="badge bg-danger"><?php echo ucfirst('no');?></span>
                                            <?php }?>

                                        </li>

                                    </ul>
                                </div>
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