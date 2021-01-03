@extends('layouts.app')
@section('title', 'Login')

@section('content')
<div class="signin-account">
    <div class="form">
        <div class="container">
            <div class="path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Sign in</li>
                    </ol>
                </nav>
            </div>
            <div class="signin-form">
                <form method="POST" action="{{ route('login') }}" id="myform">
                    @csrf

                    <div class="logo">
                        <img src="{{ asset('front/') }}/imgs/logo.png">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" name="email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="form-group">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row options">
                        <div class="col-md-6 remember">
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Remember me</label>
                            </div>
                        </div>
                        <div class="col-md-6 forgot">
                            <img src="{{ asset('front/') }}/imgs/complain.png">
                            <a href="#">Forgot password</a>
                        </div>
                    </div>
                    <div class="row buttons">
                        <div class="col-md-6 right">
                            <a onclick="document.getElementById('myform').submit()"> Sign in
                            </a>
                        </div>
                        <div class="col-md-6 left">
                            <a href="{{ route('register') }}">create new account</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
