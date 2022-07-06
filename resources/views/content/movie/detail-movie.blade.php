@extends('layout.main')
@php
$title = 'Movie-Detail';
@endphp

@section('content')
    <br>
    @foreach ($movieId as $r)
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="/gambar/{{ $r->gambar_film }}" class="img-fluid rounded-start" height="400px" width="400px"
                        alt="{{ $r->gambar_film }}">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $r->nama_film }}</h5>
                        <p>
                            <i class="fas fa-clock"></i> {{ $r->durasi_film }} | <i class="fas fa-film"></i>
                            {{ $r->tipe_film }} | <i class="fas fa-book"></i> {{ $r->bahasa_film }}
                        </p>
                        <p class="card-text">{{ $r->sinopsis }}</p>

                        <p class="card-text"><small class="text-muted">Tanggal rilis di bioskop
                                {{ $r->tanggal_rilis }}</small></p>

                        <div class="float-end my-3">
                            <a href="/movie" class="btn btn-secondary"> <i class="fas fa-backward"></i> Kembali</a>
                            <a href="#" class="btn btn-success"> <i class="fas fa-edit"></i> Pesan tiket</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@section('scripts')
    @if (session()->has('success'))
        <script>
            toastr.success(`{{ session('success') }}`);
        </script>
    @endif
@endsection
