<?php

class Jugadas extends CI_Controller {
    var $data = array();
    
    public function __construct() {
        parent::__construct();
        
        $this->load->model(array(
            'categorias_model',
            'preguntas_model',
            'respuestas_model',
            'usuarios_model'
        ));
        
        $this->load->library(array(
            'session'
        ));
        
        $this->load->helper(array(
            'url'
        ));
        
        //$this->data['app_config'] = "4549618";
        //$this->data['app_config'] = "28086346";
        $this->data['app_config'] = "0";
        $this->data['root'] = $_SERVER['DOCUMENT_ROOT'];
        
        // Hernan
        $this->data['user'] = "17739425";
        $this->data['cookie'] = "9648dda2890cfe14e999133c7ad4134fdf73bbb3";
    }
    
    
    public function mi_turno() {  // mi-turno
        $session = $this->session->all_userdata();
        if(!isset($session['SID'])) {
            redirect('/usuarios/login/', 'refresh');
        }
        if($session['ap_session'] == '') {
            redirect('/usuarios/configurar/', 'refresh');
        }
        $usuario = $this->usuarios_model->get($session['idusuario_fb']);
        $this->data['usuario'] = $usuario;
        
        include($this->data['root'].'/assets/library/Requests.php');
        Requests::register_autoloader();
        
        
        $request = Requests::get('https://api.preguntados.com/api/users/'.$session['idpreguntados'].'/dashboard?app_config_version='.$this->data['app_config'],
                        array(
                        'Accept' => 'application/json',
                        'Cookie' => 'ap_session='.$session['ap_session']
                        )
                    );
	
        //print_r(file_get_contents('https://api.preguntados.com/api/users/17739425/games/206081039?_=1400064808450'));
        $this->data['dashboard'] = json_decode($request->body);
        
        $this->load->view('jugadas/mi_turno', $this->data);
    }
    
