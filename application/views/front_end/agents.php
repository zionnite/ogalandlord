<div class="page-header bg-base p-top-30 p-bottom-30">
    <div class="container">

        <div class="row d-flex align-items-center">

            <div class="col-md-8 text-center-sm">
                <h3 class="text-white text-uppercase text-bold-700 m-bottom-0">Agent </h3>
            </div>

            <div class="col-md-4 text-right text-center-sm">
                <ol class="breadcrumb bg-white rounded-0">
                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
                    <li class="breadcrumb-item active">Agent</li>
                </ol>
            </div>

        </div>

    </div>
</div>


<div class="bg-light-3 p-top-60 p-bottom-60">
        <div class="container">

            <?php $this->load->view('front_end/search_filter/full_search_filter');?>


            <div class="row">
                <?php echo isset($alert)?$alert:NULL;?>
                <div class="col-md-12 m-top-8 m-bottom-20">
                    
                    <h5><?php echo $total;?> Agent Found</h5>

                </div>

            </div>

            <!-- PROPERTIES -->
            <div class="row">
                
                <ul class="clearfix full-width" data-plugin-masonry>
                
                    <!-- PROPERTY -->
                    <?php
                        if(is_array($get_agents)){
                            foreach($get_agents as $row){

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
                        <li class="col-lg-3 col-md-6 col-sm-12" style="position: absolute; left: 0px; top: 0px;">

                            <div class="agent bg-white box-shadow-1 box-shadow-2-hover m-bottom-30">

                                <div class="agent-media">
                                    <a class="d-block" href="#">
                                        <img class="full-width" src="<?php echo base_url();?>project_dir/users/<?php echo $agent_user_name;?>/images/<?php echo $agent_image_name;?>">
                                    </a>
                                    <div class="media-data">
                                        <div class="position-top">
                                            <div class="badge badge-base text-white pull-left p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0"><?php echo $agent_prop_counter;?> Properties</div>
                                        </div>
                                        
                                    </div>
                                </div>

                                <div class="agent-section p-top-25 p-bottom-25 p-right-15 p-left-15">
                                    <h5 class="text-uppercase text-bold-700"><a href="#" class="text-base"><?php echo $agent_full_name;?></a></h5>

                                    <ul class="icon-list m-bottom-25">
                                        <li><i class="btn btn-base rounded-0 fa fa-flag"></i> <?php echo $agent_status;?></li>
                                        <li><i class="btn btn-base rounded-0 fa fa-envelope"></i> <?php echo $agent_email;?></li>
                                        <li><i class="btn btn-base rounded-0 fa fa-phone"></i> <?php echo $agent_phone;?></li>
                                    </ul>
                                   
                                </div>

                            </div>

                        </li>

                    <?php 
                            }
                        }
                    ?>
                   
                </ul>

            </div>
            <!-- /PROPERTIES -->

            <?php echo $pagination;?>

        </div>
</div>