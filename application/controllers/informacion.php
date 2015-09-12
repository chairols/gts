<?php

class Informacion extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array(
            'session',
            'h_panel'
        ));
        $this->load->helper(array(
            'url'
        ));
        $this->load->model(array(
            'documentacion_model',
            'usuarios_model',
            'companias_model',
            'contactos_model',
            'asegurados_model',
            'circulares_model',
            'contactos_varios_model'
        ));
        
        $session = $this->session->all_userdata();
        if(empty($session['SID'])) {
            redirect('/login/', 'refresh');
        }
    }
    
    public function productores() {
        $session = $this->session->all_userdata();
        $session['title'] = 'Productores';
        
        $left = $this->h_panel->get($session);
        $data['productores'] = $this->usuarios_model->get_productores();
        
        $this->load->view('layout/header', $session);
        $this->load->view('layout/panel-izquierda', $left);
        $this->load->view('informacion/productores', $data);
        $this->load->view('layout/footer');

    }
    
    public function companias() {
        $session = $this->session->all_userdata();
        $session['title'] = 'Compañias';
        
        $left = $this->h_panel->get($session);
        $data['companias'] = $this->companias_model->get_companias();
        
        $this->load->view('layout/header', $session);
        $this->load->view('layout/panel-izquierda', $left);
        $this->load->view('informacion/companias', $data);
        $this->load->view('layout/footer');
    }
    
    public function contactos() {
        $session = $this->session->all_userdata();
        $session['title'] = 'Contactos';
        
        $left = $this->h_panel->get($session);
        $data['contactos'] = $this->contactos_model->get_contactos();
        foreach($data['contactos'] as $key => $value) {
            $data['contactos'][$key]['compania'] = $this->companias_model->get_compania_por_id($value['compania']);
        }
        
        $this->load->view('layout/header', $session);
        $this->load->view('layout/panel-izquierda', $left);
        $this->load->view('informacion/contactos', $data);
        $this->load->view('layout/footer');
    }
    
    public function asegurados() {
        $session = $this->session->all_userdata();
        $session['title'] = 'Asegurados';
        
        $left = $this->h_panel->get($session);
        $data['asegurados'] = $this->asegurados_model->gets();
        
        $this->load->view('layout/header', $session);
        $this->load->view('layout/panel-izquierda', $left);
        $this->load->view('informacion/asegurados', $data);
        $this->load->view('layout/footer');
    }
    
    public function circulares() {
        $session = $this->session->all_userdata();
        $session['title'] = 'Circulares';
        
        $left = $this->h_panel->get($session);
        $data['circulares'] = $this->circulares_model->gets();
        
        $this->load->view('layout/header', $session);
        $this->load->view('layout/panel-izquierda', $left);
        $this->load->view('informacion/circulares', $data);
        $this->load->view('layout/footer');
    }
    
    public function contactos_varios() {
        $session = $this->session->all_userdata();
        $session['title'] = 'Contactos Varios';
        
        $left = $this->h_panel->get($session);
        $data['contactos'] = $this->contactos_varios_model->gets();
        
        $this->load->view('layout/header', $session);
        $this->load->view('layout/panel-izquierda', $left);
        $this->load->view('informacion/contactos_varios', $data);
        $this->load->view('layout/footer');
    }
     
}
?>