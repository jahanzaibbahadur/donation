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

			<table id="datatable" class="table table-striped table-bordered">
				<thead>
				<tr>
									 <th>id</th> 
									 <th>username</th>
									<th>otime</th>
									<th>type</th>
									<th>leverage</th>
									<th>symbol</th>
									<th>priceo</th>
									<th>sl</th>
									<th>tp</th>
									<th>timec</th>
									<th>pricec</th>
									<th>pips</th>
									<th>comment</th>
									<th>status</th>
									<th>account</th>
									<th>length</th>
									<th>amount</th>
									<th>profit</th>
									<th>txn_id</th>
				</tr>
				</thead>
				<tbody>
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
									{ "data": "username" },
									{ "data": "otime" },
									{ "data": "type" },
									{ "data": "leverage" },
									{ "data": "symbol" },
									{ "data": "priceo" },
									{ "data": "sl" },
									{ "data": "tp" },
									{ "data": "timec" },
									{ "data": "pricec" },
									{ "data": "pips" },
									{ "data": "comment" },
									{ "data": "status" },
									{ "data": "account" },
									{ "data": "length" },
									{ "data": "amount" },
									{ "data": "profit" },
									{ "data": "txn_id" },
				   ]	 

	});
});
</script>