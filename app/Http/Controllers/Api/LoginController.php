<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//agregamos
use App/Models\User;
//invocando de manera directa el archivo para trabajar con la auteticacion 
use Illuminate\Support\Facades\Auth;//estoy creando un login personalizado
class LoginController extends Controller
{
    //
    public function login(Request $request){
        $this->validateLogin($request);
    }

    public function validateLogin(Request $request){
        return $request->validate([
            'email'=>  'require|mail',
            'password'=>  'require',
            'name'=>  'require' //desde donde no estamos conectado (iphone)
        ]);
    }
}
