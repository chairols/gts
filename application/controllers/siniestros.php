<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Siniestros extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array(
            'session',
            'form_validation',
            'q_paginacion',
            'h_panel',
            'email'
        ));
        $this->load->helper(array(
            'url'
        ));
        $this->load->model(array(
            'documentacion_model',
            'usuarios_model',
            'secciones_model',
            'siniestros_model',
            'respuestas_siniestros_model',
            'companias_model'
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
        $data['secciones'] = $this->secciones_model->get_secciones();
        $data['companias'] = $this->companias_model->get_companias();
        
        $this->form_validation->set_rules('poliza', 'N° de Póliza', 'required');
        $this->form_validation->set_rules('tipo_siniestro', 'Tipo de Siniestro', 'required');
        
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
                'asunto' => $this->input->post('asunto'),
                'compania' => $this->input->post('compania'),
                'poliza' => $this->input->post('poliza'),
                'tipo_seguro' => $this->input->post('tipo_seguro'),
                'tipo_siniestro' => $this->input->post('tipo_siniestro'),
                'numero_siniestro' => $this->input->post('numero_siniestro'),
                'fecha_ocurrencia' => $this->input->post('fecha_ocurrencia'),
                'fecha_sello' => $this->input->post('fecha_sello'),
                'nueva' => 1,
                'pendiente' => 1,
                'abierta' => 1
            );
            
            if($adjunto != null) {
                $datos['adjunto'] = '/upload/'.$adjunto[1]['raw_name'].$adjunto[1]['file_ext'];
            }
            
            $this->siniestros_model->set_siniestro($datos);
            
            redirect('/siniestros/agregar/', 'refresh');
        }
        
        $left = $this->h_panel->get($session);
        
        $this->load->view('layout/header', $session);
        $this->load->view('layout/panel-izquierda', $left);
        $this->load->view('siniestros/agregar', $data);
        $this->load->view('layout/footer');
    }
    
    public function nuevas($pagina = null) {
        $session = $this->session->all_userdata();
        /*if(!$pagina) { $pagina = 1; }
        $data['paginacion'] = $this->q_paginacion->paginar($pagina, 25, $this->documentacion_model->get_siniestros_nuevas($session['admin'], $session['SID']), '/emisiones/nuevas');
        */
        $data['nuevas'] = $this->documentacion_model->get_siniestros_nuevas_listado($session['admin'], $session['SID']);
        
        
        $left = $this->h_panel->get($session);
        
        $this->load->view('layout/header', $session);
        $this->load->view('layout/panel-izquierda', $left);
        $this->load->view('siniestros/listado', $data);
        $this->load->view('layout/footer');
    }
    
    public function pendientes($pagina = null) {
        $session = $this->session->all_userdata();
        
        $data['nuevas'] = $this->documentacion_model->get_siniestros_pendientes_listado($session['admin'], $session['SID']);
        
        $left = $this->h_panel->get($session);
        
        
        $this->load->view('layout/header', $session);
        $this->load->view('layout/panel-izquierda', $left);
        $this->load->view('siniestros/pendientes', $data);
        $this->load->view('layout/footer');
    }
    
    public function abiertas($pagina = null) {
        $session = $this->session->all_userdata();
        
        $data['nuevas'] = $this->documentacion_model->get_siniestros_abiertas_listado($session['admin'], $session['SID']);
        
        $left = $this->h_panel->get($session);
        
        $this->load->view('layout/header', $session);
        $this->load->view('layout/panel-izquierda', $left);
        $this->load->view('siniestros/listado', $data);
        $this->load->view('layout/footer');
    }
    
    public function cerradas($pagina = null) {
        $session = $this->session->all_userdata();
        
        $data['nuevas'] = $this->documentacion_model->get_siniestros_cerradas_listado($session['admin'], $session['SID']);
        
        $left = $this->h_panel->get($session);
        
        $this->load->view('layout/header', $session);
        $this->load->view('layout/panel-izquierda', $left);
        $this->load->view('siniestros/listado', $data);
        $this->load->view('layout/footer');
    }
    
    public function todas() {
        $session = $this->session->all_userdata();
        
        $data['nuevas'] = $this->documentacion_model->get_siniestros_todas_listado($session['admin'], $session['SID']);
        
        $left = $this->h_panel->get($session);
        
        $this->load->view('layout/header', $session);
        $this->load->view('layout/panel-izquierda', $left);
        $this->load->view('siniestros/listado', $data);
        $this->load->view('layout/footer');
    }
    
    public function responder($idsiniestro) {
        $session = $this->session->all_userdata();
        
        $this->form_validation->set_rules('respuesta', 'Respuesta', 'required');
        
        $data['siniestro'] = $this->siniestros_model->get_siniestro_por_id($idsiniestro);
        
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
                'idsiniestro' => $idsiniestro,
                'respuesta' => $this->input->post('respuesta'),
                'idusuario' => $session['SID']
            );
            
            if($adjunto != null) {
                $datos['adjunto'] = '/upload/'.$adjunto[1]['raw_name'].$adjunto[1]['file_ext'];
            }
            
            $this->respuestas_siniestros_model->set_respuesta($datos);
            
            if($this->input->post('enviar_mail')) {
                $this->email->from('noresponder@organizaciongts.com.ar', 'Organización GTS');
                $this->email->to($data['siniestro']['email']);
                
                $this->email->subject('Nueva Respuesta');
                $this->email->message('Asunto: '.$data['siniestro']['asunto'].'
Póliza: '.$data['siniestro']['poliza'].'
Tipo de Siniestro: '.$data['siniestro']['tipo_siniestro'].'
Número de Siniestro: '.$data['siniestro']['numero_siniestro']);
                
                $this->email->send();
            }
            
        }
        
        $left = $this->h_panel->get($session);
        
        $data['respuestas'] = $this->respuestas_siniestros_model->get_respuestas_por_id($idsiniestro);
        foreach ($data['respuestas'] as $key => $value) {
            $data['respuestas'][$key]['usuario'] = $this->usuarios_model->get_usuario_por_id($value['idusuario']);
        }
        $data['compania'] = $this->companias_model->get_compania_por_id($data['siniestro']['compania']);
        
        $this->load->view('layout/header', $session);
        $this->load->view('layout/panel-izquierda', $left);
        $this->load->view('siniestros/responder', $data);
        $this->load->view('layout/footer');
    }
    
    public function cerrar($idsiniestro) {
        $datos['abierta'] = '0';
        $this->siniestros_model->update($datos, $idsiniestro);
        
        redirect("/siniestros/responder/$idsiniestro/", 'refresh');
    }
    
    public function reabrir($idsiniestro) {
        $datos['abierta'] = '1';
        $this->siniestros_model->update($datos, $idsiniestro);
        
        redirect("/siniestros/responder/$idsiniestro/", 'refresh');
    }
    
    public function eliminar($idsiniestro) {
        $session = $this->session->all_userdata();
        if(isset($session['SID'])) {
            $this->siniestros_model->eliminar($idsiniestro);
            redirect('/siniestros/todas', 'refresh');
        }
    }
}
?>
