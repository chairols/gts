<?php
class Tipos_operacion_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    public function get_tipos_operaciones() {
        $query = $this->db->query("SELECT *
                                    FROM
                                        tipos_operacion
                                    ORDER BY
                                        operacion");
        return $query->result_array();
    }
    
    public function get_tipo_operacion_por_id($idtipo_operacion) {
        $query = $this->db->query("SELECT *
                                    FROM
                                        tipos_operacion
                                    WHERE
                                        idtipo_operacion = '$idtipo_operacion'");
        return $query->row_array();
    }
}
?>
