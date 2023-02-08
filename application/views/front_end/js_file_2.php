 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/popper.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendors/appear/jquery.appear.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendors/jquery.easing/jquery.easing.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/tether.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendors/common/common.min.js"></script>

    <!-- MAIN MENU -->
    <script src="<?php echo base_url();?>assets/vendors/menu/js/vendors-menu.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendors/menu/js/jquery.sticky.js"></script>
    <script src="<?php echo base_url();?>assets/vendors/menu/js/app-menu.js"></script>

    <!-- MAP -->
    <script src="<?php echo base_url();?>assets/vendors/gmap/jquery.axgmap.js"></script>

    <!-- MASONRY -->
    <script src="<?php echo base_url();?>assets/vendors/isotope/jquery.isotope.min.js"></script>

    <!-- OWL CAROUSEL SLIDER -->
    <script src="<?php echo base_url();?>assets/vendors/owl.carousel/js/owl.carousel.min.js"></script>

    <!-- SILCK SLIDER -->
    <script src="<?php echo base_url();?>assets/vendors/slick/slick.js"></script>

    <!-- FANCY BOX -->
    <script src="<?php echo base_url();?>assets/vendors/fancybox/jquery.fancybox.min.js"></script>

    <!-- FILE-UPLOADER -->
    <script src="<?php echo base_url();?>assets/vendors/fileuploader/js/jquery.fileuploader.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendors/fileuploader/js/custom.js"></script>

    <!-- THEME-CUSTOM -->
    <script src="<?php echo base_url();?>assets/js/main.js"></script>
    
    <!-- THEME-INITIALIZATION-FILES -->
    <script src="<?php echo base_url();?>assets/js/theme.init.js"></script>

  

    <script>
	$(document).ready(function () {
		

		$("#search_state").change(function () {
			var list_state = $('#search_state').val();
			var dataString = 'state=' + list_state;
			//alert(dataString);
			$.ajax({
				type: "POST",
				url: "<?php echo base_url();?>Dashboard/get_sub_state",
				data: dataString,
				cache: false,
				success: function (html) {
					$("#search_area").html(html);

				}
			});
		});
	});

</script>