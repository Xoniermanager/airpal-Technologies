@extends('layouts.frontend.main')
@section('content')
    <div class="breadcrumb-bar-two ">
        <div class="container">
            <div class="row align-items-center inner-banner">
                <div class="col-md-12 col-12 text-center">
                    <h2 class="breadcrumb-title">Thank you</h2>
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                            <li class="breadcrumb-item" aria-current="page">Thank you</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>


    <div
        style=" width: 35vw;
min-width: 350px;
margin: 4em auto;
background-color: white;
border-radius: 12px;
border:1px solid #eee;
box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px,
  rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
padding: 24px;">

        <div style="width:100%;text-align: center;">

            <img src="{{ site('website_logo') ?? '' }}" style="height: 80px">



            <h1>Thank You!</h1>
        </div>
        <div style="width:100%;text-align: center;margin-bottom:10px;">
            <img src="{{ asset('assets/img/img.png') }}" width="120px" class="mb-4">
            <p style=" color: #a3a3a3;
      font-size: 15px;
      padding: 8px;
      margin-top: 4px;">
                @if (request('already') == true)
                    You Been Already Subscribed To Get The Updates.
                @else
                    Thank you Subscribing Us,You Get More Updates.
                @endif
            </p>
        </div>
        <div style="width:100%;text-align: center; margin-bottom: 10px;">

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
