@extends('errors.layout', ['classPage' => 'error-page', 'activePage' => '500', 'title' => __('CoopFon'), 'pageBackground' => asset("coopfon").'/img/clint-mckoy.jpg'])

@section('content')
  <div class="container text-center">
    <div class="row">
      <div class="col-md-12">
        <h1 class="title">500</h1>
        <h2>{{ __('Error del Servidor :') }}(</h2>
        <h4>{{ __('Ooooups! Parece que algo salió mal') }}</h4>
      </div>
    </div>
  </div>
@endsection
