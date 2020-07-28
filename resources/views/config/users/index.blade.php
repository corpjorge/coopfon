@extends('layouts.app', ['activePage' => 'user-management', 'menuParent' => 'config', 'titlePage' => __('Gestión de asociados')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">group</i>
                </div>
                <h4 class="card-title">{{ __('Asociados') }}</h4>
              </div>
              <div class="card-body">
                @can('create', App\User::class)
                  <div class="row">
                        <div id="search" class="col-4 text-left">
                            <search-component></search-component>
                        </div>
                        <div class="col-8 text-right">
                            <a href="{{ route('user.create') }}" class="btn btn-sm btn-rose">{{ __('Agregar asociado') }}</a>
                            <a href="{{ route('users.create') }}" class="btn btn-sm btn-success">{{ __('Cargar Excel') }}</a>
                            <a href="{{ route('users.index') }}" class="btn btn-sm btn-danger">{{ __('Restaurar asociado') }}</a>
                        </div>
                  </div>
                @endcan
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>{{ __('Nombre') }}</th>
                            <th>{{ __('Email') }}</th>
                            <th class="text-right">{{ __('Documento') }}</th>
                            @can('manage-users', App\User::class)
                                <th class="text-right">{{ __('Acción') }}</th>
                            @endcan
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td class="text-center">{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td class="text-right">{{ $user->document }}</td>
                                @can('manage-users', App\User::class)
                                    @if (auth()->user()->can('update', $user) || auth()->user()->can('delete', $user))
                                        <td class="td-actions text-right">
                                            @if ($user->id != auth()->id())
                                                <form action="{{ route('user.destroy', $user) }}" method="post">
                                                    @csrf
                                                    @method('delete')

                                                    @can('update', $user)
                                                        <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('user.edit', $user) }}" data-original-title="" title="">
                                                            <i class="material-icons">edit</i>
                                                            <div class="ripple-container"></div>
                                                        </a>
                                                    @endcan
                                                    @can('delete', $user)
                                                        <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("¿Estás seguro de que deseas eliminar a este asociado?") }}') ? this.parentElement.submit() : ''">
                                                            <i class="material-icons">close</i>
                                                            <div class="ripple-container"></div>
                                                        </button>
                                                    @endcan
                                                </form>
                                            @else
                                                @can('update', $user)
                                                    <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('profile.edit') }}" data-original-title="" title="">
                                                        <i class="material-icons">edit</i>
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                @endcan
                                            @endif
                                        </td>
                                    @endif
                                @endcan
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $users->links() }}
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
    <script src="{{asset('coopfon/js/search.js')}}"></script>
@endpush

