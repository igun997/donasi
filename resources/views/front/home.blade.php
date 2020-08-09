@extends('layout.front')

@section('title')
{{$title}}
@endsection

@section('css')
@endsection

@section('content')
    <!-- <div class="js-fullheight"> -->
    <div class="hero-wrap js-fullheight">
        <div class="overlay"></div>
        <div id="particles-js"></div>
        <div class="container">
            <div class="row" style="margin-top: 180px">
                    <div class="col-4">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">
                                    Terima Kasih Atas Donasinya
                                </div>
                            </div>
                            <div class="card-body" >
                                <div class="table-responsive" style="max-height: 300px;">
                                    <table class="table-bordered table"  >
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Total Donasi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach(\App\Models\Transaksi::join("users","users.id","transaksi.user_id")->where(["transaksi.jenis"=>1,"transaksi.status"=>1,"users.level"=>0])->whereNotNull("transaksi.user_id")->get() as $num => $row)
                                                <tr>
                                                    <td>{{($num+1)}}</td>
                                                    <td>{{$row->user()->first()->nama}}</td>
                                                    <td>Rp. {{number_format($row->total)}}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>



    <div class="ftco-section">
        <div class="container">
            <h1 align="center">Kegiatan</h1>
            <div class="row">
                @foreach($data as $item)
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                {{$item->nama}}
                            </div>
                        </div>
                        <div class="card-body">
                            <img class="card-img-top" src="{{$item->kegiatan_details()->first()->foto}}">
                            <hr>
                            {{$item->ket}}
                            <hr>
                            <p ><b>Total Partisipan</b> : {{$item->kegiatan_partisipans()->count()}} Orang</p>
                        </div>
                        <div class="card-footer" style="text-align: center">
                            <a href="{{route("front.kegiatan",$item->id)}}"  class="btn btn-primary">Lihat Selengkapnya</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('js')

@endsection

