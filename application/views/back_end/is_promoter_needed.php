<?php 
$user_id		= $this->session->userdata('user_id');

?>
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
                        <li class="breadcrumb-item active" aria-current="page">Property</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->
        <div class="row">
            <div class="col-xl-12 mx-auto">
                <h6 class="mb-0 text-uppercase">Property Promoter</h6>
                <hr>
                <?php echo isset($alert)?$alert:NULL;?>
                <div class="card border-top border-0 border-4 border-primary">
                    <div class="card-body p-5">
                        <div class="card-title d-flex align-items-center">
                            <div><i class="me-1 font-22 text-primary"></i>
                            </div>
                            <h5 class="mb-0 text-primary">Affiliate Marketer</h5>
                        </div>
                        <hr>
                        <form class="row g-3" method="post"
                            action="<?php echo base_url();?>Dashboard/insert_is_promoter_needed/<?php echo $props_id;?>">

                            <div class="col-md-12">
                                <label for="is_marketer_needed" class="form-label">Do You Need This Property to be
                                    Promoted by
                                    Affiliate Marketer?</label>
                                <select class="form-control" id="is_marketer_needed" name="is_marketer_needed" required>
                                    <option value="">Select</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>

                            <div class="col-md-12">
                                <label for="commission" class="form-label">Commission</label>
                                <input type="number" class="form-control" id="commission" placeholder="e.g 5%"
                                    name="commission" value="0">

                                <small style="color:red;">What Commission will an Affiliate Marketer make from this
                                    Property </small>
                            </div>


                            <div class="col-12">
                                <input type="submit" class="btn btn-primary px-5" value="Saved" name="submit" />

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