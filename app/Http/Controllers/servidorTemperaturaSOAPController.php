<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SoapServer;

ini_set("soap.wsdl_cache_enabled", "0");

class servidorTemperaturaSOAPController extends Controller
{
    //   
    //ini_set('soap.wsdl_cache_enabled', '0'); 
    
    function celsiusToFahrenheit($celsius) {
        $fahrenheit = $celsius * 9 / 5 + 32;

        return $fahrenheit;
    }
    

    function __construct() {
    }

    public function iniciar(){
        // initialize SOAP Server
        //$server = new SoapServer(null, array('uri' => 'http://localhost/telepuertoV1L10/public/servidor?wsdl'));
        $server = new \SoapServer('http://127.0.0.1/misServiciosSOAP/ctof.wsdl' );
        //$server = new \SoapServer('https://www.crcind.com/csp/samples/SOAP.Demo.CLS?WSDL=1' );
        //$server = new \SoapServer('http://localhost/telepuertoV1L10/public/servidor' );
        //$server = new \SoapServer(null, array('uri' => 'https://www.crcind.com/csp/samples/SOAP.Demo.CLS?WSDL=1'));
        //$wsdl = file_get_contents('http://127.0.0.1/misServiciosSOAP/ctof.wsdl');
        //echo $wsdl;
        // Agregamos la clase del controlador al servidor SOAP
        $server->setClass(servidorTemperaturaSOAPController::class);
        // register available function
        //$server->addFunction(array("celsiusToFahrenheit"));
        //$server->addFunction('celsiusToFahrenheit');
        // start handling requests
        $server->handle();
        //dd($server);
        //echo "hola";

    }



}

