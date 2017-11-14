@if(!$errors->isEmpty())
		   <div class="alert alert-dager">
		   	  <p><strong>OOPS! </strong>Se encontraron los siguientes errores al procesar:</p>
		   	  <ul>
		   	  @foreach($errors->all() as $error)
		   	    <li>{{ $error }}</li>
		   	  @endforeach
		   	  </ul>
		   </div>
 @endif