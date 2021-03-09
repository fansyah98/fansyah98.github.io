<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_barang extends CI_Model 
{

    public function get_all_data()
    {
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->join('kategori', 'kategori.id_kategori=barang.id_kategori' , 'left');
        $this->db->order_by('id_barang ', 'desc');
        return $this->db->get()->result(); 
    }

   
   
   
       // Add a new item
       public function add($data)
       {
           $this->db->insert('barang' , $data);
   
       }
   
       //Update one item
       public function edit($data)
       {
        $this->db->where('id_barang' , $data['id_barang']);
        $this->db->update('barang' , $data );
       }
   
       //Delete one item
       public function delete( $data )
       {
        $this->db->where('id_barang' , $data['id_barang']);
        $this->db->delete('barang' , $data );
       }
}
   
   /* End of file Controllername.php */
   
   

