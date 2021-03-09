<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Costumer extends CI_Controller
{
    public function __construct()
	{
		parent::__construct();
		//load model admin
		$this->load->model('m_costumer');
    }
    
    public function index()
    {
        $data = array(
            'title' => 'Data Kostumer Pembeli',
            'costumer' => $this->m_costumer->get_all_data(),
            'isi'   => 'costumer/v_costumer',

        );
        $this->load->view('tampilan/v_warrper_backend' ,$data , FALSE);
    }

    public function add()  
    {
        $data =array(
            ' title' =>'Tambah Costumer',
      
            'isi'    => 'costumer/add_costumer',

        );
        $this->load->view('tampilan/v_warrper_backend' ,$data , FALSE);

        
    }








} 