
<div class="page-wrapper">
	<div class="page-content">
                        <h6 class="mb-0 text-uppercase">Connection</h6>
						<hr>
						<?php echo isset($alert)?$alert:NULL;?>
						<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-4">

                            <?php
                                if(is_array($get_con)){
                                    foreach($get_con as $row){
                                        $id                 =$row['id'];
                                        $dis_user_id            =$row['user_id'];
                                        $agent_id           =$row['agent_id'];
                                        $time               =$row['time'];
                                        $date               =$row['date_created'];
                                        $props_id           =$row['prop_id'];
                                        
                                        $color;
                                        $random_number      =rand(1,4);
                                        if($random_number == 1){
                                            $color  ='primary';

                                        }else if($random_number == 2){
                                            $color  ='success';

                                        }else if($random_number == 3){
                                            $color  ='danger';

                                        }else if($random_number == 4){
                                            $color ='warning';
                                            
                                        }

                                        $get_user_full_name     = $this->Users_db->get_user_full_name_by_id($dis_user_id);
                                        $get_user_image         = $this->Users_db->get_image_name_by_id($dis_user_id);
                                        $get_user_email         = $this->Users_db->get_email_by_id($dis_user_id);
                                        $get_user_status        = $this->Users_db->get_status_by_id($dis_user_id);
                                        $get_user_status        = $this->Users_db->get_status_by_id($dis_user_id);
                                        $get_user_name          = $this->Users_db->get_user_name_by_id($dis_user_id);

                                        $get_agent_full_name     = $this->Users_db->get_user_full_name_by_id($agent_id);
                                        $get_agent_image         = $this->Users_db->get_image_name_by_id($agent_id);
                                        $get_agent_email         = $this->Users_db->get_email_by_id($agent_id);
                                        $get_agent_status        = $this->Users_db->get_status_by_id($agent_id);
                                        $get_agent_user_name     = $this->Users_db->get_user_name_by_id($agent_id);

                                        $props_name              = $this->Admin_db->get_props_name_by_id($props_id);

                                        if(strlen($props_name) > 15) {
                                            $props_name = $props_name.' ';
                                            $props_name = substr($props_name, 0, 20);
                                            $props_name = substr($props_name, 0, strrpos($props_name ,' '));
                                            $props_name = $props_name.'...';
                                        }

                            ?>
                                    <div class="col">
                                        <div class="card radius-15 bg-<?php echo $color;?>">
                                            <div class="card-body text-center">
                                                <div class="p-4 radius-15">
                                                    <?php
                                                        if($user_status =='agent' || $user_status =='landlord'){?>
                                                            <img src="<?php echo base_url();?>project_dir/users/<?php echo $get_user_name;?>/images/<?php echo $get_user_image;?>" width="110" height="110" class="rounded-circle shadow p-1 bg-white" alt="">
                                                            <h5 class="mb-0 mt-5 text-white"><?php echo $get_user_full_name;?></h5>
                                                            <p class="mb-3 text-white">(<?php echo $get_user_status;?>)</p>
                                                            
                                                            <p class="mb-3 text-white">Connection created for <br />
                                                            <?php echo $props_name;?></p>
                                                            <div class="d-grid"> <a href="<?php echo base_url();?>Message/reply_user/<?php echo $dis_user_id;?>/<?php echo $agent_id;?>/<?php echo $props_id;?>" class="btn btn-white radius-15">Send Message</a>
                                                            </div>

                                                        <?php 
                                                        }else if($user_status == 'user'){?>
                                                            <img src="<?php echo base_url();?>project_dir/users/<?php echo $get_agent_user_name;?>/images/<?php echo $get_agent_image;?>" width="110" height="110" class="rounded-circle shadow p-1 bg-white" alt="">
                                                            <h5 class="mb-0 mt-5 text-white"><?php echo $get_agent_full_name;?></h5>
                                                            <p class="mb-3 text-white">(<?php echo $get_agent_status;?>)</p>
                                                            
                                                            <p class="mb-3 text-white">Connection created for <br />
                                                            <?php echo $props_name;?></p>
                                                            <div class="d-grid"> <a href="<?php echo base_url();?>Message/reply_user/<?php echo $agent_id;?>/<?php echo $dis_user_id;?>/<?php echo $props_id;?>" class="btn btn-white radius-15">Send Message</a>
                                                            </div>
                                                    
                                                        <?php 
                                                        }
                                                        ?>

                                                        
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                           
                            <?php 
                                    }
                                }
                            ?>
                        </div>


                        <?php 
                            if(!is_array($get_con)){
                                echo $this->Admin_db->alert_callbark('danger','You have no connection at the moment!');
                            }
                        ?>


                    <nav>
                        <?php echo $pagination;?>
                    </nav>
	</div>				
</div>


