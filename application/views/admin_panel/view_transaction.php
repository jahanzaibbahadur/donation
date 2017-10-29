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
			<h4 class="m-t-0 header-title"><b>Transaction</b></h4>
			<p class="text-muted font-14 m-b-30"></p>

			<table class="table table-condensed m-0">
				<tr><th>ID</th><td><?php echo $transaction->id; ?></td></tr>
				<tr><th>Transaction ID</th><td><?php echo $transaction->txn_id; ?></td></tr>
				<tr><th>Username</th><td><?php echo '<a href="'.base_url().'users/'.$transaction->user_id.'">'.$transaction->username.'</a>'; ?></td></tr>
				<tr><th>Type</th><td><?php echo $transaction->type; ?></td></tr>
				<tr><th>Basic</th><td><?php echo $transaction->basic; ?></td></tr>
				<tr><th>Amount</th><td><?php echo $transaction->amount; ?></td></tr>
				<tr><th>Fee</th><td><?php echo $transaction->fee; ?></td></tr>
				<tr><th>Net</th><td><?php echo $transaction->net; ?></td></tr>
				<tr><th>Time</th><td><?php echo (new DateTime("@$transaction->time"))->format('Y-m-d H:i:s'); ?></td></tr>
				<tr><th>Status</th><td><?php echo $transaction->status; ?></td></tr>
				<tr><th>Note</th><td><?php echo $transaction->note; ?></td></tr>
				<tr><th>Sender</th><td><?php echo $transaction->sender; ?></td></tr>
				<tr><th>Receiver</th><td><?php echo $transaction->receiver; ?></td></tr>
				<tr><th>Method</th><td><?php echo $transaction->method; ?></td></tr>
				<tr><th>Remark</th><td><?php echo $transaction->remark; ?></td></tr>
				<tr><th>IP</th><td><?php echo $transaction->ip; ?></td></tr>
				<tr><th>Browser</th><td><?php echo $transaction->browser; ?></td></tr>
			</table>
		</div>
	</div>
</div>