<li class="nav-item {{ $menuParent == 'pqrs' ? 'active' : '' }}">
    <a class="nav-link" data-toggle="collapse" href="#pqrs" {{ $menuParent == 'pqrs' ? 'aria-expanded="true"' : '' }}>
        <i class="material-icons">support_agent</i>
{{--         announcement--}}
        <p>{{ __('PQRS') }}
            <b class="caret"></b>
        </p>
    </a>
    <div class="collapse {{ $menuParent == 'pqrs' ? 'show' : '' }}" id="pqrs">
        <ul class="nav">
            <li class="nav-item{{ $activePage == 'pqrs-requests' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('profile.edit') }}">
                    <span class="sidebar-mini"> S </span>
                    <span class="sidebar-normal">{{ __('Solicitudes') }} </span>
                </a>
            </li>
        </ul>
    </div>
</li>
