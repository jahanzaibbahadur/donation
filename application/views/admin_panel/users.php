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
			</p>

			<table style="width:100%; font-size:12px;" id="usertable" class="table table-striped table-bordered">
				<thead>
				<tr>
					<th>ID</th>
					<th>Username</th>
					<th>Email</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Phone</th>
					<th>Country</th>
				</tr>
				</thead>
				<tbody>
				<?php 
				/*
				if($users) {
					foreach($users as $user) { ?>
				<tr>
					<td><?php echo $user->id; ?></td>
					<td><?php echo $user->username; ?></td>
					<td><?php echo $user->email; ?></td>
					<td><?php echo $user->fname; ?></td>
					<td><?php echo $user->lname; ?></td>
					<td><?php echo $user->phone; ?></td>
					<td><?php echo $user->country; ?></td>
				</tr>
				<?php }
				} else { ?>
					<td colspan="7">
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
						<i class="mdi mdi-block-helper"></i>
						<strong>Oh snap!</strong> No Users Found
					</div>
					</td>
				<?php } */ ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
	var xtable = $('#usertable').DataTable( {
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
					  { "data": "email" },
					  { "data": "fname" },
					  { "data": "lname" },
					  { "data": "phone" },
					  { "data": "country" },
				   ]	 

	});
});
</script>