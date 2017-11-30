<style>
.form-control[readonly], .form-control[disabled] {
	background-color: #fff !important;
}
#settings-form input[type=text], #settings-form select  {
	width: 550px !important;
}
textarea {
    resize: none;
	width: 550px !important;
}
.status {
	padding-top: 7px;
}
</style>
<div class="row">
	<div class="col-xs-12">
		<div class="page-title-box">
			<h4 class="page-title">Datatables</h4>
			<ol class="breadcrumb p-0 m-0">
				<li>
					<a href="#">Adminox</a>
				</li>
				<li>
					<a href="#">Tables</a>
				</li>
				<li class="active">
					Datatables
				</li>
			</ol>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!-- end row -->

<div class="row">
	<div class="col-md-12">
		<div class="card-box table-responsive">
			<h4 class="m-t-0 header-title"><b>SEND MASS TEXT MESSAGE</b></h4>
			<p class="text-muted font-14 m-b-30"></p>
			<div class="row">
				<div class="col-md-12">
					<div class="better-voice-form">
						<form method="post" class="form-horizontal">
							<div class="form-group">
								<label for="origin" class="col-sm-2 control-label">Origin</label>
								<div class="col-sm-6">
									<select name="group" class="form-control" required>
										<option selected disabled="disabled" value="">Select Group</option>
										<option value="0">Donated</option>
										<option value="1">Not Donated</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="origin" class="col-sm-2 control-label">Message</label>
								<div class="col-sm-6">
									<textarea name="message" required class="form-control" rows="5"></textarea>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-2">
									<button type="submit" class="btn btn-default">Send Messages</button>
								</div>
								<div class="col-sm-4 status"></div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
	$('form').submit(function(e){
		e.preventDefault();
		var data = $(this).serialize();
		$('form').find('[name=message]').prop('disabled', true);
		$('form').find('[type=submit]').prop('disabled', true);
		$('form').find('.status').html('Please wait sending messages is in progress <i class="fa fa-spinner fa-pulse fa-1x fa-fw"></i>');
		$.post('<?php echo base_url(); ?>admin/message/send', data, function(res) {
			console.log(res);
			$('form')[0].reset();
			$('form').find('[name=message]').prop('disabled', false);
			$('form').find('[type=submit]').prop('disabled', false);
			$('form').find('.status').html(res.message);
		}, 'json');
	});
}, false);
</script>