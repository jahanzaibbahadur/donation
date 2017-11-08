<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminb extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('admin_model');
		$this->load->model('user_model');
		$this->load->model('donation_model');
		
		if(!is_admin_logged_in()){
			redirect('admin/login');
		}
	}
	
	public function dashboard()
	{ 	
		$data['users'] = $this->user_model->get_users();
		$data['current_month_donation'] = $this->user_model->get_current_month_donation();
		$data['monthly_recurring_donation'] = $this->user_model->get_current_month_recurring();
		$data['receipts'] = $this->donation_model->get_receipts();
		$data['payment_profiles'] = $this->donation_model->get_payment_profiles();
		$data['last_20_receipts'] = $this->donation_model->last_20_receipts();
		
		$data['menu'] = 'dashboard';
		$data['content'] = 'admin_panel/dashboard';
		$this->load->view('admin_panel/main_layout', $data);
	}
	
	public function users() {
		$data['users'] = $this->user_model->get_users();
		$data['menu'] = 'users';
		$data['content'] = 'admin_panel/users';
		$this->load->view('admin_panel/main_layout', $data);
	}
	
	public function payment_profiles() {
		$data['payment_profiles'] = $this->donation_model->get_payment_profiles();
		$data['menu'] = 'payment_profiles';
		$data['content'] = 'admin_panel/payment_profiles';
		$this->load->view('admin_panel/main_layout', $data);
	}
	
	public function donation_receipts() {
		$data['receipts'] = $this->donation_model->get_receipts();
		$data['menu'] = 'donation_receipts';
		$data['content'] = 'admin_panel/receipts';
		$this->load->view('admin_panel/main_layout', $data);
	}
	
	public function settings() {
		
		if($this->input->method() == 'post') {
			if($this->admin_model->update_settings()) {
				echo json_encode(array('status'=>'success','msg'=>'Update Successfull'));
			}else {
				echo json_encode(array('status'=>'failed','msg'=>'Something bad happened'));
			}
			exit;
		}
		
		$data['settings'] = $this->admin_model->get_settings();
		$data['menu'] = 'settings';
		$data['content'] = 'admin_panel/settings';
		$this->load->view('admin_panel/main_layout', $data);
	}
	
	public function profile() {
		
		if($this->input->method() == 'post') {
			
			$config = array(
							array(
									'field'=>'current_password',
									'label'=>'Current Password',
									'rules'=>'required|callback_password_check'
							),
							array(
									'field'=>'new_password',
									'label'=>'New Password',
									'rules'=>'required'
							),
							array(
									'field'=>'confirm_password',
									'label'=>'Confirm Password',
									'rules'=>'required|matches[new_password]'
							)
                );

			$this->form_validation->set_rules($config);
			$this->form_validation->set_error_delimiters('<li>', '</li>');
			
			if($this->form_validation->run()==true){
				$this->admin_model->update_password();
				message_type('success');
				message_title('Success!');
				message('Password Updated Successfully');
			} else {
				message_type('danger');
				message_title('Failed!');
				message(validation_errors());
			}
			//redirect('admin/profile');
		}
		
		$data['menu'] = 'profile';
		$data['content'] = 'admin_panel/profile';
		$this->load->view('admin_panel/main_layout', $data);
	}
	
	public function password_check($password)
	{
		if ($hash = $this->admin_model->get_password_hash())
		{	
			if(verify_password($password, $hash)){
				return true;
			}else{
				$this->form_validation->set_message('password_check', 'The {field} is invalid.');
				return false;
			}
		}
		else
		{
			$this->form_validation->set_message('password_check', 'The Username doesnot exist.');
			return false;
		}
	}
}
