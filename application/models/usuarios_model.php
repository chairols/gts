<?php
class Usuarios_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    public function get_usuario_por_id($idusuario) {
        $query = $this->db->query("SELECT *
                                    FROM
                                        usuarios
                                    WHERE
                                        idusuario = '$idusuario'");
        return $query->row_array();
    }
    
    public function get_productores() {
        $query = $this->db->query("SELECT *
                                    FROM
                                        usuarios
                                    WHERE
                                        admin = 0
                                    ORDER BY
                                        apellido, nombre");
        return $query->result_array();
    }
    
    public function set_usuario($datos) {
        $this->db->insert('usuarios', $datos);
        return $this->db->insert_id();
    }
    
    public function set_usuarios_companias($datos) {
        $this->db->insert('usuarios_companias', $datos);
    }
    
    public function update($datos, $idusuario) {
        $id = array('idusuario' => $idusuario);
        $this->db->update('usuarios', $datos, $id);
    }
    
    public function get_por_email($email) {
        $query = $this->db->query("SELECT *
                                    FROM
                                        usuarios
                                    WHERE
                                        email = '$email' AND
                                        activo = '1'");
        return $query->row_array();
    }
}
?>
