@extends('layout.main')

@php
$title = 'Movie-List';
@endphp

@section('content')
    <br>
    <h2 class="text-center"> List Data Movie</h2>


    <div class="row row-cols-1 row-cols-md-3 g-4 mt-1">

        @foreach ($movies as $r)
            <div class="col">
                <div class="card h-100">
                    <img src="gambar/{{ $r->gambar_film }}" class="card-img-top " height="400px" width="400px"
                        alt="{{ $r->gambar_film }}">

                    <div class="card-body">
                        <h5 class="card-title">{{ $r->nama_film }}</h5>

                    </div>
                    <div class="card-footer">
                        <div class="float-end">
                            <a href="/movie/{{ $r->id }}" class="btn btn-primary btn-sm"> <i class="fas fa-info"></i>
                                Detail </a>
                            {{-- <a href="#" class="btn btn-info btn-sm"> <i class="fas fa-dollar-sign"></i> Beli Tiket </a> --}}
                            <!-- Button trigger modal -->
                            @if (Auth::check())
                                <a href="/pemesanan/tiket/{{ $r->id }}" class="btn btn-info btn-sm"
                                    data-toggle="modal" data-target="#beliTiket">
                                    <i class="fas fa-dollar-sign"></i> Beli Tiket </a>
                                {{-- <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#beliTiket">
                                    <i class="fas fa-dollar-sign"></i> Beli Tiket
                                </button> --}}
                            @else
                                <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    <i class="fas fa-dollar-sign"></i> Beli Tiket
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New Message!!</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Silahkan <b>Login</b> Terlebih Dahulu, Untuk Melakukan Pembelian Tiket
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <a href="/register" class="btn btn-warning">Daftar Akun</a>
                        <a href="/login" class="btn btn-primary">Login <i class="fas fa-sign-in-alt"></i></a>

                    </div>
                </div>
            </div>
        </div>
        {{-- Pembelian Tiket --}}
        {{-- <div class="modal fade" id="beliTiket" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New Message!!</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        BELI COK
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <a href="/register" class="btn btn-warning">Daftar Akun</a>
                        <a href="/login" class="btn btn-primary">Login <i class="fas fa-sign-in-alt"></i></a>

                    </div>
                </div>
            </div>
        </div> --}}
    </div>
@endsection




@section('scripts')
@endsection
