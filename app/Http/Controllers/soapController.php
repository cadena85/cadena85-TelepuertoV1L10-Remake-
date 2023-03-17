<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use SoapClient;
use StdClass;

class soapController extends Controller
{
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
        
        $params = array(
            'name' => "Russell",
        );
        $resultado = $client->GetByName($params);
        //dd($resultado->GetByNameResult);        
        $any= $resultado->GetByNameResult->any;
        //$schema= $resultado->GetByNameResult->schema;
        //dd($any);
        echo "<br>El resultado de GetByName es: " ;
        //echo "<br>Id: " . $any["ListByName"]->Name;        
        $xml=simplexml_load_string($any);
        //dd($xml->ListByName->SQL);  
        //echo count((array) $xml);      
        if (count((array) $xml) > 0) {

            // this is not a tag that contains other tags

            //$xml = '' . $xml;
            echo "<br>ID: " . $xml->ListByName->SQL->ID;
            echo "<br>Name: " . $xml->ListByName->SQL->Name;
            echo "<br>DOB: " . $xml->ListByName->SQL->DOB;
            echo "<br>SSN: " . $xml->ListByName->SQL->SSN;

            // now the CDATA is revealed magically.

        }
		 /*$parametros= array(            
            'name' => "Brown",
        );*/
        $parametros= array(            
            'name' => "Xochitl",
        );
        $resultado = $cliente->GetByName($parametros);
        $xml=$resultado->GetByNameResult->any;
        $arreglo=simplexml_load_string($xml);
        //dd($arreglo);
        //dd($arregloDataSet->ListByName);
        //dd(count($arregloDataSet->ListByName->SQL));
        $dataSet=$arreglo->ListByName->SQL;
        if(count($dataSet)>0){
            foreach($dataSet as $i=> $data){
                //dd($data);
                echo "<br>ID:".$data->ID;    
            }
        }
        $parametros= array(            
            'id' => 5,
        );
        $resultado = $cliente->FindPerson($parametros);
        //dd($resultado);
        $datos = $resultado->FindPersonResult;
        //dd($datos);
        $NumeroElementos =  count((array) $datos);
        //dd($NumeroElementos);
        $array = (array) $datos;
        //dd($array);
        foreach ($array as $key => $value) {
            // code...
            if(is_string($value) || is_numeric($value))
                echo "<br>". $key . ": ". $value;
            else{
                echo "<br> ---".$key;
                 foreach ($value as $k => $val) {
                    // code...
                    echo "<br>". $k . ": ". $val;
                } 
            }
              
        }
    }
}
