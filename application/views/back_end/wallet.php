<style>
    .ajax-loader {
        /* visibility: hidden; */
        background-color: rgba(0,0,3,0.4);
        position: absolute;
        z-index: +100 !important;
        width: 100%;
        height:100%;
    }

    .ajax-loader img {
        position: relative;
        top:40%;
        left:44%;
    }
</style>

<div class="ajax-loader">
    <img src="<?php echo base_url();?>project_dir/loader.gif" class="img-responsive" />
</div>


<div class="page-wrapper">
	<div class="page-content">
                        <h6 class="mb-0 text-uppercase">View Wallet</h6>
						<hr>

                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-lg-12 col-xl-12">
                                            <a href="<?php echo base_url();?>Wallet/fund_wallet" class="btn btn-primary  mb-3 mb-lg-0"><i class="bx bxs-plus-square"></i>Fund Wallet</a>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        
						<?php echo isset($alert)?$alert:NULL;?>
						
                        <div class="card">
							<div class="card-body">
								<table class="table mb-0">
									<thead>
										<tr>
											<th scope="col">#</th>
											<th scope="col">Property</th>
											<th scope="col">Amount</th>
											<th scope="col">Date</th>
											<th scope="col"></th>
											<th scope="col"></th>
										</tr>
									</thead>
									<tbody>
                                        <?php
                                            $get_wallet       = $this->Wallet_db->get_user_wallet($user_id);
                                            if(is_array($get_wallet)){
                                                $i=0;
                                                foreach($get_wallet as $row){
                                                    $i++;
                                                    $id                 = $row['id'];
                                                    $dis_user_id        = $row['user_id'];
                                                    $agent_id           = $row['agent_id'];
                                                    $props_id           = $row['props_id'];
                                                    $amount             = $row['amount'];
                                                    $amount_2            = $row['amount'];
                                                    $full_date          = $row['full_date'];
                                                    $month              = $row['month'];
                                                    $day                = $row['day'];
                                                    $year               = $row['year'];
                                                    $time               = $row['time'];
                                                    $trans_type         = $row['trans_type'];
                                                    $trans_status       = $row['trans_status'];
                                                    $is_pay             = $row['is_pay'];
                                                    $is_requested       = $row['is_requested'];



                                                    $props_name                 =$this->Admin_db->get_props_name_by_id($props_id);
                                                    $props_image                =$this->Admin_db->get_props_image_by_id($props_id);

                                                    $get_props_state_id         =$this->Admin_db->get_state_id_by_props_id($props_id);
                                                    $get_state_name             =$this->Admin_db->get_state_name_state_id($get_props_state_id);
                                                    
                                                    $get_props_sub_state_id     =$this->Admin_db->get_sub_state_id_by_props_id($props_id);
                                                    $get_sub_state_name         =$this->Admin_db->get_sub_state_name_sub_state_id($get_props_sub_state_id);

                                                    $currency		            ='&#8358;';
													$amount 		            = $currency.$this->cart->format_number($amount);
													$amount_2 		            = $this->cart->format_number($amount_2);

                                                  
                                                    
                                            ?>

										<tr>
											<td scope="row"><?php echo $i;?></td>
                                            <td>
                                                <div class="d-flex align-items-center">
													<div class="recent-product-img">
														<a href="<?php echo base_url();?>Property/view_property/<?php echo $props_id;?>" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="<?php echo $props_name;?>">
                                                            <img src="<?php echo base_url();?>project_dir/property/<?php echo $props_image;?>" alt="">
                                                        </a>
													</div>
													<div class="ms-2">
														<h6 class="mb-1 font-14"><?php echo $get_state_name.','.$get_sub_state_name;?></h6>
													</div>
												</div>
                                            </td>
                                            <td>
                                                <?php echo $amount;?>
                                            </td>
                                            <td>
                                                <?php echo $full_date;?>
                                            </td>

                                            <td>
                                                <?php echo $this->Admin_db->time_stamp($time);?>
                                            </td>

                                            <td>
                                                <?php if($trans_type == 'deposit'){?>
                                                    <?php if($is_pay =='yes'){?>
                                                            <a href="javascript:;" id="pull_out<?php echo $id;?>" class="btn btn-success btn-sm"><i class="fadeIn animated bx bx-money"></i> Initiated Settlement</a>
                                                    <?php }else{?>

                                                                <a href="javascript:;" id="pull_out<?php echo $id;?>" class="btn btn-dark btn-sm"><i class="fadeIn animated bx bx-money"></i> Pull Out Now</a>
                                                    <?php } ?>
                                                <?php }elseif($trans_type == 'withdraw'){?>
                                                            <a href="javascript:;" id="withdrawl_<?php echo $id;?>" class="btn btn-danger btn-sm"><i class="fadeIn animated bx bx-money"></i> Already Pull Out</a>
                                                <?php }?>
                                            </td>

                                           
                                           

                                           
                                                    <div class="modal fade" id="more_<?php echo $id;?>" tabindex="-1" aria-hidden="true">
                                                        <div class="modal-dialog modal-sm">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Confirm Action</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p></p>
                                                                                                            
                                                                    
                                                                    
                                                                    
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <a href="javascript:;" id="pull_out" class="btn btn-danger">Yes, Continue</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
										</tr>
										
                                        <script src="<?php echo base_url();?>assets_2/js/jquery.min.js"></script>
                                        <script src="<?php echo base_url();?>assets_2/js/sweetalert.min.js"></script> 
                                        <script>
                                            $('.ajax-loader').hide();
                                            $(document).ready(function(){
                                                $('#pull_out<?php echo $id;?>').click(function(){
                                                    swal({
                                                        title: "Are you sure?",
                                                        text: "Are you sure you want to Pull-Out this Amount (<?php echo $amount_2;?> NGN ) from your wallet?",
                                                        icon: "warning",
                                                        buttons: true,
                                                        dangerMode: false,
                                                        closeOnClickOutside: false,
                                                    })
                                                    .then((willDelete) => {
                                                        if(willDelete){

                                                            $('.ajax-loader').show();
                                                                $.ajax({
                                                                url: '<?php echo base_url();?>Transaction/pull_out_payment/<?php echo $props_id;?>/<?php echo $agent_id;?>/<?php echo $user_id;?>',
                                                                type: "post",
                                                                success: function (data) {
                                                                    
                                                                    $('.ajax-loader').hide();

                                                                    if (data == 'ok') {

                                                                        swal({
                                                                            title: "Success",
                                                                            text: "Pull Out successful, transfer has been added to queue!",
                                                                            icon: "success",
                                                                            closeOnClickOutside: false,
                                                                        });

                                                                        

                                                                    } else if (data == 'not_ok') {

                                                                        swal({
                                                                            title: "Oops!",
                                                                            text: "Transaction failed, could not carryout pull-out transfer,please try again later!",
                                                                            icon: "error",
                                                                            closeOnClickOutside: false,
                                                                        });

                                                                    }else{

                                                                        swal({
                                                                            title: "Oops!",
                                                                            text: data,
                                                                            icon: "warning",
                                                                            closeOnClickOutside: false,
                                                                        });

                                                                    }

                                                                }
                                                            });
                                                        }
                                                        
                                                        
                                                    });

                                                });
                                            });


                                                


                                                $('#withdrawl_<?php echo $id;?>').click(function(){
                                                    swal({
                                                        title: "Oops!!",
                                                        text: "You have already Pull Out this amount from this wallet!",
                                                        icon: "warning",
                                                        buttons: true,
                                                        dangerMode: false,
                                                        closeOnClickOutside: false,
                                                    })
                                                });

                                        </script>
                                        <?php 
                                                }
                                            }
                                        ?>
										
									</tbody>
                                    <h6>Total Wallet Item (<?php echo $this->Wallet_db->count_user_wallet($user_id);?>)</h6>
								</table>

                                <?php
                                    if(!is_array($get_wallet)){
                                        echo $this->Admin_db->alert_callbark('danger','No Fund item is Available at the moment!');
                                    }
                                ?>

							</div>
						</div>
	</div>				
</div>


<script src="<?php echo base_url();?>assets_2/js/jquery.min.js"></script>
<script>
    $('.ajax-loader').hide();


</script>