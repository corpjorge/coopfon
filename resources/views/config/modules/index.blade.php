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
                        @foreach($modulesAvailable as $availableModules)
                        @foreach($modules as $module)
                            @if($availableModules['path'] == $module->path)
                        <tr>
                            <td>{{ $module->name }}</td>
                            <td>{{ $module->path }}</td>
                            <td>{{ $module->version }}</td>
                            @can('manageModules', App\Model\Config\Module::class)
                                <td class="td-actions text-right">
                                    @if($module->state_id == 1)
                                        @if(!$module->deleted_at)
                                            @if($availableModules['version'] != $module->version)
                                            <form action="{{ route($module->path.'.upgrade', $module) }}" method="get" style="display: inline;">
                                                    <button type="button" class="btn btn-success btn-link" data-original-title="" title="" onclick="confirm('{{ __("¿Estás seguro de que deseas actualizar el módulo de ".$module->name."?") }}') ? this.parentElement.submit() : ''">
                                                        <i class="material-icons">system_update_alt</i>
                                                        <div class="ripple-container"></div> Actualizar
                                                    </button>
                                            </form>
                                            @endif

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
                            @endif
                        @endforeach
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
                      <h4 class="card-title">{{ __('Modulos disponibles') }}</h4>
                  </div>
                  <div class="card-body">
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
                              @foreach($available as $provide)
                                  @foreach($modulesAvailable as $availableModules)
                                      @if($availableModules['path'] == $provide)
                                  <tr>
                                      <td>{{$availableModules['name']}}</td>
                                      <td>{{$availableModules['path']}}</td>
                                      <td>{{$availableModules['version']}}</td>
                                      @can('manageModules', App\Model\Config\Module::class)
                                      <td class="td-actions text-right">
                                          @if($availableModules['action'] == 1)
                                          <form action="{{ route('module.store') }}" method="post" style="display: inline;">
                                              @csrf
                                              <input type="hidden" name="name" value="{{$availableModules['name']}}" >
                                              <input type="hidden" name="path" value="{{$availableModules['path']}}" >
                                              <input type="hidden" name="version" value="{{$availableModules['version']}}" >
                                                  <button type="button" class="btn btn-warning btn-link" data-original-title="" title="" onclick="confirm('{{ __("¿Estás seguro de que deseas cargar el módulo de ".$availableModules['name']."?") }}') ? this.parentElement.submit() : ''">
                                                      <i class="material-icons">upgrade</i>
                                                      <div class="ripple-container"></div> Cargar
                                                  </button>
                                          </form>
                                          @else
                                              <button class="btn btn-info btn-link" data-original-title="" disabled>
                                                  <i class="material-icons">get_app</i>
                                                  <div class="ripple-container"></div> No disponible
                                              </button>

                                          @endif
                                      </td>
                                      @endcan
                                  </tr>
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
