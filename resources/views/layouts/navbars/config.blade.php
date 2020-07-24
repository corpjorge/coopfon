@can('manage-users', App\User::class)
<li class="nav-item {{ $menuParent == 'config' ? 'active' : '' }}">
    <a class="nav-link" data-toggle="collapse" href="#config" {{ $menuParent == 'config' ? 'aria-expanded="true"' : '' }}>
        <i class="fa fa-cog fa-2x"></i>
        <p>{{ __('Configuración') }}
            <b class="caret"></b>
        </p>
    </a>
    <div class="collapse {{ $menuParent == 'config' ? 'show' : '' }}" id="config">
        <ul class="nav">


                <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('user.index') }}">
                        <span class="sidebar-mini"> A </span>
                        <span class="sidebar-normal"> {{ __('Asociados') }} </span>
                    </a>
                </li>

            @can('manageAdmins', App\User::class)
                <li class="nav-item{{ $activePage == 'admin-management' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.index') }}">
                        <span class="sidebar-mini"> AD </span>
                        <span class="sidebar-normal"> {{ __('Administradores') }} </span>
                    </a>
                </li>
            @endcan

            @can('manage-roles', App\Role::class)
                <li class="nav-item{{ $activePage == 'role-management' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('role.index') }}">
                        <span class="sidebar-mini"> R </span>
                        <span class="sidebar-normal"> {{ __('Roles') }} </span>
                    </a>
                </li>
            @endcan

            @can('manageAdmins', App\User::class)
                <li class="nav-item{{ $activePage == 'auths-management' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('auths.index') }}">
                        <span class="sidebar-mini"> AU </span>
                        <span class="sidebar-normal"> {{ __('Autenticaciones') }} </span>
                    </a>
                </li>
            @endcan

            @can('manageModules', App\Model\Config\Module::class)
                @can('viewAny', App\Model\Config\Module::class)
                    <li class="nav-item{{ $activePage == 'external-system-management' ? ' active' : '' }}">
                        <a class="nav-link" href="{{ route('external-system.index') }}">
                            <span class="sidebar-mini"> S </span>
                            <span class="sidebar-normal"> {{ __('Sistema externo') }} </span>
                        </a>
                    </li>
                @endcan
            @endcan

            @can('manageModules', App\Model\Config\Module::class)
                @can('viewAny', App\Model\Config\Module::class)
                    <li class="nav-item{{ $activePage == 'integrator' ? ' active' : '' }}">
                        <a class="nav-link" href="{{ route('module.index') }}">
                            <span class="sidebar-mini"> I </span>
                            <span class="sidebar-normal"> {{ __('Integrador') }} </span>
                        </a>
                    </li>
                @endcan
            @endcan

            @can('manageModules', App\Model\Config\Module::class)
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
@endcan
