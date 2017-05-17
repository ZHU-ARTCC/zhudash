@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/positions') }}">Position</a> :
@endsection
@section("contentheader_description", $position->$view_col)
@section("section", "Positions")
@section("section_url", url(config('laraadmin.adminRoute') . '/positions'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Positions Edit : ".$position->$view_col)

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

<div class="box">
	<div class="box-header">
		
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				{!! Form::model($position, ['route' => [config('laraadmin.adminRoute') . '.positions.update', $position->id ], 'method'=>'PUT', 'id' => 'position-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'position')
					@la_input($module, 'frequency')
					@la_input($module, 'callsign')
					@la_input($module, 'ident')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/positions') }}">Cancel</a></button>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@endsection

@push('scripts')
<script>
$(function () {
	$("#position-edit-form").validate({
		
	});
});
</script>
@endpush
