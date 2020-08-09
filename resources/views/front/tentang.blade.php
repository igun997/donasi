@extends('layout.front')

@section('title')
Tentang Kami
@endsection

@section('css')

@endsection

@section('content')
    <div class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title text-center">
                                Struktur Organisasi
                            </div>
                        </div>
                        <div class="card-body">
                            <center>
                                <img src="{{url("struktur.jpeg")}}" class="img-fluid" alt="">
                            </center>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                Misi
                            </div>
                        </div>
                        <div class="card-body">
                            <p>1. Menjadi fasilitator dalam pengembangan dan pemberdayaan potensi masyarakat, dengan memberikan pelayanan, pembinaan dan membuka ruang kreatif untuk membangun masyarakat berpribadi mandiri, berbudaya dan berdayaguna.</p>

                            <p>2. Mengambangkan edukasi dan riset terhadap segenap potensi masyarakat di bidang kesehatan dan ketahanan keluarga.</p>

                            <p>3. Menjalin kemitraan yang harmonis dengan berbagai komponen masyarakat, pemerintah, swasta, maupun lembaga kemasyarakatan lainnya dalam pemberdayaan masyarakat.</p>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                Visi
                            </div>
                        </div>
                        <div class="card-body">
                            <p>Menjadi Lembaga kepeloporan yang professional dalam pengembangan dan pendayagunaan potensi masyarakat untuk mewujudkan generasi terdidik, generasi sehat, serta generasi berdaya dan berbudaya.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

@endsection

