
<?php
$title = 'List - Kursi';

$noKursi = DB::table('audi_seat')
    ->join('audi', 'audi_seat.id_audi', '=', 'audi.id')
    ->get();

?>
<br>
<?php $__env->startSection('content'); ?>
    <center>
        <div class="card w-50 text-center">
            <div class="card-header">
                
                <h3>
                    Studio # <?php echo e($noKursi[0]->id_audi); ?>

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
                        <div class="btn-toolbar my-3" role="toolbar" aria-label="Toolbar with button groups">
                            <div class="btn-group me-2" role="group" aria-label="First group">

                                <div class=" ">
                                    <?php $__currentLoopData = $noKursi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <button type="button"
                                            class="btn btn-primary mt-2 "><?php echo e($r->no_studio); ?><?php echo e($r->kursi); ?>

                                        </button>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>

                            </div>

                        </div>
                    </div>
                </center>
            </div>


        </div>
    </center>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        $(document).ready(function() {
            $('#datakursi').DataTable();
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\webserver\htdocs\LARAVEL\movie_project\resources\views/content/kursi/kursi.blade.php ENDPATH**/ ?>