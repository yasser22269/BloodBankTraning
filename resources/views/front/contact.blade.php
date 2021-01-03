@extends('layouts.app')

@section('title', 'contact-us')

@section('content')
<div class="contact-us">

    <!--contact-us-->
    <div class="contact-now">
        <div class="container">
            <div class="path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">الرئيسية</a></li>
                        <li class="breadcrumb-item active" aria-current="page">تواصل معنا</li>
                    </ol>
                </nav>
            </div>
            <div class="row methods">
                <div class="col-md-6">
                    <div class="call">
                        <div class="title">
                            <h4>اتصل بنا</h4>
                        </div>
                        <div class="content">
                            <div class="logo">
                                <img src="{{ asset('front/') }}/imgs/logo.png">
                            </div>
                            <div class="details">
                                <ul>
                                    <li><span>الجوال:</span> {{  $Setting->phone }}</li>
                                    <li><span>فاكس:</span> {{  $Setting->phone }}</li>
                                    <li><span>البريد الإلكترونى:</span>  {{ $Setting->email }}</li>
                                </ul>
                            </div>
                            <div class="social">
                                <h4>تواصل معنا</h4>
                                <div class="icons" dir="ltr">
                                    <div class="out-icon">
                                        <a href="{{  $Setting->facebook }}"><img src="{{ asset('front/') }}/imgs/001-facebook.svg"></a>
                                    </div>
                                    <div class="out-icon">
                                        <a href="{{  $Setting->twitter }}"><img src="{{ asset('front/') }}/imgs/002-twitter.svg"></a>
                                    </div>
                                    <div class="out-icon">
                                        <a href="{{  $Setting->youtube }}"><img src="{{ asset('front/') }}/imgs/003-youtube.svg"></a>
                                    </div>
                                    <div class="out-icon">
                                        <a href="{{  $Setting->insta }}"><img src="{{ asset('front/') }}/imgs/004-instagram.svg"></a>
                                    </div>
                                    <div class="out-icon">
                                        <a href="{{  $Setting->phone }}"><img src="{{ asset('front/') }}/imgs/005-whatsapp.svg"></a>
                                    </div>
                                    <div class="out-icon">
                                        <a href="{{  $Setting->email }}"><img src="{{ asset('front/') }}/imgs/006-google-plus.svg"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="contact-form">
                        <div class="title">
                            <h4>تواصل معنا</h4>
                        </div>
                        <div class="fields">
                            <form method="POST" action="{{ route('postcontact') }}">
                                {{ csrf_field() }}
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="عنوان الرسالة" name="subject">
                                @if ($errors->has('subject'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('subject') }}</strong>
                                </span>
                               @endif
                                <textarea placeholder="نص الرسالة" class="form-control" id="exampleFormControlTextarea1" rows="3" name="message"></textarea>
                                @if ($errors->has('message'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('message') }}</strong>
                                </span>
                               @endif
                                <button type="submit">ارسال</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

  </div>
  @endsection
