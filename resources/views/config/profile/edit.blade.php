@extends('layouts.app', ['activePage' => 'profile', 'menuParent' => 'profile', 'titlePage' => __('Perfil')])

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
                        <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> {{ __('Remover') }}</a>
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
                    <input class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }}"  type="password" name="old_password" id="input-current-password" placeholder="{{ __('Contraseña actual') }}" value="" required />
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
            <a href="{{ auth()->user()->profilePicture() }}" target="_blank">
              <img class="img" src="{{ auth()->user()->profilePicture() }}" />
            </a>
          </div>
          <div class="card-body">
              <h4 class="card-title">{{auth()->user()->name}}</h4>
              <h6 class="card-category text-gray">
                  @if(auth()->user()->role_id == 9)
                    {{auth()->user()->memberGender()}}
                  @else
                    {{auth()->user()->role->name}}<br>
                    {{auth()->user()->memberGender()}}
                  @endif
              </h6>
              <p class="card-description">
                  {{auth()->user()->documentType->type ?? ''}} {{auth()->user()->document}}<br>
                  {{auth()->user()->code}}
              </p>
          </div>
        </div>

          <div class="card">
              <div class="card-header card-header-icon card-header-rose">
                  <div class="card-icon">
                      <i class="material-icons">contacts</i>
                  </div>
                  <h4 class="card-title">{{ __('Datos personales') }}</h4>
              </div>
              <div class="card-body">
                  <form method="post" action="{{ route('profile.data') }}" class="form-horizontal">
                      @csrf
                      @method('put')

                      <div class="row">
                          <label class="col-sm-2 col-form-label" for="input-current-phone">{{ __('Celular') }}</label>
                          <div class="col-sm-7">
                              <div class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }}">
                                  <input class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"  type="tel" name="phone" id="input-current-phone" placeholder="{{ __('Celular') }}" value="{{ old('phone', auth()->user()->phone) }}" required />
                                  @include('alerts.feedback', ['field' => 'phone'])
                              </div>
                          </div>
                      </div>

                      <div class="row">
                          <label class="col-sm-2 col-form-label" for="input-current-birth_date">{{ __('Fecha Nacimiento') }}</label>
                          <div class="col-sm-7">
                              <div class="form-group{{ $errors->has('birth_date') ? ' has-danger' : '' }}">
                                  <input type="text"  name="birth_date" id="input-current-birth_date" placeholder="{{ __('Fecha nacimiento') }}" class="form-control{{ $errors->has('birth_date') ? ' is-invalid' : '' }} datepicker"
                                         value="{{ old('birth_date', auth()->user()->birth_date ? \Carbon\Carbon::parse(auth()->user()->birth_date)->format('d-m-Y') : '' )}}" required/>
                                  @include('alerts.feedback', ['field' => 'birth_date'])
                              </div>
                          </div>
                      </div>

                      <div class="row">
                          <label class="col-sm-2 col-form-label" for="input-current-area">{{ __('Area/Zona') }}</label>
                          <div class="col-sm-7">
                              <div class="form-group{{ $errors->has('area') ? ' has-danger' : '' }}">
                                  <input class="form-control{{ $errors->has('area') ? ' is-invalid' : '' }}"  type="text" name="area" id="input-current-area" placeholder="{{ __('Area') }}" value="{{ old('area', auth()->user()->area) }}"  />
                                  @include('alerts.feedback', ['field' => 'area'])
                              </div>
                          </div>
                      </div>

                      <div class="row">
                          <label class="col-sm-2 col-form-label" for="input-current-address">{{ __('Dirección') }}</label>
                          <div class="col-sm-7">
                              <div class="form-group{{ $errors->has('address') ? ' has-danger' : '' }}">
                                  <input class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}"  type="text" name="address" id="input-current-address" placeholder="{{ __('Dirección') }}" value="{{ old('address', auth()->user()->address) }}" required/>
                                  @include('alerts.feedback', ['field' => 'address'])
                              </div>
                          </div>
                      </div>

                      <div class="row">
                          <label class="col-sm-2 col-form-label" for="input-current-city_id">{{ __('Ciudad') }}</label>
                          <div class="col-lg-5 col-md-6 col-sm-3">
                              <select class="selectpicker form-control{{ $errors->has('city_id') ? ' is-invalid' : '' }}" data-size="7" data-style="btn btn-primary btn-round" id="input-current-city_id" title="Ciudad" name="city_id" required>
                                  <option selected value="{{ old('city_id', isset(auth()->user()->city->code) ?  auth()->user()->city->code : '' ) }}">{{ old('city_id', isset(auth()->user()->city->name) ?  auth()->user()->city->name.' / '.auth()->user()->city->department->name : '' ) }}</option>
                                  @foreach($cities as $city)
                                      <option value="{{$city->code}}" {{ old('city_id') == $city->code ? 'selected' : '' }}>{{$city->name}} / {{$city->department->name}}</option>
                                  @endforeach
                              </select>
                              <div style="margin-top: 9px;">@include('alerts.feedback', ['field' => 'city_id'])</div>
                          </div>
                      </div><br>

                      <div class="row">
                          <label class="col-sm-2 col-form-label" for="input-current-gender_id">{{ __('Genero') }}</label>
                          <div class="col-lg-5 col-md-6 col-sm-3">
                              <select class="selectpicker form-control{{ $errors->has('gender_id') ? ' is-invalid' : '' }}" data-size="7" data-style="btn btn-primary btn-round" id="input-current-gender_id" title="Genero" name="gender_id" required>
                                  <option selected value="{{ old('gender_id', isset(auth()->user()->gender->id) ?  auth()->user()->gender->id : '' ) }}">{{ old('gender_id', auth()->user()->gender->type ?? '' )  }}</option>
                                  @foreach($genders as $gender)
                                      <option value="{{$gender->id}}" {{ old('gender_id') == $gender->id ? 'selected' : '' }}>{{$gender->type}}</option>
                                  @endforeach
                              </select>
                              <div style="margin-top: 9px;">@include('alerts.feedback', ['field' => 'gender_id'])</div>
                          </div>
                      </div>

                      <button type="submit" class="btn btn-rose pull-right">{{ __('Actualizar datos') }}</button>
                      <div class="clearfix"></div>
                  </form>
              </div>
          </div>

      </div>
    </div>
  </div>
</div>
@endsection


@push('js')
    <script>
        $(document).ready(function() {
            $('.datepicker').datetimepicker({
                icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down",
                    previous: 'fa fa-chevron-left',
                    next: 'fa fa-chevron-right',
                    today: 'fa fa-screenshot',
                    clear: 'fa fa-trash',
                    close: 'fa fa-remove'
                },
                format: 'DD-MM-YYYY'
            });
        });
    </script>
@endpush
