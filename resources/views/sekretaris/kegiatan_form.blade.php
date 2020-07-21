@extends('adminlte::page')

@section('title', $title)

@section('content_header')

@stop

@section('content')
    <div class="row">
        <div class="col-md-6 offset-3">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        {{$title}}
                    </div>
                </div>
                <div class="card-body">
                    @include("message")
                    <form action="{{route($route["name"],$route["params"])}}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Nama</label>
                            <input required class="form-control" name="nama" value="{{@$data->nama}}">
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea required name="ket" class="form-control" id="" cols="30" rows="10">{{@$data->ket}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Kategori</label>
                            <select required name="category_id" class="form-control">
                                @foreach(\App\Models\Category::all() as $row)
                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="row">
                            @foreach(@$data->kegiatan_details()->get() as $images)
                                <div class="col-md-3">
                                    <div class="card">
                                        <img class="card-img-top" src="{{$images->foto}}">
                                    </div>
                                </div>
                            @endforeach
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Upload Gambar</label>
                            <input {{(isset($data->nama)?null:"required")}} type="file" accept="image/*" name="foto[]" class="form-control" multiple>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success">Simpan</button>
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

@stop
