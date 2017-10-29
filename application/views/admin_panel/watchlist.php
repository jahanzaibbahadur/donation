<style>
tr td {
    vertical-align: middle !important;
	text-align: center !important;
}
input[type=text]{
	text-align: center;
}
.input-group {
	width: 250px;
	margin-left: auto;
	margin-right: auto;
}
</style>
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
			<h4 class="m-t-0 header-title"><b>Watchlist</b></h4>
			<p class="text-muted font-14 m-b-30">
				Watchlist Description
			</p>
			<table style="font-size:12px; width:100%;" id="datatable" class="table table-striped table-bordered">
				<thead>
					<tr>
						<th style="width:20%;">Flag</th>
						<th style="width:35%;">Buy</th>
						<th style="width:35%;">Sell</th> 
						<th style="width:10%;">%</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach($pairs as $pair) { ?>
				<tr>
					<td><a href="#" style="color:black;" target="_blank"><img src="<?php echo base_url().'flags/'.$pair->symbol.'.png' ?>" style="width:75px;"> <b style="font-size:15px;"><?php echo $pair->symbol; ?></b></a></td>
					<td>
					<div class="input-group input-group-lg">
						<span class="input-group-btn">
							<button class="btn btn-success" type="button">B</button>
						</span>
						<input class="form-control <?php echo $pair->symbol; ?>-Bid" type="text" readonly>
					</div>
					</td>
					<td>
					<div class="input-group input-group-lg">
						<span class="input-group-btn">
							<button class="btn btn-danger" type="button">S</button>
						</span>
						<input class="form-control <?php echo $pair->symbol; ?>-Ask" type="text" readonly>
					</div>
					</td>
					<td>+0.06%</td>
				</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
	var xtable = $('#sfdsddatatable').DataTable( {
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
						{ "data": "symbol" },
						{ "data": "type" },
						{ "data": "amount" },
						{ "data": "leverage" },
						{ "data": "priceo" },
						{ "data": "sl" },
						{ "data": "tp" },
						{ "data": "rate", "searchable": false, "orderable": false },
						{ "data": "pips" },
						{ "data": "profit" },
						{ "data": "profit-per", "searchable": false, "orderable": false },
						{ "data": "action", "searchable": false, "orderable": false },
				   ]	 

	});
	
		// Define WrapperWS

		function WrapperWS() {
			
			credentials = {
					  "username":"admin",
					  "session_id":"admin",
					  "login_id":"kuchnai",
					  "type":"gold",
					  "kuchnai":15
					};
					
			var data = {
					 credentials:window.credentials,
					 request_id:1,
					 pagefile:'watchlist'
				   };
			
			if ("WebSocket" in window) {
				var ws = new WebSocket("ws://tradingxpo.com:8080");
				var self = this;

				ws.onopen = function () {
					console.log("Opening a connection...");
					window.identified = false;
				};
				ws.onclose = function (evt) {
					console.log("I'm sorry. Bye!");
				};
				ws.onmessage = function (evt) {
					// handle messages here
					//console.log(evt.data);
					ProcessData(evt.data);
				};
				ws.onerror = function (evt) {
					console.log("ERR: " + evt.data);
				};
				
				window.onbeforeunload = function() {
					//websocket.onclose = function () {}; // disable onclose handler first
					ws.close()
				};

				this.write = function () {
					if (!window.identified) {
						connection.ident();
						console.debug("Wasn't identified earlier. It is now.");
					}
					//ws.send(theText.value);
				};
				
				
				this.send = function (message, callback) {
					this.waitForConnection(function () {
						ws.send(message);
						if (typeof callback !== 'undefined') {
						  callback();
						}
					}, 1000);
				};

				this.waitForConnection = function (callback, interval) {
					if (ws.readyState === 1) {
						callback();
					} else {
						var that = this;
						// optional: implement backoff for interval here
						setTimeout(function () {
							that.waitForConnection(callback, interval);
						}, interval);
					}
				};
				
				this.ident = function () {
					this.send(JSON.stringify(data), function () {
						console.log('debugging');
						window.identified = true;
					});
				};
			};
		}

		var connection = new WrapperWS();
		connection.ident();
		
		ProcessData = function(data) {
			var rates = JSON.parse(data);
			$.each(rates.data, function(k,v){
				$('.'+k+'-Bid').val(v.Bid).fadeOut('fast').fadeIn('fast');
				$('.'+k+'-Ask').val(v.Ask).fadeOut('fast').fadeIn('fast');
			});
			
		}
});
</script>