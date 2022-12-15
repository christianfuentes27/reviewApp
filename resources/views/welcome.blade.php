@extends('layouts.app')

@section('content')
<!-- Home Section -->
    <div id="home">
        <div class="container text-center">
            <nav id="menu" data-toggle="offcanvas" data-target=".navmenu">
                <span class="fa fa-bars"></span>
            </nav>
            <div class="content">
                <h4>We've got the special power</h4>
                <hr>
                <div class="header-text btn">
                    <h1><span id="head-title"></span></h1>
                </div>
            </div>

            <a href="#meet-us" class="down-btn page-scroll">
                <span class="fa fa-angle-down"></span>
            </a>
        </div>
    </div>

    <!-- Services Section -->
    <div id="services">
        <div class="container text-center">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="section-title">
                        <h2>Reviews</h2>
                        <hr>
                    </div>
                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident.</p>
                </div>
            </div>

            <div class="space"></div>

            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <div class="service">
                        <a href="{{ url('review/book') }}"><span class="fa fa-book fa-3x"></span></a>
                        <h4>Books</h4>
                        <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit. At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis. </p>
                    </div>
                </div>

                <div class="col-md-4 col-sm-4">
                    <div class="service">
                        <a href="{{ url('review/movie') }}"><span class="fa fa-film fa-3x"></span></a>
                        <h4>Movies</h4>
                        <p>Donec sed odio dui. Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Accusamus et. At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis </p>
                    </div>
                </div>

                <div class="col-md-4 col-sm-4">
                    <div class="service">
                        <a href="{{ url('review/record') }}"><span class="fa fa-music fa-3x"></span></a>
                        <h4>Records</h4>
                        <p>Nulla vitae elit libero, a pharetra augue. At vero eos et accusamus et iusto odio dignissimos ducimus. Aenean lacinia bibendum nulla sed consectetur. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. </p>
                    </div>
                </div>
            </div>
            @auth
                <div class="text-center" style="margin: 30px 0;">
                    <a href="{{ url('review/create') }}" class="btn" style="background: #c59a6d; color: white; border-radius: 0; padding: 10px 30px;">Add review</a>
                </div>
            @endauth
            <a href="#works" class="down-btn page-scroll">
                <span class="fa fa-angle-down"></span>
            </a>
        </div>
    </div>
@endsection