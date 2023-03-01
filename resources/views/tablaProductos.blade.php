@extends('layouts.appTest')
@section('contenido')
<div class="container">
<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Modelo</th>
      <th scope="col">Puertas</th>
      <th scope="col">Fecha C</th>
      <th scope="col">Fecha M</th>
    </tr>
  </thead>
  <tbody>
          @foreach ($products  as $i=>$product)
            <tr>
              <td>{{ $i}}</td>
              <td>{{ $product->vehiculo}}</td>
              <td>{{ $product->modelo }}</td>
              <td>{{ $product->puertas }}</td>
              <td>{{ $product->created_at }}</td>
              <td>{{ $product->updated_at }}</td>              
            </tr>
            @endforeach
  </tbody>
</table>
</div>
@endsection

