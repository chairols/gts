<?php

class Cobranzas_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    public function set($datos) {
        $this->db->insert('cobranzas', $datos);
    }
}
?>