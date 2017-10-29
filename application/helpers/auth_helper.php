<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Is there a user who is logged in right now?
 *
 */
if( !function_exists('is_logged_in') ){
    function is_logged_in(){
		
		$CI =& get_instance();
		
        if( $CI->session->userdata('is_logged_in') ){
            return true;
        } else return false;
    }
}

/**
 * Is there a user who is logged in right now?
 *
 */
if( !function_exists('is_admin_logged_in') ){
    function is_admin_logged_in(){
		
		$CI =& get_instance();
		
        if( $CI->session->userdata('admin')['is_logged_in'] ){
            return true;
        } else return false;
    }
}

/**
 * Is there a user who is logged in right now?
 *
 */
if( !function_exists('hash_password') ){
    function hash_password($password){
		$CI =& get_instance();
		/**
		 * Note that the salt here is randomly generated.
		 * Never use a static salt or one that is not randomly generated.
		 *
		 * For the VAST majority of use-cases, let password_hash generate the salt randomly for you
		 */
		$options = [
			'cost' => 12,
			'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
		];
		return password_hash($password, PASSWORD_DEFAULT);
    }
}

/**
 * Is there a user who is logged in right now?
 *
 */
if( !function_exists('verify_password') ){
    function verify_password($password, $hash){
		$CI =& get_instance();
		return password_verify($password, $hash);
    }
}

/**
 * Is there a user who is logged in right now?
 *
 */
if( !function_exists('user_level') ){
    function user_level($username){
		$CI =& get_instance();
		$CI->load->model('auth_model');
		return $CI->auth_model->get_level($username);
    }
}

/**
 * Is there a user who is logged in right now?
 *
 */
if( !function_exists('is_admin') ){
    function is_admin($level = 0){
		$CI =& get_instance();
		return $CI->session->userdata('level') == $level ? true : false;
    }
}

/**
 * Is there a user who is logged in right now?
 *
 */
if( !function_exists('is_subadmin') ){
    function is_subadmin($level = 1){
		$CI =& get_instance();
		return $CI->session->userdata('level') == $level ? true : false;
    }
}

/**
 * Display transaction status
 */
function account_levels($level){
	switch($status){
		case 0:
			echo "Admin";
			break;
		case 1:
			echo "Sub Admin";
			break;
	}
}

/**
 *Function to destroy session variables
 */
if( !function_exists('destroy_session') ){
	function destroy_session(){
		$CI =& get_instance();
		$CI->session->sess_destroy();
		redirect("/");
	}
}

if( !function_exists('destroy_admin_session') ){
	function destroy_admin_session(){
		$CI =& get_instance();
		$CI->session->unset_userdata('admin');
		redirect("admin/login");
	}
}