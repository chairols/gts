<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Productores extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array(
            'session',
            'h_session',
            'form_validation',
            'h_panel'
        ));
        $this->load->helper(array(
            'url'
        ));
        $this->load->model(array(
            'usuarios_model',
            'documentacion_model',
            'companias_model'
        ));
        
        $session = $this->session->all_userdata();
        if(empty($session['SID'])) {
            redirect('/login/', 'refresh');
        }
    }
    
    public function agregar() {
        $session = $this->session->all_userdata();
        $this->h_session->check($session);
        $session['title'] = 'Cargar Documentación';
        
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('apellido', 'Apellido', 'required');
        $this->form_validation->set_rules('direccion', 'Direccion', 'required');
        $this->form_validation->set_rules('telefono', 'Teléfono', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Contraseña', 'required');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            
            $datos = array(
                'nombre' => $this->input->post('nombre'),
                'apellido' => $this->input->post('apellido'),
                'direccion' => $this->input->post('direccion'),
                'telefono' => $this->input->post('telefono'),
                'celular' => $this->input->post('celular'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'observacion' => $this->input->post('observacion'),
                'admin' => 0
            );
            
            $config['upload_path'] = './upload/usuarios';
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
            
            
            $id = $this->usuarios_model->set_usuario($datos);
            
            foreach($this->input->post('companias') as $compania) {
                $datos = array(
                    'idusuario' => $id,
                    'idcompania' => $compania
                );
                $this->usuarios_model->set_usuarios_companias($datos);
            }
            
            redirect('/productores/agregar', 'refresh');
        }
        
        
        $left = $this->h_panel->get($session);
        $data['companias'] = $this->companias_model->get_companias();
        
        $this->load->view('layout/header', $session);
        $this->load->view('layout/panel-izquierda', $left);
        $this->load->view('productores/agregar', $data);
        $this->load->view('layout/footer');
    }
    
    public function view($idproductor) {
        $session = $this->session->all_userdata();
        $this->h_session->check($session);
        $data['productor'] = $this->usuarios_model->get_usuario_por_id($idproductor);
        
        $left = $this->h_panel->get($session);
        $data['abiertos'] = $this->documentacion_model->get_mis_documentos_abiertos($session['SID']);
        
        $this->load->view('layout/header', $session);
        $this->load->view('layout/panel-izquierda', $left);
        $this->load->view('productores/view', $data);
        $this->load->view('layout/footer');
    }
    
    public function update($idproductor = null) {
        $session = $this->session->all_userdata();
        $this->h_session->check($session);
        switch ($session['admin']) {
            case 1:   // Administrador
                $this->form_validation->set_rules('nombre', 'Nombre', 'required');
                $this->form_validation->set_rules('apellido', 'Apellido', 'required');
                $this->form_validation->set_rules('direccion', 'Direccion', 'required');
                $this->form_validation->set_rules('telefono', 'Teléfono', 'required');
                $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

                if($this->form_validation->run() == FALSE) {

                } else {
                    $datos = array(
                        'nombre' => $this->input->post('nombre'),
                        'apellido' => $this->input->post('apellido'),
                        'direccion' => $this->input->post('direccion'),
                        'telefono' => $this->input->post('telefono'),
                        'celular' => $this->input->post('celular'),
                        'email' => $this->input->post('email'),
                        'observacion' => $this->input->post('observacion')
                    );
                    
                    if($this->input->post('password') == $this->input->post('passconf')) {
                        if(strlen($this->input->post('password'))) {
                            $datos['password'] = $this->input->post('password');
                        }
                    }

                    $this->usuarios_model->update($datos, $idproductor);

                    redirect('/productores/update/'.$idproductor.'/', 'refresh');
                }

                $data['productor'] = $this->usuarios_model->get_usuario_por_id($idproductor);

                $left = $this->h_panel->get($session);
                $data['abiertos'] = $this->documentacion_model->get_mis_documentos_abiertos($session['SID']);

                $this->load->view('layout/header', $session);
                $this->load->view('layout/panel-izquierda', $left);
                $this->load->view('productores/update', $data);
                $this->load->view('layout/footer'); 

                break;
            
                
            case 0:   //  Productor
                $this->form_validation->set_rules('nombre', 'Nombre', 'required');
                $this->form_validation->set_rules('apellido', 'Apellido', 'required');
                $this->form_validation->set_rules('direccion', 'Direccion', 'required');
                $this->form_validation->set_rules('telefono', 'Teléfono', 'required');
                $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

                if($this->form_validation->run() == FALSE) {

                } else {
                    $datos = array(
                        'nombre' => $this->input->post('nombre'),
                        'apellido' => $this->input->post('apellido'),
                        'direccion' => $this->input->post('direccion'),
                        'telefono' => $this->input->post('telefono'),
                        'celular' => $this->input->post('celular'),
                        'email' => $this->input->post('email'),
                        'observacion' => $this->input->post('observacion')
                    );

                    if($this->input->post('password') == $this->input->post('passconf')) {
                        if(strlen($this->input->post('password'))) {
                            $datos['password'] = $this->input->post('password');
                        }
                    }
                    
                    $this->usuarios_model->update($datos, $session['SID']);

                    redirect('/productores/update/', 'refresh');
                }

                $data['productor'] = $this->usuarios_model->get_usuario_por_id($session['SID']);

                $left = $this->h_panel->get($session);
                $data['abiertos'] = $this->documentacion_model->get_mis_documentos_abiertos($session['SID']);

                $this->load->view('layout/header', $session);
                $this->load->view('layout/panel-izquierda', $left);
                $this->load->view('productores/update', $data);
                $this->load->view('layout/footer'); 
        }
        
    }
    
    public function borrar($idusuario) {
        $session = $this->session->all_userdata();
        if($session['admin'] == 1) {
            $datos = array(
                'activo' => 0
            );
            
            $this->usuarios_model->update($datos, $idusuario);
            
        }
        
        redirect('/informacion/productores/', 'refresh');
    }
    
    
}
?>
