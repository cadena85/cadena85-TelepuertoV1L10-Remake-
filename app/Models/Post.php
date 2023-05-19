<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    public function getExtractoAttribute(){
        //substr — Devuelve parte de una cadena
        return substr($this->contenido, 0,120);

    }
    public function getFechaPublicadoAttribute(){

        return $this->created_at->format('d/m/Y');
        
    }
    public function user(){
    /*
    El método belongsTo nos permite trabajar con relaciones donde un 
    registro pertenece a otro registro. Este método acepta como primer 
    argumento el nombre de la clase que queremos vincular. 
    Eloquent determina el nombre de la llave foránea a partir del 
    nombre del método*/
        return $this->belongsTo(user::class);        
    }
}
