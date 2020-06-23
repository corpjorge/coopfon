<li class="nav-item {{ $menuParent == 'servicios' ? 'active' : '' }}">
    <a class="nav-link" data-toggle="collapse" href="#boleteria" {{ $menuParent == 'servicios' ? 'aria-expanded="true"' : '' }}>
        <i class="material-icons">announcement</i>
        <p>{{ __('Servicios') }}
            <b class="caret"></b>
        </p>
    </a>
    <div class="collapse {{ $menuParent == 'servicios' ? 'show' : '' }}" id="boleteria">
        <ul class="nav">
            <li class="nav-item{{ $activePage == 'vender' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('profile.edit') }}">
                    <span class="sidebar-mini"> V </span>
                    <span class="sidebar-normal">{{ __('PQR') }} </span>
                </a>
            </li>
        </ul>
    </div>
</li>
