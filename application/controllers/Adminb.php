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
}
