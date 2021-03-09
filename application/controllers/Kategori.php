<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_kategori');
        //Load Dependencies

    }

    // List all your items
    public function index()
    {
        $data = array(
            'title' => 'Data Kategori Barang',
            'kategori'  =>$this->m_kategori->get_all_data(),
            'isi'   => 'kategori/v_kategori',
                );
    
            $this->load->view('tampilan/v_warrper_backend' ,$data , FALSE);
    }

    // Add a new item
    public function add()
    {
        $data = array(
            'nama_kategori' => $this->input->post('nama_kategori') ,
          
          );
          $this->m_kategori->add($data);
          $this->session->set_flashdata('pesan', 'Data berhasil di input "sukses"');
          redirect('kategori');
    }

    //Update one item
    public function edit($id_kategori)
    {
      $data = array(
        'id_kategori'  => $id_kategori,
        'nama_kategori' => $this->input->post('nama_kategori') ,
   
      
      );
      $this->m_kategori->edit($data);
      $this->session->set_flashdata('pesan', 'Data berhasil Diedit "sukses"');
      redirect('kategori');

    }
    //Delete one item
    public function delete($id_kategori)
    {
        $data = array ('id_kategori' 
        => $id_kategori);
        $this->m_kategori->delete($data);
        $this->session->set_flashdata('pesan', 'Data berhasil Dihapus "sukses"');
        redirect('kategori');
    }
}

/* End of file Controllername.php */

