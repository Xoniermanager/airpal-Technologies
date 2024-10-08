<tbody id="appointmentList">
    @forelse ($appointments_list as $key =>  $appointment)
        <tr>
            <td>
                <h2 class="table-avatar">
                    <a href="" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle"
                            src="assets/img/doctors/doctor-thumb-01.jpg" alt=""></a>
                    <a href="">Dr. {{ $appointment->user->fullName }}</a>
                </h2>
            </td>
            <td>
                @isset($appointment)
                @forelse ($appointment->user->specializations as $specialization)
                <span class="badge badge-info text-white">{{$specialization->name}}</span>
  
                @empty
                <p>N/A</p>
                @endforelse
                @endisset
            </td>
            <td>
                <h2 class="table-avatar">
                    <a href="" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle"
                            src="assets/img/patients/patient1.jpg" alt=""></a>
                    <a href="">{{ $appointment->patient->fullName }} </a>
                </h2>
            </td>
            <td>{{ \Carbon\Carbon::parse($appointment->booking_date)->format('j M Y') ?? '' }}
                <span class="text-primary d-block">{{ date('h:i A', strtotime($appointment->slot_start_time)) ?? '' }}-
                    {{ date('h:i A', strtotime($appointment->slot_end_time)) ?? '' }}</span>
            </td>
            <td>
                <div class="status-toggle">
                    <input type="checkbox" id="status_{{ $key }}" class="check"
                        {{ $appointment->status == 'confirmed' ? 'checked' : ($appointment->status == 'rejected' ? '' : '') }}>
                    <label for="status_{{ $key }}" class="checktoggle">checkbox</label>
                </div>
            </td>
            <td>
                $200.00
            </td>
        </tr>
    @empty
        <tr>
            <td> Not Found</td>
        </tr>
    @endforelse
</tbody>
