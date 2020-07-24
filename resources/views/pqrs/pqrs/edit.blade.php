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
                                    <i class="material-icons">support_agent</i>
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
                                    <label class="col-sm-2 col-form-label">{{ __('Adjunto') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            @if($pqr->file)
                                            <a href="{{ route('pqrs.file', $pqr) }}" target="_blank" >
                                               <i class="material-icons">insert_drive_file</i> Descargar
                                            </a>
                                            @else
                                                Sin adjunto
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Descripción') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <textarea cols="30" rows="10" class="form-control" readonly>{{ $pqr->description}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Respuesta') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('reply') ? ' has-danger' : '' }}">
                                            <textarea cols="30" rows="10" class="form-control{{ $errors->has('reply') ? ' is-invalid' : '' }}" name="reply" id="input-reply" type="text" placeholder="{{ __('Respuesta') }}" required="true" aria-required="true">{{ old('description') }}</textarea>
                                            @include('alerts.feedback', ['field' => 'reply'])
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-rose">{{ __('Responder y cerrar') }}</button>
                            </div>
                        </div>
                    </form>

                    <form method="post" action="{{ route('pqrs.move', $pqr) }}" autocomplete="off" class="form-horizontal">
                        @csrf
                        @method('put')

                        <div class="card ">
                            <div class="card-header card-header-rose card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">person_add</i>
                                </div>
                                <h4 class="card-title">{{ __('Trasladar PQRS') }}</h4>
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <label class="col-sm-2 col-form-label" for="input-current-admin_id">{{ __('Genero') }}</label>
                                    <div class="col-lg-5 col-md-6 col-sm-3">
                                        <select class="selectpicker form-control{{ $errors->has('admin_id') ? ' is-invalid' : '' }}" data-size="7" data-style="btn btn-primary btn-round" id="input-current-admin_id" title="Seleccionar administrador" name="admin_id" >
                                            <option></option>
                                            @foreach($users as $user)
                                                <option value="{{$user->id}}" {{ old('admin_id') == $user->id ? 'selected' : '' }}>{{$user->name}}</option>
                                            @endforeach
                                        </select>
                                        @include('alerts.feedback', ['field' => 'gender_id'])
                                    </div>
                                </div><br>
                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-rose">{{ __('Trasladar') }}</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
