<!DOCTYPE html>
<html lang="en">

<head>
@include('admin.include.head')
</head>

<body>

    <div class="main-wrapper">
    @include('admin.include.header')

        <div class="page-wrapper">
            <div class="content container-fluid">

                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">General Settings</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="javascript:(0)">Settings</a></li>
                                <li class="breadcrumb-item active">General Settings</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">General</h4>
                            </div>
                            <div class="card-body">
                                <form action="#">
                                    <div class="mb-3">
                                        <label class="mb-2">Website Name</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label class="mb-2">Website Logo</label>
                                        <input type="file" class="form-control">
                                        <small class="text-secondary">Recommended image size is <b>150px x
                                                150px</b></small>
                                    </div>
                                    <div class="mb-0">
                                        <label class="mb-2">Favicon</label>
                                        <input type="file" class="form-control">
                                        <small class="text-secondary">Recommended image size is <b>16px x 16px</b> or
                                            <b>32px x 32px</b></small><br>
                                        <small class="text-secondary">Accepted formats : only png and ico</small>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
    @include('admin.include.footer')