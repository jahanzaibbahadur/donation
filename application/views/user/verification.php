	<div id="message-box"></div>
<?php echo $this->session->userdata('verify');?>	
	<div class="panel panel-login">
			<div class="panel-heading">
				<div class="row">
							<div class="col-xs-6">
								<a href="#" class="active" >Verification code</a>
							</div>
						</div>	
							<hr>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="form-group">
						<div class="col-xs-12">
							<p>A verification code has been sent to your phone # <?php echo $this->session->userdata('register_num');?> </p>
						</div>
						<div class="col-xs-5">			
							<a href="verification_code.php"class="recive">Didn't recive a code?</a>
						</div>
					</div>	
				</div>
				<div class="row">
					<div class="col-lg-12">
						<form class="verification-form" action="<?php echo base_url(); ?>verification" method="post" role="form" style="display: block;">
							<div class="form-group">
								<input type="tel" name="verification_code" id="username" tabindex="1" class="form-control" placeholder="Verification code">		
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-sm-6 ">
										<input type="submit" name="verify-submit" id="login" tabindex="4" class="form-control btn btn-verify" value="Verify me" >
									</div>
									<div class="col-sm-6 ">
									<a href="<?php echo base_url(); ?>cancel" class="btn btn-cancel form-control" role="button">Cancel</a>
										<!--<input type="button" name="cancel-submit" id="login-submit" tabindex="4" class="form-control btn btn-cancel" value="Cancel">
									-->
									</div>
								</div>
							</div>		
						</form>								
					</div>
				</div>
			</div>
	</div>

<!-- end card-box-->