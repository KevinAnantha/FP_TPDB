<?php
class M_edit extends CI_Model{
    public function get_all_data($tabel) {
        $query = $this->db->get($tabel);
        return $query->result();
    }

    public function update_user($data, $user_id) {
        $this->db->where('id_penghuni', $user_id);
        $this->db->update('user', $data);
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }

    public function select_user($id) {
        $query = $this->db->get_where('user', array('id_penghuni' => $id));
        return $query->result(); 
    }

    public function delete_user($id)
    {
        $this->db->where('id_penghuni', $id);
        $this->db->delete('user');

        return $this->db->affected_rows() > 0;
    }

    public function tambah_user($id)
    {
        $this->db->insert('user', $id);

        return $this->db->affected_rows() > 0;
    }

    public function select_kamar($id) {
        $query = $this->db->get_where('kamar', array('id_kmr' => $id));
        return $query->result(); 
    }

    public function update_kamar($data, $user_id) {
        $this->db->where('id_kmr', $user_id);
        $this->db->update('kamar', $data);
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }

    public function tambah_kamar($id)
    {
        $this->db->insert('kamar', $id);

        return $this->db->affected_rows() > 0;
    }

    public function delete_kamar($id)
    {
        $this->db->where('id_kmr', $id);
        $this->db->delete('kamar');

        return $this->db->affected_rows() > 0;
    }

    public function save_to_db($file_name, $id)
    {
        $data = array(
            'id_kamar' => $id,
            'picture' => $file_name
            // Tambahkan kolom lainnya sesuai kebutuhan
        );

        $this->db->insert('foto_kamar', $data); // Ganti 'foto_kamar' dengan nama tabel foto kamar Anda
    }

    public function insert_photo($id, $file_path) {
        $data = array(
            'pic_ktp' => $file_path
        );

        $this->db->where('id_penghuni', $id);
        $this->db->update('user', $data);
    }

    public function select_foto($id) {
        $query = $this->db->get_where('foto_kamar', array('id_kamar' => $id));
        return $query->result(); 
    }

    public function getPhotoPath($id_photo) {
        // Mengambil path foto dari database berdasarkan ID foto
        $this->db->select('picture');
        $this->db->from('foto_kamar'); // Ganti dengan nama tabel yang sesuai
        $this->db->where('id_pic', $id_photo);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row(); // Mengembalikan data path foto
        } else {
            return false;
        }
    }

    public function deletePhotoData($id_photo) {
        // Menghapus data path foto dari database berdasarkan ID foto
        $this->db->where('id_pic', $id_photo);
        $this->db->delete('foto_kamar'); // Ganti dengan nama tabel yang sesuai
    }

    public function select_foto_by_id($id) {
        $query = $this->db->get_where('foto_kamar', array('id_pic' => $id));
        return $query->result(); 
    }

    public function select_foto_ktp_by_id($id) {
        $query = $this->db->get_where('user', array('id_penghuni' => $id));
        return $query->result(); 
    }

    public function select_foto_kamar($id) {
        $query = $this->db->get_where('foto_kamar', array('id_kamar' => $id));
        return $query->result(); 
    }
    
    public function select_order($id) {
        $query = $this->db->get_where('penyewaan', array('order_id' => $id));
        return $query->result(); 
    }
    
    public function select_order_kamar($id_kmr) {
        $this->db->where('id_kmr', $id_kmr);
        $this->db->where_in('status_code', array(200, 201));
        $this->db->where_in('status_sewa', array('aktif', 'Booking in Progress'));
    
        $query = $this->db->get('penyewaan');
        return $query->result(); 
    }


    public function isUserDataComplete($user_id) {
        // Lakukan query untuk memeriksa apakah ada data yang kosong dalam tabel user
        $this->db->where('id_penghuni', $user_id);
        $this->db->where('(nama_lengkap IS NULL OR telp_kerabat IS NULL OR asal_kota IS NULL OR status IS NULL OR NIK IS NULL OR pic_ktp IS NULL)');

        $query = $this->db->get('user');

        if ($query->num_rows() > 0) {
            // Jika ada data yang kosong, kembalikan false
            return false;
        } else {
            // Jika data sudah lengkap, kembalikan true
            return true;
        }
    }

    public function transaksi_kamar()
    {
        // $query = $this->db->get('penyewaan');
        // return $query->result(); 
        $this->db->select('*');
        $this->db->from('penyewaan');
        $this->db->order_by('transaction_time', 'DESC'); // Menambahkan klausa ORDER BY
    
        $query = $this->db->get();
        return $query->result(); 

    }
    
    public function checkDataFilled($id_penghuni) {
        // Ganti 'nama_tabel' dengan nama tabel yang sesuai di database Anda
        $this->db->where('id_penghuni', $id_penghuni);
        $query = $this->db->get('user');
        
        // Jika tidak ada baris yang sesuai dengan id_penghuni, kembalikan false
        if ($query->num_rows() === 0) {
            return false;
        }

        $row = $query->row();

        // Periksa setiap kolom dalam baris untuk memeriksa apakah ada kolom yang kosong
        foreach ($row as $key => $value) {
            // Jika ada kolom yang kosong (NULL atau kosong), kembalikan false
            if ($value === null || $value === '') {
                return false;
            }
        }

        // Jika tidak ada kolom yang kosong, kembalikan true
        return true;
    }
    
    

    
  

    


  


}

?>