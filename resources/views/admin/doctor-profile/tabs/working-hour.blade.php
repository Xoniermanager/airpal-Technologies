<div class="tab-pane fade" id="working_hours_tab">
    <div class="dashboard-header border-0 mb-0">
        <h3>Business Hours</h3>
    </div>
    @php
        $oldDay = [];
        $dayId = [];

        if (isset($userWorkingHourDetails) && !empty($userWorkingHourDetails)) {
            $workingHour = $userWorkingHourDetails->toArray();
            $oldDay = [];
            $oldDayId = [];
            foreach ($workingHour as $workingHour) {
                $oldDay[] = $workingHour['days_of_week']['name'];
                $dayId[] = $workingHour['day_id'];
            }
        }
         //dd('workingids',$workingHour['start_time']);
        // $daydetails = $userWorkingHourDetails->toArray();
    @endphp
    
    <form id="doctorWorkingHourFormData" method="post" enctype="multipart/form-data">
        @csrf
        <div class="business-wrap">
            <h4>Select Business days</h4>
            <ul class="business-nav">
                @foreach ($dayOfWeeks as $key => $day)
                    <li>
                        <a day-id='day-{{ strtolower($day->name) }}'
                            id='tab-{{ strtolower($day->name) }}'class="tab-link {{ (array_search($day->name, $oldDay) === false) ? (isset($oldDay) ? '' : 'active') ?? 'active' : 'active' }}"
                            data-tab="day-{{ strtolower($day->name) }}">{{ $day->name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="accordions business-info" id="list-accord">
            @foreach ($dayOfWeeks as $key => $day)
                <div class="user-accordion-item tab-items active" id="day-{{ strtolower($day->name) }}">
                    <a href="#" class="accordion-wrap" data-bs-toggle="collapse"
                        data-bs-target="#{{ strtolower($day->name) }}">{{ $day->name }} <span
                            class="edit">Edit</span></a>
                    <div class="accordion-collapse collapse show" id="{{ strtolower($day->name) }}" data-bs-parent="">
                        <div class="content-collapse pb-0">
                            <div class="row">
                                <div class="col-md-1">
                                    <label for="" class="col-form-label">Available</label>
                                    @php
                                            if($dayId)
                                                { $checked  = array_search($day->id, $dayId) === false ? isset($dayId) ? '' : 'checked' ?? 'checked' : 'checked' ;
                                            }else {
                                                $checked  = array_search($day->id, $dayId) === false ? isset($dayId) ? 'checked' : '' ?? 'checked' : 'checked' ;
                                            }
                                    @endphp
                                    <input
                                        onchange='unavailable_for_the_day("checkbox-{{ strtolower($day->name) }}","{{ strtolower($day->name) }}")'
                                        type="checkbox" id="checkbox-{{ strtolower($day->name) }}"
                                        name="day[{{ $day->id }}][available]" value="1" {{$checked}} >
                                </div>
                                <div class="col-md-5">
                                    <div class="form-wrap">
                                        <label class="col-form-label">From 
                                            @php 
                                            $userWorkingHour = collect($userWorkingHourDetails)->firstWhere('day_id', $day->id);  
                                            $startTime = ($userWorkingHour) ? \Carbon\Carbon::parse($userWorkingHour['start_time'])->format('H:i') : '';
                                            $endTime = ($userWorkingHour) ? \Carbon\Carbon::parse($userWorkingHour['end_time'])->format('H:i') : '';
                                        @endphp
                                            
                                            <span class="text-danger">*</span></label>
                                        <div class="form-icon">
                                            @php  
                                                $startTime = array_search($day->id, $dayId) === false ? '' : $startTime;
                                                $endTime   = array_search($day->id, $dayId) === false ? '' : $endTime;
                                                if($dayId)
                                                { $disabled  = array_search($day->id, $dayId) === false ? (isset($dayId) ? 'disabled' : 'disabled') : '';
                                            }else {
                                                $disabled = '';
                                            }
                                            
                                            @endphp

                                            <input id='{{ strtolower($day->name) }}_start_time' type="time"  value="{{ $startTime }}"
                                                class="form-control" name="day[{{ $day->id }}][start_time]" 
                                                {{ $disabled}}
                                                {{-- {{ (array_search($day->id, $dayId) === false ? (isset($dayId) ? 'disabled' : 'disabled') : '') ?? '' }} --}}
                                                
                                                >

            
                                            <span class="text-danger"
                                                id="{{ strtolower($day->name) }}_start_time_error"></span>

                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-5">
                                    <div class="form-wrap">
                                        <label class="col-form-label">To <span class="text-danger">*</span></label>
                                        <div class="form-icon">
                                            <input id='{{ strtolower($day->name) }}_end_time' type="time"   value="{{  $endTime}}" 
                                                class="form-control timepicker1"
                                                name="day[{{ $day->id }}][end_time]"
                                                {{$disabled}}
                                                >
                                            <span class="text-danger"
                                                id="{{ strtolower($day->name) }}_end_time_error"></span>
                                        </div>
                                    </div>
                                </div>
                                <input id='{{ strtolower($day->name) }}_start_time' type="hidden"  value="{{$day->id}}"
                                class="form-control" name="day[{{ $day->id }}][day_id]" {{ $disabled}}>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


        <div class="modal-btn text-end">
            <a href="#" class="btn btn-gray">Cancel</a>
            <input type="hidden" value="{{ Auth::user() ? Auth::user()->id : Request::segment(4)}}" name="user_id" id="doctor_user_id">
            <button type="submit" class="btn btn-primary prime-btn">Save Changes</button>
        </div>
    </form>
</div>
