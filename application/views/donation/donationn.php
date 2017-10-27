<div id="message-box"></div>
<form accept-charset="UTF-8" <?php if(false){ ?> action="<?php echo base_url(); ?>Profile" <?php }else{ ?> action="<?php echo base_url();?>update_profile" <?php } ?> class="clear_inputs Profile"  id="Profile_form" method="post">

<div class="new_look">
<div class="row top-large new_look_logo_row">
<div class="col-xs-12">
<div class="new_look_logo_box" style="display:none;">
<?php 
if(false){
		$image = ''; ?>
		<img style="height: 100%;" src="<?php echo $image; ?>" alt="" />
<?php }else{ ?>
CAMPAIGN LOGO OR IMAGE
<?php } ?>
</div>
</div>
</div>
<div class="row">
<div class="col-xs-12">
<div class="new_look_midline_text">
<span>Choose amount</span>
</div>
</div>
</div>

<div class="row top-medium">
<div class="col-xs-3 padding-right-none">
<div class="new_look_suggested_amount btn-donation" data-suggested-amount="5">$5</div>
</div>
<div class="col-xs-3 padding-right-none padding-left-medium">
<div class="new_look_suggested_amount" data-suggested-amount="25">$25</div>
</div>
<div class="col-xs-3 padding-right-none padding-left-medium">
<div class="new_look_suggested_amount" data-suggested-amount="50">$50</div>
</div>
<div class="col-xs-3 padding-left-medium">
<div class="new_look_suggested_amount" data-suggested-amount="">Other</div>
</div>
</div>
<div class="bottom-medium row top-xlarge">
<div class="col-xs-6 col-xs-offset-3 padding-left-medium padding-right-none">
<div class="input-group">
<span class="input-group-addon">$</span>
<input class="donation_amount form-control" data-linked-box="" id="amount" maxlength="12" name="amount" positivenumber="true" required="required" type="text" value="5.00">
</div>
</div>
<label class="error text-center col-xs-8 col-xs-offset-2" for="amount"></label>
</div>


<p id="notice"></p>

<div class="row">
<div class="col-xs-12">
<div class="new_look_midline_text">
<span>Make your gift recurring</span>
</div>
</div>
</div>

<script>
  var lastFrequency = undefined;
  
  jQuery(document).ready(function() {

    $('div.btn-donation:not(:first)').removeClass('btn-donation');
    $('div.btn-donation').click();

    var activeButtonId = "";
  
    var first_time = true
  
    if (first_time){
      activeButtonId =  "frequency_One time";
    } else {
      activeButtonId = "frequency_";
    }
  
    lastFrequency = document.getElementById(activeButtonId);
  
    updateFreqRequiredAttr(lastFrequency);
  });
  
  function setFrequency(frequency){
    // return if clicked on the already acive button
    if(lastFrequency === frequency) return;
  
    if(lastFrequency === undefined){
      lastFrequency = frequency;
    } else {
  
      $(lastFrequency).removeClass("active");
      lastFrequency = frequency;
    }
  
    $(lastFrequency).addClass("active");
  
    // Saving select frequency as a hidden field
    var hiddenFrequency = document.getElementById("recurring_frequency");
    hiddenFrequency.value = lastFrequency.getAttribute("data-freq");
  
    var t_and_c = document.getElementById("recurring_terms");
  
    if(frequency.id === "frequency_One time"){
      t_and_c.style.display="none";
    } else{
      t_and_c.style.display="block";
    }
  
    updateFreqRequiredAttr(frequency);
  }
  
  function updateFreqRequiredAttr(frequency) {
    var tc_cb = document.getElementById("terms_and_conditions");
    if(frequency.id === "frequency_One time"){
      tc_cb.removeAttribute("required");
    } else{
      tc_cb.setAttribute("required", "true");
    }
  }
