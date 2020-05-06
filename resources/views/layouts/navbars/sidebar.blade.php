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
      {{ __('CoopFon') }}
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
                <span class="sidebar-normal"> My Profile </span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('profile.edit') }}">
                <span class="sidebar-mini"> EP </span>
                <span class="sidebar-normal"> Edit Profile </span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span class="sidebar-mini"> S </span>
                <span class="sidebar-normal"> Settings </span>
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
      <li class="nav-item {{ ($menuParent == 'laravel' || $activePage == 'dashboard') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample" {{ ($menuParent == 'laravel' || $activePage == 'dashboard') ? ' aria-expanded="true"' : '' }}>
          <i><img style="width:25px" src="{{ asset('coopfon') }}/img/laravel.svg"></i>
          <p>{{ __('Laravel Examples') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse {{ ($menuParent == 'dashboard' || $menuParent == 'laravel') ? ' show' : '' }}" id="laravelExample">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('profile.edit') }}">
                <span class="sidebar-mini"> UP </span>
                <span class="sidebar-normal">{{ __('User profile') }} </span>
              </a>
            </li>
            @can('manage-users', App\User::class)
              <li class="nav-item{{ $activePage == 'role-management' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('role.index') }}">
                  <span class="sidebar-mini"> RM </span>
                  <span class="sidebar-normal"> {{ __('Role Management') }} </span>
                </a>
              </li>
            @endcan
            @can('manage-users', App\User::class)
              <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('user.index') }}">
                  <span class="sidebar-mini"> UM </span>
                  <span class="sidebar-normal"> {{ __('User Management') }} </span>
                </a>
              </li>
            @endcan
            @can('manage-items', App\User::class)
              <li class="nav-item{{ $activePage == 'category-management' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('category.index') }}">
                  <span class="sidebar-mini"> CM </span>
                  <span class="sidebar-normal"> {{ __('Category Management') }} </span>
                </a>
              </li>
            @endcan
            @can('manage-items', App\User::class)
              <li class="nav-item{{ $activePage == 'tag-management' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('tag.index') }}">
                  <span class="sidebar-mini"> TM </span>
                  <span class="sidebar-normal"> {{ __('Tag Management') }} </span>
                </a>
              </li>
            @endcan
            @can('manage-items', App\User::class)
              <li class="nav-item{{ $activePage == 'item-management' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('item.index') }}">
                  <span class="sidebar-mini"> IM </span>
                  <span class="sidebar-normal"> {{ __('Item Management') }} </span>
                </a>
              </li>
            @else
              <li class="nav-item{{ $activePage == 'item-management' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('item.index') }}">
                  <span class="sidebar-mini"> IM </span>
                  <span class="sidebar-normal"> {{ __('Items') }} </span>
                </a>
              </li>
            @endcan
          </ul>
        </div>
      </li>
      <li class="nav-item {{ $menuParent == 'pages' ? 'active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#pagesExamples" {{ $menuParent == 'Pages' ? 'aria-expanded="true"' : '' }}>
          <i class="material-icons">image</i>
          <p> {{ __('Pages') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse{{ $menuParent == 'pages' ? ' show' : '' }}" id="pagesExamples">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('page.pricing') }}">
                <span class="sidebar-mini"> P </span>
                <span class="sidebar-normal"> {{ __('Pricing') }} </span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('page.rtl-support') }}">
                <span class="sidebar-mini"> RS </span>
                <span class="sidebar-normal"> {{ __('RTL Support') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'timeline' ? ' active' : '' }} ">
              <a class="nav-link" href="{{ route('page.timeline') }}">
                <span class="sidebar-mini"> T </span>
                <span class="sidebar-normal"> {{ __('Timeline') }} </span>
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="{{ route('page.lock') }}">
                <span class="sidebar-mini"> LSP </span>
                <span class="sidebar-normal"> {{ __('Lock Screen Page') }} </span>
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="{{ route('profile.edit') }}">
                <span class="sidebar-mini"> UP </span>
                <span class="sidebar-normal"> User Profile </span>
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="{{ route('page.error') }}">
                <span class="sidebar-mini"> E </span>
                <span class="sidebar-normal"> Error Page </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item {{ $menuParent == 'compoments' ? 'active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#componentsExamples" {{ $menuParent == 'components' ? 'aria-expanded="true"' : '' }}>
          <i class="material-icons">apps</i>
          <p> Components
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse {{ $menuParent == 'components' ? ' show' : '' }}" id="componentsExamples">
          <ul class="nav">
            <li class="nav-item ">
              <a class="nav-link" data-toggle="collapse" href="#componentsCollapse">
                <span class="sidebar-mini"> MLT </span>
                <span class="sidebar-normal"> Multi Level Collapse
                  <b class="caret"></b>
                </span>
              </a>
              <div class="collapse" id="componentsCollapse">
                <ul class="nav">
                  <li class="nav-item ">
                    <a class="nav-link" href="#0">
                      <span class="sidebar-mini"> E </span>
                      <span class="sidebar-normal"> Example </span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item{{ $activePage == 'buttons' ? ' active' : '' }} ">
              <a class="nav-link" href="{{ route('page.buttons') }}">
                <span class="sidebar-mini"> B </span>
                <span class="sidebar-normal"> {{ __('Buttons') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'grid' ? ' active' : '' }} ">
              <a class="nav-link" href="{{ route('page.grid') }}">
                <span class="sidebar-mini"> GS </span>
                <span class="sidebar-normal"> {{ __('Grid System') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'panels' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('page.panels') }}">
                <span class="sidebar-mini"> P </span>
                <span class="sidebar-normal"> {{ __('Panels') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'sweet-alert' ? ' active' : '' }} ">
              <a class="nav-link" href="{{ route('page.sweet-alert') }}">
                <span class="sidebar-mini"> SA </span>
                <span class="sidebar-normal"> {{ __('Sweet Alert') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'notifications' ? ' active' : '' }} ">
              <a class="nav-link" href="{{ route('page.notifications') }}">
                <span class="sidebar-mini"> N </span>
                <span class="sidebar-normal"> {{ __('Notifications') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'icons' ? ' active' : '' }} ">
              <a class="nav-link" href="{{ route('page.icons') }}">
                <span class="sidebar-mini"> I </span>
                <span class="sidebar-normal"> {{ __('Icons') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'typography' ? ' active' : '' }} ">
              <a class="nav-link" href="{{ route('page.typography') }}">
                <span class="sidebar-mini"> T </span>
                <span class="sidebar-normal"> {{ __('Typography') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item {{ $menuParent == 'forms' ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#formsExamples" {{ $menuParent == 'forms' ? 'aria-expanded="true"' : '' }}>
          <i class="material-icons">content_paste</i>
          <p> Forms
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse {{ $menuParent == 'forms' ? 'show' : '' }}" id="formsExamples">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'form_regular' ? ' active' : '' }} ">
              <a class="nav-link" href="{{ route('page.regular_forms') }}">
                <span class="sidebar-mini"> RF </span>
                <span class="sidebar-normal"> {{ __('Regular Forms') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'form_extended' ? ' active' : '' }} ">
              <a class="nav-link" href="{{ route('page.extended_forms') }}">
                <span class="sidebar-mini"> EF </span>
                <span class="sidebar-normal"> {{ __('Extended Forms') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'form_validation' ? ' active' : '' }} ">
              <a class="nav-link" href="{{ route('page.validation_forms') }}">
                <span class="sidebar-mini"> VF </span>
                <span class="sidebar-normal"> {{ __('Validation Forms') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'form_wizard' ? ' active' : '' }} ">
              <a class="nav-link" href="{{ route('page.wizard_forms') }}">
                <span class="sidebar-mini"> W </span>
                <span class="sidebar-normal"> {{ __('Wizard') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item {{ $menuParent == 'tables' ? 'active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#tablesExamples" {{ $menuParent == 'tables' ? 'aria-expanded="true"' : '' }}>
          <i class="material-icons">grid_on</i>
          <p> {{ __('Tables') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse {{ $menuParent == 'tables' ? 'show' : '' }}" id="tablesExamples">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'regular' ? ' active' : '' }}  ">
              <a class="nav-link" href="{{ route('page.regular_tables') }}">
                <span class="sidebar-mini"> RT </span>
                <span class="sidebar-normal"> {{ __('Regular Tables') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'extended' ? ' active' : '' }}  ">
              <a class="nav-link" href="{{ route('page.extended_tables') }}">
                <span class="sidebar-mini"> ET </span>
                <span class="sidebar-normal"> {{ __('Extended Tables') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'datatables' ? ' active' : '' }} ">
              <a class="nav-link" href="{{ route('page.datatable_tables') }}">
                <span class="sidebar-mini"> DT </span>
                <span class="sidebar-normal"> {{ __('DataTables.net') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item {{ $menuParent == 'maps' ? 'active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#mapsExamples" {{ $menuParent == 'maps' ? 'aria-expanded="true"' : '' }}>
          <i class="material-icons">place</i>
          <p> Maps
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse {{ $menuParent == 'maps' ? 'show' : '' }}" id="mapsExamples">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'google_maps' ? ' active' : '' }} ">
              <a class="nav-link" href="{{ route('page.google_maps') }}">
                <span class="sidebar-mini"> GM </span>
                <span class="sidebar-normal"> {{ __('Google Maps') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'fullscreen_maps' ? ' active' : '' }} ">
              <a class="nav-link" href="{{ route('page.fullscreen_maps') }}">
                <span class="sidebar-mini"> FSM </span>
                <span class="sidebar-normal"> {{ __('Full Screen Map') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'vector_maps' ? ' active' : '' }} ">
              <a class="nav-link" href="{{ route('page.vector_maps') }}">
                <span class="sidebar-mini"> VM </span>
                <span class="sidebar-normal"> {{ __('Vector Map') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item{{ $activePage == 'widgets' ? ' active' : '' }} ">
        <a class="nav-link" href="{{ route('page.widgets') }}">
          <i class="material-icons">widgets</i>
          <p> Widgets </p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'charts' ? ' active' : '' }} ">
        <a class="nav-link" href="{{ route('page.charts') }}">
          <i class="material-icons">timeline</i>
          <p> Charts </p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'calendar' ? ' active' : '' }} ">
        <a class="nav-link" href="{{ route('page.calendar') }}">
          <i class="material-icons">date_range</i>
          <p> Calendar </p>
        </a>
      </li>
    </ul>
  </div>
</div>
