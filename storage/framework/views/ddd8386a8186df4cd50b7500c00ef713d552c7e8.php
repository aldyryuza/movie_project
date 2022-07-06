

<?php
$title = 'Pemesanan-Tiket';
$tanggal_sekarang = date('Y-m-d');
?>

<?php $__env->startSection('content'); ?>
    <br>

    <?php $__currentLoopData = $tiketId; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="card ">
            <div class="card-header text-center">
                <h4>Pemesanan Tiket</h4>
            </div>
            <div class="card-body">
                <form action="/booking" method="POST">
                    <?php echo csrf_field(); ?>

                    <div class="text-center">
                        <img src="../../gambar/<?php echo e($item->gambar_film); ?>" class="rounded img-thumbnail"
                            alt="<?php echo e($item->gambar_film); ?>" width="200" height="200">

                    </div>

                    <input type="hidden" class="form-control" value="<?php echo e($item->id); ?>" name="id_show">

                    <?php
                        $showSeat = DB::table('show_seat')
                            // ->where('status', '=', '0')
                            ->get();
                        $harga = DB::table('show')
                            ->where('id_movie', '=', $item->id)
                            ->get();
                        
                    ?>

                    <div class="mb-3">
                        <input type="hidden" class="form-control" placeholder="....." name="jumlah_kursi" value="1">
                    </div>
                    <div class="mb-3" hidden>
                        <label class="form-label">ID User</label>
                        <input type="number" class="form-control" placeholder="....." value="<?php echo e(Auth::user()->id); ?>"
                            name="id_user">
                    </div>

                    <div class="mb-3">
                        <label for="disabledSelect" class="form-label">Pilih Kursi</label>
                        
                        <br>
                        <center>
                            <div class="card w-50 text-center">
                                <div class="card-header">
                                    
                                    <h3>
                                        Studio # <?php echo e($showSeat[0]->id); ?>

                                    </h3>

                                </div>
                                <div class="card-body">


                                    
                                    <center>
                                        <div class="card w-50 border-5">
                                            <h1>SCREEN</h1>
                                        </div>
                                    </center>
                                    <center>
                                        <div class="card w-75 border-0 ">
                                            <div class="btn-toolbar my-3" role="toolbar"
                                                aria-label="Toolbar with button groups">
                                                <div class="btn-group me-2" role="group" aria-label="First group">

                                                    <div class=" ">
                                                        <?php $__currentLoopData = $showSeat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <input type="radio" class="btn-check " name="id_show_seat"
                                                                id="<?php echo e($item->id_seat_audi); ?>"
                                                                value="<?php echo e($item->id_seat_audi); ?>"
                                                                <?php echo e($item->status === '1' ? 'disabled' : ''); ?>>
                                                            <label
                                                                class="btn <?php echo e($item->status === '1' ? 'btn-danger' : 'btn-outline-success'); ?>  mt-2"
                                                                for="<?php echo e($item->id_seat_audi); ?>"><?php echo e($item->id_seat_audi); ?>

                                                            </label>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </center>
                                </div>


                            </div>
                        </center>
                    </div>

                    <input type="hidden" name="id_booking">
                    <div class="mb-3">
                        <label>Tanggal Pembayaran :</label>

                        <input type="date" class="form-control" name="tanggal_pembayaran"
                            value="<?php echo e($tanggal_sekarang); ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label>Total Harga :</label>

                        <input type="text" class="form-control" name="jumlah_harga" value="<?php echo e($harga[0]->harga); ?>"
                            readonly>
                    </div>

                    <label>Pilih Metode Pembayaran :</label>
                    <div class="text-center">
                        <select class="form-select" name="payment_method">

                            <option value="cash">cash</option>
                            <option value="transfer">transfer</option>

                        </select>

                    </div>
                    <br>

                    <div class="mb-6 text-center">
                        <a href="/movie"class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">Pesan</button>
                    </div>

                </form>
            </div>
            
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\webserver\htdocs\LARAVEL\movie_project\resources\views/user/pemesanan/pemesananTiket.blade.php ENDPATH**/ ?>