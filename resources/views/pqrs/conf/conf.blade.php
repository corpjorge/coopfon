@extends('layouts.app', ['activePage' => 'pqrs-config', 'menuParent' => 'pqrs', 'titlePage' => __('Configuración PQRS')])

@section('content')
    <div class="content">
        <div class="container-fluid">

            <div class="col-md-3">

                    <div class="card ">
                        <div class="card-header card-header-rose card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">web</i>
                            </div>
                            <h5 class="card-title">{{ __('Formulario publico ') }}</h5>
                        </div>
                        <div class="card-body text-center">
                            <a class="text-center" href="{{ route('pqrs_external.create') }}"  target="_blank">
                                {{ route('pqrs_external.create') }}
                            </a>
                        </div>
                    </div>

            </div>

            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('pqrs_config.update', $config) }}" autocomplete="off" class="form-horizontal">
                        @csrf
                        @method('put')
                        <div class="card ">
                            <div class="card-header card-header-rose card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">miscellaneous_services</i>
                                </div>
                                <h4 class="card-title">{{ __('Configuración PQRS') }}</h4>
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Términos') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('terms') ? ' has-danger' : '' }}">
                                            <textarea cols="30" rows="10" class="form-control" name="terms" required="true" aria-required="true">{{ $config->terms}}</textarea>
                                            @include('alerts.feedback', ['field' => 'terms'])
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Días limites') }}</label>
                                    <div class="col-md-2">
                                        <div class="form-group{{ $errors->has('limit_date') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('limit_date') ? ' is-invalid' : '' }}" name="limit_date" id="input-limit_date" type="number" placeholder="{{ __('30') }}" value="{{ old('limit_date', $config->limit_date) }}" required="true" aria-required="true"/>
                                            @include('alerts.feedback', ['field' => 'limit_date'])
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-rose">{{ __('Aplicar') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
