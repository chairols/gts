<?php

class Circulares_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    public function set($datos) {
        $this->db->insert('circulares', $datos);
    }
    
    public function gets() {
        $query = $this->db->query("SELECT *
                                    FROM
                                        circulares ci,
                                        companias co
                                    WHERE
                                        ci.idcompania = co.idcompania
                                    ORDER BY
                                        ci.idcircular DESC");
        return $query->result_array();
    }
    
    public function get_where($datos) {
        $query = $this->db->get_where('circulares', $datos);
        return $query->row_array();
    }
}
?>