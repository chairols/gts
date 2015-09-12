<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Facturas extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array(
            'session',
            'form_validation'
        ));
        $this->load->helper(array(
            'url'
        ));
        $this->load->model(array(
            'documentacion_model',
            'usuarios_model',
            'companias_model',
            'facturas_model'
        ));
        
        $session = $this->session->all_userdata();
        if(empty($session['SID'])) {
            redirect('/login/', 'refresh');
        }
    }
    
    public function agregar() {
        $session = $this->session->all_userdata();
        $session['title'] = 'Cargar Documentación';
        
        $data['productores'] = $this->usuarios_model->get_productores();
        $data['companias'] = $this->companias_model->get_companias();
        
        $this->form_validation->set_rules('tipo', 'Tipo', 'required');
        $this->form_validation->set_rules('numero', 'Numero', 'required|integer');
        $this->form_validation->set_rules('fecha', 'Fecha de ingreso', 'required');
        
        if($this->form_validation->run() == FALSE) {
             
        } else {
            $datos = array(
                'productor' => $this->input->post('productor'),
                'compania' => $this->input->post('compania'),
                'comprobante' => $this->input->post('compania'),
                'tipo' => $this->input->post('tipo'),
                'numero' => $this->input->post('numero'),
                'fecha' => $this->input->post('fecha')
            );
            
            $this->facturas_model->set_factura($datos);
            
            redirect('/facturas/agregar/', 'redirect');
        }
        
        $left = $this->get_datos_panel($session);

        $this->load->view('layout/header', $session);
        $this->load->view('layout/panel-izquierda', $left);
        $this->load->view('facturas/agregar', $data);
        $this->load->view('layout/footer');
    }
    
    private function get_datos_panel($session) {
        
        $left['documentacion']['nuevas'] = $this->documentacion_model->get_documentacion_nuevas($session['admin'], $session['SID']);
        $left['documentacion']['pendientes'] = $this->documentacion_model->get_documentacion_pendientes($session['admin'], $session['SID']);
        $left['documentacion']['abiertas'] = $this->documentacion_model->get_documentacion_abiertas($session['admin'], $session['SID']);
        $left['documentacion']['cerradas'] = $this->documentacion_model->get_documentacion_cerradas($session['admin'], $session['SID']);
        $left['documentacion']['todas'] = $this->documentacion_model->get_documentacion_todas($session['admin'], $session['SID']);
        
        $left['varios']['nuevas'] = $this->documentacion_model->get_varios_nuevas($session['admin'], $session['SID']);
        $left['varios']['pendientes'] = $this->documentacion_model->get_varios_pendientes($session['admin'], $session['SID']);
        $left['varios']['abiertas'] = $this->documentacion_model->get_varios_abiertas($session['admin'], $session['SID']);
        $left['varios']['cerradas'] = $this->documentacion_model->get_varios_cerradas($session['admin'], $session['SID']);
        $left['varios']['todas'] = $this->documentacion_model->get_varios_todas($session['admin'], $session['SID']);
        
        $left['emisiones']['nuevas'] = $this->documentacion_model->get_emisiones_nuevas($session['admin'], $session['SID']);
        $left['emisiones']['pendientes'] = $this->documentacion_model->get_emisiones_pendientes($session['admin'], $session['SID']);
        $left['emisiones']['abiertas'] = $this->documentacion_model->get_emisiones_abiertas($session['admin'], $session['SID']);
        $left['emisiones']['cerradas'] = $this->documentacion_model->get_emisiones_cerradas($session['admin'], $session['SID']);
        $left['emisiones']['todas'] = $this->documentacion_model->get_emisiones_todas($session['admin'], $session['SID']);
        
        $left['cobranzas']['nuevas'] = $this->documentacion_model->get_cobranzas_nuevas($session['admin'], $session['SID']);
        $left['cobranzas']['pendientes'] = $this->documentacion_model->get_cobranzas_pendientes($session['admin'], $session['SID']);
        $left['cobranzas']['abiertas'] = $this->documentacion_model->get_cobranzas_abiertas($session['admin'], $session['SID']);
        $left['cobranzas']['cerradas'] = $this->documentacion_model->get_cobranzas_cerradas($session['admin'], $session['SID']);
        $left['cobranzas']['todas'] = $this->documentacion_model->get_cobranzas_todas($session['admin'], $session['SID']);
        
        $left['siniestros']['nuevas'] = $this->documentacion_model->get_siniestros_nuevas($session['admin'], $session['SID']);
        $left['siniestros']['pendientes'] = $this->documentacion_model->get_siniestros_pendientes($session['admin'], $session['SID']);
        $left['siniestros']['abiertas'] = $this->documentacion_model->get_siniestros_abiertas($session['admin'], $session['SID']);
        $left['siniestros']['cerradas'] = $this->documentacion_model->get_siniestros_cerradas($session['admin'], $session['SID']);
        $left['siniestros']['todas'] = $this->documentacion_model->get_siniestros_todas($session['admin'], $session['SID']);
        
        
        return $left;
    }
}

?>
