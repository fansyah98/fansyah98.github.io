<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		//load model admin
		$this->load->model('');
	}

	 public function index()
	{

		$data = array(
			'title' => 'Cirebon Digital',
			'isi'   => 'v_admin',
		);

		$this->load->view('tampilan/v_warrper_backend' ,$data , FALSE);
	}
}
