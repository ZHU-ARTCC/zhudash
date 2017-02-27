@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/event_requests') }}">Event Request</a> :
@endsection
@section("contentheader_description", $event_request->$view_col)
@section("section", "Event Requests")
@section("section_url", url(config('laraadmin.adminRoute') . '/event_requests'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Event Requests Edit : ".$event_request->$view_col)

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
				{!! Form::model($event_request, ['route' => [config('laraadmin.adminRoute') . '.event_requests.update', $event_request->id ], 'method'=>'PUT', 'id' => 'event_request-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'ctl_name')
					@la_input($module, 'event_request')
					@la_input($module, 'position_request')
					@la_input($module, 'comments')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/event_requests') }}">Cancel</a></button>
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
	$("#event_request-edit-form").validate({
		
	});
});
</script>
@endpush
