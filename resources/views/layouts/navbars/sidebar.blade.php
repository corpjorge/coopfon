<div class="sidebar" data-color="{{ env('APP_COLOR') }}" data-background-color="{{ env('APP_COLOR_SECOND') }}" data-image="{{ asset('coopfon') }}/img/{{ env('APP_IMG') }}">
  <!--
    Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

    Tip 2: you can also add an image using data-image tag
-->
  <div class="logo">
    <a href="#" class="simple-text logo-mini">
      {{ __('CF') }}
    </a>
    <a href="#" class="simple-text logo-normal">
        <img src="{{ asset('coopfon') }}/img/{{ env('APP_LOGO') }}" style="width: 108px;">
    </a>
  </div>
  <div class="sidebar-wrapper">
    <div class="user">
      <div class="photo">
        <img src="{{ auth()->user()->profilePicture() }}" />
      </div>
      <div class="user-info">
        <a data-toggle="collapse" href="#collapseExample" class="username">
          <span>
            {{ auth()->user()->full_name }}
            <b class="caret"></b>
          </span>
        </a>
        <div class="collapse" id="collapseExample">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('profile.edit') }}">
                <span class="sidebar-mini"> MP </span>
                <span class="sidebar-normal"> Mi perfil </span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <ul class="nav">
        <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
            <a class="nav-link" href="{{ route('home') }}">
              <i class="material-icons">dashboard</i>
                <p>{{ __('Tablero') }}</p>
            </a>
        </li>

        <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
            <a class="nav-link" href="{{ route('profile.edit') }}">
                <i class="material-icons">account_box</i>
                <p>{{ __('Perfil') }}</p>
            </a>
        </li>

        {{--Menu Modulos
        @foreach($menuModules as $module)
                @include('layouts.navbars.'.$module->path)
        @endforeach
        Menu Modulos end--}}

        @include('layouts.navbars.config')


    </ul>
  </div>
</div>
