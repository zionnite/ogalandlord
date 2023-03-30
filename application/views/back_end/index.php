<?php 
	$user_id				= $this->session->userdata('user_id');
	$admin_status			= $this->session->userdata('admin_status');
	$user_status			= $this->session->userdata('status');

	if($admin_status){

		$count_props			= $this->Admin_db->count_all_props();
		$count_conn				= $this->Connection_db->count_all_connection();
		$count_msg				= $this->Chat_db->count_unread_message($user_id);//come here later
		$count_trans			= $this->Transaction_db->count_all_transaction();
		$count_request			= $this->Request_db->count_request_by_user_id($user_id);

	}else{

		$count_props			= $this->Admin_db->count_props($user_id);
		$count_conn				= $this->Connection_db->count_connection_by_user_id($user_id);
		$count_msg				= $this->Chat_db->count_unread_message($user_id);
		$count_trans			= $this->Transaction_db->count_transaction($user_id);

		/**
		 * Totoal Earning
		 * current Balance
		 */
		
	}

    
?>
<div class="page-wrapper">
    <div class="page-content">


        <?php echo isset($alert)?$alert:NULL;?>
        <?php 
					if($user_status	== 'user'){
						$this->load->view('back_end/grid/user_grid');
					}else if($user_status == 'agent' || $user_status == 'landlord'){

						$this->load->view('back_end/grid/agent_grid');

					}else if($user_status == 'promoter'){

						$this->load->view('back_end/grid/promoter_grid');

					}
					else if($user_status	== 'admin' || $user_status	== 'super_admin'){
						$this->load->view('back_end/grid/admin_grid');
					}
				?>




        <?php 
					if($user_status =='user' || $user_status == 'agent' || $user_status =='landlord' || $user_status == 'promoter' || ($user_status	== 'admin' || $user_status	== 'super_admin')){
						if($count_trans <= 0){ 
							echo $this->Admin_db->alert_callbark('info','No Transaction is found under this account at the moment!');
						}
					}
				?>


        <?php
		if($user_status =='user' || $user_status == 'agent' || $user_status =='landlord' || ($user_status	== 'admin' || $user_status	== 'super_admin')){
	?>
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-0">10 Newest Transaction</h5>
                    </div>

                </div>
                <hr>
                <div class="table-responsive">


                    <table class="table align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col"></th>
                                <th scope="col">Amount</th>
                                <th scope="col">Property</th>
                                <th scope="col">Ref No</th>
                                <th scope="col">Date</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
											$get_transaction		= $this->Transaction_db->get_transaction_limit_by_10($user_id);
                                            if(is_array($get_transaction)){
                                                $i=0;
                                                foreach($get_transaction as $row){
                                                    $i++;
                                                    $id                 =$row['id'];
                                                    $props_id           =$row['props_id'];
                                                    $dis_user_id        =$row['user_id'];
                                                    $dis_amount         =$row['amount'];
                                                    $trans_type         =$row['trans_type'];
                                                    $dis_balance        =$row['balance'];
                                                    $description        =$row['description'];
                                                    $ref_no             =$row['ref_no'];
                                                    $dis_status         =$row['status'];
                                                    $date_created       =$row['date_created'];
                                                    $time               =$row['time'];
													


                                                    $props_name                 =$this->Admin_db->get_props_name_by_id($props_id);
                                                    $props_image                =$this->Admin_db->get_props_image_by_id($props_id);

                                                    $get_props_state_id         =$this->Admin_db->get_state_id_by_props_id($props_id);
                                                    $get_state_name             =$this->Admin_db->get_state_name_state_id($get_props_state_id);
                                                    
                                                    $get_props_sub_state_id     =$this->Admin_db->get_sub_state_id_by_props_id($props_id);
                                                    $get_sub_state_name         =$this->Admin_db->get_sub_state_name_sub_state_id($get_props_sub_state_id);

													$currency		='&#8358;';
													$dis_amount		= $currency.$this->cart->format_number($dis_amount);


                                            ?>

                            <tr>
                                <td scope="row"><?php echo $i;?></td>
                                <td scope="row">
                                    <div class="d-flex order-actions">
                                        <?php
                                                        if($trans_type =='withdraw'){?>
                                        <a href="javascript:;" class="ms-4"><i class="bx bx-down-arrow-alt"
                                                style="color:red;"></i></a>
                                        <?php }else if($trans_type == 'deposit'){?>
                                        <a href="javascript:;" class="ms-4"><i class="bx bx-up-arrow-alt"
                                                style="color:green;"></i></a>
                                        <?php }else if($trans_type == 'complete_transafer'){?>
                                        <a href="javascript:;" class="ms-4"><i class="bx bx-up-arrow-alt"
                                                style="color:green;"></i></a>
                                        <a href="javascript:;" class="ms-4"><i class="bx bx-up-arrow-alt"
                                                style="color:green;"></i></a>
                                        <?php }else if($trans_type == 'complete_withdraw'){?>
                                        <a href="javascript:;" class="ms-4"><i class="bx bx-down-arrow-alt"
                                                style="color:red;"></i></a>
                                        <a href="javascript:;" class="ms-4"><i class="bx bx-down-arrow-alt"
                                                style="color:red;"></i></a>
                                        <?php }
                                                    ?>
                                    </div>
                                </td>
                                <td>
                                    <?php echo $dis_amount;?>
                                </td>
                                <td>
                                    <!-- <img src="" width="50px"  height="50px" alt=""> -->

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
                                            <h6 class="mb-1 font-14">
                                                <?php echo $get_state_name.','.$get_sub_state_name;?></h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <?php echo $ref_no;?>
                                </td>
                                <td>
                                    <?php echo $date_created;?>
                                </td>

                                <td>
                                    <?php 
                                                    if($dis_status =='pending'){?>
                                    <div class="badge rounded-pill bg-light-info text-info w-100">In Progress</div>
                                    <?php }else if($dis_status =='cancel'){?>
                                    <div class="badge rounded-pill bg-light-danger text-danger w-100">Cancelled</div>
                                    <?php }else if($dis_status =='success'){?>
                                    <div class="badge rounded-pill bg-light-success text-success w-100">Completed</div>
                                    <?php 
                                                    }
                                                ?>
                                </td>
                                <!-- <button type="button" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Tooltip on top">Tooltip on top</button> -->





                            </tr>

                            <?php 
                                                }
                                            }
                                        ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php }else{?>
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
        <?php }?>

    </div>
</div>