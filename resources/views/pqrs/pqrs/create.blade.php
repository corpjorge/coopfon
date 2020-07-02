@extends('layouts.app', ['activePage' => 'pqrs-filings', 'menuParent' => 'pqrs', 'titlePage' => __('Solicitudes PQRS')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('pqrs.store') }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        @method('post')

                        <div class="card ">
                            <div class="card-header card-header-rose card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">support_agent</i>
                                </div>
                                <h4 class="card-title">{{ __('Radicar PQRS') }}</h4>
                            </div>
                            <div class="card-body ">
                                <h5 class="card-category col-md-12 text-center" style="color: #6f6f6f;">
                                    Describa petición, queja, reclamo, etc. Puede adjuntar un archivo con los siguientes formatos: <br>
                                    Imagen (jpg,jpeg,gif,png), Texto (xls,xlsx,doc,docx,pdf), Compresión de archivos (zip, rar).
                                </h5>
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <a href="{{ route('pqrs.index') }}" class="btn btn-sm btn-rose">{{ __('Volver a la lista') }}</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Descripción') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                            <textarea cols="30" rows="10" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" id="input-description" type="text" placeholder="{{ __('Por favor ingrese el detalle del PQR') }}" required="true" aria-required="true">{{ old('description') }}</textarea>
                                            @include('alerts.feedback', ['field' => 'description'])
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Adjunto') }}</label>
                                    <div class="col-sm-7">

                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                              <span class="btn btn-outline-secondary btn-file ">
                                                <span class="fileinput-new">Archivo</span>
                                                <span class="fileinput-exists">Cambiar</span>
                                                <input type="file" class="form-control{{ $errors->has('doc') ? ' is-invalid' : '' }}" name="doc" id="input-doc" value="{{ old('doc') }}" placeholder="{{ __('Adjunto') }}">
                                              </span>
                                                <span class="fileinput-filename"></span>
                                                <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">&times;</a>
                                            </div>
                                            @include('alerts.feedback', ['field' => 'doc'])

                                    </div>
                                </div>

                                <div class="modal fade bd-example-modal-lg" id="termsModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Términos y condiciones</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                    <i class="material-icons">clear</i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>{{ $terms }}</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-rose">{{ __('Aceptar y radicar') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <a class="btn btn-rose" data-toggle="modal" data-target="#termsModal" style="color: #ffffff">{{ __('Guardar') }}</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
