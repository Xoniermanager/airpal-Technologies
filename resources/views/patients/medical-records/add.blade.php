@extends('layouts.patient.main')
@section('content')
    <div class="dashboard-header">
        <h3>Add Medical Record</h3>
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
            <form method="post" id="medical_record_form" action="{{ route('patient.medical-records.create') }}"
                enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="mb-3 col-6 col-sm-6">
                        <p class="mb-2">Name *</p>
                        <div>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                        </div>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-6 col-sm-6">
                        <p class="mb-2">Date *</p>
                        <div>
                            <input type="date" name="date" class="form-control" value="{{ old('date') }}">
                        </div>
                        @error('date')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-6 col-sm-6">
                        <p class="mb-2">Description *</p>
                        <div>
                            <textarea name="description" class="form-control" value="">{{ old('description') }}</textarea>
                        </div>
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-6 col-sm-6">
                        <p class="mb-2">File</p>
                        <div>
                            <input type="file" name="file" class="form-control" value="{{ old('file') }}">
                        </div>
                        @error('file')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-6 col-sm-6">
                        <p class="mb-2">Booking</p>
                        <div>
                            <select name="booking_slot_id" class="form-control" id="booking_slot_id">
                                <option value="">Please Select the Booking</option>
                                @foreach ($allBookingDetails as $bookingDetail)
                                    <option value="{{ $bookingDetail->id }}"
                                        {{ old('booking_slot_id') == $bookingDetail->id ? 'selected' : '' }}>
                                        {{ $bookingDetail->booking_date }} &
                                        {{ date('h:i A', strtotime($bookingDetail->slot_start_time)) }} -
                                        {{ date('h:i A', strtotime($bookingDetail->slot_end_time)) }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('booking_slot_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-6 col-sm-6">
                        <div id="booking_div">

                        </div>

                    </div>
                </div>
                <button type="submit" class="btn btn-primary text-white"> Submit</button>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            jQuery("#medical_record_form").validate({
                rules: {
                    name: "required",
                    date: "required",
                    description: "required",
                },
                messages: {
                    name: "Please Enter the name of Test!",
                    date: "Please Select the Date",
                    description: "Please Enter the Description",
                },
            });
        });

        $('#booking_slot_id').on('change', function() {
            var booking_id = this.value;
            $('#booking_div').html('');
            $.ajax({
                url: '/patients/get-booking-details/' + booking_id,
                type: "get",
                success: function(res) {
                    $('#booking_div').html(res);
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    Swal.fire("Error deleting!", "Please try again", "error");
                }
            });
        });
    </script>
@endsection