    public function respuestas($id) {
        $session = $this->session->all_userdata();
        if(!isset($session['SID'])) {
            redirect('/usuarios/login/', 'refresh');
        }
        if($session['ap_session'] == '') {
            redirect('/usuarios/configurar/', 'refresh');
        }
        
        $usuario = $this->usuarios_model->get($session['idusuario_fb']);
        $this->data['usuario'] = $usuario;
        
        $this->data['id'] = $id;
        include($this->data['root'].'/assets/library/Requests.php');
        Requests::register_autoloader();
        
        $request = Requests::get('https://api.preguntados.com/api/users/'.$session['idpreguntados'].'/dashboard?app_config_version='.$this->data['app_config'],
                        array(
                        'Accept' => 'application/json',
                        'Cookie' => 'ap_session='.$session['ap_session']
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
            $this->cargar_en_db($this->data['dashboard']);
        } else {
            $this->data['dashboard'] = array();
        }
        
        $this->generar_xml();
        
        $this->load->view('jugadas/respuestas', $this->data);
    }
    
    public function corona($id) {
        $session = $this->session->all_userdata();
        if(!isset($session['SID'])) {
            redirect('/usuarios/login/', 'refresh');
        }
        if($session['ap_session'] == '') {
            redirect('/usuarios/configurar/', 'refresh');
        }
        
        $usuario = $this->usuarios_model->get($session['idusuario_fb']);
        $this->data['usuario'] = $usuario;
        
        $this->data['id'] = $id;
        include($this->data['root'].'/assets/library/Requests.php');
        Requests::register_autoloader();
        
        $request = Requests::get('https://api.preguntados.com/api/users/'.$session['idpreguntados'].'/dashboard?app_config_version='.$this->data['app_config'],
                        array(
                        'Accept' => 'application/json',
                        'Cookie' => 'ap_session='.$session['ap_session']
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
            $this->cargar_en_db($this->data['dashboard']);
        } else {
            $this->data['dashboard'] = array();
        }
        
        $this->generar_xml();
        
        $this->load->view('jugadas/corona', $this->data);
    }
    
    public function duelo($id) {
        $session = $this->session->all_userdata();
        if(!isset($session['SID'])) {
            redirect('/usuarios/login/', 'refresh');
        }
        if($session['ap_session'] == '') {
            redirect('/usuarios/configurar/', 'refresh');
        }
        
        $usuario = $this->usuarios_model->get($session['idusuario_fb']);
        $this->data['usuario'] = $usuario;
        
        $this->data['id'] = $id;
        include($this->data['root'].'/assets/library/Requests.php');
        Requests::register_autoloader();
        
        $request = Requests::get('https://api.preguntados.com/api/users/'.$session['idpreguntados'].'/dashboard?app_config_version='.$this->data['app_config'],
                        array(
                        'Accept' => 'application/json',
                        'Cookie' => 'ap_session='.$session['ap_session']
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
            $this->cargar_en_db($this->data['dashboard']);
        } else {
            $this->data['dashboard'] = array();
        }
        
        $this->generar_xml();
                
        $this->load->view('jugadas/duelo', $this->data);
    }
    
    private function generar_xml() {
        $preguntas = $this->preguntas_model->gets();
        $categorias = $this->categorias_model->gets();
        
        $ar=fopen("sitemap.xml","w") or die("Problemas en la creacion");
        fputs($ar, "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n");
        fputs($ar, "<urlset\n");
        fputs($ar, "\t\txmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\"\n");
        fputs($ar, "\t\txmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\"\n");
        fputs($ar, "\t\txsi:schemaLocation=\"http://www.sitemaps.org/schemas/sitemap/0.9\n");
        fputs($ar, "\t\t\thttp://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd\">\n\n");
        
        foreach($categorias as $categoria) {
            fputs($ar, "<url>\n");
            fputs($ar, "\t<loc>http://".$_SERVER['HTTP_HOST']."/respuestas/categoria/".strtolower($categoria['categoria_sp'])."</loc>\n");
            fputs($ar, "\t<changefreq>daily</changefreq>\n");
            fputs($ar, "</url>\n\n");
        }
        
        foreach($preguntas as $pregunta) {
            
            fputs($ar, "<url>\n");
            fputs($ar, "\t<loc>http://".$_SERVER['HTTP_HOST']."/respuestas/pregunta/".$pregunta['idpreguntas']."/".$this->url_amigable($pregunta['text'])."</loc>\n");
            fputs($ar, "\t<changefreq>monthly</changefreq>\n");
            fputs($ar, "</url>\n\n");
        }
        
        fputs($ar, "</urlset>");
        
        fclose($ar);
        
        $this->ping();
    }
    
    private function cargar_en_db($dashboard) {
        foreach($dashboard->list as $lista) {
            if(isset($lista->spins_data)) {
                foreach($lista->spins_data->spins as $spin) {
                    foreach($spin->questions as $pregunta) {
                        
                        $preg = $this->preguntas_model->get($pregunta->question->id);
                        if(empty($preg)) {
                            $datos = array();
                            $categoria = $this->categorias_model->get_por_categoria($pregunta->question->category);
                            
                            $datos['id'] = $pregunta->question->id;
                            $datos['category'] = $categoria['idcategoria'];
                            $datos['text'] = $pregunta->question->text;
                            $datos['correct_answer'] = $pregunta->question->correct_answer;
                            
     
                            $id_insert = $this->preguntas_model->set($datos);
                            
                            $datos = array();
                            $datos['idpregunta'] = $id_insert;
                            $datos['answer'] = $pregunta->question->answers[0];
                            $datos['numerorespuesta'] = 0;
                            $this->respuestas_model->set($datos);
                            
                            $datos = array();
                            $datos['idpregunta'] = $id_insert;
                            $datos['answer'] = $pregunta->question->answers[1];
                            $datos['numerorespuesta'] = 1;
                            $this->respuestas_model->set($datos);
                            
                            $datos = array();
                            $datos['idpregunta'] = $id_insert;
                            $datos['answer'] = $pregunta->question->answers[2];
                            $datos['numerorespuesta'] = 2;
                            $this->respuestas_model->set($datos);
                            
                            $datos = array();
                            $datos['idpregunta'] = $id_insert;
                            $datos['answer'] = $pregunta->question->answers[3];
                            $datos['numerorespuesta'] = 3;
                            $this->respuestas_model->set($datos);
                            
                        }
                     
                        
                    }
                }
            }
        }
        
    }
    
    private function url_amigable($titulo) {
        $urltitle=  $titulo;
        $urltitle=  str_replace("á", "a", $urltitle);
        $urltitle=  str_replace("é", "e", $urltitle);
        $urltitle=  str_replace("í", "i", $urltitle);
        $urltitle=  str_replace("ó", "o", $urltitle);
        $urltitle=  str_replace("ú", "u", $urltitle);
        $urltitle=  str_replace("ñ", "n", $urltitle);
        $urltitle=  str_replace("¿", "", $urltitle);
        $urltitle=  str_replace("?", "", $urltitle);
        $urltitle=  str_replace("'", "", $urltitle);
        $urltitle=  str_replace("\"", "", $urltitle);
        $urltitle=preg_replace('/[^a-z0-9]/i',' ', $urltitle);
        $urltitle= str_replace(" ", "-", $urltitle);
        
        return $urltitle;
    }
    
    public function ping() {
        $sitemapUrl = "http://www.respuestas-preguntados.com/sitemap.xml";
        $pingUrl="http://www.google.com/webmasters/sitemaps/ping?sitemap=" . urlencode($sitemapUrl);
        
    }
}
?>