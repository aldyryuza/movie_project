<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">


                <a class="nav-link" href="<?php echo e(url('tiket')); ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <a class="nav-link" href="<?php echo e(url('/show-Movies')); ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-film"></i></div>
                    Show Movie
                </a>

                <?php if(auth()->guard()->check()): ?>
                    <?php if(Auth::user()->status == 'admin'): ?>
                        <a class="nav-link" href="<?php echo e(url('movie/data')); ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Update Film
                        </a>

                        <a class="nav-link" href="<?php echo e(url('booking-list')); ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-dollar-sign"></i></div>
                            Booking List
                        </a>
                        <a class="nav-link" href="/user">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                            Data User
                        </a>
                        
                        <a class="nav-link" href="/show_seat">
                            <div class="sb-nav-link-icon"><i class="fas fa-heart"></i></div>
                            Show Seat
                        </a>
                        <a class="nav-link" href="/show">
                            <div class="sb-nav-link-icon"><i class="fas fa-film"></i></div>
                            Update Show Film
                        </a>
                    <?php endif; ?>

                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                <strong><?php echo e(Auth::user()->name); ?></strong>
            </div>
        <?php endif; ?>
    </nav>
</div>
<?php /**PATH D:\webserver\htdocs\LARAVEL\movie_project\resources\views/layout/sidebar.blade.php ENDPATH**/ ?>