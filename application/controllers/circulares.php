<?php

class Circulares extends CI_Controller {
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
            'circulares_model'
        ));
    }
    
    public function agregar() {
        $session = $this->session->all_userdata();
        $this->h_session->check($session);
        
        $this->form_validation->set_rules('fecha', 'Fecha', 'required');
        $this->form_validation->set_rules('asunto', 'Asunto', 'required');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            $config['upload_path'] = './upload/circulares/';
            $config['allowed_types'] = '*';
            
            $this->load->library('upload', $config);
            $nombre_del_campo = 'adjunto';
            $adjunto = null;
            if(!$this->upload->do_upload($nombre_del_campo)) {
                $error = array('error' => $this->upload->display_errors());
            } else {
                $adjunto = array('upload_data', $this->upload->data());
            }
            
            $datos = array(
                'fecha' => $this->input->post('fecha'),
                'asunto' => $this->input->post('asunto'),
                'idcompania' => $this->input->post('compania'),
                'texto' => $this->input->post('texto')
            );
            
            if($adjunto != null) {
                $datos['adjunto'] = '/upload/circulares/'.$adjunto[1]['raw_name'].$adjunto[1]['file_ext'];
            }
            
            $this->circulares_model->set($datos);
        }
        
        $data['companias'] = $this->companias_model->get_companias();
        $left = $this->h_panel->get($session);
        
        $this->load->view('layout/header', $session);
        $this->load->view('layout/panel-izquierda', $left);
        $this->load->view('circulares/agregar', $data);
        $this->load->view('layout/footer');
    }
    
    public function view($idcircular = null) {
        $session = $this->session->all_userdata();
        if($idcircular == null) {
            show_404();
        }
        
        $left = $this->h_panel->get($session);
        $datos = array(
            'idcircular' => $idcircular
        );
        $data['circular'] = $this->circulares_model->get_where($datos);
        $data['compania'] = $this->companias_model->get_compania_por_id($data['circular']['idcompania']);
        
        $circular_leido = $this->circulares_model->get_circular_leido($idcircular, $session['SID']);
        if(empty($circular_leido)) {
            $this->circulares_model->set_circular_leida($idcircular, $session['SID']);
        }
        $circular_leido = $this->circulares_model->get_circular_leido($idcircular, $session['SID']);
        
        $this->load->view('layout/header', $session);
        $this->load->view('layout/panel-izquierda', $left);
        $this->load->view('circulares/view', $data);
        $this->load->view('layout/footer');
    }
}
?>