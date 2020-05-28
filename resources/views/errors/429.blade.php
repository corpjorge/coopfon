@extends('errors.layout', ['classPage' => 'error-page', 'activePage' => '429', 'title' => __('CoopFon'), 'pageBackground' => asset("coopfon").'/img/clint-mckoy.jpg'])

@section('content')
  <div class="container text-center">
    <div class="row">
      <div class="col-md-12">
        <h1 class="title">429</h1>
        <h2>{{ __('Demasiadas solicitudes :') }}(</h2>
        <h4>{{ __('Ooooups! Parece que hiciste demasiadas solicitudes') }}</h4>
      </div>
    </div>
  </div>
@endsection

