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
                    <form action="{{route("donasi.add.insert")}}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Total Donasi</label>
                            <input type="number" min="0" step="0.1" class="form-control" name="total" required>
                        </div>
                        <div class="form-group">
                            <label>Bukti Pembayaran</label>
                            <input type="file" class="form-control" name="bukti" required>
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
