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
			<h4 class="m-t-0 header-title"><b>User</b></h4>
			<p class="text-muted font-14 m-b-30"></p>
			<div class="row">
				<div class="col-md-6">
					<form id="payment-method-form">
						<table class="table table-condensed m-0">
							<tr><th>ID</th><td><input type="text" class="form-control input-sm" name="id" value="<?php echo $method->id; ?>" readonly></td></tr>
							<tr><th>Name</th><td><input type="text" class="form-control input-sm" name="name" value="<?php echo $method->name; ?>" readonly></td></tr>
							<tr><th>Username</th><td><input type="text" class="form-control input-sm" name="username" value="<?php echo $method->username; ?>" readonly></td></tr>
							<tr><th>Username 2</th><td><input type="text" class="form-control input-sm" name="username2" value="<?php echo $method->username2; ?>" readonly></td></tr>
							<tr><th>Secret</th><td><input type="text" class="form-control input-sm" name="secret" value="<?php echo $method->secret; ?>" readonly></td></tr>
							<tr><th>Minimum Deposit</th><td><input type="text" class="form-control input-sm" name="mindeposit" value="<?php echo $method->mindeposit; ?>" readonly></td></tr>
							<tr><th>Minimum Withdraw</th><td><input type="text" class="form-control input-sm" name="minwithdraw" value="<?php echo $method->minwithdraw; ?>" readonly></td></tr>
							<tr><th>Maximum Deposit</th><td><input type="text" class="form-control input-sm" name="maxdeposit" value="<?php echo $method->maxdeposit; ?>" readonly></td></tr>
							<tr><th>Maximum Withdraw</th><td><input type="text" class="form-control input-sm" name="maxwithdraw" value="<?php echo $method->maxwithdraw; ?>" readonly></td></tr>
							<tr><th>Withdraw</th><td><input type="text" class="form-control input-sm" name="withdraw" value="<?php echo $method->withdraw; ?>" readonly></td></tr>
							<tr><th>Deposit</th><td><input type="text" class="form-control input-sm" name="deposit" value="<?php echo $method->deposit; ?>" readonly></td></tr>
							<tr><th>Deposit Fee</th><td><input type="text" class="form-control input-sm" name="dfee" value="<?php echo $method->dfee; ?>" readonly></td></tr>
							<tr><th>Withdraw Fee</th><td><input type="text" class="form-control input-sm" name="wfee" value="<?php echo $method->wfee; ?>" readonly></td></tr>
							<tr><th>Display Name</th><td><input type="text" class="form-control input-sm" name="dname" value="<?php echo $method->dname; ?>" readonly></td></tr>
							<tr><th>Image</th><td><img src="<?php echo $method->img; ?>" /></td></tr>
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
		
	});
}, false);
</script>