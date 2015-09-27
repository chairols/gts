<?php
class Respuestas_documentacion_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    public function set_respuesta($datos) {
        $this->db->insert('respuestas_documentacion', $datos);
    }
    
    public function get_respuestas_por_id($iddocumentacion) {
        $query = $this->db->query("SELECT *
                                    FROM
                                        respuestas_documentacion
                                    WHERE
                                        iddocumentacion = '$iddocumentacion'
                                    ORDER BY
                                        fecha DESC");
        return $query->result_array();
    }
}
?>
