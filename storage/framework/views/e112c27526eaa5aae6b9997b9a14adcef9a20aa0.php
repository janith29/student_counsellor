<?php $__env->startSection('content'); ?>     

<?php
use Illuminate\Support\Facades\DB;   
?>
<div class="row margintop">

<div class="col-sm-3">
  <div class="card bg-primary">
    <div class="card-header bg-info">
      <h4 class="card-title" style="text-align: center">Sumbit Offer letter </h4>
    </div>
    <div class="card-body">
      <form action="<?php echo e(route('admin.reports.offer')); ?>" method="POST"  enctype="multipart/form-data">
        <?php echo e(csrf_field()); ?>

        <div class="form-group">
          <label for="file-name" class="col-form-label" id="docName">Select One</label>
          <select class="form-control" name="doc" id="doc" required>
            <option class="form-control"value="">Select</option>
            <option class="form-control"value="all">All </option>
            <option class="form-control"value="not">Not submit </option>
            <option class="form-control"value="yes">Sumbited </option>
            
          </select>
        </div>
        <button  type="submit"   class="btn btn-success">Generator</button>
      </form>

    </div>
  </div>
</div>
<div class="col-sm-3">
  <div class="card bg-primary">
    <div class="card-header bg-info">
      <h4 class="card-title" style="text-align: center">Document summary</h4>
    </div>
    <div class="card-body">
      <form action="<?php echo e(route('admin.reports.summary')); ?>" method="POST"  enctype="multipart/form-data">
        <?php echo e(csrf_field()); ?>

        <div class="form-group">
          <label for="file-name" class="col-form-label" id="docName">Select One</label>
          <select class="form-control" name="doc" id="doc" required>
            <option class="form-control"value="">Select</option>
            <option class="form-control"value="all">All </option>
            <option class="form-control"value="not">Not submit </option>
            <option class="form-control"value="yes">Sumbited </option>
            
          </select>
        </div>
        <button  type="submit"   class="btn btn-success">Generator</button>
      </form>
    </div>
  </div>
</div>

<div class="col-sm-3">
  <div class="card bg-primary">
    <div class="card-header bg-info">
      <h4 class="card-title" style="text-align: center">Sumbit Apply Document</h4>
    </div>
    <div class="card-body">

      <form action="<?php echo e(route('admin.reports.apply')); ?>" method="POST"  enctype="multipart/form-data">
        <?php echo e(csrf_field()); ?>

        <div class="form-group">
          <label for="file-name" class="col-form-label" id="docName">Select One</label>
          <select class="form-control" name="doc" id="doc" required>
            <option class="form-control"value="">Select</option>
            <option class="form-control"value="all">All </option>
            <option class="form-control"value="not">Not submit </option>
            <option class="form-control"value="yes">Sumbited </option>
            
          </select>
        </div>
        <button  type="submit"   class="btn btn-success">Generator</button>
      </form>
      
    </div>
  </div>
</div>

  <div class="col-sm-3">
    <div class="card bg-primary">
      <div class="card-header bg-info">
        <h4 class="card-title" style="text-align: center">University </h4>
      </div>
      <div class="card-body">
        <form action="<?php echo e(route('admin.reports.university')); ?>" method="POST"  enctype="multipart/form-data">
          <?php echo e(csrf_field()); ?>

          <div class="form-group">
            <label for="file-name" class="col-form-label" id="docName">Select University</label>
            <select class="form-control" name="university" id="university" required>
              <option class="form-control"value="">Select</option>
              <option class="form-control"value="all">All University</option>
              <?php $__currentLoopData = $university; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $universitys): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option class="form-control"value="<?php echo e($universitys->university); ?>"><?php echo e($universitys->university); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

              <option class="form-control"value="<?php echo e(date("Y-m-d",strtotime($dateslast))); ?>"><?php echo e($dateslast); ?></option>
            </select>
          </div>
          <button  type="submit"   class="btn btn-success">Generator</button>
        <h1 class="card-title"  style="text-align: center"><strong></strong></h1>
        </form>
      </div>
    </div>
  </div>

</div>


