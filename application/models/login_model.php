<?php
class Login_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    public function login($usuario, $password) {
        $query = $this->db->query("SELECT *
                                    FROM
                                        usuarios
                                    WHERE
                                        email = '$usuario' AND
                                        password = '$password'");
        return $query->row_array();
    }
}
?>
