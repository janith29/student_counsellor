@extends('admin.layouts.app')
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
              <th>Submit Apply document</th>
              <th>Submit Offer Letter</th>
          </tr>
      </thead>
      <tbody>
        @foreach ($inquiry as $inquirys)
            
          <tr>
              <td>{{$inquirys->id}}</td>
              <td>{{$inquirys->std_name}}</td>
              <td style="text-align: center">@if($inquirys->submit_document==1)<span class="badge badge-success">Submit </span>@else <span class="badge badge-danger">Not yet </span>@endif</td>
              <td style="text-align: center">@if($inquirys->submit_offer==1)<span class="badge badge-success">Submit </span>@else <span class="badge badge-danger">Not yet </span>@endif</td>
            </tr>

        @endforeach
      </tbody>
      <tfoot>
          <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Submit Apply document</th>
              <th>Submit Offer Letter</th>
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