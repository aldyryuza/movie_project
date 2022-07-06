@extends('layout.main')

@php
$title = 'Pemesanan-Tiket';
$tanggal_sekarang = date('Y-m-d');
@endphp

@section('content')
    <br>

    @foreach ($tiketId as $item)
        <div class="card ">
            <div class="card-header text-center">
                <h4>Pemesanan Tiket</h4>
            </div>
            <div class="card-body">
                <form action="/booking" method="POST">
                    @csrf

                    <div class="text-center">
                        <img src="../../gambar/{{ $item->gambar_film }}" class="rounded img-thumbnail"
                            alt="{{ $item->gambar_film }}" width="200" height="200">

                    </div>

                    <input type="hidden" class="form-control" value="{{ $item->id }}" name="id_show">

                    @php
                        $showSeat = DB::table('show_seat')
                            // ->where('status', '=', '0')
                            ->get();
                        $harga = DB::table('show')
                            ->where('id_movie', '=', $item->id)
                            ->get();
                        
                    @endphp

                    <div class="mb-3">
                        <input type="hidden" class="form-control" placeholder="....." name="jumlah_kursi" value="1">
                    </div>
                    <div class="mb-3" hidden>
                        <label class="form-label">ID User</label>
                        <input type="number" class="form-control" placeholder="....." value="{{ Auth::user()->id }}"
                            name="id_user">
                    </div>

                    <div class="mb-3">
                        <label for="disabledSelect" class="form-label">Pilih Kursi</label>
                        {{-- <select id="disabledSelect" class="form-select" name="id_show_seat">
                            @foreach ($showSeat as $item)
                                <option>{{ $item->id_seat_audi }}</option>
                            @endforeach
                        </select> --}}
                        <br>
                        <center>
                            <div class="card w-50 text-center">
                                <div class="card-header">
                                    {{-- <p class="fw-bold fs-4">List Kursi</p> --}}
                                    <h3>
                                        Studio # {{ $showSeat[0]->id }}
                                    </h3>

                                </div>
                                <div class="card-body">


                                    {{-- Kursi --}}
                                    <center>
                                        <div class="card w-50 border-5">
                                            <h1>SCREEN</h1>
                                        </div>
                                    </center>
                                    <center>
                                        <div class="card w-75 border-0 ">
                                            <div class="btn-toolbar my-3" role="toolbar"
                                                aria-label="Toolbar with button groups">
                                                <div class="btn-group me-2" role="group" aria-label="First group">

                                                    <div class=" ">
                                                        @foreach ($showSeat as $item)
                                                            <input type="radio" class="btn-check " name="id_show_seat"
                                                                id="{{ $item->id_seat_audi }}"
                                                                value="{{ $item->id_seat_audi }}"
                                                                {{ $item->status === '1' ? 'disabled' : '' }}>
                                                            <label
                                                                class="btn {{ $item->status === '1' ? 'btn-danger' : 'btn-outline-success' }}  mt-2"
                                                                for="{{ $item->id_seat_audi }}">{{ $item->id_seat_audi }}
                                                            </label>
                                                        @endforeach
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </center>
                                </div>


                            </div>
                        </center>
                    </div>

                    <input type="hidden" name="id_booking">
                    <div class="mb-3">
                        <label>Tanggal Pembayaran :</label>

                        <input type="date" class="form-control" name="tanggal_pembayaran"
                            value="{{ $tanggal_sekarang }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label>Total Harga :</label>

                        <input type="text" class="form-control" name="jumlah_harga" value="{{ $harga[0]->harga }}"
                            readonly>
                    </div>

                    <label>Pilih Metode Pembayaran :</label>
                    <div class="text-center">
                        <select class="form-select" name="payment_method">

                            <option value="cash">cash</option>
                            <option value="transfer">transfer</option>

                        </select>

                    </div>
                    <br>

                    <div class="mb-6 text-center">
                        <a href="/movie"class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">Pesan</button>
                    </div>

                </form>
            </div>
            {{-- <div class="card-footer text-muted">
            2 days ago
        </div> --}}
        </div>
    @endforeach
@endsection
