<?php

class Operaciones_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    public function gets() {
        $query = $this->db->query("SELECT *
                                    FROM
                                        operaciones
                                    ORDER BY
                                        idoperacion");
        return $query->result_array();
    }
}
?>