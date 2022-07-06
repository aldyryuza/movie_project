
<?php
$title = 'Edit Data-Show';
$movie = DB::table('movie')->get();
$audi = DB::table('audi')->get();
?>
<?php $__env->startSection('content'); ?>
    <br>
    <div class="card w-75">
        <div class="card-body">
            <p class="fw-bold fs-4">Edit Data Show Movies</p>
            <?php $__currentLoopData = $show; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <form action="/show/update/<?php echo e($r->id_show); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <input type="hidden" value="<?php echo e($r->id_show); ?>" name="id_show">
                        <label for="id">Nama Film / Movies</label>
                        <select class="form-select" name="id_movie" id="">
                            <option value="<?php echo e($r->id_movie); ?>"><?php echo e($r->id_movie); ?></option>
                            <?php $__currentLoopData = $movie; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($m->id); ?>"><?php echo e($m->nama_film); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id">Jam Mulai</label>
                        <input type="time" class="form-control" id="jam_mulai" name="jam_mulai"
                            value="<?php echo e($r->jam_mulai); ?>" placeholder="....">
                    </div>
                    <div class="form-group">
                        <label for="jam_mulai">Jam Mulai</label>
                        <input type="time" class="form-control" id="jam_mulai" name="jam_mulai"
                            value="<?php echo e($r->jam_mulai); ?>">
                    </div>
                    <div class="form-group">
                        <label for="id">Jam Selesai</label>
                        <input type="time" class="form-control" id="jam_selesai" name="jam_selesai"
                            value="<?php echo e($r->jam_selesai); ?>" placeholder="....">
                    </div>
                    <div class="form-group">
                        <label for="id">Studio Penayangan</label>
                        <select class="form-select" name="id_audi" id="">
                            <option value="<?php echo e($r->id_audi); ?>"><?php echo e($r->id_audi); ?></option>
                            <?php $__currentLoopData = $audi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($m->id); ?>">Studio# <?php echo e($m->id); ?>

                                    | <?php echo e($m->total_kursi); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id">Harga Film</label>
                        <input type="number" class="form-control" id="" name="harga"
                            value="<?php echo e($r->harga); ?>" placeholder="$">
                    </div>
                    <div class="form-group mt-3 float-end">
                        <a href="/show"class="btn btn-secondary" data-dismiss="modal">Close</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\webserver\htdocs\LARAVEL\movie_project\resources\views/content/show/editShow.blade.php ENDPATH**/ ?>