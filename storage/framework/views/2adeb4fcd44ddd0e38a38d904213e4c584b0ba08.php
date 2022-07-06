

<?php
$title = 'Edit - Data Movie';
?>

<?php $__env->startSection('content'); ?>
    <br>
    <h3 class="text-center">Edit Data Film</h3>
    <br>


    <?php $__currentLoopData = $movieEdit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <form action="/movie/update" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <input type="hidden" class="form-control" id="id" name="id" placeholder="...."
                            value="<?php echo e($r->id); ?>">
                        <label for="id">Nama Film / Movies</label>
                        <input type="text" class="form-control" id="nama_film" name="nama_film" placeholder="...."
                            value="<?php echo e($r->nama_film); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="id">Bahasa Film</label>
                        <input type="text" class="form-control" id="bahasa_film" name="bahasa_film" placeholder="...."
                            value="<?php echo e($r->bahasa_film); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="id">Durasi Film</label>
                        <input type="text" class="form-control" id="durasi_film" name="durasi_film" placeholder="...."
                            value="<?php echo e($r->durasi_film); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="id">Tipe Film</label>
                        <input type="text" class="form-control" id="tipe_film" name="tipe_film" placeholder="...."
                            value="<?php echo e($r->tipe_film); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="id">Tanggal Rilis</label>
                        <input type="date" class="form-control" id="tanggal_rilis" name="tanggal_rilis"
                            placeholder="...." value="<?php echo e($r->tanggal_rilis); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="id">Tanggal Tayang</label>
                        <input type="date" class="form-control" id="tanggal_tayang" name="tanggal_tayang"
                            placeholder="...." value="<?php echo e($r->tanggal_tayang); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="id">Tanggal Akhir</label>
                        <input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir"
                            placeholder="...." value="<?php echo e($r->tanggal_akhir); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="id">Sinopsis</label>
                        <textarea class="form-control" rows="3" id="sinopsis" name="sinopsis"><?php echo e($r->sinopsis); ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="id">Gambar Film</label>
                        <input type="file" class="form-control" id="gambar_film" name="gambar_film" placeholder="...."
                            value="<?php echo e($r->gambar_film); ?>">

                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <a href="/movie/data" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\webserver\htdocs\LARAVEL\movie_project\resources\views/admin/movie/editMovie.blade.php ENDPATH**/ ?>