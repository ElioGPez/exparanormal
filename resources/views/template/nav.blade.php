    <!-- Navigation -->
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <a class="navbar-brand" href="/home"> 
    <img src="{{ asset('storage/Logo.png') }}"  height="40" alt="">
  </a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample04">
        <ul class="navbar-nav mr-auto">
          <!--li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
            <div class="dropdown-menu" aria-labelledby="dropdown04">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
            </div-->

        </ul>
                          <ul class="nav navbar-nav navbar-right"  >
          @if (Auth::guest()!=true)
          <li class="nav-item active" >
                  
            <a class="nav-link" href="{{ route('publicacion.create') }}" ><i style="color: white;" class="fas fa-plus-circle"></i>   Publicar</a>

          </li>
          @endif
                        </ul>

          <div style="color: white"> </div>  
                  <ul class="nav navbar-nav navbar-right">
          @if (Auth::guest())
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/auth/login') }}">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/auth/register') }}">Register</a>
            </li>
          @else
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i style="color: white;" class="fas fa-user"></i> {{ Auth::user()->name }}<span class="caret"></span></a>
            <div class="dropdown-menu" aria-labelledby="dropdown04">
              <a class="dropdown-item" href="{{ url('/auth/logout') }}">Logout</a>
            </div>
          </li>
            <li class="dropdown nav-item">

            </li>
          @endif
                        </ul>

      </div>
    </nav>