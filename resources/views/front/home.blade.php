@extends('layout.front')

@section('title')
{{$title}}
@endsection

@section('css')
@endsection

@section('content')
    <!-- <div class="js-fullheight"> -->
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
                @foreach($data as $item)
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                {{$item->nama}}
                            </div>
                        </div>
                        <div class="card-body">
                            <img class="card-img-top" src="{{$item->kegiatan_details()->first()->foto}}">
                            <hr>
                            {{$item->ket}}
                            <hr>
                            <p ><b>Total Partisipan</b> : {{$item->kegiatan_partisipans()->count()}} Orang</p>
                        </div>
                        <div class="card-footer" style="text-align: center">
                            <a href="{{route("front.kegiatan",$item->id)}}"  class="btn btn-primary">Lihat Selengkapnya</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('js')

@endsection

