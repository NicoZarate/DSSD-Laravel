@extends('layouts.default')
@section('content')
<div class="container">
	<h2>Listado de Incidentes</h2>

@if(count($incidents))
	<h4 class="col-xs-6">Mis Incidentes:</h4>  
	      
	<table class="table table-bordered table-condensed">
	<thead>
		<tr>
		    <th>Tipo</th>
		    <th>Fecha</th>
		    <th>Descripcion</th>
		    <th>Cantidad</th>
		    <th>Estado</th>
		    <th>Objetos</th>
		</tr>
	</thead>
	<tbody>
		@foreach($incidents as $i)
		   <tr>
			    <td>{{ $i->tipo }} </td>
				<td>{{ $i->fecha }} </td>
		        <td>{{ $i->descripcion }}</td>
		        <td>{{ $i->cantidad }}</td>
		        @if ($i->estado == "Rechazado" or $i->estado == "Presupuesto Rechazado" or $i->estado == "Vencido")
		        	@php
						$color = "red"
					@endphp
		        @else
		        	@php
						$color = "green"
					@endphp
		        @endif
		        <td> <font color={{ $color }}> {{ $i->estado }} </font></td>
                <td><div class="form-group" id="divs"><a href="{{ route('incidents.show',$i->id) }}" id="ver" >Ver</a></div></td>
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