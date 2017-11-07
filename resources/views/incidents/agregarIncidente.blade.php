@extends('layouts.default')

@section('content')

<div class="container-fluid paj bg-1 text-center">
  <h3>Bienvenido {{ Auth::user()->name }}</h3>
  <h3>Complete los datos para cargar su incidente</h3>


	<form method="post" action="{{ url('incidents') }}">
		{!! csrf_field() !!}

		<div class="form-group">
			<label for="fecha">Fecha del incidente:</label>
		   	<input class="form-control" type="text" name="from" id="from" value="{{ old('fecha') }}" required>	   	  
		</div>


		<div class="form-group">
			<label for="tipo">Tipo:</label>
		   	  <select name="tipo" id="tipo" class="form-control" required>
		   	  	    <option value="Auto">Auto</option>
		   	     	<option value="Casa">Casa</option>
		   	     	<option value="Objeto">Objeto Mueble</option> 
		   	  </select>
		</div>

		<div class="form-group">
			<label for="descripcion">Descripción:</label>
		   	<input type="text" name="descripcion" id="descripcion" class="form-control" value="{{ old('descripcion') }}" required>	  
		</div> 

		<div class="input_fields_wrap">
		    <button class="add_field_button">Agregar Objetos</button>
		    <div><input type="hidden" name="objetos[]"></div>
		</div>
	   	
	   	<br>

	   	<button type="submit" class="btn col-xs-12 btn-create-submit"> Enviar Incidente </button>
	</form>
</div>	






<script>

    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $("#rm").remove(); 
            
            $(wrapper).append('<div class="form-group" id="divs">Nombre: <input class="form-control" type="text" name="objetos[]"/>'); //add input box
            $(wrapper).append('<div class="form-group" id="divs">Descripción: <input class="form-control" type="text" name="objetos[]"/>'); //add input box
            $(wrapper).append('<div class="form-group" id="divs">Cantidad: <input class="form-control" type="text" name="objetos[]"/></div>'); //add input box
            $(wrapper).append('<div class="form-group" id="divs"><a href="#" id="rm" class="remove_field">Eliminar</a></div>'); //add input box
            $(wrapper).append('<br>')
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $("#divs").remove(); x--;
        $("#divs").remove(); x--;
        $("#divs").remove(); x--;
        $("#divs").remove(); x--;

    })


</script>

@endsection
