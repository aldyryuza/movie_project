@extends('layout.main')
@php
$title = 'Edit Data-Show';
$movie = DB::table('movie')->get();
$audi = DB::table('audi')->get();
@endphp
@section('content')
    <br>
    <div class="card w-75">
        <div class="card-body">
            <p class="fw-bold fs-4">Edit Data Show Movies</p>
            @foreach ($show as $r)
                <form action="/show/update/{{ $r->id_show }}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" value="{{ $r->id_show }}" name="id_show">
                        <label for="id">Nama Film / Movies</label>
                        <select class="form-select" name="id_movie" id="">
                            <option value="{{ $r->id_movie }}">{{ $r->id_movie }}</option>
                            @foreach ($movie as $m)
                                <option value="{{ $m->id }}">{{ $m->nama_film }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id">Jam Mulai</label>
                        <input type="time" class="form-control" id="jam_mulai" name="jam_mulai"
                            value="{{ $r->jam_mulai }}" placeholder="....">
                    </div>
                    <div class="form-group">
                        <label for="jam_mulai">Jam Mulai</label>
                        <input type="time" class="form-control" id="jam_mulai" name="jam_mulai"
                            value="{{ $r->jam_mulai }}">
                    </div>
                    <div class="form-group">
                        <label for="id">Jam Selesai</label>
                        <input type="time" class="form-control" id="jam_selesai" name="jam_selesai"
                            value="{{ $r->jam_selesai }}" placeholder="....">
                    </div>
                    <div class="form-group">
                        <label for="id">Studio Penayangan</label>
                        <select class="form-select" name="id_audi" id="">
                            <option value="{{ $r->id_audi }}">{{ $r->id_audi }}</option>
                            @foreach ($audi as $m)
                                <option value="{{ $m->id }}">Studio# {{ $m->id }}
                                    | {{ $m->total_kursi }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id">Harga Film</label>
                        <input type="number" class="form-control" id="" name="harga"
                            value="{{ $r->harga }}" placeholder="$">
                    </div>
                    <div class="form-group mt-3 float-end">
                        <a href="/show"class="btn btn-secondary" data-dismiss="modal">Close</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
            @endforeach
            </form>
        </div>
    </div>
@endsection
@section('scripts')
@endsection
