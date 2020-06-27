<?php $__env->startSection('content'); ?>     

  
<div class="w3-display-middle bg-text">

  <?php if(Session::has('message')): ?>
  <div class="alert alert-danger">
    <?php echo e(Session::get('message')); ?>

    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <?php endif; ?>
    <h1 class="w3-jumbo w3-animate-top w3-text-white ">Student consultation  </h1>
    <hr class="w3-border-grey" style="margin:auto;width:60%">
</div>   

  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/janith/okto zone/PHP developer/student_counsellor /resources/views/welcome.blade.php ENDPATH**/ ?>