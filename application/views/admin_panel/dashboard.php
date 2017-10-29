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
		<a href="<?php echo base_url(); ?>users/active">
			<div class="card-box widget-box-two widget-two-custom">
				<i class="mdi mdi-currency-usd widget-two-icon"></i>
				<div class="wigdet-two-content">
					<p class="m-0 text-uppercase font-bold font-secondary text-overflow" title="Statistics">Active</p>
					<h2 class=""><span><i class="mdi mdi-arrow-up"></i></span> <span data-plugin="counterup"><?php echo $users['active']; ?></span></h2>
					<p class="m-0">Jan - Apr 2017</p>
				</div>
			</div>
		</a>
	</div><!-- end col -->

	<div class="col-lg-3 col-md-6">
		<a href="<?php echo base_url(); ?>users/suspended">
			<div class="card-box widget-box-two widget-two-custom">
				<i class="mdi mdi-account-multiple widget-two-icon"></i>
				<div class="wigdet-two-content">
					<p class="m-0 text-uppercase font-bold font-secondary text-overflow" title="Statistics">Suspended</p>
					<h2 class=""><span><i class="mdi mdi-arrow-up"></i></span> <span data-plugin="counterup"><?php echo $users['suspended']; ?></span></h2>
					<p class="m-0">Jan - Apr 2017</p>
				</div>
			</div>
		</a>
	</div><!-- end col -->

	<div class="col-lg-3 col-md-6">
		<a href="<?php echo base_url(); ?>users/blocked">
			<div class="card-box widget-box-two widget-two-custom">
				<i class="mdi mdi-crown widget-two-icon"></i>
				<div class="wigdet-two-content">
					<p class="m-0 text-uppercase font-bold font-secondary text-overflow" title="Statistics">Blocked</p>
					<h2 class=""><span><i class="mdi mdi-arrow-up"></i></span> <span data-plugin="counterup"><?php echo $users['blocked']; ?></span></h2>
					<p class="m-0">Jan - Apr 2017</p>
				</div>
			</div>
		</a>
	</div><!-- end col -->

	<div class="col-lg-3 col-md-6">
		<a href="<?php echo base_url(); ?>users/pending">
			<div class="card-box widget-box-two widget-two-custom">
				<i class="mdi mdi-auto-fix widget-two-icon"></i>
				<div class="wigdet-two-content">
					<p class="m-0 text-uppercase font-bold font-secondary text-overflow" title="Statistics">Pending</p>
					<h2 class=""><span><i class="mdi mdi-arrow-up"></i></span> <span data-plugin="counterup"><?php echo $users['pending']; ?></span></h2>
					<p class="m-0">Jan - Apr 2017</p>
				</div>
			</div>
		</a>
	</div><!-- end col -->

</div>
<!-- end row -->


<div class="row">

	<div class="col-lg-3 col-md-6">
		<a href="<?php echo base_url(); ?>deposit/today">
			<div class="card-box widget-box-two widget-two-custom">
				<i class="mdi mdi-currency-usd widget-two-icon"></i>
				<div class="wigdet-two-content">
					<p class="m-0 text-uppercase font-bold font-secondary text-overflow" title="Statistics">Today</p>
					<h2 class=""><span><i class="mdi mdi-arrow-up"></i></span> <span data-plugin="counterup"><?php echo $deposit['today']->amount; ?></span></h2>
					<p class="m-0">Jan - Apr 2017</p>
				</div>
			</div>
		</a>
	</div><!-- end col -->

	<div class="col-lg-3 col-md-6">
		<a href="<?php echo base_url(); ?>deposit/week">
		<div class="card-box widget-box-two widget-two-custom">
			<i class="mdi mdi-account-multiple widget-two-icon"></i>
			<div class="wigdet-two-content">
				<p class="m-0 text-uppercase font-bold font-secondary text-overflow" title="Statistics">This Week</p>
				<h2 class=""><span><i class="mdi mdi-arrow-up"></i></span> <span data-plugin="counterup"><?php echo $deposit['week']->amount; ?></span></h2>
				<p class="m-0">Jan - Apr 2017</p>
			</div>
		</div>
		</a>
	</div><!-- end col -->

	<div class="col-lg-3 col-md-6">
		<a href="<?php echo base_url(); ?>deposit/month">
			<div class="card-box widget-box-two widget-two-custom">
				<i class="mdi mdi-crown widget-two-icon"></i>
				<div class="wigdet-two-content">
					<p class="m-0 text-uppercase font-bold font-secondary text-overflow" title="Statistics">This Month</p>
					<h2 class=""><span><i class="mdi mdi-arrow-up"></i></span> <span data-plugin="counterup"><?php echo $deposit['month']->amount; ?></span></h2>
					<p class="m-0">Jan - Apr 2017</p>
				</div>
			</div>
		</a>
	</div><!-- end col -->

	<div class="col-lg-3 col-md-6">
		<a href="<?php echo base_url(); ?>deposit/all">
			<div class="card-box widget-box-two widget-two-custom">
				<i class="mdi mdi-auto-fix widget-two-icon"></i>
				<div class="wigdet-two-content">
					<p class="m-0 text-uppercase font-bold font-secondary text-overflow" title="Statistics">Total</p>
					<h2 class=""><span><i class="mdi mdi-arrow-up"></i></span> <span data-plugin="counterup"><?php echo $deposit['total']->amount; ?></span></h2>
					<p class="m-0">Jan - Apr 2017</p>
				</div>
			</div>
		</a>
	</div><!-- end col -->

