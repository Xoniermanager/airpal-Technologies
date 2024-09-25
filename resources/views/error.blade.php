@extends('layouts.frontend.main')
@section('content')
    <div class="breadcrumb-bar-two ">
        <div class="container">
            <div class="row align-items-center inner-banner">
                <div class="col-md-12 col-12 text-center">
                    <h2 class="breadcrumb-title"></h2>
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div
        style=" width: 30vw;
    min-width: 350px;
    margin: 6em auto;
    background-color: white;
    border-radius: 12px;
    border:1px solid #eee;
    box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px,
      rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
    padding: 24px;">

        <div style="width:100%;text-align: center;">

            <img src="{{ site('website_logo') ?? '' }}" style="height: 80px">



            <h1 style="color:red;font-size: 35px;">Failed !</h1>
        </div>
        <div style="width:100%;text-align: center;">
            <img src="{{ asset('assets/failed.png') }}" width="120px">
            <p style=" color: #757171;
          font-size: 22px;
          padding: 8px;
          margin-top: 4px;">
               Email not verified or has expired. Please try again...</p>
        </div>
        <div style="width:100%;text-align: center; margin-bottom: 10px; margin-top:5px">

            <a href="{{ route('home.index') }}"
                style=" background-color: #293991;
        color: #fff;
        font-size: 15px;
        border-radius: 5px;
        padding: 10px;
        text-decoration: none;
        margin-top: 4px;">Redirect
                to Homepage</a>
        </div>
    </div>
@endsection
