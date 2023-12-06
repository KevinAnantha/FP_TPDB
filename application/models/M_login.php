<?php
class M_login extends CI_Model{
    public function cek_user($u){
        $this->db->where('u_name', $u);
        $query = $this->db->get('user');
        
        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function cek_admin($u){
        $this->db->where('username', $u);
        $query = $this->db->get('admin');
        
        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }

}

?>