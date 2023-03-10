<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SoapClient;
class clienteTemperaturaSOAPController extends Controller
{
    //


    public function consumirTemperatura(){
            $options = [
    'location' => 'http://localhost/telepuertoV1L10/public/servidor/temperatura',
    'uri' => 'http://localhost/telepuertoV1L10/public/servidor/temperatura'
];
$options = [
    'location' => 'http://localhost/telepuertoV1L10/public/servidor/temperatura',
    'uri' => 'http://localhost/telepuertoV1L10/public/servidor/temperatura',
    'trace' => 1,
    'exceptions' => true,
    'soap_version' => SOAP_1_1,
    'cache_wsdl' => WSDL_CACHE_NONE,
    'stream_context' => stream_context_create([
        'ssl' => [
            'verify_peer' => false,
            'verify_peer_name' => false,
        ],
    ]),
];
        echo 'Create and Consume SOAP Service using PHP';
        echo nl2br("\n\n");
                
        $client = new SoapClient('http://127.0.0.1/misServiciosSOAP/ctof.wsdl', $options);
        //$client = new SoapClient('http://127.0.0.1/misServiciosSOAP/ctof.wsdl', $options);
        
        // Obtener el token CSRF
        $token = csrf_token();

        // Agregar el encabezado CSRF a la solicitud
        $headers = [
            'X-CSRF-TOKEN: ' . $token,
        ];

        // Crear el contexto de transmisión con el encabezado CSRF
        $context = stream_context_create([
            'http' => [
                'header' => implode("\r\n", $headers),
            ],
        ]);
        $params = [
            'celsius' => 41,
        ];
        // Realizar la solicitud SOAP con el contexto de transmisión
        $response = $client->__soapCall('celsiusToFahrenheit', $params, ['stream_context' => $context,]);
        //$client->__setSoapHeaders(['stream_context' => $context]);
        //$functions = $client->__getFunctions();
        dd($client); //var_dump($client);
        //dd($functions);
        try {
            //$response = $client->__soapCall('celsiusToFahrenheit', array("5"));
            
            //$response = $client->celsiusToFahrenheit(36);
            
            
            echo 'Celsius to Fahrenheit: ' . $response;
        } catch ( SoapFault $sf ) {
            echo $sf;
            echo 'Error:: ' . $sf->getMessage();
        }
    }

}
