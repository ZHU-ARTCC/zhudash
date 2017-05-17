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
                <h3>ATC Downloads</h3>
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
            <h3>VRC Client</h3>
                <div class="well well-lg">
                       <?php    
                $files = DB::table('downloads')->where('client', '=', 'VRC')->get();

                    foreach($files as $file) {
                        echo "<div class=\"well well-lg\">";
                            echo "<a href=$file->file>$file->name</a>";
                            echo "<p style=\"float: right;\">Updated $file->updated_at</p>";   
                        echo "</div>";
                    }
                        ?>  
            </div>
            <h3>vSTARS Client</h3>
                <div class="well well-lg">
                    <?php    
                $files1 = DB::table('downloads')->where('client', '=', 'VSTARS')->get();

                    foreach($files1 as $file1) {
                        echo "<div class=\"well well-lg\">";
                            echo "<a href=$file1->file>$file1->name</a>";
                            echo "<p style=\"float: right;\">Updated $file1->updated_at</p>";   
                        echo "</div>";
                    }
                        ?>
                </div>
            <h3>vERAM Client</h3>
                <div class="well well-lg">
                    <?php    
                $files2 = DB::table('downloads')->where('client', '=', 'VERAM')->get();

                    foreach($files2 as $file2) {
                        echo "<div class=\"well well-lg\">";
                            echo "<a href=$file2->file>$file2->name</a>";
                            echo "<p style=\"float: right;\">Updated $file2->updated_at</p>";   
                        echo "</div>";
                    }
                        ?>
                </div>
            <h3>Miscellaneous</h3>
                <div class="well well-lg">
                    <?php    
                $files3 = DB::table('downloads')->where('client', '=', 'MISC')->get();

                    foreach($files3 as $file3) {
                        echo "<div class=\"well well-lg\">";
                            echo "<a href=$file3->file>$file3->name</a>";
                            echo "<p style=\"float: right;\">Updated $file3->updated_at</p>";   
                        echo "</div>";
                    }
                        ?>
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
