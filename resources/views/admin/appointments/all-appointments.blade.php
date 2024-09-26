<div id="all-appointments" class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-center mb-0">
                <thead>
                    <tr>
                        <th>Doctor Name</th>
                        <th>Speciality</th>
                        <th>Patient Name</th>
                        <th>Appointment Time</th>
                        <th>Status</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                @forelse ($appointments_list as $key =>  $appointment)
                    @include('admin.appointments.single-appointment')
                @empty
                <tr>
                    <td> Not Found</td>
                </tr>
            @endforelse
                
            </table>


            <div class="mt-3 d-flex justify-content-end">
                {{ $appointments_list->links() }}
            </div>     
        </div>
    </div>
</div>