<div class="row margintop">

  <div class="col-sm-3">
    <div class="card bg-primary">
      <div class="card-header bg-info">
        <h4 class="card-title" style="text-align: center">Course</h4>
      </div>
      <div class="card-body">
        <form action="<?php echo e(route('admin.reports.course')); ?>" method="POST"  enctype="multipart/form-data">
          <?php echo e(csrf_field()); ?>

          <div class="form-group">
            <label for="file-name" class="col-form-label" id="docName">Select course</label>
            <select class="form-control" name="course" id="course" required>
              <option class="form-control"value="">Select</option>
              <option class="form-control"value="all">All course</option>
              <?php $__currentLoopData = $course; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $courses): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option class="form-control"value="<?php echo e($courses->course); ?>"><?php echo e($courses->course); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

              <option class="form-control"value="<?php echo e(date("Y-m-d",strtotime($dateslast))); ?>"><?php echo e($dateslast); ?></option>
            </select>
          </div>
          <button  type="submit"   class="btn btn-success">Generator</button>
        </form>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card bg-primary">
      <div class="card-header bg-info">
        <h4 class="card-title" style="text-align: center">Age</h4>
      </div>
      <div class="card-body">

        <form action="<?php echo e(route('admin.reports.age')); ?>" method="POST"  enctype="multipart/form-data">
          <?php echo e(csrf_field()); ?>

          <div class="form-group">
            <label for="file-name" class="col-form-label" id="docName">First Age</label>
            <select class="form-control" name="first_age" id="first_age" required>
              <option class="form-control"value="">Select Age</option>
            <option class="form-control"value="<?php echo e($agefist); ?>"><?php echo e($agefist); ?></option>
              <?php $__currentLoopData = $age; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ages): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option class="form-control"value="<?php echo e($ages->age); ?>"><?php echo e($ages->age); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

              <option class="form-control"value="<?php echo e($agelast); ?>"><?php echo e($agelast); ?></option>
            </select>
          </div>
          <div class="form-group">
            <label for="file-name" class="col-form-label" id="docName">Last Age</label>
            <select class="form-control" name="last_age" id="last_age" required>
              <option class="form-control"value="">Select Age</option>
              <option class="form-control"value="<?php echo e($agefist); ?>"><?php echo e($agefist); ?></option>
              <?php $__currentLoopData = $age; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ages): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option class="form-control"value="<?php echo e($ages->age); ?>"><?php echo e($ages->age); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

              <option class="form-control"value="<?php echo e($agelast); ?>"><?php echo e($agelast); ?></option>
            </select>
          </div>
          <button  type="submit"   class="btn btn-success">Generator</button>
        <h1 class="card-title"  style="text-align: center"><strong></strong></h1>
        </form>
      </div>
    </div>
  </div>

  <div class="col-sm-3">
    <div class="card bg-primary">
      <div class="card-header bg-info">
        <h4 class="card-title" style="text-align: center">Start month</h4>
      </div>
      <div class="card-body">

        <form action="<?php echo e(route('admin.reports.dates')); ?>" method="POST"  enctype="multipart/form-data">
          <?php echo e(csrf_field()); ?>

          <div class="form-group">
            <label for="file-name" class="col-form-label" id="docName">First month</label>
            <select class="form-control" name="first_month" id="first_month" required>
              <option class="form-control"value="">Select month</option>
            <option class="form-control"value="<?php echo e(date("Y-m-d",strtotime($datesfist))); ?>"><?php echo e($datesfist); ?></option>
              <?php $__currentLoopData = $dates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $date): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option class="form-control"value="<?php echo e($date->start_date); ?>"><?php echo e(date('M Y',strtotime($date->start_date))); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

              <option class="form-control"value="<?php echo e(date("Y-m-d",strtotime($dateslast))); ?>"><?php echo e($dateslast); ?></option>
            </select>
          </div>
          <div class="form-group">
            <label for="file-name" class="col-form-label" id="docName">Last month</label>
            <select class="form-control" name="last_month" id="last_month" required>
              <option class="form-control"value="">Select month</option>
              <option class="form-control"value="<?php echo e(date("Y-m-d",strtotime($datesfist))); ?>"><?php echo e($datesfist); ?></option>
                <?php $__currentLoopData = $dates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $date): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option class="form-control"value="<?php echo e($date->start_date); ?>"><?php echo e(date('M Y',strtotime($date->start_date))); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  
                <option class="form-control"value="<?php echo e(date("Y-m-d",strtotime($dateslast))); ?>"><?php echo e($dateslast); ?></option>
            </select>
          </div>
          <button  type="submit"   class="btn btn-success">Generator</button>
        <h1 class="card-title"  style="text-align: center"><strong></strong></h1>
        </form>
      </div>
    </div>
  </div>
<div class="col-sm-3"> </div>
</div>

  <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/janith/okto zone/PHP developer/student_counsellor /resources/views/admin/reports/welcome.blade.php ENDPATH**/ ?>