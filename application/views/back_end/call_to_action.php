<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Property</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Call To Action</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->
        <!-- <div class="row">
            <div class="col-xl-12 mx-auto">
                <h6 class="mb-0 text-uppercase">Call To Action</h6>
                <hr>
                <?php echo isset($alert)?$alert:NULL;?>
                <div class="card border-top border-0 border-4 border-primary">
                    <div class="card-body p-5">
                        <div class="card-title d-flex align-items-center">
                            <div><i class="me-1 font-22 text-primary"></i>
                            </div>
                            <h5 class="mb-0 text-primary">Action Needed</h5>
                            <p>Hey, we discovered that you have a pending action on your account, please click the link
                                below to Request for Site Inspection </p>

                            <?php
                                $props_id       = $this->Promoter_db->get_props_id_by_user_id($user_id);
                                $url_code       = $this->Promoter_db->get_url_code_by_user_id($user_id);
                            ?>
                            <a
                                href="<?php echo base_url();?>Product/view_product<?php echo $props_id;?>/<?php echo $url_code;?>">Resume
                                Action</a>
                        </div>
                        <hr>

                    </div>
                </div>

            </div>
        </div> -->

        <div class="row">
            <div class="col-xl-12 mx-auto">
                <h6 class="mb-0 text-uppercase">Call To Action</h6>
                <hr>
                <?php echo isset($alert)?$alert:NULL;?>
                <div class="card border-top border-0 border-4 border-primary">
                    <div class="card-body p-5">
                        <div class="card-title d-flex align-items-center">
                            <div><i class="me-1 font-22 text-primary"></i>
                            </div>
                            <h5 class="mb-0 text-primary">Action Needed</h5>
                        </div>
                        <hr>
                        <div style="margin:0.2%;">
                            <?php echo $this->Admin_db->alert_callbark('danger','Hey, we discovered that you have a pending action on your account, please click the link
                                below to Request for Site Inspection');?>
                        </div>

                        <?php
                            $props_id       = $this->Promoter_db->get_props_id_by_user_id($user_id);
                            $url_code       = $this->Promoter_db->get_url_code_by_user_id($user_id);
                        ?>
                        <a href="<?php echo base_url();?>Product/view_product/<?php echo $props_id;?>/<?php echo urlencode($url_code);?>"
                            id="call_to_action" class="btn btn-danger btn-block"> Resume Action</a>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>