<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('M_login');
    }

	public function index()
	{
		$this->load->view('Login');
	}

	public function aksi_login()
{
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    $cek = $this->M_login->cek_user($username);

    if ($cek) {
        if (password_verify($password, $cek->password)) {
            $data_session = array(
                'id_user'=> $cek->id_penghuni,
                'username' => $username
            );
            $this->session->set_userdata($data_session);
            redirect(base_url());
        } else {
            echo "<script>alert('Password tidak sesuai!');
            window.history.back();</script>";
            

    
        }
    } else {
        echo "<script>alert('Username Tidak Ditemukan');
            window.history.back();</script>";
    }
}


	public function logout()
    {
        if ($this->session->userdata('username') != '') {
            $this->session->unset_userdata('username'); // Menghapus session 'username'
        } else {
            redirect(base_url('login'));
        }
        redirect(base_url('login'));
    }



}
