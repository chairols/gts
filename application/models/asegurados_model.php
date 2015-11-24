<?php

class Asegurados_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    public function set($datos) {
        $this->db->insert('asegurados', $datos);
    }
    
    public function gets() {
        $query = $this->db->query("SELECT a.*, c.compania
                                    FROM
                                        asegurados a,
                                        companias c
                                    WHERE
                                        a.idcompania = c.idcompania
                                    ORDER BY
                                        a.nombre, a.apellido");
        return $query->result_array();
    }
    
    public function get_where($datos) {
        $query = $this->db->get_where('asegurados', $datos);
        return $query->row_array();
    }
    
    public function update($datos, $idasegurado) {
        $id = array('idasegurado' => $idasegurado);
        $this->db->update('asegurados', $datos, $id);
    }
}
?>