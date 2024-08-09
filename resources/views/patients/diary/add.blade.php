@extends('layouts.patient.main')
@section('content')
    <div class="dashboard-header">
        <h3>Add Diary</h3>
    </div>
    <div class="card">
        <div class="col-sm-12">
            <h4 class="titletex">Daily Health Record</h4>
        </div>
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
            @php
                $reason_morning_Breakfast = '';
                $reason_afternoon_lunch = '';
                $reason_night_dinner = '';
                $reason_morning_medicine = '';
                $reason_afternoon_medicine = '';
                $reason_night_medicine = '';
                if (isset($diaryDetails->patientAdditionalInfo) && count($diaryDetails->patientAdditionalInfo) > 0) {
                    foreach ($diaryDetails->patientAdditionalInfo as $value) {
                        if ($value->type == 'morning_breakfast') {
                            $reason_morning_Breakfast = $value->additional_note;
                        }
                        if ($value->type == 'afternoon_lunch') {
                            $reason_afternoon_lunch = $value->additional_note;
                        }
                        if ($value->type == 'night_dinner') {
                            $reason_night_dinner = $value->additional_note;
                        }
                        if ($value->type == 'morning_medicine') {
                            $reason_morning_medicine = $value->additional_note;
                        }
                        if ($value->type == 'afternoon_medicine') {
                            $reason_afternoon_medicine = $value->additional_note;
                        }
                        if ($value->type == 'night_medicine') {
                            $reason_night_medicine = $value->additional_note;
                        }
                    }
                }
            @endphp
            <form method="post" id="diary_form" action="{{ route('patient.diary.create') }}">
                @csrf
                <input type="hidden" name="id" value="{{ $diaryDetails->id ?? '' }}">
                <div class="row">
                    <div class="mb-3 col-6 col-sm-4">
                        <p class="mb-2">Morning Breakfast *</p>
                        <div class="custom-radio">
                            <input type="radio" value="1" name="morning_breakfast" checked
                                {{ ($diaryDetails->morning_breakfast ?? old('morning_breakfast')) == '1' ? 'checked' : '' }}>Yes
                            <input type="radio" value="0" name="morning_breakfast" id="no_morning_breakfast"
                                {{ ($diaryDetails->morning_breakfast ?? old('morning_breakfast')) == '0' ? 'checked' : '' }}>No
                        </div>
                        @error('morning_breakfast')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-6 col-sm-4">
                        <p class="mb-2">Afternoon Lunch *</p>
                        <div class="custom-radio">
                            <input type="radio" value="1" name="afternoon_lunch" checked
                                {{ ($diaryDetails->afternoon_lunch ?? old('afternoon_lunch')) == '1' ? 'checked' : '' }}>Yes
                            <input type="radio" value="0" name="afternoon_lunch" id="no_afternoon_lunch"
                                {{ ($diaryDetails->afternoon_lunch ?? old('afternoon_lunch')) == '0' ? 'checked' : '' }}>No
                        </div>
                        @error('afternoon_lunch')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-6 col-sm-4">
                        <p class="mb-2">Night Dinner *</p>
                        <div class="custom-radio">
                            <input type="radio" value="1" name="night_dinner" checked
                                {{ ($diaryDetails->night_dinner ?? old('night_dinner')) == '1' ? 'checked' : '' }}>Yes
                            <input type="radio" value="0" name="night_dinner" id="no_night_dinner"
                                {{ ($diaryDetails->night_dinner ?? old('night_dinner')) == '0' ? 'checked' : '' }}>No
                        </div>
                        @error('night_dinner')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-6 col-sm-4">
                        <p class="mb-2">Morning Medicine *</p>
                        <div class="custom-radio">
                            <input type="radio" value="1" name="morning_medicine" checked
                                {{ ($diaryDetails->morning_medicine ?? old('morning_medicine')) == '1' ? 'checked' : '' }}>Yes
                            <input type="radio" value="0" name="morning_medicine" id="no_morning_medicine"
                                {{ ($diaryDetails->morning_medicine ?? old('morning_medicine')) == '0' ? 'checked' : '' }}>No
                        </div>
                        @error('morning_medicine')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-6 col-sm-4">
                        <p class="mb-2">Afternoon Medicine *</p>
                        <div class="custom-radio">
                            <input type="radio" value="1" name="afternoon_medicine" checked
                                {{ ($diaryDetails->afternoon_medicine ?? old('afternoon_medicine')) == '1' ? 'checked' : '' }}>Yes
                            <input type="radio" value="0" name="afternoon_medicine" id="no_afternoon_medicine"
                                {{ ($diaryDetails->afternoon_medicine ?? old('afternoon_medicine')) == '0' ? 'checked' : '' }}>No
                        </div>
                        @error('afternoon_medicine')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-6 col-sm-4">
                        <p class="mb-2">Night Medicine *</p>
                        <div class="custom-radio">
                            <input type="radio" value="1" name="night_medicine" checked
                                {{ ($diaryDetails->night_medicine ?? old('night_medicine')) == '1' ? 'checked' : '' }}>Yes
                            <input type="radio" value="0" name="night_medicine" id="no_night_medicine"
                                {{ ($diaryDetails->night_medicine ?? old('night_medicine')) == '0' ? 'checked' : '' }}>No
                        </div>
                        @error('night_medicine')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-6 col-sm-4" style="display: none" id="reason_morning_breakfast">
                        <p class="mb-2">Reason for Skipping Morning Breakfast *</p>
                        <div>
                            <input type="text" name="reason_morning_breakfast" class="form-control"
                                value="{{ $reason_morning_Breakfast ?? old('reason_morning_breakfast') }}">
                        </div>
                        @error('reason_morning_breakfast')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-6 col-sm-4" style="display: none" id="reason_afternoon_lunch">
                        <p class="mb-2">Reason for Skipping Afternoon Lunch *</p>
                        <div>
                            <input type="text" name="reason_afternoon_lunch" class="form-control"
                                value="{{ $reason_afternoon_lunch ?? old('reason_afternoon_lunch') }}">
                        </div>
                        @error('reason_afternoon_lunch')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-6 col-sm-4" style="display: none" id="reason_night_dinner">
                        <p class="mb-2">Reason for Skipping Night Dinner *</p>
                        <div>
                            <input type="text" name="reason_night_dinner" class="form-control"
                                value="{{ $reason_night_dinner ?? old('reason_night_dinner') }}">
                        </div>
                        @error('reason_night_dinner')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-6 col-sm-4" style="display: none" id="reason_morning_medicine">
                        <p class="mb-2">Reason for Skipping Morning Medicine *</p>
                        <div>
                            <input type="text" name="reason_morning_medicine" class="form-control"
                                value="{{ $reason_morning_medicine ?? old('reason_morning_medicine') }}">
                        </div>
                        @error('reason_morning_medicine')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-6 col-sm-4" style="display: none" id="reason_afternoon_medicine">
                        <p class="mb-2">Reason for Skipping Afternoon Medicine *</p>
                        <div>
                            <input type="text" name="reason_afternoon_medicine" class="form-control"
                                value="{{ $reason_afternoon_medicine ?? old('reason_afternoon_medicine') }}">
                        </div>
                        @error('reason_afternoon_medicine')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-6 col-sm-4" style="display: none" id="reason_night_medicine">
                        <p class="mb-2">Reason for Skipping Night Medicine *</p>
                        <div>
                            <input type="text" name="reason_night_medicine" class="form-control"
                                value="{{ $reason_night_medicine ?? old('reason_night_medicine') }}">
                        </div>
                        @error('reason_night_medicine')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-6 col-sm-4">
                        <label class="mb-2">Total Sleep (In Hour) *</label>
                        <div>
                            <input type="text" name="total_sleep_hr" class="form-control"
                                value="{{ $diaryDetails->total_sleep_hr ?? old('total_sleep_hr') }}">
                        </div>
                        @error('total_sleep_hr')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-6 col-sm-4">
                        <label class="mb-2">Oxygen Level</label>
                        <input type="text" name="oxygen_level" class="form-control"
                            value="{{ $diaryDetails->oxygen_level ?? old('oxygen_level') }}">
                        @error('oxygen_level')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-6 col-sm-4">
                        <label class="mb-2">Weight</label>
                        <input type="text" name="weight" class="form-control"
                            value="{{ $diaryDetails->weight ?? old('weight') }}">
                        @error('weight')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-6 col-sm-4">
                        <label class="mb-2">Glucose</label>
                        <input type="text" name="glucose" class="form-control"
                            value="{{ $diaryDetails->glucose ?? old('glucose') }}">
                        @error('glucose')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3 col-6 col-sm-4">
                        <label class="mb-2">Pulse Rate</label>
                        <input type="text" name="pulse_rate" class="form-control"
                            value="{{ $diaryDetails->pulse_rate ?? old('pulse_rate') }}">
                        @error('pulse_rate')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-6 col-sm-4">
                        <label class="mb-2">BP</label>
                        <input type="text" name="bp" class="form-control"
                            value="{{ $diaryDetails->bp ?? old('bp') }}">
                        @error('bp')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-6 col-sm-4">
                        <label class="mb-2">Avg Boby Temp</label>
                        <input type="text" name="avg_body_temp" class="form-control"
                            value="{{ $diaryDetails->avg_body_temp ?? old('avg_body_temp') }}">
                        @error('avg_body_temp')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-6 col-sm-4">
                        <label class="mb-2">Avg Heart Beat</label>
                        <input type="text" name="avg_heart_beat" class="form-control"
                            value="{{ $diaryDetails->avg_heart_beat ?? old('avg_heart_beat') }}">
                        @error('avg_heart_beat')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 col-6 col-sm-12">
                    <label class="mb-2">Note *</label>
                    <div>
                        <textarea name="note" class="form-control" cols="30" rows="5">{{ $diaryDetails->note ?? old('reason_morning_breakfast') }}</textarea>
                    </div>
                    @error('note')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
        </div>
    </div>
    <div class="card">
        <div class="col-sm-12">
            <h4 class="titletex">Medication Health Progress</h4>
        </div>
        <div class="card-body">
            <div class="mb-3 col-6 col-sm-12">
                <p class="mb-2">How you are feeling during Medication ?*
                <div class="custom-radio">
                    <input type="radio" value="Feeling Good" name="health_progress"
                        {{ ($diaryDetails->medicationHealthProgress->health_progress ?? old('health_progress')) == 'Feeling Good' ? 'checked' : '' }}>Feeling
                    Good
                    <input type="radio" value="Feeling Better" name="health_progress"
                        {{ ($diaryDetails->medicationHealthProgress->health_progress ?? old('health_progress')) == 'Feeling Better' ? 'checked' : '' }}>Feeling
                    better
                    <input type="radio" value="Not Good" name="health_progress"
                        {{ ($diaryDetails->medicationHealthProgress->health_progress ?? old('health_progress')) == 'Not Good' ? 'checked' : '' }}>Not
                    Good
                    <input type="radio" value="No Changes At All" name="health_progress"
                        {{ ($diaryDetails->medicationHealthProgress->health_progress ?? old('health_progress')) == 'No Changes At All' ? 'checked' : '' }}>No
                    Changes At All
                </div>
                </p>
                @error('health_progress')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="row">
                <div class="mb-3 col-6 col-sm-6">
                    <p class="mb-2">Any Side Effect you noticed while during Medication ?
                    <div>
                        <textarea name="side_effect" class="form-control" cols="30">{{ $diaryDetails->medicationHealthProgress->side_effect ?? old('side_effect') }}</textarea>
                    </div>
                    </p>
                    @error('side_effect')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 col-6 col-sm-6">
                    <p class="mb-2">Any Improvement you noticed while during Medication ?
                    <div>
                        <textarea name="improvement" class="form-control" cols="30">{{ $diaryDetails->medicationHealthProgress->improvement ?? old('improvement') }}</textarea>
                    </div>
                    </p>
                    @error('improvement')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
    </div>

    <div class="mb-3 col-6 col-sm-6">
        <button type="submit" class="btn btn-primary text-white">Submit</button>
    </div>
    </form>
    </div>
    <script>
        $(document).ready(function() {
            show_additional_input('morning_breakfast', 'reason_morning_breakfast');
            show_additional_input('afternoon_lunch', 'reason_afternoon_lunch');
            show_additional_input('night_dinner', 'reason_night_dinner');
            show_additional_input('morning_medicine', 'reason_morning_medicine');
            show_additional_input('afternoon_medicine', 'reason_afternoon_medicine');
            show_additional_input('night_medicine', 'reason_night_medicine');
        });
        $('input[name="morning_breakfast"]').on("click", function() {
            show_additional_input('morning_breakfast', 'reason_morning_breakfast');
        });
        $('input[name="afternoon_lunch"]').on("click", function() {
            show_additional_input('afternoon_lunch', 'reason_afternoon_lunch');
        });
        $('input[name="night_dinner"]').on("click", function() {
            show_additional_input('night_dinner', 'reason_night_dinner');
        });
        $('input[name="morning_medicine"]').on("click", function() {
            show_additional_input('morning_medicine', 'reason_morning_medicine');
        });
        $('input[name="afternoon_medicine"]').on("click", function() {
            show_additional_input('afternoon_medicine', 'reason_afternoon_medicine');
        });
        $('input[name="night_medicine"]').on("click", function() {
            show_additional_input('night_medicine', 'reason_night_medicine');
        });

        function show_additional_input(name, div_id) {
            var checkedValue = $('input[name="' + name + '"]:checked').val();
            if (checkedValue == 0) {
                $("#" + div_id).show();
            } else {
                $("#" + div_id).hide();
            }
        };
        $(document).ready(function() {
            jQuery("#diary_form").validate({
                errorPlacement: function($error, $element) {
                    $error.appendTo($element.closest("div"));
                },
                // errorLabelContainer: '#error_morning_breakfast',
                rules: {
                    morning_breakfast: "required",
                    afternoon_lunch: "required",
                    night_dinner: "required",
                    morning_medicine: "required",
                    afternoon_medicine: "required",
                    night_medicine: "required",
                    total_sleep_hr: "required",
                    note: "required",
                    health_progress: "required",
                    reason_morning_breakfast: {
                        required: function(element) {
                            return $("input[id='no_morning_breakfast']").is(':checked');
                        }
                    },
                    reason_afternoon_lunch: {
                        required: function(element) {
                            return $("input[id='no_afternoon_lunch']").is(':checked');
                        }
                    },
                    reason_night_dinner: {
                        required: function(element) {
                            return $("input[id='no_night_dinner']").is(':checked');
                        }
                    },
                    reason_morning_medicine: {
                        required: function(element) {
                            return $("input[id='no_morning_medicine']").is(':checked');
                        }
                    },
                    reason_afternoon_medicine: {
                        required: function(element) {
                            return $("input[id='no_afternoon_medicine']").is(':checked');
                        }
                    },
                    reason_night_medicine: {
                        required: function(element) {
                            return $("input[id='no_night_medicine']").is(':checked');
                        }
                    }
                },
                messages: {
                    morning_breakfast: "Please Select the Morning breakfast!",
                    afternoon_lunch: "Please Select the Afternoon Lunch",
                    night_dinner: "Please Select the Night Dinner",
                    morning_medicine: "Please Select the Morning Medicine",
                    afternoon_medicine: "Please Select the Afternoon Medicine",
                    night_medicine: "Please Select the Night Medicine",
                    reason_morning_breakfast: "Please enter the reason for Skipping Morning Breakfast",
                    reason_afternoon_lunch: "Please enter the reason for Skipping Afternoon Lunch",
                    reason_night_dinner: "Please enter the reason for Skipping Night Dinner",
                    reason_morning_medicine: "Please enter the reason for Skipping Morning Medicine",
                    reason_afternoon_medicine: "Please enter the reason for Skipping Afternoon Medicine",
                    reason_night_medicine: "Please enter the reason for Skipping Night Medicine",
                    total_sleep_hr: "Please Enter the Sleeping Hours",
                    note: "Please Enter some Description",
                    health_progress: "Please Select the Healh Progress"
                },
            });
        });
    </script>
@endsection
