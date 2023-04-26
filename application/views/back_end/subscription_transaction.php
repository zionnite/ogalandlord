<style>
.float_right {
    float: right;
    margin: 0% 1%;
}

.follow_float {
    position: relative;
    float: right;
    margin: 0% 1%;
}
</style>
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Transaction</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Subscription</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">

                        <div class="col-lg-12 col-xl-12">
                            <form class="" method="post" action="<?php echo base_url();?>Admin_panel/search_subs">
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="position-relative">
                                            <input type="text" class="form-control ps-5" name="keyword"
                                                placeholder="Search Transaction by User Email"> <span
                                                class="position-absolute top-50 product-show translate-middle-y"><i
                                                    class="bx bx-search"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="position-relative">
                                            <input type="submit" name="submit"
                                                class="btn btn-danger btn-sm btn-block p-2" value="Search">
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <?php echo isset($alert)?$alert:NULL;?>
        <div class="card">
            <div class="card-body">



                <form action="<?php echo base_url();?>Admin_panel/date_search_sub" method="post">
                    <div class="follow_float" style="margin-top:2.1%;">
                        <input type="submit" name="submit" class="btn btn-dark btn-sm" value="Filter Transaction" />
                    </div>

                    <div class="follow_float" style="width:40%;">
                        <span>To Date</span>
                        <input type="date" name="to_date" class="form-control" required>
                    </div>

                    <div class="follow_float" style="width:40%;">
                        <span>From Date</span>
                        <input type="date" name="from_date" class="form-control" required />
                    </div>
                </form>




            </div>
        </div>



        <h6 class="mb-0 text-uppercase">Subscription Transaction</h6>
        <hr>
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h class="mb-0">Tranaction (<?php echo $total;?>)</h>
                    </div>

                </div>
                <hr>
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>S/N</th>
                                <th></th>
                                <th>Amount</th>
                                <th>Email</th>
                                <th>Plan ID</th>
                                <th>Plan Code</th>
                                <th>Paid Date</th>
                                <th>Status</th>
                                <th>IsCard</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                        /**
                         * if its deposit, it can be trace
                         */
                        if(is_array($transaction)){
                            $i=0;
                            foreach($transaction as $row){
                                $i++;
                                $id                 =$row['id'];
                                $dis_user_id        =$row['user_id'];
                                $dis_email          =$row['customer_email'];
                                $plan_id            =$row['plan_id'];
                                $plan_code          =$row['plan_code'];
                                $amount             =$row['amount'];
                                $paid_date          =$row['paid_date'];
                                $day                =$row['day'];
                                $month              =$row['month'];
                                $year               =$row['year'];
                                $time               =$row['time'];
                                $dis_status         =$row['status'];
                                $is_card            =$row['is_card'];


                                $currency		    ='&#8358;';
								$amount		        = $currency.$this->cart->format_number($amount);


                                $agent_full_name    = $this->Users_db->get_user_full_name_by_id($dis_user_id);
                                $agent_image_name   = $this->Users_db->get_image_name_by_id($dis_user_id);
                                $agent_user_name    = $this->Users_db->get_user_name_by_id($dis_user_id);


                                
                                                   


                    ?>
                            <tr>
                                <td><?php echo $i;?></td>
                                <td><img sr="<?php echo base_url();?>project_dir/users/<?php echo $agent_user_name;?>/images/<?php echo $agent_image_name;?>"
                                        style="20px; height:20px" /><br />
                                    <?php echo $agent_full_name;?>
                                </td>
                                <td><?php echo $amount;?></td>
                                <td><?php echo $dis_email;?></td>
                                <td><?php echo $plan_id;?></td>
                                <td><?php echo $plan_code;?></td>
                                <td><?php echo $paid_date;?></td>
                                <td>
                                    <?php
                                    if($dis_status  == 'success'){?>
                                    <div class="badge rounded-pill bg-light-success text-success w-100">Sucessful</div>
                                    <?php }else{?>
                                    <div class="badge rounded-pill bg-light-danger text-danger w-100">Failed</div>
                                    <?php 
                                    }
                                    ?>

                                </td>
                                <td><?php echo $is_card;?></td>




                                <td><?php $this->Admin_db->time_stamp($time)?></td>




                            </tr>

                            <?php 
                                    }
                                }
                            ?>

                        </tbody>
                        <?php 
                            if(!is_array($transaction)){
                                echo $this->Admin_db->alert_callbark('danger','You have no Payout transaction at the moment');
                            }
                       ?>
                    </table>
                </div>
            </div>
        </div>

        <?php echo $pagination;?>
    </div>
</div>