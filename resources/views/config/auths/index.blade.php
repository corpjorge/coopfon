@extends('layouts.app', ['activePage' => 'auths-management', 'menuParent' => 'config', 'titlePage' => __('Administrador de Autenticaciones')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-rose card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">admin_panel_settings</i>
                            </div>
                            <h4 class="card-title">{{ __('Autenticaciones') }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="datatables" class="table table-striped table-no-bordered table-hover" style="display:none">
                                    <thead class="text-primary">
                                        <th>
                                            {{ __('ID') }}
                                        </th>
                                        <th>
                                            {{ __('Nombre') }}
                                        </th>
                                        <th>
                                            {{ __('Path') }}
                                        </th>
                                        <th>
                                            {{ __('Descripción') }}
                                        </th>
                                        <th>
                                            {{ __('Versión') }}
                                        </th>
                                        <th class="text-right">
                                            {{ __('Editar') }}
                                        </th>
                                        <th class="text-right">
                                            {{ __('Acción') }}
                                        </th>
                                    </thead>
                                    <tbody>
                                    @foreach($auths as $auth)
                                        <tr>
                                            <td>
                                                {{ $auth->id }}
                                            </td>
                                            <td>
                                                {{ $auth->name }}
                                            </td>
                                            <td>
                                                {{ $auth->path }}
                                            </td>
                                            <td>
                                                {{ $auth->description }}
                                            </td>
                                            <td>
                                                {{ $auth->version }}
                                            </td>
                                            <td class="td-actions text-right">
                                                @can('manageModules', App\Model\Config\Module::class)
                                                    <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('auths.edit', $auth) }}" data-original-title="" title="">
                                                        <i class="material-icons">edit</i>
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                @endcan
                                            </td>
                                            <form action="{{ route('auths.status', $auth) }}" method="post" >
                                                @csrf
                                                @method('put')
                                                <td class="td-actions text-right">
                                                    <div class="togglebutton">
                                                        <label>
                                                            <input class="status" type="checkbox" name="state_id" value="1" {{ old('show_on_homepage', $auth->state_id) == 1 ? ' checked' : '' }}>
                                                            <span class="toggle"></span>
                                                        </label>
                                                    </div>
                                                </td>
                                            </form>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-rose card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">upgrade</i>
                            </div>
                            <h4 class="card-title">{{ __('Autenticaciones disponibles') }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="datatables2" class="table table-striped table-no-bordered table-hover" style="display:none">
                                    <thead class="text-primary">
                                    <th>
                                        {{ __('Nombre') }}
                                    </th>
                                    <th>
                                        {{ __('Path') }}
                                    </th>
                                    <th>
                                        {{ __('Versión') }}
                                    </th>
                                    <th>
                                        {{ __('Descripción') }}
                                    </th>
                                    <th>
                                        {{ __('Parámetros') }}
                                    </th>
                                    <th class="text-right">
                                        {{ __('Acción') }}
                                    </th>
                                    </thead>
                                    <tbody>
                                    @foreach($available as $provide)
                                        @foreach($authenticators as $authenticator)
                                            @if($authenticator['path'] == $provide)
                                            <tr>
                                                <td>
                                                   {{$authenticator['name']}}
                                                </td>
                                                <td>
                                                    {{$authenticator['path']}}
                                                </td>
                                                <td>
                                                    {{$authenticator['version']}}
                                                </td>
                                                <td>
                                                    {{$authenticator['description']}}
                                                </td>
                                                <td>
                                                    {{$authenticator['parameters']}}
                                                </td>
                                                <td class="td-actions text-right">
                                                    @if($authenticator['action'] == 1)
                                                        <form action="{{ route('auths.store') }}" method="post" >
                                                        @csrf
                                                            <input type="hidden" name="name" value="{{$authenticator['name']}}" >
                                                            <input type="hidden" name="path" value="{{$authenticator['path']}}" >
                                                            <input type="hidden" name="description" value="{{$authenticator['description']}}" >
                                                            <input type="hidden" name="parameters" value="{{$authenticator['parameters']}}" >
                                                            <input type="hidden" name="version" value="{{$authenticator['version']}}" >
                                                            <input type="hidden" name="icon" value="{{$authenticator['icon']}}" >
                                                            <button type="submit" class="btn btn-warning btn-sm">
                                                                <i class="material-icons">upgrade</i> Cargar
                                                                <div class="ripple-container"></div>
                                                            </button>
                                                        </form>
                                                    @else
                                                        <button class="btn btn-info btn-sm" disabled>
                                                            <i class="material-icons">upgrade</i> No disponible
                                                            <div class="ripple-container"></div>
                                                        </button>
                                                    @endif
                                                </td>

                                            </tr>
                                            @break
                                            @endif
                                        @endforeach
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('#datatables').fadeIn(1100);
            $('#datatables').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Buscar roles",
                    paginate: {
                        first:      "Primero",
                        last:       "Último",
                        next:       "Siguiente",
                        previous:   "Anterior"
                    },
                    info: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    infoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
                    lengthMenu: "Mostrar _MENU_ registros",
                    emptyTable: "Ningún dato disponible en esta tabla",
                },
                "columnDefs": [
                    { "orderable": false, "targets": 4 },
                ],
            });

            $('#datatables2').fadeIn(1100);
            $('#datatables2').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Buscar roles",
                    paginate: {
                        first:      "Primero",
                        last:       "Último",
                        next:       "Siguiente",
                        previous:   "Anterior"
                    },
                    info: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    infoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
                    lengthMenu: "Mostrar _MENU_ registros",
                    emptyTable: "Ningún dato disponible en esta tabla",
                },
                "columnDefs": [
                    { "orderable": false, "targets": 4 },
                ],
            });

        });
    </script>

    <script>

        $(document).ready(function(){
            $(".status").on("change", function(event){
                this.form.submit();
            });
        });

    </script>
@endpush
