<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title><?php echo e(config('app.name', 'Laravel')); ?></title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <!-- Bootstrap -->
    <link href="<?php echo e(asset('frontend/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/main.css?v=5.3')); ?>">
    <!-- font awesome -->
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/fontawesome.min.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/custom__font/stylesheet.css')); ?>">

    <!-- Sweetalert css-->
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/sweetalert2.css')); ?>">
    <!-- Template CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/plugins/slider-range.css ')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/plugins/animate.min.css')); ?>">
    <!-- Toastr css -->
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/toastr.css')); ?>">
    <!-- Custom Css -->
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/app.css')); ?>" />
    <script src="<?php echo e(asset('frontend/assets/js/vendor/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/vendor/jquery-3.6.0.min.js')); ?>"></script>

    <?php echo $__env->yieldContent('meta'); ?>
    <?php echo $__env->yieldPushContent('css'); ?>

    <style>
        .mobile-header-info-wrap {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 10px;
        }

        .mobile-header-info-wrap i {
            margin-right: 10px;
        }

        .mobile-social-icon h6 {
            padding: 13px;
            padding-bottom: 0;
        }
    </style>
</head>

<body>
    <?php echo $__env->yieldContent('content-frontend-model'); ?>

    <!-- Header -->
    <?php echo $__env->make('frontend.body.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--/ Header -->

    <!-- Main -->
    <main class="main">
        <?php echo $__env->yieldContent('content-frontend'); ?>
    </main>
    <!--/ Main -->

    <div class="menu-content" style="display: none;  right: 0;">
        <div class="close-btn" style="cursor: pointer;">
            <span>X</span>
            <span>Menu</span>
        </div>

        <nav id="sidebar" class="sidebar">
            <div class="position-sticky">
                <ul class="nav flex-column sidebar__nav">
                    <li class="nav-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
                    <li class="nav-item"><a href="<?php echo e(route('product.show')); ?>">Shop</a></li>
                    <li class="nav-item">
                        <div class="nav__item">
                            <a class="nav-link-item" data-bs-toggle="collapse" href="#moreOptions" role="button" aria-expanded="false" aria-controls="moreOptions">Category</a>

                            <div class="collapse" id="moreOptions">
                                <ul class="nav flex-column dropdown__body">
                                    <?php $__currentLoopData = get_categories(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="nav-item">
                                        <div class="d-flex align-items-center" style="justify-content: space-between">
                                            <a class="nav-link-item" href="<?php echo e(route('product.category', $category->slug)); ?>">
                                                <?php echo e(session()->get('language') == 'bangla' ? $category->name_bn : $category->name_en); ?>

                                            </a>
                                            <?php if($category->sub_categories && $category->sub_categories->count() > 0): ?>
                                            <i class="fas fa-chevron-right float-end toggle-collapse" style="cursor: pointer;"></i>
                                            <?php endif; ?>
                                        </div>
                                        <!-- Nested ul for 3-step menu -->
                                        <?php if($category->sub_categories && $category->sub_categories->count() > 0): ?>
                                        <ul class="child__nav_menu" style="display: none;">
                                            <?php $__currentLoopData = $category->sub_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li>
                                                <div class="d-flex align-items-center" style="justify-content: space-between">
                                                    <a href="<?php echo e(route('product.category', $sub_category->slug)); ?>">
                                                        <?php echo e(session()->get('language') == 'bangla' ? $sub_category->name_bn : $sub_category->name_en); ?>

                                                    </a>
                                                    <?php if($sub_category->sub_sub_categories && $sub_category->sub_sub_categories->count() > 0): ?>
                                                    <i class="fas fa-chevron-right float-end toggle-sub-collapse" style="cursor: pointer;"></i>
                                                    <?php endif; ?>
                                                </div>
                                                <?php if($sub_category->sub_sub_categories && $sub_category->sub_sub_categories->count() > 0): ?>
                                                <ul class="sub_child__nav_menu" style="display: none;">
                                                    <?php $__currentLoopData = $sub_category->sub_sub_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_sub_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li>
                                                        <a href="<?php echo e(route('product.category', $sub_sub_category->slug)); ?>">
                                                            <?php echo e(session()->get('language') == 'bangla' ? $sub_sub_category->name_bn : $sub_sub_category->name_en); ?>

                                                        </a>
                                                    </li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>
                                                <?php endif; ?>
                                            </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                        <?php endif; ?>
                                        <!-- End of nested ul -->
                                    </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>

                        </div>
                    </li>


                    <li class="nav-item">
                        <div class="nav__item">
                            <a class="nav-link-item" data-bs-toggle="collapse" href="#moreOptions1" role="button" aria-expanded="false" aria-controls="moreOptions1">Pages</a>
                            <div class="collapse" id="moreOptions1">
                                <ul class="nav flex-column dropdown__body">
                                    <?php $__currentLoopData = get_pages_both_footer()->take(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="nav-item">
                                        <div class="d-flex align-items-center" style="justify-content: space-between">
                                            <a class="nav-link-item" href="<?php echo e(route('page.about', $page->slug)); ?>">
                                                <?php echo e($page->title); ?>

                                            </a>
                                        </div>
                                    </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item">
                        <div class="nav__item">
                            <a class="nav-link-item" data-bs-toggle="collapse" href="#moreOptions2" role="button" aria-expanded="false" aria-controls="moreOptions2">Language</a>
                            <div class="collapse" id="moreOptions2">
                                <ul class="nav flex-column dropdown__body">
                                    <?php $__currentLoopData = get_pages_both_footer()->take(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(session()->get('language') == 'bangla'): ?>
                                    <li class="nav-item">
                                        <div class="d-flex align-items-center" style="justify-content: space-between">
                                            <a class="nav-link-item" href="<?php echo e(route('english.language')); ?>">English</a>
                                        </div>
                                    </li>
                                    <?php else: ?>
                                    <li class="nav-item">
                                        <div class="d-flex align-items-center" style="justify-content: space-between">
                                            <a class="nav-link-item" href="<?php echo e(route('bangla.language')); ?>">বাংলা</a>
                                        </div>
                                    </li>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>



        <div class="mobile-header-info-wrap">
            <div class="single-mobile-header-info">
                <a href="<?php echo e(route('login')); ?>"><i class="fi-rs-user"></i>Log In </a>
            </div>
            <div class="single-mobile-header-info">
                <a href="<?php echo e(route('register')); ?>"><i class="fi-rs-user"></i>Sign Up </a>
            </div>
            <div class="single-mobile-header-info">
                <a href="tel:<?php echo e(get_setting('phone')->value ?? ''); ?>"><i class="fi-rs-headphones"></i><?php echo e(get_setting('phone')->value ?? ''); ?> </a>
            </div>
        </div>
        <div class="mobile-social-icon">
            <h6 class="mb-15">Follow Us</h6>
            <a href="<?php echo e(get_setting('facebook_url')->value ?? 'null'); ?>"><img src="<?php echo e(asset('frontend/assets/imgs/theme/icons/icon-facebook-white.svg')); ?>" alt="facebook"></a>
            <a href="<?php echo e(get_setting('tiktok_url')->value ?? 'null'); ?>"><img src="<?php echo e(asset('frontend/assets/imgs/theme/icons/tiktok.svg')); ?>" alt="Tiktok" /></a>
            <a href="<?php echo e(get_setting('instagram_url')->value ?? 'null'); ?>"><img src="<?php echo e(asset('frontend/assets/imgs/theme/icons/icon-instagram-white.svg')); ?>" alt="twitter"></a>
            <a href="<?php echo e(get_setting('youtube_url')->value ?? 'null'); ?>"><img src="<?php echo e(asset('frontend/assets/imgs/theme/icons/icon-twitter-white.svg')); ?>" alt="" /></a>
        </div>
    </div>

    <!-- Footer -->
    <?php echo $__env->make('frontend.body.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--/ Footer -->

    <!-- Vendor JS-->
    <script src="<?php echo e(asset('frontend/assets/js/vendor/modernizr-3.6.0.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/vendor/jquery-migrate-3.3.0.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/plugins/slick.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/plugins/jquery.syotimer.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/plugins/waypoints.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/plugins/wow.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/plugins/slider-range.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/plugins/perfect-scrollbar.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/plugins/magnific-popup.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/plugins/select2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/plugins/counterup.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/plugins/jquery.countdown.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/plugins/images-loaded.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/plugins/isotope.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/plugins/scrollup.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/plugins/jquery.vticker-min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/plugins/jquery.theia.sticky.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/plugins/jquery.elevatezoom.js')); ?>"></script>
    <!-- Toastr js -->
    <script src="<?php echo e(asset('frontend/js/toastr.min.js')); ?>"></script>
    <!-- lazyload -->
    <script src="<?php echo e(asset('frontend/js/jquery.lazyload.js')); ?>"></script>
    <!-- Sweetalert js -->
    <script src="<?php echo e(asset('frontend/js/sweetalert2@11.js')); ?>"></script>
    <!-- Template  JS -->
    <script src="<?php echo e(asset('frontend/assets/js/main.js?v=5.3')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/shop.js?v=5.3')); ?>"></script>
    <!-- Custom Js -->
    <script src="<?php echo e(asset('frontend/js/app.js')); ?>"></script>

    
    <?php if(get_setting('messenger_status')->value == 1): ?>
    <!-- Messenger Chat Plugin Code -->
    <div id="fb-root"></div>

    <!-- Your Chat Plugin code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
        var chatbox = document.getElementById('fb-customer-chat');
        chatbox.setAttribute("page_id", "<?php echo e(get_setting('messenger_page_id')->value ?? ''); ?>");
        chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                xfbml: true,
                version: '<?php echo e(get_setting('
                messenger_version ')->value ?? '
                '); ?>'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    <?php endif; ?>
    

    
    <script type="text/javascript">
        $("img").lazyload({
            effect: "fadeIn"
        });
    </script>

    <!-- Image Show -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>

    <!-- sweetalert js-->
    <script type="text/javascript">
        $(function() {
            $(document).on('click', '#delete', function(e) {
                e.preventDefault();
                var link = $(this).attr("href");

                Swal.fire({
                    title: 'Are you sure?',
                    text: "Delete This Data!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = link
                        Swal.fire(
                            'Deleted!', 'Your file has been deleted.', 'success'
                        )
                    }
                })

            });
        });
    </script>

    <!-- all toastr message show  Update-->
    <script>
        <?php if(Session::has('message')): ?>
        var type = "<?php echo e(Session::get('alert-type', 'info')); ?>"
        switch (type) {
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

    <!-- all toastr message show  old-->
    <script type="text/javascript">
        <?php if(Session::has('success')): ?>
        toastr.success("<?php echo e(Session::get('success')); ?>");
        <?php endif; ?>
    </script>

    <!-- Start Ajax Setup -->
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function selectAttribute(id, value, pid, position) {
            //alert(position);
            $('#' + id).val(value);
            var checkVal = $('#attribute_check_' + position).val();
            var checkProduct = $('#attribute_check_attr_' + position).val();
            if (checkVal == 1) {
                if (checkProduct == value) {
                    $('#attribute_check_' + position).val(0);
                } else {
                    $('#attribute_check_attr_' + position).val(value);
                }
            } else {
                $('#attribute_check_' + position).val(1);
                $('#attribute_check_attr_' + position).val(value);
            }

            var varient = '';
            var total = $('#total_attributes').val();
            for (var i = 1; i <= total; i++) {
                var varnt = $('.attr_value_' + i).val();
                if (varnt != '') {
                    if (i == 1) {
                        varient += varnt;
                    } else {
                        varient += '-' + varnt;
                    }
                }
            }

            $.ajax({
                type: 'GET',
                url: '/varient-price/' + pid + '/' + varient,
                dataType: 'json',
                success: function(data) {
                    //console.log(data)
                    var product = data?.product;
                    if (data && data != 'na') {
                        var variant_discount = 0;
                        if (product?.discount_price > 0) {
                            if (product?.discount_type == 1) {
                                variant_discount = product?.discount_price;
                                $('.current-price').text('৳' + (data.price - variant_discount));
                                $('.old-price').text('৳' + data.price);
                                $('#product_price').val(data.price - variant_discount);
                            } else if (product?.discount_type == 2) {
                                variant_discount = product?.discount_price * data.price / 100;
                                $('.current-price').text('৳' + (data.price - variant_discount));
                                $('.old-price').text('৳' + data.price);
                                $('#product_price').val(data.price - variant_discount);
                            }
                        } else {
                            $('.current-price').text('৳' + data.price);
                            $('#product_price').val(data.price);
                        }

                        $('#pvarient').val(varient);
                        //alert(discount);
                        $('#product_zoom_img').attr("src", window.location.origin + '/' + data.image);
                        $('#product_zoom_img').attr("srcset", window.location.origin + '/' + data.image);
                    }
                }
            });
        }

        function selectAttributeModal(id, position) {
            const idArray = id.split("_");

            var value = idArray[2];
            var pid = $('#product_id').val();
            $('#' + idArray[1]).val(value);

            $('.attr_val_li_' + idArray[1]).removeClass("active");
            $('#attr_val_li_' + idArray[1] + '_' + idArray[2]).addClass("active");

            var checkVal = $('#attribute_check_' + position).val();
            var checkProduct = $('#attribute_check_attr_' + position).val();
            //alert(position);
            if (checkVal == 1) {
                if (checkProduct == value) {
                    $('#attribute_check_' + position).val(0);
                } else {
                    $('#attribute_check_attr_' + position).val(value);
                }
            } else {
                $('#attribute_check_' + position).val(1);
                $('#attribute_check_attr_' + position).val(value);
            }


            var varient = '';
            var total = $('#total_attributes').val();
            for (var i = 1; i <= total; i++) {
                var varnt = $('.attr_value_' + i).val();
                if (varnt != '') {
                    if (i == 1) {
                        varient += varnt;
                    } else {
                        varient += '-' + varnt;
                    }
                }
            }

            //alert(varient);

            $.ajax({
                type: 'GET',
                url: '/varient-price/' + pid + '/' + varient,
                dataType: 'json',
                success: function(data) {
                    //console.log(data)
                    var product = data?.product;
                    if (data && data != 'na') {
                        var variant_discount = 0;
                        if (product?.discount_price > 0) {
                            if (product?.discount_type == 1) {
                                variant_discount = product?.discount_price;
                                $('#pprice').text(data.price - variant_discount);
                                $('#oldprice').text('৳' + (data.price));
                                $('#product_price').val(data.price - variant_discount);
                            } else if (product?.discount_type == 2) {
                                variant_discount = product?.discount_price * data.price / 100;
                                $('#pprice').text(data.price - variant_discount);
                                $('#oldprice').text('৳' + (data.price));
                                $('#product_price').val(data.price - variant_discount);
                            }
                        } else {
                            $('#pprice').text(data.price);
                            $('#product_price').val(data.price);
                        }

                        $('#pvarient').val(varient);
                        $('#pimage').attr("src", window.location.origin + '/' + data.image);
                    }
                }
            });

        }

        /* ============= Start Product View With Modal ========== */
        function productView(id) {
            $.ajax({
                type: 'GET',
                url: '/product/view/modal/' + id,
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    $('#product_name').text(data.product.name_bn);
                    $('#pname').val(data.product.name_bn);
                    $('#product_id').val(id);
                    $('#pcode').text(data.product.product_code);
                    $('#pcategory').text(data.product.category.name_bn);
                    if (data.product.brand != null) {
                        $('#pbrand').text(data.product.brand.name_bn);
                    }
                    $('#pimage').attr('src', '/' + data.product.product_thumbnail);
                    $('#stock_qty').val(data.product.stock_qty);
                    $('#minimum_buy_qty').val(data.product.minimum_buy_qty);

                    $('#pavailable').hide();
                    $('#pstockout').hide();

                    /* =========== Start Product Price ========= */
                    var discount = 0;
                    if (data.product.discount_price > 0) {
                        if (data.product.discount_type == 1) {
                            discount = data.product.discount_price;
                            $('#pprice').text(data.product.regular_price - discount);
                            $('#oldprice').text('৳' + (data.product.regular_price));
                        } else if (data.product.discount_type == 2) {
                            discount = data.product.discount_price * data.product.regular_price / 100;
                            $('#pprice').text(data.product.regular_price - discount);
                            $('#oldprice').text('৳' + (data.product.regular_price));
                            //console.log(data.product.regular_price);
                        }
                    } else {
                        $('#pprice').text(data.product.regular_price);
                        $('#oldprice').text('');
                    }

                    $('#discount_amount').val(discount);

                    if (data.product.stock_qty > 0) {
                        $('#pavailable').show();
                    } else {
                        $('#pstockout').show();
                    }
                    /* =========== End Product Price ========= */

                    /* ============ Start Color ============= */
                    /* ============ Color empty ============= */
                    // $('select[name ="color"]').empty();
                    //console.log(data.attributes);
                    var i = 0;
                    var html = '';
                    $.each(data.attributes, function(key, value) {
                        i++;
                        html += '<div class="attr-detail attr-size mb-30">';
                        html += '<strong class="mr-10">' + value.name + ': </strong>';
                        html += '<input type="hidden" name="attribute_ids[]" id="attribute_id_' + i +
                            '" value="' + value.id + '">';
                        html += '<input type="hidden" name="attribute_names[]" id="attribute_name_' +
                            i + '" value="' + value.name + '">';
                        html += '<input type="hidden" id="attribute_check_' + i + '" value="0">';
                        html += '<input type="hidden" id="attribute_check_attr_' + i + '" value="0">';
                        html += '<ul class="list-filter size-filter font-small">';
                        $.each(value.values, function(key, attr_value) {
                            if (key == 0) {
                                html += '<li id="attr_val_li_' + value.id + value.name + '_' +
                                    attr_value + '" class="attr_val_li_' + value.id + value
                                    .name + '">';
                                html += '<a id="attr_' + value.id + value.name + '_' +
                                    attr_value + '" onclick="selectAttributeModal(this.id, ' +
                                    i + ')" style="border: 1px solid #7E7E7E;">' + attr_value +
                                    '</a>';
                                html += '<input type="hidden" id="choice_option_attr_' + value
                                    .id + value.name + '" value="' + attr_value + '">';
                                html += '</li>';
                            } else {
                                html += '<li id="attr_val_li_' + value.id + value.name + '_' +
                                    attr_value + '" class="attr_val_li_' + value.id + value
                                    .name + '" style="margin-left: 5px;">';
                                html += '<a id="attr_' + value.id + value.name + '_' +
                                    attr_value + '" onclick="selectAttributeModal(this.id, ' +
                                    i + ')" style="border: 1px solid #7E7E7E;">' + attr_value +
                                    '</a>';
                                html += '<input type="hidden" id="choice_option_attr_' + value
                                    .id + value.name + '" value="' + attr_value + '">';
                                html += '</li>';
                            }

                        });
                        html += '<input type="hidden" name="attribute_options[]" id="' + value.id +
                            value.name + '" class="attr_value_' + i + '">';
                        html += '</ul>';
                        html += '</div>';
                    });
                    html += '<input type="hidden" id="total_attributes" value="' + data.attributes.length +
                        '">';
                    $('#attributes').html(html);

                    /* ========== Start Stock Option ========= */
                    if (data.product.product_qty > 0) {
                        $('#aviable').text('');
                        $('#stockout').text('');
                        $('#aviable').text('available');

                    } else {
                        $('#aviable').text('');
                        $('#stockout').text('');
                        $('#stockout').text('stockout');
                    }
                    /* ========== End Stock Option ========== */

                    /* ========= Start Add To Cart Product id ======== */
                    $('#product_id').val(id);
                    $('#qty').val(data.product.minimum_buy_qty);
                    /* ========== End Add To Cart Product id ======== */
                }
            });
        }
        /* ============= End Product View With Modal ========== */

        /* ============= Start AddToCart View With Modal ========== */
        function buyNow(id) {
            $('#buyNowCheck').val(1);
            addToCart();
            addToCartDirect(id);
        }

        function addToCart() {
            var total_attributes = parseInt($('#total_attributes').val());
            var checkNotSelected = 0;
            var checkAlertHtml = '';
            for (var i = 1; i <= total_attributes; i++) {
                var checkSelected = parseInt($('#attribute_check_' + i).val());
                if (checkSelected == 0) {
                    checkNotSelected = 1;
                    checkAlertHtml += `<div class="mb-5 attr-detail">
											<div class="alert alert-danger d-flex align-items-center" role="alert">
												<div>
													<i class="mr-10 fa fa-warning"></i> <span> Select ` + $('#attribute_name_' + i).val() + `</span>
												</div>
											</div>
										</div>`;
                }
            }
            if (checkNotSelected == 1) {
                $('#qty_alert').html('');
                $('#attribute_alert').html(`<div class="mb-5 attr-detail">
											<div class="alert alert-danger d-flex align-items-center" role="alert">
												<div>
													<i class="mr-10 fa fa-warning"></i> <span> Select all attributes</span>
												</div>
											</div>
										</div>`);
                return false;
            }

            $('.size-filter li').removeClass("active");
            var product_name = $('#pname').val();
            var id = $('#product_id').val();
            var price = $('#product_price').val();
            var color = $('#color option:selected').val();
            var size = $('#size option:selected').val();
            var quantity = $('#qty').val();
            var varient = $('#pvarient').val();

            var min_qty = parseInt($('#minimum_buy_qty').val());
            if (quantity < min_qty) {
                $('#attribute_alert').html('');
                $('#qty_alert').html(`<div class="mb-5 attr-detail">
											<div class="alert alert-danger d-flex align-items-center" role="alert">
												<div>
													<i class="mr-10 fa fa-warning"></i> <span> Minimum quantity ` + min_qty + ` required.</span>
												</div>
											</div>
										</div>`);
                return false;
            }
            var p_qty = parseInt($('#stock_qty').val());

            var options = $('#choice_form').serializeArray();
            var jsonString = JSON.stringify(options);

            // Start Message
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                icon: 'success',
                showConfirmButton: false,
                timer: 1200
            });
            $.ajax({
                type: 'POST',
                url: '/cart/data/store/' + id,
                dataType: 'json',
                data: {
                    color: color,
                    size: size,
                    quantity: quantity,
                    product_name: product_name,
                    product_price: price,
                    product_varient: varient,
                    options: jsonString,
                },
                success: function(data) {
                    console.log(data);
                    miniCart();
                    $('#closeModel').click();

                    // Start Sweertaleart Message
                    if ($.isEmptyObject(data.error)) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1200
                        })
                        Toast.fire({
                            type: 'success',
                            title: data.success
                        })
                        $('#qty').val(min_qty);
                        $('#pvarient').val('');

                        for (var i = 1; i <= total_attributes; i++) {
                            $('#attribute_check_' + i).val(0);
                        }
                    } else {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            icon: 'error',
                            showConfirmButton: false,
                            timer: 1200
                        })
                        Toast.fire({
                            type: 'error',
                            title: data.error
                        })
                        $('#qty').val(min_qty);
                        $('#pvarient').val('');

                        for (var i = 1; i <= total_attributes; i++) {
                            $('#attribute_check_' + i).val(0);
                        }
                    }
                    // Start Sweertaleart Message
                    var buyNowCheck = $('#buyNowCheck').val();
                    if (buyNowCheck && buyNowCheck == 1) {
                        $('#buyNowCheck').val(0);
                        window.location = '/checkout';
                    }

                }
            });
        }

        /* =========== Add to cart direct ============ */
        function addToCartDirect(id) {
            var product_name = $('#' + id + '-product_pname').val();
            //alert(product_name);
            var quantity = 1;

            // Start Message
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                icon: 'success',
                showConfirmButton: false,
                timer: 1200
            });

            $.ajax({
                type: 'POST',
                url: '/cart/data/store/' + id,
                dataType: 'json',
                data: {
                    quantity: quantity,
                    product_name: product_name
                },
                success: function(data) {
                    // console.log(data);
                    miniCart();
                    $('#closeModel').click();

                    // Start Sweertaleart Message
                    if ($.isEmptyObject(data.error)) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1200
                        })
                        Toast.fire({
                            type: 'success',
                            title: data.success
                        })
                    } else {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            icon: 'error',
                            showConfirmButton: false,
                            timer: 1200
                        })
                        Toast.fire({
                            type: 'error',
                            title: data.error
                        })
                    }
                    // Start Sweertaleart Message
                    var buyNowCheck = $('#buyNowCheck').val();
                    //alert(buyNowCheck);
                    if (buyNowCheck && buyNowCheck == 1) {
                        $('#buyNowCheck').val(0);
                        window.location = '/checkout';
                    }


                }
            });
        }
        /* ============= Start AddToCart View With Modal ========== */
    </script>

    <script type="text/javascript">
        /* ============= Start MiniCart Add ========== */
        function miniCart() {
            $.ajax({
                type: 'GET',
                url: '/product/mini/cart',
                dataType: 'json',
                success: function(response) {
                    // alert(response);
                    //checkout();
                    $('span[id="cartSubTotal"]').text(response.cartTotal);
                    $('#cartSubTotalShi').val(response.cartTotal);
                    $('.cartQty').text(Object.keys(response.carts).length);
                    $('#total_cart_qty').text(Object.keys(response.carts).length);

                    var miniCart = "";

                    if (Object.keys(response.carts).length > 0) {
                        $.each(response.carts, function(key, value) {
                            //console.log(value);
                            var slug = value.options.slug;
                            var base_url = window.location.origin;
                            miniCart += `
                            <ul>
                                <li>
                                    <div class="shopping-cart-img">
                                        <a href="#"><img alt="" src="/${value.options.image}" /></a>
                                    </div>
                                    <div class="shopping-cart-title">
                                        <h4><a href="${base_url}/product-details/${slug}">${value.name}</a></h4>
                                        <h4 class="align-items-center d-flex">
                                        <div class="d-inline-flex flex-column">
                                            <span>
                                                <button type="submit" class="minicart_btn " id="${value.rowId}" onclick="cartIncrement(this.id)" ><i class="fa-solid fa-plus"></i>
                                                </button>
                                            </span>
                                        ${value.qty > 1
                                            ? `<span>
                                                <button type="submit" class="minicart_btn " id="${value.rowId}" onclick="cartDecrement(this.id)" ><i class="fa-solid fa-minus"></i>
                                                </button>
                                                </span>`

                                            :`<span>
                                                <button type="submit" class="minicart_btn disabled" ><i class="fa-solid fa-minus"></i>
                                                </button>
                                            </span>`
                                        }
                                        </div>
                                        <span>${value.qty} × </span>
                                        ${value.price}
                                        </h4>
                                    </div>
                                    <div class="shopping-cart-delete">
                                        <a  id="${value.rowId}" onclick="miniCartRemove(this.id)"><i class="fi-rs-cross-small"></i></a>
                                    </div>
                                </li>
                            </ul>
                            <div class="cartBottom">

                            </div>`
                        });

                        $('#miniCart').html(miniCart);
                        $('#miniCart_empty_btn').hide();
                        $('#miniCart_btn').show();
                    } else {
                        html = '<h4 class="text-center">Cart empty!</h4>';
                        $('#miniCart').html(html);
                        $('#miniCart_btn').hide();
                        $('#miniCart_empty_btn').show();
                    }
                }
            });
        }
        /* ============ Function Call ========== */
        miniCart();

        /* ==================== Start MiniCart Remove =============== */
        function miniCartRemove(rowId) {
            $.ajax({
                type: 'GET',
                url: '/minicart/product-remove/' + rowId,
                dataType: 'json',
                success: function(data) {

                    miniCart();
                    cart();

                    // Start Message
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 2000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: data.error
                        })
                    }
                    // End Message
                }
            });
        }
        /* ==================== End MiniCart Remove =============== */

        /* ==================== Number Formet for bangla =============== */
        // function formatNumberInBengali(number) {
        //     const bengaliDigits = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
        //     return number.toString().split('').map(digit => bengaliDigits[digit] || digit).join('');
        // }

        function cart() {
            $.ajax({
                type: 'GET',
                url: '/get-cart-product',
                dataType: 'json',
                success: function(response) {
                    //console.log(response);
                    var rows = "";
                    $('#total_cart_qty').text(Object.keys(response.carts).length);
                    if (Object.keys(response.carts).length > 0) {
                        $.each(response.carts, function(key, value) {
                            var slug = value.options.slug;
                            var base_url = window.location.origin;
                            rows += `
                            <tr>
                                <td class="pt-40 image product-thumbnail"><img src="/${value.options.image}" alt="#"></td>
                                <td class="product-des product-name">
                                    <h6 class="mb-5"><a class="mb-10 product-name text-heading" href="${base_url}/product-details/${slug}">${value.name}</a></h6>`;
                            $.each(value.options.attribute_names, function(index, val) {
                                rows += `<span>` + val + `: ` + value.options.attribute_values[index] + `</span><br/>`;
                            });
                            rows += `</td>
                                <td class="price">
                                    <h4 class="text-body">৳${value.price}</h4>
                                </td>
                                <td class="text-center detail-info">
                                    <div class="detail-extralink mr-15">
                                        <div class="align-items-center d-flex justify-content-between">
                                            ${value.qty > 1
                                            ? `<button type="submit" class="increment__btn" id="${value.rowId}" onclick="cartDecrement(this.id)"><i class="fa-solid fa-minus"></i></button>`
                                            : `<button type="submit" class="btn btn-danger btn-sm" disabled><i class="fa-solid fa-minus"></i></button>`
                                            }
                                            <input type="text" value="${value.qty}" min="1" max="100" disabled="">
                                            <button type="submit" class="increment__btn" id="${value.rowId}" onclick="cartIncrement(this.id)"><i class="fa-solid fa-plus"></i></button>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center price" width="100px;">
                                    <h4 class="text-brand">৳${value.subtotal}</h4>
                                </td>
                                <td class="text-center action"><a id="${value.rowId}" onclick="cartRemove(this.id)" class="text-danger"><i class="fi-rs-trash"></i></a></td>
                            </tr>`;
                        });

                        $('#cartPage').html(rows);

                    } else {
                        html = '<tr><td class="text-center" colspan="6" style="font-size: 18px; font-weight: bold;">Cart empty!</td></tr>';
                        $('#cartPage').html(html);
                    }
                }
            });
        }
        cart();

        /* ================ Start My Cart Checkout  =========== */
        function checkout() {
            $.ajax({
                type: 'GET',
                url: '/checkout-product',
                dataType: 'json',
                success: function(response) {
                    // console.log(response);
                    var rows = "";

                    // cart();
                    // miniCart();
                    $('#total_cart_qty').text(Object.keys(response.carts).length);

                    if (Object.keys(response.carts).length > 0) {
                        $.each(response.carts, function(key, value) {
                            var slug = value.options.slug;
                            var base_url = window.location.origin;
                            rows +=
                                `
                                <tr>
                                    <td class="image product-thumbnail"><img src="/${value.options.image}" alt="#"></td>
                                    <td>
                                        <h6 class="mb-5"><a href="${base_url}/product-details/${slug}" class="text-heading">${value.name}</a></h6></span>`;
                            $.each(value.options.attribute_names, function(index, val) {
                                rows += `<span>` + val + `: ` + value.options.attribute_values[
                                    index] + `</span><br/>`;
                            });
                            rows += `</td>
                                <td>
                                        <h6 class="pl-20 pr-20 text-muted">x ${value.qty}</h6>
                                    </td>
                                    <td>
                                        <h4 class="text-brand">৳${value.subtotal}</h4>
                                    </td>
                                </tr>
                            `
                        });

                        $('#cartCheckout').html(rows);
                    } else {
                        html =
                            '<h3 class="text-center text-danger" style="font-size:18px; font-weight:bold;">Cart empty!</h3>';
                        $('#cartCheckout').html(html);
                    }
                }
            });
        }
        checkout();
        /* ================ End My Cart Checkout =========== */

        /* ================ Start My Cart Remove Product =========== */
        function cartRemove(id) {
            $.ajax({
                type: 'GET',
                url: '/cart-remove/' + id,
                dataType: 'json',
                success: function(data) {
                    cart();
                    miniCart();


                    // Start Message
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 2000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error
                        })
                    }
                    // End Message
                }
            });
        }

        /* ==================== End My Cart Remove Product ================== */

        /* ==================== Start  cartIncrement ================== */
        function cartIncrement(rowId) {
            $.ajax({
                type: 'GET',
                url: "/cart-increment/" + rowId,
                dataType: 'json',
                success: function(data) {
                    // console.log(data)
                    cart();
                    miniCart();

                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 1200
                    })
                    Toast.fire({
                        type: 'success',
                        title: data.success
                    })

                    if ($.isEmptyObject(data.error)) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1200
                        })

                        Toast.fire({
                            type: 'success',
                            title: data.success
                        })

                    } else {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            icon: 'error',
                            showConfirmButton: false,
                            timer: 1200
                        })

                        Toast.fire({
                            type: 'error',
                            title: data.error
                        })
                    }

                }
            });
        }
        /* ==================== End  cartIncrement ================== */

        /* ==================== Start  Cart Decrement ================== */
        function cartDecrement(rowId) {
            $.ajax({
                type: 'GET',
                url: "/cart-decrement/" + rowId,
                dataType: 'json',
                success: function(data) {
                    // console.log(data)
                    //console.log(data);
                    // if(data == 2){
                    //     alert("#"+rowId);
                    //     $("#"+rowId).attr("disabled", "true");
                    // }
                    cart();
                    miniCart();
                }
            });
        }
        /* ==================== End  Cart Decrement ================== */
    </script>

    <script type="text/javascript">
        /* ================ Advance Product Search ============ */
        $(document).on("input change", ".search", function() {
            let text = $(this).val();
            //console.log(text);
            //let category_id = $("#searchCategory").val();
            if (text.length > 0) {
                $.ajax({
                    data: {
                        search: text,
                        //category: category_id
                    },
                    url: "/search-product",
                    method: 'post',
                    beforeSend: function(request) {
                        request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr(
                            'content'));
                    },
                    success: function(result) {
                        $(".searchProducts").html(result);
                    }
                }); // end ajax
            } else {
                $(".searchProducts").html("");
            }
        });


        // end function

        /* ================ Advance Product slideUp/slideDown ============ */


        function search_result_hide() {
            $(".searchProducts").slideUp();
        }

        function search_result_show() {
            $(".searchProducts").slideDown();
        }
    </script>

    <script>
        $(document).ready(function() {
            $(".show").click(function() {
                $(".advance-search").show();
            });
            $(".hide").click(function() {
                $(".advance-search").hide();
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#mobile__menu__toggle a').on('click', function() {
                $('.mobile_mega_menu').toggle();
                $('body').toggleClass('menu-open');
            });
        });
    </script>

    <!-- <script>
        document.getElementById('categoryToggle').addEventListener('click', function() {
            var menu = document.getElementById('categoryMenu');
            menu.classList.toggle('d-none');
        });

        document.body.addEventListener('click', function(event) {
            var menu = document.getElementById('categoryMenu');
            if (!menu.contains(event.target) && !document.getElementById('categoryToggle').contains(event.target)) {
                menu.classList.add('d-none');
            }
        });
    </script> -->

    <script>
        document.getElementById('categoryToggle').addEventListener('click', function() {
            var menu = document.getElementById('categoryMenu');
            menu.classList.toggle('d-none');
            if (!menu.classList.contains('d-none')) {
                document.body.style.backgroundColor = 'red';
            } else {
                document.body.style.backgroundColor = ''; // reset to default
            }
        });

        document.body.addEventListener('click', function(event) {
            var menu = document.getElementById('categoryMenu');
            if (!menu.contains(event.target) && !document.getElementById('categoryToggle').contains(event.target)) {
                menu.classList.add('d-none');
                document.body.style.backgroundColor = ''; // reset to default
            }
        });
    </script>
    <?php echo $__env->yieldPushContent('footer-script'); ?>
</body>

</html>
<?php /**PATH C:\laragon\www\boibaari\resources\views/layouts/frontend.blade.php ENDPATH**/ ?>