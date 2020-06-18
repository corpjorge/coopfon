@extends('layouts.app', ['activePage' => 'user-management', 'menuParent' => 'config', 'titlePage' => __('Gestión de asociados')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">

            @include('alerts.errors')

          <form method="post" enctype="multipart/form-data" action="{{ route('users.store') }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('post')

            <div class="card ">
              <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">person</i>
                </div>
                <h4 class="card-title">{{ __('Agregar asociados') }}</h4>
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ asset('coopfon') }}/demo/demo.xlsx " class="btn btn-sm btn-success">{{ __('Descargar ejemplo') }}</a>
                      <a href="{{ route('user.index') }}" class="btn btn-sm btn-rose">{{ __('Volver a la lista') }}</a>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Archivo XLSX') }}</label>
                  <div class="col-sm-7">
                      <input class="form-control{{ $errors->has('file') ? ' is-invalid' : '' }}" name="file" id="input-file" type="file" placeholder="{{ __('XLSX') }}" value="{{ old('file') }}" required="true" aria-required="true" accept=".xlsx"/>
                      @include('alerts.feedback', ['field' => 'file'])
                  </div>
                </div>

              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-rose">{{ __('Cargar asociados') }}</button>
              </div>
            </div>
          </form>
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

    <script>
        $(document).ready(function () {
            @if ($errors->any())
            @foreach ($errors->all() as $error)
                $.notify({
                    icon: "error",
                    message: "{{ $error }}"
                }, {
                    type: 'danger',
                    timer: 3000,
                    placement: {
                        from: 'top',
                        align: 'right'
                    }
                });
            @endforeach
            @endif
        });
    </script>
@endpush
