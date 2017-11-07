@extends('layouts.default')
@section('content')
<div class="container">
	<h2>Incidente</h2>

@if(count($incident->objects))
	<h4 class="col-xs-6">Mis Incidentes:</h4>  
	      
	<table class="table table-bordered table-condensed">
	<thead>
		<tr>
		    <th>Nombre</th>
		    <th>Descripcion</th>
		    <th>Cantidad</th>
		    
		</tr>
	</thead>
	<tbody>
		@foreach($incident->objects as $i)
		   <tr>
			    <td>{{ $i->nombre }} </td>
			    <td>{{ $i->cantidad }}</td>
		        <td>{{ $i->descripcion }}</td>
		        
		   </tr>  

		@endforeach
	</tbody>
</table>

@else
  <div class="row text-center">
      <div class="col-sm-12">
        <div class="thumbnail">
          <p><strong>No hay Incidencias cargadas en el sistema</strong></p>
        </div>
      </div>
    </div>
@endif

@endsection	