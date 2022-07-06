

<?php
$title = 'Show Movie-List';
?>

<?php $__env->startSection('content'); ?>
    <br>
    <h2 class="text-center"> List Data Show Movie</h2>


    <div class="row row-cols-1 row-cols-md-3 g-4 mt-1">

        <?php $__currentLoopData = $shows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col">
                <div class="card h-100">
                    <img src="gambar/<?php echo e($r->gambar_film); ?>" class="card-img-top " height="400px" width="400px"
                        alt="<?php echo e($r->gambar_film); ?>">

                    <div class="card-body">
                        <h5 class="card-title"><?php echo e($r->nama_film); ?></h5>
                        <h6>
                            Mulai : <?php echo e($r->jam_mulai); ?> | Akhir : <?php echo e($r->jam_selesai); ?>

                        </h6>
                        <h4>
                            Rp. <?php echo e($r->harga); ?>

                        </h4>
                    </div>
                    <div class="card-footer">
                        <div class="float-end">
                            <a href="/movie/<?php echo e($r->id); ?>" class="btn btn-primary btn-sm"> <i class="fas fa-info"></i>
                                Detail </a>
                            
                            <!-- Button trigger modal -->
                            <?php if(Auth::check()): ?>
                                <a href="/pemesanan/tiket/<?php echo e($r->id); ?>" class="btn btn-info btn-sm"
                                    data-toggle="modal" data-target="#beliTiket">
                                    <i class="fas fa-dollar-sign"></i> Beli Tiket </a>
                                
                            <?php else: ?>
                                <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    <i class="fas fa-dollar-sign"></i> Beli Tiket
                                </button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New Message!!</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Silahkan <b>Login</b> Terlebih Dahulu, Untuk Melakukan Pembelian Tiket
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <a href="/register" class="btn btn-warning">Daftar Akun</a>
                        <a href="/login" class="btn btn-primary">Login <i class="fas fa-sign-in-alt"></i></a>

                    </div>
                </div>
            </div>
        </div>
        

    </div>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('scripts'); ?>
    <?php if(session()->has('success')): ?>
        <script>
            toastr.success(`<?php echo e(session('success')); ?>`);
            Swal.fire(
                'Tiket Berhasil Dipesan!',
                'Siahkan Cek Di Bagian Dashboard Anda',
                'success'
            )
        </script>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\webserver\htdocs\LARAVEL\movie_project\resources\views/content/show/showMovies.blade.php ENDPATH**/ ?>