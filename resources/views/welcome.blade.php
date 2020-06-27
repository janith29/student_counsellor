@extends('layouts.welcome')
@section('content')     

  
<div class="w3-display-middle bg-text">

  @if(Session::has('message'))
  <div class="alert alert-danger">
    {{ Session::get('message') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif
    <h1 class="w3-jumbo w3-animate-top w3-text-white ">Student consultation  </h1>
    <hr class="w3-border-grey" style="margin:auto;width:60%">
</div>   

  @endsection