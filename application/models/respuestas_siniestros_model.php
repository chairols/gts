<?php
class Respuestas_siniestros_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    public function set_respuesta($datos) {
        $this->db->insert('respuestas_siniestros', $datos);
    }
    
    public function get_respuestas_por_id($idsiniestro) {
        $query = $this->db->query("SELECT *
                                    FROM
                                        respuestas_siniestros
                                    WHERE
                                        idsiniestro = '$idsiniestro'
                                    ORDER BY
                                        fecha");
        return $query->result_array();
    }
}
?>
