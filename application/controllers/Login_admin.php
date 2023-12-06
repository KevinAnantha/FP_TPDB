<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_admin extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('M_login');
    }

	public function index()
	{
		$this->load->view('admin/login');
	}

	public function aksi_login()
{
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    $cek = $this->M_login->cek_user($username);

    if ($cek) {
        if (password_verify($password, $cek->password)) {
            $data_session = array(
                'username_admin' => $username
            );
            $this->session->set_userdata($data_session);
            redirect(base_url());
        } else {
            // echo "<script>alert('There are no fields to generate a report');
            // window.history.back();</script>";
            echo "<script>alert('Result of password_verify: " . var_export(password_verify($password, $cek->password), true) . "');</script>";
            echo "<script>alert('Hashed Password from Database: " . $cek->password . "');</script>";

    
        }
    } else {
        echo "<script>alert('Username Tidak Ditemukan');
            window.history.back();</script>";
    }
}


	public function logout()
    {
        if ($this->session->userdata('username_admin') != '') {
            $this->session->unset_userdata('username_admin'); // Menghapus session 'username'
        } else {
            redirect(base_url('admin'));
        }
        redirect(base_url('admin'));
    }



}
