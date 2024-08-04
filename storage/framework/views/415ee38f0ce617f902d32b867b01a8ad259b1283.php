<?php $__env->startSection('admin'); ?>
<section class="content-main">
    <div class="content-header">
        <h2 class="content-title">Slider List <span class="badge rounded-pill alert-success"> <?php echo e(count($sliders)); ?> </span></h2>
        <div>
            <?php if(Auth::guard('admin')->user()->role == '1' || in_array('38', json_decode(Auth::guard('admin')->user()->staff->role->permissions))): ?>
              <a href="<?php echo e(route('slider.create')); ?>" class="btn btn-primary"><i class="material-icons md-plus"></i> Create Slider</a>
            <?php endif; ?>
        </div>
    </div>
    <div class="card mb-4">
        <!-- card-header end// -->
        <div class="card-body">
            <div class="table-responsive-sm">
                <table id="example" class="table table-bordered table-striped" width="100%">
                    <thead>
                      <tr>
                        <th>Sl</th>
                        <th>Slider Img</th>
                        <th>Title (English)</th>
                        <th>Description (Bangla)</th>
                        <th>Description (English)</th>
                        <th>Status</th>
                        <th class="text-end">Action</th>
                      </tr>
                    </thead>
                        <tbody>
                            <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <tr>
                                <td> <?php echo e($key+1); ?> </td>
                                <td width="15%">
                                    <a href="#" class="itemside">
                                        <div class="left">
                                            <img src="<?php echo e(asset($slide->slider_img)); ?>" width="70px" height="70px;" class="img-sm img-avatar" alt="Userpic">
                                        </div>
                                    </a>
                                </td>
                                <td> <?php echo e($slide->title_en ?? 'NULL'); ?> </td>
                                <td> <?php echo e($slide->description_bn ?? 'NULL'); ?> </td>
                                <td> <?php echo e($slide->description_en ?? 'NULL'); ?> </td>
                                <td>
                                    <?php if($slide->status == 1): ?>
                                      <a href="<?php echo e(route('slider.in_active',['id'=>$slide->id])); ?>">
                                        <span class="badge rounded-pill alert-success">Active</span>
                                      </a>
                                    <?php else: ?>
                                      <a href="<?php echo e(route('slider.active',['id'=>$slide->id])); ?>" > <span class="badge rounded-pill alert-danger">Disable</span></a>
                                    <?php endif; ?>
                                </td>
                                <td class="text-end">
                                    
                                    <div class="dropdown">
                                        <a href="#" data-bs-toggle="dropdown" class="btn btn-light rounded btn-sm font-sm"> <i class="material-icons md-more_horiz"></i> </a>
                                        <div class="dropdown-menu">
                                            <?php if(Auth::guard('admin')->user()->role == '1' || in_array('39', json_decode(Auth::guard('admin')->user()->staff->role->permissions))): ?>
                                            <a class="dropdown-item" href="<?php echo e(route('slider.edit',$slide->id)); ?>">Edit info</a>
                                            <?php endif; ?>
                                            <?php if(Auth::guard('admin')->user()->role == '1' || in_array('40', json_decode(Auth::guard('admin')->user()->staff->role->permissions))): ?>
                                            <a class="dropdown-item text-danger" href="<?php echo e(route('slider.destroy',$slide->id)); ?>" id="delete">Delete</a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <!-- dropdown //end -->
                                </td>
                              </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- card end// -->
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.admin_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/home2/boibaariclassici/public_html/resources/views/backend/slider/index.blade.php ENDPATH**/ ?>