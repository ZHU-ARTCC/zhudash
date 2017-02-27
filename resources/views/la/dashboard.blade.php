@extends('la.layouts.app')

@section('htmlheader_title') Dashboard @endsection
@section('contentheader_title') Dashboard @endsection
@section('contentheader_description')  @endsection
@section('main-content')

<!-- Main content -->
        <section class="content">
            <div class="box box-info">
                <div class="box-header">
                  Welcome Back, {{Auth::user()->name}}!<br>
                    @if (Auth::user()->status = 'A')
                    You are currently an <b>active ZDC controller</b>.

    
                    @elseif (Auth::user()->status = 'V')
                    You are currently a <b>visiting controller at ZDC</b>.

                    
                    @elseif (Auth::user()->status = 'R')
                    You have <b>been removed from the roster</b>. Please email the ATM for more details.
                    @endif
                </div>

                <div class="box-footer clearfix">
                </div>
            </div>
            <!-- <div class="box box-info">
                <div class="box-header">
                  <h3>Upcoming Events</h3>
                    <?php    
             $events = DB::table('events')->where('active','=', 'Yes')->get();

               foreach($events as $event) {
                
                echo "<h3>$event->event_name</h3><br>";
                echo "<img src=\"$event->banner\" width=\"100%\"><br><br>";
                echo "<p>$event->description</p>";
                echo '<br><hr><br>';
                   
               }
                ?> 
                </div>

                <div class="box-footer clearfix">
                </div>
            </div> -->
            <div class="box box-info">
                <div class="box-header">
                  <h3>Quick Links</h3>
                    <a href="https://www.vatusa.net/exam"><i class="fa fa-pencil" aria-hidden="true"></i> VATUSA Exam Center</a> <br>
                    <a href="/events"><i class="fa fa-trophy" aria-hidden="true"></i>ZDC Events Home</a> <br>
                    <a href="https://www.facebook.com/zdc.vatsim/"><i class="fa fa-thumbs-o-up" aria-hidden="true"> ZDC Facebook Page</i></a>    
                </div>
            </div>
            <div class="box box-info">
                <div class="box-header">
                  <h3>News</h3><br>
                    <?php
                    $articles = DB::table('news')->get();
                    
                    foreach ($articles as $article){
                        echo "<h4><b>$article->title</b></h4>";
                        echo "<p>$article->body</p>";
                        echo "<i>Posted at $article->created_at</i><hr>";
                    }
                    ?>
                </div>
            </div>
            
            
            </section><!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-5 connectedSortable">

<!-- /.box -->

            </section><!-- right col -->
@endsection

@push('styles')
<!-- Morris chart -->
<link rel="stylesheet" href="{{ asset('la-assets/plugins/morris/morris.css') }}">
<!-- jvectormap -->
<link rel="stylesheet" href="{{ asset('la-assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}">
<!-- Date Picker -->
<link rel="stylesheet" href="{{ asset('la-assets/plugins/datepicker/datepicker3.css') }}">
<!-- Daterange picker -->
<link rel="stylesheet" href="{{ asset('la-assets/plugins/daterangepicker/daterangepicker-bs3.css') }}">
<!-- bootstrap wysihtml5 - text editor -->
<link rel="stylesheet" href="{{ asset('la-assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
@endpush


@push('scripts')
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="{{ asset('la-assets/plugins/morris/morris.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('la-assets/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
<script src="{{ asset('la-assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('la-assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('la-assets/plugins/knob/jquery.knob.js') }}"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="{{ asset('la-assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{ asset('la-assets/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('la-assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('la-assets/plugins/fastclick/fastclick.js') }}"></script>
<!-- dashboard -->
<script src="{{ asset('la-assets/js/pages/dashboard.js') }}"></script>
@endpush

@push('scripts')

@endpush