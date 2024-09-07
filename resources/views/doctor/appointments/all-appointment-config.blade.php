@extends('layouts.doctor.main')
@section('content')
    <div class="dashboard-header">
        <h3>Appointment</h3>
    </div>
    {{-- {{    dd($appointmentConfigs->toArray())}} --}}
    <div class="row mt-5">
        @forelse ($appointmentConfigs as $appointmentConfigsDetails)
            @php
                if (!empty($appointmentConfigsDetails->config_end_date) && strtotime($appointmentConfigsDetails->config_end_date) < time())
                {
                    $active_blur_class = 'active_blur';
                    $current = 'Old';
                } elseif (strtotime($appointmentConfigsDetails->config_start_date) > time())
                {
                    $active_blur_class = '';
                    $current = 'Upcoming';
                }
                else
                {
                    $active_blur_class = '';
                    $current = 'Current';
                }
            @endphp
            <div class="col-xl-6 col-lg-6 col-md-6 d-flex mb-4">
                <div class="appointment-wrap appointment-grid-wrap pt-0 {{ $active_blur_class }}">
                    <div style="margin-top: -20px;display: flex;justify-content: space-between;">
                        <span class="btn btn-sm bg-info-light">{{ $appointmentConfigsDetails->config_start_date }}</span>
                        <span class="btn btn-sm btn-primary text-center"
                            style="border-radius: 20px;
                 padding: 5px 20px;">{{ $current }}</span>
                        <span
                            class="btn btn-sm bg-danger-light float-right">{{ $appointmentConfigsDetails->config_end_date }}</span>
                    </div>
                    <div class="mt-4 mb-4">
                        <h6>Slot Duration <small class="float-right">{{ $appointmentConfigsDetails->slot_duration }}
                                Min</small> </h6>
                        <h6>CleanUp Interval <small class="float-right">{{ $appointmentConfigsDetails->cleanup_interval }}
                                Min</small> </h6>
                        <h6>Starting date of each month for creating slots <small
                                class="float-right">{{ $appointmentConfigsDetails->start_slots_from_date }}</small> </h6>
                        <h6>Upto which date of each month slots will be created <small
                                class="float-right">{{ $appointmentConfigsDetails->stop_slots_date }}</small>
                        </h6>
                    </div>
                    <a href="{{ route('doctor.appointment.config') }}" class="btn btn-sm btn-warning">
                        <i class="fa fa-pen"></i>
                    </a>
                    <a href="{{ route('doctor.delete.appointment.config', $appointmentConfigsDetails->id) }}"
                        class="btn btn-sm btn-danger">
                        <i class="fa fa-trash"></i>
                    </a>

                </div>
            </div>
        @empty
            <div class="col-xl-6 col-lg-6 col-md-6 d-flex mb-4">
                <div class="appointment-wrap appointment-grid-wrap pt-0">
                    <div class="mt-4 mb-4">
                        <h3 class="text-danger">No Current Appointment Config</h3>
                    </div>
                </div>
        @endforelse
    </div>
@endsection
