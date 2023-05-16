<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //return parent::toArray($request);//si no se modifica vemos en postman 
        //el mismo resultado
        /*Lo que quiero decir acontinuación es que:
        no quiero mostrar el   "id": 3,
        "user_id": 9,*/
        // podemos alterar la informacion que mostramos en nuestro Json
        return [
            'title' => $this->titulo,
            'slug' => $this->slug,
            'excerpt' => $this->Extracto,
            'content' => $this->contenido,
        ];//no hace nada de inmediato, lo tengo que indicar en el controlador
    }
}
