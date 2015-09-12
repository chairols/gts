<?php

class Usuarios_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    public function existe_usuario_por_email($email) {
        $query = $this->db->query("SELECT *
                                    FROM
                                        usuarios
                                    WHERE
                                        email = '$email'");
        return $query->row_array();
    }
    
    public function set($datos) {
        $this->db->insert('usuarios', $datos);
    }
    
    public function login($email, $password) {
        $query = $this->db->query("SELECT *
                                    FROM
                                        usuarios
                                    WHERE
                                        email = '$email' AND
                                        password = '$password'");
        return $query->row_array();
    }
}
?>
