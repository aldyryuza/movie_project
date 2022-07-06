@extends('layout.main')

@php
$title = 'Show Seat';

$sisa = DB::select('SELECT COUNT(status) AS NumberOfProducts FROM show_seat WHERE status=?', [2]);
$sisa = $sisa[0]->NumberOfProducts;
// dd($sisa);
$showsSeat = DB::table('show_seat')
    ->join('show', 'show.id_show', '=', 'show_seat.show_id')
    ->join('movie', 'show.id_movie', '=', 'movie.id')
    ->join('audi_seat', 'show_seat.id_seat_audi', '=', 'audi_seat.id_audi_seat')
    ->get();

// dd($showsSeat);

@endphp



@section('content')
    <br>
    <!-- Button trigger modal -->

    <br><br>
    <div class="card">
        <div class="card-body">
            <div class="float-end">
                <button type="button" class="btn btn-success position-relative btn-sm" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    Sisa Kursi
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        {{ $sisa }}
                        <span class="visually-hidden">unread messages</span>
                    </span>
                </button>



            </div>
            <p class="fw-bold fs-4">Data Show Seat</p>


            <table id="dataMovies" class="table table-hover table-responsive-md table-bordered">
                <thead class="table-secondary">
                    <tr>
                        <th>No</th>
                        <th>Kursi</th>
                        <th>Movie</th>
                        <th>Jam Mulai</th>
                        <th>Jam Akhir</th>
                        <th>Status</th>

                </thead>
                <tbody>


                    @foreach ($showsSeat as $r)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $r->kursi }}</td>
                            <td>{{ $r->nama_film }}</td>
                            <td>{{ $r->jam_mulai }}</td>
                            <td>{{ $r->jam_selesai }}</td>
                            <td class="badge rounded-pill bg-danger mt-2 ">
                                {{ $r->status == '1' ? 'Sudah Di Booking' : '' }}
                            </td>




                        </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Data Sisa Kursi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    @php
                        $show = DB::table('show_seat');
                        
                    @endphp
                    <center>
                        <div class="card w-50 text-center">
                            <div class="card-header">
                                {{-- <p class="fw-bold fs-4">List Kursi</p> --}}
                                <h3>
                                    Studio # {{ $showSeat[0]->id }}
                                </h3>

                            </div>
                            <div class="card-body">



                                <center>
                                    <div class="card  border-0 ">
                                        <div class="btn-toolbar my-3" role="toolbar"
                                            aria-label="Toolbar with button groups">
                                            <div class="btn-group me-2" role="group" aria-label="First group">

                                                <div class="">
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

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#dataMovies').DataTable();
        });
    </script>
    @if (session()->has('success'))
        <script>
            toastr.success(`{{ session('success') }}`);
        </script>
    @endif
@endsection
