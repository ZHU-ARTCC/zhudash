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
            <h1 style="text-align: center;">Visiting Application</h1>
            <center>
                <p>Thank you for your interest in visiting Houston Air Route Traffic Control Center (ZHU ARTCC).If you are interested in transferring into ZHU, you are at the wrong page. Visit VATUSA to get started. Visiting controllers must understand that primary training will be given to ZHU Controllers and ZHU will not provide rating training to visiting controllers in accordance to VATSIM's Visiting And Transferring Controller Policy. Visitors will only be given procedure training. Controllers found to not meet the Global Ratings Policy required competency for their rating will be referred back to their home ARTCC for additional training and may be rejected or have their visiting status revoked until they meet GRP requirements.As allowed under the Visiting and Transferring Control Policy, visiting controllers are not permitted to control within the ZHU airspace until they have been certified to do so by a Houston ARTCC Instructor or Mentor. If you agree with the above and the ZHU Policies, please fill out the form and forward a letter of recommendation from your home ARTCC ATM to [atm@zhuartcc.org] to start the application process.</p>
            </center>
            {!! Form::open(['action' => 'VisitController@store', 'id' => 'visit', 'method' => 'POST']) !!}
                <div class="col-xs-3">CID: <input type="text" class="form-control" name="cid" placeholder="Enter your VATSIM CID" size="1"></div><div class="col-xs-5"> Name:<input class="form-control" type="text" name="name" placeholder="Full Name" size="50"></div>
                <div class="col-xs-4">Email: <input class="form-control" type="text" name="email" placeholder="Active Email" size="50"></div>
                
                <br><br><br><br> <div class="col-xs-offset-2 col-xs-4">Current Facility: <select name="facility">
                    <option>ZAB</option>
                    <option>ZAN</option>
                    <option>ZTL</option>
                    <option>ZBW</option>
                    <option>ZAU</option>
                    <option>ZOB</option>
                    <option>ZDV</option>
                    <option>ZFW</option>
                    <option>HCF</option>
                    <option>ZID</option>
                    <option>ZJX</option>
                    <option>ZKC</option>
                    <option>ZLA</option>
                    <option>ZME</option>
                    <option>ZMA</option>
                    <option>ZMP</option>
                    <option>ZNY</option>
                    <option>ZOA</option>
                    <option>ZLC</option>
                    <option>ZSE</option>
                    <option>ZDC</option>
                </select></div>
                
                <div class="col-xs-4 col-xs-offset-1">Current Rating: <select name="rating">
                    <option>S1</option>
                    <option>S2</option>
                    <option>S3</option>
                    <option>C1</option>
                    <option>C3</option>
                    <option>I1</option>
                    <option>I3</option>
                    <option>SUP</option>
                    <option>ADM</option>
                    
                    </select></div><br><br>
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
