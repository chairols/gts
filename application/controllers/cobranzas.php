<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cobranzas extends CI_Controller {
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
            'documentacion_model',
            'usuarios_model',
            'companias_model',
            'cobranzas_model',
            'operaciones_model'
        ));
        
        $session = $this->session->all_userdata();
        if(empty($session['SID'])) {
            redirect('/login/', 'refresh');
        }
    }
    
    public function agregar() {
        $session = $this->session->all_userdata();
        $session['title'] = 'Agregar Cotizaciones';
        
        $this->form_validation->set_rules('desde', 'Vigencia desde', 'required');
        $this->form_validation->set_rules('hasta', 'Vigencia hasta', 'required');
        $this->form_validation->set_rules('asegurado', 'Asegurado', 'required');
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
                'compania' => $this->input->post('compania'),
                'tipo_operacion' => '12',
                'operacion' => $this->input->post('operacion'),
                'desde' => $this->input->post('desde'),
                'hasta' => $this->input->post('hasta'),
                'asegurado' => $this->input->post('asegurado'),
                'dni' => $this->input->post('dni'),
                'poliza' => $this->input->post('poliza'),
                'asunto' => $this->input->post('asunto'),
                'observacion' => $this->input->post('observacion'),
                'nueva' => 1,
                'pendiente' => 1,
                'abierta' => 1
            );
            
            if($session['admin'] == 1) {
                $datos['productor'] = $this->input->post('productor');
            } else {
                $datos['productor'] = $session['SID'];
            }
            
            if($adjunto != null) {
                $datos['adjunto'] = '/upload/'.$adjunto[1]['raw_name'].$adjunto[1]['file_ext'];
            }
            
            $this->documentacion_model->set_documentacion($datos);
            
            redirect('/cobranzas/agregar/', 'refresh');
        }
        
        $left = $this->h_panel->get($session);
        $data['productores'] = $this->usuarios_model->get_productores();
        $data['companias'] = $this->companias_model->get_companias();
        $data['operaciones'] = $this->operaciones_model->gets();
        
        $this->load->view('layout/header', $session);
        $this->load->view('layout/panel-izquierda', $left);
        $this->load->view('cobranzas/agregar', $data);
        $this->load->view('layout/footer');
    }
    
    
    public function nuevas($pagina = null) {
        $session = $this->session->all_userdata();
        if(!$pagina) { $pagina = 1; }
        $data['paginacion'] = $this->q_paginacion->paginar($pagina, 25, $this->documentacion_model->get_cobranzas_nuevas($session['admin'], $session['SID']), '/cobranzas/nuevas');
        
        $data['nuevas'] = $this->documentacion_model->get_cobranzas_nuevas_listado($pagina, $session['admin'], $session['SID']);
        
        $left = $this->h_panel->get($session);
        
        $this->load->view('layout/header', $session);
        $this->load->view('layout/panel-izquierda', $left);
        $this->load->view('documentacion/listado', $data);
        $this->load->view('layout/footer');
    }
    
    public function pendientes($pagina = null) {
        $session = $this->session->all_userdata();
        if(!$pagina) { $pagina = 1; }
        $data['paginacion'] = $this->q_paginacion->paginar($pagina, 25, $this->documentacion_model->get_cobranzas_pendientes($session['admin'], $session['SID']), '/cobranzas/pendientes');
        
        $data['nuevas'] = $this->documentacion_model->get_cobranzas_pendientes_listado($pagina, $session['admin'], $session['SID']);
        
        $left = $this->h_panel->get($session);
        
        $this->load->view('layout/header', $session);
        $this->load->view('layout/panel-izquierda', $left);
        $this->load->view('documentacion/pendientes', $data);
        $this->load->view('layout/footer');
    }
    
    public function abiertas($pagina = null) {
        $session = $this->session->all_userdata();
        if(!$pagina) { $pagina = 1; }
        $data['paginacion'] = $this->q_paginacion->paginar($pagina, 25, $this->documentacion_model->get_cobranzas_abiertas($session['admin'], $session['SID']), '/cobranzas/abiertas');
        
        $data['nuevas'] = $this->documentacion_model->get_cobranzas_abiertas_listado($pagina, $session['admin'], $session['SID']);
        
        $left = $this->h_panel->get($session);
        
        $this->load->view('layout/header', $session);
        $this->load->view('layout/panel-izquierda', $left);
        $this->load->view('documentacion/listado', $data);
        $this->load->view('layout/footer');
    }
    
    public function cerradas($pagina = null) {
        $session = $this->session->all_userdata();
        if(!$pagina) { $pagina = 1; }
        $data['paginacion'] = $this->q_paginacion->paginar($pagina, 25, $this->documentacion_model->get_cobranzas_cerradas($session['admin'], $session['SID']), '/cobranzas/cerradas');
        
        $data['nuevas'] = $this->documentacion_model->get_cobranzas_cerradas_listado($pagina, $session['admin'], $session['SID']);
        
        $left = $this->h_panel->get($session);
        
        $this->load->view('layout/header', $session);
        $this->load->view('layout/panel-izquierda', $left);
        $this->load->view('documentacion/listado', $data);
        $this->load->view('layout/footer');
    }
    
    public function todas($pagina = null) {
        $session = $this->session->all_userdata();
        if(!$pagina) { $pagina = 1; }
        $data['paginacion'] = $this->q_paginacion->paginar($pagina, 25, $this->documentacion_model->get_cobranzas_todas($session['admin'], $session['SID']), '/cobranzas/todas');
        
        $data['nuevas'] = $this->documentacion_model->get_cobranzas_todas_listado($pagina, $session['admin'], $session['SID']);
        
        $left = $this->h_panel->get($session);
        
        $this->load->view('layout/header', $session);
        $this->load->view('layout/panel-izquierda', $left);
        $this->load->view('documentacion/listado', $data);
        $this->load->view('layout/footer');
    }
    
}
?>