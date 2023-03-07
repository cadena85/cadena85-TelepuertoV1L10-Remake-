<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SoapClient;
class clienteTemperaturaSOAPController extends Controller
{
    //

    public function consumirTemperatura(){
        echo 'Create and Consume SOAP Service using PHP';
        echo nl2br("\n\n");
        
        $client = new SoapClient('http://127.0.0.1/misServiciosSOAP/ctof.wsdl' );
        $functions = $client->__getFunctions();
        //dd($functions);
        try {
            $functions = $client->__getFunctions();
            //dd($functions);
            $response = $client->celsiusToFahrenheit( 36 );
            //var_dump($client);
            
            echo 'Celsius to Fahrenheit: ' . $response;
        } catch ( SoapFault $sf ) {
            echo $sf;
            echo 'Error:: ' . $sf->getMessage();
        }
    }

}
