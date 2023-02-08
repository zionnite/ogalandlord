<?php
$site_name      		= $this->Action->get_site_name();
$get_site_logo          = $this->Action->get_site_logo();

?>
<!doctype html>
<html lang="en">


<?php $this->load->view('auth/head');?>

<body class="bg-login">
	<!--wrapper-->
	<div class="wrapper">
		<div class="d-flex align-items-center justify-content-center my-5 my-lg-0">
			<div class="container">
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2">
					<div class="col mx-auto">
						<div class="my-4 text-center">
							<a href="<?php echo base_url();?>Welcome">
								<img src="<?php echo base_url();?>project_dir/<?php echo $get_site_logo;?>" style="width:90px;" alt="" />
							</a>
						</div>
						<?php echo isset($alert)?$alert:NULL;?>
						<?php isset($content)?$this->load->view($content):NULL;?>
					</div>
				</div>
				<!--end row-->
			</div>
		</div>
	</div>
	<!--end wrapper-->
	<!-- Bootstrap JS -->
<?php $this->load->view('auth/js_file');?>
</body>

</html>