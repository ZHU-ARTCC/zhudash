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
    
    <meta property="og:url" content="//laraadmin.com/" />
    <meta property="og:sitename" content="laraAdmin" />
	<meta property="og:image" content="//demo.adminlte.acacha.org/img/LaraAdmin-600x600.jpg" />
    
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

    <style>
        .sub{
            color: #C03A2B;
        }
        
        .table-top{
            color: #7A2929;
        }
        
    </style>

</head>

<body data-spy="scroll" data-offset="0" data-target="#navigation">

@include('header')


<section id="home" name="home"></section>

<section id="about" name="about"></section>
<!-- INTRO WRAP -->
<div id="intro">
    <div class="container">
        <div>
            <h1 style="text-align: center;">ATC Positions</h1>
            <center><p>* Denotes a primary combined facility. When combined, the directional part of the VRC login may be omitted (ex. IAH_N_TWR = IAH_TWR), except for Centers.</p></center>
            <br>
            
            <ul>
            <?php    
             $positions = DB::table('positions')->get();
            ?>
                <table class="table">
                    <tr>
                        
                        <th class="table-top">Position</th>
                        <th class="table-top">Frequency</th>
                        <th class="table-top">VRC Callsign</th>
                        <th class="table-top">Identification</th>

                    </tr>
                    <?php
                    foreach($positions as $position) {
                    echo "<tr>";
                        echo "<th>$position->position</th>";
                        echo "<th>$position->frequency</th>";
                        echo "<th>$position->callsign</th>";
                        echo "<th>$position->ident</th>";
                    echo "</tr>";
                    } 
            ?>
                </table> 
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
