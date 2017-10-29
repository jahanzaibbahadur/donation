<div class="col-md-4 offset-md-4 col-xs-10 offset-xs-1 box-shadow-3 p-0">
	<div class="card border-grey border-lighten-3 px-1 py-1 m-0">
		<div class="card-header no-border">
			<div class="card-title text-xs-center">
				<img src="<?php echo base_url(); ?>/app-assets/images/logo/stack-logo-dark.png" alt="branding logo">
			</div>
		</div>
		<div class="card-body collapse in">
			<div class="card-block">
				<div id="message-box"></div>
				<form class="form-horizontal login-form" method="post">
					<div class="alert alert-danger display-hide">
						<button class="close" data-close="alert"></button>
						<span> Enter your username and password. </span>
					</div>
					<fieldset class="form-group position-relative has-icon-left">
						<input type="text" class="form-control" id="user-name" name="username" placeholder="Your Username">
						<div class="form-control-position">
							<i class="ft-user"></i>
						</div>
					</fieldset>
					<fieldset class="form-group position-relative has-icon-left">
						<input type="password" class="form-control" id="user-password" name="password" placeholder="Enter Password">
						<div class="form-control-position">
							<i class="fa fa-key"></i>
						</div>
					</fieldset>	
					<fieldset class="form-group position-relative has-icon-left">
						<div id="captcha"><?php if($invalid_attempts) echo $captcha; ?></div>
					</fieldset>
					<fieldset class="form-group position-relative has-icon-left">
						<input type="text" class="form-control" name="captcha" placeholder="Enter Captcha">
						<div class="form-control-position">
							<i class="fa fa-key"></i>
						</div>
					</fieldset>	
					<fieldset class="form-group row">
						<div class="col-md-6 col-xs-12 text-xs-center text-sm-left">
							<fieldset>
								<input type="checkbox" id="remember-me" name="remember" class="chk-remember">
								<label for="remember-me"> Remember Me</label>
							</fieldset>
						</div>
						<div class="col-md-6 col-xs-12 float-sm-left text-xs-center text-sm-right"><a href="<?php echo base_url(); ?>forgot" class="card-link">Forgot Password?</a></div>
					</fieldset>
					<button type="submit" class="btn btn-outline-primary btn-block"><i class="ft-unlock"></i> Login</button>
				</form>
			</div>
			<p class="card-subtitle line-on-side text-muted text-xs-center font-small-3 mx-2 my-1"><span>New to Strongtools ?</span></p>
			<div class="card-block">
				<a href="<?php echo base_url(); ?>register" class="btn btn-outline-danger btn-block"><i class="ft-user"></i> Register</a>
			</div>
		</div>
	</div>
</div>