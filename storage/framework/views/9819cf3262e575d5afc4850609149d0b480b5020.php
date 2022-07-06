
<?php
$title = 'List Pembayaran User';
$tanggal_sekarang = date('Y-m-d');
// dd($tanggal_sekarang);
?>

<?php $__env->startSection('content'); ?>
    <br>
    <div class="card">
        <div class="card-body">
            <p class="fw-bold fs-4 text-center">List Data Pembayaran User</p>



            <table id="dataPembayaran" class="table table-hover table-responsive-md table-bordered">
                <thead class="table-secondary">
                    <tr>
                        <th>No</th>
                        <th>Nama User</th>
                        <th>Film </th>
                        <th>Harga Film </th>
                        <th>Pembayaran</th>

                </thead>
                <tbody>

                    

                    <?php $__currentLoopData = $booking; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td><?php echo e($r->name); ?></td>
                            <td><?php echo e($r->nama_film); ?></td>
                            <td><?php echo e($r->jumlah_harga); ?></td>
                            <td><?php echo e($r->payment_method); ?></td>
                            



                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>

            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        $(document).ready(function() {
            $('#dataPembayaran').DataTable();
        });
    </script>
    <?php if(session()->has('success')): ?>
        <script>
            toastr.success(`<?php echo e(session('success')); ?>`);
        </script>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\webserver\htdocs\LARAVEL\movie_project\resources\views/content/payment/listPayment.blade.php ENDPATH**/ ?>