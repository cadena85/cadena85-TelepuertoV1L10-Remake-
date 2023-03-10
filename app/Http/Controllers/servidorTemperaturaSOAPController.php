<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SoapServer;

    //ini_set("soap.wsdl_cache_enabled", "0");    
   
/**
*Una cosa que también debemos tener en cuenta es que 
* estas llamadas no contendrán tokens CSRF, por lo tanto, dentro de nuestro archivo Middleware/VerifyCsrfToken.php, 
* agregamos '/api/soap/services' 
* en el bloque Except para omitir el token CSRF requerido.
* */

 class servidorTemperaturaSOAPController extends Controller
{
    //   
    //ini_set('soap.wsdl_cache_enabled', '0'); 
    /**
     * @soapMethod
     */
    
    public function celsiusToFahrenheit($celsius) {
        // Verify CSRF token
        
        $fahrenheit = $celsius * 9 / 5 + 32;
        return $fahrenheit;

    }
    
/*
    function __construct() {
    }
*/
    /*
    public function iniciar(){
        echo "servidor iniciado ...";
        /*$server = new SoapServer('http://127.0.0.1/misServiciosSOAP/ctof.wsdl', array('uri' => 'http://localhost/telepuertoV1L10/public/servidor/temperatura'));
              //$server->addFunction('celsiusToFahrenheit');
        $server->setClass(servidorTemperaturaSOAPController::class);
        // register available function
        $server->addFunction(array("celsiusToFahrenheit"));
        //$server->addFunction('celsiusToFahrenheit');
        // start handling requests
    /* $header = new SoapHeader('http://127.0.0.1/misServiciosSOAP/ctof.wsdl', 'AuthHeader', array(
        'username' => 'testuser',
        'password' => 'testpass'
    ));

    $server->addSoapHeader($header);
        $server->handle();
        //dd($server);
        //echo "hola";
  
    }

*/

}

