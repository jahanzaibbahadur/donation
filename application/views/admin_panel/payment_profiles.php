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
			<h4 class="m-t-0 header-title"><b>Payment Profiles</b></h4>
			<p class="text-muted font-14 m-b-30">
				All Registered Payment Profiles
			</p>

			<table style="font-size:12px;" id="datatable" class="table table-striped table-bordered">
				<thead>
				<tr>
					<th>ID</th>
					<th>User ID</th>
					<th>Profile ID</th>
					<th>Card Type</th>
					<th>Card Number</th>
					<th>Date</th>
				</tr>
				</thead>
				<tbody>
				<?php foreach($payment_profiles as $profile) { ?>
				<tr>
					<td><?php echo $profile->id; ?></td>
					<td><?php echo $profile->user_id; ?></td>
					<td><?php echo $profile->payment_id; ?></td>
					<td><?php echo $profile->card_type; ?></td>
					<td><?php echo $profile->card_number; ?></td>
					<td><?php echo $profile->created_at; ?></td>
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