<html lang="en">
  <head> 
    <meta charset="utf-8">
	
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <title>Donation</title>
    <link rel="stylesheet" href="assets1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets1/css/login.css">
	<script src="assets1/js/jquery-2.1.4.min.js"></script>
	<link href="assets1/css/bootstrap-pincode-input.css" rel="stylesheet">
  </head>
    <body>
	   <section>
			<div class="container">					 
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<div class="form-group">
						<?php $this->load->view($content); ?>
						</div>
					</div>
				</div>
			</div>
		</section>
		<script>
				var resizefunc = [];
		</script>
		<script src="assets/js/jquery.min.js"></script>
		  <script src="<?php echo 'mobile_assets/mobile.js'; ?>" type="text/javascript"></script>
		  <script src="assets/js/bootstrap.min.js"></script>
		  <script type="text/javascript" src="assets1/js/bootstrap-pincode-input.js"></script>
		  <script src="assets1/js/validator.min.js"></script> 
		  <script src="assets1/js/ajax-utils.js"></script> 
		  <script src="assets1/js/login.js"></script>
		<script src="<?php echo base_url(); ?>assets/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
			<script src="<?php echo base_url(); ?>assets1/login.js?v=0.1" type="text/javascript"></script>
		
			<!-- END PAGE LEVEL JS-->
			<script>
				var token_name = '<?php echo $this->security->get_csrf_token_name(); ?>';
				var token = '<?php echo $this->security->get_csrf_hash(); ?>';
				var base_url = '<?php echo base_url(); ?>';
			</script>
			<script>
	</body>
</html>