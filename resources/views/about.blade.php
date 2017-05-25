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

    <link href='//fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>

    <script src="{{ asset('/la-assets/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('/la-assets/js/smoothscroll.js') }}"></script>


</head>

<body data-spy="scroll" data-offset="0" data-target="#navigation">

@include('header')

<section id="home" name="home"></section>

<section id="about" name="about"></section>
<!-- INTRO WRAP -->
<div id="intro">
    <div class="container">
        <div class="panel panel-default">        
            <div class="panel-body">
                <img src="http://i1268.photobucket.com/albums/jj580/wguisbond/unspecified_zpsux38ulne.png" width="100%"><br><br>
                <p>   
               Welcome to the Virtual Houston Air Route Traffic Control Center on the VATSIM Network. As a member of the VATSIM network, the Houston ARTCC provides virtual air traffic control services within it's delegated airspace. Priding ourself on fun airspace for both pilots and controllers, the Houston ARTCC has something for everyone. Striving to provide the best training, student and staff programs out there, we hope you will join our ranks as a controller, or come fly as a pilot.<br><br>

               Encompassing an airspace of approximately 280,000 square miles located in portions of Texas, Louisiana, Mississippi and Alabama, Houston has a diverse selection of destinations for you to choose from. From New Orleans, to the airports of Houston, Austin, San Antonio and many other cities along the Gulf of Mexico we know you will find a destination to your liking within our airspace. In addition we operate the Houston Oceanic Station covering the Gulf of Mexico and providing services to pilots transitioning this body of water. We hope you will enjoy your visit and come back and see us again soon.

                </p>
            </div>
        </div> <!--/ .container -->
</div><!--/ #introwrap -->

<!-- FEATURES WRAP -->
<div id="features">
    <div class="container">
        <div class="row">
            
        </div>
    </div><!--/ .container -->
</div><!--/ #features -->


@include('footer')


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
