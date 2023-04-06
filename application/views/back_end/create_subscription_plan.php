<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Subscription</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Create Subscription Plan</li>
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
                            <h5 class="mb-0 text-primary">Create Subscription Plan</h5>
                        </div>
                        <hr>
                        <form class="row g-3" method="post"
                            action="<?php echo base_url();?>Admin_panel/generate_subscription_plan"
                            enctype="multipart/form-data">


                            <div class="col-md-12">
                                <label for="plan_name" class="form-label">Plan Name</label>
                                <input type="text" class="form-control" id="plan_name" placeholder="Enter Plan Name"
                                    name="plan_name" value="<?php echo set_value('plan_name'); ?>">
                                <small style="color:red;"><?php echo form_error('plan_name');?></small>
                            </div>

                            <div class="col-md-12">
                                <label for="description" class="form-label">Plan Description</label>
                                <textarea type="text" class="form-control" id="description" rows="5" name="description"
                                    value="<?php echo set_value('description'); ?>"></textarea>
                                <small style="color:red;"><?php echo form_error('description');?></small>
                            </div>


                            <div class="col-md-12">
                                <label for="interval" class="form-label">Interval</label>
                                <select class="form-control" id="interval" name="interval">
                                    <option value="">Select Option</option>
                                    <option value="hourly">Hourly</option>
                                    <option value="daily" selected>Daily</option>
                                    <option value="weekly">Weekly</option>
                                    <option value="monthly">Monthly</option>
                                    <!-- <option value="quarterly">Quarterly</option> -->
                                    <option value="annually">Annually</option>
                                </select>

                                <small style="color:red;"><?php echo form_error('interval');?></small>
                            </div>




                            <div class="col-md-12">
                                <label for="amount" class="form-label">Amount</label>
                                <input type="text" class="form-control" id="amount" placeholder="Enter Amount"
                                    name="amount" value="<?php echo set_value('amount'); ?>">
                                <small style="color:red;"><?php echo form_error('amount');?></small>
                            </div>


                            <div class="col-md-12">
                                <label for="invoice_limit" class="form-label">Invoice Limit</label>
                                <input type="text" class="form-control" id="invoice_limit"
                                    placeholder="Enter Invoice Limit" name="invoice_limit"
                                    value="<?php echo set_value('invoice_limit'); ?>">
                                <small style="color:red;"><?php echo form_error('invoice_limit');?></small>
                            </div>


                            <div class="col-md-12">
                                <label for="location" class="form-label">Location Name</label>
                                <select class="form-control" id="location" name="location">
                                    <option value="">Select Option</option>
                                    <?php
                                        $locations       = $this->Subscription_db->get_all_land_location();
                                        if(is_array($locations)){
                                            $i=0;
                                            foreach($locations as $row){
                                                $i++;

                                                $id                   = $row['id'];
                                                $land_location        = $row['location_name'];
                                                                
                                    ?>
                                    <option value="<?php echo $id;?>"><?php echo $land_location;?></option>
                                    <?php
                                            }
                                        }
                                    ?>
                                </select>
                                <small style="color:red;"><?php echo form_error('location');?></small>
                            </div>




                            <div class="col-12">
                                <input type="submit" class="btn btn-primary px-5" value="Create Subscription Plan"
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