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
    .props_image{
        
        height: 200px;
        overflow: hidden;
        background-position: 50% 50%;
        background-image:url(<?php echo base_url();?>project_dir/property/<?php echo $get_pros_image_name;?>);
        background-repeat: no-repeat;
        
    }

    .props_image img.card-img-top{
        margin: auto;
        min-height: 100%;
        min-width: 100%;
    }
</style>

<style>
    .ajax-loader {
        /* visibility: hidden; */
        background-color: rgba(0,0,3,0.4);
        position: absolute;
        z-index: +100 !important;
        width: 100%;
        height:100%;
    }

    .ajax-loader img {
        position: relative;
        top:40%;
        left:44%;
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
                        <img src="<?php echo base_url();?>project_dir/property/<?php echo $get_pros_image_name;?>" class="card-img-top">
                    </div>
					<div class="card-body">
						<h5 class="card-title"><?php echo $get_pros_name;?></h5>
						<p class="card-text"><?php echo $state_name;?>,<?php echo $sub_state_name;?></p>


                        <a href="#send_msg" data-bs-toggle="modal" class="card-link btn btn-dark btn-sm"> <i class="fadeIn animated bx bx-envelope"></i> Message</a>
                        <a href="#" class="card-link btn btn-danger btn-sm"> <i class="fadeIn animated bx bx-food-menu"></i> Service Level Agreement</a>
                        <?php if($user_id != $agent_id){?>
						    <!-- <a href="<?php echo base_url();?>Transaction/make_payment/<?php echo $props_id;?>/<?php echo $agent_id;?>/<?php echo $user_id;?>" class="card-link btn btn-success btn-sm"> <i class="fadeIn animated bx bx-credit-card"></i> Sent Fund To Landlord</a> -->
						    <a href="#" id="make_payment" class="card-link btn btn-success btn-sm"> <i class="fadeIn animated bx bx-credit-card"></i> Sent Fund To Landlord</a>
                        <?php }?>
					</div>

                
				</div>
			</div>

            <?php echo isset($alert)?$alert:NULL;?>

            <div class="row">
                <?php
                    if(is_array($get_chat)){
                        foreach($get_chat as $row){
                            $msg_id                 	=$row['id'];
                            $dis_sender                 =$row['sender'];
                            $dis_reciever               =$row['reciever'];
                            $msg  		                =$row['message'];
                            $time                   	=$row['time'];
                            $status                 	=$row['status'];
                            $date_created              	=$row['date_created'];


                            $dis_full_name              =$this->Users_db->get_user_full_name_by_id($dis_sender);
                            $dis_image_name             =$this->Users_db->get_image_name_by_id($dis_sender);
                            $dis_email                  =$this->Users_db->get_email_by_id($dis_sender);
                            $dis_user_name              =$this->Users_db->get_user_name_by_id($dis_sender);
                            $dis_user_status            =$this->Users_db->get_status_by_id($dis_sender);
                            $dis_user_image             =$this->Users_db->get_image_name_by_id($dis_sender);

                            if($dis_reciever == $user_id){

                                
                                
                            
                ?>
                                <div class="offset-md-2 col-md-8">
                                    <div class="card radius-10">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <img src="<?php echo base_url();?>project_dir/users/<?php echo $dis_user_name;?>/images/<?php echo $dis_user_image;?>" class="align-self-center rounded-circle p-1 border" width="90" height="90">
                                                <div class="flex-grow-1 ms-3">
                                                    <h5 class="mt-0"><?php echo $dis_full_name;?></h5>
                                                    <p class="mb-0"><?php echo $msg;?></p>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                <?php 
                            }else if($dis_reciever != $user_id){?>
                            
                                    <div class="offset-md-2 col-md-8">
                                        <div class="card radius-10">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <img src="<?php echo base_url();?>project_dir/users/<?php echo $dis_user_name;?>/images/<?php echo $dis_user_image;?>" class="align-self-center rounded-circle p-1 border" width="90" height="90">
                                                    <div class="flex-grow-1 ms-3">
                                                        <h5 class="mt-0"><?php echo $dis_full_name;?></h5>
                                                        <p class="mb-0"><?php echo $msg;?></p>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <?php }
                        }
                    }else{
                        echo '<div style="margin:0.2%;">'.$this->Admin_db->alert_callbark('danger','There is no conversation found between you and this user').'</div>';
                        echo '<div style="margin:0.2%;">'.$this->Admin_db->alert_callbark('success','Be the first to start the Conversation by clicking the above message button').'</div>';
                    }
                ?>
            </div>

            <!-- Send message Dialog -->
             <div class="modal fade" id="send_msg" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Drop Message</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <form action="<?php echo base_url();?>Message/send_msg" method="post">

                            <div class="modal-body">
                                <!-- body  -->
                                <div class="form-group">
                                    <!-- <?php echo $sender.' ==='.$reciever;?> -->
                                    <textarea name="msg" id="message" required class="form-control" placeholder="Write your message here"></textarea>
                                </div>                                                                    
                                                                        
                                                                        
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="receiver" value="<?php echo $sender;?>">
                                <input type="hidden" name="sender" value="<?php echo $reciever;?>">
                                <input type="hidden" name="props_id" value="<?php echo $props_id;?>">
                                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                <input type="submit" class="btn btn-success btn-sm" name="submit" value="Send Message">
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <nav><?php echo $pagination;?></nav>
	</div>				
</div>





<script src="<?php echo base_url();?>assets_2/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets_2/js/sweetalert.min.js"></script> 
<script>
    $('.ajax-loader').hide();

	$(document).ready(function(){
		$('#make_payment').click(function (e) {
            $('.ajax-loader').show();
			e.preventDefault();

            

			$.ajax({
				url: '<?php echo base_url();?>Transaction/make_payment/<?php echo $props_id;?>/<?php echo $agent_id;?>/<?php echo $user_id;?>',
				type: "post",
				success: function (data) {
                    
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

					}else{
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