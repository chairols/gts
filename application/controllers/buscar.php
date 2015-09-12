<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Buscar extends CI_Controller {
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
            'usuarios_model',
            'companias_model',
            'tipos_operacion_model',
            'siniestros_model'
        ));
        
        $session = $this->session->all_userdata();
        if(empty($session['SID'])) {
            redirect('/login/', 'refresh');
        }
    }
    
    public function index() {
        $session = $this->session->all_userdata();
        $session['title'] = 'Cargar Documentación';
        
        $resultado = array();
        
        $this->form_validation->set_rules('sector', 'Sector', 'required');
        $this->form_validation->set_rules('productor', 'Productor', 'required');
        $this->form_validation->set_rules('compania', 'Compañía', 'required');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            $datos = array();
            if($this->input->post('sector') != "0") {
                if($this->input->post('sector') != "7") {
                    $datos['tipo_operacion'] = $this->input->post('sector');
                }
            }
            
            if($this->input->post('productor') != "0") {
                $datos['productor'] = $this->input->post('productor');
            }
            
            if($this->input->post('sector') == "7" && $this->input->post('siniestro') != "") {
                $datos['numero_siniestro like'] = '%'.$this->input->post('siniestro').'%';
            }
            
            if($this->input->post('poliza') != "") {
                $datos['poliza like'] = '%'.$this->input->post('poliza').'%';
            }
            
            if($this->input->post('asunto') != "") {
                $datos['asunto like'] = '%'.$this->input->post('asunto').'%';
            }
            
            if($this->input->post('compania') != "0") {
                $datos['compania'] = $this->input->post('compania');
            }
            
            if($session['admin'] != 1) {
                $datos['productor'] = $session['SID'];
            }
            
            if($this->input->post('sector') != "0") {
                if($this->input->post('sector') == "7") {
                    $resultado = $this->siniestros_model->gets_where($datos);
                    foreach ($resultado as $key => $value) {
                        $resultado[$key]['productor'] = $this->usuarios_model->get_usuario_por_id($value['productor']);
                        $resultado[$key]['tipo_operacion']['operacion'] = "Siniestro";
                        $resultado[$key]['compania'] = $this->companias_model->get_compania_por_id($value['compania']);
                    }
                } else {
                    $resultado = $this->documentacion_model->gets_where($datos);
                    foreach ($resultado as $key => $value) {
                        $resultado[$key]['productor'] = $this->usuarios_model->get_usuario_por_id($value['productor']);
                        $resultado[$key]['tipo_operacion'] = $this->tipos_operacion_model->get_tipo_operacion_por_id($value['tipo_operacion']);
                        $resultado[$key]['compania'] = $this->companias_model->get_compania_por_id($value['compania']);
                    }
                }
            }
        }
        
        $data['productores'] = $this->usuarios_model->get_productores();
        $data['companias'] = $this->companias_model->get_companias();
        $data['tipo_operacion'] = $this->tipos_operacion_model->get_tipos_operaciones();
        $data['resultado'] = $resultado;
        
        $left = $this->h_panel->get($session);
        
        $this->load->view('layout/header', $session);
        $this->load->view('layout/panel-izquierda', $left);
        $this->load->view('buscar/index', $data);
        $this->load->view('layout/footer');
    }
    
    
}
?>
