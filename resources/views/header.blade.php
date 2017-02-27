
<style>
    .navbar-right{
        float: right;
        padding-right: 20px;
        color: #fff
    }
</style>

<link href="{{ asset('/la-assets/css/bootstrap.css') }}" rel="stylesheet">

	<link href="{{ asset('la-assets/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    
    <!-- Custom styles for this template -->
    <link href="{{ asset('/la-assets/css/main.css') }}" rel="stylesheet">

<!-- Fixed navbar -->
<div style="background-color: #015C9B; "id="navigation" class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a style=" color: #fff; background-color: #015C9B; border-color: #204d74;" class="navbar-brand" href="/">Virtual Washington ARTCC</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" style=" color: #fff; background-color: #015C9B; border-color: #204d74;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Home<span class="caret"></span></a>
          <ul style="background-color: #fff;" class="dropdown-menu">
            <li><a href="#">About ZDC</a></li>
            <li><a href="/staff">ARTCC Management</a></li>
            <li><a href="#">Facebook</a></li>
            <li><a href="/events">Events</a></li>
            <li><a href="#">Visiting Application</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" style=" color: #fff; background-color: #015C9B; border-color: #204d74;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Controllers<span class="caret"></span></a>
          <ul style="background-color: #fff;" class="dropdown-menu">
            <li><a href="/sops">SOP's/LOA's</a></li>
            <li><a href="/downloads">Downloads</a></li>
            <li><a href="#">ARTCC Policies</a></li>
            <li><a href="/training">Training Program</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" style=" color: #fff; background-color: #015C9B; border-color: #204d74;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pilots<span class="caret"></span></a>
          <ul style="background-color: #fff;" class="dropdown-menu">
            <li><a href="#">Charts</a></li>
            <li><a href="#">Weather Details</a></li>
            <li><a href="#">Useful Resources</a></li>
            <li><a href="#">Feedback</a></li>
          </ul>
        </li>
        <li><a style=" color: #fff; background-color: #015C9B; border-color: #204d74;" href="#">Roster</a></li>
        <li><a style=" color: #fff; background-color: #015C9B; border-color: #204d74;" href="#">Forums</a></li>
      </ul>
        <ul class="nav navbar-nav navbar-right">
            @if (Auth::guest())
        <li><a style=" color: #fff; background-color: #015C9B; border-color: #204d74;" href="/login">Login</a></li>
            @else
        <li><a style=" color: #fff; background-color: #015C9B; border-color: #204d74;" href="/admin">Dashboard</a></li>
        <li><a style=" color: #fff; background-color: #015C9B; border-color: #204d74;" href="/logout">Logout</a></li>
            @endif
      </ul>
        </div>
        
    </div>
</div>  