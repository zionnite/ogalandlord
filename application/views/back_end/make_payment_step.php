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

        <div class="row">
            <form class="row g-3" method="post" action="<?php echo base_url();?>Admin_panel/insert_make_payment"
                enctype="multipart/form-data">
                <div class="col-xl-12 mx-auto">
                    <h6 class="mb-0 text-uppercase">Office Payment for New User</h6>
                    <?php echo isset($alert)?$alert:NULL;?>

                    <div class="card" style="margin-top:2%;">
                        <div class="card-body">
                            <div class="col-md-12">
                                <label for="ref_code" class="form-label">Referal Code</label>
                                <input type="text" class="form-control" id="ref_code" placeholder="Referal Code"
                                    name="ref_code" value="<?php echo set_value('ref_code'); ?>">
                                <small style="color:red;"><?php echo form_error('ref_code');?></small>
                            </div>
                            <div id="first_ancestor">
                            </div>

                        </div>
                    </div>

                    <div class="card" style="margin-top:1%;">

                        <div class="card-body">
                            <h4 class="card-title">Personal Information</h4>

                            <div class="col-md-12">
                                <label for="full_name" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="full_name" placeholder="Full Name"
                                    name="full_name" value="<?php echo set_value('full_name'); ?>">
                                <small style="color:red;"><?php echo form_error('full_name');?></small>
                            </div>

                            <div class="col-md-12" style="margin-top:1%;">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="text" class="form-control" id="email" placeholder="Email" name="email"
                                    value="<?php echo set_value('email'); ?>">
                                <small style="color:red;"><?php echo form_error('email');?></small>
                            </div>

                            <div class="col-md-12" style="margin-top:1%;">
                                <label for="phone" class="form-label">Phone Number (* Must not contain special symbols
                                    like +, etc)</label>
                                <input type="number" class="form-control" id="phone" placeholder="Phone" name="phone"
                                    value="<?php echo set_value('phone'); ?>">
                                <small style="color:red;"><?php echo form_error('phone');?></small>
                            </div>


                        </div>
                    </div>


                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Bank Information</h4>

                            <div class="col-md-12" style="margin-top:1%;">
                                <label for="acc_name" class="form-label">Account Name</label>
                                <input type="text" class="form-control" id="acc_name" placeholder="Account Name"
                                    name="acc_name" value="<?php echo set_value('acc_name'); ?>">
                                <small style="color:red;"><?php echo form_error('acc_name');?></small>
                            </div>


                            <div class="col-md-12" style="margin-top:1%;">
                                <label for="acc_number" class="form-label">Account Number</label>
                                <input type="number" class="form-control" id="acc_number" placeholder="Account Number"
                                    name="acc_number" value="<?php echo set_value('acc_number'); ?>">
                                <small style="color:red;"><?php echo form_error('acc_number');?></small>
                            </div>


                            <div class="col-md-12" style="margin-top:1%;">
                                <select class="form-control" name="bank_code">
                                    <option value="">Select Bank</option>
                                    <?php 
                                    $list_bank  =$this->Bank_db->get_list_of_bank();
                                    if(is_array($list_bank)){
                                        foreach($list_bank as $row){
                                            $id         = $row['id'];
                                            $bank_code  = $row['bank_code'];
                                            $bank_name  = $row['bank_name'];
                                                                
                                    ?>
                                    <option value="<?php echo $bank_code;?>">
                                        <?php echo $bank_name;?>
                                    </option>
                                    <?php 
                                            }
                                        }
                                    ?>
                                </select>
                            </div>


                            <div class="col-12" style="margin-top:2%;">
                                <input type="submit" class="btn btn-primary px-5" value="Next" name="submit" />
                            </div>
                        </div>
                    </div>




                </div>


            </form>


        </div>
    </div>
</div>


<script src="<?php echo base_url();?>assets_2/js/jquery.min.js"></script>

<script>
$(document).ready(function() {
    $("#ref_code").on('keyup change', function() {
        var search_term = $('#ref_code').val();
        var dataString = 'search_term=' + search_term;
        //alert(dataString);
        $.ajax({
            type: "POST",
            url: "<?php echo base_url();?>Admin_panel/on_keyup_search",
            data: dataString,
            cache: false,
            success: function(html) {
                //$("#pay_amount").val(html);
                $("#first_ancestor").html(html);

            }
        });
    });
});
</script>