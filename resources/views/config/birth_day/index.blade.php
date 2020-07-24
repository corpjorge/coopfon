@extends('layouts.app_external', [
  'class' => 'off-canvas-sidebar',
  'classPage' => '',
  'activePage' => '',
  'title' => __('Cumpleaños'),
  'pageBackground' => asset("coopfon").'/img/pqrs/pqrs.jpg'
])

@section('content')

    @php
        $gender = isset($user->gender->abbreviation) ? $user->gender->abbreviation : 'M';
    @endphp

    <div class="page-header header-filter header-small" data-parallax="true" style="background-image: url({{ asset('coopfon/img/cumple/3.jpg') }})">

    </div>
    <div class="main main-raised">
        <div class="container">
            <div class="section text-center">
                <div class="card card-blog">
                    <div class="card-header card-header-image">
                        <video width="100%" autoplay muted loop>
                            <source src="{{ asset('coopfon/img/cumple/'.$gender.'.mp4') }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>

                         <div class="card-title">
                            Felicidades: {{ $user->full_name }}
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="sound"></div>
                        <h6 class="card-category text-info">Recuerda</h6>
                        <p class="card-description">
                            CoopFon Te Desea en este cumpleaños que disfrutes cada momento al máximo, ahora y siempre.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div id="comments">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto">
                    <div class="media-area">
                        <h3 class="title text-center">Mensajes</h3>
                        <comments-component user="{{$user->id}}"></comments-component>
                        <br><br>
                        @auth
                            <comment-component birthday="{{$user->id}}" user="{{auth()->user()->name}}"></comment-component>
                        @endauth

                        @guest
                            <commentsLogin-component></commentsLogin-component>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('js')
    <script src="{{asset('coopfon/js/comments.js')}}"></script>
    <script>
        var mp3Source = '<source src="/coopfon/img/cumple/{{$gender}}.mp3" type="audio/mpeg">';
        var embedSource = '<embed hidden="true" autostart="true" loop="false" src="/coopfon/img/cumple/M.mp3">';
        document.getElementById("sound").innerHTML='<audio autoplay="autoplay">' + mp3Source +  embedSource + '</audio>';
    </script>
@endpush
