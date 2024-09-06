@extends('layouts.admin.main')
@section('content')
    <div class="main-wrapper">
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-7 col-auto">
                            <h3 class="page-title">Testimonials</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">testimonials</li>
                            </ul>
                        </div>
                        <div class="col-sm-5 col">
                            <a href="{{route('admin.show.testimonial.form')}}"  class="btn btn-primary float-end mt-2">Add</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                @include('admin.generals.testimonials.testimonial_list')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection