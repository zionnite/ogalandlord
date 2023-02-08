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


		$total_earning			= $this->Action->get_site_total_earning();
		$insurance_earning		= $this->Action->get_insurance_total_earning();

		$currency				='&#8358;';
		$total_earning			= $currency.$this->cart->format_number($total_earning);
		$insurance_earning		= $currency.$this->cart->format_number($insurance_earning);
		

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
				
				<div class="row">

					<div class="col-md-6">
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
					
					<div class="col-md-6">
						<div class="card radius-10 bg-primary bg-gradient">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-white">Insurance Earning</p>
										<h4 class="my-1 text-white"><?php echo $insurance_earning;?></h4>
									</div>
									<div class="text-white ms-auto font-35"><i class="fadeIn animated bx bx-coin-stack"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-md-3">
						<div class="card radius-10 bg-primary bg-gradient">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-white">Total Property</p>
										<h4 class="my-1 text-white"><?php echo $count_props;?></h4>
									</div>
									<div class="text-white ms-auto font-35"><i class="bx bx-home"></i>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-3">
						<div class="card radius-10 bg-danger bg-gradient">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<!-- <p class="mb-0 text-white">Total Income</p> -->
										<p class="mb-0 text-white">Total Transaction</p>
										<h4 class="my-1 text-white"><?php echo $count_trans;?></h4>
									</div>
									<div class="text-white ms-auto font-35"><i class="lni lni-stats-up"></i>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-3">
						<div class="card radius-10 bg-warning bg-gradient">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-dark">Total Connection</p>
										<h4 class="text-dark my-1"><?php echo $count_conn;?></h4>
									</div>
									<div class="text-dark ms-auto font-35"><i class="bx bx-user-pin"></i>
									</div>
								</div>
							</div>
						</div>
					</div>


					<div class="col-md-3">
						<div class="card radius-10 bg-success bg-gradient">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-white">Request</p>
										<h4 class="my-1 text-white"><?php echo $count_request;?></h4>
									</div>
									<div class="text-white ms-auto font-35"><i class="bx bx-comment-detail"></i>
									</div>
								</div>
							</div>
						</div>
					</div>

					





				</div>

				<div class="row">
					
						<div class="col-md-6">
							<a href="<?php echo base_url();?>Property">
								<div class="card bg-dark text-white">
									<div class="card-body">
										<h5 class="card-title text-white">Manage Property</h5>
										<p class="card-text">View All Property<br /> Approve Property<br /> Reject Property, etc</p>
									</div>
								</div>
							</a>
						</div>
					

					<div class="col-md-6">
						<a href="<?php echo base_url();?>Request">
							<div class="card bg-success text-white">
								<div class="card-body">
									<h5 class="card-title text-white">Manage Request</h5>
									<p class="card-text">View Request<br /> View Requester<br />Create User & Agent Connection</p>
								</div>
							</div>
						</a>
					</div>

				</div>
