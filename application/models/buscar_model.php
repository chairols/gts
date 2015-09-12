<?php
class Buscar_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    public function buscar($tabla, $datos) {
        $query = $this->db->get_where($tabla, $datos);
        
        return $query->result_array();
    }
}
?>
