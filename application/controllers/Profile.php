<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('M_profile');
        $this->load->model('admin/M_edit');

    }

	public function index()
	{

        if ($this->session->userdata('username')) {


            $username = $this->session->userdata('id_user');

            $this->load->model('M_profile');
            // $data['projects_user'] = $this->M_profile->get_all_data();


            $profile_data = $this->M_profile->getProfileData($username);
            $data_kamar = $this->M_profile->getKamarByStatus200();

            $data['kamar'] = $data_kamar;
            
            $data['profile_data'] = $profile_data;
            $this->load->view('Utama/Profile.php', $data);
        } else {
            // Jika pengguna belum login, arahkan ke halaman login (misalnya)
            redirect(base_url('login'));
        }

	}

    public function aksi_hapus($id)
    {


            if ($this->M_profile->hapus_postingan($id)) {
                echo "Postingan berhasil dihapus.";
            } else {
                echo "Gagal menghapus postingan.";
            }


        
    }

    public function history($id)
    {

        $data_history = $this->M_profile->select_history($id);
        $data['history'] = $data_history;
        $data['id_user'] = $id;
        $this->load->view('Utama/history.php', $data);


        
    }

    public function edit_user()
    {
        $id = $this->session->userdata['id_user'];
        $data['id'] = $id;
        $data['ph'] = $this->M_edit->select_user($id);

        $this->load->view('Utama/edit_data_user.php', $data);


        
    }

    public function update_user($id)
	{
		if ($this->session->userdata('username')) {
			$username = $this->input->post('username');
        $email = $this->input->post('email');
        $namalengkap = $this->input->post('namalengkap');
		$telp = $this->input->post('notelp');
		$telpkerabat = $this->input->post('notelpkerabat');
		$asal = $this->input->post('asalkota');
		$status = $this->input->post('status');
		$nik = $this->input->post('nik');

		$data_update = array(
			'email' => $email,
			'u_name' => $username,
			'nama_lengkap' => $namalengkap,
			'no_telp' => $telp,
			'telp_kerabat' => $telpkerabat,
			'asal_kota' => $asal,
			'status' => $status,
			'NIK' => $nik
		);

		$this->M_edit->update_user($data_update, $id);

		// Proses upload foto
		if (!empty($_FILES['userfile']['name'][0])) {
			$upload_path = 'uploads/fotoktp/';
			$config['upload_path'] = $upload_path;
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['max_size'] = 10000; // Ukuran maksimal dalam kilobita (2MB)

			$this->load->library('upload', $config);

				$files = $_FILES['userfile'];
				$file_count = count($files['name']);

				$foto_data = array();
				for ($i = 0; $i < $file_count; $i++) {
					$_FILES['userfile']['name'] = $files['name'][$i];
					$_FILES['userfile']['type'] = $files['type'][$i];
					$_FILES['userfile']['tmp_name'] = $files['tmp_name'][$i];
					$_FILES['userfile']['error'] = $files['error'][$i];
					$_FILES['userfile']['size'] = $files['size'][$i];

					if ($this->upload->do_upload('userfile')) {
						$upload_data = $this->upload->data();
						$foto_data = array(
							'pic_ktp' => $upload_path . $upload_data['file_name']
						);

						$data_old = $this->M_edit->select_foto_ktp_by_id($id);
						

						if ($data_old) {
							foreach($data_old as $data){
								$path_old = $data->pic_ktp;
								if (file_exists($path_old)) {
									unlink($path_old); // Menghapus foto dari server jika ada
								}
							}
							
							
						}

						if (!empty($foto_data)) {
							// Kondisi untuk melakukan update berdasarkan id_pic
							$this->db->where('id_penghuni', $id);

							// Lakukan update data
							$this->db->update('user', $foto_data);
							redirect(base_url('profile'));

						}
						


					} else {
						$error = array('error' => $this->upload->display_errors());
						// Handle error if any during upload
					}

				if ($this->db->affected_rows()) {
					redirect(base_url('profile'));
				} else {
					echo"Data Gagal di Update";
					redirect(base_url('profile'));
				}
			}
		
		
		}else{
			redirect(base_url('profile'));
		}
		}else{
			redirect(base_url('login'));
		}
		

	}

	public function edit_password($id)
    {
        
		$data['id'] = $id;
        $this->load->view('Utama/edit_password.php', $data);


        
    }

	public function aksi_update_password($id)
    {
        
		$password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
		
		$data_update = array(
			'password' => $password
		);

		$hasil = $this->M_edit->update_user($data_update, $id);

		if($hasil){
			$this->session->set_flashdata('success', 'Password Berhasil Diperbarui !');
			redirect(base_url('profile/edit_user'));

		}else{
			echo "Password gagal diperbaharui";
		}




        
    }




	
}
