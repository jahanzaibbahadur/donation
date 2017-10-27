var Login = function() {
    var handleLogin = function() { console.log('this is testing');

        $('.login-form').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            rules: {
                phone_num: {
                    required: true
                },
                password: {
                    required: true
                },
                remember: {
                    required: false
                }
            },

            messages: {
                phone_num: {
                    required: "Phone Number is required."
                },
                password: {
                    required: "Password is required."
                }
            },

            invalidHandler: function(event, validator) { //display error alert on form submit   
                //$('.alert-danger', $('.login-form')).show();
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
                //form.submit(); // form validation success, call ajax form submit
				var data = $(form).serialize();
				data = data + '&' + token_name + '=' + token;
				console.log(data);
				$url = base_url + 'login';
				$.post($url, data, function(response){
					//console.log("hello");
					if(response.status == 'success'){
						$('#message-box').html(response.msg);
						form.reset();
						setTimeout(function(){
							location.href = base_url;
						}, 500)
					}else //if(response.status == 'error' && response.invalid_attempts == true)
					{
						//$('#captcha').html(response.captcha);
					}
					$('#message-box').html(response.msg);
					//token = response.token;
				},'json');
            }
        });

        $('.login-form input').keypress(function(e) {
            if (e.which == 13) {
                if ($('.login-form').validate().form()) {
                    $('.login-form').submit(); //form validation success, call ajax form submit
                }
                return false;
            }
        });
    }
var handleRegister = function() {

        $('.register-form').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
					phone_num: {
						required: true
								}
            },

           messages: {
                phone_num: {
                    required: "Phone Number is required."
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
				$url = base_url + 'register';
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

        $('.register-form input').keypress(function(e) {
            if (e.which == 13) {
                if ($('.register-form').validate().form()) {
                    $('.register-form').submit();
                }
                return false;
            }
        });
}
//verification_form
var handleVerfication = function() { 
        $('.verification-form').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
					verification_code: {
						required: true
								}
            },

           messages: {
                verification_code: {
                    required: "Verification code is required."
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
				$url = base_url + 'verification';
				$.post($url, data, function(response){
					if(response.status == 'success'){
						$('#message-box').html(response.msg);
						form.reset();
						setTimeout(function(){
							location.href = base_url + 'security_pin';
					}, 500) 
					}
					$('#message-box').html(response.msg);
					//token = response.token;
					//console.log(response);
				},'json');
            }
        });

        $('.verification-form input').keypress(function(e) {
            if (e.which == 13) {
                if ($('.verification-form').validate().form()) {
                    $('.verification-form').submit();
                }
                return false;
            }
        });
}
//security_pin
var handleSecurity_pin = function() { 
        $('.security_pin-form').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
					password: {
						required: true
								}
            },

           messages: {
                password: {
                    required: "Security Pin is required."
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
				$url = base_url + 'security_pin';
				$.post($url, data, function(response){
					if(response.status == 'success'){
						$('#message-box').html(response.msg);
						form.reset();
						setTimeout(function(){
							location.href = base_url + 'login';
					}, 500) 
					}
					$('#message-box').html(response.msg);
					//token = response.token;
					//console.log(response);
				},'json');
            }
        });

        $('.security_pin input').keypress(function(e) {
            if (e.which == 13) {
                if ($('.security_pin-form').validate().form()) {
                    $('.security_pin-form').submit();
                }
                return false;
            }
        });
}
    return {
        //main function to initiate the module
        init: function() {

            handleLogin();
            //handleForgetPassword();
            handleRegister();
			handleVerfication();
			handleSecurity_pin();
        }

    };

}();

jQuery(document).ready(function() {
	$.validator.setDefaults({
        ignore: []
    });
    Login.init();
});