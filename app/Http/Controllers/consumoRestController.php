<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class consumoRestController extends Controller
{
    //
     public function index()
    {
        
        return view("testPage");
    }
    public function favoritos()
    {
        
        return view("favoritos");
    }
}
