<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Load Dependencies
        $this->load->model('m_user');
        
    }

    // List all your items
    public function index( )
    {
        
		$data = array(
      'title' => 'Data User',
      'user'  =>$this->m_user->get_all_data(),
			'isi'   => 'v_user',


		);

		$this->load->view('tampilan/v_warrper_backend' ,$data , FALSE);

    }

    // Add a new item
    public function add()
    {
      $data = array(
        'name_user' => $this->input->post('name_user') ,
        'username' => $this->input->post('username') , 
        'password' => $this->input->post('password') , 
        'level_user' => $this->input->post('level_user') ,  
      
      );
      $this->m_user->add($data);
      $this->session->set_flashdata('pesan', 'Data berhasil di input "sukses"');
      redirect('user');

    }

    //Update one item
    public function edit( $id_user)
    {
      $data = array(
        'id_user'  => $id_user,
        'name_user' => $this->input->post('name_user') ,
        'username' => $this->input->post('username') , 
        'password' => $this->input->post('password') , 
        'level_user' => $this->input->post('level_user') ,  
      
      );
      $this->m_user->edit($data);
      $this->session->set_flashdata('pesan', 'Data berhasil Diedit "sukses"');
      redirect('user');

    }

    //Delete one item
    public function delete( $id_user = NULL )
    {
      $data = array ('id_user' 
      => $id_user);
      $this->m_user->delete($data);
      $this->session->set_flashdata('pesan', 'Data berhasil Dihapus "sukses"');
      redirect('user');
    }

    
}

/* End of file Controllername.php */

