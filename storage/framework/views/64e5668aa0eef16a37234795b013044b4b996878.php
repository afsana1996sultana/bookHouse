<?php $__env->startSection('content-frontend'); ?>
<?php $__env->startPush('css'); ?>
<style>
    .archive-header {
        height: 400px;
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
    <div class="page-header">
        <div class="container mt-30 mb-30">
            <div class="row">
                <div class="col-lg-4-5">
                    <div class="row product-grid g-2">
                        <div class="category__main__image">
                            <?php if($category->banner_image): ?>
                                <img src="<?php echo e(asset($category->banner_image)); ?>" alt="">
                            <?php else: ?>
                                <img src="<?php echo e(asset($category->image)); ?>" alt="" style="height: 250px; width: 1264px;">
                            <?php endif; ?>

                            <div class="breadcrumb breadcrumb__title">
                                <h4 class="mb-15">
                                    <?php if(session()->get('language') == 'bangla'): ?>
                                    <?php echo e($category->name_bn); ?>

                                    <?php else: ?>
                                    <?php echo e($category->name_en); ?>

                                    <?php endif; ?>
                                </h4>
                                <a href="<?php echo e(route('home')); ?>" rel="nofollow"><i class="fi-rs-home mr-5"></i>হোম</a>
                                <span></span>
                                <?php if(session()->get('language') == 'bangla'): ?>
                                <?php echo e($category->name_bn); ?>

                                <?php else: ?>
                                <?php echo e($category->name_en); ?>

                                <?php endif; ?>
                            </div>
                        </div>

                        <?php if($subcategories->count() > 0): ?>
                        <div class="subcategory__show toggle_nav" id="toggle_nav">
                            <h6>Subcategory List</h6>
                        </div>
                        <?php endif; ?>
                        <div class="mobile_nav" id="mobile_nav">
                            <div class="mobile_navWrapper" id="mobile_navWrapper">
                                <div class="mobile_nav_content">
                                    <ul class="subcategory__item__show">
                                        <h5 class="pb-2 mb-2 border-bottom">Subcategory List</h5>
                                        <?php $__currentLoopData = $subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><a href="<?php echo e(route('product.category', $subcategory->slug)); ?>"><?php echo e($subcategory->name_en); ?></a>
                                        </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="shop-product-fillter">
                            <div class="totall-product">
                                <p>আমরা আপনার জন্য <?php echo e(formatNumberInBengali(count($products))); ?> টি আইটেম খুঁজে পেয়েছি!</p>
                            </div>
                        </div>
                        <div class="row g-2">
                            <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-md-1-5">
                                <?php echo $__env->make('frontend.common.product_grid_view', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <h5 class="text-danger">এখানে কোন পণ্য খুঁজে পাওয়া যায়নি!</h5>
                            <?php endif; ?>
                        </div>
                    </div>
                    <!-- product grid -->
                    <div class="pagination-area mt-20 mb-20">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-end">
                                <?php echo e($products->links('vendor.pagination.custom')); ?>

                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-1-5 primary-sidebar sticky-sidebar">
                    <!-- SideCategory -->
                    <?php echo $__env->make('frontend.common.sidecategory', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
</main>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('footer-script'); ?>
<script type="text/javascript">
</script>

<script type="text/javascript">
    function filter() {
        $('#search-form').submit();
    }

</script>

<script>
    const mobileNav = document.getElementById("mobile_nav");
    const toggleNav = document.getElementById("toggle_nav");
    const navWrapper = document.getElementsByClassName("mobile_navWrapper")[0];

    // Function to remove classes from elements
    function removeClasses() {
        toggleNav.classList.remove("activeToggle");
        mobileNav.classList.remove("showMobileNav");
    }

    // Add event listener to window
    window.addEventListener("click", function(event) {
        // Check if click occurred outside of navWrapper and toggleNav
        if (!navWrapper.contains(event.target) && !toggleNav.contains(event.target)) {
            removeClasses();
        }
    });

    // Add event listener to toggleNav
    toggleNav.addEventListener("click", function(event) {
        // Prevent event from bubbling up to window
        event.stopPropagation();
        // Toggle classes on elements
        toggleNav.classList.toggle("activeToggle");
        mobileNav.classList.toggle("showMobileNav");
    });

</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/home2/boibaariclassici/public_html/resources/views/frontend/product/category_view.blade.php ENDPATH**/ ?>