<?php

class Ping extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $sitemapUrl = "http://www.respuesta-preguntados.com/sitemap.xml";
        $pingUrl="http://www.google.com/webmasters/sitemaps/ping?sitemap=" . urlencode($sitemapUrl);
        echo "Google ping url: " . $pingUrl . "n";
        $respuesta = file_get_contents($pingUrl);
        echo "Respuesta: " . $respuesta;
    }
}

?>