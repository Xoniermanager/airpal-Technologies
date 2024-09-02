@extends('layouts.doctor.main')
@section('content')
    <div class="dashboard-header">
        <h3>Edit Prescription</h3>
    </div>
    <div class="card">
        <div class="card-body">
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
            <form method="post" id="medical_record_form" action="{{ route('prescription.update', $prescriptionDetails->id) }}"
                enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <input type="hidden" name="booking_slot_id" value="{{ $prescriptionDetails->booking_slot_id }}">
                    <div class="mb-3 col-6 col-sm-6">
                        <p class="mb-2">Medication Start Date *</p>
                        <div>
                            <input type="date" name="start_date" class="form-control"
                                value="{{ $prescriptionDetails->start_date }}">
                        </div>
                        @error('start_date')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-6 col-sm-6">
                        <p class="mb-2">Medication End Date *</p>
                        <div>
                            <input type="date" name="end_date" class="form-control"
                                value="{{ $prescriptionDetails->end_date }}">
                        </div>
                        @error('end_date')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-6 col-sm-6">
                        <p class="mb-2">Clinical Findings </p>
                        <div>
                            <textarea name="description" class="form-control" value="">{{ $prescriptionDetails->description }}</textarea>
                        </div>
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-6 col-sm-6">
                        <p class="mb-2">Diagnosis </p>
                        <div>
                            <textarea name="diagnosis" class="form-control" value="">{{ $prescriptionDetails->diagnosis }}</textarea>
                        </div>
                        @error('diagnosis')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="panel panel-body position-relative p-4 mb-4 mt-4">
                        <p class="mb-2 panelbtn">Medicine Details</p>
                        @foreach ($prescriptionDetails->prescriptionMedicineDetail as $key => $medicineDetails)
                            <div class="card card-body mb-2">
                                <div class="row">
                                    <div class="mb-3 col-6 col-sm-4">
                                        <p class="mb-2">Medicine Name *</p>
                                        <div>
                                            <input type="text"
                                                name="medicine_detail[{{ $key }}][medicine_name]"
                                                class="form-control" value="{{ $medicineDetails->medicine_name }}">
                                        </div>
                                        @error('medicine_name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-6 col-sm-3">
                                        <p class="mb-2">Quantity*</p>
                                        <div>
                                            <input type="number" name="medicine_detail[{{ $key }}][quantity]"
                                                class="form-control" value="{{ $medicineDetails->quantity }}"
                                                min="1" max="5">
                                        </div>
                                        @error('quantity')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    @php
                                        $frequencyDetails = explode(',', $medicineDetails->frequency);
                                    @endphp
                                    <div class="mb-3 col-6 col-sm-2 p-0">
                                        <div class="customecheckbox">
                                            <div class="d-flex align-items-center">
                                                <input type="checkbox" value="Morning"
                                                    name="medicine_detail[{{ $key }}][frequency][]"
                                                    {{ in_array('Morning', $frequencyDetails) ? 'checked' : '' }}>
                                                <span> &nbsp; Morning</span>
                                            </div>
                                            <div class=" d-flex align-items-center">
                                                <input type="checkbox" value="Evening"
                                                    name="medicine_detail[{{ $key }}][frequency][]"
                                                    {{ in_array('Evening', $frequencyDetails) ? 'checked' : '' }}>
                                                <span> &nbsp; Evening</span>
                                            </div>

                                            <div class="ml10px d-flex align-items-center">
                                                <input type="checkbox" value="Night"
                                                    name="medicine_detail[{{ $key }}][frequency][]"
                                                    {{ in_array('Night', $frequencyDetails) ? 'checked' : '' }}>
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
                                            <input type="radio" value="1"
                                                name="medicine_detail[{{ $key }}][meal_status]"
                                                {{ $medicineDetails->meal_status == '1' ? 'checked' : '' }}>Yes
                                            <input type="radio" value="0"
                                                name="medicine_detail[{{ $key }}][meal_status]"
                                                {{ $medicineDetails->meal_status == '0' ? 'checked' : '' }}>No
                                        </div>
                                        <a class="btn-xs btn btn-danger ml-10px float-right"
                                            onclick="remove_medicine_html(this,{{ $medicineDetails->id }})"><i
                                                class="fa fa-minus" aria-hidden="true"></i></a>
                                        @error('meal_status')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-md-12">
                            <p id="medicine_more_html" class=""></p>
                        </div>
                        <a class="btn btn-primary" id="addMedicine"><i class="fa fa-plus" aria-hidden="true"></i>Add More
                            Medicine</a>
                    </div>
                    @php
                        $adviceDetails = explode(',', $prescriptionDetails->advice);
                    @endphp
                    <div class="panel panel-body position-relative p-4 mb-5 mt-4">
                        <p class="mb-2 panelbtn">Advice (Optional)</p>
                        @foreach ($adviceDetails as $key => $advice)
                            <div class="row">
                                <div class="mb-3 col-6 col-sm-10">
                                    <input type="text" name="advice[{{ $key }}]" class="form-control"
                                        placeholder="Enter the Description" value="{{ $advice }}">
                                </div>
                                <div class="col-md-2">
                                    <a class="btn btn-danger" onclick="remove_html(this)">
                                        <i class="fa fa-minus" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                        <div class="row">
                            <p id="advice_html" class=""></p>
                            <div class="col-md-2">
                                <a class="btn btn-primary" id="addAdvice"><i class="fa fa-plus" aria-hidden="true"></i>
                                    Add More </a>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-body position-relative p-4 mb-5 mt-4">
                        <p class="mb-2 panelbtn">Prescribe Test (Optional)</p>
                        @foreach ($prescriptionDetails->prescriptionTest as $key => $testDetails)
                            <div class="row">
                                <div class="mb-3 col-6 col-sm-5">
                                    <input type="text" name="test[{{ $key }}][name]" class="form-control"
                                        placeholder="Enter the Name of Test" value="{{ $testDetails->name }}">
                                </div>
                                <div class="mb-3 col-6 col-sm-5">
                                    <textarea type="text" name="test[{{ $key }}][description]" class="form-control"
                                        placeholder="Enter the Description of Test">{{ $testDetails->description }}</textarea>
                                </div>
                                <div class="col-md-2">
                                    <a class="btn btn-danger" onclick="remove_html(this,{{ $testDetails->id }})">
                                        <i class="fa fa-minus" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        @endforeach
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
                                <a class="btn btn-primary" id="addTest"><i class="fa fa-plus"
                                        aria-hidden="true"></i>Add More</a>
                            </div>
                            <p id="test_html" class=""></p>
                        </div>
                    </div>
                    <div class="mb-3 col-6 col-sm-6">
                        <p class="mb-2">Next Follow Up Date</p>
                        <div>
                            <input type="date" name="follow_up" class="form-control"
                                value="{{ $prescriptionDetails->follow_up }}">
                        </div>
                    </div>
                </div>
                <input type="hidden" id="medicine_count"
                    value="{{ count($prescriptionDetails->prescriptionMedicineDetail) }}">
                <input type="hidden" id="advice_count" value="{{ count($adviceDetails) }}">
                <input type="hidden" id="test_count" value="{{ count($prescriptionDetails->prescriptionTest) }}">
                <button type="submit" class="btn btn-primary text-white"> Submit</button>
            </form>
        </div>
    </div>
@endsection
