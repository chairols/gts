<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array(
            'form_validation',
            'session',
            'email'
        ));
        $this->load->model(array(
            'login_model',
            'usuarios_model'
        ));
        $this->load->helper(array(
            'url'
        ));
    }
    
    public function index() {
        $session = $this->session->all_userdata();
        if(!empty($session['SID'])) {
            redirect('/home/', 'refresh');
        }
        
        $this->form_validation->set_rules('usuario', 'Usuario', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            $usuario = $this->login_model->login($this->input->post('usuario'), $this->input->post('password'));
            
            if(!empty($usuario)) {
                $datos = array(
                    'SID' => $usuario['idusuario'],
                    'nombre' => $usuario['nombre'],
                    'apellido' => $usuario['apellido'],
                    'email' => $usuario['email'],
                    'admin' => $usuario['admin']
                );
                $this->session->set_userdata($datos);

                redirect('/home/', 'refresh');
            }
            
        }
        
        $this->load->view('login/index');
    }
    
    public function logout() {
        $this->session->sess_destroy();
        redirect('/login/', 'refresh');
    }
    
    public function recuperar() {
        $data['mensaje'] = '';
        $this->form_validation->set_rules('email', 'Email', 'required');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            $usuario = $this->usuarios_model->get_por_email($this->input->post('email'));
            if(!empty($usuario)) {
                
                $this->email->from('no-responder@organizaciongts.com.ar');
                $this->email->to($this->input->post('email'));
                $this->email->subject('Recupero de Contraseña');
                $this->email->message('Contraseña: '.$usuario['password']);
                
                if($this->email->send()) {
                    $data['mensaje'] = 'Se envió un email con su contraseña.';
                    $data['alerta'] = 'alert-success';
                } else {
                    $data['mensaje'] = 'Ocurrió un error al querer enviar la contraseña, intente nuevamente.';
                    $data['alerta'] = 'alert-danger';
                }
            } else {
                $data['mensaje'] = 'Verifique si escribió correctamente su correo.';
                $data['alerta'] = 'alert-danger';
            }
            
        }
        $this->load->view('login/recuperar', $data);
    }
}
?>
