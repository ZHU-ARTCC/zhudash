
<style>
    .navbar-right{
        float: right;
        padding-right: 20px;
        color: black;
    }
</style>


<link rel="shortcut icon" href="www.zhuartcc.org/favicon.ico" type="image/x-icon">

<link href="{{ asset('/la-assets/css/bootstrap.css') }}" rel="stylesheet">

<link href="{{ asset('/la-assets/css/main.css') }}" rel="stylesheet">

	<link href="{{ asset('la-assets/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    
    <!-- Custom styles for this template -->

<!-- Fixed navbar -->
<div style="background-color: #F2F2F2; "id="navigation" class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a style=" color: #555555; background-color: #F2F2F2; border-color: #204d74;" class="navbar-brand" href="/">Houston ARTCC</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" style=" color: #555555; background-color: #F2F2F2; border-color: #204d74;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Home<span class="caret"></span></a>
          <ul style="background-color: #fff;" class="dropdown-menu">
            <li><a href="/about">About ZHU</a></li>
            <li><a href="/staff">ARTCC Management</a></li>
            <li><a href="https://www.facebook.com/virtualZHU/?ref=br_rs">Facebook</a></li>
            <li><a href="/events">Events</a></li>
            <li><a href="/visit">Visiting Application</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" style=" color: #555555; background-color: #F2F2F2; border-color: #204d74;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Controllers<span class="caret"></span></a>
          <ul style="background-color: #fff;" class="dropdown-menu">
            <li><a href="/sops">SOP's/LOA's</a></li>
            <li><a href="/downloads">Downloads</a></li>
            <!-- <li><a href="#">Training Wiki</a></li> -->
            <li><a href="/positions">ARTCC Positions</a></li>
            <li><a href="/roster">Roster</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" style=" color: #555555; background-color: #F2F2F2; border-color: #204d74;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pilots<span class="caret"></span></a>
          <ul style="background-color: #fff;" class="dropdown-menu">
            <li><a href="https://www.airnav.com/">Charts</a></li>
            <li><a href="//www.weather.gov/">Weather Details</a></li>
            <!-- <li><a href="#">Useful Resources</a></li> -->

          </ul>
        </li>
        <li><a style=" color: #555555; background-color: #F2F2F2; border-color: #F2F2F2;" href="/feedback">Feedback</a></li>
        <li><a style=" color: #555555; background-color: #F2F2F2; border-color: #F2F2F2;" href="#">Forums</a></li>
      </ul>
        <ul class="nav navbar-nav navbar-right">
            @if (Auth::guest())
        <li><a style=" color: #555555; background-color: #F2F2F2; border-color: #F2F2F2;" href="/login">Login</a></li>
            @else
        <li><a style=" color: #555555; background-color: #F2F2F2; border-color: #F2F2F2;" href="/admin">Dashboard</a></li>
        <li><a style=" color: #555555; background-color: #F2F2F2; border-color: #F2F2F2;" href="/logout">Logout</a></li>
            @endif
      </ul>
        </div>
        
    </div>
</div>  
<div>
    <img src="//i1268.photobucket.com/albums/jj580/wguisbond/rect5760_zps2u9lkpv2.png" width="100%" alt="1">
</div><!--/ #headerwrap -->
