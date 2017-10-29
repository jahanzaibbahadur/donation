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
			<h4 class="m-t-0 header-title"><b>Closed Trades</b></h4>
			<p class="text-muted font-14 m-b-30">
				All Closed Trades
			</p>
			<table style="font-size:12px; width:100%;" id="datatable" class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>ID</th>
						<th>Username</th>
						<th>Flag</th> 
						<th>Order ID</th> 
						<th>Type</th>
						<th>Amount</th>
						<th>Leverage</th>
						<th>Opening Price</th>
						<th>Closing Price</th>
						<th>SL</th>
						<th>TP</th>
						<th>Open Time</th>
						<th>Close Time</th>
						<th>Pips</th>
						<th>Profit</th>
						<th>Profit%</th>
					</tr>
				</thead>
				<tbody></tbody>
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
						{ "data": "username" },
						{ "data": "symbol" },
						{ "data": "txn_id" },
						{ "data": "type" },
						{ "data": "amount" },
						{ "data": "leverage" },
						{ "data": "priceo" },
						{ "data": "pricec" },
						{ "data": "sl" },
						{ "data": "tp" },
						{ "data": "otime" },
						{ "data": "timec" },
						{ "data": "pips" },
						{ "data": "profit" },
						{ "data": "profit-per", "searchable": false, "orderable": false }
				   ]	 

	});
});
</script>