</div>
<!-- end row -->



<div class="row">

	<div class="col-lg-3 col-md-6">
		<a href="<?php echo base_url(); ?>withdraw/today">
			<div class="card-box widget-box-two widget-two-custom">
				<i class="mdi mdi-currency-usd widget-two-icon"></i>
				<div class="wigdet-two-content">
					<p class="m-0 text-uppercase font-bold font-secondary text-overflow" title="Statistics">Today</p>
					<h2 class=""><span><i class="mdi mdi-arrow-up"></i></span> <span data-plugin="counterup"><?php echo $withdraw['today']->amount; ?></span></h2>
					<p class="m-0">Jan - Apr 2017</p>
				</div>
			</div>
		</a>
	</div><!-- end col -->

	<div class="col-lg-3 col-md-6">
		<a href="<?php echo base_url(); ?>withdraw/week">
			<div class="card-box widget-box-two widget-two-custom">
				<i class="mdi mdi-account-multiple widget-two-icon"></i>
				<div class="wigdet-two-content">
					<p class="m-0 text-uppercase font-bold font-secondary text-overflow" title="Statistics">This Week</p>
					<h2 class=""><span><i class="mdi mdi-arrow-up"></i></span> <span data-plugin="counterup"><?php echo $withdraw['week']->amount; ?></span></h2>
					<p class="m-0">Jan - Apr 2017</p>
				</div>
			</div>
		</a>
	</div><!-- end col -->

	<div class="col-lg-3 col-md-6">
		<a href="<?php echo base_url(); ?>withdraw/month">
			<div class="card-box widget-box-two widget-two-custom">
				<i class="mdi mdi-crown widget-two-icon"></i>
				<div class="wigdet-two-content">
					<p class="m-0 text-uppercase font-bold font-secondary text-overflow" title="Statistics">This Month</p>
					<h2 class=""><span><i class="mdi mdi-arrow-up"></i></span> <span data-plugin="counterup"><?php echo $withdraw['month']->amount; ?></span></h2>
					<p class="m-0">Jan - Apr 2017</p>
				</div>
			</div>
		</a>
	</div><!-- end col -->

	<div class="col-lg-3 col-md-6">
		<a href="<?php echo base_url(); ?>withdraw/all">
			<div class="card-box widget-box-two widget-two-custom">
				<i class="mdi mdi-auto-fix widget-two-icon"></i>
				<div class="wigdet-two-content">
					<p class="m-0 text-uppercase font-bold font-secondary text-overflow" title="Statistics">Total</p>
					<h2 class=""><span><i class="mdi mdi-arrow-up"></i></span> <span data-plugin="counterup"><?php echo $withdraw['total']->amount; ?></span></h2>
					<p class="m-0">Jan - Apr 2017</p>
				</div>
			</div>
		</a>
	</div><!-- end col -->

</div>
<!-- end row -->
<!-- my changes  -->

