<?php
if ( ! defined('BASEPATH')) exit('No se permite acceso directo al script');

class H_session {
    
    public function check($datos) {
        if(count($datos) < 6) {
            redirect('/login/', 'refresh');
        }
        
    }
}
?>
