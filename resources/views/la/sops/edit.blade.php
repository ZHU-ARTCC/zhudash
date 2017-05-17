@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/sops') }}">Sop</a> :
@endsection
@section("contentheader_description", $sop->$view_col)
@section("section", "Sops")
@section("section_url", url(config('laraadmin.adminRoute') . '/sops'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Sops Edit : ".$sop->$view_col)

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
				{!! Form::model($sop, ['route' => [config('laraadmin.adminRoute') . '.sops.update', $sop->id ], 'method'=>'PUT', 'id' => 'sop-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'name')
					@la_input($module, 'file')
					@la_input($module, 'updated_by')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/sops') }}">Cancel</a></button>
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
	$("#sop-edit-form").validate({
		
	});
});
</script>
@endpush
