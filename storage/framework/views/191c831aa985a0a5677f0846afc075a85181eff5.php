<?php $__env->startSection('content'); ?>     

  
<div >

<img src="/img/consultation.jpg" alt="Flowers in Chania" style="height: 50%;no-repeat;background-size: cover;min-height: 100%;filter: blur(8px);-webkit-filter: blur(8px);">

<div class="w3-display-middle bg-text  " style="text-align: center">
  <div class="card bg-primary">
    <div class="card-header bg-info">
      <h4 class="card-title" style="text-align: center">User count</h4>
    </div>
    <div class="card-body">
      <h1 class="card-title"  style="text-align: center"><strong><?php echo e($counts['user']); ?></strong></h1>
    </div>
  </div>
  <div class="card bg-primary" style="margin-top:60px">
    <div class="card-header bg-info">
      <h4 class="card-title" style="text-align: center">Inquiry count</h4>
    </div>
    <div class="card-body" style="text-align: center">
      <h1 class="card-title"><strong><?php echo e($counts['inquiry']); ?></strong></h1>
    </div>
  </div>
</div>   
</div>

  <?php $__env->stopSection(); ?>
<?php echo $__env->make('councillor.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/janith/okto zone/PHP developer/student_counsellor /resources/views/councillor/welcome.blade.php ENDPATH**/ ?>