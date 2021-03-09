<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		//load model admin
		$this->load->model('m_barang');
		$this->load->model('m_kategori');
	}

	 public function index()
	{
		

		$data = array(
			'title' => 'Data Barang',
			'barang' => $this->m_barang->get_all_data(),
			'isi'   => 'barang/v_barang',
		);
		$this->load->view('tampilan/v_warrper_backend' ,$data , FALSE);
	}

	
	
	// Add a new item
	public function add()
	{
		$this->form_validation->set_rules('nama_barang', 'Nama Barang' , 'required',
		array('required' => '%s Harus di isi !!')
		);
		$this->form_validation->set_rules('id_kategori', 'Ketegori' , 'required',
		array('required' => '%s Harus di isi !!')
		);
		$this->form_validation->set_rules('harga', 'Harga' , 'required',
		array('required' => '%s Harus di isi !!')
		);
		$this->form_validation->set_rules('deskripsi', 'deskripsi' , 'required',
		array('required' => '%s Harus di isi !!')
		);
		$this->form_validation->set_rules('stok_barang', 'Stok' , 'required',
		array('required' => '%s Harus di isi !!')
		);

		
		if ($this->form_validation->run() == TRUE ) 
		{
			$config['upload_path'] ='/assest/images/gambar/';
			$config['allowed_types'] ='jpg|jpeg|ico';
			$config ['max_size'] = 2048;
			$this->upload->initialize($config);
			$field_name = 'gambar';
			if ($this->upload->do_upload($field_name)) 
			{
			    $data = array(
				  'title' => 'Tambah Data Barang',
				  'kategori' => $this->m_kategori->get_all_data(),
				  'error_upload' => $this->upload->display_error(),
				  'isi'   => 'barang/tambah_barang',
				);
				$this->load->view('tampilan/v_warrper_backend' ,$data , FALSE);
			} else {
				$upload_data = array('uploads'=> $this->upload->data());
				$config['image_library'] = 'gd2';
				$config['suorce_image'] = '/assest/images/gambar'. $upload_data['uploads']['file_name'];
				$this->load->library('image_lib', $config);
				$data = array (
					'nama_barang' => $this->input->post('nama_barang'),
					'id_kategori' => $this->input->post('id_kategori'),
					'harga'      => $this->input->post('harga'),
					'deskripsi'  => $this->input->post('deskripsi'),
					'stok_barang' => $this->input->post('stok_barang'),
					'gambar'    => $upload_data['uploads']['file_name'],
				);
				$this->m_barang->add($data);
				$this->session->set_flashdata('pesan', 'Data berhasil di inputkan "sukses"');
				redirect('barang');
			}
		}

		$data = array(
			'title' => 'data barang ',
			'kategori' => $this->m_kategori->get_all_data(),
			'isi'   => 'barang/tambah_barang',
		);
		$this->load->view('tampilan/v_warrper_backend' ,$data , FALSE);
	
	}
		
	//Update one item
	public function update( $id = NULL )
	{


	}

	//Delete one item
	public function delete($id_barang)
	{
		$data = array(
			'id_barang' => $id_barang , 
		);
		$this->m_barang->delete($data);
		$this->session->set_flashdata('pesan', 'Data berhasil Dihapus "sukses"');
		redirect('barang');
	}

	
}	/* End of file Controllername.php */
	
	
		

	

	
	

