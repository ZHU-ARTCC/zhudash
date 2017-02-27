@extends("la.layouts.app")

@section("contentheader_title", "Training")
@section("contentheader_description", "Request a session, view your records and check a session status")
@section("section", "Training Systems")
@section("sub_section", "Listing")
@section("htmlheader_title", "Training Systems Listing")

@section("headerElems")
@la_access("Training_Systems", "create")
	<button class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#AddModal">Add Training System</button>
@endla_access
@endsection

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
        {!! Form::open(['action' => 'LA\Training_SystemsController@store', 'id' => 'training_system-add-form']) !!}
            Controller Name: <input name="ctl_name" type="text" readonly value="{{Auth::user()->name}}"><br><br>
            Controller CID: <input name="ctl_cid" type="text" readonly value="{{Auth::user()->cid}}">
            <hr>
            Position: <select name="airport">
            <option>KBWI</option>
            <option>KIAD</option>
            <option>KDCA</option>
            <option>ZDC</option>
            <option>Minors</option>
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
                <th>Student Name</th>
                <th>Date</th>
                <th>Time</th>
                <th>Position</th>
                <!-- <th>Action</th> -->
            </tr>
            
            <?php 
                $unbooked = DB::table('training_systems')->where('ctl_cid','=', Auth::user()->cid)->where('mtr_name', '!=','0')->get();
                foreach ($unbooked as $pickup){
                    echo "<tr>";
                    echo "<th>$pickup->ctl_name</th>";
                    echo "<th>$pickup->idate</th>";
                    echo "<th>$pickup->timestartblock to $pickup->timeendblock</th>";
                    echo "<th>$pickup->airport $pickup->position</th>";
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
                <!-- <th>Action</th> -->
            </tr>
            
            <?php 
                $isbooked = DB::table('training_systems')->where('mtr_name','=', Auth::user()->name)->get();
                foreach ($isbooked as $totrain){
                    echo "<tr>";
                    echo "<th>$totrain->ctl_name</th>";
                    echo "<th>$totrain->idate</th>";
                    echo "<th>$totrain->timestartblock to $totrain->timeendblock</th>";
                    echo "<th>$totrain->airport $totrain->position</th>";
                    echo "</tr>";
                }
                
                ?>
            
            
        </table>
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
                    echo "<th>$record->ctl_name</th>";
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
