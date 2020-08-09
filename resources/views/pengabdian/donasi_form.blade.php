@extends('adminlte::page')

@section('title', $title)

@section('content_header')
    {{$title}}
@stop

@section('content')
    <div class="row">
        <div class="col-md-8 offset-2">
            <div class="card">
                <div class="card-body">
                    @include("message")
                    @if($type == 1)
                        <form action="{{route("donatur.insert.plus")}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Total Dana Masuk</label>
                                <input type="number" name="total" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Nama Donatur</label>
                                <input type="text" name="nama" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Email Donatur</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>No HP</label>
                                <input type="text" name="no_hp" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Tanggal Transaksi</label>
                                <input type="date"  class="form-control" name="tgl_donasi" required>
                            </div>
                            <div class="form-group">
                                <label>Alamat Donatur</label>
                                <textarea name="alamat" class="form-control" id="" cols="30" rows="10"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <textarea name="ket" class="form-control" id="" cols="30" rows="10"></textarea>
                            </div>
                            <div class="form-group">
                                <button class="btn-success btn" type="submit">Simpan</button>
                            </div>
                        </form>
                    @else
                        <form action="{{route("donatur.insert.minus")}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Total Dana Keluar</label>
                                <input type="number" name="total" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <textarea name="keterangan" id="" class="form-control" cols="30" rows="10"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Transaksi</label>
                                <input type="date"  class="form-control" name="tgl_donasi" required>
                            </div>
                            <div class="form-group">
                                <button class="btn-success btn" type="submit">Simpan</button>
                            </div>
                        </form>
                    @endif

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
