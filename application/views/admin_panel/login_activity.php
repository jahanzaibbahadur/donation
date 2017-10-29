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
			<h4 class="m-t-0 header-title"><b>Login Activity</b></h4>
			<p class="text-muted font-14 m-b-30"></p>

			<table class="table table-condensed m-0">
				<thead>
					<tr>
						<th>IP</th>
						<th>Platform</th>
						<th>Browser</th>
						<th>User Agent</th>
						<th>Date</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($logs as $log) { ?>
					<tr>
						<td><?php echo $log->ip; ?></td>
						<td><?php echo $log->platform; ?></td>
						<td><?php echo $log->browser; ?></td>
						<td><?php echo $log->useragent; ?></td>
						<td><?php echo $log->created_at; ?></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>