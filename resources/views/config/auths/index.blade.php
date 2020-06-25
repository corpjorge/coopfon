@extends('layouts.app', ['activePage' => 'auths-management', 'menuParent' => 'config', 'titlePage' => __('Administrador de Autenticaciones')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-rose card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">recent_actors</i>
                            </div>
                            <h4 class="card-title">{{ __('Autenticaciones') }}</h4>
                        </div>
                        <div class="card-body">
                            @can('manageModules', App\Model\Config\Module::class)
                                <div class="row">
                                    <div class="col-12 text-right">
                                        <a href="{{ route('auths.create') }}" class="btn btn-sm btn-rose">{{ __('Agregar Autenticación') }}</a>
                                    </div>
                                </div>
                            @endcan
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
                                            {{ __('Icono') }}
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
                                                {{ $auth->icon }}
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
