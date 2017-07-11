<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	//konstruktor
	public function __construct(){
		parent::__construct();
		$this->load->model('buku_model');
	}

	//prosedur untuk mengakses halaman home
	public function index()
	{
		$data['buku'] = $this->buku_model->select_all()->result();
		$this->load->view('home',$data);
	}
}
