<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array(
            'session',
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
    
    public function index() {
        $session = $this->session->all_userdata();
        $session['title'] = 'Cargar Documentación';
        $session['session'] = $session;
        
        $left = $this->h_panel->get($session);
        
        $data['emisiones'] = $this->documentacion_model->get_emisiones_nuevas($session['admin'], $session['SID']);
        $data['cobranzas'] = $this->documentacion_model->get_cobranzas_nuevas($session['admin'], $session['SID']);
        $data['siniestros'] = $this->documentacion_model->get_siniestros_nuevas($session['admin'], $session['SID']);
        $data['varios'] = $this->documentacion_model->get_varios_nuevas($session['admin'], $session['SID']);
        
        $this->load->view('layout/header', $session);
        $this->load->view('layout/panel-izquierda', $left);
        $this->load->view('home/index', $data);
        $this->load->view('layout/footer');
    }
    
}
?>
