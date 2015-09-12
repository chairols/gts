<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contactos extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array(
            'session',
            'form_validation',
            'h_panel'
        ));
        $this->load->helper(array(
            'url'
        ));
        $this->load->model(array(
            'documentacion_model',
            'companias_model',
            'contactos_model'
        ));
        
        $session = $this->session->all_userdata();
        if(empty($session['SID'])) {
            redirect('/login/', 'refresh');
        }
    }
    
    public function agregar() {
        $session = $this->session->all_userdata();
        
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('apellido', 'Apellido', 'required');
        $this->form_validation->set_rules('email', 'Email', 'valid_email');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            $datos = array(
                'nombre' => $this->input->post('nombre'),
                'apellido' => $this->input->post('apellido'),
                'telefono' => $this->input->post('telefono'),
                'email' => $this->input->post('email'),
                'celular' => $this->input->post('celular'),
                'sector' => $this->input->post('sector'),
                'compania' => $this->input->post('compania')
            );
            
            $config['upload_path'] = './upload/contactos';
            $config['allowed_types'] = '*';
            
            $this->load->library('upload', $config);
            $nombre_del_campo = 'adjunto';
            $adjunto = null;
            if(!$this->upload->do_upload($nombre_del_campo)) {
                $error = array('error' => $this->upload->display_errors());
            } else {
                $adjunto = array('upload_data', $this->upload->data());
            }
            
            if(!is_null($adjunto)) {
                $datos['adjunto'] = $adjunto[1]['raw_name'].$adjunto[1]['file_ext'];
            }
            
            $this->contactos_model->set_contacto($datos);
            
            redirect('/contactos/agregar', 'refresh');
        }
        
        $left = $this->get_datos_panel($session);
        
        $data['companias'] = $this->companias_model->get_companias();
        
        
        $this->load->view('layout/header', $session);
        $this->load->view('layout/panel-izquierda', $left);
        $this->load->view('contactos/agregar', $data);
        $this->load->view('layout/footer');
    }
    
    public function editar($idcontacto = null) {
        $session = $this->session->all_userdata();
        $session['title'] = 'Editar Contacto';
        
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('apellido', 'Apellido', 'required');
        $this->form_validation->set_rules('email', 'Email', 'valid_email');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            $datos = array(
                'nombre' => $this->input->post('nombre'),
                'apellido' => $this->input->post('apellido'),
                'telefono' => $this->input->post('telefono'),
                'email' => $this->input->post('email'),
                'celular' => $this->input->post('celular'),
                'sector' => $this->input->post('sector'),
                'compania' => $this->input->post('compania')
            );
            
            $this->contactos_model->update($datos, $idcontacto);
            
            redirect('/informacion/contactos', 'refresh');
        }
        
        $left = $this->h_panel->get($session);
        
        $data['contacto'] = $this->contactos_model->get($idcontacto);
        $data['companias'] = $this->companias_model->get_companias();
        
        $this->load->view('layout/header', $session);
        $this->load->view('layout/panel-izquierda', $left);
        $this->load->view('contactos/editar', $data);
        $this->load->view('layout/footer');
    }
    
    public function borrar($idcontacto = null) {
        $session = $this->session->all_userdata();
        if($idcontacto != null) {
            $this->contactos_model->borrar($idcontacto);
        }
        redirect('/informacion/contactos', 'refresh');
    }
    
    public function view($idcontacto) {
        $session = $this->session->all_userdata();
        
        
        $left = $this->get_datos_panel($session);
        
        $data['contacto'] = $this->contactos_model->get($idcontacto);
        $data['contacto']['compania'] = $this->companias_model->get_compania_por_id($data['contacto']['compania']);
        
        $this->load->view('layout/header', $session);
        $this->load->view('layout/panel-izquierda', $left);
        $this->load->view('contactos/view', $data);
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
