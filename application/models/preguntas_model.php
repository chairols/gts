<?php

class Preguntas_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    public function get($id) {
        $query = $this->db->query("SELECT *
                                    FROM
                                        preguntas
                                    WHERE
                                        id = '$id'");
        return $query->row_array();
    }
    
    public function get_idpreguntas($id) {
        $query = $this->db->query("SELECT *
                                    FROM
                                        preguntas
                                    WHERE
                                        idpreguntas = '$id'");
        return $query->row_array();
    }
    
    public function gets_por_categoria($categoria) {
        $query = $this->db->query("SELECT p.*
                                    FROM
                                        preguntas p,
                                        categorias c
                                    WHERE
                                        p.category = c.idcategoria AND
                                        c.categoria_sp = '$categoria'
                                    ORDER BY
                                        p.idpreguntas DESC");
        return $query->result_array();
    }
    
    public function set($datos) {
        $this->db->insert('preguntas', $datos);
        return $this->db->insert_id();
    }
    
    public function gets() {
        $query = $this->db->query("SELECT *
                                    FROM
                                        preguntas");
        return $query->result_array();
    }
    
    public function gets_random($categoria) {
        $query = $this->db->query("SELECT *
                                    FROM
                                        preguntas
                                    WHERE
                                        category = '$categoria'
                                    ORDER BY
                                        RAND()
                                    LIMIT 0, 50");
        return $query->result_array();
    }
}
?>