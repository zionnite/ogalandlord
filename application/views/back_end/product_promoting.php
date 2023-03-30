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
                        <li class="breadcrumb-item active" aria-current="page">Product Promoting</li>
                    </ol>
                </nav>
            </div>

        </div>

        <div class="row">
            <div class="col-xl-12 mx-auto">
                <h6 class="mb-0 text-uppercase">Product You are Promoting</h6>
                <hr>
                <?php echo isset($alert)?$alert:NULL;?>
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h6 class="mb-0">Total <?php echo $total;?> Product On Your List</h6>
                            </div>

                        </div>
                        <hr>
                        <div class="table-responsive">
                            <table class="table align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>S/N</th>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Commission</th>
                                        <th>Your Cut</th>
                                        <th>Downline User</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                            if(is_array($get_property)){
                                                $i=0;
                                                foreach($get_property as $row){
                                                    $i++;
                                                    $id                 =$row['id'];
                                                    $props_id           =$row['props_id'];
                                                    $url_code           =$row['url_code'];
                                                    $dis_amount     =   $this->Admin_db->get_props_amount_by_id($props_id);
                                                    
                                      


                                                    $props_name                 =$this->Admin_db->get_props_name_by_id($props_id);
                                                    $props_image                =$this->Admin_db->get_props_image_by_id($props_id);

                                                
													$currency		=   '&#8358;';
													$dis_amount		=   $currency.$this->cart->format_number($dis_amount);
                                                    $props_comm     =   $this->Promoter_db->get_promoter_com($props_id);


                                                                                        
                                                    if(strlen($props_name) > 25) {
                                                        $props_name = $props_name.' ';
                                                        $props_name = substr($props_name, 0, 150);
                                                        $props_name = substr($props_name, 0, strrpos($props_name ,' '));
                                                        $props_name = $props_name.'...';
                                                    }


                                                    $get_promoter_com			= $this->Promoter_db->get_promoter_com($props_id);
                                                    $props_amount            	= $this->Admin_db->get_props_amount_by_id($props_id);
                                                    $promoter_perc				= ($get_promoter_com/100) * $props_amount;
                                                    $total_amount            	= $currency.$this->cart->format_number($props_amount - $promoter_perc);
                                                    $your_cut                	= $currency.$this->cart->format_number($promoter_perc);
                                                    $count_downline             = $this->Promoter_db->count_my_downline_with_props_id($user_id,$props_id);

                                                    


                                            ?>
                                    <tr>
                                        <td><?php echo $i;?></td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="recent-product-img">
                                                    <a href="<?php echo base_url();?>Property/view_property/<?php echo $props_id;?>"
                                                        data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                        data-bs-original-title="<?php echo $props_name;?>">
                                                        <img src="<?php echo base_url();?>project_dir/property/<?php echo $props_image;?>"
                                                            alt="">
                                                    </a>
                                                </div>
                                                <div class="ms-2">
                                                    <h6 class="mb-1 font-14"><?php echo $props_name;?></h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td><?php echo $dis_amount;?></td>
                                        <td><?php echo $props_comm;?>%</td>
                                        <td><?php echo $your_cut;?></td>
                                        <th><?php echo $count_downline;?></th>
                                        <td>

                                            <a href="<?php echo base_url();?>Product/view_product/<?php echo $props_id;?>/<?php echo urlencode($url_code);?>"
                                                class="btn btn-danger btn-sm">View More</a>
                                        </td>

                                        <td>
                                            <a href="javascript:;" class="btn btn-dark btn-sm">copy link</a>
                                        </td>

                                    </tr>

                                    <?php 
                                    }
                                }
                            ?>

                                </tbody>
                                <?php 
                            if(!is_array($get_property)){
                                echo $this->Admin_db->alert_callbark('danger','You are currently not Promoting any Product at the moment!');
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