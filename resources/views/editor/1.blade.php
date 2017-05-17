@extends("la.layouts.app")

@section("contentheader_title", "SOPs")
@section("contentheader_description", "Choose an SOP to edit.")
@section("section", "SOPs")
@section("sub_section", "Listing")
@section("htmlheader_title", "SOPs Listing")

@section("headerElems")
@la_access("SOPs", "create")
	
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
        <?php
            $sops = DB::table('sops')->where('id','=','1')->get();
               
            foreach ($sops as $sop){
            echo "You are currently editing the <b>$sop->sop_name</b> SOP/LOA.";
           ?>
        <br><hr>
        {!! Form::open(['action' => 'LA\SOPsController@edit', 'id' => 'sop-add-form']) !!}
            
        <!-- Prereqs: -->
            <input name="updated_who" type="hidden" readonly value="{{Auth::user()->name}}">
            <input name="updated_at" type="hidden" readonly value="{{date("m-d-y")}} ">
        
            <textarea name="body">{{$sop->body}}</textarea><br>
            Notes: <input type="text" name="notes" size="190"><br><br>
            
        
            {!! Form::submit( 'Submit', ['class'=>'btn btn-success']) !!}
        {!! Form::close() !!}
        
        <?php
                 }

        ?>
    </div>
</div>

@endsection

@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('la-assets/plugins/datatables/datatables.min.css') }}"/>
@endpush

@push('scripts')
<script src="//cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({ 
          selector:'textarea', 
          plugins: 'image bbcode',
          image_prepend_url: "http://www.tinymce.com/images/"
      });</script>
@endpush


