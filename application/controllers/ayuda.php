<?php

class Ayuda extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array(
            'session'
        ));
        
        $this->load->helper(array(
            'url'
        ));
    }
    
    public function chrome() {
        $session = $this->session->all_userdata();
        if(!isset($session['SID'])) {
            redirect('/usuarios/login/', 'refresh');
        }
        $this->load->view('ayuda/chrome');
    }
    
    public function firefox() {
        $session = $this->session->all_userdata();
        if(!isset($session['SID'])) {
            redirect('/usuarios/login/', 'refresh');
        }
        $this->load->view('ayuda/firefox');
    }
    
    public function politicas() {
        $this->load->view('ayuda/politicas');
    }
}
?>
