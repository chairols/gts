<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Varios extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array(
            'session',
            'form_validation',
            'q_paginacion',
            'h_panel'
        ));
        $this->load->helper(array(
            'url'
        ));
        $this->load->model(array(
            'documentacion_model'
        ));
        
        $session = $this->session->all_userdata();
        if(empty($session['SID'])) {
            redirect('/login/', 'refresh');
        }
    }
    
    public function nuevas($pagina = null) {
        $session = $this->session->all_userdata();
        if(!$pagina) { $pagina = 1; }
        $data['paginacion'] = $this->q_paginacion->paginar($pagina, 25, $this->documentacion_model->get_varios_nuevas($session['admin'], $session['SID']), '/varios/nuevas');
        
        $data['nuevas'] = $this->documentacion_model->get_varios_nuevas_listado($pagina, $session['admin'], $session['SID']);
        
        $left = $this->h_panel->get($session);
        
        $this->load->view('layout/header', $session);
        $this->load->view('layout/panel-izquierda', $left);
        $this->load->view('documentacion/listado', $data);
        $this->load->view('layout/footer');
    }
    
    public function pendientes($pagina = null) {
        $session = $this->session->all_userdata();
        if(!$pagina) { $pagina = 1; }
        $data['paginacion'] = $this->q_paginacion->paginar($pagina, 25, $this->documentacion_model->get_varios_pendientes($session['admin'], $session['SID']), '/varios/pendientes');
        
        $data['nuevas'] = $this->documentacion_model->get_varios_pendientes_listado($pagina, $session['admin'], $session['SID']);
        
        $left = $this->h_panel->get($session);
        
        $this->load->view('layout/header', $session);
        $this->load->view('layout/panel-izquierda', $left);
        $this->load->view('documentacion/pendientes', $data);
        $this->load->view('layout/footer');
    }
    
    public function abiertas($pagina = null) {
        $session = $this->session->all_userdata();
        if(!$pagina) { $pagina = 1; }
        $data['paginacion'] = $this->q_paginacion->paginar($pagina, 25, $this->documentacion_model->get_varios_abiertas($session['admin'], $session['SID']), '/varios/abiertas');
        
        $data['nuevas'] = $this->documentacion_model->get_varios_abiertas_listado($pagina, $session['admin'], $session['SID']);
        
        $left = $this->h_panel->get($session);
        
        $this->load->view('layout/header', $session);
        $this->load->view('layout/panel-izquierda', $left);
        $this->load->view('documentacion/listado', $data);
        $this->load->view('layout/footer');
    }
    
    public function cerradas($pagina = null) {
        $session = $this->session->all_userdata();
        if(!$pagina) { $pagina = 1; }
        $data['paginacion'] = $this->q_paginacion->paginar($pagina, 25, $this->documentacion_model->get_varios_cerradas($session['admin'], $session['SID']), '/varios/cerradas');
        
        $data['nuevas'] = $this->documentacion_model->get_varios_cerradas_listado($pagina, $session['admin'], $session['SID']);
        
        $left = $this->h_panel->get($session);
        
        $this->load->view('layout/header', $session);
        $this->load->view('layout/panel-izquierda', $left);
        $this->load->view('documentacion/listado', $data);
        $this->load->view('layout/footer');
    }
    
    public function todas($pagina = null) {
        $session = $this->session->all_userdata();
        if(!$pagina) { $pagina = 1; }
        $data['paginacion'] = $this->q_paginacion->paginar($pagina, 25, $this->documentacion_model->get_varios_todas($session['admin'], $session['SID']), '/varios/todas');
        
        $data['nuevas'] = $this->documentacion_model->get_varios_todas_listado($pagina, $session['admin'], $session['SID']);
        
        $left = $this->h_panel->get($session);
        
        $this->load->view('layout/header', $session);
        $this->load->view('layout/panel-izquierda', $left);
        $this->load->view('documentacion/listado', $data);
        $this->load->view('layout/footer');
    }
    
    
}
?>

