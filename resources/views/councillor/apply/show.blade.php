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
    <div class="card">
        <div class="card-header">
          @php
          foreach ($inquiry as $inquirys)
          {
              if( $apply->inq_id==$inquirys->id)
              {
                $std_name= $inquirys->std_name;
                $course= $inquirys->course;
                $submit_offer=$inquirys->submit_offer;
              }
          }
          @endphp
            <h5 class="card-title">Student name</h5>
            <h3>  <strong> {{$std_name}}</strong> </h3>
            <h5 class="card-title">Course </h5>
            <h3>  <strong> {{$course}}</strong> </h3>
          
        </div>
        <div class="card-body">
        <div class="card "style="margin-top:10px">
            <h5 class="card-title">Higher Education Document:-
              <button class="btn btn-xs btn-warning w3-right"data-intid="{{$inquirys->id}}" data-std_name="{{$std_name}}" data-id="{{$apply->id}}" data-inq_id="{{$apply->inq_id}}" data-type="hd_doc" data-title="Higher Education Document" data-toggle="modal" data-target="#edituser" >
                <i class="fa fa-pencil"></i>
              </button>
            <button onclick="window.open('/document/{{$apply->hd_doc}}', '_blank');" target="_blank" class="btn btn-primary w3-right"> <i class="fa fa-eye"></i> View </button>
          </h5>
        </div>
        <div class="card "style="margin-top:10px">
            <h5 class="card-title">IELTS Document:-
              <button class="btn btn-xs btn-warning w3-right"data-intid="{{$inquirys->id}}" data-std_name="{{$std_name}}" data-id="{{$apply->id}}" data-inq_id="{{$apply->inq_id}}" data-type="ielts_doc" data-title="IELTS Document" data-toggle="modal" data-target="#edituser" >
                <i class="fa fa-pencil"></i>
              </button>
            <button onclick="window.open('/document/{{$apply->ielts_doc}}', '_blank');" target="_blank" class="btn btn-primary w3-right"> <i class="fa fa-eye"></i> View </button>
            </h5>
        </div>
        <div class="card "style="margin-top:10px">
            <h5 class="card-title">Covering letter:- 
              <button class="btn btn-xs btn-warning w3-right"data-intid="{{$inquirys->id}}" data-std_name="{{$std_name}}" data-id="{{$apply->id}}" data-inq_id="{{$apply->inq_id}}" data-type="cl_doc" data-title="Covering letter" data-toggle="modal" data-target="#edituser" >
                <i class="fa fa-pencil"></i>
              </button>
            <button onclick="window.open('/document/{{$apply->cl_doc}}', '_blank');" target="_blank" class="btn btn-primary w3-right"> <i class="fa fa-eye"></i> View </button>
              </h5>
        </div>
        <div class="card "style="margin-top:10px">
            <h5 class="card-title">Reference letter:- 
              <button class="btn btn-xs btn-warning w3-right"data-intid="{{$inquirys->id}}" data-std_name="{{$std_name}}" data-id="{{$apply->id}}" data-inq_id="{{$apply->inq_id}}" data-type="rl_doc" data-title="Reference letter" data-toggle="modal" data-target="#edituser" >
                <i class="fa fa-pencil"></i>
              </button>
            <button onclick="window.open('/document/{{$apply->rl_doc}}', '_blank');" target="_blank" class="btn btn-primary w3-right"> <i class="fa fa-eye"></i> View </button>
            </h5> 
        </div>
        <div class="card "style="margin-top:10px">
            <h5 class="card-title">Curriculum Vitae:- 
              <button class="btn btn-xs btn-warning w3-right"data-intid="{{$inquirys->id}}" data-std_name="{{$std_name}}" data-id="{{$apply->id}}" data-inq_id="{{$apply->inq_id}}" data-type="cv_doc" data-title="Curriculum Vitae" data-toggle="modal" data-target="#edituser" >
                <i class="fa fa-pencil"></i>
              </button>
            <button onclick="window.open('/document/{{$apply->cv_doc}}', '_blank');" target="_blank" class="btn btn-primary w3-right"> <i class="fa fa-eye"></i> View </button>
            </h5> 
        </div>
        </div>
        <div class="card-footer">
            <a href="/councillor/apply" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Go Back</a>
        </div>

      </div>
  </div>
<div class="col-sm-3"></div>
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
          <form action="{{route('councillor.apply.update')}}" method="POST"  enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="file-name" class="col-form-label" id="docName"></label>
              <input type="file" class="form-control"name="file-name" id="file-name" required accept="image/jpeg,image/jpg,image/png,application/pdf">
            </div>
            <input type="hidden" name="std_name"  id="std_name" >
            <input type="hidden" name="type"  id="type" >
            <input type="hidden" name="apid"  id="apid" >
            <input type="hidden" name="intid"  id="intid" >
            <input type="hidden" name="titles"  id="titles" >
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
      var apid=button.data('id')
      var title=button.data('title')
      var intid=button.data('intid')
      var std_name=button.data('std_name')
      var type=button.data('type')
      var modal=$(this)
      modal.find('.modal-body #std_name').val(std_name)
      modal.find('.modal-body #intid').val(intid)
      modal.find('.modal-body #type').val(type)
      modal.find('.modal-body #apid').val(apid)
      modal.find('.modal-body #titles').val(title)
      document.getElementById("applyModalLabel").innerHTML=title;
      document.getElementById("docName").innerHTML=title;
  
  })
  </script>
  @endsection