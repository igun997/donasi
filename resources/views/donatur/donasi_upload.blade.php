@extends('adminlte::page')

@section('title', $title)

@section('content_header')

@stop

@section('content')
    <div class="row">
        <div class="col-md-6 offset-3">
            <div class="card">
                <div class="card-header">
                    {{$title}}
                </div>
                <div class="card-body">
                    @include("message")
                    <form action="{{route("donasi.upload.update",$data)}}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Tanggal Transfer</label>
                            <input type="date" class="form-control" name="bukti_upload" required>
                        </div>
                        <div class="form-group">
                            <label>Atas Nama</label>
                            <input type="text" class="form-control" name="atas_nama" required>
                        </div>
                        <div class="form-group">
                            <label>No Rekening</label>
                            <input type="text" class="form-control" name="no_rekening" required>
                        </div>
                        <div class="form-group">
                            <label>Bukti Upload</label>
                            <input type="file"  class="form-control" name="bukti" required>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success" type="submit">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')
    <script>

    </script>
@stop
