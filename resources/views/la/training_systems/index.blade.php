@extends("la.layouts.app")

@section("contentheader_title", "Training")
@section("contentheader_description", "Request a session, view your records and check a session status")
@section("section", "Student Access")
@section("htmlheader_title", "Training Systems Listing")

@section("main-content")

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="box box-success">
	<!--<div class="box-header"></div>-->
	<div class="box-body">
		<h3>Session Request</h3>
        {!! Form::open(['action' => 'LA\Training_SystemsController@store', 'id' => 'training_system-add-form', 'method' => 'POST']) !!}
            <input type="hidden" value="{{Auth::user()->email}}" name="email">
            Controller Name: <input name="ctl_name" type="text" readonly value="{{Auth::user()->name}}"><br><br>
            Controller CID: <input name="ctl_cid" type="text" readonly value="{{Auth::user()->cid}}">
            <hr>
            Position: <select name="airport">
            <option>KAUS</option>
            <option>KSAT</option>
            <option>KIAH</option>
            <option>ZHU</option>
            </select>
            <select name="position">
            <option>Delivery / Ground</option>
            <option>Local Control</option>
            <option>Approach / Departure</option>
            <option>Center (Enroute)</option>
            </select><br><br>
            Time: <input type="date" name="idate"> <input type="time" name="timestartblock"> to <input type="time" name="timeendblock"><br><hr>
            {!! Form::submit( 'Submit', ['class'=>'btn btn-success']) !!}
        {!! Form::close() !!}
	</div>
</div>

<!-- Div containing pending student sessions -->
<div class="box box-success">
    <div class="box-body">
        <h3>Pending Sessions</h3>
        <table class="table">
            <tr>
                <th>Date</th>
                <th>Time</th>
                <th>Position</th>
                <th>Posted At</th>
                <!-- <th>Action</th> -->
            </tr>
            
            <?php 
                $sessions = DB::table('training_systems')->where('ctl_cid','=', Auth::user()->cid)->where('mtr_name', '=','0')->get();
                foreach ($sessions as $session){
                    echo "<tr>";
                    echo "<th>$session->idate</th>";
                    echo "<th>$session->timestartblock to $session->timeendblock</th>";
                    echo "<th>$session->airport $session->position</th>";
                    echo "<th>$session->created_at</th>";
                    echo "</tr>";
                }
                
                ?>
            
            
        </table>
        
    </div>
</div>

<!-- Div containing a student's booked sessions -->
<div class="box box-success">
    <div class="box-body">
        <h3>Booked Sessions</h3>
        <table class="table">
            <tr>
                <th>Date</th>
                <th>Time</th>
                <th>Position</th>
                <th>Mentor Name</th>
                <!-- <th>Action</th> -->
            </tr>
            
            <?php 
                $booked = DB::table('training_systems')->where('ctl_cid','=', Auth::user()->cid)->where('mtr_name', '!=','0')->get();
                foreach ($booked as $bookedsess){
                    echo "<tr>";
                    echo "<th>$bookedsess->idate</th>";
                    echo "<th>$bookedsess->timestartblock to $bookedsess->timeendblock</th>";
                    echo "<th>$bookedsess->airport $bookedsess->position</th>";
                    echo "<th>$bookedsess->mtr_name</th>";
                    echo "</tr>";
                }
                
                ?>
            
            
        </table>
        
    </div>
</div>



