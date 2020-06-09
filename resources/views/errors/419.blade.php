@extends('errors.layout', ['classPage' => 'error-page', 'activePage' => '419', 'title' => __('CoopFon'), 'pageBackground' => asset("coopfon").'/img/clint-mckoy.jpg'])

@section('content')
  <div class="container text-center">
    <div class="row">
      <div class="col-md-12">
        <h1 class="title">419</h1>
        <h2>{{ __('Página expirada :') }}(</h2>
        <h4>{{ __('Ooooups! Parece que tu token ha expirado.') }}</h4>
      </div>
    </div>
  </div>
@endsection

