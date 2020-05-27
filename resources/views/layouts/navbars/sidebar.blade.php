<div class="sidebar" data-color="rose" data-background-color="black" data-image="{{ asset('coopfon') }}/img/sidebar-1.jpg">
  <!--
    Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

    Tip 2: you can also add an image using data-image tag
-->
  <div class="logo">
    <a href="#" class="simple-text logo-mini">
      {{ __('CF') }}
    </a>
    <a href="#" class="simple-text logo-normal">
      {{ env('APP_NAME') }}
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
            {{ auth()->user()->name }}
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
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span class="sidebar-mini"> C </span>
                <span class="sidebar-normal"> Configuración </span>
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
            <p>{{ __('Dashboard') }}</p>
        </a>
      </li>

      <li class="nav-item {{ $menuParent == 'config' ? 'active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#config" {{ $menuParent == 'config' ? 'aria-expanded="true"' : '' }}>
            <i class="fa fa-cog fa-2x"></i>
          <p>{{ __('Configuración') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse {{ $menuParent == 'config' ? 'show' : '' }}" id="config">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('profile.edit') }}">
                <span class="sidebar-mini"> UP </span>
                <span class="sidebar-normal">{{ __('Perfil') }} </span>
              </a>
            </li>

            @can('manage-users', App\User::class)
              <li class="nav-item{{ $activePage == 'role-management' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('role.index') }}">
                  <span class="sidebar-mini"> RM </span>
                  <span class="sidebar-normal"> {{ __('Roles') }} </span>
                </a>
              </li>

              <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('user.index') }}">
                  <span class="sidebar-mini"> UM </span>
                  <span class="sidebar-normal"> {{ __('Usuarios') }} </span>
                </a>
              </li>
            @endcan
{{--              manageModules--}}
            @can('manage-items', App\User::class)
              @can('viewAny', App\Model\Config\Module::class)

              <li class="nav-item{{ $activePage == 'module' ? ' active' : '' }}">
                  <a class="nav-link" href="{{ route('module.index') }}">
                      <span class="sidebar-mini"> M </span>
                      <span class="sidebar-normal"> {{ __('Modulos') }} </span>
                  </a>
              </li>
              @endcan
            @endcan
          </ul>
        </div>
      </li>


    </ul>
  </div>
</div>
