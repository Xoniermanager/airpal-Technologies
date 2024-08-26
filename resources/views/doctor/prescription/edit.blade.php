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
                    <div class="mb-3 col-6 col-sm-6">
                        <p class="mb-2">Booking</p>
                        <div>
                            <select name="booking_slot_id" class="form-control" id="booking_slot_id">
                                <option value="">Please Select the Booking</option>
                                @foreach ($allBookingDetails as $bookingDetail)
                                    <option value="{{ $bookingDetail->id }}"
                                        {{ $prescriptionDetails->booking_slot_id == $bookingDetail->id ? 'selected' : '' }}>
                                        {{ $bookingDetail->booking_date }} &
                                        {{ date('h:i A', strtotime($bookingDetail->slot_start_time)) }} -
                                        {{ date('h:i A', strtotime($bookingDetail->slot_end_time)) }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('patient_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-6 col-sm-6">
                        <p class="mb-2">Start Date *</p>
                        <div>
                            <input type="date" name="start_date" class="form-control"
                                value="{{ $prescriptionDetails->start_date }}">
                        </div>
                        @error('start_date')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-6 col-sm-6">
                        <p class="mb-2">End Date *</p>
                        <div>
                            <input type="date" name="end_date" class="form-control"
                                value="{{ $prescriptionDetails->end_date }}">
                        </div>
                        @error('end_date')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-6 col-sm-6">
                        <p class="mb-2">Description </p>
                        <div>
                            <textarea name="description" class="form-control" value="">{{ $prescriptionDetails->description }}</textarea>
                        </div>
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    @php
                        $i = 0;
                    @endphp
                    @foreach ($prescriptionDetails->prescriptionMedicineDetail as $medicineDetails)
                        <div class="panel panel-body">
                            <div class="row m-0 p-0">
                                <div class="mb-3 col-6 col-sm-4">
                                    <p class="mb-2">Medicine Name *</p>
                                    <div>
                                        <input type="text" name="medicine_detail[{{ $i }}][medicine_name]"
                                            class="form-control" value="{{ $medicineDetails->medicine_name }}">
                                    </div>
                                    @error('medicine_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-6 col-sm-3">
                                    <p class="mb-2">Quantity *</p>
                                    <div>
                                        <input type="number" name="medicine_detail[{{ $i }}][quantity]"
                                            class="form-control" value="{{ $medicineDetails->quantity }}" min="1"
                                            max="5">
                                    </div>
                                    @error('quantity')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                @php
                                    $frequencyDetails = explode(',', $medicineDetails->frequency);
                                @endphp
                                <div class="mb-3 col-6 col-sm-2">
                                    <div class="customecheckbox">
                                        <div class="d-flex align-items-center">
                                            <input type="checkbox" value="Morning"
                                                name="medicine_detail[{{ $i }}][frequency][]"
                                                {{ in_array('Morning', $frequencyDetails) ? 'checked' : '' }}>
                                            <span> &nbsp; Morning</span>
                                        </div>
                                        <div class=" d-flex align-items-center">
                                            <input type="checkbox" value="Evening"
                                                name="medicine_detail[{{ $i }}][frequency][]"
                                                {{ in_array('Evening', $frequencyDetails) ? 'checked' : '' }}>
                                            <span> &nbsp; Evening</span>
                                        </div>

                                        <div class="ml10px d-flex align-items-center">
                                            <input type="checkbox" value="Night"
                                                name="medicine_detail[{{ $i }}][frequency][]"
                                                {{ in_array('Night', $frequencyDetails) ? 'checked' : '' }}>
                                            <span> &nbsp; Night</span>

                                        </div>
                                    </div>


                                </div>
                                <div class="mb-3 col-6 col-sm-3">
                                    <p class="mb-2">Meal Status *</p>
                                    <div class="custom-radio float-left">
                                        <input type="radio" value="1"
                                            name="medicine_detail[{{ $i }}][meal_status]"
                                            {{ $medicineDetails->meal_status == '1' ? 'checked' : '' }}>Yes
                                        <input type="radio" value="0"
                                            name="medicine_detail[{{ $i }}][meal_status]"
                                            {{ $medicineDetails->meal_status == '0' ? 'checked' : '' }}>No
                                    </div>
                                    <a class="btn-xs btn btn-danger ml-10px float-right"
                                        onclick="remove_html(this,{{ $medicineDetails->id }})"><i class="fa fa-minus"
                                            aria-hidden="true"></i></a>
                                    @error('meal_status')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror

                                </div>
                            </div>
                        </div>

                        @php
                            $i++;
                        @endphp
                    @endforeach
                    <p id="medicine_more_html" class="row m-0 p-0"> </p>
                    <div class="col-md-12">
                        <a class="float-right btn-xs btn btn-primary mb-3" id="addMedicine"><i class="fa fa-plus"
                                aria-hidden="true"></i> Add More</a>
                    </div>

                </div>
                <button type="submit" class="btn btn-primary text-white"> Submit</button>
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            var counter = {{ $i + 1 }};
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

            function generate_medicine_html() {
                var html = '';
                html =
                    ` <div class="panel panel-body">
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
        </div>`;
                $('#medicine_more_html').append(html);
                counter += 1
                validatefunction();
            }
            validatefunction();
            // Attach event handler to a button for adding new medicine fields
            $('#addMedicine').click(generate_medicine_html);
        });

        function remove_html(this_ele, medicine_detail_id) {
            if (medicine_detail_id != null) {
                event.preventDefault();
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "/doctor/prescription/delete/medicine-details/" + medicine_detail_id,
                            type: "get",
                            success: function(res) {
                                if (res.status == true) {
                                    jQuery(this_ele).parent().parent().remove();
                                    Swal.fire("Done!", "It was succesfully deleted!", "success");
                                } else {
                                    Swal.fire("Error deleting!", "Please try again", "error");
                                }
                            },
                            error: function(xhr, ajaxOptions, thrownError) {
                                Swal.fire("Error deleting!", "Please try again", "error");
                            }
                        });
                    }
                });
            } else {
                jQuery(this_ele).parent().parent().parent().remove();
            }
        }
    </script>
@endsection
