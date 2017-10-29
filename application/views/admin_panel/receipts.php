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
			<h4 class="m-t-0 header-title"><b>Donation Receipts</b></h4>
			<p class="text-muted font-14 m-b-30">
				All Donations
			</p>

			<table style="font-size:12px;" id="datatable" class="table table-striped table-bordered">
				<thead>
				<tr>
					<th>ID</th>
					<th>Username</th>
					<th>Fullname</th>
					<th>Payment Profile ID</th>
					<th>TXID</th>
					<th>Amount</th>
					<th>Date</th>
				</tr>
				</thead>
				<tbody>
				<?php foreach($receipts as $receipt) { ?>
				<tr>
					<td><?php echo $receipt->id; ?></td>
					<td><?php echo $receipt->phone_num; ?></td>
					<td><?php echo $receipt->name; ?></td>
					<td><?php echo $receipt->payment_id; ?></td>
					<td><?php echo $receipt->txid; ?></td>
					<td><?php echo $receipt->amount; ?></td>
					<td><?php echo $receipt->donated_at; ?></td>
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