@extends('layouts.app', ['activePage' => 'module', 'menuParent' => 'config', 'titlePage' => __('Administrador de modulos')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">view_module</i>
                </div>
                <h4 class="card-title">{{ __('Modulos') }}</h4>
              </div>
              <div class="card-body">
                @can('create', App\Model\Config\Module::class)
                  <div class="row">
                    <div class="col-12 text-right">
                      <a href="{{ route('module.create') }}" class="btn btn-sm btn-rose">{{ __('Agregar Modulo') }}</a>
                    </div>
                  </div>
                @endcan
                <div class="table-responsive">

                    <table class="table">
                        <thead>
                        <tr>
                            <th>{{ __('Nombre') }}</th>
                            <th>{{ __('Configuración') }}</th>
                            <th>{{ __('Versión') }}</th>
                            @can('manageModules', App\Model\Config\Module::class)
                            <th class="text-right">
                                {{ __('Acción') }}
                            </th>
                            @endcan
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($modules as $module)
                        <tr>
                            <td>{{ $module->name }}</td>
                            <td>{{ $module->path }}</td>
                            <td>{{ $module->version }}</td>
                            @can('manageModules', App\Model\Config\Module::class)
                                <td class="td-actions text-right">
                                    @if($module->state_id == 1)
                                        @if(!$module->deleted_at)
                                            <form action="{{ route($module->path.'.upgrade', $module) }}" method="get" style="display: inline;">
                                                    <button type="button" class="btn btn-success btn-link" data-original-title="" title="" onclick="confirm('{{ __("¿Estás seguro de que deseas actualizar el módulo de ".$module->name."?") }}') ? this.parentElement.submit() : ''">
                                                        <i class="material-icons">system_update_alt</i>
                                                        <div class="ripple-container"></div> Actualizar
                                                    </button>
                                            </form>

                                            <form action="{{ route('module.destroy', $module) }}" method="post" style="display: inline;">
                                                @csrf
                                                @method('delete')
                                                @can('delete', $module)
                                                    <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("¿Estás seguro de que deseas desactivar el módulo de ".$module->name."?") }}') ? this.parentElement.submit() : ''">
                                                        <i class="material-icons">power_settings_new</i>
                                                        <div class="ripple-container"></div> Desactivar
                                                    </button>
                                                @endcan
                                            </form>

                                        @else
                                            <form action="{{ route('module.restore', $module) }}" method="post" style="display: inline;">
                                                @csrf
                                                @method('delete')
                                                @can('delete', $module)
                                                    <button type="button" class="btn btn-success btn-link" data-original-title="" title="" onclick="confirm('{{ __("¿Estás seguro de que deseas activar el módulo de ".$module->name."?") }}') ? this.parentElement.submit() : ''">
                                                        <i class="material-icons">power_settings_new</i>
                                                        <div class="ripple-container"></div> Activar
                                                    </button>
                                                @endcan
                                            </form>
                                        @endif
                                    @else
                                        <form action="{{ route($module->path.'.install', $module) }}" method="get" style="display: inline;">
                                            <button type="button" class="btn btn-info btn-link" data-original-title="" title="" onclick="confirm('{{ __("¿Estás seguro de que deseas instalar el módulo de ".$module->name."?") }}') ? this.parentElement.submit() : ''">
                                                <i class="material-icons">get_app</i>
                                                <div class="ripple-container"></div> Instalar
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            @endcan
                        </tr>
                        <tr>
                            <td>Boletacoop</td>
                            <td>ticket</td>
                            <td>3.0.0</td>
                            <td class="td-actions text-right">
                                <button type="button" class="btn btn-info btn-link" data-original-title="" title="" disabled>
                                    <i class="material-icons">get_app</i>
                                    <div class="ripple-container"></div> No disponible
                                </button>
                            </td>

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
