<?php

class Sesiones_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    public function get($idusuario) {
        $query = $this->db->query("SELECT *
                                    FROM
                                        sesiones
                                    WHERE
                                        idusuario = '$idusuario'");
        return $query->row_array();
    }
    
    public function get_por_usuario_trivia($usuario_trivia) {
        $query = $this->db->query("SELECT *
                                    FROM
                                        sesiones
                                    WHERE
                                        usuario_trivia = '$usuario_trivia'");
        return $query->row_array();
    }
    
    public function set($datos) {
        $this->db->insert('sesiones', $datos);
    }
    
    public function update($datos, $id) {
        $this->db->update('sesiones', $datos, array('idusuario' => $id));
    }
}
?>
