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

	<div class="col-lg-3 col-md-6">
		<a href="javascript:;">
			<div class="card-box widget-box-two widget-two-custom">
				<i class="mdi mdi-currency-usd widget-two-icon"></i>
				<div class="wigdet-two-content">
					<p class="m-0 text-uppercase font-bold font-secondary text-overflow" title="Statistics">Users</p>
					<h2 class=""><span><i class="mdi mdi-arrow-up"></i></span> <span data-plugin="counterup"><?php echo count($users); ?></span></h2>
					<p class="m-0">Jan - Apr 2017</p>
				</div>
			</div>
		</a>
	</div><!-- end col -->

	<div class="col-lg-3 col-md-6">
		<a href="javascript:;">
			<div class="card-box widget-box-two widget-two-custom">
				<i class="mdi mdi-account-multiple widget-two-icon"></i>
				<div class="wigdet-two-content">
					<p class="m-0 text-uppercase font-bold font-secondary text-overflow" title="Statistics">Donation</p>
					<h2 class=""><span><i class="mdi mdi-arrow-up"></i></span> <span data-plugin="counterup"><?php echo '1000'; ?></span>$</h2>
					<p class="m-0">Jan - Apr 2017</p>
				</div>
			</div>
		</a>
	</div><!-- end col -->

	<div class="col-lg-3 col-md-6">
		<a href="javascript:;">
			<div class="card-box widget-box-two widget-two-custom">
				<i class="mdi mdi-crown widget-two-icon"></i>
				<div class="wigdet-two-content">
					<p class="m-0 text-uppercase font-bold font-secondary text-overflow" title="Statistics">Payment Profiles</p>
					<h2 class=""><span><i class="mdi mdi-arrow-up"></i></span> <span data-plugin="counterup"><?php echo count($payment_profiles); ?></span></h2>
					<p class="m-0">Jan - Apr 2017</p>
				</div>
			</div>
		</a>
	</div><!-- end col -->
	
	<div class="col-lg-3 col-md-6">
		<a href="javascript:;">
			<div class="card-box widget-box-two widget-two-custom">
				<i class="mdi mdi-crown widget-two-icon"></i>
				<div class="wigdet-two-content">
					<p class="m-0 text-uppercase font-bold font-secondary text-overflow" title="Statistics">Receipts</p>
					<h2 class=""><span><i class="mdi mdi-arrow-up"></i></span> <span data-plugin="counterup"><?php echo count($receipts); ?></span></h2>
					<p class="m-0">Jan - Apr 2017</p>
				</div>
			</div>
		</a>
	</div><!-- end col -->

</div>
<!-- end row -->


<div class="row">
	<div class="col-sm-12">
		<div class="card-box table-responsive">
			<h4 class="m-t-0 header-title"><b>Last 20 Donations</b></h4>
			<p class="text-muted font-14 m-b-30">
				Recent Last 20 Donations
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
				<?php foreach($last_20_receipts as $receipt) { ?>
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