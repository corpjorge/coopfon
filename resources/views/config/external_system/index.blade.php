@extends('layouts.app', ['activePage' => 'external-system-management', 'menuParent' => 'config', 'titlePage' => __('Administrador de Sistemas externos')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-rose card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">mediation</i>
                            </div>
                            <h4 class="card-title">{{ __('Sistemas externos') }}</h4>
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
                                        <th class="text-right">
                                            {{ __('Editar') }}
                                        </th>
                                        <th class="text-right">
                                            {{ __('Acción') }}
                                        </th>
                                    </thead>
                                    <tbody>
                                    @foreach($systems as $systems)
                                        <tr>
                                            <td>
                                                {{ $systems->id }}
                                            </td>
                                            <td>
                                                {{ $systems->name }}
                                            </td>
                                            <td>
                                                {{ $systems->path }}
                                            </td>
                                            <td>
                                                {{ $systems->description }}
                                            </td>
                                            <td class="td-actions text-right">
                                                @can('manageModules', App\Model\Config\Module::class)
                                                    <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('external-system.edit', $systems) }}" data-original-title="" title="">
                                                        <i class="material-icons">edit</i>
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                @endcan
                                            </td>
                                            <form action="{{ route('external-system.status', $systems) }}" method="post" >
                                                @csrf
                                                @method('put')
                                                <td class="td-actions text-right">
                                                    <div class="togglebutton">
                                                        <label>
                                                            <input class="status" type="checkbox" name="state_id" value="1" {{ old('show_on_homepage', $systems->state_id) == 1 ? ' checked' : '' }}>
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
