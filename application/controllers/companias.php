<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Companias extends CI_Controller {
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
            'companias_model',
            'documentacion_model'
        ));
        
        $session = $this->session->all_userdata();
        if(empty($session['SID'])) {
            redirect('/login/', 'refresh');
        }
    }
    
    public function agregar() {
        $session = $this->session->all_userdata();
        $session['title'] = 'Agregar Compañía';
        
        $this->form_validation->set_rules('compania', 'Compañía', 'required');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            $datos = array(
                'compania' => $this->input->post('compania'),
                'contacto' => $this->input->post('contacto'),
                'direccion' => $this->input->post('direccion'),
                'telefono' => $this->input->post('telefono'),
                'email' => $this->input->post('email'),
                'observacion' => $this->input->post('observacion')
            );
            
            $config['upload_path'] = './upload/companias';
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
            
            $this->companias_model->set_compania($datos);
            
            redirect('/companias/agregar/', 'refresh');
        }
        
        
        $left = $this->get_datos_panel($session);
        
        
        $this->load->view('layout/header', $session);
        $this->load->view('layout/panel-izquierda', $left);
        $this->load->view('companias/agregar');
        $this->load->view('layout/footer');
    }
    
    public function view($idcompania) {
        $session = $this->session->all_userdata();
        
        $left = $this->get_datos_panel($session);
        
        $data['compania'] = $this->companias_model->get_compania_por_id($idcompania);
        
        $this->load->view('layout/header', $session);
        $this->load->view('layout/panel-izquierda', $left);
        $this->load->view('companias/view', $data);
        $this->load->view('layout/footer');
    }
    
    public function update($idcompania) {
        $session = $this->session->all_userdata();
        if($session['admin'] == 1) {
            $session['title'] = 'Editar Compañía';

            $this->form_validation->set_rules('compania', 'Compañía', 'required');
            $this->form_validation->set_rules('email', 'Email', 'valid_email');

            if($this->form_validation->run() == FALSE) {

            } else {
                $datos = array(
                    'compania' => $this->input->post('compania'),
                    'contacto' => $this->input->post('contacto'),
                    'direccion' => $this->input->post('direccion'),
                    'telefono' => $this->input->post('telefono'),
                    'email' => $this->input->post('email'),
                    'observacion' => $this->input->post('observacion')
                );

                $this->companias_model->update($datos, $idcompania);

                redirect('/companias/update/'.$idcompania.'/', 'refresh');
            }

            $left = $this->get_datos_panel($session);
            
            $data['compania'] = $this->companias_model->get_compania_por_id($idcompania);

            $this->load->view('layout/header', $session);
            $this->load->view('layout/panel-izquierda', $left);
            $this->load->view('companias/update', $data);
            $this->load->view('layout/footer');
        } else {
            show_404();
        }
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
