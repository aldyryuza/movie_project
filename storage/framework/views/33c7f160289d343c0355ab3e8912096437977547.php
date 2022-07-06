<head>
    
    <script src="<?php echo e(asset('js/Jquery.3.6.js')); ?>"></script>

    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Daftar Akun</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="<?php echo e(asset('css/styles.css')); ?>" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

</head>

<link rel="stylesheet" href="<?php echo e(asset('css/register.css')); ?>">

<body>

    <div class="bg-dark">
        <section class="vh-100 gradient-custom">
            <div class="container py-5 h-100">
                <div class="row justify-content-center align-items-center h-100">
                    <div class="col-12 col-lg-9 col-xl-7">
                        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                            <div class="card-body p-4 p-md-5">
                                <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>

                                <form action="/register/upload" method="post" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <div class="row">
                                        <div class="col-md-6 mb-4">

                                            <div class="form-outline">
                                                <input type="text" id="name" name="name"
                                                    class="form-control form-control-lg" />
                                                <label class="form-label" for="name">Name</label>
                                            </div>

                                        </div>
                                        <div class="col-md-6 mb-4">

                                            <div class="form-outline">
                                                <input type="text" id="username" name="username"
                                                    class="form-control form-control-lg" />
                                                <label class="form-label" for="username">Username</label>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-4 d-flex align-items-center">

                                            <div class="form-outline datepicker w-100">
                                                <input type="tel" id="no_hp" name="no_hp"
                                                    class="form-control form-control-lg" />
                                                <label class="form-label" for="no_hp">Phone Number</label>
                                            </div>


                                        </div>
                                        
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-4 pb-2">

                                            <div class="form-outline">
                                                <input type="email" id="email" name="email"
                                                    class="form-control form-control-lg" />
                                                <label class="form-label" for="email">Email</label>
                                            </div>

                                        </div>
                                        <div class="col-md-6 mb-4 pb-2">

                                            <div class="form-outline">
                                                <input type="password" id="phoneNumber"
                                                    class="form-control form-control-lg" name="password" />
                                                <label class="form-label" for="phoneNumber">Password</label>
                                            </div>
                                            <input type="hidden" class="form-control form-control-lg" name="status"
                                                value="customer" />

                                        </div>

                                    </div>


                                    <div class="mt-4 pt-2 float-end">
                                        <a href="/movie" class="btn btn-secondary btn-lg">Back</a>
                                        <input class="btn btn-primary btn-lg" type="submit" value="Submit" />
                                    </div>


                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="<?php echo e(asset('js/scripts.js')); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>

</body>
<?php /**PATH D:\webserver\htdocs\LARAVEL\movie_project\resources\views/content/daftar/daftarCustomer.blade.php ENDPATH**/ ?>