@extends('layouts.app')

@section('title', 'Post')

@section('content')
<div class="article-details">


    <!--inside-article-->
        <div class="inside-article">
            <div class="container">
                <div class="path">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">الرئيسية</a></li>
                            <li class="breadcrumb-item" aria-current="page">المقالات</li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $Post->category->name }}</li>
                        </ol>
                    </nav>
                </div>
                <div class="article-image">
                    <img src="{{ asset('images/Posts/') }}/{{ $Post->image }}" class="card-img-top" alt="...">
                </div>
                <div class="article-title col-12">
                    <div class="h-text col-6">
                        <h4>{{ $Post->title }}</h4>
                    </div>
                    <div class="icon col-6">
                        <button type="button" class="active"><i class="far fa-heart "></i></button>
                    </div>
                </div>

                <!--text-->
                <div class="text">
                    <p>
                        {{ $Post->body }}</p>
                </div>

                <!--articles-->
                <div class="articles">
                    <div class="title">
                        <div class="head-text">
                            <h2>مقالات ذات صلة</h2>
                        </div>
                    </div>
                    <div class="view">
                        <div class="row">
                            <!-- Set up your HTML -->
                            <div class="owl-carousel articles-carousel">

                    @foreach ($Posts as $post)

                    <div class="card">
                        <div class="photo">
                            <img src="{{ asset('images/Posts/') }}/{{ $post->image }}" class="card-img-top" alt="...">
                            <a href="{{ route('Post', $post->id) }}" class="click">المزيد</a>
                        </div>
                        <a href="#" class="favourite">
                            <i class="far fa-heart "></i>
                        </a>

                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">
                                {{ $post->body }}
                            </p>
                        </div>
                    </div>
                    @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


  </div>
  @endsection
