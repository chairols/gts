<?php
class Reclamos_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    public function set_reclamo($datos) {
        $this->db->insert('reclamos', $datos);
    }
    
    public function get_reclamo_por_id($idreclamo) {
        $query = $this->db->query("SELECT *
                                    FROM
                                        reclamos r,
                                        usuarios u
                                    WHERE
                                        r.productor = u.idusuario AND
                                        r.idreclamo = '$idreclamo'");
        return $query->row_array();
    }
    
    public function update($datos, $id) {
        $idcontenido = array(
            'idreclamo' => $id
        );
        
        $this->db->update('reclamos', $datos, $idcontenido);
    }
}
?>
