@extends('layout.main')
{{-- <link rel="stylesheet" href="{{ asset('css/card2.css') }}"> --}}
@php
$title = 'Dashboard - Admin';
@endphp

@section('content')
    <div class="row row-cols-1 row-cols-md-3 g-4 mt-1">

        <div class="col">
            <div class="card h-100">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Judul Film</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                        additional content. This content is a little bit longer.</p>

                </div>
                <div class="card-footer">
                    <div class="float-end">
                        <a href="#" class="btn btn-primary btn-sm"> <i class="fas fa-film"></i> Trailer </a>
                        <a href="#" class="btn btn-info btn-sm"> <i class="fas fa-dollar-sign"></i> Beli Tiket </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection




@section('scripts')
    @if (session()->has('success'))
        <script>
            toastr.success(`Selamat Datang {{ Auth::user()->name }}`);
        </script>
    @endif
@endsection
