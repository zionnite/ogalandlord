<?php

    $public_key        =$this->Action->get_public_live_key();
    $private_key       =$this->Action->get_private_live_key();
    //$full_name         =str_replace(" ","_",$full_name);
    $token  =time();
	$site_name      =$this->Action->get_site_name();
	

    $currency		            = '&#8358;';
    $success_sub                = $this->Subscription_db->count_subscription_success($user_id, $plan_id);
    $failed_sub                 = $this->Subscription_db->count_subscription_failed($user_id, $plan_id);
    $revenue_amount             = $this->Subscription_db->revenue_amount($user_id, $plan_id);
    $revenue_amount		        = $currency.$this->cart->format_number($revenue_amount);

    

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
                $get_plan       = $this->Subscription_db->get_subscriber($user_id, $plan_id);
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

                        $plan_desc                          = $this->Subscription_db->get_plan_desc_by_plan_id($plan_id, $plan_id);

                  

                ?>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <h5 class="card-title">Plan Name: <?php echo $plan_name;?></h5>
                            </div>

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
                            <a href="#disable" data-bs-toggle="modal" class="btn btn-danger btn-sm"
                                style="margin-top:1%;">Disable
                                Subscription</a>

                            <a href="#change_card_site" data-bs-toggle="modal" class="btn btn-primary btn-sm"
                                style="margin-top:1%;">Update Card on Subscription</a>

                            <a href="#change_card_email" data-bs-toggle="modal" class="btn btn-warning btn-sm"
                                style="margin-top:1%;">Generate Card Update to your email</a>
                        </div>
                    </div>
                </div>

                <!-- modal -->
                <div class="modal fade" id="disable" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Confirm Action</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure you want to Disable this Subscription Plan
                                    (<?php echo $plan_name;?>)?




                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <a href="<?php echo base_url();?>Subscription/disable_sub/<?php echo $user_id;?>/<?php echo $plan_code;?>/<?php echo $subscription_code;?>/<?php echo $email_token;?>"
                                    class="btn btn-danger">Yes, Continue</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="change_card_site" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Confirm Action</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure you want to Update this Card of this Subscription</p>

                                <div class="table-responsive">
                                    <table class="table align-middle mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Card Type</th>
                                                <th>Bin</th>
                                                <th>Last 4 Digit</th>
                                                <th>Expiring Date</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td><?php echo $auth_card_type;?></td>
                                                <td>
                                                    <p><?php echo $auth_bin;?></p>
                                                </td>
                                                <td><?php echo $auth_last4;?></td>
                                                <td><?php echo $auth_exp_month.'/'.$auth_exp_year;?></td>



                                            </tr>


                                        </tbody>

                                    </table>
                                </div>



                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <a href="<?php echo base_url();?>Subscription/request_card_update/<?php echo $subscription_code;?>"
                                    class="btn btn-danger">Yes, Continue</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="change_card_email" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Confirm Action</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure you want to Update this Card of this Subscription</p>

                                <div class="table-responsive">
                                    <table class="table align-middle mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Card Type</th>
                                                <th>Bin</th>
                                                <th>Last 4 Digit</th>
                                                <th>Expiring Date</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td><?php echo $auth_card_type;?></td>
                                                <td>
                                                    <p><?php echo $auth_bin;?></p>
                                                </td>
                                                <td><?php echo $auth_last4;?></td>
                                                <td><?php echo $auth_exp_month.'/'.$auth_exp_year;?></td>



                                            </tr>


                                        </tbody>

                                    </table>
                                </div>



                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <a href="<?php echo base_url();?>Subscription/send_request_to_email/<?php echo $subscription_code;?>"
                                    class="btn btn-danger">Yes, Continue</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card bg-dark text-white">
                        <div class="card-body">
                            <h5 class="card-title text-white">Plan Description</h5>
                            <p class="card-text"><?php echo $plan_desc;?></p>
                        </div>
                    </div>
                </div>


                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card radius-10 bg-dark bg-gradient">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <p class="mb-0 text-white">Total Amount</p>
                                            <h4 class="my-1 text-white"><?php echo $revenue_amount;?></h4>
                                        </div>
                                        <div class="text-white ms-auto font-35"><i class="lni lni-dollar"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card radius-10 bg-success bg-gradient">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <p class="mb-0 text-white">Number of Successful Debiting</p>
                                            <h4 class="my-1 text-white"><?php echo $success_sub;?></h4>
                                        </div>
                                        <div class="text-white ms-auto font-35"><i class="lni lni-credit-cards"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card radius-10 bg-danger bg-gradient">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <p class="mb-0 text-white">Number of Failed Debiting</p>
                                            <h4 class="my-1 text-white"><?php echo $failed_sub;?></h4>
                                        </div>
                                        <div class="text-white ms-auto font-35"><i class="lni lni-credit-cards"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h6 class="mb-0">Subsription Transaction (<?php echo $total;?>)</h6>
                            </div>

                        </div>
                        <hr>
                        <div class="table-responsive">
                            <table class="table align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>S/N</th>
                                        <th>Name</th>
                                        <th>Plan Code</th>
                                        <th>Subscription Code</th>
                                        <th>Amount</th>
                                        <td></td>
                                        <td></td>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                            if(is_array($get_sub)){
                                                $i=0;
                                                foreach($get_sub as $row){
                                                    $i++;
                                                    $id                             =$row['id'];

                                                    $customer_email                 = $row['customer_email'];
                                                    $customer_code                  = $row['customer_code'];
                                                    $plan_id                        = $row['plan_id'];
                                                    $plan_code                      = $row['plan_code'];
                                                    $amount                         = $row['amount'];
                                                    $paid_date                      = $row['paid_date'];
                                                    $day                            = $row['day'];
                                                    $month                          = $row['month'];
                                                    $year                           = $row['year'];
                                                    $time                           = $row['time'];
                                                    $msg_status                         = $row['status'];
                                                   
													$currency		                =   '&#8358;';
													$dis_amount		                =   $currency.$this->cart->format_number($amount);

                                                    $subscription_code              = $this->Subscription_db->get_subscription_code_by_plan_code($plan_code);
                                                  

                                                    if($msg_status  == 'success'){
                                                        $msg    = 'Card was Charge';
                                                    }else{
                                                        $msg    ='Could not charge card';
                                                    }

                                            ?>
                                    <tr>
                                        <td><?php echo $i;?></td>
                                        <td>
                                            <p><?php echo $msg;?></p>
                                        </td>
                                        <td><?php echo $plan_code;?></td>
                                        <td><?php echo $subscription_code;?></td>
                                        <td><?php echo $dis_amount;?></td>
                                        <td><?php echo $paid_date;?></td>
                                        <td><?php $this->Admin_db->time_stamp($time);?></td>



                                    </tr>

                                    <?php 
                                    }
                                }
                            ?>

                                </tbody>
                                <?php 
                            if(!is_array($get_sub)){
                                echo $this->Admin_db->alert_callbark('danger','You have not be debited yet for this subscription!');
                            }
                            ?>
                            </table>
                        </div>
                    </div>
                </div>



                <?php 
                    }
                }
                ?>


                <?php 
                    if(!is_array($get_plan)){
                        echo $this->Admin_db->alert_callbark('danger','You are not subscribing to any plan at the moment!');
                    }
                ?>
            </div>
        </div>

    </div>
</div>