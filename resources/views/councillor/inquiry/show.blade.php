@extends('councillor.layouts.app')
@section('content')     

<div class="row margintop">
  <div class="col-sm-3"></div>
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
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Student name</h5>
            <h3>  <strong> {{$inquiry->std_name}}</strong> </h3>
          
        </div>
        <div class="card-body">
        <div class="card "style="margin-top:10px">
            <h5 class="card-title">Student Email:- <strong> {{($inquiry->email)}}</strong></h5>
        </div>
        <div class="card "style="margin-top:10px">
            <h5 class="card-title">Student Age:- <strong> {{($inquiry->age)}}</strong></h5>
        </div>
        <div class="card "style="margin-top:10px">
            <h5 class="card-title">Student Phone Number:- <strong> {{($inquiry->phone_num)}}</strong></h5>
        </div>
        <div class="card "style="margin-top:10px">
            <h5 class="card-title">Student Address:- <strong> {{($inquiry->address)}}</strong></h5>
        </div>
        <div class="card "style="margin-top:10px">
            <h5 class="card-title">University- <strong> {{($inquiry->university)}}</strong></h5>
        </div>
        <div class="card "style="margin-top:10px">
            <h5 class="card-title">Course:- <strong> {{($inquiry->course)}}</strong></h5>
        </div>
        </div>
        <div class="card-footer">
            <a href="/councillor/inquiry" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Go Back</a>
       
            <button class="btn btn-xs btn-warning" data-std_name="{{$inquiry->std_name}}" data-email="{{$inquiry->email}}" data-address="{{$inquiry->address}}" data-phone_num="{{$inquiry->phone_num}}" data-course="{{$inquiry->course}}"  data-start_date="{{date("Y-m",strtotime($inquiry->start_date))}}" data-university="{{$inquiry->university}}" data-inqid="{{$inquiry->id}}"  data-toggle="modal" data-target="#editinquiry" >
              <i class="fa fa-pencil"></i>
            </button>
            {{-- <button class="btn btn-xs btn-danger"  data-username="{{$user->name}}" data-userid="{{$user->id}}"  data-useremail="{{$user->email}}" data-toggle="modal" data-target="#deleteuser" >
              <i class="fa fa-trash"></i>
            </button> --}}
        </div>

      </div>
  </div>
<div class="col-sm-3"></div>
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
          <form action="{{route('admin.user.delete')}}" method="POST"  enctype="multipart/form-data">
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
  @endsection