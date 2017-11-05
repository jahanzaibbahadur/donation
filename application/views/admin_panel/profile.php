<style>
.form-control[readonly] {
	background-color: #fff;
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
			<h4 class="m-t-0 header-title"><b>Change Password</b></h4>
			<p class="text-muted font-14 m-b-30"></p>
			<div class="row">
				<div class="col-md-6">
					<?php message_box(); ?>
					<form id="payment-method-form" method="POST" action="">
						<input type="password" class="form-control" placeholder="Old Password" name='current_password'/><br>
						<input type="password" class="form-control" placeholder="New Password" name='new_password'/><br>
						<input type="password" class="form-control" placeholder="Confirm Password" name='confirm_password'/><br>
						<input type="submit" value="Change Password" class="btn btn-primary" />
						<input type="hidden" name="action" value="change_password">
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
	/*$('#edit-btn').click(function(){
		var btn = $(this).text();
		console.log(btn);
		if(btn === 'Edit') {
			$(this).text('Save');
			$(this).removeClass('btn-primary').addClass('btn-success');
			$('#payment-method-form').find('input:not(:first)').attr('readonly', false);
		}else{
			$(this).text('Edit');
			$(this).removeClass('btn-success').addClass('btn-primary');
			
			var data = $('#payment-method-form').serialize();
			
			$.post('', data, function(res){
				if(res.status == 'success') {
					notify('Update', 'Data Updated Successfully', 'success');
				}
				$('#payment-method-form').find('input:not(:first)').attr('readonly', true);
			}, 'json');
		}
		
	});*/
}, false);
</script>