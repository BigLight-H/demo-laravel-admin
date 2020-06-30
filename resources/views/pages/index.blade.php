@extends('head.head')
@section('title')我是首页@endsection
<div id="wrapper">
    @include('plugin.nav')
    <div id="page-wrapper" class="gray-bg">
        @include('plugin.navbar')
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center m-t-lg">
                        <h1>
                            INSPINIA Static Seed Project for BS4
                        </h1>
                        <small>
                            It is an application skeleton for a typical web app. You can use it to quickly bootstrap your webapp projects and dev environment for these projects.
                        </small>
                    </div>
                </div>
            </div>
        </div>
        @include('plugin.footer')
    </div>
</div>
@extends('floor.floor')
