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
			<h4 class="m-t-0 header-title"><b>Services</b></h4>
			<p class="text-muted font-14 m-b-30">
				All Trading Signal Services
			</p>
			<table style="font-size:12px; width:100%;" id="datatable" class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>ID</th>
						<th>Service Name</th>
						<th>Owner</th> 
						<th>Details</th>
						<th>Price</th>
						<th>Daily</th>
						<th>Success</th>
						<th>Image</th>
						<th>Time</th>
						<th>Type</th>
						<th>Status</th>
						<th>Blocked</th>
						<th>Holding</th>
						<th>Holding 2</th>
						<th>Rating</th>
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
						{ "data": "sname" },
						{ "data": "owner" },
						{ "data": "details" },
						{ "data": "price" },
						{ "data": "daily" },
						{ "data": "success" },
						{ "data": "img" },
						{ "data": "time" },
						{ "data": "type" },
						{ "data": "status" },
						{ "data": "is_blocked" },
						{ "data": "holding"},
						{ "data": "holding2"},
						{ "data": "rating"},
				   ]	 

	});
});
</script>