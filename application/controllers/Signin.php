<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signin extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('M_signin');
    }

	public function index()
	{
		$this->load->view('Signin');
	}

	public function aksi_signin()
{
    $this->load->library('form_validation');

    // Atur aturan validasi untuk setiap input
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');
    $this->form_validation->set_rules('telp', 'Telephone', 'required');

    if ($this->form_validation->run() == FALSE) {
        // Validasi gagal, tampilkan kembali form signin dengan error
        redirect(base_url('Signin'));
    } else {
        // Validasi sukses, lanjutkan dengan aksi signin

        $email = $this->input->post('email');
        $username = $this->input->post('username');
        $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        $telp = $this->input->post('telp');

        $query = $this->db->get_where('user', array('u_name' => $username));
        if ($query->num_rows() > 0) {
            echo "<script>alert('Username Telah digunakan'); window.history.back();</script>";
        } else {
            $data = array(
                'email' => $email,
                'u_name' => $username,
                'password' => $password,
                'no_telp' => $telp
            );
    
            $this->M_signin->signin($data);
    
            if ($this->db->affected_rows()) {
                redirect(base_url('login'));
            } else {
                redirect(base_url('signin'));
            }
            
        }

        
    }
}



}
