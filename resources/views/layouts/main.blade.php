@extends('layouts.default')


@section('header')
    @include('includes.header')
@endsection

@section('content')
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span3" id="sidebar">
            @include('includes.sidebar')
        </div>
        
        <!--/span-->
        <div class="span9" id="content">
            <div class="row-fluid">
                @include('components.statusbar')
                @include('components.taskbar')
            </div>
            <div class="row-fluid">
                @yield('maincontent')
            </div>
        </div>
    </div>
    <hr>
    @include('includes.footer')
</div>
@endsection