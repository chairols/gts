<?php

class Categorias_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    public function get_por_categoria($categoria) {
        $query = $this->db->query("SELECT *
                                    FROM
                                        categorias
                                    WHERE
                                        categoria = '$categoria'");
        return $query->row_array();
    }
    
    public function gets() {
        $query = $this->db->query("SELECT *"
                . "                 FROM"
                . "                     categorias");
        return $query->result_array();
    }
}
?>
