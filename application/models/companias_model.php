<?php
class Companias_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    public function set_compania($datos) {
        $this->db->insert('companias', $datos);
    }
    
    public function get_companias() {
        $query = $this->db->query("SELECT *
                                    FROM
                                        companias
                                    ORDER BY
                                        compania");
        return $query->result_array();
    }
    
    public function get_compania_por_id($idcompania) {
        $query = $this->db->query("SELECT *
                                    FROM
                                        companias
                                    WHERE
                                        idcompania = '$idcompania'");
        return $query->row_array();
    }
    
    public function get_contactos() {
        $query = $this->db->query("SELECT *
                                    FROM
                                        companias
                                    ORDER BY
                                        contacto");
        return $query->result_array();
    }
    
    public function update($datos, $idusuario) {
        $id = array('idcompania' => $idusuario);
        $this->db->update('companias', $datos, $id);
    }
}
?>
