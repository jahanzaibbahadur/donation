<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user_model extends CI_Model {
	
	private $user_id = null;
	
	public function __construct()
	{
		parent::__construct();
		$this->user_id = $this->session->userdata('user')['id'];
	}
	
	function get_users() {
		$query = $this->db->get('users');
		return $query->result();
	}
	
	function get_current_month_donation() {
		$this->db->where('MONTH(donated_at)', 'MONTH(CURDATE())', false);
		$this->db->where('YEAR(donated_at)', 'YEAR(CURDATE())', false);
		//$this->db->where('recurring', '0');
		$this->db->select_sum('amount');
		$query = $this->db->get('receipts');
		//echo $this->db->last_query(); exit;
		return $query->row('amount');
	}
	
	function get_current_month_recurring() {
		$this->db->where('MONTH(donated_at)', 'MONTH(CURDATE())', false);
		$this->db->where('YEAR(donated_at)', 'YEAR(CURDATE())', false);
		$this->db->where('recurring !=', '0');
		$this->db->select_sum('amount');
		$query = $this->db->get('receipts');
		//echo $this->db->last_query(); exit;
		return $query->row('amount');
	}
	
	function create_user()
	{
		$user_info = array(
          'phone_num' => $this->session->userdata('register_num'),  
          'password' => hash_password($this->input->post('password'))
		);
		$this->db->set($user_info);
        $query = $this->db->insert('users');
	}
	
	function get_userdata($phone_num){
        $this->db->where('phone_num',$phone_num);
        $query = $this->db->get('users');
        if($query->num_rows() == 1){
            return $query->row_array();
        }else return false;
    }
	
	function check_phone_num($phone_num){
        $this->db->where('phone_num',$phone_num);
        $res = $this->db->get('users');
        if($res->num_rows() == 1){
            return true;
        }else return false;
    }
	
	function get_setting() {
		$query = $this->db->get('settings');
		return $query->row();
	}
	
	function get_user() {	
		$this->db->where('id', $this->user_id);
		$query = $this->db->get('users');
		return $query->row();
	}
	
	function get_payment_profiles() {
		$this->db->where('user_id', $this->user_id);
		$query = $this->db->get('payment_profiles');
		return $query->result();
	}
	
	 function get_password($phone_num){
        $this->db->where('phone_num',$phone_num);
		//$this->db->where('is_deleted','0');
        $query = $this->db->get('users');
        if($query->num_rows() > 0){
			$result = $query->row();
			//if($result->level == '1'){
				//$this->db->where('user_id',$result->id);
				//$this->db->where('is_deleted','0');
				//if($this->db->get('reseller')->num_rows() > 0){
					return $result->password;
				}else return false;
			//}else{
			//	return $result->password;
			//}
       // }else return false;
    }
	
	function update_user() {
		$profile = $this->input->post(null, true);
		$data = array(
               'firstname' => $profile['first_name'],
			   'lastname' => $profile['last_name'],
			   'mobile' => $profile['phone'],
			   'email' => $profile['email'],
			   'address' => $profile['address'],
			   'city' => $profile['city'],
			   'state' => $profile['state'],
			   'zip' => $profile['zip']
            );
		$this->db->where('id', $this->user_id);
		$this->db->update('users', $data);
	}
	
	function insert_payment_profile($data)
	{
		$this->db->set($data);
		$this->db->set('created_at','now()',false);
		$this->db->insert('payment_profiles');
		
		return ($this->db->affected_rows() != 1) ? false : true;
	}
	
	function insert_receipt($data)
	{
		$this->db->set($data);
		$this->db->set('donated_at', 'now()', false);
		$this->db->insert('receipts', $data); 
		return $this->db->insert_id();
	}
	
		function send_sms(){
			$setting=$this->get_setting();
			$phone_num=$this->session->userdata('register_num');
$num_str = sprintf("%06d", mt_rand(1, 999999));
//$_SESSION['verify']=$num_str;
$this->session->set_userdata('verify',$num_str);
$sender_number=$setting->sender_number;
$data = array(
		"from"=> $sender_number,
		"to"=> $phone_num,
        "text"=> $num_str
		);

		//$username=SMS_user;
		$username=$setting->SMS_user;
		//$password=SMS_Password;
		$password=$setting->SMS_password;
		//$url =SMS_url;
		$url =$setting->SMS_url;
$str_data = json_encode($data);

  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");  
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);
$headers= array('Accept: application/json','Content-Type: application/json'); 
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($ch, CURLOPT_POSTFIELDS,$str_data);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
  $result = curl_exec($ch);
  curl_close($ch);  // Seems like good practice
  //return $result;
  return true;
}
//donation

	public function update_profile_id($profileid){
		$data = array(
				   'profileid' => $profileid 
				);
		$this->db->where('id', $this->user_id);
		$this->db->update('users', $data);
	}
	
	function email_verification($email){
		$setting=$this->get_setting();
		$email_hash=$email;
		$token=substr($email_hash,-12);
		insert_verify($token);
		$target_url="login.php?e=".$token;
		$url = (isset($this->input->$_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		$url=str_replace('creatcustomerprofile.php',$target_url,$url);
		
		$msg = "Hello!\nThank you for registering at". $setting->comp_name ." To verify your email\n Please click the following\n".$url;

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
//mail($email,comp_name,$msg);
 $this->email->clear();

    $this->email->to($email);
    $this->email->subject($setting->comp_name);
    $this->email->message($msg);
    $this->email->send();
		
		//echo $url;
	}

}
?>