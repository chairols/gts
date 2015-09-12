<?php
class Contactos_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    public function set_contacto($datos) {
        $this->db->insert('contactos', $datos);
    }
    
    public function get_contactos() {
        $query = $this->db->query("SELECT *
                                    FROM
                                        contactos
                                    WHERE
                                        activo = '1'
                                    ORDER BY
                                        nombre, apellido");
        return $query->result_array();
    }
    
    public function get($idcontacto) {
        $query = $this->db->get_where('contactos', array('idcontacto' => $idcontacto));
        return $query->row_array();
    }
    
    public function update($datos, $idusuario) {
        $id = array('idcontacto' => $idusuario);
        $this->db->update('contactos', $datos, $id);
    }
    
    public function borrar($idcontacto) {
        $id = array('idcontacto' => $idcontacto);
        $datos = array('activo' => 0);
        $this->db->update('contactos', $datos, $id);
    }
}
?>
