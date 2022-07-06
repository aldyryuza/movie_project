@extends('layout.main')
@php
$title = 'Data - Karyawan';
@endphp

@section('content')
    <br>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-success btn-sm float-end mx-6 " data-bs-toggle="modal"
        data-bs-target="#exampleModal">
        <i class="fas fa-plus"></i> Tambah
    </button>
    <br><br>
    <div class="card">
        <div class="card-body">
            <p class="fw-bold fs-4">Data Karyawan</p>



            <table id="dataKaryawan" class="table table-hover table-responsive-md table-bordered">
                <thead class="table-secondary">
                    <tr>
                        <th>No</th>
                        <th>Nama Karyawan</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Opsi</th>
                </thead>
                <tbody>

                    {{-- @php
                    $rekap = DB::select('select * from rekap_harian where id_kandang = ?', [$detail->id]);
                    
                @endphp --}}

                    @foreach ($karyawan as $r)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $r->nama_karyawan }}</td>
                            <td>{{ $r->username }}</td>
                            <td>{{ $r->password }}</td>
                            <td>
                                <a href="/karyawan/edit/{{ $r->id }}">
                                    <span class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</span>
                                </a>



                                <form action="/karyawan/delete/{{ $r->id }}" method="post" class="d-inline"
                                    onsubmit="return confirm('Yakin hapus data ?')">
                                    @method('delete')
                                    @csrf

                                    <input type="hidden" name="id" value="{{ $r->id }}">
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>
                                        Hapus</button>
                                </form>
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Karyawan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/karyawan/upload" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class=" modal-body">
                            <div class="mb-3">
                                <label for="nama_karyawan">Nama Karyawan</label>
                                <input type="text" class="form-control" id="nama_karyawan" name="nama_karyawan"
                                    placeholder="....">
                            </div>
                            <div class="mb-3">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="....">
                            </div>
                            <div class="mb-3">
                                <label for="password">Password</label>
                                <input type="text" class="form-control" id="password" name="password" placeholder="....">
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#dataKaryawan').DataTable();
        });
    </script>
    @if (session()->has('success'))
        <script>
            toastr.success(`{{ session('success') }}`);
        </script>
    @endif
@endsection
