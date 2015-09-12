<?php
class Productores_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    public function set_productor($datos) {
        $this->db->insert('productores', $datos);
    }
    
    public function get_productores() {
        $query = $this->db->query("SELECT *
                                    FROM
                                        productores
                                    ORDER BY
                                        apellido, nombre");
        return $query->result_array();
    }
}
?>
