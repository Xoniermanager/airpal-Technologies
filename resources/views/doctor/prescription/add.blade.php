@extends('layouts.doctor.main')
@section('content')
    <div class="dashboard-header">
        <h3>Add Prescription</h3>
    </div>
    <div class="card">
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong>
                        {!! implode('<br/>', $errors->all('<span>:message</span>')) !!}
                    </strong>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible">
                    {{ session('error') }}
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success alert-dismissible">
                    {{ session('success') }}
                </div>
            @endif
            <form method="post" id="medical_record_form" action="{{ route('prescription.create') }}"
                enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <input type="hidden" name="booking_slot_id" value="{{ $bookingId }}">
                    {{-- <div class="mb-3 col-6 col-sm-6">
                        <p class="mb-2">Booking</p>
                        <div>
                            <select name="booking_slot_id" class="form-control" id="booking_slot_id">
                                <option value="">Please Select the Booking</option>
                                @foreach ($allBookingDetails as $bookingDetail)
                                <option value="{{ $bookingDetail->id }}"
                                    {{ old('booking_slot_id', $bookingId) == $bookingDetail->id ? 'selected' : '' }}>
                                    {{ date('j M Y', strtotime($bookingDetail->booking_date)) }} &
                                    {{ date('h:i A', strtotime($bookingDetail->slot_start_time)) }} -
                                    {{ date('h:i A', strtotime($bookingDetail->slot_end_time)) }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        @error('booking_slot_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div> --}}
                    <div class="mb-3 col-6 col-sm-6">
                        <p class="mb-2">Medication Start Date *</p>
                        <div>
                            <input type="date" name="start_date" class="form-control" value="{{ old('start_date') }}">
                        </div>
                        @error('start_date')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-6 col-sm-6">
                        <p class="mb-2">Medication End Date *</p>
                        <div>
                            <input type="date" name="end_date" class="form-control" value="{{ old('end_date') }}">
                        </div>
                        @error('end_date')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-6 col-sm-6">
                        <p class="mb-2">Clinical Findings </p>
                        <div>
                            <textarea name="description" class="form-control" value="">{{ old('description') }}</textarea>
                        </div>
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-6 col-sm-6">
                        <p class="mb-2">Diagnosis </p>
                        <div>
                            <textarea name="diagnosis" class="form-control" value="">{{ old('diagnosis') }}</textarea>
                        </div>
                        @error('diagnosis')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="panel panel-body position-relative p-4 mb-4 mt-4">
                    <p class="mb-2 panelbtn">Medicine Details</p>
                    <div class="card card-body mb-2">
                        <div class="row">
                            <div class="mb-3 col-6 col-sm-4">
                                <p class="mb-2">Medicine Name *</p>
                                <div>
                                    <input type="text" name="medicine_detail[0][medicine_name]" class="form-control"
                                        value="{{ old('medicine_name') }}">
                                </div>
                                @error('medicine_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-6 col-sm-3">
                                <p class="mb-2">Quantity*</p>
                                <div>
                                    <input type="number" name="medicine_detail[0][quantity]" class="form-control"
                                        value="{{ old('quantity') }}" min="1" max="5">
                                </div>
                                @error('quantity')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-6 col-sm-2 p-0">
                                <div class="customecheckbox">
                                    <div class="d-flex align-items-center">
                                        <input type="checkbox" value="Morning" name="medicine_detail[0][frequency][]">
                                        <span> &nbsp; Morning</span>
                                    </div>
                                    <div class=" d-flex align-items-center">
                                        <input type="checkbox" value="Evening" name="medicine_detail[0][frequency][]">
                                        <span> &nbsp; Evening</span>
                                    </div>

                                    <div class="ml10px d-flex align-items-center">
                                        <input type="checkbox" value="Night" name="medicine_detail[0][frequency][]">
                                        <span> &nbsp; Night</span>

                                    </div>
                                </div>
                                @error('frequency')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-6 col-sm-3">
                                <p class="mb-2">Meal Status *</p>
                                <div class="custom-radio float-left">
                                    <input type="radio" value="1" name="medicine_detail[0][meal_status]">Yes
                                    <input type="radio" value="0" name="medicine_detail[0][meal_status]" checked>No
                                </div>
                                @error('meal_status')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <a class="btn btn-primary btn-sm float-right" id="addMedicine"><i class="fa fa-plus"
                                        aria-hidden="true"></i></a>
                            </div>



                        </div>
                    </div>
                    <div class="col-md-12">
                        <p id="medicine_more_html" class=""></p>
                    </div>
                </div>
                <div class="panel panel-body position-relative p-4 mb-5 mt-4">
                    <p class="mb-2 panelbtn">Advice (Optional)</p>

                    <div class="row">
                        <div class="mb-3 col-6 col-sm-10">
                            <input type="text" name="advice[0]" class="form-control"
                                placeholder="Enter the Description">
                        </div>
                        <div class="col-md-2">
                            <a class="btn btn-primary" id="addAdvice"><i class="fa fa-plus" aria-hidden="true"></i></a>
                        </div>
                        <p id="advice_html" class=""></p>
                    </div>
                </div>
                <div class="panel panel-body position-relative p-4 mb-5 mt-4">
                    <p class="mb-2 panelbtn">Prescribe Test (Optional)</p>
                    <div class="row">
                        <div class="mb-3 col-6 col-sm-5">
                            <input type="text" name="test[0][name]" class="form-control"
                                placeholder="Enter the Name of Test">
                        </div>

                        <div class="mb-3 col-6 col-sm-5">
                            <textarea type="text" name="test[0][description]" class="form-control"
                                placeholder="Enter the Description of Test"></textarea>
                        </div>
                        <div class="col-md-2">
                            <a class="btn btn-primary" id="addTest"><i class="fa fa-plus" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <p id="test_html" class=""></p>

                </div>

                <div class="mb-3 col-6 col-sm-6">
                    <p class="mb-2">Next Follow Up Date</p>
                    <div>
                        <input type="date" name="follow_up" class="form-control">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary text-white"> Submit</button>
                     <input type="hidden" id="medicine_count"
                        value="0">
                    <input type="hidden" id="advice_count"
                        value="0">
                    <input type="hidden" id="test_count"
                        value="0">
        </div>
        </form>
    </div>
@endsection
