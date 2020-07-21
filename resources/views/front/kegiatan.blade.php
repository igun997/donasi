@extends('layout.front')

@section('title')
{{$title}}
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" integrity="sha512-H9jrZiiopUdsLpg94A333EfumgUBpO9MdbxStdeITo+KEIMaNfHNvwyjjDJb+ERPaRS6DpyRlKbvPUasNItRyw==" crossorigin="anonymous" />

@endsection

@section('content')
    <div class="hero-wrap js-fullheight">
        <div class="overlay"></div>
        <div id="particles-js"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
                <div class="col-md-6 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
                    <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"></p>
                    <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">{{$title}}</h1>
                </div>
            </div>
        </div>
    </div>



    <div class="ftco-section">
        <div class="container">
            <h1 align="center">Kegiatan</h1>
            <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">
                                    {{$data->nama}}
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    @foreach(@$data->kegiatan_details()->get() as $images)
                                        <div class="col-md-3">
                                            <div class="card">
                                                <a href="{{$images->foto}}" class="image">
                                                    <img class="card-img-top" src="{{$images->foto}}">
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <hr>
                                {{$data->ket}}
                            </div>

                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js" integrity="sha512-uURl+ZXMBrF4AwGaWmEetzrd+J5/8NRkWAvJx5sbPSSuOb0bZLqf+tOzniObO00BjHa/dD7gub9oCGMLPQHtQA==" crossorigin="anonymous"></script>
    <script>
        $(".image").fancybox();
    </script>
@endsection

