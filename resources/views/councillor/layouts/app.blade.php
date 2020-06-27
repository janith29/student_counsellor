<!DOCTYPE html>
<html>
<title>Councillor dashboard</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/css/w3.css">
<link rel="stylesheet" href="/css/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://code.jquery.com/jquery-3.5.1.js" ></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js" ></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
{{-- Bootstrap  --}}
<link href="/bootstrap/bootstrap.min.css" rel="stylesheet" >
<script src="/bootstrap/bootstrap.min.js" ></script>
<script src="/bootstrap/bootstrap.bundle.min.js"></script>
<style>
html, body, h1, h2, h3, h4, h5 {font-family: "Open Sans", sans-serif}
.bgimg {
  background-image: url('/img/consultation.jpg');
  min-height: 100%;
  filter: blur(8px);
  -webkit-filter: blur(8px);
  background-position: center;
  background-size: cover;
}
.valid {
  color: green;
}

.valid:before {
  position: relative;
  left: -20px;
  content: "✔";
}

/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  left: -20px;
  content: "✖";
}
.margintop{
    margin-top: 60px;
  }
  @media only screen and (max-width: 813px) {
  .margintop{
    margin-top: 110px;
  }
}
@media only screen and (max-width: 413px) {
  .margintop{
    margin-top: 170px;
  }
}
@media only screen and (max-width: 270px) {
  .margintop{
    margin-top: 200px;
  }
}
  
</style>
<body class="w3-theme-l5">

<!-- Navbar -->
<div class="w3-top ">
 <div class="w3-bar w3-theme-d2 w3-left-align w3-large"> 
  <a  href="{{ route('/') }}" class="w3-bar-item w3-button w3-padding-large "><i class="fa fa-home w3-margin-right"></i>Home</a>
  <a  href="{{ route('councillor.councillor') }}" class="w3-bar-item w3-button w3-padding-large @if (Request::is('councillor')) w3-theme-d4 @endif"><i class="fa fa-dashboard w3-margin-right"></i>Dashboard</a>
  <a  href="{{ route('councillor.inquiry') }}" class="w3-bar-item w3-button w3-padding-large  w3-hover-white @if (Request::is('councillor/inquiry/*')||Request::is('councillor/inquiry') ) w3-theme-d4 @endif"><i class="fa fa-check-square-o w3-margin-right"></i>Inquiry</a>
  <a  href="{{ route('councillor.apply') }}" class="w3-bar-item w3-button w3-padding-large  w3-hover-white @if (Request::is('councillor/apply/*')||Request::is('councillor/apply') ) w3-theme-d4 @endif"><i class="fa fa-address-card-o w3-margin-right"></i>Apply</a>
  <a  href="{{ route('councillor.offer') }}" class="w3-bar-item w3-button w3-padding-large  w3-hover-white @if (Request::is('councillor/offer/*')||Request::is('councillor/offer') ) w3-theme-d4 @endif"><i class="fa fa-envelope-open-o w3-margin-right"></i>Offer</a>
  <a  href="{{ route('councillor.reports') }}" class="w3-bar-item w3-button w3-padding-large  w3-hover-white @if (Request::is('councillor/reports/*')||Request::is('councillor/reports') ) w3-theme-d4 @endif"><i class="fa fa-folder-open-o w3-margin-right"></i>Reports</a>
  <div class="w3-dropdown-hover ">
   <button class="w3-button w3-padding-large" title="Notifications"><i class="fa fa-bell w3-margin-right"></i><span class="w3-badge w3-right w3-small w3-green">{{count(auth()->user()->unreadnotifications)}}</span></button>     
    <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px" id="markasread" onclick="marknotificationasread()">
        @foreach (auth()->user()->unreadnotifications as $notification)
    <a href="/councillor/markAsread" class="w3-bar-item w3-button">
        Add new inquiry at {{$notification->created_at}}
    </a>
        @endforeach
    </div>
  </div>
  <a  href="{{ route('logout') }}" class="w3-bar-item w3-button w3-padding-large  w3-right w3-hover-white"><i class="fa fa fa-sign-out w3-margin-right"></i>{{ __('views.backend.section.header.menu_0') }}</a>
 </div>
</div>

@yield('content')
<script> 

function marknotificationasread(){ 
    
  alert('All notification mark as read');
  $.get('/councillor/markAsread');
    
};
</script>


</body>
</html> 
