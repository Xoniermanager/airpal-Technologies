<div id="slots_list" class="card-body">
    <div class="table-responsive">
        <table class="table table-hover table-center mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Doctor</th>
                    <th>Slot duration</th>
                    <th>Cleanup interval</th>
                    <th>Start month</th>
                    <th>End month</th>
                    <th>Exception day</th>
                    <th>Slots in advance</th>
                    <th>Start slots from date</th>
                    <th>stop slots from date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            {{-- {{ dd($allSlotDetails) }} --}}
            <tbody>
                @forelse ($allSlotDetails as $slot)
                    <tr>
                        <td>{{ $slot['id'] }}</td>
                        <td>{{ $slot->user->first_name }} {{ $slot->user->last_name }}</td>
                        <td>{{ $slot['slot_duration'] }}</td>
                        <td>{{ $slot['cleanup_interval'] }}</td>
                        <td>{{ $slot['start_month'] }}</td>
                        <td>{{ $slot['end_month'] }}</td>
                        <td>
                            @if ($slot->doctorExceptionDays->isNotEmpty())
                                {{ $slot->doctorExceptionDays->pluck('exceptionDay.name')->implode(', ') }}
                            @else
                                No exception days
                            @endif
                        </td>
                        <td>{{ $slot['slots_in_advance'] }}</td>
                        <td>{{ $slot['start_slots_from_date'] }}</td>
                        <td>{{ $slot['stop_slots_date'] }}</td>
                        <td>
                            <div class="actions">
                                <a class="btn btn-sm bg-success-light" data-id ="{{$slot['name']}}" data-bs-toggle="modal" href="#edit_slot" onclick="edit_slot('{{ $slot }}', '{{ $slot->doctorExceptionDays->pluck('exception_days_id')}}')">
                                <i class="fe fe-pencil"></i> Edit
                            </a>
                            <a data-bs-toggle="modal" href="#delete-slot"
                                class="btn btn-sm bg-danger-light delete-slot" data-id="{{$slot['id']}}" >
                                <i class="fe fe-trash"></i> Delete
                            </a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td> Record Not Found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-3 d-flex justify-content-end">
            {{ $allSlotDetails->links() }}
        </div>
    </div>
</div>
