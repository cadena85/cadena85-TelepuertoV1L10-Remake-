<?php

namespace App\Http\Controllers;
use App\Models\Producto;
use Illuminate\Http\Request;

class formularioController extends Controller
{
    function celsiusToFahrenheit($celsius) {
        $fahrenheit = $celsius * 9 / 5 + 32;

        return $fahrenheit;
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $productos = Producto::get(); //Eloquent ORM

        return view('tablaProductos', ['products' => $productos]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("formulario");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        dd($request);
        $producto = new Producto;//use App\Models\Producto;
        $producto->vehiculo = $request->vehiculo; 
        $producto->save();
        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
