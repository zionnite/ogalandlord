<div class="container">

        <h2 class="text-bold-700 m-top-30 m-bottom-40">Our Agents</h2>

        <div class="owl-carousel owl-theme m-bottom-60" data-plugin-options="{'items': 4, 'margin': 30, 'loop': false, 'nav': true, 'dots': false}">
            <!-- AGENT -->
            <?php
                $get_agent  = $this->Property_db->get_property_agent();
                if(is_array($get_agent)){
                    foreach($get_agent as $row){

                        $agent_id                   = $row['id'];
                        $agent_user_name            = $row['user_name'];
                        $agent_full_name            = $row['full_name'];
                        $agent_email                = $row['email'];
                        $agent_image_name           = $row['image_name'];
                        $agent_status               = $row['status'];
                        $agent_phone                = $row['phone'];
                        $agent_age                  = $row['age'];
                        $agent_sex                  = $row['sex'];
                        $agent_address              = $row['address'];
                        $agent_date_created         = $row['date_created'];
                        $agent_account_name         = $row['account_name'];
                        $agent_account_number       = $row['account_number'];
                        $agent_bank_name            = $row['bank_name'];
                        $agent_bank_code            = $row['bank_code'];
                        $agent_current_balance      = $row['current_balance'];


                        $agent_phone                = $this->Users_db->get_user_phone_by_id($agent_id);
                        $agent_prop_counter         = $this->Property_db->count_all_user_property($agent_id);


                        $agent_email                =substr_replace($agent_email, 'XXXXXXXX', '5', '5');
                        $agent_user_phone           =substr_replace($agent_phone, 'XXXXX', '3', '5');

                    
            ?>
            <div>

                <div class="agent bg-light-2 box-shadow-1 box-shadow-2-hover m-bottom-30 border-1 border-solid border-light">

                    <div class="agent-media overlay-wrapper">
                        <a class="d-block" href="#">
                            <img class="full-width" src="<?php echo base_url();?>project_dir/users/<?php echo $agent_user_name;?>/images/<?php echo $agent_image_name;?>">
                        </a>
                        <div class="media-data">
                            <div class="position-top">
                                <div class="badge badge-base text-white pull-left p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0"><?php echo $agent_prop_counter;?> Properties</div>
                            </div>
                            
                        </div>
                        <div class="overlay bg-bg opacity-9"></div>
                    </div>

                    <div class="agent-section p-top-25 p-bottom-25 p-right-15 p-left-15">
                        <h4 class="text-bold-700"><a class="text-dark text-base-hover" href="#"><?php echo $agent_full_name;?></a></h4>
                        <ul class="icon-list m-bottom-25">
                            <li><i class="btn btn-base rounded-0 fa fa-flag"></i> <?php echo $agent_status;?></li>
                            <li><i class="btn btn-base rounded-0 fa fa-envelope"></i> <?php echo $agent_email;?></li>
                            <li><i class="btn btn-base rounded-0 fa fa-phone"></i> <?php echo $agent_phone;?></li>
                        </ul>
                       
                    </div>

                </div>

            </div>
          
            <?php 
                    }
                }
            ?>
        </div>

    </div>