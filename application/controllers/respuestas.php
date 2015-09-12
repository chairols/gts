<?php

class Respuestas extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model(array(
            'preguntas_model',
            'respuestas_model',
            'categorias_model'
        ));
    }
    
    public function categoria($categoria) {
        $preguntas = $this->preguntas_model->gets_por_categoria($categoria);
        foreach ($preguntas as $key => $value) {
            //$preguntas[$key]['respuestas'] = $this->respuestas_model->gets_respuestas_por_pregunta($value['idpreguntas']);
            $preguntas[$key]['url_amigable'] = $this->url_amigable($value['text']);
        }
        $expires = date('D, d M Y H:i:s', time()+604800);
        
        $data['categoria'] = $categoria;
        $data['preguntas'] = $preguntas;
        $data['expires'] = $expires;
        $this->load->view('respuestas/categoria', $data);
    }
    
    public function pregunta($idpregunta) {
        $data['pregunta'] = $this->preguntas_model->get_idpreguntas($idpregunta);
        $data['respuestas'] = $this->respuestas_model->gets_respuestas_por_pregunta($idpregunta);
        
        $data['random'] = $this->preguntas_model->gets_random($data['pregunta']['category']);
        $categorias = $this->categorias_model->gets();
        foreach($categorias as $categoria) {
            if($categoria['idcategoria'] == $data['pregunta']['category']) {
                $data['categoria'] = $categoria['categoria_sp'];
            }
        }
        $this->generar_xml();
        
        $this->load->view('respuestas/pregunta', $data);
    }
    
    private function generar_xml() {
        $preguntas = $this->preguntas_model->gets();
        $categorias = $this->categorias_model->gets();
        
        $ar=fopen("site.xml","w") or die("Problemas en la creacion");
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
            fputs($ar, "\t<loc>http://".$_SERVER['HTTP_HOST']."/respuestas/pregunta/".$pregunta['idpreguntas']."</loc>\n");
            fputs($ar, "\t<changefreq>monthly</changefreq>\n");
            fputs($ar, "</url>\n\n");
        }
        
        fputs($ar, "</urlset>");
        
        fclose($ar);
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
    
}
?>