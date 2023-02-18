 <?php
    $get_pros_name                  = $this->Admin_db->get_props_name_by_id($props_id);
    $get_pros_image_name            = $this->Admin_db->get_props_image_by_id($props_id);
    $state_id                       = $this->Admin_db->get_state_id_by_props_id($props_id);
    $state_name                     = $this->Admin_db->get_state_name_state_id($state_id);
    $sub_state_id                   = $this->Admin_db->get_sub_state_id_by_props_id($props_id);
    $sub_state_name                 = $this->Admin_db->get_sub_state_name_sub_state_id($sub_state_id);

    $agent_id                       = $this->Admin_db->get_props_agent_id_by_props_id($props_id);
?>
 <style>
.props_image {

    height: 200px;
    overflow: hidden;
    background-position: 50% 50%;
    background-image: url(<?php echo base_url();
    ?>project_dir/property/<?php echo $get_pros_image_name;
    ?>);
    background-repeat: no-repeat;

}

.props_image img.card-img-top {
    margin: auto;
    min-height: 100%;
    min-width: 100%;
}
 </style>

 <style>
.ajax-loader {
    /* visibility: hidden; */
    background-color: rgba(0, 0, 3, 0.4);
    position: absolute;
    z-index: +100 !important;
    width: 100%;
    height: 100%;
}

.ajax-loader img {
    position: relative;
    top: 40%;
    left: 44%;
}
 </style>

 <div class="ajax-loader">
     <img src="<?php echo base_url();?>project_dir/loader.gif" class="img-responsive" />
 </div>

 <div class="page-wrapper">
     <div class="page-content">

         <div class="col">
             <div class="card">
                 <div class="props_image">
                     <img src="<?php echo base_url();?>project_dir/property/<?php echo $get_pros_image_name;?>"
                         class="card-img-top">
                 </div>
                 <div class="card-body">
                     <h5 class="card-title"><?php echo $get_pros_name;?></h5>
                     <p class="card-text"><?php echo $state_name;?>,<?php echo $sub_state_name;?></p>


                     <a href="#send_msg" data-bs-toggle="modal" class="card-link btn btn-dark btn-sm"> <i
                             class="fadeIn animated bx bx-envelope"></i> Message</a>
                     <a href="#sevice_agreement" data-bs-toggle="modal" class="card-link btn btn-danger btn-sm"> <i
                             class="fadeIn animated bx bx-food-menu"></i> Service Level Agreement</a>
                     <?php if($user_id != $agent_id){?>
                     <a href="#" id="make_payment" class="card-link btn btn-success btn-sm"> <i
                             class="fadeIn animated bx bx-credit-card"></i> Send Fund To Landlord</a>
                     <?php }?>
                 </div>


             </div>
         </div>

         <?php echo isset($alert)?$alert:NULL;?>


         <!-- Agreement Dialog -->
         <div class="modal fade" id="sevice_agreement" tabindex="-1" aria-hidden="true">
             <div class="modal-dialog ">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h5 class="modal-title">Agreement</h5>
                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                     </div>

                     <form action="<?php echo base_url();?>Message/send_msg" method="post">

                         <div class="modal-body">
                             <h5>Agreement Between You & Agent (Landlord)</h5>
                             <div>
                                 <p><strong>Whereby It is Agreed as Follows:</strong></p>
                             </div>
                             <div>
                                 <ul>
                                     <li>The Landlord(Agent) agree to let and the Tenant agrees to take all the premises
                                         comprising the listed property</li>

                                     <li>
                                         Not to alter any fixture(s) in the property, reduce or partition the property
                                         without the prior consent in writing fof the Landlord (Agent)
                                     </li>

                                     <li> Not to undertake any extra electrical wiring without first discussing such
                                         wiring with the landlord(agent) and obtainning the consent of the landlord
                                         (agent) </li>

                                     <li>To permit Landlord (agent to enter the property at all reasonable time in the
                                         daylight to view the condition thereof and to ause to be effected by the tenant
                                         necessary repair</li>

                                     <li>Not to use firewood, or smoke in the building</li>

                                     <li>You agree fully to this term by making payment to the Landlord( or agent)</li>

                                 </ul>

                             </div>

                         </div>
                         <div class="modal-footer">

                             <button type="button" class="btn btn-secondary btn-sm"
                                 data-bs-dismiss="modal">Close</button>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>
 </div>





 <script src="<?php echo base_url();?>assets_2/js/jquery.min.js"></script>
 <script src="<?php echo base_url();?>assets_2/js/sweetalert.min.js"></script>
 <script>
$('.ajax-loader').hide();

$(document).ready(function() {
    $('#make_payment').click(function(e) {
        $('.ajax-loader').show();
        e.preventDefault();



        $.ajax({
            url: '<?php echo base_url();?>Transaction/make_payment/<?php echo $props_id;?>/<?php echo $agent_id;?>/<?php echo $user_id;?>',
            type: "post",
            success: function(data) {

                $('.ajax-loader').hide();

                if (data == 'ok') {

                    swal({
                        title: "Success",
                        text: "Transfer succesful, transaction has been added to queue!",
                        icon: "success",
                        closeOnClickOutside: false,
                    });



                } else if (data == 'not_ok') {

                    swal({
                        title: "Oops!",
                        text: "Transaction failed, could not carryout transfer,please try again later!",
                        icon: "error",
                        closeOnClickOutside: false,
                    });

                } else {
                    swal({
                        title: "Oops!",
                        text: data,
                        icon: "warning",
                        closeOnClickOutside: false,
                    });
                }

            }

        });
    });
});
 </script>