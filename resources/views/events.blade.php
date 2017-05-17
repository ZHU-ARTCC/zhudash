<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ LAConfigs::getByKey('site_description') }}">
    <meta name="author" content="Dwij IT Solutions">

    <meta property="og:title" content="{{ LAConfigs::getByKey('sitename') }}" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="{{ LAConfigs::getByKey('site_description') }}" />
    
    <meta property="og:url" content="http://laraadmin.com/" />
    <meta property="og:sitename" content="laraAdmin" />
	<meta property="og:image" content="http://demo.adminlte.acacha.org/img/LaraAdmin-600x600.jpg" />
    
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@laraadmin" />
    <meta name="twitter:creator" content="@laraadmin" />
    
    <title>{{ LAConfigs::getByKey('sitename') }}</title>
    
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('/la-assets/css/bootstrap.css') }}" rel="stylesheet">

	<link href="{{ asset('la-assets/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    
    <!-- Custom styles for this template -->
    <link href="{{ asset('/la-assets/css/main.css') }}" rel="stylesheet">

    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>

    <script src="{{ asset('/la-assets/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('/la-assets/js/smoothscroll.js') }}"></script>

    <style>
        .sub{
            color: #C03A2B;
        }
    </style>

</head>

<body data-spy="scroll" data-offset="0" data-target="#navigation">

@include('header')


<section id="home" name="home"></section>
<div id="headerwrap" style="background-image: url('http://i1268.photobucket.com/albums/jj580/wguisbond/bg1_zps8xlppt0s.png');">
    <div class="container">
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </div> <!--/ .container -->
</div><!--/ #headerwrap -->


<section id="about" name="about"></section>
<!-- INTRO WRAP -->
<div id="intro">
    <div class="container">
        <div>
            <h1 style="text-align: center;">Upcoming Events:</h1>
            <br>
            <ul>
            <?php    
             $events = DB::table('events')->where('active','=', 'Yes')->get();

               foreach($events as $event) {
                
                echo "<h3>$event->event_name</h3><br>";
                echo "<img src=\"$event->banner\" width=\"100%\"><br><br>";
                echo "<p>$event->description</p>";
                if (Auth::user() ){
                echo "<h4>Available Positions:</h4>";
                echo nl2br($event->positions);
                    // line-up problems...
                }
                echo '<br><hr><br>';
                   
               }
                ?>  
                @if (Auth::guest())
                <br>
                @else
                <a class="btn-new" href="/admin/event_requests">Controller Sign Up (All Events)</a>
                @endif
                
               
            </ul>

    </div> <!--/ .container -->
</div><!--/ #introwrap -->

<!-- FEATURES WRAP -->
<div id="features">
    <div class="container">
        <div class="row">
            
        </div>
    </div><!--/ .container -->
</div><!--/ #features -->


<div id="c">
    <div class="container">
        <p>
            The information contained on all pages of this website is to be used for flight simulation purposes only on the VATSIM network. It is not intended nor should it be used for real world navigation.This site is not affiliated with the FAA, the actual Washington Center or any governing aviation body. All content contained herein is approved only for use on the VATSIM network. ©2016 Virtual Washington ARTCC -- Source Code © 2016-2017 W. Guisbond and R. Rump.
        </p>
    </div>
</div>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{ asset('/la-assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script>
    $('.carousel').carousel({
        interval: 3500
    })
</script>
</body>
</html>
