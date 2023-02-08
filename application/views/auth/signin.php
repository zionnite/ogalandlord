<div class="card">
							<div class="card-body">
								<div class="border p-4 rounded">
									<div class="text-center">
										<h3 class="">Sign in</h3>
										<p>Don't have an account yet? <a href="<?php echo base_url();?>Register">Sign up here</a>
										</p>
									</div>
									
									<div class="form-body">
										<form class="row g-3" method="post" action="<?php echo base_url();?>Login/auth">
											<div class="col-12">
												<label for="inputEmailAddress" class="form-label">Email Address / Phone Number</label>
												<input type="text" class="form-control" id="inputEmailAddress" placeholder="Email Address" name="email">
											</div>
											<div class="col-12">
												<label for="inputChoosePassword" class="form-label">Enter Password</label>
												<div class="input-group" id="show_hide_password">
													<input type="password" class="form-control border-end-0" id="inputChoosePassword" value="" placeholder="Enter Password" name="pass"> <a href="javascript:;" class="input-group-text bg-transparent"><i class="bx bx-hide"></i></a>
												</div>
											</div>
											<div class="col-md-6">
												
											</div>
											<div class="col-md-6 text-end">	<a href="<?php echo base_url();?>Login/forget_password">Forgot Password ?</a>
											</div>
											<div class="col-12">
												<div class="d-grid">
													<input type="submit" name="login" class="btn btn-primary" value="Sign In" />
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>