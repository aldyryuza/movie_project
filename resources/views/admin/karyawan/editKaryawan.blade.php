@extends('layout.main')

@php
$title = 'Edit Data - Karyawan';
@endphp
@section('content')
    <form action="/karyawan/update/{{ $karyawan->id }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class=" modal-body">
            <div class="mb-3">

                <label for="nama_karyawan">Nama Karyawan</label>
                <input type="text" class="form-control" id="nama_karyawan" name="nama_karyawan" placeholder="...."
                    value="{{ $karyawan->nama_karyawan }}">
            </div>
            <div class="mb-3">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="...."
                    value="{{ $karyawan->username }}">
            </div>
            <div class="mb-3">
                <label for="password">Password</label>
                <input type="text" class="form-control" id="password" name="password" placeholder="...."
                    value="{{ $karyawan->password }}">
            </div>


        </div>
        <div class="modal-footer">
            <a href="/karyawan" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
@endsection
