
<?php
$title = 'Pembayaran';
$tanggal_sekarang = date('Y-m-d');
// dd($tanggal_sekarang);
?>

<?php $__env->startSection('content'); ?>
    <br>
    <div class="card w-50">
        <div class="card-header">
            <h5>Pilih Pembayaran </h5>
        </div>
        <div class="card-body">
            
            

            <form action="upload/pembayaran" method="post">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="id_booking">
                <div class="mb-3">
                    <label>Tanggal Pembayaran :</label>

                    <input type="date" class="form-control" name="tanggal_pembayaran" value="<?php echo e($tanggal_sekarang); ?>"
                        readonly>
                </div>
                <div class="mb-3">
                    <label>Total Harga :</label>

                    <input type="text" class="form-control" name="jumlah_harga" value="<?php echo e($tanggal_sekarang); ?>"
                        readonly>
                </div>

                <div class="text-center">
                    <input type="submit" class="btn btn-success" value="cash" name="payment_method">
                    <input type="submit" class="btn btn-danger" value="transfer" name="payment_method">
                </div>
            </form>


        </div>
        
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <?php if(session()->has('success')): ?>
        <script>
            toastr.success(`<?php echo e(session('success')); ?>`);
        </script>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\webserver\htdocs\LARAVEL\movie_project\resources\views/content/payment/payment.blade.php ENDPATH**/ ?>