@extends('layouts.app', ['activePage' => 'module', 'menuParent' => 'config', 'titlePage' => __('Administrador de modulos')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('module.store') }}" autocomplete="off" class="form-horizontal">
                        @csrf
                        @method('post')

                        <div class="card ">
                            <div class="card-header card-header-rose card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">view_module</i>
                                </div>
                                <h4 class="card-title">{{ __('Añadir Modulo') }}</h4>
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <a href="{{ route('module.index') }}" class="btn btn-sm btn-rose">{{ __('Volver a la lista') }}</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Nombre') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Nombre') }}" value="{{ old('name') }}" required="true" aria-required="true"/>
                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Path') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('path') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('path') ? ' is-invalid' : '' }}" name="path" id="input-path" type="text" placeholder="{{ __('Path') }}" value="{{ old('path') }}" required="true" aria-required="true"/>
                                            @include('alerts.feedback', ['field' => 'path'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Versión') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('version') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('version') ? ' is-invalid' : '' }}" name="version" id="input-version" type="text" placeholder="{{ __('Versión') }}" value="{{ old('version') }}" required="true" aria-required="true"/>
                                            @include('alerts.feedback', ['field' => 'version'])
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

@push('js')
<script>
    $(document).ready(function () {
        @if (session('statusError'))
        $.notify({
            icon: "done",
            message: "{{ session('statusError') }}"
        }, {
            type: 'danger',
            timer: 3000,
            placement: {
                from: 'top',
                align: 'right'
            }
        });
        @endif
    });
</script>
@endpush
