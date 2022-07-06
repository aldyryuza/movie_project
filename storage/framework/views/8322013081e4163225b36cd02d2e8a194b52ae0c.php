

<?php
$title = 'Show Seat';

$sisa = DB::select('SELECT COUNT(status) AS NumberOfProducts FROM show_seat WHERE status=?', [2]);
$sisa = $sisa[0]->NumberOfProducts;
// dd($sisa);
$showsSeat = DB::table('show_seat')
    ->join('show', 'show.id_show', '=', 'show_seat.show_id')
    ->join('movie', 'show.id_movie', '=', 'movie.id')
    ->join('audi_seat', 'show_seat.id_seat_audi', '=', 'audi_seat.id_audi_seat')
    ->get();

// dd($showsSeat);

?>



<?php $__env->startSection('content'); ?>
    <br>
    <!-- Button trigger modal -->

    <br><br>
    <div class="card">
        <div class="card-body">
            <div class="float-end">
                <button type="button" class="btn btn-success position-relative btn-sm" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    Sisa Kursi
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        <?php echo e($sisa); ?>

                        <span class="visually-hidden">unread messages</span>
                    </span>
                </button>



            </div>
            <p class="fw-bold fs-4">Data Show Seat</p>


            <table id="dataMovies" class="table table-hover table-responsive-md table-bordered">
                <thead class="table-secondary">
                    <tr>
                        <th>No</th>
                        <th>Kursi</th>
                        <th>Movie</th>
                        <th>Jam Mulai</th>
                        <th>Jam Akhir</th>
                        <th>Status</th>

                </thead>
                <tbody>


                    <?php $__currentLoopData = $showsSeat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td><?php echo e($r->kursi); ?></td>
                            <td><?php echo e($r->nama_film); ?></td>
                            <td><?php echo e($r->jam_mulai); ?></td>
                            <td><?php echo e($r->jam_selesai); ?></td>
                            <td class="badge rounded-pill bg-danger mt-2 ">
                                <?php echo e($r->status == '1' ? 'Sudah Di Booking' : ''); ?>

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
                    <h5 class="modal-title" id="exampleModalLabel">Data Sisa Kursi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <?php
                        $show = DB::table('show_seat');
                        
                    ?>
                    <center>
                        <div class="card w-50 text-center">
                            <div class="card-header">
                                
                                <h3>
                                    Studio # <?php echo e($showSeat[0]->id); ?>

                                </h3>

                            </div>
                            <div class="card-body">



                                <center>
                                    <div class="card  border-0 ">
                                        <div class="btn-toolbar my-3" role="toolbar"
                                            aria-label="Toolbar with button groups">
                                            <div class="btn-group me-2" role="group" aria-label="First group">

                                                <div class="">
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

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\webserver\htdocs\LARAVEL\movie_project\resources\views/content/show_seat/showSeat.blade.php ENDPATH**/ ?>