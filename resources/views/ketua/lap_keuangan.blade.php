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
                        Laporan Keuangan
                    </div>
                </div>
                <div class="card-body">
                    @include("message")
                    <form action="{{route("ketua.lap.keuangan")}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Mulai</label>
                            <input type="text" class="form-control date" name="start" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label>Sampai</label>
                            <input type="text" class="form-control date" name="end" autocomplete="off"  >
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success">
                                <li class="fa fa-print"></li> Cetak Laporan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" />
@stop

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous"></script>
    <script>
        $(".date").datepicker({
            format:"yyyy-m-d"
        });
    </script>
@stop
