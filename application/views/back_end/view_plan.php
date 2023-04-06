<?php

    $public_key        =$this->Action->get_public_live_key();
    $private_key       =$this->Action->get_private_live_key();
    //$full_name         =str_replace(" ","_",$full_name);
    $token  =time();
	$site_name      =$this->Action->get_site_name();
	

?>


<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Subscription</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Plan</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->
        <div class="row">
            <div class="col-xl-12 mx-auto">
                <h6 class="mb-0 text-uppercase">View Plan</h6>
                <hr>
                <?php echo isset($alert)?$alert:NULL;?>
                <div class="card border-top border-0 border-4 border-primary">
                    <div class="card-body p-5">

                        <!-- Free Tier -->


                        <div class="row col-md-12">

                            <?php
                            $locations       = $this->Subscription_db->get_all_land_location();
                            if(is_array($locations)){
                                $i=0;
                                foreach($locations as $row){
                                    $i++;
                                    $id                   = $row['id'];
                                    $land_location        = $row['location_name'];
                                                                
                            ?>

                            <div class="row">
                                <div class="col-md-12">

                                    <div class="card-title d-flex align-items-center"
                                        style="margin-top:2%;margin-bottom:2%;">
                                        <div><i class="me-1 font-22 text-primary"></i>
                                        </div>
                                        <h5 class="mb-0 text-primary"><?php echo strtoupper($land_location);?></h5>
                                    </div>
                                    <hr>
                                </div>
                                <div class="col-md-12">
                                    <?php $this->load->view('back_end/view_plan_by_location', $row);?>
                                </div>
                            </div>

                            <?php
                                }
                            }
                            ?>

                        </div>



                    </div>
                </div>

            </div>
        </div>

    </div>
</div>


<script src="<?php echo base_url();?>assets_2/js/jquery.min.js"></script>
<script src="https://js.paystack.co/v1/inline.js"></script>
<script>
$('#makePayment').click(function(e) {
    e.preventDefault();

    var reference = '<?php echo $token;?>';
    var customerName = '<?php echo $full_name;?>';
    var site_name = '<?php echo $site_name;?>';
    var pay_phone = <?php echo $phone_no;?>;
    var Pay_Amount = $('#amount').val();
    var payemail = '<?php echo $email;?>';
    //
    var user_id = '<?php echo $user_id;?>';
    var props_id = $('#props_id').val();
    var agent_id = $('#agent_id').val();;
    var handler = PaystackPop.setup({
        key: '<?php echo $public_key;?>',
        email: payemail,
        amount: Pay_Amount * 100,
        currency: 'NGN',
        ref: reference,
        metadata: {

            "user_id": user_id,
            "props_id": props_id,
            "agent_id": agent_id,
            "trans_type": "deposit",

        },
        async: false,
        callback: function(response) {
            var reference = response.reference;
            // alert('Payment complete! Reference: ' + reference);
            window.location = "<?php echo base_url();?>Transaction/verify_payment/" + response
                .reference;
        },
        onClose: function() {
            alert('transaction cancelled');
            return false;
        }
    });
    handler.openIframe();

});
</script>


<script>
$(document).ready(function() {
    $("#title").change(function() {
        var props_id = $('#title').val();
        var dataString = 'props_id=' + props_id;
        //alert(dataString);
        $.ajax({
            type: "POST",
            url: "<?php echo base_url();?>Transaction/get_props_amount_by_id",
            data: dataString,
            cache: false,
            success: function(html) {
                //$("#pay_amount").val(html);
                $("#amount_wrapper").html(html);

            }
        });
    });
});
</script>