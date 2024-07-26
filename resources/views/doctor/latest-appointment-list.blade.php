<table class="table dashboard-table appoint-table" id="latest-appointment-list">
    <tbody>
        @forelse ($recentAppointments as $appointment)
            <tr>
                <td>
                    <div class="patient-info-profile">
                        <a href="{{ route('doctor.appointments.index') }}" class="table-avatar">
                            <img src="{{ asset('images/' . $appointment->patient->image_url) }}">
                        </a>
                        <div class="patient-name-info">
                            <span>#PAT{{ $appointment->id }}</span>
                            <h5><a
                                    href="{{ route('doctor.appointments.index') }}">{{ $appointment->patient->FullName }}</a>
                            </h5>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="appointment-date-created">
                        <h6>
                            {{ $appointment->booking_date }}
                            {{ $appointment->slot_start_time }}
                        </h6>
                        <span class="badge table-badge">General</span>
                    </div>
                </td>
                <td>
                    <div class="apponiment-actions d-flex align-items-center">
                        <a href="#" class="text-success-icon me-2" onclick="updateAppointment('confirmed', {{ $appointment->id }})" ><i class="fa-solid fa-check"></i></a>
                        <a href="#" class="text-danger-icon" onclick="updateAppointment('canceled', {{ $appointment->id }})"><i class="fa-solid fa-xmark"></i></a>
                    </div>
                </td>
            </tr>
        @empty

            <p>Not Found </p>
        @endforelse
    </tbody>
</table>
