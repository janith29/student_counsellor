@extends('councillor.layouts.app')
@section('content')     
<div class="row">
  <div class="col-sm-9"></div>
  <div class="col-sm-3 margintop">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#adduser" >Submit Apply Document</button>
  </div>
</div>
@php
use Illuminate\Support\Facades\DB;   
@endphp
<div class="row" >
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
        @foreach ($apply as $applys)
        @php
        $inquiryes=DB::table('apply')->where('id', $applys->inq_id);

        foreach ($inquiry as $inquirys)
        {
            if( $applys->inq_id==$inquirys->id)
            {
              $std_name= $inquirys->std_name;
              $course= $inquirys->course;
              $submit_offer=$inquirys->submit_offer;
            }
        }
        @endphp
          <tr>
              <td>{{$applys->id}}</td>
              <td>{{$std_name}}</td>
              <td>{{$course}}</td>
              <td>@if($submit_offer==1)<span class="badge badge-success">Submit </span>@else <span class="badge badge-danger">Not yet </span>@endif</td>
              <td>
                <a class="btn btn-xs btn-primary" href="{{ route('councillor.apply.show',$applys->id) }}">
                  <i class="fa fa-eye"></i>
                </a>
              </td>

          </tr>

        @endforeach
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
<div class="modal fade" id="adduser" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="productModalLabel">Submit Apply Document</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('councillor.apply.add')}}" method="POST"  enctype="multipart/form-data" autocomplete="off" >
          {{ csrf_field() }}

          <div class="form-group">

            <label for="inquiry-id" class="col-form-label">Select inquiry:</label>
            <table id="inquiry" class="table table-striped table-bordered" style="width:100%">

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
                @foreach ($inquiry as $inquirys)
                    
                  <tr>
                      <td>{{$inquirys->id}}</td>
                      <td>{{$inquirys->std_name}}</td>
                      <td>{{$inquirys->course}}</td>
                      <td>{{date("F Y",strtotime($inquirys->start_date))}}</td>
                      <td>
                        <input type="radio" class="form-control"  id="inquiry-id" name="inquiry-id" value="{{$inquirys->id}}" title="Select inquiry" required>
                      </td>
        
                  </tr>
        
                @endforeach
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

          <hr style="height:2px;border-width:0;color:rgb(83, 83, 82);background-color:rgb(29, 210, 255)">
          
          <div class="form-group">
            <label for="apply-hed" class="col-form-label">Higher Education Document:</label>
            <input type="file" class="form-control" name="apply-hed"  id="apply-hed" required accept="image/jpeg,image/jpg,image/png,application/pdf">
          </div>
          <div class="form-group">
            <label for="apply-IELTS" class="col-form-label">IELTS Document:</label>
            <input type="file" class="form-control" name="apply-IELTS"  id="apply-IELTS" required accept="image/jpeg,image/jpg,image/png,application/pdf">
          </div>
          <div class="form-group">
            <label for="apply-cl" class="col-form-label">Covering letter:</label>
            <input type="file" class="form-control" name="apply-cl"  id="apply-cl" required accept="image/jpeg,image/jpg,image/png,application/pdf">
          </div>
          <div class="form-group">
            <label for="apply-rl" class="col-form-label">Reference letter:</label>
            <input type="file" class="form-control" name="apply-rl"  id="apply-rl" required accept="image/jpeg,image/jpg,image/png,application/pdf">
          </div>
          <div class="form-group">
            <label for="apply-cv" class="col-form-label">Curriculum Vitae:</label>
            <input type="file" class="form-control" name="apply-cv"  id="apply-cv" required accept="image/jpeg,image/jpg,image/png,application/pdf">
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
<script>

  $('#edituser').on('shown.bs.modal', function (event) {

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

  @endsection