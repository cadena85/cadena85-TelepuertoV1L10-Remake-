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

    	$client = new SoapClient("https://www.crcind.com/csp/samples/SOAP.Demo.CLS?WSDL=1");
        //dd($client);
	    //$functions = $client->__getFunctions();
            //dd($functions);
       // Define los parámetros de la solicitud
        $params = array(
            'Arg1' => 5,
            'Arg2' => 7
        );

// Llamar a la función AddInteger del cliente SOAP, pasando el objeto de la clase AddInteger como parámetro
        $resultado = $client->AddInteger($params);
        //dd($resultado);
        //$resultado = $client->AddInteger(); var_dump ($resultado); // esto lo agegue para visualizar la respuesta
	    echo "El resultado de la suma es: " . $resultado->AddIntegerResult;
    }
}
