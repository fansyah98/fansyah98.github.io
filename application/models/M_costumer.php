<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_costumer extends CI_Model 
{
    public function get_all_data()
    {
        $this->db->select('*');
        $this->db->from('costumer');
        $this->db->order_by('id_costumer', 'desc');
        return $this->db->get()->result(); 
    }


}