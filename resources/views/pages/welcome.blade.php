@extends('layouts.app_external', [
  'class' => 'landing-page sidebar-collapse',
  'classPage' => '',
  'activePage' => '',
  'title' => env('APP_NAME'),
  'pageBackground' => asset("coopfon").'/img/login.jpg'
])

@section('content')
    <div class="page-header header-filter" data-parallax="true" style="background-image: url({{ asset('coopfon/img/background/'.rand(1, 5).'.jpg') }})">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="title">Disfrutar de todos los beneficios y servicios.</h2>
                     <br>
                    <a href="{{ route('login') }}" target="_blank" class="btn btn-rose btn-raised btn-lg">
                        <i class="fa fa-fingerprint"></i> Ingresar
                    </a>
                </div>
                <div class="col-md-3 ml-auto ">
                    <div class="card" style="width: 200px;">
                        <img class="card-img-top" src='{{ asset('coopfon/img/logo_empresa.png') }}' alt="Card image cap">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main main-raised">
        <div class="container">
            <div class="section text-center">
                <div class="row">
                    <div class="col-md-8 ml-auto mr-auto">
                        <h2 class="title">Let&apos;s talk product</h2>
                        <h5 class="description">This is the paragraph where you can write more details about your product. Keep you user engaged by providing meaningful information. Remember that by this time, the user is curious, otherwise he wouldn&apos;t scroll to get here. Add a button if you want the user to see more.</h5>
                    </div>
                </div>
                <div class="features">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="info">
                                <div class="icon icon-info">
                                    <i class="material-icons">chat</i>
                                </div>
                                <h4 class="info-title">Free Chat</h4>
                                <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info">
                                <div class="icon icon-success">
                                    <i class="material-icons">verified_user</i>
                                </div>
                                <h4 class="info-title">Verified Users</h4>
                                <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info">
                                <div class="icon icon-danger">
                                    <i class="material-icons">fingerprint</i>
                                </div>
                                <h4 class="info-title">Fingerprint</h4>
                                <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section text-center">
                <h2 class="title">Here is our team</h2>
                <div class="team">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-profile card-plain">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="card-header card-header-image">
                                            <a href="#pablo">
                                                <img class="img" src="../assets/img/faces/card-profile1-square.jpg">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="card-body">
                                            <h4 class="card-title">Alec Thompson</h4>
                                            <h6 class="category text-muted">Founder</h6>
                                            <p class="card-description">
                                                Don't be scared of the truth because we need to restart the human foundation in truth...
                                            </p>
                                        </div>
                                        <div class="card-footer justify-content-center">
                                            <a href="#pablo" class="btn btn-just-icon btn-link btn-twitter">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                            <a href="#pablo" class="btn btn-just-icon btn-link btn-facebook">
                                                <i class="fa fa-facebook-square"></i>
                                            </a>
                                            <a href="#pablo" class="btn btn-just-icon btn-link btn-google">
                                                <i class="fa fa-google"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card card-profile card-plain">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="card-header card-header-image">
                                            <a href="#pablo">
                                                <img class="img" src="../assets/img/faces/card-profile6-square.jpg">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="card-body">
                                            <h4 class="card-title">Kendall Andrew</h4>
                                            <h6 class="category text-muted">Graphic Designer</h6>
                                            <p class="card-description">
                                                Don't be scared of the truth because we need to restart the human foundation in truth...
                                            </p>
                                        </div>
                                        <div class="card-footer justify-content-center">
                                            <a href="#pablo" class="btn btn-just-icon btn-link btn-linkedin">
                                                <i class="fa fa-linkedin"></i>
                                            </a>
                                            <a href="#pablo" class="btn btn-just-icon btn-link btn-facebook">
                                                <i class="fa fa-facebook-square"></i>
                                            </a>
                                            <a href="#pablo" class="btn btn-just-icon btn-link btn-dribbble">
                                                <i class="fa fa-dribbble"></i>
                                            </a>
                                            <a href="#pablo" class="btn btn-just-icon btn-link btn-google">
                                                <i class="fa fa-google"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card card-profile card-plain">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="card-header card-header-image">
                                            <a href="#pablo">
                                                <img class="img" src="../assets/img/faces/card-profile4-square.jpg">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="card-body">
                                            <h4 class="card-title">Gina Andrew</h4>
                                            <h6 class="category text-muted">Web Designer</h6>
                                            <p class="card-description">
                                                I love you like Kanye loves Kanye. Don't be scared of the truth.
                                            </p>
                                        </div>
                                        <div class="card-footer justify-content-center">
                                            <a href="#pablo" class="btn btn-just-icon btn-link btn-youtube">
                                                <i class="fa fa-youtube-play"></i>
                                            </a>
                                            <a href="#pablo" class="btn btn-just-icon btn-link btn-twitter">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                            <a href="#pablo" class="btn btn-just-icon btn-link btn-instagram">
                                                <i class="fa fa-instagram"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card card-profile card-plain">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="card-header card-header-image">
                                            <a href="#pablo">
                                                <img class="img" src="../assets/img/faces/card-profile2-square.jpg">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="card-body">
                                            <h4 class="card-title">George West</h4>
                                            <h6 class="category text-muted">Backend Hacker</h6>
                                            <p class="card-description">
                                                I love you like Kanye loves Kanye. Don't be scared of the truth because we need to restart the human foundation.
                                            </p>
                                        </div>
                                        <div class="card-footer justify-content-center">
                                            <a href="#pablo" class="btn btn-just-icon btn-link btn-linkedin">
                                                <i class="fa fa-linkedin"></i>
                                            </a>
                                            <a href="#pablo" class="btn btn-just-icon btn-link btn-facebook">
                                                <i class="fa fa-facebook-square"></i>
                                            </a>
                                            <a href="#pablo" class="btn btn-just-icon btn-link btn-google">
                                                <i class="fa fa-google"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section section-contacts">
                <div class="row">
                    <div class="col-md-8 ml-auto mr-auto">
                        <h2 class="text-center title">Work with us</h2>
                        <h4 class="text-center description">Divide details about your product or agency work into parts. Write a few lines about each one and contact us about any further collaboration. We will responde get back to you in a couple of hours.</h4>
                        <form class="contact-form">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Your Name</label>
                                        <input type="email" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Your Email</label>
                                        <input type="email" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleMessage" class="bmd-label-floating">Your Message</label>
                                <textarea type="email" class="form-control" rows="4" id="exampleMessage"></textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-4 ml-auto mr-auto text-center">
                                    <button class="btn btn-primary btn-raised">
                                        Send Message
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
