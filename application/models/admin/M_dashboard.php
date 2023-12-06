<?php
class M_dashboard extends CI_Model{
    public function count_data($data) {
        $this->db->from($data);
        return $this->db->count_all_results();
    }

}

?>