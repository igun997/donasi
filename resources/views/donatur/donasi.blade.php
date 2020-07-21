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
                    <div class="table-responsive">
                        <a href="{{route("donasi.add")}}" class="btn btn-success" style="margin-bottom:5px">
                            <li class="fa fa-plus"></li>
                        </a>
                        <table class="table-bordered table" id="dtable">
                            <thead>
                                <th>No</th>
                                <th>ID</th>
                                <th>Tgl. Donasi</th>
                                <th>Status</th>
                                <th>Bukti</th>
                                <th>No Rekening</th>
                                <th>Nama Pengirim</th>
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
                                        <td>
                                            <p>
                                                <img src="{{$row->bukti}}" class="img-fluid" alt="">
                                            </p>
                                            <p align="center">{!! (($row->bukti_upload)?"Upload Pada <br>(".date("d-m-Y",strtotime($row->bukti_upload)).")":null) !!}</p>
                                        </td>
                                        <td>{{$row->no_rekening}}</td>
                                        <td>{{$row->atas_nama}}</td>
                                        <td>{{$row->ket}}</td>
                                        <td>
                                            <a href="" style="margin:2px 2px 2px" class="btn btn-success">
                                                <li class="fa fa-print"></li>
                                            </a>
                                            @if($row->bukti == null)
                                                <a href="{{route("upload.bukti",$row->id)}}" class="btn btn-primary" style="margin:2px 2px 2px">
                                                    <li class="fa fa-upload"></li> Upload Bukti
                                                </a>
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
