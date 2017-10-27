<div id="message-box"></div>
<form accept-charset="UTF-8" action="" class="clear_inputs" id="donation_form" method="post">
<div class="row">
<div class="col-xs-12">
<div class="new_look_midline_text">
<span>Confirmation</span>
</div>
</div>
</div>
<div class="row">
<div class="col-xs-12">
<div class="form-group">
<div  style="background-color:#ececf9;">
<div style="margin-left: 27px;">
<p id="notice" style="font-size: 25px;">  Please Confirm your donation of<br> <strong>$</strong><?php //echo $_SESSION['amount'];
?> to <strong><?php //echo comp_name; ?></strong></p>
 <ul>
  <strong>
  <?php //$recurring_frequency =$_SESSION['recurring_frequency'];
	
//	if($recurring_frequency == 'monthly'||$recurring_frequency == 'quarterly'||$recurring_frequency == 'yearly'){
		?>
		<li>Donation Recurring <?php //echo $recurring_frequency;?></li>
	<?php 	
		//}else{
	?>
	<li>Donate one time only</li>
	<?php
		//}
	?>
  </strong>
</ul> 
 <a href="javascript:;" onclick="change_donation()">CHANGE</a>
 <script>
 function change_donation(){
	 $.post('change_donation.php', {'action':'change_donation'}, function(result){
		 setTimeout(function(){ location.reload(); }, 1000);
	 });
 }
 </script>
 <br><br>
</div>
</div>
</div>
</div>
</div>
<div id="card_details">
<?php
/*
$payment_profiles_count = get_payment_profiles_count();
if($payment_profiles_count > 0){
	echo "<script>var card_type = 'existing';</script>";
}else{
	echo "<script>var card_type = 'new';</script>";
}
*/
?>
<div id="new_card" style="<?php //echo $payment_profiles_count > 0 ? 'display: none;' : ''; ?>">
<div class="row">
<div class="col-xs-12">
<div class="new_look_midline_text">
<span>Card information</span>
</div>
</div>
</div>
<div class="form-group">
<div class="row">
<div class="col-xs-12">
<label class="">Card Number <span class="required"></span></label>
</div>
</div>
<div class="row">
<div class="col-xs-7">
<input autocomplete="off" class="new_look_full_width form-control" id="card_number" name="card_number" placeholder="XXXX XXXX XXXX XXXX" required="required" type="tel">
</div>
<div class="col-xs-5 padding-left-none padding-right-none">
<img alt="Visa_color_icon" class="deselected cards" id="visa" src="assets/visa_color_icon-985bccb19cc954fba005b7374a1ba081.png" title="Visa">
<img alt="Master_card_color_icon" class="deselected cards" id="mastercard" src="assets/master_card_color_icon-8e4b8cb184a416c8e7740c133374920e.png" title="Master Card">
<img alt="American_express_color_icon" class="deselected cards" id="amex" src="assets/american_express_color_icon-f26f48991a9fa06e010b06a971bad00d.png" title="American Express">
<img alt="Discover_color_icon" class="deselected cards" id="discover" src="assets/discover_color_icon-e2c1bc436f2842f18964f0e9f84c7020.png" title="Discover">
</div>
</div>
</div>
<div class="row top-small">
<div class="col-lg-7 col-sm-7  col-md-7 col-xs-12">
<div class="form-group">
<div class="row">
<div class="col-xs-12">
<label class="">Expiration Date <span class="required"></span></label>
</div>
<div class="col-xs-6">
<select class="form-control" id="expiration_month" name="expiration_month"><option value="">MM</option><option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option></select>
</div>
<div class="text-between-inputs left-negative-small">/</div>
<div class="col-xs-6 left-negative-small">
<select class="form-control" id="expiration_year" name="expiration_year"><option value="">YY</option><option value="2016">16</option><option value="2017">17</option><option value="2018">18</option><option value="2019">19</option><option value="2020">20</option><option value="2021">21</option><option value="2022">22</option><option value="2023">23</option><option value="2024">24</option><option value="2025">25</option><option value="2026">26</option><option value="2027">27</option><option value="2028">28</option><option value="2029">29</option><option value="2030">30</option><option value="2031">31</option></select>
</div>
</div>
<input id="expiration_date" name="expiration_date" type="hidden">
<label id="expiration_date_required" style="color:red; display:none">This field is required.</label>
<label id="expiration_date_expired" style="color:red; display:none">Expired Credit Card</label>
</div>
</div>
<div class="col-lg-5 col-sm-5  col-md-5  col-xs-12 padding-left-none">
<div class="form-group">
<div class="row">
<div class="col-xs-12">
<label>CVV<span class="required"></span> <a data-target="#cvv-modal" data-toggle="modal" tabindex="-1" class="text-info">What is this?</a></label>
</div>
</div>
<div class="row">
<div class="col-xs-12">
<input autocomplete="off" class="form-control" id="cvv" name="cvv" placeholder="eg. 123" required="required" type="tel">
</div>
</div>
</div>
</div>
</div>
<p id="notice"></p>
<div class="row bottom-large">
</div>
<script>
  $(document).ready(function() {
    $(document).on('validation:required', function(e) {
      var res = true;
	  if(card_type == 'existing') return true;
	  
      var expMonth = $('#expiration_month').val();
      var expYear = $('#expiration_year').val();
      currDate = new Date();
      if (expMonth == '' || expYear == '') {
        $('#expiration_date_required').css('display', 'block');
        $('#expiration_date_expired').css('display', 'none');
        res = false;
      }
      else if (parseInt(expYear) == currDate.getFullYear() && parseInt(expMonth) < (currDate.getMonth() + 1)) {
        $('#expiration_date_expired').css('display', 'block');
        $('#expiration_date_required').css('display', 'none');
        res = false;
      }
      else {
        $('#expiration_date').val(expMonth + '/' + expYear);
      }
      return res;
    });
  
    $('#expiration_month').on('change', function(e) {
      clearExpDateErrors();
    });
  
    $('#expiration_year').on('change', function(e) {
      clearExpDateErrors();
    });
  
    function clearExpDateErrors() {
      var expMonth = $('#expiration_month').val();
      var expYear = $('#expiration_year').val();
      if (expMonth != '' && expYear != '') {
        $('#expiration_date_required').css('display', 'none');
        $('#expiration_date_expired').css('display', 'none');
      }
    }


  });
