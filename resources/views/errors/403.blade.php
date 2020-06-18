@extends('errors.layout', ['classPage' => 'error-page', 'activePage' => '403', 'title' => __('CoopFon'), 'pageBackground' => asset("coopfon").'/img/clint-mckoy.jpg'])

@section('content')
  <div class="container text-center">
    <div class="row">
      <div class="col-md-12">
        <h1 class="title">403</h1>
        <h2>{{ __('Prohibido :') }}(</h2>
        <h4>{{ __('Ooooups! Parece que te perdiste.') }}</h4>
      </div>
    </div>
  </div>
@endsection
