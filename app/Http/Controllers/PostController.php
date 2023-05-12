<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;//aqui lo invoco


class PostController extends Controller
{
    public function index() 
    {
        return view('index', [
            //necesito invocarlo
            'posts' => Post::oldest()->paginate(5) //ya viene habilitada la paginación
            //latest() = ORDER BY con desc.
        ]);
    } 
}
/*
Los métodos más recientes y antiguos le permiten
 ordenar fácilmente los resultados por fecha. 
 De forma predeterminada, el resultado se ordenará 
 por la columna created_at de la tabla. 
*/