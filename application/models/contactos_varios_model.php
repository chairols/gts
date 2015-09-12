<?php

class Contactos_varios_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    public function set($datos) {
        $this->db->insert('contactos_varios', $datos);
    }
    
    public function gets() {
        $query = $this->db->query("SELECT *
                                    FROM
                                        contactos_varios
                                    WHERE
                                        activo = '1'
                                    ORDER BY
                                        nombre, apellido");
        return $query->result_array();
    }
    
    public function get_where($datos) {
        $query = $this->db->get_where('contactos_varios', $datos);
        return $query->row_array();
    }
    
    public function update($datos, $idcontactos_varios) {
        $id = array('idcontactos_varios' => $idcontactos_varios);
        $this->db->update('contactos_varios', $datos, $id);
    }
}
?>