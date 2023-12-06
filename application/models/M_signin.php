<?php
class M_signin extends CI_Model{
    public function signin($data){
        $this->db->insert('user',$data);
    }
}
?>