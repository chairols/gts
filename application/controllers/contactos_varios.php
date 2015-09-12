<?php

class Contactos_varios extends CI_Controller {
    
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
            'contactos_varios_model'
        ));
        $this->load->helper(array(
            'url'
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
                'observaciones' => $this->input->post('observaciones'),
                'activo' => '1'
            );
            
            $this->contactos_varios_model->set($datos);
        }
        
        $left = $this->h_panel->get($session);
        
        $this->load->view('layout/header', $session);
        $this->load->view('layout/panel-izquierda', $left);
        $this->load->view('contactos_varios/agregar');
        $this->load->view('layout/footer');
    }
    
    public function view($idcontactos_varios = null) {
        $session = $this->session->all_userdata();
        if($idcontactos_varios == null) {
            show_404();
        }
        
        $left = $this->h_panel->get($session);
        $datos = array(
            'idcontactos_varios' => $idcontactos_varios
        );
        $data['contacto'] = $this->contactos_varios_model->get_where($datos);
        //$data['compania'] = $this->companias_model->get_compania_por_id($data['circular']['idcompania']);
        
        $this->load->view('layout/header', $session);
        $this->load->view('layout/panel-izquierda', $left);
        $this->load->view('contactos_varios/view', $data);
        $this->load->view('layout/footer');
    }
    
    public function editar($idcontactos_varios = null) {
        $session = $this->session->all_userdata();
        if($idcontactos_varios == null) {
            show_404();
        }
        
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
                'observaciones' => $this->input->post('observaciones')
            );
            
            $this->contactos_varios_model->update($datos, $idcontactos_varios);
            
        }
        
        $left = $this->h_panel->get($session);
        $datos = array(
            'idcontactos_varios' => $idcontactos_varios
        );
        $data['contacto'] = $this->contactos_varios_model->get_where($datos);
        
        $this->load->view('layout/header', $session);
        $this->load->view('layout/panel-izquierda', $left);
        $this->load->view('contactos_varios/editar', $data);
        $this->load->view('layout/footer');
    }
    
    public function borrar($idcontactos_varios = null) {
        $session = $this->session->all_userdata();
        if($idcontactos_varios == null) {
            show_404();
        }
        
        $datos = array(
            'activo' => '0'
        );
        
        $this->contactos_varios_model->update($datos, $idcontactos_varios);
        
        redirect('/informacion/contactos_varios/', 'refresh');
    }
}

?>