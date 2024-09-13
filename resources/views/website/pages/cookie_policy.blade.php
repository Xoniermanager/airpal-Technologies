@extends('layouts.frontend.main')
@section('content')

<div class="breadcrumb-bar-two">
    <div class="container">
        <div class="row align-items-center inner-banner">
            <div class="col-md-12 col-12 text-center">
                <h2 class="breadcrumb-title">Cookie Policy</h2>
                <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item" aria-current="page">Cookie Policy</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>


<x-cookie_policy :show="true" />

@endsection