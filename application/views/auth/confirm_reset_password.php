<div class="card">
							<div class="card-body">
								<div class="border p-4 rounded">
									<div class="text-center">
										<h3 class="">Confirm Password Reset</h3>
										
									</div>
									
									<div class="form-body">
										<form class="row g-3" method="post" action="<?php echo base_url();?>Login/confirm_reset_password2">
											<div class="col-12">
												<label for="inputEmailAddress" class="form-label">Password </label>
												<input type="text" class="form-control" id="inputEmailAddress" placeholder="" name="pass">
											</div>
											
											<div class="col-12">
												<label for="inputEmailAddress" class="form-label">Confirm Password </label>
												<input type="text" class="form-control" id="inputEmailAddress" placeholder="" name="repass">
											</div>
											
                                            
											<div class="col-12">
												<div class="d-grid">
													<input type="hidden" name="user_id" class="btn btn-primary" value="<?php echo $user_id;?>" />
													<input type="submit" name="login" class="btn btn-primary" value="Update Password" />
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>