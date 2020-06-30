<?php $__env->startSection('content'); ?>     
<div class="row">
  <div class="col-sm-9"></div>
  <div class="col-sm-3 margintop">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addoffer" >Submit Offer Letter</button>
  </div>
</div>
<?php
use Illuminate\Support\Facades\DB;   
?>
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
    <table id="apply" class="table table-striped table-bordered" style="width:100%">
      <thead>
          <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Course</th>
              <th>Offer letter</th>
              <th>Action</th>
          </tr>
      </thead>
      <tbody>
        <?php $__currentLoopData = $offer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offers): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $__currentLoopData = $apply; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $applys): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php

          if( $offers->app_id==$applys->id)
          {
            foreach ($inquiry as $inquirys)
            {
                if( $applys->inq_id==$inquirys->id)
                {
                  $std_name= $inquirys->std_name;
                  $course= $inquirys->course;
                  $inquirysid=$inquirys->id;
                  $submit_offer=$inquirys->submit_offer;
                }
            }
          }
            ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <tr>
                  <td><?php echo e($offers->id); ?></td>
                  <td><?php echo e($std_name); ?></td>
                  <td><?php echo e($course); ?></td>
                  <td><?php if($submit_offer==1): ?><span class="badge badge-success">Submit </span><?php else: ?> <span class="badge badge-danger">Not yet </span><?php endif; ?></td>
                  <td>
                    <button onclick="window.open('/document/<?php echo e($offers->offer_doc); ?>', '_blank');" target="_blank" class="btn btn-primary "> <i class="fa fa-eye"></i>  </button>
                    <button class="btn btn-xs btn-warning w3-right"data-offersidd="<?php echo e($offers->id); ?>" data-std_name="<?php echo e($std_name); ?>" data-intid="<?php echo e($inquirysid); ?>"  data-title="Offer Letter" data-toggle="modal" data-target="#edituser" >
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
              <th>Offer letter</th>
              <th>Action</th>
          </tr>
      </tfoot>
    </table>
  </div>
<div class="col-sm-3"></div>
</div>
<div class="modal fade" id="addoffer" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="productModalLabel">Submit Apply Document</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo e(route('councillor.offer.add')); ?>" method="POST"  enctype="multipart/form-data" autocomplete="off" >
          <?php echo e(csrf_field()); ?>


          <div class="form-group">

            <label for="inquiry-id" class="col-form-label">Select inquiry:</label>
            <table id="inquiry" class="table table-striped table-bordered" style="width:100%">

              <thead>
                  <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Course</th>
                      <th>Submit offer</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody>

                <?php $__currentLoopData = $apply; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $applys): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php

                  foreach ($inquiry as $inquirys)
                  {
                      if( $applys->inq_id==$inquirys->id)
                      {
                        $std_name= $inquirys->std_name;
                        $course= $inquirys->course;
                        $inquirysid=$inquirys->id;
                        $submit_offer=$inquirys->submit_offer;
                      }
                  }
                  ?>
                  <tr>
                      <td><?php echo e($applys->id); ?></td>
                      <td><?php echo e($std_name); ?></td>
                      <td><?php echo e($course); ?></td>
                      <td><?php if($submit_offer==1): ?><span class="badge badge-success">Submit </span><?php else: ?> <span class="badge badge-danger">Not yet </span><?php endif; ?></td>
                      <td>
                        <input type="radio" class="form-control"  id="applys-id" name="applys-id" value="<?php echo e($applys->id); ?>" title="Select inquiry" required>
                      </td>
        
                  </tr>
        
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
              <tfoot>
                  <tr>
                    <th>ID</th>
                      <th>Name</th>
                      <th>Course</th>
                      <th>Submit offer</th>
                      <th>Action</th>
                  </tr>
              </tfoot>
            </table>
          </div>

          <hr style="height:2px;border-width:0;color:rgb(83, 83, 82);background-color:rgb(29, 210, 255)">
          <div class="form-group">
            <label for="file-name" class="col-form-label" id="docName"></label>
            <input type="file" class="form-control"name="file-name" id="file-name" required accept="image/jpeg,image/jpg,image/png,application/pdf">
          </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button  type="submit"   class="btn btn-success">Add Inquiry</button>
    </div>
          
        </form>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="edituser" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="applyModalLabel" ></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo e(route('councillor.offer.update')); ?>" method="POST"  enctype="multipart/form-data">
          <?php echo e(csrf_field()); ?>

          <div class="form-group">
            <label for="file-name" class="col-form-label" id="docName"></label>
            <input type="file" class="form-control"name="file-name" id="file-name" required accept="image/jpeg,image/jpg,image/png,application/pdf">
          </div>
          <input type="hidden" name="std_name"  id="std_name" >
          <input type="hidden" name="offersidd"  id="offersidd" >
          <input type="hidden" name="titles"  id="titles" >
          <input type="hidden" name="intid"  id="intid" >
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button  type="submit"   class="btn btn-warning">Edit Document</button>
      </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  $('#edituser').on('shown.bs.modal', function (event) {
    var button=$(event.relatedTarget)
    var offersidd=button.data('offersidd')
    var title=button.data('title')
    var intid=button.data('intid')
    var std_name=button.data('std_name')
    var modal=$(this)
    modal.find('.modal-body #std_name').val(std_name)
    modal.find('.modal-body #intid').val(intid)
    modal.find('.modal-body #offersidd').val(offersidd)
    modal.find('.modal-body #titles').val(title)
    document.getElementById("applyModalLabel").innerHTML=title;
    document.getElementById("docName").innerHTML=title;

})
</script>
<script>
  $(document).ready(function() {
    $('#example').DataTable();
} );
  $(document).ready(function() {
    $('#apply').DataTable();
} );
  $(document).ready(function() {
    $('#inquiry').DataTable();
} );
  </script>

  <?php $__env->stopSection(); ?>
<?php echo $__env->make('councillor.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/janith/okto zone/PHP developer/student_counsellor /resources/views/councillor/offer/welcome.blade.php ENDPATH**/ ?>