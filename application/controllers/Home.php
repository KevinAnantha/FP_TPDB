<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('M_utama');
    }

	public function index()
	{
		// $data['kategori'] = $this->M_utama->get_all_data_kategori();
		$data['kamar'] = $this->M_utama->get_all_data();
		$this->load->view('Utama/Home.php', $data);
	}

	public function detail($id) {
        
		$data['detail'] = $this->M_utama->get_data_by_id($id);
		$data['detail_pic'] = $this->M_utama->get_data_by_pic_id($id);
		$this->load->view('Utama/Detail.php', $data);
        // echo "Halaman detail data dengan ID: " . $id;


	}

}
