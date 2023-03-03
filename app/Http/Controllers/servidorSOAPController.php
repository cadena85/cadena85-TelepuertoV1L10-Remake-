<?php

namespace App\Http\Controllers;
use SoapServer;
use Illuminate\Http\Request;

class servidorSOAPController extends Controller
{
 
    function __construct() {

        // Creamos un objeto servidor SOAP
    $server = new SoapServer("http://127.0.0.1/misServiciosSOAP/mi-servicio.wsdl");

    // Asociamos la función sumar al método sumar del servidor
    $server->addFunction("sumar");

    // Procesamos la petición
    $server->handle();
    }
    // Definimos una función para sumar dos números
    function sumar($a, $b) {
      return $a + $b;
    }


}
