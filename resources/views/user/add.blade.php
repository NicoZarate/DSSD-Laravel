@extends('layouts.default')
@section('content')
<div class="row">
 <div class="col-md-8 col-md-offset-2">
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
			<label for="username">Nombre de usuario:</label>
		   	<input type="text" name="username" id="username" class="form-control" value="{{ old('username') }}" required>	   	  
		</div>
		<div class="form-group">
			<label for="password">Contraseña:</label>
		   	<input type="password" name="password" id="password" class="form-control" value="" required>	   	  
		</div>
		<div class="form-group">
			<label for="password_confirmation">Vuelva a escribir la contraseña:</label>
		   	<input type="password" name="password_confirmation" id="password_confirmation" class="form-control" value="" required>	   	  
		</div>

		<div class="form-group">
			<label for="role_id">Seleccione un Rol:</label>
		   	  <select name="role_id" id="role_id" class="form-control" required>
		   	  	    <option value="{{ old('role_id') }}"></option>
		   	     	@foreach($roles as $r)
		   	     	    <option value="{{$r->id}}">{{ $r->description }}</option>
		   	     	@endforeach    
		   	  </select>
		</div>

		<div class="form-group">
			<label for="location_id">Seleccione una ubicación:</label>
		   	  <select name="location_id" id="location_id" class="form-control" disabled>
		   	  	    <option value="{{ old('location_id') }}"></option>
		   	     	@foreach($locations as $l)
		   	     	    <option value="{{$l->id}}">{{ $l->office }}</option>
		   	     	@endforeach    
		   	  </select>
		</div>


	   	<button type="submit" class="btn col-xs-12 btn-create-submit"> Agregar Usuario</button>
	</form>
</div>	
</div>	
@endsection