<div class="row">

	<div class="col-lg-3 col-md-6">
		<a href="<?php echo base_url(); ?>trades_active/today">
			<div class="card-box widget-box-two widget-two-custom">
				<i class="mdi mdi-currency-usd widget-two-icon"></i>
				<div class="wigdet-two-content">
					<p class="m-0 text-uppercase font-bold font-secondary text-overflow" title="Statistics">Today</p>
					<h2 class=""><span><i class="mdi mdi-arrow-up"></i></span> <span data-plugin="counterup"><?php echo $trades_active['today']; ?></span></h2>
					<p class="m-0">Jan - Apr 2017</p>
				</div>
			</div>
		</a>
	</div><!-- end col -->

	<div class="col-lg-3 col-md-6">
		<a href="<?php echo base_url(); ?>trades_active/week">
			<div class="card-box widget-box-two widget-two-custom">
				<i class="mdi mdi-account-multiple widget-two-icon"></i>
				<div class="wigdet-two-content">
					<p class="m-0 text-uppercase font-bold font-secondary text-overflow" title="Statistics">This Week</p>
					<h2 class=""><span><i class="mdi mdi-arrow-up"></i></span> <span data-plugin="counterup"><?php echo $trades_active['week']; ?></span></h2>
					<p class="m-0">Jan - Apr 2017</p>
				</div>
			</div>
		</a>
	</div><!-- end col -->

	<div class="col-lg-3 col-md-6">
		<a href="<?php echo base_url(); ?>trades_active/month">
			<div class="card-box widget-box-two widget-two-custom">
				<i class="mdi mdi-crown widget-two-icon"></i>
				<div class="wigdet-two-content">
					<p class="m-0 text-uppercase font-bold font-secondary text-overflow" title="Statistics">This Month</p>
					<h2 class=""><span><i class="mdi mdi-arrow-up"></i></span> <span data-plugin="counterup"><?php echo $trades_active['month']; ?></span></h2>
					<p class="m-0">Jan - Apr 2017</p>
				</div>
			</div>
		</a>
	</div><!-- end col -->

	<div class="col-lg-3 col-md-6">
		<a href="<?php echo base_url(); ?>trades_active/all">
			<div class="card-box widget-box-two widget-two-custom">
				<i class="mdi mdi-auto-fix widget-two-icon"></i>
				<div class="wigdet-two-content">
					<p class="m-0 text-uppercase font-bold font-secondary text-overflow" title="Statistics">Total</p>
					<h2 class=""><span><i class="mdi mdi-arrow-up"></i></span> <span data-plugin="counterup"><?php echo $trades_active['total']; ?></span></h2>
					<p class="m-0">Jan - Apr 2017</p>
				</div>
			</div>
		</a>
	</div><!-- end col -->

</div>
<!-- end row -->

<div class="row">

	<div class="col-lg-3 col-md-6">
		<a href="<?php echo base_url(); ?>signal_services/today">
			<div class="card-box widget-box-two widget-two-custom">
				<i class="mdi mdi-currency-usd widget-two-icon"></i>
				<div class="wigdet-two-content">
					<p class="m-0 text-uppercase font-bold font-secondary text-overflow" title="Statistics">Today</p>
					<h2 class=""><span><i class="mdi mdi-arrow-up"></i></span> <span data-plugin="counterup"><?php echo $signal_services['today']; ?></span></h2>
					<p class="m-0">Jan - Apr 2017</p>
				</div>
			</div>
		</a>
	</div><!-- end col -->

	<div class="col-lg-3 col-md-6">
		<a href="<?php echo base_url(); ?>signal_services/week">
			<div class="card-box widget-box-two widget-two-custom">
				<i class="mdi mdi-account-multiple widget-two-icon"></i>
				<div class="wigdet-two-content">
					<p class="m-0 text-uppercase font-bold font-secondary text-overflow" title="Statistics">This Week</p>
					<h2 class=""><span><i class="mdi mdi-arrow-up"></i></span> <span data-plugin="counterup"><?php echo $signal_services['week']; ?></span></h2>
					<p class="m-0">Jan - Apr 2017</p>
				</div>
			</div>
		</a>
	</div><!-- end col -->

	<div class="col-lg-3 col-md-6">
		<a href="<?php echo base_url(); ?>signal_services/month">
			<div class="card-box widget-box-two widget-two-custom">
				<i class="mdi mdi-crown widget-two-icon"></i>
				<div class="wigdet-two-content">
					<p class="m-0 text-uppercase font-bold font-secondary text-overflow" title="Statistics">This Month</p>
					<h2 class=""><span><i class="mdi mdi-arrow-up"></i></span> <span data-plugin="counterup"><?php echo $signal_services['month']; ?></span></h2>
					<p class="m-0">Jan - Apr 2017</p>
				</div>
			</div>
		</a>
	</div><!-- end col -->

	<div class="col-lg-3 col-md-6">
		<a href="<?php echo base_url(); ?>signal_services/all">
			<div class="card-box widget-box-two widget-two-custom">
				<i class="mdi mdi-auto-fix widget-two-icon"></i>
				<div class="wigdet-two-content">
					<p class="m-0 text-uppercase font-bold font-secondary text-overflow" title="Statistics">Total</p>
					<h2 class=""><span><i class="mdi mdi-arrow-up"></i></span> <span data-plugin="counterup"><?php echo $signal_services['total']; ?></span></h2>
					<p class="m-0">Jan - Apr 2017</p>
				</div>
			</div>
		</a>
	</div><!-- end col -->

