<div id="filter_list">
    <ul class="nav nav-tabs progresstabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="record-tab" data-bs-toggle="tab" data-bs-target="#record" type="button"
                role="tab" aria-controls="record" aria-selected="true">Daily Health
                Record
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="progress-tab" data-bs-toggle="tab" data-bs-target="#progress" type="button"
                role="tab" aria-controls="progress" aria-selected="false">Medication
                Health
                Progress
            </button>
        </li>
    </ul>
    @if (isset($diaryDetails) && !empty($diaryDetails))
        <div class="tab-content card pt-0" id="myTabContent">
            <div class="tab-pane fade show active" id="record" role="tabpanel" aria-labelledby="record-tab">

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="mb-4">
                                <span class="btn btn-dark btn-lg border-radius-30px">Date:
                                    {{ date('d-m-Y', strtotime($diaryDetails->created_at)) }}</span>
                                <p class="bgborder"></p>
                            </div>
                        </div>
                        @php
                            $morningBreakfastClass = 'float-right fa fa-times-circle text-danger fs-4';
                            $afterLunchClass = 'float-right fa fa-times-circle text-danger fs-4';
                            $nightDinnerClass = 'float-right fa fa-times-circle text-danger fs-4';
                            $morningMedicineClass = 'float-right fa fa-times-circle text-danger fs-4';
                            $afternoonMedicineClass = 'float-right fa fa-times-circle text-danger fs-4';
                            $nightMedicineClass = 'float-right fa fa-times-circle text-danger fs-4';
                            if ($diaryDetails->morning_breakfast == 1) {
                                $morningBreakfastClass = 'float-right fa fa-check-circle text-success fs-4';
                            }
                            if ($diaryDetails->afternoon_lunch == 1) {
                                $afterLunchClass = 'float-right fa fa-check-circle text-success fs-4';
                            }
                            if ($diaryDetails->night_dinner == 1) {
                                $nightDinnerClass = 'float-right fa fa-check-circle text-success fs-4';
                            }
                            if ($diaryDetails->morning_medicine == 1) {
                                $morningMedicineClass = 'float-right fa fa-check-circle text-success fs-4';
                            }
                            if ($diaryDetails->afternoon_medicine == 1) {
                                $afternoonMedicineClass = 'float-right fa fa-check-circle text-success fs-4';
                            }
                            if ($diaryDetails->night_medicine == 1) {
                                $nightMedicineClass = 'float-right fa fa-check-circle text-success fs-4';
                            }
                        @endphp
                        <div class="col-md-4">
                            <div class="diarybox">
                                <h4>Morning</h4>
                                <p class="">Breakfast <i class="{{ $morningBreakfastClass }}"></i>
                                </p>
                                <p class="">Medicine <i class="{{ $morningMedicineClass }}"></i>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="diarybox">
                                <h4>Afternoon </h4>
                                <p class="">Lunch <i class="{{ $afterLunchClass }}"></i>
                                </p>
                                <p class="">Medicine <i class="{{ $afternoonMedicineClass }}"></i>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="diarybox">
                                <h4>Night </h4>
                                <p class="">Dinner <i class="{{ $nightDinnerClass }}"></i>
                                </p>
                                <p class="">Medicine <i class="{{ $nightMedicineClass }}"></i>
                                </p>
                            </div>
                        </div>
                        <!------------>
                        <div class="col-md-4">
                            <div class="diarybox-lil">
                                <div class="icon">
                                    <i class="fa fa-bed"></i>
                                </div>
                                <div>
                                    <h4>Total Sleep </h4>
                                    <p>{{ $diaryDetails->total_sleep_hr }} Hours </p>
                                </div>

                            </div>
                        </div>
                        <!------------>
                        <div class="col-md-4">
                            <div class="diarybox-lil">
                                <div class="icon">
                                    <i class="fa fa-mask"></i>
                                </div>
                                <div>
                                    <h4>Oxygen Level </h4>
                                    <p>{{ $diaryDetails->oxygen_level }}</p>
                                </div>

                            </div>
                        </div>
                        <!------------>
                        <div class="col-md-4">
                            <div class="diarybox-lil">
                                <div class="icon">
                                    <i class="fa fa-weight"></i>
                                </div>
                                <div>
                                    <h4>Weight </h4>
                                    <p>{{ $diaryDetails->weight }} Kg </p>
                                </div>
                            </div>
                        </div>
                        <!------------>
                        <div class="col-md-4">
                            <div class="diarybox-lil">
                                <div class="icon">
                                    <i class="fa fa-droplet"></i>
                                </div>
                                <div>
                                    <h4>Glucose </h4>
                                    <p>{{ $diaryDetails->glucose }}</p>
                                </div>

                            </div>
                        </div>
                        <!------------>
                        <div class="col-md-4">
                            <div class="diarybox-lil">
                                <div class="icon">
                                    <img src="{{ asset('assets/img/heartbeat.png') }}" class="h-50px">
                                </div>
                                <div>
                                    <h4>Pulse Rate </h4>
                                    <p>{{ $diaryDetails->pulse_rate }}</p>
                                </div>

                            </div>
                        </div>
                        <!------------>
                        <div class="col-md-4">
                            <div class="diarybox-lil">
                                <div class="icon">
                                    <i class="fa fa-droplet"></i>
                                </div>
                                <div>
                                    <h4>BP </h4>
                                    <p> {{ $diaryDetails->bp }}</p>
                                </div>

                            </div>
                        </div>
                        <!------------>
                        <div class="col-md-4">
                            <div class="diarybox-lil">
                                <div class="icon">
                                    <i class="fa fa-thermometer"></i>
                                </div>
                                <div>
                                    <h4>Avg Boby Temp </h4>
                                    <p>{{ $diaryDetails->avg_body_temp }}</p>
                                </div>

                            </div>
                        </div>
                        <!------------>
                        <div class="col-md-4">
                            <div class="diarybox-lil">
                                <div class="icon">
                                    <i class="fa fa-heart-pulse"></i>
                                </div>
                                <div>
                                    <h4>Avg Heart Beat </h4>
                                    <p>{{ $diaryDetails->avg_heart_beat }}</p>
                                </div>

                            </div>
                        </div>
                        <!------------>
                        <div class="col-md-12">
                            <div class="diarybox mb-2">
                                <h4>Notes:</h4>
                                <p class="">{{ $diaryDetails->note }}</p>
                            </div>
                        </div>
                        <!------------>
                        @foreach ($diaryDetails->patientAdditionalInfo as $additionalInfo)
                            @if ($additionalInfo->type == 'morning_breakfast')
                                <div class="col-md-12">
                                    <div class="diarybox mb-2">
                                        <h4>Reason For Skipping Morning BreakFast ?</h4>
                                        <p class="">{{ $additionalInfo->additional_note }}</p>
                                    </div>
                                </div>
                            @endif
                            @if ($additionalInfo->type == 'afternoon_lunch')
                                <div class="col-md-12">
                                    <div class="diarybox mb-2">
                                        <h4>Reason For Skipping Afternnon Lunch ?</h4>
                                        <p class="">{{ $additionalInfo->additional_note }}</p>
                                    </div>
                                </div>
                            @endif
                            @if ($additionalInfo->type == 'night_dinner')
                                <div class="col-md-12">
                                    <div class="diarybox mb-2">
                                        <h4>Reason For Skipping Night Dinner ?</h4>
                                        <p class="">{{ $additionalInfo->additional_note }}</p>
                                    </div>
                                </div>
                            @endif
                            @if ($additionalInfo->type == 'morning_medicine')
                                <div class="col-md-12">
                                    <div class="diarybox mb-2">
                                        <h4>Reason For Skipping Morning Medicine ?</h4>
                                        <p class="">{{ $additionalInfo->additional_note }}</p>
                                    </div>
                                </div>
                            @endif
                            @if ($additionalInfo->type == 'afternoon_medicine')
                                <div class="col-md-12">
                                    <div class="diarybox mb-2">
                                        <h4>Reason For Skipping Afternoon Medicine ?</h4>
                                        <p class="">{{ $additionalInfo->additional_note }}</p>
                                    </div>
                                </div>
                            @endif
                            @if ($additionalInfo->type == 'night_medicine')
                                <div class="col-md-12">
                                    <div class="diarybox mb-2">
                                        <h4>Reason For Skipping Night Medicine ?</h4>
                                        <p class="">{{ $additionalInfo->additional_note }}</p>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="progress" role="tabpanel" aria-labelledby="progress-tab">
                <div class="">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <div class="mb-4">
                                    <span class="btn btn-dark btn-lg border-radius-30px">Date:
                                        {{ date('d-m-Y', strtotime($diaryDetails->created_at)) }}</span>
                                    <p class="bgborder"></p>
                                </div>
                            </div>
                            <div class="col-6 col-sm-12">
                                <div class="diarybox mb-2">
                                    <h4>How you are feeling during Medication ?</h4>
                                    <p class="">{{ $diaryDetails->medicationHealthProgress->health_progress }}<i
                                            class="float-right fa fa-check-circle text-success"></i>
                                    </p>
                                </div>
                            </div>
                            <div class="col-6 col-sm-12">
                                <div class="diarybox mb-2">
                                    <h4>Any Side Effect you noticed while during Medication
                                        ?</h4>
                                    <p class="">{{ $diaryDetails->medicationHealthProgress->side_effect }}</p>
                                </div>
                            </div>
                            <div class="col-6 col-sm-12">
                                <div class="diarybox mb-2">
                                    <h4>Any Improvement you noticed while during Medication
                                        ?</h4>
                                    <p class="">{{ $diaryDetails->medicationHealthProgress->improvement }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="tab-content card pt-0" id="myTabContent">
            <div class="tab-pane fade show active" id="record" role="tabpanel" aria-labelledby="record-tab">
                <img src="{{ asset('assets/img/12.png') }}" class="img-fluid rounded">

            </div>
            <div class="tab-pane fade" id="progress" role="tabpanel" aria-labelledby="progress-tab">
                <img src="{{ asset('assets/img/12.png') }}" class="img-fluid rounded">

            </div>
        </div>
    @endif

</div>
