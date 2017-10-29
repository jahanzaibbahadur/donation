<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminb extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('admin_model');
		
		if(!is_admin_logged_in()){
			redirect('admin/login');
		}
	}
	
	public function dashboard()
	{ 	
					
		echo 'Dashboard'; exit;
		
		$data['menu'] = 'dashboard';
		$data['content'] = 'dashboard';
		$this->load->view('main_layout', $data);
	}
}
