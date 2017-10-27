<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Is there a user who is logged in right now?
 *
 */ 
if( !function_exists('get_user_status') ){
    function get_user_status($status){
		if($status == 'pending') {
			$code =  0;
		} else if ($status == 'active') {
			$code = 1;
		} else if ($status == 'suspended') {
			$code = 2;
		} else if ($status == 'blocked') {
			$code = 3;
		}
		return $code;
    }
}


/**
 * Is there a user who is logged in right now?
 *
 */
if( !function_exists('get_balance') ){
    function get_balance(){
		$CI =& get_instance();
		$CI->load->model('user_model');
		return $CI->user_model->getBalance($CI->session->userdata('username'));
    }
}


/**
 * Is there a user who is logged in right now?
 *
 */
if( !function_exists('get_user_id') ){
    function get_user_id($username){
		$CI =& get_instance();
		$CI->load->model('admin_model');
		return $CI->admin_model->get_user_id($username);
    }
}

/**
 * Is there a user who is logged in right now?
 *
 */
if( !function_exists('get_username') ){
    function get_username($id){
		$CI =& get_instance();
		$CI->load->model('user_model');
		return $CI->user_model->get_username($id);
    }
}


/**
 * Is there a user who is logged in right now?
 *
 */
if( !function_exists('is_banned') ){
    function is_banned(){
		$CI =& get_instance();
		$id = $CI->session->userdata('id');
		$CI->load->model('user_model');
		$status = $CI->user_model->get_ban_status($id);
		return ($status == 0 ? false : true);
    }
}

/**
 * Is there a user who is logged in right now?
 *
 */
if( !function_exists('is_reseller') ){
    function is_reseller($hash){
		$CI =& get_instance();
		$CI->load->model('seller_model');
		return $CI->seller_model->is_reseller($hash);
    }
}

/**
 * Is there a user who is logged in right now?
 *
 */
if( !function_exists('get_items_purchased') ){
    function get_items_purchased(){
		$CI =& get_instance();
		$CI->load->model('user_model');
		return $CI->user_model->getItemsPurchased($CI->session->userdata('username'));
    }
}

/**
 * Is there a user who is logged in right now?
 *
 */
if( !function_exists('get_card_type') ){
    function get_card_type($number){
		$CI =& get_instance();
		$cardnum= substr($number, 0, 1); // get first number of card number
			
		if($cardnum == 5)
		{
			$cardtype = "Mastercard";
		}
		else if($cardnum == 4)
		{
			$cardtype = "Visa";
		}
		else if($cardnum == 6)
		{
			$cardtype = "Discover";
		}
		else if($cardnum == 3)
		{
			$cardtype = "Amex";
		}
		else
		{
			$cardtype = "Unknown";
		}
		
		return $cardtype;
    }
}


