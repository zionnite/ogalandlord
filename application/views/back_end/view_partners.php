<style>
    .props_image{
        
        height: 400px;
        overflow: hidden;
        background-position: top center;
        background-repeat: no-repeat;
    }

    .props_image img.card-img-top{
        margin: auto;
        min-height: 100%;
        min-width: 100%;
    }
</style>
<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">View</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Partners</li>
							</ol>
						</nav>
					</div>
					
				</div>
				<!--end breadcrumb-->

                    <div class="col-12">
						<div class="card">
							<div class="card-body">
								<div class="row align-items-center">
									<div class="col-lg-12 col-xl-12">
										<a href="<?php echo base_url();?>Admin_panel/update_partners" class="btn btn-primary  mb-3 mb-lg-0"><i class="bx bxs-plus-square"></i>Add Partner to List</a>
									</div>
									
								</div>
							</div>
						</div>
					</div>
                        
				<div class="row">
					<div class="col-xl-12 mx-auto">
						<h6 class="mb-0 text-uppercase">Partner Logo</h6>
						<hr>
						<?php echo isset($alert)?$alert:NULL;?>
						
						<div class="row row-cols-1 row-cols-md-1 row-cols-lg-3 row-cols-xl-3">
                            <?php

                                $get_props_image        = $this->Partners_db->get_partners();
                                if(is_array($get_props_image)){
                                    foreach($get_props_image as $row){
                                        $id         = $row['id'];
                                        $name       = $row['image_name'];

                                        
                                        


                                      
                                    
                            ?>
                                        <div class="col">
                                            <div class="card">
                                                <div class="props_image">
                                                    <img src="<?php echo base_url();?>project_dir/partners/<?php echo $name;?>" class="card-img-top">
                                                </div>
                                              
                                                    <div class="card-body">	
                                                    
                                                        <a href="#edit_<?php echo $id;?>" data-bs-toggle="modal" class="card-link">Delete</a>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="edit_<?php echo $id;?>" tabindex="-1" aria-hidden="true">
                                                            <div class="modal-dialog modal-sm">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">Confirm Action</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p>Are you sure you want to delete this image?</p>
                                                                                                                
                                                                        
                                                                        
                                                                        
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                        <a href="<?php echo base_url();?>Admin_panel/delete_partners/<?php echo $id;?>" class="btn btn-danger">Yes, Delete</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
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

