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
            <li class="nav-item{{ $activePage == 'pqrs-reply' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('pqrs.reply') }}">
                    <span class="sidebar-mini"> S </span>
                    <span class="sidebar-normal">{{ __('Solicitudes') }} </span>
                </a>
            </li>
        </ul>
    </div>
</li>
