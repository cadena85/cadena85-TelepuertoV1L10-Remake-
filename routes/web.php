<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\formularioController;
use App\Http\Controllers\soapController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//Recuerda el use al inicio para que encuentre al controlador
//Ejemplo: use App\Http\Controllers\formularioController;
Route::get('/productos', [formularioController::class, 'index']);//Recuerda el use al inici
Route::get('/form', [formularioController::class, 'create']);
Route::post('/form/save', [formularioController::class, 'store'])->name('producto.guardar');
Route::get('/servicio/soap', [soapController::class, 'consumirServicio']);//Recuerda el use al inici