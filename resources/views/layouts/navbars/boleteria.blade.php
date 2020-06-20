

<li class="nav-item {{ $menuParent == 'boleteria' ? 'active' : '' }}">
    <a class="nav-link" data-toggle="collapse" href="#boleteria" {{ $menuParent == 'boleteria' ? 'aria-expanded="true"' : '' }}>
        <i class="fa fa-ticket fa-2x"></i>
        <p>{{ __('Boletería') }}
            <b class="caret"></b>
        </p>
    </a>
    <div class="collapse {{ $menuParent == 'boleteria' ? 'show' : '' }}" id="boleteria">
        <ul class="nav">
            <li class="nav-item{{ $activePage == 'vender' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('profile.edit') }}">
                    <span class="sidebar-mini"> V </span>
                    <span class="sidebar-normal">{{ __('Vender') }} </span>
                </a>
            </li>
        </ul>
    </div>
</li>




