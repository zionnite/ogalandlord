<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Dashboard</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Downline</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->
        <div class="row">
            <div class="col-xl-12 mx-auto">
                <h6 class="mb-0 text-uppercase">Downline</h6>
                <hr>
                <?php echo isset($alert)?$alert:NULL;?>




                <!-- table -->
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h6 class="mb-0">Users (<?php echo $total;?>)</h6>
                            </div>

                        </div>
                        <hr>
                        <div class="table-responsive">
                            <table class="table align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>S/N</th>
                                        <th>Name</th>
                                        <th>User Phone</th>
                                        <th>User Email</th>
                                        <th>User Downline</th>
                                        <th>

                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                            if(is_array($downline)){
                                                $i=0;
                                                foreach($downline as $row){
                                                    
                                                    $i++;
                                                    $id                             =$row['id'];
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
                                                    $agent_login_status         = $row['login_status'];
                                                    $isbank_verify              = $row['isbank_verify'];

                                                    $agent_image_name           = base_url().'project_dir/users/'.$agent_user_name.'/images/'.$agent_image_name;

                                                    $count_num_sub              = $this->Subscription_db->count_subscriber($agent_id);
                                                    $count_downline             = $this->MUser_db->countDirectDownline($agent_id);
                                                    $amount_earned              = $this->MUser_db->totalAmountEarned($agent_id);

                                                    

                                            ?>
                                    <tr>
                                        <td><?php echo $i;?></td>
                                        <td><img src="<?php echo $agent_image_name;?>" style="height:50px; width:50;x;"
                                                alt=""></td>
                                        <td><?php echo $agent_phone;?></td>
                                        <td><?php echo $agent_email;?></td>
                                        <td><?php echo $count_downline;?></td>
                                        <!-- <td>
                                            <a href="" class="btn btn-danger btn-sm">View User Downline</a>
                                        </td> -->


                                    </tr>

                                    <?php 
                                    }
                                }
                            ?>

                                </tbody>
                                <?php 
                            if(!is_array($downline)){
                                echo $this->Admin_db->alert_callbark('danger','You have no User in your downline!');
                            }
                            ?>
                            </table>
                        </div>
                    </div>
                </div>



            </div>
        </div>

        <?php echo $pagination;?>
    </div>
</div>