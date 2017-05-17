@extends('la.layouts.auth')

@section('htmlheader_title')
    Log in
@endsection

@section('content')
<body class="hold-transition login-page" style="background-image: url('http://i1268.photobucket.com/albums/jj580/wguisbond/vlad-busuioc-116873%201_zpsodr7edcu.jpg')">
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ url('/home') }}"><b>{{ LAConfigs::getByKey('sitename_part1') }} </b>{{ LAConfigs::getByKey('sitename_part2') }}</a>
        </div>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="login-box-body">
    <p class="login-box-msg">Sign in</p>
    <form action="{{ url('/login') }}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group has-feedback">
            <input type="email" class="form-control" placeholder="Email" name="email"/>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" name="password"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div>
            <div class="col-xs-6 col-xs-offset-2">
                <a href="{{ url('/password/reset') }}" class="btn btn-primary btn-block btn-flat">Forgot Password?</a>
            </div>
        </div>
    </form> 

</div>

</div>

    @include('la.layouts.partials.scripts_auth')

    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
</body>

@endsection
