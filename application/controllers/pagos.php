<?php

class Pagos extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model(array(
            'facturas_model',
            'usuarios_model'
        ));
        $this->load->library(array(
            'session'
        ));
        $this->load->helper(array(
            'url'
        ));
    }
    
    public function comprar() {
        $session = $this->session->all_userdata();
        if(!isset($session['SID'])) {
            redirect('/usuarios/login/', 'refresh');
        }
        $this->load->view('/pagos/comprar');
    }
    
    public function login($valor) {
        $session = $this->session->all_userdata();
        if(!isset($session['SID'])) {
            redirect('/usuarios/login/', 'refresh');
        }
        
                $config['business'] 			= 'chairols@hotmail.com';
		$config['cpp_header_image'] 	= ''; //Image header url [750 pixels wide by 90 pixels high]
		$config['return'] 				= 'http://www.respuestas-preguntados.com/pagos/aceptar/'.$valor;
		$config['cancel_return'] 		= 'http://www.respuestas-preguntados.com/pagos/cancelar';
		$config['notify_url'] 			= 'process_payment.php'; //IPN Post
		$config['production'] 			= TRUE; //Its false by default and will use sandbox
		//$config['discount_rate_cart'] 	= 20; //This means 20% discount
		//$config["invoice"]				= strval(rand(1, 99999999)); //The invoice id
                $config["invoice"]                      = $this->facturas_model->set($session['SID']);

		
		$this->load->library('paypal',$config);
		
		#$this->paypal->add(<name>,<price>,<quantity>[Default 1],<code>[Optional]);
		
                switch ($valor) {
                    case 1:
                        $this->paypal->add('500 monedas', 2.00, 1);
                        break;
                    case 2:
                        $this->paypal->add('1500 monedas', 4.00, 1);
                        break;
                    case 3:
                        $this->paypal->add('3000 monedas', 6.00, 1);
                        break;
                    case 4:
                        $this->paypal->add('6000 monedas', 8.00, 1);
                        break;
                }
                
		//$this->paypal->add('Acceso al sitio',2.00,1); //First item
                //$this->paypal->add('Pants',40); 	  //Second item
		//$this->paypal->add('Blowse',10,10,'B-199-26'); //Third item with code
		
		$this->paypal->pay(); //Proccess the payment
    }
    
    public function registrar() {
        
    }
    
    public function aceptar($valor) {
        $session = $this->session->all_userdata();
        if(!isset($session['SID'])) {
            redirect('/usuarios/login/', 'refresh');
        }
        $monedas = 0;
        switch ($valor) {
            case 1:
                $monedas = 500;
                break;
            case 2:
                $monedas = 1500;
                break;
            case 3:
                $monedas = 3000;
                break;
            case 4:
                $monedas = 6000;
                break;
        }
        
        if($this->facturas_model->update($this->input->post(), $session['SID'])) {
            $usuario = $this->usuarios_model->get($session['idusuario_fb']);
            
            $datos = array(
                'jugadas' => $usuario['jugadas'] + $monedas
            );
            $this->usuarios_model->update($datos, $session['SID']);
        }
        
        redirect('/jugadas/mi-turno/', 'refresh');
    }
    
    public function cancelar() {
        $session = $this->session->all_userdata();
        if(!isset($session['SID'])) {
            redirect('/usuarios/login/', 'refresh');
        }
        
        redirect('/jugadas/mi-turno', 'refresh');
    }
}
?>
