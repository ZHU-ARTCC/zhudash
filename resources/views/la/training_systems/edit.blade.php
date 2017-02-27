@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/training_systems') }}">Training System</a> :
@endsection
@section("contentheader_description", $training_system->$view_col)
@section("section", "Training Systems")
@section("section_url", url(config('laraadmin.adminRoute') . '/training_systems'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Training Systems Edit : ".$training_system->$view_col)

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
				{!! Form::model($training_system, ['route' => [config('laraadmin.adminRoute') . '.training_systems.update', $training_system->id ], 'method'=>'PUT', 'id' => 'training_system-edit-form']) !!}
					@la_form($module)
					
					{{--
					
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/training_systems') }}">Cancel</a></button>
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
	$("#training_system-edit-form").validate({
		
	});
});
</script>
@endpush
