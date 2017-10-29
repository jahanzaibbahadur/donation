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
			<h4 class="m-t-0 header-title"><b>Payment Methods</b></h4>
			<p class="text-muted font-14 m-b-30">
				All Payment Methods
			</p>
			<table style="font-size:12px; width:100%;" id="datatable" class="table add-edit-table table-striped table-bordered">
				<thead>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Username</th> 
						<th>Username 2</th>
						<th>Secret</th>
						<th>Min Deposit</th>
						<th>Min Withdraw</th>
						<th>Max Deposit</th>
						<th>Max Withdraw</th>
						<th>Withdraw</th>
						<th>Deposit</th>
						<th>Deposit Fee</th>
						<th>Withdraw Fee</th>
						<th>Display Name</th>
						<th>Image</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach($methods as $method) { ?>
					<tr>
						<td><?php echo $method->id; ?></td>
						<td><a href="<?php echo base_url().'payment/method/'.$method->id; ?>"><?php echo $method->name; ?></a></td>
						<td><?php echo $method->username; ?></td>
						<td><?php echo $method->username2; ?></td>
						<td><?php echo $method->secret; ?></td>
						<td><?php echo $method->mindeposit; ?></td>
						<td><?php echo $method->minwithdraw; ?></td>
						<td><?php echo $method->maxdeposit; ?></td>
						<td><?php echo $method->maxwithdraw; ?></td>
						<td><?php echo $method->withdraw; ?></td>
						<td><?php echo $method->deposit; ?></td>
						<td><?php echo $method->dfee; ?></td>
						<td><?php echo $method->wfee; ?></td>
						<td><?php echo $method->dname; ?></td>
						<td><?php echo $method->img; ?></td>
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
		"scrollX": true,
	});
});
</script>