<?php
class Facturas_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    public function set_factura($datos) {
        $this->db->insert('facturas', $datos);
    }
}
?>
