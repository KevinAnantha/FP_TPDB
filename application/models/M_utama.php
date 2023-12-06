<?php
class M_utama extends CI_Model{
    public function get_all_data() {
        $this->db->order_by('id_kmr', 'ASC'); // Menambahkan order_by untuk mengurutkan berdasarkan kolom tanggal secara menurun (terbaru ke terlama)
        $query = $this->db->get('kamar');
        return $query->result();
    }

    // public function get_all_data_kategori() {
    //     $query = $this->db->get('kategori'); // Ganti 'nama_tabel' dengan nama tabel Anda
    //     return $query->result();
    // }


    public function get_data_by_id($id) {
        $this->db->select('*');
        $this->db->where('id_kmr', $id);
        $query = $this->db->get('kamar');
        return $query->result();
    }

    public function get_data_by_pic_id($id) {
        $this->db->select('*');
        $this->db->where('id_kamar', $id);
        $query = $this->db->get('foto_kamar');
        return $query->result();
    }



    // public function get_data_by_kat($kat) {
    //     $this->db->where('kategori', $kat);
    //     $query = $this->db->get('projects');
    //     return $query->result();
    // }
}

?>