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
                    <div class="table-responsive">
                        <table class="table-bordered table" id="dtable">
                            <thead>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Keterangan</th>
                            <th>Total Partisipan</th>
                            <th>Konf. Sekretaris</th>
                            <th>Konf. Atasan</th>
                            <th>Dibuat</th>
                            <th>Aksi</th>
                            </thead>
                            <tbody>
                            @foreach($data as $key => $row)
                                <tr>
                                    <td>{{($key+1)}}</td>
                                    <td>{{$row->nama}}</td>
                                    <td>{{$row->ket}}</td>
                                    <td>{{$row->kegiatan_partisipans()->count()}}</td>
                                    <td>{{$row->sekretaris}}</td>
                                    <td>{{$row->atasan}}</td>
                                    <td>{{$row->created_at}}</td>
                                    <td>
                                        @if($row->sekretaris === "Terverifikasi")
                                        @if($row->atasan === "Menunggu")
                                        <a href="{{route("ketua.kegiatan.verifikasi",[$row->id,1])}}" class="btn btn-warning">
                                            <li class="fa fa-check"></li>
                                        </a>

                                        <a href="{{route("ketua.kegiatan.verifikasi",[$row->id,2])}}" class="btn btn-danger">
                                            <li class="fa fa-ban"></li>
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
