<?php $__env->startSection('content-frontend'); ?>
<?php $__env->startPush('css'); ?>
<style>
    .archive-header {
        height: 400px;
    }
    .text-black{
        color: #000 !important;
    }

    .single-book h6 {
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        line-clamp: 2;
        height: 50px;
        -webkit-box-orient: vertical;
    }

    .single-book button {
        background: #f06a256b;
        color: #F06A25;
        border: 0;
        border-radius: 4px;
        padding: 5px 10px;
        transition: all .5s ease-in-out;
    }

    .single-book:hover button {
        background: #F06A25;
        color: #fff;
    }

    .single-book {
        transition: all .5s ease-in-out;
    }

    .single-book:hover {
        box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;
    }
</style>
<?php $__env->stopPush(); ?>
<main class="main">
    <div class="py-3 author_info">
        <div class="container">
            <div class="py-2 d-md-flex justify-content-between align-items-center">
                <h6 class="m-0 page-title font-size-3 font-weight-medium text-lh-lg"><?php echo e($vendor->writer_name); ?> এর বই সমূহ</h6>
                <nav class="woocommerce-breadcrumb font-size-2">
                    <a href="<?php echo e(route('home')); ?>" class="h-primary">হোম</a>
                    <span class="mx-1 breadcrumb-separator"><i class="fas fa-angle-right"></i></span>
                        <a href="<?php echo e(route('authors')); ?>" class="h-primary">লেখক</a>
                    <span class="mx-1 breadcrumb-separator"><i class="fas fa-angle-right"></i></span>
                    <span><?php echo e($vendor->writer_name); ?></span>
                </nav>
            </div>
            <hr>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <img class="img-fluid" src="<?php echo e(asset($vendor->writer_image)); ?>" alt="<?php echo e($vendor->writer_name); ?>">
                </div>
                <div class="col-md-9">
                <span class="text-gray-400 font-size-2">লেখকের জীবনী</span>
                <h4 class="pb-1 mt-2 mb-3 font-size-7 ont-weight-medium"><?php echo e($vendor->writer_name); ?></h4>
                <p class="mb-0"><?php echo e($vendor->description); ?></p>
            </div>
            </div>
        </div>
    </div>

    <div class="container mb-30">
        <div class="row">
            <div class="col-lg-4-5">
                <div class="shop-product-fillter">
                    <div class="totall-product">
                        <p>আমরা আপনার জন্য <?php echo e(formatNumberInBengali(count($products))); ?> টি আইটেম খুঁজে পেয়েছি!</p>
                    </div>
                </div>
                <div class="mt-3 row g-2">
                    <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col-6 col-md-4 col-lg-3 col-md-1-5">
                        <?php echo $__env->make('frontend.common.product_grid_view', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <h5 class="text-danger">এখানে কোন পণ্য খুঁজে পাওয়া যায়নি!</h5>
                    <?php endif; ?>
                </div>
                <!-- product grid -->
                <div class="pagination-area mt-20 mb-20">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-end">
                            <?php echo e($products->links('vendor.pagination.custom')); ?>

                        </ul>
                    </nav>
                </div>
                <!--End Deals-->
            </div>

            <div class="col-lg-1-5 primary-sidebar sticky-sidebar">
            	<!-- SideCategory -->
                <?php echo $__env->make('frontend.common.sidecategory', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>
</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\boibaari\resources\views/frontend/product/vendor_view.blade.php ENDPATH**/ ?>