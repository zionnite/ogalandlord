<?php

    $public_key        =$this->Action->get_public_live_key();
    $private_key       =$this->Action->get_private_live_key();
    //$full_name         =str_replace(" ","_",$full_name);
    $token  =time();
	$site_name      =$this->Action->get_site_name();
	

?>


<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Subscription</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Plan</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->
        <div class="row">
            <div class="col-xl-12 mx-auto">
                <h6 class="mb-0 text-uppercase">Plan</h6>
                <hr>
                <?php echo isset($alert)?$alert:NULL;?>
                <?php
                $get_plan       = $this->Subscription_db->get_subscriber($user_id);
                if(is_array($get_plan)){
                    foreach($get_plan as $row){
                        $customer_email                     = $row['email'];
                        $customer_code                      = $row['customer_code'];
                        $subscription_code                  = $row['subscription_code'];
                        $email_token                        = $row['email_token'];
                        $plan_id                            = $row['plan_id'];
                        $plan_code                          = $row['plan_code'];
                        $plan_name                          = $row['plan_name'];
                        $plan_amount                        = $row['plan_amount'];
                        $plan_interval                      = $row['plan_interval'];
                        $auth_bin                           = $row['auth_bin'];
                        $auth_last4                         = $row['auth_last4'];
                        $auth_exp_month                     = $row['auth_exp_month'];
                        $auth_exp_year                      = $row['auth_exp_year'];
                        $auth_card_type                     = $row['auth_card_type'];
                        $sub_start_date                     = $row['sub_start_date'];
                        $sub_end_date                       = $row['sub_end_date'];
                        $status                             = $row['status'];
                        $request_card_update                = $row['request_card_update'];

                        $plan_desc                          = $this->Subscription_db->get_plan_desc_by_plan_id($plan_id);

                  

                ?>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <h5 class="card-title">Plan Name: <?php echo $plan_name;?></h5>
                            </div>
                            <p class="card-text"><?php echo $plan_desc;?></p>
                            <div>Status:
                                <?php if($status    == 'in_active'){ ?>
                                <span class="badge bg-dark"><?php echo 'Inactive';?></span>

                                <?php } else if($status == 'active'){?>
                                <span class="badge bg-primary"><?php echo 'Active';?></span>

                                <?php }else if($status  == 'stop'){?>

                                <span class="badge bg-danger"><?php echo 'Stop';?></span>

                                <?php }else if($status  == 'completed'){?>

                                <span class="badge bg-success"><?php echo 'Completed';?></span>

                                <?php }?>
                            </div>
                            <a href="<?php echo base_url();?>Subscription/disable_sub/<?php echo $user_id;?>/<?php echo $plan_code;?>/<?php echo $subscription_code;?>/<?php echo $email_token;?>"
                                class="btn btn-danger btn-sm" style="margin-top:1%;">Disable
                                Subscription</a>
                        </div>
                    </div>
                </div>


                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card radius-10 bg-primary bg-gradient">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <p class="mb-0 text-white">Total Amount</p>
                                            <h4 class="my-1 text-white">845</h4>
                                        </div>
                                        <div class="text-white ms-auto font-35"><i class="bx bx-cart-alt"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card radius-10 bg-primary bg-gradient">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <p class="mb-0 text-white">Number of Successful Debiting</p>
                                            <h4 class="my-1 text-white">845</h4>
                                        </div>
                                        <div class="text-white ms-auto font-35"><i class="bx bx-cart-alt"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card radius-10 bg-primary bg-gradient">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <p class="mb-0 text-white">Number of Failed Debiting</p>
                                            <h4 class="my-1 text-white">845</h4>
                                        </div>
                                        <div class="text-white ms-auto font-35"><i class="bx bx-cart-alt"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="col">
                    <div class="card bg-dark text-white">
                        <div class="card-body">
                            <h5 class="card-title text-white">Special title treatment</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up
                                the bulk of the card's content.</p>
                        </div>
                    </div>
                </div> -->

                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h5 class="mb-0">Top 10 Product On Your List</h5>
                            </div>

                        </div>
                        <hr>
                        <div class="table-responsive">
                            <table class="table align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>S/N</th>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Commission</th>
                                        <th>Your Cut</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
											$get_promoting_product		= $this->Promoter_db->get_property_am_promoting_limit_by_10($user_id);
                                            if(is_array($get_promoting_product)){
                                                $i=0;
                                                foreach($get_promoting_product as $row){
                                                    $i++;
                                                    $id                 =$row['id'];
                                                    $props_id           =$row['props_id'];
                                                    $url_code           =$row['url_code'];
                                                    $dis_amount     =   $this->Admin_db->get_props_amount_by_id($props_id);
                                                    
                                      


                                                    $props_name                 =$this->Admin_db->get_props_name_by_id($props_id);
                                                    $props_image                =$this->Admin_db->get_props_image_by_id($props_id);

                                                
													$currency		=   '&#8358;';
													$dis_amount		=   $currency.$this->cart->format_number($dis_amount);
                                                    $props_comm     =   $this->Promoter_db->get_promoter_com($props_id);


                                                                                        
                                                    if(strlen($props_name) > 25) {
                                                        $props_name = $props_name.' ';
                                                        $props_name = substr($props_name, 0, 150);
                                                        $props_name = substr($props_name, 0, strrpos($props_name ,' '));
                                                        $props_name = $props_name.'...';
                                                    }


                                                    $get_promoter_com			= $this->Promoter_db->get_promoter_com($props_id);
                                                    $props_amount            	= $this->Admin_db->get_props_amount_by_id($props_id);
                                                    $promoter_perc				= ($get_promoter_com/100) * $props_amount;
                                                    $total_amount            	= $currency.$this->cart->format_number($props_amount - $promoter_perc);
                                                    $your_cut                	= $currency.$this->cart->format_number($promoter_perc);

                                                    


                                            ?>
                                    <tr>
                                        <td><?php echo $i;?></td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="recent-product-img">
                                                    <a href="<?php echo base_url();?>Property/view_property/<?php echo $props_id;?>"
                                                        data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                        data-bs-original-title="<?php echo $props_name;?>">
                                                        <img src="<?php echo base_url();?>project_dir/property/<?php echo $props_image;?>"
                                                            alt="">
                                                    </a>
                                                </div>
                                                <div class="ms-2">
                                                    <h6 class="mb-1 font-14"><?php echo $props_name;?></h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td><?php echo $dis_amount;?></td>
                                        <td><?php echo $props_comm;?>%</td>
                                        <td><?php echo $your_cut;?></td>
                                        <td>

                                            <a href="<?php echo base_url();?>Product/view_product/<?php echo $props_id;?>/<?php echo urlencode($url_code);?>"
                                                class="btn btn-danger btn-sm">View More</a>
                                        </td>

                                    </tr>

                                    <?php 
                                    }
                                }
                            ?>

                                </tbody>
                                <?php 
                            if(!is_array($get_promoting_product)){
                                echo $this->Admin_db->alert_callbark('danger','You have no Product in Your List of Product you are Promoting');
                            }
                       ?>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="card border-top border-0 border-4 border-primary">
                    <div class="card-body p-5">





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