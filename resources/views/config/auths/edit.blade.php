@extends('layouts.app', ['activePage' => 'auths-management', 'menuParent' => 'config', 'titlePage' => __('Administrador de Autenticaciones')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('auths.update', $auth) }}" autocomplete="off" class="form-horizontal">
                        @csrf
                        @method('put')

                        <div class="card ">
                            <div class="card-header card-header-rose card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">admin_panel_settings</i>
                                </div>
                                <h4 class="card-title">{{ __('Editar Autenticación') }}</h4>
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <a href="{{ route('auths.index') }}" class="btn btn-sm btn-rose">{{ __('Volver a la lista') }}</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Nombre') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Nombre') }}" value="{{ old('name', $auth->name) }}" required="true" aria-required="true"/>
                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Descripción') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" id="input-description" type="text" placeholder="{{ __('Descripción') }}" value="{{ old('description', $auth->description) }}" required="true" aria-required="true"/>
                                            @include('alerts.feedback', ['field' => 'description'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Icono') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('icon') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('icon') ? ' is-invalid' : '' }}" name="icon" id="input-icon" type="text" placeholder="{{ __('Icono') }}" value="{{ old('icon', $auth->icon) }}" required="true" aria-required="true"/>
                                            @include('alerts.feedback', ['field' => 'icon'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Parámetros') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('parameters') ? ' has-danger' : '' }}">
                                            <textarea cols="30" rows="10" class="form-control{{ $errors->has('parameters') ? ' is-invalid' : '' }}" name="parameters" id="input-parameters" type="text" placeholder="{{ __('{ "ip": "192.175.12.5", "protocolo" : "http", "puerto" : "80", "entidad": "LUNA"}') }}" required="true" aria-required="true">{{ old('parameters', json_encode($auth->parameters)) }}</textarea>
                                            @include('alerts.feedback', ['field' => 'parameters'])
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-rose">{{ __('Guardar') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