</script>
<div class="row">
<div class="col-xs-12 top-medium bottom-medium">
<input id="recurring_frequency" name="recurring_frequency" type="hidden" value="">
<div class="btn-group btn-group-justified" role="group">
<div class="active btn btn-default" data-freq="" id="frequency_One time" onclick="setFrequency(this);">One Time</div>
<div class="btn btn-default" data-freq="monthly" id="frequency_monthly" onclick="setFrequency(this);">Monthly</div>
<div class="btn btn-default" data-freq="quarterly" id="frequency_quarterly" onclick="setFrequency(this);">Quarterly</div>
<div class="btn btn-default" data-freq="yearly" id="frequency_yearly" onclick="setFrequency(this);">Annually</div>
</div>
</div>
</div>
<div class="row">
<div class="col-xs-12" id="recurring_terms" style="display: none;">
<div class="field"><label class="checkbox"><input id="terms_and_conditions" name="terms_and_conditions" type="checkbox" value="1"><span>I read and have agreed to the <a href="#" target="_blank">terms and conditions</a><br> The total below is for <i>this</i> donation only.<br></span><label class="error" for="terms_and_conditions" style="display: none;"></label></label></div>
</div>
</div>
<?php if($profile){?>
<div class="row">
<div class="col-xs-12">
<div class="new_look_midline_text">
<span>Contact information</span>
</div>
</div>
</div>

<div class="row">
<div class="col-xs-12 col-sm-6 col-xs-12">
<div class="form-group">
<label class="col-xs-3 col-lg-12" style="margin-top:0px;"><div class="row">First Name</div> </label><input class="col-xs-9 col-lg-12" id="first_name" name="first_name" placeholder="First Name" type="text" value="<?php echo $user->firstname;?>" required>
<div style="clear:both"></div>
</div>
</div>
</div>
<div class="row">
<div class="col-xs-12 col-sm-6 col-xs-12">
<div class="form-group">
<label class="col-xs-3 col-lg-12" style="margin-top:0px;"><div class="row">Last Name</div> </label><input class="col-xs-9 col-lg-12" id="last_name" name="last_name" placeholder="Last Name" type="text" value="<?php echo $user->lastname;?>" required>
<div style="clear:both"></div>
</div>
</div>
</div>
<div class="row">
<div class="col-xs-12 col-sm-6 col-xs-12">
<div class="form-group">
<label class="col-xs-3 col-lg-12" style="margin-top:0px;"><div class="row">Mobile Number</div> </label><input class="col-xs-9 col-lg-12" id="phone" name="phone" placeholder="Mobile xxx-xxx-xxxx" type="tel" value="<?php echo $user->mobile;?>" required>
<div style="clear:both"></div>
</div>
</div>
</div>
<div class="row">
<div class="col-xs-12 col-sm-6 col-xs-12">
<div class="form-group">
<label class="col-xs-3 col-lg-12" style="margin-top:0px;"><div class="row">Email</div> </label><input class="col-xs-9  col-lg-12" email="true" id="email" name="email" placeholder="name@example.com" type="email" value="<?php echo $user->email;?>" required>
<div style="clear:both"></div>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-6 col-xs-12">
<div class="form-group">
<label class="col-xs-3 col-lg-12" style="margin-top:0px;"><div class="row">Address</div> </label><input class="col-xs-9 col-lg-12" id="address" name="address" placeholder="Address" type="text"  value="<?php echo $user->address;?>" required>
<div style="clear:both"></div>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-6 col-xs-12">
<div class="form-group">
<label class="col-xs-3 col-lg-12" style="margin-top:0px;"><div class="row">City</div> </label><input class="col-xs-9 col-lg-12" id="city" name="city" placeholder="city" type="text" value="<?php echo $user->city;?>" >
<div style="clear:both"></div>
</div>
</div>
</div>
<div class="row">
<div class="col-xs-12 col-sm-6 col-xs-12">
<div class="form-group">
<label class="col-xs-3 col-lg-12" style="margin-top:0px;"><div class="row">State</div> </label><input class="col-xs-9 col-lg-12" id="state" name="state" placeholder="State" type="text" value="<?php echo $user->state;?>" >
<div style="clear:both"></div>
</div>
</div>
</div>
<div class="row">
<div class="col-xs-12 col-sm-6 col-xs-12">
<div class="form-group">
<label class="col-xs-3 col-lg-12" style="margin-top:0px;"><div class="row">Zip</div> </label><input class="col-xs-9 col-lg-12" id="zip" name="zip" placeholder="12345" type="tel" value="<?php //echo $user->zip;?>" >
<div style="clear:both"></div>
</div>
</div>
</div>
<?php }else{?>
<div class="row">
<div class="col-xs-12">
<div class="new_look_midline_text">
<span>Contact information</span>
</div>
</div>
</div>
<div class="row">
<div class="col-xs-12">
<div class="form-group">
<div>
<div style="margin-left: 27px;">

 <p id="notice" style="font-size: 18px;"><a href="javascript:;" onclick="update_pro()">Update</a>  Your Profile</p>

 <br><br>
</div>
</div>
</div>
</div>
</div>
<?php }?>
<p id="notice"></p>
<div class="row top-large">
<div class="col-xs-12">
<button class="btn btn-donation btn-block btn-lg form-submit-button" data-pointer-submit="true" id="next-donation" name="next_submit"  type="submit">Next</button>
</div>
</div>
</div>
</form>
<script>
$(document).ready(function() {

    var phone = $('#phone');
    phone.keyup(function() {
      if (phone.val().charAt(0) == 0) {
        phone.unmask();
      } else if (phone.val().charAt(0) == 1) {
        phone.mask('1-000-000-0000');
      } else {
        phone.mask('000-000-0000');
      }
    })
  //  $('#zip').mask('00000');
	


	
});
</script>