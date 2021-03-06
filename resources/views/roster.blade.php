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
        
        .rtd{
            width: 5%;
            border: 1px solid #fff;
        }
        
        .name{
            a:hover{
                color: #000;
            }
        }
        
        .otd{

            width: 5%;
        }
        
        .Solo{
            background-color: #F0AD4E;
        }
        
        .Minor{
            background-color: #337AB7;
        }
        
        .Major{
            background-color: #5CB85C;
        }
        
        .Cert{
                background-color: #5CB85C;
        }
        
        .None{
            background-color: #DDD;
        }
        
        .OBS{
            background-color: #808080;
            padding: 2px;
            color: #fff;
        }
        
        .S1{
            background-color: #F0AD4E;
            padding: 2px;
            color: #fff;
        }
        
        .S2{
            background-color: #F0AD4E;
            padding: 2px;
            color: #fff;
        }
        
        .S3{
            background-color: #F0AD4E;
            padding: 2px;
            color: #fff;
        }
        
        .C1{
            background-color: #5CB85C;
            padding: 2px;
            color: #fff; 
        }
        
        .C3{
            background-color: #02C66C;
            padding: 2px;
            color: #fff; 
        }
        
        .I1{
            background-color: #D9534F;
            padding: 2px;
            color: #fff;
        }
        
        .I3{
            background-color: #D9534F;
            padding: 2px;
            color: #fff;
        }
        
        .SUP{
            background-color: #663399;
            padding: 2px;
            color: #fff;
        }
        
        .keyth{
            width: 25%;
            color: #fff;
        }
        /* unvisited link */
a:link {
    color: #555555;
}

/* visited link */
a:visited {
    color: #555555;
}

/* mouse over link */
a:hover {
    color: #555555;
}

/* selected link */
a:active {
    color: #555555;
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
            <h2 style="text-align: center;">Controlling Roster</h2><br>
            <table class="table">
                <tr><th class="keyth None"><center>None</center></th><th class="keyth Solo"><center>Solo Cert</center></th><th class="keyth Minor"><center>Non-Major</center></th><th class="keyth Major"><center>Fully Certified</center></th></tr>
            </table><br>
            <?php    
                $controllers = DB::table('users')->where('status', '=', 'A')->orderBy('name', 'asc')->get();
                
            ?>
                <table class="table">
                    <tr style="color: #555555;">
                        <th class="filler"></th>
                        <th class="filler"></th>
                        <th class="filler"></th>
                        <th class="filler"></th>
                        <th>GND</th>
                        <th>TWR</th>
                        <th>APP</th>
                        <th>CTR</th>
                        <th>OCE</th>
                    </tr>
            <?php
                foreach ($controllers as $controller){
                    echo "<tr>";
                        echo "<th>$controller->name</th>";
                        echo "<th>$controller->oi</th>";
                        echo "<th class='otd $controller->rating' ><center><span class=\" $controller->rating\">$controller->rating</span><center></th>";
                        echo "<th class='otd $controller->type'></th>";
                        echo "<th class='rtd $controller->gnd'></th>";
                        echo "<th class='rtd $controller->twr'></th>";
                        echo "<th class='rtd $controller->app'></th>";
                        echo "<th class='rtd $controller->ctr'></th>";
                        echo "<th class='rtd $controller->oce'></th>";
                    echo "</tr>";
                }
                echo "</table>";
            ?>
                    <br><br><br>
                    <!-- Visitors -->
                    <h2 style="text-align: center;">Visiting Roster</h2><br>
            <?php    
                $controllers = DB::table('users')->where('status', '=', 'V')->orderBy('name', 'asc')->get();
            ?>
                <table class="table">
                    <tr style="color: #555555;">
                        <th class="filler"></th>
                        <th class="filler"></th>
                        <th class="filler"></th>
                        <th class="filler"></th>
                        <th>GND</th>
                        <th>TWR</th>
                        <th>APP</th>
                        <th>CTR</th>
                        <th>OCE</th>
                    </tr>
            <?php
                foreach ($controllers as $controller){
                    echo "<tr>";
                        echo "<th>$controller->name</th>";
                        echo "<th>$controller->oi</th>";
                        echo "<th class='otd $controller->rating' ><center><span class=\" $controller->rating\">$controller->rating</span><center></th>";
                        echo "<th class='otd $controller->type'></th>";
                        echo "<th class='rtd $controller->gnd'></th>";
                        echo "<th class='rtd $controller->twr'></th>";
                        echo "<th class='rtd $controller->app'></th>";
                        echo "<th class='rtd $controller->ctr'></th>";
                        echo "<th class='rtd $controller->oce'></th>";
                    echo "</tr>";
                }
                echo "</table>";
            ?>
                

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
