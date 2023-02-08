<?php 
$count_msg				= $this->Chat_db->count_unread_message($user_id);
?>
<div class="page-wrapper">
	<div class="page-content">
        <div class="row">
            <?php
                if(is_array($get_chat)){
                    foreach($get_chat as $row){
                        $id             = $row['id'];
                        $dis_my_id      = $row['my_id'];
                        $dis_user_id    = $row['user_id'];
                        $props_id       = $row['props_id'];

                        $dis_my_full_name              =$this->Users_db->get_user_full_name_by_id($dis_my_id);
                        $dis_my_image_name             =$this->Users_db->get_image_name_by_id($dis_my_id);
                        $dis_my_email                  =$this->Users_db->get_email_by_id($dis_my_id);
                        $dis_my_user_name              =$this->Users_db->get_user_name_by_id($dis_my_id);
                        $dis_my_user_status            =$this->Users_db->get_status_by_id($dis_my_id);
                        $dis_my_user_image             =$this->Users_db->get_image_name_by_id($dis_my_id);

                        $dis_user_full_name              =$this->Users_db->get_user_full_name_by_id($dis_user_id);
                        $dis_user_image_name             =$this->Users_db->get_image_name_by_id($dis_user_id);
                        $dis_user_email                  =$this->Users_db->get_email_by_id($dis_user_id);
                        $dis_user_user_name              =$this->Users_db->get_user_name_by_id($dis_user_id);
                        $dis_user_user_status            =$this->Users_db->get_status_by_id($dis_user_id);
                        $dis_user_user_image             =$this->Users_db->get_image_name_by_id($dis_user_id);

                        $last_unread_msg                 =$this->Chat_db->get_unread_chat_limit_by_1($user_id);


                        if($user_id != $dis_user_id){
                    
            ?>
                        <div class="offset-md-2 col-md-8">
                            <div class="card radius-10">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <img src="<?php echo base_url();?>project_dir/users/<?php echo $dis_user_user_name;?>/images/<?php echo $dis_user_image_name;?>" class="rounded-circle p-1 border" width="90" height="90" alt="...">
                                        <div class="flex-grow-1 ms-3">
                                            <h5 class="mt-0"><?php echo $dis_user_full_name;?></h5>
                                            <p class="mb-0"><?php echo $last_unread_msg;?></p>
                                            
                                            <a href="<?php echo base_url();?>Message/reply_user/<?php echo $dis_user_id;?>/<?php echo $dis_my_id;?>/<?php echo $props_id;?>">
                                                <i class="bx bx-comment-detail align-middle"></i> Message 
                                                <?php //come here to correct this error of counter
                                                    if($count_msg > 0){
                                                ?>
                                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                                    <?php echo $count_msg;?>
                                                    <span class="visually-hidden">unread messages</span>
                                                </span>
                                                <?php 
                                                    }
                                                ?>
                                            </a> 
                                            <!-- <a href="javascript:;">Delete Message</a> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
            <?php 
                        }
                    }
                }else{
                    echo '<div style="margin:0.2%;">'.$this->Admin_db->alert_callbark('danger','You have NO Connction at the moment').'</div>'; 
                }
            ?>
        </div>
	</div>				
</div>