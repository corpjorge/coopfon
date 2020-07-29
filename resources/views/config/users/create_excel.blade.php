@extends('layouts.app', ['activePage' => 'user-management', 'menuParent' => 'config', 'titlePage' => __('Gestión de asociados')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            @include('alerts.errors')
          <form id="formExcel" method="post" enctype="multipart/form-data" action="{{ route('users.store') }}" autocomplete="off" class="form-horizontal">
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
                      <span id="file-error" class="error text-danger" for="input-file" style="display: none;">Falta archivo</span>
                  </div>
                </div>
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="button" class="btn btn-rose" onclick="exportExel()">
                    <div id="loadSpinner" style="display:none;">
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        <span class="sr-only">Loading...</span>
                    </div>
                    {{ __('Cargar asociados') }}
                </button>
              </div>
                <div id="mensageExcelOne" style="display: none" class="card-footer ml-auto mr-auto">
                    <h5>Por favor espere, puede tardar demasiado</h5>
                </div>
                <div class="progress" id="progress-bar" style="display: none">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 100%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div id="mensageExcelTwo" style="display: none"  class="card-footer ml-auto mr-auto">
                    <h6>*No recargue ni cierre esta ventana</h6>
                </div>
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
        function exportExel() {
            var inputFile = document.getElementById("input-file");
            var fileError = document.getElementById("file-error");
            var formExcel = document.getElementById("formExcel");
            var loadSpinner = document.getElementById("loadSpinner");
            var progressBar = document.getElementById("progress-bar");
            var mensageExcelOne = document.getElementById("mensageExcelOne");
            var mensageExcelTwo = document.getElementById("mensageExcelTwo");

            if (inputFile.value == ''){
                fileError.style.display = "block";
                return false;
            }

            mensageExcelOne.style.display = "";
            mensageExcelTwo.style.display = "";
            progressBar.style.display = "";
            loadSpinner.style.display = "inline";
            fileError.style.display = "none";
            formExcel.submit();
        }
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
