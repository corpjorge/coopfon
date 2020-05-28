@extends('layouts.app', ['activePage' => 'profile', 'menuParent' => 'config', 'titlePage' => __('Perfil')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header card-header-icon card-header-rose">
            <div class="card-icon">
              <i class="material-icons">perm_identity</i>
            </div>
            <h4 class="card-title">{{ __('Editar perfil') }}
            </h4>
          </div>
          <div class="card-body">
            <form method="post" enctype="multipart/form-data" action="{{ route('profile.update') }}" autocomplete="off" class="form-horizontal">
              @csrf
              @method('put')

              <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Foto de perfil') }}</label>
                <div class="col-sm-7">
                  <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                    <div class="fileinput-new thumbnail img-circle">
                      @if (auth()->user()->picture)
                        <img src="{{ auth()->user()->profilePicture() }}" alt="...">
                      @else
                        <img src="{{ asset('coopfon') }}/img/placeholder.jpg" alt="...">
                      @endif
                    </div>
                    <div class="fileinput-preview fileinput-exists thumbnail img-circle"></div>
                    <div>
                      <span class="btn btn-rose btn-file">
                        <span class="fileinput-new">{{ __('Seleccionar imagen') }}</span>
                        <span class="fileinput-exists">{{ __('Cambiar') }}</span>
                        <input type="file" name="photo" id = "input-picture" />
                      </span>
                        <a href="#pablo" class="btn btn-danger fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> {{ __('Remover') }}</a>
                    </div>
                    @include('alerts.feedback', ['field' => 'photo'])
                  </div>
                </div>
              </div>
              <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Nombre') }}</label>
                <div class="col-sm-7">
                  <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                    <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Nombre') }}" value="{{ old('name', auth()->user()->name) }}" required="true" aria-required="true"/>
                    @include('alerts.feedback', ['field' => 'name'])
                  </div>
                </div>
              </div>
              <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Correo') }}</label>
                <div class="col-sm-7">
                  <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                    <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="email" placeholder="{{ __('Correo') }}" value="{{ old('email', auth()->user()->email) }}" required />
                    @include('alerts.feedback', ['field' => 'email'])
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-rose pull-right">{{ __('Actualizar perfil') }}</button>
              <div class="clearfix"></div>
            </form>
          </div>
        </div>

        <div class="card">
          <div class="card-header card-header-icon card-header-rose">
            <div class="card-icon">
              <i class="material-icons">lock</i>
            </div>
            <h4 class="card-title">{{ __('Cambia la contraseña') }}</h4>
          </div>
          <div class="card-body">
            <form method="post" action="{{ route('profile.password') }}" class="form-horizontal">
              @csrf
              @method('put')

              <div class="row">
                <label class="col-sm-2 col-form-label" for="input-current-password">{{ __('Contraseña actual') }}</label>
                <div class="col-sm-7">
                  <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                    <input class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }}" input type="password" name="old_password" id="input-current-password" placeholder="{{ __('Contraseña actual') }}" value="" required />
                    @include('alerts.feedback', ['field' => 'old_password'])
                  </div>
                </div>
              </div>
              <div class="row">
                <label class="col-sm-2 col-form-label" for="input-password">{{ __('Nueva contraseña') }}</label>
                <div class="col-sm-7">
                  <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                    <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="input-password" type="password" placeholder="{{ __('Nueva contraseña') }}" value="" required />
                    @include('alerts.feedback', ['field' => 'password'])
                  </div>
                </div>
              </div>
              <div class="row">
                <label class="col-sm-2 col-form-label" for="input-password-confirmation">{{ __('Confirmar nueva contraseña') }}</label>
                <div class="col-sm-7">
                  <div class="form-group">
                    <input class="form-control" name="password_confirmation" id="input-password-confirmation" type="password" placeholder="{{ __('Confirmar nueva contraseña') }}" value="" required />
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-rose pull-right">{{ __('Cambiar contraseña') }}</button>
              <div class="clearfix"></div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card card-profile">
          <div class="card-avatar">
            <a href="">
              <img class="img" src="{{ auth()->user()->profilePicture() }}" />
            </a>
          </div>
          <div class="card-body">
            <h4 class="card-title">{{ auth()->user()->name }}</h4>
          </div>
        </div>

          <div class="card">
              <div class="card-header card-header-icon card-header-rose">
                  <div class="card-icon">
                      <i class="material-icons">contacts</i>
                  </div>
                  <h4 class="card-title">{{ __('Cambia la contraseña') }}</h4>
              </div>
              <div class="card-body">
                  <form method="post" action="{{ route('profile.data') }}" class="form-horizontal">
                      @csrf
                      @method('put')

                      <div class="row">
                          <label class="col-sm-2 col-form-label" for="input-current-password">{{ __('Contraseña actual') }}</label>
                          <div class="col-sm-7">
                              <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                                  <input class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }}" input type="password" name="old_password" id="input-current-password" placeholder="{{ __('Contraseña actual') }}" value="" required />
                                  @include('alerts.feedback', ['field' => 'old_password'])
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <label class="col-sm-2 col-form-label" for="input-password">{{ __('Nueva contraseña') }}</label>
                          <div class="col-sm-7">
                              <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                  <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="input-password" type="password" placeholder="{{ __('Nueva contraseña') }}" value="" required />
                                  @include('alerts.feedback', ['field' => 'password'])
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <label class="col-sm-2 col-form-label" for="input-password-confirmation">{{ __('Confirmar nueva contraseña') }}</label>
                          <div class="col-sm-7">
                              <div class="form-group">
                                  <input class="form-control" name="password_confirmation" id="input-password-confirmation" type="password" placeholder="{{ __('Confirmar nueva contraseña') }}" value="" required />
                              </div>
                          </div>
                      </div>
                      <button type="submit" class="btn btn-rose pull-right">{{ __('Cambiar contraseña') }}</button>
                      <div class="clearfix"></div>
                  </form>
              </div>
          </div>

      </div>
    </div>
  </div>
</div>
@endsection
