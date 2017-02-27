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
                <h3>ARTCC Staff</h3>
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
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Rick Rump</h4>Air Traffic Manager | atm@vzdc.org
                </div>   
                <div class="panel-body">
                    <p>
                        -Responsible for all operations associated with the Washington D.C. ARTCC.<br>
                        -Reports to the region's Air Traffic Director and oversees operations and management for an assigned ARTCC.<br>
                        -Maintains an on line presence on the VATSIM server.<br>
                        -Functions as VATUSA HQ staff member. Attends periodic meetings to report on ARTCC activities and to stay abreast of VATUSA issues and policies.<br>
                        -Establishes an ARTCC web page and oversees its maintenance.<br>
                        -Initiates, obtains Air Traffic Director approval for, and maintains ARTCC Standard Operating Procedures.<br>
                        -Provides for coordination of position assignments and position restrictions when necessary.<br>
                        -Provides guidance and help to assigned controllers or guests. Optionally, establishes a staff of "Mentors" to assist new controllers and guests.<br>
                        -Works with Region Events Coordinator on events that may affect the ARTCC's operations.<br>
                        -Conducts testing and training as defined, and in accordance with, the VATUSA Training SOP.<br>
                        -Optionally, conducts additional training and testing on area-specific subjects.<br>
                        -Establishes an Assistant ATM position and defines the duties of that position. Submits selection to the region Air Traffic Director for final approval and announcement.<br>
                        -Nominates Instructor candidates to the Training Administrator or Training Director for Training Department approval and announcement.<br>
                        -Recommends disciplinary actions to the region Air Traffic Director.<br>
                    </p>
                </div>
            </div> 
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Steve Fedor</h4>Deputy Air Traffic Manager | datm@vzdc.org
                </div>   
                <div class="panel-body">
                    <p>
                        -Monitors the day-to-day activities of the ARTCC.<br>
                        -Reports to the ARTCC's Air Traffic Manager.<br>
                        -Assists in the development and execution of ARTCC projects.<br>
                        -Maintains an on line presence on the VATSIM server.<br>
                        -Functions as ARTCC senior staff member. Attends periodic meetings to report on ARTCC activities and to stay abreast of VATUSA issues and policies.<br>
                        -Assists in coordination of position assignments and position restrictions when necessary.<br>
                        -Provides guidance and help to assigned controllers or guests.<br>
                        -Conducts testing and training as defined, and in accordance with, the VATUSA Training SOP.<br>
                        -Optionally, conducts additional training and testing on area-specific subjects.<br>  
                        -Assumes the duties of the ATM when he is unavailable.<br>
                    </p>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Krikor Hajian</h4>Training Administrator | ta@vzdc.org
                </div>   
                <div class="panel-body">
                    <p>
                        -Responsible for the quality of the staff instructors and mentors.<br>
                        -Reports to the ARTCC's Air Traffic Manager and to the VATUSA Training Director.<br>
                        -Oversees and administers the ARTCC training program.<br>  
                        -Develops an implements training-related material and projects.<br>
                        -Ensures that ARTCC instructor positions are adequately staffed.  <br>
                        -Recruits new instructors and recommends appointments to the ARTCC ATM and the VATUSA Training Department.<br>
                        -Works with instructors and mentors to develop their knowledge and to ensure that training standards are being uniformly applied to all students.<br>
                        -Tracks the progress of student controllers, including testing, promotions, and recurrent and remedial instruction.<br>
                        -Manages and leads the Training Division of ZDC.<br>
                    </p>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Brad King</h4>Events Coordiantor | events@vzdc.org
                </div>   
                <div class="panel-body">
                    <p>
                        -Reports to the ARTCC DATM and ATM.<br>
                        -Identifies and develops events to generate traffic and to promote the ARTCC.<br>
                        -Implements and oversees approved events.<br>
                        -Coordinates with neighboring ARTCCs to arrange support for ZDC-hosted events, and arranges support for neighboring events.<br>
                        -Maintains relationships with virtual airlines, coordinates support for VA-hosted events affecting ZDC airspace.<br>
                        -Develops and distributes marketing material (graphics, news posts, forum posts, etc) to promote events and the ARTCC.<br>
                        -Leads and manages events division of ZDC.<br>
                    </p>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Gia Pham</h4>Facility Engineer | facilities@vzdc.org
                </div>   
                <div class="panel-body">
                    <p>
                        -Reports to the ATM.<br>
                        -Maintains and updates sector files, SOP's LOA's and the ARTCC Operating Policy.<br>
                        -Manages the ZDC facility resources.<br>
                        -Works with VATUSA and other ARTCC's to approve LOA's and SOP's.<br>
                    </p>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Will Guisbond</h4>Webmaster | webmaster@vzdc.org
                </div>   
                <div class="panel-body">
                    <p>
                        -Reports to the DATM.<br>
                        -Maintains, updates and manages the ARTCC web site.<br>
                        -Manages the ARTCC-assigned email accounts at the direction of the ATM.<br>
                        -Technical advisor to the ATM.<br>
                    </p>
                </div>
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
