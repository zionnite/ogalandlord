<div class="row" style="margin-bottom:3%;">
    <?php
        $get_sub_plan       = $this->Subscription_db->get_sub_plan_by_id($id);
        if(is_array($get_sub_plan)){
            foreach($get_sub_plan as $row){
                $dis_id                 =$row['id'];
                $plan_id                =$row['plan_id'];
                $plan_code              =$row['plan_code'];
                $plan_name              =$row['plan_name'];
                $plan_desc              =$row['plan_desc'];
                $plan_interval          =$row['plan_interval'];
                $plan_amount            =$row['plan_amount'];
                $plan_limit             =$row['plan_limit'];
                $currency		        =   '&#8358;';
				$dis_amount		        =   $currency.$this->cart->format_number($plan_amount);

                if($plan_limit == '1'){
                    $plan_interval  = 'OUTRIGHT';
                }
         
    ?>
    <div class="col-md-4">
        <div class="card mb-5 mb-lg-0">
            <div class="card-header bg-danger py-3">
                <h5 class="card-title text-white text-uppercase text-center"><?php echo $plan_name;?></h5>
                <h6 class="card-price text-white text-center"><?php echo $dis_amount;?><span
                        class="term">/<?php echo $plan_interval;?></span>
                </h6>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><i class="bx bx-check me-2 font-18"></i>
                        <?php echo $dis_amount;?></li>
                    <li class="list-group-item"><i class="bx bx-check me-2 font-18"></i>
                        <?php echo ucfirst($plan_interval);?> Plan
                    </li>
                    <li class="list-group-item"><i class="bx bx-check me-2 font-18"></i>
                        <?php echo $plan_limit;?> Invoice Limit</li>

                </ul>
                <div class="d-grid">
                    <a href="#request_<?php echo $dis_id;?>" data-bs-toggle="modal"
                        class="btn btn-danger my-2 radius-30">Subscribe Now</a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="request_<?php echo $dis_id;?>" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Action</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to Subscribe to this Plan
                        (<?php echo $plan_name;?>)?




                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="<?php echo base_url();?>Subscription/join_sub/<?php echo $user_id;?>/<?php echo $plan_id;?>/<?php echo $plan_code;?>"
                        class="btn btn-danger">Yes, Continue</a>
                </div>
            </div>
        </div>
    </div>


    <?php 

            }
        }
    ?>

</div>