</script>
</div>
<?php
/*
if($payment_profiles_count > 0) {

$payment_profiles = get_payment_profiles(); 
	*/ 
?>
<div id="existing_card">
<div class="row">
<div class="col-xs-12">
<div class="new_look_midline_text">
<span>Donate With</span>
</div>
</div>
</div>
<div style="margin-left: 0px; margin-right: 0px;" class="row">

<div id="card_logo" class="col-xs-4 padding-left-none padding-right-none" style="text-align:center;">

</div>
<div class="col-xs-8">

<select class="form-control" name="payment_profile">
<?php 

//foreach($payment_profiles as $profile) { ?>
<option data-type="<?php //echo $profile['card_type']; ?>" value="<?php //echo $profile['payment_id']; ?>"><?php //echo $profile['card_type']; ?> ( **** **** **** <?php //echo $profile['card_number']; ?> )</option>
<?php //} ?>
</select>
</div>
</div>
<div class="row">
	<div class="text-center"><a href="javascript:" onclick="add_new_card()">Add New Card</a></div>
</div>
<script>
function add_new_card() {
	card_type = 'new';
	$('#new_card').show();
	$('#existing_card').remove();
}
$(document).ready(function(){
	show_card_logo();
	$('select[name=payment_profile]').change(function(){
		show_card_logo();
	});
});
function show_card_logo(){
		var ctype = $('select[name=payment_profile] option:selected').data('type');
		if(ctype == 'VISA') {
			$('#card_logo').html('<img alt="Visa_color_icon" class="which-cards" id="visa" src="assets/visa_color_icon-985bccb19cc954fba005b7374a1ba081.png" title="Visa">');
		}else if(ctype == 'MASTERCARD'){
			$('#card_logo').html('<img alt="Master_card_color_icon" class="which-cards" id="mastercard" src="assets/master_card_color_icon-8e4b8cb184a416c8e7740c133374920e.png" title="Master Card">');
		}else if(ctype == 'AMEX'){
			$('#card_logo').html('<img alt="American_express_color_icon" class="which-cards" id="amex" src="assets/american_express_color_icon-f26f48991a9fa06e010b06a971bad00d.png" title="American Express">');
		}else if(ctype == 'DISCOVER'){
			$('#card_logo').html('<img alt="Discover_color_icon" class="which-cards" id="discover" src="assets/discover_color_icon-e2c1bc436f2842f18964f0e9f84c7020.png" title="Discover">');
		}else{
		}
}
</script>
</div>
<?php
//}
?>
</div>
<div class="row">
<div class="col-xs-12">
<div class="new_look_midline_text">
<span>Donation amount</span>
</div>
</div>
</div>

<div class="row">
<div class="col-xs-12">
<div class="new_look_big_text new_look_select_color_text" data-linked-label="true" id="total_amount_label">$<?php //echo $_SESSION['amount'];?></div>
</div>
</div>
<div class="row top-large">
<div class="col-xs-12">
<button class="btn btn-donation btn-block btn-lg form-submit-button" data-pointer-submit="true" id="submit-donation" name="button" type="submit">DONATE</button>
</div>
</div>

<p id="notice"></p>

</form>