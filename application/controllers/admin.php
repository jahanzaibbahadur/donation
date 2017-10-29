<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
	}
	
	private function is_login() {
		if(is_admin_logged_in()){
			redirect('admin/');
			$level = $this->session->userdata('admin')['level'];
			if($level == 2 || $level == 3){
				
			}
		}
	}
	
	function login()
	{	
		$this->is_login();
		if($this->input->method() == 'post'){
			
			$config = array(
							array(
									'field'=>'username',
									'label'=>'Username',
									'rules'=>'required'
							),
							array(
									'field'=>'password',
									'label'=>'Password',
									'rules'=>'required|callback_password_check['.$this->input->post('username').']'
							)
                );

			$this->form_validation->set_rules($config);
			$this->form_validation->set_error_delimiters('<li>', '</li>');
			
			if($this->form_validation->run()==TRUE){
				$userdata = $this->admin_model->get_userdata($this->input->post('username'));
				$userdata['email'] = $userdata['email'];
				//$this->admin_model->insert_login_activity($userdata['id']);
				$userdata['is_logged_in'] = true;
				$this->session->set_userdata(array('admin'=>$userdata));
				
				$response['url'] = 'admin/';
				
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
		$data['content'] = 'admin/loginn';
		$this->load->view('admin/layoutn', $data);
	}
	
	function forgot($hash=false){
		$this->is_login();
		$data['recovery'] = false;
		if($hash){
			if(true || is_sha1($hash) && $this->admin_model->check_hash($hash)){
				$data['recovery'] = true;
				if($this->input->method() == 'post'){
					$config = array(		
									array(
										'field'=>'password',
										'label'=>'New Password',
										'rules'=>'required'
									),
									array(
										'field'=>'cpassword',
										'label'=>'Confirm Password',
										'rules'=>'required|matches[password]'
									)
								);
								
					$this->form_validation->set_rules($config);
					$this->form_validation->set_error_delimiters('<li>', '</li>');
					
					if($this->form_validation->run($this)==TRUE){
						if($this->admin_model->forgot_password_update($hash, hash_password($this->input->post('password')))){
							$response['status'] = 'success';
							$response['msg'] = '<div class="alert alert-success"><button class="close" data-close="alert"></button><strong>Success!</strong> Password updated successfully. You can now login with new password.</div>';
						}
					}else{
						$response['status'] = 'errors';
						$response['msg'] = '<div class="alert alert-danger"><button class="close" data-close="alert"></button>'. validation_errors() .'</div>';
					}
				}else{
					$this->load->view('login', $data);
				}
			}else{
				redirect('/');
			}
		}else if($this->input->method() == 'post'){
			$config = array(
							array(
								'field'=>'username',
								'label'=>'Username',
								'rules'=>'required|callback_username_exist'
							)
						);
			$this->form_validation->set_rules($config);
			$this->form_validation->set_error_delimiters('<li>', '</li>');
		
			if($this->form_validation->run()==TRUE){
				if($data = $this->admin_model->forgot_password_hash()){
					$message = $this->load->view('emails/forgot',
													array(
														'username'=>$this->input->post('username'),
														'hash'=>$data['hash']
													),
													true
												);
					send_our_mail(decrypt($data['email']),'Cyco Market Password Recovery',$message);
					$response['status'] = 'success';
					$response['msg'] = '<div class="alert alert-success"><button class="close" data-close="alert"></button><strong>Success!</strong> Please check your email for recovery of your account.</div>';
				}
			}else{
				$response['status'] = 'errors';
				$response['msg'] = '<div class="alert alert-danger"><button class="close" data-close="alert"></button>'. validation_errors() .'</div>';
			}
			$response['token'] = $this->security->get_csrf_hash();
			echo json_encode($response);
			exit;
		}
		$data['content'] = 'admin/forgot';
		$this->load->view('admin/layout', $data);
	}
	
	function logout()
	{
		destroy_admin_session();
	}
	
	function register()
	{
		$this->is_login();
		if($this->input->method() == 'post'){			
			$config = array(
							array(
									'field'=>'username',
									'label'=>'Username',
									'rules'=>'required|callback_username_check'
							),
							array(
									'field'=>'password',
									'label'=>'Password',
									'rules'=>'required'
							),
							array(
									'field'=>'cpassword',
									'label'=>'Confirm Password',
									'rules'=>'required|matches[password]'
							),
							array(
									'field'=>'email',
									'label'=>'Email',
									'rules'=>'required|valid_email|callback_email_check'
							),
							array(
									'field'=>'agreement',
									'label'=>'Agreement',
									'rules'=>'required'
							)
                );
                $this->form_validation->set_rules($config);
                $this->form_validation->set_error_delimiters('<li>', '</li>');
            
                if($this->form_validation->run()==TRUE){
					if($activation_hash = $this->admin_model->create_user()){
						$message = $this->load->view('emails/registration',
														array(
															'username'=>$this->input->post('username'),
															'hash'=>$activation_hash
														),
														true
													);
						//send_our_mail($this->input->post('email'),'Thug Tool Activation Email',$message);
						$response['status'] = 'success';
						$response['msg'] = '<div class="alert alert-success"><button class="close" data-close="alert"></button><strong>Success</strong> Registration successfull. Please login with your account.</div>';
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
		$data['content'] = 'admin/register';
		$this->load->view('admin/layoutn', $data);
	}
	
	public function activate($hash){
		if(is_sha1($hash)){
			$this->admin_model->activate_account($hash);
		}else{
			echo 'Invalid Hash';
		}
		redirect('login');
	}
	
	public function username_exist($username)
	{
		if ($this->admin_model->check_username($username))
		{ 
			return true;
		}
		else
		{
			$this->form_validation->set_message('username_exist', 'The {field} is not exist.');
			return FALSE;
		}
	}
	
	public function username_check($username)
	{
		if ($this->admin_model->check_username($username))
		{ 
				$this->form_validation->set_message('username_check', 'The {field} already exist.');
				return FALSE;
		}
		else
		{
				return TRUE;
		}
	}
	
	public function email_check($email)
	{
		if ($this->admin_model->check_email($email))
		{
			$this->form_validation->set_message('email_check', 'The {field} already exist.');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
	public function password_check($password, $username)
	{
		if ($hash = $this->admin_model->login($username))
		{
			if(verify_password($password, $hash)){
				if($this->admin_model->is_active($username)){
					if($this->admin_model->is_banned($username)){
						$this->form_validation->set_message('password_check', 'The Account is banned you cannot login.');
						return FALSE;
					}else{
						return TRUE;
					}
				}else{
					$this->form_validation->set_message('password_check', 'The Account is not active. Please check your email and activate your account.');
					return FALSE;
				}
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
	
}
