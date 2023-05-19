<?php

namespace App\Http\Resources\V2;

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
        //return parent::toArray($request);
        return [
            'id' => $this->id,
            'post_name' => $this->titulo,
            'slug' => $this->slug,
            'content' => $this->contenido,
            'author' => [
                'name' => $this->user->name,//el usuario no existe hay que configurarlo en el modelo
                'email' => $this->user->email,
            ],
            'created_at' => $this->created_at
        ];
    }
}
