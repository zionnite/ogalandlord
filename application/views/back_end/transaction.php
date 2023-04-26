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
                        <li class="breadcrumb-item active" aria-current="page">Payout</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->

        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-0">Payout Tranaction (<?php echo $total;?>)</h5>
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
                        if(is_array($transaction)){
                            $i=0;
                            foreach($transaction as $row){
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