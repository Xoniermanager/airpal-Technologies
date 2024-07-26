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
                        <a href="#" class="text-success-icon me-2 appointment-status"   onclick="updateAppointment('confirmed', {{ $appointment->id }})" ><i class="fa-solid fa-check">
                             
                        </i>
                        <span class="tooltip text-success">Confirm</span>
                        </a>
                        <a href="#" class="text-danger-icon appointment-status" onclick="updateAppointment('cancelled', {{ $appointment->id }})"><i class="fa-solid fa-xmark"></i>
                            <span class="tooltip text-danger">Cancel</span>
                        </a>
                    </div>
                </td>
            </tr>
        @empty

        
            <img src="">
        @endforelse
    </tbody>
</table>


<style>
 
  /* pop-up text */
  
  .appointment-status span {
    color:#666; 
    font-family:sans-serif;
    bottom:0; 
    padding:5px 7px;
    z-index:-1;
    font-size:14px;
    border-radius:2px;
    background:#fff;
    visibility:hidden;
    opacity:0; 
    position: absolute
  }
  
  /* pop-up text arrow */
  
  .appointment-status  span:before {
    content:'';
    width: 0; 
    height: 0; 
    border-left: 5px solid transparent;
    border-right: 5px solid transparent;
    border-top: 5px solid #fff;
    position:absolute;
    bottom:-5px;
    left:40px;
  }
  
  /* text pops up when icon is in hover state */
  
  .appointment-status:hover span {
    bottom:15px;
    visibility:visible;
    opacity:1;
    z-index: 9;
    border: 1px solid ; 
    border-radius: 3px;

  }
  .dashboard-table.table .apponiment-actions:hover { 
    position: relative; 
}
    </style>