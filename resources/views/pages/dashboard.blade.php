@extends('layouts.default')

@section('content')

<div class="container-fluid paj bg-1 text-center">
  <h3>Bienvenido {{ Auth::user()->name }}!</h3>
  <img src="{{ asset('img/bak.jpg') }}" class="img-circle" alt="cafe">
  <h3>¡Seleccione la acción que desee desde el menú!</h3>
</div>

@endsection