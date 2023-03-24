<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Laminas\Soap\AutoDiscover;

use App\MiBiblioteca\MySoapServerClass;

class creadorWSDL extends Controller
{
        //composer require laminas/laminas-soap
        //composer dump-autoload
    public function crearWSDL() {
        //dd(MySoapServerClass::class);
        $autodiscover = new AutoDiscover();
        $autodiscover   ->setClass(MySoapServerClass::class)
                        ->setUri('http://localhost/server.php')
                        ->setServiceName('MiServicioSOAP');

        $wsdl = $autodiscover->generate();
        $xml =  $wsdl->toXml();
        // Emit the XML:
        echo "<textarea rows='10' cols='40'><xmp>".$xml."</xmp></textarea>";
        echo "<br>¡El archivo WSDL se creo exitosamente! <br>";


        //echo getcwd();
        // Or dump it to a file; this is a good way to cache the WSDL
        //$tmpfname=tempnam(getcwd(), "SOA");
        //echo $nameFile;
        //rename($tmpfname, $tmpfname .= '.pdf');//.= es el operador de concatenación y asignación. Concatena el valor del lado derecho con el valor de la variable en el lado izquierdo y asigna el resultado a la variable en el lado izquierdo. 

        $tmpfile = tempnam(getcwd(), 'SOA');
        echo "<br>".$tmpfile ;
        $file=str_replace(".tmp","",$tmpfile);
        echo "<br>".$file ;
        //file_put_contents($file."wsdl", $xml);
        $wsdl->dump($file.".wsdl");
        unlink($tmpfile);//to delete an empty file that tempnam creates
        //unlink($file.'.wsdl');//to delete your file
        //echo getcwd();
        //$wsdl->dump(getcwd()."/archivo.wsdl");

        // Or create a DOMDocument, which you can then manipulate:
        //$dom = $wsdl->toDomDocument();

    }


}
