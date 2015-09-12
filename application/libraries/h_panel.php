<?php
if ( ! defined('BASEPATH')) exit('No se permite acceso directo al script');

class H_panel {
    protected $ci;
    
    public function __construct() {
        $this->ci =& get_instance();
    }
    
    public function get($session) {
        $this->ci->load->model('documentacion_model');
        
        $left['cotizaciones']['nuevas'] = $this->ci->documentacion_model->get_cotizaciones_nuevas($session['admin'], $session['SID']);
        $left['cotizaciones']['pendientes'] = $this->ci->documentacion_model->get_cotizaciones_pendientes($session['admin'], $session['SID']);
        $left['cotizaciones']['abiertas'] = $this->ci->documentacion_model->get_cotizaciones_abiertas($session['admin'], $session['SID']);
        $left['cotizaciones']['cerradas'] = $this->ci->documentacion_model->get_cotizaciones_cerradas($session['admin'], $session['SID']);
        $left['cotizaciones']['todas'] = $this->ci->documentacion_model->get_cotizaciones_todas($session['admin'], $session['SID']);
        
        $left['reclamos']['nuevas'] = $this->ci->documentacion_model->get_reclamos_nuevas($session['admin'], $session['SID']);
        $left['reclamos']['pendientes'] = $this->ci->documentacion_model->get_reclamos_pendientes($session['admin'], $session['SID']);
        $left['reclamos']['abiertas'] = $this->ci->documentacion_model->get_reclamos_abiertas($session['admin'], $session['SID']);
        $left['reclamos']['cerradas'] = $this->ci->documentacion_model->get_reclamos_cerradas($session['admin'], $session['SID']);
        $left['reclamos']['todas'] = $this->ci->documentacion_model->get_reclamos_todas($session['admin'], $session['SID']);
        
        $left['documentacion']['nuevas'] = $this->ci->documentacion_model->get_documentacion_nuevas($session['admin'], $session['SID']);
        $left['documentacion']['pendientes'] = $this->ci->documentacion_model->get_documentacion_pendientes($session['admin'], $session['SID']);
        $left['documentacion']['abiertas'] = $this->ci->documentacion_model->get_documentacion_abiertas($session['admin'], $session['SID']);
        $left['documentacion']['cerradas'] = $this->ci->documentacion_model->get_documentacion_cerradas($session['admin'], $session['SID']);
        $left['documentacion']['todas'] = $this->ci->documentacion_model->get_documentacion_todas($session['admin'], $session['SID']);
        
        $left['varios']['nuevas'] = $this->ci->documentacion_model->get_varios_nuevas($session['admin'], $session['SID']);
        $left['varios']['pendientes'] = $this->ci->documentacion_model->get_varios_pendientes($session['admin'], $session['SID']);
        $left['varios']['abiertas'] = $this->ci->documentacion_model->get_varios_abiertas($session['admin'], $session['SID']);
        $left['varios']['cerradas'] = $this->ci->documentacion_model->get_varios_cerradas($session['admin'], $session['SID']);
        $left['varios']['todas'] = $this->ci->documentacion_model->get_varios_todas($session['admin'], $session['SID']);
        
        $left['emisiones']['nuevas'] = $this->ci->documentacion_model->get_emisiones_nuevas($session['admin'], $session['SID']);
        $left['emisiones']['pendientes'] = $this->ci->documentacion_model->get_emisiones_pendientes($session['admin'], $session['SID']);
        $left['emisiones']['abiertas'] = $this->ci->documentacion_model->get_emisiones_abiertas($session['admin'], $session['SID']);
        $left['emisiones']['cerradas'] = $this->ci->documentacion_model->get_emisiones_cerradas($session['admin'], $session['SID']);
        $left['emisiones']['todas'] = $this->ci->documentacion_model->get_emisiones_todas($session['admin'], $session['SID']);
        
        $left['cobranzas']['nuevas'] = $this->ci->documentacion_model->get_cobranzas_nuevas($session['admin'], $session['SID']);
        $left['cobranzas']['pendientes'] = $this->ci->documentacion_model->get_cobranzas_pendientes($session['admin'], $session['SID']);
        $left['cobranzas']['abiertas'] = $this->ci->documentacion_model->get_cobranzas_abiertas($session['admin'], $session['SID']);
        $left['cobranzas']['cerradas'] = $this->ci->documentacion_model->get_cobranzas_cerradas($session['admin'], $session['SID']);
        $left['cobranzas']['todas'] = $this->ci->documentacion_model->get_cobranzas_todas($session['admin'], $session['SID']);
        
        $left['siniestros']['nuevas'] = $this->ci->documentacion_model->get_siniestros_nuevas($session['admin'], $session['SID']);
        $left['siniestros']['pendientes'] = $this->ci->documentacion_model->get_siniestros_pendientes($session['admin'], $session['SID']);
        $left['siniestros']['abiertas'] = $this->ci->documentacion_model->get_siniestros_abiertas($session['admin'], $session['SID']);
        $left['siniestros']['cerradas'] = $this->ci->documentacion_model->get_siniestros_cerradas($session['admin'], $session['SID']);
        $left['siniestros']['todas'] = $this->ci->documentacion_model->get_siniestros_todas($session['admin'], $session['SID']);
        
        
        return $left;
    }
}
?>