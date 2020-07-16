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
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>No Rekening</th>
                                <th>No HP</th>
                                <th>Status</th>
                                <th>Dibuat</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                            @foreach($data as $key => $row)
                                <tr>
                                    <td>{{($key+1)}}</td>
                                    <td>#{{$row->id}}</td>
                                    <td>{{$row->nama}}</td>
                                    <td>{{$row->alamat}}</td>
                                    <td>{{$row->no_rekening}}</td>
                                    <td>{{$row->no_hp}}</td>
                                    <td>{{$row->status}}</td>
                                    <td>{{$row->created_at}}</td>
                                    <td>
                                        @if($row->status == "Menunggu" || $row->status == "Ditolak")
                                        <a href="{{route("sekretaris.donatur.verifikasi",[$row->id,1])}}" class="btn btn-success">
                                            <li class="fa fa-check"></li>
                                        </a>
                                        @else
                                        <a href="{{route("sekretaris.donatur.verifikasi",[$row->id,2])}}" class="btn btn-danger">
                                            <li class="fa fa-ban"></li>
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
