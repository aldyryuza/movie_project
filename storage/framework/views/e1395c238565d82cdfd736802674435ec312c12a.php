

<?php
$title = 'Edit Data - Karyawan';
?>
<?php $__env->startSection('content'); ?>
    <form action="/karyawan/update/<?php echo e($karyawan->id); ?>" method="post" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class=" modal-body">
            <div class="mb-3">

                <label for="nama_karyawan">Nama Karyawan</label>
                <input type="text" class="form-control" id="nama_karyawan" name="nama_karyawan" placeholder="...."
                    value="<?php echo e($karyawan->nama_karyawan); ?>">
            </div>
            <div class="mb-3">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="...."
                    value="<?php echo e($karyawan->username); ?>">
            </div>
            <div class="mb-3">
                <label for="password">Password</label>
                <input type="text" class="form-control" id="password" name="password" placeholder="...."
                    value="<?php echo e($karyawan->password); ?>">
            </div>


        </div>
        <div class="modal-footer">
            <a href="/karyawan" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\webserver\htdocs\LARAVEL\movie_project\resources\views/admin/karyawan/editKaryawan.blade.php ENDPATH**/ ?>