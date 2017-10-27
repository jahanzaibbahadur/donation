var Donation = function() {
 
var handleProfile = function() {

        $('.Profile-form').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
					first_name: {
						required: true
								},
					last_name: {
						required: true
								},
					phone: {
						required: true
								},
					email: {
						required: true
								},
					address: {
						required: true
								},
					city: {
						required: true
								},
					state: {
						required: true
								},
					zip: {
						required: true
								}
					
            },

           messages: {
					first_name: {
						required: "First Name is required."
								},
					last_name: {
						required: "Last Name is required."
								},
					phone: {
						required: "Phone Number is required."
								},
					email: {
						required: "Email is required."
								},
					address: {
						required: "Address is required."
								},
					city: {
						required: "City is required."
								},
					state: {
						required: "State is required."
								},
					zip: {
						required: "Zip is required."
								}
            },

            invalidHandler: function(event, validator) { //display error alert on form submit   

            },

            highlight: function(element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },

            success: function(label) {
                label.closest('.form-group').removeClass('has-error');
                label.remove();
            },

            errorPlacement: function(error, element) {
                error.insertAfter(element);
            },

            submitHandler: function(form) {
                //form[0].submit();
				var data = $(form).serialize();
				data = data + '&' + token_name + '=' + token;
				console.log(data);
				$url = base_url + 'Profile';
				$.post($url, data, function(response){
					if(response.status == 'success'){
						$('#message-box').html(response.msg);
						form.reset();
						setTimeout(function(){
							location.href = base_url + 'verification';
					}, 500) 
					}
					$('#message-box').html(response.msg);
					//token = response.token;
					//console.log(response);
				},'json');
            }
        });

        $('.Profile-form input').keypress(function(e) {
            if (e.which == 13) {
                if ($('.Profile-form').validate().form()) {
                    $('.Profile-form').submit();
                }
                return false;
            }
        });
}


    return {
        //main function to initiate the module
        init: function() {

            handleProfile();
            //handleForgetPassword();
            //handleRegister();
			//handleVerfication();
			//handleSecurity_pin();
        }

    };

}();

jQuery(document).ready(function() {
	$.validator.setDefaults({
        ignore: []
    });
    Donation.init();
});