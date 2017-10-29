<style>
.form-control[readonly], .form-control[disabled] {
	background-color: #fff;
}
textarea {
    resize: none;
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
	<div class="col-sm-12">
		<div class="card-box table-responsive">
			<h4 class="m-t-0 header-title"><b>User</b></h4>
			<p class="text-muted font-14 m-b-30"></p>
			<div class="row">
				<div class="col-md-6">
					<form id="user-form">
						<table class="table table-condensed m-0">
							<tr><th>ID</th><td><input type="text" class="form-control input-sm" name="id" value="<?php echo $user->id; ?>" readonly></td></tr>
							<tr><th>Username</th><td><input type="text" class="form-control input-sm" name="username" value="<?php echo $user->username; ?>" readonly></td></tr>
							<tr><th>Email</th><td><input type="text" class="form-control input-sm" name="email" value="<?php echo $user->email; ?>" readonly></td></tr>
							<tr><th>Password</th><td><input type="text" class="form-control input-sm" name="password" value="<?php echo $user->password; ?>" readonly></td></tr>
							<tr><th>First Name</th><td><input type="text" class="form-control input-sm" name="fname" value="<?php echo $user->fname; ?>" readonly></td></tr>
							<tr><th>Last Name</th><td><input type="text" class="form-control input-sm" name="lname" value="<?php echo $user->lname; ?>" readonly></td></tr>
							<tr><th>Phone No</th><td><input type="text" class="form-control input-sm" name="phone" value="<?php echo $user->phone; ?>" readonly></td></tr>
							<tr><th>Country</th><td><input type="text" class="form-control input-sm" name="country" value="<?php echo $user->country; ?>" readonly></td></tr>
							<tr><th>State</th><td><input type="text" class="form-control input-sm" name="state" value="<?php echo $user->state; ?>" readonly></td></tr>
							<tr><th>City</th><td><input type="text" class="form-control input-sm" name="city" value="<?php echo $user->city; ?>" readonly></td></tr>
							<tr><th>Address 1</th><td><input type="text" class="form-control input-sm" name="st1" value="<?php echo $user->st1; ?>" readonly></td></tr>
							<tr><th>Address 2</th><td><input type="text" class="form-control input-sm" name="st2" value="<?php echo $user->st2; ?>" readonly></td></tr>
							<tr><th>Online</th><td><input type="text" class="form-control input-sm" name="online" value="<?php echo (new DateTime("@$user->online"))->format('Y-m-d H:i:s'); ?>" readonly></td></tr>
							<tr><th>IP</th><td><input type="text" class="form-control input-sm" name="ip" value="<?php echo $user->ip; ?>" readonly></td></tr>
							<tr><th>Agent</th><td><textarea class="form-control input-sm" name="agent" readonly><?php echo $user->agent; ?></textarea></td></tr>
							<tr><th>Reg Date</th><td><input type="text" class="form-control input-sm" name="sdate" value="<?php echo $user->sdate; ?>" readonly></td></tr>
							<tr><th>ID Card</th><td><input type="text" class="form-control input-sm" name="id_card" value="<?php echo $user->id_card; ?>" readonly></td></tr>
							<tr><th>Passport</th><td><input type="text" class="form-control input-sm" name="passport" value="<?php echo $user->passport; ?>" readonly></td></tr>
							<tr><th>Image</th><td><input type="text" class="form-control input-sm" name="img" value="<?php echo $user->img; ?>" readonly></td></tr>
							<tr><th>Optimized Image</th><td><input type="text" class="form-control input-sm" name="opt_img" value="<?php echo $user->opt_img; ?>" readonly></td></tr>
							<tr><th>Driving License</th><td><input type="text" class="form-control input-sm" name="driving" value="<?php echo $user->driving; ?>" readonly></td></tr>
							<tr><th>Utility Bill</th><td><input type="text" class="form-control input-sm" name="utility_bill" value="<?php echo $user->utility_bill; ?>" readonly></td></tr>
							<tr><th>Status</th><td>
							<select class="form-control input-sm" name="status" disabled>
								<option value="1" <?php if($user->status) echo "selected"; ?>>Active</option>
								<option value="0" <?php if(!$user->status) echo "selected"; ?>>Blocked</option>
							</select>
							</td></tr>
							<tr><th>Address Verified</th><td>
							<select class="form-control input-sm" name="address_confirmed" disabled>
								<option value="1" <?php if($user->address_confirmed) echo "selected"; ?>>Yes</option>
								<option value="0" <?php if(!$user->address_confirmed) echo "selected"; ?>>No</option>
							</select>
							</td></tr>
							<tr><th>Email Verified</th><td>
							<select class="form-control input-sm" name="email_confirmed" disabled>
								<option value="1" <?php if($user->email_confirmed) echo "selected"; ?>>Yes</option>
								<option value="0" <?php if(!$user->email_confirmed) echo "selected"; ?>>No</option>
							</select>
							</td></tr>
							<tr><th>Phone Verified</th><td>
							<select class="form-control input-sm" name="phone_confirmed" disabled>
								<option value="1" <?php if($user->phone_confirmed) echo "selected"; ?>>Yes</option>
								<option value="0" <?php if(!$user->phone_confirmed) echo "selected"; ?>>No</option>
							</select>
							</td></tr>
							<tr><th>Account Verified</th><td>
							<select class="form-control input-sm" name="verified" disabled>
								<option value="1" <?php if($user->verified) echo "selected"; ?>>Yes</option>
								<option value="0" <?php if(!$user->verified) echo "selected"; ?>>No</option>
							</select>
							</td></tr>
							<tr><th>Last Login IP</th><td><input type="text" class="form-control input-sm" name="last_login_ip" value="<?php echo $user->last_login_ip; ?>" readonly></td></tr>
							<tr><th>Last Login Time</th><td><input type="text" class="form-control input-sm" name="last_login_time" value="<?php echo (new DateTime("@$user->last_login_time"))->format('Y-m-d H:i:s'); ?>" readonly></td></tr>
							<tr><th>Token</th><td><input type="text" class="form-control input-sm" name="token" value="<?php echo $user->token; ?>" readonly></td></tr>
							<tr><th>Type</th><td><input type="text" class="form-control input-sm" name="type" value="<?php echo $user->id; ?>" readonly></td></tr>
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
		if(btn === 'Edit') {
			$(this).text('Save');
			$(this).removeClass('btn-primary').addClass('btn-success');
			$('#user-form').find('input:not(:first)').attr('readonly', false);
			$('#user-form').find('select').attr('disabled', false);
		}else{
			$(this).text('Edit');
			$(this).removeClass('btn-success').addClass('btn-primary');
			
			var data = $('#user-form').serialize();
			
			$.post('', data, function(res){
				if(res.status == 'success') {
					notify('Update', 'Data Updated Successfully', 'success');
				}
				$('#user-form').find('input:not(:first)').attr('readonly', true);
				$('#user-form').find('select').attr('disabled', true);
			}, 'json');
		}
		
	});
}, false);
</script>