
<?php
$title = 'Movie-Detail';
?>

<?php $__env->startSection('content'); ?>
    <br>
    <?php $__currentLoopData = $movieId; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="/gambar/<?php echo e($r->gambar_film); ?>" class="img-fluid rounded-start" height="400px" width="400px"
                        alt="<?php echo e($r->gambar_film); ?>">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo e($r->nama_film); ?></h5>
                        <p>
                            <i class="fas fa-clock"></i> <?php echo e($r->durasi_film); ?> | <i class="fas fa-film"></i>
                            <?php echo e($r->tipe_film); ?> | <i class="fas fa-book"></i> <?php echo e($r->bahasa_film); ?>

                        </p>
                        <p class="card-text"><?php echo e($r->sinopsis); ?></p>

                        <p class="card-text"><small class="text-muted">Tanggal rilis di bioskop
                                <?php echo e($r->tanggal_rilis); ?></small></p>

                        <div class="float-end my-3">
                            <a href="/movie" class="btn btn-secondary"> <i class="fas fa-backward"></i> Kembali</a>
                            <a href="#" class="btn btn-success"> <i class="fas fa-edit"></i> Pesan tiket</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <?php if(session()->has('success')): ?>
        <script>
            toastr.success(`<?php echo e(session('success')); ?>`);
        </script>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\webserver\htdocs\LARAVEL\movie_project\resources\views/content/movie/detail-movie.blade.php ENDPATH**/ ?>