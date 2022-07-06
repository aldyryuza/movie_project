 <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
     <!-- Navbar Brand-->
     <a class="navbar-brand ps-3" href="#">Movie Ticket</a>
     <!-- Sidebar Toggle-->
     <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
             class="fas fa-bars"></i></button>
     <!-- Navbar Search-->
     <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
         
     </form>
     <!-- Navbar-->
     <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
         <?php if(auth()->guard()->check()): ?>
             <li class="nav-item dropdown">
                 <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                     data-bs-toggle="dropdown" aria-expanded="false"> <?php echo e(Auth::user()->name); ?> is a
                     <?php echo e(Auth::user()->status); ?> <i class="fas fa-user fa-fw"></i></a>
                 <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                     <li><a class="dropdown-item" href="#!">Settings</a></li>
                     <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                     <li>
                         <hr class="dropdown-divider" />
                     </li>
                     <li>
                         <form action="/logout" method="post">
                             <?php echo csrf_field(); ?>
                             <button type="submit" class="dropdown-item">Logout</button>

                         </form>
                     </li>
                 </ul>
             </li>
         <?php else: ?>
             <a href="/login" class="btn btn-success"><i class="fas fa-sign-in-alt"></i> Login </a>
         <?php endif; ?>
     </ul>
 </nav>
<?php /**PATH D:\webserver\htdocs\LARAVEL\movie_project\resources\views/layout/banner.blade.php ENDPATH**/ ?>