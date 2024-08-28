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
                    <div class="mb-3 col-6 col-sm-6">
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
                    </div>
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
                        <p class="mb-2">Description </p>
                        <div>
                            <textarea name="description" class="form-control" value="">{{ old('description') }}</textarea>
                        </div>
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="panel panel-body">
                        <div class="row m-0 p-0">
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
                </div>
                <p id="medicine_more_html" class="row">
                </p>
                <button type="submit" class="btn btn-primary text-white"> Submit</button>
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            var counter = 1;

            // Function to initialize or reinitialize form validation
            function validatefunction() {
                // Initialize form validation
                $("#medical_record_form").validate({
                    rules: {
                        description: "required",
                        booking_slot_id: "required",
                        start_date: "required",
                        end_date: "required",
                    },
                    messages: {
                        description: "Please enter the description",
                        booking_slot_id: "Please select the booking slot",
                        start_date: "Please select the start date",
                        end_date: "Please select the end date"
                    }
                });

                // Apply validation rules to existing and dynamically added input fields
                $('input[name$="[medicine_name]"]').each(function() {
                    $(this).rules("add", {
                        required: true,
                        messages: {
                            required: "Name is mandatory"
                        }
                    });
                });

                $('input[name$="[quantity]"]').each(function() {
                    $(this).rules("add", {
                        required: true,
                        number: true,
                        messages: {
                            required: "Quantity is mandatory",
                            number: "Please enter a valid number"
                        }
                    });
                });
            }

            // Function to generate and append HTML for new medicine fields
            function generate_medicine_html() {
                var html = `
        <div class="panel panel-body">
            <div class="row m-0 p-0">
                <div class="mb-3 col-6 col-sm-4">
                    <p class="mb-2">Medicine Name *</p>
                    <div><input type="text" name="medicine_detail[${counter}][medicine_name]" class="form-control"></div>
                </div>
                <div class="mb-3 col-4 col-sm-3">
                    <p class="mb-2">Quantity *</p>
                    <div><input type="number" name="medicine_detail[${counter}][quantity]" class="form-control"  min="1" max="5"></div>
                </div>
                <div class="mb-3 col-2 col-sm-2">
                    <div class="customecheckbox">
                        <div class="d-flex align-items-center">
                            <input type="checkbox" value="Morning" name="medicine_detail[${counter}][frequency][]">
                            <span> &nbsp; Morning</span>
                           </div>
                           <div class="d-flex align-items-center">
                            <input type="checkbox" value="Evening" name="medicine_detail[${counter}][frequency][]">
                            <span> &nbsp; Evening</span>
                           </div>
                           <div class="d-flex align-items-center">
                            <input type="checkbox" value="Night" name="medicine_detail[${counter}][frequency][]">
                            <span> &nbsp; Night</span>
                           </div>

                    </div>
                </div>
                <div class="mb-3 col-4 col-sm-3">
                    <p class="mb-2">Meal Status *</p>
                    <div class="custom-radio float-left">
                        <input type="radio" value="1" name="medicine_detail[${counter}][meal_status]"> Yes
                        <input type="radio" value="0" name="medicine_detail[${counter}][meal_status]" checked> No
                    </div>
                    <a class="btn btn-danger btn-xs ml-10px float-right" onclick="remove_html(this)">
                        <i class="fa fa-minus" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
        `;
                $('#medicine_more_html').append(html);
                counter += 1;

                // Reapply validation after adding new fields
                validatefunction();
            }
            validatefunction();
            // Attach event handler to a button for adding new medicine fields
            $('#addMedicine').click(generate_medicine_html);
        });
        // Function to remove HTML block
        function remove_html(this_ele) {
            $(this_ele).closest('.panel').remove();
        }
    </script>
@endsection
