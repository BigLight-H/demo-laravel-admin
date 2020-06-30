@extends('head.head')
@section('title', '我是登录页')

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            @if (session('error'))
                <div class="alert alert-success">
                    {{ session('error') }}
                </div>
            @endif
            <div><h1 class="logo-name">IN+</h1></div>
            <h3>Welcome to IN+</h3>
            <p>Perfectly designed and precisely prepared admin theme with over 50 pages with extra new web app views.
                <!--Continually expanded and constantly improved Inspinia Admin Them (IN+)-->
            </p>
            <p>Login in. To see it in action.</p>
            <form class="m-t" role="form" action="{{ route('users.doLogin') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="邮箱" required="" name="name">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="密码" required="" name="password">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">登&nbsp;&nbsp;&nbsp;录</button>

                <a href="#"><small>修改密码?</small></a>
                <p class="text-muted text-center"><small>还没有账号?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="{{ route('register') }}">注册账号</a>
            </form>
            <p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small> </p>
        </div>

    </div>

@extends('floor.floor')
