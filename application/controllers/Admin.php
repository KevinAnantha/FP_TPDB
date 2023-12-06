<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
    {
        parent::__construct();
		$this->load->helper(array('form', 'url'));
        $this->load->model('admin/M_edit');
		$this->load->model('admin/M_dashboard');
		$this->load->model('M_login');

    }

	public function index()
	{
		if ($this->session->userdata('username_admin')) {
			$data_user = 'user';
			$data_kamar = 'kamar';
			$data['jml_kamar'] = $this->M_dashboard->count_data($data_kamar);
			$data['jml_user'] = $this->M_dashboard->count_data($data_user);
			$data['content'] = 'admin/dashboard/content/dashboard.php';
			$this->load->view('admin/dashboard/index.php', $data);
			// $this->load->view('admin/dashboard/content.php');
			// $this->load->view('admin/dashboard/footer.php');
		}else{
			redirect(base_url('login_admin'));
		}

	}

    public function kamar()
	{
		if ($this->session->userdata('username_admin')) {
			$tabel = 'kamar';
			$data['info'] = $this->M_edit->get_all_data($tabel);
			$data['content'] = 'admin/dashboard/content/kamar.php';
			$this->load->view('admin/dashboard/index.php', $data);
		}else{
			redirect(base_url('login_admin'));
		}
		

	}

	public function user()
	{
		if ($this->session->userdata('username_admin')) {
			$tabel = 'user';
			$data['info'] = $this->M_edit->get_all_data($tabel);
			$data['content'] = 'admin/dashboard/content/user.php';
			$this->load->view('admin/dashboard/index.php', $data);
		}else{
			redirect(base_url('login_admin'));
		}
		

	}

	public function edit_user($id)
	{
		if ($this->session->userdata('username_admin')) {
			$data['ph'] = $this->M_edit->select_user($id);
			$data['id'] = $id;
			$data['content'] = 'admin/dashboard/content/edit_user.php';
			$this->load->view('admin/dashboard/index.php', $data);
		}else{
			redirect(base_url('login_admin'));
		}
		

	}

	public function update_user($id)
	{
		if ($this->session->userdata('username_admin')) {
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
							$this->session->set_flashdata('success_admin', 'Data user berhasil diperbarui !');
							redirect(base_url('Admin/user'));

						}
						


					} else {
						$error = array('error' => $this->upload->display_errors());
						// Handle error if any during upload
					}

				if ($this->db->affected_rows()) {
				    $this->session->set_flashdata('success_admin', 'Data user berhasil diperbarui !');
					redirect(base_url('Admin/user'));
				} else {
					echo"Data Gagal di Update";
					redirect(base_url('Admin/user'));
				}
			}
		
		
		}else{
			redirect(base_url('admin/user'));
		}
		}else{
			redirect(base_url('login_admin'));
		}
		

	}

	public function delete_user($id)
	{
		if ($this->session->userdata('username_admin')) {
			
			$data_user = $this->M_edit->select_user($id);


			if($data_user){
				foreach($data_user as $data){
					$path_old = $data->pic_ktp;
					if (file_exists($path_old)) {
						unlink($path_old); // Menghapus foto dari server jika ada
					}
				}
			}

			
				
				

			if ($this->M_edit->delete_user($id)) {
			    $this->session->set_flashdata('success_admin', 'User berhasil dihapus !');
				redirect(base_url('admin/user'));
			} else {
				echo "Gagal menghapus user.";
				redirect(base_url('admin/user'));
			}
		}else{
			redirect(base_url('login_admin'));
		}
		

	}

	public function tambah_user()
	{
		if ($this->session->userdata('username_admin')) {
			$data['content'] = 'admin/dashboard/content/tambah_user';
			$this->load->view('admin/dashboard/index.php', $data);
		}else{
			redirect(base_url('login_admin'));
		}
		
		


	}

	public function aksi_tambah_user()
	{
		if ($this->session->userdata('username_admin')) {
			$username = $this->input->post('username');
        $email = $this->input->post('email');
        $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        $namalengkap = $this->input->post('namalengkap');
		$telp = $this->input->post('notelp');
		$telpkerabat = $this->input->post('notelpkerabat');
		$asal = $this->input->post('asalkota');
		$status = $this->input->post('status');
		$nik = $this->input->post('nik');
		
		$query = $this->db->get_where('user', array('u_name' => $username));
		
		if($query->num_rows() > 0){
		    $this->session->set_flashdata('error_username', 'Username Telah digunakan !');
		    echo "<script>window.history.back();</script>";

		}else{
    		   $data_update = array(
    			'email' => $email,
    			'u_name' => $username,
    			'password' => $password,
    			'nama_lengkap' => $namalengkap,
    			'no_telp' => $telp,
    			'telp_kerabat' => $telpkerabat,
    			'asal_kota' => $asal,
    			'status' => $status,
    			'NIK' => $nik
    		);
    		
    
    		$this->M_edit->tambah_user($data_update);
    		$last_insert_id = $this->db->insert_id();
    
    		//upload foto ktp
    		$config['upload_path'] = 'uploads/fotoktp';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 10000;
    
            $this->load->library('upload', $config);
    
            if ( ! $this->upload->do_upload('userfile')) {
                $error = array('error' => $this->upload->display_errors());
                redirect(base_url('admin/user'), $error);
            } else {
                $data = array('upload_data' => $this->upload->data());
                $title = $this->input->post('title');
                $file_path = 'uploads/fotoktp/' . $data['upload_data']['file_name'];
    
                $this->M_edit->insert_photo($last_insert_id, $file_path);
    
                redirect('admin/user');
            }
    
    		if ($this->db->affected_rows()) {
    		    $this->session->set_flashdata('success_admin', 'User berhasil ditambahkan !');
    			redirect(base_url('admin/user'));
    		} else {
    			echo"Data Gagal di Update";
    			redirect(base_url('admin/user'));
    		} 
		}

		
		}else{
			redirect(base_url('login_admin'));
		}
		
		

	}

	public function edit_kamar($id)
	{
		if ($this->session->userdata('username_admin')) {
			$data['ph'] = $this->M_edit->select_kamar($id);
			$data['id'] = $id;
			$data['content'] = 'admin/dashboard/content/edit_kamar.php';
			$this->load->view('admin/dashboard/index.php', $data);
		}else{
			redirect(base_url('login_admin'));
		}
		

	}

	public function aksi_update_kamar($id)
	{
		if ($this->session->userdata('username_admin')) {
			$nomor = $this->input->post('nomor');
        $posisi = $this->input->post('posisi');
        $ukuran = $this->input->post('ukuran');
        $kamarmandi = $this->input->post('kamarmandi');
		$furnised = $this->input->post('furnised');
		$harga = $this->input->post('harga');
		$idpenghuni = $this->input->post('idpenghuni');

		$data_update = array(
			'no_kmr' => $nomor,
			'posisi' => $posisi,
			'ukuran' => $ukuran,
			'KM' => $kamarmandi,
			'furnished' => $furnised,
			'harga' => $harga,
			'id_penghuni' => $idpenghuni
		);

		$this->M_edit->update_kamar($data_update, $id);

		if ($this->db->affected_rows()) {
		    $this->session->set_flashdata('success_admin', 'Data kamar berhasil di update !');
			redirect(base_url('admin/kamar'));
		} else {
			echo"Data Gagal di Update";
			redirect(base_url('admin/kamar'));
		}
		}else{
			redirect(base_url('login_admin'));
		}
		
		

	}

	public function tambah_kamar()
	{
		if ($this->session->userdata('username_admin')) {
			$data['content'] = 'admin/dashboard/content/tambah_kamar';
			$data['error'] = ''; // Inisialisasi pesan error
        
			// Check apakah terdapat error dari proses upload sebelumnya
			if (isset($_SESSION['upload_error'])) {
				$data['error'] = $_SESSION['upload_error']; // Assign pesan error ke variabel $error
				unset($_SESSION['upload_error']); // Hapus pesan error setelah ditampilkan
			}
			$this->load->view('admin/dashboard/index.php', $data);
		}else{
			redirect(base_url('login_admin'));
		}
		


	}

	public function aksi_tambah_kamar()
	{
		if ($this->session->userdata('username_admin')) {
			// Proses pengambilan data dari form
			$nomor = $this->input->post('nomor');
			$posisi = $this->input->post('posisi');
			$ukuran = $this->input->post('ukuran');
			$kamarmandi = $this->input->post('kamarmandi');
			$furnised = $this->input->post('furnised');
			$harga = $this->input->post('harga');
			$idpenghuni = $this->input->post('idpenghuni');

			$data_update = array(
				'no_kmr' => $nomor,
				'posisi' => $posisi,
				'ukuran' => $ukuran,
				'KM' => $kamarmandi,
				'furnished' => $furnised,
				'harga' => $harga,
				'id_penghuni' => $idpenghuni
			);

			$this->db->insert('kamar', $data_update);
			$last_insert_id = $this->db->insert_id();

			// Proses upload foto
			$upload_path = 'uploads/fotokamar/';
			$config['upload_path'] = $upload_path;
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['max_size'] = 5000; // Ukuran maksimal dalam kilobita (2MB)

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
					$foto_data[] = array(
						'id_kamar' => $last_insert_id,
						'picture' => $upload_path . $upload_data['file_name']
					);
				} else {
					$error = array('error' => $this->upload->display_errors());
					// Handle error if any during upload
				}
			}

			// Simpan data foto ke tabel foto_kamar
			if (!empty($foto_data)) {
				$this->db->insert_batch('foto_kamar', $foto_data);
				
				$this->session->set_flashdata('success_admin', 'Kamar berhasil ditambahkan !');
				redirect(base_url('admin/kamar'));
			}

			
		}
	}


	public function aksi_login_admin()
	{
		$username_admin = $this->input->post('username_admin');
		$password_admin = $this->input->post('password_admin');

		$cek = $this->M_login->cek_admin($username_admin);

		if ($cek) {
			if ($password_admin === $cek->password) {
				$data_session = array(
					'username_admin' => $username_admin
				);
				$this->session->set_userdata($data_session);
				redirect(base_url('admin'));
			} else {
				echo "<script>alert('Password Salah !');
				window.history.back();</script>";
		
			}
		} else {
			echo "<script>alert('Username Tidak Ditemukan !');
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


	public function delete_kamar($id)
	{
		if ($this->session->userdata('username_admin')) {

			$data_foto = $this->M_edit->select_foto_kamar($id);// memganbil data tabel foto dengan parameter id kamar


			if($data_foto){
				foreach($data_foto as $data){
					$path_old = $data->picture;
					if (file_exists($path_old)) {
						unlink($path_old); // Menghapus foto dari server jika ada
					}
				}
			}
			if ($this->M_edit->delete_kamar($id)) {
			    $this->session->set_flashdata('success_admin', 'Kamar berhasil dihapus !');
				redirect(base_url('admin/kamar'));
				$this->load->view('admin/dashboard/content/popup');
			} else {
				echo "Gagal menghapus postingan.";
				redirect(base_url('admin/kamar'));
			}
		}else{
			redirect(base_url('login_admin'));
		}
		

	}

	
	public function edit_foto_kamar($id)
	{
		$data['id_kamar'] = $id;
		$data['foto'] = $this->M_edit->select_foto($id);
		$data['content'] = 'admin/dashboard/content/edit_foto_kamar.php';

		$this->load->view('admin/dashboard/index.php', $data);

	}

	public function delete_foto_kamar($id_photo, $id_kamar)
	{
		// Menghapus foto dari server
        $photo_path = $this->M_edit->getPhotoPath($id_photo); // Mendapatkan path foto dari database
        if ($photo_path) {
            $file_path = $photo_path->picture; // Sesuaikan dengan path tempat menyimpan foto
            if (file_exists($file_path)) {
                unlink($file_path); // Menghapus foto dari server jika ada
            }
        }

        // Menghapus data path foto dari database
        $this->M_edit->deletePhotoData($id_photo);

        // Redirect atau tampilkan pesan sukses, sesuai kebutuhan Anda
        // Contoh redirect
        $this->session->set_flashdata('success_admin', 'Foto berhasil dihapus !');
        redirect(base_url('Admin/edit_foto_kamar/'. $id_kamar)); // Ganti dengan URL atau route yang sesuai

	}

	public function tambah_foto_kamar($id)
	{
		if ($this->session->userdata('username_admin')) {
			$data['id_kamar'] = $id;
			$data['content'] = 'admin/dashboard/content/tambah_foto_kamar';
			$data['error'] = ''; // Inisialisasi pesan error
        
			// Check apakah terdapat error dari proses upload sebelumnya
			if (isset($_SESSION['upload_error'])) {
				$data['error'] = $_SESSION['upload_error']; // Assign pesan error ke variabel $error
				unset($_SESSION['upload_error']); // Hapus pesan error setelah ditampilkan
			}
			$this->load->view('admin/dashboard/index.php', $data);
		}else{
			redirect(base_url('login_admin'));
		}

	}


	public function aksi_tambah_foto_kamar($id_kamar)
	{

		// Proses upload foto
		$upload_path = 'uploads/fotokamar/';
		$config['upload_path'] = $upload_path;
		$config['allowed_types'] = 'jpg|jpeg|png|gif';
		$config['max_size'] = 5000; // Ukuran maksimal dalam kilobita (2MB)

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
				$foto_data[] = array(
					'id_kamar' => $id_kamar,
					'picture' => $upload_path . $upload_data['file_name']
				);
			} else {
				$error = array('error' => $this->upload->display_errors());
				// Handle error if any during upload
			}
		}

		// Simpan data foto ke tabel foto_kamar
		if (!empty($foto_data)) {
			$this->db->insert_batch('foto_kamar', $foto_data);
			
			$this->session->set_flashdata('success_admin', 'Foto berhasil ditambahkan !');
			redirect(base_url('Admin/edit_foto_kamar/' . $id_kamar));
		}
	}

	public function form_update_foto_kamar($id, $id_kamar)
	{
		if ($this->session->userdata('username_admin')) {
			$data['id_kamar'] = $id_kamar;
			$data['id_foto'] = $id;
			$data['content'] = 'admin/dashboard/content/form_edit_foto_kamar';
			$data['error'] = ''; // Inisialisasi pesan error
        
			// Check apakah terdapat error dari proses upload sebelumnya
			if (isset($_SESSION['upload_error'])) {
				$data['error'] = $_SESSION['upload_error']; // Assign pesan error ke variabel $error
				unset($_SESSION['upload_error']); // Hapus pesan error setelah ditampilkan
			}
			$this->load->view('admin/dashboard/index.php', $data);
		}else{
			redirect(base_url('login_admin'));
		}

	}

	public function aksi_edit_foto_kamar($id_foto, $id_kamar)
	{
		if ($this->session->userdata('username_admin')) {
			// Proses upload foto
			$upload_path = 'uploads/fotokamar/';
			$config['upload_path'] = $upload_path;
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['max_size'] = 5000; // Ukuran maksimal dalam kilobita (2MB)

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
						'picture' => $upload_path . $upload_data['file_name']
					);

					$data_old = $this->M_edit->select_foto_by_id($id_foto);
					

					if ($data_old) {
						foreach($data_old as $data){
							$path_old = $data->picture;
							if (file_exists($path_old)) {
								unlink($path_old); // Menghapus foto dari server jika ada
							}
						}
						
						
					}

					if (!empty($foto_data)) {
						// Kondisi untuk melakukan update berdasarkan id_pic
						$this->db->where('id_pic', $id_foto);

						// Lakukan update data
						$this->db->update('foto_kamar', $foto_data);
						
						$this->session->set_flashdata('success_admin', 'Update foto berhasil !');
						redirect(base_url('Admin/edit_foto_kamar/' . $id_kamar));

					}
					


				} else {
					$error = array('error' => $this->upload->display_errors());
					// Handle error if any during upload
				}

				



		}
		}else{
			redirect(base_url('login_admin'));
		}

	}
	
	public function reset_penghuni($id_kamar)
	{
		if ($this->session->userdata('username_admin')) {
			
			$data = $this->M_edit->select_order_kamar($id_kamar);
			foreach($data as $row){
				$order_id = $row->order_id;
			}
			

			if ($order_id) {
				$this->db->where('order_id', $order_id);
				$this->db->update('penyewaan', array('status_sewa' => "expired"));

				$this->db->where('id_kmr', $id_kamar);
				$this->db->update('kamar', array('id_penghuni' => 0));
                
                $this->session->set_flashdata('success_admin', 'Kamar berhasil dikosongkan !');
				redirect(base_url('admin/kamar'));
				// Menambahkan kondisi untuk memilih baris dengan order_id yang sesuai
			} else {
				echo "data tidak ditemukan tidak ada";
				die;
			}


		}else{
			redirect(base_url('login_admin'));
		}

	}
	
	public function transaksi_kamar()
	{
		$data['data'] = $this->M_edit->transaksi_kamar();
		$data['content'] = 'admin/dashboard/content/transaksi_kamar.php';

		$this->load->view('admin/dashboard/index.php', $data);

	}
	
	public function edit_password($id)
	{
		$data['id'] = $id;
		$data['content'] = 'admin/dashboard/content/edit_password.php';

		$this->load->view('admin/dashboard/index.php', $data);

		

	}
	
	
	public function aksi_update_password($id)
    {
        
		$password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
		
		$data_update = array(
			'password' => $password
		);

		$hasil = $this->M_edit->update_user($data_update, $id);

		if($hasil){
			$this->session->set_flashdata('success_admin', 'Password Berhasil Diperbarui !');
			redirect(base_url('admin/edit_user/' . $id));

		}else{
			echo "Password gagal diperbaharui";
		}




        
    }




	// public function detail($id) {
        
	// 	$data['detail'] = $this->M_utama->get_data_by_id($id);
	// 	$data['detail_pic'] = $this->M_utama->get_data_by_pic_id($id);
	// 	$this->load->view('Utama/Detail.php', $data);
    //     // echo "Halaman detail data dengan ID: " . $id;


	// }

}
