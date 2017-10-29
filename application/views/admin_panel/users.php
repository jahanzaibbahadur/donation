<div class="row">
	<div class="col-xs-12">
		<div class="page-title-box">
			<h4 class="page-title">Dashboard</h4>
			<ol class="breadcrumb p-0 m-0">
				<li>
					<a href="#">Adminox</a>
				</li>
				<li>
					<a href="#">Dashboard</a>
				</li>
				<li class="active">
					Dashboard 1
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
			<h4 class="m-t-0 header-title"><b>Users</b></h4>
			<p class="text-muted font-14 m-b-30">
				All Registered Users
			</p>

			<table style="font-size:12px;" id="datatable" class="table table-striped table-bordered">
				<thead>
				<tr>
					<th>ID</th>
					<th>Username</th>
					<th>Profile ID</th>
					<th>Email</th>
					<th>Fullname</th>
					<th>Address</th>
					<th>City</th>
					<th>State</th>
					<th>Zip</th>
				</tr>
				</thead>
				<tbody>
				<?php foreach($users as $user) { ?>
				<tr>
					<td><?php echo $user->id; ?></td>
					<td><?php echo $user->phone_num; ?></td>
					<td><?php echo $user->profileid; ?></td>
					<td><?php echo $user->email; ?></td>
					<td><?php echo $user->firstname. ' ', $user->lastname; ?></td>
					<td><?php echo $user->address; ?></td>
					<td><?php echo $user->city; ?></td>
					<td><?php echo $user->state; ?></td>
					<td><?php echo $user->zip; ?></td>
				</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
	var xtable = $('#datatable').DataTable( {
		"lengthChange": true,
		"pageLength": 10,
	});
});
</script>