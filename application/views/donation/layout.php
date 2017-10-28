<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
		<link href="assets/mobile.css" media="screen" rel="stylesheet" type="text/css">
		<script src="assets/mobile.js" type="text/javascript"></script>
		
		<style>
		.form-control:focus {
			border-color: #66afe9 !important;
			background: transparent !important;
			outline: 0 !important;
			-webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,0.075),0 0 8px rgba(102,175,233,0.6) !important;
			box-shadow: inset 0 1px 1px rgba(0,0,0,0.075),0 0 8px rgba(102,175,233,0.6) !important;
		}

		.form-control {
			display: block!important;
			width: 100% !important;
			height: 34px !important;
			padding: 6px 12px !important;
			font-size: 14px !important;
			line-height: 1.428571429 !important;
			color: #555 !important;
			background-color: #fff !important;
			background-image: none !important;
			border: 1px solid #ccc !important;
			border-radius: 4px !important;
			-webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,0.075) !important;
			box-shadow: inset 0 1px 1px rgba(0,0,0,0.075) !important;
			-webkit-transition: border-color ease-in-out 0.15s,box-shadow ease-in-out 0.15s !important;
			transition: border-color ease-in-out 0.15s,box-shadow ease-in-out 0.15s !important;
		}

		body {
			background-size: cover !important; background-attachment: fixed !important; background-repeat: no-repeat !important;
		}

		.new_look_select_color_text{
			color: #0088CC !important;
		}

		body.page #theme-page .theme-page-wrapper .theme-content.no-padding{padding-top:0px!important;}

		.btn-donation {
			background-color: #0088CC !important;
			border-color: #0088CC !important;
			color: white !important;
		}

		[data-pointer-submit="true"]:before {
			background-color: #0088CC !important;
		}

		.donation-form-styling {
			background-color: #FFFFFF !important;
		}

		.modal.bootbox {
			margin: 3rem auto;
			max-height: 420rem;
			width: 75%;
			max-width: 60rem;
			overflow-y: auto;
		}

		.donation-form-bg {
			max-width: 50rem;
			margin: 0 auto;
			border-radius: 4px;
			background-color: white;
			box-sizing: border-box;
			-moz-box-sizing: border-box;
			position: relative;
			min-height: 100vh;
			padding-bottom: 10rem;
		}

		@media (min-width: 481px) {

			.donation-form-styling {
				width: 90%;
				margin: 3% 5%;
			}

			.donation-form-bg {
				box-sizing: border-box;
				-moz-box-sizing: border-box;
				background-color: white;
				border-radius: 8px;
				min-height: calc(100vh - 6rem);
			}
		}


		@media (max-width: 767px) {
			.section_wrapper, .container {
				max-width: 90% !important;
			}
		}

		@media (max-width: 480px) {
			.donation-form-styling {
				width: 100%;
			}
			.donation-form-bg {
				background-color: white;
				border-radius: 0;
				box-sizing: border-box;
				-moz-box-sizing: border-box;
			}

			.section_wrapper, .container {
				max-width: 100% !important;
			}

			.modal.bootbox {
				width: 90%;
			}
		}

		@media (max-width: 340px) {
			.new_look_logo_box {
				width: inherit !important;
				display:none;
			}
		}

		.new_look_logo_row {

		}

		.new_look_logo_box {
			height: 100px;
			width: 100%;
			/*line-height: 100px;*/
			margin: 0 auto;
			font-size: 1.3em;
			font-weight: 900;
			text-align: center;
			background-color: #EEE;border: 4px solid white;outline: 1px solid #EEE;color: #BBBBBB;
			background-repeat: no-repeat;
			background-size: contain;
			background-position: center;
		}
		
		a, a:visited, a:active {
			text-decoration: none;
			border-bottom: 1px blue dotted;
		}

		a:hover {
			text-decoration: underline;
			border: none;
		}

		.which-cards{
			height: 34px;
			float: right;
		}
		</style>
	</head>
	
	<body>
		<div class="donation-form-bg container">
			<div class="row">
				<div class="col-xs-12">
					<div id="donate">
					<?php $this->load->view($content); ?>
					</div>
				</div>
			</div>
		</div>
		<script>var resizefunc = [];</script>
		
		<!--
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/validator.min.js"></script> 
		<script src="assets/js/ajax-utils.js"></script> -->
		<!--
		<script src="<?php echo base_url(); ?>assets/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>assets1/donation.js?v=0.1" type="text/javascript"></script>

		<!-- END PAGE LEVEL JS-->
		<script>
			var token_name = '<?php echo $this->security->get_csrf_token_name(); ?>';
			var token = '<?php echo $this->security->get_csrf_hash(); ?>';
			var base_url = '<?php echo base_url(); ?>';
		</script>
	</body>
</html>