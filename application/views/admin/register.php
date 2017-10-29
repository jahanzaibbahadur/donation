<div class="col-md-4 offset-md-4 col-xs-10 offset-xs-1 box-shadow-2 p-0">
	<div class="card border-grey border-lighten-3 px-1 py-1 m-0">
		<div class="card-header no-border">
			<div class="card-title text-xs-center">
				<img src="<?php echo base_url(); ?>app-assets/images/logo/stack-logo-dark.png" alt="branding logo">
			</div>
		</div>
		<div class="card-body collapse in">
			<div class="card-block">
				<form class="form-horizontal register-form">
					<fieldset class="form-group position-relative has-icon-left">
						<input type="text" class="form-control" id="user-name" name="username" placeholder="User Name">
						<div class="form-control-position">
							<i class="ft-user"></i>
						</div>
					</fieldset>
					<fieldset class="form-group position-relative has-icon-left">
						<input type="email" class="form-control" id="user-email" name="email" placeholder="Your Email Address" required>
						<div class="form-control-position">
							<i class="ft-mail"></i>
						</div>
					</fieldset>
					<fieldset class="form-group position-relative has-icon-left">
						<input type="password" class="form-control" id="user-password" name="password" placeholder="Enter Password" required>
						<div class="form-control-position">
							<i class="fa fa-key"></i>
						</div>
					</fieldset>
					<fieldset class="form-group position-relative has-icon-left">
						<input type="password" class="form-control" id="user-cpassword" name="cpassword" placeholder="Re Enter Password" required>
						<div class="form-control-position">
							<i class="fa fa-key"></i>
						</div>
					</fieldset>
					<fieldset class="form-group row">
						<div class="col-md-6 col-xs-12 text-xs-center text-sm-left">
							<fieldset>
								<input type="checkbox" id="agreement" name="agreement" class="chk-remember">
								<label for="agreement"> Remember Me</label>
							</fieldset>
						</div>
						<div class="col-md-6 col-xs-12 float-sm-left text-xs-center text-sm-right"><a href="<?php echo base_url(); ?>forgot" class="card-link">Forgot Password?</a></div>
					</fieldset>
					<button type="submit" class="btn btn-outline-primary btn-block"><i class="ft-user"></i> Register</button>
				</form>
			</div>
			<div class="card-block">
				<a href="<?php echo base_url(); ?>login" class="btn btn-outline-danger btn-block"><i class="ft-unlock"></i> Login</a>
			</div>
		</div>
	</div>
</div>