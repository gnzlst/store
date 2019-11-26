@extends('layouts.app')
@section('title', 'Login to your account')
@section('data-page-id', 'auth')

@section('content')
    <div class="auth" id="auth">
        <section class="login_form">
            <div class="grid-x grid-padding-x">
                <div class="small-12 medium-6 medium-offset-3">
                    <h2 class="text-center">Login</h2>
                    @include('includes.message')
                    <form action="/login" method="post">
                        <div class="input-group">
                            <span class="input-group-label"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
                            <input class="input-group-field" type="text" name="username" placeholder="Username or Email"
                                   value="{{ \App\Classes\Request::old('post', 'username') }}">
                        </div>
                        <div class="input-group">
                            <span class="input-group-label"><i class="fa fa-key fa-fw" aria-hidden="true"></i></span>
                            <input class="input-group-field" type="password" name="password" placeholder="Password">
                        </div>
                        <input type="hidden" name="token" value="{{ \App\Classes\CSRFToken::_token() }}">
                        <button class="button float-right">Login</button>
                    </form>
                    <p>Not yet a member? <a href="/register">Register Here</a></p>

                </div>
            </div>
        </section>
    </div>
@stop