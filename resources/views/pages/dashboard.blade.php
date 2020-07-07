@extends('layouts.app', ['activePage' => 'dashboard', 'menuParent' => 'dashboard', 'titlePage' => __('Tablero')])

@section('content')
<div class="content">
  <div class="content">
    <div class="container-fluid">

        @foreach($externalSystems as $externalSystem)
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-success card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">equalizer</i>
                        </div>
                        <p class="card-category">{{$externalSystem->description}}</p>
                        <h4 class="card-title">{{$externalSystem->name}}</h4>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons text-success">link</i>
                            <a href="{{ route('system-external.'.$externalSystem->path) }}">Clic aquí para ingresar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach


      <h3>Como vamos</h3>
      <div class="row">
        <div class="col-md-4">
          <div class="card card-chart">
            <div class="card-header card-header-rose" data-header-animation="true">
              <div class="ct-chart" id="websiteViewsChart"></div>
            </div>
            <div class="card-body">
              <div class="card-actions">
                <button type="button" class="btn btn-danger btn-link fix-broken-card">
                  <i class="material-icons">build</i> Fix Header!
                </button>
                <button type="button" class="btn btn-info btn-link" rel="tooltip" data-placement="bottom" title="Refresh">
                  <i class="material-icons">refresh</i>
                </button>
                <button type="button" class="btn btn-default btn-link" rel="tooltip" data-placement="bottom" title="Change Date">
                  <i class="material-icons">edit</i>
                </button>
              </div>
              <h4 class="card-title">Website Views</h4>
              <p class="card-category">Last Campaign Performance</p>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">access_time</i> campaign sent 2 days ago
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-chart">
            <div class="card-header card-header-success" data-header-animation="true">
              <div class="ct-chart" id="dailySalesChart"></div>
            </div>
            <div class="card-body">
              <div class="card-actions">
                <button type="button" class="btn btn-danger btn-link fix-broken-card">
                  <i class="material-icons">build</i> Fix Header!
                </button>
                <button type="button" class="btn btn-info btn-link" rel="tooltip" data-placement="bottom" title="Refresh">
                  <i class="material-icons">refresh</i>
                </button>
                <button type="button" class="btn btn-default btn-link" rel="tooltip" data-placement="bottom" title="Change Date">
                  <i class="material-icons">edit</i>
                </button>
              </div>
              <h4 class="card-title">Daily Sales</h4>
              <p class="card-category">
                <span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> increase in today sales.</p>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">access_time</i> updated 4 minutes ago
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-chart">
            <div class="card-header card-header-info" data-header-animation="true">
              <div class="ct-chart" id="completedTasksChart"></div>
            </div>
            <div class="card-body">
              <div class="card-actions">
                <button type="button" class="btn btn-danger btn-link fix-broken-card">
                  <i class="material-icons">build</i> Fix Header!
                </button>
                <button type="button" class="btn btn-info btn-link" rel="tooltip" data-placement="bottom" title="Refresh">
                  <i class="material-icons">refresh</i>
                </button>
                <button type="button" class="btn btn-default btn-link" rel="tooltip" data-placement="bottom" title="Change Date">
                  <i class="material-icons">edit</i>
                </button>
              </div>
              <h4 class="card-title">Completed Tasks</h4>
              <p class="card-category">Last Campaign Performance</p>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">access_time</i> campaign sent 2 days ago
              </div>
            </div>
          </div>
        </div>
      </div>






      <h3>Clasificados recientes</h3>
      <br>
      <div class="row">
        <div class="col-md-4">
          <div class="card card-product">
            <div class="card-header card-header-image" data-header-animation="true">
              <a href="#">
                <img class="img" src="{{ asset('coopfon')}}/img/card-2.jpg">
              </a>
            </div>
            <div class="card-body">
              <div class="card-actions text-center">
                <button type="button" class="btn btn-danger btn-link fix-broken-card">
                  <i class="material-icons">build</i> Fix Header!
                </button>
                <button type="button" class="btn btn-default btn-link" rel="tooltip" data-placement="bottom" title="View">
                  <i class="material-icons">art_track</i>
                </button>
                <button type="button" class="btn btn-success btn-link" rel="tooltip" data-placement="bottom" title="Edit">
                  <i class="material-icons">edit</i>
                </button>
                <button type="button" class="btn btn-danger btn-link" rel="tooltip" data-placement="bottom" title="Remove">
                  <i class="material-icons">close</i>
                </button>
              </div>
              <h4 class="card-title">
                <a href="#">Aparta estudio</a>
              </h4>
              <div class="card-description">
                The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona.
              </div>
            </div>
            <div class="card-footer">
              <div class="price">
                <h4>$899/night</h4>
              </div>
              <div class="stats">
                <p class="card-category"><i class="material-icons">place</i> Barcelona, Spain</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-product">
            <div class="card-header card-header-image" data-header-animation="true">
              <a href="#">
                <img class="img" src="{{ asset('coopfon')}}/img/card-3.jpg">
              </a>
            </div>
            <div class="card-body">
              <div class="card-actions text-center">
                <button type="button" class="btn btn-danger btn-link fix-broken-card">
                  <i class="material-icons">build</i> Fix Header!
                </button>
                <button type="button" class="btn btn-default btn-link" rel="tooltip" data-placement="bottom" title="View">
                  <i class="material-icons">art_track</i>
                </button>
                <button type="button" class="btn btn-success btn-link" rel="tooltip" data-placement="bottom" title="Edit">
                  <i class="material-icons">edit</i>
                </button>
                <button type="button" class="btn btn-danger btn-link" rel="tooltip" data-placement="bottom" title="Remove">
                  <i class="material-icons">close</i>
                </button>
              </div>
              <h4 class="card-title">
                <a href="#">Oficina estudio</a>
              </h4>
              <div class="card-description">
                The place is close to Metro Station and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the night life in London, UK.
              </div>
            </div>
            <div class="card-footer">
              <div class="price">
                <h4>$1.119/night</h4>
              </div>
              <div class="stats">
                <p class="card-category"><i class="material-icons">place</i> London, UK</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-product">
            <div class="card-header card-header-image" data-header-animation="true">
              <a href="#">
                <img class="img" src="{{ asset('coopfon')}}/img/card-1.jpg">
              </a>
            </div>
            <div class="card-body">
              <div class="card-actions text-center">
                <button type="button" class="btn btn-danger btn-link fix-broken-card">
                  <i class="material-icons">build</i> Fix Header!
                </button>
                <button type="button" class="btn btn-default btn-link" rel="tooltip" data-placement="bottom" title="View">
                  <i class="material-icons">art_track</i>
                </button>
                <button type="button" class="btn btn-success btn-link" rel="tooltip" data-placement="bottom" title="Edit">
                  <i class="material-icons">edit</i>
                </button>
                <button type="button" class="btn btn-danger btn-link" rel="tooltip" data-placement="bottom" title="Remove">
                  <i class="material-icons">close</i>
                </button>
              </div>
              <h4 class="card-title">
                <a href="#">Castillo a la venta</a>
              </h4>
              <div class="card-description">
                The place is close to Metro Station and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Milan.
              </div>
            </div>
            <div class="card-footer">
              <div class="price">
                <h4>$459/night</h4>
              </div>
              <div class="stats">
                <p class="card-category"><i class="material-icons">place</i> Milan, Italy</p>
              </div>
            </div>
          </div>
        </div>
      </div>


        <div class="row">
        <div class="cards">
            <div class="container">
                <div class="title">
                    <h3>Próximos eventos</h3>
                </div>



            </div>
        </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="card card-background" style="background-image: url('coopfon/img/eventos/escultura.jpg')">
                    <div class="card-body">
                        <h6 class="card-category text-info">Hoy</h6>
                        <a href="#">
                            <h3 class="card-title">Taller de escultura</h3>
                        </a>
                        <p class="card-description">
                            Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                        </p>
                        <a href="#" class="btn btn-white btn-link">
                            <i class="material-icons">subject</i> Inscribirse
                        </a>
                        <a href="#" class="btn btn-white btn-link">
                            <i class="material-icons">watch_later</i> 9:30
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-background" style="background-image: url('coopfon/img/eventos/moto.jpg')">
                    <div class="card-body">
                        <h6 class="card-category text-info">Mañana</h6>
                        <a href="#">
                            <h3 class="card-title">Tour Olaya</h3>
                        </a>
                        <p class="card-description">
                            Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                        </p>
                        <a href="#" class="btn btn-white btn-link">
                            <i class="material-icons">subject</i> Inscribirse
                        </a>
                        <a href="#" class="btn btn-white btn-link">
                            <i class="material-icons">watch_later</i> 5:30 PM
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-background" style="background-image: url('coopfon/img/eventos/park.jpg')">
                    <div class="card-body">
                        <h6 class="card-category text-info">Próximamente</h6>
                        <a href="#">
                            <h3 class="card-title">Tayrona</h3>
                        </a>
                        <p class="card-description">
                            Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                        </p>

                        <a href="#" class="btn btn-white btn-link">
                            <i class="material-icons">watch_later</i> Ya casi
                        </a>
                    </div>
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
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();

      md.initVectorMap();

    });
  </script>
@endpush
