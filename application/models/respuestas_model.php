<?php

class Respuestas_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    public function set($datos) {
        $this->db->insert('respuestas', $datos);
    }
    
    public function gets_respuestas_por_pregunta($idpregunta) {
        $query = $this->db->query("SELECT *
                                    FROM
                                        respuestas
                                    WHERE
                                        idpregunta = '$idpregunta'");
        return $query->result_array();
    }
}
?>
