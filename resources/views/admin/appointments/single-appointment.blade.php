<tbody id="appointmentList">

        <tr>
            <td>
                <h2 class="table-avatar">
                    <a href="" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle"
                            src="{{$appointment->user->image_url ?? '' }}" 
                            onerror="this.src='{{ asset('assets/img/user.jpg') }}';"
                            alt=""></a>
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
                        src="{{$appointment->patient->image_url ?? '' }}"
                        onerror="this.src='{{ asset('assets/img/user.jpg') }}';"
                        alt=""></a>
                    <a href="">{{ $appointment->patient->fullName }} </a>
                </h2>
            </td>
            <td>{{ \Carbon\Carbon::parse($appointment->booking_date)->format('j M Y') ?? '' }}
                <span class="text-primary d-block">{{ date('h:i A', strtotime($appointment->slot_start_time)) ?? '' }}-
                    {{ date('h:i A', strtotime($appointment->slot_end_time)) ?? '' }}</span>
            </td>
            <td>
                <div class="status-toggle">
                    {!! getAppointmentColoredStatus($appointment->status) !!}
                </div>
            </td>
            <td>
                ${{ $appointment->payments->amount ?? 0 }}
            </td>
        </tr>

</tbody>
