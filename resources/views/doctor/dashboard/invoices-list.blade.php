                 <div class="dashboard-card w-100">
                     <div class="dashboard-card-head">
                         <div class="header-title">
                             <h5>Recent Invoices</h5>
                         </div>
                         <div>
                             <a href="{{ route('doctor.doctor-invoices.index') }}"
                                 class="btn btn-primary btn-sm float-end mt-4">View All</a>
                         </div>
                     </div>
                     <div class="dashboard-card-body">
                         <div class="table-responsive">
                             <table class="table dashboard-table">
                                 <tbody>
                                     @forelse ($recentAppointments as $recentAppointments)
                                         <tr>
                                             <td>
                                                 <div class="patient-info-profile">
                                                     <a href="{{$recentAppointments->patientProfileUrl()}}"
                                                         class="table-avatar">
                                                         <img src="{{ $recentAppointments->patient->image_url }}"
                                                             alt="Img">

                                                     </a>
                                                     <div class="patient-name-info">
                                                         <h5><a href="{{$recentAppointments->patientProfileUrl()}}">{{ $recentAppointments->patient->fullName }}
                                                             </a>
                                                         </h5>
                                                     </div>
                                                 </div>
                                             </td>
                                             <td>
                                                 <div class="appointment-date-created">
                                                     <span class="paid-text">Amount</span>
                                                     <h6>$0</h6>
                                                 </div>
                                             </td>
                                             <td>
                                                 <div class="appointment-date-created">
                                                     <span class="paid-text">Paid On</span>
                                                     <h6>{{ \Carbon\Carbon::parse($recentAppointments->created_at)->format('j M Y') ?? '' }}
                                                     </h6>
                                                 </div>
                                             </td>
                                             <td>
                                                 <div class="apponiment-view d-flex align-items-center">
                                                     <a onclick="show_invoice({{ $recentAppointments->id }})"
                                                         data-bs-toggle="modal" data-bs-target="#invoice-preview"
                                                         href="{{ $recentAppointments->invoice_url ?? '' }}"><i
                                                             class="fa-solid fa-eye"></i></a>
                                                 </div>

                                             </td>
                                         </tr>
                                     @empty
                                     
                                     @endforelse

                                 </tbody>
                             </table>
                         </div>
                     </div>
                 </div>
