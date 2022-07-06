

<?php
$title = 'Data-Show';
$movie = DB::table('movie')->get();
$audi = DB::table('audi')->get();

$shows = DB::table('show')
    ->join('audi', 'show.id_audi', '=', 'audi.id')
    ->join('movie', 'show.id_movie', '=', 'movie.id')
    ->get();

?>

<?php $__env->startSection('content'); ?>
    <br>

    <div class="card">
        <div class="card-body">
            <button type="button" class="btn btn-success btn-sm float-end mx-6 " data-bs-toggle="modal"
                data-bs-target="#exampleModal">
                <i class="fas fa-plus"></i> Tambah
            </button>
            <p class="fw-bold fs-4">Data Show Movies</p>



            <table id="showMovies" class="table table-hover table-responsive-md table-bordered">
                <thead class="table-secondary">
                    <tr>
                        <th>No</th>
                        <th>Nama Film</th>
                        <th>Tanggal Tayang</th>
                        <th>Jam Tayang </th>
                        <th>Jam Akhir</th>
                        <th>Studio</th>
                        <th>Total Kursi</th>
                        <th>Harga Film</th>
                        <th>Opsi</th>
                </thead>
                <tbody>

                    

                    <?php $__currentLoopData = $shows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td><?php echo e($r->nama_film); ?></td>
                            <td><?php echo e($r->tanggal_tayang); ?></td>
                            <td><?php echo e($r->jam_mulai); ?></td>
                            <td><?php echo e($r->jam_selesai); ?></td>
                            <td> Studio # <?php echo e($r->id_audi); ?></td>
                            <td><?php echo e($r->total_kursi); ?></td>
                            <td> Rp. <?php echo e($r->harga); ?></td>

                            <td>

                                <a href="/show/edit/<?php echo e($r->id_show); ?>">
                                    <span class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</span>
                                </a>

                                <form action="/show/delete/<?php echo e($r->id_show); ?>" method="post" class="d-inline"
                                    onsubmit="return confirm('Yakin hapus data ?')">
                                    <?php echo method_field('delete'); ?>
                                    <?php echo csrf_field(); ?>

                                    <input type="hidden" name="idKandang" value="<?php echo e($r->id_show); ?>">
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>
                                        Hapus</button>
                                </form>

                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>

            </table>
        </div>
    </div>

    
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Show Movies</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">



                    <form action="/show/upload" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class=" modal-body">
                            <div class="mb-3">
                                <label for="id">Nama Film / Movies</label>
                                <select class="form-select" name="id_movie" id="">
                                    <option value="">Pilih Film ----</option>
                                    <?php $__currentLoopData = $movie; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($m->id); ?>"><?php echo e($m->nama_film); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>

                            </div>
                            <div class="mb-3">
                                <label for="id">Jam Mulai</label>
                                <input type="time" class="form-control" id="jam_mulai" name="jam_mulai"
                                    placeholder="....">
                            </div>
                            <div class="mb-3">
                                <label for="id">Jam Selesai</label>
                                <input type="time" class="form-control" id="jam_selesai" name="jam_selesai"
                                    placeholder="....">
                            </div>

                            <div class="mb-3">
                                <label for="id">Studio Penayangan</label>
                                <select class="form-select" name="id_audi" id="">
                                    <option value="">Pilih Studio ----</option>
                                    <?php $__currentLoopData = $audi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($m->id); ?>">Studio# <?php echo e($m->id); ?>

                                            | <?php echo e($m->total_kursi); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="id">Harga Film</label>
                                <input type="number" class="form-control" id="" name="harga" placeholder="$">
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        $(document).ready(function() {
            $('#showMovies').DataTable();
        });
    </script>
    <?php if(session()->has('success')): ?>
        <script>
            toastr.success(`<?php echo e(session('success')); ?>`);
        </script>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\webserver\htdocs\LARAVEL\movie_project\resources\views/content/show/show.blade.php ENDPATH**/ ?>