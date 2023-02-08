<?php 
$get_site_logo          = $this->Action->get_site_logo();
$site_desc				= $this->Action->get_site_desc();
$site_keyword			= $this->Action->get_site_keyword();
$user_status         	=$this->session->userdata('status');

?>
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<meta name="description" content="<?php echo $site_desc;?>">
    <meta name="keywords" content="<?php echo $site_keyword;?>">
	<!--favicon-->
	<link rel="icon" href="<?php echo base_url();?>project_dir/<?php echo $get_site_logo;?>" type="image/png" />
	<!--plugins-->
	<link href="<?php echo base_url();?>assets_2/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet"/>
	<link href="<?php echo base_url();?>assets_2/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="<?php echo base_url();?>assets_2/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="<?php echo base_url();?>assets_2/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="<?php echo base_url();?>assets_2/css/pace.min.css" rel="stylesheet" />
	<script src="<?php echo base_url();?>assets_2/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="<?php echo base_url();?>assets_2/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
	<link href="<?php echo base_url();?>assets_2/css/app.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets_2/css/icons.css" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets_2/css/dark-theme.css" />
	<link rel="stylesheet" href="<?php echo base_url();?>assets_2/css/semi-dark.css" />
	<link rel="stylesheet" href="<?php echo base_url();?>assets_2/css/header-colors.css" />
	<title>
		<?php 
			$site_name			=$this->Action->get_site_name();
			if($this->uri->segment(1) =='Dashboard'){
				if($this->uri->segment(2) == 'index' || $this->uri->segment(2) == ''){
					echo $site_name.' | Dashboard';
				}
				else if($this->uri->segment(2) == 'view_favourite'){
					echo $site_name.' | View Favourite';
				}
				else if($this->uri->segment(2) == 'manage_property_image'){
					echo $site_name.' | Manage Property Image ';
				}
				else if($this->uri->segment(2) == 'add_feature_image'){
					echo $site_name.' | Add Feature Image ';
				}
				else if($this->uri->segment(2) == 'add_image_property' || $this->uri->segment(2) == 'add_image_to_property'){
					echo $site_name.' | Add image to Property';
				}
				else if($this->uri->segment(2) == 'add_extra_detail'){
					echo $site_name.' | Add Extra Detail';
				}
			}
			else if($this->uri->segment(1) == 'Wallet'){

				if($this->uri->segment(2) == 'index' || $this->uri->segment(2) ==''){
					echo $site_name.' | Wallet';
				}
				else if($this->uri->segment(2) == 'fund_wallet'){
					echo $site_name.' | Fund Wallet';
				}
			}
			else if($this->uri->segment(1) == 'Profile'){

				
				if($this->uri->segment(2) == 'view_user'){
					echo $site_name.' | View User Profile';
				}
				
			}
			else if($this->uri->segment(1) == 'Transaction'){

				if($this->uri->segment(2) == 'index' || $this->uri->segment(2) ==''){
					echo $site_name.' | View Transaction';
				}
				else if($this->uri->segment(2) == 'fund_wallet'){
					echo $site_name.' | Fund Wallet';
				}
			}
			else if($this->uri->segment(1) == 'Request'){

				if($this->uri->segment(2) == 'index' || $this->uri->segment(2) ==''){
					echo $site_name.' | View Request';
				}
				else if($this->uri->segment(2) == 'fund_wallet'){
					echo $site_name.' | Fund Wallet';
				}
			}
			else if($this->uri->segment(1) == 'View-Message' || $this->uri->segment(1) == 'Message'){

				if($this->uri->segment(2) == 'index' || $this->uri->segment(2) ==''){
					echo $site_name.' | Messages List';
				}
				else if($this->uri->segment(2) == 'quick_msg'){
					echo $site_name.' | Quick Property Reply';
				}
			}
			else if($this->uri->segment(1) == 'Connection'){

				if($this->uri->segment(2) == 'index' || $this->uri->segment(2) ==''){
					echo $site_name.' | My Connection';
				}
				else if($this->uri->segment(2) == 'quick_msg'){
					echo $site_name.' | Quick Property Reply';
				}
			}
			else if($this->uri->segment(1) == 'Alert'){

				if($this->uri->segment(2) == 'index' || $this->uri->segment(2) ==''){
					echo $site_name.' | My Alert Notification';
				}
				else if($this->uri->segment(2) == 'quick_msg'){
					echo $site_name.' | Quick Property Reply';
				}
			}
			else if($this->uri->segment(1) == 'Property'){

				if($this->uri->segment(2) == 'index' || $this->uri->segment(2) ==''){
					echo $site_name.' | Property List';
				}
				else if($this->uri->segment(2) == 'add'){
					echo $site_name.' | Add Property';
				}
				else if($this->uri->segment(2) == 'quick_msg'){
					echo $site_name.' | Quick Property Reply';
				}
			}
			else if($this->uri->segment(1) == 'Admin_panel'){

				if($this->uri->segment(2) == 'index' || $this->uri->segment(2) ==''){
					echo $site_name.' | Property List';
				}
				else if($this->uri->segment(2) == 'view_all_property'){
					echo $site_name.' | View all Property';
				}
				else if($this->uri->segment(2) == 'view_all_pending_property'){
					echo $site_name.' | View all Pending Property';
				}

				else if($this->uri->segment(2) == 'view_all_approve_property'){
					echo $site_name.' | View all Approved Property';
				}

				else if($this->uri->segment(2) == 'view_all_unapprove_property'){
					echo $site_name.' | View all Rejected Property';
				}

				else if($this->uri->segment(2) == 'view_all_users'){
					echo $site_name.' | View all User';
				}

				else if($this->uri->segment(2) == 'view_all_agents'){
					echo $site_name.' | View all Agents (Landlord)';
				}

				else if($this->uri->segment(2) == 'view_bank_list'){
					echo $site_name.' | Site Setting > Bank List';
				}

				else if($this->uri->segment(2) == 'update_bank_code'){
					echo $site_name.' | Site Setting > Update Bank Code';
				}

				else if($this->uri->segment(2) == 'view_state_list'){
					echo $site_name.' | Site Setting > View State List';
				}

				else if($this->uri->segment(2) == 'update_state'){
					echo $site_name.' | Site Setting > Update State List';
				}

				else if($this->uri->segment(2) == 'view_property_types'){
					echo $site_name.' | Site Setting > View Property Type';
				}

				else if($this->uri->segment(2) == 'update_property_type'){
					echo $site_name.' | Site Setting > Update Property Type';
				}

				else if($this->uri->segment(2) == 'view_partners'){
					echo $site_name.' | Site Setting > View Partners';
				}

				else if($this->uri->segment(2) == 'update_partners'){
					echo $site_name.' | Site Setting > Update Partner List';
				}

				else if($this->uri->segment(2) == 'update_site_logos'){
					echo $site_name.' | Site Setting > Update Site Logo';
				}

				else if($this->uri->segment(2) == 'update_site_detail'){
					echo $site_name.' | Site Setting > Update Site Details';
				}

				else if($this->uri->segment(2) == 'update_payment_api'){
					echo $site_name.' | Site Setting > Update Payment API';
				}

				else if($this->uri->segment(2) == 'update_payment_commission'){
					echo $site_name.' | Site Setting > Update Payment Commission';
				}

				else if($this->uri->segment(2) == 'update_social_link'){
					echo $site_name.' | Site Setting > Update Social Link';
				}
				else if($this->uri->segment(2) == 'view_manager'){
					echo $site_name.' | Site Setting > View Managers';
				}
				else if($this->uri->segment(2) == 'add_manager'){
					echo $site_name.' | Site Setting > Add Manager';
				}

				else{
					echo $site_name .' | Admin Panel';
				}
			}


		?>
	</title>


	<style>
		.btn-block{display:block;width:100%}
		.btn-block+.btn-block{margin-top:.5rem}
		input[type=button].btn-block,input[type=reset].btn-block,input[type=submit].btn-block{width:100%}
	</style>
</head>
