<div class="card">
							<div class="card-body">
								<div class="border p-4 rounded">
									<div class="text-center">
										<h3 class="">Forget Password</h3>
										<p>Remembered your password? <a href="<?php echo base_url();?>Login">Login Here</a>
										</p>
									</div>
									
									<div class="form-body">
										<form class="row g-3" method="post" action="<?php echo base_url();?>Login/forget_password2">
											<div class="col-12">
												<label for="inputEmailAddress" class="form-label">Email Address </label>
												<input type="text" class="form-control" id="inputEmailAddress" placeholder="Email Address" name="email">
											</div>
											
                                            
											<div class="col-12">
												<div class="d-grid">
													<input type="submit" name="login" class="btn btn-primary" value="Reset Password" />
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>