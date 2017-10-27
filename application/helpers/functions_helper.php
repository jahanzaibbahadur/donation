<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if( !function_exists('account') ){
    function account(){
        global $CI;
        
        if( $CI->session->userdata('phone') && $CI->session->userdata('activated') == 1  ){
            $out = anchor('m/options', 'Account', array('data-rel' => "dialog", 'data-icon' => "gear", 'data-theme' => "b", 'class' => "ui-btn-right"));
        } elseif( $CI->session->userdata('phone') && $CI->session->userdata('activated') != 1 ){
            $out = anchor("m/activate_account", "Activate account", array("data-icon" => "info", "class" => "ui-btn-right", "class" => "attention"));
        } else{
            $out = anchor("m/login_page", "Login/Sign Up", array("data-icon" => "info", "data-theme" => "b", "class" => "ui-btn-right"));
        }
        
        
        echo $out;
    }
}

if(!function_exists('unitxid')){
	function unitxid(){
		$CI =& get_instance();
		return md5(time() . mt_rand(1,100000));
	}
}

if( !function_exists('get_total_accounts') ){
    function get_total_accounts(){
        $CI =& get_instance();
        $CI->load->model('account_model');
		return $CI->account_model->get_accounts_count();
    }
}

if( !function_exists('get_total_stuffs') ){
    function get_total_stuffs(){
        $CI =& get_instance();
        $CI->load->model('account_model');
		return $CI->account_model->get_stuffs_count();
    }
}

if( !function_exists('get_total_cards') ){
    function get_total_cards(){
        $CI =& get_instance();
        $CI->load->model('card_model');
		return $CI->card_model->get_cards_count();
    }
}

if( !function_exists('get_ip_invalid_attempts') ){
    function get_ip_invalid_attempts(){
        $CI =& get_instance();
        $CI->load->model('auth_model');
		return $CI->auth_model->get_ip_invalid_attempts();
    }
}

if( !function_exists('set_ip_invalid_attempts') ){
    function set_ip_invalid_attempts(){
        $CI =& get_instance();
        $CI->load->model('auth_model');
		return $CI->auth_model->set_ip_invalid_attempts();
    }
}

if( !function_exists('get_accounts_countries') ){
    function get_accounts_countries($cat){
        $CI =& get_instance();
        $CI->load->model('account_model');
		return $CI->account_model->get_countries($cat);
    }
}

if( !function_exists('get_accounts_types') ){
    function get_accounts_types($cat){
        $CI =& get_instance();
        $CI->load->model('account_model');
		return $CI->account_model->get_types($cat);
    }
}

if( !function_exists('get_accounts_resellers') ){
    function get_accounts_resellers($cat){
        $CI =& get_instance();
        $CI->load->model('account_model');
		return $CI->account_model->get_resellers($cat);
    }
}

if( !function_exists('get_cards_countries') ){
    function get_cards_countries(){
        $CI =& get_instance();
        $CI->load->model('card_model');
		return $CI->card_model->get_countries();
    }
}

if( !function_exists('get_cards_states') ){
    function get_cards_states(){
        $CI =& get_instance();
        $CI->load->model('card_model');
		return $CI->card_model->get_states();
    }
}

if( !function_exists('get_cards_types') ){
    function get_cards_types(){
        $CI =& get_instance();
        $CI->load->model('card_model');
		return $CI->card_model->get_types();
    }
}

if( !function_exists('get_cards_bases') ){
    function get_cards_bases(){
        $CI =& get_instance();
        $CI->load->model('card_model');
		return $CI->card_model->get_bases();
    }
}

if( !function_exists('get_cards_resellers') ){
    function get_cards_resellers(){
        $CI =& get_instance();
        $CI->load->model('card_model');
		return $CI->card_model->get_resellers();
    }
}

if( !function_exists('is_sha1') ){
	function is_sha1($str) {
		return (bool) preg_match('/^[0-9a-f]{40}$/i', $str);
	}
}

if( !function_exists('csrf_token') ){
    function csrf_token(){
		$CI =& get_instance();
        return '<input type="hidden" name="'.$CI->security->get_csrf_token_name().'" value="'.$CI->security->get_csrf_hash().'" />';
    }
}

if( !function_exists('site_settings') ){
    function site_settings(){
		$CI =& get_instance();
		$query = $CI->db->get('settings');
        return $query->row();
    }
}
		

if( !function_exists('back_button') ){
    function back_button(){
        echo anchor("#", "Go back", array("data-rel" => "back", "data-icon" => "arrow-l", "data-theme" => "a"));
    }
}

