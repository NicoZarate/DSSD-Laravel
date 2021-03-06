@extends('layouts.default')
@section('content')

<div class="container-fluid paj bg-1 text-center">
	<h2>Agregar un nuevo Usuario </h2>
	@include('errors/errors')

	<form method="post" action="{{ url('users') }}">
		{!! csrf_field() !!}

		<div class="form-group">
			<label for="name">Nombre:</label>
		   	<input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>	   	  
		</div>
		<div class="form-group">
			<label for="lastname">Apellido:</label>
		   	<input type="text" name="lastname" id="lastname" class="form-control" value="{{ old('lastname') }}" required>	   	  
		</div>
		<div class="form-group">
			<label for="dni">DNI:</label>
		   	<input type="number" name="dni" id="dni" class="form-control" value="{{ old('dni') }}" min="1" required>	   	  
		</div>
		<div class="form-group">
			<label for="email">E-mail:</label>
		   	<input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>	   	  
		</div>
		<div class="form-group">
			<label for="phone">Teléfono:</label>
		   	<input type="number" name="phone" id="phone" class="form-control" value="{{ old('phone') }}" min="1" required>	   	  
		</div>
		<div class="form-group">
			<label for="password">Contraseña:</label>
		   	<input type="password" name="password" id="password" class="form-control" value="" required>	   	  
		</div>
		<div class="form-group">
			<label for="password_confirmation">Vuelva a escribir la contraseña:</label>
		   	<input type="password" name="password_confirmation" id="password_confirmation" class="form-control" value="" required>	   	  
		</div>


	   	<button type="submit" class="btn col-xs-12 btn-create-submit"> Agregar Usuario</button>
	</form>
</div>		

@endsection