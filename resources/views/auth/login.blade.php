@extends('layouts.app', [
  'class' => 'off-canvas-sidebar',
  'classPage' => 'login-page',
  'activePage' => 'login',
  'title' => env('APP_NAME'),
  'pageBackground' => asset("coopfon").'/img/background/7.jpg'
])

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-9 ml-auto mr-auto mb-1 text-center">
        <h3>{{ __('Bienvenido a ').env('APP_NAME')}} </h3>

        <p class="text-lead text-light mt-3 mb-0">
            {{ __('Inicie sesión y realice sus trámites') }}
        </p>
      </div>
      <div class="col-lg-5 col-md-8 col-sm-10 ml-auto mr-auto mb-3 text-center">
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
        <form class="form" method="POST" action="{{ route('login') }}">
          @csrf
          <div class="card card-login card-hidden">
            <div class="card-header card-header-rose text-center">
              <h4 class="card-title">{{ __('Iniciar sesión') }}</h4>
              <div class="social-line">
                  @foreach($AuthCustoms as $AuthCustom)
                      <a href="{{ url('login/'.$AuthCustom->path) }}" class="btn btn-just-icon btn-link btn-white" data-toggle="tooltip" data-placement="top" title="{{$AuthCustom->description}}">
                          <i class="{{$AuthCustom->icon}}"></i>
                      </a>
                  @endforeach
              </div>
            </div>
            <div class="card-body ">
              <span class="form-group  bmd-form-group email-error {{ $errors->has('email') ? ' has-danger' : '' }}" >
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">email</i>
                    </span>
                  </div>
                  <input type="email" class="form-control" id="exampleEmails" name="email" placeholder="{{ __('Correo...') }}" value="{{ old('email', 'corpjorge@hotmail.com') }}" required>
                  @include('alerts.feedback', ['field' => 'email'])
                </div>
              </span>
              <span class="form-group bmd-form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">lock_outline</i>
                    </span>
                  </div>
                  <input type="password" class="form-control" id="examplePassword" name="password" placeholder="{{ __('Contraseña...') }}" value="admin" required>
                  @include('alerts.feedback', ['field' => 'password'])
                </div>
              </span>
              <div class="form-check mr-auto ml-3 mt-3">
                  <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Recuérdame') }}
                    <span class="form-check-sign">
                      <span class="check"></span>
                    </span>
                  </label>
                </div>
            </div>
            <div class="card-footer justify-content-center">
              <button type="submit" class="btn btn-rose btn-link btn-lg">{{ __('Ingresar') }}</button>
            </div>
          </div>
        </form>
        <div class="row">
          <div class="col-6">
              @if (Route::has('password.request'))
                  <a href="{{ route('password.request') }}" class="text-light">
                      <small>{{ __(' ¿olvidó su contraseña?') }}</small>
                  </a>
              @endif
          </div>

        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
<script>
  $(document).ready(function() {
    md.checkFullPageBackgroundImage();
    setTimeout(function() {
      // after 1000 ms we add the class animated to the login/register card
      $('.card').removeClass('card-hidden');
    }, 700);
  });
</script>
@endpush
