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
    
    public function gets_no_leidas($idusuario) {
        $query = $this->db->query("SELECT * 
                                    FROM
                                        ((circulares ci inner join companias co on ci.idcompania = co.idcompania)
                                    LEFT JOIN 
                                        circulares_leidos cl on cl.idcircular = ci.idcircular AND cl.idusuario = '$idusuario')
                                    ORDER BY
                                        ci.idcircular DESC");
        return $query->result_array();
    }
    
    public function get_where($datos) {
        $query = $this->db->get_where('circulares', $datos);
        return $query->row_array();
    }
    
    public function get_circular_leido($idcircular, $idusuario) {
        $query = $this->db->query("SELECT *
                                    FROM
                                        circulares_leidos
                                    WHERE
                                        idcircular = '$idcircular' AND
                                        idusuario = '$idusuario'");
        return $query->row_array();
    }
    
    public function set_circular_leida($idcircular, $idusuario) {
        $query = $this->db->query("INSERT INTO circulares_leidos    
                                        (idcircular, idusuario) 
                                    VALUES
                                        ('$idcircular', '$idusuario')");
        
    }
}
?>