<style>
.form-control[readonly] {
	background-color: #fff;
}
#settings-form input[type=text] {
	width: 550px !important;
}
textarea {
    resize: none;
	width: 550px !important;
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
			<h4 class="m-t-0 header-title"><b>User</b></h4>
			<p class="text-muted font-14 m-b-30"></p>
			<div class="row">
				<div class="col-md-12">
					<form id="settings-form">
						<table class="table table-condensed m-0">
							<tr><th>ID</th><td><input type="text" class="form-control input-sm" name="id" value="<?php echo $settings->id; ?>" readonly></td></tr>
							<tr><th>Sender Number</th><td><input type="text" class="form-control input-sm" name="sender_number" value="<?php echo $settings->sender_number; ?>" readonly></td></tr>
							<tr><th>SMS URL</th><td><input type="text" class="form-control input-sm" name="SMS_url" value="<?php echo $settings->SMS_url; ?>" readonly></td></tr>
							<tr><th>SMS User</th><td><input type="text" class="form-control input-sm" name="SMS_user" value="<?php echo $settings->SMS_user; ?>" readonly></td></tr>
							<tr><th>SMS Password</th><td><input type="text" class="form-control input-sm" name="SMS_password" value="<?php echo $settings->SMS_password; ?>" readonly></td></tr>
							<tr><th>Authorize.Net Login ID</th><td><input type="text" class="form-control input-sm" name="MERCHANT_LOGIN_ID" value="<?php echo $settings->MERCHANT_LOGIN_ID; ?>" readonly></td></tr>
							<tr><th>Authorize.Net Transaction Key</th><td><input type="text" class="form-control input-sm" name="MERCHANT_TRANSACTION_KEY" value="<?php echo $settings->MERCHANT_TRANSACTION_KEY; ?>" readonly></td></tr>
							<tr><th>Company Name</th><td><input type="text" class="form-control input-sm" name="comp_name" value="<?php echo $settings->comp_name; ?>" readonly></td></tr>
							<tr><th>Company Address</th><td><textarea class="form-control input-sm" name="comp_address" readonly><?php echo $settings->comp_address; ?></textarea></td></tr>
							<tr><th>Company Phone</th><td><input type="text" class="form-control input-sm" name="comp_phone" value="<?php echo $settings->comp_phone; ?>" readonly></td></tr>
						</table>
						<button type="button" class="btn btn-primary" id="edit-btn">Edit</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
	$('#edit-btn').click(function(){
		var btn = $(this).text();
		console.log(btn);
		if(btn === 'Edit') {
			$(this).text('Save');
			$(this).removeClass('btn-primary').addClass('btn-success');
			$('#settings-form').find('input:not(:first), textarea').attr('readonly', false);
		}else{
			$(this).text('Edit');
			$(this).removeClass('btn-success').addClass('btn-primary');
			
			var data = $('#settings-form').serialize();
			
			$.post('', data, function(res){
				if(res.status == 'success') {
					notify('Update', 'Data Updated Successfully', 'success');
				}
				$('#settings-form').find('input:not(:first), textarea').attr('readonly', true);
			}, 'json');
		}
		
	});
}, false);
</script>