<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_login
{
    protected $ci;

    public function __construct()
    {
        $this->ci =& get_instance();
        $this->ci->load->model('m_auth');

    }

    public function login($username , $password)
    {
    $cek = $this->ci->m_auth->login_user($username , $password);
        if($cek)
        {
            $name_user = $cek->name_user; 
            $username = $cek->username;
            $level_user = $cek->level_user;

            $this->ci->session->set_userdata('username' , $username);
            $this->ci->session->set_userdata('name_user' , $name_user);
            $this->ci->session->set_userdata('level_user' , $level_user);
            redirect('admin');
        }else{
            $this->ci->session->set_flashdata('error', 'Username dan password anda salah');
            redirect('auth/login_user');
            

        }
    }

    public function proteksi_halaman()
    {
        if ( $this->ci->session->userdata('username') == '') 
        {
            $this->ci->session->set_flashdata('error', 'Anda Belum Login');
            redirect('auth/login_user');
        }

    }

    public function logout()
    {
        $this->ci->session->unset_userdata('username');
        $this->ci->session->unset_userdata('name_user' );
        $this->ci->session->unset_userdata('level_user');
        $this->ci->session->set_flashdata('pesan', 'Anda behasil Logout halaman');
        redirect('auth/login_user');

    }


}

/* End of file LibraryName.php */
