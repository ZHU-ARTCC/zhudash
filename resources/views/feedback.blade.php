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
    
<section id="about" name="about"></section>
<!-- INTRO WRAP -->
<div id="intro">
    <div class="container">
        <div>
            @include('partials._messages')
            <h1 style="text-align: center;">Pilot Feedback</h1>
            <center>
                <p>On behalf of the entire staff at the Houston ARTCC, we would like to thank you for providing feedback for our controllers. As a part of 
                our ATC training program, we utilize feedback as a way to coach our controllers, as well as get an idea for how our events and other controlling activites are going. Please fill out the form below in the best detail you can provide. <b>If you would like to provide general feedback for the whole ARTCC, simply put 'General' in the Controller Name field.</b> Thank you!
                </p>
            </center>
            {!! Form::open(['action' => 'FeedbackController@store', 'id' => 'pfeed', 'method' => 'POST']) !!}
            <b>Step 1 - Your Information:</b><br><br>
            <div class="row">
                <div class="col-xs-2">CID: <input type="text" class="form-control" name="cid" placeholder="VATSIM CID" size="1"></div>
                <div class="col-xs-4">Your Name: <input class="form-control" type="text" name="name" placeholder="Full Name" size="50"></div>
                <div class="col-xs-4">Email: <input class="form-control" type="text" name="email" placeholder="Active Email" size="50"></div>
            </div>
            <hr><br>
            <b>Step 2 - Feedback:</b><br><br>
            <div class="row">
                <div class="col-xs-5">Controller Name: <input type="text" class="form-control" name="ctl_name" placeholder="Controller Name" size="50"></div>
                <div class="col-xs-5">Position: 
                    <select class="form-control" name="position">
                        <option>Oceanic</option>
                        <option>Center</option>
                        <option>Approach/Departure</option>
                        <option>Tower</option>
                        <option>Ground / Clearance Delivery</option>
                        <option>General</option>
                    </select></div>
                <div class=" col-xs-2 ">Feedback Rating: 
                    <select class="form-control" name="rating">
                        <option>Excellent</option>
                        <option>Good</option>
                        <option>Fair</option>
                        <option>Needs Improvement</option>
                        <option>Poor</option>
                    </select>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-xs-12">Comments: <textarea  class="form-control" name="comments" rows="5"></textarea></div>
            </div><br><br>
            
              <center> {!! Form::submit( 'Submit', ['class' => 'btn btn-success']) !!} </center> 
            
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
