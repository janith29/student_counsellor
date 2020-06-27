<?php $__env->startSection('content'); ?>  

<div class="row margintop" >
  <div class="col-sm-3 "></div>
  <div class="col-sm-6">
    
    <?php if(Session::has('editmessage')): ?>
    <div class="alert alert-warning">
      <?php echo e(Session::get('editmessage')); ?> 
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <?php endif; ?>

    <?php if(Session::has('message')): ?>
    <div class="alert alert-success">
      <?php echo e(Session::get('message')); ?>

      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
  </div>
    <?php endif; ?>
    <?php if(Session::has('deletemessage')): ?>
    <div class="alert alert-danger">
      <?php echo e(Session::get('deletemessage')); ?>

      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <?php endif; ?>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
      <thead>
          <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Course</th>
              <th> Age</th>
          </tr>
      </thead>
      <tbody>
        <?php $__currentLoopData = $inquiry; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inquirys): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
          <tr>
              <td><?php echo e($inquirys->id); ?></td>
              <td><?php echo e($inquirys->std_name); ?></td>
              <td><?php echo e($inquirys->course); ?></td>
              <td><?php echo e($inquirys->age); ?></td>

          </tr>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
      <tfoot>
          <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Course</th>
              <th> Age</th>
          </tr>
      </tfoot>
    </table>
  </div>
<div class="col-sm-3"></div>
</div>
<script>
  $(document).ready(function() {
    $('#example').DataTable();
} );
  </script>

  <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/janith/okto zone/PHP developer/student_counsellor /resources/views/admin/reports/age.blade.php ENDPATH**/ ?>