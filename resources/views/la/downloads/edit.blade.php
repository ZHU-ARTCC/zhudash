@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/downloads') }}">Download</a> :
@endsection
@section("contentheader_description", $download->$view_col)
@section("section", "Downloads")
@section("section_url", url(config('laraadmin.adminRoute') . '/downloads'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Downloads Edit : ".$download->$view_col)

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
				{!! Form::model($download, ['route' => [config('laraadmin.adminRoute') . '.downloads.update', $download->id ], 'method'=>'PUT', 'id' => 'download-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'f_name')
					@la_input($module, 'description')
					@la_input($module, 'file_link')
					@la_input($module, 'user_update')
					@la_input($module, 'user_time')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/downloads') }}">Cancel</a></button>
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
	$("#download-edit-form").validate({
		
	});
});
</script>
@endpush
