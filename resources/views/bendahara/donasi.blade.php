@extends('adminlte::page')

@section('title', $title)

@section('content_header')
    {{$title}}
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @include("message")
                    <div class="table-responsive">

                        <table class="table-bordered table" id="dtable">
                            <thead>
                            <th>No</th>
                            <th>ID</th>
                            <th>Tgl. Donasi</th>
                            <th>Status</th>
                            <th>Total</th>
                            <th>Bukti</th>
                            <th>No Rekening</th>
                            <th>Nama Pengirim</th>
                            <th>Nama Donatur</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                            </thead>
                            <tbody>
                            @foreach($data as $key => $row)
                                <tr>
                                    <td>{{($key+1)}}</td>
                                    <td>#{{$row->id}}</td>
                                    <td>{{date("d-m-Y",strtotime($row->tgl_donasi))}}</td>
                                    <td>{{$row->status}}</td>
                                    <td>Rp. {{number_format($row->total)}}</td>
                                    <td>
                                        <p>
                                            <img src="{{$row->bukti}}" class="img-fluid" alt="">
                                        </p>
                                        <p align="center">{!! (($row->bukti_upload)?"Upload Pada <br>(".date("d-m-Y",strtotime($row->bukti_upload)).")":null) !!}</p>
                                    </td>
                                    <td>{{$row->no_rekening}}</td>
                                    <td>{{$row->atas_nama}}</td>
                                    <td>{{$row->user->nama}}</td>

                                    <td>{{$row->keterangan}}</td>
                                    <td>
                                        <a href="{{route("donasi.donatur.verifikasi",[$row->id,9])}}" style="margin:2px 2px 2px"  class="btn btn-warning">
                                            <li class="fa fa-spinner"></li> Reset
                                        </a>
                                    @if($row->status == "Menunggu")
                                        @if($row->bukti != null)
                                                <a href="{{route("donasi.donatur.verifikasi",[$row->id,1])}}" style="margin:2px 2px 2px" class="btn btn-success">
                                                <li class="fa fa-check"></li> Verifikasi
                                            </a>
                                        @endif

                                        @if($row->bukti != null)
                                            <a href="{{route("donasi.donatur.verifikasi",[$row->id,2])}}" style="margin:2px 2px 2px"  class="btn btn-danger">
                                                <li class="fa fa-ban"></li> Tolak
                                            </a>
                                        @endif
                                    @endif


                                    </td>
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
