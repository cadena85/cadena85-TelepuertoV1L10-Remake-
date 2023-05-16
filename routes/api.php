<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\PostController;
use App\Http\Controllers\Api\V2\PostController as PostV2; 
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Aquí es donde puede registrar rutas API para su aplicación. 
| Estas rutas las carga el RouteServiceProvider y todas ellas 
| se asignarán al grupo de middleware "api". ¡Haz algo genial!
|
*/
/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/
//v1
Route::apiResource('v1/posts', PostController::class);
//->only(['index', 'show', 'destroy']);
//http://localhost/telepuertoV1L10/public/api/v1/posts/1
//V2
Route::apiResource('v2/posts', PostV2::class);

