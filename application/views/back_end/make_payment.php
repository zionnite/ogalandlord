<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Payment</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Make Payment</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->
        <div class="row">
            <div class="col-xl-12 mx-auto">
                <!-- <h6 class="mb-0 text-uppercase">Add Land Location</h6> -->
                <hr>
                <?php echo isset($alert)?$alert:NULL;?>
                <div class="card border-top border-0 border-4 border-primary">
                    <div class="card-body p-5">
                        <div class="card-title d-flex align-items-center">
                            <div><i class="me-1 font-22 text-primary"></i>
                            </div>
                            <h5 class="mb-0 text-primary">Add Land Location</h5>
                        </div>
                        <hr>
                        <form class="row g-3" method="post"
                            action="<?php echo base_url();?>Admin_panel/insert_land_location"
                            enctype="multipart/form-data">


                            <div class="col-md-12">
                                <label for="location" class="form-label">Location Name</label>
                                <input type="text" class="form-control" id="location" placeholder="Enter Location Name"
                                    name="location" value="<?php echo set_value('location'); ?>">
                                <small style="color:red;"><?php echo form_error('location');?></small>
                            </div>


                            <div class="col-md-12">
                                <input type="file" class="form-control" id="file" name="userfile" />
                            </div>




                            <div class="col-12">
                                <input type="submit" class="btn btn-primary px-5" value="Add Land location"
                                    name="submit" />
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>


<script src="<?php echo base_url();?>assets_2/js/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $('#toggle_amenitites').click(function(e) {
        $('#amenities').toggle(100); // show to UI when use display: none
        //  $('.continuous').hide(100);  // hide()
    })
});
</script>


<script>
$(document).ready(function() {
    $("#types_of_property").change(function() {
        var types_of_property = $('#types_of_property').val();
        var dataString = 'types_of_property=' + types_of_property;
        //alert(dataString);
        $.ajax({
            type: "POST",
            url: "<?php echo base_url();?>Dashboard/get_sub_property_type",
            data: dataString,
            cache: false,
            success: function(html) {
                $("#sub_type_property").html(html);

            }
        });
    });

    $("#state").change(function() {
        var list_state = $('#state').val();
        var dataString = 'state=' + list_state;
        //alert(dataString);
        $.ajax({
            type: "POST",
            url: "<?php echo base_url();?>Dashboard/get_sub_state",
            data: dataString,
            cache: false,
            success: function(html) {
                $("#area").html(html);

            }
        });
    });
});
</script>