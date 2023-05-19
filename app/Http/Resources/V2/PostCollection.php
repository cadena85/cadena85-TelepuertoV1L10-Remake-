<?php

namespace App\Http\Resources\V2;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PostCollection extends ResourceCollection
{
    //°°°°°°
    //public $collects = PostResource::class;
    //con esto resolvemos el problema
    //°°°
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        //return parent::toArray($request);
        //aqui estoy hablando de un personalizacion global, es decir
        //a mucho recursos al mismo tiempo.
       return [
            'data' => $this->collection,
            'meta' => [
                'universidad' => 'uacm',
                'autores' =>[ 
                    "Alberto", 
                    "Grupo-XML2"
                    ],
                'type' => 'articulos'
                ]   
            ];         
        //recuerda: son campos adicionales y esta es la configuracion que deseo
        //cuando lo veamos en postman lo entendermos mejor.
        //http://localhost/telepuertoV1L10/public/api/v2/posts
        //pero esto muestra los datos sin personalizacion como al mostrar un recurso
        // lo que queremos resolver es qeu esta apariencia o formato
        // sea igual al de un recurso individual, para eso °°°°°°
    }
    /*
    Los metadatos, literalmente «sobre datos», son datos que describen otros datos. En general, un grupo de metadatos se refiere a un grupo de datos que describen el contenido informativo de un objeto al que se denomina recurso.​ El concepto de metadatos es análogo al uso de índices para localizar objetos en vez de datos. 
    */
}
