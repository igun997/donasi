@extends('adminlte::page')

@section('title', $title)

@section('content_header')

@stop

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{number_format($total_keluar)}}</h3>
                    <p>Total Dana Keluar</p>
                </div>
                <div class="icon">
                    <i class="fa fa-money-bill-alt"></i>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{number_format($total_masuk)}}</h3>
                    <p>Total Dana Masuk</p>
                </div>
                <div class="icon">
                    <i class="fa fa-money-bill"></i>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="small-box bg-default">
                <div class="inner">
                    <h3>{{number_format($total_sisa)}}</h3>
                    <p>Sisa Dana</p>
                </div>
                <div class="icon">
                    <i class="fa fa-money-bill-wave"></i>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')

@stop
