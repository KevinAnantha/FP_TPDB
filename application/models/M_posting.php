<?php
class M_posting extends CI_Model{
    public function get_current_timestamp() {
        $data = array(
            'timestamp' => date('d-m-y')
        );
        return $data;
    }

    public function get_data_options() {
        $query = $this->db->get('kategori');
        return $query->result_array();
        
    }



}

?>