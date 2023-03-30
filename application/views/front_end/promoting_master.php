<!DOCTYPE html>
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
        - Begin: PAGE HEADER -
    #################################
    -->


    <!-- End: PAGE HEADER -
    ################################################################## -->

    <!--
    #################################
        - Begin: PROPERTY -
    #################################
    -->
    <?php isset($content)?$this->load->view($content):NULL;?>
    <!-- End: PROPERTY -
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