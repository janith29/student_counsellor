@extends('councillor.layouts.app')
@section('content')     
<div class="row">
  <div class="col-sm-9"></div>
  <div class="col-sm-3 margintop">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#adduser" >Add Inquiry</button>
  </div>
</div>
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
        @foreach ($inquiry as $inquirys)
            
          <tr>
              <td>{{$inquirys->id}}</td>
              <td>{{$inquirys->std_name}}</td>
              <td>{{$inquirys->course}}</td>
              <td>{{date("F Y",strtotime($inquirys->start_date))}}</td>
              <td>
                <a class="btn btn-xs btn-primary" href="{{ route('councillor.inquiry.show',$inquirys->id) }}">
                  <i class="fa fa-eye"></i>
                </a>
               
              <button class="btn btn-xs btn-warning" data-std_name="{{$inquirys->std_name}}" data-email="{{$inquirys->email}}" data-address="{{$inquirys->address}}" data-phone_num="{{$inquirys->phone_num}}" data-course="{{$inquirys->course}}"  data-start_date="{{date("Y-m",strtotime($inquirys->start_date))}}" data-university="{{$inquirys->university}}" data-inqid="{{$inquirys->id}}"  data-toggle="modal" data-target="#editinquiry" >
                <i class="fa fa-pencil"></i>
              </button>
              {{-- <button class="btn btn-xs btn-danger" data-std_name="{{$inquirys->std_name}}" data-email="{{$inquirys->email}}"  data-inqid="{{$inquirys->id}}"data-toggle="modal" data-target="#deleteuser" >
                <i class="fa fa-trash"></i>
              </button> --}}
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

<script>
  $(document).ready(function() {
    $('#example').DataTable();
} );
  </script>

  @endsection