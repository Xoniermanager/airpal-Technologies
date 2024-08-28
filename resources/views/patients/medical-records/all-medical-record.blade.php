<div id="medical_record_list">
    <div class="custom-table">
        <div class="table-responsive">
            <table class="table table-center mb-0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Date</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($allMedicalRecord as $key => $medicalRecord)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $medicalRecord->name }}</td>
                            <td>{{ $medicalRecord->date }}</td>
                            <td>{!! Str::limit($medicalRecord->description, 20, ' ...') !!}</td>
                            <td>
                                <div class="action-item">
                                    <a href="{{ route('patient.medical-records.edit', $medicalRecord->id) }}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <a href="{{ $medicalRecord->file }}" download>
                                        <i class="fa-solid fa-download"></i>
                                    </a>
                                    <a href="#" onclick="delete_medical_record({{ $medicalRecord->id }})">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center" colspan="5"><h4 class="text-danger ">No Medical Record</h4></td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="pagination dashboard-pagination">
        <ul>
            {{ $allMedicalRecord->links() }}
        </ul>
    </div>
</div>
