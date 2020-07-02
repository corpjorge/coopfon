@extends('layouts.app_external', [
  'class' => 'off-canvas-sidebar',
  'classPage' => 'login-page',
  'activePage' => '',
  'title' => __('PQRS'),
  'pageBackground' => asset("coopfon").'/img/pqrs/pqrs.jpg'
])

@section('content')
    <div class="wrapper wrapper-full-page">
        <form method="post" action="{{ route('pqrs_external.store') }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data" style="margin-bottom: 0!important;">
            @csrf
            @method('post')
        <div class="page-header header-filter" filter-color="black" style="background-image: url('{{ asset("coopfon").'/img/pqrs/pqrs.jpg' }}'); background-size: cover; background-position: top center;align-items: center;">
            <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
            <div class="container">
                <div class="row">
                    <div class="col-md-8 ml-auto mr-auto text-center">
                        <h2 class="title" style="color:whitesmoke">El usuario en primer lugar</h2>
                        <h5 class="description" style="color: #ffffffc2">
                            Cuéntanos en que podemos ayudarte,haremos lo mejor posible para prestarte un mejor servicio cada día.
                        </h5>
                    </div>
                </div><br><br><br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card ">
                            <div class="card-header card-header-rose card-header-text">
                                <div class="card-text">
                                    <h4 class="card-title">Radicar PQRS</h4>
                                </div>
                            </div>
                            <div class="card-body ">
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                                    <input type="text" class="form-control{{ $errors->has('description') ? ' is-name' : '' }}" placeholder="Nombre completo" name="name" required>
                                                    @include('alerts.feedback', ['field' => 'name'])
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group{{ $errors->has('document') ? ' has-danger' : '' }}">
                                                    <input type="number" class="form-control{{ $errors->has('document') ? ' is-invalid' : '' }}" placeholder="Cedula" name="document" required>
                                                    @include('alerts.feedback', ['field' => 'document'])
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                                    <input type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Correo" name="email" required>
                                                    @include('alerts.feedback', ['field' => 'email'])
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }}">
                                                    <input type="tel" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" placeholder="Teléfono" name="phone" required>
                                                    @include('alerts.feedback', ['field' => 'phone'])
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                                    <textarea class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" id="input-description" cols="10" rows="4" type="text" placeholder="{{ __('Por favor ingrese el detalle del PQR') }}" required="true" aria-required="true">{{ old('description') }}</textarea>
                                                    @include('alerts.feedback', ['field' => 'description'])
                                                </div>
                                            </div>
                                            <div class="col-md-4">
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
                                        </div>
                                        <div class="card-footer ml-auto mr-auto">
                                            <a class="btn btn-rose" data-toggle="modal" data-target="#termsModal" style="color: #ffffff">{{ __('Enviar') }}</a>
                                        </div>
                                    </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade bd-example-modal-lg" id="termsModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="z-index: 99999999999;">
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
    </form>
    </div>
@endsection
