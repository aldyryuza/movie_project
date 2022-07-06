@extends('layout.main')
@php
$title = 'Tiket User';

$tiket = DB::table('booking')
    ->where('id_user', Auth::user()->id)
    ->get();
$id_show = $tiket[0]->id_show;
$id_seat = $tiket[0]->id_show_seat;

$show = DB::table('show')
    ->where('id_show', $id_show)
    ->get();
$id_movie = $show[0]->id_movie;

$movie = DB::table('movie')
    ->where('id', $id_movie)
    ->get();

$seat = DB::table('show_seat')
    ->where('id', $id_seat)
    ->get();

$id_seat_audi = $seat[0]->id_seat_audi;

// dd($id_seat_audi);
$id_audi_seat = DB::table('audi_seat')
    ->where('id_audi_seat', $id_seat_audi)
    ->get();
$id_audi = $id_audi_seat[0]->id_audi;
$id_studio = DB::table('audi')
    ->where('id', $id_audi)
    ->get();

@endphp
@section('content')
    <br>
    <div class="col mb-5">
        <div class="card w-50">
            <div class="card-header bg-dark text-white">
                <h4>Tiket</h4>
            </div>
            <div class="card-body">
                <table>
                    <thead>
                        {{-- <tr>
                            <th></th>
                        </tr> --}}
                    </thead>
                    <tbody>
                        <tr>
                            <td><b>Judul Film</b></td>
                            <td>:</td>
                            <td>{{ $movie[0]->nama_film }}</td>
                        </tr>
                        <tr>
                            <td><b>Tanggal Tayang</b> </td>
                            <td>:</td>
                            <td>{{ $movie[0]->tanggal_tayang }}</td>
                        </tr>
                        <tr>
                            <td><b>Jam Tayang</b></td>
                            <td>:</td>
                            <td>{{ $show[0]->jam_mulai }} WIB</td>
                        </tr>
                        <tr>
                            <td><b>Jam Akhir</b></td>
                            <td>:</td>
                            <td>{{ $show[0]->jam_selesai }} WIB</td>
                        </tr>
                        <tr>
                            <td><b>Kursi</b></td>
                            <td>:</td>
                            <td>{{ $id_audi_seat[0]->kursi }}{{ $id_studio[0]->no_studio }}</td>
                        </tr>
                        <tr>
                            <td><b>Studio #</b></td>
                            <td>:</td>
                            <td>{{ $id_studio[0]->id }}</td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
@section('scripts')
@endsection