if( !function_exists('encrypt_password') ){
    function encrypt_password($password){
        $salt = '%&(hbm@@6578';
        return md5(crypt($password,  $salt));
    }
}

/**
 * User Identification hash
 * Never allow users to easily figure out what you're internally using
 * to identify them in your app
 * @example Instead of http://example.com/users/0244966408
 * Use http://example.com/users/3de43wde34f or better still, request for a username
 *
 */
if( !function_exists('user_id') ){
    function user_id($phone){
        /**
         * Generate a unique 10 character hash to identify a user
         * using his phone number
         */
        return substr( encrypt_password($phone), 20, 10 );
    }
}

if( !function_exists('random_key') ){
	function random_key($length) {
		$pool = array_merge(range(0,9),range('a','z'), range('A', 'Z'));
		$key = '';
		for($i=0; $i < $length; $i++) {
			$key .= $pool[mt_rand(0, count($pool) - 1)];
		}
		return $key;
	}
}

if( !function_exists('get_business_info') ){
    function get_business_info($key, $business_id = ""){
        global $CI;        
        
        // map the key passed to the helper onto its column name
        // this prevents the case where you explicitly have to provide
        // a column name for the info needed
        switch( $key ){
            case 'type':
                $key = 'business_type';
                break;
            case '':
                break;
        }
        
        
        return $CI->app->get_business_info($business_id, $key);
    }
}

if( !function_exists('send_txt') ){
    function send_txt($to, $msg){
        $API_KEY = "98e7bbcf60f61b84d717";
        $URL = "http://bulk.mnotification.com/smsapi?key=$API_KEY&to=$to&msg=$msg&sender_id=Cofred";
        
        $result = file_get_contents($URL);
        
        if( $result == "1000" ){
            return true;
        } else return $result;
    }
}

if( !function_exists('send_our_mail') ){
    function send_our_mail($email,$subject,$message,$type=NULL){
		$CI =& get_instance();
		$config=
			array(
				'protocol' => 'smtp',
				'smtp_host'=>'smtp.mailgun.org',
				'smtp_port'=>465,
				'_smtp_auth'=>true, 
				'smtp_user'=>'postmaster@thugtools.io',
				'smtp_pass'=>'36ab8d4bc2715c9bd1e0445a2ebeea2d',  
				'smtp_crypto'=>'ssl',
				'mailtype'=>'html', 
				'charset'=>'utf-8',
				'validate'=>true
				);
		$CI->email->initialize($config);
		$CI->email->set_newline("\r\n");
        $CI->email->from('noreply@cycomarket.ru', 'Cyco Market');
        /*if($type == "withdrawal"){
            $this->email->cc('w.orders@cofred.com');
        }elseif($type == "funding"){
            $this->email->cc('f.orders@cofred.com');
        }elseif($type =="funding_auto"){
            $this->email->cc('c.request@cofred.com');
        }*/ 
        $CI->email->to($email);
        $CI->email->set_mailtype("html");
        $CI->email->subject($subject);
        $CI->email->message($message);
        if($CI->email->send()){
			
		}else{

            //echo "fail<br>";
            //echo "m=".mail("deb.pratyush@gmail.com", $subject, $msg)."<br>";
            //echo $CI->email->print_debugger(); exit;
        }
    }
}

//------------------------------------------------------------------------//

/**
 * Functions moved from application/controllers/functions.php
 *
 */

/**
* msgBox function to alert user messages
* @param type,msg
* @access public
*/
function message_box() {
	$typ=message_type();$mes = message(); $title = message_title();
	if(!empty($typ) && !empty($mes) && !empty($title)) {
		echo "<div class=\"alert alert-$typ\"><strong>$title</strong> $mes</div>";
	}
}

/**
* function to set message
*/ 
function message($msg="") {
    $CI =& get_instance();
  if(!empty($msg)) {
	$CI->session->set_flashdata('message', $msg);
  } else {
	return $CI->session->flashdata('message');
  }
}

function message_title($title="") {
    $CI =& get_instance();;
  if(!empty($title)) {
	$CI->session->set_flashdata('title', $title);
  } else {
	return $CI->session->flashdata('title');
  }
}

/**
* function to set message type
*/
function message_type($typ="") {
    $CI =& get_instance();;
  if(!empty($typ)) { 
	$CI->session->set_flashdata('msg_type', $typ);
  } else {
	return $CI->session->flashdata('msg_type');
  }
}


