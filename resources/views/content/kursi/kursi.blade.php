@extends('layout.main')
@php
$title = 'List - Kursi';

$noKursi = DB::table('audi_seat')
    ->join('audi', 'audi_seat.id_audi', '=', 'audi.id')
    ->get();

@endphp
<br>
@section('content')
    <center>
        <div class="card w-50 text-center">
            <div class="card-header">
                {{-- <p class="fw-bold fs-4">List Kursi</p> --}}
                <h3>
                    Studio # {{ $noKursi[0]->id_audi }}
                </h3>

            </div>
            <div class="card-body">
                {{-- <table id="datakursi" class="table table-hover table-responsive-md table-bordered ">
                    <thead class="table-secondary ">
                        <tr>
                            <th>No</th>
                            <th>Nama Studio</th>
                            <th>Jumlah Kursi </th>
                            <th>Nomor Kursi</th>
                            <th>Status</th>


                    </thead>
                    <tbody>



                        @foreach ($noKursi as $r)
                            <tr class="text-center">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $r->no_studio }}</td>
                                <td>{{ $r->total_kursi }}</td>
                                <td>{{ $r->no_studio }}{{ $r->nomor_kursi }}</td>
                                <td class=" {{ $r->tipe === '0' ? 'badge bg-primary' : 'badge bg-danger' }}">
                                    {{ $r->tipe === '0' ? 'Belum Di Pesan' : 'Sudah Di Pesan' }}
                                </td>



                            </tr>
                        @endforeach
                    </tbody>

                </table> --}}

                {{-- Kursi --}}
                <center>
                    <div class="card w-50 border-5">
                        <h1>SCREEN</h1>
                    </div>
                </center>
                <center>
                    <div class="card w-75 border-0 ">
                        <div class="btn-toolbar my-3" role="toolbar" aria-label="Toolbar with button groups">
                            <div class="btn-group me-2" role="group" aria-label="First group">

                                <div class=" ">
                                    @foreach ($noKursi as $r)
                                        <button type="button"
                                            class="btn btn-primary mt-2 ">{{ $r->no_studio }}{{ $r->kursi }}
                                        </button>
                                    @endforeach
                                </div>

                            </div>

                        </div>
                    </div>
                </center>
            </div>


        </div>
    </center>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#datakursi').DataTable();
        });
    </script>
@endsection
