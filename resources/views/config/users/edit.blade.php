@extends('layouts.app', ['activePage' => 'user-management', 'menuParent' => 'config', 'titlePage' => __('Gestión de usuarios')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" enctype="multipart/form-data" action="{{ route('user.update', $user) }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('put')

            <div class="card ">
              <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">person</i>
                </div>
                <h4 class="card-title">{{ __('Editar usuario') }}</h4>
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('user.index') }}" class="btn btn-sm btn-rose">{{ __('Volver a la lista') }}</a>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Foto de perfil') }}</label>
                  <div class="col-sm-7">
                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                      <div class="fileinput-new thumbnail img-circle">
                        @if ($user->picture)
                          <img src="{{ $user->profilePicture() }}" alt="...">
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
                          <a href="#pablo" class="btn btn-danger fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> {{ __('Quitar') }}</a>
                      </div>
                      @include('alerts.feedback', ['field' => 'photo'])
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Nombre') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Nombre') }}" value="{{ old('name', $user->name) }}" required="true" aria-required="true"/>
                      @include('alerts.feedback', ['field' => 'name'])
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Email') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="email" placeholder="{{ __('Email') }}" value="{{ old('email', $user->email) }}" required />
                      @include('alerts.feedback', ['field' => 'email'])
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-password">{{ __(' Contraseña') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" input type="password" name="password" id="input-password" placeholder="{{ __('Contraseña') }}" />
                      @include('alerts.feedback', ['field' => 'password'])
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-password-confirmation">{{ __('Confirmar contraseña') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="password_confirmation" id="input-password-confirmation" type="password" placeholder="{{ __('Confirmar contraseña') }}" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-rose">{{ __('Guardar') }}</button>
              </div>
            </div>
          </form>

            <form method="post" action="{{ route('users.data', $user) }}" class="form-horizontal" >
                @csrf
                @method('put')
            <div class="card">
                <div class="card-header card-header-icon card-header-rose">
                    <div class="card-icon">
                        <i class="material-icons">contacts</i>
                    </div>
                    <h4 class="card-title">{{ __('Datos personales') }}</h4>
                </div>

                <div class="card-body">
                    <div class="row">
                        <label class="col-sm-2 col-form-label" for="input-current-password">{{ __('Tipo de documento') }}</label>
                        <div class="col-lg-5 col-md-6 col-sm-3">
                            <select class="selectpicker form-control{{ $errors->has('document_type_id') ? ' is-invalid' : '' }}" data-size="7" data-style="btn btn-primary btn-round" id="input-current-document_type_id" title="Tipo de documento" name="document_type_id" required>
                                <option selected value="{{ old('document_type_id', isset($user->documentType->id) ?  $user->documentType->id : '' ) }}">{{ old('document_type_id', isset($user->documentType->type) ?  $user->documentType->type : '' )  }}</option>
                                @foreach($documentTypes as $documentType)
                                    <option value="{{$documentType->id}}">{{$documentType->type}}</option>
                                @endforeach

                            </select>
                            @include('alerts.feedback', ['field' => 'document_type_id'])
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-2 col-form-label" for="input-current-password">{{ __('Documento') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group{{ $errors->has('document') ? ' has-danger' : '' }}">
                                <input class="form-control{{ $errors->has('document') ? ' is-invalid' : '' }}"  type="number" name="document" id="input-current-document" placeholder="{{ __('Documento') }}" value="{{ old('document', $user->document) }}" required />
                                @include('alerts.feedback', ['field' => 'document'])
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-2 col-form-label" for="input-current-password">{{ __('Celular') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }}">
                                <input class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"  type="tel" name="phone" id="input-current-phone" placeholder="{{ __('Celular') }}" value="{{ old('phone', $user->phone) }}"  />
                                @include('alerts.feedback', ['field' => 'phone'])
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-2 col-form-label" for="input-current-password">{{ __('Código') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group{{ $errors->has('code') ? ' has-danger' : '' }}">
                                <input class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}"  type="text" name="code" id="input-current-code" placeholder="{{ __('Código') }}" value="{{ old('code', $user->code) }}"  />
                                @include('alerts.feedback', ['field' => 'code'])
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-2 col-form-label" for="input-current-password">{{ __('Genero') }}</label>
                        <div class="col-lg-5 col-md-6 col-sm-3">
                            <select class="selectpicker form-control{{ $errors->has('gender_id') ? ' is-invalid' : '' }}" data-size="7" data-style="btn btn-primary btn-round" id="input-current-gender" title="Genero" name="gender_id" >
                                <option selected value="{{ old('gender_id', isset($user->gender->id) ?  $user->gender->id : '' ) }}">{{ old('gender_id', isset($user->gender->type) ?  $user->gender->type : '' ) }}</option>
                                @foreach($genders as $gender)
                                    <option value="{{$gender->id}}">{{$gender->type}}</option>
                                @endforeach
                            </select>
                            @include('alerts.feedback', ['field' => 'gender'])
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-2 col-form-label" for="input-current-password">{{ __('Dirección') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group{{ $errors->has('address') ? ' has-danger' : '' }}">
                                <input class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}"  type="text" name="address" id="input-current-address" placeholder="{{ __('Dirección') }}" value="{{ old('address', $user->address) }}"  />
                                @include('alerts.feedback', ['field' => 'address'])
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-2 col-form-label" for="input-current-password">{{ __('Area/Zona') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group{{ $errors->has('area') ? ' has-danger' : '' }}">
                                <input class="form-control{{ $errors->has('area') ? ' is-invalid' : '' }}"  type="text" name="area" id="input-current-area" placeholder="{{ __('Area') }}" value="{{ old('area', $user->area) }}"  />
                                @include('alerts.feedback', ['field' => 'area'])
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-2 col-form-label" for="input-current-password">{{ __('Fecha nacimiento') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group{{ $errors->has('birth_date') ? ' has-danger' : '' }}">
                                <input type="text"  name="birth_date" id="input-current-birth_date" placeholder="{{ __('Fecha nacimiento') }}" class="form-control{{ $errors->has('birth_date') ? ' is-invalid' : '' }} datepicker"
                                       value="{{ old('birth_date', \Carbon\Carbon::parse($user->birth_date)->format('d-m-Y')) }}" />
                                @include('alerts.feedback', ['field' => 'birth_date'])
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-2 col-form-label" for="input-current-password">{{ __('Ciudad') }}</label>
                        <div class="col-lg-5 col-md-6 col-sm-3">
                            <select class="selectpicker form-control{{ $errors->has('city_id') ? ' is-invalid' : '' }}" data-size="7" data-style="btn btn-primary btn-round" id="input-current-city_id" title="Ciudad" name="city_id" >
                                <option selected value="{{ old('city_id', isset($user->city->code) ?  $user->city->code : '' ) }}">{{ old('city_id', isset($user->city->name) ?  $user->city->name.' / '.$user->city->department->name : '' ) }}</option>
                                @foreach($cities as $city)
                                    <option value="{{$city->code}}">{{$city->name}} / {{$city->department->name}}</option>
                                @endforeach
                            </select>
                            @include('alerts.feedback', ['field' => 'city_id'])
                        </div>
                    </div>
                </div>
                    <div class="card-footer ml-auto mr-auto">
                        <button type="submit" class="btn btn-rose">{{ __('Guardar') }}</button>
                    </div>
                    <div class="clearfix"></div>
            </div>
            </form>
        </div>
      </div>
    </div>
  </div>
@endsection
