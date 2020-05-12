@extends('layouts.app', [
  'class' => 'off-canvas-sidebar',
  'classPage' => 'login-page',
  'activePage' => '',
  'title' => env('APP_NAME'),
  'pageBackground' => asset("coopfon").'/img/login.jpg'
])

@section('content')
<div class="container" style="height: auto;">
  <div class="row justify-content-center">
      <div class="col-lg-7 col-md-8">
          <h1 class="text-white text-center">{{ __('Welcome to Material Dashboard Pro Laravel Live Preview.') }}</h1>
      </div>
  </div>
</div>
@endsection
