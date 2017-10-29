<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('authorize');
		$this->load->helper('auth_helper');
		$this->load->model('user_model');
	}
	
	private function is_register() {
		if($this->session->has_userdata('register_num')&&$this->session->has_userdata('verification'))
		 {
			redirect('security_pin');
		 }else if($this->session->has_userdata('register_num'))
		 {
			 redirect('verification');
		 } 
	}
	private function is_verification() {
		 if($this->session->has_userdata('register_num')&&$this->session->has_userdata('verification'))
		 {
			redirect('security_pin');
		 }else if(!$this->session->has_userdata('register_num'))
		 {
			 redirect('register');
		 }
	}
	private function is_security_pin() {
		if($this->session->has_userdata('register_num')&&!$this->session->has_userdata('verification'))
		 {
			redirect('verification');
		 }else if(!$this->session->has_userdata('register_num'))
		 {
			 redirect('register');
		 }
	}
	public function resend_verification()
	{	
		if($this->session->has_userdata('register_num')&&!$this->session->has_userdata('verification'))
		{
			$this->user_model->send_sms();
			$data['content'] = 'user/verification';
		$this->load->view('user/layout', $data);
		}else
		{
			redirect('verification');
		}
		
	}
	public function Profile()
	{	
		if(!is_logged_in()) {
			redirect('login');
		}
		if($this->input->method() == 'post'){
			
			if($this->input->post('action') == 'update_profile') {
				$this->session->set_userdata('update_profile', 'update');
				exit;
			}
			
			if($this->input->post('action') == 'profile' && $this->session->userdata('update_profile') == 'update') {
				$config = array(
								array(
										'field'=>'first_name',
										'label'=>'first_name',
										'rules'=>'required'
								),
								array(
										'field'=>'last_name',
										'label'=>'last_name',
										'rules'=>'required'
								),
								array(
										'field'=>'phone',
										'label'=>'phone',
										'rules'=>'required'
								),
								array(
										'field'=>'email',
										'label'=>'email',
										'rules'=>'required'
								),
								array(
										'field'=>'address',
										'label'=>'address',
										'rules'=>'required'
								),
								array(
										'field'=>'city',
										'label'=>'city',
										'rules'=>'required'
								),
								array(
										'field'=>'state',
										'label'=>'state',
										'rules'=>'required'
								),
								array(
										'field'=>'zip',
										'label'=>'zip',
										'rules'=>'required'
								),
								
					);
				
				$this->form_validation->set_rules($config);
				$this->form_validation->set_error_delimiters('<li>', '</li>');
				if($this->form_validation->run()==true){
					$this->user_model->update_user();
					$user = $this->user_model->get_user();
					$setting=$this->user_model->get_setting();
					
					$authorize = new Authorize();
					$response = $authorize->CreateCustomerProfile($user,$setting);
					
					if($payment_profiles_count > 0){
						$payment_profiles = $this->user_model->get_payment_profiles();
						foreach($payment_profiles as $profile) {
							$authorize->updateCustomerPaymentProfile($user,$profile,$setting);
						}
					}
					
					
					$response['url'] = '/';
					
					$response['status'] = 'success';
					$response['msg'] = '<div class="alert alert-success"><button class="close" data-close="alert"></button><strong>Success!</strong> Login successfull.</div>';
				}else{
					$response['status'] = 'error';
					$response['msg'] = '<div class="alert alert-danger"><button class="close" data-close="alert"></button>'. validation_errors() .'</div>';
				}
				$response['token'] = $this->security->get_csrf_hash();
				echo json_encode($response);
				exit;
			} else if($this->input->post('action') == 'profile') {
				$user = $this->user_model->get_user();
				
				if($user->profileid == '') {
					$config = array(
								array(
										'field'=>'first_name',
										'label'=>'first_name',
										'rules'=>'required'
								),
								array(
										'field'=>'last_name',
										'label'=>'last_name',
										'rules'=>'required'
								),
								array(
										'field'=>'phone',
										'label'=>'phone',
										'rules'=>'required'
								),
								array(
										'field'=>'email',
										'label'=>'email',
										'rules'=>'required'
								),
								array(
										'field'=>'address',
										'label'=>'address',
										'rules'=>'required'
								),
								array(
										'field'=>'city',
										'label'=>'city',
										'rules'=>'required'
								),
								array(
										'field'=>'state',
										'label'=>'state',
										'rules'=>'required'
								),
								array(
										'field'=>'zip',
										'label'=>'zip',
										'rules'=>'required'
								),
								
					);
				
					$this->form_validation->set_rules($config);
					$this->form_validation->set_error_delimiters('<li>', '</li>');
					if($this->form_validation->run()==true){
						$this->user_model->update_user();
						$user = $this->user_model->get_user();
						$setting=$this->user_model->get_setting();
						
						$authorize = new Authorize();
						$response = $authorize->CreateCustomerProfile($user,$setting);
						
						if($response['status'] == 'success') {
							$this->user_model->update_profile_id($response['profile_id']);
						}
						
						$response['url'] = '/';
						
						$response['status'] = 'success';
						$response['msg'] = '<div class="alert alert-success"><button class="close" data-close="alert"></button><strong>Success!</strong> Login successfull.</div>';
					}else{
						$response['status'] = 'error';
						$response['msg'] = '<div class="alert alert-danger"><button class="close" data-close="alert"></button>'. validation_errors() .'</div>';
					}
					$response['token'] = $this->security->get_csrf_hash();
					echo json_encode($response);
					exit;
				} else {
					$response['status'] = 'success';
					$response['msg'] = '<div class="alert alert-success"><button class="close" data-close="alert"></button><strong>Success!</strong> Login successfull.</div>';
					echo json_encode($response);
					exit;
				}
			}
		}
		
		$data['user'] = $this->user_model->get_user();
		$data['content'] = 'donation/donation';
		$this->load->view('donation/layout', $data);
	}
	
	public function update_profile()
	{
		$a = new Authorize();	
		
		$payment_profiles_count = $this->user_model->get_payment_profiles_count();
		if($payment_profiles_count > 0){
			$payment_profiles = $this->user_model->get_payment_profiles();
			foreach($payment_profiles as $profile) {
				$a->updateCustomerPaymentProfile($user,$profile,$setting);
			}
		}
	}
	function my_donation_confirm()
	{
		$data['payment_profiles']=$this->user_model->get_payment_profiles();	
		$data['setting']=$this->user_model->get_setting();
		$data['content'] = 'donation/my_donation_confirm';
		$this->load->view('donation/layout', $data);
	}
	function charge_donation()
	{	$card_details=$this->input->post();
		$a = new Authorize();
		$user=$this->user_model->get_user();
		$setting=$this->user_model->get_setting();
		$payment_profiles_count =$this->user_model->get_payment_profiles_count();
		$charge_type = $card_details['card_type'];
	if($payment_profiles_count > 0 && $charge_type == 'existing') {
		$payment_id = $this->input->post('payment_profile');
		
		$a->charge_card($user, $payment_id,$user, $setting);
	} else { 
		$response = $a->createCustomerPaymentProfile($user,$card_details,$setting);
		if($response['status']){
			charge_card($user, $response['payment_id'],$user, $setting);
		}
	}
	}
	public function thankyou()
	{
		$data['content'] = 'donation/thankyou';
		
		$this->load->view('donation/layoutd', $data);
	}
	
	public function login()
	{	
		if(is_logged_in()) {
			redirect('/');
		}
		if($this->input->method() == 'post'){
			
			$config = array(
							array(
									'field'=>'phone_num',
									'label'=>'phone_num',
									'rules'=>'required'
							),
							array(
									'field'=>'password',
									'label'=>'Password',
									'rules'=>'required|callback_password_check['.$this->input->post('phone_num').']'
							)
                );

			$this->form_validation->set_rules($config);
			$this->form_validation->set_error_delimiters('<li>', '</li>');
			if($this->form_validation->run()==true){
				$userdata = $this->user_model->get_userdata($this->input->post('phone_num'));
				$userdata['is_logged_in'] = true;
				$this->session->set_userdata(array('user' => $userdata));
				
				$response['url'] = '/';
				
				$response['status'] = 'success';
				$response['msg'] = '<div class="alert alert-success"><button class="close" data-close="alert"></button><strong>Success!</strong> Login successfull.</div>';
			}else{
				$response['status'] = 'error';
				$response['msg'] = '<div class="alert alert-danger"><button class="close" data-close="alert"></button>'. validation_errors() .'</div>';
			}
			$response['token'] = $this->security->get_csrf_hash();
			echo json_encode($response);
			exit;
		}
		$data['content'] = 'user/login';
		$this->load->view('user/layout', $data);
		
	}
	public function register()
	{
		if(is_logged_in()) {
			redirect('/');
		}
		$this->is_register();
		if($this->input->method() == 'post'){			
			$config = array(
							array(
									'field'=>'phone_num',
									'label'=>'phone_num',
									'rules'=>'required|callback_phone_num_check'
							)
                );
                $this->form_validation->set_rules($config);
                $this->form_validation->set_error_delimiters('<li>', '</li>');
            
                if($this->form_validation->run()==TRUE){
					if(true){
					
			
						//send_our_mail($this->input->post('email'),'Thug Tool Activation Email',$message);
				$this->session->set_userdata('register_num',$this->input->post('phone_num'));
				$this->user_model->send_sms();
						$response['status'] = 'success';
						$response['msg'] = '<div class="alert alert-success"><button class="close" data-close="alert"></button><strong>Success</strong>Number registered successfull. Please complete the process.</div>';
					}else{
						$response['status'] = 'failed';
						$response['msg'] = '<div class="alert alert-danger"><button class="close" data-close="alert"></button><strong>Failed!</strong> Registration failed please try again.</div>';
					}
				}else{
					$response['status'] = 'errors';
					$response['msg'] = '<div class="alert alert-danger"><button class="close" data-close="alert"></button>'. validation_errors() .'</div>';
				}
				$response['token'] = $this->security->get_csrf_hash();
				echo json_encode($response);
				exit;
		}
		$data['content'] = 'user/register';
		$this->load->view('user/layout', $data);
		
	}
	public function verification()
	{	if(is_logged_in()) {
			redirect('/');
		}
		$this->is_verification();
		if($this->input->method() == 'post'){			
			$config = array(
							array(
									'field'=>'verification_code',
									'label'=>'verification_code',
									'rules'=>'required|callback_verification_code_check'
							)
							
                );
                $this->form_validation->set_rules($config);
                $this->form_validation->set_error_delimiters('<li>', '</li>');
            
                if($this->form_validation->run()==TRUE){
					if(true){
				$this->session->set_userdata('verification',true);
						$response['status'] = 'success';
						$response['msg'] = '<div class="alert alert-success"><button class="close" data-close="alert"></button><strong>Success</strong>Verification code is correct.</div>';
					}else{
						$response['status'] = 'failed';
						$response['msg'] = '<div class="alert alert-danger"><button class="close" data-close="alert"></button><strong>Failed!</strong> Verification code not match  please try again.</div>';
					}
				}else{
					$response['status'] = 'errors';
					$response['msg'] = '<div class="alert alert-danger"><button class="close" data-close="alert"></button>'. validation_errors() .'</div>';
				}
				$response['token'] = $this->security->get_csrf_hash();
				echo json_encode($response);
				exit;
		}
		$data['content'] = 'user/verification';
		$this->load->view('user/layout', $data);
		
	}
	public function security_pin()
	{ 	
		if(is_logged_in()) {
			redirect('/');
		}
		$this->is_security_pin();
		if($this->input->method() == 'post')
		{
			$config = array(
							array(
									'field'=>'password',
									'label'=>'password',
									'rules'=>'required|callback_security_pin_length_check'
							)
                );
				$this->form_validation->set_rules($config);
                $this->form_validation->set_error_delimiters('<li>', '</li>');
            
                if($this->form_validation->run()==TRUE){
					$this->user_model->create_user();
					if(true){
						$this->session->sess_destroy();
						$response['status'] = 'success';
						$response['msg'] = '<div class="alert alert-success"><button class="close" data-close="alert"></button><strong>Success</strong>  Registration successfull.</div>';
					}else{
						$response['status'] = 'failed';
						$response['msg'] = '<div class="alert alert-danger"><button class="close" data-close="alert"></button><strong>Failed!</strong> Registration failed please try again.</div>';
					}
				}else{
					$response['status'] = 'errors';
					$response['msg'] = '<div class="alert alert-danger"><button class="close" data-close="alert"></button>'. validation_errors() .'</div>';
				}
				$response['token'] = $this->security->get_csrf_hash();
				echo json_encode($response);
				exit;
		}
		$data['content'] = 'user/security_pin';
		$this->load->view('user/layout', $data);
		
	}
	
	public function logout() {
		$this->session->sess_destroy();
		redirect('login');
	}
	
	public function password_check($password, $username)
	{
		if ($hash = $this->user_model->get_password($username))
		{
			if(verify_password($password, $hash)){
				return TRUE;
			}else{
				$this->form_validation->set_message('password_check', 'The {field} is invalid.');
				return FALSE;
			}
		}
		else
		{
			$this->form_validation->set_message('password_check', 'The Username doesnot exist.');
			return FALSE;
		}
	}
	public function phone_num_check($phone_num)
	{	
		if ($this->user_model->check_phone_num($phone_num))
		{ 
				$this->form_validation->set_message('phone_num_check', 'The {field} already exist.');
				return FALSE;
		}
		else
		{
				return TRUE;
		}
	}
	public function verification_code_check($verification_code)
	{			$code=$this->session->userdata('verify');
		if($verification_code==$code)
		{
			return true;
		}else{
			$this->form_validation->set_message('verification_code_check', 'The verification code not match.please try again');
			return false;
		}
	}
	public function security_pin_length_check($security_pin)
	{
		if(strlen($security_pin)<4){
			$this->form_validation->set_message('security_pin_length_check', 'The security pin must contain 4 digits');
			return false;
		}else{
			return true;
		}
		
	}

}
