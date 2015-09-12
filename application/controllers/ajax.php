<?php

class Ajax extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model(array(
            'usuarios_model'
        ));
        $this->load->library(array(
            'session'
        ));
    }
    
    public function username_fb($username_fb = null) {
        $session = $this->session->all_userdata();
        if(!isset($session['SID'])) {
            show_404();
        }
        
        if($username_fb) {
            $data['graph'] = json_decode(file_get_contents('https://graph.facebook.com/'.$username_fb.'?fields=id,name,picture,gender,username'));
            $data['preguntados'] = json_decode(file_get_contents('https://api.preguntados.com/api/search?username='.$username_fb));
            
            $datos = array(
                'username_fb' => $username_fb
            );
            $this->usuarios_model->update($datos, $session['SID']);
            $this->session->set_userdata('username_fb', $data['graph']->id);
            
            if(isset($data['graph']->id)) {
                $datos = array(
                    'facebook_id_real' => $data['graph']->id
                );
                $this->usuarios_model->update($datos, $session['SID']);
                $this->session->set_userdata('facebook_id_real', $data['graph']->id);
            }
            
            if(isset($data['preguntados']->list[0]->id)) {
                $datos = array(
                    'idpreguntados' => $data['preguntados']->list[0]->id
                );
                $this->usuarios_model->update($datos, $session['SID']);
                $this->session->set_userdata('idpreguntados', $data['graph']->id);
            }
            
            if(isset($data['preguntados']->list[0]->username)) {
                $datos = array(
                    'username_preg' => $data['preguntados']->list[0]->username
                );
                $this->usuarios_model->update($datos, $session['SID']);
                $this->session->set_userdata('username_preg', $data['graph']->id);
            }
            
            $this->load->view('ajax/username_fb', $data);
        }
    }
}
?>