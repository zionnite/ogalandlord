<?php 
$site_desc				= $this->Action->get_site_desc();
$site_keyword			= $this->Action->get_site_keyword();
$get_site_logo          = $this->Action->get_site_logo();
?>
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="<?php echo base_url();?>project_dir/<?php echo $get_site_logo;?>" type="image/png" />
	<!--plugins-->
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
	<title>
		<?php
			$site_name			=$this->Action->get_site_name();
			if($this->uri->segment(1) == 'Login'){
				if($this->uri->segment(2) =='index' || $this->uri->segment(2) == ''){
					echo $site_name.' | Login';
				}
				else if($this->uri->segment(2) == 'forget_password'){
					echo $site_name.' | Forgot Password';
				}

				else if($this->uri->segment(2) == 'confirm_reset_password'){
					echo $site_name.' | Confirm Password Reset';
				}
			}
			else if($this->uri->segment('1') == 'Register'){
				echo $site_name.' | Register';
			}
		?>
	</title>
</head>