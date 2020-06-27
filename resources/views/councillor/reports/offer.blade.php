@extends('councillor.layouts.app')
@section('content')  
<div class="row margintop" >
  <div class="col-sm-3 "></div>
  <div class="col-sm-6">
    
    @if(Session::has('editmessage'))
    <div class="alert alert-warning">
      {{ Session::get('editmessage') }} 
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif

    @if(Session::has('message'))
    <div class="alert alert-success">
      {{ Session::get('message') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
  </div>
    @endif
    @if(Session::has('deletemessage'))
    <div class="alert alert-danger">
      {{ Session::get('deletemessage') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif
    <table id="example" class="table table-striped table-bordered" style="width:100%">
      <thead>
          <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Course</th>
              <th>Submit Offer Letter</th>
          </tr>
      </thead>
      <tbody>
        @foreach ($inquiry as $inquirys)
            
          <tr>
              <td>{{$inquirys->id}}</td>
              <td>{{$inquirys->std_name}}</td>
              <td>{{$inquirys->course}}</td>
              <td style="text-align: center">@if($inquirys->submit_offer==1)<span class="badge badge-success">Submit </span>@else <span class="badge badge-danger">Not yet </span>@endif</td>
          </tr>

        @endforeach
      </tbody>
      <tfoot>
          <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Course</th>
              <th>Submit Offer Letter</th>
          </tr>
      </tfoot>
    </table>
  </div>
<div class="col-sm-3"></div>
</div>
<div class="modal fade" id="adduser" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="productModalLabel">Add Inquiry</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('councillor.inquiry.add')}}" method="POST"  enctype="multipart/form-data" autocomplete="off" >
          
          {{ csrf_field() }}
          <div class="form-group">
            <label for="inquiry-std_name" class="col-form-label">Student Neme:</label>
            <input type="text" class="form-control"name="inquiry-std_name" id="inquiry-std_name" required  autofocus autocomplete="off" >
          </div>
          <div class="form-group">
            <label for="inquiry-std_email" class="col-form-label">Student Email:</label>
            <input type="email" class="form-control" name="inquiry-std_email" id="inquiry-std_email" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="inquiry-std_age" class="col-form-label">Student Age:</label>
            <input type="number" class="form-control" name="inquiry-std_age" id="inquiry-std_age" min="0"  step="."  required>
          </div>
          <div class="form-group">
            <label for="inquiry-std_tel" class="col-form-label">Student Phone Number:</label>
            <input type="tel" class="form-control" name="inquiry-std_tel" id="inquiry-std_tel"pattern="[0-9]{10}" title="Enter valid phone number(0112 145 015)"  required>
          </div>
          <div class="form-group">
            <label for="inquiry-std_address" class="col-form-label">Student Address:</label>
            <textarea name="inquiry-address" id="inquiry-std_address"  class="form-control" required></textarea>
          </div>
          <div class="form-group">
            <label for="inquiry-university" class="col-form-label">University:</label>
            <input type="text" class="form-control" name="inquiry-university"  id="inquiry-university" required>
          </div> 
          <div class="form-group">
            <label for="inquiry-course" class="col-form-label">Course:</label>
            <input type="text" class="form-control" name="inquiry-course"  id="inquiry-course" required>
          </div> 
          <div class="form-group">
            <label for="inquiry-start_date" class="col-form-label">Start Month:</label>
            <input type="month" class="form-control" name="inquiry-start_date"  id="inquiry-start_date" required>
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

<div class="modal fade" id="editinquiry" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="productModalLabel">Edit User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('councillor.inquiry.update')}}" method="POST"  enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="inquiry-std_name" class="col-form-label">Student Neme:</label>
            <input type="text" class="form-control"name="inquiry-std_name" id="inquiry-std_name" required  autofocus autocomplete="off" >
          </div>
          <div class="form-group">
            <label for="inquiry-std_email" class="col-form-label">Student Email:</label>
            <input type="email" class="form-control" name="inquiry-std_email" id="inquiry-std_email" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="inquiry-std_tel" class="col-form-label">Student Phone Number:</label>
            <input type="tel" class="form-control" name="inquiry-std_tel" id="inquiry-std_tel"pattern="[0-9]{10}" title="Enter valid phone number(0112 145 015)"  required>
          </div>
          <div class="form-group">
            <label for="inquiry-std_address" class="col-form-label">Student Address:</label>
            <textarea name="inquiry-address" id="inquiry-std_address"  class="form-control" required></textarea>
          </div>
          <div class="form-group">
            <label for="inquiry-university" class="col-form-label">University:</label>
            <input type="text" class="form-control" name="inquiry-university"  id="inquiry-university" required>
          </div> 
          <div class="form-group">
            <label for="inquiry-course" class="col-form-label">Course:</label>
            <input type="text" class="form-control" name="inquiry-course"  id="inquiry-course" required>
          </div> 
          <div class="form-group">
            <label for="inquiry-start_date" class="col-form-label">Start Month:</label>
            <input type="month" class="form-control" name="inquiry-start_date"  id="inquiry-start_date" required>
          </div> 
          <input type="hidden" name="inquiryid"  id="inquiryid" >
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
        <form action="{{route('councillor.inquiry.delete')}}" method="POST"  enctype="multipart/form-data">
          {{ csrf_field() }}

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

  $('#editinquiry').on('shown.bs.modal', function (event) {

    var button=$(event.relatedTarget)
    var inqid=button.data('inqid')
    var std_name=button.data('std_name')
    var email=button.data('email')
    var address=button.data('address')
    var phone_num=button.data('phone_num')
    var course=button.data('course')
    var university=button.data('university')
    var start_date=button.data('start_date')

    var modal=$(this)
    document.getElementById("userid").innerHTML=inqid;
    modal.find('.modal-body #inquiryid').val(inqid)
    modal.find('.modal-body #inquiry-std_name').val(std_name)
    modal.find('.modal-body #inquiry-std_email').val(email)
    modal.find('.modal-body #inquiry-std_tel').val(phone_num)
    modal.find('.modal-body #inquiry-std_address').val(address)
    modal.find('.modal-body #inquiry-university').val(university)
    modal.find('.modal-body #inquiry-course').val(course)
    modal.find('.modal-body #inquiry-start_date').val(start_date)

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
<script>
  $(document).ready(function() {
    $('#example').DataTable();
} );
  </script>

  @endsection