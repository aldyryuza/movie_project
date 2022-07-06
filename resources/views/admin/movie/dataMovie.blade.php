@extends('layout.main')
@php
$title = 'Data - Movies';
@endphp

@section('content')
    <br>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-success btn-sm float-end mx-6 " data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="fas fa-plus"></i> Tambah
    </button>
    <br><br>
    <div class="card">
        <div class="card-body">
            <p class="fw-bold fs-4">Data Movies</p>



            <table id="dataMovies" class="table table-hover table-responsive-md table-bordered">
                <thead class="table-secondary">
                    <tr>
                        <th>No</th>
                        <th>Nama Film</th>
                        <th>Bahasa </th>
                        <th>Durasi</th>
                        <th>Genre</th>
                        <th>Reales</th>
                        <th>Tanggal Tayang</th>
                        <th>Tanggal Akhir</th>
                        <th>Opsi</th>
                </thead>
                <tbody>

                    {{-- @php
                    $rekap = DB::select('select * from rekap_harian where id_kandang = ?', [$detail->id]);
                    
                @endphp --}}

                    @foreach ($movies as $r)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $r->nama_film }}</td>
                            <td>{{ $r->bahasa_film }}</td>
                            <td>{{ $r->durasi_film }}</td>
                            <td>{{ $r->tipe_film }}</td>
                            <td>{{ $r->tanggal_rilis }}</td>
                            <td>{{ $r->tanggal_tayang }}</td>
                            <td>{{ $r->tanggal_akhir }}</td>

                            <td>
                                <a href="/movie/edit/{{ $r->id }}">
                                    <span class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</span>
                                </a>



                                <form action="/movie/delete/{{ $r->id }}" method="post" class="d-inline"
                                    onsubmit="return confirm('Yakin hapus data ?')">
                                    @method('delete')
                                    @csrf

                                    <input type="hidden" name="idKandang" value="{{ $r->id_kandang }}">
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Film</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">



                    <form action="/movie/upload" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class=" modal-body">
                            <div class="mb-3">
                                <label for="id">Nama Film / Movies</label>
                                <input type="text" class="form-control" id="nama_film" name="nama_film"
                                    placeholder="....">
                            </div>
                            <div class="mb-3">
                                <label for="id">Bahasa Film</label>
                                <input type="text" class="form-control" id="bahasa_film" name="bahasa_film"
                                    placeholder="....">
                            </div>
                            <div class="mb-3">
                                <label for="id">Durasi Film</label>
                                <input type="text" class="form-control" id="durasi_film" name="durasi_film"
                                    placeholder="....">
                            </div>
                            <div class="mb-3">
                                <label for="id">Tipe Film</label>
                                <input type="text" class="form-control" id="tipe_film" name="tipe_film"
                                    placeholder="....">
                            </div>
                            <div class="mb-3">
                                <label for="id">Tanggal Rilis</label>
                                <input type="date" class="form-control" id="tanggal_rilis" name="tanggal_rilis"
                                    placeholder="....">
                            </div>
                            <div class="mb-3">
                                <label for="id">Tanggal Tayang</label>
                                <input type="date" class="form-control" id="tanggal_tayang" name="tanggal_tayang"
                                    placeholder="....">
                            </div>
                            <div class="mb-3">
                                <label for="id">Tanggal Berakhir</label>
                                <input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir"
                                    placeholder="....">
                            </div>

                            <div class="mb-3">
                                <label for="id">Sinopsis</label>
                                <textarea class="form-control" rows="3" id="sinopsis" name="sinopsis"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="id">Gambar Film</label>
                                <input type="file" class="form-control" id="gambar_film" name="gambar_film"
                                    placeholder="....">
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
            $('#dataMovies').DataTable();
        });
    </script>
    @if (session()->has('success'))
        <script>
            toastr.success(`{{ session('success') }}`);
        </script>
    @endif
@endsection
