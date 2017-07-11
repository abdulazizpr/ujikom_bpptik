<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		 $this->load->model('login_model');
	}

	public function index()
	{
		$this->load->view('form_login');
	}

	public function auth(){

		//get username and password
		$username = $this->input->post('username', 'true');
		$password = $this->input->post('password', 'true');
		$temp_account = $this->login_model->check_user_login($username, $password)->row();
		
		// check account
		$num_account = count($temp_account);
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('form_login');
		}else{
			if($num_account > 0){
				// kalau ada set session
				$array_items = array(
					'id_user' => $temp_account->aap_id,
					'username' => $temp_account->aap_username,
					'logged_in' => true
				);
				
				$this->session->set_userdata($array_items);
				redirect(site_url('admin'));
			
			}else{
				// kalau ga ada diredirect lagi ke halaman login
				$this->session->set_flashdata('notification', 'Peringatan : Username dan Password tidak cocok');
				redirect(site_url('login'));
			}
		}
	}

	// keluar dari sistem
	public function logout(){
		$this->session->sess_destroy();
		redirect(site_url('login'));
	}
}
