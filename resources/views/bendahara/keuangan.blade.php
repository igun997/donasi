@extends('adminlte::page')

@section('title', $title)

@section('content_header')
    {{$title}}
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
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @include("message")


                    <a href="{{route("donasi.donatur.minus")}}" class="btn btn-danger" style="margin:5px 5px 5px">
                        <li class="fa fa-minus"></li> Dana Keluar
                    </a>
                    <div class="table-responsive">

                        <table class="table-bordered table" id="dtable">
                            <thead>
                                <th>No</th>
                                <th>ID</th>
                                <th>Total</th>
                                <th>Tgl. Transaksi</th>
                                <th>Keterangan</th>
                                <th>Jenis</th>
                            </thead>
                            <tbody>
                            @foreach($data as $key => $row)
                                <tr>
                                    <td>{{($key+1)}}</td>
                                    <td>#{{$row->id}}</td>
                                    <td>Rp. {{number_format($row->total)}}</td>
                                    <td>{{date("d-m-Y",strtotime($row->created_at))}}</td>
                                    <td>{{$row->keterangan}}</td>
                                    <td>{!!  '<span class="badge bg-primary">'.$row->jenis.'</span>' !!}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')
    <script>
        $("#dtable").DataTable({

        });
    </script>
@stop
