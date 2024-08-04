<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Admin Login</title>
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta property="og:title" content="" />
        <meta property="og:type" content="" />
        <meta property="og:url" content="" />
        <meta property="og:image" content="" />
         <!-- Favicon -->
        <?php
            $logo = get_setting('site_favicon');
        ?>
        <?php if($logo != null): ?>
            <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset(get_setting('site_favicon')->value ?? ' ')); ?>" />
        <?php else: ?>
            <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('upload/no_image.jpg')); ?>" alt="<?php echo e(env('APP_NAME')); ?>" />
        <?php endif; ?>
        <!-- Template CSS -->
        <link href="<?php echo e(asset('backend/assets/css/main.css?v=1.1 ' )); ?>" rel="stylesheet" type="text/css" />
        <!-- toastr css -->
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    </head>

    <body>
        <main>
            <section class="content-main">
                <div class="card mx-auto card-login shadow-lg" style="margin-top: 70px;">
                    <div class="card-body">

                        <!-- start login aleart message show -->
                            <?php if(Session::has('error')): ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                              <strong><?php echo e(session::get('error')); ?></strong>
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <?php endif; ?>
                            <!-- end login aleart message show -->

                        <h4 class="card-title mb-4 text-center">Admin Login</h4>
                        <form action="<?php echo e(route('admin.login')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                            <div class="mb-3">
                                <input class="form-control" placeholder="Username or email" type="text" id="email" name="email" value="<?php echo e(old('email')); ?>"/>
                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger" style="font-weight: bold;"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <!-- form-group// -->
                            <div class="mb-3">
                                <input class="form-control" placeholder="Password" id="password" type="password" name="password" />
                                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger" style="font-weight: bold;"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <!-- form-group// -->
                            <div class="mb-3">
                                <a href="<?php echo e(route('password.request')); ?>" class="float-end font-sm text-muted">Forgot password?</a>
                                <label class="form-check">
                                    <input type="checkbox" class="form-check-input" checked="" />
                                    <span class="form-check-label">Remember</span>
                                </label>
                            </div>
                            <!-- form-group form-check .// -->
                            <div class="mb-4">
                                <button type="submit" class="btn btn-primary w-100 justify-content-center">Login</button>
                            </div>
                            <!-- form-group// -->
                        </form>
                        <style type="text/css">
                            table, tbody, tfoot, thead, tr, th, td{
                                border: 1px solid #dee2e6 !important;
                            }
                            th{
                                font-weight: bolder !important;
                            }
                            .custom_input input, button, select, optgroup, textarea {
                                margin: 0;
                                font-family: 'helveticaregular';
                                font-size: inherit;
                                line-height: inherit;
                                border: none;
                                width: 72px;
                            }
                        </style>
                        <div class="mt-4">
                            <table class="table table-bordered custom_input">
                                <tbody>
                                    <tr>
                                        <td>admin@gmail.com</td>
                                        <td><input type="password" name="" value="12345678" disabled></td>
                                        <td><button  class="btn btn-info btn-xs" onclick="autoFill()">Copy</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <p class="text-center small text-muted mb-15">or sign up with</p>
                       
                        <p class="text-center mb-4">Don't have account? <a href="<?php echo e(route('admin.regester')); ?>">Sign up</a></p>
                    </div>
                </div>
            </section>
        </main>
        <script src="<?php echo e(asset('backend/assets/js/vendors/jquery-3.6.0.min.js ')); ?>"></script>
        <script src="<?php echo e(asset('backend/assets/js/vendors/bootstrap.bundle.min.js ')); ?>"></script>
        <script src="<?php echo e(asset('backend/assets/js/vendors/jquery.fullscreen.min.js ')); ?>"></script>
        <!-- Main Script -->
        <script src="<?php echo e(asset('backend/assets/js/main.js?v=1.1" type="text/javascript ')); ?>"></script>

        <!-- toastr js -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

        <!-- all toastr message show -->
        <script>
            <?php if(Session::has('message')): ?>
            var type = "<?php echo e(Session::get('alert-type','info')); ?>"
            switch(type){
                case 'info':
                toastr.info(" <?php echo e(Session::get('message')); ?> ");
                break;

                case 'success':
                toastr.success(" <?php echo e(Session::get('message')); ?> ");
                break;

                case 'warning':
                toastr.warning(" <?php echo e(Session::get('message')); ?> ");
                break;

                case 'error':
                toastr.error(" <?php echo e(Session::get('message')); ?> ");
                break; 
            }
            <?php endif; ?> 
        </script>

        <!-- 3 color toastr message show -->
        <script type="text/javascript">
            <?php if(Session::has('success')): ?>
                toastr.success("<?php echo e(Session::get('success')); ?>");
            <?php endif; ?>
            <?php if(Session::has('warning')): ?>
                toastr.warning("<?php echo e(Session::get('warning')); ?>");
            <?php endif; ?>
            <?php if(Session::has('info')): ?>
                toastr.info("<?php echo e(Session::get('info')); ?>");
            <?php endif; ?>
        </script>

        <!-- copy to password show  -->
        <script type="text/javascript">
            function autoFill(){
                $('#email').val('admin@gmail.com');
                $('#password').val('12345678');
            }
        </script>
    </body>
</html><?php /**PATH /mnt/home2/boibaariclassici/public_html/resources/views/admin/admin_login.blade.php ENDPATH**/ ?>