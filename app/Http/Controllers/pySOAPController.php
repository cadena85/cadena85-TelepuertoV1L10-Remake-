<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SoapClient;
class pySOAPController extends Controller
{
    //
    
     public function consumirServicioPy(){
        $client = new SoapClient("http://localhost:8000?wsdl");
        //dd($client);
        $params = array(
            'name' => "Rob Paper Sheet",
            'times' => 7
        );
        $resultado = $client->say_hello($params);
        $arreglo= $resultado->say_helloResult->string;
        //dd($arreglo);
        foreach ($arreglo as $key => $value) {
            // code...
            echo "<br>".$key.": ".$value;
        }
        
     }

}
