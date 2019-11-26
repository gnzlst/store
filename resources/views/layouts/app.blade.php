@extends('layouts.base')
@section('body')
    <!--Navigation -->
    @include('includes.nav')

    <!--Site Wrapper -->
    <div class="site_wrapper">
        @yield('content')
        <div class="notify text-center"></div>
    </div>
    @include('includes.footer')
@stop