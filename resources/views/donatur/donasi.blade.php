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
                                <th>Tgl. Transaksi</th>
                                <th>Status</th>
                                <th>Bukti</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                @foreach($data as $key => $row)
                                    <tr>
                                        <td>{{($key+1)}}</td>
                                        <td>#{{$row->id}}</td>
                                        <td>{{$row->created_at}}</td>
                                        <td>{{$row->status}}</td>
                                        <td>
                                            <img src="{{$row->bukti}}" class="img-fluid" alt="">
                                        </td>
                                        <td>{{$row->keterangan}}</td>
                                        <td>
                                            <a href="" class="btn btn-success">
                                                <li class="fa fa-print"></li>
                                            </a>
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
