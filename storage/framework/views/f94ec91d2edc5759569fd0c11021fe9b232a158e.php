<?php $__env->startSection('content'); ?>     

<div class="row margintop">
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
            <a href="/admin/user" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Go Back</a>
            <?php if( auth()->user()->id!=$user->id): ?>
               
            <button class="btn btn-xs btn-warning" data-username="<?php echo e($user->name); ?>" data-useremail="<?php echo e($user->email); ?>"  data-userid="<?php echo e($user->id); ?>"  data-useremail="<?php echo e($user->email); ?>" data-toggle="modal" data-target="#edituser" >
              <i class="fa fa-pencil"></i>
            </button>
            <button class="btn btn-xs btn-danger"  data-username="<?php echo e($user->name); ?>" data-userid="<?php echo e($user->id); ?>"  data-useremail="<?php echo e($user->email); ?>" data-toggle="modal" data-target="#deleteuser" >
              <i class="fa fa-trash"></i>
            </button>
              <?php endif; ?>
        </div>

      </div>
  </div>
<div class="col-sm-3"></div>
</div>

<div class="modal fade" id="edituser" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="productModalLabel">Edit User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?php echo e(route('admin.user.update')); ?>" method="POST"  enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

            <div class="form-group">
              <label for="user-name" class="col-form-label">User Neme:</label>
              <input type="text" class="form-control"name="user-name" id="username" required>
            </div>
            <div class="form-group">
              <label for="user-email" class="col-form-label">User Email:</label>
              <input type="email" class="form-control" name="user-email" id="useremail"  required>
            </div>
            <input type="hidden" name="userid"  id="userid" >
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button  type="submit"   class="btn btn-success">Edit User</button>
        </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="deleteuser" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content bg-danger">
        <div class="modal-header">
          <h5 class="modal-title" id="productModalLabel">Edit User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body ">
          <form action="<?php echo e(route('admin.user.delete')); ?>" method="POST"  enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

  
            <h3 class="text-white"> Do you want to delete? </h3>
            <h3 >
              <span class="text-white">Id:</span>  <strong><span id="userDeleteid"></span></strong>
             </h3>
             <h3 >
               <span class="text-white">User name:</span> <strong><span id="userDeleteusername"></span></strong>
             </h3>
             <h3 >
               <span class="text-white">Email:</span> <strong><span id="userDeleteuseremail"></span></strong>
             </h3>
            <input type="hidden" name="userid"  id="userid" >
  
        </div>
        <div class="modal-footer bg-warning">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button  type="submit"   class="btn btn-danger">Delete User</button>
        </div>
          </form>
      </div>
    </div>
  </div>
  <script>
    $('#edituser').on('shown.bs.modal', function (event) {
      var button=$(event.relatedTarget)
      var usernamee=button.data('username')
      var useremail=button.data('useremail')
      var userid=button.data('userid')
      console.log(username)
      var modal=$(this)
      document.getElementById("userid").innerHTML=userid;
      modal.find('.modal-body #username').val(usernamee)
      modal.find('.modal-body #useremail').val(useremail)
      modal.find('.modal-body #userid').val(userid)
  
  })
  $('#deleteuser').on('shown.bs.modal', function (event) {

var button=$(event.relatedTarget)
var usernamee=button.data('username')
var userid=button.data('userid')
var useremail=button.data('useremail')
document.getElementById("userDeleteid").innerHTML =userid;
document.getElementById("userDeleteusername").innerHTML =usernamee;
document.getElementById("userDeleteuseremail").innerHTML =useremail;
var modal=$(this)
modal.find('.modal-body #userid').val(userid)

})
  </script>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/janith/okto zone/PHP developer/student_counsellor /resources/views/admin/user/show.blade.php ENDPATH**/ ?>