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


</head>

<body data-spy="scroll" data-offset="0" data-target="#navigation">

@include('header')


<section id="home" name="home"></section>
<div id="headerwrap">
    <div class="container">
        <div class="row centered">
            <div style="padding-right: 250px;"class="col-lg-12">
                <h1>{{ LAConfigs::getByKey('sitename_part1') }} <b><a>{{ LAConfigs::getByKey('sitename_part2') }}</a></b></h1>
                <h3>Training Department</h3>
                <br><br><br><br><br><br>
            </div>
        </div>
    </div> <!--/ .container -->
</div><!--/ #headerwrap -->


<section id="about" name="about"></section>
<!-- INTRO WRAP -->
<div id="intro">
    <div class="container">
        <div>
            <h1 style="text-align: center;">About the program:</h1>
            <br>
            <p>Home of the first flight and the oldest continuously operating airport in the world, the airspace controlled by the Washington ARTCC is rich in history. With three major airports within 30 miles of the nation's capital, ZDC controllers handle some of the most complex airspace in the country. 
            <br><br>
            From the Carolinas up to New Jersey, including the busy arrival streams from the southeast into the three New York airports and Philadelphia, overflights to and from Boston, and the equally busy traffic flows to Atlanta, there is always something interesting going on at the Washington ARTCC. 
            <br><br>
            Welcome to the Washington ARTCC Training Department! Lead by our Training Administrator (TA) Steve Fedor and Deputy Training Administrator (DTA) Krikor Hajian, and our wonderful team of Mentors and Instructors, it is our goal to help you learn, grow and have an enjoyable time controlling in the Washington airspace. Our experienced and professional staff encourage on open, educational experience in some of the most complex airspace in United States airspace. With a brand new website, new Standard Operating Procedures (SOP’s) and some of the most realistic training files in the division, the Washington training program has a lot to offer! You will start at Baltimore Ground, and will work your way up to the complex and exciting Potomac TRACON and Washington Center. Our program is designed to be self study, meaning you can train and control on your own time and when you feel ready. Using realistic radar clients such as VRC, vSTARS and vERAM, as well as vATIS for realistic automated ATIS’ at some fields, VATSIM becomes not only an enjoyable experience, but a highly realistic one. Whether you’re a real world pilot, general enthusiast, or someone looking to get into real world Air Traffic Control, the Washington ARTCC Training Department is the place for you!</p>
            @if (Auth::user())
                <a class="btn-new" href="/admin/training_systems">Controller Training Center</a>
                @endif
        <hr>
                
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
