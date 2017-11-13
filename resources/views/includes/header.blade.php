<nav class="navbar navbar-inverse" id="colornav">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        @if (Auth::guest())
        <li><a href="{{ url('/') }}"><span class="glyphicon glyphicon-home"></span> Inicio</a></li>
        @elseif(Auth::user()->hasRole('client'))
             <li><a href="{{ url('/') }}"><span class="glyphicon glyphicon-home"></span></a></li>
             <li><a href="{{ url('incidents') }}">Mis Incidencias</a></li>
             <li><a href="{{ url('/incidents/create') }}">Agregar Incidencia</a></li>
             <li><a href="{{ url('/incidents/req') }}">req</a></li>
        @else
          <li><a href="{{ url('/users/create') }}">Registrar Nuevo Usuario</a></li>
        @endif
      </ul>
      <ul class="nav navbar-nav navbar-right">
       @if (Auth::guest())
          <li><a href="{{ url('/login') }}"><span class="glyphicon glyphicon-log-in"></span> Entrar</a></li>
                      
          @else
              <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                      {{ Auth::user()->name }} <span class="caret"></span>
                  </a>

                  <ul class="dropdown-menu" role="menu">
                      <li>
                          <a href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                              <span class="glyphicon glyphicon-log-out"></span>
                              Cerrar Sesión
                          </a>

                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              {{ csrf_field() }}
                          </form>
                      </li>
                  </ul>
              </li>
          @endif
      </ul>
    </div>
  </div>
</nav>