
<?php $__env->startSection('admin'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<section class="content-main">
    <div class="content-header">
        <h2 class="content-title">Slider Edit</h2>
        <div class="">
            <a href="<?php echo e(route('slider.index')); ?>" class="btn btn-primary"><i class="material-icons md-plus"></i> Slider List</a>
        </div>
    </div> 
    <div class="row justify-content-center">
        <div class="col-sm-8">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form method="post" action="<?php echo e(route('slider.update', $slider->id)); ?>" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>

                                <div class="mb-4">
                                   <label for="title_en" class="col-form-label col-md-2" style="font-weight: bold;"> Title (English):</label>
                                    <input class="form-control" id="title_en" type="text" name="title_en" placeholder="Write Slider Title English"  value="<?php echo e($slider->title_en); ?>">
                                </div>
                                <div class="mb-4">
                                  <label for="title_bn" class="col-form-label col-md-2" style="font-weight: bold;"> Title (Bangla):</label>
                                    <input class="form-control" id="title_bn" type="text" name="title_bn" placeholder="Write Slider Title bangla"  value="<?php echo e($slider->title_bn); ?>">
                                </div>
                                <div class="mb-4">
                                  <label for="slider_url" class="col-form-label col-md-2" style="font-weight: bold;"> Slider Url:</label>
                                    <input class="form-control" id="slider_url" type="text" name="slider_url" placeholder="Write Slider Url"  value="<?php echo e($slider->slider_url); ?>">
                                </div>

                                <div class="mb-4">
                                  <label for="description_en" class="col-form-label col-md-3" style="font-weight: bold;">Description (English):</label>
                                    <textarea name="description_en" id="description_en" cols="5" placeholder="Write Slider description english" class="form-control " ><?php echo e($slider->description_en); ?></textarea>
                                    <?php $__errorArgs = ['description_en'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
		                            	<span class="text-danger"><?php echo e($message); ?></span>
		                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="mb-4">
                                    <label for="description_bn" class="col-form-label col-md-3" style="font-weight: bold;">Description (Bangla):</label>
                                    <textarea name="description_bn" id="description_bn" cols="5" placeholder="Write Slider description english" class="form-control " ><?php echo e($slider->description_bn); ?></textarea>
                                </div>
                                <div class="mb-4">
                                    <img id="showImage" class="rounded avatar-lg" src="<?php echo e(asset($slider->slider_img)); ?>" alt="Card image cap" width="100px" height="80px;">
                                </div>
                                <div class="mb-4">
                                    <label for="image" class="col-form-label col-md-2" style="font-weight: bold;">Cover Photo:</label>
                                    <input name="slider_img" class="form-control" type="file" id="image">
                                </div>
                                <div class="mb-4">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="form-check-input me-2 cursor" name="status" id="status" value="1" <?php echo e($slider->status == 1 ? 'checked': ''); ?> >
                                        <label class="form-check-label cursor" for="status">Status</label>
                                    </div>
                                </div>
                                <div class="row mb-4 justify-content-sm-end">
                                    <div class="col-lg-3 col-md-4 col-sm-5 col-6">
                                        <input type="submit" class="btn btn-primary" value="Update">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- .row // -->
                </div>
                <!-- card body .// -->
            </div>
            <!-- card .// -->
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.admin_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/home2/boibaariclassici/public_html/resources/views/backend/slider/edit.blade.php ENDPATH**/ ?>