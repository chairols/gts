<?php

class Usuarios extends CI_Controller {
    public function __construct() {
        parent::__construct();
        
        $this->load->library(array(
            'facebook',
            'session',
            'form_validation'
        ));
        $this->load->model(array(
            'usuarios_model'
        ));
        $this->load->helper(array(
            'url'
        ));
    }
    
    public function login() {
        
        
        $user = $this->facebook->getUser();
        
        
        if($user) {
            try {
                $data['user_profile'] = $this->facebook->api('/v2.0/me');
                
                
                /*
                $data['user_profile'] = $this->facebook->api('/me');
                //$data['graph'] = json_decode(file_get_contents('https://graph.facebook.com/'.$data['user_profile']['id']));
                $data['graph'] = json_decode(file_get_contents('https://graph.facebook.com/1372302602'));
                
                
                $data['preguntados'] = json_decode(file_get_contents('https://api.preguntados.com/api/search?username='.$data['graph']->username));
                //$data['preguntados'] = json_decode(file_get_contents('https://api.preguntados.com/api/search?username=lolyrojo'));
                */

               
            } catch(FacebookApiException $e) {
                $user = null;
            }
        } else {
            $this->facebook->destroySession();
        }
        
        if ($user) {

            $data['logout_url'] = site_url('usuarios/logout'); // Logs off application
            
                $usuario = $this->usuarios_model->get($data['user_profile']['id']);
                
                if(!count($usuario)) {  //  Si no existe
                    $this->crear_usuario($data);
                    $usuario = $this->usuarios_model->get($data['user_profile']['id']);
                }
                
                $datos = array(
                    'SID' => $usuario['idusuario'],
                    'idusuario_fb' => $usuario['idusuario_fb'],
                    'nombre' => $usuario['nombre'],
                    'apellido' => $usuario['apellido'],
                    'sexo' => $usuario['sexo'],
                    'username_fb' => $usuario['username_fb'],
                    'idpreguntados' => $usuario['idpreguntados'],
                    'username_preg' => $usuario['username_preg'],
                    'ap_session' => $usuario['ap_session']
                );
                
                $this->session->set_userdata($datos);
                
                redirect('/jugadas/mi-turno', 'refresh');
                
        } else {
            $data['login_url'] = $this->facebook->getLoginUrl(array(
                'redirect_uri' => site_url('usuarios/login'), 
                'scope' => array("email") // permissions here
            ));
        }
        
        


        
        $this->load->view('usuarios/login',$data);
        
        
    }
    
    
    public function logout(){

        $this->load->library('facebook');

        // Logs off session from website
        $this->facebook->destroySession();
        // Make sure you destory website session as well.

        redirect('usuarios/login', 'refresh');
    }
    
    private function crear_usuario($data) {

        $datos = array(
            'idusuario_fb' => $data['user_profile']['id'],
            'nombre' => $data['user_profile']['first_name'],
            'apellido' => $data['user_profile']['last_name'],
            'sexo' => $data['user_profile']['gender'],
            'username_fb' => '',
            'idpreguntados' => '',
            'username_preg' => '',
            'ap_session' => ''
        );
        
        $this->usuarios_model->set($datos);
       
    }
    
    public function configurar() {
        $session = $this->session->all_userdata();
        if(!isset($session['SID'])) {
            redirect('/usuarios/login/', 'refresh');
        }
        
        if($session['username_fb'] == '') {
            $this->username_fb();
        } else {
            $this->app_session();
        }
        
        
    }
    
    private function username_fb() {
        $session = $this->session->all_userdata();
        if(!isset($session['SID'])) {
            redirect('/usuarios/login/', 'refresh');
        }
        
        $this->form_validation->set_rules('username_fb', 'Usuario de Facebook', 'required');
        $this->form_validation->set_rules('facebook_id_real', 'Facebook ID real', 'required');
        $this->form_validation->set_rules('idpreguntados', 'ID Preguntados', 'required');
        $this->form_validation->set_rules('username_preg', 'Username Preguntados', 'required');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            $datos = array(
                'username_fb' => $this->input->post('username_fb'),
                'facebook_id_real' => $this->input->post('facebook_id_real'),
                'idpreguntados' => $this->input->post('idpreguntados'),
                'username_preg' => $this->input->post('username_preg')
            );
            $this->usuarios_model->update($datos, $session['SID']);
            $this->session->set_userdata($datos, $this->input->post('username_fb'));
            $session = $this->session->all_userdata();
        }
        
        $data['configurar'] = $session;
        
        $this->load->view('usuarios/username_fb', $data);
    }
    
    private function app_session() {
        $session = $this->session->all_userdata();
        if(!isset($session['SID'])) {
            redirect('/usuarios/login/', 'refresh');
        }
        
        
        $this->form_validation->set_rules('ap_session', 'Sesion', 'required');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            $datos = array(
                'ap_session' => $this->input->post('ap_session')
            );
            $this->usuarios_model->update($datos, $session['SID']);
            $this->session->set_userdata('ap_session', $this->input->post('ap_session'));
            $session = $this->session->all_userdata();
        }
        
        $data['configurar'] = $session;
        
        $this->load->view('usuarios/configurar', $data);
        
    }
}
?>