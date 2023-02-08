﻿<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('front_end/head');?>

<body data-menu="header-main-menu" class="bg-white body-main-menu header-main-menu">

    <!--
    #################################
        - Begin: HEADER -
    #################################
    -->
    <?php $this->load->view('front_end/header');?>
    <!-- End: HEADER -
    ################################################################## -->

    <!--
    #################################
        - Begin: SLIDER -
    #################################
    -->
    <?php $this->load->view('front_end/slider');?>
    <!-- End: SLIDER -
    ################################################################## -->

    <?php //$this->load->view('home_country');?>

    <!--
    #################################
        - Begin: PROPERTY -
    #################################
    -->
    <?php $this->load->view('front_end/home_property');?>
    <!-- End: PROPERTY -
    ################################################################## -->

    <!--
    #################################
        - Begin: SERVICES -
    #################################
    -->
    <?php //$this->load->view('front_end/home_service');?>
    <!-- End: SERVICES -
    ################################################################## -->

    <!--
    #################################
        - Begin: AGENTS -
    #################################
    -->
    <?php $this->load->view('front_end/home_agent');?>
    <!-- End: AGENTS -
    ################################################################## -->

    <!--
    #################################
        - Begin: AGENCIES -
    #################################
    -->
    <?php //$this->load->view('front_end/home_top_agency');?>
    <!-- End: AGENCIES -
    ################################################################## -->

    <!--
    #################################
        - Begin: NEWS -
    #################################
    -->
    <?php //$this->load->view('front_end/home_blog');?>
    <!-- End: NEWS -
    ################################################################## -->

    <!--
    #################################
        - Begin: CLIENTS -
    #################################
    -->
    <?php $this->load->view('front_end/client');?>
    <!-- End: CLIENTS -
    ################################################################## -->

    <!--
    #################################
        - Begin: FOOTER -
    #################################
    -->
    <?php $this->load->view('front_end/footer');?>
    <!-- End: FOOTER -
    ################################################################## -->

    <?php $this->load->view('front_end/js_file');?>   
    
</body>

</html>