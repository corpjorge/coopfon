@extends('layouts.app', ['activePage' => 'pqrs-reply', 'menuParent' => 'pqrs', 'titlePage' => __('Solicitudes PQRS')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-rose card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">support_agent</i>
                            </div>
                            <h4 class="card-title">{{ __('PQRS') }}</h4>
                        </div>
                        <div class="card-body">
                                <div class="row">
                                    <div class="col-12 text-right">
                                        <a href="{{ route('pqrs.close') }}" class="btn btn-sm btn-success">{{ __('PQRS Cerrados') }}</a>
                                    </div>
                                </div>
                            <div class="table-responsive">
                                <table id="datatables" class="table table-striped table-no-bordered table-hover" style="display:none">
                                    <thead class="text-primary">
                                    <th>
                                        {{ __('ID') }}
                                    </th>
                                    <th>
                                        {{ __('Documento') }}
                                    </th>
                                    <th>
                                        {{ __('Nombre') }}
                                    </th>
                                    <th>
                                        {{ __('Fecha de creación') }}
                                    </th>
                                    <th>
                                        {{ __('Gestor') }}
                                    </th>
                                    <th>
                                        {{ __('Estado') }}
                                    </th>
                                    <th class="text-right">
                                        {{ __('Acción') }}
                                    </th>
                                    </thead>
                                    <tbody>
                                    @foreach($pqrs as $pqr)
                                        <tr>
                                            <td>
                                                {{ $pqr->id }}
                                            </td>
                                            <td>
                                                {{ $pqr->user->document }}
                                            </td>
                                            <td>
                                                {{ $pqr->user->name }}
                                            </td>
                                            <td>
                                                {{ $pqr->created_at->format('Y-m-d') }} / {{ $pqr->created_at->diffForHumans(Carbon\Carbon::now()) }}
                                            </td>
                                            <td>
                                                {{$pqr->admin->name ?? ''}}
                                            </td>
                                            <td>
                                                @if($pqr->state == "En curso")
                                                    @if($pqr->created_at->diffInDays(Carbon\Carbon::now()) <= $limit_date)
                                                        <span class="badge badge-{{ $pqr->state == "Cerrado" ? 'danger' : 'warning' }}">
                                                            {{ $pqr->state }}
                                                        </span>
                                                    @else
                                                        <span class="badge badge-{{ $pqr->state == "Cerrado" ? 'warning' : 'danger' }}">
                                                        {{ $pqr->state }}
                                                        </span>
                                                    @endif
                                                @else
                                                <span class="badge badge-success">
                                                    {{ $pqr->state }}
                                                </span>
                                                @endif
                                            </td>
                                            <td class="td-actions text-right">
                                                <button class="btn btn-primary" data-toggle="modal" data-target="#pqrsModal-{{$pqr->id}}">
                                                    <i class="material-icons">description</i>
                                                    <div class="ripple-container"></div>
                                                </button>
                                               @can('update', $pqr)
                                                <button type="button" rel="tooltip" class="btn btn-success" onclick="confirm('{{ "¿Desea entender la solicitud de ".$pqr->user->name."?" }}') ? location.href='{{ route("pqrs.edit", $pqr)}}' : ''">
                                                    <i class="material-icons">reply</i>
                                                </button>
                                               @endcan
                                            </td>

                                            <div class="modal fade bd-example-modal-lg" id="pqrsModal-{{$pqr->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Descripción</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                                <i class="material-icons">clear</i>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>{{ $pqr->description }}</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Cerrar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

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
                    searchPlaceholder: "Buscar PQRS",
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
                "order": [[ 0, "desc" ]],

            });
        });
    </script>
@endpush
