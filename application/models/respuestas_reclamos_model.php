<?php
class Respuestas_reclamos_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    public function set_respuesta($datos) {
        $this->db->insert('respuestas_reclamos', $datos);
    }
    
    public function get_respuestas_por_id($idreclamo) {
        $query = $this->db->query("SELECT *
                                    FROM
                                        respuestas_reclamos
                                    WHERE
                                        idreclamo = '$idreclamo'
                                    ORDER BY
                                        fecha");
        return $query->result_array();
    }
}
?>