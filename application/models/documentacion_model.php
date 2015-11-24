<?php
class Documentacion_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    public function set_documentacion($datos) {
        $this->db->insert('documentacion', $datos);
    }
    
    /*
     *  Cotizaciones
     */
    
    public function get_cotizaciones_nuevas($admin, $idusuario) {
        if($admin == 1) {
            $query = $this->db->query("SELECT count(*) as cant
                                        FROM 
                                            documentacion
                                        WHERE
                                            nueva = '1' AND
                                            (
                                            tipo_operacion = '9'
                                            )");
        } else {
            $query = $this->db->query("SELECT count(*) as cant
                                        FROM 
                                            documentacion
                                        WHERE
                                            nueva = '1' AND
                                            productor = '$idusuario' AND
                                            (
                                            tipo_operacion = '9' 
                                            )");
        }
        $res = $query->row_array();
        return $res['cant'];
    }
    
    public function get_cotizaciones_nuevas_listado($pagina, $admin, $idusuario) {
        $pagina = $pagina-1;
        $pagina = $pagina * 25;
        if($admin == 1) {
            $query = $this->db->query("SELECT *
                                        FROM 
                                            documentacion d,
                                            tipos_operacion t,
                                            usuarios u
                                        WHERE
                                            d.tipo_operacion = t.idtipo_operacion AND
                                            d.productor = u.idusuario AND
                                            d.nueva = '1' AND
                                            (
                                            tipo_operacion = '9' 
                                            )
                                        LIMIT
                                            $pagina, 25");
        } else {
            $query = $this->db->query("SELECT *
                                        FROM 
                                            documentacion d,
                                            tipos_operacion t,
                                            usuarios u
                                        WHERE
                                            d.tipo_operacion = t.idtipo_operacion AND
                                            d.productor = u.idusuario AND
                                            d.nueva = '1' AND
                                            d.productor = '$idusuario' AND
                                            (
                                            tipo_operacion = '9' 
                                            )
                                        LIMIT
                                            $pagina, 25");
        }
        return $query->result_array();
    }
    
    public function get_cotizaciones_pendientes($admin, $idusuario) {
        if($admin == 1) {
            $query = $this->db->query("SELECT count(*) as cant
                                        FROM 
                                            documentacion
                                        WHERE
                                            pendiente = '1' AND
                                            abierta = '1' AND
                                            (
                                            tipo_operacion = '9'
                                            )");
        } else {
            $query = $this->db->query("SELECT count(*) as cant
                                        FROM 
                                            documentacion
                                        WHERE
                                            pendiente = '0' AND
                                            abierta = '1' AND
                                            productor = '$idusuario' AND
                                            (
                                            tipo_operacion = '9'
                                            )");
        }
        $res = $query->row_array();
        return $res['cant'];
    }
    
    public function get_cotizaciones_pendientes_listado($pagina, $admin, $idusuario) {
        $pagina = $pagina-1;
        $pagina = $pagina * 25;
        if($admin == 1) {
            $query = $this->db->query("SELECT *
                                        FROM 
                                            documentacion d,
                                            tipos_operacion t,
                                            usuarios u
                                        WHERE
                                            d.tipo_operacion = t.idtipo_operacion AND
                                            d.productor = u.idusuario AND
                                            d.pendiente = '1' AND
                                            d.abierta = '1' AND
                                            (
                                            tipo_operacion = '9' 
                                            )
                                        LIMIT
                                            $pagina, 25");
        } else {
            $query = $this->db->query("SELECT *
                                        FROM 
                                            documentacion d,
                                            tipos_operacion t,
                                            usuarios u
                                        WHERE
                                            d.tipo_operacion = t.idtipo_operacion AND
                                            d.productor = u.idusuario AND
                                            d.pendiente = '0' AND
                                            d.abierta = '1' AND
                                            d.productor = '$idusuario' AND
                                            (
                                            tipo_operacion = '9'
                                            )
                                        LIMIT
                                            $pagina, 25");
        }
        return $query->result_array();
    }
    
    public function get_cotizaciones_abiertas($admin, $idusuario) {
        if($admin == 1) {
            $query = $this->db->query("SELECT count(*) as cant
                                        FROM 
                                            documentacion
                                        WHERE
                                            abierta = '1' AND
                                            (
                                            tipo_operacion = '9'
                                            )");
        } else {
            $query = $this->db->query("SELECT count(*) as cant
                                        FROM 
                                            documentacion
                                        WHERE
                                            abierta = '1' AND
                                            productor = '$idusuario' AND
                                            (
                                            tipo_operacion = '9'
                                            )");
        }
        $res = $query->row_array();
        return $res['cant'];
    }
    
    public function get_cotizaciones_abiertas_listado($pagina, $admin, $idusuario) {
        $pagina = $pagina-1;
        $pagina = $pagina * 25;
        if($admin == 1) {
            $query = $this->db->query("SELECT *
                                        FROM 
                                            documentacion d,
                                            tipos_operacion t,
                                            usuarios u
                                        WHERE
                                            d.tipo_operacion = t.idtipo_operacion AND
                                            d.productor = u.idusuario AND
                                            d.abierta = '1' AND
                                            (
                                            tipo_operacion = '9'
                                            )
                                        LIMIT
                                            $pagina, 25");
        } else {
            $query = $this->db->query("SELECT *
                                        FROM 
                                            documentacion d,
                                            tipos_operacion t,
                                            usuarios u
                                        WHERE
                                            d.tipo_operacion = t.idtipo_operacion AND
                                            d.productor = u.idusuario AND
                                            d.abierta = '1' AND
                                            productor = '$idusuario' AND
                                            (
                                            tipo_operacion = '9'
                                            )
                                        LIMIT
                                            $pagina, 25");
        }
        return $query->result_array();
    }
    
    public function get_cotizaciones_cerradas($admin, $idusuario) {
        if($admin == 1) {
            $query = $this->db->query("SELECT count(*) as cant
                                        FROM 
                                            documentacion
                                        WHERE
                                            abierta = '0' AND
                                            (
                                            tipo_operacion = '9'
                                            )");
        } else {
            $query = $this->db->query("SELECT count(*) as cant
                                        FROM 
                                            documentacion
                                        WHERE
                                            abierta = '0' AND
                                            productor = '$idusuario' AND
                                            (
                                            tipo_operacion = '9'
                                            )");
        }
        $res = $query->row_array();
        return $res['cant'];
    }
    
    public function get_cotizaciones_cerradas_listado($pagina, $admin, $idusuario) {
        $pagina = $pagina-1;
        $pagina = $pagina * 25;
        if($admin == 1) {
            $query = $this->db->query("SELECT *
                                        FROM 
                                            documentacion d,
                                            tipos_operacion t,
                                            usuarios u
                                        WHERE
                                            d.tipo_operacion = t.idtipo_operacion AND
                                            d.productor = u.idusuario AND
                                            d.abierta = '0' AND
                                            (
                                            tipo_operacion = '9'
                                            )
                                        LIMIT
                                            $pagina, 25");
        } else {
            $query = $this->db->query("SELECT *
                                        FROM 
                                            documentacion d,
                                            tipos_operacion t,
                                            usuarios u
                                        WHERE
                                            d.tipo_operacion = t.idtipo_operacion AND
                                            d.productor = u.idusuario AND
                                            d.abierta = '0' AND
                                            d.productor = '$idusuario' AND
                                            (
                                            tipo_operacion = '9'
                                            )
                                        LIMIT
                                            $pagina, 25");
        }
        return $query->result_array();
    }
    
    public function get_cotizaciones_todas($admin, $idusuario) {
        if($admin == 1) {
            $query = $this->db->query("SELECT count(*) as cant
                                        FROM 
                                            documentacion
                                        WHERE
                                            (
                                            tipo_operacion = '9'
                                            )");
        } else {
            $query = $this->db->query("SELECT count(*) as cant
                                        FROM 
                                            documentacion
                                        WHERE
                                            productor = '$idusuario' AND
                                            (
                                            tipo_operacion = '9'
                                            )");
        }
        $res = $query->row_array();
        return $res['cant'];
    }
    
    public function get_cotizaciones_todas_listado($pagina, $admin, $idusuario) {
        $pagina = $pagina-1;
        $pagina = $pagina * 25;
        if($admin == 1) {
            $query = $this->db->query("SELECT *
                                        FROM 
                                            documentacion d,
                                            tipos_operacion t,
                                            usuarios u
                                        WHERE
                                            d.tipo_operacion = t.idtipo_operacion AND
                                            d.productor = u.idusuario AND
                                            (
                                            tipo_operacion = '9'
                                            )
                                        LIMIT
                                            $pagina, 25");
        } else {
            $query = $this->db->query("SELECT *
                                        FROM 
                                            documentacion d,
                                            tipos_operacion t,
                                            usuarios u
                                        WHERE
                                            d.tipo_operacion = t.idtipo_operacion AND
                                            d.productor = u.idusuario AND
                                            d.productor = '$idusuario' AND
                                            (
                                            tipo_operacion = '9'
                                            )
                                        LIMIT
                                            $pagina, 25");
        }
        return $query->result_array();
    }
    
    /*
     *  Fin Cotizaciones
     */
    
    
     /*
     *  Reclamos
     */
    
    public function get_reclamos_nuevas($admin, $idusuario) {
        if($admin == 1) {
            $query = $this->db->query("SELECT count(*) as cant
                                        FROM 
                                            documentacion
                                        WHERE
                                            nueva = '1' AND
                                            (
                                            tipo_operacion = '11'
                                            )");
        } else {
            $query = $this->db->query("SELECT count(*) as cant
                                        FROM 
                                            documentacion
                                        WHERE
                                            nueva = '1' AND
                                            productor = '$idusuario' AND
                                            (
                                            tipo_operacion = '11' 
                                            )");
        }
        $res = $query->row_array();
        return $res['cant'];
    }
    
    public function get_reclamos_nuevas_listado($pagina, $admin, $idusuario) {
        $pagina = $pagina-1;
        $pagina = $pagina * 25;
        if($admin == 1) {
            $query = $this->db->query("SELECT *
                                        FROM 
                                            documentacion d,
                                            tipos_operacion t,
                                            usuarios u
                                        WHERE
                                            d.tipo_operacion = t.idtipo_operacion AND
                                            d.productor = u.idusuario AND
                                            d.nueva = '1' AND
                                            (
                                            tipo_operacion = '11' 
                                            )
                                        LIMIT
                                            $pagina, 25");
        } else {
            $query = $this->db->query("SELECT *
                                        FROM 
                                            documentacion d,
                                            tipos_operacion t,
                                            usuarios u
                                        WHERE
                                            d.tipo_operacion = t.idtipo_operacion AND
                                            d.productor = u.idusuario AND
                                            d.nueva = '1' AND
                                            d.productor = '$idusuario' AND
                                            (
                                            tipo_operacion = '11' 
                                            )
                                        LIMIT
                                            $pagina, 25");
        }
        return $query->result_array();
    }
    
    public function get_reclamos_pendientes($admin, $idusuario) {
        if($admin == 1) {
            $query = $this->db->query("SELECT count(*) as cant
                                        FROM 
                                            documentacion
                                        WHERE
                                            pendiente = '1' AND
                                            abierta = '1' AND
                                            (
                                            tipo_operacion = '11'
                                            )");
        } else {
            $query = $this->db->query("SELECT count(*) as cant
                                        FROM 
                                            documentacion
                                        WHERE
                                            pendiente = '0' AND
                                            abierta = '1' AND
                                            productor = '$idusuario' AND
                                            (
                                            tipo_operacion = '11'
                                            )");
        }
        $res = $query->row_array();
        return $res['cant'];
    }
    
    public function get_reclamos_pendientes_listado($pagina, $admin, $idusuario) {
        $pagina = $pagina-1;
        $pagina = $pagina * 25;
        if($admin == 1) {
            $query = $this->db->query("SELECT *
                                        FROM 
                                            documentacion d,
                                            tipos_operacion t,
                                            usuarios u
                                        WHERE
                                            d.tipo_operacion = t.idtipo_operacion AND
                                            d.productor = u.idusuario AND
                                            d.pendiente = '1' AND
                                            d.abierta = '1' AND
                                            (
                                            tipo_operacion = '11' 
                                            )
                                        LIMIT
                                            $pagina, 25");
        } else {
            $query = $this->db->query("SELECT *
                                        FROM 
                                            documentacion d,
                                            tipos_operacion t,
                                            usuarios u
                                        WHERE
                                            d.tipo_operacion = t.idtipo_operacion AND
                                            d.productor = u.idusuario AND
                                            d.pendiente = '0' AND
                                            d.abierta = '1' AND
                                            d.productor = '$idusuario' AND
                                            (
                                            tipo_operacion = '11'
                                            )
                                        LIMIT
                                            $pagina, 25");
        }
        return $query->result_array();
    }
    
    public function get_reclamos_abiertas($admin, $idusuario) {
        if($admin == 1) {
            $query = $this->db->query("SELECT count(*) as cant
                                        FROM 
                                            documentacion
                                        WHERE
                                            abierta = '1' AND
                                            (
                                            tipo_operacion = '11'
                                            )");
        } else {
            $query = $this->db->query("SELECT count(*) as cant
                                        FROM 
                                            documentacion
                                        WHERE
                                            abierta = '1' AND
                                            productor = '$idusuario' AND
                                            (
                                            tipo_operacion = '11'
                                            )");
        }
        $res = $query->row_array();
        return $res['cant'];
    }
    
    public function get_reclamos_abiertas_listado($pagina, $admin, $idusuario) {
        $pagina = $pagina-1;
        $pagina = $pagina * 25;
        if($admin == 1) {
            $query = $this->db->query("SELECT *
                                        FROM 
                                            documentacion d,
                                            tipos_operacion t,
                                            usuarios u
                                        WHERE
                                            d.tipo_operacion = t.idtipo_operacion AND
                                            d.productor = u.idusuario AND
                                            d.abierta = '1' AND
                                            (
                                            tipo_operacion = '11'
                                            )
                                        LIMIT
                                            $pagina, 25");
        } else {
            $query = $this->db->query("SELECT *
                                        FROM 
                                            documentacion d,
                                            tipos_operacion t,
                                            usuarios u
                                        WHERE
                                            d.tipo_operacion = t.idtipo_operacion AND
                                            d.productor = u.idusuario AND
                                            d.abierta = '1' AND
                                            productor = '$idusuario' AND
                                            (
                                            tipo_operacion = '11'
                                            )
                                        LIMIT
                                            $pagina, 25");
        }
        return $query->result_array();
    }
    
    public function get_reclamos_cerradas($admin, $idusuario) {
        if($admin == 1) {
            $query = $this->db->query("SELECT count(*) as cant
                                        FROM 
                                            documentacion
                                        WHERE
                                            abierta = '0' AND
                                            (
                                            tipo_operacion = '11'
                                            )");
        } else {
            $query = $this->db->query("SELECT count(*) as cant
                                        FROM 
                                            documentacion
                                        WHERE
                                            abierta = '0' AND
                                            productor = '$idusuario' AND
                                            (
                                            tipo_operacion = '11'
                                            )");
        }
        $res = $query->row_array();
        return $res['cant'];
    }
    
    public function get_reclamos_cerradas_listado($pagina, $admin, $idusuario) {
        $pagina = $pagina-1;
        $pagina = $pagina * 25;
        if($admin == 1) {
            $query = $this->db->query("SELECT *
                                        FROM 
                                            documentacion d,
                                            tipos_operacion t,
                                            usuarios u
                                        WHERE
                                            d.tipo_operacion = t.idtipo_operacion AND
                                            d.productor = u.idusuario AND
                                            d.abierta = '0' AND
                                            (
                                            tipo_operacion = '11'
                                            )
                                        LIMIT
                                            $pagina, 25");
        } else {
            $query = $this->db->query("SELECT *
                                        FROM 
                                            documentacion d,
                                            tipos_operacion t,
                                            usuarios u
                                        WHERE
                                            d.tipo_operacion = t.idtipo_operacion AND
                                            d.productor = u.idusuario AND
                                            d.abierta = '0' AND
                                            d.productor = '$idusuario' AND
                                            (
                                            tipo_operacion = '11'
                                            )
                                        LIMIT
                                            $pagina, 25");
        }
        return $query->result_array();
    }
    
    public function get_reclamos_todas($admin, $idusuario) {
        if($admin == 1) {
            $query = $this->db->query("SELECT count(*) as cant
                                        FROM 
                                            documentacion
                                        WHERE
                                            (
                                            tipo_operacion = '11'
                                            )");
        } else {
            $query = $this->db->query("SELECT count(*) as cant
                                        FROM 
                                            documentacion
                                        WHERE
                                            productor = '$idusuario' AND
                                            (
                                            tipo_operacion = '11'
                                            )");
        }
        $res = $query->row_array();
        return $res['cant'];
    }
    
    public function get_reclamos_todas_listado($pagina, $admin, $idusuario) {
        $pagina = $pagina-1;
        $pagina = $pagina * 25;
        if($admin == 1) {
            $query = $this->db->query("SELECT *
                                        FROM 
                                            documentacion d,
                                            tipos_operacion t,
                                            usuarios u
                                        WHERE
                                            d.tipo_operacion = t.idtipo_operacion AND
                                            d.productor = u.idusuario AND
                                            (
                                            tipo_operacion = '11'
                                            )
                                        LIMIT
                                            $pagina, 25");
        } else {
            $query = $this->db->query("SELECT *
                                        FROM 
                                            documentacion d,
                                            tipos_operacion t,
                                            usuarios u
                                        WHERE
                                            d.tipo_operacion = t.idtipo_operacion AND
                                            d.productor = u.idusuario AND
                                            d.productor = '$idusuario' AND
                                            (
                                            tipo_operacion = '11'
                                            )
                                        LIMIT
                                            $pagina, 25");
        }
        return $query->result_array();
    }
    
    /*
     *  Fin Reclamos
     */
    
    
    
    /*
     * Documentacion
     */
    public function get_documentacion_nuevas($admin, $idusuario) {
        if($admin == 1) {
            $query = $this->db->query("SELECT count(*) as cant
                                        FROM 
                                            documentacion
                                        WHERE
                                            nueva = '1'");
        } else {
            $query = $this->db->query("SELECT count(*) as cant
                                        FROM 
                                            documentacion
                                        WHERE
                                            nueva = '1' AND
                                            productor = '$idusuario'");
        }
        $res = $query->row_array();
        return $res['cant'];
    }
    
    public function get_documentacion_nuevas_listado($pagina, $admin, $idusuario) {
        $pagina = $pagina-1;
        $pagina = $pagina * 25;
        if($admin == 1) {
            $query = $this->db->query("SELECT *
                                        FROM 
                                            documentacion d,
                                            tipos_operacion t,
                                            usuarios u
                                        WHERE
                                            d.tipo_operacion = t.idtipo_operacion AND
                                            d.productor = u.idusuario AND
                                            d.nueva = '1'
                                        LIMIT
                                            $pagina, 25");
        } else {
            $query = $this->db->query("SELECT *
                                        FROM 
                                            documentacion d,
                                            tipos_operacion t,
                                            usuarios u
                                        WHERE
                                            d.tipo_operacion = t.idtipo_operacion AND
                                            d.productor = u.idusuario AND
                                            d.nueva = '1' AND
                                            d.productor = '$idusuario'
                                        LIMIT
                                            $pagina, 25");
        }
        return $query->result_array();
    }
    
    public function get_documentacion_pendientes($admin, $idusuario) {
        if($admin == 1) {
            $query = $this->db->query("SELECT count(*) as cant
                                        FROM 
                                            documentacion
                                        WHERE
                                            pendiente = '1' AND
                                            abierta = '1'");
        } else {
            $query = $this->db->query("SELECT count(*) as cant
                                        FROM 
                                            documentacion
                                        WHERE
                                            pendiente = '1' AND
                                            abierta = '1' AND
                                            productor = '$idusuario'");
        }
        $res = $query->row_array();
        return $res['cant'];
    }
    
    public function get_documentacion_pendientes_listado($pagina, $admin, $idusuario) {
        $pagina = $pagina-1;
        $pagina = $pagina * 25;
        if($admin == 1) {
            $query = $this->db->query("SELECT *
                                        FROM 
                                            documentacion d,
                                            tipos_operacion t,
                                            usuarios u
                                        WHERE
                                            d.tipo_operacion = t.idtipo_operacion AND
                                            d.productor = u.idusuario AND
                                            d.pendiente = '1' AND
                                            d.abierta = '1'
                                        LIMIT
                                            $pagina, 25");
        } else {
            $query = $this->db->query("SELECT *
                                        FROM 
                                            documentacion d,
                                            tipos_operacion t,
                                            usuarios u
                                        WHERE
                                            d.tipo_operacion = t.idtipo_operacion AND
                                            d.productor = u.idusuario AND
                                            d.pendiente = '0' AND
                                            d.abierta = '1' AND
                                            d.productor = '$idusuario'
                                        LIMIT
                                            $pagina, 25");
        }
        return $query->result_array();
    }
    
    public function get_documentacion_abiertas($admin, $idusuario) {
        if($admin == 1) {
            $query = $this->db->query("SELECT count(*) as cant
                                        FROM 
                                            documentacion
                                        WHERE
                                            abierta = '1'");
        } else {
            $query = $this->db->query("SELECT count(*) as cant
                                        FROM 
                                            documentacion
                                        WHERE
                                            abierta = '1' AND
                                            productor = '$idusuario'");
        }
        $res = $query->row_array();
        return $res['cant'];
    }
    
    public function get_documentacion_abiertas_listado($pagina, $admin, $idusuario) {
        $pagina = $pagina-1;
        $pagina = $pagina * 25;
        if($admin == 1) {
            $query = $this->db->query("SELECT *
                                        FROM 
                                            documentacion d,
                                            tipos_operacion t,
                                            usuarios u
                                        WHERE
                                            d.tipo_operacion = t.idtipo_operacion AND
                                            d.productor = u.idusuario AND
                                            d.abierta = '1'
                                        LIMIT
                                            $pagina, 25");
        } else {
            $query = $this->db->query("SELECT *
                                        FROM 
                                            documentacion d,
                                            tipos_operacion t,
                                            usuarios u
                                        WHERE
                                            d.tipo_operacion = t.idtipo_operacion AND
                                            d.productor = u.idusuario AND
                                            d.abierta = '1' AND
                                            productor = '$idusuario'
                                        LIMIT
                                            $pagina, 25");
        }
        return $query->result_array();
    }
    
    public function get_documentacion_cerradas($admin, $idusuario) {
        if($admin == 1) {
            $query = $this->db->query("SELECT count(*) as cant
                                        FROM 
                                            documentacion
                                        WHERE
                                            abierta = '0'");
        } else {
            $query = $this->db->query("SELECT count(*) as cant
                                        FROM 
                                            documentacion
                                        WHERE
                                            abierta = '0' AND
                                            productor = '$idusuario'");
        }
        $res = $query->row_array();
        return $res['cant'];
    }
    
    public function get_documentacion_cerradas_listado($pagina, $admin, $idusuario) {
        $pagina = $pagina-1;
        $pagina = $pagina * 25;
        if($admin == 1) {
            $query = $this->db->query("SELECT *
                                        FROM 
                                            documentacion d,
                                            tipos_operacion t,
                                            usuarios u
                                        WHERE
                                            d.tipo_operacion = t.idtipo_operacion AND
                                            d.productor = u.idusuario AND
                                            d.abierta = '0'
                                        LIMIT
                                            $pagina, 25");
        } else {
            $query = $this->db->query("SELECT *
                                        FROM 
                                            documentacion d,
                                            tipos_operacion t,
                                            usuarios u
                                        WHERE
                                            d.tipo_operacion = t.idtipo_operacion AND
                                            d.productor = u.idusuario AND
                                            d.abierta = '0' AND
                                            d.productor = '$idusuario'
                                        LIMIT
                                            $pagina, 25");
        }
        return $query->result_array();
    }
    
    public function get_documentacion_todas($admin, $idusuario) {
        if($admin == 1) {
            $query = $this->db->query("SELECT count(*) as cant
                                        FROM 
                                            documentacion");
        } else {
            $query = $this->db->query("SELECT count(*) as cant
                                        FROM 
                                            documentacion
                                        WHERE
                                            productor = '$idusuario'");
        }
        $res = $query->row_array();
        return $res['cant'];
    }
    
    public function get_documentacion_todas_listado($pagina, $admin, $idusuario) {
        $pagina = $pagina-1;
        $pagina = $pagina * 25;
        if($admin == 1) {
            $query = $this->db->query("SELECT *
                                        FROM 
                                            documentacion d,
                                            tipos_operacion t,
                                            usuarios u
                                        WHERE
                                            d.tipo_operacion = t.idtipo_operacion AND
                                            d.productor = u.idusuario
                                        LIMIT
                                            $pagina, 25");
        } else {
            $query = $this->db->query("SELECT *
                                        FROM 
                                            documentacion d,
                                            tipos_operacion t,
                                            usuarios u
                                        WHERE
                                            d.tipo_operacion = t.idtipo_operacion AND
                                            d.productor = u.idusuario AND
                                            d.productor = '$idusuario'
                                        LIMIT
                                            $pagina, 25");
        }
        return $query->result_array();
    }
    /*
     * Fin de Documentacion
     */
    
    /*
     * Varios
     */
    public function get_varios_nuevas($admin, $idusuario) {
        if($admin == 1) {
            $query = $this->db->query("SELECT count(*) as cant
                                        FROM 
                                            documentacion
                                        WHERE
                                            nueva = '1' AND
                                            tipo_operacion = '5'");
        } else {
            $query = $this->db->query("SELECT count(*) as cant
                                        FROM 
                                            documentacion
                                        WHERE
                                            nueva = '1' AND
                                            tipo_operacion = '5' AND
                                            productor = '$idusuario'");
        }
        $res = $query->row_array();
        return $res['cant'];
    }
    
    public function get_varios_nuevas_listado($pagina, $admin, $idusuario) {
        $pagina = $pagina-1;
        $pagina = $pagina * 25;
        if($admin == 1) {
            $query = $this->db->query("SELECT *
                                        FROM 
                                            documentacion d,
                                            tipos_operacion t,
                                            usuarios u
                                        WHERE
                                            d.tipo_operacion = t.idtipo_operacion AND
                                            d.productor = u.idusuario AND
                                            d.nueva = '1' AND
                                            d.tipo_operacion = '5'
                                        LIMIT
                                            $pagina, 25");
        } else {
            $query = $this->db->query("SELECT *
                                        FROM 
                                            documentacion d,
                                            tipos_operacion t,
                                            usuarios u
                                        WHERE
                                            d.tipo_operacion = t.idtipo_operacion AND
                                            d.productor = u.idusuario AND
                                            d.nueva = '1' AND
                                            d.tipo_operacion = '5' AND
                                            d.productor = '$idusuario'
                                        LIMIT
                                            $pagina, 25");
        }
        return $query->result_array();
    }
    
    public function get_varios_pendientes($admin, $idusuario) {
        if($admin == 1) {
            $query = $this->db->query("SELECT count(*) as cant
                                        FROM 
                                            documentacion
                                        WHERE
                                            pendiente = '1' AND
                                            abierta = '1' AND
                                            tipo_operacion = '5'");
        } else {
            $query = $this->db->query("SELECT count(*) as cant
                                        FROM 
                                            documentacion
                                        WHERE
                                            pendiente = '0' AND
                                            abierta = '1' AND
                                            tipo_operacion = '5' AND
                                            productor = '$idusuario'");
        }
        $res = $query->row_array();
        return $res['cant'];
    }
    
    public function get_varios_pendientes_listado($pagina, $admin, $idusuario) {
        $pagina = $pagina-1;
        $pagina = $pagina * 25;
        if($admin == 1) {
            $query = $this->db->query("SELECT *
                                        FROM 
                                            documentacion d,
                                            tipos_operacion t,
                                            usuarios u
                                        WHERE
                                            d.tipo_operacion = t.idtipo_operacion AND
                                            d.productor = u.idusuario AND
                                            d.pendiente = '1' AND
                                            d.tipo_operacion = '5' AND
                                            d.abierta = '1'
                                        LIMIT
                                            $pagina, 25");
        } else {
            $query = $this->db->query("SELECT *
                                        FROM 
                                            documentacion d,
                                            tipos_operacion t,
                                            usuarios u
                                        WHERE
                                            d.tipo_operacion = t.idtipo_operacion AND
                                            d.productor = u.idusuario AND
                                            d.pendiente = '0' AND
                                            d.tipo_operacion = '5' AND
                                            d.abierta = '1' AND
                                            d.productor = '$idusuario'
                                        LIMIT
                                            $pagina, 25");
        }
        return $query->result_array();
    }
    
    public function get_varios_abiertas($admin, $idusuario) {
        if($admin == 1) {
            $query = $this->db->query("SELECT count(*) as cant
                                        FROM 
                                            documentacion
                                        WHERE
                                            abierta = '1' AND
                                            tipo_operacion = '5'");
        } else {
            $query = $this->db->query("SELECT count(*) as cant
                                        FROM 
                                            documentacion
                                        WHERE
                                            abierta = '1' AND
                                            tipo_operacion = '5' AND
                                            productor = '$idusuario'");
        }
        $res = $query->row_array();
        return $res['cant'];
    }
    
    public function get_varios_abiertas_listado($pagina, $admin, $idusuario) {
        $pagina = $pagina-1;
        $pagina = $pagina * 25;
        if($admin == 1) {
            $query = $this->db->query("SELECT *
                                        FROM 
                                            documentacion d,
                                            tipos_operacion t,
                                            usuarios u
                                        WHERE
                                            d.tipo_operacion = t.idtipo_operacion AND
                                            d.productor = u.idusuario AND
                                            d.abierta = '1' AND
                                            d.tipo_operacion = '5'
                                        LIMIT
                                            $pagina, 25");
        } else {
            $query = $this->db->query("SELECT *
                                        FROM 
                                            documentacion d,
                                            tipos_operacion t,
                                            usuarios u
                                        WHERE
                                            d.tipo_operacion = t.idtipo_operacion AND
                                            d.productor = u.idusuario AND
                                            d.abierta = '1' AND
                                            d.tipo_operacion = '5' AND
                                            d.productor = '$idusuario'
                                        LIMIT
                                            $pagina, 25");
        }
        return $query->result_array();
    }
    
    public function get_varios_cerradas($admin, $idusuario) {
        if($admin == 1) {
            $query = $this->db->query("SELECT count(*) as cant
                                        FROM 
                                            documentacion
                                        WHERE
                                            abierta = '0' AND
                                            tipo_operacion = '5'");
        } else {
            $query = $this->db->query("SELECT count(*) as cant
                                        FROM 
                                            documentacion
                                        WHERE
                                            abierta = '0' AND
                                            tipo_operacion = '5' AND
                                            productor = '$idusuario'");
        }
        $res = $query->row_array();
        return $res['cant'];
    }
    
    public function get_varios_cerradas_listado($pagina, $admin, $idusuario) {
        $pagina = $pagina-1;
        $pagina = $pagina * 25;
        if($admin == 1) {
            $query = $this->db->query("SELECT *
                                        FROM 
                                            documentacion d,
                                            tipos_operacion t,
                                            usuarios u
                                        WHERE
                                            d.tipo_operacion = t.idtipo_operacion AND
                                            d.productor = u.idusuario AND
                                            d.abierta = '0' AND
                                            d.tipo_operacion = '5'
                                        LIMIT
                                            $pagina, 25");
        } else {
            $query = $this->db->query("SELECT *
                                        FROM 
                                            documentacion d,
                                            tipos_operacion t,
                                            usuarios u
                                        WHERE
                                            d.tipo_operacion = t.idtipo_operacion AND
                                            d.productor = u.idusuario AND
                                            d.abierta = '0' AND
                                            d.tipo_operacion = '5' AND
                                            d.productor = '$idusuario'
                                        LIMIT
                                            $pagina, 25");
        }
        return $query->result_array();
    }
    
    public function get_varios_todas($admin, $idusuario) {
        if($admin == 1) {
            $query = $this->db->query("SELECT count(*) as cant
                                        FROM 
                                            documentacion
                                        WHERE
                                            tipo_operacion = '5'"); 
        } else {
            $query = $this->db->query("SELECT count(*) as cant
                                        FROM 
                                            documentacion
                                        WHERE
                                            tipo_operacion = '5' AND
                                            productor = '$idusuario'"); 
        }
        $res = $query->row_array();
        return $res['cant'];
    }
    
    public function get_varios_todas_listado($pagina, $admin, $idusuario) {
        $pagina = $pagina-1;
        $pagina = $pagina * 25;
        if($admin == 1) {
            $query = $this->db->query("SELECT *
                                        FROM 
                                            documentacion d,
                                            tipos_operacion t,
                                            usuarios u
                                        WHERE
                                            d.tipo_operacion = t.idtipo_operacion AND
                                            d.productor = u.idusuario AND
                                            d.tipo_operacion = '5'
                                        LIMIT
                                            $pagina, 25");
        } else {
            $query = $this->db->query("SELECT *
                                        FROM 
                                            documentacion d,
                                            tipos_operacion t,
                                            usuarios u
                                        WHERE
                                            d.tipo_operacion = t.idtipo_operacion AND
                                            d.productor = u.idusuario AND
                                            d.tipo_operacion = '5' AND
                                            d.productor = '$idusuario'
                                        LIMIT
                                            $pagina, 25");
        }
        return $query->result_array();
    }
    /*
     * Fin de Varios
     */
    
 
    
    /*
     * Emisiones
     */
    public function get_emisiones_nuevas($admin, $idusuario) {
        if($admin == 1) {
            $query = $this->db->query("SELECT count(*) as cant
                                        FROM 
                                            documentacion
                                        WHERE
                                            nueva = '1' AND
                                            (
                                            tipo_operacion = '10'
                                            )");
        } else {
            $query = $this->db->query("SELECT count(*) as cant
                                        FROM 
                                            documentacion
                                        WHERE
                                            nueva = '1' AND
                                            productor = '$idusuario' AND
                                            (
                                            tipo_operacion = '10'
                                            )");
        }
        $res = $query->row_array();
        return $res['cant'];
    }
    
    public function get_emisiones_nuevas_listado($pagina, $admin, $idusuario) {
        $pagina = $pagina-1;
        $pagina = $pagina * 25;
        if($admin == 1) {
            $query = $this->db->query("SELECT *
                                        FROM 
                                            documentacion d,
                                            tipos_operacion t,
                                            usuarios u
                                        WHERE
                                            d.tipo_operacion = t.idtipo_operacion AND
                                            d.productor = u.idusuario AND
                                            d.nueva = '1' AND
                                            (
                                            d.tipo_operacion = '10'
                                            )
                                        LIMIT
                                            $pagina, 25"); 
        } else {
            $query = $this->db->query("SELECT *
                                    FROM 
                                        documentacion d,
                                        tipos_operacion t,
                                        usuarios u
                                    WHERE
                                        d.tipo_operacion = t.idtipo_operacion AND
                                        d.productor = u.idusuario AND
                                        d.nueva = '1' AND
                                        d.productor = '$idusuario' AND
                                        (
                                        d.tipo_operacion = '10'
                                        )
                                    LIMIT
                                        $pagina, 25");
        }
        return $query->result_array();
    }
    
    public function get_emisiones_pendientes($admin, $idusuario) {
        if($admin == 1) {
            $query = $this->db->query("SELECT count(*) as cant
                                        FROM 
                                            documentacion
                                        WHERE
                                            pendiente = '1' AND
                                            abierta = '1' AND
                                            (
                                            tipo_operacion = '10'
                                            )");
        } else {
            $query = $this->db->query("SELECT count(*) as cant
                                        FROM 
                                            documentacion
                                        WHERE
                                            pendiente = '1' AND
                                            abierta = '1' AND
                                            productor = '$idusuario' AND
                                            (
                                            tipo_operacion = '10'
                                            )");
        }
        $res = $query->row_array();
        return $res['cant'];
    }
    
    public function get_emisiones_pendientes_listado($pagina, $admin, $idusuario) {
        $pagina = $pagina-1;
        $pagina = $pagina * 25;
        if($admin == 1) {
            $query = $this->db->query("SELECT *
                                        FROM 
                                            documentacion d,
                                            tipos_operacion t,
                                            usuarios u
                                        WHERE
                                            d.tipo_operacion = t.idtipo_operacion AND
                                            d.productor = u.idusuario AND
                                            d.pendiente = '1' AND
                                            d.abierta = '1' AND
                                            (
                                            tipo_operacion = '10'
                                            )
                                        LIMIT
                                            $pagina, 25"); 
        } else {
            $query = $this->db->query("SELECT *
                                    FROM 
                                        documentacion d,
                                        tipos_operacion t,
                                        usuarios u
                                    WHERE
                                        d.tipo_operacion = t.idtipo_operacion AND
                                        d.productor = u.idusuario AND
                                        d.pendiente = '0' AND
                                        d.abierta = '1' AND
                                        d.productor = '$idusuario' AND
                                        (
                                        tipo_operacion = '10'
                                        )
                                    LIMIT
                                        $pagina, 25");
        }
        return $query->result_array();
    }
    
    public function get_emisiones_abiertas($admin, $idusuario) {
        if($admin == 1) {
            $query = $this->db->query("SELECT count(*) as cant
                                        FROM 
                                            documentacion
                                        WHERE
                                            abierta = '1' AND
                                            (
                                            tipo_operacion = '10'
                                            )"); 
        } else {
            $query = $this->db->query("SELECT count(*) as cant
                                        FROM 
                                            documentacion
                                        WHERE
                                            abierta = '1' AND
                                            productor = '$idusuario' AND
                                            (
                                            tipo_operacion = '10'
                                            )"); 
        }
        $res = $query->row_array();
        return $res['cant'];
    }
    
    public function get_emisiones_abiertas_listado($pagina, $admin, $idusuario) {
        $pagina = $pagina-1;
        $pagina = $pagina * 25;
        if($admin == 1) {
            $query = $this->db->query("SELECT *
                                        FROM 
                                            documentacion d,
                                            tipos_operacion t,
                                            usuarios u
                                        WHERE
                                            d.tipo_operacion = t.idtipo_operacion AND
                                            d.productor = u.idusuario AND
                                            d.abierta = '1' AND
                                            (
                                            tipo_operacion = '10'
                                            )
                                        LIMIT
                                            $pagina, 25");
        } else {
            $query = $this->db->query("SELECT *
                                    FROM 
                                        documentacion d,
                                        tipos_operacion t,
                                        usuarios u
                                    WHERE
                                        d.tipo_operacion = t.idtipo_operacion AND
                                        d.productor = u.idusuario AND
                                        d.abierta = '1' AND
                                        d.productor = '$idusuario' AND
                                        (
                                        tipo_operacion = '10'
                                        )
                                    LIMIT
                                        $pagina, 25");
        }
        return $query->result_array();
    }
    
    public function get_emisiones_cerradas($admin, $idusuario) {
        if($admin == 1) {
            $query = $this->db->query("SELECT count(*) as cant
                                        FROM 
                                            documentacion
                                        WHERE
                                            abierta = '0' AND
                                            (
                                            tipo_operacion = '10'
                                            )");
        } else {
            $query = $this->db->query("SELECT count(*) as cant
                                        FROM 
                                            documentacion
                                        WHERE
                                            abierta = '0' AND
                                            productor = '$idusuario' AND
                                            (
                                            tipo_operacion = '10'
                                            )");
        }
        $res = $query->row_array();
        return $res['cant'];
    }
    
    public function get_emisiones_cerradas_listado($pagina, $admin, $idusuario) {
        $pagina = $pagina-1;
        $pagina = $pagina * 25;
        if($admin == 1) {
            $query = $this->db->query("SELECT *
                                        FROM 
                                            documentacion d,
                                            tipos_operacion t,
                                            usuarios u
                                        WHERE
                                            d.tipo_operacion = t.idtipo_operacion AND
                                            d.productor = u.idusuario AND
                                            d.abierta = '0' AND
                                            (
                                            tipo_operacion = '10'
                                            )
                                        LIMIT
                                            $pagina, 25");
        } else {
            $query = $this->db->query("SELECT *
                                        FROM 
                                            documentacion d,
                                            tipos_operacion t,
                                            usuarios u
                                        WHERE
                                            d.tipo_operacion = t.idtipo_operacion AND
                                            d.productor = u.idusuario AND
                                            d.abierta = '0' AND
                                            d.productor = '$idusuario' AND
                                            (
                                            tipo_operacion = '10'
                                            )
                                        LIMIT
                                            $pagina, 25");
        }
        return $query->result_array();
    }
    
    public function get_emisiones_todas($admin, $idusuario) {
        if($admin == 1) {
            $query = $this->db->query("SELECT count(*) as cant
                                        FROM 
                                            documentacion
                                        WHERE
                                            (
                                            tipo_operacion = '10'
                                            )");
        } else {
            $query = $this->db->query("SELECT count(*) as cant
                                        FROM 
                                            documentacion
                                        WHERE
                                            productor = '$idusuario' AND
                                            (
                                            tipo_operacion = '10'
                                            )");
        }
        $res = $query->row_array();
        return $res['cant'];
    }
    
    public function get_emisiones_todas_listado($pagina, $admin, $idusuario) {
        $pagina = $pagina-1;
        $pagina = $pagina * 25;
        if($admin == 1) {
            $query = $this->db->query("SELECT *
                                        FROM 
                                            documentacion d,
                                            tipos_operacion t,
                                            usuarios u
                                        WHERE
                                            d.tipo_operacion = t.idtipo_operacion AND
                                            d.productor = u.idusuario AND
                                            (
                                            tipo_operacion = '10'
                                            )
                                        LIMIT
                                            $pagina, 25");
        } else {
            $query = $this->db->query("SELECT *
                                        FROM 
                                            documentacion d,
                                            tipos_operacion t,
                                            usuarios u
                                        WHERE
                                            d.tipo_operacion = t.idtipo_operacion AND
                                            d.productor = u.idusuario AND
                                            d.productor = '$idusuario' AND
                                            (
                                            tipo_operacion = '10'
                                            )
                                        LIMIT
                                            $pagina, 25");
        }
        return $query->result_array();
    }
    /*
     * Fin de Emisiones
     */
    
    
    
    /*
     * Cobranzas
     */
    public function get_cobranzas_nuevas($admin, $idusuario) {
        if($admin == 1) {
            $query = $this->db->query("SELECT count(*) as cant
                                        FROM 
                                            documentacion
                                        WHERE
                                            nueva = '1' AND
                                            (
                                            tipo_operacion = '12' 
                                            )");
        } else {
            $query = $this->db->query("SELECT count(*) as cant
                                        FROM 
                                            documentacion
                                        WHERE
                                            nueva = '1' AND
                                            productor = '$idusuario' AND
                                            (
                                            tipo_operacion = '12'
                                            )");
        }
        $res = $query->row_array();
        return $res['cant'];
    }
    
    public function get_cobranzas_nuevas_listado($pagina, $admin, $idusuario) {
        $pagina = $pagina-1;
        $pagina = $pagina * 25;
        if($admin == 1) {
            $query = $this->db->query("SELECT *
                                        FROM 
                                            documentacion d,
                                            tipos_operacion t,
                                            usuarios u
                                        WHERE
                                            d.tipo_operacion = t.idtipo_operacion AND
                                            d.productor = u.idusuario AND
                                            d.nueva = '1' AND
                                            (
                                            tipo_operacion = '12'
                                            )
                                        LIMIT
                                            $pagina, 25");
        } else {
            $query = $this->db->query("SELECT *
                                        FROM 
                                            documentacion d,
                                            tipos_operacion t,
                                            usuarios u
                                        WHERE
                                            d.tipo_operacion = t.idtipo_operacion AND
                                            d.productor = u.idusuario AND
                                            d.nueva = '1' AND
                                            d.productor = '$idusuario' AND
                                            (
                                            tipo_operacion = '12'
                                            )
                                        LIMIT
                                            $pagina, 25");
        }
        return $query->result_array();
    }
    
    public function get_cobranzas_pendientes($admin, $idusuario) {
        if($admin == 1) {
            $query = $this->db->query("SELECT count(*) as cant
                                        FROM 
                                            documentacion
                                        WHERE
                                            pendiente = '1' AND
                                            abierta = '1' AND
                                            (
                                            tipo_operacion = '12'
                                            )");
        } else {
            $query = $this->db->query("SELECT count(*) as cant
                                        FROM 
                                            documentacion
                                        WHERE
                                            pendiente = '0' AND
                                            abierta = '1' AND
                                            productor = '$idusuario' AND
                                            (
                                            tipo_operacion = '12'
                                            )");
        }
        $res = $query->row_array();
        return $res['cant'];
    }
    
    public function get_cobranzas_pendientes_listado($pagina, $admin, $idusuario) {
        $pagina = $pagina-1;
        $pagina = $pagina * 25;
        if($admin == 1) {
            $query = $this->db->query("SELECT *
                                        FROM 
                                            documentacion d,
                                            tipos_operacion t,
                                            usuarios u
                                        WHERE
                                            d.tipo_operacion = t.idtipo_operacion AND
                                            d.productor = u.idusuario AND
                                            d.pendiente = '1' AND
                                            d.abierta = '1' AND
                                            (
                                            tipo_operacion = '12'
                                            )
                                        LIMIT
                                            $pagina, 25");
        } else {
            $query = $this->db->query("SELECT *
                                        FROM 
                                            documentacion d,
                                            tipos_operacion t,
                                            usuarios u
                                        WHERE
                                            d.tipo_operacion = t.idtipo_operacion AND
                                            d.productor = u.idusuario AND
                                            d.pendiente = '0' AND
                                            d.abierta = '1' AND
                                            d.productor = '$idusuario' AND
                                            (
                                            tipo_operacion = '12'
                                            )
                                        LIMIT
                                            $pagina, 25");
        }
        return $query->result_array();
    }
    
    public function get_cobranzas_abiertas($admin, $idusuario) {
        if($admin == 1) {
            $query = $this->db->query("SELECT count(*) as cant
                                        FROM 
                                            documentacion
                                        WHERE
                                            abierta = '1' AND
                                            (
                                            tipo_operacion = '12'
                                            )");
        } else {
            $query = $this->db->query("SELECT count(*) as cant
                                        FROM 
                                            documentacion
                                        WHERE
                                            abierta = '1' AND
                                            productor = '$idusuario' AND
                                            (
                                            tipo_operacion = '12'
                                            )");
        }
        $res = $query->row_array();
        return $res['cant'];
    }
    
    public function get_cobranzas_abiertas_listado($pagina, $admin, $idusuario) {
        $pagina = $pagina-1;
        $pagina = $pagina * 25;
        if($admin == 1) {
            $query = $this->db->query("SELECT *
                                        FROM 
                                            documentacion d,
                                            tipos_operacion t,
                                            usuarios u
                                        WHERE
                                            d.tipo_operacion = t.idtipo_operacion AND
                                            d.productor = u.idusuario AND
                                            d.abierta = '1' AND
                                            (
                                            tipo_operacion = '12'
                                            )
                                        LIMIT
                                            $pagina, 25");
        } else {
            $query = $this->db->query("SELECT *
                                        FROM 
                                            documentacion d,
                                            tipos_operacion t,
                                            usuarios u
                                        WHERE
                                            d.tipo_operacion = t.idtipo_operacion AND
                                            d.productor = u.idusuario AND
                                            d.abierta = '1' AND
                                            productor = '$idusuario' AND
                                            (
                                            tipo_operacion = '12'
                                            )
                                        LIMIT
                                            $pagina, 25");
        }
        return $query->result_array();
    }
    
    public function get_cobranzas_cerradas($admin, $idusuario) {
        if($admin == 1) {
            $query = $this->db->query("SELECT count(*) as cant
                                        FROM 
                                            documentacion
                                        WHERE
                                            abierta = '0' AND
                                            (
                                            tipo_operacion = '12'
                                            )");
        } else {
            $query = $this->db->query("SELECT count(*) as cant
                                        FROM 
                                            documentacion
                                        WHERE
                                            abierta = '0' AND
                                            productor = '$idusuario' AND
                                            (
                                            tipo_operacion = '12'
                                            )");
        }
        $res = $query->row_array();
        return $res['cant'];
    }
    
    public function get_cobranzas_cerradas_listado($pagina, $admin, $idusuario) {
        $pagina = $pagina-1;
        $pagina = $pagina * 25;
        if($admin == 1) {
            $query = $this->db->query("SELECT *
                                        FROM 
                                            documentacion d,
                                            tipos_operacion t,
                                            usuarios u
                                        WHERE
                                            d.tipo_operacion = t.idtipo_operacion AND
                                            d.productor = u.idusuario AND
                                            d.abierta = '0' AND
                                            (
                                            tipo_operacion = '12'
                                            )
                                        LIMIT
                                            $pagina, 25");
        } else {
            $query = $this->db->query("SELECT *
                                        FROM 
                                            documentacion d,
                                            tipos_operacion t,
                                            usuarios u
                                        WHERE
                                            d.tipo_operacion = t.idtipo_operacion AND
                                            d.productor = u.idusuario AND
                                            d.abierta = '0' AND
                                            d.productor = '$idusuario' AND
                                            (
                                            tipo_operacion = '12'
                                            )
                                        LIMIT
                                            $pagina, 25");
        }
        return $query->result_array();
    }
    
    public function get_cobranzas_todas($admin, $idusuario) {
        if($admin == 1) {
            $query = $this->db->query("SELECT count(*) as cant
                                        FROM 
                                            documentacion
                                        WHERE
                                            (
                                            tipo_operacion = '12'
                                            )");
        } else {
            $query = $this->db->query("SELECT count(*) as cant
                                        FROM 
                                            documentacion
                                        WHERE
                                            productor = '$idusuario' AND
                                            (
                                            tipo_operacion = '12'
                                            )");
        }
        $res = $query->row_array();
        return $res['cant'];
    }
    
    public function get_cobranzas_todas_listado($pagina, $admin, $idusuario) {
        $pagina = $pagina-1;
        $pagina = $pagina * 25;
        if($admin == 1) {
            $query = $this->db->query("SELECT *
                                        FROM 
                                            documentacion d,
                                            tipos_operacion t,
                                            usuarios u
                                        WHERE
                                            d.tipo_operacion = t.idtipo_operacion AND
                                            d.productor = u.idusuario AND
                                            (
                                            tipo_operacion = '12'
                                            )
                                        LIMIT
                                            $pagina, 25");
        } else {
            $query = $this->db->query("SELECT *
                                        FROM 
                                            documentacion d,
                                            tipos_operacion t,
                                            usuarios u
                                        WHERE
                                            d.tipo_operacion = t.idtipo_operacion AND
                                            d.productor = u.idusuario AND
                                            d.productor = '$idusuario' AND
                                            (
                                            tipo_operacion = '12'
                                            )
                                        LIMIT
                                            $pagina, 25");
        }
        return $query->result_array();
    }
    /*
     * Fin de Cobranzas
     */
    
    /*
     * Siniestros
     */
    public function get_siniestros_nuevas($admin, $idusuario) {
        if($admin == 1) {
            $query = $this->db->query("SELECT count(*) as cant
                                        FROM 
                                            siniestros s,
                                            usuarios u
                                        WHERE
                                            s.productor = u.idusuario AND
                                            s.nueva = '1'");
        } else {
            $query = $this->db->query("SELECT count(*) as cant
                                        FROM 
                                            siniestros s,
                                            usuarios u
                                        WHERE
                                            s.productor = u.idusuario AND
                                            s.productor = '$idusuario' AND
                                            s.nueva = '1'");
        }
        $res = $query->row_array();
        return $res['cant'];
    }
    
    public function get_siniestros_nuevas_listado($admin, $idusuario) {
        if($admin == 1) {
            $query = $this->db->query("SELECT *
                                        FROM 
                                            siniestros s,
                                            usuarios u
                                        WHERE
                                            s.productor = u.idusuario AND
                                            s.nueva = '1'"); 
        } else {
            $query = $this->db->query("SELECT *
                                    FROM 
                                        siniestros s,
                                        usuarios u
                                    WHERE
                                        s.productor = u.idusuario AND
                                        s.nueva = '1' AND
                                        s.productor = '$idusuario'");
        }
        return $query->result_array();
    }
    
    public function get_siniestros_pendientes($admin, $idusuario) {
        if($admin == 1) {
            $query = $this->db->query("SELECT count(*) as cant
                                        FROM 
                                            siniestros s,
                                            usuarios u
                                        WHERE
                                            s.productor = u.idusuario AND
                                            s.pendiente = '1' AND
                                            s.abierta = '1'");
        } else {
            $query = $this->db->query("SELECT count(*) as cant
                                    FROM 
                                        siniestros s,
                                        usuarios u
                                    WHERE
                                        s.productor = u.idusuario AND
                                        s.productor = '$idusuario' AND
                                        s.pendiente = '0' AND
                                        s.abierta = '1'");
        }
        $res = $query->row_array();
        return $res['cant'];
    }
    
    public function get_siniestros_pendientes_listado($admin, $idusuario) {
        if($admin == 1) {
            $query = $this->db->query("SELECT *
                                        FROM 
                                            siniestros s,
                                            usuarios u
                                        WHERE
                                            s.productor = u.idusuario AND
                                            s.pendiente = '1' AND
                                            s.abierta = '1'"); 
        } else {
            $query = $this->db->query("SELECT *
                                    FROM 
                                        siniestros s,
                                        usuarios u
                                    WHERE
                                        s.productor = u.idusuario AND
                                        s.pendiente = '0' AND
                                        s.abierta = '1' AND
                                        s.productor = '$idusuario'");
        }
        return $query->result_array();
    }
    
    public function get_siniestros_abiertas($admin, $idusuario) {
        if($admin == 1) {
            $query = $this->db->query("SELECT count(*) as cant
                                        FROM 
                                            siniestros s,
                                            usuarios u
                                        WHERE
                                            s.productor = u.idusuario AND
                                            s.abierta = '1'");
        } else {
            $query = $this->db->query("SELECT count(*) as cant
                                    FROM 
                                        siniestros s,
                                        usuarios u
                                    WHERE
                                        s.productor = u.idusuario AND
                                        s.productor = '$idusuario' AND
                                        s.abierta = '1'");
        }
        $res = $query->row_array();
        return $res['cant'];
    }
    
    public function get_siniestros_abiertas_listado($admin, $idusuario) {
        if($admin == 1) {
            $query = $this->db->query("SELECT *
                                        FROM 
                                            siniestros s,
                                            usuarios u
                                        WHERE
                                            s.productor = u.idusuario AND
                                            s.abierta = '1'");
        } else {
            $query = $this->db->query("SELECT *
                                    FROM 
                                        siniestros s,
                                        usuarios u
                                    WHERE
                                        s.productor = u.idusuario AND
                                        s.abierta = '1' AND
                                        s.productor = '$idusuario'");
        }
        return $query->result_array();
    }
    
    public function get_siniestros_cerradas($admin, $idusuario) {
        if($admin == 1) {
            $query = $this->db->query("SELECT count(*) as cant
                                        FROM 
                                            siniestros
                                        WHERE
                                            abierta = '0'");
        } else {
            $query = $this->db->query("SELECT count(*) as cant
                                    FROM 
                                        siniestros
                                    WHERE
                                        productor = '$idusuario' AND
                                        abierta = '0'");
        }
        $res = $query->row_array();
        return $res['cant'];
    }
    
    public function get_siniestros_cerradas_listado($admin, $idusuario) {
        if($admin == 1) {
            $query = $this->db->query("SELECT *
                                        FROM 
                                            siniestros s,
                                            usuarios u
                                        WHERE
                                            s.productor = u.idusuario AND
                                            s.abierta = '0'");
        } else {
            $query = $this->db->query("SELECT *
                                        FROM 
                                            siniestros s,
                                            usuarios u
                                        WHERE
                                            s.productor = u.idusuario AND
                                            s.abierta = '0' AND
                                            s.productor = '$idusuario'");
        }
        return $query->result_array();
    }
    
    public function get_siniestros_todas($admin, $idusuario) {
        if($admin == 1) {
            $query = $this->db->query("SELECT count(*) as cant
                                        FROM 
                                            siniestros s,
                                            usuarios u
                                        WHERE
                                            s.productor = u.idusuario");
        } else {
            $query = $this->db->query("SELECT count(*) as cant
                                    FROM 
                                        siniestros s,
                                        usuarios u
                                    WHERE
                                        s.productor = u.idusuario AND
                                        productor = '$idusuario'");
        }
        $res = $query->row_array();
        return $res['cant'];
    }
    
    public function get_siniestros_todas_listado($admin, $idusuario) {
        if($admin == 1) {
            $query = $this->db->query("SELECT *
                                        FROM 
                                            siniestros s,
                                            usuarios u
                                        WHERE
                                            s.productor = u.idusuario");
        } else {
            $query = $this->db->query("SELECT *
                                        FROM 
                                            siniestros s,
                                            usuarios u
                                        WHERE
                                            s.productor = u.idusuario AND
                                            s.productor = '$idusuario'");
        }
        return $query->result_array();
    }
    /*
     * Fin de Siniestros
     */
    
    
    public function get_documentacion_por_id($iddocumentacion) {
        $query = $this->db->query("SELECT *
                                    FROM
                                        documentacion
                                    WHERE
                                        iddocumentacion = '$iddocumentacion'");
        return $query->row_array();
    }
    
    public function update($datos, $id) {
        $idcontenido = array(
            'iddocumentacion' => $id
        );
        
        $this->db->update('documentacion', $datos, $idcontenido);
    }
    
    public function get_mis_documentos_abiertos($idusuario) {
        $query = $this->db->query("SELECT *
                                    FROM
                                        documentacion d,
                                        tipos_operacion t,
                                        usuarios u
                                    WHERE
                                        d.tipo_operacion = t.idtipo_operacion AND
                                        d.productor = u.idusuario AND
                                        d.abierta = '1' AND
                                        d.productor = '$idusuario'");
        return $query->result_array();
    }
    
    public function gets_where($datos) {
        $query = $this->db->get_where('documentacion', $datos);
        return $query->result_array();
    }
    
    public function eliminar($iddocumentacion) {
        $this->db->delete('respuestas_documentacion', array('iddocumentacion' => $iddocumentacion));
        $this->db->delete('documentacion', array('iddocumentacion' => $iddocumentacion));
    }
}
?>
