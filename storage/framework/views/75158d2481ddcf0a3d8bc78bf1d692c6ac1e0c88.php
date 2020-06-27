<?php $__env->startSection('content'); ?>     

<div class="row" style="margin-top:60px">
  <div class="col-sm-3"></div>
  <div class="col-sm-6">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">User name</h5>
            <h3>  <strong> <?php echo e($user->name); ?></strong> </h3>
          
        </div>
        <div class="card-body">
            <div class="text-center">
                <img src="/image/user/<?php echo e($user->image); ?>" class=" img-thumbnail rounded" alt="<?php echo e($user->name); ?>" width="300" height="300">
            </div>
        <div class="card "style="margin-top:10px">
            <h5 class="card-title">User price:- <strong> <?php echo e(($user->email)); ?></strong></h5>
        </div>
        <div class="card "style="margin-top:10px">
            <h5 class="card-title">User role:- <strong> <?php echo e(($user->userrole)); ?></strong></h5>
        </div>
        </div>
        <div class="card-footer">
            <a href="/councillor/user" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Go Back</a>
        </div>

      </div>
  </div>
<div class="col-sm-3"></div>
</div>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('councillor.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/janith/okto zone/PHP developer/student_counsellor /resources/views/councillor/user/show.blade.php ENDPATH**/ ?>