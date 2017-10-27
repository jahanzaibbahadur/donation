	<div id="message-box"></div>		
	<div class="panel panel-login">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-6">
						<a href="#" class="active" id="register-form-link">Security PIN needed!</a>
					</div>
				</div>	
				<hr>
			</div>
			<div class="panel-body">
				<div class="row">
							<div class="col-lg-12">
								<form class="security_pin-form" action="<?php echo base_url(); ?>security_pin" method="post" role="form" data-toggle="validator">		
									<!--<div class="form-group">
										<input type="password" name="reg_password" id="password1" tabindex="2" class="form-control" placeholder="PIN(****)" required>
									</div>
									<div class="form-group">
										<input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm PIN"
										data-match="#password1" data-match-error="Password don't match" required>
										<div class="help-block with-errors"></div>
									</div>
									-->
									<div class="form-group text-center" >
									<div class="row">
										<div class="col-lg-4 col-md-4"><label class="visible-md visible-lg"><h4>Enter Security PIN</h4></label><label class="visible-sm visible-xs">Enter Security PIN</label></div>
										<div class="col-lg-4 col-md-4"><input type="number" id="pincode-input4" name="password"></div>
										<div class="col-lg-4 col-md-4"></div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
			</div>
	</div>

<!-- end card-box-->
		<script>
$(document).ready(function() {
	$('#pincode-input4').pincodeInput({hidedigits:false,inputs:4,placeholders:"0 0 0 0",change: function(input,value,inputnumber){
            	$("#pincode-callback2").html("onchange from input number "+inputnumber+", current value: " + value);
            }});
			
});
</script>