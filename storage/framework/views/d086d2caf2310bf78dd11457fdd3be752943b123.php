<?php $__env->startSection('content-frontend'); ?>
	<div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="<?php echo e(route('home')); ?>" rel="nofollow"><i class="mr-5 fi-rs-home"></i>Home</a>
                <span> Publications </span>
            </div>
        </div>
    </div>
    <div class="container mb-30 mt-30">
        <div class="row">
            <div class="col-lg-12">
                <div class="shop-product-fillter-header">
                    <div class="row g-3">
                    	<?php $__currentLoopData = $publications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $publication): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 col-6">
                                <a href="<?php echo e(route('publication.product', $publication->id)); ?>" class="d-flex align-items-center card-publication justify-content-center" title="<?php echo e($publication->name); ?>" style="background: <?php echo e($publication->background_color); ?>;">
                                    <h4 class="category-title fs-6 mb-0">
                                        <?php echo e($publication->name); ?>

                                    </h4>
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-20 mb-20 pagination-area">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-end">
                    <?php echo e($publications->links()); ?>

                </ul>
            </nav>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/home2/boibaariclassici/public_html/resources/views/frontend/publications/index.blade.php ENDPATH**/ ?>