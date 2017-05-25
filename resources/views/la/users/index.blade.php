@extends("la.layouts.app")

@section("contentheader_title", "Users")
@section("contentheader_description", "Users listing")
@section("section", "Users")
@section("sub_section", "Listing")
@section("htmlheader_title", "Users Listing")

@section("headerElems")
@la_access("Users", "create")
	<button class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#AddModal">Add User</button>
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
    <div class="box-body">
		<table id="example1" class="table table-bordered">
		<thead>
            <?php $controllers = DB::table('users')->orderBy('id', 'asc')->get(); ?>
		<tr class="success">
			{!! Form::open(['action' => 'Role_userController@store', 'id' => 'user_update', 'method' => 'POST']) !!}
                User ID: <select class="form-control" name="user_id">
                @foreach ($controllers as $controller){
                    <option>{{$controller->id}}</option>
                @endforeach
                </select><br>
                User Role ID: <select class="form-control" name="role_id">
                    <option value="4">Inactive</option>
                    <option value="2">Controller</option>
                    <option value="3">Training Staff</option>
                    <option value="5">Support Staff</option>
                    <option value="6">Senior Staff</option>
                </select>
            <br>
            {!! Form::submit( 'Submit', ['class'=>'btn btn-success']) !!}
            {!! Form::close() !!}
		</tr>
		</thead>
		<tbody>
			
		</tbody>
		</table>
	</div>
</div>

<?php $controllers = DB::table('users')->orderBy('name', 'asc')->get(); ?>
<div class="box box-success">
	<!--<div class="box-header"></div>-->
	<div class="box-body">
		<table id="example1" class="table table-bordered">
            <tr style="color: #333333; background-color: #DFF0D8;">
                <th>ID</th>
                <th>Name</th>
                <th>CID</th>
                <th>Email</th>
                <th>Role</th>
                <th>Rating</th>
                <th>OI</th>
                <th>Actions</th>
            </tr>
		  @foreach ($controllers as $controller)
            <tr>
                <th>{{$controller->id}}</th>
                <th>{{$controller->name}}</th>
                <th>{{$controller->cid}}</th>
                <th>{{$controller->email}}</th>
                <th>{{$controller->type}}</th>
                <th>{{$controller->rating}}</th>
                <th>{{$controller->oi}}</th>
                <th><a class="btn btn-success" href="users/{{$controller->id}}/edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></th>
            </tr>
          @endforeach
		</table>
    </div></div><br><br>


<!-- CID SSO
<p>First, before adding a new user, use the search function below to grab basic information about them. Then, using this data, add the user to the roster and set their permissions.</p>

<form method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="text" name="id" placeholder="Controller CID"> <input class="btn btn-success btn-sm" type="submit" value="Submit"><br><br>
</form>

-->


@la_access("Users", "create")
<div class="modal fade" id="AddModal" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Add User</h4>
			</div>
			{!! Form::open(['action' => 'LA\UsersController@store', 'id' => 'user-add-form']) !!}
			<div class="modal-body">
				<div class="box-body">
                    @la_form($module)
					
					{{--
					@la_input($module, 'name')
					@la_input($module, 'email')
					@la_input($module, 'password')
					@la_input($module, 'type')
					@la_input($module, 'status')
					@la_input($module, 'cid')
					@la_input($module, 'role')
					--}}
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				{!! Form::submit( 'Submit', ['class'=>'btn btn-success']) !!}
			</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>
@endla_access

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
        ajax: "{{ url(config('laraadmin.adminRoute') . '/user_dt_ajax') }}",
		language: {
			lengthMenu: "_MENU_",
			search: "_INPUT_",
			searchPlaceholder: "Search"
		},
		@if($show_actions)
		columnDefs: [ { orderable: false, targets: [-1] }],
		@endif
	});
	$("#user-add-form").validate({
		
	});
});
</script>
@endpush