//function to convert a php object to an associative array
function object_to_array($data) 
{
  if(is_array($data) || is_object($data)) //check if it is an object or an array
  {
    $result = array(); //initialize array to store values after conversion
    foreach($data as $key => $value)
    { 
      $result[$key] = object_to_array($value); 
    }
    return $result;
  }
  return $data;
}
/**
 * Function to convert mysql resource to associative array
 */
function resource_to_array($resource){
	global $db;
		$obj_arr = array ();
		while ( $row = $db->fetch_array ( $resource ) ) {
			$obj_arr [] = $row;
		}
		return $obj_arr;
}
/**
 * Functions for validation
 */
	function validateString($string,$lenght){
		//if it's NOT valid
		if(strlen($string) < $lenght)
			return false;
		//if it's valid
		else
			return true;
	}
	function validateEmail($email){
		return ereg("^[.a-zA-Z0-9]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$", $email);
	}
	function validateNumber($number){
		//if it's NOT valid
		if(!is_numeric($number))
			return false;
		//if it's valid
		else
			return true;
	}
	function check_reg_det($phone){
		global $db;
		$rs =  $db->query( "SELECT * FROM user_login WHERE phone={$phone} LIMIT 1" );
		if(mysql_num_rows($rs) >= 1){
			return true;
		}else{
			return false;
		}
	}
/**
 *	Function to send email messages
 */
function mail_msg($to,$subject,$message){
	$headers="From mNotify <no-reply@mnotify.com>";
	if(mail($to,$subject,$message,$headers))
		return true;
}
/**
 * Function to send out sms messages and return response
 */
function send_sms($phone,$message){
    //construct message body 
    $sms_body = $phone."&msg=".urlencode($message);
    //pass parameters to api url
    $url ="#".$sms_body;
    //call url and fetch the response code 
    $result = file_get_contents($url);
    //return response message/code
    return $result;
}

/**
 * Function to return appropriate phone number for sending out sms message
 */
function format_phone_number($phone){
	if((substr($phone,0,1)==0) &&(strlen($phone)==10)){ //if number begins with a zero e.g 0248495454, remove zero and place 233 infrot of it
		//return str_replace("0","233",$phone);
		return substr_replace($phone,"233",0,1);
		//die(substr_replace($phone,"233",0,1));
	}elseif((substr($phone,0,1)!=0)&&(strlen($phone)==9)){ //if number does not begin with a zero and length is 9
		return "233".$phone;
	}elseif((substr($phone,0,3)=="233")&&(strlen($phone)==12)){ //if number begin with 233 and length is 12
		return $phone;
	}else{
		return $phone;
	}
}

//function to return current date and time
function my_date_time(){
	date_default_timezone_set("Europe/London");
	return strftime("%Y-%m-%d %H:%M:%S", time());
}

/**
* Function to format date in more human readable format
**/
function datetime_to_text($datetime="") {
  $unixdatetime = strtotime($datetime);//at %I:%M %p
  return strftime("%B %d, %Y ", $unixdatetime);
}

// smart strsub word wrap
function smartsubstr($sText, $iMaxLength, $sMessage)
{
  if (strlen($sText) > $iMaxLength)
  {
      $sString = wordwrap($sText, ($iMaxLength-strlen($sMessage)), '[cut]', 1);
      $asExplodedString = explode('[cut]', $sString);
      
      $sCutText = $asExplodedString[0];
      
    $sReturn = $sCutText.$sMessage;
  }
  else
  {
      $sReturn = $sText;
  }
  
  return $sReturn;
}

/**
 * Display account transaction
 */
function trans_type($type){
    if($type==1){
        echo "Credit";
    }elseif($type==2){
        echo "Debit";
    }
}

/**
 * Display transaction status
 */
function trans_status($status){
    switch($status){
        case 0:
            echo "Pending";
            break;
        case 1:
            echo "Completed";
            break;
        case 2:
            echo "Rejected";
            break;
        Case 3:
            echo "Cancel";
            break;
        default:
            echo "Pending";
    }
}

/**
 * Get css class for transaction type
 */
function get_css($type,$status){
    if($status==0 || $status==2 || $status==3){
        echo "pending";
    }else{
        if($type == "Withdrawal" || $type == "Debit" || $type == "Purchase"){
            echo "withdrawal";
        }elseif($type == "Deposit" || $type == "Credit" || $type == "Receive"){
            echo "deposit";
        }elseif($type == "Transfer"){
            echo "transfer";
        }
    }
}
