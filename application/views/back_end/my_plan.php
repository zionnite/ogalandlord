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
                        <li class="breadcrumb-item active" aria-current="page">My Plan</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->
        <div class="row">
            <div class="col-xl-12 mx-auto">
                <h6 class="mb-0 text-uppercase">My Plan</h6>
                <hr>
                <?php echo isset($alert)?$alert:NULL;?>

                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h6 class="mb-0">Plan List (<?php echo $total;?>)</h6>
                            </div>

                        </div>

                        <hr>
                        <div class="table-responsive">
                            <table class="table align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>S/N</th>
                                        <th>Plan Name</th>
                                        <th>Plan Code</th>
                                        <th>Subscription Code</th>
                                        <th>Amount</th>
                                        <td>Plan Start Date</td>
                                        <td>Plan End Date</td>
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

                                        $customer_email                 = $row['email'];
                                        $customer_code                  = $row['customer_code'];
                                        $plan_id                        = $row['plan_id'];
                                        $plan_code                      = $row['plan_code'];
                                        $plan_name                      = $row['plan_name'];
                                        $plan_amount                    = $row['plan_amount'];
                                        $plan_interval                  = $row['plan_interval'];

                                        $auth_bin                       = $row['auth_bin'];
                                        $auth_last4                     = $row['auth_last4'];
                                        $auth_exp_month                 = $row['auth_exp_month'];
                                        $auth_exp_year                  = $row['auth_exp_year'];
                                        $auth_card_type                 = $row['auth_card_type'];
                                        $sub_start_date                 = $row['sub_start_date'];
                                        $sub_end_date                   = $row['sub_end_date'];
                                        $msg_status                     = $row['status'];
                                        $request_card_update            = $row['request_card_update'];


										$currency		                =   '&#8358;';
										$dis_amount		                =   $currency.$this->cart->format_number($plan_amount);

                                        $subscription_code              = $row['subscription_code'];
                                        $email_token                    = $row['email_token'];
                                                  


                            ?>
                                    <tr>
                                        <td><?php echo $i;?></td>
                                        <td>
                                            <p><?php echo $plan_name;?></p>
                                        </td>
                                        <td><?php echo $plan_code;?></td>
                                        <td><?php echo $subscription_code;?></td>
                                        <td><?php echo $dis_amount;?></td>
                                        <td><?php echo $sub_start_date;?></td>
                                        <td><?php echo $sub_end_date;?></td>
                                        <td>
                                            <a href="<?php echo base_url();?>Subscription/v_plan/<?php echo $plan_id;?>"
                                                class="btn btn-dark btn-sm">
                                                view more
                                            </a>
                                        </td>



                                    </tr>

                                    <?php 
                                    }
                                }
                            ?>

                                </tbody>
                                <?php 
                            if(!is_array($get_sub)){
                                echo $this->Admin_db->alert_callbark('danger','You are not subscribing to any plan at the moment!');
                            }
                            ?>
                            </table>
                        </div>

                    </div>
                </div>



            </div>
        </div>

    </div>
</div>