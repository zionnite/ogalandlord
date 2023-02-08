<?php 
$site_desc				= $this->Action->get_site_desc();
$site_keyword			= $this->Action->get_site_keyword();

?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="<?php echo $site_desc;?>">
    <meta name="keywords" content="<?php echo $site_keyword;?>">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>
    <?php
      $site_name      = $this->Action->get_site_name();
      $get_site_logo          = $this->Action->get_site_logo();
      if($this->uri->segment(1) == 'Welcome' || $this->uri->segment(1) ==''){
        if($this->uri->segment(2) == 'index' || $this->uri->segment(2) == ''){

          echo $site_name. ' | Welcome';

        }else if($this->uri->segment(2) == 'search_property'){

          echo $site_name. ' | Search Property';

        }else{

          echo $site_name.' | Welcome';

        }

      }else if($this->uri->segment(1) =='Rent'){

          if($this->uri->segment(2) == 'index' || $this->uri->segment(2) == ''){

            echo $site_name.' | Rent Property';
          }else{
            echo $site_name.' | Rent';
          }

      }
      else if($this->uri->segment(1) == 'Buy'){
          
          if($this->uri->segment(2) == 'index' || $this->uri->segment(2) ==''){
            
            echo $site_name.' | Buy Property';
          }else{
            echo $site_name.' | Buy';
          }
          
      }
      else if($this->uri->segment(1) == 'Agents'){
          
          if($this->uri->segment(2) == 'index' || $this->uri->segment(2) ==''){
            
            echo $site_name.' | View All Agent';
          }else{
            echo $site_name.' | Agents';
          }
          
      }
      else if($this->uri->segment(1) == 'News'){
          
          if($this->uri->segment(2) == 'index' || $this->uri->segment(2) ==''){
            
            echo $site_name.' | View News';
          }
          else if($this->uri->segment(2) == 'view_detial'){
            echo $site_name.' | News Detail';
          }
          else{
            echo $site_name.' | News';
          }
          
      }
      else if($this->uri->segment(1) == 'view_property'){
          
      
            echo $site_name.' | View Property';
          
          
      }
    ?>
    </title>

    
    <link rel="icon" href="<?php echo base_url();?>project_dir/<?php echo $get_site_logo;?>" type="image/png">

    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/main.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/utility.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/responsive.css">

    <!-- THEME COLOR -->
    <link href="<?php echo base_url();?>assets/css/colors/blue.css" type="text/css" media="all" rel="stylesheet" id="colors" />

    <!-- MAIN MENU -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/vendors/menu/css/bootstrap-extended.css">

    <!-- OWL CAROUSEL SLIDER -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/vendors/owl.carousel/css/owl.carousel.min.css">

    <!-- SLICK SLIDER -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/vendors/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/vendors/slick/slick-theme.css">

    <!-- FANCY BOX -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/vendors/fancybox/jquery.fancybox.min.css">

    <!-- FILE-UPLOADER -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendors/fileuploader/css/jquery.fileuploader.css" media="all">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendors/fileuploader/css/jquery.fileuploader-theme-thumbnails.css" media="all">


</head>