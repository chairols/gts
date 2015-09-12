<?php
if ( ! defined('BASEPATH')) exit('No se permite acceso directo al script');

class Q_paginacion {
    
    //  Como usar 
    public function prueba() {
        for($i = 1; $i <= 53; $i++) {
            echo $i.'<br>';
            $this->paginar($i, 10, 530, 'http://dev.quaula.com/mensajes/mis_mensajes');
        }
    }
    
    
    public function paginar($paginaactual, $cantidadregistrosporpagina, $cantidadderegistrostotales, $url) {
        
        $inicio = null;
        
        if(substr($url, strlen($url)-1) != '/') {
            $url.= '/';
        }
        
        if(!$paginaactual) {
            $inicio = 0;
            $paginaactual = 1;
        } else {
            $inicio = ($paginaactual - 1) * $cantidadregistrosporpagina;
        }
        
        $totaldepaginas = ceil($cantidadderegistrostotales / $cantidadregistrosporpagina);
        
        $salida = array();
        
        if($totaldepaginas > 1) {
            for($i = 1; $i <= $totaldepaginas; $i++) {
                if($paginaactual > 1 && $paginaactual <= $totaldepaginas-3) {
                    if($i > $paginaactual-2 && $i < $paginaactual+3) {
                        $salida[$i] = $url.$i;
                    }
                } elseif($paginaactual >= $totaldepaginas-3) {
                    if($i >= $totaldepaginas-3) {
                        $salida[$i] = $url.$i;
                    }
                } elseif ($paginaactual <= 1) {
                    if($i < $paginaactual+4) {
                        $salida[$i] = $url.$i;
                    }
                } 
            }
            
        }
        
        
        $retorno = array();
        
        if(count($salida) > 0) {
            $retorno['&laquo;'] = $url.'1';
            foreach ($salida as $key => $s) {
                $retorno[$key] = $s;
            }
            $retorno['&raquo;'] = $url.$totaldepaginas;
        }
        
        return $retorno;
    }
}
?>