<!-- Div containing unbooked sessions for ins/mtr to see -->
<div class="box box-success">
    <div class="box-body">
        <h3>Training Staff - Unbooked Sessions</h3>
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Student Name</th>
                <th>Date</th>
                <th>Time</th>
                <th>Position</th>
                <th>Action</th>
            </tr>
            <?php 
                $unbooked = DB::table('training_systems')->where('mtr_name', '=','0')->get();
                foreach ($unbooked as $pickup){
                    echo "<tr>";?>
            {!! Form::open(['action' => 'LA\Training_SystemsController@pick', 'id' => 'training_system-pickup-form', 'method' => 'POST']) !!}
                        <input type="hidden" value="{{$pickup->id}}" name="id">
                        <input type="hidden" value="{{Auth::user()->email}}" name="email">
                        <input type="hidden" value="{{$pickup->ctl_name}}" name="ctl_name">
                        <input type="hidden" value="{{$pickup->idate}}" name="idate">
                        <input type="hidden" value="{{$pickup->timestartblock}}" name="timestartblock">
                        <input type="hidden" value="{{$pickup->timeendblock}}" name="timeendblock">
                        <input type="hidden" value="{{$pickup->airport}}" name="airport">
                        <input type="hidden" value="{{$pickup->position}}" name="position">
                        <input type="hidden" value="{{Auth::user()->name}}" name="mtr_name">
                        
                    <?php
                    
                    echo "<th>$pickup->id</th>";
                    echo "<th>$pickup->ctl_name</th>";
                    echo "<th>$pickup->idate</th>";
                    echo "<th>$pickup->timestartblock to $pickup->timeendblock</th>";
                    echo "<th>$pickup->airport $pickup->position</th>";
                    ?>
                    <th>{!! Form::submit( 'Pick-Up', ['class'=>'btn btn-success']) !!}</th>
            <?php
                    echo "</tr>";
                }
                
                ?>

            
        </table>
    </div>
</div>



<!-- Div containing schedule for ins/mtr based on booked sessions -->
<div class="box box-success">
    <div class="box-body">
        <h3>My Training Schedule</h3>
        <table class="table">
            <tr>
                <th>Student Name</th>
                <th>Date</th>
                <th>Time</th>
                <th>Position</th>
                <th>Action</th>
            </tr>
            
            <?php 
                $isbooked = DB::table('training_systems')->where('mtr_name','=', Auth::user()->name)->where('comments','=', '0')->get();
                foreach ($isbooked as $totrain){
                    echo "<tr>";
                    echo "<th>$totrain->ctl_name</th>";
                    echo "<th>$totrain->idate</th>";
                    echo "<th>$totrain->timestartblock to $totrain->timeendblock</th>";
                    echo "<th>$totrain->airport $totrain->position</th>";
                    
                    ?>
                <th><button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Finalize or Cancel</button></th>
                    <?php
                    echo "</tr>";
                }
                
                ?>
            
        </table>
    </div>
</div>

<!-- Notes Modal -->

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Confirmation: What would you like to do?</h4>
      </div>
      <div class="modal-body">   
          <p>Here, you can either finalize and complete a session or cancel it. By finalizing the session, you are relaesing it to the student. It is no longer in the system as an uncompleted session. <b>Remember: you will not be able to submit a session report once you have released a session, so submit your report BEFORE you release.</b> If you are no longer able to do this session with your student, click the cancel button to send them an email. <b>It is always a good idea to coordinate with your student before cancelling, even though they will receive this email. </b></p>
     
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<!-- Records -->
<div class="box box-success">
    <div class="box-body">
        <h3>Session Records</h3>
        <table class="table">
            <tr>
                <th>Mentor Name</th>
                <th>Date</th>
                <th>Time</th>
                <th>Position</th>
                <!-- <th>View</th> -->
            </tr>
            
            <?php 
                $records = DB::table('training_systems')->where('ctl_cid','=', Auth::user()->cid)->where('comments', '!=','0')->get();
                foreach ($records as $record){
                    echo "<tr>";
                    echo "<th>$record->mtr_name</th>";
                    echo "<th>$record->idate</th>";
                    echo "<th>$record->timestartblock to $record->timeendblock</th>";
                    echo "<th>$record->airport $record->position</th>";
                    echo "</tr>";
                }
                
                ?>
            
            
        </table>
    </div>
</div>


@endsection

@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('la-assets/plugins/datatables/datatables.min.css') }}"/>
@endpush

@push('scripts')
<script src="{{ asset('la-assets/plugins/datatables/datatables.min.js') }}"></script>
<script>
$(function () {
	$("#example1").DataTable({
		processing: true,
        serverSide: true,
        ajax: "{{ url(config('laraadmin.adminRoute') . '/training_system_dt_ajax') }}",
		language: {
			lengthMenu: "_MENU_",
			search: "_INPUT_",
			searchPlaceholder: "Search"
		},
		
	});
	$("#training_system-add-form").validate({
		
	});
});
</script>
@endpush
