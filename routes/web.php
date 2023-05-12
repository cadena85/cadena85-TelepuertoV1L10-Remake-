<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\formularioController;
use App\Http\Controllers\soapController;
use App\Http\Controllers\servidorSOAPController;

use App\Http\Controllers\clienteTemperaturaSOAPController;
use App\Http\Controllers\servidorTemperaturaSOAPController;
use App\Http\Controllers\pySOAPController;
use App\Http\Controllers\creadorWSDL;
use App\Http\Controllers\consumoRestController;
use App\Http\Controllers\PostController;

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

Route::get('/consumo/crcind/demo', [soapController::class, 'consumirServicio']);//Recuerda el use al inici

Route::get('/cliente/temperatura', [clienteTemperaturaSOAPController::class, 'consumirTemperatura']);

Route::any('/servidor/temperatura', function() {
    //$this->middleware('verifyCsrfToken'); 
    $soapServer = new SoapServer('http://127.0.0.1/misServiciosSOAP/ctof.wsdl', array('uri' => 'http://localhost/telepuertoV1L10/public/servidor/temperatura'));
    $soapServer->setClass(servidorTemperaturaSOAPController::class);
    $soapServer->handle();
});
Route::get('/cliente/py', [pySOAPController::class, 'consumirServicioPy']);
Route::get('/crer/wsdl/ajua', [creadorWSDL::class, 'crearWSDL']);
//Consumo REST
Route::get('/gatos/aletorios', [consumoRestController::class, 'index'])->name('aletorios');;
Route::get('/gatos/favoritos', [consumoRestController::class, 'favoritos'])->name('album');;

//API REST 
Route::get('/index', [PostController::class, 'index']);