
    <tbody id="patients-list">
        @forelse ($patientList as $key => $patient)
            <tr>
                <td>{{ $key+1  }}</td>
                <td>
                    <h2 class="table-avatar">
                        <a href="" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle"
                                src="{{ $patient->image_url }}" alt=""></a>
                        <a href="">{{ $patient->fullName }}</a>
                    </h2>
                </td>
                <td> {{ $patient->getAgeAttribute ?? '' }}</td>
                <td> {{ $patient->gender ?? '' }}</td>
                <td> {{ $patient->blood_group ?? '' }}</td>
                <td> {{ $patient->fullAddress ?? '' }}</td>
                <td> {{ $patient->phone ?? '' }}</td>
                <td> {{ date('j M Y', strtotime($patient->booking_date)) }}</td>
            </tr>
        @empty
            <td>Not found</td>
        @endforelse
    <tbody>

