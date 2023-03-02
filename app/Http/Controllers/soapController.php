<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use SoapClient;
use StdClass;


class soapController extends Controller
{
    //

    public function consumirServicio(){
    	libxml_disable_entity_loader(false);
    	$client = new SoapClient("http://127.0.0.1/misServiciosSOAP/mi-servicio.xml?wsdl");
	    $resultado = $client->sumar(5, 7);
	    echo "El resultado de la suma es: " . $resultado;
    }
}
