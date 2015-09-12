<?php

class Prueba extends CI_Controller {
    var $data = array();
    
    public function __construct() {
        parent::__construct();
        
        $this->data['root'] = $_SERVER['DOCUMENT_ROOT'];
        $this->data['app_config'] = "4549618";
        
        $this->load->model(array(
            'usuarios_model'
        ));
    }
    
    public function mi_turno() {
        
        include($this->data['root'].'/assets/library/Requests.php');
        Requests::register_autoloader();

        $request = Requests::get('https://api.preguntados.com/api/users/17739425/dashboard?app_config_version='.$this->data['app_config'],
                        array(
                        'Accept' => 'application/json',
                        'Cookie' => 'ap_session=c599ec3e8de7082b5f55d5dfa48e99031d89cc6c'
                        )
                    );
	
        //print_r(file_get_contents('https://api.preguntados.com/api/users/17739425/games/206081039?_=1400064808450'));
        $this->data['dashboard'] = json_decode($request->body);
        
        $valor = json_decode(file_get_contents('https://api.preguntados.com/api/search?username=martin.g.beauchamp'));
        var_dump($valor->list);
        
        $this->load->view('jugadas/mi_turno', $this->data);
    }
    
    
    
     public function respuestas($id) {
        
        $usuario = $this->usuarios_model->get('1372302602');
        $session['SID'] = $usuario['idusuario'];
        
        include($this->data['root'].'/assets/library/Requests.php');
        Requests::register_autoloader();
        
        
        $request = Requests::get('https://api.preguntados.com/api/users/17739425/dashboard?app_config_version='.$this->data['app_config'],
                        array(
                        'Accept' => 'application/json',
                        'Cookie' => 'ap_session=c599ec3e8de7082b5f55d5dfa48e99031d89cc6c'
                        )
                    );
        $this->data['dashboard'] = json_decode($request->body);
        
        if($usuario['jugadas'] > 0) {
            foreach($this->data['dashboard']->list as $lista) {
                if(($lista->game_status == 'ACTIVE' && $lista->my_turn == 1 && $lista->opponent->id == $id) || ($lista->game_status == 'PENDING_APPROVAL' && $lista->my_turn == 1 && $lista->opponent->id == $id)) { 
                    if($usuario['ultima_jugada'] != $lista->id) {
                        $datos = array(
                            'ultima_jugada' => $lista->id,
                            'jugadas' => $usuario['jugadas']-1
                        );
                        $this->usuarios_model->update($datos, $session['SID']);
                    }
                }
            }
            //$this->cargar_en_db($this->data['dashboard']);
        } else {
            $this->data['dashboard'] = array();
        }
        
        
        $this->load->view('jugadas/respuestas', $this->data);
    }
}
?>

