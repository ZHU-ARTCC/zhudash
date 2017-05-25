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
    
<section id="about" name="about"></section>
<!-- INTRO WRAP -->
<div id="intro">
    <div class="container">
        <div class="row"> 
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">Weather</div>
                    <div class="panel-body"><br><br><br><br><br><br></div>
                    <div class="panel-heading">Who's Online</div>
                    <div class="panel-body"><br><br><br><br><br><br></div>
                </div>
            </div> 
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">News</div>
                    <div class="panel-body">
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="item active">
                                  <img src="http://i.imgur.com/9fcfqJy.jpg" alt="Los Angeles">
                                </div>

                                <div class="item">
                                  <img src="http://i.imgur.com/fZqZJuJ.jpg" alt="New York">
                                </div>
                                
                                <div class="item">
                                  <img src="http://i1268.photobucket.com/albums/jj580/wguisbond/iah-fed-ex-md-10_27316_zpspgkxhrka.png" alt="New York">
                                </div>
                            </div>
                        </div>
                        <br>
                        <?php
                    $articles = DB::table('news')->where('public', '=', 'Yes')->latest()->limit(3)->get();
                    
                    foreach ($articles as $article){
                        echo "<h4><b>$article->title</b></h4>";
                        echo "<p>$article->body</p>";
                        echo "<hr>";
                    }
                    ?>
                    </div>
                </div>
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
