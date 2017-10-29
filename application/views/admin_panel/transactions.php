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
			<h4 class="m-t-0 header-title"><b>Default Example</b></h4>
			<p class="text-muted font-14 m-b-30">
				DataTables has most features enabled by default, so all you need to do to use it with
				your own tables is to call the construction function: <code>$().DataTable();</code>.
			</p>

			<table style="width:100%; font-size:12px;" id="datatable" class="table table-striped table-bordered">
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
				<?php 
				/*
				if($txns) {
					foreach($txns as $txn) { ?>
				<tr>
					<td><?php echo $txn->id; ?></td>
					<td><?php echo $txn->txn_id; ?></td>
					<td><?php echo $txn->username; ?></td>
					<td><?php echo $txn->amount; ?></td>
					<td><?php echo $txn->fee; ?></td>
					<td><?php echo $txn->net; ?></td>
					<td><?php echo $txn->time; ?></td>
					<td><?php echo $txn->status; ?></td>
					<td><?php echo $txn->note; ?></td>
					<td><?php echo $txn->method; ?></td>
					<td><?php echo $txn->remark; ?></td>
				</tr>
				<?php }
				} else { ?>
					<td colspan="11">
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
						<i class="mdi mdi-block-helper"></i>
						<strong>Oh snap!</strong> No Deposit Transactions Founds
					</div>
					</td>
				<?php }
*/				?>
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
		"processing": true,
		"serverSide": true,
		"ajax": {
				 "url": "",
				 "dataType": "json",
				 "type": "POST",
				 "data" : {action: "datatable"},
							   },
		
		 "columns": [
					  { "data": "id" },
					  { "data": "txn_id" },
					  { "data": "username" },
					  { "data": "amount" },
					  { "data": "fee" },
					  { "data": "net" },
					  { "data": "time" },
					  { "data": "status" },
					  { "data": "note" },
					  { "data": "method" },
					  { "data": "remark" },
				   ]	 

	});
});
</script>