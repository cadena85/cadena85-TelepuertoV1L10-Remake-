<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SoapServer;

ini_set("soap.wsdl_cache_enabled", "0");

class servidorTemperaturaSOAPController extends Controller
{
    //
    public function celsiusToFahrenheit($celsius) {
        $fahrenheit = $celsius * 9 / 5 + 32;

        return $fahrenheit;
    }

    function __construct() {

                // initialize SOAP Server
        $server = new \SoapServer('http://127.0.0.1/misServiciosSOAP/ctof.wsdl' );
        // Agregamos la clase del controlador al servidor SOAP
        $server->setClass(servidorTemperaturaSOAPController::class);
        // register available function
        //$server->addFunction(array("celsiusToFahrenheit"));

        // start handling requests
        $server->handle();


    }

    public function iniciar(){


    }



}

