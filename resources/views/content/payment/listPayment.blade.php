@extends('layout.main')
@php
$title = 'List Pembayaran User';
$tanggal_sekarang = date('Y-m-d');
// dd($tanggal_sekarang);
@endphp

@section('content')
    <br>
    <div class="card">
        <div class="card-body">
            <p class="fw-bold fs-4 text-center">List Data Pembayaran User</p>



            <table id="dataPembayaran" class="table table-hover table-responsive-md table-bordered">
                <thead class="table-secondary">
                    <tr>
                        <th>No</th>
                        <th>Nama User</th>
                        <th>Film </th>
                        <th>Harga Film </th>
                        <th>Pembayaran</th>

                </thead>
                <tbody>

                    {{-- @php
                    $rekap = DB::select('select * from rekap_harian where id_kandang = ?', [$detail->id]);
                    
                @endphp --}}

                    @foreach ($booking as $r)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $r->name }}</td>
                            <td>{{ $r->nama_film }}</td>
                            <td>{{ $r->jumlah_harga }}</td>
                            <td>{{ $r->payment_method }}</td>
                            {{-- <td>{{ $r->id_show_seat }}</td> --}}



                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#dataPembayaran').DataTable();
        });
    </script>
    @if (session()->has('success'))
        <script>
            toastr.success(`{{ session('success') }}`);
        </script>
    @endif
@endsection
