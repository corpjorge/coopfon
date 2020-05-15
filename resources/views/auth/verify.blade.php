@extends('layouts.app', [
  'class' => 'off-canvas-sidebar',
  'classPage' => 'login-page',
  'activePage' => '',
  'title' => env('APP_NAME'),
  'pageBackground' => asset("coopfon").'/img/login.jpg'
])

@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-lg-7 col-md-8">
          <div class="card card-login card-hidden mb-3">
            <div class="card-header card-header-rose text-center">
              <p class="card-title"><strong>{{ __('Verifique correo') }}</strong></p>
            </div>
            <div class="card-body">
              <p class="card-description text-center"></p>
              <p>
                {{ __('Antes de continuar, revise su correo para obtener, enlace de verificación.') }}

                @if (Route::has('verification.resend'))
                    {{ __('Si no recibiste el correo electrónico') }}, <a href="{{ route('verification.resend') }}">{{ __('Clic aquí para solicitar otro') }}</a>
                @endif
              </p>
            </div>
          </div>
      </div>
  </div>
</div>
@endsection

@push('js')
<script>
  $(document).ready(function() {
    @if (session('resent'))
      $.notify({
        icon: "done",
        message: "{{ __('Se ha enviado un nuevo enlace de verificación a su correo.') }}"
      }, {
        type: 'success',
        timer: 3000,
        placement: {
          from: 'top',
          align: 'right'
        }
      });
    @endif

    md.checkFullPageBackgroundImage();
    setTimeout(function() {
      // after 1000 ms we add the class animated to the login/register card
      $('.card').removeClass('card-hidden');
    }, 700);
  });
</script>
@endpush
