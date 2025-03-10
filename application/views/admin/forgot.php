<div class="col-md-4 offset-md-4 col-xs-10 offset-xs-1 box-shadow-2 p-0">
	<div class="card border-grey border-lighten-3 px-2 py-2 m-0">
		<div class="card-header no-border pb-0">
			<div class="card-title text-xs-center">
				<img src="../../../app-assets/images/logo/stack-logo-dark.png" alt="branding logo">
			</div>
			<h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2"><span>We will send you a link to reset password.</span></h6>
		</div>
		<div class="card-body collapse in">
			<div class="card-block">
				<form class="form-horizontal" action="login-simple.html" novalidate>
					<fieldset class="form-group position-relative has-icon-left">
						<input type="email" class="form-control form-control-lg input-lg" id="user-email" placeholder="Your Email Address" required>
						<div class="form-control-position">
							<i class="ft-mail"></i>
						</div>
					</fieldset>
					<button type="submit" class="btn btn-outline-primary btn-lg btn-block"><i class="ft-unlock"></i> Recover Password</button>
				</form>
			</div>
		</div>
		<div class="card-footer no-border">
			<p class="float-sm-left text-xs-center"><a href="<?php echo base_url(); ?>login" class="card-link">Login</a></p>
			<p class="float-sm-right text-xs-center">New to Stack ? <a href="<?php echo base_url(); ?>register" class="card-link">Create Account</a></p>
		</div>
	</div>
</div>