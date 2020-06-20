@extends('layouts.app', ['activePage' => 'module', 'menuParent' => 'config', 'titlePage' => __('Administrador de modulos')])

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
                <h4 class="card-title">{{ __('Modulos') }}</h4>
              </div>
              <div class="card-body">
                @can('create', App\Role::class)
                  <div class="row">
                    <div class="col-12 text-right">
                      <a href="{{ route('module.create') }}" class="btn btn-sm btn-rose">{{ __('Agregar Modulo') }}</a>
                    </div>
                  </div>
                @endcan
                <div class="table-responsive">
                  <table id="datatables" class="table table-striped table-no-bordered table-hover" style="display:none">
                    <thead class="text-primary">
                      <th>
                          {{ __('Nombre') }}
                      </th>
                      <th>
                        {{ __('Vista') }}
                      </th>
                      <th>
                        {{ __('Fecha de creación') }}
                      </th>
                      @can('manage-users', App\User::class)
                        <th class="text-right">
                          {{ __('Acción') }}
                        </th>
                      @endcan
                    </thead>
                    <tbody>
                      @foreach($modules as $module)
                        <tr>
                          <td>
                            {{ $module->name }}
                          </td>
                          <td>
                            {{ $module->view }}
                          </td>
                          <td>
                            {{ $module->created_at->format('Y-m-d') }}
                          </td>
                          @can('manageModules', App\Model\Config\Module::class)
                            <td class="td-actions text-right">
                                <form action="{{ route('module.destroy', $module) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    @can('delete', $module)
                                        <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("¿Estás seguro de que deseas eliminar a este administrador?") }}') ? this.parentElement.submit() : ''">
                                            <i class="material-icons">delete</i>
                                            <div class="ripple-container"></div>
                                        </button>
                                    @endcan
                                </form>
                                <form action="{{ route('module.restore', $module) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    @can('delete', $module)
                                        <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("¿Estás seguro de que deseas eliminar a este administrador?") }}') ? this.parentElement.submit() : ''">
                                            <i class="material-icons">close</i>
                                            <div class="ripple-container"></div>
                                        </button>
                                    @endcan
                                </form>
                            </td>
                          @endcan
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
          searchPlaceholder: "Buscar modulo",
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
        { "orderable": false, "targets": 3 },
      ],
    });
  });
</script>
@endpush
