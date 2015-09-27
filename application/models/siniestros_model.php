<?php

class Siniestros_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    public function set_siniestro($datos) {
        $this->db->insert('siniestros', $datos);
    }
    
    public function get_siniestro_por_id($idsiniestro) {
        $query = $this->db->query("SELECT s.*, u.nombre, u.apellido, sec.*
                                    FROM
                                        siniestros s,
                                        usuarios u,
                                        secciones sec
                                    WHERE
                                        s.idsiniestro = $idsiniestro AND
                                        s.productor = u.idusuario AND
                                        s.tipo_seguro = sec.idseccion");
        return $query->row_array();
    }
    
    public function update($datos, $id) {
        $idcontenido = array(
            'idsiniestro' => $id
        );
        
        $this->db->update('siniestros', $datos, $idcontenido);
    }
    
    public function gets_where($datos) {
        $query = $this->db->get_where('siniestros', $datos);
        return $query->result_array();
    }
    
    public function eliminar($idsiniestro) {
        $this->db->delete('respuestas_siniestros', array('idsiniestro' => $idsiniestro));
        $this->db->delete('siniestros', array('idsiniestro' => $idsiniestro));
    }
}
?>
