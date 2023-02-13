<?php 
	$user_id				= $this->session->userdata('user_id');
	$admin_status			= $this->session->userdata('admin_status');
	$user_status			= $this->session->userdata('status');

	$count_props			= $this->Admin_db->count_props($user_id);
	$count_conn				= $this->Connection_db->count_connection_by_user_id($user_id);
	$count_msg				= $this->Chat_db->count_unread_message($user_id);
	$count_trans			= $this->Transaction_db->count_transaction($user_id);

	$total_earning			= $this->Users_db->get_user_total_earning($user_id);
	$wallet_balance			= $this->Users_db->get_user_current_balance($user_id);

	$currency			='&#8358;';
	$total_earning		= $currency.$this->cart->format_number($total_earning);
	$wallet_balance		= $currency.$this->cart->format_number($wallet_balance);


	/**
	 * total earning
	 * current balance
	 */

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
                        <p class="mb-0 text-white">Wallet Balance</p>
                        <h4 class="my-1 text-white"><?php echo $wallet_balance;?></h4>
                    </div>
                    <div class="text-white ms-auto font-35"><i class="fadeIn animated bx bx-wallet-alt"></i>
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

    <div class="col-md-4">
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

    <div class="col-md-4">
        <div class="card radius-10 bg-success bg-gradient">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-white">Message</p>
                        <h4 class="my-1 text-white"><?php echo $count_msg;?></h4>
                    </div>
                    <div class="text-white ms-auto font-35"><i class="bx bx-comment-detail"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<div class="row">

    <div class="col-md-4">
        <a href="<?php echo base_url();?>Request">
            <div class="card bg-dark text-white">
                <div class="card-body">
                    <h5 class="card-title text-white">Manage Request</h5>
                    <p class="card-text">View Request<br /> View Requester<br />&nbsp;&nbsp;</p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-4">
        <a href="<?php echo base_url();?>View-Message">
            <div class="card bg-danger text-white">
                <div class="card-body">
                    <h5 class="card-title text-white">Manage Message</h5>
                    <p class="card-text">View Message<br />Reply Message<br /> &nbsp;</p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-4">
        <a href="<?php echo base_url();?>Connection">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5 class="card-title text-white">Manage Connection</h5>
                    <p class="card-text">View Connection<br />Initiate Message<br /> Delete Connection</p>
                </div>
            </div>
        </a>
    </div>


</div>