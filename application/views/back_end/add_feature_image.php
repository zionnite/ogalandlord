<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Add</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Property</li>
							</ol>
						</nav>
					</div>
					
				</div>
				<!--end breadcrumb-->
				<div class="row">
					<div class="col-xl-12 mx-auto">
						<h6 class="mb-0 text-uppercase">Add Image to your property</h6>
						<hr>
						<?php echo isset($alert)?$alert:NULL;?>
                            <div class="card border-top border-0 border-4 border-primary">
                                <div class="card-body p-5">
                                    <div class="card-title d-flex align-items-center">
                                        <div><i class="me-1 font-22 text-primary"></i>
                                        </div>
                                        <h5 class="mb-0 text-primary">Property Image</h5>
                                    </div>
								    <hr>
								

                                    <form action="<?php echo base_url();?>Dashboard/insert_feature_image" method="post" enctype="multipart/form-data">
                                        <div class="col-md-12">
                                            <label for="condition" class="form-label">Upload Image <span style="color:red;">Image width and height must be 1300px By 450px respectively</span></label>
                                            <input type="file" class="form-control" id="files" name="file" required />
                                        </div>


                                        <!-- <small style="color:red; margin-top:2%;">After uploading image click the below button</small> -->
                                        <div class="col-12" style="margin-top:2%;">
                                            
                                            <input type="hidden" name="props_id" value="<?php echo $props_id;?>" />
                                            <input type="submit" name="submit" value="Submit" class="btn btn-success px-5" />
                                        </div>

                                    </form>
								
							    </div>
                           
						    </div>


						
					</div>
				</div>
				
			</div>
		</div>

<script src="<?php echo base_url();?>assets_2/js/jquery.min.js"></script>

<!-- <script>
$(document).ready(function(){
 $('#files').change(function(){
  var files = $('#files')[0].files;
  var error = '';
  var form_data = new FormData();
  for(var count = 0; count<files.length; count++)
  {
   var name = files[count].name;
   var extension = name.split('.').pop().toLowerCase();
   if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
   {
    error += "Invalid " + count + " Image File"
   }
   else
   {
    form_data.append("files[]", files[count]);
   }
  }
  if(error == '')
  {
   $.ajax({
    url:"<?php echo base_url(); ?>Dashboard/upload/<?php echo $props_id;?>", //base_url() return http://localhost/tutorial/codeigniter/
    method:"POST",
    data:form_data,
    contentType:false,
    cache:false,
    processData:false,
    beforeSend:function()
    {
     $('#uploaded_images').html("<label class='text-success'>Uploading...</label>");
    },
    success:function(data)
    {
     $('#uploaded_images').html(data);
     $('#files').val('');
    }
   })
  }
  else
  {
   alert(error);
  }
 });
});
</script> -->