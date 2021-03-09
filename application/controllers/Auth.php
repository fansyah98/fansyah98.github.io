<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    
    public function Login_user()
    {
        $this->form_validation->set_rules('username', 'Username', 'required',array(
            'required' => '%s harus di isi '
        ));

        $this->form_validation->set_rules('password', 'Password', 'required',array(
            'required' => '%s harus di isi '
        ));

        
        if ($this->form_validation->run() ==TRUE) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $this->user_login->login($username, $password);
        }

        $data = array(
            'title' =>'Login_user',
        );
        $this->load->view('v_login_user', $data , FALSE );
    
    }

    public function logout()
    {
        $this->user_login->logout();



    }
}

/* End of file Controllername.php */
