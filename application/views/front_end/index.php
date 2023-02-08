﻿<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>iProperty | Real Estate Bootstarp Template</title>

    <link rel="icon" href="<?php echo base_url();?>assets/images/favicon.png" type="image/png">

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

    <!-- Begin: HTML5SHIV FOR IE8 -->
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="assets/vendors/js/html5shiv.js"></script>
      <script src="assets/vendors/js/respond.js"></script>
    <![endif]-->
    <!-- end: HTML5SHIV FOR IE8 -->
</head>

<body data-menu="header-main-menu" class="bg-white body-main-menu header-main-menu">

    <!--
    #################################
        - Begin: HEADER -
    #################################
    -->
    <header class="main-header bg-light-2 box-shadow-1">

        <!-- TOGGLE -->
        <a href="#" class="nav-link nav-menu-main menu-toggle btn btn-base rounded-0">
            <i class="fa fa-bars"></i>
        </a>
        <!-- /TOGGLE -->

        <!-- TOPBAR -->
        <div class="inner-header d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-2">
                        <!-- LOGO -->
                        <a class="navbar-brand logo" href="index.html">
                            <img class="full-width max-width-130-sm" alt="iProperty" src="assets/images/logo.png">
                        </a>
                        <!-- /LOGO -->
                    </div>
                    <div class="col-lg-10 col-md-9 col-sm-8 text-right">
                        <div class="extra-info">
                            <ul>
                                <li class="m-top-5 hidden-xs hidden-sm hidden-md">
                                    <i class="fa fa-phone text-base text-size-30"></i>
                                    <div class="text">
                                        <div class="text-top text-weight-400 text-muted text-size-13">
                                            CALL US
                                        </div>
                                        <div class="text-bottom text-bold-700 text-black">
                                            (123) 456 7890
                                        </div>
                                    </div>
                                </li>
                                <li class="m-top-5 hidden-xs hidden-sm hidden-md">
                                    <i class="fa fa-envelope-o text-base text-size-30"></i>
                                    <div class="text">
                                        <div class="text-top text-bold-400 text-muted text-size-13">
                                            EMAIL US
                                        </div>
                                        <div class="text-bottom text-bold-700 text-black">
                                            info@iproperty.com
                                        </div>
                                    </div>
                                </li>
                                <li class="m-top-5 hidden-xs hidden-sm hidden-md">
                                    <i class="fa fa-clock-o text-base text-size-30"></i>
                                    <div class="text">
                                        <div class="text-top text-bold-400 text-muted text-size-13">
                                            WE'ARE OPEN
                                        </div>
                                        <div class="text-bottom text-bold-700 text-black">
                                            Mon - Sat, 10AM to 6PM
                                        </div>
                                    </div>
                                </li>
                                <li class="hidden-xs hidden-sm">
                                    <a href="submit-property.html" class="btn btn-base rounded-0 text-bold-600 text-spacing-5 text-uppercase text-size-13 p-top-12 p-bottom-12 p-left-15 p-right-15 text-size-11-lg">Submit Property</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /TOPBAR -->

        <!-- NAVIGATION -->
        <div role="navigation" data-menu="menu-wrapper" class="header-navbar navbar bg-base-dark navbar-fixed box-shadow-3">
            
            <!-- MENU CONTENT -->
            <div data-menu="menu-container" class="container navbar-container main-menu-content">

                <ul id="main-menu-navigation" data-menu="menu-navigation" class="nav navbar-nav">
                    <li data-menu="dropdown" class="dropdown nav-item active">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link"><i class="fa fa-home"></i> <span>Home</span></a>
                        <ul class="dropdown-menu">
                            <li class="active">
                                <a href="index.html" data-toggle="dropdown" class="dropdown-item">Home 1</a>
                            </li>
                            <li>
                                <a href="index-2.html" data-toggle="dropdown" class="dropdown-item">Home 2</a>
                            </li>
                            <li>
                                <a href="index-3.html" data-toggle="dropdown" class="dropdown-item">Home 3</a>
                            </li>
                        </ul>
                    </li>
                    <li data-menu="dropdown" class="dropdown nav-item">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link"><i class="fa fa-building-o"></i><span>Properties</span></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="property-designs.html" class="dropdown-item">Property - Designs</a>
                            </li>
                            <li>
                                <a href="property-grid.html" class="dropdown-item">Property - Grid</a>
                            </li>
                            <li>
                                <a href="property-fullwidth.html" class="dropdown-item">Property - Fullwidth</a>
                            </li>
                            <li>
                                <a href="property-sidebar.html" class="dropdown-item">Property - Sidebar</a>
                            </li>
                            <li>
                                <a href="single-property.html" class="dropdown-item">Single Property</a>
                            </li>
                        </ul>
                    </li>
                    <li data-menu="dropdown" class="dropdown nav-item">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link"><i class="fa fa-users"></i> <span>Agents</span></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="agents-grid.html" data-toggle="dropdown" class="dropdown-item">Agents - Grid</a>
                            </li>
                            <li>
                                <a href="agents-fullwidth.html" data-toggle="dropdown" class="dropdown-item">Agents - Fullwidth</a>
                            </li>
                            <li>
                                <a href="single-agent.html" data-toggle="dropdown" class="dropdown-item">Single Agent</a>
                            </li>
                        </ul>
                    </li>
                    <li data-menu="dropdown" class="dropdown nav-item">
                        <a href="agencies.html" data-toggle="dropdown" class="dropdown-toggle nav-link"><i class="fa fa-id-badge"></i> <span>Agencies</span></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="agencies.html" data-toggle="dropdown" class="dropdown-item">Agencies - 1</a>
                            </li>
                            <li>
                                <a href="agencies-2.html" data-toggle="dropdown" class="dropdown-item">Agencies - 2</a>
                            </li>
                            <li>
                                <a href="single-agency.html" data-toggle="dropdown" class="dropdown-item">Single Agency</a>
                            </li>
                        </ul>
                    </li>
                    <li data-menu="dropdown" class="dropdown nav-item">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link"><i class="fa fa-commenting-o"></i> <span>Blog</span></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="blog-grid.html" data-toggle="dropdown" class="dropdown-item">Blog - Grid</a>
                            </li>
                            <li>
                                <a href="blog-fullwidth.html" data-toggle="dropdown" class="dropdown-item">Blog - Fullwidth</a>
                            </li>
                            <li>
                                <a href="single-blog.html" data-toggle="dropdown" class="dropdown-item">Single Blog</a>
                            </li>
                        </ul>
                    </li>
                    <li data-menu="dropdown" class="dropdown nav-item">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link"><i class="fa fa-star-o"></i><span>Pages</span></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="about-us.html" class="dropdown-item">About Us</a>
                            </li>
                            <li>
                                <a href="contact-us.html" class="dropdown-item">Contact Us</a>
                            </li>
                            <li>
                                <a href="404.html" class="dropdown-item">404</a>
                            </li>
                            <li data-menu="dropdown-submenu" class="dropdown dropdown-submenu">
                                <a href="#" data-toggle="dropdown" class="dropdown-item dropdown-toggle">My Account</a>
                                <ul class="dropdown-menu">
                                    <li data-menu="">
                                        <a href="my-profile.html" data-toggle="dropdown" class="dropdown-item">My Profile</a>
                                    </li>
                                    <li data-menu="">
                                        <a href="submit-property.html" data-toggle="dropdown" class="dropdown-item">Submit Property</a>
                                    </li>
                                    <li data-menu="">
                                        <a href="my-properties.html" data-toggle="dropdown" class="dropdown-item">My Properties</a>
                                    </li>
                                    <li data-menu="">
                                        <a href="my-bookmarked.html" data-toggle="dropdown" class="dropdown-item">My Bookmarked</a>
                                    </li>
                                    <li data-menu="">
                                        <a href="change-password.html" data-toggle="dropdown" class="dropdown-item">Change Password</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="login.html" class="dropdown-item">Login</a>
                            </li>
                            <li>
                                <a href="register.html" class="dropdown-item">Register</a>
                            </li>
                            <li>
                                <a href="lost-password.html" class="dropdown-item">Lost Password</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="shortcodes.html" class="nav-link"><i class="fa fa-cogs"></i> <span>Shortcodes</span></a>
                    </li>
                </ul>

            </div>
            <!-- /MENU CONTENT -->

        </div>
        <!-- /NAVIGATION -->

    </header>
    <!-- End: HEADER -
    ################################################################## -->

    <!--
    #################################
        - Begin: SLIDER -
    #################################
    -->
    <div class="owl-carousel owl-theme owl-nav-wide" data-plugin-options="{'items': 1, 'margin': 10, 'nav': true, 'dots': false, 'animateOut': 'fadeOut', 'autoplay': true, 'autoplayTimeout': 6000}">
        <div class="bg-property-slider-1 bg-no-repeat bg-size-cover">
            <div class="property">
                <div class="property-media overlay-wrapper p-top-100 p-bottom-50">
                    <div class="container p-top-100">
                        <div class="badge badge-base text-white m-right-8 p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0 text-size-14 m-bottom-20">Featured</div>
                        <div class="badge badge-success p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0 text-size-14 m-bottom-20">For Rent</div>
                        <div class="clearfix"></div>
                        <h2 class="text-white text-bold-600 text-size-50 text-size-40-sm m-bottom-10">$250,000 <small class="text-size-18">Per Month</small></h2>
                        <h5><a class="text-white text-bold-500 text-size-30 text-size-25-sm text-white text-white-hover m-bottom-10" href="#">Beautiful Small Apartment</a></h5>
                        <p class="text-white">253 Lake Washington, USA</p>
                    </div>
                    <div class="overlay bg-bg opacity-9"></div>
                </div>
            </div>
        </div>
        <div class="bg-property-slider-2 bg-no-repeat bg-size-cover">
            <div class="property">
                <div class="property-media overlay-wrapper p-top-100 p-bottom-50">
                    <div class="container p-top-100">
                        <div class="badge badge-success p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0 text-size-14 m-bottom-20">For Sale</div>
                        <div class="clearfix"></div>
                        <h2 class="text-white text-bold-600 text-size-50 text-size-40-sm m-bottom-10">$120,000</h2>
                        <h5><a class="text-white text-bold-500 text-size-30 text-size-25-sm text-white text-white-hover m-bottom-10" href="#">Beautiful Garaes Condo</a></h5>
                        <p class="text-white">154 Drive, New York</p>
                    </div>
                    <div class="overlay bg-bg opacity-9"></div>
                </div>
            </div>
        </div>
        <div class="bg-property-slider-3 bg-no-repeat bg-size-cover">
            <div class="property">
                <div class="property-media overlay-wrapper p-top-100 p-bottom-50">
                    <div class="container p-top-100">
                        <div class="badge badge-base text-white m-right-8 p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0 text-size-14 m-bottom-20">Featured</div>
                        <div class="badge badge-success p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0 text-size-14 m-bottom-20">For Rent</div>
                        <div class="clearfix"></div>
                        <h2 class="text-white text-bold-600 text-size-50 text-size-40-sm m-bottom-10">$145,000 <small class="text-size-18">Per Month</small></h2>
                        <h5><a class="text-white text-bold-500 text-size-30 text-size-25-sm text-white text-white-hover m-bottom-10" href="#">Global Land House</a></h5>
                        <p class="text-white">110 Lake, United Kingdom</p>
                    </div>
                    <div class="overlay bg-bg opacity-9"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- End: SLIDER -
    ################################################################## -->

    <div class="bg-white p-top-60 p-bottom-30">
        <div class="container">
            
            <div class="row">
                
                <div class="col-lg-6 col-md-12">
                    <div class="bg-light-3 p-30 box-shadow-1 box-shadow-2-hover border-1 border-solid border-light m-bottom-30">
                        <h2 class="text-bold-700 m-top-10 m-bottom-30">Popular Countries</h2>

                        <div class="row">
                            <div class="col-lg-6 col-md-6">

                                <ul class="icon-list m-bottom-20">
                                    <li>
                                        <i class="btn btn-base fa fa-angle-double-right"></i>
                                        <a class="text-dark text-base-hover" href="#">France</a>
                                        <span class="float-right">(10)</span>
                                    </li>
                                    <li>
                                        <i class="btn btn-base fa fa-angle-double-right"></i>
                                        <a class="text-dark text-base-hover" href="#">United States</a>
                                        <span class="float-right">(20)</span>
                                    </li>
                                    <li>
                                        <i class="btn btn-base fa fa-angle-double-right"></i>
                                        <a class="text-dark text-base-hover" href="#">China</a>
                                        <span class="float-right">(12)</span>
                                    </li>
                                    <li>
                                        <i class="btn btn-base fa fa-angle-double-right"></i>
                                        <a class="text-dark text-base-hover" href="#">Spain</a>
                                        <span class="float-right">(15)</span>
                                    </li>
                                    <li>
                                        <i class="btn btn-base fa fa-angle-double-right"></i>
                                        <a class="text-dark text-base-hover" href="#">Poland</a>
                                        <span class="float-right">(25)</span>
                                    </li>
                                </ul>

                            </div>
                            <div class="col-lg-6 col-md-6">

                                <ul class="icon-list m-bottom20">
                                    <li>
                                        <i class="btn btn-base fa fa-angle-double-right"></i>
                                        <a class="text-dark text-base-hover" href="#">Italy</a>
                                        <span class="float-right">(10)</span>
                                    </li>
                                    <li>
                                        <i class="btn btn-base fa fa-angle-double-right"></i>
                                        <a class="text-dark text-base-hover" href="#">Turkey</a>
                                        <span class="float-right">(20)</span>
                                    </li>
                                    <li>
                                        <i class="btn btn-base fa fa-angle-double-right"></i>
                                        <a class="text-dark text-base-hover" href="#">United Kingdom</a>
                                        <span class="float-right">(12)</span>
                                    </li>
                                    <li>
                                        <i class="btn btn-base fa fa-angle-double-right"></i>
                                        <a class="text-dark text-base-hover" href="#">Germany</a>
                                        <span class="float-right">(15)</span>
                                    </li>
                                    <li>
                                        <i class="btn btn-base fa fa-angle-double-right"></i>
                                        <a class="text-dark text-base-hover" href="#">Singapore</a>
                                        <span class="float-right">(25)</span>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6 col-md-12">
                    <div class="bg-light-3 p-30 box-shadow-1 box-shadow-2-hover border-1 border-solid border-light">
                        <h2 class="text-bold-700 m-top-10 m-bottom-30">Popular Cities</h2>

                        <div class="row">
                            <div class="col-lg-6 col-md-6">

                                <ul class="icon-list m-bottom-20">
                                    <li>
                                        <i class="btn btn-base fa fa-angle-double-right"></i>
                                        <a class="text-dark text-base-hover" href="#">Bangkok</a>
                                        <span class="float-right">(10)</span>
                                    </li>
                                    <li>
                                        <i class="btn btn-base fa fa-angle-double-right"></i>
                                        <a class="text-dark text-base-hover" href="#">London</a>
                                        <span class="float-right">(20)</span>
                                    </li>
                                    <li>
                                        <i class="btn btn-base fa fa-angle-double-right"></i>
                                        <a class="text-dark text-base-hover" href="#">Paris</a>
                                        <span class="float-right">(12)</span>
                                    </li>
                                    <li>
                                        <i class="btn btn-base fa fa-angle-double-right"></i>
                                        <a class="text-dark text-base-hover" href="#">Dubai</a>
                                        <span class="float-right">(15)</span>
                                    </li>
                                    <li>
                                        <i class="btn btn-base fa fa-angle-double-right"></i>
                                        <a class="text-dark text-base-hover" href="#">Rome</a>
                                        <span class="float-right">(25)</span>
                                    </li>
                                </ul>

                            </div>
                            <div class="col-lg-6 col-md-6">

                                <ul class="icon-list m-bottom20">
                                    <li>
                                        <i class="btn btn-base fa fa-angle-double-right"></i>
                                        <a class="text-dark text-base-hover" href="#">New York</a>
                                        <span class="float-right">(10)</span>
                                    </li>
                                    <li>
                                        <i class="btn btn-base fa fa-angle-double-right"></i>
                                        <a class="text-dark text-base-hover" href="#">Singapore</a>
                                        <span class="float-right">(20)</span>
                                    </li>
                                    <li>
                                        <i class="btn btn-base fa fa-angle-double-right"></i>
                                        <a class="text-dark text-base-hover" href="#">Istanbul</a>
                                        <span class="float-right">(12)</span>
                                    </li>
                                    <li>
                                        <i class="btn btn-base fa fa-angle-double-right"></i>
                                        <a class="text-dark text-base-hover" href="#">Tokyo</a>
                                        <span class="float-right">(15)</span>
                                    </li>
                                    <li>
                                        <i class="btn btn-base fa fa-angle-double-right"></i>
                                        <a class="text-dark text-base-hover" href="#">Hong Kong</a>
                                        <span class="float-right">(25)</span>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <!--
    #################################
        - Begin: PROPERTY -
    #################################
    -->
    <div class="bg-white p-bottom-60">
        <div class="container">

            <h2 class="text-bold-700 m-top-30 m-bottom-40">Newly Added</h2>

            <div class="row">

                <ul class="clearfix full-width" data-plugin-masonry>

                    <!-- PROPERTY -->
                    <li class="col-lg-4 col-md-6">

                        <div class="property bg-light-2 m-bottom-30 box-shadow-1 box-shadow-2-hover border-1 border-solid border-light">
                            <div class="property-media overlay-wrapper">
                                <img class="full-width" src="assets/images/property/property-1.jpg" alt="Property 1">
                                <div class="media-data">
                                    <div class="position-top">
                                        <div class="text-white text-size-24 pull-right"><a class="text-white text-base-hover" href="#"><i class="fa fa-heart-o"></i></a></div>
                                    </div>
                                    <div class="position-bottom">
                                        <div class="badge badge-base text-white pull-left m-right-8 p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0">Featured</div>
                                        <div class="badge badge-success pull-left p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0">For Rent</div>
                                        <div class="text-white text-size-18 pull-right"><i class="fa fa-camera"></i> 12</div>
                                    </div>
                                </div>
                                <div class="overlay bg-bg opacity-9"></div>
                            </div>
                            <div class="property-section p-left-15 p-right-15">
                                <div class="m-top-20 m-bottom-20">
                                    <h2 class="text-base text-bold-700 m-top-15">$250,000 <small class="text-size-14 text-muted">Per Month</small></h2>
                                    <h5><a class="text-bold-600 text-dark text-base-hover" href="#">Beautiful Small Apartment</a></h5>
                                    <p>253 Lake Washington, USA</p>
                                    <ul class="icon-list list-inline m-bottom-0">
                                        <li class="list-inline-item"><i class="btn btn-base rounded-0 fa fa-bed"></i> 5 Beds</li>
                                        <li class="list-inline-item"><i class="btn btn-base rounded-0 fa fa-tint"></i> 3 Baths</li>
                                        <li class="list-inline-item"><i class="btn btn-base rounded-0 fa fa-expand"></i> 36,000 Sq Ft</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    
                    </li>
                    <!-- /PROPERTY -->
                    
                    <!-- PROPERTY -->
                    <li class="col-lg-4 col-md-6">

                        <div class="property bg-light-2 m-bottom-30 box-shadow-1 box-shadow-2-hover border-1 border-solid border-light">
                            <div class="property-media overlay-wrapper">
                                <img class="full-width" src="assets/images/property/property-2.jpg" alt="Property 2">
                                <div class="media-data">
                                    <div class="position-top">
                                        <div class="text-white text-size-24 pull-right"><a class="text-white text-base-hover" href="#"><i class="fa fa-heart"></i></a></div>
                                    </div>
                                    <div class="position-bottom">
                                        <div class="badge badge-success pull-left p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0">For Sale</div>
                                        <div class="text-white text-size-18 pull-right"><i class="fa fa-camera"></i> 6</div>
                                    </div>
                                </div>
                                <div class="overlay bg-bg opacity-9"></div>
                            </div>
                            <div class="property-section p-left-15 p-right-15">
                                <div class="m-top-20 m-bottom-20">
                                    <h2 class="text-base text-bold-700 m-top-15">$120,000</h2>
                                    <h5><a class="text-bold-600 text-dark text-base-hover" href="#">Beautiful Garaes Condo</a></h5>
                                    <p>154 Drive, New York</p>
                                    <ul class="icon-list list-inline m-bottom-0">
                                        <li class="list-inline-item"><i class="btn btn-base rounded-0 fa fa-bed"></i> 4 Beds</li>
                                        <li class="list-inline-item"><i class="btn btn-base rounded-0 fa fa-tint"></i> 2 Baths</li>
                                        <li class="list-inline-item"><i class="btn btn-base rounded-0 fa fa-expand"></i> 45,000 Sq Ft</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    
                    </li>
                    <!-- /PROPERTY -->
                    
                    <!-- PROPERTY -->
                    <li class="col-lg-4 col-md-6">

                        <div class="property bg-light-2 m-bottom-30 box-shadow-1 box-shadow-2-hover border-1 border-solid border-light">
                            <div class="property-media overlay-wrapper">
                                <img class="full-width" src="assets/images/property/property-3.jpg" alt="Property 3">
                                <div class="media-data">
                                    <div class="position-top">
                                        <div class="text-white text-size-24 pull-right"><a class="text-white text-base-hover" href="#"><i class="fa fa-heart-o"></i></a></div>
                                    </div>
                                    <div class="position-bottom">
                                        <div class="badge badge-base text-white pull-left m-right-8 p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0">Featured</div>
                                        <div class="badge badge-success pull-left p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0">For Rent</div>
                                        <div class="text-white text-size-18 pull-right"><i class="fa fa-camera"></i> 14</div>
                                    </div>
                                </div>
                                <div class="overlay bg-bg opacity-9"></div>
                            </div>
                            <div class="property-section p-left-15 p-right-15">
                                <div class="m-top-20 m-bottom-20">
                                    <h2 class="text-base text-bold-700 m-top-15">$145,000 <small class="text-size-14 text-muted">Per Month</small></h2>
                                    <h5><a class="text-bold-600 text-dark text-base-hover" href="#">Global Land House</a></h5>
                                    <p>110 Lake, United Kingdom</p>
                                    <ul class="icon-list list-inline m-bottom-0">
                                        <li class="list-inline-item"><i class="btn btn-base rounded-0 fa fa-bed"></i> 6 Beds</li>
                                        <li class="list-inline-item"><i class="btn btn-base rounded-0 fa fa-tint"></i> 3 Baths</li>
                                        <li class="list-inline-item"><i class="btn btn-base rounded-0 fa fa-expand"></i> 65,000 Sq Ft</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    
                    </li>
                    <!-- /PROPERTY -->
                    
                    <!-- PROPERTY -->
                    <li class="col-lg-4 col-md-6">

                        <div class="property bg-light-2 m-bottom-30 box-shadow-1 box-shadow-2-hover border-1 border-solid border-light">
                            <div class="property-media overlay-wrapper">
                                <img class="full-width" src="assets/images/property/property-4.jpg" alt="Property 4">
                                <div class="media-data">
                                    <div class="position-top">
                                        <div class="text-white text-size-24 pull-right"><a class="text-white text-base-hover" href="#"><i class="fa fa-heart"></i></a></div>
                                    </div>
                                    <div class="position-bottom">
                                        <div class="badge badge-success pull-left p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0">For Rent</div>
                                        <div class="text-white text-size-18 pull-right"><i class="fa fa-camera"></i> 8</div>
                                    </div>
                                </div>
                                <div class="overlay bg-bg opacity-9"></div>
                            </div>
                            <div class="property-section p-left-15 p-right-15">
                                <div class="m-top-20 m-bottom-20">
                                    <h2 class="text-base text-bold-700 m-top-15">$220,000 <small class="text-size-14 text-muted">Per Month</small></h2>
                                    <h5><a class="text-bold-600 text-dark text-base-hover" href="#">Our Quality Rent House</a></h5>
                                    <p>221 Madison Seattle, USA</p>
                                    <ul class="icon-list list-inline m-bottom-0">
                                        <li class="list-inline-item"><i class="btn btn-base rounded-0 fa fa-bed"></i> 7 Beds</li>
                                        <li class="list-inline-item"><i class="btn btn-base rounded-0 fa fa-tint"></i> 4 Baths</li>
                                        <li class="list-inline-item"><i class="btn btn-base rounded-0 fa fa-expand"></i> 23,000 Sq Ft</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    
                    </li>
                    <!-- /PROPERTY -->
                    
                    <!-- PROPERTY -->
                    <li class="col-lg-4 col-md-6">

                        <div class="property bg-light-2 m-bottom-30 box-shadow-1 box-shadow-2-hover border-1 border-solid border-light">
                            <div class="property-media overlay-wrapper">
                                <img class="full-width" src="assets/images/property/property-5.jpg" alt="Property 5">
                                <div class="media-data">
                                    <div class="position-top">
                                        <div class="text-white text-size-24 pull-right"><a class="text-white text-base-hover" href="#"><i class="fa fa-heart-o"></i></a></div>
                                    </div>
                                    <div class="position-bottom">
                                        <div class="badge badge-base text-white pull-left m-right-8 p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0">Featured</div>
                                        <div class="badge badge-success pull-left p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0">For Sale</div>
                                        <div class="text-white text-size-18 pull-right"><i class="fa fa-camera"></i> 16</div>
                                    </div>
                                </div>
                                <div class="overlay bg-bg opacity-9"></div>
                            </div>
                            <div class="property-section p-left-15 p-right-15">
                                <div class="m-top-20 m-bottom-20">
                                    <h2 class="text-base text-bold-700 m-top-15">$750,000</h2>
                                    <h5><a class="text-bold-600 text-dark text-base-hover" href="#">Beautiful House For Sale</a></h5>
                                    <p>200 Lake Drive, USA</p>
                                    <ul class="icon-list list-inline m-bottom-0">
                                        <li class="list-inline-item"><i class="btn btn-base rounded-0 fa fa-bed"></i> 4 Beds</li>
                                        <li class="list-inline-item"><i class="btn btn-base rounded-0 fa fa-tint"></i> 3 Baths</li>
                                        <li class="list-inline-item"><i class="btn btn-base rounded-0 fa fa-expand"></i> 47,000 Sq Ft</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    
                    </li>
                    <!-- /PROPERTY -->
                    
                    <!-- PROPERTY -->
                    <li class="col-lg-4 col-md-6">

                        <div class="property bg-light-2 m-bottom-30 box-shadow-1 box-shadow-2-hover border-1 border-solid border-light">
                            <div class="property-media overlay-wrapper">
                                <img class="full-width" src="assets/images/property/property-6.jpg" alt="Property 6">
                                <div class="media-data">
                                    <div class="position-top">
                                        <div class="text-white text-size-24 pull-right"><a class="text-white text-base-hover" href="#"><i class="fa fa-heart"></i></a></div>
                                    </div>
                                    <div class="position-bottom">
                                        <div class="badge badge-base text-white pull-left m-right-8 p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0">Featured</div>
                                        <div class="badge badge-success pull-left p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0">For Rent</div>
                                        <div class="text-white text-size-18 pull-right"><i class="fa fa-camera"></i> 11</div>
                                    </div>
                                </div>
                                <div class="overlay bg-bg opacity-9"></div>
                            </div>
                            <div class="property-section p-left-15 p-right-15">
                                <div class="m-top-20 m-bottom-20">
                                    <h2 class="text-base text-bold-700 m-top-15">$350,000 <small class="text-size-14 text-muted">Per Month</small></h2>
                                    <h5><a class="text-bold-600 text-dark text-base-hover" href="#">Beautiful Waterfront House</a></h5>
                                    <p>103 Occidental Washington USA</p>
                                    <ul class="icon-list list-inline m-bottom-0">
                                        <li class="list-inline-item"><i class="btn btn-base rounded-0 fa fa-bed"></i> 9 Beds</li>
                                        <li class="list-inline-item"><i class="btn btn-base rounded-0 fa fa-tint"></i> 5 Baths</li>
                                        <li class="list-inline-item"><i class="btn btn-base rounded-0 fa fa-expand"></i> 54,000 Sq Ft</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    
                    </li>
                    <!-- /PROPERTY -->

                </ul>

            </div>

        </div>
    </div>
    <!-- End: PROPERTY -
    ################################################################## -->

    <!--
    #################################
        - Begin: SERVICES -
    #################################
    -->
    <div class="bg-white p-bottom-30">
        <div class="container">
        
            <div class="row">

                <div class="col-lg-4 col-md-4 m-top-40 m-bottom-40">

                    <div class="service bg-light-2 border-1 border-light box-shadow-1 box-shadow-2-hover">
                        <div class="media">
                            <i class="fa fa-building-o bg-base text-white rounded-100 box-shadow-1 p-top-5 p-bottom-5 p-right-5 p-left-5"></i>
                        </div>
                        <div class="agent-section p-top-35 p-bottom-30 p-right-25 p-left-25">
                            <h4 class="m-bottom-15 text-bold-700">Apartments</h4>
                            <p>Nonec pede justo fringilla vel aliquet nec vulputate eget arcu in enim justo rhoncus ut imperdiet venenatis vitae justo.</p>
                            <a class="text-base text-base-dark-hover text-size-13" href="#">Read More <i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>

                </div>

                <div class="col-lg-4 col-md-4 m-top-40 m-bottom-40">

                    <div class="service bg-light-2 border-1 border-light box-shadow-1 box-shadow-2-hover">
                        <div class="media">
                            <i class="fa fa-shield bg-base text-white rounded-100 box-shadow-1 p-top-5 p-bottom-5 p-right-5 p-left-5"></i>
                        </div>
                        <div class="agent-section p-top-35 p-bottom-30 p-right-25 p-left-25">
                            <h4 class="m-bottom-15 text-bold-700">Commercial</h4>
                            <p>Nonec pede justo fringilla vel aliquet nec vulputate eget arcu in enim justo rhoncus ut imperdiet venenatis vitae justo.</p>
                            <a class="text-base text-base-dark-hover text-size-13" href="#">Read More <i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>

                </div>

                <div class="col-lg-4 col-md-4 m-top-40 m-bottom-40">

                    <div class="service bg-light-2 border-1 border-light box-shadow-1 box-shadow-2-hover">
                        <div class="media">
                            <i class="fa fa-bullhorn bg-base text-white rounded-100 box-shadow-1 p-top-5 p-bottom-5 p-right-5 p-left-5"></i>
                        </div>
                        <div class="agent-section p-top-35 p-bottom-30 p-right-25 p-left-25">
                            <h4 class="m-bottom-15 text-bold-700">Houses</h4>
                            <p>Nonec pede justo fringilla vel aliquet nec vulputate eget arcu in enim justo rhoncus ut imperdiet venenatis vitae justo.</p>
                            <a class="text-base text-base-dark-hover text-size-13" href="#">Read More <i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
    <!-- End: SERVICES -
    ################################################################## -->

    <!--
    #################################
        - Begin: AGENTS -
    #################################
    -->
    <div class="container">

        <h2 class="text-bold-700 m-top-30 m-bottom-40">Our Agents</h2>

        <div class="owl-carousel owl-theme m-bottom-60" data-plugin-options="{'items': 4, 'margin': 30, 'loop': false, 'nav': true, 'dots': false}">
            <!-- AGENT -->
            <div>

                <div class="agent bg-light-2 box-shadow-1 box-shadow-2-hover m-bottom-30 border-1 border-solid border-light">

                    <div class="agent-media overlay-wrapper">
                        <a class="d-block" href="#">
                            <img alt="..." class="full-width" src="assets/images/agents/agent-1.jpg">
                        </a>
                        <div class="media-data">
                            <div class="position-top">
                                <div class="badge badge-base text-white pull-left p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0">32 Properties</div>
                            </div>
                            <div class="position-bottom">
                                <a class="btn btn-white text-bold-600 text-spacing-5 text-size-13 pull-left line-height-18 rounded-0" href="#">
                                    <i class="fa fa-building-o m-right-4"></i>
                                    MK Builders
                                </a>
                            </div>
                        </div>
                        <div class="overlay bg-bg opacity-9"></div>
                    </div>

                    <div class="agent-section p-top-25 p-bottom-25 p-right-15 p-left-15">
                        <h4 class="text-bold-700"><a class="text-dark text-base-hover" href="#">David Smith</a></h4>
                        <p>253 Lake Washington, USA</p>
                        <ul class="icon-list m-bottom-25">
                            <li><i class="btn btn-base rounded-0 fa fa-flag"></i> Buying Agent</li>
                            <li><i class="btn btn-base rounded-0 fa fa-envelope"></i> david@iproperty.com</li>
                            <li><i class="btn btn-base rounded-0 fa fa-phone"></i> (123) 456-6789</li>
                        </ul>
                        <ul class="social-icons text-center">
                            <li>
                                <a class="btn btn-base btn-sm rounded-0" href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a class="btn btn-base btn-sm rounded-0" href="#"><i class="fa fa-instagram"></i></a>
                            </li>
                            <li>
                                <a class="btn btn-base btn-sm rounded-0" href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a class="btn btn-base btn-sm rounded-0" href="#"><i class="fa fa-google-plus"></i></a>
                            </li>
                            <li>
                                <a class="btn btn-base btn-sm rounded-0" href="#"><i class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>

                </div>

            </div>
            <!-- /AGENT -->

            <!-- AGENT -->
            <div>

                <div class="agent bg-light-2 box-shadow-1 box-shadow-2-hover m-bottom-30 border-1 border-solid border-light">
                
                    <div class="agent-media overlay-wrapper">
                        <a class="d-block" href="#">
                            <img alt="..." class="full-width" src="assets/images/agents/agent-2.jpg">
                        </a>
                        <div class="media-data">
                            <div class="position-top">
                                <div class="badge badge-base text-white pull-left p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0">25 Properties</div>
                            </div>
                            <div class="position-bottom">
                                <a class="btn btn-white text-bold-600 text-spacing-5 text-size-13 pull-left line-height-18 rounded-0" href="#">
                                    <i class="fa fa-building-o m-right-4"></i>
                                    RealCity
                                </a>
                            </div>
                        </div>
                        <div class="overlay bg-bg opacity-9"></div>
                    </div>

                    <div class="agent-section p-top-25 p-bottom-25 p-right-15 p-left-15">
                        <h4 class="text-bold-700"><a class="text-dark text-base-hover" href="#">Alex Brain</a></h4>
                        <p>154 Drive, New York</p>
                        <ul class="icon-list m-bottom-25">
                            <li><i class="btn btn-base rounded-0 fa fa-flag"></i> Selling Agent</li>
                            <li><i class="btn btn-base rounded-0 fa fa-envelope"></i> alex@iproperty.com</li>
                            <li><i class="btn btn-base rounded-0 fa fa-phone"></i> (123) 456-6789</li>
                        </ul>
                        <ul class="social-icons text-center">
                            <li>
                                <a class="btn btn-base btn-sm rounded-0" href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a class="btn btn-base btn-sm rounded-0" href="#"><i class="fa fa-instagram"></i></a>
                            </li>
                            <li>
                                <a class="btn btn-base btn-sm rounded-0" href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a class="btn btn-base btn-sm rounded-0" href="#"><i class="fa fa-google-plus"></i></a>
                            </li>
                            <li>
                                <a class="btn btn-base btn-sm rounded-0" href="#"><i class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>

                </div>

            </div>
            <!-- /AGENT -->

            <!-- AGENT -->
            <div>

                <div class="agent bg-light-2 box-shadow-1 box-shadow-2-hover m-bottom-30 border-1 border-solid border-light">
                
                    <div class="agent-media overlay-wrapper">
                        <a class="d-block" href="#">
                            <img alt="..." class="full-width" src="assets/images/agents/agent-3.jpg">
                        </a>
                        <div class="media-data">
                            <div class="position-top">
                                <div class="badge badge-base text-white pull-left p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0">10 Properties</div>
                            </div>
                            <div class="position-bottom">
                                <a class="btn btn-white text-bold-600 text-spacing-5 text-size-13 pull-left line-height-18 rounded-0" href="#">
                                    <i class="fa fa-building-o m-right-4"></i>
                                    SK Home
                                </a>
                            </div>
                        </div>
                        <div class="overlay bg-bg opacity-9"></div>
                    </div>

                    <div class="agent-section p-top-25 p-bottom-25 p-right-15 p-left-15">
                        <h4 class="text-bold-700"><a class="text-dark text-base-hover" href="#">Fred Kevin</a></h4>
                        <p>110 Lake, United Kingdom</p>
                        <ul class="icon-list m-bottom-25">
                            <li><i class="btn btn-base rounded-0 fa fa-flag"></i> Buying Agent</li>
                            <li><i class="btn btn-base rounded-0 fa fa-envelope"></i> fred@iproperty.com</li>
                            <li><i class="btn btn-base rounded-0 fa fa-phone"></i> (123) 456-6789</li>
                        </ul>
                        <ul class="social-icons text-center">
                            <li>
                                <a class="btn btn-base btn-sm rounded-0" href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a class="btn btn-base btn-sm rounded-0" href="#"><i class="fa fa-instagram"></i></a>
                            </li>
                            <li>
                                <a class="btn btn-base btn-sm rounded-0" href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a class="btn btn-base btn-sm rounded-0" href="#"><i class="fa fa-google-plus"></i></a>
                            </li>
                            <li>
                                <a class="btn btn-base btn-sm rounded-0" href="#"><i class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>

                </div>

            </div>
            <!-- /AGENT -->

            <!-- AGENT -->
            <div>

                <div class="agent bg-light-2 box-shadow-1 box-shadow-2-hover m-bottom-30 border-1 border-solid border-light">
                
                    <div class="agent-media overlay-wrapper">
                        <a class="d-block" href="#">
                            <img alt="..." class="full-width" src="assets/images/agents/agent-4.jpg">
                        </a>
                        <div class="media-data">
                            <div class="position-top">
                                <div class="badge badge-base text-white pull-left p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0">7 Properties</div>
                            </div>
                            <div class="position-bottom">
                                <a class="btn btn-white text-bold-600 text-spacing-5 text-size-13 pull-left line-height-18 rounded-0" href="#">
                                    <i class="fa fa-building-o m-right-4"></i>
                                    MK Builders
                                </a>
                            </div>
                        </div>
                        <div class="overlay bg-bg opacity-9"></div>
                    </div>

                    <div class="agent-section p-top-25 p-bottom-25 p-right-15 p-left-15">
                        <h4 class="text-bold-700"><a class="text-dark text-base-hover" href="#">Angelina Jolie</a></h4>
                        <p>253 Lake Washington, USA</p>
                        <ul class="icon-list m-bottom-25">
                            <li><i class="btn btn-base rounded-0 fa fa-flag"></i> Buying Agent</li>
                            <li><i class="btn btn-base rounded-0 fa fa-envelope"></i> angelina@iproperty.com</li>
                            <li><i class="btn btn-base rounded-0 fa fa-phone"></i> (123) 456-6789</li>
                        </ul>
                        <ul class="social-icons text-center">
                            <li>
                                <a class="btn btn-base btn-sm rounded-0" href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a class="btn btn-base btn-sm rounded-0" href="#"><i class="fa fa-instagram"></i></a>
                            </li>
                            <li>
                                <a class="btn btn-base btn-sm rounded-0" href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a class="btn btn-base btn-sm rounded-0" href="#"><i class="fa fa-google-plus"></i></a>
                            </li>
                            <li>
                                <a class="btn btn-base btn-sm rounded-0" href="#"><i class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>

                </div>

            </div>
            <!-- /AGENT -->

            <!-- AGENT -->
            <div>

                <div class="agent bg-light-2 box-shadow-1 box-shadow-2-hover m-bottom-30 border-1 border-solid border-light">
                
                    <div class="agent-media overlay-wrapper">
                        <a class="d-block" href="#">
                            <img alt="..." class="full-width" src="assets/images/agents/agent-5.jpg">
                        </a>
                        <div class="media-data">
                            <div class="position-top">
                                <div class="badge badge-base text-white pull-left p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0">30 Properties</div>
                            </div>
                            <div class="position-bottom">
                                <a class="btn btn-white text-bold-600 text-spacing-5 text-size-13 pull-left line-height-18 rounded-0" href="#">
                                    <i class="fa fa-building-o m-right-4"></i>
                                    RealCity
                                </a>
                            </div>
                        </div>
                        <div class="overlay bg-bg opacity-9"></div>
                    </div>

                    <div class="agent-section p-top-25 p-bottom-25 p-right-15 p-left-15">
                        <h4 class="text-bold-700"><a class="text-dark text-base-hover" href="#">Twin Smith</a></h4>
                        <p>221 Madison Seattle, USA</p>
                        <ul class="icon-list m-bottom-25">
                            <li><i class="btn btn-base rounded-0 fa fa-flag"></i> Buying Agent</li>
                            <li><i class="btn btn-base rounded-0 fa fa-envelope"></i> twin@iproperty.com</li>
                            <li><i class="btn btn-base rounded-0 fa fa-phone"></i> (123) 456-6789</li>
                        </ul>
                        <ul class="social-icons text-center">
                            <li>
                                <a class="btn btn-base btn-sm rounded-0" href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a class="btn btn-base btn-sm rounded-0" href="#"><i class="fa fa-instagram"></i></a>
                            </li>
                            <li>
                                <a class="btn btn-base btn-sm rounded-0" href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a class="btn btn-base btn-sm rounded-0" href="#"><i class="fa fa-google-plus"></i></a>
                            </li>
                            <li>
                                <a class="btn btn-base btn-sm rounded-0" href="#"><i class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>

                </div>

            </div>
            <!-- /AGENT -->

            <!-- AGENT -->
            <div>

                <div class="agent bg-light-2 box-shadow-1 box-shadow-2-hover m-bottom-30 border-1 border-solid border-light">

                    <div class="agent-media overlay-wrapper">
                        <a class="d-block" href="#">
                            <img alt="..." class="full-width" src="assets/images/agents/agent-6.jpg">
                        </a>
                        <div class="media-data">
                            <div class="position-top">
                                <div class="badge badge-base text-white pull-left p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0">8 Properties</div>
                            </div>
                            <div class="position-bottom">
                                <a class="btn btn-white text-bold-600 text-spacing-5 text-size-13 pull-left line-height-18 rounded-0" href="#">
                                    <i class="fa fa-building-o m-right-4"></i>
                                    SK Home
                                </a>
                            </div>
                        </div>
                        <div class="overlay bg-bg opacity-9"></div>
                    </div>

                    <div class="agent-section p-top-25 p-bottom-25 p-right-15 p-left-15">
                        <h4 class="text-bold-700"><a class="text-dark text-base-hover" href="#">Mark David</a></h4>
                        <p>200 Lake Drive, USA</p>
                        <ul class="icon-list m-bottom-25">
                            <li><i class="btn btn-base rounded-0 fa fa-flag"></i> Buying Agent</li>
                            <li><i class="btn btn-base rounded-0 fa fa-envelope"></i> mark@iproperty.com</li>
                            <li><i class="btn btn-base rounded-0 fa fa-phone"></i> (123) 456-6789</li>
                        </ul>
                        <ul class="social-icons text-center">
                            <li>
                                <a class="btn btn-base btn-sm rounded-0" href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a class="btn btn-base btn-sm rounded-0" href="#"><i class="fa fa-instagram"></i></a>
                            </li>
                            <li>
                                <a class="btn btn-base btn-sm rounded-0" href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a class="btn btn-base btn-sm rounded-0" href="#"><i class="fa fa-google-plus"></i></a>
                            </li>
                            <li>
                                <a class="btn btn-base btn-sm rounded-0" href="#"><i class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>

                </div>

            </div>
            <!-- /AGENT -->
        </div>

    </div>
    <!-- End: AGENTS -
    ################################################################## -->

    <!--
    #################################
        - Begin: AGENCIES -
    #################################
    -->
    <div class="container">

        <h2 class="text-bold-700 m-bottom-10">Top Agencies</h2>

        <p class="text-size-18 m-bottom-40">Nonec pede justo fringilla vel aliquet nec vulputate eget arcu in enim justo rhoncus ut</p>

        <div class="row">

            <!-- AGENCY -->
            <div class="col-lg-6 col-md-6">

                <div class="agency bg-light-2 box-shadow-1 box-shadow-2-hover border-1 border-solid border-light p-top-30 p-left-30 p-right-30 m-bottom-30">
                    <div class="row">
                        <div class="col-lg-4 col-md-3 col-sm-4 col-xs-12 p-bottom-15">
                            <div class="agency-media position-relative">
                                <a class="d-block" href="#">
                                    <img class="full-width" alt="Client" src="assets/images/clients/logo-1.png">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-9 col-sm-8 col-xs-12 p-bottom-15">
                            <div class="agency-section position-relative">
                                <div class="agency-data m-top-0 m-bottom-20">
                                    <div class="badge badge-base text-white pull-left m-right-20 p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0 m-bottom-20">
                                        Properties
                                        <span class="badge badge-white box-shadow-3 text-dark border-1 border-light">22</span>
                                    </div>
                                    <div class="badge badge-success pull-left m-right-20 p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0 m-bottom-20">
                                        Featured
                                        <span class="badge badge-white box-shadow-3 text-dark border-1 border-light">10</span>
                                    </div>
                                    <div class="badge badge-warning pull-left m-right-20 p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0 m-bottom-20">
                                        Agents
                                        <span class="badge badge-white box-shadow-3 text-dark border-1 border-light">8</span>
                                    </div>
                                    <div class="clearfix"></div>
                                    <h4 class="text-bold-700"><a class="text-dark text-base-hover" href="#">MK Builders</a></h4>
                                    <p>253 Lake Washington, USA</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /AGENCY -->

            <!-- AGENCY -->
            <div class="col-lg-6 col-md-6">

                <div class="agency bg-light-2 box-shadow-1 box-shadow-2-hover border-1 border-solid border-light p-top-30 p-left-30 p-right-30 m-bottom-30">
                    <div class="row">
                        <div class="col-lg-4 col-md-3 col-sm-4 col-xs-12 p-bottom-15">
                            <div class="agency-media position-relative">
                                <a class="d-block" href="#">
                                    <img class="full-width" alt="Client" src="assets/images/clients/logo-2.png">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-9 col-sm-8 col-xs-12 p-bottom-15">
                            <div class="agency-section position-relative">
                                <div class="agency-data m-top-0 m-bottom-20">
                                    <div class="badge badge-base text-white pull-left m-right-20 p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0 m-bottom-20">
                                        Properties
                                        <span class="badge badge-white box-shadow-3 text-dark border-1 border-light">22</span>
                                    </div>
                                    <div class="badge badge-success pull-left m-right-20 p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0 m-bottom-20">
                                        Featured
                                        <span class="badge badge-white box-shadow-3 text-dark border-1 border-light">10</span>
                                    </div>
                                    <div class="badge badge-warning pull-left m-right-20 p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0 m-bottom-20">
                                        Agents
                                        <span class="badge badge-white box-shadow-3 text-dark border-1 border-light">8</span>
                                    </div>
                                    <div class="clearfix"></div>
                                    <h4 class="text-bold-700"><a class="text-dark text-base-hover" href="#">Real Estate</a></h4>
                                    <p>154 Drive, New York</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /AGENCY -->

            <!-- AGENCY -->
            <div class="col-lg-6 col-md-6">

                <div class="agency bg-light-2 box-shadow-1 box-shadow-2-hover border-1 border-solid border-light p-top-30 p-left-30 p-right-30 m-bottom-30">
                    <div class="row">
                        <div class="col-lg-4 col-md-3 col-sm-4 col-xs-12 p-bottom-15">
                            <div class="agency-media position-relative">
                                <a class="d-block" href="#">
                                    <img class="full-width" alt="Client" src="assets/images/clients/logo-3.png">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-9 col-sm-8 col-xs-12 p-bottom-15">
                            <div class="agency-section position-relative">
                                <div class="agency-data m-top-0 m-bottom-20">
                                    <div class="badge badge-base text-white pull-left m-right-20 p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0 m-bottom-20">
                                        Properties
                                        <span class="badge badge-white box-shadow-3 text-dark border-1 border-light">22</span>
                                    </div>
                                    <div class="badge badge-success pull-left m-right-20 p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0 m-bottom-20">
                                        Featured
                                        <span class="badge badge-white box-shadow-3 text-dark border-1 border-light">10</span>
                                    </div>
                                    <div class="badge badge-warning pull-left m-right-20 p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0 m-bottom-20">
                                        Agents
                                        <span class="badge badge-white box-shadow-3 text-dark border-1 border-light">8</span>
                                    </div>
                                    <div class="clearfix"></div>
                                    <h4 class="text-bold-700"><a class="text-dark text-base-hover" href="#">The Big City</a></h4>
                                    <p>110 Lake, United Kingdom</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /AGENCY -->

            <!-- AGENCY -->
            <div class="col-lg-6 col-md-6">

                <div class="agency bg-light-2 box-shadow-1 box-shadow-2-hover border-1 border-solid border-light p-top-30 p-left-30 p-right-30 m-bottom-30">
                    <div class="row">
                        <div class="col-lg-4 col-md-3 col-sm-4 col-xs-12 p-bottom-15">
                            <div class="agency-media position-relative">
                                <a class="d-block" href="#">
                                    <img class="full-width" alt="Client" src="assets/images/clients/logo-4.png">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-9 col-sm-8 col-xs-12 p-bottom-15">
                            <div class="agency-section position-relative">
                                <div class="agency-data m-top-0 m-bottom-20">
                                    <div class="badge badge-base text-white pull-left m-right-20 p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0 m-bottom-20">
                                        Properties
                                        <span class="badge badge-white box-shadow-3 text-dark border-1 border-light">22</span>
                                    </div>
                                    <div class="badge badge-success pull-left m-right-20 p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0 m-bottom-20">
                                        Featured
                                        <span class="badge badge-white box-shadow-3 text-dark border-1 border-light">10</span>
                                    </div>
                                    <div class="badge badge-warning pull-left m-right-20 p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0 m-bottom-20">
                                        Agents
                                        <span class="badge badge-white box-shadow-3 text-dark border-1 border-light">8</span>
                                    </div>
                                    <div class="clearfix"></div>
                                    <h4 class="text-bold-700"><a class="text-dark text-base-hover" href="#">SK Home</a></h4>
                                    <p>103 Occidental Washington USA</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /AGENCY -->

        </div>

    </div>
    <!-- End: AGENCIES -
    ################################################################## -->

    <!--
    #################################
        - Begin: NEWS -
    #################################
    -->
    <div class="bg-white p-top-60 p-bottom-30">
        <div class="container">

            <h2 class="text-bold-700 m-bottom-10">Most Recent News</h2>

            <p class="text-size-18 m-bottom-40">Nonec pede justo fringilla vel aliquet nec vulputate eget arcu in enim justo rhoncus ut</p>

            <div class="row">

                <!-- BLOG -->
                <div class="col-lg-4 col-md-6">
                    
                    <div class="blog bg-light-2 box-shadow-1 box-shadow-2-hover border-1 border-solid border-light m-bottom-30">
                        
                        <div class="blog-media overlay-wrapper">

                            <a href="#">
                                <img class="full-width" src="assets/images/blog/blog-1.jpg" alt="...">
                            </a>

                            <div class="media-data">
                                <div class="position-top">
                                    <div class="badge badge-base text-white pull-left m-right-8 p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0">
                                        <i class="m-right-4 fa fa-calendar"></i>
                                        13, Jan 2017
                                    </div>
                                </div>
                                <div class="position-bottom">
                                    <ul class="icon-list list-inline m-bottom-0">
                                        <li class="list-inline-item">
                                            <i class="btn btn-base fa fa-user"></i>
                                            <a class="text-white text-white-hover" href="#">Admin</a>
                                        </li>
                                        <li class="list-inline-item">
                                            <i class="btn btn-base fa fa-tags"></i>
                                            <a class="text-white text-white-hover" href="#">News</a>,
                                            <a class="text-white text-white-hover" href="#">Property</a>
                                        </li>
                                        <li class="list-inline-item">
                                            <i class="btn btn-base fa fa-comments"></i>
                                            <a class="text-white text-white-hover" href="#">24</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            
                            <div class="overlay bg-bg opacity-7"></div>

                        </div>

                        <div class="p-top-25 p-bottom-30 p-left-15 p-right-15">

                            <h4 class="m-bottom-20">
                                <a class="text-bold-600 line-height-32 text-dark text-base-hover" href="#">Integer dignissim enim nec molestie pharetra</a>
                            </h4>

                            <a class="btn btn-base rounded-0 text-bold-600 text-spacing-5 text-uppercase text-size-13 p-left-15 p-right-15" href="#">
                                Read More
                                <i class="m-left-4 fa fa-long-arrow-right"></i>
                            </a>

                        </div>

                    </div>

                </div>
                <!-- /BLOG -->

                <!-- BLOG -->
                <div class="col-lg-4 col-md-6">
                    
                    <div class="blog bg-light-2 box-shadow-1 box-shadow-2-hover border-1 border-solid border-light m-bottom-30">
                        
                        <div class="blog-media overlay-wrapper">

                            <a href="#">
                                <img class="full-width" src="assets/images/blog/blog-2.jpg" alt="...">
                            </a>

                            <div class="media-data">
                                <div class="position-top">
                                    <div class="badge badge-base text-white pull-left m-right-8 p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0">
                                        <i class="m-right-4 fa fa-calendar"></i>
                                        13, Jan 2017
                                    </div>
                                </div>
                                <div class="position-bottom">
                                    <ul class="icon-list list-inline m-bottom-0">
                                        <li class="list-inline-item">
                                            <i class="btn btn-base fa fa-user"></i>
                                            <a class="text-white text-white-hover" href="#">Admin</a>
                                        </li>
                                        <li class="list-inline-item">
                                            <i class="btn btn-base fa fa-tags"></i>
                                            <a class="text-white text-white-hover" href="#">News</a>,
                                            <a class="text-white text-white-hover" href="#">Property</a>
                                        </li>
                                        <li class="list-inline-item">
                                            <i class="btn btn-base fa fa-comments"></i>
                                            <a class="text-white text-white-hover" href="#">24</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            
                            <div class="overlay bg-bg opacity-7"></div>

                        </div>

                        <div class="p-top-25 p-bottom-30 p-left-15 p-right-15">

                            <h4 class="m-bottom-20">
                                <a class="text-bold-600 line-height-32 text-dark text-base-hover" href="#">Integer dignissim enim nec molestie pharetra</a>
                            </h4>

                            <a class="btn btn-base rounded-0 text-bold-600 text-spacing-5 text-uppercase text-size-13 p-left-15 p-right-15" href="#">
                                Read More
                                <i class="m-left-4 fa fa-long-arrow-right"></i>
                            </a>

                        </div>

                    </div>

                </div>
                <!-- /BLOG -->

                <!-- BLOG -->
                <div class="col-lg-4 col-md-6">
                    
                    <div class="blog bg-light-2 box-shadow-1 box-shadow-2-hover border-1 border-solid border-light m-bottom-30">
                        
                        <div class="blog-media overlay-wrapper">

                            <a href="#">
                                <img class="full-width" src="assets/images/blog/blog-3.jpg" alt="...">
                            </a>

                            <div class="media-data">
                                <div class="position-top">
                                    <div class="badge badge-base text-white pull-left m-right-8 p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0">
                                        <i class="m-right-4 fa fa-calendar"></i>
                                        13, Jan 2017
                                    </div>
                                </div>
                                <div class="position-bottom">
                                    <ul class="icon-list list-inline m-bottom-0">
                                        <li class="list-inline-item">
                                            <i class="btn btn-base fa fa-user"></i>
                                            <a class="text-white text-white-hover" href="#">Admin</a>
                                        </li>
                                        <li class="list-inline-item">
                                            <i class="btn btn-base fa fa-tags"></i>
                                            <a class="text-white text-white-hover" href="#">News</a>,
                                            <a class="text-white text-white-hover" href="#">Property</a>
                                        </li>
                                        <li class="list-inline-item">
                                            <i class="btn btn-base fa fa-comments"></i>
                                            <a class="text-white text-white-hover" href="#">24</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            
                            <div class="overlay bg-bg opacity-7"></div>

                        </div>

                        <div class="p-top-25 p-bottom-30 p-left-15 p-right-15">

                            <h4 class="m-bottom-20">
                                <a class="text-bold-600 line-height-32 text-dark text-base-hover" href="#">Integer dignissim enim nec molestie pharetra</a>
                            </h4>

                            <a class="btn btn-base rounded-0 text-bold-600 text-spacing-5 text-uppercase text-size-13 p-left-15 p-right-15" href="#">
                                Read More
                                <i class="m-left-4 fa fa-long-arrow-right"></i>
                            </a>

                        </div>

                    </div>

                </div>
                <!-- /BLOG -->

            </div>

        </div>
    </div>
    <!-- End: NEWS -
    ################################################################## -->

    <!--
    #################################
        - Begin: CLIENTS -
    #################################
    -->
    <div class="bg-white p-top-60 p-bottom-60">
        <div class="container">

            <h2 class="text-bold-700 m-bottom-10 text-center">Clients We’ve Worked With</h2>

            <p class="text-size-18 text-center m-bottom-40">Nonec pede justo fringilla vel aliquet nec vulputate eget arcu in enim justo rhoncus ut</p>

            <div class="owl-carousel owl-theme owl-nav-left" data-plugin-options="{'responsive': {'0': {'items': 2}, '479': {'items': 3}, '768': {'items': 4}, '979': {'items': 5}, '1199': {'items': 6}}, 'margin': 30, 'loop': false, 'nav': false, 'dots': true}">
                <div>
                    <a href="#">
                        <img alt="client" src="assets/images/clients/logo-1.png">
                    </a>
                </div>
                <div>
                    <a href="#">
                        <img alt="client" src="assets/images/clients/logo-2.png">
                    </a>
                </div>
                <div>
                    <a href="#">
                        <img alt="client" src="assets/images/clients/logo-3.png">
                    </a>
                </div>
                <div>
                    <a href="#">
                        <img alt="client" src="assets/images/clients/logo-4.png">
                    </a>
                </div>
                <div>
                    <a href="#">
                        <img alt="client" src="assets/images/clients/logo-5.png">
                    </a>
                </div>
                <div>
                    <a href="#">
                        <img alt="client" src="assets/images/clients/logo-6.png">
                    </a>
                </div>
                <div>
                    <a href="#">
                        <img alt="client" src="assets/images/clients/logo-7.png">
                    </a>
                </div>
                <div>
                    <a href="#">
                        <img alt="client" src="assets/images/clients/logo-8.png">
                    </a>
                </div>
                <div>
                    <a href="#">
                        <img alt="client" src="assets/images/clients/logo-9.png">
                    </a>
                </div>
                <div>
                    <a href="#">
                        <img alt="client" src="assets/images/clients/logo-10.png">
                    </a>
                </div>
            </div>

        </div>
    </div>
    <!-- End: CLIENTS -
    ################################################################## -->

    <!--
    #################################
        - Begin: FOOTER -
    #################################
    -->
    <footer class="footer">
        <div class="bg-dark p-top-60 p-bottom-30">
            <div class="container">
                
                <div class="row">
                    
                    <div class="col-md-12">
                        <div class="border-1 border-solid border-dark border-top-0 border-left-0 border-right-0 p-bottom-40 m-bottom-40">
                            
                            <div class="row">
                                
                                <div class="col-md-6">
                                    <!-- Begin: LOGO -->
                                    <a class="navbar-brand logo" href="index.html">
                                        <img class="full-width max-width-140 m-right-10" alt="iProperty" src="assets/images/logo-white.png">
                                    </a>
                                    <span class="text-white">/ Real Buying Selling Property House</span>
                                    <!-- End: LOGO -->
                                </div>
                                
                                <div class="col-md-6">
                                    <!-- Begin: SOCIAL -->
                                    <ul class="social-icons m-top-15 text-right">
                                        <li>
                                            <a class="btn btn-base rounded-0" href="#"><i class="fa fa-facebook"></i></a>
                                        </li>
                                        <li>
                                            <a class="btn btn-base rounded-0" href="#"><i class="fa fa-instagram"></i></a>
                                        </li>
                                        <li>
                                            <a class="btn btn-base rounded-0" href="#"><i class="fa fa-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a class="btn btn-base rounded-0" href="#"><i class="fa fa-google-plus"></i></a>
                                        </li>
                                        <li>
                                            <a class="btn btn-base rounded-0" href="#"><i class="fa fa-linkedin"></i></a>
                                        </li>
                                    </ul>
                                    <!-- End: SOCIAL -->
                                </div>

                            </div>

                        </div>
                    </div>

                </div>
                
                <div class="row">
                    
                    <div class="col-lg-4 col-md-6">
                        <div class="m-bottom-30">
                            
                            <h5 class="text-bold-700 m-bottom-30 text-white text-uppercase">Recently Viewed</h5>

                            <div class="row">
                                <div class="col-md-12">

                                    <ul class="media-list">
                                        <li>
                                            <img alt="..." class="media-img" src="assets/images/property/property-1-150x130.jpg">
                                            <div class="media-content">
                                                <h5 class="text-bold-700 text-base">$250,000</h5>
                                                <h6><a class="text-white text-base-hover" href="#">Beautiful Small Apartment</a></h6>
                                                <p class="address text-muted">253 Lake Washington, USA</p>
                                            </div>
                                        </li>
                                        <li>
                                            <img alt="..." class="media-img" src="assets/images/property/property-2-150x130.jpg">
                                            <div class="media-content">
                                                <h5 class="text-bold-700 text-base">$120,000</h5>
                                                <h6><a class="text-white text-base-hover" href="#">Beautiful Garaes Condo</a></h6>
                                                <p class="address text-muted">154 Drive, New York</p>
                                            </div>
                                        </li>
                                        <li>
                                            <img alt="..." class="media-img" src="assets/images/property/property-3-150x130.jpg">
                                            <div class="media-content">
                                                <h5 class="text-bold-700 text-base">$145,000</h5>
                                                <h6><a class="text-white text-base-hover" href="#">Global Land House</a></h6>
                                                <p class="address text-muted">110 Lake, United Kingdom</p>
                                            </div>
                                        </li>
                                    </ul>

                                </div>
                            </div>

                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-6">
                        <div class="m-bottom-30">
                            
                            <h5 class="text-bold-700 m-bottom-26 text-white text-uppercase">Popular Countries</h5>

                            <div class="row">
                                <div class="col-lg-12 col-md-12">

                                    <ul class="icon-list m-bottom-20">
                                        <li>
                                            <i class="btn btn-base fa fa-angle-double-right"></i>
                                            <a class="text-white text-base-hover" href="#">France</a>
                                            <span class="text-base float-right">(10)</span>
                                        </li>
                                        <li>
                                            <i class="btn btn-base fa fa-angle-double-right"></i>
                                            <a class="text-white text-base-hover" href="#">United States</a>
                                            <span class="text-base float-right">(20)</span>
                                        </li>
                                        <li>
                                            <i class="btn btn-base fa fa-angle-double-right"></i>
                                            <a class="text-white text-base-hover" href="#">China</a>
                                            <span class="text-base float-right">(12)</span>
                                        </li>
                                        <li>
                                            <i class="btn btn-base fa fa-angle-double-right"></i>
                                            <a class="text-white text-base-hover" href="#">Spain</a>
                                            <span class="text-base float-right">(15)</span>
                                        </li>
                                        <li>
                                            <i class="btn btn-base fa fa-angle-double-right"></i>
                                            <a class="text-white text-base-hover" href="#">Poland</a>
                                            <span class="text-base float-right">(25)</span>
                                        </li>
                                        <li>
                                            <i class="btn btn-base fa fa-angle-double-right"></i>
                                            <a class="text-white text-base-hover" href="#">Italy</a>
                                            <span class="text-base float-right">(10)</span>
                                        </li>
                                        <li>
                                            <i class="btn btn-base fa fa-angle-double-right"></i>
                                            <a class="text-white text-base-hover" href="#">Turkey</a>
                                            <span class="text-base float-right">(20)</span>
                                        </li>
                                        <li>
                                            <i class="btn btn-base fa fa-angle-double-right"></i>
                                            <a class="text-white text-base-hover" href="#">United Kingdom</a>
                                            <span class="text-base float-right">(12)</span>
                                        </li>
                                        <li>
                                            <i class="btn btn-base fa fa-angle-double-right"></i>
                                            <a class="text-white text-base-hover" href="#">Germany</a>
                                            <span class="text-base float-right">(15)</span>
                                        </li>
                                        <li>
                                            <i class="btn btn-base fa fa-angle-double-right"></i>
                                            <a class="text-white text-base-hover" href="#">Singapore</a>
                                            <span class="text-base float-right">(25)</span>
                                        </li>
                                    </ul>

                                </div>
                            </div>

                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-12">
                        <div class="m-bottom-30">
                            
                            <div class="row">

                                <div class="col-lg-12 col-md-6">
                                    <h5 class="text-bold-700 m-bottom-30 text-white text-uppercase">Contact Us</h5>

                                    <div class="row m-bottom-20">
                                        <div class="col-md-12">
                                            
                                            <p class="text-white">Address: 253 Lake Washington, USA</p>
                                            <p class="text-white">Phone: (123) 123-456</p>
                                            <p class="text-white">E-Mail: <a class="text-base border-1 border-dotted border-light border-top-0 border-left-0 border-right-0" href="#">office@example.com</a></p>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-6">
                                    
                                    <h5 class="text-bold-700 m-bottom-30 text-white text-uppercase">Newsletter</h5>

                                    <div class="row m-bottom-20">
                                        <div class="col-md-12">
                                            
                                            <form>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <input type="email" class="form-control form-control-lg rounded-0 bg-white text-size-14" placeholder="Enter your email">
                                                        <button type="submit" class="input-group-addon btn btn-base rounded-0 text-bold-600 text-spacing-5 text-uppercase text-size-13  p-top-12 p-bottom-12 p-left-20 p-right-20"><i class="fa fa-envelope"></i></button>
                                                    </div>
                                                </div>
                                                <p class="text-muted">Subscribe to our newsletter and we will inform you about newset projects and promotions</p>
                                            </form>

                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </div>

        <div class="bg-base p-top-30 p-bottom-20">
            <div class="container">
                <p class="text-white m-bottom-6">© Copyright 2017 <a class="text-white border-1 border-dotted border-light border-top-0 border-left-0 border-right-0" href="index.html">iProperty</a>. All Rights Reserved.</p>
            </div>
        </div>
    </footer>
    <!-- End: FOOTER -
    ################################################################## -->

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

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAhpYHdYRY2U6V_VfyyNtkPHhywLjDkhfg"></script>
    <script>
        // Markers
        $("#googlemapsMarkers").gMap({
            controls: {
                draggable: (($.browser.mobile) ? false : true),
                panControl: true,
                zoomControl: true,
                mapTypeControl: true,
                scaleControl: true,
                streetViewControl: true,
                overviewMapControl: true
            },
            scrollwheel: false,
            markers: [{
                address: "217 Summit Boulevard, Birmingham, AL 35243",
                html: "<strong>Alabama Office</strong><br>217 Summit Boulevard, Birmingham, AL 35243",
                icon: {
                    image: "assets/images/map/pin.png",
                    iconsize: [54, 55],
                    iconanchor: [12, 46]
                }
            },{
                address: "645 E. Shaw Avenue, Fresno, CA 93710",
                html: "<strong>California Office</strong><br>645 E. Shaw Avenue, Fresno, CA 93710",
                icon: {
                    image: "assets/images/map/pin.png",
                    iconsize: [54, 55],
                    iconanchor: [12, 46]
                }
            },{
                address: "New York, NY 10017",
                html: "<strong>New York Office</strong><br>New York, NY 10017",
                icon: {
                    image: "assets/images/map/pin.png",
                    iconsize: [54, 55],
                    iconanchor: [12, 46]
                }
            }],
            latitude: 37.09024,
            longitude: -95.71289,
            zoom: 3
        });
    </script>

    <!-- SWITCHER | BEGIN -->
    <div class='style-switcher' id='style-switcher'>
        <div class='style-switcher-heading'>
            <!-- SWITCHER COLORS -->
            <div class='custom_icon'>
                <i class='fa fa-cog c_rotating text-base'></i>
            </div>
        </div>
        <div class='style-switcher-body'>
            <div class='style-switcher-colors'>
                <div class='style-switcher-title'>Color Scheme</div>
                <a class='style-switcher-color limegreen' data-switch-target='#colors' data-switch-to='limegreen.css' href='#' title="LimeGreen"></a>
                <a class='style-switcher-color golden' data-switch-target='#colors' data-switch-to='golden.css' href='#' title="Golden"></a>
                <a class='style-switcher-color autumn' data-switch-target='#colors' data-switch-to='autumn.css' href='#' title="Autumn"></a>
                <a class='style-switcher-color blue active' data-switch-default data-switch-target='#colors' data-switch-to='blue.css' href='#' title="Blue"></a>
                <a class='style-switcher-color skyblue' data-switch-target='#colors' data-switch-to='skyblue.css' href='#' title="Skyblue"></a>
                <a class='style-switcher-color cherry' data-switch-target='#colors' data-switch-to='cherry.css' href='#' title="Cherry"></a>
                <a class='style-switcher-color orange' data-switch-target='#colors' data-switch-to='orange.css' href='#' title="Orange"></a>
                <a class='style-switcher-color pink' data-switch-target='#colors' data-switch-to='pink.css' href='#' title="Pink"></a>
                <a class='style-switcher-color purple' data-switch-target='#colors' data-switch-to='purple.css' href='#' title="Purple"></a>
                <a class='style-switcher-color alphagreen' data-switch-target='#colors' data-switch-to='alphagreen.css' href='#' title="AlphaGreen"></a>
            </div>
            <div class='style-switcher-reset'>
                <a class='style-switcher-button btn-base' data-switch-target='#style-switcher' data-switch-to='reset:defaults' href='#' title="">Reset to defaults</a>
            </div>
        </div>
    </div>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/vendors/switcher/css/demo.css" media="all" />
    <script src="<?php echo base_url();?>assets/vendors/switcher/js/demo.js" ></script>
    <script src="<?php echo base_url();?>assets/vendors/switcher/js/jquery.cookie.js"></script>
    <!-- SWITCHER | END -->

    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','../../www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-70250779-1', 'auto');
      ga('send', 'pageview');

    </script>
    
</body>

</html>