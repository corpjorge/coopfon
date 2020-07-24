<!-- Navbar -->
<nav class="navbar navbar-color-on-scroll navbar-transparent fixed-top navbar-expand-lg " color-on-scroll="100" id="sectionsNav">
  <div class="container">
    <div class="navbar-wrapper">
      <a class="navbar-brand" href="{{ route('home') }}"><img id="logo" src="{{ asset('coopfon') }}/img/logo_b.png" style="width: 118px;"></a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
      <span class="sr-only">Toggle navigation</span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="/" class="nav-link">
            <i class="material-icons">home</i>
          </a>
        </li>
        @guest
        <li class="nav-item{{ $activePage == 'login' ? ' active' : '' }}">
          <a href="{{ route('login') }}" class="nav-link">
            <i class="material-icons">fingerprint</i> {{ __('Iniciar sesión') }}
          </a>
        </li>
        @endguest
        @auth()
          <li class="nav-item{{ $activePage == 'login' ? ' active' : '' }}">
              <a href="{{ route('login') }}" class="nav-link">
                  <i class="material-icons">dashboard</i> {{ __('Tablero') }}
              </a>
          </li>
          <li class="nav-item">
              <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
                  <i class="material-icons">directions_run</i>
                  <span>{{ __('Cerrar sesión') }}</span>
              </a>
          </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>
