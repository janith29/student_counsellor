@extends('admin.layouts.app')
@section('content')     

@php
use Illuminate\Support\Facades\DB;   
@endphp
<div class="row margintop">

<div class="col-sm-3">
  <div class="card bg-primary">
    <div class="card-header bg-info">
      <h4 class="card-title" style="text-align: center">Sumbit Offer letter </h4>
    </div>
    <div class="card-body">
      <form action="{{route('admin.reports.offer')}}" method="POST"  enctype="multipart/form-data">
        {{ csrf_field() }}
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
      <form action="{{route('admin.reports.summary')}}" method="POST"  enctype="multipart/form-data">
        {{ csrf_field() }}
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

      <form action="{{route('admin.reports.apply')}}" method="POST"  enctype="multipart/form-data">
        {{ csrf_field() }}
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
        <form action="{{route('admin.reports.university')}}" method="POST"  enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="file-name" class="col-form-label" id="docName">Select University</label>
            <select class="form-control" name="university" id="university" required>
              <option class="form-control"value="">Select</option>
              <option class="form-control"value="all">All University</option>
              @foreach ($university as $universitys)
                <option class="form-control"value="{{$universitys->university}}">{{$universitys->university}}</option>
              @endforeach

              <option class="form-control"value="{{date("Y-m-d",strtotime($dateslast))}}">{{$dateslast}}</option>
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
        <form action="{{route('admin.reports.course')}}" method="POST"  enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="file-name" class="col-form-label" id="docName">Select course</label>
            <select class="form-control" name="course" id="course" required>
              <option class="form-control"value="">Select</option>
              <option class="form-control"value="all">All course</option>
              @foreach ($course as $courses)
                <option class="form-control"value="{{$courses->course}}">{{$courses->course}}</option>
              @endforeach

              <option class="form-control"value="{{date("Y-m-d",strtotime($dateslast))}}">{{$dateslast}}</option>
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

        <form action="{{route('admin.reports.age')}}" method="POST"  enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="file-name" class="col-form-label" id="docName">First Age</label>
            <select class="form-control" name="first_age" id="first_age" required>
              <option class="form-control"value="">Select Age</option>
            <option class="form-control"value="{{$agefist}}">{{$agefist}}</option>
              @foreach ($age as $ages)
            <option class="form-control"value="{{$ages->age}}">{{$ages->age}}</option>
              @endforeach

              <option class="form-control"value="{{$agelast}}">{{$agelast}}</option>
            </select>
          </div>
          <div class="form-group">
            <label for="file-name" class="col-form-label" id="docName">Last Age</label>
            <select class="form-control" name="last_age" id="last_age" required>
              <option class="form-control"value="">Select Age</option>
              <option class="form-control"value="{{$agefist}}">{{$agefist}}</option>
              @foreach ($age as $ages)
            <option class="form-control"value="{{$ages->age}}">{{$ages->age}}</option>
              @endforeach

              <option class="form-control"value="{{$agelast}}">{{$agelast}}</option>
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

        <form action="{{route('admin.reports.dates')}}" method="POST"  enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="file-name" class="col-form-label" id="docName">First month</label>
            <select class="form-control" name="first_month" id="first_month" required>
              <option class="form-control"value="">Select month</option>
            <option class="form-control"value="{{date("Y-m-d",strtotime($datesfist))}}">{{$datesfist}}</option>
              @foreach ($dates as $date)
            <option class="form-control"value="{{$date->start_date}}">{{date('M Y',strtotime($date->start_date))}}</option>
              @endforeach

              <option class="form-control"value="{{date("Y-m-d",strtotime($dateslast))}}">{{$dateslast}}</option>
            </select>
          </div>
          <div class="form-group">
            <label for="file-name" class="col-form-label" id="docName">Last month</label>
            <select class="form-control" name="last_month" id="last_month" required>
              <option class="form-control"value="">Select month</option>
              <option class="form-control"value="{{date("Y-m-d",strtotime($datesfist))}}">{{$datesfist}}</option>
                @foreach ($dates as $date)
              <option class="form-control"value="{{$date->start_date}}">{{date('M Y',strtotime($date->start_date))}}</option>
                @endforeach
  
                <option class="form-control"value="{{date("Y-m-d",strtotime($dateslast))}}">{{$dateslast}}</option>
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

  @endsection