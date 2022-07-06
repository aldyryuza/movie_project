
<?php
$title = 'Data - Movies';
?>

<?php $__env->startSection('content'); ?>
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

                    

                    <?php $__currentLoopData = $movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td><?php echo e($r->nama_film); ?></td>
                            <td><?php echo e($r->bahasa_film); ?></td>
                            <td><?php echo e($r->durasi_film); ?></td>
                            <td><?php echo e($r->tipe_film); ?></td>
                            <td><?php echo e($r->tanggal_rilis); ?></td>
                            <td><?php echo e($r->tanggal_tayang); ?></td>
                            <td><?php echo e($r->tanggal_akhir); ?></td>

                            <td>
                                <a href="/movie/edit/<?php echo e($r->id); ?>">
                                    <span class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</span>
                                </a>



                                <form action="/movie/delete/<?php echo e($r->id); ?>" method="post" class="d-inline"
                                    onsubmit="return confirm('Yakin hapus data ?')">
                                    <?php echo method_field('delete'); ?>
                                    <?php echo csrf_field(); ?>

                                    <input type="hidden" name="idKandang" value="<?php echo e($r->id_kandang); ?>">
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Film</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">



                    <form action="/movie/upload" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        $(document).ready(function() {
            $('#dataMovies').DataTable();
        });
    </script>
    <?php if(session()->has('success')): ?>
        <script>
            toastr.success(`<?php echo e(session('success')); ?>`);
        </script>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\webserver\htdocs\LARAVEL\movie_project\resources\views/admin/movie/dataMovie.blade.php ENDPATH**/ ?>