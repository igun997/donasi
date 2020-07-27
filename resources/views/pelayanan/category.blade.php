@extends('adminlte::page')

@section('title', $title)

@section('content_header')

@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @include("message")
                    <a href="{{route("category.insert.page")}}" class="btn btn-success" style="margin-bottom:10px">
                        <li class="fa fa-plus"></li>
                    </a>
                    <div class="table-responsive">
                        <table class="table-bordered table" id="dtable">
                            <thead>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Dibuat</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                            @foreach($data as $key => $row)
                                <tr>
                                    <td>{{($key+1)}}</td>
                                    <td>{{$row->name}}</td>
                                    <td>{{$row->created_at}}</td>
                                    <td>
                                        <a href="{{route("category.page.update",[$row->id])}}" class="btn btn-warning">
                                            <li class="fa fa-edit"></li>
                                        </a>
                                        <a href="{{route("category.delete",[$row->id])}}" class="btn btn-danger">
                                            <li class="fa fa-ban"></li>
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
