<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield("title") - Rumaisa</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,700,800" rel="stylesheet">

    <link rel="stylesheet" href="{{url("css/open-iconic-bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{url("css/animate.css")}}">
    <link rel="stylesheet" href="{{url("css/owl.carousel.min.css")}}">
    <link rel="stylesheet" href="{{url("css/owl.theme.default.min.css")}}">
    <link rel="stylesheet" href="{{url("css/magnific-popup.css")}}">
    <link rel="stylesheet" href="{{url("css/aos.css")}}">
    <link rel="stylesheet" href="{{url("css/ionicons.min.css")}}">
    <link rel="stylesheet" href="{{url("css/bootstrap-datepicker.css")}}">
    <link rel="stylesheet" href="{{url("css/jquery.timepicker.css")}}">
    <link rel="stylesheet" href="{{url("css/flaticon.css")}}">
    <link rel="stylesheet" href="{{url("css/icomoon.css")}}">
    <link rel="stylesheet" href="{{url("css/style.css")}}">
    @yield("css")

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="/">Rumaisa</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a id="one" href="/" class="nav-link">Beranda</a></li>
                <li class="nav-item"><a id="tw" href="{{route("login")}}" class="nav-link">Login</a></li>
                <li class="nav-item cta"><a id="ons" href="{{route("register")}}" class="nav-link"><span>Register</span></a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->

@yield("content")
<footer class="ftco-footer ftco-bg-dark ftco-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-3">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Visi</h2>
                    {!!\App\Models\Setting::where(["set_key"=>"visi"])->first()->set_value!!}
                </div>
            </div>

            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ftco-footer-widget mb-4">
                            <h2 class="ftco-heading-2" align="center">Kirimkan Bantuan Anda Ke Rekening :</h2>
                            <h1 style="color: white;" align="center">{!!\App\Models\Setting::where(["set_key"=>"rekening"])->first()->set_value!!}</h1>
                        </div>
                    </div>
                    <div class="col-md-6">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Dana Terkumpul</h2>
                        <h1 style="color: white">Rp. {{number_format(\App\Models\Transaksi::where(["jenis"=>1,"status"=>1])->sum("total"))}}</h1>
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Dana Tersalurkan</h2>
                        <h1 style="color: white">Rp. {{number_format(\App\Models\Transaksi::where(["jenis"=>2,"status"=>1])->sum("total"))}}</h1>
                    </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Misi</h2>
                    {!!\App\Models\Setting::where(["set_key"=>"misi"])->first()->set_value!!}
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12 text-center">

                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            </div>
        </div>
    </div>
</footer>



<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


<script src="{{url("js/jquery.min.js")}}"></script>
<script src="{{url("js/jquery-migrate-3.0.1.min.js")}}"></script>
<script src="{{url("js/popper.min.js")}}"></script>
<script src="{{url("js/bootstrap.min.js")}}"></script>
<script src="{{url("js/jquery.easing.1.3.js")}}"></script>
<script src="{{url("js/jquery.waypoints.min.js")}}"></script>
<script src="{{url("js/jquery.stellar.min.js")}}"></script>
<script src="{{url("js/owl.carousel.min.js")}}"></script>
<script src="{{url("js/jquery.magnific-popup.min.js")}}"></script>
<script src="{{url("js/aos.js")}}"></script>
<script src="{{url("js/jquery.animateNumber.min.js")}}"></script>
<script src="{{url("js/bootstrap-datepicker.js")}}"></script>
<script src="{{url("js/jquery.timepicker.min.js")}}"></script>
<script src="{{url("js/particles.min.js")}}"></script>
<script src="{{url("js/particle.js")}}"></script>
<script src="{{url("js/scrollax.min.js")}}"></script>
<script src="{{url("js/main.js")}}"></script>
@yield("js")
</body>
</html>
