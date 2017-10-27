<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Is there a user who is logged in right now?
 *
 */
if( !function_exists('encrypt') ){
    function encrypt($data){
		$CI =& get_instance();
		return $CI->encryption->encrypt($data);
    }
}

/**
 * Is there a user who is logged in right now?
 *
 */
if( !function_exists('decrypt') ){
    function decrypt($data){
		$CI =& get_instance();
		return $CI->encryption->decrypt($data);
    }
}

/**
 * Is there a user who is logged in right now?
 *
 */
if( !function_exists('generate_key') ){
    function generate_key($char=16){
		$CI =& get_instance();
		return $key = bin2hex($CI->encryption->create_key($char));
    }
}

/**
 * Is there a user who is logged in right now?
 *
 */
if( !function_exists('get_encryption_key') ){
    function get_encryption_key(){
		$CI =& get_instance();
		return $CI->config->item('encryption_key');
    }
}