                    <div class="bg-white card-body box-shadow-1 m-bottom-30">
                
                        <form method="post" action="<?php echo base_url();?>sess_property">
                            <div class="row">

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                            <label class="text-bold-700 text-uppercase text-size-13">- Keyword -</label>
                                            <input type="text" name="keyword" class="form-control rounded-0 bg-light-5" placeholder="Enter Keyword Here" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="text-bold-700 text-uppercase text-size-13">- Property Type -</label>
                                        <select name="property_type_id" class="form-control rounded-0 bg-light-5"  required>
                                            <option value="">-- Property Type --</option>
                                            <?php
                                                $get_types_of_props		=$this->Admin_db->get_types_of_property();
                                                if(is_array($get_types_of_props)){
                                                    foreach($get_types_of_props as $row){
                                                        $id		= $row['id'];
                                                        $name	= $row['name'];
                                                        
                                            ?>
                                                        <option value="<?php echo $id;?>"><?php echo $name;?></option>
                                            <?php 
                                                    }
                                                }
                                            ?>
                                            
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="text-bold-700 text-uppercase text-size-13">- Property Purpose -</label>
                                        <select name="property_purpose" class="form-control rounded-0 bg-light-5" required>
                                            <option value="">-- Property Purpose --</option>
                                            <option value="rent">For Rent</option>
                                            <option value="sale">For Sale</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="text-bold-700 text-uppercase text-size-13">- Price -</label>
                                        <div class="row">
                                            <div class="col-6">
                                                <input type="text" name="price_from" class="form-control rounded-0 bg-light-5" placeholder="Price from" required>
                                            </div>
                                            <div class="col-6">
                                                <input type="text" name="price_to" class="form-control rounded-0 bg-light-5" placeholder="Price to" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                


                            <div class="row m-top-10">
                                <div class="col-md-12">
                                    <input type="submit" name="submit" class="btn btn-base rounded-0 text-bold-600 text-spacing-5 text-uppercase text-size-13 p-top-12 p-bottom-12 p-left-20 p-right-20" value="Search" />
                                </div>
                            </div>

                        </form>

                    </div>