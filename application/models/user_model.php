<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user_model extends CI_Model{
	
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
		$this->db->where('id',$this->session->userdata('id'));
		$query = $this->db->get('users');
		return $query->row();
	}
	
	function get_payment_profiles() {
		$this->db->where('user_id', $this->session->userdata('id'));
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
		$this->db->where('id', $this->session->userdata('id'));
		$this->db->update('users', $data);
	}
	
	function insert_payment_profile($profile)
	{
		$data = array(
               'user_id' => $profile['first_name'],
			   'payment_id' => $profile['last_name'],
			   'card_type' => $profile['phone'],
			   'card_number' => $profile['email'],
			   'created_at' => 'now()'
            );
		$this->db->insert('payment_profiles', $data); 
	}
	
	function inser_recipt($detail)
	{
		$data = array(
        'user_id' => $detail['user_id'],
        'payment_id' =>$detail['payment_id'],
        'txid' => $detail['txid'],
		'amount' =>$detail['amount'],
		'donated_at'=>now()
			);
			$this->db->insert('receipts', $data); 
			$id = $this->db->mysql_insert_id();
			return $id;
			
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
		$this->db->where('id', $this->session->userdata('id'));
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
		function recipt($id,$user,$setting){
 $msg .='
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" style="font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
<head>
<meta name="viewport" content="width=device-width" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>'.$setting->comp_name.'</title>


<style type="text/css">
img {
max-width: 100%;
}
body {
-webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none; width: 100% !important; height: 100%; line-height: 1.6em;
}
body {
background-color: #f6f6f6;
}
@media only screen and (max-width: 640px) {
  body {
    padding: 0 !important;
  }
  h1 {
    font-weight: 800 !important; margin: 20px 0 5px !important;
  }
  h2 {
    font-weight: 800 !important; margin: 20px 0 5px !important;
  }
  h3 {
    font-weight: 800 !important; margin: 20px 0 5px !important;
  }
  h4 {
    font-weight: 800 !important; margin: 20px 0 5px !important;
  }
  h1 {
    font-size: 22px !important;
  }
  h2 {
    font-size: 13px !important;
  }
  h3 {
    font-size: 16px !important;
  }
  .container {
    padding: 0 !important; width: 100% !important;
  }
  .content {
    padding: 0 !important;
  }
  .content-wrap {
    padding: 10px !important;
  }
  .invoice {
    width: 100% !important;
  }
}
</style>
</head>

<body itemscope itemtype="http://schema.org/EmailMessage" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; -webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none; width: 100% !important; height: 100%; line-height: 1.6em; background-color: #f6f6f6; margin: 0;" bgcolor="#f6f6f6">

<table class="body-wrap" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; background-color: #f6f6f6; margin: 0;" bgcolor="#f6f6f6"><tr style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><td style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;" valign="top"></td>
		<td class="container" width="600" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto;" valign="top">
			<div class="content" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; max-width: 600px; display: block; margin: 0 auto; padding: 20px;">
				<table class="main" width="100%" cellpadding="0" cellspacing="0" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; border-radius: 3px; background-color: #fff; margin: 0; border: 1px solid #e9e9e9;" bgcolor="#fff"><tr style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-wrap aligncenter" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: center; margin: 0; padding: 20px;" align="center" valign="top">
							<table width="100%" cellpadding="0" cellspacing="0" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><tr style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-block" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
										<h1 class="aligncenter" style="font-family: \'Helvetica Neue\',Helvetica,Arial,\'Lucida Grande\',sans-serif; box-sizing: border-box; font-size: 32px; color: #000; line-height: 1.2em; font-weight: 500; text-align: center; margin: 40px 0 0;" align="center">'.$setting->comp_name.'</h1>
									</td>
								</tr><tr style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-block aligncenter" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: center; margin: 0; padding: 0 0 20px;" align="center" valign="top">
										<table class="invoice" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; text-align: left; width: 80%; margin: 40px auto;"><tr style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><td style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 5px 0;" valign="top">'.$user->firstname.' '.$user->lastname.'<br style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;" />'.$user->address.'</td><td style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 5px 0; text-align: right;" valign="top">Receipt #: SR-'.$recipt['id'].'<br style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0; text-align: right;" />Date: '.date("Y-m-d").'</td>
											</tr><tr style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><td colspan="2" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 5px 0;" valign="top">
													<table class="invoice-items" cellpadding="0" cellspacing="0" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; margin: 0;"><tr style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><td style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; border-top-width: 2px; border-top-color: #eee; border-bottom-color: #eee; border-bottom-width: 1px; border-bottom-style: solid; border-top-style: solid; margin: 0; padding: 5px 0;" valign="top">Memo</td>
															<td class="alignright" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: right; border-top-width: 2px; border-top-color: #eee; border-top-style: solid; margin: 0; border-bottom-color: #eee; border-bottom-width: 1px; border-bottom-style: solid; padding: 5px 20px;" align="right" valign="top">Reference</td>
															<td class="alignright" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: right; border-top-width: 2px; border-top-color: #eee; border-top-style: solid; margin: 0; border-bottom-color: #eee; border-bottom-width: 1px; border-bottom-style: solid; padding: 5px 0;" align="right" valign="top">Amount</td>
														</tr><tr style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><td style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;" valign="top">Masjid Donation</td>
															<td class="alignright" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: right; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 20px;" align="right" valign="top">'.$recipt['txid'].'</td>
															<td class="alignright" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: right; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;" align="right" valign="top">$ '.$recipt['amount'].'</td>
														</tr><tr class="total" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="alignright" width="80%" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: right; border-top-width: 2px; border-top-color: #eee; border-top-style: solid; border-bottom-color: #eee; border-bottom-width: 2px; border-bottom-style: solid; font-weight: 700; margin: 0; padding: 5px 0;" align="right" valign="top"></td><td class="alignright" width="80%" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: right; border-top-width: 2px; border-top-color: #eee; border-top-style: solid; border-bottom-color: #eee; border-bottom-width: 2px; border-bottom-style: solid; font-weight: 700; margin: 0; padding: 5px 20px;" align="right" valign="top">Total</td>
															<td class="alignright" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: right; border-top-width: 2px; border-top-color: #eee; border-top-style: solid; border-bottom-color: #eee; border-bottom-width: 2px; border-bottom-style: solid; font-weight: 700; margin: 0; padding: 5px 0;" align="right" valign="top">$ '.$recipt['amount'].'</td>
														</tr></table></td>
											</tr></table></td>
								</tr><tr style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-block" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
										<h2 class="aligncenter" style="font-family: \'Helvetica Neue\',Helvetica,Arial,\'Lucida Grande\',sans-serif; box-sizing: border-box; font-size: 17px; color: #000; line-height: 1.2em; font-weight: 400; text-align: center; margin: 0;" align="center">Thank you for your generosity. We appreciate your support.</h2>
									</td>
								</tr>
								<tr style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-block aligncenter" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 11px; vertical-align: top; text-align: center; margin: 0; padding: 0" align="center" valign="top">
										'.$setting->comp_address.'
									</td>
								</tr><tr style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-block aligncenter" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 11px; vertical-align: top; text-align: center; margin: 0; padding: 0;" align="center" valign="top">
										'.$setting->comp_phone.'
									</td>
								</tr></table></td>
					</tr></table><div class="footer" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; clear: both; color: #999; margin: 0; padding: 20px;">
					<table width="100%" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><tr style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="aligncenter content-block" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 12px; vertical-align: top; color: #999; text-align: center; margin: 0; padding: 0 0 20px;" align="center" valign="top">Questions? Email <a href="mailto:" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 12px; color: #999; text-decoration: underline; margin: 0;">support@donatetogo.com</a></td>
						</tr></table></div></div>
		</td>
		<td style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;" valign="top"></td>
	</tr></table></body>
</html>' ;
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: ".$setting->comp_name." <noreply@donatetogo.com>" . "\r\n";
$email= $user->email;
mail($email,'Donation Receipt',$msg,$headers);
	$this->email->clear();

    $this->email->to($email);
    $this->email->from($headers);
    $this->email->subject('Donation Receipt');
    $this->email->message($msg);
    $this->email->send();
}

}
?>