<?php

    $public_key        =$this->Action->get_public_live_key();
    $private_key       =$this->Action->get_private_live_key();
    //$full_name         =str_replace(" ","_",$full_name);
    $token  =time();
	$site_name      =$this->Action->get_site_name();
	

?>


<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Add Fund</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Wallet</li>
							</ol>
						</nav>
					</div>
					
				</div>
				<!--end breadcrumb-->
				<div class="row">
					<div class="col-xl-12 mx-auto">
						<h6 class="mb-0 text-uppercase">Wallet</h6>
						<hr>
						<?php echo isset($alert)?$alert:NULL;?>
						<div class="card border-top border-0 border-4 border-primary">
							<div class="card-body p-5">
								<div class="card-title d-flex align-items-center">
									<div><i class="me-1 font-22 text-primary"></i>
									</div>
									<h5 class="mb-0 text-primary">Fund Wallet</h5>
								</div>
								<hr>
								<form class="row g-3" id="paymentForm">
									<?php 
										$dis_isbank_verify 	= $this->Users_db->isBankVerify($user_id);
										if($dis_isbank_verify){
									?>
									<div class="col-md-12">
										<label for="title" class="form-label">Select Connection To Fund</label>
										<select class="form-control" id="title" name="title">
                                            <option value=""></option>
                                            <?php 
                                                $get_con        =$this->Connection_db->get_connection_by_user_id_2($user_id);
                                                if(is_array($get_con)){
                                                    foreach($get_con as $row){
                                                        $id                 	=$row['id'];
                                                        $dis_user_id            =$row['user_id'];
                                                        $agent_id           	=$row['agent_id'];
                                                        $time               	=$row['time'];
                                                        $date               	=$row['date_created'];
                                                        $props_id           	=$row['prop_id'];
                                                        $props_name             = $this->Admin_db->get_props_name_by_id($props_id);
                                                        
                                                        
                                                ?>
                                                        <option value="<?php echo $props_id;?>"><?php echo $props_name;?></option>

                                            <?php 
                                                    } 
                                                }
                                            ?>
                                        </select>
									</div>

									
									<div class="col-md-12" id="amount_wrapper">
										<label for="pay_amount" class="form-label">Amount to Pay</label>
									</div>


									<input type="hidden" id="email-address" required value="<?php echo $email;?>" />
									
									<input type="hidden" id="first-name" value="<?php echo $full_name;?>" />
									<input type="hidden" id="last-name" value="<?php echo $user_name;?>" />

									<a href="javascript:;" class="btn btn-danger btn-block  px-5" id="makePayment">Pay</a>
									<?php }else{?>
										<div style="margin:0.2%;"><?php echo $this->Admin_db->alert_callbark('info','Your Bank Account is not yet verify!<br />You cannot make send money or recieve money unless your bank account is verify ');?></div>
											<a href="<?php echo base_url();?>Profile/view_user/<?php echo $user_id;?>" id="verify" class="card-link"> Go to Profile and Verify your bank account detail</a>
									<?php }?>
								</form>
							</div>
						</div>
						
					</div>
				</div>
				
			</div>
		</div>


<script src="<?php echo base_url();?>assets_2/js/jquery.min.js"></script>
<script src="https://js.paystack.co/v1/inline.js"></script> 
<script>
													
		$('#makePayment').click(function(e){
			e.preventDefault();
																									
			var reference = '<?php echo $token;?>';
		    var customerName = '<?php echo $full_name;?>';
			var site_name = '<?php echo $site_name;?>';
			var pay_phone = <?php echo $phone_no;?>;
			var Pay_Amount = $('#amount').val();
		    var payemail = '<?php echo $email;?>'; 
            //
			var user_id 	='<?php echo $user_id;?>';
            var props_id    =$('#props_id').val();
            var agent_id    =$('#agent_id').val();;
			var handler = PaystackPop.setup({
				key: '<?php echo $public_key;?>',
				email: payemail,
				amount: Pay_Amount * 100,
				currency: 'NGN', 
				ref: reference,
				metadata: {
					
                    "user_id": user_id,
                    "props_id" : props_id,
                    "agent_id" : agent_id,
                    "trans_type": "deposit",
																	
				},
				async: false,
				callback: function(response) {
					var reference = response.reference;
					// alert('Payment complete! Reference: ' + reference);
					window.location = "<?php echo base_url();?>Transaction/verify_payment/" + response.reference;
				},
				onClose: function() {
					alert('transaction cancelled');
					return false;
				}
			});
			handler.openIframe();
													
		});
		
</script>


<script>
	$(document).ready(function () {
		$("#title").change(function () {
			var props_id = $('#title').val();
			var dataString = 'props_id=' + props_id;
			//alert(dataString);
			$.ajax({
				type: "POST",
				url: "<?php echo base_url();?>Transaction/get_props_amount_by_id",
				data: dataString,
				cache: false,
				success: function (html) {
					//$("#pay_amount").val(html);
					$("#amount_wrapper").html(html);

				}
			});
		});
	});

</script>
