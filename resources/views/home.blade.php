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
.col-md-2{
    background-color: #555555;
    color: #fff;
    padding: 5px;
}
</style>
</head>

<body data-spy="scroll" data-offset="0" data-target="#navigation">

@include('header')
    
<section id="home" name="home"></section>
<div id="headerwrap">
    <div class="container">
        <div class="row centered">
            <div style="padding-right: 250px;"class="col-lg-12">
                <h1>{{ LAConfigs::getByKey('sitename_part1') }}<b><a>{{ LAConfigs::getByKey('sitename_part2') }}</a></b></h1>
                <h3>{{ LAConfigs::getByKey('site_description') }}</h3>
            </div>
            <p>Home of the first flight and the oldest continuously operating airport in the world, the airspace controlled by the Washington ARTCC is rich in history. With three major airports within 30 miles of the nation's capital, ZDC controllers handle some of the most complex airspace in the country. 

            From the Carolinas up to New Jersey, including the busy arrival streams from the southeast into the three New York airports and Philadelphia, overflights to and from Boston, and the equally busy traffic flows to Atlanta, there is always something interesting going on at the Washington ARTCC. </p>
        </div>
    </div> <!--/ .container -->
</div><!--/ #headerwrap -->


<section id="about" name="about"></section>
<!-- INTRO WRAP -->
<div id="intro">
    <div class="container">
        <div class="row centered">
            <h1>Realistic and challenging Virtual Air Traffic Control.</h1>
            <br>
            <br>
            <div class="col-lg-6">
                <i class="fa fa-graduation-cap" style="font-size:100px;height:110px;"></i>
                <h3>Realistic</h3>
                <p>Thourough and extensive training</p>
            </div>
            <div class="col-lg-6">
                <i class="fa fa-map" style="font-size:100px;height:110px;"></i>
                <h3>Challenging</h3>
                <p>Complicated and interesting airpsace</p>
            </div>
        </div>
        <br>
        <hr>
    <!-- Weather Container -->
        <center>
                <?php
                    $file = "../storage/KBWI.txt";
                $lines = file( $file );
                ?>    
                <script>
                $(document).ready(function(){
                $('[data-toggle="tooltip"]').tooltip(); 
                });
                </script>
           
                <div class=" col-md-offset-1 col-md-2" class="weather"><h4><a href="#" data-toggle="tooltip" data-placement="top" title="<?php 
                    echo $lines[9];  ?>"><center>KBWI</center></a></h4></div>
            
            <?php
            $file = "../storage/KIAD.txt";
            $lines = file( $file );
                ?>    
            <script>
            $(document).ready(function(){
                $('[data-toggle="tooltip1"]').tooltip(); 
            });
            </script>
            <div class="col-md-2 "  class="weather"><h4><a href="#" data-toggle="tooltip1" data-placement="top" title="<?php 
                echo $lines[9];  ?>"><center>KIAD</center></a></h4></div>

            <?php
            $file = "../storage/KDCA.txt";
            $lines = file( $file );
                ?>    
            <script>
            $(document).ready(function(){
                $('[data-toggle="tooltip2"]').tooltip(); 
            });
            </script>
            <div class="col-md-2"  class="weather"><h4><a href="#" data-toggle="tooltip2" data-placement="top" title="<?php 
                echo $lines[9];  ?>"><center>KDCA</center></a></h4></div>

            <?php
            $file = "../storage/KRDU.txt";
            $lines = file( $file );
                ?>    
            <script>
            $(document).ready(function(){
                $('[data-toggle="tooltip3"]').tooltip(); 
            });
            </script>
            <div class="col-md-2"  class="weather"><h4><a href="#" data-toggle="tooltip3" data-placement="top" title="<?php 
                echo $lines[9];  ?>"><center>KRDU</center></a></h4></div>
            
            <?php
            $file = "../storage/KORF.txt";
            $lines = file( $file );
                ?>    
            <script>
            $(document).ready(function(){
                $('[data-toggle="tooltip4"]').tooltip(); 
            });
            </script>
            <div class="col-md-2"  class="weather"s><h4><a href="#" data-toggle="tooltip4" data-placement="top" title="<?php 
                echo $lines[9];  ?>"><center>KORF</center></a></h4></div>
    <!-- End Weather -->
            </center>
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