</div>
<!-- end row -->

<div class="row">

	<div class="col-lg-3 col-md-6">
		<a href="<?php echo base_url(); ?>withdraw/today">
			<div class="card-box widget-box-two widget-two-custom">
				<i class="mdi mdi-currency-usd widget-two-icon"></i>
				<div class="wigdet-two-content">
					<p class="m-0 text-uppercase font-bold font-secondary text-overflow" title="Statistics">Today</p>
					<h2 class=""><span><i class="mdi mdi-arrow-up"></i></span> <span data-plugin="counterup"><?php echo $withdraw['today']->amount; ?></span></h2>
					<p class="m-0">Jan - Apr 2017</p>
				</div>
			</div>
		</a>
	</div><!-- end col -->

	<div class="col-lg-3 col-md-6">
		<a href="<?php echo base_url(); ?>withdraw/week">
			<div class="card-box widget-box-two widget-two-custom">
				<i class="mdi mdi-account-multiple widget-two-icon"></i>
				<div class="wigdet-two-content">
					<p class="m-0 text-uppercase font-bold font-secondary text-overflow" title="Statistics">This Week</p>
					<h2 class=""><span><i class="mdi mdi-arrow-up"></i></span> <span data-plugin="counterup"><?php echo $withdraw['week']->amount; ?></span></h2>
					<p class="m-0">Jan - Apr 2017</p>
				</div>
			</div>
		</a>
	</div><!-- end col -->

	<div class="col-lg-3 col-md-6">
		<a href="<?php echo base_url(); ?>withdraw/month">
			<div class="card-box widget-box-two widget-two-custom">
				<i class="mdi mdi-crown widget-two-icon"></i>
				<div class="wigdet-two-content">
					<p class="m-0 text-uppercase font-bold font-secondary text-overflow" title="Statistics">This Month</p>
					<h2 class=""><span><i class="mdi mdi-arrow-up"></i></span> <span data-plugin="counterup"><?php echo $withdraw['month']->amount; ?></span></h2>
					<p class="m-0">Jan - Apr 2017</p>
				</div>
			</div>
		</a>
	</div><!-- end col -->

	<div class="col-lg-3 col-md-6">
		<a href="<?php echo base_url(); ?>withdraw/all">
			<div class="card-box widget-box-two widget-two-custom">
				<i class="mdi mdi-auto-fix widget-two-icon"></i>
				<div class="wigdet-two-content">
					<p class="m-0 text-uppercase font-bold font-secondary text-overflow" title="Statistics">Total</p>
					<h2 class=""><span><i class="mdi mdi-arrow-up"></i></span> <span data-plugin="counterup"><?php echo $withdraw['total']->amount; ?></span></h2>
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
			<h4 class="m-t-0 header-title"><b>Last 20 Transactions</b></h4>
			<p class="text-muted font-14 m-b-30">
				Recent Last 20 Transaction
			</p>

			<table style="font-size:12px;" id="datatable" class="table table-striped table-bordered">
				<thead>
				<tr>
					<th>ID</th>
					<th>TXN ID</th>
					<th>Username</th>
					<th>Amount</th>
					<th>Fee</th>
					<th>Net</th>
					<th>Time</th>
					<th>Status</th>
					<th>Note</th>
					<th>Method</th>
					<th>Remarks</th>
				</tr>
				</thead>
				<tbody>
				<?php foreach($last_20_transactions as $txn) { ?>
				<tr>
					<td><?php echo $txn->id; ?></td>
					<td><?php echo '<a href="'.base_url().'transaction/'.$txn->txn_id.'">'.$txn->txn_id.'</a>'; ?></td>
					<td><?php echo '<a href="'.base_url().'users/'.$txn->user_id.'">'.$txn->username.'</a>'; ?></td>
					<td><?php echo $txn->amount; ?></td>
					<td><?php echo $txn->fee; ?></td>
					<td><?php echo $txn->net; ?></td>
					<td><?php echo (new DateTime("@$txn->time"))->format('Y-m-d H:i:s'); ?></td>
					<td><?php echo $txn->status; ?></td>
					<td><?php echo $txn->note; ?></td>
					<td><?php echo $txn->method; ?></td>
					<td><?php echo $txn->remark; ?></td>
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