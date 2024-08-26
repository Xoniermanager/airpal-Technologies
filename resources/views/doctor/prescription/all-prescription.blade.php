<div id="medical_record_list">
    <div class="custom-table">
        <div class="table-responsive">
            <table class="table table-center mb-0">
                <thead>
                    <tr>
                        <th>Sr No.</th>
                        <th>Patient Details</th>
                        <th>Medicine Details & Quantity</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($allPrescriptionDetails as $key => $prescriptionDetails)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>
                                <div class="notify-block d-flex">
                                    <span class="avatar">
                                        <img class="avatar-img" alt=""
                                            src="{{ $prescriptionDetails->bookingSlot->patient->image_url }}">
                                    </span>
                                    <div class="media-body">
                                        <h6>{{ $prescriptionDetails->bookingSlot->patient->first_name }}
                                            {{ $prescriptionDetails->bookingSlot->patient->last_name }}</h6>
                                        <p class="noti-details">{{ $prescriptionDetails->bookingSlot->patient->email }}
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <table class="m-0 p-0 no-padding-table">
                                    <tr>
                                        <th>Medicine Name</th>
                                        <th>Quantity</th>
                                        <th>Frequency</th>
                                        <th>Meal Status</th>
                                    </tr>
                                    @foreach ($prescriptionDetails->prescriptionMedicineDetail as $medicineDetails)
                                        <tr>
                                            <td> <span
                                                    class="btn btn-primary btn-xs m-1">{{ $medicineDetails->medicine_name }}</span>
                                            </td>
                                            <td><span
                                                    class="btn btn-success btn-xs m-1">{{ $medicineDetails->quantity }}</span>
                                            </td>
                                            <td>
                                                 <span
                                                    class="btn btn-warning btn-xs m-1">{{ $medicineDetails->frequency }}</span>
                                            </td>
                                            <td>
                                                @if ($medicineDetails->meal_status == 1)
                                                <span
                                                class="btn btn-info btn-xs m-1">Yes</span>
                                                @else
                                                <span
                                                class="btn btn-danger btn-xs m-1">No</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </td>
                            <td>{{ $prescriptionDetails->start_date }}</td>
                            <td>{{ $prescriptionDetails->end_date }}</td>
                            <td>{!! Str::limit($prescriptionDetails->description, 10, ' ...') !!}</td>
                            <td>
                                <div class="action-item">
                                    <a href="{{ route('prescription.edit', $prescriptionDetails->id) }}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <a href="">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a href="#" onclick="delete_medical_record({{ $prescriptionDetails->id }})">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center" colspan="5">
                                <h4 class="text-danger ">No Prescription Record</h4>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="pagination dashboard-pagination">
        <ul>
            {{ $allPrescriptionDetails->links() }}
        </ul>
    </div>
</div>
