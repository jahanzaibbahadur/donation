var Login = function() {
    var handleLogin = function() { console.log('this is testing');

        $('.login-form').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            rules: {
                username: {
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
                username: {
                    required: "Username is required."
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
				$url = base_url + 'admin/login';
				$.post($url, data, function(response){
					if(response.status == 'success'){
						$('#message-box').html(response.msg);
						form.reset();
						setTimeout(function(){
							location.href = base_url + 'admin';
						}, 500)
					}else if(response.status == 'error' && response.invalid_attempts == true) {
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

    var handleForgetPassword = function() {
        $('.forget-form').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                username: {
                    required: true
                }
            },

            messages: {
                username: {
                    required: "Username is required."
                }
            },

            invalidHandler: function(event, validator) { //display error alert on form submit   
				//$('.alert-danger', $('.forget-form')).show();
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
                error.insertAfter(element.closest('.input-icon'));
            },

            submitHandler: function(form) {
                //form.submit();
				var data = $(form).serialize();
				data = data + '&' + token_name + '=' + token;
				console.log(data);
				$url = base_url + 'forgot';
				$.post($url, data, function(response){
					if(response.status == 'success'){
						form.reset();
					}
					$('#message-box').html(response.msg);
					token = response.token;
					console.log(response);
				},'json');
            }
        });

        $('.forget-form input').keypress(function(e) {
            if (e.which == 13) {
                if ($('.forget-form').validate().form()) {
                    $('.forget-form').submit();
                }
                return false;
            }
        });

        jQuery('#forget-password').click(function() {
            jQuery('.login-form').hide();
            jQuery('.forget-form').show();
        });

        jQuery('#back-btn').click(function() {
            jQuery('.login-form').show();
            jQuery('.forget-form').hide();
        });
    }

    var handleRegister = function() {

        $('.register-form').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {

                email: {
                    required: true,
                    email: true
                },
                username: {
                    required: true
                },
                password: {
                    required: true
                },
                cpassword: {
                    equalTo: "#user-password"
                },

                agreement: {
                    required: true
                }
            },

            messages: { // custom messages for radio buttons and checkboxes
                agreement: {
                    required: "Please accept agreement first."
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
                if (element.attr("name") == "agreement") { // insert checkbox errors after the container                  
                    error.insertAfter($('#register_tnc_error'));
                } else if (element.closest('.input-icon').size() === 1) {
                    error.insertAfter(element.closest('.input-icon'));
                } else {
                    error.insertAfter(element);
                }
            },

            submitHandler: function(form) {
                //form[0].submit();
				var data = $(form).serialize();
				data = data + '&' + token_name + '=' + token;
				console.log(data);
				$url = base_url + 'register';
				$.post($url, data, function(response){
					if(response.status == 'success'){
						form.reset();
					}
					$('#message-box').html(response.msg);
					token = response.token;
					console.log(response);
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

        jQuery('#register-btn').click(function() {
            jQuery('.login-form').hide();
            jQuery('.register-form').show();
        });

        jQuery('#register-back-btn').click(function() {
            jQuery('.login-form').show();
            jQuery('.register-form').hide();
        });
    }

    return {
        //main function to initiate the module
        init: function() {

            handleLogin();
            //handleForgetPassword();
            //handleRegister();

        }

    };

}();

jQuery(document).ready(function() {
    Login.init();
});