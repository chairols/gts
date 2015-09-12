<?php
class Secciones_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
   
    public function get_secciones() {
        $query = $this->db->query("SELECT *
                                    FROM
                                        secciones
                                    ORDER BY
                                        seccion");
        return $query->result_array();
    }
}
?>
