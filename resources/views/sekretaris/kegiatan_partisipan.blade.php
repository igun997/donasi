@extends('adminlte::page')

@section('title', $title)

@section('content_header')

@stop

@section('content')
    <div class="row">
        <div class="col-md-4">
        @include("message")
            <div class="card">
                <div class="card-body">
                    <form class="" action="{{route("kegiatan.insert.partisipan",$id)}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Nama</label>
                            <input class="form-control" name="nama" value="{{@$current->nama}}">
                        </div>
                        <input type="text" hidden name="kegiatan_id" value="{{$kegiatan_id}}">
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select name="jk" class="form-control">
                                @if(isset($current->jk))
                                    <option value="0" {{($current->jk == 0)?"selected":null}}>Laki - Laki</option>
                                    <option value="1" {{($current->jk == 1)?"selected":null}}>Perempuan</option>
                                @else
                                    <option value="0">Laki - Laki</option>
                                    <option value="1">Perempuan</option>
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea name="alamat" class="form-control" cols="30" rows="3">{{@$current->alamat}}</textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success btn-block" type="submit">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table-bordered table" id="dtable">
                            <thead>
                            <th>No</th>
                            <th>Nama</th>
                            <th>JK</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                            </thead>
                            <tbody>
                            @foreach($data as $key => $row)
                                <tr>
                                    <td>{{($key+1)}}</td>
                                    <td>{{$row->nama}}</td>
                                    <td>{{($row->jk == 0)?"Laki - Laki":"Perempuan"}}</td>
                                    <td>{{$row->alamat}}</td>
                                    <td>

                                        <a href="{{route("kegiatan.partisipan.delete",[$row->id])}}" class="btn btn-danger">
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
