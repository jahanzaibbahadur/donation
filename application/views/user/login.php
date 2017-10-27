	<div id="message-box"></div>		
	<div class="panel panel-login">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-6">
						<a href="<?php echo base_url(); ?>login" class="active">Login</a>
					</div>
					<div class="col-xs-6">
						<a href="<?php echo base_url(); ?>register" >Register</a>
					</div>
				</div>	
							<hr>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-12">
						<form class="form-horizontal login-form" action="<?php echo base_url(); ?>login" method="post" style="display: block;">
							<div class="form-group">
								<div class="col-xs-12">
									<input type="tel" name="phone_num" id="phone1" tabindex="2" class="form-control phone" placeholder="Mobile xxx-xxx-xxxx">
								</div>
							</div>
							<div class="form-group text-center" >
								<div class="row">
									<div class="col-lg-4 col-md-4"><label class="visible-md visible-lg"><h4>Enter Security PIN</h4></label><label class="visible-sm visible-xs">Enter Security PIN</label></div>
									<div class="col-lg-4 col-md-4"><input type="text" id="pincode-input5" name="password"></div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-sm-6 col-sm-offset-3">
										<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
									</div>
								</div>
							</div>
						</form>
						
					</div>
				</div>
			</div>
	</div>
		<script>
$(document).ready(function() {
    var phone1 = $('#phone1');
    phone1.keyup(function() { 
      if (phone1.val().charAt(0) == 0) {
        phone1.unmask();
      } else if (phone1.val().charAt(0) == 1) { 
        phone1.mask('1-000-000-0000');
      } else {
        phone1.mask('000-000-0000');
      }
    });
	var phone2 = $('#phone2');
    phone2.keyup(function() { 
      if (phone2.val().charAt(0) == 0) {
        phone2.unmask();
      } else if (phone2.val().charAt(0) == 1) { 
        phone2.mask('1-000-000-0000');
      } else {
        phone2.mask('000-000-0000');
      }
    });

	$('#pincode-input5').pincodeInput({hidedigits:false,inputs:4,placeholders:"0 0 0 0",change: function(input,value,inputnumber){
            	$("#pincode-callback2").html("onchange from input number "+inputnumber+", current value: " + value);
            }});
			
});
</script>
<!-- end card-box-->