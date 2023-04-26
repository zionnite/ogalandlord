<?php 
$count_users                = $this->MUser_db->cout_m_user();
$payable_balance            = $this->MUser_db->get_site_mlm_payable_balance();
$total_earning              = $this->MUser_db->get_site_mlm_total_balance();

?>

<div class="page-wrapper">
    <div class="page-content">
        <div class="row">

            <div class="col-md-4">
                <div class="card radius-10 bg-dark bg-gradient">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-white">Total Earning</p>
                                <h4 class="my-1 text-white"><?php echo $total_earning;?></h4>
                            </div>
                            <div class="text-white ms-auto font-35"><i class="fadeIn animated bx bx-coin-stack"></i>
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
                                <p class="mb-0 text-white">Payable Balance</p>
                                <h4 class="my-1 text-white"><?php echo $payable_balance;?></h4>
                            </div>
                            <div class="text-white ms-auto font-35"><i class="fadeIn animated bx bx-coin-stack"></i>
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
                                <p class="mb-0 text-white">Total Users</p>
                                <h4 class="my-1 text-white"><?php echo $count_users;?></h4>
                            </div>
                            <div class="text-white ms-auto font-35"><i class="lni lni-users"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-0">Top Payout Tranaction</h5>
                    </div>

                </div>
                <hr>
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>S/N</th>
                                <th>Amount</th>
                                <th>Type</th>
                                <th>Description</th>
                                <th>Date Created</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                        /**
                         * if its deposit, it can be trace
                         */
						$trans		= $this->MUser_db->get_transaction_limit_20($user_id);
                        if(is_array($trans)){
                            $i=0;
                            foreach($trans as $row){
                                $i++;
                                $id                 =$row['id'];
                                $dis_user_id        =$row['user_id'];
                                $dis_amount         =$row['amount'];
                                $trans_type         =$row['trans_type'];
                                $description        =$row['description'];
                                $ref_no             =$row['ref_no'];
                                $dis_status         =$row['status'];
                                $date_created       =$row['date_created'];
                                $time               =$row['time'];
                                $trace_tree         =$row['trace_tree'];
                                $decendant_id       =$row['decendant_id'];

                                $currency		    ='&#8358;';
								$dis_amount		    = $currency.$this->cart->format_number($dis_amount);

                                
                                                   


                    ?>
                            <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo $dis_amount;?></td>
                                <td>
                                    <?php
                                if($trans_type  == 'deposit'){?>
                                    <div class="badge rounded-pill bg-light-success text-success w-100">Completed</div>
                                    <?php }else{?>
                                    <div class="badge rounded-pill bg-light-danger text-danger w-100">Withdraw</div>
                                    <?php 
                            }
                            ?>
                                </td>

                                <td><?php echo $description;?></td>
                                <td><?php echo $date_created;?></td>
                                <td><?php echo $date_created;?></td>
                                <td><?php $this->Admin_db->time_stamp($time)?></td>




                            </tr>

                            <?php 
                                    }
                                }
                            ?>

                        </tbody>
                        <?php 
                            if(!is_array($trans)){
                                echo $this->Admin_db->alert_callbark('danger','You have no transaction at the moment');
                            }
                       ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>