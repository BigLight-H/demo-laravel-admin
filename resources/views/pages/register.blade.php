@extends('head.head')
@section('title', '我是注册页')
@section('css')
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/jquery-jgrowl/1.4.7/jquery.jgrowl.min.css" />
@endsection
<body class="gray-bg">

    <div class="middle-box text-center loginscreen   animated fadeInDown">
        <div>
            @foreach ($errors->all() as $error)
                <div class="alert alert-success">
                    {{ $error }}
                </div>
            @endforeach
            <div>

                <h1 class="logo-name">IN+</h1>

            </div>
            <h3>Register to IN+</h3>
            <p>Create account to see it in action.</p>
            <form class="m-t" role="form" action="{{ route('users.doRegister') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <input id="name" type="text" class="form-control" placeholder="昵称" required="" name="name" value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <input id="email" type="email" class="form-control" placeholder="邮箱号码" required="" name="email" value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <input id="password" type="password" class="form-control" placeholder="密码" required="" name="password">
                </div>
                <div class="form-group">
                    <input id="password1" type="password" class="form-control" placeholder="确认密码" required="" name="password_confirmation">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b" onclick="return verification()">注&nbsp;&nbsp;&nbsp;册</button>

                <p class="text-muted text-center"><small>已经有帐号了?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="{{ route('login') }}">登&nbsp;&nbsp;&nbsp;录</a>
            </form>
            <p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small> </p>
        </div>
    </div>
    @section('js')
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-jgrowl/1.4.7/jquery.jgrowl.min.js"></script>
        <script>
            //验证字段
            function verification() {
                var reg = /[\w!#$ %& '*+/=?^_`{|}~-]+(?:\.[\w!#$%&' * +/=?^_`{|}~-]+)*@(?:[\w](?:[\w-]*[\w])?\.)+[\w](?:[\w-]*[\w])?/;
                if($('#name').val().length < 3) {
                    $.jGrowl("用户名长度不能小于3!");
                    return false;
                } else if($('#password').val().length < 6) {
                    $.jGrowl("密码长度不能小于6!");
                    return false;
                } else if($('#password').val() !== $('#password1').val()) {
                    $.jGrowl("两次密码不一致!");
                    return false;
                } else if (! reg.test($('#email').val())){
                    $.jGrowl("邮箱格式错误!");
                    return false;
                }
                return true;
            }
        </script>
    @endsection
@extends('floor.floor')
