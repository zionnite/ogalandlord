        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <h3 class="">Sign Up</h3>
                    <p> Already have an account? <a href="<?php echo base_url();?>Login">Sign in here</a>
                    </p>
                </div>
                <div class="border p-4 rounded">

                    <div class="form-body">
                        <form class="row g-3" method="post" action="<?php echo base_url();?>Register/reg_prom_insert">
                            <div class="col-sm-12">
                                <label for="inputFirstName" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="inputFirstName"
                                    placeholder="e.g: Nosakare Zionnite" name="full_name"
                                    value="<?php echo set_value('full_name'); ?>">
                                <small style="color:red;"><?php echo form_error('full_name');?></small>
                            </div>

                            <div class="col-sm-12">
                                <label for="user_name" class="form-label">User Name</label>
                                <input type="text" class="form-control" id="user_name" placeholder="e.g: zionnite"
                                    name="user_name" value="<?php echo set_value('user_name'); ?>">
                                <small style="color:red;"><?php echo form_error('user_name');?></small>
                            </div>

                            <div class="col-sm-12">
                                <label for="inputFirstPhone" class="form-label">Phone Number</label>
                                <input type="text" class="form-control" id="inputFirstPhone"
                                    placeholder="e.g: 090123456789" name="phone"
                                    value="<?php echo set_value('phone'); ?>">
                                <small style="color:red;"><?php echo form_error('phone');?></small>
                            </div>

                            <div class="col-12">
                                <label for="inputEmailAddress" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="inputEmailAddress"
                                    placeholder="example@email.com" name="email"
                                    value="<?php echo set_value('email'); ?>">
                                <small style="color:red;"><?php echo form_error('email');?></small>
                            </div>
                            <div class="col-12">
                                <label for="inputChoosePassword" class="form-label">Password</label>
                                <div class="input-group" id="show_hide_password">
                                    <input type="password" class="form-control border-end-0" id="inputChoosePassword"
                                        value="<?php echo set_value('pass'); ?>" placeholder="Enter Password"
                                        name="pass">
                                    <a href="javascript:;" class="input-group-text bg-transparent"><i
                                            class='bx bx-hide'></i></a>
                                </div>
                                <small style="color:red;"><?php echo form_error('pass');?></small>
                            </div>

                            <div class="col-12">
                                <label for="inputSelectCountry" class="form-label">What do you want</label>
                                <select class="form-select" id="inputSelectCountry" require name="status">
                                    <option value>Select</option>
                                    <option value="user" selected>I want to Purchase Property</option>
                                </select>
                                <small style="color:red;"><?php echo form_error('status');?></small>
                            </div>

                            <div class="col-12">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" checked disabled type="checkbox"
                                        id="flexSwitchCheckChecked">
                                    <label class="form-check-label" for="flexSwitchCheckChecked">I read and agree to
                                        Terms & Conditions</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-grid">
                                    <input type="hidden" name="url_code" value="<?php echo $url_code;?>">
                                    <input type="hidden" name="props_id" value="<?php echo $props_id;?>">
                                    <input type="submit" class="btn btn-primary" name="submit" value="Sign Up" />
                                    <!-- <small><a href="<?php echo base_url();?>Welcome">Go Back To Home Page</a></small> -->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>