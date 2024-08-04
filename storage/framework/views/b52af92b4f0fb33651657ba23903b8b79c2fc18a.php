<div class="sidebar-widget widget-category-2 mb-30">
    <h5 class="section-title style-1 mb-30">ক্যাটাগরি</h5>
    <ul>
        <?php $__currentLoopData = get_categories(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li>
            <a href="<?php echo e(route('product.category', $category->slug)); ?>">
                <img src="<?php echo e(asset($category->image)); ?>" alt="" />
                <?php if(session()->get('language') == 'bangla'): ?>
                    <?php echo e($category->name_bn); ?>

                <?php else: ?>
                    <?php echo e($category->name_en); ?>

                <?php endif; ?>
            </a>
            <?php
                $conditions = ['status' => 1];
                $category_ids = App\Utility\CategoryUtility::children_ids($category->id);
                $category_ids[] = $category->id;
                $products = App\Models\Product::where($conditions)->whereIn('category_id', $category_ids)->orderBy('id','DESC')->get();
            ?>
            <span><?php echo e(count($products)); ?></span>
        </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>
<?php /**PATH C:\laragon\www\boibaari\resources\views/frontend/common/sidecategory.blade.php ENDPATH**/ ?>