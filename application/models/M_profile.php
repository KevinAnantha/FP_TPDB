<?php
class M_profile extends CI_Model{
    public function getProfileData($username) {
        $query = $this->db->get_where('user', array('id_penghuni' => $username));

        return $query->row_array();
    }

    // public function get_all_data() {
    //     $this->db->order_by('id', 'DESC'); 
    //     $this->db->where('username', $this->session->userdata('username')); 
    //     $query = $this->db->get('projects');
    //     return $query->result();
    // }

    public function hapus_postingan($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('projects');

        return $this->db->affected_rows() > 0;
    }

    public function select_history($id)
    {
    $this->db->select('*');
    $this->db->from('penyewaan');
    $this->db->where('id_penghuni', $id);
    $this->db->order_by('transaction_time', 'DESC'); // Menambahkan klausa ORDER BY

    $query = $this->db->get();
    return $query->result(); 
    }



    public function getKamarByStatus200() {
        $id_user = $this->session->userdata('id_user');
        $this->db->select('kamar.*');
        $this->db->from('kamar');
        $this->db->join('penyewaan', 'penyewaan.id_kmr = kamar.id_kmr');
        $this->db->where('penyewaan.status_code', "200");
        $this->db->where('kamar.id_penghuni', $id_user);
        $this->db->where('penyewaan.status_sewa', "aktif");

        $query = $this->db->get();
        return $query->result();
    }
    
    
    

    

    

}

?>