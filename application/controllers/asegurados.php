<?php

class Asegurados extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array(
            'session',
            'h_session',
            'form_validation',
            'h_panel'
        ));
        $this->load->model(array(
            'documentacion_model',
            'companias_model',
            'asegurados_model'
        ));
    }
    
    public function agregar() {
        $session = $this->session->all_userdata();
        $this->h_session->check($session);
        
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('apellido', 'Apellido', 'required');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            $datos = array(
                'nombre' => $this->input->post('nombre'),
                'apellido' => $this->input->post('apellido'),
                'telefono' => $this->input->post('telefono'),
                'celular' => $this->input->post('celular'),
                'email' => $this->input->post('email'),
                'idcompania' => $this->input->post('compania'),
                'poliza' => $this->input->post('poliza'),
                'observaciones' => $this->input->post('observaciones')
            );
            
            $this->asegurados_model->set($datos);
        }
        
        $data['companias'] = $this->companias_model->get_companias();
        $left = $this->h_panel->get($session);
        
        $this->load->view('layout/header', $session);
        $this->load->view('layout/panel-izquierda', $left);
        $this->load->view('asegurados/agregar', $data);
        $this->load->view('layout/footer');
    }
    
    public function view($idasegurado = null) {
        $session = $this->session->all_userdata();
        if($idasegurado == null) {
            show_404();
        }
        
        $left = $this->h_panel->get($session);
        $datos = array(
            'idasegurado' => $idasegurado
        );
        $data['asegurado'] = $this->asegurados_model->get_where($datos);
        $data['compania'] = $this->companias_model->get_compania_por_id($data['asegurado']['idcompania']);
        
        $this->load->view('layout/header', $session);
        $this->load->view('layout/panel-izquierda', $left);
        $this->load->view('asegurados/view', $data);
        $this->load->view('layout/footer');
    }
    
}
?>