<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posting extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_posting');
    }

	public function index()
	{
        if ($this->session->userdata('username')){
            $data['options'] = $this->M_posting->get_data_options();
            $this->load->view('utama/posting', $data);  
        }else{
            redirect(base_url('login'));
        }

	}


    public function aksi_posting() {

        $kategori = $this->input->post('kategori');
        $judul = $this->input->post('judul');
        $ket_singkat = $this->input->post('ket_singkat');
        $ket_lengkap = $this->input->post('ket_lengkap');
        $budget = $this->input->post('budget');
        $deadline = $this->input->post('deadline');
        $telp = $this->input->post('hp');

        $timestamp_data = $this->M_posting->get_current_timestamp();

        $telp = trim($telp);
        $telp = preg_replace('/[^0-9]/', '', $telp);

        // Cek apakah nomor telepon dimulai dengan "0"
        if (substr($telp, 0, 1) === '0') {
            // Jika ya, ganti "0" di depan dengan "62"
            $telp = '62' . substr($telp, 1);
        }


        $data_to_insert = array(
            'kategori' => $kategori,
            'judul' => $judul,
            'keterangan_singkat' => $ket_singkat,
            'keterangan_lengkap' => $ket_lengkap,
            'budget' => $budget,
            'tanggal_post' => $timestamp_data['timestamp'],
            'deadline' => $deadline,
            'telp' => $telp,
            'username' => $this->session->userdata('username')

        );

        $this->db->insert('projects', $data_to_insert);

        echo "Data berhasil dimasukkan ke database.";

        redirect(base_url());
    }
}

    

