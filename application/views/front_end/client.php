 <?php
$get_client         = $this->Partners_db->get_partners();
if(is_array($get_client)){?>
<div class="bg-white p-top-60 p-bottom-60">
        <div class="container">

            <h2 class="text-bold-700 m-bottom-10 text-center">Clients We’ve Worked With</h2>


            <div class="owl-carousel owl-theme owl-nav-left" data-plugin-options="{'responsive': {'0': {'items': 2}, '479': {'items': 3}, '768': {'items': 4}, '979': {'items': 5}, '1199': {'items': 6}}, 'margin': 30, 'loop': false, 'nav': false, 'dots': true}">
               <?php
                        foreach($get_client as $row){
                            $id             =$row['id'];
                            $image_name     =$row['image_name'];
                        
                ?>
                <div>
                    <a href="javascript:;">
                        <img src="<?php echo base_url();?>project_dir/partners/<?php echo $image_name;?>">
                    </a>
                </div>
                <?php 
                        }
                    
                ?>
               
            </div>

        </div>
    </div>

    <?php 
    }
    ?>