<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Documentacion extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array(
            'session',
            'form_validation',
            'h_panel',
            'email'
        ));
        $this->load->helper(array(
            'url'
        ));
        $this->load->model(array(
            'tipos_operacion_model',
            'companias_model',
            'documentacion_model',
            'respuestas_documentacion_model',
            'usuarios_model'
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
        $data['tipos_operacion'] = $this->tipos_operacion_model->get_tipos_operaciones();
        
        $this->form_validation->set_rules('desde', 'Vigencia desde', 'required');
        $this->form_validation->set_rules('hasta', 'Vigencia hasta', 'required');
        $this->form_validation->set_rules('asegurado', 'Asegurado', 'required');
        $this->form_validation->set_rules('fecha_ingreso', 'Fecha de ingreso', 'required');
        $this->form_validation->set_rules('asunto', 'Asunto', 'required');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            $config['upload_path'] = './upload';
            $config['allowed_types'] = 'gif|jpg|png|pdf';
            
            $this->load->library('upload', $config);
            $nombre_del_campo = 'adjunto';
            $adjunto = null;
            if(!$this->upload->do_upload($nombre_del_campo)) {
                $error = array('error' => $this->upload->display_errors());
            } else {
                $adjunto = array('upload_data', $this->upload->data());
            }
            
            $datos = array(
                'productor' => $this->input->post('productor'),
                'compania' => $this->input->post('compania'),
                'tipo_operacion' => $this->input->post('tipo_operacion'),
                'desde' => $this->input->post('desde'),
                'hasta' => $this->input->post('hasta'),
                'asegurado' => $this->input->post('asegurado'),
                'fecha_ingreso' => $this->input->post('fecha_ingreso'),
                'modo_ingreso' => $this->input->post('modo_ingreso'),
                'asunto' => $this->input->post('asunto'),
                'observacion' => $this->input->post('observacion'),
                'nueva' => 1,
                'pendiente' => 1,
                'abierta' => 1
            );
            
            
            if($adjunto != null) {
                $datos['adjunto'] = '/upload/'.$adjunto[1]['raw_name'].$adjunto[1]['file_ext'];
            }
            
            $this->documentacion_model->set_documentacion($datos);
            
            redirect('/cotizaciones/agregar/', 'refresh');
        }
        
        $left = $this->get_datos_panel($session);
        
        $this->load->view('layout/header', $session);
        $this->load->view('layout/panel-izquierda', $left);
        $this->load->view('documentacion/agregar', $data);
        $this->load->view('layout/footer');
    }
    
    public function responder($iddocumentacion) {
        $session = $this->session->all_userdata();
        
        $tipo_operacion = $this->input->post('tipo_operacion');
        if($tipo_operacion) {
            $datos = array(
                'tipo_operacion' => $tipo_operacion
            );
            $this->documentacion_model->update($datos, $iddocumentacion);
        }
        
        $asunto = $this->input->post('asunto');
        if($asunto) {
            $datos = array(
                'asunto' => $asunto
            );
            $this->documentacion_model->update($datos, $iddocumentacion);
        }
        
        $this->form_validation->set_rules('respuesta', 'Respuesta', 'required');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            
            $config['upload_path'] = './upload';
            $config['allowed_types'] = 'gif|jpg|png|pdf';
            
            $this->load->library('upload', $config);
            $nombre_del_campo = 'adjunto';
            $adjunto = null;
            if(!$this->upload->do_upload($nombre_del_campo)) {
                $error = array('error' => $this->upload->display_errors());
            } else {
                $adjunto = array('upload_data', $this->upload->data());
            }

            
            $datos = array(
                'iddocumentacion' => $iddocumentacion,
                'respuesta' => $this->input->post('respuesta'),
                'idusuario' => $session['SID']
            );
            
            if($adjunto != null) {
                $datos['adjunto'] = '/upload/'.$adjunto[1]['raw_name'].$adjunto[1]['file_ext'];
            }
            
            
            
            $this->respuestas_documentacion_model->set_respuesta($datos);
            
            if($session['admin'] == 1) {
                $datos = array(
                    'pendiente' => '0'
                );
                $this->documentacion_model->update($datos, $iddocumentacion);
                
                
                $this->email->from('no-responder@organizaciongts.com.ar', 'Organizacion GTS');
                $this->email->to($session['email']);
                $this->email->subject('Nueva Respuesta');
                $this->email->message($session['nombre'].' '.$session['apellido'].'

Tiene un nuevo mensaje en organizaciongts.com.ar

Haga click <a href="http://sistema.organizaciongts.com.ar">aquí</a> para verlo.');

                $this->email->send();
                
            } else {
                $datos = array(
                    'pendiente' => '1'
                );
                $this->documentacion_model->update($datos, $iddocumentacion);
            }
            
            redirect("/documentacion/responder/$iddocumentacion/", 'refresh');
        }
        
        if($session['admin'] == 1) {
            $datos = array(
                'nueva' => 0
            );
            
            $this->documentacion_model->update($datos, $iddocumentacion);
            
            
        }
        
        $data['documentacion'] = $this->documentacion_model->get_documentacion_por_id($iddocumentacion);
        $data['documentacion']['productor'] = $this->usuarios_model->get_usuario_por_id($data['documentacion']['productor']);
        $data['documentacion']['compania'] = $this->companias_model->get_compania_por_id($data['documentacion']['compania']);
        $data['documentacion']['tipo_operacion'] = $this->tipos_operacion_model->get_tipo_operacion_por_id($data['documentacion']['tipo_operacion']);
        $data['respuestas'] = $this->respuestas_documentacion_model->get_respuestas_por_id($iddocumentacion);
        foreach($data['respuestas'] as $key => $value) {
            $data['respuestas'][$key]['usuario'] = $this->usuarios_model->get_usuario_por_id($value['idusuario']);
        }
        $data['tipos_operacion'] = $this->tipos_operacion_model->get_tipos_operaciones();
        
        $left = $this->h_panel->get($session);
        
        $this->load->view('layout/header', $session);
        $this->load->view('layout/panel-izquierda', $left);
        $this->load->view('documentacion/responder', $data);
        $this->load->view('layout/footer');
    }
    
    public function cerrar($iddocumentacion) {
        $datos['abierta'] = '0';
        $this->documentacion_model->update($datos, $iddocumentacion);
        
        redirect("/documentacion/responder/$iddocumentacion/", 'refresh');
    }
    
    public function reabrir($iddocumentacion) {
        $datos['abierta'] = '1';
        $this->documentacion_model->update($datos, $iddocumentacion);
        
        redirect("/documentacion/responder/$iddocumentacion/", 'refresh');
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
