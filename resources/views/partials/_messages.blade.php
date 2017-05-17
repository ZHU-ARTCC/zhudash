@if(Session::has('success'))

<div style="color: #000;" class="alert alert-success" role="alert">{{ Session::get('success') }}</div>

@endif