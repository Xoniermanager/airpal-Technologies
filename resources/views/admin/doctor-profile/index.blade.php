@extends('layouts.admin.main')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-7 col-auto">
                    <h3 class="page-title">List of Doctors</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript:(0);">Users</a></li>
                        <li class="breadcrumb-item active">Doctor</li>
                    </ul>
                </div>
                <div class="col-sm-5 col">
                    <a href="{{route('admin.add-doctor')}}" class="btn btn-primary float-end mt-2">Add doctor</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                   @include('admin.doctor-profile.doctor-list')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('javascript')

@endsection