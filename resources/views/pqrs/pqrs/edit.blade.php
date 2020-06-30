@extends('layouts.app', ['activePage' => 'pqrs-reply', 'menuParent' => 'pqrs', 'titlePage' => __('Solicitudes PQRS')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('pqrs.update', $pqr) }}" autocomplete="off" class="form-horizontal">
                        @csrf
                        @method('put')

                        <div class="card ">
                            <div class="card-header card-header-rose card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">recent_actors</i>
                                </div>
                                <h4 class="card-title">{{ __('Responder PQRS') }}</h4>
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <a href="{{ route('pqrs.reply') }}" class="btn btn-sm btn-rose">{{ __('Volver a la lista') }}</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Descripción') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                            <textarea cols="30" rows="10" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" id="input-description" type="text" placeholder="{{ __('Descripción') }}" required="true" aria-required="true">{{ old('description', $pqr->description) }}</textarea>

                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Respuesta') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                            <textarea cols="30" rows="10" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="reply" id="input-description" type="text" placeholder="{{ __('Descripción') }}" required="true" aria-required="true">{{ old('description', $pqr->description) }}</textarea>
                                            @include('alerts.feedback', ['field' => 'description'])
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
