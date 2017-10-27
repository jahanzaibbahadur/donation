<div id="message-box"></div>
<div class="row">
<div class="col-xs-12">
<div class="new_look_midline_text">
<span><i>Thank You<i></span>
</div>
</div>
</div>
<div style="text-align:center; font-family:Georgia;">
<h1 style="color:#009900;font-size: 38px;">Thank you</h1>
<p style="font-size: 22px;  ">Thank you for Donating<br>We greatly appreciate your support.</p>
</div>

<div class="row">
<div class="col-xs-12">
<div style="font-size: 18px;" class="new_look_midline_text">
<span>Donation Confirmation</span>
</div>
<p style="font-size: 22px; text-align: center;">
Please check your email for your receipt.
</p>
</div>
</div>

<div class="row top-large">
<div class="col-xs-12">
<button style="background-color:#00b300; color:white;"  class=" btn btn-block btn-lg form-submit-button" id="" name="next_submit"  onclick="thank_you()">Continue</button>
</div>
</div>
 <script>
 function thank_you(){
	 $.post('', {'action':'change_don'}, function(result){
		 setTimeout(function(){ location.href = base_url + 'cancel' }, 1000);
	 });
 }
 </script>

<?php //}?>
<div style="text-align:center; margin-top:50px;">
<a href="logout.php" class="btn btn-info" style="border:none">logout</a>
    </div>
	
</div>
</div>
</div>
<script>
$(document).ready(function() {
	
	$('#thank_you').submit(function(e){
		e.preventDefault();		
		setTimeout(function(){ location.href = base_url + 'cancel' }, 1000);
		//var form = $(this);
		console.log(form);
		var data ="hello";
		//data = data + '&action=charge&card_type=' + card_type;
		if(form.valid()){
			
			//$('.form-submit-button').attr('disabled', 'true');
			//$('.form-submit-button').text('Processing...');
			var ajaxurl = 'thankyou';
			$.post(ajaxurl, data, function(result){
				setTimeout(function(){ location.href = base_url + 'cancel' }, 1000);
			},'json');
		}
	});	

	
});


</script>
