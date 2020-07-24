<li class="nav-item {{ $menuParent == 'pqrs' ? 'active' : '' }}">
    <a class="nav-link" data-toggle="collapse" href="#pqrs" {{ $menuParent == 'pqrs' ? 'aria-expanded="true"' : '' }}>
        <i class="material-icons">support_agent</i>
        <p>{{ __('PQRS') }}
            <b class="caret"></b>
        </p>
    </a>
    <div class="collapse {{ $menuParent == 'pqrs' ? 'show' : '' }}" id="pqrs">
        <ul class="nav">
            <li class="nav-item{{ $activePage == 'pqrs-filings' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('pqrs.index') }}">
                    <span class="sidebar-mini"> R </span>
                    <span class="sidebar-normal">{{ __('Radicaciones') }} </span>
                </a>
            </li>
            @can('reply', 'App\Model\Pqrs\PqPqr')
            <li class="nav-item{{ $activePage == 'pqrs-reply' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('pqrs.reply') }}">
                    <span class="sidebar-mini"> S </span>
                    <span class="sidebar-normal">{{ __('Solicitudes') }} </span>
                </a>
            </li>
            @endcan
            @can('reply', 'App\Model\Pqrs\PqPqr')
                <li class="nav-item{{ $activePage == 'pqrs-external' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('pqrs_external.index') }}">
                        <span class="sidebar-mini"> SE </span>
                        <span class="sidebar-normal">{{ __('Solicitudes externas') }} </span>
                    </a>
                </li>
            @endcan
            @can('config', 'App\Model\Pqrs\PqPqr')
                <li class="nav-item{{ $activePage == 'pqrs-config' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('pqrs_config.index') }}">
                        <span class="sidebar-mini"> C </span>
                        <span class="sidebar-normal">{{ __('Configuración') }} </span>
                    </a>
                </li>
            @endcan
        </ul>
    </div>
</li>
