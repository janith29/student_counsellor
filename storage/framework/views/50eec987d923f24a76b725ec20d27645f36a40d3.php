<?php $__env->startSection('content'); ?>     
<div class="row">
  <div class="col-sm-9"></div>
  <div class="col-sm-3 margintop">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#adduser" >Add Inquiry</button>
  </div>
</div>
<div class="row" >
  <div class="col-sm-3"></div>
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
              <th>Start Month</th>
              <th>Action</th>
          </tr>
      </thead>
      <tbody>
        <?php $__currentLoopData = $inquiry; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inquirys): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
          <tr>
              <td><?php echo e($inquirys->id); ?></td>
              <td><?php echo e($inquirys->std_name); ?></td>
              <td><?php echo e($inquirys->course); ?></td>
              <td><?php echo e(date("F Y",strtotime($inquirys->start_date))); ?></td>
              <td>
                <a class="btn btn-xs btn-primary" href="<?php echo e(route('councillor.inquiry.show',$inquirys->id)); ?>">
                  <i class="fa fa-eye"></i>
                </a>
               
              <button class="btn btn-xs btn-warning" data-std_name="<?php echo e($inquirys->std_name); ?>" data-email="<?php echo e($inquirys->email); ?>" data-address="<?php echo e($inquirys->address); ?>" data-phone_num="<?php echo e($inquirys->phone_num); ?>" data-course="<?php echo e($inquirys->course); ?>"  data-start_date="<?php echo e(date("Y-m",strtotime($inquirys->start_date))); ?>" data-university="<?php echo e($inquirys->university); ?>" data-inqid="<?php echo e($inquirys->id); ?>"  data-toggle="modal" data-target="#editinquiry" >
                <i class="fa fa-pencil"></i>
              </button>
              
              </td>

          </tr>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
      <tfoot>
          <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Course</th>
              <th>Start Month</th>
              <th>Action</th>
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
<?php echo $__env->make('councillor.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/janith/okto zone/PHP developer/student_counsellor /resources/views/councillor/inquiry/welcome.blade.php ENDPATH**/ ?>